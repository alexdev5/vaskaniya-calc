<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Config\TaxonomyEnum::CategoryStone;
$taxonomiesLocal = ['brand-hanex', 'cost-expensive'];

return [
    [
        'title' => 'Wild Fire',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'B-039',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Kashmere',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'BL-201',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Sedimentary',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'BL-205',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Slate Grey',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'BL-206',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Macassar',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'BL-209',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Marfim',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'BL-219',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Mountain Frost',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'BL-256',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Cascade Ice',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'CC-001',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'price-category-six', 'type-marble-stains']),
        ]
    ],
    [
        'title' => 'Cascade Cream',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'CC-002',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'price-category-six', 'type-marble-stains']),
        ]
    ],
    [
        'title' => 'Cascade Gray',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'CC-003',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'price-category-six', 'type-marble-stains']),
        ]
    ],
    [
        'title' => 'Cascade Beige',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'CC-004',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-six', 'type-marble-stains']),
        ]
    ],
    [
        'title' => 'Cascade White',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'CC-005',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'price-category-six', 'type-marble-stains']),
        ]
    ],
    [
        'title' => 'Cascade Black',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'CC-006',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-black', 'price-category-six', 'type-marble-stains']),
        ]
    ],
    [
        'title' => 'Omega',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'GAD-003',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'price-category-ten']),
        ]
    ],
    [
        'title' => 'Juno',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'GAD-007',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'price-category-ten']),
        ]
    ],
    [
        'title' => 'Gaia',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'GAD-020',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'price-category-ten']),
        ]
    ],
    [
        'title' => 'Aftersnow',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'GAM-001',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'price-category-ten']),
        ]
    ],
    [
        'title' => 'Sandflower',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'GAM-004',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'price-category-ten']),
        ]
    ],
    [
        'title' => 'Clara',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-101',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Marelinho',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-102',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Nublado',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-103',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Ardosia',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-104',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Moreno',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-105',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Grenicio',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-106',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Romano',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-201',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Marron',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-204',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Caramel Drizzle',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-205',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Bianco Classico',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-302',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Volare',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-303',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Venato Sparkle',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VM-001',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-marble-stains', 'price-category-six']),
        ]
    ],
    [
        'title' => 'Venato Snow',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VM-002',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-marble-stains', 'price-category-six']),
        ]
    ],
];