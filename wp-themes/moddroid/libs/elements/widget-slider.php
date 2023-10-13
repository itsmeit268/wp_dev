<?php
/*-----------------------------------------------------------------------------------*/
/*  Slider Posts Most View widget
/*-----------------------------------------------------------------------------------*/
class moddroid_slider_post_widget extends WP_Widget {
	
	public function __construct(){
		$widget_ops = array(
			'classname'   => 'exthemes-slider-post-widget',
			'description' => __( THEMES_NAMES.' Display Slider Post ', THEMES_NAMES ),
		);
		parent::__construct( 'exthemes-slider-post-widget', __(  '(MDR) Home Slider Posts', THEMES_NAMES ), $widget_ops );
	}
	
	public function widget( $args, $instance ){
		$widget_id			= $this->id_base . '-' . $this->number;
		$category_ids		= ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
		$number_posts		= ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 ); 
		$link_title			= ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
		$title				= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );	
		global $opt_themes;
		?>
				
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
		<div class="d-flex align-items-baseline justify-content-between">		 
		<h2 class="h5 font-weight-semibold mb-3<?php if(!$instance['title_link']){ ?> border-bottom-2 border-secondary pb-1<?php } ?>">
		<?php if($instance['title_link']){ ?><a class="text-body border-bottom-2 border-secondary d-inline-block pb-1" href="<?php echo $instance['title_link']; ?>"><?php } ?><?php echo $title; ?><?php if($instance['title_link']){ ?></a><?php } ?>
		</h2>		
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
		<h2 class="h5 font-weight-semibold mb-3">
		<?php if($instance['title_link']){ ?><a class="text-body border-bottom-2 border-secondary d-inline-block pb-1" href="<?php echo $instance['title_link']; ?>"><?php } ?><?php echo $title; ?><?php if($instance['title_link']){ ?></a><?php } ?>
		</h2>		
		</div>
		<?php } ?>
		

		
	<?php  
	/* 
	if($opt_themes['ex_themes_home_style_2_activate_']) { } else { echo $args['after_title']; }
 */
	if( in_array( 0, $category_ids, true ) ){
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

	$rp = new WP_Query( apply_filters( 'moddroid_slider_post_widget_widget_posts_args', $args ) );
	?>  
	<div class="overflow-auto d-flex ">
	<?php
	global $opt_themes; 
	while( $rp->have_posts() ) :
	$rp->the_post();
	if($opt_themes['mdr_style_3']) {
	get_template_part('template/loop.slider.new');
	} else {
	get_template_part('template/loop.slider');
	}						
	endwhile;
	wp_reset_postdata();
	?>	
				 
	</div>
	</section>
	<?php 
	
	}
	
	public function update( $new_instance, $old_instance ){
		$instance     = $old_instance;
		$new_instance = wp_parse_args(
			(array) $new_instance,
			array(
				'title'             => '',
				'title_link'        => '',
				'title_button'      => '',
				'category_ids'      => array( 0 ),
				'number_posts'      => 3,  
                'orderby'			=> 'date',
                'orderdate'			=> 'alltime',
                'days_amount'		=> 30 
			)
		); 
		$instance['title']				= sanitize_text_field( $new_instance['title'] );
		$instance['title_link']			= $new_instance['title_link'];
		$instance['title_button']		= $new_instance['title_button'];
		$instance['category_ids']		= array_map( 'absint', $new_instance['category_ids'] );
		$instance['number_posts']		= absint( $new_instance['number_posts'] );
		$instance['orderby']			= $new_instance['orderby'];
		$instance['orderdate']			= $new_instance['orderdate'];
		$instance['days_amount']		= (int) $new_instance['days_amount'];
		if( in_array( 0, $instance['category_ids'], true ) ){
			$instance['category_ids'] = array( 0 );
		}
		return $instance;
	}

	public function form( $instance ){
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'             => __( 'Slider by Post Categorie', THEMES_NAMES ),
				'title_link'        => home_url( '/' ),
				'title_button'      => 'Read More',
				'category_ids'      => array( 0 ),
				'number_posts'      => 3,  
                'orderby'			=> 'date',
                'orderdate'			=> 'alltime',
                'days_amount'		=> 30,
			)
		);
		$title						= sanitize_text_field( $instance['title'] );
		$title_link					= $instance['title_link'];
		$title_button				= $instance['title_button'];
		$category_ids				= array_map( 'absint', $instance['category_ids'] );
		$number_posts				= absint( $instance['number_posts'] );	
		$days_amount				= isset( $instance['days_amount'] ) ? absint( $instance['days_amount'] ) : 30;

		$categories     			= get_categories(
			array(
				'hide_empty'   => 0,
				'hierarchical' => 1,
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
						'id'    => absint( $current_entry->term_id ),
						'name'  => esc_html( $current_entry->name ),
						'depth' => 0,
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
		<p style="text-align: center;font-weight: bold;"><?php _e( 'Slider Home Widget', THEMES_NAMES ); ?> </p>
		<hr />
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', THEMES_NAMES ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<hr />
		<p >
			<label for="<?php echo esc_html( $this->get_field_id( 'title_button' ) ); ?>"><?php _e( 'Title Button:', THEMES_NAMES ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_button' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_button' ) ); ?>" type="text" value="<?php echo esc_attr( $title_button ); ?>" />
			<br />
			<small><?php _e( 'button title', THEMES_NAMES ); ?></small>
		</p>
		<hr />
		<p >
			<label for="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>"><?php _e( 'Link Url:', THEMES_NAMES ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_link' ) ); ?>" type="text" value="<?php echo $title_link; ?>" />
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
add_action('widgets_init', function(){	register_widget( 'moddroid_slider_post_widget' );});

