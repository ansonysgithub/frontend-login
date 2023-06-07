<?php

/*
Plugin Name: Frontend Login
Plugin URI: http://www.ansonys.com/login-api
Description: REST API for login
Author: Ansonys
Version: 1.0
Author URI: http://www.ansonys.com
*/

define('AN_PLUGIN_URL', plugin_dir_path(__FILE__));

//API REST
require_once AN_PLUGIN_URL . 'includes/API/register-api.php';
require_once AN_PLUGIN_URL . 'includes/API/login-api.php';

//Shortcodes
require_once AN_PLUGIN_URL . 'public/shortcode/register-form.php';
require_once AN_PLUGIN_URL . 'public/shortcode/login-form.php';

//Roles
function an_activate_plugin()
{
    add_role('customer', 'Customer', array(
        'read' => true,
        'edit_posts' => false,
        'delete_posts' => false
    ));
}

//Blocks
require_once AN_PLUGIN_URL . 'blocks/register/index.php';
require_once AN_PLUGIN_URL . 'blocks/news/index.php';

register_activation_hook(__FILE__, 'an_activate_plugin');

function an_deactivate_plugin()
{
    remove_role('customer');
}

register_deactivation_hook(__FILE__, 'an_deactivate_plugin');
