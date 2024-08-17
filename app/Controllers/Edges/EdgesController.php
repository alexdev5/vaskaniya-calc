<?php

namespace App\Controllers\Edges;

use App\Services\Response;
use App\Services\Taxonomy\CategoryEnum;
use App\Services\Taxonomy\TaxonomyEnum;
use App\Services\Taxonomy\TaxonomyService;
use WP_REST_Request;
use WP_REST_Response;

class EdgesController
{
    public function edges(WP_REST_Request $request): WP_REST_Response
    {
        $plinthTypes = TaxonomyService::getTermBySlug(TaxonomyEnum::Categories, CategoryEnum::ProductType);
        $tableTopThickness = TaxonomyService::getTermBySlug(TaxonomyEnum::Categories, CategoryEnum::TableTopThickness);
        $frontEdgeViews = [];

        if (is_wp_error($plinthTypes))
            return Response::error($plinthTypes, $plinthTypes->get_error_message());

        return Response::success([
            'taxonomy' => TaxonomyEnum::Categories,
            'plinthTypes' => $plinthTypes,
            'tableThickness' => $tableTopThickness,
            'frontEdgeViews' => $frontEdgeViews,
        ]);
    }
}