<?php 
global $opt_themes;  
$language						= $opt_themes['ex_themes_extractor_apk_language_']; 
$arr['languages']				= $language;

$gp								= "https://play.google.com/store/apps/details?id=" . $titleId . "&hl=".$language."&gl=ID";
$gp_en_usa						= "https://play.google.com/store/apps/details?id=" . $titleId . "&hl=en-US";
$gp_lang						= "https://play.google.com/store/apps/details?id=" . $titleId . "&hl=id";
$gpindox						= "https://play.google.com/store/apps/details?id=" . $titleId . "&hl=id";

$gp_languages					= $this->geturl("${gp}");
$gpindo							= $this->geturl("${gpindox}");


$gp1							= $this->geturl("${gp}");
$gp_en_us						= $this->geturl("${gp_en_usa}");

##### ID #####
$arr['GP_ID']					= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp1, 1);
$arr['GP_ID_2']					= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp1, 1);
if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_ID_2'];
$arr['title_id']				= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp1, 1);
$arr['GP_ID99']					= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp1, 1);

$titleIdX1						= $arr['title_id'];

$arr['title_id_ps']				= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp_en_us, 1);
$arr['title_id_ps']				= str_replace('.', '-',  $arr['title_id_ps']);
$arr['ID_GPS_ORI']				= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp_en_us, 1);

$apkgk_url						= "https://apkgk.com/" . $titleIdX1 . "";
$apkgk_url_alt					= "https://apkgk.com/" . $titleIdX1 . "";
$apkshub_url					= "https://www.apkshub.com/app/" . $titleIdX1 . "";
$apksos_url						= "https://apksos.com/app/" . $titleIdX1 . "";
$galaxystore_url				= "https://galaxystore.samsung.com/detail/" . $titleIdX1 . "";

$apkfind_url					= "http://apkfind.com/.*?id=" . $titleIdX1 . ""; 
$apkpure_url					= "https://apkpure.com/.*?/" . $titleIdX1 . "/download"; 
$apkcombo_url					= "https://apkcombo.com/.*?/" . $titleIdX1 . "/"; 
$apkpremier_url					= "https://apkpremier.com/details/" . $arr['title_id_ps'] . ""; 
$apkpremier_url_size			= "https://apkpremier.com/download/" . $arr['title_id_ps'] . ""; 
$apksum_url						= "https://www.apksum.com/app/" . $titleIdX1 . ""; 

/*
https://apkpremier.com/download/com-actionsquare-three-kingdoms-war
*/
$apkgk							= $this->geturl("${apkgk_url}");
$apkgk_alt						= $this->geturl("${apkgk_url_alt}");
$apkshub						= $this->geturl("${apkshub_url}");
$apksos							= $this->geturl("${apksos_url}");
$galaxystore					= $this->geturl("${galaxystore_url}");
$apksum							= $this->geturl("${apksum_url}");

$apkfind						= $this->geturl("${apkfind_url}");
$apkpure						= $this->geturl("${apkpure_url}");
$apkcombo						= $this->geturl("${apkcombo_url}");
$apkpremier						= $this->geturl("${apkpremier_url}");
$apkpremier_alt					= $this->geturl("${apkpremier_url_size}");

require_once 'download.php';
require_once 'images.php';
##### Title #####
$arr['title_GP']				= $this->match('/<h1.*?itemprop="name"><span>(.*?)<\/span><\/h1>/msi', $gp1, 1);
$arr['title_GP_']				= $this->match('/<div class="program-title"><h1>(.*?)<\/h1>.*?<\/div>/msi', $apkgk, 1);
$arr['title_GP_alt']			= $title_webs;
$arr['title_GP_apkgk']			= $this->match('/<span  class="btn btn-default">(.*?)<\/span>/msi', $apkgk, 1);

