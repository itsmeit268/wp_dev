<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>

<div id="primary" class="col-md-8">
	<div class="content-area">
	<?php do_action( 'dlpro_view_breadcrumbs' ); ?>
	<?php
		echo '<h1 class="page-title" ' . dlpro_itemprop_schema( 'headline' ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		the_archive_title();
		echo '</h1>';

		// display description archive page.
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>

	<main id="main" class="site-main gmr-infinite-selector" role="main">

	<?php
	if ( have_posts() ) {

		echo '<div id="gmr-main-load">';

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'blogs' );
			do_action( 'dlpro_banner_between_posts' );

		endwhile;

		echo '</div>';

		echo gmr_get_pagination(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	} else {
		get_template_part( 'template-parts/content', 'none' );
	}
	?>

	</main><!-- #main -->
	</div>
</div><!-- #primary -->

<?php
get_sidebar( 'blogs' );

get_footer();
