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

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));



if (class_exists('Inc\\Init')) {

    Inc\Init::register_services();
}



use Inc\Base\Activate;
use Inc\Base\Deactivate;


register_activation_hook(__FILE__, 'activate_alecadd_plugin');
register_deactivation_hook(__FILE__, 'deactivate_alecadd_plugin');



function activate_alecadd_plugin()
{
    Activate::activate();
}

function deactivate_alecadd_plugin()
{


    Deactivate::deactivate();
}