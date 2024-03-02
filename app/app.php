<?php

use App\Controllers\TaxonomyController;
use App\Taxonomies\PostsType;
use App\Taxonomies\TagTaxonomy;
use App\Taxonomies\CategoryTaxonomy;
use App\Controllers\AdminSubMenu;
use App\Controllers\SeederController;

use App\Seeders\StonePalette\StonePaletteSeeder;
use App\Seeders\Tags\TagsSeeder;

// register taxonomies and post type
TaxonomyController::init([
    new CategoryTaxonomy(),
    new TagTaxonomy(),
    new PostsType(),
]);

(new AdminSubMenu())->init();

// Seeders
if(isset($_GET['vs_import'])) {
    SeederController::init([
        new TagsSeeder(),
        new StonePaletteSeeder(),
    ]);
}

// expensive
register_activation_hook(VS_ROOT_FILE, function () {

});
