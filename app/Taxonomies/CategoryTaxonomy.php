<?php
namespace App\Taxonomies;

use App\Config;
use App\Contracts\TaxonomyContract;
use App\Controllers\Admin\AcfCreator;

class CategoryTaxonomy implements TaxonomyContract
{
    public function category() {
        $taxonomy = Config::get('taxonomy.categories');

        $args = [
            'label' => 'Категории',
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            //'rewrite' => ['slug' => $parent_slug],
            'rewrite' => true,
            'public' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            //'rest_base' => $parent_slug,
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'update_count_callback' => '_update_post_term_count',
        ];
        register_taxonomy(
            $taxonomy,
            [
                Config::get('post_type.products'),
                Config::get('post_type.addons'),
                Config::get('post_type.services'),
            ],
            $args);
        register_taxonomy_for_object_type($taxonomy, Config::get('post_type.products'));
    }

    public function stonePalette() {
        $taxonomy = Config::get('taxonomy.categoryStone');

        $args = [
            'label' => 'Категории камня',
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            //'rewrite' => ['slug' => $parent_slug],
            'rewrite' => true,
            'public' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            //'rest_base' => $parent_slug,
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'update_count_callback' => '_update_post_term_count',
        ];
        register_taxonomy(
            $taxonomy,
            [
                Config::get('post_type.palette'),
                Config::get('post_type.products')
            ],
            $args
        );

        $acf = new AcfCreator($taxonomy, 'taxonomy');

        $acf->text('price', 'Цена', [
            'instructions' => 'Например: цена категории'
        ]);
        $acf->image('brand-img', 'Изображение бренда');
    }

    public function createCustomFields() {

    }

    public function register()
    {
        $this->stonePalette();
        $this->category();
    }
}