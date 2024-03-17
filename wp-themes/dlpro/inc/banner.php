<?php
/**
 * Banner features
 *
 * Author: Gian MR - http://www.gianmr.com
 *
 * @since 1.0.0
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'dlpro_top_banner_after_menu' ) ) {

	/**
	 * Adding banner at top via hook
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_top_banner_after_menu() {
		$banner    = get_theme_mod( 'gmr_adsaftermenu' );

		if ( isset( $banner ) && ! empty( $banner ) ) {
			echo '<div class="container">';
				echo '<div class="dlpro-topbanner-aftermenu">';
				echo do_shortcode( $banner );
				echo '</div>';
			echo '</div>';
		}
	}
}
add_action( 'dlpro_top_banner_after_menu', 'dlpro_top_banner_after_menu', 10 );

if ( ! function_exists( 'dlpro_banner_before_content' ) ) {

	/**
	 * Adding banner at before content via hook
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_banner_before_content() {
		$banner    = get_theme_mod( 'gmr_adsbeforecontent' );
		$position  = get_theme_mod( 'gmr_adsbeforecontentposition' );

		if ( isset( $banner ) && ! empty( $banner ) ) {
			if ( 'floatleft' === $position ) {
				$class = ' pull-left';
			} elseif ( 'floatright' === $position ) {
				$class = ' pull-right';
			} elseif ( 'center' === $position ) {
				$class = ' text-center';
			} else {
				$class = '';
			}
			echo '<div class="dlpro-banner-beforecontent' . esc_html( $class ) . '">';
			echo do_shortcode( $banner );
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'dlpro_add_banner_before_content' ) ) :
	/**
	 * Insert content after box content single
	 *
	 * @since 1.0.0
	 * @param string $content Content.
	 * @return string $content
	 */
	function dlpro_add_banner_before_content( $content ) {
		if ( is_singular( array( 'post', 'blogs' ) ) && in_the_loop() ) {
			$content = dlpro_banner_before_content() . $content;
		}
		return $content;
	}
endif; // endif dlpro_add_banner_before_content.
add_filter( 'the_content', 'dlpro_add_banner_before_content', 30, 1 );

