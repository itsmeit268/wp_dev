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
require EX_THEMES_DIR.'/libs/inc.news.php';

global $wpdb, $post, $opt_themes;
$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url']; 
$image_id						= get_post_thumbnail_id($post->ID); 
if($opt_themes['ex_themes_home_style_2_activate_']) {
$full							= 'thumbnails-news-bg-new'; 
} else {
$full							= 'thumbnails-news-bg'; 
}
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_news_post			= $image_url[0];
?>

<div id="content post-id-<?php the_ID(); ?> post-view-count-<?php ex_themes_set_post_view_(); echo ex_themes_get_post_view_alts(); ?>" class="site-content">
 
	<div class="container">
		<?php if($opt_themes['sidebar_activated_']) { ?><div class="row"><?php } ?> 
			<?php if($opt_themes['sidebar_activated_']) { ?>
		<main id="primary" class="col-12 <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>col-lg-9 <?php } else { ?>col-lg-8 <?php } ?> content-area <?php if($opt_themes['mdr_style_3']){ ?>pl-3 pr-3 <?php } else { ?> <?php } ?>">
		<?php } else { ?>
		<main id="primary" <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>class="<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?>col-12 col-lg-9 content-area <?php } else { ?>content-area<?php } ?>"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
		
		
		<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>
		<<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>section <?php } else { ?>article <?php } ?> class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?> <?php } else { ?>mx-auto <?php } ?> mb-3" style="max-width: <?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?> <?php } else { ?>900px <?php } ?><?php } else { ?> 820px<?php } ?>;"><?php } ?>
		
			<ul id="breadcrumb" class="breadcrumb <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?>ml-3<?php } else{ ?><?php } ?>"  style="margin-bottom: 10px;">
				<li class="breadcrumb-item home"><a href="<?php echo home_url(); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
				<?php if (get_the_term_list( $post->ID, 'news_categories' )) { ?>
				<li class="breadcrumb-item"><?php echo get_the_term_list( $post->ID, 'news_categories', '<span class="the-category">', ', ', '</span>' ); ?></li>
				<?php } ?>
				<li class="breadcrumb-item active"><?php echo get_the_title(); ?></li>
			</ul>
				<h1 class="h5 font-weight-semibold text-truncate mb-2"><?php echo get_the_title(); ?></h1>
				<div class="small font-weight-medium text-muted mb-3">
					<em><?php _e('by', THEMES_NAMES); ?> <?php echo $display_name; ?>, <?php echo get_the_time('l, j F Y ')?> (<?php the_time(); ?>) <?php echo edit_post_link( __( 'edit post', THEMES_NAMES ), ' ', ' ' ); ?>  </em>
				</div>
				<div class="zmImg text-center mb-3">
					<img width="100%" height="100%" src="<?php if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } ?>" class="rounded-lg shadow-sm mx-auto d-block" alt="<?php echo get_the_title(); ?>" loading="lazy" width="1024" height="500" style="max-height: 300px;" />
				</div> 				
				<?php 
				if($opt_themes['mdr_style_3']){ 
				global $wpdb, $post, $wp_query, $opt_themes;
				$review_title						= get_post_meta( $post->ID, 'review_title', true );
				$review_images						= get_post_meta( $post->ID, 'review_images_url', true );
				$review_links						= get_post_meta( $post->ID, 'review_links', true );
				$review_name_links					= get_post_meta( $post->ID, 'review_name_links', true );
				$review_desc						= get_post_meta( $post->ID, 'review_desc', true );
				$review_rating						= get_post_meta( $post->ID, 'review_rating', true );
				$total_views						= ex_themes_get_post_view_(); 
				$total_views_alts					= ex_themes_get_post_view_alts(); 
				
				$rate_GP						= get_post_meta( $post->ID, 'wp_rated_GP', true );
				$ratings_GP						= get_post_meta( $post->ID, 'wp_ratings_GP', true );
				$rate_GP1						= get_post_meta( $post->ID, 'wp_rated_GP', true );
				if(get_post_meta($post->ID, 'review-app-on', true) == 'yes') { 
				?>
				<div class="review_app_box">
				<img src="<?php echo $review_images; ?>" class="icon " alt="<?php echo $review_title; ?>" data-was-processed="true">
				<div class="text">
					<a href="<?php echo $review_links; ?>" class="title "><?php echo $review_title; ?></a>
					<p><?php echo $review_desc; ?></p>
					<div class="other"> 						
						<div class="Stars" style="--rating:<?php if($review_rating){ echo $review_rating; } else { ?>0<?php } ?>;" aria-label="Rating of this product is <?php if($review_rating){ echo $review_rating; } else { ?>0<?php } ?> out of 5">
						<div class="rmp-results-widget__avg-rating" style="font-size: 13px;"><?php echo $review_rating; ?></div>
						<div class="rmp-results-widget__vote-count" style="font-size: 12px;">(<?php echo $total_views_alts; ?>)</div>
						</div>
					</div>
				</div>
				<a href="<?php echo $review_links; ?>" class="button"><?php echo $review_name_links; ?></a>
				</div>
				<?php }} ?>
				
				<div class="pb-3  entry-content" id='entry-content'>
					<?php if( have_posts() ) : while( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
				</div> 
				 
				<?php if(function_exists('kk_star_ratings')) : ?>
				<div class="text-center d-flex align-items-center justify-content-center py-3 mb-3">
					<?php echo kk_star_ratings(); ?>
				</div>
				<?php endif ?>
				<?php ex_themes_blog_shares_2(); ?>
				<?php if ( shortcode_exists( 'rns_reactions' ) ): ?>
				<?php echo do_shortcode( '[rns_reactions]' ); ?>
				<?php else: ?>
				<?php endif;?>	
				
				<?php if (get_the_term_list( $post->ID, 'news_tags' )) { ?>
				<span class="tags-links pb-3">
				<?php
				$terms = wp_get_post_terms( $post->ID, 'news_tags');
				foreach ( $terms as $term ) {
				  $term_link = get_term_link( $term );
				  echo '<a href="'.$term_link.'"># '.$term->name.'</a>';
				}
				?>
				</span>
				<?php } ?>

				 
				<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?></article><?php } else { ?> <?php } ?>	
				<!--comments-->
				<?php 
				if($opt_themes['ex_themes_comments_activate_']){
				if($opt_themes['mdr_style_3']) {
				ex_themes_leave_comments_();
				} else {
				comments_template();
				}
				} ?>
					
			<span style="display:none"><?php get_template_part('template/breadcrumbs'); ?></span>
			</main>
			 
			
			<!--sidebar-->
			<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
			<!--moddroid--> 
			<aside id="secondary" class="col-12 col-lg-4 widget-area">
			<?php } elseif($opt_themes['ex_themes_home_style_2_activate_']){ ?>
			<!--modyolo--> 
			<aside id="secondary" class=" col-12 col-lg-3 widget-area">
			<?php } elseif($opt_themes['mdr_style_3'] ){ ?>
			<!--style 3-->
			<aside id="secondary" class="mt-3 col-12 col-lg-4 widget-area">
			<?php } 
			get_sidebar();
			?>
			</aside>
			<!--sidebar-->
	</div>
</div>
<?php get_footer();  