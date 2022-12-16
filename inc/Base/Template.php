<?php 


namespace Inc\Base;

use Inc\Base\BaseController;




class Template extends BaseController
{
	public function register()
	{
		if ( ! $this->activated( 'templates_manager' ) ) return;

		// $templates_manager = new Template();
		// $templates_manager->register();

        $templates_manager = new Template() ;
        $templates_manager->register() ;
	}
}