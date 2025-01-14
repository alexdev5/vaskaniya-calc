<?php

namespace App\Controllers\Admin;

use App\Services\MediaService;

class ScriptsAdminController
{
    public $appScripts = [];

    public function __construct()
    {
        $this->appScripts = MediaService::parseScripts('admin/app/index.html');
    }

    public function enqueueScripts()
    {
        wp_enqueue_script_version('vs-calculator-scripts', 'admin/scripts/settings.js');
        wp_enqueue_style_version('vs-calculator-styles', 'admin/styles/settings.css');

        if (isset($this->appScripts['styles'])) {
            foreach ($this->appScripts['styles'] as $style) {
                wp_enqueue_style_version($style['handle'], 'admin/app' . $style['src']);
            }
        }
    }

    public function enqueueCalculatorScripts()
    {
        if (!isset($this->appScripts['scripts'])) return;

        foreach ($this->appScripts['scripts'] as $script) {
            echo "<script type='module' crossorigin src=" . VS_DIST_URL . 'admin/app' . $script['src'] . "></script>";
        }
    }

    public function enqueue()
    {
        add_action('admin_vascaniya_calc_app_init', [$this, 'enqueueCalculatorScripts']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueScripts']);

        add_shortcode('vcalc_shortcode', [$this, 'renderCalculator']);
    }

    public function renderCalculator()
    {
        // Этот метод будет вызван при использовании шорткода на странице
        ob_start();

        // Вызов функции для подключения скриптов
        $this->enqueueCalculatorScripts();
        $this->enqueueScripts();

        // Здесь можно добавить HTML или другой контент, который должен быть выведен вместе со скриптами
        echo '<div id="app"></div>';

        return ob_get_clean();
    }
}