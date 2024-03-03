<?php

namespace App\Controllers;

use App\Config;
use App\Controllers\Taxonomy\PostsType;

class AdminSubMenu
{
    private $generalPostType = '';
    private $linkEdit = '';

    public function __construct()
    {
        $this->generalPostType = Config::get('post_type.products');
        $this->linkEdit = "edit.php?post_type={$this->generalPostType}";
    }

    public function addMenuPages()
    {
        add_submenu_page(
            $this->linkEdit,
            'Калькулятор',
            'Калькулятор',
            'edit_posts',
            'vs-products-page-calc',
            function () {
                echo vs_view('admin/calculator-page');
            }
        );
        add_submenu_page(
            $this->linkEdit,
            'Палтира',
            'Палтира',
            'edit_posts',
            $this->getEditLink(Config::get('post_type.palette'))
        );
        add_submenu_page(
            $this->linkEdit,
            'Дополнения',
            'Дополнения',
            'edit_posts',
            $this->getEditLink(Config::get('post_type.addons'))
        );
        add_submenu_page(
            $this->linkEdit,
            'Услуги',
            'Услуги',
            'edit_posts',
            $this->getEditLink(Config::get('post_type.services'))
        );
        add_submenu_page(
            $this->linkEdit,
            'Настройки',
            'Настройки',
            'edit_posts',
            'vs-products-page-setting',
            function () {
                echo vs_view('admin/settings-page');
            }
        );

    }

    public function getEditLink($postType, $tax = ''): string
    {
        if($tax) return "edit-tags.php?taxonomy={$tax}&post_type={$postType}";

        return "edit.php?post_type={$postType}";
    }

    public function removeFromMenu()
    {
        global $submenu;

        // Remove add submenu
        if (isset($submenu[$this->linkEdit])) {
            foreach ($submenu[$this->linkEdit] as $key => $item) {
                if ($item[0] === PostsType::LabelAdd) {
                    unset($submenu[$this->linkEdit][$key]);
                }
            }
        }
    }

    public function sortMenu()
    {
        global $submenu;

        if (isset($submenu['edit.php?post_type=' . $this->generalPostType])) {
            /*$menu_items = [
                18 => ["Калькулятор"],
                5 => ["Продукты"],
                19 => ["Палтира"],
                20 => ["Дополнения"],
                21 => ["Услуги"],
                15 => ["Категории камня"],
                16 => ["Категории"],
                17 => ["Теги"],
                22 => ["Настройки"],
            ];*/
            $desired_order = [18, 5, 19, 20, 21, 15, 16, 17, 21];

            $sorted_menu_items = [];

            foreach ($desired_order as $index) {
                if (array_key_exists($index, $submenu['edit.php?post_type=' . $this->generalPostType])) {
                    $sorted_menu_items[$index] = $submenu['edit.php?post_type=' . $this->generalPostType][$index];
                }
            }
            $submenu['edit.php?post_type=' . $this->generalPostType] = $sorted_menu_items;
        }
    }

    public function create()
    {
        $this->addMenuPages();
        $this->removeFromMenu();
        $this->sortMenu();
    }

    public function init()
    {
        add_action('admin_menu', [$this, 'create'], 9);
    }
}