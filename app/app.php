<?php

use App\Controllers\InitController;
use App\Taxonomies\PostsType;
use App\Taxonomies\TagTaxonomy;
use App\Taxonomies\CategoryTaxonomy;
use App\Controllers\AdminSubMenu;

// register taxonomies and post type
InitController::init([
    CategoryTaxonomy::class,
    TagTaxonomy::class,
    PostsType::class,
]);

(new AdminSubMenu())->init();

// import
/*if(isset($_GET['vs_import'])) {
    add_action('init', function () {
        TagsSeeder::run();
        //CategorySeeder::run();
    });
}*/

register_activation_hook(VS_ROOT_FILE, function () {

});
