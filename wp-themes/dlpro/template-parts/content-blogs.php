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
	'gmr-smallthumb-blogs',
	'item-infinite',
	'clearfix',
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<?php
	// Add thumnail.
	$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	if ( ! empty( $featured_image_url ) ) :
		echo '<div class="content-thumbnail">';
			echo '<a href="' . esc_url( get_permalink() ) . '" itemprop="url" title="' . the_title_attribute(
				array(
					'before' => '',
					'after'  => '',
					'echo'   => false,
				)
			) . '" rel="bookmark">';
					the_post_thumbnail( 'large' );
			echo '</a>';
		echo '</div>';
	endif;
	?>


	<div class="item-article">
		<div class="header-title">
			<h2 class="post-title" <?php echo dlpro_itemprop_schema( 'headline' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<a href="<?php the_permalink(); ?>" <?php echo dlpro_itemprop_schema( 'url' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		</div>

		<?php
		if ( '0' !== $length ) :
			?>
			<div class="entry-content" <?php echo dlpro_itemprop_schema( 'text' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

	</div><!-- .item-article -->

	<?php if ( is_sticky() ) { ?>
		<kbd class="kbd-sticky"><?php esc_html_e( 'Sticky', 'dlpro' ); ?></kbd>
	<?php } ?>

</article><!-- #post-## -->
