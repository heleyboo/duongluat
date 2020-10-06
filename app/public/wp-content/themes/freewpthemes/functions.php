<?php
/**
 * freewpthemes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package freewpthemes
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'freewpthemes_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function freewpthemes_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on freewpthemes, use a find and replace
		 * to change 'freewpthemes' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'freewpthemes', get_template_directory() . '/languages' );

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
				'main-menu' => esc_html__( 'Main menu', 'freewpthemes' ),
			)
		);

        register_nav_menus(
            array(
                'footer-menu-1' => esc_html__( 'Footer menu 1', 'freewpthemes' ),
            )
        );

        register_nav_menus(
            array(
                'footer-menu-2' => esc_html__( 'Footer menu 2', 'freewpthemes' ),
            )
        );

        register_nav_menus(
            array(
                'footer-menu-3' => esc_html__( 'Footer menu 3', 'freewpthemes' ),
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
				'freewpthemes_custom_background_args',
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
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);


        add_theme_support( 'post-thumbnails' );
        add_image_size( 'freewptheme-50-50', 50, 50, true );
        add_image_size( 'freewptheme-100-100', 100, 100, true );
        add_image_size( 'freewptheme-120-120', 120, 120, true );
        add_image_size( 'freewptheme-228-250', 228, 250, true );
        add_image_size( 'freewptheme-372-189', 372, 189, true );

        add_theme_support( 'gutenberg', array( 'wide-images' => true ));
	}
endif;
add_action( 'after_setup_theme', 'freewpthemes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function freewpthemes_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'freewpthemes_content_width', 640 );
}
add_action( 'after_setup_theme', 'freewpthemes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function freewpthemes_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer widget 1', 'freewpthemes' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add widgets here.', 'freewpthemes' ),
		)
	);

    register_sidebar(
        array(
            'name'          => esc_html__( 'Theme sidebar widget', 'freewpthemes' ),
            'id'            => 'theme-sidebar-widget',
            'description'   => esc_html__( 'Add widgets here.', 'freewpthemes' ),
        )
    );
}
add_action( 'widgets_init', 'freewpthemes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function freewpthemes_scripts() {
    wp_enqueue_style( 'plugin', get_theme_file_uri('/plugins/css/plugins.css'), array(), _S_VERSION );
	wp_enqueue_style( 'freewpthemes-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'responsiveness', get_theme_file_uri('/css/responsiveness.css'), array(), _S_VERSION );
    wp_enqueue_style( 'default-skin', get_theme_file_uri('/css/skins/default.css'), array(), _S_VERSION );

    wp_enqueue_script( 'jquery', get_theme_file_uri( '/plugins/js/jquery.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/plugins/js/bootstrap.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'viewportchecker', get_theme_file_uri( '/plugins/js/viewportchecker.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'bootsnav', get_theme_file_uri( '/plugins/js/bootsnav.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'slick', get_theme_file_uri( '/plugins/js/slick.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'jquery.nice-select', get_theme_file_uri( '/plugins/js/jquery.nice-select.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'jquery.fancybox', get_theme_file_uri( '/plugins/js/jquery.fancybox.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'jquery.downCount', get_theme_file_uri( '/plugins/js/jquery.downCount.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'freshslider', get_theme_file_uri( '/plugins/js/freshslider.1.0.0.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'moment', get_theme_file_uri( '/plugins/js/moment.min.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'wysihtml5', get_theme_file_uri( '/plugins/js/wysihtml5-0.3.0.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'bootstrap-wysihtml5', get_theme_file_uri( '/plugins/js/bootstrap-wysihtml5.js' ), array(), _S_VERSION, true );
    wp_enqueue_script( 'jquery.slimscroll', get_theme_file_uri( '/plugins/js/jquery.slimscroll.min.js' ), array(), '20181214', true );
    wp_enqueue_script( 'jquery.metisMenu', get_theme_file_uri( '/plugins/js/jquery.metisMenu.js' ), array(), '20181214', true );
    wp_enqueue_script( 'jquery.easing', get_theme_file_uri( '/plugins/js/jquery.easing.min.js' ), array(), '20181214', true );
    wp_enqueue_script( 'custom', get_theme_file_uri( '/js/custom.js' ), array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'freewpthemes_scripts' );

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
 * Custom post type
 */
require get_template_directory() . '/inc/custom-post-type/theme.php';

/**
 * Theme view counts
 */
require get_template_directory() . '/inc/count-view.php';

/**
 * Menu walker
 */
require get_template_directory() . '/inc/menu-walker/custom-menu-walker.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets/ContactUsWidget.php';
require get_template_directory() . '/inc/widgets/SimilarThemeWidget.php';

/**
 * Theme functions
 */
require get_template_directory() . '/inc/theme-functions.php';

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*  freewpthemes Register Required Plugins Start */

add_action( 'tgmpa_register', 'freewpthemes_register_required_plugins' );

function freewpthemes_register_required_plugins() {

    $plugins = array(

        array(
            'name'     				=> esc_html__('Meta Box', 'freewpthemes'),
            'slug'     				=> 'meta-box',
            'required' 				=> true,
            'version' 				=> '5.3.1',
            'force_activation' 		=> false,
            'force_deactivation' 	=> false,
            'external_url' 			=> '',
        ),
        array(
            'name'     				=> esc_html__('Simple Download Monitor', 'freewpthemes'),
            'slug'     				=> 'simple-download-monitor',
            'required' 				=> true,
            'version' 				=> '3.8.6',
            'force_activation' 		=> false,
            'force_deactivation' 	=> false,
            'external_url' 			=> '',
        ),
    );

    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}

/*  freewpthemes Register Required Plugins End */

