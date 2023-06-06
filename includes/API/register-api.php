<?php

function an_register_api_callback($request)
{
    $user_exist = get_user_by('login', $request['name']);
    $email_exist = get_user_by('email', $request['email']);

    if ($user_exist) {
        return array('message' => "User already exists");
    } elseif ($email_exist) {
        return array('message' => "Email already exists");
    }

    $user = wp_insert_user(array(
        'user_login' => $request['name'],
        'user_email' => $request['email'],
        'user_pass' => $request['password'],
        'role' => 'suscriber'
    ));

    return $user;
}

function an_register_api()
{
    register_rest_route(
        'an',
        'register',
        array(
            'methods' => 'POST',
            'callback' => 'an_register_api_callback'
        )
    );
}

add_action('rest_api_init', 'an_register_api');
