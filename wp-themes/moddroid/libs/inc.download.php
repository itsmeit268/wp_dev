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

$down_pages_on					= $opt_themes['activate_download_pages'];
$svg_download					= $opt_themes['svg_icon_downloadx'];
$rtl_on							= $opt_themes['ex_themes_activate_rtl_'];
$styles_2_on					= $opt_themes['ex_themes_home_style_2_activate_'];


$linkX						= get_bloginfo('url'); $parse = parse_url($linkX); $watermark1 = $parse['host'];

$url1						= get_post_meta( $post->ID, 'wp_downloadlink', true ) ;
$postid						= $wp_query->post->ID;
$dt_player					= get_post_meta($postid, 'repeatable_fields', true);
$updates					= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX1					= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX					= '-';
if( $updates === FALSE or $updates == '' ) $updates = $updatesX;
$sizes						= get_post_meta( $post->ID, 'wp_sizes', true ); 
$sizesX						= ' ';
if( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX; 
$i							= 0;
$downloadlink				= get_post_meta(get_the_ID(), 'repeatable_fields', true);
$download2					= get_post_meta(get_the_ID(), 'wp_downloadlink', true);
$download3					= get_post_meta(get_the_ID(), 'wp_downloadlink2', true);
$downloadapkxapkpremier		= get_post_meta(get_the_ID(), 'wp_downloadapkxapkpremier', true);
$namedownload2				= get_post_meta(get_the_ID(), 'wp_namedownloadlink', true);
$namedownload3				= get_post_meta(get_the_ID(), 'wp_namedownloadlink2', true);
$size3						= get_post_meta(get_the_ID(), 'wp_sizedownloadlink2', true);
$tipe3						= get_post_meta(get_the_ID(), 'wp_typedownloadlink2', true);
$tipedownload3				= get_post_meta(get_the_ID(), 'wp_typedownloadlink2', true);
$download3x1				= get_post_meta(get_the_ID(), 'wp_downloadlink2', true);
$playstorelinkurl			= get_post_meta(get_the_ID(), 'wp_GP_ID', true);
$playstorelink				= 'https://play.google.com/store/apps/details?id='.$playstorelinkurl;
$mask_linkGP				= mask_link($playstorelink);
$unmask_link				= mask_link($playstorelink, 'd');
$version					= get_post_meta( $post->ID, 'wp_version', true ); 
$versionX1					= get_post_meta( $post->ID, 'wp_version_GP', true );
if ( $version === FALSE or $version == '' ) $version = $versionX1;
$sizes						= get_post_meta( $post->ID, 'wp_sizes', true );
$sizesX1					= get_post_meta( $post->ID, 'wp_sizes', true );
$sizesX						= '-';
if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX;	
$link_playstore_on			= $opt_themes['activate_download_original_playstore'];
$downloadlink_gma				= get_post_meta( $post->ID, 'downloadlink_gma', true );
$downloadlink_gma_1				= get_post_meta( $post->ID, 'downloadlink_gma_1', true );
$downloadlink_gma_2				= get_post_meta( $post->ID, 'downloadlink_gma_2', true );
$downloadlink_gma_3				= get_post_meta( $post->ID, 'downloadlink_gma_3', true );
$downloadlink_gma_4				= get_post_meta( $post->ID, 'downloadlink_gma_4', true );
$downloadlink_gma_5				= get_post_meta( $post->ID, 'downloadlink_gma_5', true );
	
$namedownloadlink_gma			= get_post_meta( $post->ID, 'name_downloadlinks_gma', true );
$namedownloadlink_gma_1 		= get_post_meta( $post->ID, 'name_downloadlinks_gma_1', true );
$namedownloadlink_gma_2			= get_post_meta( $post->ID, 'name_downloadlinks_gma_2', true );
$namedownloadlink_gma_3 		= get_post_meta( $post->ID, 'name_downloadlinks_gma_3', true );
$namedownloadlink_gma_4			= get_post_meta( $post->ID, 'name_downloadlinks_gma_4', true );
$namedownloadlink_gma_5			= get_post_meta( $post->ID, 'name_downloadlinks_gma_5', true );
	
$sizedownloadlink_gma			= get_post_meta( $post->ID, 'size_downloadlinks_gma', true );
$sizedownloadlink_gma_1			= get_post_meta( $post->ID, 'size_downloadlinks_gma_1', true );
$sizedownloadlink_gma_2			= get_post_meta( $post->ID, 'size_downloadlinks_gma_2', true );
$sizedownloadlink_gma_3			= get_post_meta( $post->ID, 'size_downloadlinks_gma_3', true );
$sizedownloadlink_gma_4			= get_post_meta( $post->ID, 'size_downloadlinks_gma_4', true );
$sizedownloadlink_gma_5			= get_post_meta( $post->ID, 'size_downloadlinks_gma_5', true ); 


$image_id						= get_post_thumbnail_id(); 
$full							= 'full';
$icons							= '64';
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_default				= $image_url[0];
$thumbnail_images				= $image_url;
$post_id						= get_the_ID();
$url							= wp_get_attachment_url( get_post_thumbnail_id($post->ID), '64' );
$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];
$thumb_id						= get_post_thumbnail_id( $post->ID );
if ( '' != $thumb_id ) {
$thumb_url						= wp_get_attachment_image_src( $thumb_id, '64', true );
$image							= $thumb_url[0];
	} else {
$image							= $defaults_no_images;
	}
