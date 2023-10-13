<?php
/* 
Template Name: Template - Request Apps
*/

include_once 'libs/addons/dom.php';
get_header(); // add header ?>


    <div id="content post-id-<?php the_ID(); ?>  " class="site-content">
        <div class="py-2" style='display:none'>
		<br>
      <div class="container py-1">
         <ul id="breadcrumb" class="breadcrumb">
            <li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
            <li class="breadcrumb-item home"><?php the_title(); ?></li>
         </ul>
      </div>
   </div>
       <div class="container pt-3">
		<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><div class="row"><?php } else { ?><?php } ?>
			<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><main id="primary" class="col-12 col-lg-8 content-area"><?php } else { ?><main id="primary" <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>class="<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?>col-12 col-lg-9 content-area<?php } else { ?>content-area<?php } ?>"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
			<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?><article class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 mx-auto mb-3" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { ?> <?php } ?>
			
                    <h2 class="h5 font-weight-semibold mb-3 cate-title" style='text-align: left !important;'><span class="<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>text-body<?php } else { ?>text-body <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?> border-secondary d-inline-block pb-1<?php } ?>"><?php the_title(); ?></span></h2> 
					
                    <div class="mb-4 entry-content">					
					<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<?php if( get_the_content() ) { ?>
					<?php the_content();?>
					<?php } else { ?> 	
					<p class="order-text"><span class="fw-b"><?php _e('Enter the ID to the game on Google Play and we will add it to the site as soon as possible.', THEMES_NAMES); ?></span><br><?php _e('But, at the same time, please note that all orders and mods for them (if possible) are published whenever possible.', THEMES_NAMES); ?></p>		
					<?php } ?>
					<?php endwhile; else : ?>
					<?php endif; ?>
					</div>
					 
					<form class="apk-down-form" method="post" action="<?php the_permalink() ?>" id="form">
					<input type="text" name="id" id="id" placeholder="<?php _e('ID Playstore or Package ID', THEMES_NAMES); ?>" />
					 
					<label><?php _e('Reason', THEMES_NAMES); ?> :</label>
					
					<input type="radio" name="reasons" id="Uno"  value="<?php _e('Please... Need Version Updates', THEMES_NAMES); ?>" checked />
						<label for="Uno">
						<svg class="check" viewbox="0 0 40 40">
						  <defs>
							<linearGradient id="gradient" x1="0" y1="0" x2="0" y2="100%">
							  <stop offset="0%" stop-color="var(--color_button)"></stop>
							  <stop offset="100%" stop-color="var(--color_button)"></stop>
							</linearGradient>
						  </defs>
						  <circle id="border" r="18px" cx="20px" cy="20px"></circle>
						  <circle id="dot" r="8px" cx="20px" cy="20px"></circle>
						</svg><?php _e('Need Updates Version', THEMES_NAMES); ?>
						</label>
					
					<input type="radio" name="reasons" id="Dos" value="<?php _e('Link Dowload Dead and Not Working', THEMES_NAMES); ?>" />
						<label for="Dos">
						<svg class="check" viewbox="0 0 40 40">
						  <defs>
							<linearGradient id="gradient" x1="0" y1="0" x2="0" y2="100%">
							  <stop offset="0%" stop-color="var(--color_button)"></stop>
							  <stop offset="100%" stop-color="var(--color_button)"></stop>
							</linearGradient>
						  </defs>
						  <circle id="border" r="18px" cx="20px" cy="20px"></circle>
						  <circle id="dot" r="8px" cx="20px" cy="20px"></circle>
						</svg><?php _e('Links Not Working', THEMES_NAMES); ?>
						</label>
						
					<button id="submit" onclick="onclickSub();"></button>					
					</form>		 	  
	
 
 
 
<?php
if(isset($_POST['id'])){
$gp_id				= $_POST['id'];
$message			= $_POST['message'];
$reasons			= $_POST['reasons'];
$language			= $_GET['hl'];

$html		    	= "https://play.google.com/store/apps/details?id=".$gp_id."&hl=".$language;
$url		    	= trim(strip_tags($html));
class getslinks{		
	public function get_web_info($title) {
		$getLinkID = $this->get_web_id_from_search(trim($title));
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID) {
		$arr				= array();	 	 
		if(isset($_POST['id'])) {		
		$sources			= "https://play.google.com/store/apps/details?id=".$_POST['id']."&hl=".$language;
		} else {		
		$sources			= "https://play.google.com/store/apps/details?id=".$_POST['id']."&hl=".$language; 
		}
		return $this->scrape_web_info($sources);
	}
	public function scrape_web_info($sources) {	 
		$arr				= array();
		$links				= $this->geturl("${sources}");	
		$arr['title_id']	= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $links, 1);
		$arr['GP_ID']		= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $links, 1);
		$title_id			= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $links, 1);		 
				
		$linkXdo			= get_bloginfo('url'); 
		$parse				= parse_url($linkXdo); 
		$hostname			= $parse['host'];
		$arr['title_id']	= $title_id;        
        $titleId			= $arr['GP_ID'];		
		
		$arr['title_GP']				= trim(strip_tags($this->match('/<h1.*?itemprop="name">(.*?)<\/h1>/msi', $links, 1)));

		$sizes_						= '=s120-rw';
		$arr['poster_GP_images']	= $this->match('/<meta property="og:image".*?content="(.*?)".*?>/msi', $links, 1);	
		$arr['poster_GP_alts']		= $arr['poster_GP_images'].$sizes_;	 	
		$arr['poster_GP']			= $arr['poster_GP_images'];	

		##### Developers #####
		$arr['developers_GP']		= $this->match('/<div class="Vbfug auoIOc"><a.*?><span>(.*?)<\/span><\/a><\/div>/msi', $links, 1);

		##### Update Times #####
		$arr['updates_GP']				= trim(strip_tags($this->match('/<div><div class="lXlx5">.*?<\/div><div class="xg1aie">(.*?)<\/div><\/div>/msi', $links, 1)));
 
		$apkfab_alt_url					= "https://apk.demos.web.id/infos.php?id=".$titleId;
		$apkfab_alt						= $this->geturl("${apkfab_alt_url}");
		
		$apk_downloaders_url			= "http://apk-downloaders.com/?id=".$titleId;
		$apk_downloaders				= $this->geturl("${apk_downloaders_url}");
		 
 
		$arr['judul_apk']				= trim(strip_tags($this->match('/<h4 class="media-heading">(.*?)<\/h4>/msi', $apk_downloaders, 1)));
		
        ##### Download #####
		$apk_downloaders_url_dw			= "http://apk-downloaders.com/download/dl.php?dl=".$arr['GP_ID'];
		$apk_downloaders_dw				= $this->geturl("${apk_downloaders_url_dw}"); 
		$arr['link_downloads']			= $this->match_all('/<a href="(.*?)" class="mdl-button.*?<\/a>/ms', $this->match('/<div class="container-content">(.*?)<footer/ms', $apk_downloaders_dw, 1), 1);
   
			
        return $arr;
	}
	
	private function geturl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
		//$ip=172.69.70.6;
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
		//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0");
		curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		$html = curl_exec($ch);
		curl_close($ch);
		return $html;
		}
	private function match_all_key_value($regex, $str, $keyIndex = 1, $valueIndex = 2){
		$arr = array();
		preg_match_all($regex, $str, $matches, PREG_SET_ORDER);
		foreach($matches as $m){
			$arr[$m[$keyIndex]] = $m[$valueIndex];
			}
		return $arr;
		}
	private function match_all($regex, $str, $i = 0){
		if(preg_match_all($regex, $str, $matches) === false)
			return false;
			else
			return $matches[$i];
		}
	private function match($regex, $str, $i = 0){
		if(preg_match($regex, $str, $match) == 1)
			return $match[$i];
			else
			return false;
		}
}

