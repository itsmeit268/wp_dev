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
global $wpdb, $post, $wp_query, $opt_themes;
require EX_THEMES_DIR.'/libs/inc.download.php';
require EX_THEMES_DIR.'/libs/inc.lang.php';
$x_time					= get_the_time('c');
$u_time					= get_the_time('U');
$x_modified_time 		= get_the_modified_time('c');
$u_modified_time 		= get_the_modified_time('U');
$poster_ids						= get_post_thumbnail_id($post->ID); 
if($opt_themes['ex_themes_home_style_2_activate_']) {
$full							= 'thumbnails-post'; 
} else {
$full							= 'thumbnails-post-old'; 
}
$poster_urls					= wp_get_attachment_image_src($poster_ids, $full, true); 
$poster_imgs					= $poster_urls[0];
 
$background_on					= $opt_themes['ex_themes_backgrounds_activate_'];
$ukuran							= '=w1400';
$random							= mt_rand(0, 2); 
$full							= 'thumbnails-post-bg'; 
$thumbnails_bg 					= wp_get_attachment_image_src(get_post_meta( $post->ID, 'background_images', true),$full);


$appname_on						= $opt_themes['ex_themes_title_appname'];  
$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt						= get_the_title();

?>
 


<div id="content" class="site-content">

	<div class="container">
		<?php if($sidebar_on) { ?><div class="row <?php if($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?> ml-5 <?php } ?>"><?php } ?>
			<?php if($sidebar_on) { ?><main id="primary" class="col-12 <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>mr-4 ml-auto col-lg-7 <?php } else { ?>col-lg-8 <?php } ?> content-area"><?php } else { ?><main id="primary" <?php if($style_2_on) { ?>class="content-area"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
			<?php if($style_2_on) { ?><section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pb-3 pt-3 px-2 px-md-3 mb-3 mx-auto" style="max-width: <?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { } ?>
			<ul id="breadcrumb" class="breadcrumb pb-3 <?php if($rtl_on){ ?>ml-3<?php } else{ ?><?php } ?>" style="margin-bottom: 10px;">
				<li class="breadcrumb-item home"><a href="<?php echo home_url(); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
				<li class="breadcrumb-item item-cat"><?php echo get_the_category_list( '<li class="breadcrumb-item item-cat">', '</li>', $post->ID ); ?></li>				
				<?php if($title_ps){ ?><li class="breadcrumb-item item-cat" ><a href="<?php the_permalink() ?>"><?php echo ucwords($title_ps); ?></a></li> <?php } ?>
				<li class="breadcrumb-item"><a href="<?php the_permalink() ?>download/"><?php if($text_download){ ?><?php echo $text_download; ?><?php } ?></a></li>
			</ul>
				<?php  
				if($background_on) { get_template_part('include/background'); } ?>	
				
			 <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
				<div class="mb-3 entry-content">
					<p>
					<?php 
					global $opt_themes; if($opt_themes['exthemes_download_thanks']){ echo $opt_themes['exthemes_download_thanks']; } ?> <em><strong><?php echo ucwords($title_ps); ?></strong></em> <?php global $opt_themes; if($opt_themes['exthemes_download_site']){ echo $opt_themes['exthemes_download_site'];}  
					?>
					</p>
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
				<time class="text-muted d-block " datetime='<?php echo $x_time; ?>'><em><b><?php echo ucfirst($display_name); ?></b>, <?php echo get_the_time('F j, Y '); echo edit_post_link( __( $text_edit_post, THEMES_NAMES ), ' ', ' ' ); ?></em></time>
				<?php } ?>
				</div>
				</div>
				<?php }} ?>  
				
				<div class="mb-3" style='display:none'>
					<?php ex_themes_poster_img_sliders_(); ?>
				</div>
				<?php if($style_2_on) { } else { ?>
				<h2 class="h5 font-weight-semibold mb-3"><?php if($text_download){ echo $text_download; } ?> <?php echo get_the_title(); ?></h2>
				<?php } ?>
				<div class="mb-3">
					<?php ex_themes_banner_single_ads_download(); ?>
				</div> 
				
<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!-- moddroid -->
<div id="accordion" class="accordion-container mb-2">
 
<?php if($downloadlink) { ?> 
<?php if($downloadlink){
$i 					= 1;
foreach($downloadlink as $k => $dw){
$mask_link			= mask_link($dw['url']);
$unmask_link		= mask_link($dw['url'], 'd');
?> 
<!-- downloadlink <?php echo $i; ?> -->
  <h4 class="accordion-title js-accordion-title mt-2"> <?php if($dw['name']){ ?><?php echo $dw['name']; ?><?php } else{ ?> <?php if($text_download){ ?><?php echo $text_download; ?><?php } ?> <?php } ?></h4>
  <div class="accordion-content p-3 ">
		<?php if($dw['notes']){?>
		<div class="small bg-light p-2 mb-3"><?php echo $dw['notes']; ?></div>
		<?php } ?>
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($dw['url'])) ? $dw['url'] : ''; ?><?php } ?><?php if($dw['sizes1']){ ?>&sizes=<?php echo $dw['sizes1']; ?><?php } ?><?php if($dw['name']){ ?>&names=<?php echo $dw['name']; ?><?php } ?>" target="_blank" rel="nofollow" ><?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?><span class="align-middle"><?php if($text_download){ ?><?php echo $text_download; ?><?php } ?> <?php if($dw['tipes']){ ?> <?php echo $dw['tipes']; ?><?php } else{ ?>  <?php } ?> <?php if($dw['sizes1']){ ?>  ( <?php echo $dw['sizes1']; ?> ) <?php } else{ ?> (<?php echo $sizes; ?>) <?php } ?></span>
	</a>   
  </div>
   
<?php $i++; } }  ?>
   
