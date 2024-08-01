<?php

namespace App\Seeders\StonePalette;

use App\Config\PostTypeEnum;
use App\Config\TaxonomyEnum;
use App\Seeders\Seeders;

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

//       $this->assignTermsToPost(
//           Config::get('post_type.palette'),
//           $this->posts
//       );

        $this->createPosts(
            PostTypeEnum::Palette,
            $this->posts
        );
    }
}