<aside class="sidebar clearfix">

    <?php display_related_posts_via_taxonomies() ?>
    <?php if(is_single()  && has_tag()) : ?>
    <section>
        <div class="headline">Tags</div>
        <div class="content">
            <?php the_tags("<ul><li>","</li><li>","</li></ul>") ?>
        </div>
    </section>
    <?php endif; ?>



    <?php
        if ( dynamic_sidebar('right_sidebar') ) :
        else :
        ?>
        <?php endif;
    ?>


    <?php
    if ( is_single() && dynamic_sidebar('right_sidebar_posts') ) :
    else :
        ?>
        <?php endif;
    ?>

    <?php
    if ( is_page() && dynamic_sidebar('right_sidebar_pages') ) :
    else :
        ?>
        <?php endif;
    ?>

    <?php
    if ( (is_archive() || is_search() || is_home()) && dynamic_sidebar('right_sidebar_archives') ) :
    else :
        ?>
        <?php endif;
    ?>

</aside>