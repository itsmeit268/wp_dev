<?php

/*-----------------------------------------------------------------------------------*/
/*  Popular Home View Most widget
/*-----------------------------------------------------------------------------------*/
class ex_themes_most_views_ extends WP_Widget {

	public function __construct(){
		$widget_ops = array(
			'classname'   => 'exthemes-mostview',
			'description' => __( THEMES_NAMES.' Sidebar Post Widget', THEMES_NAMES ),
		);
		parent::__construct( 'exthemes-mostview', __( '(MDR) Sidebar Post Widget', THEMES_NAMES ), $widget_ops );
	}
	
	public function widget( $args, $instance ){
		$widget_id			= $this->id_base . '-' . $this->number;
		$category_ids		= ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
		$number_posts		= ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 ); 
		$link_title			= ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
		$title_button		= ( ! empty( $instance['title_button'] ) ) ? $instance['title_button'] : '';
		$title				= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		global $opt_themes;
		?>
		
		
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--moddroid--> 
		<section class="mb-2">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
		<!--modyolo & style 3-->
		<section class="bg-white border rounded shadow-sm  pb-3 pt-3 px-2 px-md-3 mt-3 m-2">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--modyolo--> 
		<section class="bg-white border rounded shadow-sm pb-3 pt-3 px-2 px-md-3 mb-3">
		<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--style 3-->
		<section class="bg-white border rounded shadow-sm pb-3 pt-3 px-2 mb-4">
		<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--moddroid-->
		<section class="mb-2">
		<?php } ?>
					
		
				
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--moddroid--> 
		<div class="h5 font-weight-semibold mb-3">
		<a class="text-body border-bottom-2 border-secondary d-inline-block pb-1" href="<?php echo $instance['title_link']; ?>"><?php echo $instance['title']; ?></a>
		</div>
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
		<!--modyolo & style 3-->
		<div class="d-flex align-items-baseline justify-content-between ">
		<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php echo $title; ?></h2>
		</div>
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--modyolo--> 
		<header class="d-flex align-items-end mb-3">
			<h2 class="h5 font-weight-semibold mb-0">
			<a class="text-body" href="<?php echo $instance['title_link']; ?>"><?php echo $title; ?></a>
			</h2>
			<?php if($instance['title_link']){?><a class="btn btn-primary btn-sm ml-auto" href="<?php echo $instance['title_link']; ?>"><?php echo $instance['title_button']; ?></a><?php } ?>
		</header>
		<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--style 3-->
		<div class="d-flex align-items-baseline justify-content-between ">
		<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php echo $title; ?></h2>
		<?php if($instance['title_button']){ ?><a class="small text-truncate text-muted pr-2 " href="<?php echo $instance['title_link']; ?>"><?php echo $instance['title_button']; ?></a><?php } ?>
		</div>
		<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--moddroid-->
		<div class="d-flex align-items-baseline justify-content-between ">
		<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php echo $title; ?></h2>
		</div>
		<?php } ?>
		
		 
		
		<?php
		/* global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) {  } else { echo $args['after_title']; }  */
		
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
		$args = array(
				'posts_per_page'			=> $number_posts,
				'post_type'					=> 'post',
				'no_found_rows'				=> true,
				'post_status'				=> 'publish', 
				'orderby'					=> $instance['orderby'],
				'update_post_term_cache'	=> false,
				'update_post_meta_cache'	=> false,
		);

		if ( ! in_array( 0, $category_ids, true ) ) {
			$args['category__in'] = $category_ids;
		} 
			
		if( $instance['orderby'] == 'views' ){
			$args = array(
				'posts_per_page'	=> $instance['number_posts'],
				'post_type'			=> 'post',
				'order'				=> 'DESC',
				'orderby'			=> 'meta_value_num',
				'meta_key'			=> 'post_views_count',
				'ignore_sticky_posts' => true
			);
		}

		if( $instance['orderby'] == 'rate' ){
			$args = array(
				'posts_per_page'	=> $instance['number_posts'],
				'post_type'			=> 'post',
				'meta_query' => array(
				'relation' => 'AND',
				'average_clause' => array(
					'key'     => 'rmp_avg_rating',
					'compare' => 'EXISTS',
				),
				'count_clause' => array(
					'key'     => 'rmp_vote_count',
					'compare' => 'EXISTS',
				),
				),
				'orderby'  => array(
					'average_clause' => 'DESC',
					'count_clause'   => 'DESC',
				),
				'ignore_sticky_posts' => true
			
			);
		}
		
		if( $instance['orderby'] == 'rategps' ){
			$args = array(
				'posts_per_page'	=> $instance['number_posts'],
				'post_type'			=> 'post',
				'meta_query' => array(
				'relation' => 'AND',
				'average_clause' => array(
					'key'     => 'wp_rated_GP',
					'compare' => 'EXISTS',
				),
				'count_clause' => array(
					'key'     => 'wp_ratings_GP',
					'compare' => 'EXISTS',
				),
				),
				'orderby'  => array(
					'average_clause' => 'DESC',
					'count_clause'   => 'DESC',
				),
				'ignore_sticky_posts' => true
			
			);
		}
		
		if( isset($instance['orderdate']) && $instance['orderdate'] != 'alltime' ){
				$year		= date('Y');
				$month		= absint( date('m') );
				$week		= absint( date('W') );
				
				$args['year']	= $year;

				if( $instance['orderdate'] == 'pastmonth' ){
					$args['monthnum'] = $month - 1;
				}
				if( $instance['orderdate'] == 'pastweek' ){
					$args['w'] = $week - 1;
				}
				if( $instance['orderdate'] == 'pastyear' ){
					unset( $args['year'] );
					$today = getdate();
					$args['date_query'] = array(
						array(
							'after' => $today[ 'month' ] . ' 1st, ' . ($today[ 'year' ] - 2)
						)
					);
				}
		}

		if( isset($instance['orderdate']) && $instance['orderdate'] == 'bydays' && isset($instance['days_amount']) ){
			$args['year'] = '';
			$days_amount = absint( $instance['days_amount'] ); 
			if( $days_amount > 0 ){
			$days_string = "-$days_amount days";
				$args['date_query'] = array(
					'after'		=> date('Y-m-d', strtotime( $days_string ) ),
					'inclusive'	=> true,
					'column'	=> 'post_date'
				);
			}
		}
		$rp = new WP_Query( apply_filters( 'ex_themes_most_views__widget_posts_args', $args ) );
		while( $rp->have_posts() ) :
		$rp->the_post();
		if($opt_themes['mdr_style_3']) {
		?>
		<?php
		global $wpdb, $post, $opt_themes;
		$image_id						= get_post_thumbnail_id($post->ID); 
		$full							= 'thumbnails-alt-120';
		$icons							= '60';
		$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
		$image_url_default				= $image_url[0];
		$thumbnail_images				= $image_url;
		$post_id						= get_the_ID();

		$thumbnails_gp					= get_post_meta( $post->ID, 'wp_poster_GP', true );
		$thumbnails						= str_replace( 'http://', '', $thumbnails_gp );
		$thumbnails						= str_replace( 'https://', '', $thumbnails_gp );
		$randoms						= mt_rand(0, 3);
		$cdn_thumbnails					= '//i'.$randoms.'.wp.com/'.$thumbnails.'';
		$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true );
		$version						= get_post_meta( $post->ID, 'wp_version', true );
		$versionX1						= get_post_meta( $post->ID, 'wp_version_GP', true );
		$version						= str_replace('Varies with device', ' ', $version);
		$versionX1						= str_replace('Varies with device', ' n/a', $versionX1);
		$versionX						= '-';
		if ( $version === FALSE or $version == '' ) $version = $versionX1;
		$sizes							= get_post_meta( $post->ID, 'wp_sizes', true );
		$sizesX1						= get_post_meta( $post->ID, 'wp_sizes', true );
		$sizesX							= '-';
		if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX;
		$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];
		$wp_mods						= get_post_meta( $post->ID, 'wp_mods', true );
		$wp_modsX1						= get_post_meta( $post->ID, 'wp_mods', true );
		$wp_modsX						= '-';
		if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_modsX1;

		$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
		$title_alt						= get_the_title();
		 
		$sidebar_on						= $opt_themes['sidebar_activated_'];
		$style_2_on						= $opt_themes['ex_themes_home_style_2_activate_'];
		$background_on					= $opt_themes['ex_themes_backgrounds_activate_'];
		$thumbnails_gp_small_slider		= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
		$thumbnails						= str_replace( 'http://', '', $thumbnails_gp_small_slider );
		$thumbnails						= str_replace( 'https://', '', $thumbnails_gp_small_slider );
		$randoms						= mt_rand(0, 3);
		$cdn_thumbnails_gp_small_slider = '//i'.$randoms.'.wp.com/'.$thumbnails.'=s30';
		$rate_GP						= get_post_meta( $post->ID, 'wp_rated_GP', true );
		$ratings_GP						= get_post_meta( $post->ID, 'wp_ratings_GP', true );
		$rate_GP1						= get_post_meta( $post->ID, 'wp_rated_GP', true );
		if ( $rate_GP === FALSE or $rate_GP == '' ) $rate_GP = $rate_GP1;
		$thumbs_on						= $opt_themes['aktif_thumbnails']; 
		$cdn_on							= $opt_themes['ex_themes_cdn_photon_activate_']; 
		$rtl_on							= $opt_themes['ex_themes_activate_rtl_']; 
		$ratings_on						= $opt_themes['ex_themes_activate_ratings_']; 
		$text_mods						= $opt_themes['exthemes_MODAPK']; 
		$rated_gps						= get_post_meta( $post->ID, 'wp_rated_GP', true );
		$mod_gps						= get_post_meta( $post->ID, 'wp_mods', true );
		$mod_gps_alt					= 'Original APK';
		$svg_mods_on					= $opt_themes['svg_icon_modx'];  
		$appname_on						= $opt_themes['ex_themes_title_appname'];  
		$no_lazy						= $opt_themes['ex_themes_no_loading_lazy'];  
		  
		?>
		<div class="mb-4">
			<a class="position-relative archive-post--remove app-container" href="<?php the_permalink() ?>" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
				<div class="flex-shrink-0">
					<img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" class="app-logo "  width="64" height="64">
				</div>
				<div class="app-info">
					<h3 class="h5 font-weight-semibold w-100 app-title"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h3>
					<div class="text-truncate text-muted app-desc">			
			<?php 
			if( $instance['show_mod']){ ?>
			<?php if($wp_mods) { ?>
			<span class="clamp-1 w-100"><?php echo trim(strip_tags(limit_words($wp_mods, '3'))) ?></span>
			<?php } else { ?><span class="clamp-1 w-100"> <?php echo $mod_gps_alt; ?></span><?php } ?>
			<?php } if( $instance['rate'] == 'none' ){
			} else if( $instance['rate'] == 'rate_gp' ){ ?>			
			<div class="Stars" style="--rating:<?php if($rate_GP){ echo $rate_GP; } else { ?>0<?php } ?>;" aria-label="Rating of this product is <?php if($rate_GP){ echo $rate_GP; } else { ?>0<?php } ?> out of 5">
			<?php if ($instance['show_count_rate']) { ?>
			<div class="rmp-results-widget__avg-rating"><span class="js-rmp-avg-rating"><?php echo $rate_GP; ?></span></div>
			<div class="rmp-results-widget__vote-count">(<span class="js-rmp-vote-count"><?php echo $ratings_GP; ?></span>)</div>
			<?php } ?>
			</div>			
			<?php } else if (shortcode_exists( 'ratemypost-result' )) { ?>
			<span class="byuser-sidebar pt-2 clamp-1 w-100"><?php echo do_shortcode( '[ratemypost-result]' ); ?> </span> 
			<?php } ?>
			</div>
			</div>
			<div class="app-get">
			<span class="get-button"><?php echo $opt_themes['mdr_text_get']; ?></span>
			<?php if($instance['show_version']){ ?><span class="app-version text-truncate"> <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"></path>
			</svg> <?php if($rtl_on){ ?><?php echo RTL_Nums($version); ?><?php } else { ?><?php echo $version; ?><?php } ?></span><?php } ?>
			</div>
			</a>
			</div>
		<?php } else {
		get_template_part('template/loop.item.widget');
		}
		endwhile; ?>
		<?php 
		wp_reset_postdata();	
		?>		
		</section>
		<?php 
		if( $instance['rate'] == 'rate' ){ if (!$instance['show_count_rate']) { ?>
		<style>.app-info .byuser-sidebar .rmp-results-widget__avg-rating, .app-info .byuser-sidebar .rmp-results-widget__vote-count {display: none;}</style>
		<?php }}
	}

	public function update( $new_instance, $old_instance ){
		$instance		= $old_instance;
		$new_instance	= wp_parse_args(
			(array) $new_instance,
			array(
				'title'				=> '',
				'title_button'		=> '',
				'title_link'		=> '',
				'category_ids'		=> array( 0 ),
				'number_posts'		=> 3,  
				'orderby'			=> 'date',
				'orderdate'			=> 'alltime',
				'days_amount'		=> 30,
				'rate'				=> 'none',				
				'show_mod'			=> false,
				'show_version'		=> false,
				'show_count_rate'	=> false,
			)
		); 
		$instance['title']				= sanitize_text_field( $new_instance['title'] );
		$instance['title_button']		= sanitize_text_field( $new_instance['title_button'] );
		$instance['title_link']			= $new_instance['title_link'];
		$instance['category_ids']		= array_map( 'absint', $new_instance['category_ids'] );
		$instance['number_posts']		= absint( $new_instance['number_posts'] );
		$instance['orderby']			= $new_instance['orderby'];
		$instance['orderdate']			= $new_instance['orderdate'];
		$instance['days_amount']		= (int) $new_instance['days_amount'];
		$instance['rate']				= $new_instance['rate'];
		$instance['show_mod']			= (bool) $new_instance['show_mod'];
		$instance['show_version']		= (bool) $new_instance['show_version'];
		$instance['show_count_rate']	= (bool) $new_instance['show_count_rate'];
		
		if( in_array( 0, $instance['category_ids'], true ) ){
			$instance['category_ids'] = array( 0 );
		}
		return $instance;
	}

	public function form( $instance ){
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'				=> __( 'Popular Apk', THEMES_NAMES ),
				'title_button'		=> __( 'Get More...', THEMES_NAMES ),
				'title_link'		=> home_url( '/' ),
				'category_ids'		=> array( 0 ),
				'number_posts'		=> 3,  
				'orderby'			=> 'date',
				'orderdate'			=> 'alltime',
				'days_amount'		=> 30,
				'rate'				=> 'none',
				'show_mod'			=> true, 
				'show_version'		=> true,  
				'show_count_rate'	=> true, 
			)
		);
		$title						= sanitize_text_field( $instance['title'] );
		$title_button				= sanitize_text_field( $instance['title_button'] );
		$title_link					= $instance['title_link'];
		$category_ids				= array_map( 'absint', $instance['category_ids'] );
		$number_posts				= absint( $instance['number_posts'] );	
		$days_amount				= isset( $instance['days_amount'] ) ? absint( $instance['days_amount'] ) : 30;
 		$show_mod					= (bool) $instance['show_mod'];
		$show_version				= (bool) $instance['show_version'];
		$show_count_rate			= (bool) $instance['show_count_rate'];
		
		$categories					= get_categories(
			array(
				'hide_empty'		=> 0,
				'hierarchical'		=> 1,
			)
		);
		$number_of_cats				= count( $categories );
		$number_of_rows				= ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
		if( in_array( 0, $category_ids, true ) ){
			$category_ids			= array( 0 );
		}
		$selection_category			= sprintf(
			'<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
			$this->get_field_name( 'category_ids' ),
			$this->get_field_id( 'category_ids' ),
			$number_of_rows
		);
		$selection_category .= "\n";

		$cat_list = array();
		if( 0 < $number_of_cats ){
			while( $categories ){
				if( 0 === $categories[0]->parent ){
					$current_entry = array_shift( $categories );
					$cat_list[] = array(
						'id'		=> absint( $current_entry->term_id ),
						'name'		=> esc_html( $current_entry->name ),
						'depth'		=> 0,
					);
					continue;
				}
				
				$parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
				if( false === $parent_index ){
					$current_entry = array_shift( $categories );
					$categories[] = $current_entry;
					continue;
				}

				$depth = $cat_list[ $parent_index ]['depth'] + 1;
				$new_index = $parent_index + 1;
				foreach( $cat_list as $entry ){
					if( $depth <= $entry['depth'] ){
						$new_index = $new_index++;
						continue;
					}

					$current_entry = array_shift( $categories );
					$end_array  = array_splice( $cat_list, $new_index );
					$cat_list[] = array(
						'id'    => absint( $current_entry->term_id ),
						'name'  => esc_html( $current_entry->name ),
						'depth' => $depth,
					);
					$cat_list   = array_merge( $cat_list, $end_array );
					break;
				} 
			} 

			$selected            = ( in_array( 0, $category_ids, true ) ) ? ' selected="selected"' : '';
			$selection_category .= "\t";
			$selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', THEMES_NAMES ) . '</option>';
			$selection_category .= "\n";
			foreach( $cat_list as $category ){
				$cat_name            = apply_filters( 'gmr_list_cats', $category['name'], $category );
				$pad                 = ( 0 < $category['depth'] ) ? str_repeat( '&ndash;&nbsp;', $category['depth'] ) : '';
				$selection_category .= "\t";
				$selection_category .= '<option value="' . $category['id'] . '"';
				$selection_category .= ( in_array( $category['id'], $category_ids, true ) ) ? ' selected="selected"' : '';
				$selection_category .= '>' . $pad . $cat_name . '</option>';
				$selection_category .= "\n";
			}
		}

		$selection_category .= "</select>\n";
		?>
		<p style="text-align: center;font-weight: bold;"><?php _e( 'Home by Popular post', THEMES_NAMES ); ?> </p>
		<hr />
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', THEMES_NAMES ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<hr />
		
		<p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title_button' ) ); ?>"><?php _e( 'Title Button:', THEMES_NAMES ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_button' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_button' ) ); ?>" type="text" value="<?php echo esc_attr( $title_button ); ?>" />
        </p>
		<p >
			<label for="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>"><?php _e( 'Link Url:', THEMES_NAMES ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_link' ) ); ?>" type="url" value="<?php echo $title_link; ?>" />
			<br />
			<small><?php _e( 'Target url for title', THEMES_NAMES ); ?> (example: <?php echo home_url( '/' ); ?>), <?php _e( 'leave blank if you want using title without link.', THEMES_NAMES ); ?></small>
		</p>
		<hr />
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'category_ids' ) ); ?>"><?php _e( 'Selected categories', THEMES_NAMES ); ?></label>
			<?php echo $selection_category;  ?>
			<br />
			<small><?php _e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', THEMES_NAMES ); ?></small>
		</p>
		<hr />
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php _e( 'Number post', THEMES_NAMES ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
		</p>  
		<hr />
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Mode:', THEMES_NAMES) ?> </label>
			<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
			<option <?php if ($instance['orderby'] == 'date') echo 'selected="selected"'; ?> value="date"><?php _e('Recent Posts', THEMES_NAMES); ?></option>
			<option <?php if ($instance['orderby'] == 'rand') echo 'selected="selected"'; ?> value="rand"><?php _e('Random Posts', THEMES_NAMES); ?></option>
			<option <?php if ($instance['orderby'] == 'modified') echo 'selected="selected"'; ?> value="modified"><?php _e('Recent Modified date', THEMES_NAMES); ?></option>
			<option <?php if ($instance['orderby'] == 'views') echo 'selected="selected"'; ?> value="views"><?php _e('Post views', THEMES_NAMES); ?></option>			
			<option <?php if ($instance['orderby'] == 'rate') echo 'selected="selected"'; ?> value="rate"><?php _e('Post Rate by User (Just Working For Reborns Styles)', THEMES_NAMES); ?></option>
			<option <?php if ($instance['orderby'] == 'rategps') echo 'selected="selected"'; ?> value="rategps"><?php _e('Post Rate by Play Store (Just Working For Reborns Styles)', THEMES_NAMES); ?></option>			
			</select>
		</p>
		<hr />
		<div class="mdn-select-day">
		<p>
			<label for="<?php echo $this->get_field_id('orderdate'); ?>"><?php _e('Date:', THEMES_NAMES) ?> </label>
				<select id="<?php echo $this->get_field_id('orderdate'); ?>" name="<?php echo $this->get_field_name('orderdate'); ?>">
				<option <?php if ($instance['orderdate'] == 'alltime') echo 'selected="selected"'; ?> value="alltime"><?php _e('All Time', THEMES_NAMES); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastyear') echo 'selected="selected"'; ?> value="pastyear"><?php _e('Past Year', THEMES_NAMES); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastmonth') echo 'selected="selected"'; ?> value="pastmonth"><?php _e('Past Month', THEMES_NAMES); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastweek') echo 'selected="selected"'; ?> value="pastweek"><?php _e('Past Week', THEMES_NAMES); ?></option>
				<option <?php if ($instance['orderdate'] == 'bydays') echo 'selected="selected"'; ?> value="bydays"><?php _e('Last "X" days', THEMES_NAMES); ?></option>
				</select>
		</p>
		<p class="mdn-days <?php echo $this->get_field_id('orderdate'); ?> <?php if ($instance['orderdate'] != 'bydays') echo 'hidden'; ?>">
			<label for="<?php echo $this->get_field_id('days_amount'); ?>"><?php _e( 'Number of last days to filter:', THEMES_NAMES); ?></label>
			<input id="<?php echo $this->get_field_id('days_amount'); ?>" name="<?php echo $this->get_field_name('days_amount'); ?>" type="text" value="<?php echo $days_amount; ?>" size="1" />
		</p>
		</div>
		<hr />		
		<p>
			<label for="<?php echo $this->get_field_id('rate'); ?>"><?php _e('Show Rate:', THEMES_NAMES) ?> </label>
			<select id="<?php echo $this->get_field_id('rate'); ?>" name="<?php echo $this->get_field_name('rate'); ?>">
			<option <?php if ($instance['rate'] == 'none') echo 'selected="selected"'; ?> value="none"><?php _e('disable', THEMES_NAMES); ?></option>
			<option <?php if ($instance['rate'] == 'rate') echo 'selected="selected"'; ?> value="rate"><?php _e('Rate by user', THEMES_NAMES); ?></option> 
			<option <?php if ($instance['rate'] == 'rate_gp') echo 'selected="selected"'; ?> value="rate_gp"><?php _e('Rate by PlayStore', THEMES_NAMES); ?></option> 
			</select>
		</p>
		<p><?php _e('Just Working For Reborns Styles', THEMES_NAMES); ?> </p>
		<hr />		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_mod ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_mod' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_mod' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_mod' ) ); ?>"><?php _e( 'Show Mod ?', THEMES_NAMES ); ?></label>
		</p>
		<p><?php _e('Just Working For Reborns Styles', THEMES_NAMES); ?> </p>
		<hr />
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_version ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_version' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_version' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_version' ) ); ?>"><?php _e( 'Show Version ?', THEMES_NAMES ); ?></label>
		</p>
		<p><?php _e('Just Working For Reborns Styles', THEMES_NAMES); ?> </p>
		<hr />		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_count_rate ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_count_rate' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_count_rate' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_count_rate' ) ); ?>"><?php _e( 'Show Count Rate ?', THEMES_NAMES ); ?></label>
		</p>
		<p><?php _e('Just Working For Reborns Styles', THEMES_NAMES); ?> </p>
		<hr />
		
		
		<script>
			(function($){
			$(document).ready(function(){
				$('.mdn-select-day').each(function(){
					var container = $(this);
					container.find('select').on('change', function(){
						var value = $(this).val();
						if( value == 'bydays' ){
							container.find('.mdn-days').show();
						}else{
							container.find('.mdn-days').hide();
						}
					});
				});
			});
		})(jQuery);
		</script>
        
		<?php
	}
	
	private function get_cat_parent_index( $arr, $id ){
		$len = count( $arr );
		if( 0 === $len ){
			return false;
		}
		$id = absint( $id );
		for( $i = 0; $i < $len; $i++ ){
			if( $id === $arr[ $i ]['id'] ){
				return $i;
			}
		}
		return false;
	}
	
}
add_action(	'widgets_init',	function(){	register_widget( 'ex_themes_most_views_' );	});
