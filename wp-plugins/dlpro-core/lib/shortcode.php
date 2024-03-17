<?php
/**
 * Shortcode
 *
 * @package Dlpro Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Shortcode Functions
 *
 * @param array $atts Array.
 */
function dlprocore_display_image_shortcode( $atts ) {

	// Pull in shortcode attributes and set defaults.
	$atts = shortcode_atts(
		array(
			'image_url' => '',
		),
		$atts
	);
	$image_url      = $atts['image_url'];
	$imageurl_array = @explode( ',', $image_url );
	
	wp_enqueue_style( 'dlpro-core-css', DLPRO_CORE_URL . 'script/glightbox.min.css', array(), '1.0.0' );
	wp_enqueue_script( 'dlpro-core-js', DLPRO_CORE_URL . 'script/glightbox.min.js', array(), '1.0.0', true );

	$output = '';
	if ( $imageurl_array ) {
		$output .= '<div class="dlpro-image-gallery">';
		foreach ( $imageurl_array as $image ) {
			$output .= '<a href="' . esc_url( trim( $image ) ) . '" rel="nofollow" data-type="image" class="glightbox"><img src="' . esc_url( trim( $image ) ) . '" alt="' . get_the_title() . '" loading="lazy" /></a>';
		}
		$output .= '</div>';
	}

	return $output;
}
add_shortcode( 'dlpro-gallery', 'dlprocore_display_image_shortcode' );
