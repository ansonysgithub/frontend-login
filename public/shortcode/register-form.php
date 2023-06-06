<?php

function an_script_register()
{
    wp_register_script('an-register', plugin_dir_url(__FILE__) . '../assets/js/register.js');
    wp_localize_script('an-register', 'an_register_obj', array(
        'rest_url' => rest_url('an'),
        'home_url' => home_url()
    ));
}

add_action('wp_enqueue_scripts', 'an_script_register');

function an_add_register_form()
{
    wp_enqueue_script('an-register');

    $response = '
    <div class="row">
        <form class="signin__form" id="frontend-register-form">
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
                    <input class="form-control btn btn-primary" type="submit" value="Create">
                </div>
            </div>
            <div id="frontend-login-register-message"></div>
        </form>
    </div>
    ';

    return $response;
}

add_shortcode('register_form', 'an_add_register_form');
