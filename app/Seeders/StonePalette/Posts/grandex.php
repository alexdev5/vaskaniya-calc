<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Config::get('taxonomy.categoryStone');

return [
    [
        'title' => 'Cloudy Mount',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'A-401',
            'price' => 10,
        ],
        'terms' => [
            $categoriesStone => [
                'brand-grandex',
                'color-beige',
                'price-two',
                'type-middle',
                'cost-medium',
                'sentence-new',
            ],
        ]
    ],
];