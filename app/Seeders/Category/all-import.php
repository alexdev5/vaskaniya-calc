<?php

use App\Services\Taxonomy\CategoryEnum;

return [
    [
        'term' => 'Тип изделия',
        'slug' => CategoryEnum::ProductType,
        'children' => [
            [
                'term' => 'Столешницы',
                'slug' => 'table-tops',
                'children' => [
                    [
                        'term' => 'Прямая',
                        'slug' => 'rectangle',
                    ],
                    [
                        'term' => 'Г-образная',
                        'slug' => 'g-shaped',
                    ],
                    [
                        'term' => 'П-образная',
                        'slug' => 'p-shaped',
                    ],
                    [
                        'term' => 'прямая + подоконник',
                        'slug' => 'straight-windowsill',
                    ],
                    [
                        'term' => 'Г-образная + подоконник',
                        'slug' => 'g-shaped-windowsill',
                    ],
                    [
                        'term' => 'П-образная + подоконник',
                        'slug' => 'p-shaped-windowsill',
                    ],
                    [
                        'term' => 'П-образная + барная стойка',
                        'slug' => 'p-shaped-bar-counter',
                    ],
                    [
                        'term' => 'П-образная + барная стойка + подоконник',
                        'slug' => 'p-shaped-bar-counter-windowsill',
                    ],
                    [
                        'term' => 'круглая',
                        'slug' => 'circle',
                    ],
                ]
            ],
            [
                'term' => 'Подоконники',
                'slug' => 'window-sills',
                'children' => [
                    [
                        'term' => 'Прямой',
                        'slug' => 'straight',
                    ],
                    [
                        'term' => 'Угловой',
                        'slug' => 'angular',
                    ],
                    [
                        'term' => 'Зеркальный',
                        'slug' => 'mirror',
                    ],
                ]
            ],
            [
                'term' => 'Барные стойки',
                'slug' => 'bar-counters',
                'children' => [
                    [
                        'term' => 'Стойка 1',
                        'slug' => 'bar-counters-1',
                    ],
                    [
                        'term' => 'Стойка 2',
                        'slug' => 'bar-counters-2',
                    ],
                    [
                        'term' => 'Стойка 3',
                        'slug' => 'bar-counters-3',
                    ],
                ]
            ],
            [
                'term' => 'Фартуки',
                'slug' => 'backsplashes',
                'children' => [
                    [
                        'term' => 'Фартук 1',
                        'slug' => 'backsplashes-1',
                    ],
                    [
                        'term' => 'Фартук 2',
                        'slug' => 'backsplashes-2',
                    ],
                    [
                        'term' => 'Фартук 3',
                        'slug' => 'backsplashes-3',
                    ],
                ]
            ],
            [
                'term' => 'Умывальники',
                'slug' => 'washbasins',
                'children' => [
                    [
                        'term' => 'Умывальник 1',
                        'slug' => 'washbasins-1',
                    ],
                    [
                        'term' => 'Умывальник 2',
                        'slug' => 'washbasins-2',
                    ],
                    [
                        'term' => 'Умывальник 3',
                        'slug' => 'washbasins-3',
                    ],
                ]
            ],
            [
                'term' => 'Арт-объект',
                'slug' => 'art-object',
            ],
        ]
    ],
    [
        'term' => 'Тип плинтуса',
        'slug' => CategoryEnum::TypeOfPlinth,
        'children' => [
            [
                'term' => 'Без плинтуса',
                'slug' => 'without-plinth',
            ],
            [
                'term' => 'M-701 Hazel Flow',
                'slug' => 'm-701-hazel-flow',
            ],
            [
                'term' => 'M-702 Hazel Flow',
                'slug' => 'm-702-hazel-flow',
            ],
            [
                'term' => 'M-703 Hazel Flow',
                'slug' => 'm-703-hazel-flow',
            ],
            [
                'term' => 'M-704 Hazel Flow',
                'slug' => 'm-704-hazel-flow',
            ],
            [
                'term' => 'M-705 Hazel Flow',
                'slug' => 'm-705-hazel-flow',
            ],
        ]
    ],
    [
        'term' => 'Толщина столешницы',
        'slug' => CategoryEnum::TableTopThickness,
        'children' => [
            [
                'term' => '12мм',
                'slug' => 'thickness-12mm',
            ],
            [
                'term' => '24мм',
                'slug' => 'thickness-24mm',
            ],
            [
                'term' => '40мм',
                'slug' => 'thickness-40mm',
            ],
        ]
    ],
    [
        'term' => 'Категория продукта',
        'slug' => CategoryEnum::Product,
        'children' => [
            [
                'term' => 'Смесители',
                'slug' => 'faucets',
            ],
            [
                'term' => 'Сантехнические аксессуары',
                'slug' => 'plumbing-accessories',
            ],
            [
                'term' => 'Функциональные дополнения',
                'slug' => 'functional-addons',
            ],
        ]
    ],
    [
        'term' => 'Тип монтажа мойки',
        'slug' => CategoryEnum::SinkInstallationType,
        'children' => [
            [
                'term' => 'без мойки',
                'slug' => 'without-sink',
            ],
            [
                'term' => 'интегрированная',
                'slug' => 'integrated',
            ],
            [
                'term' => 'металическое дно',
                'slug' => 'metal-bottom',
            ],
            [
                'term' => 'подстольный монтаж',
                'slug' => 'undermount',
            ],
            [
                'term' => 'врезной монтаж',
                'slug' => 'drop-in',
            ],
        ]
    ],
];