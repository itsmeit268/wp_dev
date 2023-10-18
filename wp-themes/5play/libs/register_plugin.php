<?php
add_action( 'tgmpa_register', 'butuh_plugins' );
function butuh_plugins() {
    $plugins = array(
        // This is an include a plugin bundled with a theme.
		
		array(
			'name'					=> 'One Click Demo Import',
			'slug'					=> 'one-click-demo-import',
			'required'				=> true,
		),  		
        array(
            'name'               	=> 'Comment Like Dislike for 5play Themes', 
            'slug'               	=> 'comments-like-dislike',  
            'source'             	=> 'https://www.dropbox.com/s/b18cf5boai4fhwk/comments-like-dislike.zip?dl=1', 
            'required'           	=> false, 
        ), 		
        array(
            'name'               	=> 'Post Like Dislike for 5play Themes', 
            'slug'               	=> 'posts-like-dislike',  
            'source'             	=> 'https://www.dropbox.com/s/8z2u83p0g6fcjnh/posts-like-dislike.zip?dl=1', 
            'required'           	=> true, 
        ), 
		array(
			'name'					=> 'Classic Widgets',
			'slug'					=> 'classic-widgets',
			'required'				=> false,
		), 
		array(
			'name'					=> 'Classic Editor',
			'slug'					=> 'classic-editor',
			'required'				=> false,
		),    
        array(
            'name'					=> 'KK Star Ratings',
            'slug'					=> 'kk-star-ratings',
            'required'				=> false,
        ), 
		array(
			'name'					=> 'Term Management Tools',
			'slug'					=> 'term-management-tools',
			'required'				=> false,
		),
		/* 
		array(
			'name'					=> 'Heartbeat Control',
			'slug'					=> 'heartbeat-control',
			'required'				=> false,
		),
		array(
			'name'					=> 'Optimize Database after Deleting Revisions ',
			'slug'					=> 'rvg-optimize-database',
			'required'				=> false,
		), 
		 
		array(
			'name'					=> 'Force Regenerate Thumbnail',
			'slug'					=> 'force-regenerate-thumbnails',
			'required'				=> true,
		),
		 
		array(
			'name'					=> 'Template Library and Redux Framework',
			'slug'					=> 'redux-framework',
			'required'				=> true,
		),
		
		 array(
			'name'					=> 'Translate WordPress with GTranslate',
			'slug'					=> 'gtranslate',
			'required'				=> false,
		), 
        array(
            'name'               => 'Fix My Feed RSS Repair', // The plugin name.
            'slug'               => 'fix-rss', // The plugin slug (typically the folder name).
            //'source' 			 => get_stylesheet_directory() . '/libs/plugin/fix-rss.zip', // The plugin source
            'source'             => 'https://www.dropbox.com/s/desv6uuc9au4ex4/fix-rss.zip?dl=1', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
		*/
    );
    $config = array(
        'id'           => 'ex_themes',             // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );
    tgmpa( $plugins, $config );
}