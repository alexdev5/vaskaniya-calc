<?php
use App\Config;

function vConfig($name = '') {
    Config::get($name);
}

function dump($args) {
    echo '<pre>';
    var_dump($args);
    echo '<pre>';
}

function dd($args) {
    dump($args);
    die;
}

if (!function_exists('vs_view')){
    function vs_view($file, $args = []){
        if (is_array($args) && count($args))
            extract($args);

        ob_start();

        include VS_ROOT_DIR . "templates/$file.view.php";
        return ob_get_clean();
    }
}

function vsLog($data) {
    error_log(print_r($data, 1));
}