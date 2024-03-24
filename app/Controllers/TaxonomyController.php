<?php
namespace App\Controllers;

use WP_Error;

class TaxonomyController {
    public static function getChildTaxonomiesByParentSlug(string $taxonomy, string $parentSlug) {
        $parentTerm = get_term_by('slug', $parentSlug, $taxonomy);

        if (!$parentTerm) {
            return new WP_Error('no_category', 'Родительская категория не найдена', ['status' => 404]);
        }

        // Рекурсивно получаем дочерние категории
        $categories = self::getTermsRecursive($taxonomy, $parentTerm->term_id);

        if (empty($categories)) {
            return new WP_Error('no_categories', 'Дочерние категории не найдены', ['status' => 404]);
        }

        return $categories;
    }

    protected static function getTermsRecursive(string $taxonomy, $parentTermId) {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'parent' => $parentTermId,
            'hide_empty' => false,
        ]);

        $categories = [];

        foreach ($terms as $term) {
            $acf_fields = get_fields('term_' . $term->term_id);
            $childTerms = self::getTermsRecursive($taxonomy, $term->term_id); // Рекурсивный вызов для получения вложенных категорий

            $categories[] = [
                'id' => $term->term_id,
                'name' => $term->name,
                'slug' => $term->slug,
                'description' => $term->description,
                'acf' => $acf_fields,
                'children' => $childTerms, // Добавляем вложенные категории как дочерние элементы
            ];
        }

        return $categories;
    }
}