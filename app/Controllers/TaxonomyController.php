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

    // Dont work yet
    public static function preventSlugChangeForCustomTaxonomy($term, $taxonomy)
    {
        if (
            in_array($taxonomy, [
                    Config::get('taxonomy.tags'),
                    Config::get('taxonomy.categories'),
                    Config::get('taxonomy.categoryStone'),
                ]
            ) &&
            !is_wp_error(term_exists($term, $taxonomy))
        ) {
            // Проверяем, существует ли уже такой термин.
            $existing_term = get_term_by('name', $term, $taxonomy);
            if ($existing_term) {
                // Если слаг уже существует, возвращаем ошибку, чтобы предотвратить его изменение.
                return new WP_Error('prevent_slug_change', __('Изменение слага для этой таксономии запрещено.'));
            }
        }
        return $term;
    }

    public static function init(array $classes)
    {
        add_action('init', function () use ($classes) {
            self::register($classes);
        });
        add_filter('pre_insert_term', function ($term, $taxonomy) {
            self::preventSlugChangeForCustomTaxonomy($term, $taxonomy);
        }, 10, 2);
    }
}