<?php } elseif ($download3) { ?>
<?php 
$i				= 0;
if(count($download3)>0){
foreach($download3 as $elemento){
$download31		= $download3[$i];
$download32		= $download3[$i];
$mask_link		= mask_link($download3[$i]);
$unmask_link	= mask_link($download3[$i], 'd');
?>
<!-- download3 -->
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $i; ?>"> 
  <?php if($namedownload3[$i]){ ?><?php echo (!empty($namedownload3[$i])) ? $namedownload3[$i] : ''; ?> <?php } else{ ?> <?php } ?>
  </h4>
  <div class="accordion-content p-3 ">
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php } ?><?php if($namedownload3[$i]){ ?>&names=<?php echo $namedownload3[$i]; ?><?php } ?>" target="_blank" rel="nofollow" >
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	
	<span class="align-middle">
	<?php if($text_download){ ?><?php echo $text_download; ?><?php } ?> <?php if($namedownload3[$i]){ ?><?php echo (!empty($namedownload3[$i])) ? $namedownload3[$i] : ''; ?> <?php } else{ ?> <?php } ?> <?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : ''; ?>
	</span>
	</a>   
  </div>
<!-- end download3 -->
<?php $i++; } ?>
<?php } ?> 
<?php } elseif ($download2) { ?>
<?php
$download2			= get_post_meta(get_the_ID(), 'wp_downloadlink', true);
$mask_link			= mask_link($download2);
$unmask_link		= mask_link($download2, 'd');
?>
<!-- download2 -->
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $i; ?>"> 
  <?php echo (!empty($namedownload2)) ? $namedownload2 : ' '; ?>
  </h4>
  <div class="accordion-content p-3 ">
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download2)) ? $download2 : ''; ?><?php } ?><?php if($namedownload2){ ?>&names=<?php echo $namedownload2; ?><?php } ?>" target="_blank" rel="nofollow" >
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	
	<span class="align-middle">
	<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?>  (<?php echo $sizes; ?>) <?php } else{ ?> <?php } ?>
	</span>
	</a>   
  </div>
<!-- end download2 -->
<?php } elseif ($downloadlink_gma) { ?>
<?php if ($downloadlink_gma) { 
$mask_link			= mask_link($downloadlink_gma);
$unmask_link		= mask_link($downloadlink_gma, 'd');
?>
<!-- link 1 -->
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $i; ?>"> 
  <?php echo $namedownloadlink_gma; ?>
  </h4>
  <div class="accordion-content p-3 ">
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php } ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } ?>" target="_blank" rel="nofollow" >
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	
	<span class="align-middle">
	<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php if($sizedownloadlink_gma){ ?> (<?php echo $sizedownloadlink_gma; ?>) <?php } else{ ?> <?php } ?>
	</span>
	</a>   
  </div>
<!-- end link 1 -->
<?php if($downloadlink_gma_1) { 
$mask_link			= mask_link($downloadlink_gma_1);
$unmask_link		= mask_link($downloadlink_gma_1, 'd');
?>
<!-- link 2 --> 
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $i; ?>"> 
  <?php echo $namedownloadlink_gma_1; ?>
  </h4>
  <div class="accordion-content p-3 ">
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php } ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } ?>" target="_blank" rel="nofollow" >
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	
	<span class="align-middle">
	<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php if($sizedownloadlink_gma_1){ ?> (<?php echo $sizedownloadlink_gma_1; ?>) <?php } else{ ?> <?php } ?>
	</span>
	</a>   
  </div>
<!-- end link 2 -->
<?php } if($downloadlink_gma_2) { 
$mask_link			= mask_link($downloadlink_gma_2);
$unmask_link		= mask_link($downloadlink_gma_2, 'd');
?>
<!-- link 3 -->
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $i; ?>"> 
  <?php echo $namedownloadlink_gma_2; ?>
  </h4>
  <div class="accordion-content p-3 ">
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php } ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } ?>" target="_blank" rel="nofollow" >
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	
	<span class="align-middle">
	<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php if($sizedownloadlink_gma_2){ ?> (<?php echo $sizedownloadlink_gma_2; ?>) <?php } else{ ?> <?php } ?>
	</span>
	</a>   
  </div>
<!-- end link 3 -->
<?php } if($downloadlink_gma_3) { 
$mask_link			= mask_link($downloadlink_gma_3);
$unmask_link		= mask_link($downloadlink_gma_3, 'd');
?>
<!-- link 4 -->
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $i; ?>"> 
  <?php echo $namedownloadlink_gma_3; ?>
  </h4>
  <div class="accordion-content p-3 ">
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php } ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } ?>" target="_blank" rel="nofollow" >
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	
	<span class="align-middle">
	<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php if($sizedownloadlink_gma_3){ ?> (<?php echo $sizedownloadlink_gma_3; ?>) <?php } else{ ?> <?php } ?>
	</span>
	</a>   
  </div>
<!-- end link 4 -->
<?php } if($downloadlink_gma_4) { 
$mask_link			= mask_link($downloadlink_gma_4);
$unmask_link		= mask_link($downloadlink_gma_4, 'd');
?>
<!-- link 5 -->
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $i; ?>"> 
  <?php echo $namedownloadlink_gma_4; ?>
  </h4>
  <div class="accordion-content p-3 ">
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php } ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } ?>" target="_blank" rel="nofollow" >
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	
	<span class="align-middle">
	<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php if($sizedownloadlink_gma_4){ ?> (<?php echo $sizedownloadlink_gma_4; ?>) <?php } else{ ?> <?php } ?>
	</span>
	</a>   
  </div>
<!-- end link 5 -->
<?php } if($downloadlink_gma_5) { 
$mask_link			= mask_link($downloadlink_gma_5);
$unmask_link		= mask_link($downloadlink_gma_5, 'd');
?>
<!-- link 6 -->
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $i; ?>"> 
  <?php echo $namedownloadlink_gma_5; ?>
  </h4>
  <div class="accordion-content p-3 ">
	<a class="btn btn-secondary btn-block text-left " href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php } ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } ?>" target="_blank" rel="nofollow" >
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	
	<span class="align-middle">
	<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php if($sizedownloadlink_gma_5){ ?> (<?php echo $sizedownloadlink_gma_5; ?>) <?php } else{ ?> <?php } ?>
	</span>
	</a>   
  </div>
