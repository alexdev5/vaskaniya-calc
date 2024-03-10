<?php

namespace App\Seeders;

use App\Contracts\SeederContract;
use App\Controllers\Admin\AcfCreator;
use App\Helpers\Media;

use WP_Error;


abstract class Seeders implements SeederContract
{

    public function assignTermsToPost($postType, $postsData) {
        $postID = 37;

        foreach ($postsData as $post) {
            foreach ($post['acf'] as $key => $value) {
                update_field(AcfCreator::getFieldName($key, $postType), $value, $postID);
            }

            foreach ($post['terms'] as $taxonomy => $terms) {
                wp_set_post_terms($postID, $terms, $taxonomy);
            }

            $thumbnailId = Media::uploadImage($post['thumbnail']);

            if (!is_null($thumbnailId)) {
                set_post_thumbnail($postID, $thumbnailId);
            }
        }
    }

    public function createTerms($taxonomyName, $taxonomies)
    {
        if (empty($taxonomies) || !is_array($taxonomies)) {
            new WP_Error('seeder_taxonomy_empty', "seeder_taxonomy_empty");
            vsLog($taxonomyName . ' ' .$taxonomies);
            return;
        }

        foreach ($taxonomies as $key => $data) {
            if (!is_array($data)) {
                vsLog(['tax' => $taxonomies, 'file' => __FILE__ . ' ' . __LINE__]);
                new WP_Error('taxonomy_empty', "taxonomy data empty");
                continue;
            }
            $slug = $data['slug'];
            $name = $data['name'];

            $parentTermExists = term_exists($name, $taxonomyName);

            if (!$parentTermExists) {
                $parentTerm = wp_insert_term(
                    $name,
                    $taxonomyName,
                    ['slug' => $slug]
                );

                if (is_wp_error($parentTerm)) continue;

                $parentTermId = $parentTerm['term_id'];
            } else {
                $parentTermId = $parentTermExists['term_id'];
            }

            // Добавляем дочерние теги
            foreach ($data['children'] as $childSlug => $childName) {
                if (term_exists($childName, $taxonomyName)) continue;

                wp_insert_term(
                    $childName,
                    $taxonomyName,
                    [
                        'slug' => $childSlug,
                        'parent' => $parentTermId
                    ]
                );
            }
        }
    }

    public function createPosts($postType, $postsData) {
        if (empty($postsData)) {
            return new WP_Error('seeder_posts_empty', "Seeder posts_data - empty");
        }

        foreach ($postsData as $postData) {
            $existingPost = get_posts([
                'post_type' => $postType,
                'post_title' => $postData['title'],
                'posts_per_page' => 1,
            ]);

            if ($existingPost) continue;

            $postID = wp_insert_post(
                array_merge($postData, [
                    'post_title' => $postData['title'], // Заголовок поста.
                    'post_content' => $postData['content'], // Содержимое поста.
                    'post_status' => $postData['status'] ?? 'publish', // Статус поста.
                    'post_type' => $postType,
                    //'post_name' => $postData['slug'],
                ]));

            if (is_wp_error($postID)) {
                continue; // if error
            }

            // Присваиваем термины таксономии посту, если требуется.
            if (!empty($postData['terms'])) {
                foreach ($postData['terms'] as $taxonomy => $terms) {
                    wp_set_object_terms($postID, $terms, $taxonomy);
                }
            }

            // Добавляем миниатюру, если указана
            if (!empty($postData['thumbnail'])) {
                $thumbnail_id = attachment_url_to_postid($postData['thumbnail']);
                if (!is_null($thumbnail_id)) {
                    set_post_thumbnail($postID, $thumbnail_id);
                }
            }

            // Добавляем метаданные ACF, если есть
            if (!empty($postData['acf'])) {
                foreach ($postData['acf'] as $meta_key => $meta_value) {
                    update_field($meta_key, $meta_value, $postID);
                }
            }

            // Добавляем термины
            if (!empty($postData['terms'])) {
                foreach ($postData['terms'] as $taxonomy => $terms) {
                    wp_set_post_terms($postID, $terms, $taxonomy);
                }
            }
        }
    }

    public function getArrayFromDirectory(string $directory): array
    {
        $directory = VS_APP . 'Seeders/' . $directory;

        $files = scandir($directory);
        $taxonomies = [];

        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $path = $directory . '/' . $file;
                $posts = require $path;
                $taxonomies = array_merge_recursive($taxonomies, $posts);
            }
        }

        return $taxonomies;
    }

    // Получить таксономии с одного файла
    public function getArrayFromFile(string $filename) {
        $file = VS_APP . 'Seeders/' . $filename;

        if (!file_exists($file)) {
            return null;
        }

        return include($file);
    }

    abstract public function run();
}