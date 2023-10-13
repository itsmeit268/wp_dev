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
global $opt_themes;
error_reporting(SALAH);
require EX_THEMES_DIR.'/libs/inc.header.php';
?>
<!DOCTYPE html>
<html style="margin-top: 0px !important;" <?php if($rtl_on){ ?>dir="rtl" lang="<?php echo $langs; ?>"<?php } else { language_attributes(); } ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta content='yes' name='apple-mobile-web-app-capable'/>
<meta content='width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=5.0' name='viewport'/>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta content='true' name='MSSmartTagsPreventParsing'/>
<!-- Theme Color -->
<meta content='<?php if($color_theme){echo $color_theme;}else{echo $color_theme_alt;} ?>' name='theme-color'/>
<meta content='<?php if($color_theme){echo $color_theme;}else{echo $color_theme_alt;} ?>' name='msapplication-navbutton-color'/>
<meta content='<?php if($color_theme){echo $color_theme;}else{echo $color_theme_alt;} ?>' name='apple-mobile-web-app-status-bar-style'/>
<!-- Theme Favicon -->
<link rel="shortcut icon" href="<?php if($favicon) { echo $favicon; } else { echo EX_THEMES_URI; ?>/assets/img/icons.png<?php } ?>" type="image/x-icon" />

<?php 
wp_head();
echo PHP_EOL;
ex_themes_head_section(); 
mdr_head_script();
?>
</head>

<body<?php if($rtl_on){ ?> class="rtl Rtl"<?php } else{ } if($opt_themes['header_styles']){ ?> class='oGrd bD onId onHm' id='mainCont' <?php } ?>>
<?php if($opt_themes['header_styles']){ ?><input class='navi hidden' id='offNav' type='checkbox'/><?php } ?>
<div id="page" class="<?php if($opt_themes['header_styles']){ ?>mainWrp <?php } if($style_2_on) { ?>bg-color<?php } else { } ?> <?php if(!$opt_themes['mdr_style_3']){ ?>site<?php } ?>">

<?php 
wp_body_open();
if (!$opt_themes['header_styles'] && !$opt_themes['mdr_style_3']) {
get_template_part('include/header'); 
} elseif ($opt_themes['mdr_style_3'] && $opt_themes['header_styles'] ){ 
get_template_part('include/header.new');
} else { 
get_template_part('include/header.old'); 
}
if( $opt_themes['mdr_style_3'] && $opt_themes['header_styles'] && $opt_themes['enable_categorie']) { get_template_part('include/categorie'); }