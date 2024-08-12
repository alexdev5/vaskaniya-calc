<?php

namespace App\Response;

use WP_REST_Response;

class Response
{
    static public function success($params, $message = 'Saved', $status = 200): WP_REST_Response
    {
        $data = [
            'data' => $params,
            'message' => $message,
        ];

        if (!is_array($params)) {
            return new WP_REST_Response($params, $status);
        }

        return new WP_REST_Response($data, $status);
    }

    static public function error($params, $message = 'Bad request'): WP_REST_Response
    {
        $data = [
            'data' => $params,
            'message' => $message,
        ];

        return new WP_REST_Response($data, 400);
    }
}