$getslinks = new getslinks;
$gets_data = $getslinks->scrape_web_info($url, false);
}
if ($gets_data['title_GP']) {
?>
<div id="hideDiv">
<div class="d-flex align-items-center px-0 px-md-3 mb-3 mb-md-4 ">
	<div class="flex-shrink-0 mr-3" style="width: 4.5rem;">
	<img src="<?php echo $gets_data['poster_GP_alts']; ?>" class="rounded-lg wp-post-image" alt="<?php echo $gets_data['title_GP']; ?>" loading="lazy" style="max-width: 100%;max-height: 72px;">
	</div>

	<div>
	<h1 class="lead font-weight-semibold"><?php echo $gets_data['title_GP']; ?></h1>				
	<time class="text-muted d-block " datetime="<?php echo $gets_data['updates_GP']; ?>"><em><b><?php echo $gets_data['developers_GP']; ?></b>, <?php echo $gets_data['updates_GP']; ?>  </em></time>
	</div>	
</div>
	<div id="errorInfo" class="errorInfo" style="display: block"><?php _e('Thanks.. your request being processed by admin', THEMES_NAMES); ?></div>
</div>


<?php

global $post;
$types					= 'request'; 
$post_status			= 'publish'; 
$post_titles			= $gets_data['title_GP'];
$idX					= $post->ID; 
$post_args = array(
		'post_title'		=> $post_titles,
		'post_name'			=> $id_gps,
		'post_content'		=> $_POST['reasons'],
		'post_status'		=> $post_status,
		//'post_author'		=> 1,
		'post_type'			=> $types
		);				
$post_id	= wp_insert_post( $post_args );	
 
} if(isset($_POST['id'])){ if ($gets_data['title_GP']) {} else { ?>
<div id="hideDiv">
<div id="errorInfo" class="errorInfo" style="display: block">
<?php _e('Sorry...... ID Playstore or Package ID Not Found. please check Package ID agains', THEMES_NAMES); ?>
</div>
</div>
<?php }}
?>

