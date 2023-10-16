<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'foxiz_list_1' ) ) {
	/**
	 * @param $settings
	 */
	function foxiz_list_1( $settings = array() ) {

		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h3';
		}
		if ( empty( $settings['crop_size'] ) ) {
			$settings['crop_size'] = 'foxiz_crop_g1';
		}
		$settings['post_classes'] = 'p-list p-list-1';
		foxiz_post_open_tag( $settings );
		?>
        <div class="list-holder">
            <div class="list-feat-holder">
				<?php foxiz_featured_with_category( $settings ); ?>
            </div>
            <div class="p-content">
				<?php
				foxiz_entry_title( $settings );
				foxiz_entry_review( $settings );
				foxiz_entry_excerpt( $settings );
				foxiz_entry_meta( $settings );
				foxiz_entry_readmore( $settings );
				?>
            </div>
        </div>
		<?php foxiz_post_close_tag();
	}
}

if ( ! function_exists( 'foxiz_list_2' ) ) {
	/**
	 * @param array $settings
	 */
	function foxiz_list_2( $settings = array() ) {

		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h3';
		}
		if ( empty( $settings['crop_size'] ) ) {
			$settings['crop_size'] = 'foxiz_crop_g1';
		}
		$settings['post_classes'] = 'p-list p-list-2';
		foxiz_post_open_tag( $settings );
		?>
        <div class="list-holder">
            <div class="list-feat-holder">
				<?php foxiz_featured_only( $settings ); ?>
            </div>
            <div class="p-content">
				<?php
				foxiz_entry_top( $settings );
				foxiz_entry_title( $settings );
				foxiz_entry_review( $settings );
				foxiz_entry_excerpt( $settings );
				foxiz_entry_meta( $settings );
				foxiz_entry_readmore( $settings );
				?>
            </div>
        </div>
		<?php foxiz_post_close_tag();
	}
}

if ( ! function_exists( 'foxiz_list_small_1' ) ) {
	/**
	 * @param array $settings
	 */
	function foxiz_list_small_1( $settings = array() ) {

		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h5';
		}
		if ( empty( $settings['bottom_border'] ) ) {
			$settings['bottom_border'] = 'gray';
		}
		$settings['post_classes'] = 'p-small p-list-small-1';

		foxiz_post_open_tag( $settings );
		?>
        <div class="p-content">
			<?php
			foxiz_entry_top( $settings );
			foxiz_entry_title( $settings );
			foxiz_entry_review( $settings );
			foxiz_entry_excerpt( $settings );
			foxiz_entry_meta( $settings );
			foxiz_entry_readmore( $settings );
			?>
        </div>
		<?php foxiz_post_close_tag();
	}
}

if ( ! function_exists( 'foxiz_list_small_2' ) ) {
	/**
	 * @param array $settings
	 */
	function foxiz_list_small_2( $settings = array() ) {

		$settings['none_featured_extra'] = true;
		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h5';
		}
		if ( empty( $settings['crop_size'] ) ) {
			$settings['crop_size'] = 'thumbnail';
		}
		if ( ! isset( $settings['featured_classes'] ) ) {
			$settings['featured_classes'] = 'ratio-v1';
		}
		$settings['post_classes'] = 'p-small p-list-small-2';

		foxiz_post_open_tag( $settings );
		?><?php foxiz_featured_only( $settings ); ?>
        <div class="p-content">
			<?php
			foxiz_entry_top( $settings );
			foxiz_entry_title( $settings );
			foxiz_entry_review( $settings );
			foxiz_entry_excerpt( $settings );
			foxiz_entry_meta( $settings );
			foxiz_entry_readmore( $settings );
			?>
        </div>
		<?php foxiz_post_close_tag();
	}
}

if ( ! function_exists( 'foxiz_list_small_3' ) ) {
	/**
	 * @param array $settings
	 */
	function foxiz_list_small_3( $settings = array() ) {

		$settings['none_featured_extra'] = true;
		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h5';
		}
		if ( empty( $settings['crop_size'] ) ) {
			$settings['crop_size'] = 'thumbnail';
		}
		if ( ! isset( $settings['featured_classes'] ) ) {
			$settings['featured_classes'] = 'ratio-q';
		}
		$settings['post_classes'] = 'p-small p-list-small-3 p-list-small-2';
		foxiz_post_open_tag( $settings );
		?><?php foxiz_featured_only( $settings ); ?>
        <div class="p-content">
			<?php
			foxiz_entry_top( $settings );
			foxiz_entry_title( $settings );
			foxiz_entry_review( $settings );
			foxiz_entry_excerpt( $settings );
			foxiz_entry_meta( $settings );
			foxiz_entry_readmore( $settings );
			?>
        </div>
		<?php foxiz_post_close_tag();
	}
}

