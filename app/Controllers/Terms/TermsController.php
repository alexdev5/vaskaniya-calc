<?php

namespace App\Controllers\Terms;

use App\Helpers\Media;
use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

class TermsController
{
    public function assignImage(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        switch ($params['type']) {
            case 1:
                $this->assignAcfImage($params['imageId'], $params['termId'], TermsAcfEnum::Thumbnail);
                break;
            case 2:
                $this->assignAcfImage($params['imageId'], $params['termId'], TermsAcfEnum::ImageFullSize);
                break;
            case 3:
                $this->assignAcfImage($params['imageId'], $params['termId'], TermsAcfEnum::ChildBlockImage);
                break;
        }

        return new WP_REST_Response([
            'params' => $params,
            'message' => 'Assignment successfully',
        ], 200);
    }

    public function addImages(WP_REST_Request $request): WP_REST_Response
    {
        $termId = $request->get_param('termId');

        if (!$termId) {
            return new WP_REST_Response(['error' => "termId is empty. Images weren't updated"], 400);
        }

        if ($_FILES['thumbnail']) {
            $imageId = Media::uploadImageFromFile($_FILES['thumbnail']);
            $this->assignAcfImage($imageId, $termId, TermsAcfEnum::Thumbnail);
        }

        if ($_FILES['imageFullSize']) {
            $imageId = Media::uploadImageFromFile($_FILES['imageFullSize']);
            $this->assignAcfImage($imageId, $termId, TermsAcfEnum::ImageFullSize);
        }

        if ($_FILES['childBlockImage']) {
            $imageId = Media::uploadImageFromFile($_FILES['childBlockImage']);
            $this->assignAcfImage($imageId, $termId, TermsAcfEnum::ChildBlockImage);
        }

        return new WP_REST_Response(null, 200);
    }

    public function assignAcfImage($attachmentId, $termId, $fieldName)
    {
        //return new WP_REST_Response([$attachmentId, $termId, $fieldName], 200);
        if (!function_exists('update_field')) {
            return false;
        }

        return update_field($fieldName, $attachmentId, 'term_' . $termId);
    }

    /* @param array $params {
     *   termId: int | string,
     *   title: string,
     *   description?: int,
     *   acf: array
     * }
     *
     * @return Boolean | WP_Error
     */
    public static function updateById($termId, string $taxonomy, array $args)
    {
        if (!isset($termId)) {
            return new WP_Error('missing_parameters', 'termID undefined');
        }

        $term = get_term($termId, $taxonomy);

        if (is_wp_error($term))
            return new WP_Error('term_retrieval_failed', 'taxonomy undefined');


        $result = wp_update_term($termId, $taxonomy, $args);

        if (is_wp_error($result)) {
            return new WP_Error('term_update_failed', 'Error updating the term: ' . implode(', ', $result->get_error_messages()));
        }

        $acf = $args['acf'] ?? null;

        foreach ($acf as $fieldName => $acfValue) {
            update_field($fieldName, $acfValue, 'term_' . $termId);
        }

        return true;
    }

    public static function changeVisible(WP_REST_Request $request): WP_REST_Response
    {
        $termId = $request->get_param('termId');

        update_field(TermsAcfEnum::IsVisible, $request->get_param('visible'), 'term_' . $termId);

        return new WP_REST_Response([
            'message' => 'Visibility changed successfully',
        ], 200);
    }

    public static function create(WP_REST_Request $request): WP_REST_Response
    {
//        string $taxonomy, string $termName, array $args, $parentId = null
        if (!isset($termName) || !isset($taxonomy)) {
            return new WP_Error('missing_parameters', 'termName or taxonomy undefined');
        }

        // Додавання батьківського ID до аргументів, якщо він наданий
        if ($parentId !== null) {
            $args['parent'] = $parentId;
        }

        $result = wp_insert_term($termName, $taxonomy, $args);

        if (is_wp_error($result)) {
            return new WP_Error('term_creation_failed', 'Error creating the term: ' . implode(', ', $result->get_error_messages()));
        }

        $termId = $result['term_id'];
        $acf = $args['acf'] ?? null;

        // Оновлення ACF полів, якщо вони надані
        if ($acf) {
            foreach ($acf as $fieldName => $acfValue) {
                update_field($fieldName, $acfValue, 'term_' . $termId);
            }
        }

        return $termId;
        return new WP_REST_Response([
            'message' => 'Visibility changed successfully',
        ], 200);
    }
}