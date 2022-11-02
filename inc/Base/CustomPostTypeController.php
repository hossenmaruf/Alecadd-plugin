<?php

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{


    public $subpages = array();
    public $callbacks;


    public function register()
    {
        $option = get_option('alecadd_plugin');

        $activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;

        if (!$activated) {
            return;
        }



        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();



        $this->settings->addSubPages($this->subpages)->register();


        add_action('init', array($this, 'active'));
    }



    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'alecadd_plugin',
                'page_title'  => 'Custom Post Types',
                'menu_title'  => 'CPT Manager',
                'capability'  => 'manage_options',
                'menu_slug'   => 'alecadd_cpt',
                'callback'    => array($this->callbacks, 'adminCpt')
            )
        );
    }

    public function active()
    {



        register_post_type(
            'alecadd_products',
            array(

                'labels' => array(
                    'name'          => 'Products',
                    'singular_name' => 'Product'
                ),

                'public'      => true,
                'has_archive' => true,

            )
        );
    }
}