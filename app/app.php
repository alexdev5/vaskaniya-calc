<?php
use App\Controllers\TaxonomyController;
use App\Taxonomies\PostsType;
use App\Taxonomies\TagTaxonomy;
use App\Taxonomies\CategoryTaxonomy;
use App\Controllers\AdminSubMenu;
use App\Controllers\SeederController;
use App\Controllers\Admin\ScriptsAdminController;

use App\Seeders\StonePalette\StonePaletteSeeder;
use App\Seeders\Tags\TagsSeeder;
use App\Seeders\Category\CategorySeeder;

// register taxonomies and  custom post type
TaxonomyController::init([
    new CategoryTaxonomy(),
    new TagTaxonomy(),
    new PostsType(),
]);

// set admin menu
(new AdminSubMenu())->init();

// seeders
if(isset($_GET['vs_import'])) {
    SeederController::init([
        new TagsSeeder(),
        new StonePaletteSeeder(),
        new CategorySeeder(),
    ]);
}

// enqueue scripts and styles for admin
(new ScriptsAdminController())->enqueue();

// expensive
register_activation_hook(VS_ROOT_FILE, function () {

});
