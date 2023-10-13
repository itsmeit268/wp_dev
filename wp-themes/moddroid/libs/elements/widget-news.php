<?php

/*-----------------------------------------------------------------------------------*/
/*  News Home widget
/*-----------------------------------------------------------------------------------*/
class moddroid_news_widget extends WP_Widget {
	
	public function __construct(){
		$widget_ops = array(
			'classname'   => 'exthemes-news-widget',
			'description' => __( THEMES_NAMES.' Display News or Blog On Home Pages.', THEMES_NAMES ),
		);
		parent::__construct( 'exthemes-news-widget', __( '(MDR) Home News or Blog', THEMES_NAMES ), $widget_ops );
	}
	
	public function widget( $args, $instance ){
		$widget_id			= $this->id_base . '-' . $this->number;
		$number_posts		= ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 ); 
		$link_title			= ( ! empty( $instance['link_title'] ) ) ? $instance['link_title']  : '';
		$title_button		= ( ! empty( $instance['title_button'] ) ) ? $instance['title_button'] : '';
		$title				= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ); 
		global $opt_themes;  ?>
				
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--moddroid--> 
		<section class="mb-4">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
		<!--modyolo & style 3-->
		<section class="bg-white border rounded shadow-sm  pb-3 pt-3 px-2 px-md-3 mt-3 m-2">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--modyolo--> 
		<section class="bg-white border rounded shadow-sm pt-3 px-2 px-md-3 mb-3">
		<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--style 3-->
		<section class="bg-white rounded shadow-sm pb-3 pt-3 px-2 px-md-3 mt-3 m-2">
		<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--moddroid-->
		<section class="mb-4">
		<?php } ?>
		
				
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--moddroid-->  
		<div class="d-flex align-items-baseline justify-content-between ">		 
		<h2 class="h5 font-weight-semibold mb-3"><a class="text-body border-bottom-2 border-secondary d-inline-block pb-1" href="<?php echo $instance['title_link']; ?>"><?php echo $title; ?></a></h2> 
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
		</div>
		<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--moddroid-->		
		<div class="d-flex align-items-baseline justify-content-between ">		 
		<h2 class="h5 font-weight-semibold mb-3"><a class="text-body border-bottom-2 border-secondary d-inline-block pb-1" href="<?php echo $instance['title_link']; ?>"><?php echo $title; ?></a></h2> 
		</div>		
		<?php } ?>
        <?php 
		/* global $opt_themes;
		if($opt_themes['ex_themes_home_style_2_activate_']) { } else { echo $args['after_title']; }  */
 
		$args = array(
				'posts_per_page'			=> $number_posts,
				'post_type'					=> 'news',
				'no_found_rows'				=> true,
				'post_status'				=> 'publish', 
				'orderby'					=> $instance['orderby'],
				'update_post_term_cache'	=> false,
				'update_post_meta_cache'	=> false,
		);

 
		if( $instance['orderby'] == 'views' ){
			$args = array(
				'posts_per_page'	=> $instance['number_posts'],
				'post_type'			=> 'news',
				'order'				=> 'DESC',
				'orderby'			=> 'meta_value_num',
				'meta_key'			=> 'post_views_count',
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

		/* run the query: get the latest posts */
		$rp = new WP_Query( apply_filters( 'moddroid_slider_post_widget_widget_posts_args', $args ) );
		?>
		<div class="row">
		<?php while( $rp->have_posts() ) : $rp->the_post(); ?>
		<?php get_template_part('template/loop.news'); ?>				  
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>			 
		</div>
		
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?>
			<a class="btn btn-light btn-block" href="<?php echo $instance['title_link']; ?>" >
			<span class="align-middle"><?php echo $instance['title_button']; ?></span>
			<svg class="svg-6" height="16px" version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 532.439 532.439' style='enable-background:new 0 0 532.439 532.439;' xml:space='preserve'><g><g><polygon points='532.439,44.56 241.74,266.22 532.439,487.88 532.439,377.05 386.484,266.22 532.439,155.39   '/><polygon points='290.699,487.88 290.699,377.05 144.744,266.22 290.699,155.39 290.699,44.56 0,266.22'/></g></g> <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
			</a>
		<?php } else { if($instance['title_link']){ ?>
			<a class="btn btn-light btn-block" href="<?php echo $instance['title_link']; ?>" >
			<span class="align-middle"><?php echo $instance['title_button']; ?></span>
			<svg class="ml-1" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M24.707 38.101L4.908 57.899c-4.686 4.686-4.686 12.284 0 16.971L185.607 256 4.908 437.13c-4.686 4.686-4.686 12.284 0 16.971L24.707 473.9c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L41.678 38.101c-4.687-4.687-12.285-4.687-16.971 0z" /></svg>
			</a> 
		<?php }} ?>
		<?php } ?>
		 
		</section>
		<?php  
	}
	
	public function update( $new_instance, $old_instance ){
		$instance		= $old_instance;
		$new_instance	= wp_parse_args(
			(array) $new_instance,
			array(
				'title'				=> '',
				'title_button'		=> '',
				'title_link'		=> '',
				'number_posts'		=> 3,  
				'orderby'			=> 'date',
				'orderdate'			=> 'alltime',
				'days_amount'		=> 30 
			)
		); 
		$instance['title']				= sanitize_text_field( $new_instance['title'] );
		$instance['title_button']		= sanitize_text_field( $new_instance['title_button'] );
		$instance['title_link']			= $new_instance['title_link'];
		$instance['number_posts']		= absint( $new_instance['number_posts'] );
		$instance['orderby']			= $new_instance['orderby'];
		$instance['orderdate']			= $new_instance['orderdate'];
		$instance['days_amount']		= (int) $new_instance['days_amount'];
		
		return $instance;
	}

	public function form( $instance ){
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'				=> __( 'Latest Blog', THEMES_NAMES ),
				'title_button'		=> __( 'Get More...', THEMES_NAMES ),
				'title_link'		=> home_url( '/news' ),
				'number_posts'		=> 3,  
				'orderby'			=> 'date',
				'orderdate'			=> 'alltime',
				'days_amount'		=> 30,
			)
		);
		$title						= sanitize_text_field( $instance['title'] );
		$title_button				= sanitize_text_field( $instance['title_button'] );
		$title_link					= $instance['title_link'];
		$number_posts				= absint( $instance['number_posts'] );	
		$days_amount				= isset( $instance['days_amount'] ) ? absint( $instance['days_amount'] ) : 30;
 
 
		?>
		
		<p style="text-align: center;font-weight: bold;"><?php _e( 'Blog or News Widget', THEMES_NAMES ); ?> </p>
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
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_link' ) ); ?>" type="text" value="<?php echo esc_attr( $title_link ); ?>" />
			<br />
			<small><?php _e( 'Target url for title', THEMES_NAMES ); ?> (example: <?php echo home_url( '/' ); ?>), <?php _e( 'leave blank if you want using title without link.', THEMES_NAMES ); ?></small>
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
	/**
	* Return the array index of a given ID
	*
	* @since 1.0.0
	* @param array $arr Array.
	* @param int   $id Post ID.
	* @access private
	*/
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
add_action(
	'widgets_init',
	function(){
		register_widget( 'moddroid_news_widget' );
	}
);