<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Foxiz_Ajax', false ) ) {
	class Foxiz_Ajax {

		private static $instance;
		public $style = '';

		public static function get_instance() {

			if ( self::$instance === null ) {
				return new self();
			}

			return self::$instance;
		}

		public function __construct() {

			self::$instance = $this;

			add_action( 'wp_ajax_nopriv_rblivep', array( $this, 'pagination' ) );
			add_action( 'wp_ajax_rblivep', array( $this, 'pagination' ) );
			add_action( 'wp_ajax_get_embed', array( $this, 'embed' ) );
			add_action( 'wp_ajax_nopriv_get_embed', array( $this, 'embed' ) );
			add_action( 'wp_ajax_nopriv_rbsearch', array( $this, 'live_search' ) );
			add_action( 'wp_ajax_rbsearch', array( $this, 'live_search' ) );
			add_action( 'wp_ajax_nopriv_rbpersonalizeb', array( $this, 'personalize_block' ) );
			add_action( 'wp_ajax_rbpersonalizeb', array( $this, 'personalize_block' ) );
			add_action( 'wp_ajax_nopriv_rbpersonalizecat', array( $this, 'personalize_categories' ) );
			add_action( 'wp_ajax_rbpersonalizecat', array( $this, 'personalize_categories' ) );
			add_action( 'wp_ajax_nopriv_rbnotification', array( $this, 'notification' ) );
			add_action( 'wp_ajax_rbnotification', array( $this, 'notification' ) );
			add_action( 'wp_ajax_nopriv_rbvoting', array( $this, 'voting' ) );
			add_action( 'wp_ajax_rbvoting', array( $this, 'voting' ) );
			add_action( 'template_redirect', array( $this, 'load_next_redirect' ) );
		}

		public function pagination() {

			if ( empty( $_GET['data'] ) || empty( $_GET['data']['name'] ) ) {
				wp_send_json( '' );
				wp_die();
			}

			$settings                  = $this->validate( $_GET['data'] );
			$settings['no_found_rows'] = false;
			$paged                     = 2;

			if ( isset( $settings['page_next'] ) ) {
				$paged = absint( $settings['page_next'] );
			}
			if ( empty( $settings['posts_per_page'] ) ) {
				$settings['posts_per_page'] = get_option( 'posts_per_page' );
			}

			/** ajax for custom query */
			if ( ! empty( $settings['content_source'] ) ) {
				switch ( $settings['content_source'] ) {
					case 'related':
						$_query = foxiz_query_related( $settings, $paged );
						break;
					case 'recommended':
						$settings['paged'] = $paged;
						$_query            = Foxiz_Personalize::get_instance()->recommended_query( $settings );
						break;
					case 'saved':
						$settings['paged'] = $paged;
						$_query            = Foxiz_Personalize::get_instance()->saved_posts_query( $settings );
						break;
					case 'history':
						$settings['paged'] = $paged;
						$_query            = Foxiz_Personalize::get_instance()->reading_history_query( $settings );
						break;
				}
			} else {
				$_query = foxiz_query( $settings, $paged );
			}

			$response = array();

			if ( ! empty( $_query ) && $_query->have_posts() ) {
				if ( ! empty( $_query->paged ) ) {
					$response['paged'] = $_query->paged;
				} else {
					$response['paged'] = $paged;
				}
				if ( $response['paged'] >= $settings['page_max'] ) {
					$response['notice'] = $this->end_list_info();
				}
				$response['content'] = $this->render( $settings, $_query );
				wp_reset_postdata();
			} else {
				$response['paged']   = $settings['page_max'] + 99;
				$response['content'] = $this->end_list_info();
			}

			wp_send_json( $response );
		}

		/**
		 * @param $settings
		 *
		 * @return array|mixed|string
		 * validate input
		 */
		function validate( $settings ) {

			if ( is_array( $settings ) ) {
				foreach ( $settings as $key => $val ) {
					$key = sanitize_text_field( $key );
					if ( ! is_array( $settings[ $key ] ) ) {
						$settings[ $key ] = sanitize_text_field( $val );
					}
				}
			} elseif ( is_string( $settings ) ) {
				$settings = sanitize_text_field( $settings );
			} else {
				$settings = '';
			}

			return $settings;
		}

		/**
		 * @param $settings
		 * @param $_query
		 *
		 * @return false|string
		 * render
		 */
		function render( $settings, $_query ) {

			ob_start();
			$func = 'foxiz_loop_' . trim( $settings['name'] );

			if ( function_exists( $func ) ) {
				call_user_func_array( $func, array( $settings, $_query ) );
			}

			return ob_get_clean();
		}

		/**
		 * @return string
		 * end list info
		 */
		function end_list_info() {

			$output = '<div class="p-wrap end-list-info is-meta"><i class="rbi rbi-chart" aria-hidden="true"></i><span>';
			$output .= foxiz_html__( 'You\'ve reached the end of the list!', 'foxiz' );
			$output .= '</span></div>';

			return $output;
		}

		/** get embed iframe */
		public function embed() {

			if ( empty( $_POST['data'] ) || empty( $_POST['data']['url'] ) ) {
				wp_send_json( '' );
				wp_die();
			}

			wp_send_json( wp_oembed_get( esc_url( $_POST['data']['url'] ), array(
				'height' => 450,
				'width'  => 800
			) ) );
		}

		function load_next_redirect() {

			global $wp_query;
			if ( empty( $wp_query->query_vars['rbsnp'] ) || ! is_singular( 'post' ) ) {
				return;
			}
			$file     = '/templates/single/next-posts.php';
			$template = locate_template( $file );
			if ( $template ) {
				include( $template );
			}
			exit;
		}

		/** live search */
		function live_search() {

			if ( empty( $_GET['s'] ) ) {
				wp_send_json( '' );
				wp_die();
			}

			if ( empty( $_GET['search'] ) || 'category' === $_GET['search'] ) {
				$this->search_categories();
			} else {
				$this->search_posts();
			}
		}

		public function search_posts() {

			$input = sanitize_text_field( $_GET['s'] );

			if ( ! empty( $_GET['limit'] ) ) {
				$limit = absint( $_GET['limit'] );
			}

			if ( empty( $limit ) || $limit > 6 ) {
				$limit = 4;
			}

			$params = array(
				's'              => $input,
				'posts_per_page' => $limit,
				'post_type'      => 'post',
				'post_status'    => 'publish'
			);

			if ( foxiz_get_option( 'podcast_supported' ) && foxiz_get_option( 'podcast_search_included' ) ) {
				$params['post_type'] = array( 'post', 'podcast' );
			}
			$_query = new WP_Query( $params );

			$response = '<div class="block-inner live-search-inner p-middle">';
			if ( $_query->have_posts() ) {
				ob_start();
				while ( $_query->have_posts() ) :
					$_query->the_post();
					foxiz_list_small_2(
						array(
							'featured_position' => 'left',
							'entry_meta'        => array( 'category', 'index' ),
							'title_index'       => '1',
							'middle_mode'       => '1',
							'edit_link'         => false
						) );
				endwhile;
				$response .= ob_get_clean();
				$response .= '<div class="live-search-link"><a class="is-btn" href="' . get_search_link( $input ) . '">' . foxiz_html__( 'More Results', 'foxiz' ) . '</a></div>';
			} else {
				$response .= '<div class="search-no-result">' . foxiz_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'foxiz' ) . '</div>';
			}

			$response .= '</div>';
			wp_send_json( $response );
		}

		public function search_categories() {

			$input = sanitize_text_field( $_GET['s'] );

			if ( ! empty( $_GET['limit'] ) ) {
				$limit = absint( $_GET['limit'] );
			}

			if ( empty( $limit ) || $limit > 6 ) {
				$limit = 4;
			}

			$taxonomies = get_terms( array(
				'taxonomy'   => array( 'category' ),
				'search'     => $input,
				'number'     => $limit,
				'hide_empty' => true
			) );

			$response = '<div class="block-inner live-search-inner">';
			if ( ! empty( $taxonomies ) ) {
				ob_start();
				foreach ( $taxonomies as $category ) {
					foxiz_category_item_6( array(
						'cid'         => $category->term_id,
						'follow'      => 1,
						'count_posts' => 1,
					) );
				}
				$response .= ob_get_clean();
			} else {
				$response .= '<div class="search-no-result">' . foxiz_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'foxiz' ) . '</div>';
			}
			$response .= '</div>';

			wp_send_json( $response );
		}

		/** load personalize block in ajax */
		public function personalize_block() {

			if ( empty( $_GET['data'] ) || empty( $_GET['data']['name'] ) ) {
				wp_send_json( '' );
				wp_die();
			}

			$settings = $this->validate( $_GET['data'] );

			if ( ! empty( $settings['content_source'] ) ) {
				$_query = foxiz_personalize_query( $settings );
			} else {
				$_query = foxiz_query( $settings );
			}

			$func = 'foxiz_live_block_' . trim( $settings['name'] );

			ob_start();
			if ( function_exists( $func ) ) {
				call_user_func_array( $func, array( $settings, $_query ) );
			}

			wp_send_json( ob_get_clean() );
		}

		public function personalize_categories() {

			if ( empty( $_GET['data'] ) || empty( $_GET['data']['name'] ) ) {
				wp_send_json( '' );
				wp_die();
			}

			$settings = $this->validate( $_GET['data'] );
			$func     = 'foxiz_live_get_' . trim( $settings['name'] );

			ob_start();
			if ( function_exists( $func ) ) {
				call_user_func_array( $func, array( $settings ) );
			}
			wp_send_json( ob_get_clean() );
		}

		/** get notification */
		function notification() {

			$response = array(
				'content' => '',
				'count'   => ''
			);

			$duration = absint( foxiz_get_option( 'notification_duration' ) );
			if ( empty( $duration ) ) {
				$db_after = '72 hours ago';
			} else {
				$db_after = $duration . ' hours ago';
			}
			$_query = new WP_Query( array(
				'post_type'      => 'post',
				'no_found_rows'  => true,
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'posts_per_page' => 9,
				'date_query'     => array(
					array( 'after' => $db_after )
				)
			) );

			ob_start();
			if ( $_query->have_posts() ) :
				$response['count'] = $_query->post_count; ?>
                <div class="block-inner">
					<?php
					foxiz_loop_list_small_2(
						array(
							'design_override'  => true,
							'edit_link'        => false,
							'bookmark'         => false,
							'entry_category'   => true,
							'human_time'       => true,
							'featured_classes' => 'ratio-v2',
							'entry_meta'       => array( 'update' ),
						),
						$_query );
					?>
                </div>
			<?php endif;
			$response['content'] = ob_get_clean();

			wp_reset_postdata();

			if ( empty( $response['content'] ) ) {
				$response['content'] = '<span class="is-meta empty-notification">' . foxiz_html__( 'Stay Tuned! Check back later for the latest updates.', 'foxiz' ) . '</span>';
			}

			wp_send_json( $response );
		}

		public function voting() {

			if ( empty( $_GET['pid'] ) || ! class_exists( 'Foxiz_Personalize_Helper' ) || empty( $_GET['value'] ) ) {
				wp_send_json_error( '' );
			}

			$post_id  = absint( $_GET['pid'] );
			$reaction = esc_attr( $_GET['value'] );

			switch ( $reaction ) {
				case 'like':
					Foxiz_Personalize_Helper::get_instance()->save_vote( 'like', $post_id );
					break;
				case 'dislike':
					Foxiz_Personalize_Helper::get_instance()->save_vote( 'dislike', $post_id );
					break;
				case 'rmlike' :
					Foxiz_Personalize_Helper::get_instance()->delete_vote( 'like', $post_id );
					break;
				case 'rmdislike' :
					Foxiz_Personalize_Helper::get_instance()->delete_vote( 'dislike', $post_id );
					break;
			}

			wp_send_json_success( $post_id );
		}
	}
}
