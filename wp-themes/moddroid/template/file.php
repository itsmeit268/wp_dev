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
require EX_THEMES_DIR.'/libs/inc.file.php';
require EX_THEMES_DIR.'/libs/inc.lang.php';
global $opt_themes; 
?>
<script type='text/javascript'>
   //<![CDATA[
	var blog			= document.location.hostname;
	var slug			= document.location.pathname;
	var ctld			= blog.substr(blog.lastIndexOf("."));
	var currentURL		= location.href;
	var currentURLs		= "<?php if($opt_themes['ex_themes_mask_link_']) { ?><?php if($file_path2) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo $urlsx ; ?><?php } ?><?php } else { ?><?php if($file_path2) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo $urlsx ; ?><?php } ?><?php } ?>";
	var str				= currentURLs; 
	var res				= str.replace("/?url=", "");
   $(".Visit_Link").hide();
   function changeLink(){
       var decodedString = res;
       window.open(decodedString,'_top')
   }
   function generate() {
       var notifx		= document.getElementById("notifx"),
		   linkDL		= document.getElementById("download"),
           linkAL		= document.getElementById("download2"),
           btn			= document.getElementById("btn"),
           notif		= document.getElementById("daplong"),
           direklink	= document.getElementById("download").href,
           waktu		= <?php echo $timers_counts; ?>;
       var teks_waktu	= document.createElement("span");
       linkDL.parentNode.replaceChild(teks_waktu, linkDL);
       var id;
       id = setInterval(function () {
           waktu--;
           if (waktu < 0) {
               teks_waktu.parentNode.replaceChild(linkDL, teks_waktu);
               clearInterval(id);
               notifx.style.display = "none";
               /* linkDL.style.display = "inline";
               linkAL.style.display = "inline"; */
           } else {
               teks_waktu.innerHTML = "<div id='download-loading' class='my-4' ><p class='text-center text-muted mb-2'><?php if($opt_themes['exthemes_download_times_notice_1']) { ?><?php echo $opt_themes['exthemes_download_times_notice_1']; ?><?php } ?> " + waktu.toString() + " <?php if($opt_themes['exthemes_download_times_notice_2']) { ?><?php echo $opt_themes['exthemes_download_times_notice_2']; ?><?php } ?>...</p><div class='progress'><div class='progress-bar progress-bar-striped progress-bar-animated bg-secondary' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: " + waktu.toString() + "0%'></div></div></div>";
               btn.style.display = "none";
           }
       }, 1000);
   }
   //]]>
</script>
<?php
global $wpdb, $post, $wp_query, $opt_themes;
$colors						= $opt_themes['color_link'];  
$title_ps					= get_post_meta( $post->ID, 'wp_title_GP', true );
?>

