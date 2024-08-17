<?php

namespace App\Services\Taxonomy;

use WP_Error;

class TaxonomyService
{
    static function getTermBySlug(string $taxonomy, string $slug)
    {
        $term = get_term_by(
            'slug',
            $slug,
            $taxonomy
        );

        if (!empty($term)) {
            $term->acf = get_fields('term_' . $term->term_id);
        }

        return $term;
    }

    public static function getChildrenByParent(string $taxonomy, $parentTermId)
    {
        if (!$parentTermId) {
            return new WP_Error('no_category', 'Parent category not found', [
                'parentTermId' => $parentTermId
            ]);
        }

        $categories = self::getTermsRecursiveByParentId($taxonomy, $parentTermId);

        if (empty($categories)) {
            return new WP_Error('no_categories', 'Children terms not found', [
                'categories' => $categories
            ]);
        }

        return $categories;
    }

    protected static function getTermsRecursiveByParentId(string $taxonomy, $parentTermId): array
    {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'parent' => $parentTermId,
            'hide_empty' => false,
            'orderby' => 'term_order',
            'order' => 'ASC',
        ]);

        $categories = [];

        foreach ($terms as $term) {
            $acf_fields = get_fields('term_' . $term->term_id);
            $childTerms = self::getTermsRecursiveByParentId($taxonomy, $term->term_id);

            $categories[] = [
                'id' => $term->term_id,
                'name' => $term->name,
                'slug' => $term->slug,
                'description' => $term->description,
                'acf' => $acf_fields,
                'children' => $childTerms,
            ];
        }

        return $categories;
    }
}