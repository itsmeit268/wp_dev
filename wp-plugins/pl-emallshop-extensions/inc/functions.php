<?php
/* Function to get required plugin list*/
function emallshop_get_required_plugins_list() {   
    $plugins = array(
		array(
			'name'                     => 'PL EmallShop Extensions',
			'slug'                     => 'pl-emallshop-extensions',
			'required'                 => true,
			'url'                      => 'pl-emallshop-extensions/pl-emallshop-extensions.php',
			'version'                  => '1.0',
		),
        array(
            'name'                     => 'WPBakery Visual Composer',
            'slug'                     => 'js_composer',
            'required'                 => true,
            'version'                  => '5.4.7',
            'url'                      => 'js_composer/js_composer.php',
        ),
		array(
            'name'                     => 'Revolution Slider',
            'slug'                     => 'revslider',
            'required'                 => true,
            'url'                      => 'revslider/revslider.php',
			'version'                  => '5.4.7.4',
        ),
        array(
            'name'                     => 'Woocommerce',
            'slug'                     => 'woocommerce',
            'required'                 => true,
            'url'                      => 'woocommerce/woocommerce.php',
			'version'                  => '3.4',
        ),
		
		
    );

    return $plugins;
}
if( ! function_exists( 'emallshop_get_products' ) ) {
	/**
	 Emallshop get products
	*/

	function emallshop_get_products( $data_source, $atts, $args = array() ) {
		$defaults = array(
			'post_type'           	=> 'product',
			'status'              	=> 'published',
			'ignore_sticky_posts' 	=> 1,
			'orderby'             	=> isset($atts['orderby']) ? $atts['orderby'] : 'date',
			'order'               	=> isset($atts['order']) ? $atts['order'] : 'desc',
			'posts_per_page'      	=> isset( $atts['limit'] ) > 0 ? intval( $atts['limit'] ) : 10,
			'paged'      			=> isset($atts['paged']) > 0 ? intval( $atts['paged'] ) : 1,
		);
		if( isset($atts['title']) ){
			unset($atts['title']);
		}
		$args['meta_query'] 	= WC()->query->get_meta_query();
		$args['tax_query']   	= WC()->query->get_tax_query();
		$args = wp_parse_args( $args, $defaults );
		
		switch ( $data_source ) {
			case 'featured-products';
				$args['tax_query'][] = array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => array( 'featured' ),
						'operator' => 'IN',
					),
				);			
				break;
			case 'sale-products';
				$product_ids_on_sale   = wc_get_product_ids_on_sale();
				$product_ids_on_sale[] = 0;
				$args['post__in']      = $product_ids_on_sale;
				break;
			case 'best-seller-products';
				$args['meta_key'] = 'total_sales';
				$args['orderby']  = 'meta_value_num';
				$args['order']    = 'DESC';
				break;
			case 'top-reviews-products';
				$args['meta_key'] = '_wc_average_rating';
				$args['orderby']  = 'meta_value_num';
				$args['order']    = 'DESC';
				break;
			case 'products';
				if ( $atts['product_ids'] != '' ) {
					$args['post__in'] = explode( ',', $atts['product_ids'] );
				}
				break;
			case 'deal_products';
				 global $wpdb;
				// Get products on sale
				$product_ids_raw = $wpdb->get_results(
				"SELECT posts.ID, posts.post_parent
				FROM `$wpdb->posts` posts
				INNER JOIN `$wpdb->postmeta` ON (posts.ID = `$wpdb->postmeta`.post_id)
				INNER JOIN `$wpdb->postmeta` AS mt1 ON (posts.ID = mt1.post_id)
				WHERE
					posts.post_status = 'publish'
					AND  (mt1.meta_key = '_sale_price_dates_to' AND mt1.meta_value >= ".time().") 
					GROUP BY posts.ID 
					ORDER BY posts.post_title");

				$product_ids_on_sale = array();

				foreach ( $product_ids_raw as $product_raw ) 
				{
					if(!empty($product_raw->post_parent))
					{
						$product_ids_on_sale[] = $product_raw->post_parent;
					}
					else
					{
						$product_ids_on_sale[] = $product_raw->ID;  
					}
				}
				$product_ids_on_sale = array_unique($product_ids_on_sale);
				$args['post__in'] = $product_ids_on_sale;			
				break;
		}
		
		//Specific categories
		$categories = isset($atts['category']) ? trim($atts['category']) : '';
		if( !empty($categories) && $categories != '-1'){
			$taxonomy = isset($atts['taxonomy']) ? $atts['taxonomy'] : 'product_cat';
			$categories_array = explode(',', $categories);
			$categories_array = array_map( 'trim', $categories_array );
			if( is_array($categories_array) && !empty($categories_array) ){
				$args['tax_query'][] = array(
					array(
						'taxonomy' => $taxonomy,
						'field'    => 'slug',
						'terms'    => $categories_array
					)
				);
			}
			
		}
		
		// Exclude Products
		if ( !empty($atts['exclude']) ) {
			$ids = explode( ',', $atts[ 'exclude' ] );
			$ids = array_map( 'trim', $ids );			
			$args['post__not_in'] = $ids;
			if(!empty($args['post__in'])){
				$args['post__in'] = array_diff( $args['post__in'], $args['post__not_in'] );
			}
		}
		
		return $args;
	}
}

/**
* Get server info
*/
if( ! function_exists( 'emallshop_get_server_info' ) ) {
	function emallshop_get_server_info(){
		return $_SERVER['SERVER_SOFTWARE'];
	}
}
?>