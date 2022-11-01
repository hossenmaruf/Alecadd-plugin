<?php

/**
 * @package  AlecaddPlugin
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

/**
 * 
 */
class Admin extends BaseController
{
	public $settings;

	public $callbacks;
	public $callbacks_mngr;

	public $pages = array();

	public $subpages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();
		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
	}

	public function setPages()
	{
		$this->pages = array(
			array(
				'page_title' => 'Alecadd Plugin',
				'menu_title' => 'Alecadd',
				'capability' => 'manage_options',
				'menu_slug' => 'alecaddd_plugin',
				'callback' => array($this->callbacks, 'adminDashboard'),
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'alecadd_cpt',
				'callback' => array($this->callbacks, 'adminCpt')
			),
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'alecadd_taxonomies',
				'callback' => array($this->callbacks, 'adminTaxonomy')
			),
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'alecadd_widgets',
				'callback' => array($this->callbacks, 'adminWidget')
			)
		);
	}

	public function setSettings()
	{

		$args = array();

		foreach ($this->managers as $key => $value) {


			$args[] = 	array(
				'option_group' => 'alecadd_plugin_settings',
				'option_name' => 'alecadd_plugin',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			);
		}

		$this->settings->setSettings($args);
	}

	public function setSections()
	{
		$args = array(
			array(
				'id'       => 'alecadd_admin_index',
				'title'    => 'Settings Manager',
				'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
				'page'     => 'alecadd_plugin'
			)
		);

		$this->settings->setSections($args);
	}

	public function setFields()
	{
		$args = array();

		foreach ($this->managers as $key => $value) {
			$args[] = array(
				'id'       => $key,
				'title'    => $value,
				'callback' => array($this->callbacks_mngr, 'checkboxField'),
				'page'     => 'alecadd_plugin',
				'section'  => 'alecadd_admin_index',
				'args'     => array(
					'option_name' => 'alecadd_plugin',
					'label_for'   => $key,
					'class'       => 'ui-toggle'
				)
			);
		}

		$this->settings->setFields($args);
	}
}