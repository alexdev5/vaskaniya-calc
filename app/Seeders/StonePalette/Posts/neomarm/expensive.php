<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Services\Taxonomy\TaxonomyEnum::CategoryStone;
$taxonomiesLocal = ['brand-neomarm', 'price-category-nine', 'cost-expensive'];

return [
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-201',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-202',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-203',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-205',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-206',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'sentence-new']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-207',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-208',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-209',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'sentence-new']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-220',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-221',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'sentence-new']),
        ]
    ],
    [
        'title' => '',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'NM-222',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'sentence-new']),
        ]
    ],
];