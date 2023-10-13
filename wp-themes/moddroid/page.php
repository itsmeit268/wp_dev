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
require EX_THEMES_DIR.'/libs/inc.page.php';
?>

    <div id="content post-id-<?php the_ID(); ?> post-view-count-<?php ex_themes_set_post_view_(); echo ex_themes_get_post_view_alts(); ?>" class="site-content">
 
	<div class="container">
		<?php if($sidebar_on) { ?><div class="row"><?php } else { ?><?php } ?>
			<?php if($sidebar_on) { ?><main id="primary" class="col-12 col-lg-8 content-area"><?php } else { ?><main id="primary" <?php if($style_2_on) { ?>class="<?php if($sidebar_on) { ?>col-12 col-lg-9 content-area<?php } else { ?>content-area<?php } ?>"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
			<?php if($style_2_on) { ?><article class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 mx-auto mb-3" style="max-width: <?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { ?> <?php } ?>
			<?php get_template_part('include/breadcrums_page'); ?>	
				<h1 class="h5 font-weight-semibold mb-3"><?php echo $title_alt; ?></h1>
				<div class="pb-3 entry-content">
					<?php
					if( have_posts() ) : while( have_posts() ) : the_post();
					the_content();
					endwhile;
					endif;
					?>
				</div>
			<?php if($style_2_on) { ?></article><?php } ?>	
			</main>
			
			<?php if($sidebar_on) { ?><!--sidebar--><aside id="secondary" class="col-12 col-lg-4 widget-area"><?php get_sidebar(); ?></aside><!--sidebar--><?php } ?>
			
		<?php if($sidebar_on) { ?></div><?php } ?>
		<span style="display:none">
		<?php get_template_part('include/breadcrumbs_down'); ?>
		</span>
	</div>
</div>
<?php get_footer(); 