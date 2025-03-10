<?php
/**
 * Plugin Name: Vaskaniya Calculator
 * Plugin URI:
 * Description: PHP 7.2/TS/Vue 3/Pinia
 * Author: Olexandr Karakai
 * Version: 1.0
 * Author URI: @akarakai
 */

const VS_ROOT_FILE = __FILE__;

define('VS_ROOT_DIR', plugin_dir_path(__FILE__));
define('VS_DIST', plugin_dir_path(__FILE__) . 'dist/');
define('VS_ASSETS_PATH', plugin_dir_path(__FILE__) . 'dist/assets/');
define('VS_ADMIN', plugin_dir_path(__FILE__) . 'admin/');
define('VS_DB', plugin_dir_path(__FILE__) . 'db/');
define('VS_APP', plugin_dir_path(__FILE__) . 'app/');

define('VS_DIST_URL', plugins_url('', __FILE__) . '/dist/');
define('VS_ASSETS_URL', plugins_url('', __FILE__) . '/dist/assets/');
define('VS_JS_URL', plugins_url('', __FILE__) . '/dist/assets/js/');
define('VS_CSS_URL', plugins_url('', __FILE__) . '/dist/assets/css/');
define('VS_IMG_URL', plugins_url('', __FILE__) . '/dist/assets/img/');
define('VS_BASE_PATH', wp_get_upload_dir());

require_once __DIR__ . '/vendor/autoload.php';
require(VS_APP . "routes.php");
require(VS_APP . "app.php");
require_once VS_APP . 'functions.php';