<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package freewpthemes
 */

?>

<!-- ============== Before Footer ====================== -->
<?php
if ( is_active_sidebar( 'footer-widget-1' ) ) {
    dynamic_sidebar( 'footer-widget-1' );
}
?>
<!-- =================== Before Footer ====================== -->

<!-- ================= footer start ========================= -->
<footer class="footer dark-bg">
    <div class="container">

        <!-- Row Start -->
        <div class="row">

            <div class="col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h4>Featured Destinations</h4>
                        <?php
                            if (has_nav_menu('footer-menu-1')) {
                                wp_nav_menu( array(
                                    'container' => 'ul',
                                    'theme_location' => 'footer-menu-1',
                                ) );
                            }
                        ?>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h4>Featured Tours</h4>
                        <?php
                            if (has_nav_menu('footer-menu-2')) {
                                wp_nav_menu( array(
                                    'container' => 'ul',
                                    'theme_location' => 'footer-menu-2',
                                ) );
                            }
                        ?>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h4>Featured Hotels</h4>
                        <?php
                            if (has_nav_menu('footer-menu-3')) {
                                wp_nav_menu( array(
                                    'container' => 'ul',
                                    'theme_location' => 'footer-menu-3',
                                ) );
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <h4>Subscribe Now</h4>
                <!-- Newsletter -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Email">
                    <span class="input-group-btn">
								<button type="button" class="btn btn-default"><i class="fa fa-location-arrow font-20"></i></button>
							</span>
                </div>

                <!-- Social Box -->
                <div class="f-social-box">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook facebook-cl"></i></a></li>
                        <li><a href="#"><i class="fa fa-google google-plus-cl"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter twitter-cl"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest pinterest-cl"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram instagram-cl"></i></a></li>
                    </ul>
                </div>

                <!-- App Links -->
                <div class="f-app-box">
                    <ul>
                        <li><a href="#"><i class="fa fa-apple"></i>App Store</a></li>
                        <li><a href="#"><i class="fa fa-android"></i>Play Store</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Row Start -->
        <div class="row">
            <div class="col-md-12">
                <div class="copyright text-center">
                    <p>&copy; Copyright 2020 | Powerd By <a href="https://mmovoz.com/" title="Themez Hub">MMO for Voz</a></p>
                </div>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
