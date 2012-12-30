<?php get_header() ?>
<section class="main-content clearfix">
    <?php if ( have_posts() ) : ?>
    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <article>
            <header>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
            <section>
                <?php the_content() ?>
            </section>
            <footer>
                <?php if("post" == get_post_type($post)) : ?>
                <div class="left">
                    <p> Published <?php the_date() ?> in <?php the_category(",") ?> </p>
                </div>
                <div class="right">
                    <p>Author: <?php the_author() ?></p>
                    <p>Last updated: <?php the_modified_date() ?></p>
                </div>
                <?php else : ?>
                <p class="textright">Last updated: <?php the_modified_date() ?></p>
                <?php endif; ?>
            </footer>
        </article>
        <?php if("post" == get_post_type($post)) : ?>
            <?php comments_template( '', true ); ?>
        <?php endif; ?>
        <?php endwhile; ?>

    <?php else : ?>

    <article id="post-0" class="post no-results not-found">
        <header>
            <h2>No post found</h2>
        </header>

        <section class="preamble">
            <p>Sorry, but we couldnt find what you were looking for.</p>
        </section>

    </article><!-- #post-0 -->

    <?php endif; ?>



</section>
 <?php get_sidebar() ?>

<?php get_footer() ?>