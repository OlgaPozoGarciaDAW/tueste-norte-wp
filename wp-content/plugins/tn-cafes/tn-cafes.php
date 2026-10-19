
<?php
/**
 * Plugin Name: TN Cafés
 * Description: Registra el catálogo de cafés de Tueste Norte.
 * Version: 1.0
 * Author: Olga Pozo García
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Registra el tipo de contenido personalizado "cafe".
function tn_cafes_registrar_tipo_contenido() {
    $etiquetas = array(
        'name'          => 'Cafés',
        'singular_name' => 'Café',
        'add_new_item'  => 'Añadir nuevo café',
        'edit_item'     => 'Editar café',
        'new_item'      => 'Nuevo café',
        'view_item'     => 'Ver café',
        'search_items'  => 'Buscar cafés',
        'not_found'     => 'No se han encontrado cafés',
        'menu_name'     => 'Cafés',
    );

    register_post_type(
        'cafe',
        array(
            'labels'       => $etiquetas,
            'public'       => true,
            'has_archive'  => true,
            'show_in_rest' => true,
            'rest_base'    => 'cafes',
            'menu_icon'    => 'dashicons-coffee',
            'supports'     => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            ),
            'rewrite'      => array(
                'slug' => 'cafes',
            ),
        )
    );
}
add_action( 'init', 'tn_cafes_registrar_tipo_contenido' );
