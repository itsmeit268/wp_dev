<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
	<main id="main" class="site-main" role="main">

		<section class="gmr-box-content error-404 not-found">

			<header class="entry-header">
				<h1 class="page-title screen-reader-text"><?php esc_html_e( 'Error 404', 'dlpro' ); ?></h1>
				<h2 class="page-title" <?php dlpro_itemprop_schema( 'headline' ); ?>><?php esc_html_e( 'Nothing Found', 'dlpro' ); ?></h2>
			</header><!-- .entry-header -->

			<div class="page-content" <?php dlpro_itemprop_schema( 'text' ); ?>>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dlpro' ); ?></p>

			</div><!-- .page-content -->

		</section><!-- .error-404 -->

	</main><!-- #main -->
	</div>
</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
