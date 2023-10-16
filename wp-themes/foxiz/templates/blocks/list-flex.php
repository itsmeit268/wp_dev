<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'foxiz_get_list_flex' ) ) {
	/**
	 * @param array $settings
	 * @param null $_query
	 *
	 * @return false|string
	 */
	function foxiz_get_list_flex( $settings = array(), $_query = null ) {

		$settings = wp_parse_args( $settings, array(
			'uuid' => '',
			'name' => 'list_flex'
		) );

		$settings = foxiz_detect_dynamic_query( $settings );

		$settings['classes'] = 'block-list block-list-flex';

		if ( empty( $settings['columns'] ) ) {
			$settings['columns'] = 1;
		}

		if ( empty( $settings['column_gap'] ) ) {
			$settings['column_gap'] = 20;
		}

		if ( ! empty( $settings['carousel'] ) && '1' === (string) $settings['carousel'] ) {

			unset( $settings['pagination'] );

			if ( empty( $settings['columns_tablet'] ) ) {
				$settings['columns_tablet'] = 2;
			}
			if ( empty( $settings['columns_mobile'] ) ) {
				$settings['columns_mobile'] = 1;
			}
			if ( empty( $settings['carousel_gap'] ) ) {
				$settings['carousel_gap'] = 20;
			}
			if ( empty( $settings['carousel_gap_tablet'] ) ) {
				$settings['carousel_gap_tablet'] = 15;
			}
			if ( empty( $settings['carousel_gap_mobile'] ) ) {
				$settings['carousel_gap_mobile'] = 10;
			}
		}

		if ( empty( $settings['pagination'] ) ) {
			$settings['no_found_rows'] = true;
		}

		if ( ! $_query ) {
			$_query = foxiz_query( $settings );
		}

		$settings = foxiz_get_design_builder_block( $settings );

		ob_start();
		foxiz_block_open_tag( $settings, $_query );
		if ( ! $_query->have_posts() ) {
			foxiz_error_posts( $_query );
		} else {
			foxiz_block_inner_open_tag( $settings );
			foxiz_loop_list_flex( $settings, $_query );
			foxiz_block_inner_close_tag( $settings );
			foxiz_render_pagination( $settings, $_query );
			wp_reset_postdata();
		}
		foxiz_block_close_tag();

		return ob_get_clean();
	}
}

if ( ! function_exists( 'foxiz_loop_list_flex' ) ) {
	/**
	 * @param  $settings
	 * @param $_query
	 */
	function foxiz_loop_list_flex( $settings, $_query ) {

		if ( empty( $settings['block_structure'] ) ) {
			$settings['block_structure'] = 'title,excerpt,meta';
		}
		$settings['block_structure'] = explode( ',', preg_replace( '/\s+/', '', $settings['block_structure'] ) );

		if ( ! empty( $settings['carousel'] ) && '1' === (string) $settings['carousel'] ) : ?>
            <div class="post-carousel swiper-container pre-load" <?php foxiz_carousel_attrs( $settings ); ?>>
                <div class="swiper-wrapper">
					<?php while ( $_query->have_posts() ) :
						$_query->the_post();
						foxiz_list_flex( $settings );
					endwhile;
					?>
                </div>
				<?php foxiz_carousel_footer( $settings ); ?>
            </div>
		<?php else :
			while ( $_query->have_posts() ) :
				$_query->the_post();
				foxiz_list_flex( $settings );
			endwhile;
		endif;
	}
}