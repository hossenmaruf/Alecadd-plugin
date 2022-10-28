<?php



namespace Inc\Api\Callbacks;


use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminCpt()
    {
        return require_once("$this->plugin_path/templates/cpt.php");
    }

    public function adminTaxonomy()
    {
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function adminWidget()
    {
        return require_once("$this->plugin_path/templates/widgets.php");
    }

    public function AlecaddOptionsGroup($input)
    {
        return $input;
    }

    public function AlecaddAdminSection()
    {
        echo 'Check out this beautiful section';
    }

    public function AlecaddTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text-example 
        value= "' . $value . ' " placeholder="Write Something More!">';
    }

    public function AlecaddFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="text-example 
        value= "' . $value . ' " placeholder="Write your First Name">';
    }
}