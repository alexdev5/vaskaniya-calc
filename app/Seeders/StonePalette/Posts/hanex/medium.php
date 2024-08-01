<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Config\TaxonomyEnum::CategoryStone;
$taxonomiesLocal = ['brand-hanex', 'cost-medium'];

return [
    [
        'title' => 'Modern Concrete',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'CT-002',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'price-category-four']),
        ]
    ],
    [
        'title' => 'Smoky Concrete',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'CT-003',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'price-category-four']),
        ]
    ],
    [
        'title' => 'Organic Cotton',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-071',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Vocalise',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-089',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'price-category-two', 'type-middle']),
        ]
    ],


    [
        'title' => 'Hidden Glen',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-102',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Quartz Grey',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-105',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Charles Rose',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-206',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Rebeca',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-210',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Unicon',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-212',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'L-Beauty',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-218',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'L-Blanc',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-219',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'L-Mocha',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-222',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Charites',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-233',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Brutus',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-234',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Ice Cube',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-237',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Colombia',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-238',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Stone Grey',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-239',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Dark Knight',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-240',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Brown Cookie',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-243',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Ice Pice',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-411',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Serenity',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-412',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'H-Sand',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-507',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'price-category-two', 'type-middle']),
        ]
    ],
    [
        'title' => 'Harvest',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-509',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'price-category-two', 'type-middle']),
        ]
    ],
];