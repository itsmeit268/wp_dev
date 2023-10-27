<?php
/*
* @author  PressLayouts
* @package PL EmallShop Extensions
* @version 1.0
*/
 
if ( ! defined( 'ABSPATH' ) ):
	exit; // Exit if accessed directly
endif;

require_once ES_EXTENSIONS_PATH . '/js_composer/custom-fields.php';
if(is_plugin_active( 'woocommerce/woocommerce.php' )){
	require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/category-products-with-tab.php';
	require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/products-carousel.php';
	require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/category-and-sub-category.php';
	require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/products-brands.php';
	require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/hot-deal-products.php';
	require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/products-sidebar.php';
}
require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/vertical-menu.php';
require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/blogs-carousel.php';
require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/blogs-listing.php';
require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/portfolios-listing.php';
//require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/services.php';
require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/newsletter.php';
require_once ES_EXTENSIONS_PATH . '/js_composer/shortcodes/testimonials.php';

/* Shortcode : products_carousel */
add_filter( 'vc_autocomplete_products_carousel_category_callback',	'emallshop_product_category_search', 10, 1 );
add_filter( 'vc_autocomplete_products_carousel_category_render', 'emallshop_product_category_render', 10, 1 );

/* Shortcode : hot_deal_products */
add_filter( 'vc_autocomplete_hot_deal_products_category_callback',	'emallshop_product_category_search', 10, 1 );
add_filter( 'vc_autocomplete_hot_deal_products_category_render', 'emallshop_product_category_render', 10, 1 );

/* Shortcode : products_sidebar */
add_filter( 'vc_autocomplete_products_sidebar_category_callback',	'emallshop_product_category_search', 10, 1 );
add_filter( 'vc_autocomplete_products_sidebar_category_render', 'emallshop_product_category_render', 10, 1 );

/* Shortcode : blogs_carousel */
add_filter( 'vc_autocomplete_blogs_carousel_category_callback',	'emallshop_blog_category_search', 10, 1 );
add_filter( 'vc_autocomplete_blogs_carousel_category_render', 'emallshop_blog_category_render', 10, 1 );

/* Shortcode : blogs_listing */
add_filter( 'vc_autocomplete_blogs_listing_category_callback',	'emallshop_blog_category_search', 10, 1 );
add_filter( 'vc_autocomplete_blogs_listing_category_render', 'emallshop_blog_category_render', 10, 1 );

/**
 * Product category search
 * @param $search_string
 *
 * @return array
 */
function emallshop_product_category_search( $search_string ) {
	$query = $search_string;
	$data = array();
	$args = array(
		'name__like' => $query,
		'taxonomy' => 'product_cat',
	);
	$result = get_terms( $args );
	if ( is_wp_error( $result ) ) {
		return $data;
	}
	if ( !is_array( $result ) || empty( $result ) ) {
		return $data;
	}
	foreach ( $result as $term_data ) {
		if ( is_object( $term_data ) && isset( $term_data->name, $term_data->term_id ) ) {
			$data[] = array(
				'value' => $term_data->slug,
				'label' => $term_data->name,
				'group' => 'product_cat',
			);
		}
	}

	return $data;
}

/**
 * Product category render
 * @param $value
 *
 * @return array|bool
 */
function emallshop_product_category_render( $value ) {
	$post = get_post( $value['value'] );
	$term_data = get_term_by( 'slug',  $value['value'],'product_cat' );

	return is_null( $term_data ) ? false : array(
		'label' => $term_data->name,
		'value' => $term_data->slug,
		'group' => 'product_cat',
	);
}

/**
 * Blog category search
 * @param $search_string
 *
 * @return array
 */
function emallshop_blog_category_search( $search_string ) {
	$query = $search_string;
	$data = array();
	$args = array(
		'name__like' => $query,
		'taxonomy' => 'category',
	);
	$result = get_terms( $args );
	if ( is_wp_error( $result ) ) {
		return $data;
	}
	if ( !is_array( $result ) || empty( $result ) ) {
		return $data;
	}
	foreach ( $result as $term_data ) {
		if ( is_object( $term_data ) && isset( $term_data->name, $term_data->term_id ) ) {
			$data[] = array(
				'value' => $term_data->slug,
				'label' => $term_data->name,
				'group' => 'category',
			);
		}
	}

	return $data;
}

/**
 * Blog category render
 * @param $value
 *
 * @return array|bool
 */
function emallshop_blog_category_render( $value ) {
	$post = get_post( $value['value'] );
	$term_data = get_term_by( 'slug',  $value['value'],'category' );

	return is_null( $term_data ) ? false : array(
		'label' => $term_data->name,
		'value' => $term_data->slug,
		'group' => 'category',
	);
}