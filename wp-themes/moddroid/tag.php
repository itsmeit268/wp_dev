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

global $opt_themes;
$paged					= (get_query_var('paged')) ? get_query_var('paged') : 1;
$current_cat_id  		= get_query_var('cat');
$cat_ID					= $current_cat_id;
$limited				= $opt_themes['limit_categorie'];
$today					= date('Y-m-d'); 				
$popular_ranges			= $opt_themes['popular_ranges']; 
$one_week_ago			= date('Y-m-d', strtotime($today.' - '.$popular_ranges));
?>


<div id="content" class="site-content">

<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--moddroid-->
<div class=" mb-3" style="max-width:850px;">  
<?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
</div>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--modyolo-->
<div class="py-2" style='display:none'> 
<?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
</div>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--style 3-->
<div class="bg-white  rounded shadow-sm pt-3 pb-3 mb-3" > 
<?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
</div>
<?php } ?>


	
	<div class="container">
		<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><div class="row"><?php } ?>
		
		<?php if($opt_themes['sidebar_activated_']) { ?>
		<main id="primary" class="col-12 <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>col-lg-9 <?php } else { ?>col-lg-8 <?php } ?> content-area <?php if($opt_themes['mdr_style_3']){ ?>pl-3 pr-3 <?php } else { ?> <?php } ?>">
		<?php } else { ?>
		<main id="primary" <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>class="<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?>col-12 col-lg-9 content-area <?php } else { ?>content-area<?php } ?>"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
		
		<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>
		<<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>section <?php } else { ?>article <?php } ?> class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?> <?php } else { ?>mx-auto <?php } ?> mb-3" style="max-width: <?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?> <?php } else { ?>900px <?php } ?><?php } else { ?> 820px<?php } ?>;"><?php } ?>
		
	 
		<h<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>1<?php } else { ?>2<?php } ?> class="h5 font-weight-semibold mb-3"><?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?><?php printf( __( '%s', THEMES_NAMES ), '' . single_cat_title( '', false ) . '' ); ?><?php } else { ?><span class="<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?>text-body<?php } else { ?>text-body  <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?>  border-secondary d-inline-block pb-1<?php } ?>"><?php printf( __( '%s', THEMES_NAMES ), '' . single_cat_title( '', false ) . '' ); ?></span><?php } ?></h<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>1<?php } else { ?>2<?php } ?>> 
		
			<div class="mb-4">
				<?php ex_themes_banner_header_ads_(); ?>
			</div> 				
			 				
				<?php $postcounter = 1; if(have_posts()) : ?>
				<div class="row mb-2">	
					<?php while(have_posts()) : $postcounter = $postcounter + 1; the_post(); $do_not_duplicate = $post->ID; $the_post_ids = get_the_ID();
					if($opt_themes['mdr_style_3']) {
						get_template_part('template/loop.item.new');
					} else {
						get_template_part('template/loop.item'); 
					}
					endwhile; ?>
				</div>
				<?php else : ?>			 
				<div class="alert alert-dangers mb-4"><?php global $opt_themes; if($opt_themes['exthemes_File_not_founds']){ ?><?php echo $opt_themes['exthemes_File_not_founds']; ?><?php } ?> 
				</div>				 
				<?php endif; ?>				
				<nav class="nav-pagination pb-3">
					<ul class="pagination blogPager ">
						<?php ex_themes_page_navy_(); ?>
					</ul>
				</nav>			
			<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?></<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>section<?php } else { ?>article<?php } ?>><?php } else { ?> <?php } ?>
			 
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

<?php
get_footer(); 