$arr['title2']					= $this->match('/<title id="main-title">(.*?)\- Apps.*?<\/title>/msi', $gp1, 1);
if ( $arr['title_GP'] === FALSE or $arr['title_GP'] == '' ) $arr['title_GP'] = $arr['title_GP_alt'] = $arr['title_GP_apkgk'];

$arr['title_apkfind']			= $this->match('/<title>(.*?)<\/title>/msi', $apkfind, 1);
$arr['title_apkpure']			= $this->match('/<title>(.*?)<\/title>/msi', $apkpure, 1);
$arr['title_apkcombo']			= $this->match('/<title>(.*?)<\/title>/msi', $apkcombo, 1);
$arr['title_apkpremier']		= $this->match('/<title>(.*?)<\/title>/msi', $apkpremier, 1);
$arr['title_galaxystore']		= $this->match('/<title>(.*?)<\/title>/msi', $galaxystore, 1);
$arr['title_apksum']			= $this->match('/<title>(.*?)<\/title>/msi', $apksum, 1);
$arr['title_apkgk']				= $this->match('/<title>(.*?)<\/title>/msi', $apkgk_alt, 1);
$arr['title_apkpremier_alt']	= $this->match('/<title>(.*?)<\/title>/msi', $apkpremier_alt, 1);


##### Version #####
$arr['version_GP']				= $this->match('/<div class="row version">.*?<div class="col-xs-7 item">.*?<span>(.*?)<\/span>.*?<div class="row.*?">/msi', $apkgk_alt, 1);
$arr['version_GP_apkgk']		= $this->match('/<div class="row version">.*?<div class="col-xs-7 item">.*?<span>(.*?)<\/span>.*?<div class="row.*?">/msi', $apkgk_alt, 1);
$arr['version_GP_apkshub']		= $this->match('/<span itemprop="softwareVersion">(.*?)<\/span>/msi', $apkshub, 1);
$arr['version_GP_apksos']		= $this->match('/<li>Version.*?:(.*?)<\/li>/msi', $apksos, 1);
$arr['version_GP_alt']			= $version_web;
if ($arr['version_GP'] === FALSE or $arr['version_GP'] == '') $arr['version_GP'] = $arr['version_GP_alt'];	 

##### Genre #####
 
$arr['genres_GP']				= $this->match('/<div class="row Category">.*?<div class="col-xs-7 item">.*?<a.*?><span>(.*?)<\/span><\/a>.*?<div class="row.*?">/msi', $apkgk_alt, 1);
 
$arr['genres_GP_apkgk']			= $this->match('/<div class="row Category">.*?<div class="col-xs-7 item">.*?<a.*?><span>(.*?)<\/span><\/a>.*?<div class="row.*?">/msi', $apkgk_alt, 1);

$arr['genres_GP_apkgk_alt']		= $this->match('/<div class="row Category">.*?<div class="col-xs-7 item">.*?<a.*?><span>(.*?)<\/span><\/a>.*?<div class="row.*?">/msi', $apkgk_alt, 1);

$arr['genres_GP_apkshubs']		= $this->match('/<span itemprop="applicationCategory">.*?<a.*?>(.*?)\&.*?<\/a>/msi', $apkshub, 1);
$arr['genres_GP_apkshubs_alt']	= $this->match('/<span itemprop="applicationCategory">.*?<a.*?>(.*?)<\/a>/msi', $apkshub, 1);

if ($arr['genres_GP_apkshubs']) {
$arr['genres_GP_apkshub'] = $arr['genres_GP_apkshubs'];	
} else {
$arr['genres_GP_apkshub'] = $arr['genres_GP_apkshubs_alt'];		  	 		
}
$arr['genres_GP_apkshub']		= str_replace('Games', '', $arr['genres_GP_apkshub']);	
$arr['genres_GP_apkshub']		= str_replace('Apps', '', $arr['genres_GP_apkshub']);	 

$arr['genres_GP_alt']			= $genres_webs;

