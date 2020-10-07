<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package duongluat
 */

if ( ! is_active_sidebar( 'sidebar-block' ) ) {
	return;
}
?>

<div class="sidebar">
    <div class="content-sidebar-list">
	    <?php dynamic_sidebar( 'sidebar-block' ); ?>
    </div>
</div>
