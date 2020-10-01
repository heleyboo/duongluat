<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beautyspa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<?php
$backgroundImage = '';

$func = function_exists('ts_get_option') ? 'ts_get_option' : 'get_option';

$theme_layout = is_boxed_layout() ? 'boxed' : 'wide-layout';
$backgroundPattern = get_current_background_pattern();

if( $backgroundPattern ) {
    $backgroundImage = 'style="background-image: url(' . $backgroundPattern . '); background-size: auto;"';
}
?>

<body id="bg" <?php body_class($theme_layout); ?> <?php echo $backgroundImage ?>>
<?php wp_body_open(); ?>
<div class="page-wraper">
    <!-- HEADER START -->
    <?php
        $navLayoutStyle = $func('nav_layout_style') ? $func('nav_layout_style') : 'nav-boxed';
    ?>
    <header class="site-header header-style-6 <?php echo $navLayoutStyle; ?>">

        <!-- Search Form -->
        <div class="main-bar header-middle bg-white">
            <div class="container">
                <div class="logo-header">
                    <a href="<?php echo home_url(); ?>">
                        <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if (has_custom_logo()) {
                            ?>
                            <img src="<?php echo esc_url( $image[0] )  ?>" width="216" height="37" alt="" />
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/spa/images/logo-dark.png" width="216" height="37" alt="" />
                        <?php }
                        ?>
                    </a>
                </div>
                <div class="header-info">
                    <ul>
                        <li>
                            <div>
                                <div class="icon-sm">
                                    <span class="icon-cell  text-primary"><i class="flaticon-placeholder"></i></span>
                                </div>
                                <div class="icon-content">
                                    <strong>Our Location </strong>
                                    <span>145 N Los Ave, NY</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <div class="icon-sm">
                                    <span class="icon-cell  text-primary"><i class="flaticon-smartphone"></i></span>
                                </div>
                                <div class="icon-content">
                                    <strong>Phone Number</strong>
                                    <span>1500-2309-0202</span>
                                </div>
                            </div>
                        </li>
                        <li class="btn-col-last">
                            <a class="site-button text-uppercase radius-sm font-weight-700">Book Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Search Form -->
        <?php
            $navSticky = $func('sticky_header') ? $func('sticky_header') : 'sticky-header';
        ?>
        <div class="<?php echo $navSticky ?> main-bar-wraper">
            <div class="main-bar header-botton nav-bg-secondry">
                <div class="container">
                    <!-- NAV Toggle Button -->
                    <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- ETRA Nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <a href="#search" class="site-search-btn"><i class="fa fa-search"></i></a>
                        </div>
                        <div class="extra-cell">
                            <a href="javascript:;" class="wt-cart cart-btn" title="Your Cart">
                                    <span class="link-inner">
                                        <span class="woo-cart-total"> </span>
                                        <span class="woo-cart-count">
                                            <span class="shopping-bag wcmenucart-count ">4</span>
                                        </span>
                                    </span>
                            </a>

                            <div class="cart-dropdown-item-wraper clearfix">
                                <div class="nav-cart-content">

                                    <div class="nav-cart-items p-a15">
                                        <div class="nav-cart-item clearfix">
                                            <div class="nav-cart-item-image">
                                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/spa/images/cart/pic-1.jpg" alt="p-1"></a>
                                            </div>
                                            <div class="nav-cart-item-desc">
                                                <a href="#">Product One</a>
                                                <span class="nav-cart-item-price"><strong>2</strong> x $19.99</span>
                                                <a href="#" class="nav-cart-item-quantity">x</a>
                                            </div>
                                        </div>
                                        <div class="nav-cart-item clearfix">
                                            <div class="nav-cart-item-image">
                                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/spa/images/cart/pic-2.jpg" alt="p-2"></a>
                                            </div>
                                            <div class="nav-cart-item-desc">
                                                <a href="#">Product Two</a>
                                                <span class="nav-cart-item-price"><strong>1</strong> x $24.99</span>
                                                <a href="#" class="nav-cart-item-quantity">x</a>
                                            </div>
                                        </div>
                                        <div class="nav-cart-item clearfix">
                                            <div class="nav-cart-item-image">
                                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/spa/images/cart/pic-3.jpg" alt="p-1"></a>
                                            </div>
                                            <div class="nav-cart-item-desc">
                                                <a href="#">Product Three</a>
                                                <span class="nav-cart-item-price"><strong>2</strong> x $19.99</span>
                                                <a href="#" class="nav-cart-item-quantity">x</a>
                                            </div>
                                        </div>
                                        <div class="nav-cart-item clearfix">
                                            <div class="nav-cart-item-image">
                                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/spa/images/cart/pic-4.jpg" alt="p-2"></a>
                                            </div>
                                            <div class="nav-cart-item-desc">
                                                <a href="#">Product Four</a>
                                                <span class="nav-cart-item-price"><strong>1</strong> x $24.99</span>
                                                <a href="#" class="nav-cart-item-quantity">x</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nav-cart-title p-tb10 p-lr15 clearfix">
                                        <h4  class="pull-left m-a0">Subtotal:</h4>
                                        <h5 class="pull-right m-a0">$114.95</h5>
                                    </div>
                                    <div class="nav-cart-action p-a15 clearfix">
                                        <button class="site-button  btn-block m-b15 " type="button">View Cart</button>
                                        <button class="site-button  btn-block" type="button">Checkout </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- SITE Search -->
                    <?php get_search_form(); ?>

                    <!-- MAIN Nav -->
                    <?php
                        $navColorStyle = $func('nav_color_style') ? $func('nav_color_style') : 'dark';
                    ?>
                    <div class="header-nav navbar-collapse collapse <?php echo 'nav-' . $navColorStyle ?>">
                        <?php
                        if (has_nav_menu('main-menu')) {
                            wp_nav_menu( array(
                                'container' => 'ul',
                                'menu_class' => 'nav navbar-nav',
                                'theme_location' => 'main-menu',
                                'depth' => 2,
                                'walker' => new CustomMenuWalker(),
                            ) );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- HEADER END -->

    <!-- CONTENT START -->
    <div class="page-content">