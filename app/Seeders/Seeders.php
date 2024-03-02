<?php

namespace App\Seeders;

use App\Contracts\SeederContract;
use WP_Error;

abstract class Seeders implements SeederContract
{

    public function createTerms($taxonomyName, $taxonomies)
    {
        if (empty($taxonomies)) {
            new WP_Error('seeder_taxonomy_empty', "seeder_taxonomy_empty");

        }

        foreach ($taxonomies as $key => $data) {
            $slug = $data['slug'];
            $name = $data['name'];

            $parentTermExists = term_exists($name, $taxonomyName);

            if (!$parentTermExists) {
                $parentTerm = wp_insert_term(
                    $name,
                    $taxonomyName,
                    ['slug' => $slug]
                );

                if (is_wp_error($parentTerm)) continue;

                $parentTermId = $parentTerm['term_id'];
            } else {
                $parentTermId = $parentTermExists['term_id'];
            }

            // Добавляем дочерние теги
            foreach ($data['children'] as $childSlug => $childName) {
                if (term_exists($childName, $taxonomyName)) continue;

                wp_insert_term(
                    $childName,
                    $taxonomyName,
                    [
                        'slug' => $childSlug,
                        'parent' => $parentTermId
                    ]
                );
            }
        }
    }

    public function getTaxonomies(string $directory): array
    {
        $files = scandir($directory);
        $taxonomies = [];

        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $path = $directory . '/' . $file;
                $taxonomy = require $path;
                $taxonomies[] = $taxonomy;
            }
        }

        return $taxonomies;
    }

    abstract public function run();
}