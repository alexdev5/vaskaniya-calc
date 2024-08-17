<?php

namespace App\Seeders\Category;

use App\Seeders\Seeders;
use App\Services\Taxonomy\TaxonomyEnum;

class CategorySeeder extends Seeders
{
    protected $taxonomies = [];

    public function __construct()
    {
        $this->taxonomies = $this->getArrayFromFile('Category/all-import.php');
    }

    public function run()
    {
        $this->createTerms(
            TaxonomyEnum::Categories,
            $this->taxonomies
        );
    }
}