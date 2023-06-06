<?php

function an_login_api_callback($request)
{
    $user = wp_signon(array(
        'user_login' => $request['email'],
        'user_password' => $request['password'],
        'remember' => true
    ));

    return $user->get_error_message();
}

function an_login_api()
{
    register_rest_route(
        'an',
        'login',
        array(
            'methods' => 'POST',
            'callback' => 'an_login_api_callback'
        )
    );
}

add_action('rest_api_init', 'an_login_api');
