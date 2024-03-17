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

// Disable thumbnail options via customizer.
$thumbnail = get_theme_mod( 'gmr_active-singlethumb', 0 );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo dlpro_itemtype_schema( 'CreativeWork' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

	<div class="gmr-box-content gmr-single">

		<?php
		if ( 0 === $thumbnail ) :
			if ( has_post_thumbnail() ) {
				?>
				<figure class="wp-caption alignnone text-center gmr-thumbnail-blog">
					<?php the_post_thumbnail(); ?>

					<?php
					$get_description = get_post( get_post_thumbnail_id() )->post_excerpt;
					if ( ! empty( $get_description ) ) :
						?>
						<figcaption class="wp-caption-text"><?php echo esc_html( $get_description ); ?></figcaption>
					<?php endif; ?>
				</figure>
				<?php
			}
		endif;
		?>

		<header class="entry-header clearfix">
			<div class="title-wrap-blog">
				<?php the_title( '<h1 class="entry-title" ' . dlpro_itemprop_schema( 'headline' ) . '>', '</h1>' ); ?>
				<?php
					gmr_posted_on();
				?>
				<div class="gmr-button-download">
					<?php do_action( 'dlpro_add_share_the_content' ); ?>
				</div>
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content entry-content-single" <?php echo dlpro_itemprop_schema( 'text' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php
				the_content();
			?>

		</div><!-- .entry-content -->

	</div><!-- .gmr-box-content -->

	<?php do_action( 'dlpro_core_author_box' ); ?>

</article><!-- #post-## -->
