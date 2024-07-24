<?php

namespace App\Controllers\Terms;

use App\Config;
use App\Helpers\Media;
use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

class TermsController
{
    public function assignImage(WP_REST_Request $request): WP_REST_Response {
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

        if ($_FILES[TermsAcfEnum::Thumbnail]) {
            $imageId = Media::uploadImageFromFile($_FILES[TermsAcfEnum::Thumbnail]);
            $this->assignAcfImage($imageId, $termId, TermsAcfEnum::Thumbnail);
        }

        if ($_FILES[TermsAcfEnum::ImageFullSize]) {
            $imageId = Media::uploadImageFromFile($_FILES[TermsAcfEnum::ImageFullSize]);
            $this->assignAcfImage($imageId, $termId, TermsAcfEnum::ImageFullSize);
        }

        if ($_FILES[TermsAcfEnum::ChildBlockImage]) {
            $imageId = Media::uploadImageFromFile($_FILES[TermsAcfEnum::ChildBlockImage]);
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
    public static function updateById($termId, string $taxonomy, array $args) {
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
}