<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEMES DEVS
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
if ( ! defined( 'ABSPATH' ) ) exit; 
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function no_more_jquery() {
global $opt_themes;
$activate = $opt_themes['mdr_no_jquery'];
if (($activate == '1')) {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
}
add_action('init', 'no_more_jquery');
 
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function cores_scripts() {   	
	$js_dir					= EX_THEMES_URI.'/assets/js';
	//wp_enqueue_script( THEMES_NAMES_ALT.'-jquery-3.6.0-js', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', true ); 
	/* 
	if ( is_single() || is_singular('news') ) {
	wp_enqueue_script( strtolower(THEMES_NAMES).'-'.VERSION.'-itocs', $js_dir.'/itocs.js', array('jquery'), '', false); 
	}
	*/
	//wp_enqueue_script( strtolower(THEMES_NAMES).'-'.VERSION.'-defer', $js_dir.'/defer.js', '', false); 
	//if ( is_singular( array( 'post', 'page' ) ) && !is_front_page() ) {
	//wp_enqueue_script( strtolower(THEMES_NAMES).'-'.VERSION.'-itocs', $js_dir.'/itoc.js', '', false); 
	//}
	wp_enqueue_script( strtolower(THEMES_NAMES).'-'.VERSION.'-header-bundle-reborn-rating-slider', $js_dir.'/header-bundle.js', '', false);  
	 	
}
add_action( 'wp_enqueue_scripts', 'cores_scripts',  1 );

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function core_styles() {  
	global $opt_themes;
	$style_2_on				= $opt_themes['ex_themes_home_style_2_activate_'];
	$rtl_on					= $opt_themes['ex_themes_activate_rtl_'];
	$css_dir				= EX_THEMES_URI.'/assets/css';
	$css_dir_baru			= EX_THEMES_URI.'/assets/css/baru';
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-root', get_template_part( '/assets/css/root' ));
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-bootstrap', $css_dir.'/bootstrap.min.css' );
	if($style_2_on) {
    wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-styles', $css_dir.'/styles.2.css' );
    wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-custom', $css_dir.'/custom.2.css' );
	} else {
    wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-styles', $css_dir.'/styles.css' );
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-custom', $css_dir.'/custom.css' );
	} 
	if($rtl_on) {
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-rtl', $css_dir.'/rtl.css' );	
	}
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-slider', $css_dir.'/slider.css' );
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-swiper', $css_dir.'/swiper.css' );
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-mobile', $css_dir.'/mobile.css' );
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-customs', get_template_part( '/assets/css/custom' ));
	if($opt_themes['ex_themes_home_style_2_activate_'] || $opt_themes['mdr_style_3']){
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-reborn', $css_dir.'/reborn.css' );
	}
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-rmp', $css_dir.'/rate-my-post.css' );
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-font-awesome-6-2-1', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' );
	if ( is_single() ) {
	wp_enqueue_style( strtolower(THEMES_NAMES).'-'.VERSION.'-swiper-bundle', '//cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css' );	
	}
	 
	
}
add_action( 'wp_head', 'core_styles', 1);

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function mdr_head_script() {
if ( is_single() ) { ?>
<script src="//cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<?php }
}