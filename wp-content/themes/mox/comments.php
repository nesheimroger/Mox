
<?php if ( post_password_required() )
	return;
?>

<section>
    <header>
        <div class="headline large">Comments</div>
    </header>
    <section id="comments">
        <?php if ( have_comments()) : ?>

        <?php wp_list_comments( array( 'callback' => 'mox_comment')); ?>


        <?php else : ?>

            <p>No comments yet</p>

        <?php endif; ?>



    </section>
    <footer>
            <?php mox_comment_form() ?>
    </footer>
</section>