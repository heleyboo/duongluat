<?php
/*
Template Name: Why VietNam
*/
get_header('full');
?>
    <div class="context-page">
        <div class="wrap-content">
            <?php
            if ( is_active_sidebar( 'sidebar-block' ) ) {
                dynamic_sidebar( 'why-vietnam-block' );
            }
            ?>
            <div class="module-register-quick">
                <a class="btn btn-danger" data-toggle="collapse" href="#register-quick" role="button" aria-expanded="false" aria-controls="register-quick"><span>Get A Free Quotation to Get Started with this Service.</span><i class="fas fa-plus"></i></a>
                <div class="collapse" id="register-quick">
                    <?php echo do_shortcode('[contact-form-7 id="67" title="Contact" html_class="form"]') ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
