<?php

namespace App\Services;

use WP_REST_Response;

class Response
{
    static public function success($params, $message = 'Saved', $status = 200): WP_REST_Response
    {
        $data = [
            'data' => $params,
            'message' => $message,
        ];

        $isPrimitive =
            is_numeric($params) ||
            is_string($params) ||
            is_bool($params) ||
            is_null($params);

        if (!$isPrimitive) return new WP_REST_Response($params, $status);

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