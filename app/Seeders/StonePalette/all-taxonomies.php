<?php

use App\Services\Taxonomy\StonePaletteEnum;

return [
    [
        'term' => 'Тон камня',
        'slug' => StonePaletteEnum::StoneColor,
        'children' => [
            [
                'term' => 'Белый',
                'description' => '',
                'slug' => 'color-white'
            ],
            [
                'term' => 'Коричневый',
                'slug' => 'color-brown'
            ],
            [
                'term' => 'Темно коричневый',
                'slug' => 'color-dark-brown'
            ],
            [
                'term' => 'Светло-коричневый',
                'slug' => 'color-light-brown'
            ],
            [
                'term' => 'Серый',
                'slug' => 'color-grey'
            ],
            [
                'term' => 'Темно-серый',
                'slug' => 'color-dark-grey',
            ],
            [
                'term' => 'Молочный',
                'slug' => 'color-lactic'
            ],
            [
                'term' => 'Бежевый',
                'slug' => 'color-beige',
            ],
            [
                'term' => 'Темно-бежевый',
                'slug' => 'color-beige-dark',
            ],
            [
                'term' => 'Черный',
                'slug' => 'color-black',
            ],
            [
                'term' => 'Цветные',
                'slug' => 'colored',
            ],
        ]
    ],
    [
        'term' => 'Фильтр стоимости',
        'slug' => StonePaletteEnum::CostFilter,
        'children' => [
            [
                'term' => 'Дешевые',
                'slug' => 'cost-cheap',
            ],
            [
                'term' => 'Средние',
                'slug' => 'cost-medium',
            ],
            [
                'term' => 'Дорогие',
                'slug' => 'cost-expensive',
            ],
        ]
    ],
    [
        'term' => 'Ценовая категория',
        'slug' => StonePaletteEnum::PriceCategory,
        'children' => [
            [
                'term' => '1 категория',
                'slug' => 'price-category-one',
            ],
            [
                'term' => '2 категория',
                'slug' => 'price-category-two',
            ],
            [
                'term' => '3 категория',
                'slug' => 'price-category-three',
            ],
            [
                'term' => '4 категория',
                'slug' => 'price-category-four',
            ],
            [
                'term' => '5 категория',
                'slug' => 'price-category-five',
            ],
            [
                'term' => '6 категория',
                'slug' => 'price-category-six',
            ],
            [
                'term' => '7 категория',
                'slug' => 'price-category-seven',
            ],
            [
                'term' => '8 категория',
                'slug' => 'price-category-eight',
            ],
            [
                'term' => '9 категория',
                'slug' => 'price-category-nine',
            ],
            [
                'term' => '10 категория',
                'slug' => 'price-category-ten',
            ],
        ]
    ],
    [
        'term' => 'Бренд',
        'slug' => StonePaletteEnum::StoneBrand,
        'children' => [
            [
                'term' => 'Grandex',
                'slug' => 'brand-grandex',
            ],
            [
                'term' => 'Hanex',
                'slug' => 'brand-hanex',
            ],
            [
                'term' => 'Neomarm',
                'slug' => 'brand-neomarm',
            ],
            [
                'term' => 'Staron',
                'slug' => 'brand-staron',
            ],
            [
                'term' => 'Hi-Macs',
                'slug' => 'brand-hi-Macs',
            ],
        ]
    ],
    [
        'term' => 'Категория камня',
        'slug' => StonePaletteEnum::StoneCategory,
        'children' => [
            [
                'term' => 'N',
                'slug' => 'category-N',
            ],
            [
                'term' => 'N100',
                'slug' => 'category-n100',
            ],
            [
                'term' => 'N200',
                'slug' => 'category-n200',
            ],
            [
                'term' => 'PSD',
                'slug' => 'category-psd',
            ],
            [
                'term' => 'A',
                'slug' => 'category-a',
            ],
            [
                'term' => 'EJMС',
                'slug' => 'category-ejmc',
            ],
            [
                'term' => 'Solo',
                'slug' => 'category-solo',
            ],
            [
                'term' => 'Duo',
                'slug' => 'category-duo',
            ],
            [
                'term' => 'Trio',
                'slug' => 'category-trio',
            ],
            [
                'term' => 'Concrete',
                'slug' => 'category-concrete',
            ],
            [
                'term' => 'Galleria',
                'slug' => 'category-galleria',
            ],
            [
                'term' => 'Cancade',
                'slug' => 'category-cancade',
            ],
            [
                'term' => 'Stratum',
                'slug' => 'category-stratum',
            ],
            [
                'term' => 'Bellasimo',
                'slug' => 'category-bellasimo',
            ],
            [
                'term' => 'Solid',
                'slug' => 'category-solid',
            ],
            [
                'term' => 'Sanded',
                'slug' => 'category-sanded',
            ],
            [
                'term' => 'Aspen',
                'slug' => 'category-aspen',
            ],
            [
                'term' => 'Metallic',
                'slug' => 'category-metallic',
            ],
            [
                'term' => 'Pebble',
                'slug' => 'category-pebble',
            ],
            [
                'term' => 'Quarry',
                'slug' => 'category-quarry',
            ],
            [
                'term' => 'Mosaic',
                'slug' => 'category-mosaic',
            ],
            [
                'term' => 'Tempest',
                'slug' => 'category-tempest',
            ],
            [
                'term' => 'Supreme',
                'slug' => 'category-supreme',
            ],
            [
                'term' => 'Sand',
                'slug' => 'category-sand',
            ],
            [
                'term' => 'Pearl',
                'slug' => 'category-pearl',
            ],
            [
                'term' => 'Granite',
                'slug' => 'category-granite',
            ],
            [
                'term' => 'Volcanics',
                'slug' => 'category-volcanics',
            ],
            [
                'term' => 'Lucia',
                'slug' => 'category-lucia',
            ],
            [
                'term' => 'Marmo',
                'slug' => 'category-marmo',
            ],
            [
                'term' => 'Calacatta',
                'slug' => 'category-calacatta',
            ],
            [
                'term' => 'Luna',
                'slug' => 'category-luna',
            ],
        ]
    ],
    [
        'term' => 'Тип вкраплений',
        'slug' => StonePaletteEnum::TypeInclusions,
        'description' => 'Текстура',
        'children' => [
            [
                'term' => 'Однотонные цвета',
                'slug' => 'type-plain-color',
            ],
            [
                'term' => 'Мелкие вкрапления',
                'slug' => 'type-small',
            ],
            [
                'term' => 'Средние вкрапления',
                'slug' => 'type-middle',
            ],
            [
                'term' => 'Крупные вкрапления',
                'slug' => 'type-large',
            ],
            [
                'term' => 'Мраморные разводы',
                'slug' => 'type-marble-stains',
            ],
        ]
    ],
    [
        'term' => 'Тип предложения',
        'slug' => StonePaletteEnum::TypeSentence,
        'children' => [
            [
                'term' => 'Новые',
                'slug' => 'sentence-new',
            ],
            [
                'term' => 'Горячие',
                'slug' => 'sentence-hot',
            ],
            [
                'term' => 'Распродажа',
                'slug' => 'sentence-sale',
            ],
        ]
    ]
];