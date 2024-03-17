<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'gmr_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function gmr_posted_on() {
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

		$posted_on = esc_html__( 'Posted on ', 'dlpro' ) . $time_string;

		$posted_by = sprintf(
			/* translators: used between list items, there is a space after the comma */
			esc_html__( 'By %s', 'dlpro' ),
			'<span class="entry-author vcard" ' . dlpro_itemprop_schema( 'author' ) . ' ' . dlpro_itemtype_schema( 'person' ) . '><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . __( 'Permalink to: ', 'dlpro' ) . esc_html( get_the_author() ) . '" ' . dlpro_itemprop_schema( 'url' ) . '><span ' . dlpro_itemprop_schema( 'name' ) . '>' . esc_html( get_the_author() ) . '</span></a></span>'
		);
		if ( is_single() ) {
			echo '<div class="entry-meta">';
			echo '<span class="byline"> ' . $posted_by . '</span><span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			if ( function_exists( 'the_views' ) ) {
				echo '<span class="gmr-view">';
					the_views();
				echo '</span>';
			}
			echo '</div>';
		} else {
			echo '<div class="entry-meta"><span class="byline"> ' . $posted_by . '</span><span class="posted-on">' . $posted_on . '</span></div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif; // endif gmr_posted_on.

if ( ! function_exists( 'gmr_custom_excerpt_length' ) ) :
	/**
	 * Filter the except length to 20 characters.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length Excerpt length.
	 * @return int (Maybe) modified excerpt length.
	 */
	function gmr_custom_excerpt_length( $length ) {
		$length = get_theme_mod( 'gmr_excerpt_number', '20' );
		// absint sanitize int non minus.
		return absint( $length );
	}
endif; // endif gmr_custom_excerpt_length.
add_filter( 'excerpt_length', 'gmr_custom_excerpt_length', 999 );

if ( ! function_exists( 'gmr_custom_readmore' ) ) :
	/**
	 * Filter the except length to 20 characters.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more More.
	 * @return string read more.
	 */
	function gmr_custom_readmore( $more ) {
		$more = get_theme_mod( 'gmr_read_more' );
		if ( empty( $more ) ) {
			return '';
		} else {
			return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '" title="' . get_the_title( get_the_ID() ) . '" ' . dlpro_itemprop_schema( 'url' ) . '>' . esc_html( $more ) . '</a>';
		}
	}
endif; // endif gmr_custom_readmore.
add_filter( 'excerpt_more', 'gmr_custom_readmore' );

if ( ! function_exists( 'gmr_get_pagination' ) ) :
	/**
	 * Retrieve paginated link for archive post pages.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	function gmr_get_pagination() {
		global $wp_rewrite;
		global $wp_query;
		return paginate_links(
			apply_filters(
				'gmr_get_pagination_args',
				array(
					'base'      => str_replace( '99999', '%#%', esc_url( get_pagenum_link( 99999 ) ) ),
					'format'    => $wp_rewrite->using_permalinks() ? 'page/%#%' : '?paged=%#%',
					'current'   => max( 1, get_query_var( 'paged' ) ),
					'total'     => $wp_query->max_num_pages,
					'prev_text' => '<span class="gmr-icon arrow_carrot-2left"></span>',
					'next_text' => '<span class="gmr-icon arrow_carrot-2right"></span>',
					'type'      => 'list',
				)
			)
		);
	}
endif; // endif gmr_get_pagination.

if ( ! function_exists( 'gmr_move_post_navigation' ) ) :
	/**
	 * Move post navigation in top after content.
	 *
	 * @param string $content Contents.
	 * @since 1.0.0
	 *
	 * @return string $content
	 */
	function gmr_move_post_navigation( $content ) {
		if ( is_singular() && in_the_loop() ) {
			$pagination = wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-text">' . esc_html__( 'Pages:', 'dlpro' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span class="page-link-number">',
					'link_after'  => '</span>',
					'echo'        => 0,
				)
			);
			$content   .= $pagination;
			return $content;
		}
		return $content;
	}
endif; // endif gmr_move_post_navigation.
add_filter( 'the_content', 'gmr_move_post_navigation', 1 );

