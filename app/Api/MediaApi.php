<?php

namespace App\Api;

use App\Contracts\ApiContract;
use App\Controllers\MediaController;
use App\Controllers\Route\VsRoute;

class MediaApi implements ApiContract
{
    const baseRoute = '/media';

    public static function register()
    {
        VsRoute::get(self::route('/all'), [MediaController::class, 'getMediaList']);
    }

    public static function route(string $name = ''): string
    {
        return self::baseRoute . $name;
    }
}