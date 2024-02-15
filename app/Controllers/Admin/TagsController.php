<?php
namespace App\Controllers\Admin;

use App\Config;

class TagsController {
    public function register() {
        $postType = Config::get('post_type');

        foreach ($this->getTagList() as $parent_slug => $parent_data) {
            $parent_args = [
                'label' => $parent_data['name'],
                'hierarchical' => true,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => ['slug' => $parent_slug],
                'meta_box_cb' => false,
                'public' => true,
                'show_admin_column' => true,
                'show_in_rest' => true,
                'rest_base' => $parent_slug,
                'rest_controller_class' => 'WP_REST_Terms_Controller',
                'update_count_callback' => '_update_post_term_count',
            ];

            register_taxonomy($parent_slug, $postType, $parent_args);

            foreach ($parent_data['children'] as $child_slug => $child_name) {
                $child_args = [
                    'label' => $child_name,
                    'hierarchical' => true,
                    'show_ui' => true,
                    'query_var' => true,
                    'rewrite' => ['slug' => $child_slug],
                    'meta_box_cb' => false,
                    'public' => true,
                    'show_admin_column' => true,
                    'show_in_rest' => true,
                    'rest_base' => $child_slug,
                    'rest_controller_class' => 'WP_REST_Terms_Controller',
                    'update_count_callback' => '_update_post_term_count',
                ];

                register_taxonomy($child_slug, 'vaskaniya-calc', $child_args);
                register_taxonomy_for_object_type($child_slug, 'vaskaniya-calc');
            }
        }
    }

    public function getTagList(): array
    {
        return [
            'name' => 'Теги',
            'children' => [
                'type-sentence' => [
                    'name' => 'типы предложений',
                    'children' => [
                        'new' => 'новые',
                        'hot' => 'горячие',
                        'sale' => 'распродажа',
                    ]
                ],
                'texture' => [
                    'name' => 'текстура',
                    'children' => [
                        'solid-colors' => 'Однотонные цвета',
                        'small-inclusions' => 'мелкие вкрапления',
                        'medium-inclusions' => 'Средние вкрапления',
                        'large-inclusions' => 'крупные вкрапления',
                        'marble-stains' => 'мраморные пятна',
                    ]
                ],
                'stone-color' => [
                    'name' => 'тон камня',
                    'children' => [
                        'white' => 'белый',
                        'brown' => 'коричневый',
                        'light-brown' => 'светло-коричневый',
                        'grey' => 'серый',
                        'lactic' => 'молочный',
                        'dark-brown' => 'темно коричневый',
                        'beige' => 'бежевый',
                        'dark-grey' => 'темно-серый',
                        'black' => 'черный',
                    ]
                ],
            ]
        ];
    }

    public function init(): void
    {
        //add_action('init', [$this, 'register']);
    }
}