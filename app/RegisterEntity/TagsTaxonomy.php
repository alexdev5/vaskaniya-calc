<?php

namespace App\RegisterEntity;

use App\Config\PostTypeEnum;
use App\Config\TaxonomyEnum;
use App\Contracts\TaxonomyContract;

class TagsTaxonomy implements TaxonomyContract
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
            TaxonomyEnum::Tags,
            [
                PostTypeEnum::Products,
                PostTypeEnum::Addons,
                PostTypeEnum::Services,
            ],
            $args
        );
    }

    public function register()
    {
        $this->registerTags();
    }
}
