
<?php get_header(); ?>
<main class="site-main">
    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title">
                    <?php the_title(); ?>
                </h1>
            </header>
<?php if ( has_post_thumbnail() ) : ?>
    <div class="cafe-imagen">
        <?php the_post_thumbnail( 'large' ); ?>
    </div>
<?php endif; ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <section class="ficha-cafe">
                <h2>Ficha del café</h2>

                <?php
                $origen = get_field( 'origen' );
                $notas = get_field( 'notas_cata' );
                $tueste = get_field( 'nivel_tueste' );
                $precio = get_field( 'precio' );
                ?>

                <?php if ( $origen ) : ?>
                    <p><strong>Origen:</strong>
                        <?php echo esc_html( $origen ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $notas ) : ?>
                    <p><strong>Notas de cata:</strong>
                        <?php echo esc_html( $notas ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $tueste ) : ?>
                    <p><strong>Nivel de tueste:</strong>
                        <?php echo esc_html( $tueste ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $precio !== false && $precio !== null && $precio !== '' ) : ?>
                    <p><strong>Precio:</strong>
                        <?php echo esc_html( number_format( (float) $precio, 2, ',', '.' ) ); ?> €
                    </p>
                <?php endif; ?>
            </section>
        </article>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
