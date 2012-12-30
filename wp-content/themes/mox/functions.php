<?php
if(!function_exists("mox_comment")){

    function mox_comment( $comment ) {
        $GLOBALS['comment'] = $comment;
        ?>

    <div <?php comment_class(); ?>>
        <header>
            <strong><?php comment_author() ?>, </strong> <span class="date"><?php comment_date() ?></span><?php edit_comment_link( __( 'Edit', 'mox' ), '<span class="edit-link">', '</span>' ); ?>
        </header>
        <?php if ( '0' == $comment->comment_approved ) : ?>
        <div class="comment-awaiting-moderation"><p>Your comment is awaiting moderation.</p></div>

        <?php else : ?>

        <div>
            <?php comment_text(); ?>
        </div>

        <?php endif; ?>
    </div>
    <?php
    }
}

add_filter('comment_form_default_fields', 'mox_remove_url');
function mox_remove_url($arg){
    $arg['url'] = '';
    return $arg;
}

function mox_comment_form($arg = null, $post_id = null){

    $arg['comment_field'] = '<textarea id="comment" name="comment" class="mce-comment" cols="20" rows="2" aria-required="true"></textarea>';
    $arg['comment_notes_after'] = '';
    $arg['comment_notes_before'] = '';
    $arg['title_reply'] = __( 'Add a comment' );
    $arg['must_log_in'] = '<p class="must-log-in">' .  sprintf( __( 'Please <a href="%s">login or register</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>';

    comment_form($arg, $post_id);
}

register_sidebar(array(
    'name' => 'Right sidebar',
    'id' => 'right_sidebar',
    'before_widget' => '<section>',
    'after_widget' => '</div></section>',
    'before_title' => '<div class="headline">',
    'after_title' => '</div><div class="content">',
));

register_sidebar(array(
    'name' => 'Posts',
    'id' => 'right_sidebar_posts',
    'before_widget' => '<section>',
    'after_widget' => '</div></section>',
    'before_title' => '<div class="headline">',
    'after_title' => '</div><div class="content">',
));

register_sidebar(array(
    'name' => 'Pages',
    'id' => 'right_sidebar_pages',
    'before_widget' => '<section>',
    'after_widget' => '</div></section>',
    'before_title' => '<div class="headline">',
    'after_title' => '</div><div class="content">',
));

register_sidebar(array(
    'name' => 'Archives and Search',
    'id' => 'right_sidebar_archives',
    'before_widget' => '<section>',
    'after_widget' => '</div></section>',
    'before_title' => '<div class="headline">',
    'after_title' => '</div><div class="content">',
));

register_sidebar(array(
    'name' => 'Footer',
    'id' => 'footer_area',
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
));

add_theme_support('post-thumbnails');

function load_scripts() {

    wp_enqueue_script(
        'tiny_mce',
        get_template_directory_uri() . '/js/tiny_mce/tiny_mce.js',
        array('jquery')
    );

    wp_enqueue_script(
        'slides',
        get_template_directory_uri() . '/js/jquery.slides.min.js',
        array('jquery')
    );

    wp_enqueue_script(
        'ellipsis',
        get_template_directory_uri() . '/js/jquery.autoellipsis.min.js',
        array('jquery')
    );

    wp_enqueue_script(
        'mox',
        get_template_directory_uri() . '/js/mox.js',
        array('jquery', 'slides', 'tiny_mce', 'ellipsis')
    );
}
add_action('wp_enqueue_scripts', 'load_scripts');

function mox_current_page_url() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function mox_home_content(){
    $postid = get_option('page_for_posts');
    $content_post = get_post($postid);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    echo $content;
}

function mox_home_title(){
    $postid = get_option('page_for_posts');
    $post = get_post($postid);
    $title = $post->post_title;
    $title = apply_filters('the_title', $title);
    $title = str_replace(']]>', ']]&gt;', $title);
    echo $title;
}


function mox_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'mox_excerpt_more');


add_filter( 'mce_buttons_2', 'mox_mce_buttons_2' );

function mox_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'mox_mce_before_init' );

function mox_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Preamble',
            'block' => 'div',
            'classes' => 'preamble',
            'wrapper' => true
        ),
        array(
            'title' => 'Box',
            'block' => 'div',
            'classes' => 'box',
            'wrapper' => true
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

add_action( 'admin_init', 'mox_editor_style' );

function mox_editor_style() {
    add_editor_style();
}

$role = get_role('editor');
$role->add_cap('edit_theme_options');