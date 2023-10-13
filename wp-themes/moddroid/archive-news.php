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
?>
<div id="content" class="site-content">


<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--moddroid-->
<div class=" mb-3" style="max-width:850px;"> 
<div class="container py-1">
<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<li class="breadcrumb-item active"><?php printf( __( '%s', THEMES_NAMES ), '' . post_type_archive_title( '', false ) . '' ); ?></li>
</ul>
</div>
</div>
<?php }  elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--modyolo-->
<div class="py-2" > 
	<div class="container ">
<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<li class="breadcrumb-item active"><?php printf( __( '%s', THEMES_NAMES ), '' . post_type_archive_title( '', false ) . '' ); ?></li>
</ul>
</div>
</div>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--style 3-->
<div class="bg-white  rounded shadow-sm pt-3 pb-3 mb-3" > 
	<div class="container py-1">
<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<li class="breadcrumb-item active"><?php printf( __( '%s', THEMES_NAMES ), '' . post_type_archive_title( '', false ) . '' ); ?></li>
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
		
	 
		<h<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>1<?php } else { ?>2<?php } ?> class="h5 font-weight-semibold mb-3"><?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?><?php printf( __( '%s', THEMES_NAMES ), '' . post_type_archive_title( '', false ) . '' ); ?><?php } else { ?><span class="<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?>text-body<?php } else { ?>text-body  <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?>  border-secondary d-inline-block pb-1<?php } ?>"><?php printf( __( '%s', THEMES_NAMES ), '' . post_type_archive_title( '', false ) . '' ); ?></span><?php } ?></h<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>1<?php } else { ?>2<?php } ?>> 
		
		<div class="m-3">
			<?php ex_themes_banner_header_ads_(); ?>
		</div>
	<div class="row">
			<?php $postcounter = 1; if(have_posts()) : ?>
			<?php while(have_posts()) : $postcounter = $postcounter + 1; the_post(); $do_not_duplicate = $post->ID; $the_post_ids = get_the_ID(); 
			
			global $wpdb, $post, $opt_themes;
			$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url']; 
			$image_id						= get_post_thumbnail_id($post->ID); 
			if($opt_themes['ex_themes_home_style_2_activate_']) {
			$full							= 'thumbnails-news-arc-new'; 
			} else {
			$full							= 'thumbnails-news-arc'; 
			}
			$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
			$image_url_news_arc				= $image_url[0];
			?>
			<div class="col-12 col-sm-6 col-lg-4 mb-4 ">
				<a class="embed-responsive embed-responsive-16by9 bg-cover d-block" style="background-image: url(<?php if (has_post_thumbnail()) { echo $image_url_news_arc; } else { echo $defaults_no_images; } ?>); box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.15);" href="<?php the_permalink() ?>">
					<div class="d-flex align-items-end p-3 position-absolute" style="background-color: rgba(0, 0, 0, 0.5); top: 0; bottom: 0; left: 0; right: 0;">
						<h3 class="text-white mb-0" style="font-size: 0.875rem;"><?php the_title(); ?></h3>
					</div>
				</a>
			</div>
			<?php endwhile; ?>	
			<?php else : ?>
	</div>
	<p style="text-align:center;padding:10px;">Ready to publish your first post? <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">Get started here</a></p>
	<?php endif; ?>
	
	<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?></<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>section<?php } else { ?>article<?php } ?>><?php } else { ?> <?php } ?>	
	 
	<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> <?php } else { ?> 
	<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?><section class="bg-white border rounded shadow-sm pt-3 px-2 px-md-3 mb-3"><?php } else { ?><section class="mb-4" style='display:none'><?php } ?>
		<h2 class="h5 font-weight-semibold mb-3">
			<span class="border-bottom-2 border-secondary d-inline-block pb-1">
				Tags </span>
		</h2>
		<div class="d-flex flex-wrap">
			<?php
			/* $argsx = array( 'taxonomy' => 'news_tags',  'order' => 'ASC' );
			$categoriesx = get_categories( $argsx );
			$terms = get_the_terms($post->ID, 'news_tags');
			if(! empty($categoriesx)){
				foreach($categoriesx as $term){
					$url = get_term_link($term->slug, 'news_tags');
					print "<span class=\"btn btn-light mr-2 mb-2\"><a href='#{$url}'>{$term->name}</a></span>";
				}
			} */
			?>
			<?php echo trim(strip_tags(get_the_term_list( $post->ID, 'news_tags', '<span class="btn btn-light mr-2 mb-2">', ', ', '</span>' ))); ?>
		</div>
		 
	</section>
	<?php } ?>
	
				
				<nav class="nav-pagination pb-3">
					<ul class="pagination blogPager ">
						<?php ex_themes_page_navy_(); ?>
					</ul>
				</nav>			
				
	
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