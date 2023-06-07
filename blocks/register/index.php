<?php

function an_register_blocks()
{
    $assets_file = include_once AN_PLUGIN_URL . '/blocks/register/build/index.asset.php';
    wp_register_script(
        'an-register-block',
        plugins_url('./build/index.js', __FILE__),
        $assets_file['dependencies'],
        $assets_file['version']
    );

    wp_register_style(
        'an-register-block',
        plugins_url('./build/index.css', __FILE__),
        array(),
        $assets_file['version']
    );

    register_block_type(
        'an/register',
        array(
            'editor_script' => 'an-register-block',
            'script' => 'an-register',
            'editor_style' => 'an-register-block',
        )
    );
}

add_action('init', 'an_register_blocks');
