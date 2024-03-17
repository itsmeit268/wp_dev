<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'gmr_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @since 1.0.0
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function gmr_body_classes( $classes ) {

		$classes[] = 'gmr-theme idtheme kentooz';

		$sticky_menu = get_theme_mod( 'gmr_sticky_menu', 'sticky' );

		// Disable thumbnail options via customizer.
		$thumbnail_single_soft = get_theme_mod( 'gmr_active-singlethumb', 0 );

		$layout = get_theme_mod( 'gmr_active-sticky-sidebar', 0 );

		// Sidebar layout.
		$sidebar_layout = get_theme_mod( 'gmr_blog_sidebar', 'sidebar' );

		if ( 'fullwidth' === $sidebar_layout ) {
			$classes[] = 'gmr-has-sidebar';
		}

		/* Sticky menu */
		if ( 'sticky' === $sticky_menu ) {
			$classes[] = 'gmr-sticky';
		} else {
			$classes[] = 'gmr-no-sticky';
		}
		
		/* Sticky sidebar disable */
		if ( 0 !== $layout ) {
			$classes[] = 'gmr-disable-sticky';
		}

		if ( is_singular() ) {
			if ( 0 !== $thumbnail_single_soft ) {
				$classes[] = 'gmr-disablethumbnail-singlesoft';
			}
		}

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
endif; // endif gmr_body_classes.
add_filter( 'body_class', 'gmr_body_classes' );

if ( ! function_exists( 'gmr_remove_hentry' ) ) :
	/**
	 * Remove Remove 'hentry' from post_class()
	 *
	 * @since 1.0.0
	 *
	 * @param array $classes Classes for the article element.
	 * @return array
	 */
	function gmr_remove_hentry( $classes ) {
		if ( is_page() || is_archive() || is_search() || is_home() ) {
			$classes = array_diff( $classes, array( 'hentry' ) );
		}

		return $classes;
	}
endif; // endif gmr_remove_hentry.
add_filter( 'post_class', 'gmr_remove_hentry' );

if ( ! function_exists( 'gmr_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function gmr_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
		}
	}
endif;
add_action( 'wp_head', 'gmr_pingback_header' );

if ( ! function_exists( 'gmr_add_img_title' ) ) :
	/**
	 * Add a image title tag.
	 *
	 * @since 1.0.0
	 * @param array $attr attribute image.
	 * @param array $attachment returning attacment.
	 * @return array
	 */
	function gmr_add_img_title( $attr, $attachment = null ) {
		$attr['title'] = trim( wp_strip_all_tags( $attachment->post_title ) );
		return $attr;
	}
endif;
add_filter( 'wp_get_attachment_image_attributes', 'gmr_add_img_title', 10, 2 );

if ( ! function_exists( 'gmr_add_title_alt_gravatar' ) ) :
	/**
	 * Add a gravatar title and alt tag.
	 *
	 * @since 1.0.0
	 * @param string $text Text attribute gravatar.
	 * @return string
	 */
	function gmr_add_title_alt_gravatar( $text ) {
		$text = str_replace( 'alt=\'\'', 'alt=\'' . __( 'Gravatar Image', 'dlpro' ) . '\' title=\'' . __( 'Gravatar', 'dlpro' ) . '\'', $text );
		return $text;
	}
endif;
add_filter( 'get_avatar', 'gmr_add_title_alt_gravatar' );

if ( ! function_exists( 'gmr_change_title_for_a_template' ) ) :
	/**
	 * Change the title of sub post
	 *
	 * @param string $title Title.
	 */
	function gmr_change_title_for_a_template( $title ) {
		$sep = apply_filters( 'document_title_separator', '-' );

		if ( is_single() ) {
			if ( true === get_query_var( 'download' ) ) {
				$title['title'] = $title['title'] . ' ' . $sep . ' ' . esc_html__( 'Download Page', 'dlpro' ) . ' ';
			}
		}
		return $title;
	}
endif; // endif gmr_change_title_for_a_template.
add_filter( 'document_title_parts', 'gmr_change_title_for_a_template', 10, 1 );

if ( ! function_exists( 'gmr_noindex_downloadpage' ) ) :
	/**
	 * Noindex download page
	 */
	function gmr_noindex_downloadpage() {
		$noindex = '';

		if ( is_single() ) {
			if ( true === get_query_var( 'download' ) ) {
				$noindex = '<meta name="robots" content="follow,noindex,noodp,noydir"/>';
			}
		}
		echo $noindex . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif; // endif gmr_change_title_for_a_template.
add_filter( 'wp_head', 'gmr_noindex_downloadpage', 1 );

if ( ! function_exists( 'gmr_thumbnail_upscale' ) ) :
	/**
	 * Thumbnail upscale
	 *
	 * @since 1.0.0
	 *
	 * @Source http://wordpress.stackexchange.com/questions/50649/how-to-scale-up-featured-post-thumbnail
	 * @param array $default for image sizes.
	 * @param array $orig_w for width orginal.
	 * @param array $orig_h for height sizes image original.
	 * @param array $new_w new width image sizes.
	 * @param array $new_h new height image sizes.
	 * @param bool  $crop croping for image sizes.
	 * @return array
	 */
	function gmr_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ) {
		if ( ! $crop ) {
			return null; // let the WordPress default function handle this.
		}
		$size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

		$crop_w = round( $new_w / $size_ratio );
		$crop_h = round( $new_h / $size_ratio );

		$s_x = floor( ( $orig_w - $crop_w ) / 2 );
		$s_y = floor( ( $orig_h - $crop_h ) / 2 );

		if ( is_array( $crop ) ) {

			// Handles left, right and center (no change).
			if ( 'left' === $crop[0] ) {
				$s_x = 0;
			} elseif ( 'right' === $crop[0] ) {
				$s_x = $orig_w - $crop_w;
			}

			// Handles top, bottom and center (no change).
			if ( 'top' === $crop[1] ) {
				$s_y = 0;
			} elseif ( 'bottom' === $crop[1] ) {
				$s_y = $orig_h - $crop_h;
			}
		}
		return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
endif; // endif gmr_thumbnail_upscale.
add_filter( 'image_resize_dimensions', 'gmr_thumbnail_upscale', 10, 6 );

if ( ! function_exists( 'dlpro_itemtype_schema' ) ) :
	/**
	 * Figure out which schema tags to apply to the <article> element
	 * The function determines the itemtype: muvipro_itemtype_schema( 'CreativeWork' )
	 *
	 * @since 1.0.0
	 * @param string $type Text attributes for scheme.
	 * @return string
	 */
	function dlpro_itemtype_schema( $type = 'CreativeWork' ) {
		$schema = 'https://schema.org/';

		// Get the itemtype.
		$itemtype = apply_filters( 'dlpro_article_itemtype', $type );

		// Print the results.
		$scope = 'itemscope="itemscope" itemtype="' . $schema . $itemtype . '"';
		return $scope;
	}
endif;

if ( ! function_exists( 'dlpro_itemprop_schema' ) ) :
	/**
	 * Figure out which schema tags itemprop=""
	 * The function determines the itemprop: dlpro_itemprop_schema( 'headline' )
	 *
	 * @since 1.0.0
	 * @param string $type Text attributes for scheme.
	 * @return string
	 */
	function dlpro_itemprop_schema( $type = 'headline' ) {
		// Get the itemprop.
		$itemprop = apply_filters( 'dlpro_itemprop_filter', $type );

		// Print the results.
		$scope = 'itemprop="' . $itemprop . '"';
		return $scope;
	}
endif;

/**
 * Add version in title
 *
 * @since 1.0.0
 * @param string $title title.
 * @return string

function dlpro_version_filter_the_title( $title ) {
	// Only in this page.
	if ( is_single() || is_archive() || is_home() || is_search() ) {
		global $id, $post;
		if ( in_the_loop() && $id && $post && 'post' === $post->post_type ) {
			$version = get_post_meta( $post->ID, 'DLPRO_Version', true );
			if ( ! empty( $version ) ) {
				$title .= ' ' . $version;
			}
		}
	}
	return $title;
}
endif;*/

if ( ! function_exists( 'dlpro_template_search_blogs' ) ) :
	/**
	 * Search blog post type template redirect
	 *
	 * @param string $template template.
	 * @since 1.0.0
	 * @return string
	 */
	function dlpro_template_search_blogs( $template ) {
		global $wp_query;
		$post_type = get_query_var( 'post_type' );
		if ( $wp_query->is_search && 'blogs' === $post_type ) {
			return locate_template( 'search-blogs.php' );
		}
		return $template;
	}
endif;
add_filter( 'template_include', 'dlpro_template_search_blogs' );

if ( ! function_exists( 'dlpro_head_script' ) ) :
	/**
	 * Insert script in head section
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_head_script() {
		$headscript    = get_theme_mod( 'gmr_head_script' );
		if ( isset( $headscript ) && ! empty( $headscript ) ) {
			echo $headscript; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif; /* endif dlpro_head_script */
add_action( 'wp_head', 'dlpro_head_script' );

if ( ! function_exists( 'dlpro_footer_script' ) ) :
	/**
	 * Insert script in footer section
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_footer_script() {
		$footerscript = get_theme_mod( 'gmr_footer_script' );
		if ( isset( $footerscript ) && ! empty( $footerscript ) ) {
			echo $footerscript; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif; /* endif dlpro_footer_script */
add_action( 'wp_footer', 'dlpro_footer_script' );

if ( ! function_exists( 'dlpro_facebook_pixel' ) ) :
	/**
	 * Insert facebook pixel script via wp_head hook
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_facebook_pixel() {
		$fbpixelid = get_theme_mod( 'gmr_pixel' );
		if ( isset( $fbpixelid ) && ! empty( $fbpixelid ) ) {
			echo '
			<!-- Facebook Pixel -->
			<script>
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
			n.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
			document,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');

			fbq(\'init\', \'' . esc_attr( $fbpixelid ) . '\');
			fbq(\'track\', "PageView");</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=' . esc_attr( $fbpixelid ) . '&ev=PageView&noscript=1"
			/></noscript>';
		}
	}
endif; /* endif dlpro_facebook_pixel */
add_action( 'wp_head', 'dlpro_facebook_pixel', 10 );

if ( ! function_exists( 'dlpro_google_analytic' ) ) :
	/**
	 * Insert google analytics script via wp_footer hook
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_google_analytic() {

		$analyticid = get_theme_mod( 'gmr_analytic' );
		if ( isset( $analyticid ) && ! empty( $analyticid ) ) {
			echo '
			<!-- Google analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=' . esc_attr( $analyticid ) . '"></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag(\'js\', new Date());
				gtag(\'config\', \'' . esc_attr( $analyticid ) . '\');
			</script>';
		}
	}
endif; /* endif dlpro_google_analytic */
add_action( 'wp_footer', 'dlpro_google_analytic', 10 );
