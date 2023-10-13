<?php
/*-----------------------------------------------------------------------------------*/
/*  Slider Posts by IDs widget
/*-----------------------------------------------------------------------------------*/
class Posts_Widget extends WP_Widget{
	function __construct(){
		$widget_ops = array(
			'classname' => 'widget_posts', 
			'description' => __( THEMES_NAMES.' Display Slider by Post ID&#8217;s') 
			);
		parent::__construct('posts_widget', __( '(MDR) Home Slider Posts ID'), $widget_ops);
	}

	function widget( $args, $instance ){
		$cache = wp_cache_get( 'Posts_Widget', 'widget' );

		if( !is_array( $cache ) )
		$cache = array();

		if( ! isset( $args['widget_id'] ) )
		$args['widget_id'] = null;

		if( isset( $cache[$args['widget_id']] ) ){
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract( $args, EXTR_SKIP );

		ob_start();
		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Important Posts' ) : $instance['title'], $instance, $this->id_base );

		$ids = empty( $instance['postids'] ) ? '' : $instance['postids'];

		$array_ids = array_map('intval', explode(',', $ids));

		$ppp = count($array_ids);

		$pa = array(
			'post__in'				=> $array_ids,
			'posts_per_page'		=> $ppp, 
			'orderby'        		=> 'post__in',
			'ignore_sticky_posts'	=> 1
		);
		$widget_posts = new WP_Query( $pa );

		if( $widget_posts->have_posts() ) :
			
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
		/* global $opt_themes;
		if($opt_themes['ex_themes_home_style_2_activate_']) { } else { echo $args['after_title']; } */
		?>
		
		<div class="overflow-auto d-flex ">
					<?php
					global $opt_themes; 
					while( $widget_posts->have_posts() ) :
					$widget_posts->the_post();
					if($opt_themes['mdr_style_3']) {
					get_template_part('template/loop.slider.new');
					} else {
					get_template_part('template/loop.slider');
					}						
					endwhile;
					wp_reset_postdata();
					?>	
	 
		</div>
		<?php
		wp_reset_postdata();
		endif;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'Posts_Widget', $cache, 'widget' );
		?>
		</section>
		<?php
	 
	}

	function update( $new_instance, $old_instance ){
		$instance 					= $old_instance;
		$instance['title'] 			= $new_instance['title'];
		$instance['title_link'] 	= $new_instance['title_link'];
		$instance['title_button'] 	= $new_instance['title_button'];
		$instance['postids'] 		= strip_tags( $new_instance['postids'] );

		return $instance;
	}

	function form( $instance ){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 
			'title' 		=> 'Slider by post ID', 
			'title_link' 	=> home_url( '/' ),	
			'title_button' 	=> 'Read More', 
			'postids' 		=> '',				
		) );
		$title 			= $instance['title'];
		$ids 			= esc_attr( $instance['postids'] );
		$title_link 	= $instance['title_link'];
		$title_button 	= $instance['title_button'];
		?>
		<p style="text-align: center;font-weight: bold;"><?php _e('Slider by post IDs Widget', THEMES_NAMES ); ?> </p>
		<hr />
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', THEMES_NAMES ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<hr />
		<p>
			<label for="<?php echo $this->get_field_id('postids'); ?>"><?php _e( 'Post ID:', THEMES_NAMES ); ?></label> <input type="text" value="<?php echo $ids; ?>" name="<?php echo $this->get_field_name('postids'); ?>" id="<?php echo $this->get_field_id('postids'); ?>" class="widefat" />
			<br />
			<small><?php _e( 'Post IDs, separated by commas.', THEMES_NAMES ); ?></small>
		</p>
		
		<hr />
		<p >
			<label for="<?php echo esc_html( $this->get_field_id( 'title_button' ) ); ?>"><?php _e( 'Button Title:', THEMES_NAMES ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_button' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_button' ) ); ?>" type="text" value="<?php echo esc_attr( $title_button ); ?>" />
			<br />
			<small><?php _e( 'Button Title', THEMES_NAMES ); ?></small>
		</p>
		<hr />
		<p >
			<label for="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>"><?php _e( 'Link Title:', THEMES_NAMES ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_link' ) ); ?>" type="url" value="<?php echo esc_attr( $title_link ); ?>" />
			<br />
			<small><?php _e( 'Target url for title', THEMES_NAMES ); ?> (example: <?php echo home_url( '/' ); ?>), <?php _e( 'leave blank if you want using title without link.', THEMES_NAMES ); ?></small>
		</p>
		<hr />
		<?php
	}
}

add_action( 'widgets_init', function(){ register_widget( 'Posts_Widget' ); });
