<?php


namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{

    public $setting;

    public function __construct()
    {
        $this->setting = new SettingsApi();
    }

    public function register()
    {
        //  add_action('admin_menu', array($this, 'add_admin_pages'));



        $pages = [
            [
                'page_title' => 'Alecadd Plugin',
                'menu_title' => 'Alecadd',
                'capability' => 'manage_options',
                'menu_slug' => 'alecadd_plugin',
                'callback' => function () {
                    echo '<h1>Alecadd Plugin</h1>';
                },
                'icon_url' => 'dashicons-store',
                'position' => 110

            ],
            [
                'page_title' => 'test Plugin',
                'menu_title' => 'test',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_plugin',
                'callback' => function () {
                    echo '<h1>wtf</h1>';
                },
                'icon_url' => 'dashicons-store',
                'position' => 9

            ]



        ];



        $this->setting->addPages($pages)->register();
    }
}

//     public function add_admin_pages()
//     {

//         add_menu_page('Alecadd Plugin', 'Alecadd', 'manage_options', 'alecadd_plugin', array(
//             $this, 'admin_index'
//         ), 'dashicons-store', 110);
//     }


//     public function admin_index()
//     {

//         require_once $this->plugin_path . 'templates/admin.php';
//     }
// }