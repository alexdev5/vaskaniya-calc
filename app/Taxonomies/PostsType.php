<?php
namespace App\Taxonomies;

use App\Config;
use App\Contracts\TaxonomyContract;

class PostsType implements TaxonomyContract
{
    private $domain = '';
    private $linkMenu = '';
    private $generalPostType = '';
    public const LabelAdd = 'Добавить';

    public function __construct() {
        $this->domain = Config::get('domain');
        $this->generalPostType = Config::get('post_type.products');
        $this->linkMenu = "edit.php?post_type={$this->generalPostType}";
    }
    
    public function vsProducts()
    {
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
            'rewrite' => ['slug' => $this->generalPostType],
            'has_archive' => false,
            'hierarchical' => false,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt']
        );

        register_post_type($this->generalPostType, $args);
    }

    public function vsServices() {
        $postType = Config::get('post_type.services');

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

    public function vsAddons() {
        $postType = Config::get('post_type.addons');

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
/*    public function vsPalette() {
        $postType = Config::get('post_type.palette');

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
    }*/



    public function register()
    {
        $this->vsProducts();
        //$this->vsPalette();
        $this->vsAddons();
        $this->vsServices();
    }
}