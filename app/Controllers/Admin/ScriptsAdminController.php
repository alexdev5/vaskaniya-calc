<?php

namespace App\Controllers\Admin;

class ScriptsAdminController
{
    public function enqueueScripts() {
        wp_enqueue_script_version('vs-calculator-scripts', 'admin/scripts/settings.js');
        wp_enqueue_style_version('vs-calculator-styles', 'admin/styles/settings.css');
    }

    public function enqueue() {
        add_action('admin_enqueue_scripts', [$this, 'enqueueScripts']);
    }
}