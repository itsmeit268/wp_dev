<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'foxiz_get_authors_1' ) ) {
	/**
	 * @param array $settings
	 *
	 * @return false|string
	 */
	function foxiz_get_authors_1( $settings = array() ) {

		$settings = wp_parse_args( $settings, array(
			'uuid'    => '',
			'name'    => 'authors_1',
			'authors' => array(),
		) );

		$settings['classes'] = 'block-authors block-authors-1';
		if ( empty( $settings['box_style'] ) ) {
			$settings['classes'] .= ' is-box-shadow';
		} else {
			$settings['classes'] .= ' is-box-' . esc_attr( $settings['box_style'] );
		}
		if ( empty( $settings['columns'] ) ) {
			$settings['columns'] = 2;
		}
		if ( empty( $settings['column_gap'] ) ) {
			$settings['column_gap'] = 20;
		}
		ob_start();

		foxiz_block_open_tag( $settings );
		?>
        <div class="block-inner">
			<?php foreach ( $settings['authors'] as $item ) :
				if ( ! empty( $item['author'] ) ) {
					$settings['author'] = $item['author'];
					foxiz_author_card_1( $settings );
				}
			endforeach; ?>
        </div>
		<?php
		foxiz_block_close_tag();

		return ob_get_clean();
	}
}


if ( ! function_exists( 'foxiz_get_authors_2' ) ) {
	/**
	 * @param array $settings
	 *
	 * @return false|string
	 */
	function foxiz_get_authors_2( $settings = array() ) {

		$settings = wp_parse_args( $settings, array(
			'uuid'    => '',
			'name'    => 'authors_2',
			'authors' => array(),
		) );

		$settings['classes'] = 'block-authors block-authors-2';
		if ( empty( $settings['box_style'] ) ) {
			$settings['classes'] .= ' is-box-shadow';
		} else {
			$settings['classes'] .= ' is-box-' . esc_attr( $settings['box_style'] );
		}
		if ( empty( $settings['columns'] ) ) {
			$settings['columns'] = 3;
		}
		if ( empty( $settings['column_gap'] ) ) {
			$settings['column_gap'] = 20;
		}
		ob_start();

		foxiz_block_open_tag( $settings );
		?>
        <div class="block-inner">
			<?php foreach ( $settings['authors'] as $item ) :
				if ( ! empty( $item['author'] ) ) {
					$settings['author'] = $item['author'];
					foxiz_author_card_2( $settings );
				}
			endforeach; ?>
        </div>
		<?php
		foxiz_block_close_tag();

		return ob_get_clean();
	}
}

