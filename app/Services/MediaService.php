<?php

namespace App\Services;

use WP_Query;

class MediaService
{
    /* @param array $query {
     *   page?: int,
     *   per_page?: int,
     * }
     *
     * @return array
     */
    public static function getMediaList(array $query = []): array
    {
        $page = !empty($query['page']) ? intval($query['page']) : 1;
        $perPage = !empty($query['per_page']) ? intval($query['per_page']) : 20;

        $args = array(
            'post_type' => 'attachment',
            'post_mime_type' => ['image/jpeg', 'image/png', 'image/svg+xml'],
            'post_status' => 'inherit',
            'posts_per_page' => $perPage,
            'paged' => $page,
        );

        $query = new WP_Query($args);
        $images = [];

        foreach ($query->posts as $post) {
            $images[] = array(
                'id' => $post->ID,
                'title' => $post->post_title,
                'url' => wp_get_attachment_image_url($post->ID, 'full')
            );
        }

        return $images;
    }
}