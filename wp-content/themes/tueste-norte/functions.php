<?php

function tueste_norte_estilos() {

    wp_enqueue_style(
        'tema-padre',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'tema-hijo',
        get_stylesheet_directory_uri() . '/style.css',
        array('tema-padre'),
        filemtime(get_stylesheet_directory() . '/style.css')
    );
}

add_action('wp_enqueue_scripts', 'tueste_norte_estilos', 20);