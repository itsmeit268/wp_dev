<?php
global $wpdb, $post, $opt_themes;
$image_id						= get_post_thumbnail_id($post->ID); 
$full							= 'thumbnails-alt-120';
$icons							= '60';
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_default				= $image_url[0];
$thumbnail_images				= $image_url;
$post_id						= get_the_ID();
//wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnails' )
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

$sizes						=	get_post_meta( $post->ID, 'wp_sizes', true ); 
$sizes_alt					=	get_post_meta( $post->ID, 'wp_sizes_GP', true );
if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizes_alt;
?>

<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--moddroid-->
<div class="hentry col-12 col-md-6 mb-4 post-id-<?php echo get_the_ID();?> post-view-count-<?= ex_themes_get_post_view_alts(); ?>">
	<a class="d-flex position-relative archive-post" href="<?php the_permalink() ?>" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
	<div class="flex-shrink-0 mr-2">
		<img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" class="rounded-lg wp-post-image" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" style="max-width: 4rem;" width="120" height="120"/>
	</div>
	<div style="min-width: 0;">
		<h3 class="h5 font-size-body font-weight-normal text-body text-truncate w-100 mb-1"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h3>
		<div class="small text-truncate text-muted d-flex align-items-center">
		<?php if ($version) { ?><?php if($svg_mods_on) { ?><?php echo $svg_mods_on; ?><?php } ?><?php if($rtl_on){ ?><?php echo RTL_Nums($version); ?><?php } else { ?><?php echo $version; ?><?php } ?><?php } else { ?><?php } ?>
		<span class="mx-1">·</span>
		<span class="text-truncate"><?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?></span>
		</div>
		<div class="small text-muted d-flex align-items-center">
		<?php if ($mod_gps) { ?><span class="text-truncate"><?php if($text_mods) { ?><?php echo $text_mods; ?><?php } ?>&nbsp;<?php echo trim(strip_tags($wp_mods)) ?></span><?php } else { ?><span class="text-truncate">&nbsp;<?php _e('Original APK', THEMES_NAMES); ?></span><?php } ?>
		</div>
	</div>
	</a>
</div>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
<!--modyolo & style 3-->
<div class="<?php if($style_2_on) { ?>col-12 col-md-6 col-xl-4 mb-3<?php } else { ?>hentry col-12 col-md-6 mb-4<?php } ?> post-id-<?php echo get_the_ID();?> post-view-count-<?= ex_themes_get_post_view_alts(); ?>">
	<a class="<?php if($style_2_on) { ?>text-body border rounded overflow-hidden d-block h-100 position-relative archive-post<?php } else { ?>d-flex position-relative archive-post<?php } ?>" href="<?php the_permalink() ?>" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
	<?php if($style_2_on) { ?><div class="d-flex" style="padding: 0.5rem;"><?php } else { ?> <?php } ?>
		<?php if($style_2_on) { ?><div class="flex-shrink-0 mr-2" style="width: 3.75rem;"><?php } else { ?> <div class="flex-shrink-0 mr-2"><?php } ?><img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" class="rounded-lg wp-post-image" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>"<?php if ($no_lazy) { ?><?php } else { ?> loading="lazy" <?php } ?><?php if($style_2_on) { ?>sizes="(max-width: 120px) 100vw, 120px" width="120" height="120"<?php } else { ?> style="max-width: 4rem;" width="120" height="120"<?php } ?> /></div>
		<div style="min-width: 0;">
			<?php if($style_2_on) { ?><h3 class="h6 font-weight-semibold text-truncate w-100" style="margin-bottom: 2px;"><?php } else { ?><h3 class="h5 font-size-body font-weight-normal text-body text-truncate w-100 mb-1"><?php } ?><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h3>
			<div class="small text-truncate text-muted d-flex align-items-center">
			<?php if ($version) { ?><?php if($svg_mods_on) { ?><?php echo $svg_mods_on; ?><?php } ?><?php if($rtl_on){ ?><?php echo RTL_Nums($version); ?><?php } else { ?><?php echo $version; ?><?php } ?><?php } else { ?><?php } ?><span class="mx-1">·</span>
			<span class="text-truncate"><?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?></span>
			</div>
			<div class="small text-muted d-flex align-items-center"><?php if($ratings_on) { ?><?php if ($rated_gps) { ?><kbd></kbd>&nbsp;&nbsp;<span><?php if($rtl_on){ ?><?php echo RTL_Nums($rate_GP); ?><?php } else { ?><?php echo $rate_GP; ?><?php } ?></span><span class="mx-1">·</span><?php } else { ?><kbd></kbd>&nbsp;&nbsp;<span>n/a</span><span class="mx-1">·</span><?php }} ?><?php if ($mod_gps) { ?><span class="text-truncate"><?php if($text_mods) { ?><?php echo $text_mods; ?><?php } ?>&nbsp;<?php echo trim(strip_tags($wp_mods)) ?></span><?php } else { ?><span class="text-truncate">&nbsp;<?php _e('Original APK', THEMES_NAMES); ?></span><?php } ?></div>
		</div>
		<?php if($style_2_on) { ?></div><?php } else { ?><?php } ?>
	</a>
