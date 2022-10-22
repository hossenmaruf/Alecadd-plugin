<?php


namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;


class Admin extends BaseController
{

    public $setting;
    public $callbacks;

    public $pages = array();
    public $subpages = array();



    public function register()
    {
        $this->setting = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();


        $this->setting->addPages($this->pages)->withSubPage('Deshboard')->addSubPages($this->subpages)->register();
    }


    public function setPages()
    {

        $this->pages = [
            [
                'page_title' => 'Alecadd Plugin',
                'menu_title' => 'Alecadd',
                'capability' => 'manage_options',
                'menu_slug'  => 'alecadd_plugin',
                'callback'   => array($this->callbacks, 'adminDeshBoard'),
                'icon_url' => 'dashicons-store',
                'position' => 1
            ],

        ];
    }

    public function setSubPages()
    {


        $this->subpages = [
            [
                'parent_slug' => 'alecadd_plugin',
                'page_title'  => 'Custom Post Type',
                'menu_title'  => 'CPT',
                'capability'  => 'manage_options',
                'menu_slug'   => 'alecadd_cpt',
                'callback'    => function () {
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
}