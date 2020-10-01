<?php

if( is_admin() ){
	// Option builder
	require_once ( get_plugin_dir() . '/framework/admin/inc/builder/option-builder.php');

	//TIEPANEL
	require_once ( get_plugin_dir() . '/framework/admin/framework-panel.php');

	/*-----------------------------------------------------------------------------------*/
	# Register main Scripts and Styles
	/*-----------------------------------------------------------------------------------*/
	function tie_admin_register() {
		wp_register_script( 'tie-admin-main', get_plugin_uri() . '/framework/admin/js/tie.js', array( 'jquery' ) , false , false );
		wp_register_script( 'tie-admin-icon-picker', get_plugin_uri() . '/framework/admin/js/icon-picker.js', array( 'jquery' ) , false , false );
		wp_register_script( 'tie-admin-colorpicker', get_plugin_uri() . '/framework/admin/js/colorpicker.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-sortable', 'jquery-ui-slider' ) , false , false );

		wp_register_style( 'tie-style', get_plugin_uri().'/framework/admin/style.css', array(), '', 'all' );
		wp_register_style( 'tie-fonts', get_plugin_uri().'/framework/admin/fonts.css', array(), '', 'all' );
		wp_register_style( 'tie-fontawesome', get_plugin_uri().'/fonts/fontawesome/font-awesome.min.css', array(), '', 'all' );

		if ( (isset( $_GET['page'] ) && $_GET['page'] == 'panel') ) {
			wp_enqueue_script( 'tie-admin-colorpicker');
		}

		wp_enqueue_script( 'tie-admin-main' );
		wp_enqueue_style( 'tie-style' );
		wp_enqueue_style( 'tie-fonts' );
	}
	add_action( 'admin_enqueue_scripts', 'tie_admin_register' );
}

/*-----------------------------------------------------------------------------------*/
# Custom Admin Bar Menus
/*-----------------------------------------------------------------------------------*/
function tie_admin_bar() {
	global $wp_admin_bar;

	if ( current_user_can( 'switch_themes' ) ){
		$wp_admin_bar->add_menu( array(
			'parent' => 0,
			'id' => 'mpanel_page',
			'title' => THEME_NAME ,
			'href' => admin_url( 'admin.php?page=panel')
		) );
	}
}
add_action( 'wp_before_admin_bar_render', 'tie_admin_bar' );

?>
