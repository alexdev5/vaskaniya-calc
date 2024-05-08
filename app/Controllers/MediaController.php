<?php

namespace App\Controllers;

use App\Services\MediaService;
use WP_REST_Request;
use WP_REST_Response;

class MediaController
{
    public function getMediaList(WP_REST_Request $request): WP_REST_Response
    {
        $query = !empty($request->get_params())
            ? $request->get_params()
            : [];

        $images = MediaService::getMediaList($query);

        return new WP_REST_Response($images, 200);
    }
}