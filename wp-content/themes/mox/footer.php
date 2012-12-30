        </div><!-- #body.inner-wrapper.clearfix-->
    </section><!-- .outer-wrapper.body -->
    <div class="footer-pusher"></div>
</div><!-- .wrapper -->

<footer role="contentinfo" class="outer-wrapper">
    <div id="footer" class="inner-wrapper">
    <ul>
        <?php
        if ( !dynamic_sidebar('footer_area') ) : ?>
                <?php wp_list_pages("title_li=Pages&depth=1") ?>
                <?php wp_list_categories("title_li=Categories") ?>
        <?php endif; ?>
    </ul>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>