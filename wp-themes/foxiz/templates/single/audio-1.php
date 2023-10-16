<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'foxiz_render_single_audio_1' ) ) {
	function foxiz_render_single_audio_1() {

		$classes          = array();
		$classes[]        = 'single-standard-1 single-embed-1';
		$sidebar_name     = foxiz_get_single_setting( 'sidebar_name' );
		$line_length      = foxiz_get_option( 'single_post_line_length' );
		$sidebar_position = foxiz_get_single_sidebar_position();

		if ( 'none' === $sidebar_position ) {
			$sidebar_name = false;
		}
		if ( empty( $sidebar_name ) || ! is_active_sidebar( $sidebar_name ) ) {
			$classes[] = 'without-sidebar';
		} else {
			$classes[] = 'is-sidebar-' . esc_attr( $sidebar_position );
		}
		if ( foxiz_get_single_sticky_sidebar() ) {
			$classes[] = 'sticky-sidebar';
		}
		if ( ! empty( $line_length ) ) {
			$classes[] = 'optimal-line-length';
		} ?>
		<div class="<?php echo join( ' ', $classes ); ?>">
			<div class="rb-container edge-padding">
				<?php foxiz_single_open_tag(); ?>
				<header class="single-header">
					<?php
					foxiz_single_breadcrumb();
					foxiz_single_entry_category();
					foxiz_single_title( 'fw-headline' );
					foxiz_single_tagline( 'fw-tagline' );
					foxiz_single_header_meta();
					?>
				</header>
				<div class="grid-container">
                    <div class="s-ct">
                        <div class="s-feat-outer">
							<?php foxiz_single_audio_embed(); ?>
                        </div>
						<?php
						foxiz_single_content();
						foxiz_single_author_box();
						foxiz_single_next_prev();
						foxiz_single_comment();
						?>
                    </div>
					<?php foxiz_single_sidebar( $sidebar_name ); ?>
				</div>
				<?php
				foxiz_single_close_tag();
				foxiz_single_footer();
				?>
			</div>
		</div>
		<?php
	}
}