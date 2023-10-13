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
$background_on					= $opt_themes['ex_themes_backgrounds_activate_'];
$ukuran							= '=w1400-rw';
$random							= mt_rand(0, 2); 
$full							= 'thumbnails-post-bg'; 
$thumbnails_bg 					= wp_get_attachment_image_src(get_post_meta( $post->ID, 'background_images', true),$full);
$thumbnails_bg_alt				= get_post_meta( $post->ID, 'wp_backgrounds_GP', true ); 
$thumbnails_bg_alts				= get_post_meta( $post->ID, 'wp_images_GP', true );	
$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt						= get_the_title();
$appname_on						= $opt_themes['ex_themes_title_appname'];  
if($background_on) { ?>				 
<div class="zmImg pb-3"><img class="rounded-lg shadow-sm mx-auto d-block" src="<?php if ($thumbnails_bg) { echo $thumbnails_bg[0]; } elseif ($thumbnails_bg_alt) { echo $thumbnails_bg_alt; } elseif ($thumbnails_bg_alts) { echo $thumbnails_bg_alts[$random]; } elseif ($image_url) { echo $image_url[0]; } else { echo $defaults_no_images;} ?>" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" width="1024" height="500" <?php if($thumbnails_bg_alt || $thumbnails_bg_alts ) { ?>style="max-width: 100%;max-height: 320px;"<?php } ?>></div>
<?php } else {} 