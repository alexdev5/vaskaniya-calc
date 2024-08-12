<?php

namespace App\Controllers\Dimensions;

use App\Config\TaxonomyEnum;
use App\Controllers\TaxonomyController;
use App\Controllers\Terms\TermsController;
use App\Resources\Dimensions\ConfigurationResource;
use App\Resources\Dimensions\TermResource;
use WP_REST_Request;
use WP_REST_Response;

class DimensionsController
{

    public function getAll(WP_REST_Request $request): WP_REST_Response
    {
        $productTypesTerms = $this->getProductTypeCategories();

        $configurations = [];

        foreach ($productTypesTerms['terms'] as $productType) {
            if (!empty($productType['children'])) {
                foreach ($productType['children'] as $child) {
                    $configurations[] = array_merge($child, ['productTypeParentId' => $productType['id']]);
                }
            }
        }

        // TODO: Place all data in one array.
        // To implement on the client the ability to create additional blocks at the root of the parent taxonomy.

        $returned = [
            'taxonomy' => TaxonomyEnum::Categories,
            'parent' => TermResource::collection($productTypesTerms['parent']),
            'productTypes' => TermResource::collection($productTypesTerms['terms']),
            'configurations' => ConfigurationResource::collection($configurations),
            'figures' => ConfigurationResource::collection($configurations), // post
        ];

        return new WP_REST_Response(
            $returned,
            200
        );
    }

    // step 1, block 1
    public function getProductTypeCategories(): array
    {
        $parentTerm = get_term_by(
            'slug',
            'product-type',
            TaxonomyEnum::Categories
        );

        if (!empty($parentTerm)) {
            $parentTerm->acf = get_fields('term_' . $parentTerm->term_id);
        }

        // children
        $terms = TaxonomyController::getChildTaxonomiesByParentId(
            TaxonomyEnum::Categories,
            $parentTerm->term_id
        );

        return [
            'terms' => $terms,
            'parent' => $parentTerm,
        ];
    }

    /**
     * Update category by ID.
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public function updateTerm(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        TermsController::updateById(
            $params['termId'],
            TaxonomyEnum::Categories,
            [
                'name' => $params['title'],
                'description' => $params['description'],
                'acf' => [
                    'price' => $params['price'],
                ]
            ],
        );

        return new WP_REST_Response("Term updated successfully", 200);
    }
}