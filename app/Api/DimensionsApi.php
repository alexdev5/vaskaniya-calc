<?php

namespace App\Api;

use App\Contracts\ApiContract;
use App\Controllers\Route\VsRoute;
use App\Controllers\Dimensions\DimensionsController;

class DimensionsApi implements ApiContract
{
    const route = '/dimensions';

    public static function register()
    {
        VsRoute::get(self::route(), [DimensionsController::class, 'getAllData']);
        VsRoute::post(
            self::route('/update-term'),
            [DimensionsController::class, 'updateTerm']
        );
        VsRoute::post(
            self::route('/update-parent-title'),
            [DimensionsController::class, 'updateParentTitle']
        );
    }

    public static function route(string $name = ''): string
    {
        return self::route . $name;
    }
}