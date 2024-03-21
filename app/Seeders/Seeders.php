<?php

namespace App\Seeders;

use App\Contracts\SeederContract;
use App\Helpers\Post;

use WP_Error;

abstract class Seeders implements SeederContract
{

    public function createTerms($taxonomyName, $taxonomies)
    {
        if (empty($taxonomies) || !is_array($taxonomies)) {
            new WP_Error('seeder_taxonomy_empty', "seeder_taxonomy_empty");
            vsLog($taxonomyName . ' ' . $taxonomies);
            return;
        }

        foreach ($taxonomies as $key => $termData) {
            if (!is_array($termData)) {
                vsLog(['tax' => $taxonomies, 'file' => __FILE__ . ' ' . __LINE__]);
                new WP_Error('taxonomy_empty', "taxonomy data empty");
                continue;
            }

            if(!isset($termData['name'])) continue;

            $parentTermExists = term_exists($termData['name'], $taxonomyName);

            if (!$parentTermExists) {
                $parentTerm = wp_insert_term(
                    $termData['term'],
                    $taxonomyName,
                    $termData
                );

                if (is_wp_error($parentTerm)) continue;

                $parentTermId = $parentTerm['term_id'];
            } else {
                $parentTermId = $parentTermExists['term_id'];
            }

            // Добавляем дочерние теги
            foreach ($termData['children'] as $childKey => $childData) {
                if (term_exists($childData['term'], $taxonomyName)) continue;

                wp_insert_term(
                    $childData['term'],
                    $taxonomyName,
                    [
                        'slug' => $childData['slug'],
                        'parent' => $parentTermId
                    ]
                );
            }
        }
    }

    public function getPostByTitle(string $title, string $postType) {
        global $wpdb;

        $query = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_title = %s AND post_type = %s LIMIT 1", $title, $postType );

        return $wpdb->get_results($query);
    }

    // create post
    public function createPosts($postType, $postsData)
    {

        if (empty($postsData)) {
            return new WP_Error('seeder_posts_empty', "Seeder posts_data - empty");
        }

        foreach ($postsData as $post) {
            $existingPost = $this->getPostByTitle($post['title'], $postType);

            if (!empty($existingPost)) continue;

            $postId = wp_insert_post(
                array_merge($post, [
                    'post_title' => $post['title'],
                    'post_content' => $post['content'] ?? '',
                    'post_status' => $post['status'] ?? 'publish',
                    'post_type' => $postType,
                ]));

            if (is_wp_error($postId)) {
                vsLog($existingPost);
                continue;
            }

            if (!empty($post['terms'])) {
                Post::assignTerms($postId, $post['terms']);
            }

            if (!empty($post['thumbnail'])) {
                Post::assignImage($postId, $post['thumbnail']);
            }

            if (!empty($post['acf'])) {
                Post::assignAcf($postId, $post['acf']);
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
    public function getArrayFromFile(string $filename)
    {
        $file = VS_APP . 'Seeders/' . $filename;

        if (!file_exists($file)) {
            return null;
        }

        return include($file);
    }

    public function assignTermsToPost(int $postId, string $postType, array $postsData)
    {
        foreach ($postsData as $post) {
            if (!empty($postData['acf'])) {
                Post::assignAcf($postId, $postType, $postData['acf']);
            }

            if (!empty($postData['terms'])) {
                Post::assignTerms($postId, $postData['terms']);
            }

            if (!empty($post['thumbnail'])) {
                Post::assignImage($postId, $post['thumbnail']);
            }
        }
    }

    abstract public function run();
}