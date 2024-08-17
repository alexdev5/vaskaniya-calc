<?php

namespace App\Api;

use App\Contracts\ApiContract;
use App\Controllers\Edges\EdgesController;
use App\Controllers\Route\VsRoute;

class EdgeApi implements ApiContract
{
    const baseRoute = '/edges';

    public static function register()
    {
        VsRoute::get(self::route('/edges'), [EdgesController::class, 'edges']);
    }

    public static function route(string $name = ''): string
    {
        return self::baseRoute . $name;
    }
}