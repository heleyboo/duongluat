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
    <link rel="icon" type="image/ico" href=""><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
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

    <!-- HEADER START -->
    <header id="top">
        <div class="language">
            <ul class="list">
                <li class="is-active"><a class="item" href="#!">Tiếng việt</a></li>
                <li><a class="item" href="#!">Tiếng anh</a></li>
                <li><a class="item" href="#!">Tiếng nhật</a></li>
                <li><a class="item" href="#!">Tiếng hàn</a></li>
                <li><a class="item" href="#!">Tiếng hàn</a></li>
            </ul>
        </div>
        <div class="header-infor">
            <div class="logo">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if (has_custom_logo()) {
                    ?>
                    <img src="<?php echo esc_url( $image[0] )  ?>" alt="Duong Luat Logo" />
                <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/img_logo.png" alt="Duong Luat Logo" />
                <?php }
                ?>
            </div>
            <?php
                if ( is_active_sidebar( 'homepage-header-block' ) ) {
                    dynamic_sidebar( 'homepage-header-block' );
                }
            ?>
        </div>
        <div class="menu-area" id="menu_area">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <?php
                                if (has_nav_menu('main-menu')) {
                                    wp_nav_menu( array(
                                        'container' => 'ul',
                                        'menu_class' => 'navbar-nav mr-auto',
                                        'theme_location' => 'main-menu',
                                        'depth' => 2,
                                        'walker' => new CustomMenuWalker(),
                                    ) );
                                }
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END -->

    <!-- CONTENT START -->
    <div class="page-content has-sidebar">