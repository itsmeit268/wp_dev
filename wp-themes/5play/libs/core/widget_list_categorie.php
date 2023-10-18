<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
// silences is goldens

function multi_select_categorie() { register_widget( 'multi_select_categorie_widget' ); }
add_action( 'widgets_init', 'multi_select_categorie' );

class multi_select_categorie_widget extends WP_Widget {
	function __construct() { 
		parent::__construct('multi_select_categorie_widget', __('(5play) Categorie Multi Select', TEXT_DOMAIN), array( 'description' => __( 'Display  Categorie Multi Select', TEXT_DOMAIN ), ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
	}

	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}
	
	public function print_scripts() { ?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}
	
	public function form( $instance ) {	
		$instance = wp_parse_args( (array) $instance,
				array(
					'title'             => __( 'Categorie', TEXT_DOMAIN  ),  
					'color_svg'   		=> 's-blue', 
					'color_link'   		=> 'teal', 
					'readmores'			=> __( 'All', TEXT_DOMAIN  ),
					'icon'    		    => '<svg class="svg-inline--fa fa-shapes" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><circle cx="17.47857" cy="17.49096" r="4.5" fill="currentColor"></circle><circle cx="6.50904" cy="6.52143" r="4.5" fill="currentColor"></circle><circle cx="5.00904" cy="18.99096" r="3" fill="currentColor"></circle><circle cx="18.99096" cy="5.00904" r="3" fill="currentColor"></circle></g></svg>',
					'link_title'        => home_url( '/categories' ),
					'color_more'		=> 'teal',
				)
		);
			
		$title			= isset($instance[ 'title' ]) ? $instance[ 'title' ] : 'Categories';
		$colors_svg		= esc_attr( $instance['color_svg'] );		
		$color_link		= esc_attr( $instance['color_link'] );		
		$readmores		= sanitize_text_field( $instance['readmores'] );
		$icon			= $instance['icon'];
        $link_title		= $instance['link_title'];
		$instance['select_categorie'] 	= !empty($instance['select_categorie']) ? explode(",",$instance['select_categorie']) : array();
		$color_more		= esc_attr( $instance[ 'color_more' ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
        </p>
        <p>
			<input type="text" class="widfat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" style="width: 100%;" value="<?php echo $title; ?>"/>
		</p>
		<hr />
		
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'readmores' ) ); ?>"><?php _e( 'Button Title :', TEXT_DOMAIN  ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'readmores' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'readmores' ) ); ?>" type="text" value="<?php echo esc_attr( $readmores ); ?>" />
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>"><?php _e( 'Button Link :', TEXT_DOMAIN  ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'link_title' ) ); ?>" type="text" value="<?php echo esc_attr( $link_title ); ?>" />  
        </p>
        <p>        
            <small><?php _e('Target url for title, example :', TEXT_DOMAIN); ?> <?php echo home_url( '/' ); ?>, <?php _e('leave blank if you want using title without link.', TEXT_DOMAIN); ?> </small>
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>"><?php _e( 'Icons :', TEXT_DOMAIN  ); ?></label>
        </p>
        <p> 
		 <textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'icon' ) ); ?>"><?php echo esc_textarea( $instance['icon'] ); ?></textarea>
		 </p>
           
        </p>
		<hr />
		
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php _e( 'Color Svg Icons:', THEMES_NAMES  ); ?></label>
        </p>
        <p>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', THEMES_NAMES  ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php _e( 'YELLOW', THEMES_NAMES  ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php _e( 'GREEN', THEMES_NAMES  ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php _e( 'PURPLE', THEMES_NAMES  ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php _e( 'RED', THEMES_NAMES  ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php _e( 'BLUE', THEMES_NAMES  ); ?></option>
            </select> 
        </p>
        <p>
            <small><?php _e( 'Select color svg icons.', THEMES_NAMES  ); ?></small>
        </p> 
		<hr />
		<p>
		<label for="<?php echo esc_html( $this->get_field_id( 'color_link' ) ); ?>"><?php _e( 'Color Link:', TEXT_DOMAIN  ); ?></label>
		</p> 
		<p>
			<input type="text" name="<?php echo $this->get_field_name( 'color_link' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'color_link' ); ?>" value="<?php echo $color_link; ?>" data-default-color="#008080" />
		</p>
		
