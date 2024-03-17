<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

	<?php
	if ( is_active_sidebar( 'home-1' ) && is_active_sidebar( 'home-2' ) ) {
		$class = 'col-md-6';
	} elseif ( is_active_sidebar( 'home-1' ) || is_active_sidebar( 'home-2' ) ) {
		$class = 'col-md-12';
	}

	if ( is_active_sidebar( 'home-1' ) || is_active_sidebar( 'home-2' ) ) :
		?>
		<div id="home-module" class="widget-home">
			<div class="row">
				<?php if ( is_active_sidebar( 'home-1' ) ) : ?>
					<div class="home-column <?php echo esc_html( $class ); ?>">
						<?php dynamic_sidebar( 'home-1' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'home-2' ) ) : ?>
					<div class="home-column <?php echo esc_html( $class ); ?>">
						<?php dynamic_sidebar( 'home-2' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php
	if ( is_active_sidebar( 'sidebar-left' ) ) {
		echo '<div class="row">';
		get_sidebar( 'left' );
		echo '<div class="col-md-8">';
	}
	?>
	<div class="content-area">
		<main id="main" class="site-main gmr-infinite-selector" role="main">
		<?php
		if ( have_posts() ) {
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text" <?php echo dlpro_itemprop_schema( 'headline' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			if ( is_front_page() && is_home() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
				</header>
				<?php
			endif;
			$texthomepage = get_theme_mod( 'gmr_texttitlehomepage' );
			if ( $texthomepage ) :
				// sanitize html output.
				echo '<h3 class="page-title">' . esc_html( $texthomepage ) . '</h3>';

			else :
				echo '<h3 class="page-title">' . esc_html__( 'Recent Software', 'dlpro' ) . '</h3>';

			endif;
			echo '<div id="gmr-main-load">';
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/**
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
