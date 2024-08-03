<?php

namespace App\Api;

use App\Contracts\ApiContract;
use App\Controllers\Dimensions\DimensionsController;
use App\Controllers\Route\VsRoute;

class DimensionsApi implements ApiContract
{
    const route = '/dimensions';

    public static function register()
    {
        VsRoute::get(self::route(), [DimensionsController::class, 'getAll']);
        VsRoute::post(
            self::route('/update-term'),
            [DimensionsController::class, 'updateTerm']
        );
        VsRoute::post(
            self::route('/update-term-title'),
            [DimensionsController::class, 'updateTermTitle']
        );
    }

    public static function route(string $name = ''): string
    {
        return self::route . $name;
    }
}