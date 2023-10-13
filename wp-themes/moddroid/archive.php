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
<div class="container py-1">
<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<?php printf( __( '%s', THEMES_NAMES ), '<li class="breadcrumb-item">' . single_cat_title( '', false ) . '</li>' ); ?> 
	</ul>
</div>
</div>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--modyolo-->
<div class="py-2" > 
	<div class="container ">
	<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<?php printf( __( '%s', THEMES_NAMES ), '<li class="breadcrumb-item">' . single_cat_title( '', false ) . '</li>' ); ?> 
	</ul>
	</div>
</div>
<?php } elseif($opt_themes['mdr_style_3'] ){ ?>
<!--style 3-->
<div class="bg-white  rounded shadow-sm pt-3 pb-3 mb-3" > 
	<div class="container py-1">
	<ul id="breadcrumb" class="breadcrumb">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
	<?php printf( __( '%s', THEMES_NAMES ), '<li class="breadcrumb-item">' . single_cat_title( '', false ) . '</li>' ); ?> 
	</ul>
	</div>
</div>
<?php } ?>


	
	
	<div class="container">
		<?php if($opt_themes['sidebar_activated_']) { ?><div class="row"><?php } ?>
		
		<?php if($opt_themes['sidebar_activated_']) { ?>
		<main id="primary" class="col-12 <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>col-lg-9 <?php } else { ?>col-lg-8 <?php } ?> content-area <?php if($opt_themes['mdr_style_3']){ ?>pl-3 pr-3 <?php } else { ?> <?php } ?>">
		<?php } else { ?>
		<main id="primary" <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>class="<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?>col-12 col-lg-9 content-area <?php } else { ?>content-area<?php } ?>"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
		
		<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>
		<<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>section <?php } else { ?>article <?php } ?> class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?> <?php } else { ?>mx-auto <?php } ?> mb-3" style="max-width: <?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> <?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?> <?php } else { ?>900px <?php } ?><?php } else { ?> 820px<?php } ?>;"><?php } ?>
		
	 
		<h<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>1<?php } else { ?>2<?php } ?> class="h5 font-weight-semibold mb-3"><?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?><?php printf( __( '%s', THEMES_NAMES ), '' . single_cat_title( '', false ) . '' ); ?><?php } else { ?><span class="<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?>text-body<?php } else { ?>text-body  <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?>  border-secondary d-inline-block pb-1<?php } ?>"><?php printf( __( '%s', THEMES_NAMES ), '' . single_cat_title( '', false ) . '' ); ?></span><?php } ?></h<?php if($opt_themes['ex_themes_home_style_2_activate_']){ ?>1<?php } else { ?>2<?php } ?>> 
		
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<nav class="overflow-auto d-flex mb-4"  >
			<a class="btn <?php if(!$opt_themes['mdr_style_3']) { ?>btn-light text-nowrap mr-2 <?php } if( isset($_GET["orderby"]) && trim($_GET["orderby"]) == 'modified' ){ if($opt_themes['mdr_style_3']) { echo 'actived'; } else { echo 'active'; } } ?>" href="?orderby=modified"><?php _e('Latest Updates', THEMES_NAMES); ?></a>
			<a class="btn <?php if(!$opt_themes['mdr_style_3']) { ?>btn-light text-nowrap mr-2 <?php } if( isset($_GET["orderby"]) && trim($_GET["orderby"]) == 'date'){ if($opt_themes['mdr_style_3']) { echo 'actived'; } else { echo 'active'; } } ?>" href="?orderby=date"><?php _e('New Releases', THEMES_NAMES); ?></a> 
			<a class="btn <?php if(!$opt_themes['mdr_style_3']) { ?>btn-light text-nowrap mr-2 <?php } if( isset($_GET["orderby"]) && trim($_GET["orderby"]) == 'views'){ if($opt_themes['mdr_style_3']) { echo 'actived'; } else { echo 'active'; } } ?>" href="?orderby=views"><?php _e('Popular', THEMES_NAMES); ?></a>				 
		</nav>
		<?php } ?>
			<div class="mb-4">
				<?php ex_themes_banner_header_ads_(); ?>
			</div>
			
			<div class="mb-4 entry-content">
				<p><?php _e('Discover thousands of unique mobile', THEMES_NAMES); ?> <?php printf( __( '%s', THEMES_NAMES ), '<b>' . single_cat_title( '', false ) . '</b>' ); ?>. <?php _e('We are constantly updating daily, along with the best mods available here', THEMES_NAMES); ?></p>
			</div>					
			 
     
      <?php
		$custom_orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : "";
		if(!empty($custom_orderby) && "modified" == $custom_orderby){
		  query_posts( array( 
			'post_type'			=> 'post',
			'posts_per_page'	=> $limited,
			'cat'				=> $cat_ID,
			'paged'				=> $paged,
			'orderby'			=> "modified",
			'order'				=> 'DESC',
			));
		} elseif(!empty($custom_orderby) && "rand" == $custom_orderby){
		  query_posts( array( 
			'post_type'			=> 'post',
			'posts_per_page'	=> $limited,
			'cat'				=> $cat_ID,
			'paged'				=> $paged,
			'orderby'			=> "rand",
			'order'				=> 'ASC',
			));
		} elseif(!empty($custom_orderby) && "rate" == $custom_orderby){
		  query_posts( array( 			
			'post_type'			=> 'post',
			'paged'				=> $paged,
			'posts_per_page'	=> $limited,
			'cat'				=> $cat_ID,
			'meta_query'		=> array(
			'relation'			=> 'AND',
			'average_clause'	=> array(
			'key'     			=> 'rmp_avg_rating',
			'compare'			=> 'EXISTS',
			),
			'count_clause' 		=> array(
			'key'     			=> 'rmp_vote_count',
			'compare' 			=> 'EXISTS',
			),
			),
			'orderby'  			=> array(
			'average_clause' 	=> 'DESC',
			'count_clause'   	=> 'DESC',
			),
			'ignore_sticky_posts' => true		 
			));
		} elseif(!empty($custom_orderby) && "date" == $custom_orderby){
		  query_posts( array( 
			'post_type'			=> 'post',
			'posts_per_page'	=> $limited,
			'cat'				=> $cat_ID,
			'paged'				=> $paged,
			'orderby'			=> "date",
			'order'				=> 'DESC',
			));
		} elseif(!empty($custom_orderby) && "views" == $custom_orderby){
		  query_posts( array( 
			'date_query'		=> array(
			array(
			'before'			=> $today,
			'after'				=> $one_week_ago,
			'inclusive'			=> true
			),
			),
			'post_type'			=> 'post',
			'posts_per_page'	=> $limited,
			'cat'				=> $cat_ID,
			'paged'				=> $paged,
			'meta_key'			=> 'post_views_count', 
			'orderby'			=> 'meta_value_num', 
			'order'				=> 'DESC' 
			));
		} elseif(!empty($custom_orderby) && "views" == $custom_orderby){
		  query_posts( array(
			'date_query'		=> array(
			array(
			'before'			=> $today,
			'after'				=> $one_week_ago,
			'inclusive'			=> true
			),
			),
			'post_type'			=> 'post',
			'posts_per_page'	=> $limited,
			'cat'				=> $cat_ID,
			'paged'				=> $paged,
			'meta_key'			=> 'post_views_count', 
			'orderby'			=> 'meta_value_num', 
			'order'				=> 'DESC',
			));
		} else {	   
		query_posts( array(                  			
		'date_query'		=> array(
		array(
		'before'			=> $today,
		'after'				=> $one_week_ago,
		'inclusive'			=> true
		),
		),
		'paged'				=> $paged, 		
		'cat'				=> $cat_ID,
		'posts_per_page'	=> $limited,
		'meta_key'			=> 'post_views_count', 
		'orderby'			=> 'meta_value_num', 
		'order'				=> 'DESC'
		));		
		}		 
                  
				  $postcounter = 1; if(have_posts()) : ?>
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