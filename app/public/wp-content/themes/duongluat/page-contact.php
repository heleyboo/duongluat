<?php
/*
Template Name: Contact Us
*/
get_header();
?>
    <div class="context-page">
        <div class="wrap-content">
            <div class="module-contact">
                <div class="heading-contact">
                    <img class="img" src="<?php echo get_template_directory_uri(); ?>/images/img_new.jpg" alt="">
                    <h1 class="title">Contact </h1><a class="enquire-new" href="#!">ENQUIRE NOW</a>
                </div>
                <div class="body-contact">
                    <div class="col col-left">
                            <h2 class="title">How can we help you?</h2>
                            <?php echo do_shortcode('[contact-form-7 id="48" title="Contact form 1"]') ?>
                    </div>
                    <div class="col col-right">
                        <h2 class="title">Contact Info</h2>
                        <div class="group-info">
                            <p><strong>Phone: </strong><span><?php echo ts_get_option(Setting::PHONE_NUMBER); ?></span></p>
                            <p> <strong>Email: </strong><span><?php echo ts_get_option(Setting::EMAIL); ?></span></p>
                            <p><strong>Office Address: </strong><span><?php echo ts_get_option(Setting::OFFICE_ADDRESS); ?></span></p>
                            <div class="maps"><iframe src="<?php echo ts_get_option(Setting::MAP_URL); ?>" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php
get_footer();
