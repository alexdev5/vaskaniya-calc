<?php

use App\Controllers\Admin\ScriptsAdminController;
use App\Controllers\AdminSubMenu;
use App\Controllers\SeederController;
use App\Controllers\Taxonomy\CategoryTaxonomy;
use App\Controllers\Taxonomy\PostsType;
use App\Controllers\Taxonomy\TagTaxonomy;
use App\Controllers\TaxonomyController;
use App\Seeders\Category\CategorySeeder;
use App\Seeders\StonePalette\StonePaletteSeeder;
use App\Seeders\Tags\TagsSeeder;

// register taxonomies and  custom post type
TaxonomyController::init([
    new CategoryTaxonomy(),
    new TagTaxonomy(),
    new PostsType(),
]);

// set admin menu
(new AdminSubMenu())->init();

// styles and scripts
//(new ActivationController)->init();
// seeders
if(isset($_GET['vs-import'])) {
    SeederController::init([
        new TagsSeeder(),
        new CategorySeeder(),
        new StonePaletteSeeder(),
    ]);
}

// enqueue scripts and styles for admin
(new ScriptsAdminController())->enqueue();

// expensive
register_activation_hook(VS_ROOT_FILE, function () {

});
