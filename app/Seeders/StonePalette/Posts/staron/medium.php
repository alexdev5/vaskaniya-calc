<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Services\Taxonomy\TaxonomyEnum::CategoryStone;
$taxonomiesLocal = ['brand-staron', 'price-category-two', 'cost-medium'];

return [
    [
        'title' => 'Metallic Beach',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'EB-545',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Metallic Cosmos',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'EC-596',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-black']),
        ]
    ],
    [
        'title' => 'Metallic Galaxy',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'EG-595',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-black']),
        ]
    ],
    [
        'title' => 'Metallic Yukon',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'EY-510',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Pebble Aqua',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PA-860',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'colored']),
        ]
    ],
    [
        'title' => 'Pebble Blue',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PB-870',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'colored']),
        ]
    ],
    [
        'title' => 'Pebble Ebony',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PE-814',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-black']),
        ]
    ],
    [
        'title' => 'Pebble Grey',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PG-810',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Pebble Gold',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PG-840',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Pebble Ice',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PI-811',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-white']),
        ]
    ],
    [
        'title' => 'Pebble Kernel',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PK-843',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Pebble Ponderosa',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PP-868',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'colored']),
        ]
    ],
    [
        'title' => 'Pebble Rose',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PR-850',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'colored']),
        ]
    ],
    [
        'title' => 'Pebble Swan',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PS-813',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-white']),
        ]
    ],
    [
        'title' => 'Pebble Saratoga',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PS-820',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-beige']),
        ]
    ],
    [
        'title' => 'Pebble Terrian',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'PT-857',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-brown']),
        ]
    ],
    [
        'title' => 'Metallic Sleeksilver',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ES-582',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-dark-grey', 'sentence-new']),
        ]
    ],
];