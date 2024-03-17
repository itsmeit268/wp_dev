<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_fp = get_query_var( 'download' );

if ( true === $current_fp ) {
	$class_sidebar = ' col-md-12';
} else {
	$class_sidebar = ' col-md-8';
}

// Custom field via dlpro-core.
$downloads = get_post_meta( $post->ID, 'dlpro_dlbutton_item', true );

if ( true === $current_fp && empty( $downloads ) ) {
	wp_safe_redirect( esc_url( get_permalink() ) );
	exit;

} else {
	get_header();

	?>

	<div id="primary" class="<?php echo esc_attr( $class_sidebar ); ?>">
		<div class="content-area">
		<?php do_action( 'dlpro_view_breadcrumbs' ); ?>
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) :
				the_post();
				if ( true !== $current_fp ) {
					if ( is_attachment() ) {
						get_template_part( 'template-parts/content', 'attachment' );
					} else {
						get_template_part( 'template-parts/content', 'single' );
					}
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				} elseif ( true === $current_fp ) {
					get_template_part( 'template-parts/content', 'single-download' );
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		</div>
	</div><!-- #primary -->

	<?php
	if ( true === $current_fp ) :
	else :
		get_sidebar();
	endif;

	get_footer();

}
