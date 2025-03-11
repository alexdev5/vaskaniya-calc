<?php

namespace App\Api;

use App\Contracts\ApiContract;
use App\Controllers\Route\VsRoute;
use App\Controllers\Terms\TermsController;

class TermApi implements ApiContract
{
    const baseRoute = '/terms';

    public static function register()
    {
        VsRoute::post(self::route('/add-images'), [TermsController::class, 'addImages']);
        VsRoute::post(self::route('/assign-image'), [TermsController::class, 'assignImage']);
        VsRoute::post(self::route('/assign-images'), [TermsController::class, 'assignImages']);
        VsRoute::post(self::route('/change-visible'), [TermsController::class, 'changeVisible']);
        VsRoute::post(self::route('/create'), [TermsController::class, 'create']);
        VsRoute::post(self::route('/remove'), [TermsController::class, 'remove']);
        VsRoute::post(self::route('/duplicate'), [TermsController::class, 'duplicate']);
        VsRoute::post(self::route('/update-sort-index'), [TermsController::class, 'updateSortIndex']);
        VsRoute::post(self::route('/update-info-block'), [TermsController::class, 'updateBlockInfo']);
        VsRoute::post(self::route('/update-child-info-block'), [TermsController::class, 'updateChildBlockInfo']);
    }

    public static function route(string $name = ''): string
    {
        return self::baseRoute . $name;
    }
}