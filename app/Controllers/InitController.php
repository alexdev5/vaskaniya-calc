<?php
namespace App\Controllers;
use WP_Error;

class InitController
{
    public static function register(array $classes)
    {
        foreach ($classes as $class) {
            if (!method_exists($class, 'register'))
                return new WP_Error('method_undefined', "Is not method `register` in ${$class}");

           (new $class)->register();
        }
    }

    public static function init(array $classes)
    {
        add_action('init', function() use ($classes) {
            self::register($classes);
        });
    }
}