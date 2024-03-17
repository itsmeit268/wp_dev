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

$hasthumbnail = '';
if ( has_post_thumbnail() ) {
	$hasthumbnail = ' has-post-thumbnail';
}
$classes = '';
if ( 0 === $thumbnail ) {
	$classes = 'single-thumb hentry';
} else {
	$classes = 'no-single-thumb hentry';
}

?>

<article id="post-<?php the_ID(); ?>" class="<?php echo esc_html( $classes ); ?><?php echo esc_html( $hasthumbnail ); ?>" <?php echo dlpro_itemtype_schema( 'SoftwareApplication' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

	<div class="gmr-box-content gmr-single">

		<header class="entry-header clearfix">
			<?php
			if ( 0 === $thumbnail ) :
				if ( has_post_thumbnail() ) {
					?>
					<figure class="pull-left">
						<?php the_post_thumbnail( 'medium' ); ?>
					</figure>
					<?php
				}
			endif;
			?>
			<div class="title-wrap">
				<?php the_title( '<h1 class="entry-title" ' . dlpro_itemprop_schema( 'name' ) . '>', '</h1>' ); ?>
				<?php
					$version = get_post_meta( $post->ID, 'DLPRO_Version', true );
					echo '<div class="entry-meta">';
					if ( ! empty( $version ) ) {
						echo esc_html__( 'Version: ', 'dlpro' );
						echo '<span itemprop="softwareVersion">' . esc_html( $version ) . '</span>';
					}
					if ( class_exists( 'Rate_My_Post' ) ) {
						$vote_count   = rmp_get_vote_count();
						$rating       = rmp_get_avg_rating();
						$visualrating = rmp_get_visual_rating();
						if ( ! empty( $version ) && $vote_count !== 0 ) {
							echo ' | ';
						}
						if ( $vote_count !== 0 ) {
							echo '<span class="list-title wp-dark-mode-ignore">' . $visualrating . ' <span itemprop="aggregateRating" itemscope="itemscope" itemtype="https://schema.org/AggregateRating"><span itemprop="ratingValue">' . $rating . '</span> (<span itemprop="ratingCount">' . $vote_count . '</span>)</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
					}
					echo '</div>';
				?>
				<div class="gmr-button-download wp-dark-mode-ignore">
					<?php
					// Custom field via dlpro-core.
					$downloads = get_post_meta( $post->ID, 'dlpro_dlbutton_item', true );

					if ( ! empty( $downloads ) ) {
						?>
						<a href="<?php echo esc_url( get_permalink() . 'download/' ); ?>" class="button in-single-download" title="<?php esc_attr_e( 'Download ', 'dlpro' ) . '' . the_title(); ?>"><span class="icon_download"></span>
						<?php esc_attr_e( 'Download', 'dlpro' ); ?>
						<?php
						$filesize = get_post_meta( $post->ID, 'DLPRO_Filesize', true );
						if ( ! empty( $filesize ) ) {
							echo '<span class="download-filesize">(<span itemprop="fileSize">' . esc_attr( $filesize ) . '</span>)</span>';
						}
						?>
						</a>
					<?php } ?>
					<?php do_action( 'dlpro_add_share_the_content' ); ?>
				</div>
			</div>
		</header><!-- .entry-header -->
		<div class="entry-content entry-content-single">
			<div class="row">
				<div id="specs" class="col-md-3 pos-sticky">
				<?php
					echo '<ul class="gmr-list-specs">';
					$posted_by = sprintf(
						/* translators: used between list items, there is a space after the comma */
						'%s',
						'<span class="entry-author vcard" ' . dlpro_itemprop_schema( 'author' ) . ' ' . dlpro_itemtype_schema( 'person' ) . '><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . __( 'Permalink to: ', 'dlpro' ) . esc_html( get_the_author() ) . '" ' . dlpro_itemprop_schema( 'url' ) . '><span ' . dlpro_itemprop_schema( 'name' ) . '>' . esc_html( get_the_author() ) . '</span></a></span>'
					);
					echo '<li><span class="list-title">' . esc_html__( 'Posted by: ', 'dlpro' ) . '</span><br/>' . $posted_by . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

					$time_string = '<time class="entry-date published updated" ' . dlpro_itemprop_schema( 'dateModified' ) . ' datetime="%1$s">%2$s</time>';
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="entry-date published" ' . dlpro_itemprop_schema( 'datePublished' ) . ' datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
					}
					$time_string = sprintf(
						$time_string,
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( 'c' ) ),
						esc_html( get_the_modified_date() )
					);

					$posted_on = '<span class="list-title">' . esc_html__( 'Posted on: ', 'dlpro' ) . '</span><br/>' . $time_string;
					echo '<li> ' . $posted_on . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( esc_html__( ', ', 'dlpro' ) );
					if ( $categories_list ) {
						echo '<li>';
						echo '<span class="list-title">' . esc_html__( 'Category: ', 'dlpro' ) . '</span><br/>' . $categories_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo '<span class="screen-reader-text" itemprop="applicationCategory">' . wp_strip_all_tags( $categories_list ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo '</li>';
					}
					$system = get_post_meta( $post->ID, 'DLPRO_System', true );
					if ( ! empty( $system ) ) {
							echo '<li>';
							echo '<span class="list-title">' . esc_html__( 'System: ', 'dlpro' ) . '</span><br/>';
							echo '<span itemprop="operatingSystem">' . esc_html( $system ) . '</span>';
							echo '</li>';
					} else {
						echo '<li>';
						echo '<span class="list-title">' . esc_html__( 'System: ', 'dlpro' ) . '</span><br/>';
						echo '<span itemprop="operatingSystem">' . esc_html__( 'Unknown', 'dlpro' ) . '</span>';
						echo '</li>';
					}
					$license = get_post_meta( $post->ID, 'DLPRO_License', true );
					if ( ! empty( $license ) ) {
							echo '<li>';
							echo '<span class="list-title">' . esc_html__( 'License: ', 'dlpro' ) . '</span><br/>';
							echo esc_html( $license );
							echo '</li>';
					}
					$dev = get_post_meta( $post->ID, 'DLPRO_Developer', true );
					if ( ! empty( $dev ) ) {
							echo '<li>';
							echo '<span class="list-title">' . esc_html__( 'Developer: ', 'dlpro' ) . '</span><br/>';
							echo esc_html( $dev );
							echo '</li>';
					}
					$price = get_post_meta( $post->ID, 'DLPRO_Price', true );
					$currency = get_post_meta( $post->ID, 'DLPRO_Currency', true );
					if ( ! empty( $currency ) ) {
						$symbol = $currency;
					} else {
						$symbol = 'USD';
					}
					if ( ! empty( $price ) ) {
							echo '<li><span itemprop="offers" ' . dlpro_itemtype_schema( 'Offer' ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							echo '<span class="list-title">' . esc_html__( 'Price: ', 'dlpro' ) . '</span><br/>';
							echo $symbol . ' <span itemprop="price">' . floatval( $price ) . '</span>';
							echo '<span itemprop="priceCurrency" content="' . $symbol . '"></span>';
							echo '</span></li>';
					} else {
						echo '<li><span itemprop="offers" ' . dlpro_itemtype_schema( 'Offer' ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo '<span class="list-title">' . esc_html__( 'Price: ', 'dlpro' ) . '</span><br/>';
						echo $symbol . ' <span itemprop="price">0</span>';
						echo '<span itemprop="priceCurrency" content="' . $symbol . '"></span>';
						echo '</span></li>';
					}

					if ( function_exists( 'the_views' ) ) {
						echo '<li>';
							echo '<span class="list-title">' . esc_html__( 'Views: ', 'dlpro' ) . '</span><br/>';
							the_views();
						echo '</li>';
					}
					echo '</ul>';
				?>
				</div>
				<div id="description" class="col-md-9">
					<?php
					$gallery = get_post_meta( $post->ID, 'DLPRO_Gallery', true );
					if ( ! empty( $gallery ) ) {
						echo do_shortcode( $gallery );
					}
					if ( '' !== $post->post_content ) {
						the_content();
					} else {
						echo esc_html__( 'No description', 'dlpro' );
					}
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', esc_html__( ', ', 'dlpro' ) );
					if ( $tags_list ) {
						echo '<div class="tagcloud">';
						echo '<div class="tagtitle">' . esc_html__( 'Tagged: ', 'dlpro' ) . '</div>' . $tags_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo '</div>';
					}
					if ( function_exists( 'the_ratings' ) ) {
						the_ratings();
					} elseif ( shortcode_exists( 'ratemypost-result' ) ) {
						echo do_shortcode( '[ratemypost]' );
					}
					?>
				</div>
			</div>
			<?php do_action( 'dlpro_related_post_display' ); ?>
			<?php do_action( 'dlpro_banner_after_relpost' ); ?>

		</div><!-- .entry-content -->

	</div><!-- .gmr-box-content -->

	<?php do_action( 'dlpro_author_box' ); ?>

</article><!-- #post-## -->
