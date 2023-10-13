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
?>
<?php if($downloadlink_gma) { ?>
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
							<span style='text-transform:uppercase'><?php echo $namedownloadlink_gma; ?></span>
							<span class="text-muted ml-auto">
							<span class="text-uppercase"> </span>
							- <?php if($sizedownloadlink_gma){ ?> (<?php echo $sizedownloadlink_gma; ?>) <?php } else{ ?> <?php } ?></span>
							</a>
							<div id="download-0" class="collapse" data-parent="#accordion-downloads">
							<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else { ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma; ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?><?php } ?>" target="_blank">
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
							<span style='text-transform:uppercase'><?php echo $namedownloadlink_gma_1; ?></span>
							<span class="text-muted ml-auto">
							<span class="text-uppercase"> </span>
							- <?php if($sizedownloadlink_gma_1){ ?> (<?php echo $sizedownloadlink_gma_1; ?>) <?php } else{ ?> <?php } ?></span>
							</a>
							<div id="download-1" class="collapse" data-parent="#accordion-downloads">
							<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else { ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_1; ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?><?php } ?>" target="_blank">
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
							<span style='text-transform:uppercase'><?php echo $namedownloadlink_gma_2; ?></span>
							<span class="text-muted ml-auto">
							<span class="text-uppercase"> </span>
							- <?php if($sizedownloadlink_gma_2){ ?> (<?php echo $sizedownloadlink_gma_2; ?>) <?php } else{ ?> <?php } ?></span>
							</a>
							<div id="download-2" class="collapse" data-parent="#accordion-downloads">
							<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else { ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_2; ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?><?php } ?>" target="_blank">
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
							<span style='text-transform:uppercase'><?php echo $namedownloadlink_gma_3; ?></span>
							<span class="text-muted ml-auto">
							<span class="text-uppercase"> </span>
							- <?php if($sizedownloadlink_gma_3){ ?> (<?php echo $sizedownloadlink_gma_3; ?>) <?php } else{ ?> <?php } ?></span>
							</a>
							<div id="download-3" class="collapse" data-parent="#accordion-downloads">
							<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else { ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_3; ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?><?php } ?>" target="_blank">
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
							<span style='text-transform:uppercase'><?php echo $namedownloadlink_gma_4; ?></span>
							<span class="text-muted ml-auto">
							<span class="text-uppercase"> </span>
							- <?php if($sizedownloadlink_gma_4){ ?> (<?php echo $sizedownloadlink_gma_4; ?>) <?php } else{ ?> <?php } ?></span>
							</a>
							<div id="download-4" class="collapse" data-parent="#accordion-downloads">
							<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else { ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_4; ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?><?php } ?>" target="_blank">
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
							<span style='text-transform:uppercase'><?php echo $namedownloadlink_gma_5; ?></span>
							<span class="text-muted ml-auto">
							<span class="text-uppercase"> </span>
							- <?php if($sizedownloadlink_gma_5){ ?> (<?php echo $sizedownloadlink_gma_5; ?>) <?php } else{ ?> <?php } ?></span>
							</a>
							<div id="download-5" class="collapse" data-parent="#accordion-downloads">
							<a id="no-link" class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']){ ?><?php the_permalink() ?>file/?urls=<?php echo (!empty($mask_link)) ? $mask_link : ''; ?><?php } else { ?><?php the_permalink() ?>file/?urls=<?php echo $downloadlink_gma_5; ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } else { ?><?php echo get_the_title(); ?><?php } ?><?php } ?>" target="_blank">
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
				<?php } 