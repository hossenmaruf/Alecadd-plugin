<?php


namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{

    public $setting;

    public $pages = array();
    public $subpages = array();



    public function __construct()
    {
        //  add_action('admin_menu', array($this, 'add_admin_pages'));
        $this->setting = new SettingsApi();

        $this->pages = [
            [
                'page_title' => 'Alecadd Plugin',
                'menu_title' => 'Alecadd',
                'capability' => 'manage_options',
                'menu_slug' => 'alecadd_plugin',
                'callback' => function () {
                    echo '<h1>Alecadd Plugin</h1>';
                },
                'icon_url' => 'dashicons-store',
                'position' => 1

            ],


        ];


        $this->subpages = [
            [
                'parent_slug' => 'alecadd_plugin',
                'page_title' =>  'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'alecadd_cpt',
                'callback' => function () {
                    echo '<h1>Alecadd Plugin</h1>';
                }
            ],
            [
                'parent_slug' => 'alecadd_plugin',
                'page_title' =>  'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'alecadd_taxonomies',
                'callback' => function () {
                    echo '<h1>Alecadd Plugin</h1>';
                }
            ],
            [
                'parent_slug' => 'alecadd_plugin',
                'page_title' =>  'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'alecadd_widgets',
                'callback' => function () {
                    echo '<h1>Alecadd Plugin</h1>';
                }
            ],
        ];
    }

    public function register()
    {

        $this->setting->addPages($this->pages)->withSubPage('Deshboard')->addSubPages($this->subpages)->register();
    }
}