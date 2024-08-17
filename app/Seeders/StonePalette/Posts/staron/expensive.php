<?php
$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Services\Taxonomy\TaxonomyEnum::CategoryStone;
$taxonomiesLocal = ['brand-staron', 'cost-expensive'];

return [
    [
        'title' => 'Mosaic Dalmatian',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'QD-212',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-five', 'color-white']),
        ]
    ],
    [
        'title' => 'Mosaic Nimbus',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'QN-287',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-five', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Quarry Minette',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'QM-289',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-five', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Quarry (Talus) Oyster',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'T0-310',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-five', 'color-beige']),
        ]
    ],
    [
        'title' => 'Onyx',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ON-095',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'price-category-one', 'color-black']),
        ]
    ],
    [
        'title' => 'Onyx',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'ON-095',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'price-category-one', 'color-black']),
        ]
    ],
    [
        'title' => 'Beige Granite',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VB-172',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige']),
        ]
    ],
    [
        'title' => 'Cotton White',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VC-110',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-white']),
        ]
    ],
    [
        'title' => 'Cloudbank',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VC-118',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige']),
        ]
    ],
    [
        'title' => 'Concerto',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VC-157',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-brown', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Supreme Dawn',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VD-126',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige']),
        ]
    ],
    [
        'title' => 'Supreme Desert Wind',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VD-173',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige-dark', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Supreme Dandelion',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VD-175',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Supreme Loam',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VL-155',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-brown']),
        ]
    ],
    [
        'title' => 'Supreme Magnolia',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VM-143',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige']),
        ]
    ],
    [
        'title' => 'Supreme Natural Bridge',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VN-144',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Supreme Noir Concrete',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VN-180',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-dark-grey', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Supreme Ocean View',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VO-171',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige']),
        ]
    ],
    [
        'title' => 'Supreme Odyssey',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VO-173',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige-dark', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Supreme Pastoral',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VP-177',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige-dark', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Supreme Rainier',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VR-173',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Supreme Tranquil',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VT-115',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-white', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Supreme Urban Grey',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'VU-127',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-marble-stains', 'price-category-six', 'color-beige']),
        ]
    ],
    [
        'title' => 'Tempest Adamantine',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FA-159',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-brown']),
        ]
    ],
    [
        'title' => 'Tempest Blaze',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FB-147',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-brown']),
        ]
    ],
    [
        'title' => 'Tempest Bronzestar',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FB-154',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-brown']),
        ]
    ],
    [
        'title' => 'Bronzestar',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FB-154',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-brown', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Tempest Coffe Bean',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FC-158',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-brown']),
        ]
    ],
    [
        'title' => 'Tempest Caviar',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FC-188',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Tempest Dapple',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FD-187',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Tempest Dazzle',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FD-191',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-black']),
        ]
    ],
    [
        'title' => 'Tempest Glimmer',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FG-144',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Tempest Genesis',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FG-174',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Tempest Gold Leaf',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FG-196',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-black']),
        ]
    ],
    [
        'title' => 'Tempest Horizon',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FH-114',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-beige']),
        ]
    ],
    [
        'title' => 'Tempest Meteor',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FM-111',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-white']),
        ]
    ],
    [
        'title' => 'Tempest Peak',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FP-100',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-white']),
        ]
    ],
    [
        'title' => 'Tempest Prairie',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FP-142',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Tempest Rattan',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FR-124',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Tempest Shimmer',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FR-148',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Tempest Shell',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FS-115',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-beige-dark']),
        ]
    ],
    [
        'title' => 'Tempest Zenith',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'FZ-184',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-large', 'price-category-six', 'color-dark-grey']),
        ]
    ],
    [
        'title' => 'Quarry Starred',
        'content' => '',
        'post_status' => 'publish',
        'thumbnail' => $imageDir . 'placeholder.png',
        'acf' => [
            'vendor_code' => 'QS-288',
            'price' => 0,
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-middle', 'price-category-five', 'color-dark-grey', 'sentence-new']),
        ]
    ],
];