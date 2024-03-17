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

$length = get_theme_mod( 'gmr_excerpt_number', '20' );

$classes = array(
	'gmr-box-content',
	'gmr-archivepage',
	'gmr-smallthumb',
	'item-infinite',
	'clearfix',
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="gmr-list-table">
		<div class="gmr-table-row">
			<?php
			// Add thumnail.
			$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			if ( ! empty( $featured_image_url ) ) :
				echo '<div class="content-thumbnail gmr-table-cell">';
					echo '<a href="' . esc_url( get_permalink() ) . '" itemprop="url" title="' . the_title_attribute(
						array(
							'before' => '',
							'after'  => '',
							'echo'   => false,
						)
					) . '" rel="bookmark">';
							the_post_thumbnail( 'thumbnail' );
					echo '</a>';
				echo '</div>';
			endif;
			?>

			<header class="gmr-table-cell">

				<div class="header-title">
					<h2 class="post-title" <?php echo dlpro_itemprop_schema( 'headline' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
						<a href="<?php the_permalink(); ?>" <?php echo dlpro_itemprop_schema( 'url' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
					<?php
					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							$version = get_post_meta( $post->ID, 'DLPRO_Version', true );
							if ( ! empty( $version ) ) {
								echo '<div class="gmr-app-meta gmr-app-version">';
								echo esc_html( $version );
								echo '</div>';
							}
							?>
						</div><!-- .entry-meta -->
						<?php
					endif;
					?>
				</div>
			</header><!-- .entry-header -->

			<div class="gmr-download-frontend gmr-table-cell">
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php esc_attr_e( 'Download ', 'dlpro' ) . '' . the_title(); ?>"><span class="icon_download"></span></a>
			</div>
		</div>
	</div>

	<?php
	if ( '0' !== $length ) :
		?>
		<div class="item-article">
			<div class="entry-content" <?php echo dlpro_itemprop_schema( 'text' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			<?php
			echo '<div class="wp-dark-mode-ignore">';
			if ( shortcode_exists( 'ratings' ) ) {
				echo '<div class="dlpro-postratings-results">';
				echo do_shortcode( '[ratings id="' . $post->ID . '" results="true"]' );
				echo '</div>';
			} elseif ( shortcode_exists( 'ratemypost-result' ) ) {
				echo do_shortcode( '[ratemypost-result]' );
			}
			echo '</div>';
			?>
		</div><!-- .item-article -->

	<?php endif; ?>

	<?php if ( is_sticky() ) { ?>
		<kbd class="kbd-sticky"><?php esc_attr_e( 'Sticky', 'dlpro' ); ?></kbd>
	<?php } ?>

</article><!-- #post-## -->
