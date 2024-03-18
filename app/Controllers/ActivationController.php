<?php
namespace App\Controllers;

use App\Helpers\Media;

class ActivationController
{
    public function initActions() {
        $scripts = Media::parseScripts('admin/app/index.html');
    }

    public function init() {
        add_action('init', [$this, 'initActions']);
    }
}