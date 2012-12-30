<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php
        /*
       * Print the <title> tag based on what is being viewed.
       */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'mox' ), max( $paged, $page ) );

        ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <?php
    /* We add some JavaScript to pages with the comment form
      * to support sites with threaded comments (when in use).
      */
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    /* Always have wp_head() just before the closing </head>
      * tag of your theme, or you will break many plugins, which
      * generally use this hook to add elements to <head> such
      * as styles, scripts, and meta tags.
      */
    wp_head();

    ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
    <header class="outer-wrapper">
        <div id="header" class="inner-wrapper">
            <a id="logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Go to homepage</a>
            <h1 id="logo">
                <img alt="<?php bloginfo( 'name' ) ?>" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
            </h1>

        <?php if(!is_user_logged_in()) : ?>
        <div class="user">
            <a href="<?php echo wp_login_url(mox_current_page_url()) ?>">Login or register</a>
        </div>
        <?php endif ?>
        </div>
    </header>

    <section class="outer-wrapper body">
        <div id="body" class="inner-wrapper clearfix">
            <div class="breadcrumbs">
                <?php
                    if (!is_front_page()) {
                        echo '<a href="';
                        echo get_option('home');
                        echo '">';
                        bloginfo('name');
                        echo "</a> » ";

                        if (is_single()) {
                            the_category('title_li=');
                            if (is_single()) {
                                echo " » ";
                                echo the_title();
                            }
                        } elseif(is_category()){
                            echo "Categories » ";
                            echo single_cat_title();
                        }elseif (is_page() ) {
                            echo the_title();
                        } elseif(is_tag()){
                            echo "Tags » ";
                            echo single_tag_title();
                        } elseif(is_search()){
                            echo "Search » ";
                            echo get_search_query();
                        } elseif(is_home()){
                            mox_home_title();
                        }
                    }else{
                        echo '<a href="';
                        echo get_option('home');
                        echo '">';
                        echo bloginfo('name');
                        echo "</a>";

                    }
                ?>
            </div>

