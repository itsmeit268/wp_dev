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
get_header(); 
global $wpdb, $post, $opt_themes;
require EX_THEMES_DIR.'/libs/inc.single.php';
require EX_THEMES_DIR.'/libs/inc.lang.php';
$x_time							= get_the_time('c');
$u_time							= get_the_time('U');
$x_modified_time 				= get_the_modified_time('c');
$u_modified_time 				= get_the_modified_time('U');
$enable_tags					= $opt_themes['enable_tags'];  
$enable_social_share			= $opt_themes['enable_social_share'];  
$enable_gallery_top				= $opt_themes['enable_gallery_top'];   
$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url']; 
$poster_ids						= get_post_thumbnail_id($post->ID); 
if($opt_themes['ex_themes_home_style_2_activate_']) {
$full							= 'thumbnails-post'; 
} else {
$full							= 'thumbnails-post-old'; 
}
$poster_urls					= wp_get_attachment_image_src($poster_ids, $full, true); 
$poster_imgs					= $poster_urls[0];

?>
 
<div id="content post-id-<?php the_ID(); ?> post-view-count-<?php ex_themes_set_post_view_(); echo ex_themes_get_post_view_alts(); ?>" class="site-content mt-1" itemscope itemtype="https://schema.org/SoftwareApplication"> 
 
	<div class="container">
		<?php if($sidebar_on) { ?><div class="row <?php if($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?> ml-5 <?php } ?>"><?php } ?>
			<?php if($sidebar_on) { ?><main id="primary" class="col-12 <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>mr-4 ml-auto col-lg-7 <?php } else { ?>col-lg-8 <?php } ?> content-area"><?php } else { ?><main id="primary" <?php if($style_2_on) { ?>class="content-area"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
				
				<?php if($style_2_on) { ?><article class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pb-3 pt-3 px-2 px-md-3 mx-auto mb-3" style="max-width: <?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"> 
				<?php } 
				if (function_exists('breadcrumbsX')) breadcrumbsX();
				/* get_template_part('include/breadcrums_up');  */
				if($gp_id_on){ 
				if($style_2_on) { } else { 
				if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
				<h1 class="h5 font-weight-semibold text-center mb-1" <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?> style="display:none"<?php } ?>><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h1>
				<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><div style="display:none"><?php } ?>
				<?php if ($u_modified_time >= $u_time + 1) { echo "<div class=\"mb-3 text-center text-secondary small\"><time datetime=\"".$x_modified_time."\"><em><b>".$text_latest_update."</b> ";  the_modified_time('F j, Y');  echo edit_post_link( __( $text_edit_post, THEMES_NAMES ), ' ', ' ' ); echo "</em></time></div>";  } else { ?><div class="mb-3 text-center text-secondary small"><time datetime='<?php echo $x_time; ?>'><em><b><?php echo $text_post_on; ?></b> <?php echo get_the_time('F j, Y'); echo edit_post_link( __( $text_edit_post, THEMES_NAMES ), ' ', ' ' ); ?></em> </time></div><?php } ?>
				<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?></div><?php } ?>
				<?php }} ?>
				 
				<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ 
				get_template_part('include/info_apk_mdr');  
				} if($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ get_template_part('include/background'); 
				}		
				if($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ 
				}
				if($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ 
				get_template_part('include/background'); 
				get_template_part('include/info_apk_3'); 
				}
				?>
				<?php if($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
				<div class="bg-light small rounded pt-2 px-3 mb-3 entry-content" style="padding-bottom: 1px; margin-top: 1.5rem;background-color:  var(--color_rgb3) !important;">
				<p><em><?php echo strip_tags($des_post); ?></em></p>
				</div> 
				<?php } ?>
				 
				<?php if($style_2_on) { ?>
				<?php 
				if($opt_themes['mdr_style_3']) {
				get_template_part('include/info_apk_3');
				} else { ?>
				<div class="d-flex align-items-center px-0 px-md-3 mb-3 mb-md-4 <?php if($rtl_on){ ?>ml-3<?php } else{ ?><?php } ?>">
				<div class="flex-shrink-0 <?php if($rtl_on){ ?>ml-3<?php } else{ ?>mr-3<?php } ?>" style="width: 4.5rem;">
				
				<img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $poster_imgs; } } } else { if (has_post_thumbnail()) { echo $poster_imgs; } else { echo $defaults_no_images; } } ?>" class="rounded-lg wp-post-image" alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" loading="lazy" style="max-width: 100%;max-height: 72px;" > </div>
				<div>
				<h1 class="lead font-weight-semibold"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></h1>				
				<?php 
				if ($u_modified_time >= $u_time + 1) { echo "<time class=\"text-muted d-block\" datetime=\"".$x_modified_time."\"><em><b>".$text_latest_update."</b> "; the_modified_time('F j, Y '); echo edit_post_link( __( $text_edit_post, THEMES_NAMES ), ' ', ' ' ); echo "</em></time>"; } else { ?>
				<time class="text-muted d-block " datetime='<?php echo $x_time; ?>'><em><b><a href="<?php echo $author_link; ?>" target="_blank"><?php echo $display_name; ?></a></b>, <?php echo get_the_time('F j, Y '); echo edit_post_link( __( $text_edit_post, THEMES_NAMES ), ' ', ' ' ); ?></em></time>
				<?php } ?>
				</div>
				</div>
				<?php } ?>  
				
				
				<div class="px-0 px-md-3">
				
				<?php if($opt_themes['mdr_style_3']) { ?>
				<div class="bg-light small rounded pt-2 px-3 mb-3 entry-content" style="padding-bottom: 1px; margin-top: 1.5rem;background-color:  var(--color_rgb3) !important;">
				<p><em><?php echo strip_tags($des_post); ?></em></p>
				</div>
				 
				<?php } else { ?>
				<div class="bg-light small rounded pt-2 px-3 mb-3 entry-content" style="padding-bottom: 1px; margin-top: 1.5rem;background-color:  var(--color_rgb3) !important;">
				<p><em><?php echo strip_tags($des_post); ?></em></p>
				</div>
				<?php } ?>
				<?php get_template_part('include/info_apk_new'); ?>
				</div>
				<?php }
				if($style_2_on) { } else { 
				if($info_new_style_on) {
				//get_template_part('include/info_apk_2');
				} else {
				if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){
				//get_template_part('include/info_apk');
				} else {
				get_template_part('include/info_apk_new');
				}
				} }
				
				if($gp_id_on){ if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){}else{?>
				<a class="btn btn-secondary btn-block mb-3" href="<?php the_permalink() ?>download/" rel="nofollow" ><?php if($svg_icon) { echo $svg_icon; } ?>
				<span class="align-middle"><?php if($text_download){ echo $text_download; } ?></span>
				</a> 
				<?php }} } else { ?> 	
				<h1 class="h5 font-weight-semibold text-truncate mb-2"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?> <?php if ($version_ps) { ?>v.<?php echo $version_ps; } else { } ?> <?php if ($mod_ps) { ?>(<?php echo trim(strip_tags($mod_ps)) ?>)<?php } ?></h1>
				<div class="small font-weight-medium text-muted mb-3">
				<em><a href="<?php echo $author_link; ?>" target="_blank"><?php echo $display_name; ?></a>, <?php echo get_the_time('l, F j, Y '); echo edit_post_link( __( $text_edit_post, THEMES_NAMES ), ' ', ' ' ); ?></em>  
				</div>	
				 
				<div class="text-center mb-3">
				<img width="100%" height="100%" src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" style="height: 50%!important;max-height: 300px;"/>
				</div> 
				<?php } ?> 
				<div class="mb-3"><?php ex_themes_banner_single_ads_(); ?></div>
				<?php get_template_part('include/info_mod'); 
				if ($enable_gallery_top) { ?>				
				<div class="mb-3">
				<?php gallery_image_top_(); ?>
				</div>
				<?php } ?> 

				 
				<div id='entry-content' class="pb-3 entry-content <?php if($rtl_on){ ?>ml-3<?php } else{ ?><?php } ?>">
				<?php if( have_posts() ) { while( have_posts() ) { the_post(); the_content(); }} ?> 
				</div>
				
				<?php 
				if($style_2_on) {				
				if ($whatnews_ps) {
				?> 
				<div id="accordion-whats-news" class="border rounded-lg overflow-hidden mb-3 accordion accordion-more-info">
					<div>
						<a class="bg-col-button d-flex py-2 px-3 toggler collapsed" data-toggle="collapse" href="#whats-news" aria-expanded="false"><?php if($title_whatnews) { echo $title_whatnews; } ?></a>
						<div id="whats-news" class="collapse show" data-parent="#accordion-whats-news">
						<div class="pt-3 px-3 mb-3"><?php echo $whatnews_ps; ?></div>
						</div>
					</div>
				</div>
				<?php } else { 
				} } else {}  ?>				
				
				<div class="mb-3">
				<?php ex_themes_poster_img_sliders_(); ?>
				</div>
				<?php 				
				if($gp_id_on){ 
				get_template_part('include/info_rating'); ?><br>
				<?php } 
				if($gp_id_on){ ?> 
				<a name="download"></a>
				<h2 id="download_url_links" class="h5 font-weight-semibold mb-3" ><?php if($text_download){ echo $text_download; } ?> <?php the_title(); ?></h2> 
				<?php }  ?>				
				
				<div class="mb-3">
				<center><?php ex_themes_banner_single_ads_2(); ?></center>
				</div>	
				
				<?php if($gp_id_on){ 
				get_template_part('include/info_download'); 
				} 
				if($download_notices_on){ ?>
				<div class="small mb-3 notice_download">
				<p><?php if($notice_6){ echo $notice_6; } ?> <strong><em><?php echo $title_ps; ?></em></strong> <?php if($notice_7){ echo $notice_7; } ?></p>
				<?php echo $notice_downloads; ?>
				</div>
				<?php }
				get_template_part('include/telegram'); 
				if(function_exists('kk_star_ratings')) { ?>
				<div class="text-center d-flex align-items-center justify-content-center py-3 mb-3">
				<?php echo kk_star_ratings(); ?>
				</div>
				<?php } 
				if (shortcode_exists( 'rns_reactions' )) {
				if($opt_themes['enable_emoji_bottom']) {
				echo do_shortcode( '[rns_reactions]' );
				}} if ($enable_social_share) {
				?>
				<div class="text-center border-top border-bottom d-flex align-items-center justify-content-center py-3 mb-3">
				<?php ex_themes_blog_shares_2(); ?>
				</div>				
				<?php
				} 
				if ($enable_tags) { 
				$post_tags = get_the_tags();
                if ( ! empty( $post_tags ) ) {
                    echo '<span class="tags-links "> ';
                    foreach( $post_tags as $post_tag ) { 
					echo '<a href="'.get_tag_link( $post_tag ).'" title="'.$post_tag->name.' tag" rel="tag"># '.$post_tag->name.'</a>'; 
					}
                    echo '</span>';
                } }
				if($style_2_on) { ?></article><?php } 
				ex_themes_versions();
				ex_themes_related_posts_(); 
				if($opt_themes['ex_themes_comments_activate_']){
				if($opt_themes['mdr_style_3']) {
				ex_themes_leave_comments_();
				} else {
				comments_template();
				}
				} ?>
			 
			</main>
			<?php  
			/* get_template_part('include/info_slider_new'); */ 
			get_template_part('include/popup-post');
			?>
		
			<?php if($sidebar_on) { ?><!--sidebar--><aside id="secondary" class="col-12 col-lg-4 widget-area"><?php get_sidebar(); ?></aside><!--sidebar--><?php } ?>
			
		<?php if($sidebar_on) { ?></div><?php } 
		/* get_template_part('include/breadcrumbs_down');  */
		?>
	</div>
</div>
<?php 
get_footer(); 