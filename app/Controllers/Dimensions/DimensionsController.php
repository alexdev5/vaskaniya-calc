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

        TermsController::updateById();

        $term_id = $params['termId'] ?? null;
        $title = $params['title'] ?? null;
        $description = $params['description'] ?? null;
        $price = $params['price'] ?? null;

        if (!$term_id) {
            return new WP_REST_Response('Missing term ID', 400);
        }

        $update_result = wp_update_term(
            $term_id,
            Config::get('taxonomy.categoryStone'),
            [
                'name' => $title,
                'description' => $description
            ]);

        if (is_wp_error($update_result)) {
            return new WP_REST_Response($update_result->get_error_message(), 400);
        }

        if ($price !== null) {
            update_field('price', $price, 'term_' . $term_id);
        }

        return new WP_REST_Response("Term updated successfully", 200);
    }
}