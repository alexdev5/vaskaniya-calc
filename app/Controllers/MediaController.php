<?php

class MediaController
{
    public function getMediaList($query = []): WP_REST_Response
    {
        $images = MediaService::getMediaList($query);

        return new WP_REST_Response($images, 200);
    }
}