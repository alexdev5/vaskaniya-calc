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
    }

    public static function route(string $name = ''): string
    {
        return self::route . $name;
    }
}