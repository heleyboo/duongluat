<?php
/**
 * duongluat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package duongluat
 */
define ('THEME_NAME',		'Duong Luat' );
define ('THEME_FOLDER',		'duongluat' );
define ('THEME_VER',		'5.3.0'  );	//DB Theme Version


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


if ( ! function_exists( 'duongluat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function duongluat_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on duongluat, use a find and replace
		 * to change 'duongluat' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'duongluat', get_template_directory() . '/languages' );

        add_image_size( 'duongluat-custom-logo', 9999, 37);

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
				'main-menu' => esc_html__( 'Main menu', 'duongluat' ),
			)
		);

        register_nav_menus(
            array(
                'footer-menu' => esc_html__( 'Footer menu 1', 'duongluat' ),
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
				'duongluat_custom_background_args',
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
add_action( 'after_setup_theme', 'duongluat_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function duongluat_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'duongluat_content_width', 640 );
}
add_action( 'after_setup_theme', 'duongluat_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function duongluat_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Homepage widget', 'duongluat' ),
            'id'            => 'homepage-central-block',
            'description'   => esc_html__( 'Add widgets here.', 'duongluat' ),
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Home page header', 'duongluat' ),
            'id'            => 'homepage-header-block',
            'description'   => esc_html__( 'Add widgets here.', 'duongluat' ),
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Home page posts', 'duongluat' ),
            'id'            => 'homepage-post-block',
            'description'   => esc_html__( 'Home page posts.', 'duongluat' ),
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Home footer blocks', 'duongluat' ),
            'id'            => 'homepage-footer-block',
            'description'   => esc_html__( 'Home footer blocks', 'duongluat' ),
        )
    );
}
add_action( 'widgets_init', 'duongluat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function duongluat_scripts() {
    wp_enqueue_style( 'bootstrap', get_theme_file_uri('/css/layout.css'), array(), _S_VERSION );

    wp_enqueue_script( 'jquery', get_theme_file_uri( '/js/jquery.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/js/bootstrap.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'main', get_theme_file_uri( '/js/main.js' ), array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'duongluat_scripts' );

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets/VideoWidget.php';

require get_template_directory() . '/inc/widgets/ServicesWidget.php';

require get_template_directory() . '/inc/widgets/HeaderInfoWidget.php';

require get_template_directory() . '/inc/widgets/HomePostsWidget.php';

require get_template_directory() . '/inc/widgets/ContactInfoWidget.php';

/**
 * Configuration for Theme setting Plugin
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom post type
 */
require get_template_directory() . '/inc/custom-post-type/service.php';

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

