<?php

namespace App\Api;

use App\Contracts\ApiContract;
use App\Controllers\Route\VsRoute;

class MediaApi implements ApiContract {
    const route = '/dimensions';

    public static function register()
    {
        VsRoute::get(self::route(), [DimensionsController::class, 'getAllData']);
        VsRoute::post(
            self::route('/update-term'),
            [DimensionsController::class, 'updateTerm']
        );
    }

    public static function route(string $name = ''): string
    {
        return self::route . $name;
    }
}