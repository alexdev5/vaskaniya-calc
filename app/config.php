<?php
namespace App;

class Config
{
    public static function get(string $name): string
    {
        return self::getList()[$name] ?? '';
    }

    public static function getList(): array
    {
        return [
            'post_type' => 'vaskaniya-calc',
            'addons_post_type' => 'vaskaniya-calc-addons',
            'services_post_type' => 'vaskaniya-calc-services',

            'domain' => 'vascaniya', // for text translate __()
        ];
    }
}
