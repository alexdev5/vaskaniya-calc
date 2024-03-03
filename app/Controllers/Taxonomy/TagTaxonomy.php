<?php
namespace App\Controllers\Taxonomy;

use App\Config;
use App\Contracts\TaxonomyContract;

class TagTaxonomy implements TaxonomyContract
{
    public function registerTags()
    {
        $args = [
            'label' => 'Теги',
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
            Config::get('taxonomy.tags'),
            [
                Config::get('post_type.products'),
                Config::get('post_type.addons'),
                Config::get('post_type.services'),
            ],
            $args
        );
    }

    public function register()
    {
        $this->registerTags();
    }
}
