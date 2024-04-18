<?php

namespace App\Controllers\Terms;

use App\Helpers\Media;
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

    function assignAcfImage($attachmentId, $termId, $fieldName)
    {
        //return new WP_REST_Response([$attachmentId, $termId, $fieldName], 200);
        if (!function_exists('update_field')) {
            return false;
        }

        return update_field($fieldName, $attachmentId, 'term_' . $termId);
    }
}