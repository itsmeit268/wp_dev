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
global $wpdb, $post, $opt_themes;
$latest_post_hide		= $opt_themes['enable_latest_post'];
?> 

 
<div id="content" class="site-content">
	<div class="container pt-3">
		<div class="row">
					
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--moddroid--> 
		<main id="primary" class="col-12 col-lg-8 content-area">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
		<!--modyolo & style 3-->
		<main id="primary" class="col-12 col-lg-8 content-area">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--modyolo--> 
		<main id="primary" class="col-12 col-lg-9 content-area"> 
		<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--style 3-->
		<main id="primary" class="col-12 col-lg-8 content-area">
		<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--moddroid-->
		<main id="primary" class="col-12 col-lg-8 content-area">
		<?php } 
        if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('editor-choices') ) : endif;
        ex_themes_banner_header_ads_(); 
        if($latest_post_hide) { 
        } else {
        get_template_part('template/home');
        ?>				
		<nav class="nav-pagination">
		<ul class="pagination blogPager  m-3">
		<?php ex_themes_page_navy_(); ?> 
		</ul>
		</nav> 
		<?php } 
        ex_themes_banner_header_ads_(); 
        if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home-popular') ) : endif;
        ?>
		</main>
        
		<!--sidebar-->
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--moddroid--> 
		<aside id="secondary" class="col-12 col-lg-4 widget-area">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
		<!--modyolo & style 3-->
		<aside id="secondary" class="mt-3 col-12 col-lg-4 widget-area">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--modyolo--> 
		<aside id="secondary" class="col-12 col-lg-3 widget-area">
		<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--style 3-->
		<aside id="secondary" class="mt-3 col-12 col-lg-4 widget-area">
		<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--moddroid-->
		<aside id="secondary" class="col-12 col-lg-4 widget-area">
		<?php } 
        get_sidebar();
        ?>
		</aside>
		<!--sidebar-->
		</div>
	</div>
</div> 

<?php
get_footer(); 