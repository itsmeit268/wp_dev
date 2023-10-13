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
/*get_post_thumbnail_id($post->ID); 
/*-----------------------------------------------------------------------------------*/ 
global $wpdb, $post, $opt_themes;
$image_id						= get_post_thumbnail_id($post->ID);  
$full							= 'thumbnails-post'; 
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_default				= $image_url[0];
$thumbnail_images				= $image_url;
$post_id						= get_the_ID();
$url							= wp_get_attachment_url( get_post_thumbnail_id($post->ID), '64' );
$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];
$thumb_id						= get_post_thumbnail_id( $id );
if ( '' != $thumb_id ) {
$thumb_url						= wp_get_attachment_image_src( $thumb_id, '64', true );
$image							= $thumb_url[0];
	} else {
$image							= $defaults_no_images;
	}
$urlimages2						= $image;

$thumbnails_gp					= get_post_meta( $post->ID, 'wp_poster_GP', true );
$thumbnails						= str_replace( 'http://', '', $thumbnails_gp );
$thumbnails						= str_replace( 'https://', '', $thumbnails_gp );
$randoms						= mt_rand(0, 3);
$cdn_thumbnails					= '//i'.$randoms.'.wp.com/'.$thumbnails.'';
$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true );
$version						= get_post_meta( $post->ID, 'wp_version_GP', true );
$versionX1						= get_post_meta( $post->ID, 'wp_version_GP', true );
$versionX						= '-';
if ( $version === FALSE or $version == '' ) $version = $versionX;
$wp_mods						= get_post_meta( $post->ID, 'wp_mods1', true );
$wp_mods1						= get_post_meta( $post->ID, 'wp_mods', true );
if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_mods1;

$updates						= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX1						= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX						= '-';
if ( $updates === FALSE or $updates == '' ) $updates = $updatesX;	
$desck_GPs						= get_post_meta( $post->ID, 'wp_desck_GP', true ); 
if ( $desck_GPs === FALSE or $desck_GPs == '' ) $desck_GPs = $post->post_content;	
$des_post						= trim(strip_tags( $desck_GPs ));
$des_post						= trim(strip_tags( $desck_GPs ));
$des_post						= preg_replace('~[\r\n]+~', '', $des_post);
$des_post						= str_replace('"', '', $des_post);
$des_post						= mb_substr( $des_post, 0, 200, 'utf8' );

$author_id						= $post->post_author;
$author_link					= get_author_posts_url( $author_id );
$author_avatar					= get_avatar_url( $author_id ); 
$author							= get_the_author( $author_id );
$authorx						= get_the_author_meta('display_name', $author_id);
$display_name					= $authorx;
/* 
$passthis_id					= $curauth->ID;
$user_info						= get_userdata(1);
$username						= $user_info->user_login;
$first_name						= $user_info->first_name;
$last_name						= $user_info->last_name;
$display_name					= $user_info->display_name;
 */
$sidebar_on						= $opt_themes['sidebar_activated_'];
$style_2_on						= $opt_themes['ex_themes_home_style_2_activate_'];
$background_on					= $opt_themes['ex_themes_backgrounds_activate_'];
$thumbnails_gp_small_slider		= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
$thumbnails						= str_replace( 'http://', '', $thumbnails_gp_small_slider );
$thumbnails						= str_replace( 'https://', '', $thumbnails_gp_small_slider );
$randoms						= mt_rand(0, 3);
$cdn_thumbnails_gp_small_slider = '//i'.$randoms.'.wp.com/'.$thumbnails.'=s30';
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
$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt						= get_the_title();
$comment_on						= $opt_themes['ex_themes_comments_activate_'];  
$background_on					= $opt_themes['ex_themes_backgrounds_activate_'];
$ukuran							= '=w1400';
$random							= mt_rand(0, 2); 
$full							= 'full'; 
$thumbnails_bg 					= wp_get_attachment_image_src(get_post_meta( $post->ID, 'background_images', true),$full);
$thumbnails_bg_alt				= get_post_meta( $post->ID, 'wp_backgrounds_GP', true ); 
$thumbnails_bg_alts				= get_post_meta( $post->ID, 'wp_images_GP', true );	