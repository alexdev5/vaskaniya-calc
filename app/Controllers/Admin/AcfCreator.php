<?php

namespace App\Controllers\Admin;

use WP_Error;

class AcfCreator
{
    private $group;
    private $type;
    private $title;
    private $taxonomy;

    public function __construct(
        string $taxonomyName,
        string $type = 'post_type',
        string $title = 'Additional'
    )
    {
        if (!function_exists('acf_add_local_field')) {
            return new WP_Error('plugin_not_exist', "ACF Pro not exist");
        }

        $this->taxonomy = $taxonomyName;
        $this->title = $title;
        $this->type = $type;
        $this->group = 'group_' . $type . '_' . $taxonomyName;

        $this->setGroup();
    }

    public function image(string $name, string $label, array $params = [])
    {
        $this->setField(
            array_merge([
                'name' => $name,
                'label' => $label,
                'type' => 'image',
                'return_format' => 'url',
                'min_width' => 0,
                'min_height' => 0,
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => 'jpg,jpeg,png,svg',
            ], $params));
    }

    public function text(string $name, string $label, array $params = [])
    {
        $this->setField(
            array_merge([
                'name' => $name,
                'label' => $label,
                'type' => 'text'
            ], $params));
    }

    private function setField(array $params)
    {
        $name = $params['name'];
        unset($params['name']);

        $result = [
            'key' => 'key_' . $this->taxonomy . '_' . $name,
            'label' => $params['label'],
            'name' => 'name_' . $this->taxonomy . '_' . $name,
            'type' => $params['type'],
            'parent' => $this->group,
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ];

        acf_add_local_field(array_merge($result, $params));
    }

    private function setGroup()
    {
        acf_add_local_field_group(array(
            'key' => $this->group,
            'title' => $this->title,
            'location' => [
                [
                    [
                        'param' => $this->type, // Привязка к таксономии
                        'operator' => '==',
                        'value' => $this->taxonomy, // Идентификатор вашей кастомной таксономии
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
    }
}