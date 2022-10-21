<?php

/**
 * Plugin Name: Alecadd-plugin
 * Description: A plugin for Learn
 * Plugin URI: https://github.com/hossenmaruf
 * Author: hossen maruf
 * Author URI: https://github.com/hossenmaruf
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    die;
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}





if (class_exists('Inc\\Init')) {

    Inc\Init::register_services();
}







function activate_alecadd_plugin()
{
    Inc\Base\Activate::activate();
}

register_activation_hook(__FILE__, 'activate_alecadd_plugin');


function deactivate_alecadd_plugin()
{
    Inc\Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_alecadd_plugin');