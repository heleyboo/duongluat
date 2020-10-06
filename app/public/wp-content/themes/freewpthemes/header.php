<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package freewpthemes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- ======================= Start Navigation ===================== -->
<nav class="navbar navbar-default navbar-mobile navbar-fixed light bootsnav">
    <div class="container">

        <!-- Start Logo Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo logo-display" alt="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo logo-scrolled" alt="">
            </a>

        </div>
        <!-- End Logo Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <!-- Navigation Menu-->
            <?php
                if (has_nav_menu('main-menu')) {
                    wp_nav_menu( array(
                        'container' => 'ul',
                        'menu_class' => 'nav navbar-nav navbar-left',
                        'theme_location' => 'main-menu',
                        'depth' => 2,
                        'walker' => new CustomMenuWalker(),
                    ) );
                }
            ?>
            <!-- End navigation menu  -->
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
<!-- ======================= End Navigation ===================== -->
