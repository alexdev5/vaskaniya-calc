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
        $exists = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE id = " . self::DefaultId);

        if (!$exists) {
            $wpdb->insert(
                $table_name,
                [
                    'id' => self::DefaultId,
                    self::Dimensions => json_encode([]),
                    self::Edges => json_encode([]),
                    self::Palette => json_encode([]),
                    self::Sinks => json_encode([]),
                    self::Addons => json_encode([]),
                    self::Result => json_encode([]),
                    self::Settings => json_encode([])
                ],
                ['%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s']
            );
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
