<?php
/**
 * Custom homepage category content.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'dlpro_recentpost_marque' ) ) :
	/**
	 * This function for display slider in homepage
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function dlpro_recentpost_marque() {
		global $post;
		$cat = get_theme_mod( 'gmr_category-marque', 0 );

		$args = array(
			'post_type'              => 'post',
			'cat'                    => $cat,
			'orderby'                => 'date',
			'order'                  => 'desc',
			'showposts'              => 8,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => 1,
			/**
			 * Make it fast withour update term cache and cache results
			 * https://thomasgriffin.io/optimize-wordpress-queries/
			 */
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
			'no_found_rows'          => true,
		);

		$recent = get_posts( $args );
		if ( $recent ) {
			foreach ( $recent as $post ) :
				setup_postdata( $post );
				?>
					<a href="<?php the_permalink(); ?>" class="gmr-recent-marquee" title="<?php the_title(); ?>">
					<?php
						// look for featured image.
						if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'thumbnail' );
						endif; // has_post_thumbnail.				
					?>
						<?php the_title(); ?>
					</a>
				<?php
			endforeach;
			wp_reset_postdata();
		} else {
			esc_html_e( 'No Features Applications', 'dlpro' );
		}
	}
endif; /* endif dlpro_recentpost_marque */
add_action( 'dlpro_recentpost_marque', 'dlpro_recentpost_marque', 50 );
