		<?php
		global $opt_themes;
		?>
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--moddroid--> 
		<section class="mb-4">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
		<!--modyolo & style 3-->
		<section class="bg-white border rounded shadow-sm  pb-3 pt-3 px-2 px-md-3 mt-3 m-2">
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--modyolo--> 
		<section class="bg-white border rounded shadow-sm pt-3 px-2 px-md-3 mb-3">
		<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--style 3-->
		<section class="bg-white rounded shadow-sm pb-3 pt-3 px-2 px-md-3 mt-3 m-2">
		<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--moddroid-->
		<section class="mb-4">
		<?php } ?>
		
				
		<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--moddroid--> 
		<div class="d-flex align-items-baseline justify-content-between ">		 
		<h2 class="h5 font-weight-semibold mb-3 text-body  <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?> border-secondary d-inline-block pb-1"><?php echo $opt_themes['title_home']; ?></h2>		
		</div>
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
		<!--modyolo & style 3-->
		<div class="d-flex align-items-baseline justify-content-between ">
		<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php echo $title; ?></h2>
		</div>
		<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
		<!--modyolo--> 
		<header class="d-flex align-items-end mb-3">
		<h2 class="h5 font-weight-semibold mb-0"><?php echo $opt_themes['title_home']; ?></h2>
		</header>
		<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--style 3--> 
		<div class="d-flex align-items-baseline justify-content-between ">
		<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php echo $opt_themes['title_home']; ?></h2>
		</div>						
		<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
		<!--moddroid-->  
		<div class="d-flex align-items-baseline justify-content-between ">		 
		<h2 class="h5 font-weight-semibold mb-3 text-body border-bottom-2 border-secondary d-inline-block pb-1"><?php echo $opt_themes['title_home']; ?></h2>		
		</div>
		<?php } ?>
		
    <div class="row">
			<?php 
			$postcounter = 1; 
			if (have_posts()) {
			while (have_posts()) : 
			$postcounter = $postcounter + 1; 
			the_post(); 
			$do_not_duplicate	= $post->ID; 
			$the_post_ids		= get_the_ID();
			if($opt_themes['mdr_style_3']) {
				get_template_part('template/loop.item.new');
			} else {
				get_template_part('template/loop.item'); 
			}
			endwhile;
			} else {
			?>    
			<p style="text-align:center;padding:10px;">Ready to publish your first post? <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">Get started here</a></p>
			<?php } ?>
	</div>
</section>