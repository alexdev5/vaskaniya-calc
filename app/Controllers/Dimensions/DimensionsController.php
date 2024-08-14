<?php

namespace App\Controllers\Dimensions;

use App\Config\PostTypeEnum;
use App\Config\TaxonomyEnum;
use App\Controllers\TaxonomyController;
use App\Controllers\Terms\TermsController;
use App\Resources\Dimensions\ConfigurationResource;
use App\Resources\Posts\PostResource;
use App\Resources\Terms\TermResource;
use App\Services\Post\Post;
use App\Services\Post\PostAcfEnum;
use App\Services\Response;
use WP_REST_Request;
use WP_REST_Response;

class DimensionsController
{

    public function getAll(WP_REST_Request $request): WP_REST_Response
    {
        $productTypesTerms = $this->getProductTypeCategories();

        $configurations = [];
        $configurationsIds = []; // for filter posts

        foreach ($productTypesTerms['terms'] as $productType) {
            if (!empty($productType['children'])) {
                foreach ($productType['children'] as $child) {
                    $configurations[] = array_merge($child, ['productTypeParentId' => $productType['id']]);
                }
            }
        }

        foreach ($configurations as $configuration) {
            $configurationsIds[] = $configuration['id'];
        }

        $postsFigure = Post::getPosts(PostTypeEnum::Products, [
            TaxonomyEnum::Categories => $configurationsIds
        ]);

        // TODO: Place all data in one array.
        // To implement on the client the ability to create additional blocks at the root of the parent taxonomy.

        $returned = [
            'taxonomy' => TaxonomyEnum::Categories,
            'parent' => TermResource::collection($productTypesTerms['parent']),
            'productTypes' => TermResource::collection($productTypesTerms['terms']),
            'configurations' => ConfigurationResource::collection($configurations),
            'figures' => PostResource::collection($postsFigure),

            // TODO: remove
            'terms' => $productTypesTerms['terms'],
            'originalFigure' => $postsFigure,
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

    public function changeFigure(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();
        $postType = PostTypeEnum::Products;
        $acf = [];

        if (!isset($params['taxonomy'])) Response::error(null, 'taxonomy empty');

        if (isset($params['btnLabel'])) $acf[PostAcfEnum::BtnLabel] = $params['btnLabel'];
        if (isset($params['description'])) $acf[PostAcfEnum::Description] = $params['description'];

        $postId = Post::createOrUpdate(
            [
                'id' => $params['id'] ?? null,
                'post_title' => $params['title'] ?? 'Product type',
                'post_content' => $params['content'] ?? '',
                'post_status' => $params['status'] ?? 'publish',
                'post_type' => $postType,
            ],
            [$params['taxonomy'] => $params['taxonomies']],
            $acf,
        );

        if (is_wp_error($postId)) {
            return Response::error($postId->get_error_data(), __LINE__ . ':: ' . $postId->get_error_message());
        }

        return Response::success($postId);
    }
}