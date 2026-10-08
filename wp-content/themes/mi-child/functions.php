<?php

function mi_child_estilos() {

    wp_enqueue_style(
        'tema-padre',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'tema-hijo',
        get_stylesheet_directory_uri() . '/style.css',
        array('tema-padre')
    );
}

add_action('wp_enqueue_scripts', 'mi_child_estilos');