<!-- end link 6 -->
<?php } ?>
<?php } ?>
<?php } ?> 
    </div>       
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(function () { 
  $(".accordion-content:not(:first-of-type)").css("display", "none"); 
  $(".js-accordion-title:first-of-type").addClass("open");
  $(".js-accordion-title").click(function () {
    $(".open").not(this).removeClass("open").next().slideUp(300);
    $(this).toggleClass("open").next().slideToggle(300);
  });
});
</script>
 
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
<!-- modyolo dan Reborns -->
				<?php if($downloadlink) { ?>
				<?php if($style_2_on) { ?><div id="accordion-versions" class="accordion mb-3"> <?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?><div class=" rounded mb-2"><?php } else { ?><div class="mb-3"><?php } ?> 
				<?php if($downloadlink){
				foreach($downloadlink as $k => $dw){
				$mask_link			= mask_link($dw['url']);
				$unmask_link		= mask_link($dw['url'], 'd'); ?>
				<!--if any put download link will show-->			
				<?php if($style_2_on) { ?> 
		
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-<?php echo $k; ?>">
				<span><?php if($dw['name']){ ?><?php echo $dw['name']; ?><?php } else{ ?> <?php if($text_download){ ?><?php echo $text_download; ?><?php } ?> <?php } ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php if($dw['tipes']){ ?> <?php echo $dw['tipes']; ?><?php } else{ ?>  <?php } ?></span> - <?php if($dw['sizes1']){ ?> <?php echo $dw['sizes1']; ?> <?php } else{ ?> (<?php echo $sizes; ?>) <?php } ?>
				</span>
				<?php } ?>
				</a>
				<div id="download-<?php echo $i; ?>" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?>
				<?php if($dw['notes']){?>
				<div class="small bg-light"><?php echo $dw['notes']; ?></div>
				<?php } ?>
				<div class="p-3"> 
				<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($dw['url'])) ? $dw['url'] : ''; ?><?php } ?><?php if($dw['sizes1']){ ?>&sizes=<?php echo $dw['sizes1']; ?><?php } ?><?php if($dw['name']){ ?>&names=<?php echo $dw['name']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php if($dw['tipes']){ ?> <?php echo $dw['tipes']; ?><?php } else{ ?>  <?php } ?> </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($dw['sizes1']){ ?> (<?php echo $dw['sizes1']; ?>) <?php } else{ ?> (<?php echo $sizes; ?>) <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"><?php if($dw['tipes']){ ?> <?php echo $dw['tipes']; ?><?php } else{ ?>  <?php } ?></span>
				<?php if($dw['sizes1']){ ?> <?php echo $dw['sizes1']; ?> <?php } else{ ?> (<?php echo $sizes; ?>) <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>

				<?php } else { ?> 
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-<?php echo $k; ?>">
				<span style='text-transform:capitalize'><?php if($dw['name']){ ?><?php echo $dw['name']; ?><?php } else{ ?> <?php if($text_download){ ?><?php echo $text_download; ?><?php } ?> <?php } ?> </span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"><?php if($dw['tipes']){ ?> <?php echo $dw['tipes']; ?><?php } else{ ?>  <?php } ?></span> - <?php if($dw['sizes1']){ ?> <?php echo $dw['sizes1']; ?> <?php } else{ ?>  (<?php echo $sizes; ?>) <?php } ?></span>
				</a>
				<div id="download-<?php echo $i; ?>" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($dw['url'])) ? $dw['url'] : ''; ?><?php } ?><?php if($dw['sizes1']){ ?>&sizes=<?php echo $dw['sizes1']; ?><?php } ?><?php if($dw['name']){ ?>&names=<?php echo $dw['name']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"><?php if($dw['tipes']){ ?> <?php echo $dw['tipes']; ?><?php } else{ ?>  <?php } ?></span>
				<?php if($dw['sizes1']){ ?> (<?php echo $dw['sizes1']; ?>) <?php } else{ ?> (<?php echo $sizes; ?>) <?php } ?>
				</span>
				</a>
				</div>
				<?php } ?>
				
				<?php $i++; } }  ?>
				<?php if($style_2_on) { ?> </div><?php } else { ?></div><?php } ?>				 
				<?php if($style_2_on) { ?> </div><?php } else { ?></div> <?php } ?>
				 
				<!--end if any put download link will show-->
				
				<?php } elseif ($download3) { ?>
				<?php if($style_2_on) { ?><div id="accordion-versions" class="accordion mb-3"> <?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?><div class=" rounded mb-2"><?php } else { ?><div class="mb-3"><?php } ?> 
				<?php 
				$i				= 0;
				if(count($download3)>0){
				foreach($download3 as $elemento){
				$download31		= $download3[$i];
				$download32		= $download3[$i];
				$mask_link		= mask_link($download3[$i]);
				$unmask_link	= mask_link($download3[$i], 'd');
				?>
				<!--if not put download link will using default-->
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-<?php echo $i; ?>">
				<span><?php if($namedownload3[$i]){ ?><?php echo (!empty($namedownload3[$i])) ? $namedownload3[$i] : ''; ?> <?php } else{ ?> <?php } ?> </span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : 'APK'; ?></span>
				</span>
				<?php } ?>
				</a>
				<div id="download-<?php echo $i; ?>" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php } ?><?php if($namedownload3[$i]){ ?>&names=<?php echo $namedownload3[$i]; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : ''; ?> </span> 
				</span>
				<span class="text-muted d-block ml-auto"> </span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php } ?><?php if($namedownload3[$i]){ ?>&names=<?php echo $namedownload3[$i]; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"><?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : 'APK'; ?></span>
				</span>
				</a>
				<?php } ?> 
				</div>
				<?php $i++; } } ?> 
				<?php if($style_2_on) { ?></div><?php } else { ?></div><?php } ?>
				<?php if($style_2_on) { ?></div><?php } else { ?></div><?php } ?>				 
				<!--end if not put download link will using default-->
				
				<?php } elseif ($download2) { 
				$download2			= get_post_meta(get_the_ID(), 'wp_downloadlink', true);
				$mask_link			= mask_link($download2);
				$unmask_link		= mask_link($download2, 'd');
				?>
				<?php if($style_2_on) { ?><div id="accordion-versions" class="accordion mb-3"> <?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?><div class=" rounded mb-2"><?php } else { ?><div class="mb-3"><?php } ?>
				<!--link happymood here-->				
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-<?php echo $i; ?>">
				<span><?php echo (!empty($namedownload2)) ? $namedownload2 : ' '; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : ' '; ?></span> - <?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?>  (<?php echo $sizes; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-<?php echo $i; ?>" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?><div class="p-3"><?php } else { ?><?php } ?>
				<a id="no-link" <?php if($style_2_on) { ?>class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;"<?php } else { ?>class="btn btn-secondary px-5"<?php } ?> href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download2)) ? $download2 : ''; ?><?php } ?><?php if($namedownload2){ ?>&names=<?php echo $namedownload2; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span <?php if($style_2_on) { ?>class="d-block"<?php } else { ?>class="align-middle whites"<?php } ?>>
				<span class="text-uppercase d-block"><?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : 'APK'; ?></span> </span>
				<span class="text-muted d-block ml-auto"><?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?>  (<?php echo $sizes; ?>) <?php } else { ?> -mb <?php } ?></span>
				</a>
				<?php if($style_2_on) { ?></div><?php } else { ?><?php } ?>
				</div>
				<?php if($style_2_on) { ?></div><?php } else { ?></div><?php } ?>
				<?php if($style_2_on) { ?></div><?php } else { ?></div><?php } ?>	
				<!--end link happymood here-->				
				
				<?php } elseif ($downloadlink_gma) { ?>
				
				<?php if($style_2_on) { ?><div id="accordion-versions" class="accordion mb-3"> <?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?><div class=" rounded mb-2"><?php } else { ?><div class="mb-3"><?php } ?>

				<?php if ($downloadlink_gma) { 
				$mask_link			= mask_link($downloadlink_gma);
				$unmask_link		= mask_link($downloadlink_gma, 'd');
				?>
				<!-- link 1 -->
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-0">
				<span><?php echo $namedownloadlink_gma; ?></span>
				<?php if($style_2_on) { ?><?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma){ ?> -  <?php echo $sizedownloadlink_gma; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-0" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php } ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma){ ?> -  <?php echo $sizedownloadlink_gma; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php } ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma){ ?> -  <?php echo $sizedownloadlink_gma; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
						
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-0">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span> - <?php if($sizedownloadlink_gma){ ?> (<?php echo $sizedownloadlink_gma; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-0" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php } ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php if($sizedownloadlink_gma){ ?> (<?php echo $sizedownloadlink_gma; ?>) <?php } else{ ?> <?php } ?>
				</span>
				</a>
				</div> 
				<?php } ?>  
				<!-- end link 1 -->
				<?php if($downloadlink_gma_1) { 
				$mask_link			= mask_link($downloadlink_gma_1);
				$unmask_link		= mask_link($downloadlink_gma_1, 'd');
				?>
				<!-- link 2 --> 
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-1">
				<span><?php echo $namedownloadlink_gma_1; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_1){ ?> -  <?php echo $sizedownloadlink_gma_1; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-1" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php } ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_1){ ?> -  <?php echo $sizedownloadlink_gma_1; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php } ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_1){ ?> -  <?php echo $sizedownloadlink_gma_1; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				 			
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-1">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_1; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_1){ ?> (<?php echo $sizedownloadlink_gma_1; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-1" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php } ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php if($sizedownloadlink_gma_1){ ?> (<?php echo $sizedownloadlink_gma_1; ?>) <?php } else{ ?> <?php } ?>
				</span>
				</a>
				</div>
				<?php } ?> 
				<!-- end link 2 -->
				<?php } ?> 
				
				
				<?php if($downloadlink_gma_2) { 
				$mask_link			= mask_link($downloadlink_gma_2);
				$unmask_link		= mask_link($downloadlink_gma_2, 'd');
				?>
				<!-- link 3 -->
				 
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-2">
				<span><?php echo $namedownloadlink_gma_2; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_2){ ?> -  <?php echo $sizedownloadlink_gma_2; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-2" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php } ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_2){ ?> -  <?php echo $sizedownloadlink_gma_2; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php } ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_2){ ?> -  <?php echo $sizedownloadlink_gma_2; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
			 
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-2">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_2; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_2){ ?> (<?php echo $sizedownloadlink_gma_2; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-2" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php } ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php if($sizedownloadlink_gma_2){ ?> (<?php echo $sizedownloadlink_gma_2; ?>) <?php } else{ ?> <?php } ?>
				</span>
				</a>
				</div>
				
				<?php } ?> 
				<!-- end link 3 -->
				<?php } ?> 
				
				<?php if($downloadlink_gma_3) { 
				$mask_link			= mask_link($downloadlink_gma_3);
				$unmask_link		= mask_link($downloadlink_gma_3, 'd');
				?>
				<!-- link 4 -->
				 
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-3">
				<span><?php echo $namedownloadlink_gma_3; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_3){ ?> -  <?php echo $sizedownloadlink_gma_3; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-3" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php } ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_3){ ?> -  <?php echo $sizedownloadlink_gma_3; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php } ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_3){ ?> -  <?php echo $sizedownloadlink_gma_3; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				 
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-3">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_3; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_3){ ?> (<?php echo $sizedownloadlink_gma_3; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-3" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php } ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php if($sizedownloadlink_gma_3){ ?> (<?php echo $sizedownloadlink_gma_3; ?>) <?php } else{ ?> <?php } ?>
				</span>
				</a>
				</div>				
				<?php } ?> 
				<!-- end link 4 -->
				<?php } ?> 
				
				<?php if($downloadlink_gma_4) { 
				$mask_link			= mask_link($downloadlink_gma_4);
				$unmask_link		= mask_link($downloadlink_gma_4, 'd');
				?>
				<!-- link 5 -->
				 
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-4">
				<span><?php echo $namedownloadlink_gma_4; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_4){ ?> -  <?php echo $sizedownloadlink_gma_4; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-4" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php } ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_4){ ?> -  <?php echo $sizedownloadlink_gma_4; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php } ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_4){ ?> -  <?php echo $sizedownloadlink_gma_4; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				 
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-4">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_4; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_4){ ?> (<?php echo $sizedownloadlink_gma_4; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-4" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php } ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php if($sizedownloadlink_gma_4){ ?> (<?php echo $sizedownloadlink_gma_4; ?>) <?php } else{ ?> <?php } ?>
				</span>
				</a>
				</div>
				
				<?php } ?> 
				<!-- end link 5 -->
				<?php } ?> 
				
				<?php if($downloadlink_gma_5) { 
				$mask_link			= mask_link($downloadlink_gma_5);
				$unmask_link		= mask_link($downloadlink_gma_5, 'd');
				?>
				<!-- link 6 -->
				 
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mt-1 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-5">
				<span><?php echo $namedownloadlink_gma_5; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_5){ ?> -  <?php echo $sizedownloadlink_gma_5; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-5" class="collapse" data-parent="#accordion-versions">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php } ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_5){ ?> -  <?php echo $sizedownloadlink_gma_5; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php } ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_5){ ?> -  <?php echo $sizedownloadlink_gma_5; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				 			
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-5">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_5; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_5){ ?> (<?php echo $sizedownloadlink_gma_5; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-5" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php } ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php if($sizedownloadlink_gma_5){ ?> (<?php echo $sizedownloadlink_gma_5; ?>) <?php } else{ ?> <?php } ?>
				</span>
				</a>
				</div>
				
				<?php } ?> 
				<!-- end link 6 -->
				<?php } ?> 
				
				
				
				
				<!-- end download link gma -->
				<?php } ?>
				
				<?php if($style_2_on) { ?></div><?php } else { ?></div><?php } ?>
				<?php if($style_2_on) { ?></div><?php } else { ?></div><?php } ?>	
				<?php } ?>
 
				 
				
				<?php if($link_playstore_on) { ?>		
				<!--download link original -->
				<?php 
				$linkoriginal		= get_post_meta(get_the_ID(), 'wp_downloadapkxapkpremier', true);
				$linkoriginal_alt	= get_post_meta( $post->ID, 'wp_downloadapkxapkg', true );
				//if ( $linkoriginal === FALSE or $linkoriginal == '' ) $linkoriginal = $linkoriginal_alt;
				if ($linkoriginal) {  ?>
				<!--download link from apkpremier-->
				<div id="download" class="download-body" >
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-originalapksite">
				<span><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?><?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php _e('apk', THEMES_NAMES); ?></span> - <?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> -  <?php echo $sizes; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a> 
				<div id="download-originalapksite" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $linkoriginal; ?><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?>&names=<?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php _e('apk', THEMES_NAMES); ?> </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> <?php echo $sizes; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $linkoriginal_alt; ?><?php } ?><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?>&names=<?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"><?php _e('apk', THEMES_NAMES); ?></span>
				<?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> <?php echo $sizes; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>


				<?php } else { ?> 
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-originalapksite">
				<span><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?><?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?> </span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase" > </span>
				<?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> <?php echo $sizes; ?> <?php } else{ ?> <?php } ?> </span>
				</a>
				<div id="download-originalapksite" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo get_post_meta(get_the_ID(), 'wp_downloadapkxapkpremier', true); ?><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?>&names=<?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?><?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?> 
				</span>
				</a>
				</div>
				<?php } ?>
				<?php if($style_2_on) { ?></div></div> <?php } else { ?></div> <?php } ?>
				<?php } else { ?> 
				 
				<div id="download" class="download-body" >
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-originalapksite">
				<span><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?><?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php _e('apk', THEMES_NAMES); ?></span> - <?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> -  <?php echo $sizes; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				
				<div id="download-originalapksite" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $linkoriginal_alt; ?><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?>&names=<?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php _e('apk', THEMES_NAMES); ?> </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> -  <?php echo $sizes; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $linkoriginal_alt; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"><?php _e('apk', THEMES_NAMES); ?></span>
				<?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> -  <?php echo $sizes; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				<?php if($style_2_on) { ?></div></div> <?php } else { ?></div> <?php } ?>

				<?php } else { ?> 
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-originalapksite">
				<span><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?><?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?> </span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase" > </span>
				<?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> -  <?php echo $sizes; ?> <?php } else{ ?> <?php } ?> </span>
				</a>
				<div id="download-originalapksite" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo get_post_meta(get_the_ID(), 'wp_downloadapkxapkpremier', true); ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?><?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?> 
				</span>
				</a>
				</div>	
				<?php }  } ?>				
				<!--end download link original -->	
				<?php } ?>
			
				
				
				<?php if(get_post_meta(get_the_ID(), 'link_download_apksupport', true)) { 
				$link_decode				= mask_link(get_post_meta(get_the_ID(), 'link_download_apksupport', true));	
				?>				
				<div id="download boks_download" class="download-body" >
				<?php if($styles_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
					
				<?php if($styles_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
							
				<?php if($styles_2_on) { ?> 
				<a class="<?php if($styles_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler<?php } else { ?>h6 font-weight-semibold d-flex mb-2<?php } ?>" data-toggle="collapse" href="#download-originalapk-site" aria-expanded="true">
				<span><?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?></span>
				<?php if($styles_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?></span> - <?php echo get_post_meta(get_the_ID(), 'size_download_apksupport', true); ?>
				</span>
				<?php } ?>
				</a> 
				<div id="download-originalapk-site" class="collapse show" data-parent="#accordion-downloads">
				<?php if($styles_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>/file/?urls=<?php echo $link_decode; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo get_post_meta(get_the_ID(), 'link_download_apksupport', true); ?><?php } ?>&names=<?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>.<?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?>" target="_blank">
				<?php if($svg_download) { ?><?php echo $svg_download; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php global $opt_themes; if($opt_themes['exthemes_Download']) { ?><?php echo $opt_themes['exthemes_Download']; ?><?php } ?> <?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?> </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php echo get_post_meta(get_the_ID(), 'size_download_apksupport', true); ?></span>
				</a> 
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>/file/?urls=<?php echo $link_decode; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo get_post_meta(get_the_ID(), 'link_download_apksupport', true); ?><?php } ?>&names=<?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>.<?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?>" target="_blank">
				<?php if($svg_download) { ?><?php echo $svg_download; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"><?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?></span>
				<?php echo get_post_meta(get_the_ID(), 'size_download_apksupport', true); ?>
				</span>
				</a>
				<?php } ?> 
				</div>


				<?php } else { ?> 
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-originalapk-site">
				<span><?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?> </span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase" > </span>
				<?php echo get_post_meta(get_the_ID(), 'size_download_apksupport', true); ?> </span>
				</a>
				<div id="download-originalapk-site" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>/file/?urls=<?php echo $link_decode; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo get_post_meta(get_the_ID(), 'link_download_apksupport', true); ?><?php } ?>&names=<?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>.<?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?>" target="_blank">
				<?php if($svg_download) { ?><?php echo $svg_download; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>
				</span>
				</a>
				</div>
				<?php } ?>
				<?php if($styles_2_on) { ?></div></div><?php } else { ?></div> <?php } ?>
				
				<?php } ?>
			
			
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!-- modyolo --> 

<div id="accordion" class="accordion-container mb-2">
				<?php if($downloadlink) { ?>
				 
				<?php if($downloadlink){
				foreach($downloadlink as $k => $dw){
				$mask_link			= mask_link($dw['url']);
				$unmask_link		= mask_link($dw['url'], 'd'); ?>
				<!--if any put download link will show-->			
				 
  <h4 class="accordion-title js-accordion-title mt-2 tabs-<?php echo $k; ?>"> 
  <?php if($dw['name']){ ?><?php echo $dw['name']; ?><?php } ?>
  </h4>
  <div class="accordion-content p-3 ">
	<?php if($dw['notes']){?>
	<div class="small"><?php echo $dw['notes']; ?></div>
	<?php } ?>
	<div class="p-3">
	<a id="no-link" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($dw['url'])) ? $dw['url'] : ''; ?><?php } ?><?php if($dw['sizes1']){ ?>&sizes=<?php echo $dw['sizes1']; ?><?php } ?><?php if($dw['name']){ ?>&names=<?php echo $dw['name']; ?><?php } ?>" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" target="_blank">
	<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
	<span class="d-block pl-2">
	<span class="text-uppercase d-block">
	<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  <?php if($dw['tipes']){ ?> <?php echo $dw['tipes']; ?><?php } else { ?>  <?php } ?>
	</span> 
	<?php if($dw['name']){ ?>
	<span class="text-muted d-block">
	<?php echo $dw['name']; ?>
	</span>
	<?php } ?>
	</span>
	<span class="text-muted d-block ml-auto"><?php if($dw['sizes1']){ ?> <?php echo $dw['sizes1']; ?> <?php } else{ ?> (<?php echo $sizes; ?>) <?php } ?></span>
	</a>
	</div>
		  
  </div>
				
				<?php $i++; } }  ?>
				 
				 
				<!--end if any put download link will show-->
				
				<?php } elseif ($download3) { ?>
 
				<?php 
				$i				= 0;
				if(count($download3)>0){
				foreach($download3 as $elemento){
				$download31		= $download3[$i];
				$download32		= $download3[$i];
				$mask_link		= mask_link($download3[$i]);
				$unmask_link	= mask_link($download3[$i], 'd');
				?>
				<!--if not put download link will using default-->
				<h4 class="accordion-title js-accordion-title mt-2 "> 
				<?php if($namedownload3[$i]){ ?><?php echo (!empty($namedownload3[$i])) ? $namedownload3[$i] : ''; ?> <?php } else{ ?> <?php } ?>
				</h4>
				<div class="accordion-content p-3 ">		  
					<div class="p-3">
					<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php } ?><?php if($namedownload3[$i]){ ?>&names=<?php echo $namedownload3[$i]; ?><?php } ?>"  target="_blank">
					<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
					<span class="d-block pl-2">
					<span class="text-uppercase d-block">
					<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
					</span>
					</span>
					<span class="text-muted d-block ml-auto">
					
					</span>
					</a>
					</div>
				</div> 
				<?php $i++; } } ?>  				 
				<!--end if not put download link will using default-->
				
				<?php } elseif ($download2) { 
				$download2			= get_post_meta(get_the_ID(), 'wp_downloadlink', true);
				$mask_link			= mask_link($download2);
				$unmask_link		= mask_link($download2, 'd');
				?>	
				<!--link happymood here-->										 
				<h4 class="accordion-title js-accordion-title mt-2"> 
				<?php echo (!empty($namedownload2)) ? $namedownload2 : ' '; ?>
				</h4>
				<div class="accordion-content p-3">				  
					<div class="p-3">
					<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download2)) ? $download2 : ''; ?><?php } ?><?php if($namedownload2){ ?>&names=<?php echo $namedownload2; ?><?php } ?>"  target="_blank">
					<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
					<span class="d-block pl-2">
					<span class="text-uppercase d-block">
					<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  <?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : ' '; ?> 
					</span> 					 
					</span>
					<span class="text-muted d-block ml-auto">
					<?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> <?php echo get_post_meta( $post->ID, 'wp_sizes', true ); ?><?php } else { ?> - mb <?php } ?>
					</span>
					</a>
					</div>						  
				</div>
				<!--end link happymood here-->
				<?php } elseif ($downloadlink_gma) {
				if ($downloadlink_gma) { 
				$mask_link			= mask_link($downloadlink_gma);
				$unmask_link		= mask_link($downloadlink_gma, 'd');
				?>
				<!-- link 1 -->											 
				<h4 class="accordion-title js-accordion-title mt-2 "> 
				<?php echo $namedownloadlink_gma; ?>
				</h4>
				<div class="accordion-content p-3 ">
					<div class="p-3">
					<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php } ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } ?>"  target="_blank">
					<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
					<span class="d-block pl-2">
					<span class="text-uppercase d-block">
					<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
					</span>
					</span>
					<span class="text-muted d-block ml-auto">
					<?php if($sizedownloadlink_gma){ echo $sizedownloadlink_gma; } ?>
					</span>
					</a>
					</div>
				</div>
				<!-- end link 1 -->
				<?php if($downloadlink_gma_1) {
				$mask_link			= mask_link($downloadlink_gma_1);
				$unmask_link		= mask_link($downloadlink_gma_1, 'd');
				?>
				<!-- link 2 -->
				<h4 class="accordion-title js-accordion-title mt-2 "> 
				<?php echo $namedownloadlink_gma_1; ?>
				</h4>
				<div class="accordion-content p-3 ">
					<div class="p-3">
					<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php } ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } ?>"  target="_blank">
					<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
					<span class="d-block pl-2">
					<span class="text-uppercase d-block">
					<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
					</span>
					</span>
					<span class="text-muted d-block ml-auto">
					<?php if($sizedownloadlink_gma_1){ echo $sizedownloadlink_gma_1; } ?>
					</span>
					</a>
					</div>
				</div>
				<!-- end link 2 -->
				<?php } if($downloadlink_gma_2) { 
				$mask_link			= mask_link($downloadlink_gma_2);
				$unmask_link		= mask_link($downloadlink_gma_2, 'd');
				?>
				<!-- link 3 -->											 
				<h4 class="accordion-title js-accordion-title mt-2 "> 
				<?php echo $namedownloadlink_gma_2; ?>
				</h4>
				<div class="accordion-content p-3 ">
					<div class="p-3">
					<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php } ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } ?>"  target="_blank">
					<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
					<span class="d-block pl-2">
					<span class="text-uppercase d-block">
					<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
					</span>
					</span>
					<span class="text-muted d-block ml-auto">
					<?php if($sizedownloadlink_gma_2){ echo $sizedownloadlink_gma_2; } ?>
					</span>
					</a>
					</div>
				</div>
				<!-- end link 3 -->
				<?php } if($downloadlink_gma_3) { 
				$mask_link			= mask_link($downloadlink_gma_3);
				$unmask_link		= mask_link($downloadlink_gma_3, 'd');
				?>
				<!-- link 4 -->											 
				<h4 class="accordion-title js-accordion-title mt-2 "> 
				<?php echo $namedownloadlink_gma_3; ?>
				</h4>
				<div class="accordion-content p-3 ">
					<div class="p-3">
					<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php } ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } ?>"  target="_blank">
					<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
					<span class="d-block pl-2">
					<span class="text-uppercase d-block">
					<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
					</span>
					</span>
					<span class="text-muted d-block ml-auto">
					<?php if($sizedownloadlink_gma_3){ echo $sizedownloadlink_gma_3; } ?>
					</span>
					</a>
					</div>
				</div>
				<!-- end link 4 -->
				<?php } if($downloadlink_gma_4) { 
				$mask_link			= mask_link($downloadlink_gma_4);
				$unmask_link		= mask_link($downloadlink_gma_4, 'd');
				?>
				<!-- link 5 -->											 
				<h4 class="accordion-title js-accordion-title mt-2 "> 
				<?php echo $namedownloadlink_gma_4; ?>
				</h4>
				<div class="accordion-content p-3 ">				  
					<div class="p-3">
					<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php } ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } ?>"  target="_blank">
					<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
					<span class="d-block pl-2">
					<span class="text-uppercase d-block">
					<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
					</span>
					</span>
					<span class="text-muted d-block ml-auto">
					<?php if($sizedownloadlink_gma_4){ echo $sizedownloadlink_gma_4; } ?>
					</span>
					</a>
					</div>
				</div>
				<!-- end link 5 -->
				<?php } if($downloadlink_gma_5) { 
				$mask_link			= mask_link($downloadlink_gma_5);
				$unmask_link		= mask_link($downloadlink_gma_5, 'd');
				?>
				<!-- link 6 -->											 
				<h4 class="accordion-title js-accordion-title mt-2 "> 
				<?php echo $namedownloadlink_gma_5; ?>
				</h4>
				<div class="accordion-content p-3 ">
					<div class="p-3">
					<a id="no-link" class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php } ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } ?>"  target="_blank">
					<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
					<span class="d-block pl-2">
					<span class="text-uppercase d-block">
					<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
					</span>
					</span>
					<span class="text-muted d-block ml-auto">
					<?php if($sizedownloadlink_gma_5){ echo $sizedownloadlink_gma_5; } ?>
					</span>
					</a>
					</div>
				</div>
				<!-- end link 6 -->
				<?php } ?>
				<!-- end download link gma -->
				<?php } ?>
				<?php } ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(function () { 
  $(".accordion-content:not(:first-of-type)").css("display", "none"); 
  $(".js-accordion-title:first-of-type").addClass("open");
  $(".js-accordion-title").click(function () {
    $(".open").not(this).removeClass("open").next().slideUp(300);
    $(this).toggleClass("open").next().slideToggle(300);
  });
});
</script>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?> 
<div id="accordion-versions" class="accordion-container mb-2">
<!-- Reborns -->
<?php if($downloadlink) { ?> 
<?php if($downloadlink){
foreach($downloadlink as $k => $dw){
$mask_link			= mask_link($dw['url']);
$unmask_link		= mask_link($dw['url'], 'd');
?>
<!-- downloadlink -->			 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
		   <?php if($dw['name']){ echo $dw['name']; } ?>
		</h4>
		<div class="accordion-content p-3 ">
		<?php if($dw['notes']){?>
		<div class="small"><?php echo $dw['notes']; ?></div>
		<?php } ?>
				
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($dw['url'])) ? $dw['url'] : ''; ?><?php } ?><?php if($dw['sizes1']){ ?>&sizes=<?php echo $dw['sizes1']; ?><?php } ?><?php if($dw['name']){ ?>&names=<?php echo $dw['name']; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download){ echo $text_download; } if($dw['tipes']){ echo '&nbsp;'.$dw['tipes']; } ?>
			</span>
			</span> 
			<span class="text-white d-block ml-auto">
			<?php if($dw['sizes1']){ ?> <?php echo $dw['sizes1']; ?> <?php } else{ ?> (<?php echo $sizes; ?>) <?php } ?>
			</span>
			</a>
			</div>
		</div>
<?php $i++; } }  ?>
<?php } elseif ($download3) { ?>
<?php 
$i				= 0;
if(count($download3)>0){
foreach($download3 as $elemento){
$download31		= $download3[$i];
$download32		= $download3[$i];
$mask_link		= mask_link($download3[$i]);
$unmask_link	= mask_link($download3[$i], 'd');
?>
<!-- download3 -->
		 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
		<?php if($namedownload3[$i]){ ?><?php echo (!empty($namedownload3[$i])) ? $namedownload3[$i] : ''; ?> <?php } else{ ?> <?php } ?>
		</h4>
		<div class="accordion-content p-3 ">		  
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php } ?><?php if($namedownload3[$i]){ ?>&names=<?php echo $namedownload3[$i]; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : ''; ?>
			</span>
			</span>
			<span class="text-white d-block ml-auto">
			
			</span>
			</a>
			</div>
		</div>
<!-- end download3 -->
<?php $i++; } ?>
<?php } ?> 
<?php } elseif ($download2) { ?>
<?php
$download2			= get_post_meta(get_the_ID(), 'wp_downloadlink', true);
$mask_link			= mask_link($download2);
$unmask_link		= mask_link($download2, 'd');
?>
<!-- download2 -->
		 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
	 <?php echo (!empty($namedownload2)) ? $namedownload2 : ' '; ?>
		</h4>
		<div class="accordion-content p-3 ">		  
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download2)) ? $download2 : ''; ?><?php } ?><?php if($namedownload2){ ?>&names=<?php echo $namedownload2; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
			</span>
			</span>
			<span class="text-white d-block ml-auto">
			<?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> <?php echo $sizes; ?> <?php } else{ ?> <?php } ?>
			</span>
			</a>
			</div>
		</div>
