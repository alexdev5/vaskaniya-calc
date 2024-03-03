<?php

namespace App\Controllers;

use App\Config;
use WP_Error;
use App\Contracts\TaxonomyContract;

class TaxonomyController
{
    public static function register(array $classes)
    {
        foreach ($classes as $class) {
            $instance = new $class;

            if (!($instance instanceof TaxonomyContract)) {
                return new WP_Error('class_not_registrable', "Class ${class} must implement Registrable interface");
            }

            $instance->register();
        }
    }

    public function registerCustomField() {

    }

    public static function init(array $classes)
    {
        add_action('init', function () use ($classes) {
            self::register($classes);
        });
    }
}