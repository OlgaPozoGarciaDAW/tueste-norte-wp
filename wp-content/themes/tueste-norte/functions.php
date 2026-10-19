
<?php

function tueste_norte_estilos() {
    wp_enqueue_style(
        'tueste-norte-estilos',
        get_stylesheet_uri(),
        array(),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );
}

add_action( 'wp_enqueue_scripts', 'tueste_norte_estilos' );
