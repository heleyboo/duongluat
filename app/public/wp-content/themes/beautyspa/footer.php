<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beautyspa
 */
$func = function_exists('ts_get_option') ? 'ts_get_option' : 'get_option';
$footer_vars = array('%year%' , '%site%' , '%url%');
$footer_val  = array( date('Y') , get_bloginfo('name') , home_url() );
$footer_two  = str_replace( $footer_vars , $footer_val , $func( 'footer_two' ));
$footer_one  = str_replace( $footer_vars , $footer_val , $func( 'footer_one' ));
?>
</div><!-- #page -->

<!-- FOOTER START -->
<footer class="site-footer footer-light">
    <!-- COLL-TO ACTION START -->
    <div class="section-full overlay-wraper bg-primary" style="background-image:url(<?php echo get_template_directory_uri(); ?>/spa/images/background/bg-7.png);">

        <div class="section-content ">
            <!-- COLL-TO ACTION START -->
            <div class="wt-subscribe-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="call-to-action-left p-tb20 p-r50">
                                <h4 class="text-uppercase m-b10">We are ready to build your dream tell us more about your project</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra mauris eget tortor.</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="call-to-action-right p-tb30">
                                <a href="contact-1.html" class="site-button-secondry text-uppercase radius-sm font-weight-600">
                                    Contact us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER BLOCKES START -->
    <div class="footer-top overlay-wraper">
        <div class="overlay-main"></div>
        <div class="container">
            <div class="row">
                <!-- ABOUT COMPANY -->
                <div class="col-md-3 col-sm-6">
                    <?php
                        if ( is_active_sidebar( 'first-footer-widget-area' ) ) {
                            dynamic_sidebar( 'first-footer-widget-area' );
                        }
                    ?>
                </div>
                <!-- RESENT POST -->
                <div class="col-md-3 col-sm-6">
                    <?php
                        if ( is_active_sidebar( 'second-footer-widget-area' ) ) {
                            dynamic_sidebar( 'second-footer-widget-area' );
                        }
                    ?>
                </div>
                <!-- USEFUL LINKS -->
                <div class="col-md-3 col-sm-6">
                    <?php
                        if (has_nav_menu('footer-menu-2')) {
                            wp_nav_menu( array(
                                'container' => 'ul',
                                'menu_class' => 'copyrights-nav pull-right',
                                'theme_location' => 'footer-menu-2',
                            ) );
                        }
                    ?>
                    <?php
                        if ( is_active_sidebar( 'third-footer-widget-area' ) ) {
                            dynamic_sidebar( 'third-footer-widget-area' );
                        }
                    ?>
                </div>
                <!-- NEWSLETTER -->
                <div class="col-md-3 col-sm-6">
                    <?php
                        if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) {
                            dynamic_sidebar( 'fourth-footer-widget-area' );
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER COPYRIGHT -->
    <div class="footer-bottom overlay-wraper">
        <div class="overlay-main"></div>
        <div class="constrot-strip"></div>
        <div class="container p-t30">
            <div class="row">
                <div class="wt-footer-bot-left">
                    <span class="copyrights-text">
                        <?php echo htmlspecialchars_decode($footer_one) . htmlspecialchars_decode( $footer_two ); ?>
                    </span>
                </div>
                <div class="wt-footer-bot-right">
                    <?php
                    if (has_nav_menu('footer-menu-2')) {
                        wp_nav_menu( array(
                            'container' => 'ul',
                            'menu_class' => 'copyrights-nav pull-right',
                            'theme_location' => 'footer-menu-2',
                        ) );
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER END -->


<!-- BUTTON TOP START -->
<button class="scroltop"><span class=" iconmoon-house relative" id="btn-vibrate"></span>Top</button>

</div>


<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="cssload-container">
            <div class="cssload-progress cssload-float cssload-shadow">
                <div class="cssload-progress-item"></div>
            </div>
        </div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->

<?php wp_footer(); ?>

</body>
</html>
