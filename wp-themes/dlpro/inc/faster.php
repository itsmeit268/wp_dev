<?php
/**
 * Remove no needed script and faster theme
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

/**
 * Disable the emoji's
 */
function dlpro_disable_emojis() {
	$remove_emoji_script = get_theme_mod( 'gmr_remove_emoji_script', 'disable' );

	if ( 'enable' === $remove_emoji_script ) {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'dlpro_disable_emojis_tinymce' );
		add_filter( 'wp_resource_hints', 'dlpro_disable_emojis_remove_dns_prefetch', 10, 2 );
	}
}
add_action( 'init', 'dlpro_disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param  array $plugins Options.
 * @return array Difference betwen the two arrays
 */
function dlpro_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param  array  $urls          URLs to print for resource hints.
 * @param  string $relation_type The relation type the URLs are printed for.
 * @return array                 Difference betwen the two arrays.
 */
function dlpro_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;
}

/**
 * Disable embeds on init.
 *
 * - Removes the needed query vars.
 * - Disables oEmbed discovery.
 * - Completely removes the related JavaScript.
 *
 * @since 1.0.0
 */
function dlpro_disable_embeds_init() {
	$remove_oembed = get_theme_mod( 'gmr_remove_oembed', 'disable' );
	if ( 'enable' === $remove_oembed ) {
		/* var WP $wp */
		global $wp;
		/* Remove the embed query var. */
		$wp->public_query_vars = array_diff(
			$wp->public_query_vars,
			array(
				'embed',
			)
		);
		/* Remove the REST API endpoint. */
		remove_action( 'rest_api_init', 'wp_oembed_register_route' );

		/* Turn off oEmbed auto discovery. */
		add_filter( 'embed_oembed_discover', '__return_false' );

		/* Don't filter oEmbed results. */
		remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

		/* Remove oEmbed discovery links. */
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

		/* Remove oEmbed-specific JavaScript from the front-end and back-end. */
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		add_filter( 'tiny_mce_plugins', 'dlpro_disable_embeds_tiny_mce_plugin' );

		/* Remove all embeds rewrite rules. */
		add_filter( 'rewrite_rules_array', 'dlpro_disable_embeds_rewrites' );

		/* Remove filter of the oEmbed result before any HTTP requests are made. */
		remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
	}

	$wp_head_tag = get_theme_mod( 'gmr_wp_head_tag', 'disable' );

	if ( 'enable' === $wp_head_tag ) {
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

		/* removes EditURI/RSD (Really Simple Discovery) link. */
		remove_action( 'wp_head', 'rsd_link' );
		/* removes wlwmanifest (Windows Live Writer) link. */
		remove_action( 'wp_head', 'wlwmanifest_link' );
		/* removes meta name generator. */
		remove_action( 'wp_head', 'wp_generator' );
		/* removes shortlink. */
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		/* removes feed links. */
		remove_action( 'wp_head', 'feed_links', 2 );
		/* removes comments feed. */
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	}
}
add_action( 'init', 'dlpro_disable_embeds_init', 9999 );

/**
 * Removes the 'wpembed' TinyMCE plugin.
 *
 * @since 1.0.0
 *
 * @param array $plugins List of TinyMCE plugins.
 * @return array The modified list.
 */
function dlpro_disable_embeds_tiny_mce_plugin( $plugins ) {
	return array_diff( $plugins, array( 'wpembed' ) );
}

/**
 * Remove all rewrite rules related to embeds.
 *
 * @since 1.2.0
 *
 * @param array $rules WordPress rewrite rules.
 * @return array Rewrite rules without embeds rules.
 */
function dlpro_disable_embeds_rewrites( $rules ) {
	foreach ( $rules as $rule => $rewrite ) {
		if ( false !== strpos( $rewrite, 'embed=true' ) ) {
			unset( $rules[ $rule ] );
		}
	}

	return $rules;
}
