<?php get_header() ?>

<section class="main-content clearfix archive">
    <article>
        <header>
            <h2><?php mox_home_title() ?></h2>
        </header>
        <section>
            <?php mox_home_content() ?>

            <?php if ( have_posts() ) : ?>

            <section class="post-list clearfix border-top">
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <article>
                    <header>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="published">Published <?php the_date() ?> by <?php the_author() ?> </p>
                    </header>
                    <section class="content">
                        <?php the_excerpt(); ?>
                    </section>
                </article>

                <?php endwhile; ?>
            </section>
            <?php endif; ?>
        </section>

        <footer>
            <div class="left">
                <?php posts_nav_link('','','&laquo; Older Posts'); ?>
            </div>
            <div class="right">
                <?php posts_nav_link('','Newer Posts &raquo;',''); ?>
            </div>
        </footer>

    </article>

</section>
<?php get_sidebar() ?>

<?php get_footer() ?>