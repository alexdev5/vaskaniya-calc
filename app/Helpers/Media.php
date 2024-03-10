<?php
namespace App\Helpers;

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

class Media
{
    public static function uploadImage($imagePath) {

        $fileInfo = [
            'name' => basename($imagePath),
            'tmp_name' => $imagePath
        ];

        $uploadedFile = wp_handle_sideload($fileInfo, ['test_form' => false]);
//        $uploadedFile = wp_handle_upload($fileInfo, ['test_form' => false]);

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
}