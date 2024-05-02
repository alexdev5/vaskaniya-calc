<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Config::get('taxonomy.categoryStone');
$taxonomiesLocal = ['brand-hanex', 'price-category-one', 'cost-cheap'];

return [
    [
        'title' => 'Cubic Milk',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'C-007',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-small']),
        ]
    ],
    [
        'title' => 'Silverstone',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-001',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-small']),
        ]
    ],
    [
        'title' => 'Goldbrown',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-003',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'type-small']),
        ]
    ],
    [
        'title' => 'Mist',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-007',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'Light Brown',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-012',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'type-small']),
        ]
    ],
    [
        'title' => 'Night Light',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-013',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'Silverwhite',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-024',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-small']),
        ]
    ],
    [
        'title' => 'Lightsand',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-025',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-small']),
        ]
    ],
    [
        'title' => 'Marronnier',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-027',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'type-small']),
        ]
    ],
    [
        'title' => 'Blackbeat',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-028',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-black', 'type-small']),
        ]
    ],
    [
        'title' => 'Navajo',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-039',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-small']),
        ]
    ],
    [
        'title' => 'Cheese',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-046',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-small']),
        ]
    ],
    [
        'title' => 'Crystal Mirror',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-048',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-small']),
        ]
    ],
    [
        'title' => 'Nantucket',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-101',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-small']),
        ]
    ],
    [
        'title' => 'Sea Shore',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-102',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'type-small']),
        ]
    ],
    [
        'title' => 'Gravity',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-104',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'Milk Froth',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-211',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-small']),
        ]
    ],
    [
        'title' => 'Summer Sands',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-212',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-small']),
        ]
    ],
    [
        'title' => 'StoneFall',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-213',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-black', 'type-small']),
        ]
    ],
    [
        'title' => 'Dijon Mustard',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-214',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'type-small']),
        ]
    ],
    [
        'title' => 'Black Haze',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-215',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'Cornmeal',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-216',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige-dark', 'type-small']),
        ]
    ],
    [
        'title' => 'Crisp Snow',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-217',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-small']),
        ]
    ],
    [
        'title' => 'Crisp Snow',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'D-218',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['Desire', 'type-small']),
        ]
    ],
    [
        'title' => 'Black',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'M-007',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-black', 'type-plain-color']),
        ]
    ],
    [
        'title' => 'Charcoal Sketch',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'M-009',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'type-plain-color']),
        ]
    ],
    [
        'title' => 'Metal Grey',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'P-002',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'Solaris',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'P-004',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'NightGleam',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'P-005',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-black', 'type-small']),
        ]
    ],
    [
        'title' => 'Brown Eyes',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'P-007',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'type-small']),
        ]
    ],
    [
        'title' => 'Ivory',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'S-004',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-plain-color']),
        ]
    ],
    [
        'title' => 'Gray',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'S-006',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-plain-color']),
        ]
    ],
    [
        'title' => 'N-White',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'S-008',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-plain-color', 'sentence-hot']),
        ]
    ],
    [
        'title' => 'Steel',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'S-022',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'type-plain-color']),
        ]
    ],
    [
        'title' => 'Empire',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'S-108',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'type-plain-color']),
        ]
    ],
    [
        'title' => 'Pure Arctic',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-021',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-white', 'type-small']),
        ]
    ],
    [
        'title' => 'Chestnut',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-025',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-brown', 'type-small']),
        ]
    ],
    [
        'title' => 'Ice Queen',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-050',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'L-Cubic',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-223',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-small']),
        ]
    ],
    [
        'title' => 'Thetis',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-235',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'Haramis',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-510',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-dark-grey', 'type-small']),
        ]
    ],
    [
        'title' => 'Aria',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T-511',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-grey', 'type-small']),
        ]
    ],
];