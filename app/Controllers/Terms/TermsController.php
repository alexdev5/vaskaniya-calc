<?php

namespace App\Controllers\Terms;

use App\Config;
use App\Helpers\Media;
use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

class TermsController
{
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

        if ($_FILES[TermsAcfEnum::RelatedImage]) {
            $imageId = Media::uploadImageFromFile($_FILES[TermsAcfEnum::RelatedImage]);
            $this->assignAcfImage($imageId, $termId, TermsAcfEnum::RelatedImage);
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
     * @return array
     */
    public static function updateById(string $categoryType, array $params) {
        if (isset($params['termId']))
            new WP_Error( 'termId_empty in TermsController' );

        $termId = $params['termId'];
        $title = $params['title'] ?? null;
        $description = $params['description'] ?? null;
        $acf = $params['acf'] ?? null;

        $update_result = wp_update_term(
            $termId,
            Config::get('taxonomy.categoryStone'),
            [
                'name' => $title,
                'description' => $description
            ]);

        if (is_wp_error($update_result)) {
            new WP_Error( 'update term failed in TermsController' );
        }

        foreach ($acf as $field) {
            update_field($field['name'], $field['value'], 'term_' . $termId);
        }
    }
}