<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Config\TaxonomyEnum::CategoryStone;
$taxonomiesLocal = ['brand-staron', 'price-category-one'];

return [
    [
        'title' => 'Aspen Brown',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AB-632',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-dark-brown']),
        ]
    ],
    [
        'title' => 'Aspen Glacier',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AG-612',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-white']),
        ]
    ],
    [
        'title' => 'Aspen Gold Rush',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AG-614',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-beige']),
        ]
    ],
    [
        'title' => 'Aspen Grey',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AG-620',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-grey']),
        ]
    ],
    [
        'title' => 'Aspen Mine',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AM-633',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-brown']),
        ]
    ],
    [
        'title' => 'Aspen Misto',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AM-681',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Aspen Pepper',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AP-640',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Aspen Snow',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AS-610',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-white']),
        ]
    ],
    [
        'title' => 'Aspen Seashell',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AS-642',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-beige']),
        ]
    ],
    [
        'title' => 'Aspen Sky',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'AS-670',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'colored']),
        ]
    ],
    [
        'title' => 'Sanded Dark Nebula',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'DN-421',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Sanded Onyx',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'S0-423',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-black']),
        ]
    ],
    [
        'title' => 'Sanded Birch',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SB-412',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-white']),
        ]
    ],
    [
        'title' => 'Sanded Cornmeal',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SC-433',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Sanded Chesnut',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SC-457',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-brown']),
        ]
    ],
    [
        'title' => 'Sanded Grey',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SG-420',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Sanded Goose',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SG-428',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Sanded Gold Dust',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SG-441',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Sanded Icicle',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SI-414',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-white']),
        ]
    ],
    [
        'title' => 'Sanded Cream',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SM-421',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Sanded Mocha',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SM-453',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-brown']),
        ]
    ],
    [
        'title' => 'Sanded Oatmeal',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SO-446',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Sanded Stratus',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SS-418',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Sanded Sahara',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SS-440',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Sanded Vermillion',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SV-430',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Sanded White Pepper',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'WP-410',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Bright White',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'BW-010',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'sentence-hot', 'color-white']),
        ]
    ],
    [
        'title' => 'California Poppy',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SC-052',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'colored']),
        ]
    ],
    [
        'title' => 'Dazzling White',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SD-001',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'color-white']),
        ]
    ],
    [
        'title' => 'Fog',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SF-020',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'color-beige']),
        ]
    ],
    [
        'title' => 'Ivory',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SI-040',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'color-beige']),
        ]
    ],
    [
        'title' => 'Pearl',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SP-011',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'color-white']),
        ]
    ],
    [
        'title' => 'Quasar White',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SQ-019',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'sentence-hot', 'color-white']),
        ]
    ],
    [
        'title' => 'Steel',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-023',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Natural',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SV-041',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'color-beige']),
        ]
    ],
    [
        'title' => 'Tempest Rime',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FR-118',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'color-white']),
        ]
    ],
    [
        'title' => 'Bliss',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'SB-022',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Sanded Tundra',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ST-482',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-dark-grey']),
        ]
    ],
];