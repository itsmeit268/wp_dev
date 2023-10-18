<?php  
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/  
function ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'Default Demos',
			'categories'                 => array( 'Default' ),
			'import_file_url'            => EX_THEMES_URI.'/libs/demo/demo-content-default.xml',
			'import_widget_file_url'     => EX_THEMES_URI.'/libs/demo/demo-widgets-default.wie', 
			'import_customizer_file_url' => EX_THEMES_URI.'/libs/demo/demo-data-default.dat', 
			'import_redux'               => array(
				array(
					'file_url'    => EX_THEMES_URI.'/libs/demo/demo-redux-default.json', 
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'   => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjBfIZVTs20FxAPysqIYp_f5fmPc7bEbp2-7TtkVt8Yz8cszI_9PegrPhQpizdsQ86uUjz_I8mhLRA8fFSxZAn-hR3qQX0H4P9Rr3vU-wiua_x38KwnB0N6CuH_6ucqZa4BQrryMgKTdfp5fdyIubePbZGI5i6zYvl_JaTE1tZ2gD5z704x4F3pdB2nxwA/s1600/5play.png',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', THEMES_NAMES ),
			'preview_url'                => 'https://5play.demos.web.id/',
		),
		array(
			'import_file_name'           => 'RTL Demos',
			'categories'                 => array( 'RTL' ),
			'import_file_url'            => EX_THEMES_URI.'/libs/demo/demo-content-rtl.xml',
			'import_widget_file_url'     => EX_THEMES_URI.'/libs/demo/demo-widgets-rtl.wie', 
			'import_customizer_file_url' => EX_THEMES_URI.'/libs/demo/demo-data-rtl.dat', 
			'import_redux'               => array(
				array(
					'file_url'    => EX_THEMES_URI.'/libs/demo/demo-redux-rtl.json', 
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'   => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgJPwDaaV7gG7DEV8MVft29ocvdJyDn29_TwyH-PthWCoE3RLuZpeo_8KIFzgorKQl9bHX9kF5_FIoPSSOscZQCcs90Jo4-x8nTjbYjFOpUZw_w9vMysMIpjwmN1eEP4wHXym-uBswOMEHj6_bE77244NvOR1WICTGP61-SFx9XD6zDrAggBPQQVmCx0fk/s1600/5play-rtl.png',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', THEMES_NAMES ),
			'preview_url'                => 'https://5play-rtl.demos.web.id/',
		),
	);
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );

if ( ! function_exists( 'ocdi_after_import' ) ) :
	/**
	 * Set action after import demo data. Plugin require is. https://wordpress.org/plugins/one-click-demo-import/
	 *
	 * @param Array $selected_import Import selected.
	 * @since v.1.0.0
	 * @link https://wordpress.org/plugins/one-click-demo-import/faq/
	 *
	 * @return void
	 */
	function ocdi_after_import( $selected_import ) {
		// Menus to Import and assign - you can remove or add as many as you want.
		$top_menu    = get_term_by( 'name', 'Top menus', 'nav_menu' );
		$second_menu = get_term_by( 'name', 'Second menus', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary'   => $top_menu->term_id,
				'secondary' => $second_menu->term_id,
			)
		);

	}
endif;
//add_action( 'pt-ocdi/after_import', 'ocdi_after_import' );

if ( ! function_exists( 'change_time_of_single_ajax_call' ) ) :
	/**
	 * Change ajax call timeout
	 *
	 * @link https://github.com/awesomemotive/one-click-demo-import/blob/master/docs/import-problems.md.
	 */
	function change_time_of_single_ajax_call() {
		return 60;
	}
endif;
//add_action( 'pt-ocdi/time_for_one_ajax_call', 'change_time_of_single_ajax_call' );

// disable generation of smaller images (thumbnails) during the content import.
//add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

// disable the branding notice.
//add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


function ocdi_register_plugins( $plugins ) {
 
  // Required: List of plugins used by all theme demos.
  $theme_plugins = [
    /* 
	[
      'name'     	=> 'Redux Framework',
      'slug'     	=> 'redux-framework',
      'required' 	=> true,        
    ], 
	*/
    [
		'name'     		=> 'One Click Demo Import',
		'slug'     		=> 'one-click-demo-import',
		'required' 		=> true,        
    ],
    [
		'name'        	=> 'Comment Like Dislike for 5play Themes', 
		'slug'        	=> 'comments-like-dislike', 
		'source'      	=> 'https://www.dropbox.com/s/b18cf5boai4fhwk/comments-like-dislike.zip?dl=1',
		'preselected' 	=> true,
		'required' 		=> true,        
    ],
    [
		'name'        	=> 'Post Like Dislike for 5play Themes', 
		'slug'        	=> 'posts-like-dislike', 
		'source'      	=> 'https://www.dropbox.com/s/8z2u83p0g6fcjnh/posts-like-dislike.zip?dl=1',
		'preselected' 	=> true,
		'required' 		=> true,        
    ],    
    [
		'name'     		=> 'Term Management Tools',
		'slug'     		=> 'term-management-tools',
		'required' 		=> false,        
    ],
    [
		'name'     		=> 'Classic Editor',
		'slug'     		=> 'classic-editor',
		'required' 		=> false,        
    ],
    [
		'name'     		=> 'Classic Widgets',
		'slug'     		=> 'classic-widgets',
		'required' 		=> false,        
    ],
    [
		'name'			=> 'KK Star Ratings',
		'slug'			=> 'kk-star-ratings',
		'required'		=> false,
    ],
	
	/* 
    [
      'name'     => 'Some Bundled Plugin',
      'slug'     => 'bundled-plugin',       
      'source'   => get_template_directory_uri() . '/bundled-plugins/bundled-plugin.zip',
      'required' => false,
    ],
    [
      'name'        => 'Self Hosted Plugin',
      'description' => 'This is the plugin description',
      'slug'        => 'self-hosted-plugin', 
      'source'      => 'https://example.com/my-site/self-hosted-plugin.zip',
      'preselected' => true,
    ],
	 */
  ];
 
  // Check if user is on the theme recommeneded plugins step and a demo was selected.
  if ( isset( $_GET['step'] ) && $_GET['step'] === 'import' && isset( $_GET['import'] ) ) {
 
    // Adding one additional plugin for the first demo import ('import' number = 0).
    if ( $_GET['import'] === '1' ) {
      /* 
	  $theme_plugins[] = [
        'name'     => 'Page Builder by SiteOrigin',
        'slug'     => 'siteorigin-panels',
        'required' => true,
      ];
 
      $theme_plugins[] = [
        'name'     => 'SiteOrigin Widgets Bundle',
        'slug'     => 'so-widgets-bundle',
        'required' => true,
      ]; 
	  */
    }
 
    // List of all plugins only used by second demo import [overwrite the list] ('import' number = 1).
    if ( $_GET['import'] === '1' ) {
      /* 
	  $theme_plugins = [
        [
          'name'     => 'Advanced Custom Fields',
          'slug'     => 'advanced-custom-fields',
          'required' => true,
        ],
        [
          'name'     => 'Portfolio Post Type',
          'slug'     => 'portfolio-post-type',
          'required' => false,
        ], 
      ];
	  */
    }
  }
 
  return array_merge( $plugins, $theme_plugins );
}
add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );