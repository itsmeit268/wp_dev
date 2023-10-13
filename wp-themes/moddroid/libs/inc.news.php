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
global $wpdb, $post, $opt_themes;
$post_id						= get_the_ID();
$user_info						= get_userdata(1);
$username						= $user_info->user_login;
$first_name						= $user_info->first_name;
$last_name						= $user_info->last_name;
$display_name					= $user_info->display_name;
 
$image_id						= get_post_thumbnail_id(); 
$full							= 'thumbnails-news-bg';
$icons							= '64';
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_default				= $image_url[0];
$thumbnail_images				= $image_url;
$post_id						= get_the_ID();
$url							= wp_get_attachment_url( get_post_thumbnail_id($post->ID), $icons );
$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];
$thumb_id						= get_post_thumbnail_id( $id );
if ( '' != $thumb_id ) {
$thumb_url						= wp_get_attachment_image_src( $thumb_id, $icons, true );
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
$version						= get_post_meta( $post->ID, 'wp_version', true );
$versionX1						= get_post_meta( $post->ID, 'wp_version_GP', true );
$version						= str_replace('Varies with device', ' ', $version);
$versionX1						= str_replace('Varies with device', ' n/a', $versionX1);
$versionX						= '-';
if ( $version === FALSE or $version == '' ) $version = $versionX1;
$sizes							= get_post_meta( $post->ID, 'wp_sizes', true );
$sizesX1						= get_post_meta( $post->ID, 'wp_sizes', true );
$sizesX							= '-';
if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX;
$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];