<?php

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{

    public $callbacks;

    public $subpages = array();

    public $custom_post_type = array();



    public function register()
    {
        if (!$this->activated('cpt_manager')) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();



        $this->settings->addSubPages($this->subpages)->register();

        $this->storeCustomPostType();


        if (!empty($this->custom_post_type)) {

            add_action('init', array($this, 'registerCustomPostType'));
        }
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


    public function storeCustomPostType()
    {

        $this->custom_post_type = array(
            array(
                'post_type'     => 'alecadd_product',
                'name'          => 'Products',
                'singular_name' => 'Product',
                'public'        => true,
                'has_archive'   => true
            ), array(
                'post_type'     => 'alecadd_comics',
                'name'          => 'Comics',
                'singular_name' => 'Com',
                'public'        => true,
                'has_archive'   => false
            )
        );
    }


    public function registerCustomPostType()
    {

        foreach ($this->custom_post_type as $post_type) {

            register_post_type(
                $post_type['post_type'],
                array(

                    'labels' => array(
                        'name'          => $post_type['name'],
                        'singular_name' => $post_type['singular_name']
                    ),

                    'public'      => $post_type['public'],
                    'has_archive' => $post_type['has_archive'],

                )
            );
        }
    }
}