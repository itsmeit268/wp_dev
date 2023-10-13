<?php
/*-----------------------------------------------------------------------------------*/
/*  Select Categorie Sidebar widget
/*-----------------------------------------------------------------------------------*/ 
function selected_categorie_widgets() {
	/*
	https://wordpress.stackexchange.com/questions/310535/multiple-selection-for-wordpress-widget
	*/
    register_widget( 'selected_categories_widgets' );
}
add_action( 'widgets_init', 'selected_categorie_widgets' );

class selected_categories_widgets extends WP_Widget {

	function __construct() { 
        parent::__construct('selected_categories_widgets', __('(MDR) Sidebar Category Selected ', strtolower(THEMES_NAMES)), 
		array( 'description' => __( ucfirst(THEMES_NAMES).' Widget - for Showing Selected Categorie On Sidebar', strtolower(THEMES_NAMES) ), ) 
        );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
    }

	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_media();
         
	}

	/**
	 * Print scripts.
	 *
	 * @since 1.0
	 */
	public function print_scripts() {
		$i = 1;
		?> 
		<script>
		</script>		 
		<?php
		 $i++;
	}
	
	public function form( $instance ) {	
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'				=> __( 'List Categorie', THEMES_NAMES ), 
				'title_button'		=> 'Show More',
				'title_link'		=> home_url( '/#your_link_categorie' ), 
				'layout_style'      => 'moddroid',
			)
		);
		
    $title					= isset($instance[ 'title' ]) ? $instance[ 'title' ] : 'Categories';
    $instance['postCats']	= !empty($instance['postCats']) ? explode(",",$instance['postCats']) : array();
	$title_link				= $instance['title_link'];	 
	$title_button			= !empty( $instance['title_button'] ) ? $instance['title_button'] : '';
	$layout_style			= wp_strip_all_tags( $instance['layout_style'] );
		
    ?>
	<p style="text-align: center;font-weight: bold;"><?php _e('Sidebar Category by Selected', THEMES_NAMES); ?> </p>
	<hr />
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', THEMES_NAMES); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" style="width: 100%;" value="<?php echo $title; ?>"/>
    </p>
	<hr />
	<p>
		<label for="<?php echo $this->get_field_id( 'title_button' ); ?>"><?php _e('Button Title', THEMES_NAMES); ?></label>
	</p>
	<p>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title_button' ); ?>" name="<?php echo $this->get_field_name( 'title_button' ); ?>" value="<?php echo esc_attr( $title_button ); ?>" />
	</p> 
	<hr />		
	<p>
		<label for="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>"><?php _e( 'Button Link Url:', THEMES_NAMES ); ?></label>
	</p>
	<p>
		<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_link' ) ); ?>" type="url" value="<?php echo $title_link; ?>" />
	</p>
	<p>
	<?php _e('link url for button', THEMES_NAMES); ?> (example: <b><?php echo home_url( '/#your_link_categorie' ) ?></b> )
	</p>
	<p>
	<?php _e('leave blank if you dont want to show button', THEMES_NAMES); ?>
	</p>
	<hr />  
    <p>
        <label for="<?php echo $this->get_field_id( 'postCats' ); ?>"><?php _e( 'Select Categories you want to show:', THEMES_NAMES ); ?></label>
		<hr />
		<ul class="categorychecklist">
		
        <?php
		$args = array(
		'post_type'	=> 'post',
		'taxonomy'	=> 'category',
		);
		$terms = get_terms( $args ); 
		$i = 1;
		foreach( $terms as $id => $name ) { 
		$checked = "";
		if(in_array($name->name,$instance['postCats'])){
		$checked = "checked='checked'";
		}
        ?>
        <li id="category-<?php echo $i; ?>">
		<label class="selectit">
		<input id="<?php echo $this->get_field_id('postCats'); ?>" name="<?php echo $this->get_field_name('postCats'); ?>[]" type="checkbox" value="<?php echo $name->name; ?>" <?php echo $checked; ?>><?php echo $name->name; ?>
		</label>
		</li>
        <?php $i++; } ?>
		</ul>
    </p>
	<hr />	
	<p>
		<label for="<?php echo esc_html( $this->get_field_id( 'layout_style' ) ); ?>"><em><?php _e( 'Select for Styles.', THEMES_NAMES ); ?></em></label>
	</p>
	<p>
		<select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'layout_style', THEMES_NAMES ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'layout_style' ) ); ?>">
		<option value="moddroid" <?php echo selected( $instance['layout_style'], 'moddroid', false ); ?>><?php _e( 'MODDROID', THEMES_NAMES ); ?></option>
		<option value="modyolo" <?php echo selected( $instance['layout_style'], 'modyolo', false ); ?>><?php _e( 'MODYOLO', THEMES_NAMES ); ?></option>
		<option value="style_3" <?php echo selected( $instance['layout_style'], 'style_3', false ); ?>><?php _e( 'REBORNS', THEMES_NAMES ); ?></option>
		</select>
	</p>	
	<hr /> 
	<p><?php _e('If You Want Use Styles by MODDROID', THEMES_NAMES); ?></p>
	<p><?php _e('Please Enable Sidebar Categories Opt 1 & Sidebar Categories Opt 2', THEMES_NAMES); ?></p>
	<p><?php _e('Please', THEMES_NAMES); ?> <a href="/wp-admin/admin.php?page=_options&tab=12" target="_blank"><?php _e('SETTING HERE', THEMES_NAMES); ?></a></p>
	<hr />
    <?php

	}

	public function update( $new_instance, $old_instance ) {
		$instance		= $old_instance;
		$new_instance	= wp_parse_args(
			(array) $new_instance,
			array(
				'title'				=> '',
				'title_link'		=> '', 
				'title_button'		=> '',
				'layout_style'      => '',
			)
		); 

    $instance[ 'title' ]		= strip_tags( $new_instance['title'] );
    $instance[ 'postCats' ]		= !empty($new_instance['postCats']) ? implode(",", $new_instance['postCats']) : 0;
	$instance[ 'title_link' ]	= $new_instance['title_link'];
	$instance[ 'title_button' ]	= $new_instance['title_button']; 
	$instance[ 'layout_style' ]	= wp_strip_all_tags( $new_instance['layout_style'] ); 
	 
    return $instance;
	}
 

	public function widget( $args, $instance ) {
    extract( $args );
	global $post, $opt_themes;
	$before_widget		= '';
	$after_widget		= '';
    $title				= apply_filters( 'widget_title', $instance[ 'title' ] );
    $postCats			= $instance[ 'postCats' ];
    $categories_list	= explode(",", $postCats);	
	$more				= ( ! empty( $instance['more'] ) ) ? $instance['more'] : '';
	$link_title			= ( ! empty( $instance['link_title'] ) ) ? $instance['link_title'] : '';
	$layout_style		= ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'modyolo' );
	?>
    <?php echo $before_widget; ?>
	<?php if( 'modyolo' === $layout_style ) : ?>
	<!-- modyolo -->
	<section class="bg-white border rounded shadow-sm pt-3 px-2 px-md-3 mb-3">
		<header class="d-flex align-items-end mb-3">
		<h2 class="h5 font-weight-semibold mb-0">
		<a class="text-body" href="<?php echo $instance['title_link']; ?>"><?php echo $title;?></a>
		</h2>
		<?php if($instance['title_link']){ ?><a class="btn btn-primary btn-sm ml-auto" href="<?php echo $instance['title_link']; ?>" <?php if($opt_themes['ex_themes_activate_rtl_']){ ?>style="margin-right: 15vw !important;"<?php } ?>><?php echo $instance['title_button']; ?></a><?php } ?>
		</header>
		<?php 
		$args = array('post_type' => 'post','taxonomy' => 'category',);
		$terms = get_terms( $args );
		?>
		<div class="row"> 
        <?php
            foreach ($categories_list as $cat) {
                foreach($terms as $term) {
                    if($cat === $term->name) { ?>	
					<div class="col-6 mb-3">
					<a class="small text-truncate d-block" href="<?php echo get_term_link($term->slug, 'category'); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
					</div>
                    <?php }
                }

            } 
        ?> 
		</div>
	</section>
	<?php elseif( 'style_3' === $layout_style ) : ?>
	<!-- style 3 -->		
	<section class="bg-white border rounded shadow-sm pb-3 pt-3 px-2 mb-4 ">
		<div class="d-flex align-items-baseline justify-content-between ">
			<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 "><?php echo $title;?></h2>
			<?php if($instance['title_button']){ ?><a class="small text-truncate text-muted pr-2 " href="<?php echo $instance['link_title']; ?>"><?php echo $instance['title_button']; ?></a><?php } ?>
			</div>
		<?php 
		$args = array('post_type' => 'post','taxonomy' => 'category',);
		$terms = get_terms( $args );
		?>
		<div class="row"> 
        <?php
            foreach ($categories_list as $cat) {
                foreach($terms as $term) {
                    if($cat === $term->name) { ?>	
					<div class="col-6 mb-3">
					<a class="small text-truncate d-block" href="<?php echo get_term_link($term->slug, 'category'); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
					</div>
                    <?php }
                }

            } 
        ?> 
		</div>
	</section>
	<?php else : ?>
	<!-- style moddroid -->
	<?php global $opt_themes; if($opt_themes['aktif_categorie_sidebar_1']) { ?>
	<?php global $opt_themes; if($opt_themes['categorie_sidebar_1']){ ?><?php echo $opt_themes['categorie_sidebar_1']; ?><?php } ?>	
	<?php } else { ?>
	<?php } ?>	
	
	<?php global $opt_themes; if($opt_themes['aktif_categorie_sidebar_2']){ ?>
	<?php global $opt_themes; if($opt_themes['categorie_sidebar_2']){ ?><?php echo $opt_themes['categorie_sidebar_2']; ?><?php } ?>
	<?php } else { ?>
	<?php } ?>
	
	<?php endif; ?> 
		
	<?php echo $after_widget; ?>	
    <?php
	}
}

class tes_categories extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'tes-categories-widgets',
            'description' => __( THEMES_NAMES.' Tes kategorie Widget.', THEMES_NAMES ),
        );
        parent::__construct( 'tes-categories-widgets', __( '(MDR) Tes kategorie', THEMES_NAMES ), $widget_ops );
    } 
	
	
	
}
//add_action('widgets_init', function() { register_widget( 'tes_categories' ); } );

