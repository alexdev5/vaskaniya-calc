<?php
namespace App\Controllers\Seeders;

class TagsSeeder
{
    public $name = 'Теги';

    public static function getTypeSentence(): array
    {
        return [
            'name' => 'типы предложений',
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
            'name' => 'текстура',
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
        ];
    }

    public static function all(): array
    {
        return [
            self::getTypeSentence(),
            self::getTexture(),
            self::getStoneColor(),
        ];
    }
}