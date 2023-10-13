<?php
global $wpdb, $post, $opt_themes;
$image_id						= get_post_thumbnail_id(); 
$full							= 'thumbnails-alt-120';
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
$no_lazy						= $opt_themes['ex_themes_no_loading_lazy'];  
?>
<div class="<?php if($style_2_on) { ?>col-12 pt-1 pb-1 <?php } else { ?>mb-4<?php } ?>">
	<a class="<?php if($style_2_on) { ?>text-body border rounded  overflow-hidden d-block h-100 position-relative archive-post<?php } else { ?>d-flex position-relative archive-post<?php } ?>" href="<?php the_permalink()?>" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
	<?php if($style_2_on) { ?><div class="d-flex" style="padding: 0.5rem;"><?php } else { ?> <?php } ?>
		<?php if($style_2_on) { ?><div class="flex-shrink-0 mr-2" style="width: 3.75rem;"><?php } else { ?> <div class="flex-shrink-0 mr-2"><?php } ?><img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" class="rounded-lg wp-post-image" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>"<?php if ($no_lazy) { ?><?php } else { ?> loading="lazy" <?php } ?><?php if($style_2_on) { ?>sizes="(max-width: 120px) 100vw, 120px" width="120" height="120"<?php } else { ?> style="max-width: 4rem;" width="120" height="120"<?php } ?>/></div>
		<div style="min-width: 0;">
		<h3 class="h5 font-size-body font-weight-normal text-body text-truncate w-100 mb-1"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h3>
		<div class="small text-truncate text-muted d-flex align-items-center"><?php if ($version) { ?><?php if($svg_mods_on) { ?><?php echo $svg_mods_on; ?><?php } ?><?php if($rtl_on){ ?><?php echo RTL_Nums($version); ?><?php } else { ?><?php echo $version; ?><?php } ?><?php } else { ?><?php } ?><span class="mx-1">·</span><span class="text-truncate"><?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?></span></div>
		<div class="small text-muted d-flex align-items-center"><?php if($ratings_on) { ?><?php if ($rated_gps) { ?><kbd></kbd>&nbsp;&nbsp;<span><?php if($rtl_on){ ?><?php echo RTL_Nums($rate_GP); ?><?php } else { ?><?php echo $rate_GP; ?><?php } ?></span><span class="mx-1">·</span><?php } else { ?><kbd></kbd>&nbsp;&nbsp;<span>n/a</span><span class="mx-1">·</span><?php }} ?><?php if ($mod_gps) { ?><span class="text-truncate"><?php if($text_mods) { ?><?php echo $text_mods; ?><?php } ?>&nbsp;<?php echo trim(strip_tags($wp_mods)) ?></span><?php } else { ?><span class="text-truncate">&nbsp;<?php _e('Original APK', THEMES_NAMES); ?></span><?php } ?></div>
		</div>
		<?php if($style_2_on) { ?></div><?php } else { ?><?php } ?>
	</a>
</div>