<?php
namespace app\Seeders;

use App\Config;

class TagsSeeder
{
    public $name = 'Теги';

    public static function getTypeSentence(): array
    {
        return [
            'slug' => 'type-sentence',
            'name' => 'Типы предложений',
            'children' => [
                'new' => 'Новые',
                'hot' => 'Горячие',
                'sale' => 'Распродажа',
            ]
        ];
    }

    public static function getTexture(): array
    {
        return [
            'slug' => 'texture',
            'name' => 'Текстура',
            'children' => [
                'solid-colors' => 'Однотонные цвета',
                'small-inclusions' => 'Мелкие вкрапления',
                'medium-inclusions' => 'Средние вкрапления',
                'large-inclusions' => 'Крупные вкрапления',
                'marble-stains' => 'Мраморные пятна',
            ]
        ];
    }

    public static function getStoneColor(): array
    {
        return [
            'name' => 'Тон камня',
            'children' => [
                'white' => 'Белый',
                'brown' => 'Коричневый',
                'light-brown' => 'Светло-коричневый',
                'grey' => 'Серый',
                'lactic' => 'Молочный',
                'dark-brown' => 'Темно коричневый',
                'beige' => 'Бежевый',
                'dark-grey' => 'Темно-серый',
                'black' => 'Черный',
            ]
        ];
    }

    public static function getPlumbingAccessories(): array
    {
        return [
            'name' => 'Цвет сантехнических аксессуаров',
            'children' => [
                'white' => 'Белый',
                'brown' => 'Коричневый',
                'light-brown' => 'Светло-коричневый',
                'grey' => 'Серый',
                'dark-grey' => 'Темно-серый',
            ]
        ];
    }

    public static function all(): array
    {
        return [
            'type-sentence' => self::getTypeSentence(),
            'texture' => self::getTexture(),
            'stone-color' => self::getStoneColor(),
            'plumbing-accessories-color' => self::getPlumbingAccessories(),
        ];
    }

    public static function create($taxonomy, $tags)
    {
        foreach ($tags as $slug => $data) {
            $parent_term_exists = term_exists($data['name'], $taxonomy);

            if (!$parent_term_exists) {
                $parent_term = wp_insert_term(
                    $data['name'],
                    $taxonomy,
                    ['slug' => $slug]
                );

                if (is_wp_error($parent_term)) continue;

                $parent_term_id = $parent_term['term_id'];
            } else {
                $parent_term_id = $parent_term_exists['term_id'];
            }

            // Добавляем дочерние теги
            foreach ($data['children'] as $child_slug => $child_name) {
                if(term_exists($child_name, $taxonomy)) continue;

                wp_insert_term(
                    $child_name,
                    $taxonomy,
                    [
                        'slug' => $child_slug,
                        'parent' => $parent_term_id
                    ]
                );
            }
        }
    }

    public static function run() {
        self::create(
            Config::get('taxonomy.tags'),
            self::all()
        );
    }
}