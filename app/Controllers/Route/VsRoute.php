<?php

namespace App\Controllers\Route;

class VsRoute {
    protected static string $namespace = 'vs-calculator/v1';

    public static function get($route, $callback, $permission_callback = null, $args = []) {
        self::register_route('GET', $route, $callback, $args, $permission_callback);
    }

    public static function post($route, $callback, $permission_callback = null, $args = []) {
        self::register_route('POST', $route, $callback, $args, $permission_callback);
    }

    protected static function register_route($method, $route, $callback, $permission_callback, $args) {
        if (is_array($callback) && class_exists($callback[0])) {
            $callback = [new $callback[0], $callback[1]];
        }

        add_action('rest_api_init', function () use ($method, $route, $callback, $args, $permission_callback) {
            register_rest_route(self::$namespace, '/' . trim($route, '/'), [
                'methods'             => $method,
                'callback'            => $callback,
                'args'                => $args,
                'permission_callback' => $permission_callback ?? '__return_true',
            ]);
        });
    }
}