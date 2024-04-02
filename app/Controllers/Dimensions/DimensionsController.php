<?php

namespace App\Controllers\Dimensions;

use App\Config;
use App\Controllers\TaxonomyController;
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
            if(!empty($productType['children'])) {
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

    private function productTypeMapper(array $item) {

    }

    private function productTypeChildrenMapper(array $child) {

    }
}