if ($arr['genres_GP'] === FALSE or $arr['genres_GP'] == '') $arr['genres_GP'] = $arr['genres_GP_alt'] = $arr['genres_GP_apkgk'] = $arr['genres_GP_apkgk_alt'] = $arr['genres_GP_apkshub'];	 

##### Install #####
$arr['installs_GP']				= $this->match('/<a href="#Installs" title="Installs">(.*?)<\/a>/msi', $apkgk, 1);
$arr['installs_GP_apkgk']		= $this->match('/<a href="#Installs" title="Installs">(.*?)<\/a>/msi', $apkgk, 1);
if ($arr['installs_GP'] === FALSE or $arr['installs_GP'] == '') $arr['installs_GP'] = $arr['installs_GP_apkgk'];

##### Require #####
$arr['requires_GP']				= trim(strip_tags($this->match('/<div class="row Requirements">.*?<div class="col-xs-7 item">Android(.*?)<\/div><\/div>/msi', $apkgk, 1))); 
//$arr['requires_GP']				= str_replace('+', '', $arr['requires_GP']);	
$arr['requires_GP']				= str_replace('Varies with device', '5+', $arr['requires_GP']);	
$arr['requires_GP_apkgk']		= $this->match('/<div class="row Requirements">.*?<div class="col-xs-7 item">Android(.*?)\+.*?<\/div>/msi', $apkgk, 1); 
$arr['required_web']			= $required_web;

if ($arr['requires_GP'] === FALSE or $arr['requires_GP'] == '') $arr['requires_GP'] = $arr['requires_GP_apkgk'] = $arr['required_web'];

##### Rate & Rating #####
$arr['rated_GP']				= trim(strip_tags($this->match('/<div class="jILTFe">(.*?)<\/div>/msi', $gp1, 1)));
$arr['rated_GP_apkgk']			= trim(strip_tags($this->match('/<div class="score">(.*?)<\/div>/msi', $apkgk, 1)));
if ($arr['rated_GP'] === FALSE or $arr['rated_GP'] == '') $arr['rated_GP'] = $arr['rated_GP_apkgk'];

$arr['ratings_GP']				= trim(strip_tags($this->match('/<span class="reviews-num">(.*?)<\/span>/msi', $apkgk, 1))); 
$arr['ratings_GP_apkgk']		= trim(strip_tags($this->match('/<span class="reviews-num">(.*?)<\/span>/msi', $apkgk, 1))); 
if ($arr['ratings_GP'] === FALSE or $arr['ratings_GP'] == '') $arr['ratings_GP'] = $arr['ratings_GP_apkgk'];

##### Size Apk ##### $apkpremier_alt
$arr['sizes_GP']				= $this->match('/<li class="list-group-item col-xs-12 col-sm-6"><span class="itip">File Size<\/span><span>(.*?)<\/span><\/li>/msi', $apkshub, 1);
$arr['sizes_GP']				= str_replace('Varies with device', 'N/A',  $arr['sizes_GP']);

$arr['sizes_apkpremier']		= $this->match('/<div class="size_date">.*?<span>Size: (.*?)<\/span><span>.*?<\/span>/msi', $apkpremier_alt, 1); 

