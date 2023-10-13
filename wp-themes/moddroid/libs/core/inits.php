<?php
/*-----------------------------------------------------------------------------------*/
/*  @EXTHEMES DEVS
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
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
if ( ! defined( 'ABSPATH' ) ) exit; 
@ini_set('WP_MEMORY_LIMIT', '256M');
@ini_set('WP_MAX_MEMORY_LIMIT', '256M');
@ini_set('upload_max_size', '256M');
@ini_set('post_max_size', '256M');
@ini_set('max_execution_time', '300');
@ini_set('pcre.recursion_limit',20000000);
@ini_set('pcre.backtrack_limit',10000000);
require_once EX_THEMES_DIR. '/libs/tgm.php';
require EX_THEMES_DIR.'/libs/elements/ads.php';
require EX_THEMES_DIR.'/libs/elements/comments.php';
require_once EX_THEMES_DIR.'/libs/elements/comments.php';
require EX_THEMES_DIR.'/libs/elements/scripts.php';
require EX_THEMES_DIR.'/libs/elements/breadcrumb.php';
require EX_THEMES_DIR.'/libs/elements/navwalker.php';
require EX_THEMES_DIR.'/libs/elements/inits.php';
require EX_THEMES_DIR.'/libs/plugins.php';
require EX_THEMES_DIR.'/libs/elements/core.php';
require EX_THEMES_DIR.'/libs/elements/extra.php';
require EX_THEMES_DIR.'/libs/elements/widget.php'; 
require EX_THEMES_DIR.'/libs/elements/cpt.php';
require EX_THEMES_DIR.'/libs/elements/seo.php';
require EX_THEMES_DIR.'/libs/elements/adm.php';
require EX_THEMES_DIR.'/libs/elements/toc.php';
require EX_THEMES_DIR.'/libs/elements/gallery.php';
require EX_THEMES_DIR.'/libs/elements/background.php';
require EX_THEMES_DIR.'/libs/elements/css-js.php'; 
require EX_THEMES_DIR.'/libs/import-demo.php';
require EX_THEMES_DIR.'/wp-report-post/wp-report-post.php';
if ( class_exists( 'Rate_My_Post' ) ) {
require EX_THEMES_DIR.'/libs/elements/ratingfilter.php';  
}
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\