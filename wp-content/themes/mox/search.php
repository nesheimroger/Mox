<?php get_header() ?>
<section class="main-content clearfix search">

    <h2>Search results for: <span><?php echo get_search_query() ?></span></h2>
    <?php if ( have_posts() ) : ?>
    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <article>
            <header>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="published">Published <?php the_date() ?> by <?php the_author() ?> </p>
            </header>
            <section class="preamble">
                <?php the_excerpt(); ?>
            </section>
        </article>

        <?php endwhile; ?>
    <?php endif; ?>



</section>
<?php get_sidebar() ?>

<?php get_footer() ?>