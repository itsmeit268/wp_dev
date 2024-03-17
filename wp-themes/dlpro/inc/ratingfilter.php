<?php
/**
 * Rating Filter File.
 *
 * @link https://blazzdev.com/documentation/rate-my-post-documentation/#getting-started
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'dlpro_remove_ratingarchive' ) ) :
	/**
	 * Remove rating in archive, because we use shortcode for displaying it.
	 */
	function dlpro_remove_ratingarchive() {
		return false;
	}
endif; // endif gmr_jetpack_setup.
add_filter( 'rmp_archive_results', 'dlpro_remove_ratingarchive' );

if ( ! function_exists( 'dlpro_modify_rmp_strings' ) ) :
	/**
	 * Change title rating.
	 *
	 * @param array $strings_array String title.
	 * @return array
	 */
	function dlpro_modify_rmp_strings( $strings_array ) {
		// modify only for Book custom post type.
		if ( is_singular( 'post' ) ) {
			$strings_array['rateTitle']        = __( 'Rating', 'dlpro' );
			$strings_array['rateSubtitle']     = '';
			$strings_array['afterVote']        = __( 'Thank you for rating this software', 'dlpro' );
			$strings_array['socialTitle']      = __( 'As you found this software useful...', 'dlpro' );
			$strings_array['feedbackTitle']    = __( 'How come you did not like this software?', 'dlpro' );
			$strings_array['feedbackSubtitle'] = __( 'How could this software be improved?', 'dlpro' );
			$strings_array['feedbackText']     = __( 'Give us some tips...', 'dlpro' );
		}
		return $strings_array;
	}
endif;
add_filter( 'rmp_custom_strings', 'dlpro_modify_rmp_strings' );
