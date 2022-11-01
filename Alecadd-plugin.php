<?php
/**
 * @package  alecaddPlugin
 */
/*
Plugin Name: alecadd Plugin
Plugin URI: https://github.com/hossenmaruf
Description: This is my first attempt on writing a custom Plugin
Version: 1.0.0
Author: hossenmaruf
Author URI: https://github.com/hossenmaruf
License: GPLv2 or later
Text Domain: alecadd-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.


Copyright 2005-2015 Automattic, Inc.
*/

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_alecadd_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_alecadd_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_alecadd_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_alecadd_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}