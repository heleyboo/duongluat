<?php
/**
 * Plugin Name: Theme setting
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Hoan
 * Author URI: http://www.mywebsite.com
 */

$currentTheme = wp_get_theme()->__toString();

define ('THEME_NAME', $currentTheme);

function get_plugin_dir() {
    return plugin_dir_path( __FILE__ );
}

function get_plugin_uri() {
    return plugin_dir_url(__FILE__);
}


/*-----------------------------------------------------------------------------------*/
# Get Theme Options
/*-----------------------------------------------------------------------------------*/
function ts_get_option( $name ) {
    $get_options = get_option( 'ts_options' );

    if( !empty( $get_options[$name] ))
        return $get_options[$name];

    return false ;
}
require_once ( get_plugin_dir() . '/framework/admin/inc/constants/InputType.php');
require_once ( get_plugin_dir() . '/framework/admin/inc/constants/DefaultSetting.php');
require_once ( get_plugin_dir() . '/framework/admin/framework-admin.php' );
require_once ( get_plugin_dir() . '/framework/admin/default-settings.php');
require_once ( get_plugin_dir() . '/framework/frontend/functions.php');