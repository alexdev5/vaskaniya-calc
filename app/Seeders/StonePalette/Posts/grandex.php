<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';

return [
    [
        'title' => 'Cloudy Mount',
        'content' => '',
        'post_type'    => 'vs-products', // Кастомный тип записей
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [ // Advanced Custom Fields pro
            'vendor_code' => 'A-401',
            'price' => 10,
        ],
        'terms' => [ // Кастомные типы записей
            'vs-brand' => ['grandex'],
            'category-stone' => ['grandex'],
            'price-category' => ['two'],
            'type-inclusions' => ['middle'],
            'cost-filter' => ['medium'],
            'stone-color' => ['beige'],
            'type-sentence' => ['new'],
        ]
    ],
];