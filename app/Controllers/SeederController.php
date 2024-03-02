<?php

namespace App\Controllers;

use App\Contracts\SeederContract;
use WP_Error;

class SeederController
{
    private static function run(array $classes): void
    {
        foreach ($classes as $class) {
            $instance = new $class;

            if (!($instance instanceof SeederContract)) {
                new WP_Error('class_not_SeederContract', "Class ${class} must implement SeederContract interface");
                return;
            }

            $instance->run();
        }
    }

    public static function init(array $classes)
    {
        add_action('init', function () use ($classes) {
            self::run($classes);
        });
    }
}