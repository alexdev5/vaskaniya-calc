<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Config::get('taxonomy.categoryStone');
$taxonomiesLocal = ['brand-grandex', 'price-category-two', 'cost-medium', ];

return [
    [
        'title' => 'Cloudy Mount',
        'content' => '',
        'post_status'  => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'A-401',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-middle']),
        ]
    ],
    [
        'title' => 'Blue Dream',
        'content' => '',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-402',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Asphalt Material',
        'content' => '',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-403',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Arctic Air',
        'content' => '',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-404',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Peach Fruit',
        'content' => '',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-405',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['color-beige', 'type-middle']),
        ]
    ],
    [
        'title' => 'Space Galaxy',
        'content' => '',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-406',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Grand Canyon',
        'content' => '',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-407',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Cacao Tree',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-408',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'South Coast',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-409',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-beige']),
        ]
    ],
    [
        'title' => 'Cotton Wool',
        'post_status'  => 'publish',
        'acf' => [
            'vendor_code' => 'A-410',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Precious Stone',
        'acf' => [
            'vendor_code' => 'A-411',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Citron Blossom',
        'acf' => [
            'vendor_code' => 'A-412',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Milky Way',
        'acf' => [
            'vendor_code' => 'A-413',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'sentence-hot']),
        ]
    ],
    [
        'title' => 'Historical Spot',
        'acf' => [
            'vendor_code' => 'A-414',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Endless Desert',
        'acf' => [
            'vendor_code' => 'A-415',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Visible Horizon',
        'acf' => [
            'vendor_code' => 'A-416',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Global Cruise',
        'acf' => [
            'vendor_code' => 'A-417',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Oak Wood',
        'acf' => [
            'vendor_code' => 'A-418',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-dark-brown']),
        ]
    ],
    [
        'title' => 'Cromium Atom',
        'acf' => [
            'vendor_code' => 'A-419',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'color-dark-brown']),
        ]
    ],
    [
        'title' => 'Starry Beat',
        'acf' => [
            'vendor_code' => 'A-420',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Coal Mine',
        'acf' => [
            'vendor_code' => 'A-421',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Snow Pile',
        'acf' => [
            'vendor_code' => 'A-422',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Industrial Draft',
        'acf' => [
            'vendor_code' => 'A-423',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Loft Design',
        'acf' => [
            'vendor_code' => 'A-424',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Urban Project',
        'acf' => [
            'vendor_code' => 'A-425',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle']),
        ]
    ],
    [
        'title' => 'Onyx gravel',
        'acf' => [
            'vendor_code' => 'A-426',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Primo',
        'acf' => [
            'vendor_code' => 'A-427',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Andes',
        'acf' => [
            'vendor_code' => 'A-428',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Conrete Quartz',
        'acf' => [
            'vendor_code' => 'A-429',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'sentence-new']),
        ]
    ],
];