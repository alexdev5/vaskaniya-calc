<?php
namespace App;

class Config
{
    public static function get(string $name): string
    {
        $keys = explode('.', $name);
        $value = '';

        foreach ($keys as $key) {
            if($value) $value = $value[$key];
            else $value = self::getList()[$key] ?? '';
        }

        return $value;
    }

    public static function getList(): array
    {
        return [
            'title' => 'VS Calculator',
            'post_type' => [
              'products' => 'vs-products',
              'palette' => 'vs-products-palette', // палитра
              'addons' => 'vs-products-addons',
              'services' => 'vs-products-services',
            ],
            'taxonomy' => [
                'tags' => 'vs-products-tags',
                'categories' => 'vs-products-categories',
                'categoryStone' => 'vs-products-category-stone',
            ],
            'domain' => 'vs', // for text translate __()
        ];
    }
}

//18, 5, 19, 20, 15, 16, 17, 21