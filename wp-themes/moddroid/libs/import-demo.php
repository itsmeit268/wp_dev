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
			'import_file_name'           => 'Moddroid Demo',
			'categories'                 => array( 'Moddroid' ),
			'import_file_url'            => EX_THEMES_URI.'/libs/demo/demo-content-moddroid.xml',
			'import_widget_file_url'     => EX_THEMES_URI.'/libs/demo/demo-widget-moddroid.wie', 
			'import_customizer_file_url' => EX_THEMES_URI.'/libs/demo/demo-data-moddroid.dat', 
			'import_redux'               => array(
				array(
					'file_url'    => EX_THEMES_URI.'/libs/demo/demo-redux-moddroid.json', 
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'   =>  'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgxNTnCRN86z0Eik94-0qu5lwqyzaKpXoh3iYRGaJJoDZnMNSasi9R53hEK_LMiYqEjmgs3TZ1WPHVTYNRb6iuiP644VVVPyEQ_j-_6LYzpWbnci1lI_A9vqmszHlHYuwrPUpNzAiuy8r0X31JF-F-mCPU-70RRWs3FeDEJGbSbLj8SQOXpF1ODxBVPudY/s1600/moddroid.jpg',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', THEMES_NAMES ),
			'preview_url'                => 'https://moddroid.demos.web.id',
		),
		array(
			'import_file_name'           => 'Modyolo Demo',
			'categories'                 => array( 'Modyolo' ),
			'import_file_url'            => EX_THEMES_URI.'/libs/demo/demo-content-modyolo.xml',
			'import_widget_file_url'     => EX_THEMES_URI.'/libs/demo/demo-widget-modyolo.wie', 
			'import_customizer_file_url' => EX_THEMES_URI.'/libs/demo/demo-data-modyolo.dat', 
			'import_redux'               => array(
				array(
					'file_url'    => EX_THEMES_URI.'/libs/demo/demo-redux-modyolo.json', 
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'   => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgQ3afmqTAXrmd6rQ0XaR5B1IL7mWUlXi-Krzzf4shT-bkSsfagUiPHBEIDnXZ3toyznPtvsW32QDTL15vRUBQxTIAId3G6lw3Q9ACuNFryz3M0lAIaNvSzjhG9AwczvW5Tkyh9hh_g0uMqEs5Vou2Omu5i4h_IqHZlpfkTEU8W8tQIJq5r2yGdhxp1iaE/s1600/modyolo.jpg',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', THEMES_NAMES ),
			'preview_url'                => 'https://modyolo.demos.web.id',
		),
		array(
			'import_file_name'           => 'Reborn Demo',
			'categories'                 => array( 'Reborn' ),
			'import_file_url'            => EX_THEMES_URI.'/libs/demo/demo-content-reborn.xml',
			'import_widget_file_url'     => EX_THEMES_URI.'/libs/demo/demo-widget-reborn.wie', 
			'import_customizer_file_url' => EX_THEMES_URI.'/libs/demo/demo-data-reborn.dat', 
			'import_redux'               => array(
				array(
					'file_url'    => EX_THEMES_URI.'/libs/demo/demo-redux-reborn.json', 
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'   => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgNMUZQCWxmXq23IXa532znxkroRi-w-1sMrQxV9nVsK3E0Z-U_8IPTq8Hf4pg1pDHBiPZ5qcnwhaR2j0MND5mqgCwiJHO67vEWnp4M85kGWTc5Nf1zGy5q9cvhabM8-T3N5AwwoAib4Wijv-l1_C_8ILqpMBggo8GhTNWMBR4G5JYZVciMfF3ZO842OEw/s1600/reborn-moddroid.jpg',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', THEMES_NAMES ),
			'preview_url'                => 'https://moddroid-reborn.demos.web.id/',
		),
		array(
			'import_file_name'           => 'RTL Demo',
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
			'import_preview_image_url'   => EX_THEMES_URI.'/assets/img/moddroid-rtl.jpg',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', THEMES_NAMES ),
			'preview_url'                => 'https://moddroid-rtl.demos.web.id/',
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
    [
		'name'     		=> 'One Click Demo Import',
		'slug'     		=> 'one-click-demo-import',
		'required' 		=> true,        
    ],    
	[
		'name'     		=> 'Redux Framework',
		'slug'     		=> 'redux-framework',
		'required' 		=> true,        
    ],
    [
		'name'			=> 'Rate my Post - WP Rating System',
		'slug'			=> 'rate-my-post',
		'required'		=> true,
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
		'name'			=> 'Comments Like Dislike',
		'slug'			=> 'comments-like-dislike',
		'required'		=> false,
    ],
    [
		'name'			=> 'React & Share',
		'slug'			=> 'react-and-share',
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
		'name'        	=> 'Self Hosted Plugin',
		'description' 	=> 'This is the plugin description',
		'slug'        	=> 'self-hosted-plugin', 
		'source'      	=> 'https://example.com/my-site/self-hosted-plugin.zip',
		'preselected' 	=> true,
		'required' 		=> true, 
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