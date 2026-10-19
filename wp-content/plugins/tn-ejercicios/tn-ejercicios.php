
<?php
/**
 * Plugin Name: TN Ejercicios
 * Description: Plugin para practicar acciones y filtros en WordPress.
 * Version: 1.0
 * Author: Olga Pozo García
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Acorta los extractos del blog a 20 palabras.
function tn_ejercicios_longitud_extracto( $longitud ) {
    return 20;
}
add_filter( 'excerpt_length', 'tn_ejercicios_longitud_extracto', 999 );

// Añade un comentario HTML con la fecha al final de la página.
function tn_ejercicios_fecha_pagina() {
    echo "\n<!-- Página servida el " . esc_html( date( 'Y-m-d' ) ) . " -->\n";
}
add_action( 'wp_footer', 'tn_ejercicios_fecha_pagina' );

/*
Si otro plugin filtra excerpt_length con prioridad 5 y devuelve 55,
nuestro filtro se ejecuta después porque tiene prioridad 999.
Por eso la longitud final será de 20 palabras.
*/
