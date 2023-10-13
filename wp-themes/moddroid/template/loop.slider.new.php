<?php
global $wpdb, $post, $opt_themes;
$image_id						= get_post_thumbnail_id(); 
$ukurannya						= 'thumbnails-slider-bg'; 
$image_url						= wp_get_attachment_image_src($image_id, $ukurannya, true); 
$image_url_default				= $image_url[0];
$random							= mt_rand(0, 3);
//$thumbnails_bg1					= get_post_meta( $post->ID, 'wp_images_GP', true )[$random];
$random							= mt_rand(1, 3); 
$thumbnails_bg 					= wp_get_attachment_image_src(get_post_meta( $post->ID, 'background_images', true),$ukurannya);
$thumbnails_bg_alt				= get_post_meta( $post->ID, 'wp_backgrounds_GP', true ); 
$thumbnails_bg_alts				= get_post_meta( $post->ID, 'wp_images_GP', true );  
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
 
/* $thumbnails_slider = str_replace( 'http://', '', $thumbnails_bgs );
$thumbnails_slider = str_replace( 'https://', '', $thumbnails_bgs ); */
$randoms						= mt_rand(0, 3);
// $cdn_thumbnails_slider = '//i'.$randoms.'.wp.com/'.$thumbnails_slider.'=w720-h300-p';
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


global $wpdb, $post, $opt_themes;
$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url']; 
$slider_image_id				= get_post_thumbnail_id($post->ID); 
if($opt_themes['ex_themes_home_style_2_activate_']) {
$full							= 'thumbnails-slider'; 
} else {
$full							= 'thumbnails-slider'; 
}
$slider_url						= wp_get_attachment_image_src($slider_image_id, $full, true); 
$image_url_slider				= $slider_url[0];

?> 
  <div class="editor-item-baru ">
      <a class="position-relative archive-post--remove app-container-baru" href="<?php the_permalink() ?>" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
        <div class="flex-shrink-0">
          <img class="app-logo-baru" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" style="max-width: 64px;" src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url_slider; } } } else { if (has_post_thumbnail()) { echo $image_url_slider; } else { echo $defaults_no_images; } } ?>" width="64" height="64">          
        </div>        
        <div class="app-info-baru">
          <h3 class="h5 font-weight-semibold w-100 app-title-baru "> <?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?> </h3>
          <div class="text-truncate text-muted app-desc-baru">
            <?php if ($mod_gps) {  ?><span class="clamp-1 w-100"> <?php echo trim(strip_tags(limit_words($mod_gps, '3'))) ?> </span><?php } else { ?><span class="clamp-1 w-100"><?php echo limit_words($mod_gps_alt, '3'); ?> </span><?php } ?>
          </div>
        </div>
        <div class="app-get-baru">
          <span class="get-button-baru"><?php echo $opt_themes['mdr_text_get']; ?></span>
          <span class="app-version-baru meta-color text-truncate">
            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"></path></svg> <?php if($rtl_on){ ?><?php echo RTL_Nums($version); ?><?php } else { ?><?php echo $version; ?><?php } ?> </span>
        </div>
      </a>
      <div class="app-preview-baru">
        <a href="<?php the_permalink() ?>" class="app-preview-baru-link" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
          <img class="preview-img-1" src="<?php if ($thumbnails_bg) { echo $thumbnails_bg[0]; } elseif ($thumbnails_bg_alt) { echo $thumbnails_bg_alt; } elseif ($thumbnails_bg_alts) { echo $thumbnails_bg_alts[$random]; } elseif ($image_url) { echo $image_url[0]; } else { echo $defaults_no_images;} ?>" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" width="350" height="194">
        </a>
        <p><?php echo trim(strip_tags(limit_words(get_the_content(), '15'))); ?></p>
      </div>
    </div>