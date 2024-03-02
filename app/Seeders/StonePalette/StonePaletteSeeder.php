<?php

namespace App\Seeders\StonePalette;

use App\Config;
use App\Seeders\Seeders;

class StonePaletteSeeder extends Seeders
{
    protected $taxonomies = [];

    public function __construct()
    {
        $this->taxonomies = $this->getTaxonomies(
            VS_APP . 'Seeders/StonePalette/Taxonomies'
        );
    }

    public function run()
    {
        $this->createTerms(
            Config::get('taxonomy.categoryStone'),
            $this->taxonomies
        );
    }
}