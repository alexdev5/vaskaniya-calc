<?php

namespace App\Controllers\Dimensions;

use App\Config;
use App\Controllers\TaxonomyController;
use App\Controllers\Terms\TermsController;
use App\Resources\Dimensions\ConfigurationResource;
use App\Resources\Dimensions\TermResource;
use WP_REST_Request;
use WP_REST_Response;

class DimensionsController
{

    public function getAllData(WP_REST_Request $request): WP_REST_Response
    {
        $productTypes = $this->getProductTypeCategories();
        $configurations = [];

        foreach ($productTypes as $productType) {
            if (!empty($productType['children'])) {
                foreach ($productType['children'] as $child) {
                    $configurations[] = array_merge($child, ['productTypeParentId' => $productType['id']]);
                }
            }
        }

        $returned = [
            'productTypes' => TermResource::collection($productTypes),
            'configurations' => ConfigurationResource::collection($configurations),
        ];

        return new WP_REST_Response(
            $returned,
            200
        );
    }

    // step 1, block 1
    public function getProductTypeCategories(): array
    {
        return TaxonomyController::getChildTaxonomiesByParentSlug(
            Config::get('taxonomy.categories'),
            'product-type'
        );
    }

    /**
     * Update category by ID.
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public function updateTerm(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_body_params();

        TermsController::updateById(
            Config::get('taxonomy.categoryStone'),
            [
                'termId' => $params['termId'],
                'title' => $params['title'],
                'description' => $params['description'],
                'acf' => [
                    'price' => $params['price'],
                ]
            ],
        );

        return new WP_REST_Response("Term updated successfully", 200);
    }
}