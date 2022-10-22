<?php



namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function adminDeshBoard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }
}