</div>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--modyolo-->
<div class="col-12 col-md-6 col-xl-4 mb-3 post-id-<?php echo get_the_ID();?> post-view-count-<?= ex_themes_get_post_view_alts(); ?>">
	<a class="text-body border rounded overflow-hidden d-block h-100 position-relative archive-post" href="<?php the_permalink() ?>" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
		<div class="d-flex" style="padding: 0.5rem;">
			<div class="flex-shrink-0 mr-2" style="width: 3.75rem;">
				<img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" class="rounded-lg wp-post-image" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" <?php if ($no_lazy) { ?><?php } else { ?> loading="lazy" <?php } ?> width="120" height="120">
			</div>
			<div style="min-width: 0;">
				<h3 class="h6 font-weight-semibold text-truncate w-100" style="margin-bottom: 2px;"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h3>

				<div class="small text-truncate text-muted">
						<svg class="svg-6 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M567.938 243.908L462.25 85.374A48.003 48.003 0 0 0 422.311 64H153.689a48 48 0 0 0-39.938 21.374L8.062 243.908A47.994 47.994 0 0 0 0 270.533V400c0 26.51 21.49 48 48 48h480c26.51 0 48-21.49 48-48V270.533a47.994 47.994 0 0 0-8.062-26.625zM162.252 128h251.497l85.333 128H376l-32 64H232l-32-64H76.918l85.334-128z"></path></svg>
						<?php if($version){?>
						<span class="align-middle"><?php echo $version; ?></span>
						<?php } if($sizes){ ?>
						<span class="align-middle"> + </span>
						<span class="align-middle"><?php echo $sizes; ?></span>
						<?php } ?>
				</div>		
				<?php if($wp_mods){ ?>
				<div class="small text-truncate text-muted">
						<svg class="svg-6 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M501.1 395.7L384 278.6c-23.1-23.1-57.6-27.6-85.4-13.9L192 158.1V96L64 0 0 64l96 128h62.1l106.6 106.6c-13.6 27.8-9.2 62.3 13.9 85.4l117.1 117.1c14.6 14.6 38.2 14.6 52.7 0l52.7-52.7c14.5-14.6 14.5-38.2 0-52.7zM331.7 225c28.3 0 54.9 11 74.9 31l19.4 19.4c15.8-6.9 30.8-16.5 43.8-29.5 37.1-37.1 49.7-89.3 37.9-136.7-2.2-9-13.5-12.1-20.1-5.5l-74.4 74.4-67.9-11.3L334 98.9l74.4-74.4c6.6-6.6 3.4-17.9-5.7-20.2-47.4-11.7-99.6.9-136.6 37.9-28.5 28.5-41.9 66.1-41.2 103.6l82.1 82.1c8.1-1.9 16.5-2.9 24.7-2.9zm-103.9 82l-56.7-56.7L18.7 402.8c-25 25-25 65.5 0 90.5s65.5 25 90.5 0l123.6-123.6c-7.6-19.9-9.9-41.6-5-62.7zM64 472c-13.2 0-24-10.8-24-24 0-13.3 10.7-24 24-24s24 10.7 24 24c0 13.2-10.7 24-24 24z"></path></svg>
						<span class="align-middle"> <?php echo trim(strip_tags($wp_mods)) ?></span>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--style 3-->
<div class="<?php if($style_2_on) { ?>col-12 col-md-6 col-xl-4 mb-3<?php } else { ?>hentry col-12 col-md-6 mb-4<?php } ?> post-id-<?php echo get_the_ID();?> post-view-count-<?= ex_themes_get_post_view_alts(); ?>">
	<a class="<?php if($style_2_on) { ?>text-body border rounded overflow-hidden d-block h-100 position-relative archive-post<?php } else { ?>d-flex position-relative archive-post<?php } ?>" href="<?php the_permalink() ?>" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
	<?php if($style_2_on) { ?><div class="d-flex" style="padding: 0.5rem;"><?php } else { ?> <?php } ?>
		<?php if($style_2_on) { ?><div class="flex-shrink-0 mr-2" style="width: 3.75rem;"><?php } else { ?> <div class="flex-shrink-0 mr-2"><?php } ?><img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" class="rounded-lg wp-post-image" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>"<?php if ($no_lazy) { ?><?php } else { ?> loading="lazy" <?php } ?><?php if($style_2_on) { ?>sizes="(max-width: 120px) 100vw, 120px" width="120" height="120"<?php } else { ?> style="max-width: 4rem;" width="120" height="120"<?php } ?> /></div>
		<div style="min-width: 0;">
			<?php if($style_2_on) { ?><h3 class="h6 font-weight-semibold text-truncate w-100" style="margin-bottom: 2px;"><?php } else { ?><h3 class="h5 font-size-body font-weight-normal text-body text-truncate w-100 mb-1"><?php } ?><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h3>
			<div class="small text-truncate text-muted d-flex align-items-center">
			<?php if ($version) { ?><?php if($svg_mods_on) { ?><?php echo $svg_mods_on; ?><?php } ?><?php if($rtl_on){ ?><?php echo RTL_Nums($version); ?><?php } else { ?><?php echo $version; ?><?php } ?><?php } else { ?><?php } ?><span class="mx-1">·</span>
			<span class="text-truncate"><?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?></span>
			</div>
			<div class="small text-muted d-flex align-items-center"><?php if($ratings_on) { ?><?php if ($rated_gps) { ?><kbd></kbd>&nbsp;&nbsp;<span><?php if($rtl_on){ ?><?php echo RTL_Nums($rate_GP); ?><?php } else { ?><?php echo $rate_GP; ?><?php } ?></span><span class="mx-1">·</span><?php } else { ?><kbd></kbd>&nbsp;&nbsp;<span>n/a</span><span class="mx-1">·</span><?php }} ?><?php if ($mod_gps) { ?><span class="text-truncate"><?php if($text_mods) { ?><?php echo $text_mods; ?><?php } ?>&nbsp;<?php echo trim(strip_tags($wp_mods)) ?></span><?php } else { ?><span class="text-truncate">&nbsp;<?php _e('Original APK', THEMES_NAMES); ?></span><?php } ?></div>
		</div>
		<?php if($style_2_on) { ?></div><?php } else { ?><?php } ?>
	</a>
</div>
<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--moddroid-->
<div class="hentry col-12 col-md-6 mb-4 post-id-<?php echo get_the_ID();?> post-view-count-<?= ex_themes_get_post_view_alts(); ?>">
	<a class="d-flex position-relative archive-post" href="<?php the_permalink() ?>" title="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>">
	<div class="flex-shrink-0 mr-2">
		<img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" class="rounded-lg wp-post-image" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" style="max-width: 4rem;" width="120" height="120"/>
	</div>
	<div style="min-width: 0;">
		<h3 class="h5 font-size-body font-weight-normal text-body text-truncate w-100 mb-1"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h3>
		<div class="small text-truncate text-muted d-flex align-items-center">
		<?php if ($version) { ?><?php if($svg_mods_on) { ?><?php echo $svg_mods_on; ?><?php } ?><?php if($rtl_on){ ?><?php echo RTL_Nums($version); ?><?php } else { ?><?php echo $version; ?><?php } ?><?php } else { ?><?php } ?>
		<span class="mx-1">·</span>
		<span class="text-truncate"><?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?></span>
		</div>
		<div class="small text-muted d-flex align-items-center">
		<?php if ($mod_gps) { ?><span class="text-truncate"><?php if($text_mods) { ?><?php echo $text_mods; ?><?php } ?>&nbsp;<?php echo trim(strip_tags($wp_mods)) ?></span><?php } else { ?><span class="text-truncate">&nbsp;<?php _e('Original APK', THEMES_NAMES); ?></span><?php } ?>
		</div>
	</div>
	</a>
</div>
<?php } ?>
