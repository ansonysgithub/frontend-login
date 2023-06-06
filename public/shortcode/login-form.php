<?php

function an_script_login()
{
    wp_register_script('an-login', plugin_dir_url(__FILE__) . '../assets/js/login.js');
    wp_localize_script('an-login', 'an_login_obj', array(
        'rest_url' => rest_url('an'),
        'home_url' => home_url()
    ));
}

add_action('wp_enqueue_scripts', 'an_script_login');

function an_add_login_form()
{
    wp_enqueue_script('an-login');

    $response = '
    <div class="row">
        <form class="signin__form" id="frontend-login-form">
            <div class="form-group">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input class="form-control" name="name" type="text" id="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" type="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" name="password" type="password" id="password">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-primary" type="submit" value="Login">
                </div>
            </div>
            <div id="frontend-login-register-message"></div>
        </form>
    </div>
    ';

    return $response;
}

add_shortcode('login_form', 'an_add_login_form');