$arr['sizes_GP_2']				= trim(strip_tags($this->match('/<div class="hAyfc">.*?<div class="BgcNfc">.*?<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">(\d+)\M<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp1, 1)));

$arr['sizes_GP_alt']			= $arr['size_downloadlinks_orig'][0];
if ($arr['sizes_GP'] === FALSE or $arr['sizes_GP'] == '') $arr['sizes_GP'] = $arr['sizes_apkpremier'] = $arr['sizes_GP_alt'];	 
 
##### Youtube Trailer #####
$arr['youtube_GP']				= $this->match('/<div class="PyyLUd"><video.*?poster=".*?\/vi\/(.*?)\/hqdefault.jpg".*?>.*?<\/button><\/div><\/div>/msi', $gp_en_us, 1);

##### Whats News #####
$arr['whatnews_GP']				= $this->match('/What.*?new<\/h2>.*?<div itemprop="description">(.*?)<\/div>.*?<\/div>.*?<\/section>/msi', $gp1, 1);

$arr['whatnews_GP_apkgk']		= $this->match('/What.*?New<\/h2>.*?<div class="tab-pane fade in active xblock">(.*?)<\/div>.*?<div class="spacer-20"><\/div>/msi', $apkgk, 1);

$arr['whatnews_GP1']			= $this->match('/What.*?New<\/h2>.*?<div class="tab-pane fade in active xblock">(.*?)<\/div>.*?<div class="spacer-20"><\/div>/msi', $apkgk, 1);
if ( $arr['whatnews_GP'] === FALSE or $arr['whatnews_GP'] == '' ) $arr['whatnews_GP'] = $arr['whatnews_GP_apkgk'];

##### Update Times #####
$arr['updates_GP']				= $this->match('/<time datetime="(.*?)">.*?<\/time>/msi', $apkgk, 1);

$arr['updates_GP_alt']			= trim(strip_tags($this->match('/<div><div class="lXlx5">Updated on<\/div><div class="xg1aie">(.*?)<\/div><\/div>/msi', $gp1, 1)));

$arr['updates_GP_apkgk']		= trim(strip_tags($this->match('/<time datetime="(.*?)">.*?<\/time>/msi', $apkgk, 1)));
if ( $arr['updates_GP'] === FALSE or $arr['updates_GP'] == '' ) $arr['updates_GP'] = $arr['updates_GP_alt'];

##### Poster Images #####
$arr['poster_GP']			= $this->match('/<meta property="og:image" content="(.*?)">/msi', $gp1, 1);	 
$arr['poster_GP_alt']		= $poster_web;
$arr['poster_GP_2'] 		= $this->match('/<meta name="twitter:image" content="(.*?)\=w.*?">/msi', $gp1, 1);
$arr['poster_GP_apkgk'] 	= $this->match('/<div class="col-xs-2 col-sm-1 item-thumb">.*?<img class="lzl".*?data-src="(.*?)\=w.*?" alt=".*?">.*?<\/div>/msi', $apkgk, 1);
if ( $arr['poster_GP'] === FALSE or $arr['poster_GP'] == '' ) $arr['poster_GP'] = $arr['poster_GP_alt'];
/* 
if(empty($arr['poster_GP']) || !preg_match("/(.*?)/i", $arr['poster_GP'])) {
$arr['error']					= "Title ID Play Store No Found";
return $arr;
}
*/


##### Developers #####
$arr['developers_GP']			= $this->match('/<div class="Vbfug auoIOc"><a.*?><span>(.*?)<\/span><\/a><\/div>/msi', $gp1, 1);
$arr['developers_GP_alt']		= $developer_web;
if ( $arr['developers_GP'] === FALSE or $arr['developers_GP'] == '' ) $arr['developers_GP'] = $arr['developers_GP_alt'];

$arr['developers2_GP']			= trim(strip_tags($this->match('/<div class="hAyfc"><div class="BgcNfc">Offered By<\/div><span class="htlgb"><div class="IQ1z0d"><span class="htlgb">(.*?)<\/span><\/div><\/span><\/div>/msi', $gp1, 1)));
      

##### Gallery & Backgrounds Images #####
$arr['images_GP']				= $this->match_all('/<img src="(.*?)".*?>/ms', $this->match('/<div.*?role="list">(.*?)<div jsaction.*?/ms', $gp1, 1), 1);

$arr['images_GP2']				= $this->match_all('/<img src="(.*?)".*?>/ms', $this->match('/<div.*?role="list">(.*?)<div jsaction.*?/ms', $gp1, 1), 1);
$arr['images_GP3']				= $this->match_all('/<img src="(.*?)".*?>/ms', $this->match('/<div.*?role="list">(.*?)<div jsaction.*?/ms', $gp1, 1), 1);

$arr['images_GP_apkgk']			= $this->match_all('/<a.*?href="(.*?)".*?title=".*?poster.*?">.*?<img.*?<\/a>/ms', $this->match('/<div class="describe-img">.*?<div class="gallery" id="screenshots".*?>(.*?)<h2 id="program-presentation-heading".*?/ms', $apkgk, 1), 1);

$arr['backgrounds_GP']			= $this->match_all('/<img src="(.*?)\.*?".*?itemprop="image".*?>/ms', $this->match('/<div.*?role="list">(.*?)<\/div>.*?<div jsaction.*?/ms', $gp1, 1), 1);

##### Paid #####
$arr['paid_GP']					= $this->match('/<span class="oocvOe">.*?<button aria-label=".*?Buy".*?">.*?d+\(.*?)<\/button>.*?<\/span>/msi', $gp1, 1);

$arr['paid_GP1']				= $this->match('/<button aria-label=".*?Buy".*?">(.*?)<\/button>/msi', $gp_en_us, 1);
$arr['paid_GP2']				= $this->match('/<button aria-label=".*?Buy".*?">(.*?)<\/button>/msi', $gp_en_us, 1);
$arr['paid_GP2']				= preg_replace('/.*?Buy/is', 'Paid',  $arr['paid_GP2']);
$arr['paid_GP3']				= $this->match('/<span class="oocvOe">.*?<button aria-label=".*?Buy".*?">(.*?)<\/button>.*?<\/span>/msi', $gp_en_us, 1);


##### Article & Desc #####
$arr['articlebody_GP']			= $this->match('/<div class="bARER">(.*?)<\/div>.*?<div class="TKjAsc">/msi', $gp1, 1);
$arr['articlebody_GP']			= preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP']);

$arr['articlebody_GP_apkgk']	= $this->match('/<div.*?itemprop="description".*?<\/p>(.*?)<div class="spacer-20">/msi', $apkgk, 1);
$arr['articlebody_GP_apkgk']	= preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP_apkgk']);

$arr['articlebody_GP_alt']		= $article_content;
if ( $arr['articlebody_GP'] === FALSE or $arr['articlebody_GP'] == '' ) $arr['articlebody_GP'] = $arr['articlebody_GP_alt'];

$arr['articlebody_GP_language'] = $this->match('/<span jsslot.*?>.*?<div jsname="Igi1ac" style="display:none;">(.*?)<\/div>.*?<\/span>/msi', $gp1, 1);
$arr['articlebody_GP_language'] = preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP_language']);

if ($arr['articlebody_GP_language'] === FALSE or $arr['articlebody_GP_language'] == '') $arr['articlebody_GP_language'] = $arr['articlebody_GP'];

$arr['desck_GP_language']		= trim(strip_tags($this->match('/<span jsslot>.*?<div jsname="Igi1ac" style="display:none;">(.*?)\..*?<\/div>.*?<\/span>/msi', $gp1, 1)));
if ( $arr['desck_GP'] === FALSE or $arr['desck_GP'] == '' ) $arr['desck_GP'] = $arr['desck_GP2'];

$arr['desck_GP']				= substr(trim(strip_tags($this->match('/<meta.*?itemprop="description".*?content="(.*?)">/msi', $gp1, 1))),0,160);
$arr['desck_GP2']				= substr(trim(strip_tags($this->match('/<div jsname="sngebd">(.*?)\..*?/msi', $gp1, 1))),0,160);
if ( $arr['desck_GP'] === FALSE or $arr['desck_GP'] == '' ) $arr['desck_GP'] = $arr['desck_GP2'];
if ($arr['desck_GP_language'] === FALSE or $arr['desck_GP_language'] == '') $arr['desck_GP_language'] = $arr['desck_GP'];