<!-- end download2 -->


<?php } elseif ($downloadlink_gma) { ?>
<?php if ($downloadlink_gma) { 
$mask_link			= mask_link($downloadlink_gma);
$unmask_link		= mask_link($downloadlink_gma, 'd');
?>
<!-- link 1 -->
		 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
	 <?php echo $namedownloadlink_gma; ?>
		</h4>
		<div class="accordion-content p-3 ">		  
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php } ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
			</span>
			</span>
			<span class="text-white d-block ml-auto">
			<?php if($sizedownloadlink_gma){ ?> <?php echo $sizedownloadlink_gma; ?> <?php } else{ ?> <?php } ?>
			</span>
			</a>
			</div>
		</div>
<!-- end link 1 -->
<?php if($downloadlink_gma_1) { 
$mask_link			= mask_link($downloadlink_gma_1);
$unmask_link		= mask_link($downloadlink_gma_1, 'd');
?>
<!-- link 2 --> 
		 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
		<?php echo $namedownloadlink_gma_1; ?>
		</h4>
		<div class="accordion-content p-3 ">		  
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php } ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
			</span>
			</span>
			<span class="text-white d-block ml-auto">
			<?php if($sizedownloadlink_gma_1){ ?> <?php echo $sizedownloadlink_gma_1; ?> <?php } else{ ?> <?php } ?>
			</span>
			</a>
			</div>
		</div>
<!-- end link 2 -->
<?php } if($downloadlink_gma_2) { 
$mask_link			= mask_link($downloadlink_gma_2);
$unmask_link		= mask_link($downloadlink_gma_2, 'd');
?>
<!-- link 3 -->
		 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
		<?php echo $namedownloadlink_gma_2; ?>
		</h4>
		<div class="accordion-content p-3 ">		  
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php } ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
			</span>
			</span>
			<span class="text-white d-block ml-auto">
			<?php if($sizedownloadlink_gma_2){ ?> <?php echo $sizedownloadlink_gma_2; ?> <?php } else{ ?> <?php } ?>
			</span>
			</a>
			</div>
		</div>
