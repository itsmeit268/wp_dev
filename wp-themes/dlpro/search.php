<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div id="primary" class="col-md-8">
	<?php
	if ( is_active_sidebar( 'sidebar-left' ) ) {
		echo '<div class="row">';
		get_sidebar( 'left' );
		echo '<div class="col-md-8">';
	}
	?>
	<div class="content-area">
	<?php do_action( 'dlpro_view_breadcrumbs' ); ?>
	<?php
		echo '<h1 class="page-title" ' . dlpro_itemprop_schema( 'headline' ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo esc_html__( 'Search Results For: ', 'dlpro' ) . ' ' . esc_attr( apply_filters( 'the_search_query', get_search_query( false ) ) );
		echo '</h1>';
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
			get_template_part( 'template-parts/content', get_post_format() );
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
	<?php
	if ( is_active_sidebar( 'sidebar-left' ) ) {
		echo '</div>';
		echo '</div>';
	}
	?>
</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