		<p>
		<small><?php _e( 'Select color link.', TEXT_DOMAIN  ); ?></small>
		</p> 
		<hr /> 
		<p>
		<label for="<?php echo esc_html( $this->get_field_id( 'color_more' ) ); ?>"><?php _e( 'Color Link more:', TEXT_DOMAIN  ); ?></label>
		</p> 
		<p>
			<input type="text" name="<?php echo $this->get_field_name( 'color_more' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'color_more' ); ?>" value="<?php echo $color_more; ?>" data-default-color="#008080" />
		</p>
		
		<p>
		<small><?php _e( 'Select color link.', TEXT_DOMAIN  ); ?></small>
		</p> 
		<hr /> 
		<p>
		<label for="<?php echo $this->get_field_id( 'select_categorie' ); ?>"><?php _e( 'Select Categories you want to show:' ); ?></label><br />
			<?php 
			$args = array(
			'post_type' => 'post',
			'taxonomy' => 'category',
			);
			$terms = get_terms( $args );
			//print_r($terms);
			foreach( $terms as $id => $name ) { 
			$checked = "";
			if(in_array($name->name,$instance['select_categorie'])){
			$checked = "checked='checked'";
			}
			?>
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('select_categorie'); ?>" name="<?php echo $this->get_field_name('select_categorie[]'); ?>" value="<?php echo $name->name; ?>"  <?php echo $checked; ?>/>
		<label for="<?php echo $this->get_field_id('select_categorie'); ?>"><?php echo $name->name; ?></label>
		<br />
		<?php } ?>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance     = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance,
				array(
					'title'             => '', 
					'color_svg'   		=> 's-blue',
					'color_link'   		=> '',
					'readmores'			=> '',
					'icon'				=> '',
					'link_title'        => '',
					'color_more'		=> '',
				)
		); 
		$instance['title'] 				= strip_tags( $new_instance[ 'title' ] );
		$instance['color_svg']			= esc_attr( $new_instance['color_svg'] );
		$instance['color_link']			= esc_attr( $new_instance['color_link'] );
        $instance['readmores']			= sanitize_text_field( $new_instance['readmores'] );
        $instance['icon']				= $new_instance['icon']; 
        $instance['link_title']			= $new_instance['link_title']; 
		$instance['select_categorie'] 	= !empty($new_instance['select_categorie']) ? implode(",",$new_instance['select_categorie']) : 0;
		$instance['color_more']			= strip_tags( $new_instance['color_more'] );
		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title 		= apply_filters( 'widget_title', $instance[ 'title' ] );
		$postCats 	= $instance[ 'select_categorie' ];
		$categories_list = explode(",", $postCats);
		?>
		<section class="wrp section"> 
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $instance['color_svg']; ?> c-icon"><?php echo $instance['icon']; ?></i><?php echo $instance['title']; ?></h3>	
		<a style="background-color: <?php echo $instance['color_more']; ?> !important;background-image: linear-gradient(180deg, <?php echo $instance['color_more']; ?> 0%, <?php echo $instance['color_more']; ?> 100%) !important; " class="btn <?php echo $instance['color_svg']; ?> btn-all" href="<?php echo $instance['link_title']; ?>" aria-label="<?php echo $instance['readmores']; ?>">
		<span><?php echo $instance['readmores']; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</div>
		
		 		
		
		<?php
		$args 	= array('post_type' => 'post','taxonomy' => 'category',);
		$terms 	= get_terms( $args );
		?>
		<div class="home-categories">
		<?php
		foreach ($categories_list as $cat) {
			foreach($terms as $term) {
				if($cat === $term->name) {
				//print_r($term);
				?>
				<a href='<?php echo get_category_link($term->term_id); ?>' class='px-3 py-2 bg-green-500 text-white dark:bg-[#273d52] dark:text-gray-100 text-xs rounded font-medium font-poppins transition m-1 inline-block' style='background-color: <?php echo $instance['color_link']; ?>'><?php echo $term->name; ?></a>		
			<?php }
			}
		}
		?>
		</div>
		 
		</section>
		<?php
		 
	}
}
