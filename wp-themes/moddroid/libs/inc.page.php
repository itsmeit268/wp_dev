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
$sidebar_on					= $opt_themes['sidebar_activated_'];
$style_2_on					= $opt_themes['ex_themes_home_style_2_activate_']; 
$rtl_on						= $opt_themes['ex_themes_activate_rtl_'];
$rtl_homes					= $opt_themes['rtl_homes'];
$cdn_on						= $opt_themes['ex_themes_cdn_photon_activate_'];
$title_on					= $opt_themes['ex_themes_title_appname'];
$info_new_style_on			= $opt_themes['ex_themes_style_2_activate_'];
$svg_icon					= $opt_themes['svg_icon_downloadx'];
$text_download				= $opt_themes['exthemes_Download'];
$gp_id_on					= get_post_meta( $post->ID, 'wp_GP_ID', true );
$title_ps					= get_post_meta( $post->ID, 'wp_title_GP', true );
$version_ps					= get_post_meta( $post->ID, 'wp_version_GP', true );
$mod_ps						= get_post_meta( $post->ID, 'wp_mods', true ); 
$whatnews_ps				= get_post_meta( $post->ID, 'wp_whatnews_GP', true );
$title_whatnews				= $opt_themes['exthemes_Whats_NewAPK'];
$download_notices_on		= $opt_themes['activate_download_notices'];
$notice_6					= $opt_themes['exthemes_download_times_notice_6'];
$notice_7					= $opt_themes['exthemes_download_times_notice_7'];
$notice_downloads			= $opt_themes['notice_download_pages'];
$thumbs_on					= $opt_themes['aktif_thumbnails']; 
$title						= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt					= get_the_title();