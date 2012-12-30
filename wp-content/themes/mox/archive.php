<?php get_header() ?>
<section class="main-content clearfix archive">
    <article>
        <header>
            <?php if(is_category()) : ?>
                <h2>Posts in category: <span><?php echo single_cat_title(); ?></span></h2>
            <?php elseif(is_tag()) : ?>
                <h2>Posts tagged with: <span><?php echo single_tag_title() ?></span> </h2>
            <?php endif; ?>
        </header>
        <section class="post-list clearfix">

            <?php if ( have_posts() ) : ?>
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