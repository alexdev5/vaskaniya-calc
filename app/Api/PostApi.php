<?php

namespace App\Api;

use App\Contracts\ApiContract;
use App\Controllers\Post\PostController;
use App\Controllers\Route\VsRoute;

class PostApi implements ApiContract
{
    const baseRoute = '/posts';

    public static function register()
    {
        VsRoute::post(self::route('/create-or-update'), [PostController::class, 'create']);
        VsRoute::post(self::route('/upload-image'), [PostController::class, 'uploadImage']);
        VsRoute::post(self::route('/assign-image'), [PostController::class, 'assignImage']);
        VsRoute::post(self::route('/assign-terms'), [PostController::class, 'assignTerms']);
        VsRoute::post(self::route('/remove-image'), [PostController::class, 'removeImage']);
    }

    public static function route(string $name = ''): string
    {
        return self::baseRoute . $name;
    }
}