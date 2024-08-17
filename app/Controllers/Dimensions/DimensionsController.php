<?php

namespace App\Controllers\Dimensions;

use App\Config\PostTypeEnum;
use App\Controllers\Terms\TermsController;
use App\Resources\Dimensions\ConfigurationResource;
use App\Resources\Posts\PostResource;
use App\Resources\Terms\TermResource;
use App\Services\Post\Post;
use App\Services\Post\PostAcfEnum;
use App\Services\Response;
use App\Services\Taxonomy\CategoryEnum;
use App\Services\Taxonomy\TaxonomyEnum;
use App\Services\Taxonomy\TaxonomyService;
use Exception;
use WP_REST_Request;
use WP_REST_Response;

class DimensionsController
{

    public function getAll(WP_REST_Request $request): WP_REST_Response
    {
        $parentTerm = TaxonomyService::getTermBySlug(TaxonomyEnum::Categories, CategoryEnum::ProductType);
        $childTerms = TaxonomyService::getChildrenByParent(TaxonomyEnum::Categories, $parentTerm->term_id);

        if (is_wp_error($parentTerm))
            return Response::error($parentTerm, $parentTerm->get_error_message());
        if (is_wp_error($childTerms))
            return Response::error($childTerms, $childTerms->get_error_message());

        $configurations = [];
        $configurationsIds = []; // for filter posts

        foreach ($childTerms as $productType) {
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

        // TODO: Place all data in one array, for sorting by vertical
        // To implement on the client the ability to create additional blocks at the root of the parent taxonomy.

        $returned = [
            'taxonomy' => TaxonomyEnum::Categories,
            'parent' => TermResource::collection($parentTerm),
            'productTypes' => TermResource::collection($childTerms),
            'configurations' => ConfigurationResource::collection($configurations),
            'figures' => PostResource::collection($postsFigure),
        ];

        return new WP_REST_Response(
            $returned,
            200
        );
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

    public function createFigure(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        if (!isset($params['taxonomy'])) return Response::error($params, 'taxonomy empty');
        if (empty($params['taxonomies'])) return Response::error($params, 'taxonomies empty');

        return $this->createOrUpdateFigure($params, null, PostTypeEnum::Products);
    }

    public function updateFigure(WP_REST_Request $request): WP_REST_Response
    {
        $params = $request->get_params();

        if (empty($params['id'])) Response::error($params['id'], 'post Id empty');

        return $this->createOrUpdateFigure($params, $params['id']);
    }

    private function createOrUpdateFigure(
        array  $params,
               $postId = null,
        string $postType = null
    ): WP_REST_Response
    {
        $acf = [];
        $taxonomies = [];
        $args = [
            'id' => $postId,
            'post_title' => $params['title'] ?? 'Product type',
            'post_content' => $params['content'] ?? '',
            'post_status' => $params['status'] ?? 'publish',
        ];

        try {
            if ($postType) $args['post_type'] = $postType;

            if (!empty($params['taxonomies']))
                $taxonomies = [$params['taxonomy'] => $params['taxonomies']];

            if (isset($params[PostAcfEnum::BtnLabel]))
                $acf[PostAcfEnum::BtnLabel] = $params[PostAcfEnum::BtnLabel];
            if (isset($params[PostAcfEnum::Notification]))
                $acf[PostAcfEnum::Notification] = $params[PostAcfEnum::Notification];

            $postId = Post::createOrUpdate(
                $args,
                $taxonomies,
                $acf,
            );

            if (is_wp_error($postId)) {
                return Response::error($postId->get_error_data(), __LINE__ . ':: ' . $postId->get_error_message());
            }
        } catch (Exception $e) {
            return Response::error($e->getTrace(), $e->getMessage());
        }

        return Response::success($postId);
    }
}