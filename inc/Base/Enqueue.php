<?php 
/**
 * @package  alecaddPlugin
 */
namespace Inc\Base;

use Inc\Base\BaseController;

/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	//	add_action( 'wp_enqueue_scripts', array( $this, 'enqueue2' ) );
	//	add_action( 'wp_head', array( $this, 'add_auth_template' ) );
	}
	
	function enqueue() {
		// enqueue all our scripts

		wp_enqueue_script( 'media-upload' );
		wp_enqueue_media( );
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/mystyle.css' );
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/myscript.js' );
	}


	public function enqueue2()
	{
		wp_enqueue_style( 'authstyle', $this->plugin_url . 'assets/auth.css' );
		wp_enqueue_script( 'authscript', $this->plugin_url . 'assets/auth.js' );
	}

	public function add_auth_template()
	{
		if ( is_user_logged_in() ) return;

		$file = $this->plugin_path . 'templates/auth.php';

		if ( file_exists( $file ) ) {
			load_template( $file, true );
		}
	}
}