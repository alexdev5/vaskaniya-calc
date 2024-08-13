<?php

namespace App\Services;

use WP_Query;

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';


class MediaService
{
    /* @param array $query {
     *   page?: int,
     *   per_page?: int,
     * }
     *
     * @return array
     */
    public static function getMediaList(array $query = []): array
    {
        $page = !empty($query['page']) ? intval($query['page']) : 1;
        $perPage = !empty($query['per_page']) ? intval($query['per_page']) : 20;

        $args = array(
            'post_type' => 'attachment',
            'post_mime_type' => ['image/jpeg', 'image/png', 'image/svg+xml'],
            'post_status' => 'inherit',
            'posts_per_page' => $perPage,
            'paged' => $page,
        );

        $query = new WP_Query($args);
        $images = [];

        foreach ($query->posts as $post) {
            $imageUrl = wp_get_attachment_image_url($post->ID, 'full');
            $pathArray = explode('/', $imageUrl);

            $images[] = [
                'id' => $post->ID,
                'title' => $post->post_title,
                'name' => $post->post_title,
                'fullName' => $pathArray[count($pathArray) - 1],
                'url' => $imageUrl,
                'date' => $post->post_date,
            ];
        }

        return $images;
    }

    public const TEMP_DIR = VS_ASSETS_PATH . 'temp/';

    public static function uploadImageFromFile($file)
    {
        if (!isset($file['error']) || is_array($file['error'])) {
            return Response::error(
                $file,
                "Load image error in MediaService"
            );
        }

        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                echo 'No file sent.';
                return null;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'Exceeded filesize limit.';
                return null;
            default:
                echo 'Unknown errors.';
                return null;
        }

        $fileInfo = [
            'name' => $file['name'],
            'tmp_name' => $file['tmp_name']
        ];

        $uploadedFile = wp_handle_sideload($fileInfo, ['test_form' => false]);
        if (isset($uploadedFile['error'])) {
            echo 'Upload error: ' . $uploadedFile['error'];
            return null;
        }

        return self::createAttachment($uploadedFile['file']);
    }

    public static function uploadImageByPath($imageFilePath): int
    {
        $fileName = basename($imageFilePath);
        $copyFileName = self::TEMP_DIR . $fileName;

        if (!copy($imageFilePath, $copyFileName)) {
            echo 'Failed to copy file';
            return 0;
        }

        $fileInfo = [
            'name' => $fileName,
            'tmp_name' => $copyFileName
        ];

        $uploadedFile = wp_handle_sideload($fileInfo, ['test_form' => false]);
        if (isset($uploadedFile['error'])) {
            echo 'Upload error: ' . $uploadedFile['error'];
            return 0;
        }

        return self::createAttachment($uploadedFile['file']);
    }

    private static function createAttachment($filePath): int
    {
        $fileType = wp_check_filetype($filePath);
        $attachment = [
            'post_mime_type' => $fileType['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filePath)),
            'post_content' => '',
            'post_status' => 'inherit'
        ];

        $attachmentId = wp_insert_attachment($attachment, $filePath);
        $attachData = wp_generate_attachment_metadata($attachmentId, $filePath);
        wp_update_attachment_metadata($attachmentId, $attachData);

        return $attachmentId;
    }

    // Auto include scripts from `index.html`. It create Vue
    public static function parseScripts($file)
    {
        $returned = [
            'scripts' => [],
            'styles' => [],
        ];

        $file = VS_DIST . $file;
        if (!file_exists($file)) return null;

        $fileContent = file_get_contents($file);

        preg_match_all('/<link\s+[^>]*?rel="stylesheet"[^>]*?href="([^"]+)"[^>]*?>/i', $fileContent, $styleMatches);
        preg_match_all('/<script\s+[^>]*?src="([^"]+)"[^>]*?><\/script>/i', $fileContent, $scriptMatches);

        foreach ($styleMatches[1] as $styleSrc) {
            $returned['styles'][] = [
                'handle' => basename($styleSrc),
                'src' => $styleSrc
            ];
        }

        foreach ($scriptMatches[1] as $scriptSrc) {
            $returned['scripts'][] = [
                'handle' => basename($scriptSrc),
                'src' => $scriptSrc
            ];
        }

        return $returned;
    }
}