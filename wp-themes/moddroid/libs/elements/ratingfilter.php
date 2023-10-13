<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'mdr_remove_ratingarchive' ) ) :
	/**
	 * Remove rating in archive, because we use shortcode for displaying it.
	 */
	function mdr_remove_ratingarchive() {
		return false;
	}
endif;
add_filter( 'rmp_archive_results', 'mdr_remove_ratingarchive' );

if ( ! function_exists( 'mdr_modify_rmp_strings' ) ) :
function mdr_modify_rmp_strings( $strings_array ) {
		// modify only for Book custom post type.
		if ( is_singular( 'post' ) ) {
			$strings_array['rateTitle']        = __( 'Rating', THEMES_NAMES );
			$strings_array['rateSubtitle']     = '';
			$strings_array['afterVote']        = __( 'Thank you for rating this software', THEMES_NAMES );
			$strings_array['socialTitle']      = __( 'As you found this software useful...', THEMES_NAMES );
			$strings_array['feedbackTitle']    = __( 'How come you did not like this software?', THEMES_NAMES );
			$strings_array['feedbackSubtitle'] = __( 'How could this software be improved?', THEMES_NAMES );
			$strings_array['feedbackText']     = __( 'Give us some tips...', THEMES_NAMES );
		}
		return $strings_array;
}
endif;
add_filter( 'rmp_custom_strings', 'mdr_modify_rmp_strings' );