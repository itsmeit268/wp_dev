<?php
function my_simple_crypt( $string, $action = 'e' ) {
  $secret_key = 'drivekey';
  $secret_iv = 'google';
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash( 'sha256', $secret_key );
  $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  if( $action == 'e' ) {
    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
  }else if( $action == 'd' ){
    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
  }
  return $output;
}
$file_path					= $_GET['urls'];
$file_name					= $_GET['names'];
$host						= ''.$_SERVER['HTTP_HOST'].'';
$urls						= $_GET['urls'];
$names						= $_GET['names'];
$size						= $_GET['size'];
$url						= $_GET['url'];
$file_path1					= my_simple_crypt($file_path); 
$file_path2					= my_simple_crypt($file_path, 'd');
/* header('Content-Type: application/vnd.android.package-archive');
header("Content-length: " . filesize($file_path2));
header('Content-Disposition: attachment; filename="'.$host.'-'.$file_name.'" ');
ob_end_flush();
readfile($file_path2);
return true; */
/* ob_start(); //this should be first line of your page
header('Location: '.$urls.'');
ob_end_flush(); //this should be last line of your page
 */
global $wpdb, $post;
get_header(); ?>
<script type='text/javascript'>
   //<![CDATA[
	var blog = document.location.hostname;
	var slug = document.location.pathname;
	var ctld = blog.substr(blog.lastIndexOf("."));
	var currentURL=location.href;
	var currentURLs= "<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo $urls; ?><?php } ?>";
	var str = currentURLs; 
	var res = str.replace("<?php global $opt_themes; if($opt_themes['activate_safelink_pages']) { ?><?php echo $opt_themes['safelink_url_pages']; ?><?php } ?>/?url=", "");
   $(".Visit_Link").hide();
   function changeLink(){
       var decodedString = res;
       window.open(decodedString,'_top')
   }
   function generate() {
       var linkDL = document.getElementById("download"),
           linkAL = document.getElementById("download2"),
           btn = document.getElementById("btn"),
           notif = document.getElementById("daplong"),
           direklink = document.getElementById("download").href,
           waktu = <?php global $opt_themes; if($opt_themes['activate_safelink_pages']) { ?><?php echo $opt_themes['safelink_timers_']; ?><?php } else { ?>5<?php } ?>;
       var teks_waktu = document.createElement("span");
       linkDL.parentNode.replaceChild(teks_waktu, linkDL);
       var id;
       id = setInterval(function () {
           waktu--;
           if (waktu < 0) {
               teks_waktu.parentNode.replaceChild(linkDL, teks_waktu);
               clearInterval(id);
               notif.style.display = "none";
               linkDL.style.display = "inline";
               linkAL.style.display = "inline";
           } else {
               teks_waktu.innerHTML = "<div id='download-loading' class='my-4' ><p class='text-center text-muted mb-2'>Your link is almost ready, please wait a " + waktu.toString() + " seconds...</p><div class='progress'><div class='progress-bar progress-bar-striped progress-bar-animated bg-secondary' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div></div></div>";
               btn.style.display = "none";
           }
       }, 2000);
   }
   //]]>
