<?php
/**
 * Custom taxonomy for movie post
 *
 * Author: Gian MR - http://www.gianmr.com
 *
 * @since 1.0.0
 * @package Dlpro Core
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'dlpro_core_post_menu_label' ) ) {
	/**
	 * Change post menu label
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_core_post_menu_label() {
		global $menu;
		global $submenu;
		$menu[5][0]                 = __( 'Software', 'dlpro-core' );
		$submenu['edit.php'][5][0]  = __( 'All Software', 'dlpro-core' );
		$submenu['edit.php'][10][0] = __( 'Add Software', 'dlpro-core' );
		echo '';
	}
}
add_action( 'admin_menu', 'dlpro_core_post_menu_label' );

if ( ! function_exists( 'dlpro_core_post_object_label' ) ) {
	/**
	 * Change post object label
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_core_post_object_label() {
		global $wp_post_types;
		$labels                = &$wp_post_types['post']->labels;
		$labels->name          = __( 'Software', 'dlpro-core' );
		$labels->singular_name = __( 'Software', 'dlpro-core' );
		$labels->add_new       = __( 'Add Software', 'dlpro-core' );
		$labels->add_new_item  = __( 'Add New Software', 'dlpro-core' );
		$labels->edit_item     = __( 'Edit Software', 'dlpro-core' );
		$labels->new_item      = __( 'Software', 'dlpro-core' );
	}
}
add_action( 'init', 'dlpro_core_post_object_label' );

if ( ! function_exists( 'dlpro_core_admin_post_menu_icons_css' ) ) {
	/**
	 * Add css
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_core_admin_post_menu_icons_css() {
		?>
		<style>
			.dashicons-admin-post:before,
			.dashicons-format-standard:before{content:"\f219"}
		</style>
		<?php
	}
}
add_action( 'admin_head', 'dlpro_core_admin_post_menu_icons_css' );
