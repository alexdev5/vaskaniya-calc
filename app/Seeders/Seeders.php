<?php

namespace App\Seeders;

use App\Contracts\SeederContract;
use App\Services\Post\Post;
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

        foreach ($taxonomies as $termData) {
            $this->insertTermRecursive($taxonomyName, $termData);
        }
    }

    protected function insertTermRecursive($taxonomyName, $termData, $parentTermId = 0)
    {
        if (!is_array($termData) || !isset($termData['term'])) {
            vsLog('Ошибка создания таксономии' . __LINE__);
            return;
        }

        $termExists = term_exists($termData['term'], $taxonomyName);

        if (!$termExists) {
            $term = wp_insert_term(
                $termData['term'],
                $taxonomyName,
                [
                    'slug' => $termData['slug'] ?? null,
                    'parent' => $parentTermId,
                    'description' => $termData['description'] ?? '',
                ]
            );

            if (is_wp_error($term)) {
                return;
            }

            $termId = $term['term_id'];
        } else {
            $termId = $termExists['term_id'];
        }

        if (!empty($termData['children']) && is_array($termData['children'])) {
            foreach ($termData['children'] as $childData) {
                $this->insertTermRecursive($taxonomyName, $childData, $termId);
            }
        }
    }

    public function getPostByTitle(string $title, string $postType)
    {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_title = %s AND post_type = %s LIMIT 1", $title, $postType);

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
                vsLog('CreatePost' . __LINE__);
                vsLog($existingPost);
                continue;
            }

            if (!empty($post['terms'])) {
                Post::assignTerms($postId, $post['terms']);
            }

            if (!empty($post['thumbnail'])) {
                Post::assignImageByPath($postId, $post['thumbnail']);
            }

            if (!empty($post['acf'])) {
                Post::assignAcf($postId, $post['acf']);
            }
        }
    }

    public function getArrayFromDirectory(string $directory): array
    {
        $directory = VS_APP . 'Seeders/' . $directory;

        return $this->scanDirectory($directory);
    }

    private function scanDirectory(string $directory): array
    {
        $files = scandir($directory);
        $taxonomies = [];

        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $path = $directory . '/' . $file;
                if (is_dir($path)) {
                    $taxonomies = array_merge_recursive($taxonomies, $this->scanDirectory($path));
                } else {
                    $posts = require $path;
                    $taxonomies = array_merge_recursive($taxonomies, $posts);
                }
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

    public function assignTermsToPost(int $postId, array $postsData)
    {
        foreach ($postsData as $post) {
            if (!empty($postData['acf'])) {
                Post::assignAcf($postId, $postData['acf']);
            }

            if (!empty($postData['terms'])) {
                Post::assignTerms($postId, $postData['terms']);
            }

            if (!empty($post['thumbnail'])) {
                Post::assignImageByPath($postId, $post['thumbnail']);
            }
        }
    }

    abstract public function run();
}