<?php

namespace App\Seeders\StonePalette;

use App\Config\PostTypeEnum;
use App\Seeders\Seeders;
use App\Services\Taxonomy\TaxonomyEnum;

class StonePaletteSeeder extends Seeders
{
    protected $taxonomies = [];
    protected $posts = [];

    public function __construct()
    {
        $this->taxonomies = $this->getArrayFromFile('StonePalette/all-taxonomies.php');
        $this->posts = array_merge(
            $this->getArrayFromDirectory('StonePalette/Posts'),
        );
    }

    public function run()
    {
        $this->createTerms(
            TaxonomyEnum::CategoryStone,
            $this->taxonomies
        );

        $this->createPosts(
            PostTypeEnum::Palette,
            $this->posts
        );
    }
}