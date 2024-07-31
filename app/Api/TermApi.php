<?php

namespace App\Api;

use App\Contracts\ApiContract;
use App\Controllers\Route\VsRoute;
use App\Controllers\Terms\TermsController;

class TermApi implements ApiContract
{
    const route = '/terms';

    public static function register()
    {
        VsRoute::post(self::route('/add-images'), [TermsController::class, 'addImages']);
        VsRoute::post(self::route('/assign-image'), [TermsController::class, 'assignImage']);
        VsRoute::post(self::route('/change-visible'), [TermsController::class, 'changeVisible']);
        VsRoute::post(self::route('/create'), [TermsController::class, 'create']);
    }

    public static function route(string $name = ''): string
    {
        return self::route . $name;
    }
}