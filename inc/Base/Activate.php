<?php

/**
 * @package  AlecaddPlugin
 */

namespace Inc\Base;

class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();

		if (get_option('alecadd_plugin')) {
			return;
		}

		$default = array();

		if (!get_option('alecadd_plugin_cpt')) {

			update_option('alecadd_plugin', $default);
		}
	}
}