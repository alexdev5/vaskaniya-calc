<?php

namespace App\Controllers;

use App\Services\MediaService;

class ActivationController
{
    public function initActions()
    {
        $scripts = MediaService::parseScripts('admin/app/index.html');
    }

    public function init()
    {
        add_action('init', [$this, 'initActions']);
    }
}