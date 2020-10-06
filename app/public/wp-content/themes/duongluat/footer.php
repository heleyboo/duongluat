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
</div>
<div class="footer"><a class="back-to-top" href="#top"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M5 4v2h14V4H5zm0 10h4v6h6v-6h4l-7-7-7 7z"/></svg><span>Top</span></a>
    <div class="container">
        <div class="footer-widgets">
            <div class="row">
                <?php
                    if ( is_active_sidebar( 'homepage-footer-block' ) ) {
                        dynamic_sidebar( 'homepage-footer-block' );
                    }
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="content">
                        <h3>Menu</h3>
                        <?php
                            if (has_nav_menu('footer-menu')) {
                                wp_nav_menu( array(
                                    'container' => 'ul',
                                    'menu_class' => 'list',
                                    'theme_location' => 'footer-menu',
                                ) );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 ml-auto">
                    <div class="content">
                        <h3>Subscribe Newsletter</h3>
                        <div class="register-footer">
                            <p class="mb-2">For important legal updates and investment opportunities in Vietnam</p>
                            <div class="group d-flex align-items-center">
                                <input class="input is-large" type="text" placeholder="Nhập địa chỉ email">
                                <button class="button is-primary is-large ml-2">Subscribe</button>
                            </div>
                            <div class="group-social"><a class="item" href="#!"><i class="fab fa-facebook-f"></i></a><a class="item" href="#!"><i class="fab fa-instagram"></i></a><a class="item" href="#!"><i class="fab fa-youtube"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-detail">
    <div class="container">
        <div class="count-user">
            <div class="dot"></div><span><?php echo 500 + rand(150, 180); ?> người truy cập</span>
        </div>
        <div class="term">
            <p>Copyright © 2020 Duong Luat</p>
            <div class="term-list">
                <a class="item" href="#!">Privacy Policy</a>
                <a class="item" href="#!">Terms of Use</a>
                <a class="item" href="#!">Sitemap</a>
                <a class="item" href="#!">Feeds</a>
            </div>
        </div>
    </div>
</div>
<div class="bl-tooltip">
</div>
<div class="bl-popup">
</div>
<div class="bl-modal">
</div>


<?php wp_footer(); ?>

</body>
</html>
