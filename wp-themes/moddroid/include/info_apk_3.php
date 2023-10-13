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
 
$full						= 'thumbnails-alt-120'; 
 
$image_urls					= wp_get_attachment_image_src($image_ids, $full, true); 
$poster_imgs				= $image_urls[0];
$appname_on					= $opt_themes['ex_themes_title_appname'];  
$title						= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt					= get_the_title();
$x_time						= get_the_time('c');
$u_time						= get_the_time('U');
$x_modified_time			= get_the_modified_time('c');
$u_modified_time			= get_the_modified_time('U');

$author_id						= $post->post_author;
$author_link					= get_author_posts_url( $author_id );
$author_avatar					= get_avatar_url( $author_id ); 
$author							= get_the_author( $author_id );
$authorx						= get_the_author_meta('display_name', $author_id);
$display_name					= $authorx;
/* 
$passthis_id					= $curauth->ID;
$user_info						= get_userdata(1);
$username						= $user_info->user_login;
$first_name						= $user_info->first_name;
$last_name						= $user_info->last_name;
$display_name					= $user_info->display_name;
 */
$desck_GPs					= get_post_meta( $post->ID, 'wp_desck_GP', true ); 
if ( $desck_GPs === FALSE or $desck_GPs == '' ) $desck_GPs = $post->post_content;	
$des_post					= trim(strip_tags( $desck_GPs ));
$des_post					= trim(strip_tags( $desck_GPs ));
$des_post					= preg_replace('~[\r\n]+~', '', $des_post);
$des_post					= str_replace('"', '', $des_post);
$des_post					= mb_substr( $des_post, 0, 200, 'utf8' );
?>

<div class="detail_banner mt-3">
  <img src="<?php if($opt_themes['aktif_thumbnails']) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $poster_imgs; } } } else { if (has_post_thumbnail()) { echo $poster_imgs; } else { echo $defaults_no_images; } } ?>" class="icon mt-2 " itemprop="image" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" >
  
  <h1 itemprop="name"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h1>
  
  <p><?php if ($u_modified_time >= $u_time + 1) { echo "<time class=\"text-muted d-block\" datetime=\"".$x_modified_time."\"><em><b>".$opt_themes['text_latest_update']."</b> "; the_modified_time('F j, Y '); echo edit_post_link( __( $opt_themes['text_edit_post'], THEMES_NAMES ), ' ', ' ' ); echo "</em></time>"; } else { ?><time class="text-muted d-block " datetime='<?php echo $x_time; ?>'><em><b><a href="<?php echo $author_link; ?>" target="_blank"><?php echo $display_name; ?></a></b>, <?php echo get_the_time('F j, Y '); echo edit_post_link( __( $opt_themes['text_edit_post'], THEMES_NAMES ), ' ', ' ' ); ?></em></time><?php } ?></p>
  
  <p>
	<?php if($version){ ?>
	<span style="color: var(--color_link);">v<?php echo $version; ?></span>
	<?php } 
	if ($terms) { ?>
	<?php _e(' by ', THEMES_NAMES); ?> 
	<?php
	$output = array();
	foreach ($terms as $term) {
	$output[] = '<a href="'.get_term_link( $term->slug, $developer).'" title="Developer by '.$term->name.'">'.$term->name.'</a>';
	}
	echo join( ', ', $output );	
	}
	?>		
  </p> 
  
</div>