<?php
/**
 * Custom query for movie post
 *
 * Author: Gian MR - http://www.gianmr.com
 *
 * @since 1.0.0
 * @package Idmuvi Core
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'dlpro_custom_rewrite_rule' ) ) {
	/**
	 * Custom Rewrite Rule Download Page
	 */
	function dlpro_custom_rewrite_rule() {
		add_rewrite_endpoint( 'download', EP_PERMALINK );
	}
}
add_action( 'init', 'dlpro_custom_rewrite_rule', 10, 0 );

if ( ! function_exists( 'dlpro_filter_request' ) ) {
	/**
	 * Filter Request Download Page
	 *
	 * @link https://wordpress.stackexchange.com/questions/42279/custom-post-type-permalink-endpoint/42288
	 * @param String $vars Variable.
	 */
	function dlpro_filter_request( $vars ) {
		if ( isset( $vars['download'] ) && empty( $vars['download'] ) ) {
			$vars['download'] = true;
		} elseif ( isset( $vars['download'] ) && ! empty( $vars['download'] ) ) {
			$vars['download'] = 'notempty';
		}
		return $vars;
	}
}
add_filter( 'request', 'dlpro_filter_request' );

if ( ! function_exists( 'dlpro_catch_vars' ) ) {
	/**
	 * Catch Variable
	 */
	function dlpro_catch_vars() {
		global $wp_query;
		if ( is_singular( 'post' ) && ( 'notempty' === get_query_var( 'download' ) ) ) {
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
			get_template_part( 404 );
			exit();
		}
	}
}
add_action( 'template_redirect', 'dlpro_catch_vars' );
