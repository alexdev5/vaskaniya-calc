<?php
namespace App\Seeders\StonePalette;

use App\Config;
use App\Seeders\Seeders;

class StonePaletteSeeder extends Seeders
{
    protected $taxonomies = [];
    protected $posts = [];

    public function __construct()
    {
        $this->taxonomies = $this->getArrayFromFile('StonePalette/all-taxonomies.php');
        $this->posts = $this->getArrayFromDirectory('StonePalette/Posts');
    }

    public function run()
    {
        $this->createTerms(
            Config::get('taxonomy.categoryStone'),
            $this->taxonomies
        );

        $this->assignTermsToPost(
            Config::get('post_type.palette'),
            $this->posts
        );
        /*$this->createPosts(
            Config::get('post_type.palette'),
            $this->posts
        );*/
    }
}