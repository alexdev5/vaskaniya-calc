<?php

namespace App\Seeders\Tags;

use App\Config;
use App\Seeders\Seeders;

class TagsSeeder extends Seeders
{
    protected $taxonomies = [];

    public function __construct()
    {
        $this->taxonomies = $this->getTaxonomies(
            VS_APP . 'Seeders/Tags/Taxonomies'
        );
    }

    public function run()
    {
        $this->createTerms(
            Config::get('taxonomy.tags'),
            $this->taxonomies
        );
    }
}