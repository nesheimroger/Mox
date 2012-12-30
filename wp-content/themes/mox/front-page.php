<?php get_header() ?>
<section class="single-column main-content clearfix front-page">
    <?php
    $slider_query = new WP_Query('showposts=6'); ?>


    <?php if ( $slider_query->have_posts() ) : ?>




    <section class="slides">
        <div class="slides_container">
            <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                <div class="slide-item-<?php the_ID() ?>">
                    <a href="<?php the_permalink() ?>">
                        <?php if(has_post_thumbnail()) :
                            the_post_thumbnail(array(672,378));
                        else :?>
                            <img src="<?php echo get_template_directory_uri() . '/images/missing-image.png' ?>" width="672" height="378" alt="Missing image" />
                        <?php endif; ?></a>
                    <div class="caption">
                    <?php the_excerpt() ?>
                    </div>
                </div>

            <?php
            endwhile; ?>
        </div><nav class="post-list">
                    <div class="headline">Recent posts</div>
                    <ul>
                        <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                            <li class="slide-nav-<?php the_ID() ?>">
                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                <p>by <?php the_author() ?>, <?php the_date() ?> </p>
                            </li>
                        <?php
                        endwhile; ?>
                    </ul>
                    <a class="button" href="<?php echo get_permalink(get_option('page_for_posts'));?>">View more posts</a>
        
        </nav>
    </section>


    <?php endif; ?>

    <?php if(have_posts()) : ?>

    <section class="content clearfix">
        <? while(have_posts()) : the_post(); ?>
            <?php the_content() ?>
        <?php endwhile; ?>

    </section>

    <?php endif; ?>

</section>

<?php get_footer() ?>