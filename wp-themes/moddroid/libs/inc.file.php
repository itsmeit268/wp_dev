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
global $wpdb, $post, $wp_query, $opt_themes;
function mask_link( $string, $action = 'e' ){
$secret_key						= THEMES_NAMES;
$secret_iv						= EXTHEMES_AUTHOR;
$output							= false;
$encrypt_method					= "AES-256-CBC";
$key							= hash( 'sha256', $secret_key );
$iv								= substr( hash( 'sha256', $secret_iv ), 0, 16 );
if( $action == 'e' ){
	$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
} else if( $action == 'd' ){
	$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
}
return $output;
}
$file_path						= $_GET['urls'];
$file_name						= $_GET['names'];
$host							= ''.$_SERVER['HTTP_HOST'].'';
$permalink						= get_the_permalink();
$urls							= $_GET['urls'];  
$urlsx							= str_replace($permalink.'/file/?urls=', '', $urls);
$namesapks						= $_GET['names'];
$sizeapks						= $_GET['sizes'];
$names							= $_GET['names'];

$size							= $_GET['size'];
$url							= $_GET['url'];

$file_path1						= mask_link($file_path); 
$file_path2						= mask_link($file_path, 'd');
$version						= get_post_meta( $post->ID, 'wp_version', true );
$versionX1						= get_post_meta( $post->ID, 'wp_version_GP', true );
$versionX						= '-';
if ( $version === FALSE or $version == '' ) $version = $versionX1;
$wp_mods						= get_post_meta( $post->ID, 'wp_mods1', true );
$wp_mods1						= get_post_meta( $post->ID, 'wp_mods', true );
if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_mods1;
$timers_counts					= $opt_themes['download_waits_timers_'];
$size3							= get_post_meta(get_the_ID(), 'wp_sizedownloadlink2', true);
$tipe3							= get_post_meta(get_the_ID(), 'wp_typedownloadlink2', true);
$tipedownload3					= get_post_meta(get_the_ID(), 'wp_typedownloadlink2', true);
$style_2_on						= $opt_themes['ex_themes_home_style_2_activate_'];