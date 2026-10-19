
<?php get_header(); ?>

<main class="site-main">
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">
                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                </header>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            </article>

        <?php endwhile; ?>

        <?php the_posts_pagination(); ?>

    <?php else : ?>

        <p>No hay contenido disponible.</p>

    <?php endif; ?>
</main>

<?php get_footer(); ?>