if ( ! function_exists( 'foxiz_list_inline' ) ) {
	/**
	 * @param array $settings
	 * render list style inline
	 */
	function foxiz_list_inline( $settings = array() ) {

		$settings['post_classes'] = 'p-list-inline';
		$settings['title_prefix'] = '<i class="rbi rbi-plus" aria-hidden="true"></i>';
		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h6';
		}

		foxiz_post_open_tag( $settings );
		foxiz_entry_title( $settings );
		foxiz_post_close_tag();
	}
}

if ( ! function_exists( 'foxiz_list_box_1' ) ) {
	/**
	 * @param $settings
	 */
	function foxiz_list_box_1( $settings = array() ) {

		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h3';
		}
		if ( empty( $settings['crop_size'] ) ) {
			$settings['crop_size'] = 'foxiz_crop_g1';
		}
		if ( empty( $settings['box_style'] ) ) {
			$settings['box_style'] = 'bg';
		}
		$settings['post_classes'] = 'p-list p-box p-list-1 p-list-box-1 box-' . $settings['box_style'];
		foxiz_post_open_tag( $settings ); ?>
        <div class="list-box">
            <div class="list-holder">
                <div class="list-feat-holder">
					<?php foxiz_featured_with_category( $settings ); ?>
                </div>
                <div class="p-content">
					<?php
					foxiz_entry_title( $settings );
					foxiz_entry_review( $settings );
					foxiz_entry_excerpt( $settings );
					foxiz_entry_meta( $settings );
					foxiz_entry_readmore( $settings );
					?>
                </div>
            </div>
        </div>
		<?php foxiz_post_close_tag();
	}
}

if ( ! function_exists( 'foxiz_list_box_2' ) ) {
	/**
	 * @param array $settings
	 */
	function foxiz_list_box_2( $settings = array() ) {

		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h3';
		}
		if ( empty( $settings['crop_size'] ) ) {
			$settings['crop_size'] = 'foxiz_crop_g1';
		}
		if ( empty( $settings['box_style'] ) ) {
			$settings['box_style'] = 'bg';
		}
		$settings['post_classes'] = 'p-list p-box p-list-2 p-list-box-2 box-' . $settings['box_style'];
		foxiz_post_open_tag( $settings ); ?>
        <div class="list-box">
            <div class="list-holder">
                <div class="list-feat-holder">
					<?php foxiz_featured_only( $settings ); ?>
                </div>
                <div class="p-content">
					<?php
					foxiz_entry_top( $settings );
					foxiz_entry_title( $settings );
					foxiz_entry_review( $settings );
					foxiz_entry_excerpt( $settings );
					foxiz_entry_meta( $settings );
					foxiz_entry_readmore( $settings );
					?>
                </div>
            </div>
        </div>
		<?php foxiz_post_close_tag();
	}
}

if ( ! function_exists( 'foxiz_list_flex' ) ) {
	/**
	 * @param $settings
	 */
	function foxiz_list_flex( $settings = array() ) {

		if ( empty( $settings['block_structure'] ) || ! is_array( $settings['block_structure'] ) ) {
			return;
		}

		$settings['post_classes'] = 'p-list p-list-2';
		if ( ! empty( $settings['box_style'] ) ) {
			$settings['post_classes'] = 'p-list p-box p-list-2 p-list-box-2 box-' . $settings['box_style'];
		}

		if ( empty( $settings['title_tag'] ) ) {
			$settings['title_tag'] = 'h3';
		}
		if ( empty( $settings['crop_size'] ) ) {
			$settings['crop_size'] = 'foxiz_crop_g1';
		}

		foxiz_post_open_tag( $settings );
		if ( ! empty( $settings['box_style'] ) ) {
			echo '<div class="list-box">';
		} ?>
        <div class="list-holder">
            <div class="list-feat-holder">
				<?php if ( ! empty( $settings['overlay_category'] ) ) {
					foxiz_featured_with_category( $settings );
				} else {
					foxiz_featured_only( $settings );
				} ?>
            </div>
            <div class="p-content">
				<?php foreach ( $settings['block_structure'] as $element ) :
					switch ( $element ) {
						case 'category' :
							foxiz_entry_top( $settings );
							break;
						case 'title' :
							foxiz_entry_title( $settings );
							break;
						case 'excerpt' :
							foxiz_entry_excerpt( $settings );
							break;
						case 'meta' :
							foxiz_entry_meta( $settings );
							break;
						case 'review' :
							echo foxiz_get_entry_review( $settings );
							break;
						case 'readmore' :
							foxiz_entry_readmore( $settings );
							break;
						case 'divider' :
							foxiz_entry_divider( $settings );
							break;
						default:
							break;
					}
				endforeach;
				?>
            </div>
        </div>
		<?php if ( ! empty( $settings['box_style'] ) ) {
			echo '</div>';
		}
		foxiz_post_close_tag();
	}
}