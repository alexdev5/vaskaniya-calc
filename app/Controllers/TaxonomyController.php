<?php

namespace App\Controllers;

use WP_Error;

class TaxonomyController
{
    public static function getChildTaxonomiesByParentId(string $taxonomy, $parentTermId)
    {
        if (!$parentTermId) {
            return new WP_Error('no_category', 'Родительская категория не найдена', ['status' => 404]);
        }

        // Рекурсивно получаем дочерние категории
        $categories = self::getTermsRecursive($taxonomy, $parentTermId);

        if (empty($categories)) {
            return new WP_Error('no_categories', 'Children terms not found', ['status' => 404]);
        }

        return $categories;
    }

    public static function getChildTaxonomiesByParentSlug(string $taxonomy, string $parentSlug)
    {
        $parentTerm = get_term_by('slug', $parentSlug, $taxonomy);

        return self::getChildTaxonomiesByParentId($taxonomy, $parentTerm->term_id);
    }

    protected static function getTermsRecursive(string $taxonomy, $parentTermId)
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
            $childTerms = self::getTermsRecursive($taxonomy, $term->term_id);

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