<?php

namespace App\Controllers\Post;

use App\Services\Post\Post;
use App\Services\Response;
use WP_REST_Request;
use WP_REST_Response;

class PostController
{
    public function create(WP_REST_Request $request): WP_REST_Response
    {

    }

    public function remove(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        if (Post::remove($params['id'])) {
            return Response::success(null, 'Post removed successfully.');
        }

        return Response::error('Post could not be removed.');
    }

    public function uploadImage(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        if (!$params['image']) Response::error($params['image'], 'Image must be File type');

        $thumbnailId = Post::uploadImageThenAssign($params['postId'], $params['image']);

        if (is_wp_error($thumbnailId))
            return Response::error($thumbnailId);

        return Response::success($thumbnailId);
    }

    public function assignImage(WP_REST_Request $request): WP_REST_Response
    {
        Post::assignImageById(
            $request->get_param('postId'),
            $request->get_param('imageId')
        );

        return Response::success(null);
    }

    public function removeImage(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        Post::removeThumbnail($params['postId']);

        return Response::success(null, 'Image removed in ' . $params['postId']);
    }

    public function assignTerms(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

    }

    public function assignAcf(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

    }

}