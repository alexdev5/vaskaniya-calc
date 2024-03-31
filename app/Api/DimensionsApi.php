<?php

namespace App\Api;

use App\Controllers\Route\VsRoute;
use App\Controllers\Dimensions\DimensionsController;

class DimensionsApi
{
    const route = '/dimensions';

    public static function register()
    {
        VsRoute::get(self::route('/dimensions'), [DimensionsController::class, 'getAllData']);
    }

    private static function route(string $name): string
    {
        return self::route . $name;
    }
}