<?php

namespace App\RegisterEntity;

use App\Config\DefaultEnum;
use App\Config\PostTypeEnum;
use App\Contracts\TaxonomyContract;

class CustomPostsType implements TaxonomyContract
{
    private $domain = '';
    private $generalPostType = '';
    public const LabelAdd = 'Добавить';

    public function __construct()
    {
        $this->domain = DefaultEnum::Domain;
        $this->generalPostType = PostTypeEnum::Products;
    }

    public function vsProducts()
    {
        $postType = PostTypeEnum::Products;

        $labels = array(
            'name' => __('Vascania Calculator', $this->domain),
            'singular_name' => __('Product', $this->domain),
            'menu_name' => __('VS Calculator', $this->domain),
            'name_admin_bar' => __('Product', $this->domain),
            'add_new' => __(self::LabelAdd, $this->domain),
            'add_new_item' => __('Add New Product', $this->domain),
            'new_item' => __('New Product', $this->domain),
            'edit_item' => __('Редактировать', $this->domain),
            'view_item' => __('View Product', $this->domain),
            'all_items' => __('Продукты', $this->domain),
            'search_items' => __('Search Products', $this->domain),
            'parent_item_colon' => __('Parent Products:', $this->domain),
            'not_found' => __('No Products found.', $this->domain),
            'not_found_in_trash' => __('No Products found in Trash.', $this->domain)
        );

        $args = array(
            'labels' => $labels,
            'description' => __('Description.', $this->domain),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'menu_icon' => 'dashicons-calculator',
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => ['slug' => $postType],
            'has_archive' => false,
            'hierarchical' => false,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt']
        );

        register_post_type($postType, $args);
    }

    public function vsServices()
    {
        $postType = PostTypeEnum::Services;

        $args = array(
            'labels' => [
                'menu_name' => 'Услуги',
            ],
            'description' => __('Description.', $this->domain),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => false,
            'query_var' => true,
            'rewrite' => ['slug' => $postType],
            'has_archive' => false,
            'hierarchical' => false,

            'supports' => ['title', 'editor', 'thumbnail', 'excerpt']
        );

        register_post_type($postType, $args);
    }

    public function vsAddons()
    {
        $postType = PostTypeEnum::Addons;

        $args = array(
            'labels' => [
                'menu_name' => 'Дополнения',
            ],
            'description' => __('Description.', $this->domain),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => false,
            'query_var' => true,
            'rewrite' => ['slug' => $postType],
            'has_archive' => false,
            'hierarchical' => false,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt']
        );

        register_post_type($postType, $args);
    }

    // Палитра камня и номер
    public function vsPalette()
    {
        $postType = PostTypeEnum::Palette;

        $args = array(
            'labels' => [
                'menu_name' => 'Палтира',
            ],
            'description' => __('Description.', $this->domain),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => false,
            'query_var' => true,
            'rewrite' => ['slug' => $postType],
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt']
        );

        register_post_type($postType, $args);

//        $acf = new AcfCreator($postType);
//
//        $acf->text('price', 'Стоимость');
//        $acf->text('vendor_code', 'Артикул');
    }


    public function register()
    {
        $this->vsProducts();
        $this->vsPalette();
        $this->vsAddons();
        $this->vsServices();
    }
}