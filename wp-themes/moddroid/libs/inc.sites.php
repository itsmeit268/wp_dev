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
global $wpdb, $post, $opt_themes; 
$rtl_on				= $opt_themes['ex_themes_activate_rtl_'];
$style_2_on			= $opt_themes['ex_themes_home_style_2_activate_'];
$rtl_homes			= $opt_themes['rtl_homes'];
$search_results		= $opt_themes['exthemes_Searchresults'];
$sidebar_on			= $opt_themes['sidebar_activated_'];
$text_not_found		= $opt_themes['exthemes_File_not_founds']; 
$search_term		= substr($_SERVER['REQUEST_URI'], 1);
$search_term		= urldecode(stripslashes($search_term));
$search_term		= rtrim($search_term, "/");
$find				= array("'.html'", "'.+/'", "'[-/_]'");
$replace			= " ";
$search_term		= trim(preg_replace($find, $replace, $search_term));
$search_term		= str_replace("%20", $replace, $search_term);
$search_term		= preg_replace('!\s+!', ' ', $search_term);