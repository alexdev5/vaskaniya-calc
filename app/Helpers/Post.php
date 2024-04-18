<?php
namespace App\Helpers;

use App\Controllers\Admin\AcfCreator;

class Post {
    public static function assignTerms(int $postId, array $postTerms)
    {
        foreach ($postTerms as $taxonomy => $terms) {
            $result = wp_set_object_terms($postId, $terms, $taxonomy);
            if (is_wp_error($result)) {
                vsLog($result->get_error_message());
            }
        }
    }

    public static function assignImage(int $postId, $thumbnail) {
        $thumbnailId = Media::uploadImageByPath($thumbnail);

        if (!is_null($thumbnailId)) {
            set_post_thumbnail($postId, $thumbnailId);
        }
    }

    public static function assignAcf(int $postId, array $fields) {
        foreach ($fields as $name => $value) {
            update_field($name, $value, $postId);
        }
    }
}