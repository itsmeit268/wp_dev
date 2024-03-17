<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Custom field via dlpro-core.
$downloads = get_post_meta( $post->ID, 'dlpro_dlbutton_item', true );

if ( is_active_sidebar( 'download-1' ) && is_active_sidebar( 'download-2' ) ) {
	$class = 'col-md-4';
} elseif ( is_active_sidebar( 'download-1' ) || is_active_sidebar( 'download-2' ) ) {
	$class = 'col-md-6';
} else {
	$class = 'col-md-12';
}
$linkvar = ( get_query_var( 'link' ) ) ? get_query_var( 'link' ) : false;
?>

<div id="post-download">

	<div class="gmr-box-content gmr-single">

		<div class="entry-content entry-content-single">
			<div class="text-download">
				<div class="download-title">
					<?php
						echo '<h1><span class="icon_download"></span>' . esc_html__( 'Download File', 'dlpro' ) . ' <a href="' . esc_url( get_permalink() ) . '" title="' . esc_html( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</a>.</h1>';
					?>
				</div>
			</div>
			<?php

			if ( ! empty( $downloads ) ) {

				echo '<div class="row">';
				if ( $linkvar ) {
					echo '<div id="download" class="gmr-download-wrap clearfix ' . esc_html( $class ) . '">';
						echo '<h3 class="widget-title title-synopsis">' . esc_html__( 'Start Download...', 'dlpro' ) . '</h3>';
						echo '<p>' . esc_html__( 'Download of', 'dlpro' ) . ' <a href="' . esc_url( get_permalink() ) . '" title="' . esc_html( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</a> ' . esc_html__( 'will start in', 'dlpro' ) . ' <label id="lblTime" style="font-weight:bold;"></label> ' . esc_html__( 'seconds', 'dlpro' ) . '.</p>';
						echo '<p>' . esc_html__( 'Your download will begin automatically. If it doesn\'t, please', 'dlpro' );
						echo ' <a href="#" onclick="location.href=\'';
					// key as index (1,2,3 etc).
					foreach ( $downloads as $key => $download ) {
						if ( ! empty( $download['dlpro_dlbutton_item_url'] ) && ( $linkvar == ( (int) $key + 1 ) ) ) {
							echo $download['dlpro_dlbutton_item_url'];
						}
					}

						echo '\';" rel="nofollow" title="' . esc_html__( 'Link download', 'dlpro' ) . ' ' . esc_html( get_the_title() ) . '">' . esc_html__( 'click here', 'dlpro' ) . '</a>.</p>';
					echo '</div>';
				} else {
					echo '<div id="download" class="gmr-download-wrap clearfix ' . esc_html( $class ) . '">';
						echo '<h3 class="widget-title title-synopsis">' . esc_html__( 'Download Links', 'dlpro' ) . '</h3>';
						echo '<ul class="gmr-download-list clearfix wp-dark-mode-ignore">';
					foreach ( $downloads as $key => $download ) {
						if ( ! empty( $download['dlpro_dlbutton_item_url'] ) ) {
							echo '<li><a href="' . esc_url( add_query_arg( 'link', ( (int) $key + 1 ) ) ) . '" class="button" rel="nofollow" target="_blank" title="' . esc_html__( 'Download link ', 'dlpro' ) . ( (int) $key + 1 ) . '"><span class="icon_download" aria-hidden="true"></span> ';
							if ( ! empty( $download['dlpro_dlbutton_item_title'] ) ) {
								echo esc_html( $download['dlpro_dlbutton_item_title'] );
							} else {
								echo esc_html__( 'Download Link ', 'dlpro' ) . ( (int) $key + 1 );
							}
							echo '</a></li>';
						}
					}
					echo '</ul>';
					echo '</div>';
				}
				if ( is_active_sidebar( 'download-1' ) ) {
					echo '<aside id="secondary" class="widget-area ' . esc_html( $class ) . '" role="complementary" ' . dlpro_itemtype_schema( 'WPSideBar' ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						dynamic_sidebar( 'download-1' );
					echo '</aside>';
				}
				if ( is_active_sidebar( 'download-2' ) ) {
					echo '<aside id="secondary" class="widget-area ' . esc_html( $class ) . '" role="complementary" ' . dlpro_itemtype_schema( 'WPSideBar' ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						dynamic_sidebar( 'download-2' );
					echo '</aside>';
				}
				echo '</div>';

			}


			if ( is_active_sidebar( 'download-3' ) ) {
				dynamic_sidebar( 'download-3' );
			}

			?>
			<?php do_action( 'dlpro_core_related_post' ); ?>
		</div><!-- .entry-content -->

	</div><!-- .gmr-box-content -->

</div><!-- #post-## -->

<?php
if( $linkvar ) {
	echo '<script type="text/javascript">';
	foreach ( $downloads as $key => $download ) {
		if ( ! empty( $download['dlpro_dlbutton_item_url'] ) && ( $linkvar == ( (int) $key + 1 ) ) ) {
			echo 'var url = "' . $download['dlpro_dlbutton_item_url'] . '";';
		}
	}
		echo 'var seconds = "5";';

		echo 'function DelayRedirect(){';
			echo 'if ( seconds <= 0 ) {';
				echo 'window.location = url;';
			echo '} else {';
				echo 'seconds--;';
				echo 'document.getElementById("lblTime").innerHTML = seconds;';
				echo 'setTimeout("DelayRedirect()", 1000);';
			echo '}';
		echo '}';
		echo 'window.onload = function () {';
			echo 'DelayRedirect();';
		echo '}';
	echo '</script>';
}
