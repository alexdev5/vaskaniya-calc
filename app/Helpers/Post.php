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
        $thumbnailId = Media::uploadImage($thumbnail);

        if (!is_null($thumbnailId)) {
            set_post_thumbnail($postId, $thumbnailId);
        }
    }

    public static function assignAcf(int $postId, string $postType, array $fields) {
        foreach ($fields as $key => $value) {
            update_field(AcfCreator::getFieldName($key, $postType), $value, $postId);
        }
    }
}