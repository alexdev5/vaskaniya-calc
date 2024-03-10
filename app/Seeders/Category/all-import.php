<?php
return [
    [
        'name' => 'Тип изделия',
        'slug' => 'product-type',
        'children' => [
            'countertops' => 'Столешницы',
            'window-sills' => 'Подоконники',
            'bar-counters' => 'Барные стойки',
            'backsplashes' => 'Фартуки',
            'washbasins' => 'Умывальники',
            'art-object' => 'Арт-объект',
        ]
    ],
    [
        'name' => 'Категория продукта',
        'slug' => 'product',
        'children' => [
            'faucets' => 'Смесители',
            'plumbing-accessories' => 'Сантехнические аксессуары',
            'functional-addons' => 'Функциональные дополнения',
        ]
    ],
    [
        'name' => 'Тип монтажа мойки',
        'slug' => 'sink-installation-type',
        'children' => [
            'without-sink' => 'без мойки',
            'integrated' => 'интегрированная',
            'metal-bottom' => 'металическое дно',
            'undermount' => 'подстольный монтаж',
            'drop-in' => 'врезной монтаж',
        ]
    ],
    [
        'name' => 'Конфигурация столешницы',
        'slug' => 'table-configuration',
        'children' => [
            'rectangle' => 'Прямая',
            'g-shaped' => 'Г-образная',
            'p-shaped' => 'П-образная',
            'straight-windowsill' => 'прямая + подоконник',
            'g-shaped-windowsill' => 'Г-образная + подоконник',
            'p-shaped-windowsill' => 'П-образная + подоконник',
            'p-shaped-bar-counter' => 'П-образная + барная стойка',
            'p-shaped-bar-counter-windowsill' => 'П-образная + барная стойка + подоконник',
            'circle' => 'круглая',
        ]
    ]
];