<!-- end link 3 -->
<?php } if($downloadlink_gma_3) { 
$mask_link			= mask_link($downloadlink_gma_3);
$unmask_link		= mask_link($downloadlink_gma_3, 'd');
?>
<!-- link 4 -->
		 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
		<?php echo $namedownloadlink_gma_3; ?>
		</h4>
		<div class="accordion-content p-3 ">		  
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php } ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
			</span>
			</span>
			<span class="text-white d-block ml-auto">
			<?php if($sizedownloadlink_gma_3){ ?> <?php echo $sizedownloadlink_gma_3; ?> <?php } else{ ?> <?php } ?>
			</span>
			</a>
			</div>
		</div>
<!-- end link 4 -->
<?php } if($downloadlink_gma_4) { 
$mask_link			= mask_link($downloadlink_gma_4);
$unmask_link		= mask_link($downloadlink_gma_4, 'd');
?>
<!-- link 5 -->		 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
		<?php echo $namedownloadlink_gma_4; ?>
		</h4>
		<div class="accordion-content p-3 ">		  
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php } ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
			</span>
			</span>
			<span class="text-white d-block ml-auto">
			<?php if($sizedownloadlink_gma_4){ ?> <?php echo $sizedownloadlink_gma_4; ?> <?php } else{ ?> <?php } ?>
			</span>
			</a>
			</div>
		</div>
