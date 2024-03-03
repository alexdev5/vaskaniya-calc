<?php

namespace App\Seeders;

use App\Contracts\SeederContract;
use WP_Error;

abstract class Seeders implements SeederContract
{

    public function createTerms($taxonomyName, $taxonomies)
    {
        if (empty($taxonomies)) {
            new WP_Error('seeder_taxonomy_empty', "seeder_taxonomy_empty");
        }

        foreach ($taxonomies as $key => $data) {
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

    public function cretePosts($taxonomyName, $postsData) {
        if (empty($postsData)) {
            return new WP_Error('seeder_posts_empty', "seeder_posts_empty");
        }

        foreach ($postsData as $postData) {
            // Проверяем, существует ли уже пост с таким же названием (slug).
            $existingPost = get_page_by_path($postData['slug'], OBJECT, $taxonomyName);

            if (!$existingPost) {
                // Создаем новый пост, если он не существует.
                $postID = wp_insert_post([
                    'post_title'    => $postData['title'], // Заголовок поста.
                    'post_content'  => $postData['content'], // Содержимое поста.
                    'post_status'   => 'publish', // Статус поста.
                    'post_type'     => $taxonomyName, // Тип поста.
                    'post_name'     => $postData['slug'], // Slug поста.
                    // Дополнительные атрибуты, если требуется.
                ]);

                if (is_wp_error($postID)) {
                    continue; // Пропускаем итерацию, если произошла ошибка при создании поста.
                }

                // Присваиваем термины таксономии посту, если требуется.
                if (!empty($postData['terms']) && is_array($postData['terms'])) {
                    foreach ($postData['terms'] as $taxonomy => $terms) {
                        wp_set_object_terms($postID, $terms, $taxonomy);
                    }
                }
            }
        }
    }

    public function getTaxonomies(string $directory): array
    {
        $files = scandir($directory);
        $taxonomies = [];

        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $path = $directory . '/' . $file;
                $taxonomy = require $path;
                $taxonomies[] = $taxonomy;
            }
        }

        return $taxonomies;
    }

    abstract public function run();
}