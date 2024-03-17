<?php
/**
 * Widget API: Dlpro_RecentPosts_Widget class
 *
 * Author: Gian MR - http://www.gianmr.com
 *
 * @package  Dlpro = Null by PHPCORE Core
 * @subpackage Widgets
 * @since 1.0.0
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add the RPSL widget.
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class Dlpro_RecentPosts_Widget extends WP_Widget {
	/**
	 * Sets up a Recent Posts widget instance.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'dlpro-recent',
			'description' => __( 'Recent Softwares with thumbnails widget.', 'dlpro' ),
		);
		parent::__construct( 'dlpro-rp', __( 'Recent Softwares (Dlpro)', 'dlpro' ), $widget_ops );
	}

	/**
	 * Outputs the content for Mailchimp Form.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for Mailchimp Form.
	 */
	public function widget( $args, $instance ) {

		global $post;

		// Title.
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		// Base Id Widget.
		$dpr_widget_id = $this->id_base . '-' . $this->number;
		// Category ID.
		$dpr_category_ids = ( ! empty( $instance['dpr_category_ids'] ) ) ? array_map( 'absint', $instance['dpr_category_ids'] ) : array( 0 );
		// Excerpt Length.
		$dpr_number_posts = ( ! empty( $instance['dpr_number_posts'] ) ) ? absint( $instance['dpr_number_posts'] ) : absint( 10 );
		// Title Length Limit.
		$dpr_title_length = ( isset( $instance['dpr_title_length'] ) ) ? (bool) $instance['dpr_title_length'] : false;
		// Hide current post.
		$dpr_hide_current_post = ( isset( $instance['dpr_hide_current_post'] ) ) ? (bool) $instance['dpr_hide_current_post'] : false;
		$dpr_show_meta         = ( isset( $instance['dpr_show_meta'] ) ) ? (bool) $instance['dpr_show_meta'] : false;
		$dpr_show_thumb        = ( isset( $instance['dpr_show_thumb'] ) ) ? (bool) $instance['dpr_show_thumb'] : false;

		// Banner.
		$dpr_bannerinfeed = ( ! empty( $instance['dpr_bannerinfeed'] ) ) ? $instance['dpr_bannerinfeed'] : '';

		// if 'all categories' was selected ignore other selections of categories.
		if ( in_array( 0, $dpr_category_ids, true ) ) {
			$dpr_category_ids = array( 0 );
		}

		// standard params.
		$query_args = array(
			'posts_per_page'         => $dpr_number_posts,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			// make it fast withour update term cache and cache results.
			// https://thomasgriffin.io/optimize-wordpress-queries/.
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
		);

		$query_args['ignore_sticky_posts'] = true;

		// set order of posts in widget.
		$query_args['orderby'] = 'date';
		$query_args['order']   = 'DESC';

		// add categories param only if 'all categories' was not selected.
		if ( ! in_array( 0, $dpr_category_ids, true ) ) {
			$query_args['category__in'] = $dpr_category_ids;
		}

		// exclude current displayed post.
		if ( $dpr_hide_current_post ) {
			global $post;
			if ( isset( $post->ID ) && is_singular() ) {
				$query_args['post__not_in'] = array( $post->ID );
			}
		}

		// run the query: get the latest posts.
		$rp = new WP_Query( apply_filters( 'dpr_rp_widget_posts_args', $query_args ) );
		if ( $rp->have_posts() ) {
			?>
			<div class="dlpro-rp-widget">
				<?php
				while ( $rp->have_posts() ) :
					$rp->the_post();
					?>
					<div class="dlpro-list-table">
						<div class="dlpro-table-row">
							<?php
							if ( $dpr_show_thumb ) :
								// look for featured image.
								if ( has_post_thumbnail() ) :
									echo '<div class="dlpro-table-cell gmr-thumbnail">';
										echo '<a href="' . esc_url( get_permalink() ) . '" itemprop="url" title="' . the_title_attribute(
											array(
												'before' => __( 'Download ', 'dlpro' ),
												'after'  => '',
												'echo'   => false,
											)
										) . '">';
											the_post_thumbnail( 'thumbnail' );
										echo '</a>';
									echo '</div>';
								endif; // has_post_thumbnail.
							endif; // show_thumb.
							?>

							<div class="dlpro-table-cell dlpro-title-wrap">
								<?php
									$class = '';
									if ( $dpr_title_length ) {
										$class = ' limit-title';
									}
									echo '<div class="dlpro-rp-title' . esc_html( $class ) . '">';
										echo '<a href="' . esc_url( get_permalink() ) . '" itemprop="url" title="' . the_title_attribute(
											array(
												'before' => __( 'Download ', 'dlpro' ),
												'after'  => '',
												'echo'   => false,
											)
										) . '">';
										the_title();
										echo '</a>';
									echo '</div>';
								?>

								<?php if ( $dpr_show_meta ) : ?>
									<div class="entry-meta dlpro-rp-meta">
										<?php
										$version = get_post_meta( $post->ID, 'DLPRO_Version', true );
										if ( ! empty( $version ) ) {
											echo esc_html( $version );
										}
										?>
									</div>
								<?php endif; ?>
							</div>
							<div class="dlpro-table-cell dlpro-icon-download">
								<?php
									echo '<a href="' . esc_html( get_permalink() ) . '" itemprop="url" title="' . the_title_attribute(
										array(
											'before' => __( 'Download ', 'dlpro' ),
											'after'  => '',
											'echo'   => false,
										)
									) . '">';
										echo '<span class="icon_download"></span>';
									echo '</a>';
								?>
							</div>
						</div>
					</div>
					<?php

					if ( $dpr_bannerinfeed ) {
						if ( 1 === $rp->current_post ) {
							echo '<div class="dlpro-list-table">';
								echo '<div class="dlpro-table-row">';
									echo '<div class="dlpro-table-cell">';
										echo do_shortcode( htmlspecialchars_decode( $dpr_bannerinfeed ) );
									echo '</div>';
								echo '</div>';
							echo '</div>';

						}
					}

				endwhile;
				wp_reset_postdata();
				?>

			</div>
			<?php
		}
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Handles updating settings for the current Mailchimp widget instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            Dlpro_Mailchimp_form::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$new_instance = wp_parse_args(
			(array) $new_instance,
			array(
				'title'                 => '',
				'dpr_category_ids'      => array( 0 ),
				'dpr_number_posts'      => 10,
				'dpr_title_length'      => false,
				'dpr_hide_current_post' => false,
				'dpr_show_meta'         => false,
				'dpr_show_thumb'        => false,
				'dpr_bannerinfeed'      => '',
			)
		);

		// Title.
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		// Category IDs.
		$instance['dpr_category_ids'] = array_map( 'absint', $new_instance['dpr_category_ids'] );
		// Number posts.
		$instance['dpr_number_posts'] = absint( $new_instance['dpr_number_posts'] );
		// Title Length.
		$instance['dpr_title_length'] = (bool) $new_instance['dpr_title_length'];
		// Hide current post.
		$instance['dpr_hide_current_post'] = (bool) $new_instance['dpr_hide_current_post'];
		// Show element.
		$instance['dpr_show_meta']  = (bool) $new_instance['dpr_show_meta'];
		$instance['dpr_show_thumb'] = (bool) $new_instance['dpr_show_thumb'];
		// In feed banner.
		$instance['dpr_bannerinfeed'] = $new_instance['dpr_bannerinfeed'];

		return $instance;
	}

	/**
	 * Outputs the settings form for the Mailchimp widget.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'                 => 'Recent Post',
				'dpr_category_ids'      => array( 0 ),
				'dpr_number_posts'      => 10,
				'dpr_title_length'      => true,
				'dpr_hide_current_post' => false,
				'dpr_show_meta'         => false,
				'dpr_show_thumb'        => true,
				'dpr_bannerinfeed'      => '',
			)
		);
		// Title.
		$title = sanitize_text_field( $instance['title'] );
		// Category ID.
		$dpr_category_ids = array_map( 'absint', $instance['dpr_category_ids'] );
		// Number posts.
		$dpr_number_posts = absint( $instance['dpr_number_posts'] );
		// Title Length.
		$dpr_title_length = (bool) $instance['dpr_title_length'];
		// Hide current post.
		$dpr_hide_current_post = (bool) $instance['dpr_hide_current_post'];
		// Show element.
		$dpr_show_meta  = (bool) $instance['dpr_show_meta'];
		$dpr_show_thumb = (bool) $instance['dpr_show_thumb'];
		// In feed banner.
		$dpr_bannerinfeed = $instance['dpr_bannerinfeed'];
		
		// get categories.
		$categories     = get_categories(
			array(
				'hide_empty'   => 0,
				'hierarchical' => 1,
			)
		);
		$number_of_cats = count( $categories );

		// get size (number of rows to display) of selection box: not more than 10.
		$number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;

		// if 'all categories' was selected ignore other selections of categories.
		if ( in_array( 0, $dpr_category_ids, true ) ) {
			$dpr_category_ids = array( 0 );
		}

		// start selection box.
		$selection_category  = sprintf(
			'<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
			$this->get_field_name( 'dpr_category_ids' ),
			$this->get_field_id( 'dpr_category_ids' ),
			$number_of_rows
		);
		$selection_category .= "\n";

		// make selection box entries.
		$cat_list = array();
		if ( 0 < $number_of_cats ) {

			// make a hierarchical list of categories.
			while ( $categories ) {
				// go on with the first element in the categories list:.
				// if there is no parent.
				if ( '0' == $categories[0]->parent ) {
					// get and remove it from the categories list.
					$current_entry = array_shift( $categories );
					// append the current entry to the new list.
					$cat_list[] = array(
						'id'    => absint( $current_entry->term_id ),
						'name'  => esc_html( $current_entry->name ),
						'depth' => 0,
					);
					// go on looping.
					continue;
				}
				// if there is a parent:
				// try to find parent in new list and get its array index.
				$parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
				// if parent is not yet in the new list: try to find the parent later in the loop.
				if ( false === $parent_index ) {
					// get and remove current entry from the categories list.
					$current_entry = array_shift( $categories );
					// append it at the end of the categories list.
					$categories[] = $current_entry;
					// go on looping.
					continue;
				}
				// if there is a parent and parent is in new list:
				// set depth of current item: +1 of parent's depth.
				$depth = $cat_list[ $parent_index ]['depth'] + 1;
				// set new index as next to parent index.
				$new_index = $parent_index + 1;
				// find the correct index where to insert the current item.
				foreach ( $cat_list as $entry ) {
					// if there are items with same or higher depth than current item.
					if ( $depth <= $entry['depth'] ) {
						// increase new index.
						$new_index = $new_index + 1;
						// go on looping in foreach().
						continue;
					}
					// if the correct index is found:
					// get current entry and remove it from the categories list.
					$current_entry = array_shift( $categories );
					// insert current item into the new list at correct index.
					$end_array  = array_splice( $cat_list, $new_index ); // $cat_list is changed, too.
					$cat_list[] = array(
						'id'    => absint( $current_entry->term_id ),
						'name'  => esc_html( $current_entry->name ),
						'depth' => $depth,
					);
					$cat_list   = array_merge( $cat_list, $end_array );
					// quit foreach(), go on while-looping.
					break;
				}
			}

			// make HTML of selection box.
			$selected            = ( in_array( 0, $dpr_category_ids, true ) ) ? ' selected="selected"' : '';
			$selection_category .= "\t";
			$selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', 'dlpro' ) . '</option>';
			$selection_category .= "\n";

			foreach ( $cat_list as $category ) {
				$cat_name            = apply_filters( 'dpr_list_cats', $category['name'], $category );
				$pad                 = ( 0 < $category['depth'] ) ? str_repeat( '&ndash;&nbsp;', $category['depth'] ) : '';
				$selection_category .= "\t";
				$selection_category .= '<option value="' . $category['id'] . '"';
				$selection_category .= ( in_array( $category['id'], $dpr_category_ids, true ) ) ? ' selected="selected"' : '';
				$selection_category .= '>' . $pad . $cat_name . '</option>';
				$selection_category .= "\n";
			}
		}

		// close selection box.
		$selection_category .= "</select>\n";

		?>

		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dlpro' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_category_ids' ) ); ?>"><?php esc_html_e( 'Selected categories', 'dlpro' ); ?></label>
			<?php echo $selection_category; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<br />
			<small><?php esc_html_e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', 'dlpro' ); ?></small>
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_number_posts' ) ); ?>"><?php esc_html_e( 'Number post', 'dlpro' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'dpr_number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $dpr_number_posts ); ?>" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $dpr_title_length ); ?> id="<?php echo esc_html( $this->get_field_id( 'dpr_title_length' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_title_length' ) ); ?>" />
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_title_length' ) ); ?>"><?php esc_html_e( 'One line limit title?', 'dlpro' ); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $dpr_hide_current_post ); ?> id="<?php echo esc_html( $this->get_field_id( 'dpr_hide_current_post' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_hide_current_post' ) ); ?>" />
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_hide_current_post' ) ); ?>"><?php esc_html_e( 'Do not list the current post?', 'dlpro' ); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $dpr_show_meta ); ?> id="<?php echo esc_html( $this->get_field_id( 'dpr_show_meta' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_show_meta' ) ); ?>" />
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_show_meta' ) ); ?>"><?php esc_html_e( 'Show Meta?', 'dlpro' ); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $dpr_show_thumb ); ?> id="<?php echo esc_html( $this->get_field_id( 'dpr_show_thumb' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_show_thumb' ) ); ?>" />
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_show_thumb' ) ); ?>"><?php esc_html_e( 'Show Thumbnail?', 'dlpro' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_bannerinfeed' ) ); ?>"><?php esc_html_e( 'Banner After First Post:', 'dlpro' ); ?></label>
			<textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'dpr_bannerinfeed' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_bannerinfeed' ) ); ?>"><?php echo esc_textarea( $instance['dpr_bannerinfeed'] ); ?></textarea>
		</p>
		<?php
	}
	
	/**
	 * Return the array index of a given ID
	 *
	 * @param Array  $arr Arr.
	 * @param Number $id Post ID.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function get_cat_parent_index( $arr, $id ) {
		$len = count( $arr );
		if ( 0 === $len ) {
			return false;
		}
		$id = absint( $id );
		for ( $i = 0; $i < $len; $i++ ) {
			if ( $id === $arr[ $i ]['id'] ) {
				return $i;
			}
		}
		return false;
	}

}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Dlpro_RecentPosts_Widget' );
	}
);
