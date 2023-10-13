<?php 
   /* 
   Template Name: Template - Rate by Playstore
   */ 

global $opt_themes, $wpdb, $post, $wp_query;
$paged_categorie_games			= (get_query_var('paged')) ? get_query_var('paged') : 1;  
get_header();
?>  


    <div id="content post-id-<?php the_ID(); ?> post-view-count-<?php ex_themes_set_post_view_(); echo ex_themes_get_post_view_alts(); ?>" class="site-content">
       <div class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm p-3 px-2 px-md-3 mx-auto mb-3" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>;display:none;"> 
      <div class="container">
         <ul id="breadcrumb" class="breadcrumb">
            <li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
            <li class="breadcrumb-item home"><?php the_title(); ?></li>
         </ul>
      </div>
   </div>
   
   <div class="container">
		<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><div class="row"><?php } else { ?><?php } ?>
			<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><main id="primary" class="col-12 col-lg-8 content-area"><?php } else { ?><main id="primary" <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>class="<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?>col-12 col-lg-9 content-area<?php } else { ?>content-area<?php } ?>"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
			<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?><article class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 mx-auto mb-3" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { ?> <?php } ?>
            <h2 class="h5 font-weight-semibold mb-3"><span class="<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>text-body<?php } else { ?>text-body  <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?> border-secondary  d-inline-block pb-1<?php } ?>"><?php the_title(); ?></span></h2> 
					
                    <div class="mb-4 entry-content">					
					<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<?php if( get_the_content() ) { ?>
					<?php the_content();?>
					<?php } else { ?>
					<p>Discover thousands of unique mobile games and apps <?php printf( __( '%s', THEMES_NAMES ), '<b>' . get_the_title( '', false ) . '</b>' ); ?>. We are constantly updating,  along with the best mods available here</p>			
					<?php } ?>
					<?php endwhile; else : ?>
					<?php endif; ?>
					</div>
					
                    <div class="row">
					<?php					
					$rate_GP						= get_post_meta( $post->ID, 'wp_rated_GP', true );
					$ratings_GP						= get_post_meta( $post->ID, 'wp_ratings_GP', true );
					query_posts( array( 
						 
						'post_type'			=> 'post',
						'meta_query'		=> array(
						'relation'			=> 'AND',
						'average_clause'	=> array(
							'key'			=> 'wp_rated_GP',
							'compare'		=> 'EXISTS',
						),
						'count_clause'		=> array(
							'key'			=> 'wp_ratings_GP',
							'compare'		=> 'EXISTS',
						),
						),
						'orderby'				=> array(
							'average_clause'	=> 'DESC',
							'count_clause'		=> 'DESC',
						),
						'ignore_sticky_posts' => true
					));
                  
                  if (have_posts()) : while (have_posts()) : the_post();				  
					if($opt_themes['mdr_style_3']) {
						get_template_part('template/loop.item.top.rate.gp');
					} else {
						get_template_part('template/loop.item'); 
					}				
				  endwhile; 
				  wp_reset_postdata();
				  endif; ?>
            </div>
            <nav class="nav-pagination pb-3">
               <ul class="pagination">
                  <?php ex_themes_page_navy_(); ?>
               </ul>
            </nav>
           
			<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?></article><?php } else { ?> <?php } ?>	
         </main>
			
			<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><!--sidebar--><aside id="secondary" class="col-12 col-lg-4 widget-area"><?php get_sidebar(); ?></aside><!--sidebar--><?php } else { ?><?php } ?>
			
		<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?></div><?php } else { ?><?php } ?>
      <?php get_template_part('template/breadcrumbs'); ?>
   </div>
</div>
<?php get_footer(); 