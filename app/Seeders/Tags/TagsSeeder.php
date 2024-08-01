<?php

namespace App\Seeders\Tags;

use App\Config\TaxonomyEnum;
use App\Seeders\Seeders;

class TagsSeeder extends Seeders
{
    protected $taxonomies = [];

    public function __construct()
    {
        $this->taxonomies = $this->getArrayFromFile('Tags/all-import.php');
    }

    public function run()
    {
        $this->createTerms(
            TaxonomyEnum::Tags,
            $this->taxonomies
        );
    }
}