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
get_header(); ?>
<div id="content" class="site-content">
	<div class="py-2"> 
		<div class="container py-1">
			<ul id="breadcrumb" class="breadcrumb">
				<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
				<?php printf( __( '%s', THEMES_NAMES ), '<li class="breadcrumb-item">' . single_cat_title( '', false ) . '</li>' ); ?>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<main id="primary" class="col-12 col-lg-8 content-area">
			<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?><section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 mb-3"><?php } else { ?> <?php } ?>
			<h1 class="h5 font-weight-semibold mb-3">
				<span class=" <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?>  border-secondary d-inline-block pb-1">
					<?php printf( __( '%s', THEMES_NAMES ), '<p>' . single_cat_title( '', false ) . '</p>' ); ?>
				</span>
			</h1>
			<div class="mb-4">
				<?php ex_themes_banner_header_ads_(); ?>
			</div>
			<div class="row">
				<?php $postcounter = 1; if(have_posts()) : ?>
				<?php while(have_posts()) : $postcounter = $postcounter + 1; the_post(); $do_not_duplicate = $post->ID; $the_post_ids = get_the_ID(); ?>
				<?php get_template_part('template/loop.item'); ?>
				<?php endwhile; ?>
				<?php else : ?>
			</div>
			<p style="text-align:center;padding:10px;"><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', THEMES_NAMES ); ?></p>
			<?php endif; ?>
		</div>
		<nav class="nav-pagination pb-3">
			<ul class="pagination">
				<?php ex_themes_page_navy_(); ?>
			</ul>
		</nav> 
		<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?></section><?php } else { ?> <?php } ?>
		</main>
			<!--sidebar-->
			<?php if(!$opt_themes['mdr_style_3']) { if($sidebar_on) { ?><!--sidebar--><aside id="secondary" class="col-12 col-lg-4 widget-area"><?php get_sidebar(); ?></aside><!--sidebar--><?php } else { ?><?php } ?>
			<?php if($sidebar_on) { ?></div><?php } else { ?><?php }} ?>
	</div>
	<?php get_template_part('template/breadcrumbs'); ?>
</div>
</div>
<?php get_footer(); 