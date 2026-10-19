
<?php

// Carga la hoja de estilos del tema.
function tueste_norte_estilos() {
    wp_enqueue_style(
        'tueste-norte-estilos',
        get_stylesheet_uri(),
        array(),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'tueste_norte_estilos' );

// Registra el menú principal.
function tueste_norte_configurar_tema() {
    register_nav_menus(
        array(
            'primary' => 'Menú principal',
        )
    );
}
add_action( 'after_setup_theme', 'tueste_norte_configurar_tema' );
