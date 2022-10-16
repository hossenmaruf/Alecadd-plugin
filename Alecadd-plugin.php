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



class AlecaddPlugin
{

    public $plugin;

    function __construct()
    {
        // add_action('init', array($this, 'custom_post_type'));
        $this->plugin = plugin_basename(__FILE__);
    }

    function register()
    {

        add_action('admin_enqueue_scripts', array($this, 'enqueue'));

        add_action('admin_menu', array($this, 'add_admin_pages'));

        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_links'));
    }

    function settings_links($links)
    {

        $setting_link = '<a href="admin.php?page=alecadd_plugin"> Settings</a>';
        array_push($links, $setting_link);

        return $links;
    }


    function add_admin_pages()
    {

        add_menu_page('Alecadd Plugin', 'Alecadd', 'manage_options', 'alecadd_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    function admin_index()
    {
        //require template

        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
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