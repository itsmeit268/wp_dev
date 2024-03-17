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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo dlpro_itemtype_schema( 'CreativeWork' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

	<div class="gmr-box-content gmr-single">

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

</article><!-- #post-## -->
