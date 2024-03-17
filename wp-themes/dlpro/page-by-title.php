<?php
/**
 * Template Name: Order by title
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
	<?php
	if ( is_active_sidebar( 'sidebar-left' ) ) {
		echo '<div class="row">';
		get_sidebar( 'left' );
		echo '<div class="col-md-8">';
	}
	?>
	<div class="content-area">
	<?php do_action( 'dlpro_view_breadcrumbs' ); ?>

	<?php the_title( '<h1 class="page-title" ' . dlpro_itemprop_schema( 'headline' ) . '>', '</h1>' ); ?>

	<main id="main" class="site-main gmr-infinite-selector" role="main">

	<?php

	global $paged;

	$pagess = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	
	$catug = get_post_meta( $post->ID, '_catmode', true );
	if ( isset( $catug ) && ! empty( $catug ) ) {
		$categ = (int) $catug;
	} else {
		$categ = 0;
	}

	$args = array(
		'paged'               => $pagess,
		'post_type'           => array( 'post' ),
		'ignore_sticky_posts' => 1,
		'cat'                 => $categ,
		'orderby'             => 'title',
		'order'               => 'ASC',
	);

	$the_query = new WP_Query( $args );

	global $wp_query;
	// Put default query object in a temp variable.
	$tmp_query = $wp_query;
	// Now wipe it out completely.
	$wp_query = null;
	// Re-populate the global with our custom query.
	$wp_query = $the_query;

	if ( $wp_query->have_posts() ) {
		echo '<div id="gmr-main-load">';
		/* Start the Loop */
		while ( $wp_query->have_posts() ) :
			$wp_query->the_post();

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
	// Restore original query object.
	$wp_query = null;
	$wp_query = $tmp_query;

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
