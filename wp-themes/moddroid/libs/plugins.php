<?php
add_action( 'tgmpa_register', 'butuh_plugins' );
function butuh_plugins() {
	$plugins = array(	
	array(
	'name'						=> 'Redux Framework',
	'slug'						=> 'redux-framework',
	'required'					=> true,
	),
	array(
	'name'						=> 'One Click Demo Import ',
	'slug'						=> 'one-click-demo-import',
	'required'					=> true,
	), 
	array(
	'name'						=> 'Classic Editor',
	'slug'						=> 'classic-editor',
	'required'					=> false,
	),
	array(
	'name'						=> 'Classic Widgets',
	'slug'						=> 'classic-widgets',
	'required'					=> false,
	), 
	array(
	'name'						=> 'Term Management Tools',
	'slug'						=> 'term-management-tools',
	'required'					=> false,
	), 
	array(
	'name'						=> 'Rate My Posts', // The plugin name.
	'slug'						=> 'rate-my-post',
	'required'					=> true,
	),
	array(
	'name'						=> 'React & Share',
	'slug'						=> 'react-and-share',
	'required'					=> false,
	),  
	array(
	'name'						=> 'Comments Like Dislike',
	'slug'						=> 'comments-like-dislike',
	'required'					=> false,
	),
	/* 
	array(
	'name'						=> 'Fix My Feed RSS', // The plugin name.
	'slug'						=> 'fix-rss', // The plugin slug (typically the folder name).
	'source'					=> 'https://www.dropbox.com/s/desv6uuc9au4ex4/fix-rss.zip?dl=1',
	'required'					=> false, // If false, the plugin is only 'recommended' instead of required.
	), 
	*/
	 
	 

	);

	$config = array(
	'id'           => 'ex_themes',
	'default_path' => '',
	'menu'         => 'tgmpa-install-plugins',
	'has_notices'  => true,
	'dismissable'  => true,
	'dismiss_msg'  => '',
	'is_automatic' => true, 
	'message'      => '',   
	);

	tgmpa( $plugins, $config );
}