<!-- end link 5 -->
<?php } if($downloadlink_gma_5) { 
$mask_link			= mask_link($downloadlink_gma_5);
$unmask_link		= mask_link($downloadlink_gma_5, 'd');
?>
<!-- link 6 -->		 
		<h4 class="accordion-title js-accordion-title mt-2 "> 
		<?php echo $namedownloadlink_gma_5; ?>
		</h4>
		<div class="accordion-content p-3 ">		  
			<div class="p-3">
			<a id="no-link" class="btn btn-secondary btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem; cursor: pointer;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo $mask_link; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php } ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } ?>"  target="_blank">
			<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { echo $opt_themes['svg_icon_downloadx'];  } ?>
			<span class="d-block pl-2">
			<span class="text-uppercase d-block">
			<?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> 
			</span>
			</span>
			<span class="text-white d-block ml-auto">
			<?php if($sizedownloadlink_gma_5){ ?> <?php echo $sizedownloadlink_gma_5; ?> <?php } else{ ?> <?php } ?>
			</span>
			</a>
			</div>
		</div>
		<!-- end link 6 -->
<?php } ?> 
<?php } ?> 
<?php } ?>
    </div>       
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(function () { 
  $(".accordion-content:not(:first-of-type)").css("display", "none"); 
  $(".js-accordion-title:first-of-type").addClass("open");
  $(".js-accordion-title").click(function () {
    $(".open").not(this).removeClass("open").next().slideUp(300);
    $(this).toggleClass("open").next().slideToggle(300);
  });
});
</script>
<?php } ?>
				
				 
				<!--if not put fake download link will using default-->
				<script language="javascript">
					var timeleft = "<?php echo $timers_counts; ?>";
				</script>
				<?php get_template_part('include/telegram'); ?>
				<?php ex_themes_banner_single_ads_download_2_(); ?>
				
				<?php global $opt_themes; if($opt_themes['activate_download_notices']){ ?>
					<div class="small mb-3 notice_download">
						<p><?php global $opt_themes; if($opt_themes['exthemes_download_times_notice_6']){ ?><?php echo $opt_themes['exthemes_download_times_notice_6']; ?><?php } ?> <strong><em><?php echo ucwords($title_ps); ?></em> </strong><?php global $opt_themes; if($opt_themes['exthemes_download_times_notice_7']){ ?><?php echo $opt_themes['exthemes_download_times_notice_7']; ?><?php } ?></p>
						<?php global $opt_themes; echo $opt_themes['notice_download_pages'];?>
					</div>
					<?php } ?>
					
				<?php if($style_2_on) { ?> 
				<?php if(function_exists('kk_star_ratings')) : ?>
				<div class="text-center d-flex align-items-center justify-content-center py-3 mb-3">
					<?php echo kk_star_ratings(); ?>
				</div>
				<?php endif ?>
				<div class="text-center border-top border-bottom d-flex align-items-center justify-content-center py-3 mb-3">
					<?php ex_themes_blog_shares_2(); ?>
				</div>
				<?php } else { ?> <?php } ?>	
				<?php if($style_2_on) { ?></section><?php } else { ?> <?php } ?>	
				
				
				<?php get_template_part('template/info.download'); ?>
				
				 
				<?php if($style_2_on) { ?> <?php } else { ?> 
				<?php if(function_exists('kk_star_ratings')) : ?>
				<div class="text-center d-flex align-items-center justify-content-center py-3 mb-3">
					<?php echo kk_star_ratings(); ?>
				</div>
				<?php endif ?>
				<div class="text-center border-top border-bottom d-flex align-items-center justify-content-center py-3 mb-3">
					<?php ex_themes_blog_shares_2(); ?>
				</div>
				<?php } ?>	
				<?php ex_themes_related_posts_();
				if($opt_themes['ex_themes_comments_activate_']){
				if($opt_themes['mdr_style_3']) {
				ex_themes_leave_comments_();
				} else {
				comments_template();
				}
				} ?>
			</main>
			<?php if($sidebar_on) { ?><!--sidebar--><aside id="secondary" class="col-12 col-lg-4 widget-area"><?php get_sidebar(); ?></aside><!--sidebar--><?php } else { ?><?php } ?>
		<?php if($sidebar_on) { ?></div><?php } else { ?><?php } ?>
		<?php get_template_part('template/breadcrumbs'); ?>
	</div>
</div>
   
<?php
get_footer(); 