if ( ! function_exists( 'gmr_embed_oembed_html' ) ) :
	/**
	 * Add responsive oembed class only for youtube and vimeo.
	 *
	 * @add_filter embed_oembed_html
	 * @class gmr_embed_oembed_html
	 * @param string $html displaying html Format.
	 * @param string $url url ombed like youtube, video.
	 * @param string $attr Attribute Iframe.
	 * @param int    $post_id Post ID.
	 * @link https://developer.wordpress.org/reference/hooks/embed_oembed_html/
	 */
	function gmr_embed_oembed_html( $html, $url, $attr, $post_id ) {
		$classes = array();
		/* Add these classes to all embeds. */
		$classes_all = array(
			'gmr-video-responsive',
		);

		/* Check for different providers and add appropriate classes. */
		if ( false !== strpos( $url, 'vimeo.com' ) ) {
			$classes[] = 'gmr-embed-responsive gmr-embed-responsive-16by9';
		}

		if ( false !== strpos( $url, 'youtube.com' ) ) {
			$classes[] = 'gmr-embed-responsive gmr-embed-responsive-16by9';
		}

		if ( false !== strpos( $url, 'youtu.be' ) ) {
			$classes[] = 'gmr-embed-responsive gmr-embed-responsive-16by9';
		}

		$classes = array_merge( $classes, $classes_all );

		return '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">' . $html . '</div>';
	}
endif; // endif gmr_embed_oembed_html.
add_filter( 'embed_oembed_html', 'gmr_embed_oembed_html', 99, 4 );

if ( ! function_exists( 'dlpro_prepend_attachment' ) ) :
	/**
	 * Callback for WordPress 'prepend_attachment' filter.
	 *
	 * Change the attachment page image size to 'large'
	 *
	 * @package WordPress
	 * @category Attachment
	 * @see wp-includes/post-template.php
	 *
	 * @param string $attachment_content the attachment html.
	 * @return string $attachment_content the attachment html
	 */
	function dlpro_prepend_attachment( $attachment_content ) {
		$post = get_post();
		if ( wp_attachment_is( 'image', $post ) ) {
			// set the attachment image size to 'large'.
			$attachment_content = sprintf( '<p class="img-center">%s</p>', wp_get_attachment_link( 0, 'full', false ) );

			// return the attachment content.
			return $attachment_content;

		} else {
			// return the attachment content.
			return $attachment_content;
		}

	}
endif; // endif dlpro_prepend_attachment.
add_filter( 'prepend_attachment', 'dlpro_prepend_attachment' );

