<?php

namespace App\Services\Post;

use App\Services\MediaService;
use App\Services\Response;
use WP_Error;

class Post
{
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
            $postId = wp_update_post($args);
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
}