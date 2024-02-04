<?php
/**
 * Plugin Name: Vaskaniya Calculator - product cost calculation
 * Plugin URI:
 * Description: TS/Vue 3/Pinia
 * Author: Olexandr Karakai
 * Version: 1.0
 * Author URI: @akarakai
 */

define('VS_ROOT', plugin_dir_path(__FILE__));
define('VS_DIST', plugin_dir_path(__FILE__) . 'dist/');
define('VS_ADMIN', plugin_dir_path(__FILE__) . 'admin/');
define('VS_DB', plugin_dir_path(__FILE__) . 'db/');
define('VS_APP', plugin_dir_path(__FILE__) . 'app/');

define('VS_URL', plugins_url('', __FILE__) . '/dist/');
define('VS_ASSETS', plugins_url('', __FILE__) . '/dist/assets/');
define('VS_JS', plugins_url('', __FILE__) . '/dist/assets/js/');
define('VS_CSS', plugins_url('', __FILE__) . '/dist/assets/css/');
define('VS_IMG', plugins_url('', __FILE__) . '/dist/assets/img/');
define('VS_BASE_PATH', wp_get_upload_dir());

/*const VS_UPLOAD_DIR = EU_BASE_PATH['basedir'] . DIRECTORY_SEPARATOR . 'customizer';
const VS_UPLOAD_URI = EU_BASE_PATH['baseurl'] . '/customizer';*/

define('EUMAZER_MATERIALS_DIR', 'assets/img/materials/');
define('EUMAZER_COLORS_DIR', 'assets/img/colors/');

/*
require_once EUMAZERDIST . 'inc/helpers.php';
require_once EUMAZERDIST . 'inc/shortcodes.php';
*/

// create directories
register_activation_hook(__FILE__, function () {
    // create DB
    EuDBClass::createTable();

    // Create directories
/*    $pathInfo = wp_get_upload_dir();
    $basedir = $pathInfo['basedir'];
    $customizerDir = $basedir . DIRECTORY_SEPARATOR . 'customizer' . DIRECTORY_SEPARATOR;
    $createDirs = ['screens', 'pdf', 'comments', 'attachments'];

    foreach ($createDirs as $name) {
        $_dir = $customizerDir . $name;
        if (!file_exists($_dir)) {
            mkdir($_dir, 0777, true);
        }
    }*/
});