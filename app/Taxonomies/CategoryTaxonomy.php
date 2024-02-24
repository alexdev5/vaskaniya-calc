<?php
namespace App\Taxonomies;

use App\Config;
use App\Contracts\TaxonomyContract;

class CategoryTaxonomy implements TaxonomyContract
{
    public function category() {
        $category = Config::get('taxonomy.categories');

        $args = [
            'label' => 'Категории',
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            //'rewrite' => ['slug' => $parent_slug],
            'rewrite' => true,
            'meta_box_cb' => false,
            'public' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            //'rest_base' => $parent_slug,
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'update_count_callback' => '_update_post_term_count',
        ];
        register_taxonomy(
            $category,
            [
                Config::get('post_type.products'),
                Config::get('post_type.addons'),
                Config::get('post_type.services'),
            ],
            $args);
    }

    public function stonePalette() {
        $category = Config::get('taxonomy.categoryStone');

        $args = [
            'label' => 'Категория камня',
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            //'rewrite' => ['slug' => $parent_slug],
            'rewrite' => true,
            'meta_box_cb' => false,
            'public' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            //'rest_base' => $parent_slug,
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'update_count_callback' => '_update_post_term_count',
        ];
        register_taxonomy($category, Config::get('post_type.products'), $args);
    }

    public function register()
    {
        $this->stonePalette();
        $this->category();
    }
}