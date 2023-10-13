<?php
global $wpdb, $post, $opt_themes;
$image_id						= get_post_thumbnail_id(); 
$full							= 'full';
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
$wp_mods						= get_post_meta( $post->ID, 'wp_mods', true );
$wp_modsX1						= get_post_meta( $post->ID, 'wp_mods', true );
$wp_modsX						= '-';
if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_modsX1;

$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt						= get_the_title();
 
$sidebar_on						= $opt_themes['sidebar_activated_'];
$style_2_on						= $opt_themes['ex_themes_home_style_2_activate_'];
$background_on					= $opt_themes['ex_themes_backgrounds_activate_'];
$thumbnails_gp_small_slider		= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
$thumbnails						= str_replace( 'http://', '', $thumbnails_gp_small_slider );
$thumbnails						= str_replace( 'https://', '', $thumbnails_gp_small_slider );
$randoms						= mt_rand(0, 3);
$cdn_thumbnails_gp_small_slider = '//i'.$randoms.'.wp.com/'.$thumbnails.'=s30';
$rate_GP						= get_post_meta( $post->ID, 'wp_rated_GP', true );
$ratings_GP						= get_post_meta( $post->ID, 'wp_ratings_GP', true );
$rate_GP1						= get_post_meta( $post->ID, 'wp_rated_GP', true );
if ( $rate_GP === FALSE or $rate_GP == '' ) $rate_GP = $rate_GP1;
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
$no_category					= '';
$no_lazy						= $opt_themes['ex_themes_no_loading_lazy'];  

			$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url']; 
			$image_id						= get_post_thumbnail_id($post->ID); 
			if($opt_themes['ex_themes_home_style_2_activate_']) {
			$full							= 'thumbnails-news-arc-new'; 
			} else {
			$full							= 'thumbnails-news-arc'; 
			}
			$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
			$image_url_news_arc				= $image_url[0];
?>
<div class="col-12 col-sm-6 col-lg-4 mb-4 ">
	<a class="embed-responsive embed-responsive-16by9 bg-cover d-block" style="background-image: url(<?php if (has_post_thumbnail()) { echo $image_url_news_arc; } else { echo $defaults_no_images; } ?>); box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.15);" href="<?php the_permalink() ?>">
	<div class="d-flex align-items-end p-3 position-absolute" style="background-color: rgba(0, 0, 0, 0.5); top: 0; bottom: 0; left: 0; right: 0;">
	<h3 class="text-white mb-0" style="font-size: 0.875rem;"><?php the_title(); ?></h3>
	</div>
	</a>
</div>