<?php

namespace App\Controllers;

use App\Config\PostTypeEnum;
use App\RegisterEntity\CustomPostsType;

class AdminSubMenu
{
    private $generalPostType = '';
    private $linkEdit = '';

    public function __construct()
    {
        $this->generalPostType = PostTypeEnum::Products;
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
            $this->getEditLink(PostTypeEnum::Palette)
        );
        add_submenu_page(
            $this->linkEdit,
            'Дополнения',
            'Дополнения',
            'edit_posts',
            $this->getEditLink(PostTypeEnum::Addons)
        );
        add_submenu_page(
            $this->linkEdit,
            'Услуги',
            'Услуги',
            'edit_posts',
            $this->getEditLink(PostTypeEnum::Services)
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
        if ($tax) return "edit-tags.php?taxonomy={$tax}&post_type={$postType}";

        return "edit.php?post_type={$postType}";
    }

    public function removeFromMenu()
    {
        global $submenu;

        // Remove add submenu
        if (isset($submenu[$this->linkEdit])) {
            foreach ($submenu[$this->linkEdit] as $key => $item) {
                if ($item[0] === CustomPostsType::LabelAdd) {
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
            $desiredOrder = [18, 5, 19, 20, 21, 15, 16, 17, 21];

            $sortedMenuItems = [];

            foreach ($desiredOrder as $index) {
                if (array_key_exists($index, $submenu['edit.php?post_type=' . $this->generalPostType])) {
                    $sortedMenuItems[$index] = $submenu['edit.php?post_type=' . $this->generalPostType][$index];
                }
            }
            $submenu['edit.php?post_type=' . $this->generalPostType] = $sortedMenuItems;
        }
    }

    public function sortMenuByName()
    {
        global $submenu;

        $order = [
            "Калькулятор",
            "Продукты",
            "Палтира",
            "Дополнения",
            "Услуги",
            "Категории камня",
            "Категории",
            "Теги",
            "Настройки"
        ];

        $submenuItems = &$submenu['edit.php?post_type=' . $this->generalPostType];

        // Пользовательская функция сравнения
        usort($submenuItems, function ($a, $b) use ($order) {
            $pos_a = array_search($a[0], $order);
            $pos_b = array_search($b[0], $order);

            // Если какой-то из элементов не найден в массиве $order, возвращаем его в конец
            if ($pos_a === false) $pos_a = count($order);
            if ($pos_b === false) $pos_b = count($order);

            return $pos_a - $pos_b;
        });
    }

    public function create()
    {
        $this->addMenuPages();
        $this->removeFromMenu();
        $this->sortMenuByName();
    }

    public function init()
    {
        add_action('admin_menu', [$this, 'create'], 9);
    }
}