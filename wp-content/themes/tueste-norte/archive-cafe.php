
<?php get_header(); ?>

<main class="site-main">
    <header class="entry-header">
        <h1 class="entry-title">Nuestro catálogo de cafés</h1>
        <p>Descubre nuestros cafés de distintos orígenes y niveles de tueste.</p>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="cafes-grid">

            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="entry-title">
                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </a>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        Ver ficha del café
                    </a>
                </article>

            <?php endwhile; ?>

        </div>

        <?php the_posts_pagination(); ?>

    <?php else : ?>
        <p>Todavía no hay cafés en el catálogo.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