</script>
<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' rel='stylesheet'/>
<style>.grid-line{display:none}.grid-header-text-box{display:block;max-height:18px;overflow:hidden;text-transform:uppercase;position:relative;width:90%}.grid-header-text-box:after{content:'\a0';height:1px;width:100%;background-color:rgba(0,0,0,0.24);position:absolute;top:9.5px}.grid-header-text-box a{text-decoration:none;font-size:12px;color:#525252;padding:0 6px;font-family:arial,sans-serif;font-weight:normal;height:15px;background-color:rgba(255,255,255,0.7);border-radius:2px}.columns-1 .grid-bottom-border{margin-left:6px;margin-right:6px;width:348px;height:1px;background-color:rgba(0,0,0,0.24);margin-top:3px;margin-bottom:3px}.grid-link .ats{position:absolute;right:8px;opacity:1.0;background-color:#fff}.grid-link .ats svg{height:16px;width:16px;margin-top:auto;margin-bottom:auto;display:block}.grid-link .ats svg path{fill:<?php global $opt_themes;echo $opt_themes['color'];?>}.grid-link:hover .ats{background-color:<?php global $opt_themes;echo $opt_themes['color'];?>}.grid-link:hover .ats svg path{fill:#fff}.grid-link{position:relative}.grid-header-text-box a{font-family:roboto,sans-serif;letter-spacing:.8px;font-weight:500}.button1{content:'\00bb';background-color:#4caf50;border:0;color:white;padding:10px 22px;text-align:center;text-decoration:none;display:inline-block;width:85%;font-size:17px;margin:4px 2px;-webkit-transition-duration:.4s;transition-duration:.4s;cursor:pointer}.button21{background-color:<?php global $opt_themes;echo $opt_themes['color'];?>!important;color:white!important;border:1px solid white!important;border-radius:25px}.button21:hover{background-color:white!important;color:<?php global $opt_themes;echo $opt_themes['color'];?>!important;border:1px solid white!important;border-radius:25px}.six-sec-ease-in-out{-webkit-transition:width 6s ease-in-out;-moz-transition:width 6s ease-in-out;-ms-transition:width 6s ease-in-out;-o-transition:width 6s ease-in-out;transition:width 6s ease-in-out}.aplication-page1,.aplication-single1,.page-woocommerce1{width:100%;max-width:100%}.aplication-page1 .box1,.aplication-single1 .box1{background:#fff;box-shadow:2px 2px 2px 0 #d2d1d1;padding:20px 25px;margin-bottom:20px}.aplication-page1 .box1 h1.box-title{text-transform:initial;font-size:27px;margin:0;padding:0;padding-bottom:10px;margin-bottom:15px;color:#444}.aplication-page1 .box1 h1.box-title::after{left:0;background:<?php global $opt_themes;echo $opt_themes['color'];?>}.clearfix:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}#subheader.np{display:none!important}span.align-middle.moddroid {
    color: white !important;
}</style>
<div id="content" class="site-content">
        <div class="py-2">
            <div class="container py-1">
                <ul id="breadcrumb" class="breadcrumb">
                    <li class="breadcrumb-item home"><a href="<?php echo home_url(); ?>" title="Home">Home</a></li>
                    <li class="breadcrumb-item item-cat" ><?php echo get_the_category_list( '<li class="breadcrumb-item item-cat">', '</li>', $post->ID ); ?></li> 
                    <li class="breadcrumb-item"><a href="<?php the_permalink() ?>download/">Download</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <main id="primary" class="col-12 col-lg-8 content-area">
                    <div class="mb-3 entry-content">
                        <p>Thank you for downloading <em><strong><?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?></strong></em> from our site. The following are available links. Just press the button and the file will be automatically downloaded</p>
                    </div>
                    <div class="mb-3">
                        <center><?php ex_themes_banner_single_ads_download(); ?></center> 
                    </div> 
                     <script type="text/javascript">
                           //<![CDATA[
                           function changeLink() {
                               var e = res;
                               window.open(e, "_top")
                           }
                           var currentURL = location.href,
								currentURLs = "<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo $urls; ?><?php } ?>",
                               str = currentURLs,
                               res = str.replace("<?php global $opt_themes; if($opt_themes['activate_safelink_pages']) { ?><?php echo $opt_themes['safelink_url_pages']; ?><?php } ?>/?url=", "");
                           document.write('<div id="download" class="text-center mb-4" style="display: block;"><a class="btn btn-secondary px-5" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo $urls; ?><?php } ?>" onclick="changeLink()" download=""><svg class="svg-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M528 288h-92.1l46.1-46.1c30.1-30.1 8.8-81.9-33.9-81.9h-64V48c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v112h-64c-42.6 0-64.2 51.7-33.9 81.9l46.1 46.1H48c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V336c0-26.5-21.5-48-48-48zm-400-80h112V48h96v160h112L288 368 128 208zm400 256H48V336h140.1l65.9 65.9c18.8 18.8 49.1 18.7 67.9 0l65.9-65.9H528v128zm-88-64c0-13.3 10.7-24 24-24s24 10.7 24 24-10.7 24-24 24-24-10.7-24-24z"></path></svg><span class="align-middle moddroid" >Download</span></a></div><p class="text-center mb-4">If the download doesn\'t start in a few seconds, <a id="download" href="<?php global $opt_themes; if($opt_themes['ex_themes_mask_link_']) { ?><?php echo $file_path2; ?><?php } else { ?><?php echo $urls; ?><?php } ?>" onclick="changeLink()"  download=""><svg class="svg-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path></svg><span>click here</span></a></p>');
                           onload: generate();
                           //]]>
                        </script> 
			<?php global $opt_themes; if($opt_themes['telegram_users']) { ?> 
			<div class="text-center mb-3">
			<a class="btn btn-info rounded-pill" href="https://t.me/<?php echo $opt_themes['telegram_users'];?>" target="" rel="nofollow" style="color: white!important; ">
			<svg class="svg-5 mr-1" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path></svg>
			Join @<?php echo $opt_themes['telegram_users'];?> on Telegram channel </a>
			</div>
			<?php } ?>
            <center>
                <?php ex_themes_banner_single_ads_download_2_(); ?>
            </center>
			<?php global $opt_themes; if($opt_themes['activate_download_faqs']) { ?>
            <section class="mb-4">
                <h2 class="h5 font-weight-semibold mb-3">Download FAQs</h2>
                <div id="accordion-faqs" class="accordion accordion-faqs">
                    <div class="border" style="margin-top: -1px;">
                        <a class="text-body d-flex p-3 toggler collapsed" data-toggle="collapse" href="#faq-1" aria-expanded="false"><?php global $opt_themes; echo $opt_themes['title_faq_1_'];?></a>
                        <div id="faq-1" class="collapse" data-parent="#accordion-faqs" style="">
                            <div class="pl-3 ml-2">
                                <?php global $opt_themes; echo $opt_themes['faq_1_'];?>
                            </div>
                        </div>
                    </div>
                    <div class="border" style="margin-top: -1px;">
                        <a class="text-body d-flex p-3 collapsed toggler" data-toggle="collapse" href="#faq-2"><?php global $opt_themes; echo $opt_themes['title_faq_2_'];?></a>
                        <div id="faq-2" class="collapse" data-parent="#accordion-faqs">
                            <div class="pl-3 ml-2">
                                <?php global $opt_themes; echo $opt_themes['faq_2_'];?>
                            </div>
                        </div>
                    </div>
                    <div class="border" style="margin-top: -1px;">
                        <a class="text-body d-flex p-3 collapsed toggler" data-toggle="collapse" href="#faq-3"><?php global $opt_themes; echo $opt_themes['title_faq_3_'];?></a>
                        <div id="faq-3" class="collapse" data-parent="#accordion-faqs">
                            <div class="pl-3 ml-2">
                                <?php global $opt_themes; echo $opt_themes['faq_3_'];?>
                            </div>
                        </div>
                    </div>
                    <div class="border" style="margin-top: -1px;">
                        <a class="text-body d-flex p-3 collapsed toggler" data-toggle="collapse" href="#faq-4"><?php global $opt_themes; echo $opt_themes['title_faq_4_'];?></a>
                        <div id="faq-4" class="collapse" data-parent="#accordion-faqs">
                            <div class="pl-3 ml-2">
                                <?php global $opt_themes; echo $opt_themes['faq_4_'];?>
                            </div>
                        </div>
                    </div>
                    <div class="border" style="margin-top: -1px;">
                        <a class="text-body d-flex p-3 collapsed toggler" data-toggle="collapse" href="#faq-5"><?php global $opt_themes; echo $opt_themes['title_faq_5_'];?></a>
                        <div id="faq-5" class="collapse" data-parent="#accordion-faqs">
                            <div class="pl-3 ml-2">
                                <?php global $opt_themes; echo $opt_themes['faq_5_'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<?php } ?>
                    <?php if (function_exists('kk_star_ratings')) : ?>
					<div class="text-center d-flex align-items-center justify-content-center py-3 mb-3">
                        <?php echo kk_star_ratings(); ?>
                    </div>
					<?php endif ?>
            <div class="text-center border-top border-bottom d-flex align-items-center justify-content-center py-3 mb-3">
                        <?php global $wpdb, $post; ex_themes_blog_shares_2(); ?>
                    </div>
            </main>
            <!--sidebar-->
            <aside id="secondary" class="col-12 col-lg-4 widget-area">
                <?php get_sidebar(); ?>
            </aside>
            <!--sidebar-->
        </div>
        <style>
            .align-middle {vertical-align: middle !important;}.align-middle.whites {color: white !important;}.app div:first-child {width: 64px;float: left;text-align: center;font-size: .75rem;letter-spacing: 1px;margin: 0 12px 0 0;}.app div:first-child {width: 64px;float: left;text-align: center;font-size: .75rem;letter-spacing: 1px;margin: 0 12px 0 0;}.file-icon {width: 27px;height: 36px;background: #8EC155;position: relative;border-radius: 2px;text-align: left;-webkit-font-smoothing: antialiased;}.file-icon {width: 27px;height: 36px;background: #8EC155;position: relative;border-radius: 2px;text-align: left;-webkit-font-smoothing: antialiased;}.file-icon::before {display: block;content: "";position: absolute;top: 0;right: 0;width: 0;height: 0;border-bottom-left-radius: 2px;border-width: 5px;border-style: solid;border-color: #fff #fff #ffffff59 #ffffff59;}.file-icon::after {display: block;content: attr(data-type);position: absolute;bottom: 0;left: 0;font-size: 12px;color: #fff;text-transform: lowercase;width: 100%;padding: 2px;white-space: nowrap;overflow: hidden;}.file-icon[data-type=zip] {background-color: #ffb229;}.file-icon[data-type=obb] {background-color: #1e73be ;}.file-icon[data-type=apk] {background-color: #8EC155;}#breadcrumbiblog1 {padding:5px 5px 5px 0px; margin: 0px 0px 15px 0px; font-size:90%; line-height: 1.4em; border-bottom:3px double #eee;}/* Breadcrumb */#breadcrumbiblog{background:#fff;line-height:1.2em;width:auto;overflow:hidden;margin:0;padding:10px 0;border-top:0px solid #dedede;border-bottom:0px solid #dedede;font-size:80%;color:#888;font-weight:400;text-overflow:ellipsis;-webkit-text-overflow:ellipsis;white-space:nowrap}#breadcrumbiblog a{display:inline-block;text-decoration:none;transition:all .3s ease-in-out;color:#666;font-weight:400}#breadcrumbiblog a:hover{color:#11589D}#breadcrumbiblog svg{width:16px;height:16px;vertical-align:-4px}#breadcrumbiblog svg path{fill:#666}}
        </style>
        <div id="breadcrumbiblog">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    </div>
<?php global $opt_themes; if($opt_themes['activate_safelink_pages']) { ?> 
<script>
//<![CDATA[
var uri=window.location.toString();if(uri.indexOf("?","?")>0){var clean_uri=uri.substring(0,uri.indexOf("?"));window.history.replaceState({},document.title,clean_uri)}
//]]>
</script>
<?php } ?>
<?php get_footer(); 