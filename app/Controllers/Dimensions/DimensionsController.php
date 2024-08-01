<?php

namespace App\Controllers\Dimensions;

use App\Config\TaxonomyEnum;
use App\Controllers\TaxonomyController;
use App\Controllers\Terms\TermsAcfEnum;
use App\Controllers\Terms\TermsController;
use App\Resources\Dimensions\ConfigurationResource;
use App\Resources\Dimensions\TermResource;
use WP_REST_Request;
use WP_REST_Response;

class DimensionsController
{

    public function getAllData(WP_REST_Request $request): WP_REST_Response
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

        $returned = [
            'taxonomy' => TaxonomyEnum::Categories,
            'parent' => TermResource::collection($productTypesTerms['parent']),
            'productTypes' => TermResource::collection($productTypesTerms['terms']),
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

    public function updateTermTitle(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        $result = TermsController::updateById(
            $params['termId'],
            TaxonomyEnum::Categories,
            [
                'acf' => [
                    TermsAcfEnum::BlockTitle => $params['blockTitle'],
                    TermsAcfEnum::BlockNumber => $params['blockNumber'],
                ]
            ],
        );

        // TODO: move to helper `Response::send('success message', 'error message')`
        if (is_wp_error($result)) {
            return new WP_REST_Response(
                [
                    'status' => 'error',
                    'code' => $result->get_error_code(),
                    // TODO: only develop
                    'data' => $result->get_error_data(),
                    'message' => $result->get_error_message(),
                ],
                400
            );
        }

        return new WP_REST_Response(
            [
                'status' => 'success',
                'params' => $params,
                'message' => 'Термін успішно оновлено!',
            ],
            200
        );
    }
}