<style> 
label{position:relative;margin:0.675rem 1.35rem;display:flex;width:auto;align-items:center;cursor:pointer}.check{margin-right:7px;width:1.35rem;height:1.35rem}.check #border{fill:none;stroke:#7a7a8c;stroke-width:3;stroke-linecap:round}.check #dot{fill:url(#gradient);transform:scale(0);transform-origin:50% 50%}input#Uno,input#Dos{display:none}input:checked + label{background:linear-gradient(180deg,var(--color_button),var(--color_button));-webkit-background-clip:text;-webkit-text-fill-color:transparent}input:checked + label svg #border{stroke:url(#gradient);stroke-dasharray:145;stroke-dashoffset:145;animation:checked 500ms ease forwards}input:checked + label svg #dot{transform:scale(1);transition:transform 500ms cubic-bezier(0.57,0.21,0.69,3.25)}@keyframes checked{to{stroke-dashoffset:0}}input[type=radio]{margin:10px 10px 0 10px}.apk-down-form{max-width:100%;margin:0 auto;padding:16px;position:relative}.apk-down-form input{position:relative;width:100%;outline:0;height:44px;line-height:44px;padding-right:100px;background-color:#fff;-moz-border-radius:22px;-webkit-border-radius:22px;border-radius:22px;border:1px solid var(--color_button);padding-left:16px;padding-right:110px}.apk-down-form input.error{border:1px solid #e0b4b5}.apk-down-form button{position:absolute;right:16px;top:0;margin-top:16px;cursor:pointer;outline:0;border:none;height:44px;width:100px;color:#fff;font-weight:700;text-transform:uppercase;background-color:var(--color_button);text-align:center;font-size:0.75rem;-moz-border-radius:22px;-webkit-border-radius:22px;border-radius:22px;opacity:0.95}.apk-down-form button:hover{opacity:1}.apk-down-form button:before{position:absolute;left:0;right:0;top:0;bottom:0;content:"";height:44px;width:100px;background-color:#fff;-webkit-mask:url(<?php echo EX_THEMES_URI;?>/assets/img/search-icon-dark.svg) no-repeat center;mask:url(<?php echo EX_THEMES_URI;?>/assets/img/search-icon-dark.svg) no-repeat center;-webkit-mask-size:18px;mask-size:18px;background-size:18px;background-position:center;background-repeat:no-repeat}.apk-down-form button.loading:before{background-color:#fff;-webkit-mask:url(<?php echo EX_THEMES_URI;?>/assets/img/Loading.svg) no-repeat center;mask:url(<?php echo EX_THEMES_URI;?>/assets/img/Loading.svg) no-repeat center;-webkit-mask-size:32px;mask-size:32px;background-size:32px}.errorInfo{position:sticky;left:16px;top:70px;background-color:var(--color_button);padding:8px 16px;color:#fff;font-size:1rem;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}.errorInfo:before{position:absolute;left:20px;top:-5px;content:"";width:0;height:0;border-style:solid;border-width:0 5px 5px 5px;border-color:transparent transparent var(--color_button) transparent}@media (min-width:720px){}.h5.font-weight-semibold.mb-3,p.order-text{text-align:center}.fw-b{font-weight:700}#overlay{position:fixed;top:0;left:0;right:0;bottom:0;width:100%;background:rgba(0,0,0,0.75) url(<?php echo EX_THEMES_URI;?>/assets/img/loading.gif) no-repeat center center;z-index:10000}#loading{width:50px;height:57px;position:absolute;top:50%;left:50%;margin:-28px 0 0 -25px}
</style>


