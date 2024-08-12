<?php

namespace App\Controllers\Post;

use App\Response\Response;
use App\Services\Post\Post;
use WP_REST_Request;
use WP_REST_Response;

class PostController
{
    public function changeFigure(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        $postId = Post::createOrUpdate([
            'id' => $params['id'] ?? null,
            'post_title' => $params['title'],
            'post_content' => $params['content'] ?? '',
            'post_status' => $params['status'] ?? 'publish',
            'post_type' => $params['postType'],
        ]);

        if (is_wp_error($postId)) {
            return Response::error($postId->get_error_data(), __LINE__ . ':: ' . $postId->get_error_message());
        }

        return Response::success($params, 'Saved');
    }

    public function create(WP_REST_Request $request): WP_REST_Response
    {

    }

    public function addImage(WP_REST_Request $request): WP_REST_Response
    {

    }

    public function assignImage(WP_REST_Request $request): WP_REST_Response
    {

    }

    public function assignTerms(WP_REST_Request $request): WP_REST_Response
    {

    }
}