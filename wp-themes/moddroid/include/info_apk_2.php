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
$image_id					= get_post_thumbnail_id(); 
$image_url					= wp_get_attachment_image_src($image_id,'full', true); 
$image_url_default			= $image_url[0];
$thumbnail_images			= $image_url;
$post_id					= get_the_ID();
$url						= wp_get_attachment_url( get_post_thumbnail_id($post->ID), '64' );
$defaults_no_images			= $opt_themes['ex_themes_defaults_no_images_']['url'];
$thumb_id					= get_post_thumbnail_id( $id );
if ( '' != $thumb_id ) {
$thumb_url					= wp_get_attachment_image_src( $thumb_id, '64', true );
$image						= $thumb_url[0];
	} else {
$image						= $defaults_no_images;
	}
$urlimages2					= $image;

$thumbnails_gp				= get_post_meta( $post->ID, 'wp_poster_GP', true );
$thumbnails					= str_replace( 'http://', '', $thumbnails_gp );
$thumbnails					= str_replace( 'https://', '', $thumbnails_gp );
$randoms					= mt_rand(0, 2);
$cdn_thumbnails				= '//i'.$randoms.'.wp.com/'.$thumbnails.'';
$thumbnails					= get_post_meta( $post->ID, 'wp_poster_GP', true );
$defaults_no_images			= $opt_themes['ex_themes_defaults_no_images_']['url'];
$developer					= get_option('wp_developers_GP', 'developer');
$terms						= wp_get_post_terms($post->ID, $developer);
$sizes						= get_post_meta( $post->ID, 'wp_sizes', true ); 
$sizes_alt					= get_post_meta( $post->ID, 'wp_sizes_GP', true );
if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizes_alt;
$version					= get_post_meta( $post->ID, 'wp_version', true );
$versionX1					= get_post_meta( $post->ID, 'wp_version_GP', true ); 
$versionX					= '-';
if ( $version === FALSE or $version == '' ) $version = $versionX1;
$version1					= get_post_meta( $post->ID, 'wp_version', true );
$versionX1					= get_post_meta( $post->ID, 'wp_version_GP', true );
$versionX					= '-';
if ( $version1 === FALSE or $version1 == '' ) $version1 = $versionX1;
$wp_installs_GP				= get_post_meta( $post->ID, 'wp_installs_GP', true );
$wp_installs_GP1			= get_post_meta( $post->ID, 'wp_installs_GP', true );
if ( $wp_installs_GP === FALSE or $wp_installs_GP == '' ) $wp_installs_GP = $wp_installs_GP1;
$wp_contentrated_GP			= get_post_meta( $post->ID, 'wp_contentrated_GP', true );
$wp_contentrated_GP1		= get_post_meta( $post->ID, 'wp_contentrated_GP', true );
if ( $wp_contentrated_GP === FALSE or $wp_contentrated_GP == '' ) $wp_contentrated_GP = $wp_contentrated_GP1;
$updates					= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX1					= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX					= '-';
if ( $updates === FALSE or $updates == '' ) $updates = $updatesX;	
$wp_mods					= get_post_meta( $post->ID, 'wp_mods1', true );
$wp_mods1					= get_post_meta( $post->ID, 'wp_mods', true );
if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_mods1;
$sidebar_on					= $opt_themes['sidebar_activated_'];
$style_2_on					= $opt_themes['ex_themes_home_style_2_activate_'];
$background_on				= $opt_themes['ex_themes_backgrounds_activate_'];
$thumbnails_on				= $opt_themes['aktif_thumbnails'];
$rtl_on						= $opt_themes['ex_themes_activate_rtl_'];
$rtl_homes					= $opt_themes['rtl_homes'];
$cdn_on						= $opt_themes['ex_themes_cdn_photon_activate_'];
$title_on					= $opt_themes['ex_themes_title_appname'];
$info_new_style_on			= $opt_themes['ex_themes_style_2_activate_'];
$sidebar_on					= $opt_themes['sidebar_activated_'];
$style_2_on					= $opt_themes['ex_themes_home_style_2_activate_'];
$background_on				= $opt_themes['ex_themes_backgrounds_activate_'];
$thumbnails_on				= $opt_themes['aktif_thumbnails'];
$rtl_on						= $opt_themes['ex_themes_activate_rtl_'];
$rtl_homes					= $opt_themes['rtl_homes'];
$cdn_on						= $opt_themes['ex_themes_cdn_photon_activate_'];
$title_ps					= get_post_meta( $post->ID, 'wp_title_GP', true );
$developer_ps				= get_post_meta( $post->ID, 'wp_developers_GP', true );
$apk_text_name				= $opt_themes['exthemes_NameAPK'];
$apk_text_publiser			= $opt_themes['exthemes_PublisherAPK'];
$apk_text_genre				= $opt_themes['exthemes_GenreAPK'];
$apk_text_size				= $opt_themes['exthemes_SizeAPK'];
$apk_text_version			= $opt_themes['exthemes_VersionAPK'];
$apk_text_update			= $opt_themes['exthemes_UpdateAPK'];
$apk_text_mod				= $opt_themes['exthemes_MODAPK'];
$apk_text_gps				= $opt_themes['exthemes_GPSAPK'];
$url_ps_sources				= get_post_meta( $post->ID, 'wp_ps_sources', true ); 
$apk_mods					= get_post_meta( $post->ID, 'wp_mods', true );
$image_ids					= get_post_thumbnail_id($post->ID); 
if($opt_themes['ex_themes_home_style_2_activate_']) {
$full						= 'thumbnails-post'; 
} else {
$full						= 'thumbnails-post-old'; 
}
$image_urls					= wp_get_attachment_image_src($image_ids, $full, true); 
$poster_imgs				= $image_urls[0];
?>
<div class="row">
	<div class="col-12 col-md-5 text-center mb-3"><img src="<?php if($thumbnails_on) { ?><?php if($cdn_on) { ?><?php echo $cdn_thumbnails; ?><?php } else { ?><?php echo $thumbnails_gp; ?><?php } ?><?php } else { ?><?php if (has_post_thumbnail()) { ?><?php echo $poster_imgs; ?><?php } else { ?><?php echo $defaults_no_images; ?><?php } } ?>" class="rounded-lg wp-post-image mDr" loading="lazy" /></div>
	<div class="col-12 col-md-7">		 
		<table class="table table-borderless">
			<tr>
				<th class='font-size-body'> 
				<svg class="svg-5 svg-primary mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M420.55,301.93a24,24,0,1,1,24-24,24,24,0,0,1-24,24m-265.1,0a24,24,0,1,1,24-24,24,24,0,0,1-24,24m273.7-144.48,47.94-83a10,10,0,1,0-17.27-10h0l-48.54,84.07a301.25,301.25,0,0,0-246.56,0L116.18,64.45a10,10,0,1,0-17.27,10h0l47.94,83C64.53,202.22,8.24,285.55,0,384H576c-8.24-98.45-64.54-181.78-146.85-226.55"></path></svg> <?php if($apk_text_name) { ?><?php echo $apk_text_name; ?><?php } ?>
				</th>
				<td itemprop="name" class="text-truncate " >
					<?php echo trim(strip_tags(exthemes_excerpt_more($title_ps))); ?>
				</td>
				<td itemprop="description" style='display:none'>
					<?php echo $title_ps; ?> is the most famous version in the <?php echo $title_ps; ?> series of publisher <?php echo $developer_ps; ?>
				</td>
			</tr>
			<tr>
				<th class='font-size-body'> 
				<svg class="svg-5 svg-primary mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M501.1 395.7L384 278.6c-23.1-23.1-57.6-27.6-85.4-13.9L192 158.1V96L64 0 0 64l96 128h62.1l106.6 106.6c-13.6 27.8-9.2 62.3 13.9 85.4l117.1 117.1c14.6 14.6 38.2 14.6 52.7 0l52.7-52.7c14.5-14.6 14.5-38.2 0-52.7zM331.7 225c28.3 0 54.9 11 74.9 31l19.4 19.4c15.8-6.9 30.8-16.5 43.8-29.5 37.1-37.1 49.7-89.3 37.9-136.7-2.2-9-13.5-12.1-20.1-5.5l-74.4 74.4-67.9-11.3L334 98.9l74.4-74.4c6.6-6.6 3.4-17.9-5.7-20.2-47.4-11.7-99.6.9-136.6 37.9-28.5 28.5-41.9 66.1-41.2 103.6l82.1 82.1c8.1-1.9 16.5-2.9 24.7-2.9zm-103.9 82l-56.7-56.7L18.7 402.8c-25 25-25 65.5 0 90.5s65.5 25 90.5 0l123.6-123.6c-7.6-19.9-9.9-41.6-5-62.7zM64 472c-13.2 0-24-10.8-24-24 0-13.3 10.7-24 24-24s24 10.7 24 24c0 13.2-10.7 24-24 24z"></path></svg> <?php if($apk_text_publiser) { ?><?php echo $apk_text_publiser; ?><?php } ?>
				</th>
				<?php				
				if ($terms) {
				$output = array();
				foreach ($terms as $term) {
				$output[] = '<td  class="text-truncate "><a href="'.get_term_link( $term->slug, $developer).'" title="Developer by '.$term->name.'">'.$term->name.'</a></td>';
				}
				echo join( ', ', $output );	}
				?>
			</tr>
			<tr>
				<th class='font-size-body'> 
				<svg class="svg-5 svg-primary mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M48 48a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm448 16H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></svg> <?php if($apk_text_genre) { ?><?php echo $apk_text_genre; ?><?php } ?>
				</th>
				<td  class="text-truncate ">
					<?php
					$i = 0;
					foreach((get_the_category()) as $cat) {
					echo '<a class="label" href="'.get_category_link($cat->cat_ID).'">'.$cat->cat_name.'</a>';
					if (++$i == 1) break;
					}
					?>
				</td>
			</tr>
			<?php if ($sizes) { ?> 
			<tr>
				<th class='font-size-body'> 
				<svg class="svg-5 svg-primary mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M567.938 243.908L462.25 85.374A48.003 48.003 0 0 0 422.311 64H153.689a48 48 0 0 0-39.938 21.374L8.062 243.908A47.994 47.994 0 0 0 0 270.533V400c0 26.51 21.49 48 48 48h480c26.51 0 48-21.49 48-48V270.533a47.994 47.994 0 0 0-8.062-26.625zM162.252 128h251.497l85.333 128H376l-32 64H232l-32-64H76.918l85.334-128z"></path></svg> <?php if($apk_text_size) { ?><?php echo $apk_text_size; ?><?php } ?>
				</th>
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
				<th class='font-size-body'> 
				<svg class="svg-5 svg-primary mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg> <?php if($apk_text_version) { ?><?php echo $apk_text_version; ?><?php } ?>
				</th>
				<td>
				<?php if($rtl_on){ ?>
				<?php echo RTL_Nums($version); ?>
				<?php } else { ?>
				<?php echo $version; ?>
				<?php } ?>
				</td>
			</tr>
			<noscript>
				<tr style="display: none;">
					<th><?php _e('Mod Version', THEMES_NAMES); ?></th> 
					<td>
						<?php echo $version1; ?>
					</td>
				</tr>
			</noscript>
			<?php if (get_post_meta( $post->ID, 'wp_installs_GP', true )) { ?>
			<tr style="display: none;">
				<th>
					<?php _e('Total installs', THEMES_NAMES); ?>
				</th>
				<td>
					<?php if($rtl_on){ ?>
					<?php echo RTL_Nums($wp_installs_GP); ?>
					<?php } else { ?>
					<?php echo $wp_installs_GP; ?>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
			<?php if (get_post_meta( $post->ID, 'wp_contentrated_GP', true )) { ?>
			<tr style="display: none;">
				<th>
					<?php _e('Content Rating', THEMES_NAMES); ?>
				</th>
				<td>
					<?php echo $wp_contentrated_GP; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>			 
				<th class='font-size-body'> 
				<svg class="svg-5 svg-primary mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path style="fill:var(--color_svg);" d="M461.453,107.866c-38.887-55.395-97.018-92.33-163.685-104.003S163.879,7.177,108.485,46.064  C53.091,84.95,16.155,143.081,4.482,209.748l67.537,11.825C89.595,121.19,185.561,53.823,285.943,71.399  s167.75,113.542,150.173,213.924s-113.542,167.75-213.924,150.173c-15.5-2.714-30.404-7.308-44.516-13.701l27.664-35.299  L56.625,371.24l50.358,140.758l27.503-35.093c23.671,12.669,49.143,21.446,75.881,26.127  c66.667,11.673,133.889-3.315,189.283-42.201s92.33-97.017,104.002-163.684C515.326,230.482,500.339,163.26,461.453,107.866z"/> <g style="opacity:0.1;">  <path d="M142.767,57.491C198.161,18.604,265.383,3.617,332.05,15.29c6.64,1.163,13.192,2.587,19.652,4.244   C334.556,12.417,316.5,7.142,297.768,3.863C231.101-7.81,163.879,7.177,108.485,46.064S16.155,143.081,4.482,209.748l35.267,6.175   C52.407,151.459,88.833,95.352,142.767,57.491z"/> </g> <polygon style="fill:var(--color_svg);" points="383.961,288.066 225.077,288.066 225.077,129.182 270.786,129.182 270.786,242.357   383.961,242.357 "/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg> <?php if($apk_text_update) { ?><?php echo $apk_text_update; ?><?php } ?>
				</th>
				<td>				
					<?php if($rtl_on){ ?>
					<?php echo RTL_Nums($updates); ?>
					<?php } else { ?>
					<?php echo $updates; ?>
					<?php } ?>
				</td>
				<td itemprop="datePublished" style='display:none'>
					<?php echo $updates; ?>
				</td>
			</tr>
			<?php if ($apk_mods) { ?> 
			<tr>
				<th class='font-size-body'> 
				<svg class="svg-5 svg-primary mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M480.07 96H160a160 160 0 1 0 114.24 272h91.52A160 160 0 1 0 480.07 96zM248 268a12 12 0 0 1-12 12h-52v52a12 12 0 0 1-12 12h-24a12 12 0 0 1-12-12v-52H84a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h52v-52a12 12 0 0 1 12-12h24a12 12 0 0 1 12 12v52h52a12 12 0 0 1 12 12zm216 76a40 40 0 1 1 40-40 40 40 0 0 1-40 40zm64-96a40 40 0 1 1 40-40 40 40 0 0 1-40 40z"></path></svg> <?php if($apk_text_mod) { ?><?php echo $apk_text_mod; ?><?php } ?>
				</th>
				<td>
					<?php echo trim(strip_tags($wp_mods)); ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($url_ps_sources) { ?>
			<tr>
				<th class='font-size-body'> 
				<svg class="svg-5 svg-primary mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg> <?php if($apk_text_gps) { ?><?php echo $apk_text_gps; ?><?php } ?>
				</th>
				<td>
					<a href="<?php echo $url_ps_sources; ?>" target="_blank" rel="nofollow"><?php _e('Play Store', THEMES_NAMES); ?></a>
				</td>
			</tr>
			<?php } ?>
		</table>
		<span itemprop="operatingSystem" style="display:none">
			<?php _e('Android', THEMES_NAMES); ?>
		</span>
		<span itemprop="softwareRequirements" style="display:none">
			<?php _e('Android', THEMES_NAMES); ?> <?php echo $requires; ?>
		</span>
		<span itemprop="applicationCategory" content="<?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?>" style="display:none">
			<?php $i = 0; foreach((get_the_category()) as $cat) { echo '' . $cat->cat_name . ''; if (++$i == 1) break; } ?>
		</span>
		<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating" style="display:none">
			<span itemprop="ratingValue">
				<?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
			</span> (
			<span itemprop="ratingCount">
				<?php echo mt_rand(60,985); ?>
			</span> <?php _e('ratings', THEMES_NAMES); ?> )
		</div>
		<div itemprop="offers" itemscope itemtype="https://schema.org/Offer" style="display:none">
			<?php _e('Price', THEMES_NAMES); ?>: $
			<span itemprop="price">
				0
			</span>
			<meta itemprop="priceCurrency" content="USD" />
		</div>
	</div>
</div>