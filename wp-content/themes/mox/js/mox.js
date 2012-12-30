jQuery(document).ready(function(){
    tinyMCE.init({
        mode: "specific_textareas",
        editor_selector: "mce-comment",
        theme: "simple",
        width: "660px",
        height: "192px"
    });

    jQuery(".slides").slides({
        preload: true,
        preloadImage: 'images/spinner.gif',
        play: 5000,
        pause: 2500,
        hoverPause: true,
        animationStart: function (current) {
            jQuery('.caption').animate({
                bottom: -65
            }, 100);
        },
        animationComplete: function (current) {
            jQuery('.caption').animate({
                bottom: 0
            }, 200);
        },
        slidesLoaded: function () {
            jQuery('.caption').animate({
                bottom: 0
            }, 200);


        }
    });

    var stickyFooter = {
        Adjust: function () {
            var footer = jQuery("footer.outer-wrapper");

            if (footer.height() > 150) {
                jQuery(".footer-pusher").height(footer.height());
                footer.css("margin-top", 0 - footer.height())
            }
        }
    };

    stickyFooter.Adjust();

    jQuery('.post-list article .content').ellipsis();

});


	