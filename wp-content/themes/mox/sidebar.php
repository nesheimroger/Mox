<aside class="sidebar clearfix">

    <?php
    if ( $keys = get_post_custom_keys() ) {
        foreach ( (array) $keys as $key ) {
            $keyt = trim($key);
            if ( '_' == $keyt{0})
                continue;
            $values = array_map('trim', get_post_custom_values($key));
            $value = implode($values,', ');

            echo '<section><div class="headline">'.$key.'</div><div class="content">'.$value.'</div></section>';
        }
    }
    ?>
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