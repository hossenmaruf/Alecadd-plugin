<?php

/**
 * @package  AlecaddPlugin
 */

namespace Inc\Api\Callbacks;


class CptCallbacks
{

    public function cptSectionManager()
    {
        echo 'Manage your customs post type';
    }


    public function cptSanitize($input)
    {
        return $input;
    }


    public function textField($args)
    {

        return $args;
    }




    public function checkboxField($args)
    {
    	$name        = $args['label_for'];
    	$classes     = $args['class'];
    	$option_name = $args['option_name'];
    	$checkbox    = get_option($option_name);
    	$checked     = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

    	echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }
}