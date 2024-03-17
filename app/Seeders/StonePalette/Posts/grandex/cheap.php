<?php

$imageDir = VS_ASSETS_PATH . 'images/stone-palette/grandex/';
$categoriesStone = \App\Config::get('taxonomy.categoryStone');
$taxonomiesLocal = ['brand-grandex', 'price-category-one', 'cost-cheap'];

return [
    [
        'title' => 'Poppy Seed',
        'acf' => [
            'vendor_code' => 'D-301',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Morning Coffee',
        'acf' => [
            'vendor_code' => 'D-302',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Raisined Chocolate',
        'acf' => [
            'vendor_code' => 'D-303',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Ice-Cream',
        'acf' => [
            'vendor_code' => 'D-304',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Melted Butter',
        'acf' => [
            'vendor_code' => 'D-305',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Maple Sirup',
        'acf' => [
            'vendor_code' => 'D-306',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Aspen Pie',
        'acf' => [
            'vendor_code' => 'D-307',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Cubic Mint',
        'acf' => [
            'vendor_code' => 'D-308',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Mushroom Soup',
        'acf' => [
            'vendor_code' => 'D-309',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Herbal Ash',
        'acf' => [
            'vendor_code' => 'D-310',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Natural Detox',
        'acf' => [
            'vendor_code' => 'D-311',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Pietra Absorb',
        'acf' => [
            'vendor_code' => 'D-312',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Milky Way',
        'acf' => [
            'vendor_code' => 'D-313',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'sentence-hot']),
        ]
    ],
    [
        'title' => 'Arctic Ice',
        'acf' => [
            'vendor_code' => 'D-314',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Spacemen Food',
        'acf' => [
            'vendor_code' => 'D-315',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Velvet Bean',
        'acf' => [
            'vendor_code' => 'D-318',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Soil',
        'acf' => [
            'vendor_code' => 'D-320',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Chocolate Truffle',
        'acf' => [
            'vendor_code' => 'D-321',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    ///
    [
        'title' => 'Pure Vanilla',
        'acf' => [
            'vendor_code' => 'P-101',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Pure Beige',
        'acf' => [
            'vendor_code' => 'P-102',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Pure White',
        'acf' => [
            'vendor_code' => 'P-104',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'sentence-hot', 'color-white']),
        ]
    ],
    [
        'title' => 'Pure Black',
        'acf' => [
            'vendor_code' => 'P-105',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'color-black']),
        ]
    ],
    [
        'title' => 'Pure Brown',
        'acf' => [
            'vendor_code' => 'P-106',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Pure Red',
        'acf' => [
            'vendor_code' => 'P-107',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Pure Grey',
        'acf' => [
            'vendor_code' => 'P-108',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Light Grey',
        'acf' => [
            'vendor_code' => 'P-109',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Iron',
        'acf' => [
            'vendor_code' => 'P-110',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Natural White',
        'acf' => [
            'vendor_code' => 'P-118',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Whale White',
        'acf' => [
            'vendor_code' => 'P-119',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color', 'sentence-new']),
        ]
    ],
    [
        'title' => 'Deep Sea',
        'acf' => [
            'vendor_code' => 'P-197',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Orange',
        'acf' => [
            'vendor_code' => 'P-199',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-plain-color']),
        ]
    ],
    [
        'title' => 'Dirty Sand',
        'acf' => [
            'vendor_code' => 'S-201',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Peaceful Night',
        'acf' => [
            'vendor_code' => 'S-202',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Sparkling Sand',
        'acf' => [
            'vendor_code' => 'S-203',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Creamy Sand',
        'acf' => [
            'vendor_code' => 'S-204',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Fair Sky',
        'acf' => [
            'vendor_code' => 'S-205',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Wet Sand',
        'acf' => [
            'vendor_code' => 'S-206',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Clear Sky',
        'acf' => [
            'vendor_code' => 'S-207',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Natural Sand',
        'acf' => [
            'vendor_code' => 'S-208',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Light Sand',
        'acf' => [
            'vendor_code' => 'S-209',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small', 'color-beige']),
        ]
    ],
    [
        'title' => 'Hot Sand',
        'acf' => [
            'vendor_code' => 'S-210',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Romantic Night',
        'acf' => [
            'vendor_code' => 'S-211',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Thunder Sky',
        'acf' => [
            'vendor_code' => 'S-212',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Sanded Corn',
        'acf' => [
            'vendor_code' => 'S-213',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Sanded Brown',
        'acf' => [
            'vendor_code' => 'S-214',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Sanded Alps',
        'acf' => [
            'vendor_code' => 'S-215',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Sky Atlas',
        'acf' => [
            'vendor_code' => 'S-216',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Midnight Sky',
        'acf' => [
            'vendor_code' => 'S-217',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Crispy Beige',
        'acf' => [
            'vendor_code' => 'S-218',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Crystal snowflake',
        'acf' => [
            'vendor_code' => 'S-220',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Diamant sky',
        'acf' => [
            'vendor_code' => 'S-222',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Silver Pearl',
        'acf' => [
            'vendor_code' => 'S-223',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
    [
        'title' => 'Tempest Grey',
        'acf' => [
            'vendor_code' => 'S-229',
        ],
        'terms' => [
            $categoriesStone => array_merge($taxonomiesLocal, ['type-small']),
        ]
    ],
];