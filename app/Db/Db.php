<?php

namespace App\Db;

class Db
{
    const TableName = 'vascaniya_calc';
    const Dimensions = 'dimensions';
    const Edges = 'edges';
    const Palette = 'palette';
    const Sinks = 'sinks';
    const Addons = 'addons';
    const Result = 'result';
    const Settings = 'settings';

    const DefaultId = 1;

    public function __construct()
    {

    }

    function create()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . self::TableName;

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            dimensions longtext NOT NULL,
            edges longtext NOT NULL,
            palette longtext NOT NULL,
            sinks longtext NOT NULL,
            addons longtext NOT NULL,
            result longtext NOT NULL,
            settings longtext NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

    function createOrUpdateDimensions(array $value)
    {
        $this->createOrUpdateField(self::Dimensions, $value);
    }

    function createOrUpdateEdges(array $value)
    {
        $this->createOrUpdateField(self::Edges, $value);
    }

    function createOrUpdatePalette(array $value)
    {
        $this->createOrUpdateField(self::Palette, $value);
    }

    function createOrUpdateSinks(array $value)
    {
        $this->createOrUpdateField(self::Sinks, $value);
    }

    function createOrUpdateAddons(array $value)
    {
        $this->createOrUpdateField(self::Addons, $value);
    }

    function createOrUpdateResult(array $value)
    {
        $this->createOrUpdateField(self::Result, $value);
    }

    function createOrUpdateSettings(array $value)
    {
        $this->createOrUpdateField(self::Settings, $value);
    }

    private function createOrUpdateField($field, array $value)
    {
        global $wpdb;

        $table_name = $wpdb->prefix . self::TableName;

        // Отримуємо поточні дані з бази
        $current_data = $this->getField($field);

        // Об'єднуємо нові дані з поточними
        $updated_data = array_merge($current_data, $value);

        // Перевірка, чи існує запис з id = DefaultId
        $exists = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE id = " . self::DefaultId);

        // Якщо запис існує, оновлюємо його, інакше створюємо новий
        if ($exists) {
            $wpdb->update(
                $table_name,
                [$field => json_encode($updated_data)],
                ['id' => self::DefaultId],
                ['%s'],
                ['%d']
            );
        } else {
            $wpdb->insert(
                $table_name,
                ['id' => self::DefaultId, $field => json_encode($updated_data)],
                ['%d', '%s']
            );
        }
    }

    function getDimensions()
    {
        return $this->getField(self::Dimensions);
    }

    function getEdges()
    {
        return $this->getField(self::Edges);
    }

    function getPalette()
    {
        return $this->getField(self::Palette);
    }

    function getSinks()
    {
        return $this->getField(self::Sinks);
    }

    function getAddons()
    {
        return $this->getField(self::Addons);
    }

    function getResult()
    {
        return $this->getField(self::Result);
    }

    function getSettings()
    {
        return $this->getField(self::Settings);
    }

    private function getField($field)
    {
        global $wpdb;

        $table_name = $wpdb->prefix . self::TableName;

        $result = $wpdb->get_var($wpdb->prepare("SELECT $field FROM $table_name WHERE id = %d", self::DefaultId));

        return $result ? json_decode($result, true) : [];
    }
}
