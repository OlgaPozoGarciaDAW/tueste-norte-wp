
<?php
/**
 * Plugin Name: TN Cafés
 * Description: Registra el catálogo de cafés y permite elegir el café de la semana.
 * Version: 1.1
 * Author: Olga Pozo García
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Registra el tipo de contenido personalizado Café.
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
            'rewrite'      => array( 'slug' => 'cafes' ),
        )
    );
}
add_action( 'init', 'tn_cafes_registrar_tipo_contenido' );

// Añade una página de configuración al administrador.
function tn_cafes_anadir_menu_semana() {
    add_options_page(
        'Café de la semana',
        'Café de la semana',
        'manage_options',
        'tn-cafe-semana',
        'tn_cafes_mostrar_configuracion_semana'
    );
}
add_action( 'admin_menu', 'tn_cafes_anadir_menu_semana' );

// Muestra el formulario para elegir el café destacado.
function tn_cafes_mostrar_configuracion_semana() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $cafe_seleccionado = (int) get_option( 'tn_cafe_semana', 0 );

    $cafes = get_posts(
        array(
            'post_type'      => 'cafe',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        )
    );
    ?>
    <div class="wrap">
        <h1>Café de la semana</h1>

        <form method="post" action="options.php">
            <?php settings_fields( 'tn_cafe_semana_grupo' ); ?>

            <label for="tn_cafe_semana">
                Selecciona el café que quieres destacar:
            </label>

            <select
                name="tn_cafe_semana"
                id="tn_cafe_semana"
            >
                <option value="0">Ninguno</option>

                <?php foreach ( $cafes as $cafe ) : ?>
                    <option
                        value="<?php echo esc_attr( $cafe->ID ); ?>"
                        <?php selected( $cafe_seleccionado, $cafe->ID ); ?>
                    >
                        <?php echo esc_html( $cafe->post_title ); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <?php submit_button( 'Guardar café de la semana' ); ?>
        </form>
    </div>
    <?php
}

// Registra la opción y limita su valor a un café publicado.
function tn_cafes_registrar_opcion_semana() {
    register_setting(
        'tn_cafe_semana_grupo',
        'tn_cafe_semana',
        array(
            'type'              => 'integer',
            'sanitize_callback' => 'tn_cafes_validar_cafe_semana',
            'default'           => 0,
        )
    );
}
add_action( 'admin_init', 'tn_cafes_registrar_opcion_semana' );

function tn_cafes_validar_cafe_semana( $valor ) {
    $valor = absint( $valor );

    if ( 0 === $valor ) {
        return 0;
    }

    $cafe = get_post( $valor );

    if (
        $cafe instanceof WP_Post
        && 'cafe' === $cafe->post_type
        && 'publish' === $cafe->post_status
    ) {
        return $valor;
    }

    return 0;
}

// Crea el shortcode [tn_cafe_semana] para mostrar el café elegido.
function tn_cafes_mostrar_cafe_semana() {
    $cafe_id = (int) get_option( 'tn_cafe_semana', 0 );

    if ( ! $cafe_id ) {
        return '<p>Próximamente anunciaremos nuestro café de la semana.</p>';
    }

    $cafe = get_post( $cafe_id );

    if (
        ! $cafe instanceof WP_Post
        || 'cafe' !== $cafe->post_type
        || 'publish' !== $cafe->post_status
    ) {
        return '';
    }

    $salida = '<section class="cafe-semana">';
    $salida .= '<h2>Café de la semana</h2>';
    $salida .= '<h3><a href="' .
        esc_url( get_permalink( $cafe_id ) ) . '">' .
        esc_html( get_the_title( $cafe_id ) ) .
        '</a></h3>';

    $imagen = get_the_post_thumbnail(
        $cafe_id,
        'large',
        array( 'alt' => get_the_title( $cafe_id ) )
    );

    if ( $imagen ) {
        $salida .= '<a href="' .
            esc_url( get_permalink( $cafe_id ) ) . '">' .
            $imagen . '</a>';
    }

    $salida .= '<div class="cafe-semana-descripcion">' .
        apply_filters( 'the_content', $cafe->post_content ) .
        '</div>';

    $origen = get_field( 'origen', $cafe_id );
    $notas  = get_field( 'notas_cata', $cafe_id );
    $tueste = get_field( 'nivel_tueste', $cafe_id );
    $precio = get_field( 'precio', $cafe_id );

    if ( $origen ) {
        $salida .= '<p><strong>Origen:</strong> ' .
            esc_html( $origen ) . '</p>';
    }

    if ( $notas ) {
        $salida .= '<p><strong>Notas de cata:</strong> ' .
            esc_html( $notas ) . '</p>';
    }

    if ( $tueste ) {
        $salida .= '<p><strong>Nivel de tueste:</strong> ' .
            esc_html( $tueste ) . '</p>';
    }

    if ( $precio !== false && $precio !== null && $precio !== '' ) {
        $salida .= '<p><strong>Precio:</strong> ' .
            esc_html( number_format( (float) $precio, 2, ',', '.' ) ) .
            ' €</p>';
    }

    $salida .= '</section>';

    return $salida;
}
add_shortcode( 'tn_cafe_semana', 'tn_cafes_mostrar_cafe_semana' );
