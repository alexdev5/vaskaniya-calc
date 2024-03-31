<?php

namespace App\Controllers\Dimensions;

use App\Config;
use App\Controllers\TaxonomyController;
use App\Resources\Dimensions\DimensionsResource;
use WP_REST_Request;
use WP_REST_Response;

class DimensionsController
{

    public function getAllData(WP_REST_Request $request): WP_REST_Response
    {
        $returned['product-types'] = DimensionsResource::collection($this->getProductTypeCategories());

        //dd($returned['product-types']);
        //dd($this->getProductTypeCategories());

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
}