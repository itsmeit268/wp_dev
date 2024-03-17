<?php
/**
 * Template part for displaying a message that posts cannot be found.
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

<section class="no-results not-found">
	<div class="gmr-box-content">
		<header class="entry-header">
			<h2><?php esc_html_e( 'Nothing Found', 'dlpro' ); ?></h2>
		</header><!-- .page-header -->

		<div class="entry-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :
				?>

				<p><?php /* translators: used between list items, there is a space after the comma */ printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dlpro' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dlpro' ); ?></p>
				<?php

			else :
				?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'dlpro' ); ?></p>
				<?php
			endif;
			?>
		</div><!-- .page-content -->
	</div><!-- .gmr-box-content -->
</section><!-- .no-results -->
