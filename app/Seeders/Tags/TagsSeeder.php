<?php

namespace App\Seeders\Tags;

use App\Config;
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
            Config::get('taxonomy.tags'),
            $this->taxonomies
        );
    }
}