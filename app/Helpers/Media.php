<?php
namespace App\Helpers;

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

class Media
{
    public const TEMP_DIR = VS_ASSETS_PATH . 'temp/';

    public static function uploadImage($imageFilePath) {
        $pathExplode = explode('/', $imageFilePath);
        $fileName = $pathExplode[count($pathExplode) - 1];
        $copyFileName = self::TEMP_DIR . $fileName;

        if (!copy($imageFilePath, $copyFileName)) return null;

        $fileInfo = [
            'name' => basename($copyFileName),
            'tmp_name' => $copyFileName
        ];

        $uploadedFile = wp_handle_sideload($fileInfo, ['test_form' => false]);

        if (isset($uploadedFile['error'])) {
            echo 'Ошибка загрузки изображения: ' . $uploadedFile['error'];
            return null;
        }

        $fileName = $uploadedFile['file'];
        $fileType = wp_check_filetype($fileName);

        $attachment = [
            'post_mime_type' => $fileType['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($fileName)),
            'post_content' => '',
            'post_status' => 'inherit'
        ];

        $attachmentId = wp_insert_attachment($attachment, $fileName);

        $attachData = wp_generate_attachment_metadata($attachmentId, $fileName);
        wp_update_attachment_metadata($attachmentId, $attachData);

        return $attachmentId;
    }

    public static function parseScripts($file) {
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