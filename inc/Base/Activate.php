<?php
/**
 * @package  AlecaddPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$default = array();

		if ( ! get_option( 'alecad_plugin' ) ) {
			update_option( 'alecaddd_plugin', $default );
		}

		if ( ! get_option( 'alecadd_plugin_cpt' ) ) {
			update_option( 'alecadd_plugin_cpt', $default );
		}
	}
}