$urlimages2						= $image;
/* $img = file_get_contents(''.$urlimages2.'');
$images = base64_encode($img); */
$thumbnails_gp					= get_post_meta( $post->ID, 'wp_poster_GP', true );
$thumbnails						= str_replace( 'http://', '', $thumbnails_gp );
$thumbnails						= str_replace( 'https://', '', $thumbnails_gp );
$randoms						= mt_rand(0, 3);
$cdn_thumbnails					= '//i'.$randoms.'.wp.com/'.$thumbnails.'=w180-h180-p';
$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true );
 
$linkX							= get_bloginfo('url'); $parse = parse_url($linkX); $watermark1 = $parse['host'];
$url1							= get_post_meta( $post->ID, 'wp_downloadlink', true ) ;
$postid							= $wp_query->post->ID;
$dt_player						= get_post_meta($postid, 'repeatable_fields', true);
$updates						= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX1						= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX						= '-';
if( $updates === FALSE or $updates == '' ) $updates = $updatesX;
$sizes							= get_post_meta( $post->ID, 'wp_sizes', true ); 
$sizesX							= ' ';
if( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX; 
$i								= 0;
$downloadlink					= get_post_meta(get_the_ID(), 'repeatable_fields', true);
$download3						= get_post_meta(get_the_ID(), 'wp_downloadlink2', true);
$download2						= get_post_meta(get_the_ID(), 'wp_downloadlink', true);
$downloadapkxapkpremier			= get_post_meta(get_the_ID(), 'wp_downloadapkxapkpremier', true);
$downloadapkxapkg 				= get_post_meta( $post->ID, 'wp_downloadapkxapkg', true );
if ( $downloadapkxapkpremier === FALSE or $downloadapkxapkpremier == '' ) $downloadapkxapkpremier = $downloadapkxapkg;
$namedownload2					= get_post_meta(get_the_ID(), 'wp_namedownloadlink', true);
$namedownload3					= get_post_meta(get_the_ID(), 'wp_namedownloadlink2', true);
$size3							= get_post_meta(get_the_ID(), 'wp_sizedownloadlink2', true);
$tipe3							= get_post_meta(get_the_ID(), 'wp_tipedownloadlink2', true);
$download3x1					= get_post_meta(get_the_ID(), 'wp_downloadlink2', true);
$playstorelinkurl				= get_post_meta(get_the_ID(), 'wp_GP_ID', true);
$playstorelink					= 'https://play.google.com/store/apps/details?id='.$playstorelinkurl;
$mask_linkGP					= mask_link($playstorelink);
$unmask_link					= mask_link($playstorelink, 'd');
$version						= get_post_meta( $post->ID, 'wp_version_GP', true );
$versionX						= '...';
if ( $version === FALSE or $version == '' ) $version = $versionX;
$timers_counts					= $opt_themes['download_waits_timers_'];
$user_info						= get_userdata(1);
$username						= $user_info->user_login;
$first_name						= $user_info->first_name;
$last_name						= $user_info->last_name;
$display_name					= $user_info->display_name;
$sidebar_on						= $opt_themes['sidebar_activated_'];
$style_2_on						= $opt_themes['ex_themes_home_style_2_activate_'];
$background_on					= $opt_themes['ex_themes_backgrounds_activate_'];
$thumbnails_gp_small_slider		= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
$thumbnails						= str_replace( 'http://', '', $thumbnails_gp_small_slider );
$thumbnails						= str_replace( 'https://', '', $thumbnails_gp_small_slider );
$randoms						= mt_rand(0, 3);
$thumbnails_on					= $opt_themes['aktif_thumbnails'];
$rtl_on							= $opt_themes['ex_themes_activate_rtl_'];
$rtl_homes						= $opt_themes['rtl_homes'];
$cdn_on							= $opt_themes['ex_themes_cdn_photon_activate_'];
$title_on						= $opt_themes['ex_themes_title_appname'];
$info_new_style_on				= $opt_themes['ex_themes_style_2_activate_'];
$svg_icon						= $opt_themes['svg_icon_downloadx'];
$text_download					= $opt_themes['exthemes_Download'];
$gp_id_on						= get_post_meta( $post->ID, 'wp_GP_ID', true );
$title_ps						= get_post_meta( $post->ID, 'wp_title_GP', true );
$version_ps						= get_post_meta( $post->ID, 'wp_version_GP', true );
$mod_ps							= get_post_meta( $post->ID, 'wp_mods', true ); 
$whatnews_ps					= get_post_meta( $post->ID, 'wp_whatnews_GP', true );
$title_whatnews					= $opt_themes['exthemes_Whats_NewAPK'];
$download_notices_on			= $opt_themes['activate_download_notices'];
$notice_6						= $opt_themes['exthemes_download_times_notice_6'];
$notice_7						= $opt_themes['exthemes_download_times_notice_7'];
$notice_downloads				= $opt_themes['notice_download_pages'];
$random							= mt_rand(1, 3); 
$full							= 'thumbnails-post-bg'; 
$thumbnails_bg 					= wp_get_attachment_image_src(get_post_meta( $post->ID, 'background_images', true),$full);
$thumbnails_bg_alt				= get_post_meta( $post->ID, 'wp_backgrounds_GP', true ); 
$thumbnails_bg_alts				= get_post_meta( $post->ID, 'wp_images_GP', true )[$random];	
$thumbnails_gp_small_slider		= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
$thumbnails						= str_replace( 'http://', '', $thumbnails_gp_small_slider );
$thumbnails						= str_replace( 'https://', '', $thumbnails_gp_small_slider );
$randoms						= mt_rand(0, 3);
$cdn_thumbnails_gp_small_slider = '//i'.$randoms.'.wp.com/'.$thumbnails.'=s30';
$link_playstore_on				= $opt_themes['activate_download_original_playstore'];
$thumbs_on						= $opt_themes['aktif_thumbnails']; 
$cdn_on							= $opt_themes['ex_themes_cdn_photon_activate_']; 
$rtl_on							= $opt_themes['ex_themes_activate_rtl_']; 
$ratings_on						= $opt_themes['ex_themes_activate_ratings_']; 
$text_mods						= $opt_themes['exthemes_MODAPK']; 
$rated_gps						= get_post_meta( $post->ID, 'wp_rated_GP', true );
$mod_gps						= get_post_meta( $post->ID, 'wp_mods', true );
$mod_gps_alt					= 'Original APK';
$svg_mods_on					= $opt_themes['svg_icon_modx'];  
$appname_on						= $opt_themes['ex_themes_title_appname']; 
$downloadlink_gma				= get_post_meta( $post->ID, 'downloadlink_gma', true );
$downloadlink_gma_1				= get_post_meta( $post->ID, 'downloadlink_gma_1', true );
$downloadlink_gma_2				= get_post_meta( $post->ID, 'downloadlink_gma_2', true );
$downloadlink_gma_3				= get_post_meta( $post->ID, 'downloadlink_gma_3', true );
$downloadlink_gma_4				= get_post_meta( $post->ID, 'downloadlink_gma_4', true );
$downloadlink_gma_5				= get_post_meta( $post->ID, 'downloadlink_gma_5', true );
	
$namedownloadlink_gma			= get_post_meta( $post->ID, 'name_downloadlinks_gma', true );
$namedownloadlink_gma_1 		= get_post_meta( $post->ID, 'name_downloadlinks_gma_1', true );
$namedownloadlink_gma_2			= get_post_meta( $post->ID, 'name_downloadlinks_gma_2', true );
$namedownloadlink_gma_3 		= get_post_meta( $post->ID, 'name_downloadlinks_gma_3', true );
$namedownloadlink_gma_4			= get_post_meta( $post->ID, 'name_downloadlinks_gma_4', true );
$namedownloadlink_gma_5			= get_post_meta( $post->ID, 'name_downloadlinks_gma_5', true );
	
$sizedownloadlink_gma			= get_post_meta( $post->ID, 'size_downloadlinks_gma', true );
$sizedownloadlink_gma_1			= get_post_meta( $post->ID, 'size_downloadlinks_gma_1', true );
$sizedownloadlink_gma_2			= get_post_meta( $post->ID, 'size_downloadlinks_gma_2', true );
$sizedownloadlink_gma_3			= get_post_meta( $post->ID, 'size_downloadlinks_gma_3', true );
$sizedownloadlink_gma_4			= get_post_meta( $post->ID, 'size_downloadlinks_gma_4', true );
$sizedownloadlink_gma_5			= get_post_meta( $post->ID, 'size_downloadlinks_gma_5', true ); 