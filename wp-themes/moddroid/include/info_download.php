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

if($down_pages_on){ ?>
<a class="btn btn-secondary btn-block mb-3" href="<?php the_permalink() ?>download/" rel="nofollow" ><?php if($svg_download) { ?><?php echo $svg_download; ?><?php } ?> <span class="align-middle"><?php global $opt_themes; if($opt_themes['exthemes_Download']) { ?><?php echo $opt_themes['exthemes_Download']; ?><?php } ?> <?php if (get_post_meta( $post->ID, 'wp_sizes', true )) { ?> (<?php if($rtl_on){ ?><?php echo RTL_Nums($sizes); ?><?php } else { ?><?php echo $sizes; ?><?php } ?>) <?php } else { ?><?php } ?></span></a>
<?php } else { ?>


				<?php if($downloadlink) { ?>
				<div id="download" class="download-body" >
				<?php if($downloadlink){
				foreach($downloadlink as $k => $dw){
				$mask_link = mask_link($dw['url']);
				$unmask_link = mask_link($dw['url'], 'd'); ?>
				<!--if any put download link will show-->
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-<?php echo $k; ?>">
				<span><?php if($dw['name']){ ?><?php echo $dw['name']; ?><?php } else{ ?> <?php if($text_download){ ?><?php echo $text_download; ?><?php } ?> <?php } ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php if($dw['tipes']){ ?> <?php echo $dw['tipes']; ?><?php } else{ ?>  <?php } ?></span> - <?php if($dw['sizes1']){ ?> <?php echo $dw['sizes1']; ?> <?php } else{ ?> (<?php echo $sizes; ?>) <?php } ?>
				</span>
				<?php } ?>
				</a>
				<div id="download-<?php echo $i; ?>" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
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
				<?php if($style_2_on) { ?> <?php } else { ?></div><?php } ?>				 
				<?php if($style_2_on) { ?></div></div><?php } else { ?> <?php } ?>
				<?php $i++; } }  ?>
				</div>
				
				<?php } elseif ($download3) { ?>
				<div id="download" class="download-body" >
				<?php 
				$i = 0;
				if(count($download3)>0){
				foreach($download3 as $elemento){
				$download31 = $download3[$i];
				$download32 = $download3[$i];
				$mask_link = mask_link($download3[$i]);
				$unmask_link = mask_link($download3[$i], 'd');
				?>
				<!--if not put download link will using default-->
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-<?php echo $i; ?>">
				<span><?php if($namedownload3[$i]){ ?><?php echo (!empty($namedownload3[$i])) ? $namedownload3[$i] : ''; ?> <?php } else{ ?> <?php } ?> </span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : 'APK'; ?></span>
				</span>
				<?php } ?>
				</a>
				<div id="download-<?php echo $i; ?>" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php } ?><?php if($namedownload3[$i]){ ?>&names=<?php echo $namedownload3[$i]; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> <?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : 'APK'; ?> </span> 
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
				<?php if($style_2_on) { ?> <?php } else { ?></div><?php } ?>
				<?php if($style_2_on) { ?></div></div><?php } else { ?> <?php } ?>
				<?php $i++; } } ?> 
				</div>
				
				<?php } elseif ($download2) { 
				$download2 = get_post_meta(get_the_ID(), 'wp_downloadlink', true);
				$mask_link = mask_link($download2);
				$unmask_link = mask_link($download2, 'd');
				?>
				<div id="download" class="download-body" >
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-<?php echo $i; ?>">
				<span><?php echo (!empty($namedownload2)) ? $namedownload2 : 'Download Now'; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ><?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : 'APK'; ?></span> - <?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?>  (<?php echo $sizes; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-<?php echo $i; ?>" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?><div class="p-3"><?php } else { ?><?php } ?>
				<a id="no-link" <?php if($style_2_on) { ?>class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;"<?php } else { ?>class="btn btn-secondary px-5"<?php } ?> href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($download2)) ? $download2 : ''; ?><?php } ?><?php if($namedownload2){ ?>&names=<?php echo $namedownload2; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span <?php if($style_2_on) { ?>class="d-block"<?php } else { ?>class="align-middle whites"<?php } ?>>
				<span class="text-uppercase" style="color: white;"><?php echo (!empty($tipe3[$i])) ? $tipe3[$i] : 'APK'; ?></span> - <?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?>  (<?php echo $sizes; ?>) <?php } else{ ?> <?php } ?> </span>
				</a>
				</div>
				<?php if($style_2_on) { ?> <?php } else { ?></div><?php } ?>	
				<?php if($style_2_on) { ?> <?php } else { ?></div><?php } ?>				
				<?php if($style_2_on) { ?></div></div><?php } else { ?> <?php } ?>
				</div>
				
				<?php } elseif ($downloadlink_gma) {  ?>
				<div id="download" class="download-body" >
				
				<!-- link 1 -->
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-0">
				<span><?php echo $namedownloadlink_gma; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma){ ?> -  <?php echo $sizedownloadlink_gma; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-0" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } else{ ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma){ ?> -  <?php echo $sizedownloadlink_gma; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma){ ?> -  <?php echo $sizedownloadlink_gma; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				<?php if($style_2_on) { ?></div></div> <?php } else { ?></div> <?php } ?>				
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-0">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span> - <?php if($sizedownloadlink_gma){ ?> (<?php echo $sizedownloadlink_gma; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-0" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"> </span>
				<?php if($sizedownloadlink_gma){ ?> (<?php echo $sizedownloadlink_gma; ?>) <?php } else{ ?> <?php } ?>
				</span>
				</a>
				</div>
				<?php } ?> 
				<!-- end link 1 -->
				
				<?php if($downloadlink_gma_1) { ?>
				<!-- link 2 -->
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-1">
				<span><?php echo $namedownloadlink_gma_1; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_1){ ?> -  <?php echo $sizedownloadlink_gma_1; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-1" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } else{ ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_1){ ?> -  <?php echo $sizedownloadlink_gma_1; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_1){ ?> -  <?php echo $sizedownloadlink_gma_1; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				<?php if($style_2_on) { ?></div></div> <?php } else { ?></div> <?php } ?>				
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-1">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_1; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_1){ ?> (<?php echo $sizedownloadlink_gma_1; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-1" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
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
	
				
				<?php if($downloadlink_gma_2) { ?>
				<!-- link 3 -->
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-2">
				<span><?php echo $namedownloadlink_gma_2; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_2){ ?> -  <?php echo $sizedownloadlink_gma_2; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-2" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } else{ ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_2){ ?> -  <?php echo $sizedownloadlink_gma_2; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_2){ ?> -  <?php echo $sizedownloadlink_gma_2; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				<?php if($style_2_on) { ?></div></div> <?php } else { ?></div> <?php } ?>
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-2">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_2; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_2){ ?> (<?php echo $sizedownloadlink_gma_2; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-2" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
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

				<?php if($downloadlink_gma_3) { ?>
				<!-- link 4 -->
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-3">
				<span><?php echo $namedownloadlink_gma_3; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_3){ ?> -  <?php echo $sizedownloadlink_gma_3; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-3" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } else{ ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_3){ ?> -  <?php echo $sizedownloadlink_gma_3; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_3){ ?> -  <?php echo $sizedownloadlink_gma_3; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				<?php if($style_2_on) { ?></div></div> <?php } else { ?></div> <?php } ?>
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-3">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_3; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_3){ ?> (<?php echo $sizedownloadlink_gma_3; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-3" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
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

				<?php if($downloadlink_gma_4) { ?>
				<!-- link 5 -->
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-4">
				<span><?php echo $namedownloadlink_gma_4; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_4){ ?> -  <?php echo $sizedownloadlink_gma_4; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-4" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } else{ ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_4){ ?> -  <?php echo $sizedownloadlink_gma_4; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_4){ ?> -  <?php echo $sizedownloadlink_gma_4; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				<?php if($style_2_on) { ?></div></div> <?php } else { ?></div> <?php } ?>
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-4">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_4; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_4){ ?> (<?php echo $sizedownloadlink_gma_4; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-4" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
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

				<?php if($downloadlink_gma_5) { ?>
				<!-- link 6 -->
				<?php if($style_2_on) { ?><div class="border rounded mb-2"><div id="accordion-downloads" class="accordion-downloads"><?php } else { ?><div id="accordion-downloads" class="accordion-downloads"><?php } ?>
				<?php if($style_2_on) { ?> <?php } else { ?><div class="mb-3"><?php } ?>
				<?php if($style_2_on) { ?> 
				<a class="<?php if($style_2_on) { ?> h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 toggler collapsed<?php } else { ?>h6 font-weight-semibold d-flex mb-2 collapsed toggle<?php } ?>" data-toggle="collapse" href="#download-5">
				<span><?php echo $namedownloadlink_gma_5; ?></span>
				<?php if($style_2_on) { ?> <?php } else { ?>  
				<span class="text-muted ml-auto">
				<span class="text-uppercase" ></span> - <?php if($sizedownloadlink_gma_5){ ?> -  <?php echo $sizedownloadlink_gma_5; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				<div id="download-4" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } else{ ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?>  </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if($sizedownloadlink_gma_5){ ?> -  <?php echo $sizedownloadlink_gma_5; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;"></span>
				<?php if($sizedownloadlink_gma_5){ ?> -  <?php echo $sizedownloadlink_gma_5; ?> <?php } else{ ?> <?php } ?>
				</span>
				</a>
				<?php } ?> 
				</div>
				<?php if($style_2_on) { ?></div></div> <?php } else { ?></div> <?php } ?>				
				<?php } else { ?>
				<a class="h6 font-weight-semibold d-flex mb-2 collapsed toggle" data-toggle="collapse" href="#download-5">
				<span style='text-transform:capitalize'><?php echo $namedownloadlink_gma_5; ?></span>
				<span class="text-muted ml-auto">
				<span class="text-uppercase"> </span>
				- <?php if($sizedownloadlink_gma_5){ ?> (<?php echo $sizedownloadlink_gma_5; ?>) <?php } else{ ?> <?php } ?></span>
				</a>
				<div id="download-5" class="collapse" data-parent="#accordion-downloads">
				<a id="no-link" class="btn btn-secondary px-5" href="<?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?>" target="_blank">
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

				
				</div>	 
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
				<span class="text-uppercase" >apk</span> - <?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> -  <?php echo $sizes; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				<div id="download-originalapksite" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $linkoriginal; ?><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?>&names=<?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> apk </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> <?php echo $sizes; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $linkoriginal_alt; ?><?php } ?><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?>&names=<?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;">apk</span>
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
				<span class="text-uppercase" >apk</span> - <?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> -  <?php echo $sizes; ?> <?php } else{ ?> <?php } ?>
				</span>
				<?php } ?>
				</a>
				
				
				<div id="download-originalapksite" class="collapse" data-parent="#accordion-downloads">
				<?php if($style_2_on) { ?>
				<div class="p-3">
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>file/?urls=<?php echo $linkoriginal_alt; ?><?php global $opt_themes; if($opt_themes['exthemes_download_original_apk']) { ?>&names=<?php echo $opt_themes['exthemes_download_original_apk']; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php if($text_download) { ?><?php echo $text_download; ?><?php } ?> apk </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php if(get_post_meta( $post->ID, 'wp_sizes', true )){ ?> -  <?php echo $sizes; ?> <?php } else{ ?> <?php } ?></span>
				</a>
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else{ ?><?php the_permalink() ?>file/?urls=<?php echo $linkoriginal_alt; ?><?php } ?>" target="_blank">
				<?php global $opt_themes; if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?>
				<span class="align-middle whites">
				<span class="text-uppercase" style="color: white;">apk</span>
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
				<a id="no-link"  class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="<?php the_permalink() ?>/file/?urls=<?php echo $link_decode; ?>&names=<?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>.<?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?>" target="_blank">
				<?php if($svg_download) { ?><?php echo $svg_download; ?><?php } ?>
				<span class="d-block">
				<span class="text-uppercase d-block"> <?php global $opt_themes; if($opt_themes['exthemes_Download']) { ?><?php echo $opt_themes['exthemes_Download']; ?><?php } ?> <?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?> </span> 
				</span>
				<span class="text-muted d-block ml-auto"><?php echo get_post_meta(get_the_ID(), 'size_download_apksupport', true); ?></span>
				</a> 
				</div>
				<?php } else { ?>
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>/file/?urls=<?php echo $link_decode; ?>&names=<?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>.<?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?>" target="_blank">
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
				<a id="no-link"  class="btn btn-secondary px-5" href="<?php the_permalink() ?>/file/?urls=<?php echo $link_decode; ?>&names=<?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>.<?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?>" target="_blank">
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
<script id="rendered-js" >
$(function () { 
  $("div#download-0:not(:first-of-type)").removeClass("show"); 
  $("div#download-1:not(:first-of-type)").removeClass("show"); 
  $("div#download-2:not(:first-of-type)").removeClass("show"); 
  $("div#download-0:first-of-type").addClass("show");
  $("div#download-0").click(function () {
    $(".show").not(this).removeClass("show").next().slideUp(300);
    $(this).toggleClass("show").next().slideToggle(300);
  });
});
</script>		 
<?php } 