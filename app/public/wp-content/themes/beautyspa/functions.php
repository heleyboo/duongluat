<?php
/**
 * beautyspa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beautyspa
 */
define ('THEME_NAME',		'Beauty Spa' );
define ('THEME_FOLDER',		'beautyspa' );
define ('THEME_VER',		'5.3.0'  );	//DB Theme Version


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


if ( ! function_exists( 'beautyspa_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function beautyspa_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on beautyspa, use a find and replace
		 * to change 'beautyspa' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'beautyspa', get_template_directory() . '/languages' );

        add_image_size( 'beautyspa-custom-logo', 9999, 37);

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Main menu', 'beautyspa' ),
			)
		);

        register_nav_menus(
            array(
                'footer-menu-1' => esc_html__( 'Footer menu 1', 'beautyspa' ),
            )
        );

        register_nav_menus(
            array(
                'footer-menu-2' => esc_html__( 'Footer menu 2', 'beautyspa' ),
            )
        );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'beautyspa_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 37,
				'width'       => 216,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'beautyspa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beautyspa_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'beautyspa_content_width', 640 );
}
add_action( 'after_setup_theme', 'beautyspa_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function beautyspa_scripts() {
    wp_enqueue_style( 'bootstrap', get_theme_file_uri('/spa/css/bootstrap.min.css'), array(), _S_VERSION );
    wp_enqueue_style( 'fontawesome', get_theme_file_uri('/spa/css/fontawesome/css/font-awesome.min.css'), array(), _S_VERSION );
    wp_enqueue_style( 'flaticon', get_theme_file_uri('/spa/css/flaticon.min.css'), array(), _S_VERSION );
    wp_enqueue_style( 'animate', get_theme_file_uri('/spa/css/animate.min.css'), array(), _S_VERSION );
    wp_enqueue_style( 'carousel', get_theme_file_uri('/spa/css/owl.carousel.min.css'), array(), _S_VERSION );
    wp_enqueue_style( 'bootstrap-select', get_theme_file_uri('/spa/css/bootstrap-select.min.css'), array(), _S_VERSION );
    wp_enqueue_style( 'magnific', get_theme_file_uri('/spa/css/magnific-popup.min.css'), array(), _S_VERSION );
    wp_enqueue_style( 'loader', get_theme_file_uri('/spa/css/loader.min.css'), array(), _S_VERSION );
    wp_enqueue_style( 'style', get_theme_file_uri('/spa/css/style.css'), array(), _S_VERSION );
    $theme_skin = function_exists('ts_get_option') ? ts_get_option('ts_theme_skin') : 'skin-1';
    wp_enqueue_style( 'skin', get_theme_file_uri('/spa/css/skin/' . $theme_skin . '.css'), array(), _S_VERSION );
    wp_enqueue_style( 'custom', get_theme_file_uri('/spa/css/custom.css'), array(), _S_VERSION );
    wp_enqueue_style( 'switcher', get_theme_file_uri('/spa/css/switcher.css'), array(), _S_VERSION );
    wp_enqueue_style( 'revolution-settings', get_theme_file_uri('/spa/plugins/revolution/revolution/css/settings.css'), array(), _S_VERSION );
    wp_enqueue_style( 'revolution-navigation', get_theme_file_uri('/spa/plugins/revolution/revolution/css/navigation.css'), array(), _S_VERSION );

    wp_enqueue_script( 'jquery', get_theme_file_uri( '/spa/js/jquery-1.12.4.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/spa/js/bootstrap.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'bootstrap-select', get_theme_file_uri( '/spa/js/bootstrap-select.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'jquery.bootstrap-touchspin', get_theme_file_uri( '/spa/js/jquery.bootstrap-touchspin.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'magnific', get_theme_file_uri( '/spa/js/magnific-popup.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'waypoints', get_theme_file_uri( '/spa/js/waypoints.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'counterup', get_theme_file_uri( '/spa/js/counterup.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'waypoints-sticky', get_theme_file_uri( '/spa/js/waypoints-sticky.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'isotope', get_theme_file_uri( '/spa/js/isotope.pkgd.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'carousel', get_theme_file_uri( '/spa/js/owl.carousel.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'stellar', get_theme_file_uri( '/spa/js/stellar.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'scrolla', get_theme_file_uri( '/spa/js/scrolla.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'custom', get_theme_file_uri( '/spa/js/custom.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'shortcode', get_theme_file_uri( '/spa/js/shortcode.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'switcher', get_theme_file_uri( '/spa/js/switcher.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'themepunch-tools', get_theme_file_uri( '/spa/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'themepunch-revolution', get_theme_file_uri( '/spa/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'revolution-plugin', get_theme_file_uri( '/spa/plugins/revolution/revolution/js/extensions/revolution-plugin.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'rev-script-1', get_theme_file_uri( '/spa/js/rev-script-1.js' ), array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'beautyspa_scripts' );

/**
 * Configuration for Theme setting Plugin
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Menu walker
 */
require get_template_directory() . '/inc/menu-walker/custom-menu-walker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

