<?php

use App\Config;

function vConfig($name = '')
{
    Config::get($name);
}

function dump($args, $isVarDump = false)
{
    echo '<pre>';

    if ($isVarDump) var_dump($args);
    else print_r($args);

    echo '<pre>';
}

function dd($args, $isVarDump = false)
{

    dump($args, $isVarDump);
    die;
}

if (!function_exists('vs_view')) {
    function vs_view($file, $args = [])
    {
        if (is_array($args) && count($args))
            extract($args);

        ob_start();

        include VS_ROOT_DIR . "templates/$file.view.php";
        return ob_get_clean();
    }
}

function vsLog($data)
{
    error_log(print_r($data, 1));
}

if (!function_exists('wp_enqueue_script_version')) {
    function wp_enqueue_script_version($handle, $src, $depend = [], $in_footer = false)
    {
        wp_enqueue_script($handle, VS_DIST_URL . $src, $depend, filemtime(VS_DIST . $src), $in_footer);
    }
}

if (!function_exists('wp_enqueue_style_version')) {
    function wp_enqueue_style_version($handle, $src, $depend = [], $in_footer = false)
    {
        wp_enqueue_style($handle, VS_DIST_URL . $src, $depend, filemtime(VS_DIST . $src), $in_footer);
    }
}

