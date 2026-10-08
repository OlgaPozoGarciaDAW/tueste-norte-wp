<?php get_header(); ?>

<main>

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
    ?>

        <h1><?php the_title(); ?></h1>

        <?php
        $subtitulo = get_field( 'subtitulo' );

        if ( $subtitulo ) :
        ?>
            <h2><?php echo esc_html( $subtitulo ); ?></h2>
        <?php endif; ?>

        <?php if ( get_field( 'mostrar_aviso' ) ) : ?>
            <p>Este es un aviso importante de Tueste Norte.</p>
        <?php endif; ?>

        <?php the_content(); ?>

    <?php
        endwhile;
    endif;
    ?>

</main>

<?php get_footer(); ?>