<?php
namespace App\Controllers\Admin;

use App\Config;

class PostTypeController
{
    public function vascaniyaCalc() {
        $postType = Config::get('post_type');
        $domain = Config::get('domain');

        $labels = array(
            'name'               => __( 'Vascania Calculator', $domain ),
            'singular_name'      => __( 'Product', $domain ),
            'menu_name'          => __( 'VS Calculator', $domain ),
            'name_admin_bar'     => __( 'Product', $domain ),
            'add_new'            => __( 'Добавить', $domain ),
            'add_new_item'       => __( 'Add New Product', $domain ),
            'new_item'           => __( 'New Product', $domain ),
            'edit_item'          => __( 'Редактировать', $domain ),
            'view_item'          => __( 'View Product', $domain ),
            'all_items'          => __( 'Продукты', $domain ),
            'search_items'       => __( 'Search Products', $domain ),
            'parent_item_colon'  => __( 'Parent Products:', $domain ),
            'not_found'          => __( 'No Products found.', $domain ),
            'not_found_in_trash' => __( 'No Products found in Trash.', $domain )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', Config::get('domain') ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'menu_icon'          => 'dashicons-calculator',
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $postType ),
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

        register_post_type( $postType, $args );
    }
    public function init() {
        add_action('init', [$this, 'vascaniyaCalc']);
    }
}