<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' rel='stylesheet'/>
<style>.grid-line{display:none}.grid-header-text-box{display:block;max-height:18px;overflow:hidden;text-transform:uppercase;position:relative;width:90%}.grid-header-text-box:after{content:'\a0';height:1px;width:100%;background-color:rgba(0,0,0,0.24);position:absolute;top:9.5px}.grid-header-text-box a{text-decoration:none;font-size:12px;color:#525252;padding:0 6px;font-family:arial,sans-serif;font-weight:normal;height:15px;background-color:rgba(255,255,255,0.7);border-radius:2px}.columns-1 .grid-bottom-border{margin-left:6px;margin-right:6px;width:348px;height:1px;background-color:rgba(0,0,0,0.24);margin-top:3px;margin-bottom:3px}.grid-link .ats{position:absolute;right:8px;opacity:1.0;background-color:#fff}.grid-link .ats svg{height:16px;width:16px;margin-top:auto;margin-bottom:auto;display:block}.grid-link .ats svg path{fill:<?php echo $colors; ?>}.grid-link:hover .ats{background-color:<?php echo $colors; ?>}.grid-link:hover .ats svg path{fill:#fff}.grid-link{position:relative}.grid-header-text-box a{font-family:roboto,sans-serif;letter-spacing:.8px;font-weight:500}.button1{content:'\00bb';background-color:#4caf50;border:0;color:white;padding:10px 22px;text-align:center;text-decoration:none;display:inline-block;width:85%;font-size:17px;margin:4px 2px;-webkit-transition-duration:.4s;transition-duration:.4s;cursor:pointer}.button21{background-color:<?php echo $colors; ?>!important;color:white!important;border:1px solid white!important;border-radius:25px}.button21:hover{background-color:white!important;color:<?php echo $colors; ?>!important;border:1px solid white!important;border-radius:25px}.six-sec-ease-in-out{-webkit-transition:width 6s ease-in-out;-moz-transition:width 6s ease-in-out;-ms-transition:width 6s ease-in-out;-o-transition:width 6s ease-in-out;transition:width 6s ease-in-out}.aplication-page1,.aplication-single1,.page-woocommerce1{width:100%;max-width:100%}.aplication-page1 .box1,.aplication-single1 .box1{background:#fff;box-shadow:2px 2px 2px 0 #d2d1d1;padding:20px 25px;margin-bottom:20px}.aplication-page1 .box1 h1.box-title{text-transform:initial;font-size:27px;margin:0;padding:0;padding-bottom:10px;margin-bottom:15px;color:#444}.aplication-page1 .box1 h1.box-title::after{left:0;background:<?php echo $colors; ?>}.clearfix:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}#subheader.np{display:none!important}span.align-middle.moddroid {color: white !important;}@media (max-width:400px){#hiddens{display:none!important}.hiddens{display:none!important}}
</style>
<div id="content post-id-<?php the_ID(); ?> " class="site-content">
     
        <div class="container">
            <?php if($opt_themes['sidebar_activated_']) { ?><div class="row <?php if($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?> ml-5 <?php } ?>"><?php } ?>
			<?php if($opt_themes['sidebar_activated_']) { ?><main id="primary" class="col-12 <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>mr-4 ml-auto col-lg-7 <?php } else { ?>col-lg-8 <?php } ?> content-area"><?php } else { ?><main id="primary" class="content-area mx-auto" style="max-width: <?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>"><?php } ?>
			<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?><section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pb-3 pt-3 px-2 px-md-3 mb-3 mx-auto" style="max-width: <?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { ?> <?php } ?>
			
			<ul id="breadcrumb" class="breadcrumb pb-3 <?php if($opt_themes['ex_themes_activate_rtl_']){ ?>ml-3<?php } else{ ?><?php } ?>" style="margin-bottom: 10px;">
				<li class="breadcrumb-item home"><a href="<?php echo home_url(); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
				<li class="breadcrumb-item item-cat" ><?php echo get_the_category_list( '<li class="breadcrumb-item item-cat">', '</li>', $post->ID ); ?></li> 
				<?php if($title_ps){ ?><li class="breadcrumb-item item-cat" id="hiddens"><a href="<?php the_permalink() ?>"><?php echo ucwords($title_ps); ?></a></li><?php } ?>
				<li class="breadcrumb-item" id="hiddens"><a href="<?php the_permalink() ?>download/"><?php if($opt_themes['exthemes_Download']) { ?><?php echo $opt_themes['exthemes_Download']; ?><?php } ?></a></li>
				<li class="breadcrumb-item">File</li>
			</ul>
				
				
				<?php if($opt_themes['ex_themes_backgrounds_activate_']) { get_template_part('include/background'); } ?>
				
				
				
                    <div class="pb-3 pt-3 entry-content">
					
					
					<h1 class="h5 font-weight-semibold" <?php if($opt_themes['ex_themes_activate_rtl_']){ ?>style="float: right"<?php } else{ ?><?php } ?>><?php if ($namesapks) { ?><?php echo trim(strip_tags($namesapks)); ?><?php } else { ?><?php echo ucwords($title_ps); ?> v<?php echo $version; ?><?php } ?></h1>
					<?php if($opt_themes['ex_themes_activate_rtl_']){ ?><div style="clear:both;"></div><?php } else{ ?><?php } ?>
					<p class="text-muted">
					<noscript>
					<span style="color: <?php echo $colors; ?>">*</span> <?php if($opt_themes['exthemes_download_times_notice_5']) { ?><?php echo $opt_themes['exthemes_download_times_notice_5']; ?><?php } ?> <em><strong><?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?></strong></em> <br>
					</noscript>
					<?php if (get_post_meta( $post->ID, 'wp_mods', true )) { ?>
					<?php
					$wp_mods = get_post_meta( $post->ID, 'wp_mods1', true );
					$wp_mods1 = get_post_meta( $post->ID, 'wp_mods', true );
					if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_mods1;
					?>
					<span style="color: <?php echo $colors; ?>">*</span> <?php if($opt_themes['exthemes_MODAPK']) { ?><?php echo $opt_themes['exthemes_MODAPK']; ?><?php } ?> <?php echo trim(strip_tags($wp_mods)) ?>
					<?php } else { ?><?php } ?> 
					</p>
                     <p><?php if($opt_themes['exthemes_download_thanks']) { ?><?php echo $opt_themes['exthemes_download_thanks']; ?><?php } ?> <em><strong><?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?></strong></em> <?php if($opt_themes['exthemes_download_site']) { ?><?php echo $opt_themes['exthemes_download_site']; ?><?php } ?></p>     
                    </div>
                    <div class="mb-3">   
                       <?php ex_themes_banner_single_ads_download(); ?>
                    </div> 
					<p class='text-center text-muted mb-2'><span class="waitme"></span></p>
					<div id="progress_new" class="progress_new"><div id="value" class="progress_new-value"> </div></div>
					<div id="download" class="text-center mb-4" style="display: block;"><a id="no-link" class="btn btn-secondary px-5" href="<?php if($opt_themes['ex_themes_mask_link_']) { ?><?php if($file_path2) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo $urlsx ; ?><?php } ?><?php } else { ?><?php if($file_path2) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo $urlsx ; ?><?php } ?><?php } ?>" onclick="changeLink()" download><?php if($opt_themes['svg_icon_downloadx']) { ?><?php echo $opt_themes['svg_icon_downloadx']; ?><?php } ?><span class="align-middle moddroid" ><?php if($opt_themes['exthemes_Download']) { ?><?php echo $opt_themes['exthemes_Download']; ?><?php } ?></span></a></div>

					<p id="notifx" class="text-center mb-4"><?php if($opt_themes['exthemes_download_times_notice_3']) { ?><?php echo $opt_themes['exthemes_download_times_notice_3']; ?><?php } ?>, <a id="download" href="<?php the_permalink() ?>file/?urls=<?php if($file_path2) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo urlencode($urlsx); ?><?php } ?>" target="_top"><svg class="svg-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path></svg><span><?php if($opt_themes['exthemes_download_times_notice_4']) { ?><?php echo $opt_themes['exthemes_download_times_notice_4']; ?><?php } ?></span></a></p>

					<?php if($opt_themes['ex_themes_nolink_activate_']) { ?> 
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
					<script type="text/javascript">
					$('a#no-link[href]').each(function (e) {
					var hash = $(this).attr('href');
					$(this).removeAttr('href').css('cursor', 'pointer');
					location.hash = hash;
					});
					</script> 
					<?php } ?>
					<script type="text/javascript">
					var downloadButton	= document.getElementById("download");
					var notif			= document.getElementById("notifx");
					var progress_new	= document.getElementById("progress_new");
					var counter			= <?php echo $timers_counts; ?>;
					var newElement		= document.createElement("p");
					var progressval		= <?php echo $timers_counts; ?>;
					var waitmes			= document.getElementsByClassName('waitme')[0];
					  
					newElement.innerHTML = "";
					var id;
					downloadButton.parentNode.replaceChild(newElement, downloadButton);
					id					= setInterval(function() {
					counter--;
					if(counter < 0) {
					newElement.parentNode.replaceChild(downloadButton, newElement);
					clearInterval(id);
					notif.style.display			= "none";
					progress_new.style.display	= "none";
					waitmes.style.display		= "none";

					} else {
					waitmes.innerText = "<?php if($opt_themes['exthemes_download_times_notice_1']) { ?><?php echo $opt_themes['exthemes_download_times_notice_1']; ?><?php } ?> "+counter.toString()+" <?php if($opt_themes['exthemes_download_times_notice_2']) { ?><?php echo $opt_themes['exthemes_download_times_notice_2']; ?><?php } ?>..."; 
					}
					}, 900);

					</script> 
					<style>
					.progress_new{display:block;width:100%;max-width:100%;margin:1em auto;padding:5px;border:0;background:#fff;border-radius:14px;box-shadow:inset 0 0 0 transparent,0 1px 0 rgba(255,255,255,.2)}.progress_new-value{width:0;height:20px;background:#fff linear-gradient(to right,var(--color_text),var(--color_button));border-radius:10px;box-shadow:inset 0 0 0 transparent,0 0 0 0 transparent;-webkit-animation:loading <?php echo $timers_counts; ?>s linear;animation:loading <?php echo $timers_counts; ?>s linear}@-webkit-keyframes loading{0%{width:0}80%{width:80%}100%{width:100%}}@keyframes loading{0%{width:0}80%{width:80%}100%{width:100%}}					
					</style>
					 
			<?php get_template_part('include/telegram'); ?>
			
			<?php get_template_part('include/info_rating'); ?> 
			<br>
            <?php ex_themes_banner_single_ads_download_2_(); ?>
			<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 
			<?php } else { ?> 
			<?php if ( shortcode_exists( 'rns_reactions' ) ) { ?>
			<?php echo do_shortcode( '[rns_reactions]' ); ?>
			<?php } ?> 
			<?php } ?>
			<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?></section><?php } else { ?> <?php } ?>
			
			
				<?php get_template_part('template/info.download'); ?>
				
				
			<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 
			<?php } else { ?> 
                    <?php if (function_exists('kk_star_ratings')) : ?>
					<div class="text-center d-flex align-items-center justify-content-center py-3 mb-3">
                        <?php echo kk_star_ratings(); ?>
                    </div>
					<?php endif ?>
            <div class="text-center border-top border-bottom d-flex align-items-center justify-content-center py-3 mb-3">
                        <?php global $wpdb, $post; ex_themes_blog_shares_2(); ?>
                    </div>
			<?php } ?>		
			<?php ex_themes_related_posts_(); ?>
            </main>
            <?php if($opt_themes['sidebar_activated_']) { ?><!--sidebar--><aside id="secondary" class="col-12 col-lg-4 widget-area"><?php get_sidebar(); ?></aside><!--sidebar--><?php } else { ?><?php } ?>
		<?php if($opt_themes['sidebar_activated_']) { ?></div><?php } else { ?><?php } ?>
			<span style="display:none"><?php get_template_part('template/breadcrumbs'); ?></span>			
    </div>
    </div>
<?php if($opt_themes['activate_no_links_']){ ?> 
<script>var uri=window.location.toString();if(uri.indexOf("?","?")>0){var clean_uri=uri.substring(0,uri.indexOf("?"));window.history.replaceState({},document.title,clean_uri)}</script>
<?php }
get_footer(); 