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

class AlecaddPlugin
{

    function __construct()
    {
        add_action('init', array($this, 'custom_post_type'));
    }

    function register()
    {

        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }


    function activate()
    {
        // generate a CPT 

        $this->custom_post_type();

        //flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate()
    {
        //flush rewrite rules
        flush_rewrite_rules();
    }


    function custom_post_type()
    {

        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }


    function enqueue()
    {
        // enqueue all our scripts

        wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
        wp_enqueue_script('mypluginstyle', plugins_url('/assets/script.js', __FILE__));
    }
}

if (class_exists('AlecaddPlugin')) {

    $alecaddPlugin = new AlecaddPlugin();
    $alecaddPlugin->register();
}



register_activation_hook(__FILE__, array($alecaddPlugin, 'activate'));

register_deactivation_hook(__FILE__, array($alecaddPlugin, 'deactivate'));

// register_uninstall_hook(__FILE__, array($alecaddPlugin, 'uninstall'));