if ( ! function_exists( 'dlpro_banner_after_content' ) ) {

	/**
	 * Adding banner at before content via hook
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function dlpro_banner_after_content() {
		$banner    = get_theme_mod( 'gmr_adsaftercontent' );
		$position  = get_theme_mod( 'gmr_adsaftercontentposition' );

		$ads = '';
		
		if ( isset( $banner ) && ! empty( $banner ) ) {
			if ( 'right' === $position ) {
				$class = ' dlpro-center-right';
			} elseif ( 'center' === $position ) {
				$class = ' dlpro-center-ads';
			} else {
				$class = '';
			}
			$ads .= '<div class="dlpro-banner-aftercontent' . esc_html( $class ) . '">';
			$ads .= do_shortcode( $banner );
			$ads .= '</div>';
		}
		return $ads;
	}
}

if ( ! function_exists( 'dlpro_add_banner_after_content' ) ) :
	/**
	 * Insert content after box content single
	 *
	 * @since 1.0.0
	 * @param string $content Content.
	 * @return string $content
	 */
	function dlpro_add_banner_after_content( $content ) {
		if ( is_singular( array( 'post', 'blogs' ) ) && in_the_loop() ) {
			$content = $content . dlpro_banner_after_content();
		}
		return $content;
	}
endif; // endif dlpro_add_banner_after_content.
add_filter( 'the_content', 'dlpro_add_banner_after_content', 1 );

if ( ! function_exists( 'dlpro_helper_after_paragraph' ) ) :
	/**
	 * Helper add content after paragprah
	 *
	 * @param String $insertion Code.
	 * @param Number $paragraph_id ID Paraghrap.
	 * @param String $content Code.
	 * @since 1.0.0
	 * @link http://stackoverflow.com/questions/25888630/place-ads-in-between-text-only-paragraphs
	 * @return string
	 */
	function dlpro_helper_after_paragraph( $insertion, $paragraph_id, $content ) {
		if ( is_singular( array( 'post', 'blogs' ) ) && in_the_loop() ) {

			$closing_p  = '</p>';
			$paragraphs = explode( $closing_p, wptexturize( $content ) );
			$count      = count( $paragraphs );

			foreach ( $paragraphs as $index => $paragraph ) {
				$word_count = count( explode( ' ', $paragraph ) );
				if ( trim( $paragraph ) && $paragraph_id == $index + 1 ) {
					$paragraphs[ $index ] .= $closing_p;
				}
				if ( $paragraph_id == $index + 1 && $count >= 4 ) {
					$paragraphs[ $index ] .= $insertion;
				}
			}
		}
		return implode( '', $paragraphs );
	}
endif; // endif dlpro_helper_after_paragraph.

if ( ! function_exists( 'dlpro_add_banner_inside_content' ) ) :
	/**
	 * Insert content inside content single
	 *
	 * @since 1.0.0
	 * @param string $content Content.
	 * @return string $content
	 */
	function dlpro_add_banner_inside_content( $content ) {
		$banner    = get_theme_mod( 'gmr_adsinsidecontent' );
		$position  = get_theme_mod( 'gmr_adsinsidecontentposition', 'left' );

		if ( isset( $banner ) && ! empty( $banner ) ) {
			if ( 'right' === $position ) {
				$class = ' dlpro-center-right';
			} elseif ( 'center' === $position ) {
				$class = ' dlpro-center-ads';
			} else {
				$class = '';
			}
			$ad_code = '<div class="dlpro-banner-insidecontent' . esc_html( $class ) . '">' . do_shortcode( $banner ) . '</div>';
			if ( is_singular( array( 'post', 'blogs' ) ) && in_the_loop() ) {
				return dlpro_helper_after_paragraph( $ad_code, 2, $content );
			}
		}
		return $content;
	}
endif; // endif dlpro_add_banner_inside_content.
add_filter( 'the_content', 'dlpro_add_banner_inside_content' );

if ( ! function_exists( 'dlpro_banner_after_relpost' ) ) {
	/**
	 * Adding banner after related posts via hook
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_banner_after_relpost() {
		$banner    = get_theme_mod( 'gmr_adsafterrelpost' );

		$position = get_theme_mod( 'gmr_adsafterrelpostposition' );

		if ( isset( $banner ) && ! empty( $banner ) ) {
			if ( 'right' === $position ) {
				$class = ' text-right';
			} elseif ( 'center' === $position ) {
				$class = ' text-center';
			} else {
				$class = '';
			}
			echo '<div class="gmr-banner-afterrelpost clearfix' . esc_html( $class ) . '">';
				echo do_shortcode( $banner );
			echo '</div>';
		}
	}
}
add_action( 'dlpro_banner_after_relpost', 'dlpro_banner_after_relpost', 10 );

if ( ! function_exists( 'dlpro_floating_banner_left' ) ) {

	/**
	 * Adding banner at top via hook
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_floating_banner_left() {
		$banner = get_theme_mod( 'gmr_adsfloatleft' );

		if ( isset( $banner ) && ! empty( $banner ) ) {
			echo '<div class="dlpro-floatbanner dlpro-floatbanner-left"><div class="inner-float-left">';
			echo '<button onclick="parentNode.remove()" title="' . esc_html__( 'close', 'dlpro' ) . '">' . esc_html__( 'close', 'dlpro' ) . '</button>';
			echo do_shortcode( $banner );
			echo '</div></div>';
		}
	}
}
add_action( 'dlpro_floating_banner_left', 'dlpro_floating_banner_left', 10 );

if ( ! function_exists( 'dlpro_floating_banner_right' ) ) {

	/**
	 * Adding floating banner
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_floating_banner_right() {
		$banner = get_theme_mod( 'gmr_adsfloatright' );

		if ( isset( $banner ) && ! empty( $banner ) ) {
			echo '<div class="dlpro-floatbanner dlpro-floatbanner-right"><div class="inner-float-right">';
			echo '<button onclick="parentNode.remove()" title="' . esc_html__( 'close', 'dlpro' ) . '">' . esc_html__( 'close', 'dlpro' ) . '</button>';
			echo do_shortcode( $banner );
			echo '</div></div>';
		}
	}
}
add_action( 'dlpro_floating_banner_right', 'dlpro_floating_banner_right', 15 );

if ( ! function_exists( 'dlpro_floating_banner_footer' ) ) {

	/**
	 * Adding floating banner
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_floating_banner_footer() {
		$banner = get_theme_mod( 'gmr_adsfloatbottom' );

		if ( isset( $banner ) && ! empty( $banner ) ) {
			echo '<div class="dlpro-floatbanner dlpro-floatbanner-footer">';
				echo '<div class="inner-floatbanner-bottom">';
				echo '<button onclick="parentNode.remove()" title="' . esc_html__( 'close', 'dlpro' ) . '">' . esc_html__( 'close', 'dlpro' ) . '</button>';
				echo do_shortcode( $banner );
				echo '</div>';
			echo '</div>';

		}
	}
}
add_action( 'dlpro_floating_footer', 'dlpro_floating_banner_footer', 20 );

if ( ! function_exists( 'dlpro_banner_footer' ) ) {

	/**
	 * Adding banner at footer via hook
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_banner_footer() {
		$banner = get_theme_mod( 'gmr_adsfooter' );

		if ( isset( $banner ) && ! empty( $banner ) ) {
			echo '<div class="container">';
				echo '<div class="dlpro-footerbanner">';
				echo do_shortcode( $banner );
				echo '</div>';
			echo '</div>';
		}
	}
}
add_action( 'dlpro_banner_footer', 'dlpro_banner_footer', 10 );

if ( ! function_exists( 'dlpro_banner_between_posts' ) ) {

	/**
	 * Adding banner between posts in archive and index post
	 *
	 * @since 1.0.5
	 * @return void
	 */
	function dlpro_banner_between_posts() {
		global $wp_query;

		$banner   = get_theme_mod( 'gmr_adsbetweenpost' );
		$position = get_theme_mod( 'gmr_adsbetweenpostposition', 'third' );

		// Check if we're at the right position and option not empty.
		if ( isset( $banner ) && ! empty( $banner ) ) {
			if ( 'first' === $position ) {
				$numb = 0;
			} elseif ( 'second' === $position ) {
				$numb = 1;
			} elseif ( 'third' === $position ) {
				$numb = 2;
			} elseif ( 'fourth' === $position ) {
				$numb = 3;
			} else {
				$numb = 2;
			}

			if ( $wp_query->current_post === intval( $numb ) ) {
				// Display the banner.
				echo '<div class="gmr-infeed-banner item-infinite">';
				echo '<div class="gmr-box-content">';
					echo do_shortcode( $banner );
				echo '</div>';
				echo '</div>';

			}
		}
	}
}
add_action( 'dlpro_banner_between_posts', 'dlpro_banner_between_posts', 20 );
