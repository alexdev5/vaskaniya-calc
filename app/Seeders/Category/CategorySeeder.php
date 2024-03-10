<?php

namespace App\Seeders\Category;

use App\Config;
use App\Seeders\Seeders;

class CategorySeeder extends Seeders
{
    protected $taxonomies = [];

    public function __construct()
    {
        $this->taxonomies = $this->getArrayFromFile('Category/Taxonomies/all-import.php');
    }

    public function run()
    {
        $this->createTerms(
            Config::get('taxonomy.categories'),
            $this->taxonomies
        );
    }
}