if ( ! function_exists( 'dlpro_author_box' ) ) {

	/**
	 * Adding the author box to the end of your single post
	 *
	 * @param string $autbox HTML author box.
	 * @since 1.0.0
	 * @return void
	 */
	function dlpro_author_box( $autbox = null ) {
		// Displaying only in single, archive and author page.
		if ( is_single() || is_author() || is_archive() ) {

			$opsiauthorbox = get_theme_mod( 'gmr_active-authorbox', 0 );

			if ( 0 === $opsiauthorbox ) {

				global $post;
				$author_id = $post->post_author;

				// hide the author box if no description is provided.
				if ( ! empty( get_the_author_meta( 'description' ) ) ) {

					$autbox .= '<div class="gmr-authorbox clearfix">';

						// author box gravatar.
						$autbox .= '<div class="gmr-ab-gravatar">';
						$autbox .= get_avatar( get_the_author_meta( 'user_email', $author_id ), '48' );
						$autbox .= '</div>';

						// author box name.
						$autbox .= '<div class="gmr-ab-content">';
						$autbox .= '<div class="gmr-ab-authorname">';

						$autbox .= '<span class="uname">';
						$autbox .= '<a href="' . get_author_posts_url( $author_id ) . '" title="' . get_the_author_meta( 'display_name', $author_id ) . '">' . get_the_author_meta( 'display_name', $author_id ) . '</a>';
						$autbox .= '</span>';

					if ( is_author() || is_archive() ) {
						// force show author website on author.php or archive.php.
						if ( ! empty( get_the_author_meta( 'user_url' ) ) ) {
							$autbox .= '<span class="gmr-ab-web">';
							$autbox .= ' <a href="' . get_the_author_meta( 'user_url', $author_id ) . '" title="' . get_the_author_meta( 'user_url', $author_id ) . '" target="_blank" rel="nofollow"><span class="icon_globe-2"></span></a>';
							$autbox .= '</span>';
						}
					}

					if ( is_single() ) {
						// author website on single.
						if ( ! empty( get_the_author_meta( 'user_url' ) ) ) {
							$autbox .= '<span class="gmr-ab-web">';
							$autbox .= ' <a href="' . get_the_author_meta( 'user_url', $author_id ) . '" title="' . get_the_author_meta( 'user_url', $author_id ) . '" target="_blank" rel="nofollow"><span class="icon_globe-2"></span></a>';
							$autbox .= '</span>';
						}
					}

							$autbox .= '</div>';

							// author box description.
							$autbox .= '<div class="gmr-ab-desc">';
							$autbox .= get_the_author_meta( 'description', $author_id );
							$autbox .= '</div>';

						$autbox .= '</div>'; // end gmr-ab-content.

					$autbox .= '</div>'; // end gmr-authorbox-wrap.
				}
			}
		}
		echo $autbox; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'dlpro_author_box', 'dlpro_author_box', 10 );

if ( ! function_exists( 'dlpro_related_post' ) ) {
	/**
	 * Adding the related post to the end of your single post
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function dlpro_related_post() {
		global $post;
		$dpr_relpost = get_option( 'dpr_relpost' );

		$numberposts = get_theme_mod( 'gmr_relpost_number', '6' );
		$taxonomy    = get_theme_mod( 'gmr_relpost_taxonomy', 'gmr-category' );

		if ( 'gmr-tags' === $taxonomy ) {
			$tags = wp_get_post_tags( $post->ID );
			if ( $tags ) {
				$tag_ids = array();

				foreach ( $tags as $individual_tag ) {
					$tag_ids[] = $individual_tag->term_id;

					$args = array(
						'tag__in'             => $tag_ids,
						'post__not_in'        => array( $post->ID ),
						'posts_per_page'      => absint( $numberposts ),
						'ignore_sticky_posts' => 1,
					);
				}
			}
		} else {
			$categories = get_the_category( $post->ID );
			if ( $categories ) {
				$category_ids = array();
				foreach ( $categories as $individual_category ) {
					$category_ids[] = $individual_category->term_id;

					$args = array(
						'category__in'        => $category_ids,
						'post__not_in'        => array( $post->ID ),
						'posts_per_page'      => absint( $numberposts ),
						'ignore_sticky_posts' => 1,
					);
				}
			}
		}

		if ( ! isset( $args ) ) {
			$args = '';
		}

		$dlpro_query = new WP_Query( $args );

		// Disable thumbnail options via customizer.
		$thumbnail = get_theme_mod( 'gmr_active-blogthumb', 0 );

		// Disable meta data options via customizer.
		$metadata = get_theme_mod( 'gmr_active-metaarchive', 0 );

		$content = '';
		if ( $dlpro_query->have_posts() ) {

			$content .= '<div class="dlpro-related-post">';
			$content .= '<h3 class="related-title">' . __( 'Related posts:', 'dlpro' ) . '</h3>';
			while ( $dlpro_query->have_posts() ) :
				$dlpro_query->the_post();

				$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

				$hasthumbnail = '';
				if ( ! empty( $featured_image_url ) ) {
					$hasthumbnail = ' has-post-thumbnail';
				}

				$content .= '<div class="gmr-box-content gmr-archivepage gmr-smallthumb' . $hasthumbnail . '">';
				$content .= '<div class="gmr-list-table">';
				$content .= '<div class="gmr-table-row">';

				if ( ! empty( $featured_image_url ) ) :
					$content .= '<div class="content-thumbnail gmr-table-cell">';
					$content .= '<a href="' . get_permalink() . '" itemprop="url" title="' . the_title_attribute(
						array(
							'before' => __( 'Permalink to: ', 'dlpro' ),
							'after'  => '',
							'echo'   => false,
						)
					) . '" rel="bookmark">';
					$content .= get_the_post_thumbnail( $post->ID, 'thumbnail' );
					$content .= '</a>';
					$content .= '</div>'; // End content-thumbnail gmr-table-cell.
				endif;

				$content .= '<div class="gmr-table-cell">';
				$content .= '<div class="header-title">';

				$content .= '<div class="post-title">';
				$content .= '<a href="' . get_permalink() . '" itemprop="url" title="' . the_title_attribute(
					array(
						'before' => __( 'Permalink to: ', 'dlpro' ),
						'after'  => '',
						'echo'   => false,
					)
				) . '" rel="bookmark">' . get_the_title() . '</a>';
				$content .= '</div>'; // End content-thumbnail gmr-table-cell.

				if ( 'post' === get_post_type() ) :
					if ( 0 === $metadata ) :
						$content .= '<div class="entry-meta">';

						$version = get_post_meta( $post->ID, 'DLPRO_Version', true );
						if ( ! empty( $version ) ) {
							$content .= '<div class="gmr-app-meta gmr-app-version">';
							$content .= esc_html( $version );
							$content .= '</div>';
						}

						$content .= '</div>';

					endif;
				endif;

				$content .= '</div>'; // End header-title.
				$content .= '</div>'; // End gmr-table-cell.

				$content .= '<div class="gmr-download-frontend gmr-table-cell">';
				$content .= '<a href="' . get_permalink() . '" itemprop="url" title="' . the_title_attribute(
					array(
						'before' => __( 'Download ', 'dlpro' ),
						'after'  => '',
						'echo'   => false,
					)
				) . '">';
				$content .= '<span class="icon_download"></span>';
				$content .= '</a>';
				$content .= '</div>'; // gmr-download-frontend gmr-table-cell.

				$content .= '</div>';
				$content .= '</div>';
				$content .= '</div>';

			endwhile;
			wp_reset_postdata();
			$content .= '</div>';
		} // if have posts

		return $content;
	}
}

if ( ! function_exists( 'dlpro_related_post_display' ) ) :
	/**
	 * Displaying Related Posts
	 *
	 * @param string $related String related posts.
	 * @since 1.0.0
	 */
	function dlpro_related_post_display( $related = null ) {
		if ( is_single() && in_the_loop() ) {
			$relatedposts = get_theme_mod( 'gmr_active-relpost', 0 );
			if ( 0 === $relatedposts ) {
				$related = dlpro_related_post();
			} else {
				$related = '';
			}
		}
		echo $related; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif; // endif dlpro_related_post_display.
add_action( 'dlpro_related_post_display', 'dlpro_related_post_display' );

if ( ! function_exists( 'dlpro_share_default' ) ) :
	/**
	 * Insert social share from plugin
	 *
	 * @since 1.0.0
	 * @param string $output Output.
	 * @return string @output
	 */
	function dlpro_share_default( $output = null ) {
		$socialshare = get_theme_mod( 'gmr_active-socialshare', 0 );

		if ( 0 === $socialshare ) {
			$filter_title = wp_strip_all_tags( rawurlencode( get_the_title() ) );
			$output  = '';
			$output .= '<a href="https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( esc_url( get_the_permalink() ) ) . '" class="dlpro-sharebtn dlpro-facebook wp-dark-mode-ignore" target="_blank" rel="nofollow" title="' . __( 'Share this', 'dlpro' ) . '">';
			$output .= __( 'Sharer', 'dlpro' );
			$output .= '</a>';
			$output .= '<a href="https://twitter.com/share?url=' . rawurlencode( esc_url( get_the_permalink() ) ) . '&amp;text=' . rawurlencode( wp_strip_all_tags( get_the_title() ) ) . '" class="dlpro-sharebtn dlpro-twitter wp-dark-mode-ignore" target="_blank" rel="nofollow" title="' . __( 'Tweet this', 'dlpro' ) . '">';
			$output .= __( 'Tweet', 'dlpro' );
			$output .= '</a>';
			$output .= '<a href="https://t.me/share/url?url=' . rawurlencode( esc_url( get_the_permalink() ) ) . '&amp;text=' . rawurlencode( wp_strip_all_tags( get_the_title() ) ) . '" class="dlpro-sharebtn dlpro-telegram wp-dark-mode-ignore" target="_blank" rel="nofollow" title="' . __( 'Telegram', 'dlpro' ) . '">';
			$output .= __( 'Telegram', 'dlpro' );
			$output .= '</a>';
			$output .= '<a href="https://api.whatsapp.com/send?text=' . rawurlencode( wp_strip_all_tags( get_the_title() ) ) . ' ' . rawurlencode( esc_url( get_permalink() ) ) . '" class="dlpro-sharebtn dlpro-whatsapp wp-dark-mode-ignore" target="_blank" rel="nofollow" title="' . __( 'WhatsApp', 'dlpro' ) . '">';
			$output .= __( 'WA', 'dlpro' );
			$output .= '</a>';

		}

		return $output;

	}
endif; // endif dlpro_share_default.

if ( ! function_exists( 'dlpro_add_share_the_content' ) ) :
	/**
	 * Insert content after box content single
	 *
	 * @since 1.0.0
	 * @link https://jetpack.com/support/related-posts/customize-related-posts/#delete
	 * @return void
	 */
	function dlpro_add_share_the_content() {
		if ( is_single() && in_the_loop() ) {
			echo dlpro_share_default(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif; // endif dlpro_add_share_the_content.
add_action( 'dlpro_add_share_the_content', 'dlpro_add_share_the_content', 30 );
