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
$image_id					=	get_post_thumbnail_id(); 
$image_url					=	wp_get_attachment_image_src($image_id,'full', true); 
$image_url_default			=	$image_url[0];
$thumbnail_images			=	$image_url;
$post_id					=	get_the_ID();
$url						=	wp_get_attachment_url( get_post_thumbnail_id($post->ID), '64' );
$defaults_no_images			=	$opt_themes['ex_themes_defaults_no_images_']['url'];
$thumb_id					=	get_post_thumbnail_id( $id );
if ( '' != $thumb_id ) {
$thumb_url					=	wp_get_attachment_image_src( $thumb_id, '64', true );
$image						=	$thumb_url[0];
	} else {
$image						=	$defaults_no_images;
	}
$urlimages2					=	$image;

$thumbnails_gp				=	get_post_meta( $post->ID, 'wp_poster_GP', true );
$thumbnails					=	str_replace( 'http://', '', $thumbnails_gp );
$thumbnails					=	str_replace( 'https://', '', $thumbnails_gp );
$randoms					=	mt_rand(0, 2);
$cdn_thumbnails				=	'//i'.$randoms.'.wp.com/'.$thumbnails.'';
$thumbnails					=	get_post_meta( $post->ID, 'wp_poster_GP', true );
$defaults_no_images			=	$opt_themes['ex_themes_defaults_no_images_']['url'];
$developer					=	get_option('wp_developers_GP', 'developer');
$terms						=	wp_get_post_terms($post->ID, $developer);
$sizes						=	get_post_meta( $post->ID, 'wp_sizes', true ); 
$sizes_alt					=	get_post_meta( $post->ID, 'wp_sizes_GP', true );
if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizes_alt;
$version					=	get_post_meta( $post->ID, 'wp_version', true );
$versionX1					=	get_post_meta( $post->ID, 'wp_version_GP', true ); 
$versionX					=	'-';
if ( $version === FALSE or $version == '' ) $version = $versionX1;
$version1					=	get_post_meta( $post->ID, 'wp_version', true );
$versionX1					=	get_post_meta( $post->ID, 'wp_version_GP', true );
$versionX					=	'-';
if ( $version1 === FALSE or $version1 == '' ) $version1 = $versionX1;
$wp_installs_GP				=	get_post_meta( $post->ID, 'wp_installs_GP', true );
$wp_installs_GP1			=	get_post_meta( $post->ID, 'wp_installs_GP', true );
if ( $wp_installs_GP === FALSE or $wp_installs_GP == '' ) $wp_installs_GP = $wp_installs_GP1;
$wp_contentrated_GP			=	get_post_meta( $post->ID, 'wp_contentrated_GP', true );
$wp_contentrated_GP1		=	get_post_meta( $post->ID, 'wp_contentrated_GP', true );
if ( $wp_contentrated_GP === FALSE or $wp_contentrated_GP == '' ) $wp_contentrated_GP = $wp_contentrated_GP1;
$updates					=	get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX1					=	get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX					=	'-';
if ( $updates === FALSE or $updates == '' ) $updates = $updatesX;	
$wp_mods					=	get_post_meta( $post->ID, 'wp_mods1', true );
$wp_mods1					=	get_post_meta( $post->ID, 'wp_mods', true );
if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_mods1;
$sidebar_on					=	$opt_themes['sidebar_activated_'];
$style_2_on					=	$opt_themes['ex_themes_home_style_2_activate_'];
$background_on				=	$opt_themes['ex_themes_backgrounds_activate_'];
$thumbnails_on				=	$opt_themes['aktif_thumbnails'];
$rtl_on						=	$opt_themes['ex_themes_activate_rtl_'];
$rtl_homes					=	$opt_themes['rtl_homes'];
$cdn_on						=	$opt_themes['ex_themes_cdn_photon_activate_'];
$title_on					=	$opt_themes['ex_themes_title_appname'];
$info_new_style_on			=	$opt_themes['ex_themes_style_2_activate_'];
$sidebar_on					=	$opt_themes['sidebar_activated_'];
$style_2_on					=	$opt_themes['ex_themes_home_style_2_activate_'];
$background_on				=	$opt_themes['ex_themes_backgrounds_activate_'];
$thumbnails_on				=	$opt_themes['aktif_thumbnails'];
$rtl_on						=	$opt_themes['ex_themes_activate_rtl_'];
$rtl_homes					=	$opt_themes['rtl_homes'];
$cdn_on						=	$opt_themes['ex_themes_cdn_photon_activate_'];
$title_ps					=	get_post_meta( $post->ID, 'wp_title_GP', true );
$developer_ps				=	get_post_meta( $post->ID, 'wp_developers_GP', true );
$apk_text_name				=	$opt_themes['exthemes_NameAPK'];
$apk_text_publiser			=	$opt_themes['exthemes_PublisherAPK'];
$apk_text_genre				=	$opt_themes['exthemes_GenreAPK'];
$apk_text_size				=	$opt_themes['exthemes_SizeAPK'];
$apk_text_version			=	$opt_themes['exthemes_VersionAPK'];
$apk_text_update			=	$opt_themes['exthemes_UpdateAPK'];
$apk_text_mod				=	$opt_themes['exthemes_MODAPK'];
$apk_text_gps				=	$opt_themes['exthemes_GPSAPK'];
$url_ps_sources				=	get_post_meta( $post->ID, 'wp_ps_sources', true ); 
$apk_mods					=	get_post_meta( $post->ID, 'wp_mods', true );
$image_ids						= get_post_thumbnail_id($post->ID); 
if($opt_themes['ex_themes_home_style_2_activate_']) {
$full							= 'thumbnails-post'; 
} else {
$full							= 'thumbnails-post-old'; 
}
$image_urls						= wp_get_attachment_image_src($image_ids, $full, true); 
$poster_imgs					= $image_urls[0];
?>
<div class="row align-items-center">
	<div class="col-12 col-md-4 text-center"><img src="<?php if($thumbnails_on) { ?><?php if($cdn_on) { ?><?php echo $cdn_thumbnails; ?><?php } else { ?><?php echo $thumbnails_gp; ?><?php } ?><?php } else { ?><?php if (has_post_thumbnail()) { ?><?php echo $poster_imgs; ?><?php } else { ?><?php echo $defaults_no_images; ?><?php } } ?>" class="rounded-lg mb-3 wp-post-image mDr" alt="" loading="lazy" style="width: 200px;"  /></div>
    <div class="col-12 col-md-8">
        <?php if (function_exists('kk_star_ratings')) : ?>
		<center class="hidez" style='display:none'><div class="text-center d-flex align-items-center justify-content-center py-3 mb-3"><?php echo kk_star_ratings(); ?></div></center>
		<?php endif ?>
        <table class="table table-striped table-borderless" style="text-transform:capitalize;">
            <tr>
                <th><?php if($apk_text_name) { ?><?php echo $apk_text_name; ?><?php } ?></th>
                <td itemprop="name" ><?php echo $title_ps; ?></td>
                <td itemprop="description" style='display:none'> <?php echo $title_ps; ?> is the most famous version in the <?php echo $title_ps; ?> series of publisher <?php echo $developer_ps; ?></td>
            </tr>
            <tr>
                <th><?php if($apk_text_publiser) { ?><?php echo $apk_text_publiser; ?><?php } ?></th>
                <?php if ($terms) { $output = array(); foreach ($terms as $term) { $output[] = '<td><a href="' .get_term_link( $term->slug, $developer) .'" title="Developer by ' .$term->name .'">' .$term->name .'</a></td>'; } echo join( ', ', $output );	} ?>
            </tr>
            <tr>
                <th><?php if($apk_text_genre) { ?><?php echo $apk_text_genre; ?><?php } ?></th>
                <td><?php $i = 0; foreach((get_the_category()) as $cat) { echo '<a class="label" href="'.get_category_link($cat->cat_ID).'">' . $cat->cat_name . '</a>'; if (++$i == 1) break; } ?></td>
            </tr>
            <?php if ($sizes) { ?>                
                <tr>
                    <th><?php if($apk_text_size) { ?><?php echo $apk_text_size; ?><?php } ?></th>
                    <td>						
					<?php if($rtl_on){ ?>
					<?php echo RTL_Nums($sizes); ?>
					<?php } else { ?>
					<?php echo $sizes; ?>
					<?php } ?>
					</td>
                </tr>
			<?php } ?>
            <tr>
                <th><?php if($apk_text_version) { ?><?php echo $apk_text_version; ?><?php } ?></th>                 
                <td>
				<?php if($rtl_on){ ?>
				<?php echo RTL_Nums($version); ?>
				<?php } else { ?>
				<?php echo $version; ?>
				<?php } ?>
				</td>
            </tr> 
            <?php if (get_post_meta( $post->ID, 'wp_contentrated_GP', true )) { ?> 
                <tr style="display: none;">
                    <th><?php _e('Content Rating', THEMES_NAMES); ?> </th>
                    <td><?php echo $wp_contentrated_GP; ?> </td>
                </tr>
            <?php } ?>
            <tr>
                
                <th><?php if($apk_text_update) { ?><?php echo $apk_text_update; ?><?php } ?></th>
                <td>
					<?php if($rtl_on){ ?>
					<?php echo RTL_Nums($updates); ?>
					<?php } else { ?>
					<?php echo $updates; ?>
					<?php } ?>
				</td>
                <td itemprop="datePublished" style='display:none'><?php echo $updates; ?></td>
            </tr>
            <?php if ($apk_mods) { ?> 
                <tr>
                    <th><?php if($apk_text_mod) { ?><?php echo $apk_text_mod; ?><?php } ?></th>
                    <td><?php echo trim(strip_tags($wp_mods)); ?> </td>
                </tr>
            <?php } ?>
			<?php if ($url_ps_sources) { ?>
            <tr>
                <th><?php if($apk_text_gps) { ?><?php echo $apk_text_gps; ?><?php } ?></th>
                <td><a href="<?php echo $url_ps_sources; ?>" target="_blank" rel="nofollow"><?php _e('Play Store', THEMES_NAMES); ?></a></td>
            </tr>
			<?php } ?>
            <?php if (get_post_meta( $post->ID, 'wp_installs_GP', true )) { ?> 
                <tr style="display: none;">
                    <th><?php _e('Total installs', THEMES_NAMES); ?></th>
                    <td>
					<?php if($rtl_on){ ?>
					<?php echo RTL_Nums($wp_installs_GP); ?>
					<?php } else { ?>
					<?php echo $wp_installs_GP; ?>
					<?php } ?> 
					</td>
                </tr>
            <?php } ?>
        </table>
            <span itemprop="operatingSystem" style="display:none"><?php _e('Android', THEMES_NAMES); ?> </span>
            <span itemprop="softwareRequirements" style="display:none"><?php _e('Android', THEMES_NAMES); ?> <?php echo $requires; ?></span>
            <span itemprop="applicationCategory" content="<?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?>" style="display:none"><?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?> </span>
        <div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating" style="display:none">
            <span itemprop="ratingValue"><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?></span> (
            <span itemprop="ratingCount"><?php echo mt_rand(60,985); ?></span> <?php _e('ratings', THEMES_NAMES); ?> )
        </div>
        <div itemprop="offers" itemscope itemtype="https://schema.org/Offer" style="display:none">
            <?php _e('Price', THEMES_NAMES); ?>: $<span itemprop="price">0</span>
            <meta itemprop="priceCurrency" content="USD" />
        </div>
    </div>
</div>