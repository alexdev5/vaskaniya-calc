<?php

if (!defined('ABSPATH')) {
    exit;
}

function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_upload');

function enable_svg_uploads_rest_api($data, $file, $filename, $mimes)
{
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext'] = 'svg';
    }
    return $data;
}

add_filter('wp_check_filetype_and_ext', 'enable_svg_uploads_rest_api', 10, 4);

