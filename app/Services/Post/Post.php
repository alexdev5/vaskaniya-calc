<?php

namespace App\Services\Post;

use App\Services\MediaService;
use App\Services\Response;
use WP_Error;
use WP_Query;

class Post
{
    public static function getPosts(string $postType, array $taxonomies = [], int $numberposts = -1): array
    {
        $args = [
            'post_type' => $postType,
            'posts_per_page' => $numberposts,
            'post_status' => 'publish',
            'tax_query' => [],
        ];

        if (!empty($taxonomies)) {
            foreach ($taxonomies as $taxonomy => $termIds) {
                $args['tax_query'][] = [
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $termIds,
                ];
            }

            if (count($args['tax_query']) > 1) {
                $args['tax_query']['relation'] = 'OR';
            }
        }

        $query = new WP_Query($args);

        $posts = $query->get_posts();

        foreach ($posts as &$post) {
            foreach ($taxonomies as $taxonomy => $termIds) {
                $terms = get_the_terms($post->ID, $taxonomy);

//                $post->taxonomies = [$taxonomy => array_map(function ($item) {
//                    return $item->term_id;
//                }, $terms)];

                $post->taxonomies = array_map(function ($item) {
                    return $item->term_id;
                }, $terms);

                //$post->thumbnail = get_the_post_thumbnail_url($post->ID);
                $post->thumbnail = self::getThumbnail($post->ID);
            }

            $post->acf = get_fields($post->ID);
        }

        return $posts;
    }

    public static function assignTerms(int $postId, array $postTerms)
    {
        foreach ($postTerms as $taxonomy => $terms) {
            $result = wp_set_object_terms($postId, $terms, $taxonomy);
            if (is_wp_error($result)) {
                return new WP_Error('assignTerms', 'Assign terms failed', $result->get_error_message());
            }
        }
    }

    public static function assignImageByPath(int $postId, $thumbnail)
    {
        $thumbnailId = MediaService::uploadImageByPath($thumbnail);

        if (!is_null($thumbnailId)) {
            set_post_thumbnail($postId, $thumbnailId);
        }
    }

    public static function assignImageById(int $postId, int $thumbnailId)
    {
        if (wp_attachment_is_image($thumbnailId)) {
            set_post_thumbnail($postId, $thumbnailId);
            return true;
        } else {
            return new WP_Error('invalid_attachment', 'Attachment is not an image or does not exist.');
        }
    }

    public static function uploadImageThenAssign(int $postId, $file)
    {
        $thumbnailId = MediaService::uploadImageFromFile($file);

        if (is_wp_error($thumbnailId)) Response::error($thumbnailId, '');

        if (wp_attachment_is_image($thumbnailId)) {
            set_post_thumbnail($postId, $thumbnailId);
            return $thumbnailId;
        } else {
            return new WP_Error('invalid_attachment', 'Attachment is not an image or does not exist.');
        }
    }

    public static function removeThumbnail(int $postId): void
    {
        delete_post_thumbnail($postId);
    }

    public static function assignAcf(int $postId, array $fields)
    {
        foreach ($fields as $name => $value) {
            update_field($name, $value, $postId);
        }
    }

    /**
     * @param $args {
     *     title: string,
     *     postType: string
     *     content: string,
     *     id: number,
     *     status?: string,
     * } $postData
     */
    public static function createOrUpdate(
        array $args,
        array $postTerms = [],
        array $acfFields = []
    )
    {
        $postId = $args['id'] ?? 0;

        if (!$args['post_title']) {
            return new WP_Error('createOrUpdateWrong', 'post_title empty');
        }

        if ($postId > 0 && get_post($postId)) {
            wp_update_post($args);
        } else {
            $postId = wp_insert_post($args);
        }

        if (is_wp_error($postId)) {
            return new WP_Error('createOrUpdateWrong', 'Create or update post failed', $postId);
        }

        if (!empty($postTerms)) {
            self::assignTerms($postId, $postTerms);
        }

        if (!empty($acfFields)) {
            self::assignAcf($postId, $acfFields);
        }

        return $postId;
    }

    public static function getThumbnail($postId)
    {
        $thumbnail_id = get_post_thumbnail_id($postId);

        if ($thumbnail_id) {
            $post = get_post($thumbnail_id);
            $post->url = get_the_post_thumbnail_url($postId);

            return $post;
        }

        return null;
    }

    public static function remove($postId)
    {
        return wp_delete_post($postId, true);
    }
}