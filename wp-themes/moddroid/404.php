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
require EX_THEMES_DIR.'/libs/inc.sites.php';
?>

<div id="content post-id-<?php the_ID(); ?> " class="site-content">


<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--moddroid-->
<div class=" mb-3" style="max-width:850px;"> 
<div class="container py-1">
<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<li class="breadcrumb-item active"><?php echo $search_term; ?></li>
</ul>
</div>
</div>
<?php }  elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--modyolo-->
<div class="py-2" > 
<div class="container ">
<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<li class="breadcrumb-item active"><?php echo $search_term; ?></li>
</ul>
</div>
</div>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--style 3-->
<div class="bg-white  rounded shadow-sm pt-3 pb-3 mb-3" > 
<div class="container py-1">
<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<li class="breadcrumb-item active"><?php echo $search_term; ?></li>
</ul>
</div>
</div>
<?php }  ?>

 
	<div class="container">
		<?php if($opt_themes['sidebar_activated_']) { ?><div class="row"><?php } ?> 
		<?php if($opt_themes['sidebar_activated_']) { ?>
		<main id="primary" class="col-12 <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>col-lg-9 <?php } else { ?>col-lg-8 <?php } ?> content-area <?php if($opt_themes['mdr_style_3']){ ?>pl-3 pr-3 <?php } else { ?> <?php } ?>">
		<?php } else { ?>
		<main id="primary" <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>class="<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?>col-12 col-lg-9 content-area <?php } else { ?>content-area<?php } ?>"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
		
		<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>
		<<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>section <?php } else { ?>article <?php } ?> class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?> <?php } else { ?>mx-auto <?php } ?> mb-3" style="max-width: <?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?> <?php } else { ?>900px <?php } ?><?php } else { ?> 820px<?php } ?>;"><?php } ?>
		
		<h<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>1<?php } else { ?>2<?php } ?> class="h5 font-weight-semibold mb-3"><?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?><?php _e('Search results for', THEMES_NAMES);  ?> <?php echo $search_term; ?><?php } else { ?><span class="<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?>text-body<?php } else { ?>text-body  <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?>  border-secondary d-inline-block pb-1<?php } ?>"><?php _e('Search results for', THEMES_NAMES);  ?> <?php echo $search_term; ?></span><?php } ?></h<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>1<?php } else { ?>2<?php } ?>> 

			<div class="m-3"><?php ex_themes_banner_header_ads_(); ?></div>			 
			<div class="alert alert-dangers text-center "><?php if($text_not_found){ echo $text_not_found; } ?> 
			</div>	
			<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?></<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>section<?php } else { ?>article<?php } ?>><?php } else { ?> <?php } ?>	
			<span style="display:none"><?php get_template_part('template/breadcrumbs'); ?></span>			
		 				
			</main>
						
			<?php if($opt_themes['sidebar_activated_']) { ?>
			<!--sidebar-->
			<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
			<!--moddroid--> 
			<aside id="secondary" class="col-12 col-lg-4 widget-area">
			<?php } elseif($opt_themes['ex_themes_home_style_2_activate_']){ ?>
			<!--modyolo--> 
			<aside id="secondary" class="col-12 col-lg-3 widget-area">
			<?php } elseif($opt_themes['mdr_style_3'] ){ ?>
			<!--style 3-->
			<aside id="secondary" class="mt-3 col-12 col-lg-4 widget-area">
			<?php } 
			get_sidebar();
			?>
			</aside>
			<!--sidebar-->
			<?php } ?>
				
 
	</div>
</div>
<?php get_footer(); 