<script src="//code.jquery.com/jquery.js"></script> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script id="rendered-js" >
$(function () {
  setTimeout(function () {$("#hideDiv").fadeOut(1500);}, 20000);
});
</script>

<script> 
$(function() {
    var loading = function() {
        // add the overlay with loading image to the page 
        var over = '<div id="overlay">' +
            '<img src="<?php echo EX_THEMES_URI; ?>/assets/img/loading.gif">' +
            '</div>';
        $(over).appendTo('body');

        // click on the overlay to remove it
        $('#overlay').click(function() {
            $(this).remove();
        });

        // hit escape to close the overlay
       /*  $(document).keyup(function(e) {
            if (e.which === 6000) {
                $('#overlay').remove();
            }
        }); */
    };

    // you won't need this button click
    // just call the loading function directly
    $('#submit').click(loading);

});
</script>
               
					<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?></article><?php } else { ?> <?php } ?>	
					
					
					       
				<span style="display:none"><?php get_template_part('template/breadcrumbs'); ?></span>
                </main>
			
			<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><!--sidebar--><aside id="secondary" class="col-12 col-lg-4 widget-area"><?php get_sidebar(); ?></aside><!--sidebar--><?php } else { ?><?php } ?>
			
		<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?></div><?php } else { ?><?php } ?>
             
        </div> 

<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--moddroid-->
<style>
footer#colophon .h5.font-weight-semibold.mb-3 {
  text-align: left !important;
}
.BlogSearch .sb { 
  padding-bottom: 20px !important;
}
</style>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
<!--modyolo & style 3-->
<style>
footer#colophon .h5.font-weight-semibold.mb-3 {
  text-align: left !important;
}
.BlogSearch .sb { 
  padding-bottom: 20px !important;
  padding-left: unset !important;
}
.fixi:checked ~ .fixL .fCls, #comment:target .fixL .fCls { 
  width: 150% !important;
  height: 150% !important;
  left: -100px !important;
  top: -100px !important;
}
<?php if($opt_themes['ex_themes_activate_rtl_']){ ?>
.BlogSearch input { 
  right: 20px !important;
}
.BlogSearch .sb { 
  padding-bottom: 20px !important;
  padding-right: unset !important;
}
.fixi:checked ~ .fixL .fCls, #comment:target .fixL .fCls { 
  width: 150% !important;
  height: 150% !important;
  right: -100px !important;
  top: -100px !important;
}
.check {
  margin-left: 7px; 
}
<?php } ?>
</style>

<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--modyolo-->
<style>
footer#colophon .h5.font-weight-semibold.mb-3 {
  text-align: left !important;
}
.BlogSearch .sb { 
  padding-bottom: 20px !important;
  padding-left: unset !important;
}
</style>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--style 3-->
<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--moddroid-->
<style>
footer#colophon .h5.font-weight-semibold.mb-3 {
  text-align: left !important;
}
.BlogSearch .sb { 
  padding-bottom: 20px !important;
  padding-left: unset !important;
}
</style>
<?php } ?>
<?php get_footer(); 