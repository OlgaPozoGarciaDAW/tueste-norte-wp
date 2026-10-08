<?php
get_header();
?>

<main>

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
    ?>

        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

        <?php if ( has_category( 'cafes' ) ) : ?>

            <section>
                <h2>Ficha de café</h2>

                <?php
                $origen = get_field( 'origen' );
                $notas_de_cata = get_field( 'notas_de_cata' );
                $nivel_de_tueste = get_field( 'nivel_de_tueste' );
                $precio = get_field( 'precio' );
                ?>

                <?php if ( $origen ) : ?>
                    <p>
                        <strong>Origen:</strong>
                        <?php echo esc_html( $origen ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $notas_de_cata ) : ?>
                    <p>
                        <strong>Notas de cata:</strong>
                        <?php echo esc_html( $notas_de_cata ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $nivel_de_tueste ) : ?>
                    <p>
                        <strong>Nivel de tueste:</strong>
                        <?php echo esc_html( $nivel_de_tueste ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $precio !== '' && $precio !== null ) : ?>
                    <p>
                        <strong>Precio:</strong>
                        <?php echo esc_html( $precio ); ?> €
                    </p>
                <?php endif; ?>

            </section>

        <?php endif; ?>

    <?php
        endwhile;
    endif;
    ?>

</main>

<?php
get_footer();
?>