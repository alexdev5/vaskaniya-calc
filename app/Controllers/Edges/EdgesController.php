<?php

namespace App\Controllers\Edges;

use App\Resources\Terms\TermResource;
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
        $plinthType = TaxonomyService::getTermBySlugWithChildren(TaxonomyEnum::Categories, CategoryEnum::TypeOfPlinth);
        $tableTopThickness = TaxonomyService::getTermBySlugWithChildren(TaxonomyEnum::Categories, CategoryEnum::TableTopThickness);

        $frontEdgeViews = [];

        if (is_wp_error($plinthType))
            return Response::error($plinthType, $plinthType->get_error_message());
        if (is_wp_error($tableTopThickness))
            return Response::error($tableTopThickness, $tableTopThickness->get_error_message());

        return Response::success([
            'taxonomy' => TaxonomyEnum::Categories,
            'plinthType' => $plinthType,
            'tableThickness' => TermResource::collection($tableTopThickness),
            'frontEdgeViews' => TermResource::collection($frontEdgeViews),
        ]);
    }
}