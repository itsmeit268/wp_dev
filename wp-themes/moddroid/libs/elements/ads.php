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
if ( ! defined( 'ABSPATH' ) ) exit; 
add_shortcode('ex_themes_banner_single_ads_', 'ex_themes_banner_single_ads_');
function ex_themes_banner_single_ads_() {
global $opt_themes; 
$banner_single_1_on		= $opt_themes['ex_themes_banner_single_ads_activate_'];
$banner_single_1_code	= $opt_themes['ex_themes_banner_single_ads_code_'];
if($banner_single_1_on) { ?>
<center><?php echo $banner_single_1_code; ?></center><br>
<?php }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_shortcode('ex_themes_banner_single_ads_2', 'ex_themes_banner_single_ads_2'); 
function ex_themes_banner_single_ads_2() { 
global $opt_themes; 
$banner_single_2_on		= $opt_themes['ex_themes_banner_single_ads_activate_2'];
$banner_single_2_code	= $opt_themes['ex_themes_banner_single_ads_code_2'];
if($banner_single_2_on) { ?>
<center><?php echo $banner_single_2_code; ?></center><br>
<?php }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_shortcode('ex_themes_banner_single_ads_download', 'ex_themes_banner_single_ads_download');
function ex_themes_banner_single_ads_download() {
global $opt_themes; 
$banner_single_download_1_on		= $opt_themes['ex_themes_banner_single_download_page_active_'];
$banner_single_download_1_code		= $opt_themes['ex_themes_banner_single_download_page_code_'];
if($banner_single_download_1_on) { ?>
<center><?php echo $banner_single_download_1_code; ?></center><br>
<?php }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_shortcode('ex_themes_banner_single_ads_download_2_', 'ex_themes_banner_single_ads_download_2_');
function ex_themes_banner_single_ads_download_2_() {
global $opt_themes; 
$banner_single_download_2_on		= $opt_themes['ex_themes_banner_single_download_page_active__2'];
$banner_single_download_2_code		= $opt_themes['ex_themes_banner_single_download_page_code__2'];
if($banner_single_download_2_on) { ?>
<center><?php echo $banner_single_download_2_code; ?></center><br>
<?php } 
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_shortcode('ex_themes_banner_single_ads_download_3_', 'ex_themes_banner_single_ads_download_3_');
function ex_themes_banner_single_ads_download_3_() {
global $opt_themes; 
$banner_single_download_3_on		= $opt_themes['ex_themes_banner_single_download_page_active_3'];
$banner_single_download_3_code		= $opt_themes['ex_themes_banner_single_download_page_code_3'];
if($banner_single_download_3_on) { ?>
<center><?php echo $banner_single_download_3_code; ?></center><br>
<?php }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_banner_header_ads_() {
global $opt_themes; 
$banner_header_on		= $opt_themes['ex_themes_banner_header_activate_'];
$banner_header_code		= $opt_themes['ex_themes_banner_header_code_'];
if($banner_header_on) { ?>
<center><?php echo $banner_header_code; ?></center><br>
<?php }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_shortcode('ex_themes_banner_header_ads_', 'ex_themes_banner_header_ads_');
function ex_themes_banner_header_ads_2() {
global $opt_themes; 
$banner_header_2_on		= $opt_themes['ex_themes_banner_header_activate_2'];
$banner_header_2_code	= $opt_themes['ex_themes_banner_header_code_2'];
if($banner_header_2_on) { ?>
<center><?php echo $banner_header_2_code; ?></center><br>
<?php } 
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\