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
?>
<section class="bg-white pt-3 px-2 px-md-3 mt-3 m-2">

	<div class="d-flex align-items-baseline justify-content-between">
		<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title">Popular Apk</h2>
		<a href="https://demo-moddroid.test/">See All</a>
	</div>
		
	<div class="update-today__content">
		<div class="swiper-container update-today__slider swiper-container-initialized swiper-container-vertical swiper-container-rtl">
			<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); transition: all 0ms ease 0s;">
				<!-- list post -->
				<?php 
				query_posts( array( 
					'posts_per_page'	=> 10,
					'meta_key'			=> 'post_views_count',
					'orderby'			=> 'date',
					'order'				=> 'DESC' 
					)
				);
				if (have_posts()) : while (have_posts()) : the_post();
				get_template_part('template/loop.item.rate');
				endwhile;
				wp_reset_postdata();
				endif; 
				?>
				
				<!-- end list post -->
				
			</div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
		</div>

		<div class="update-today__navigation">
		<div class="update-today__next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="fa-solid fa-arrow-left"></i></div>
		<div class="update-today__prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-disabled="true"><i class="fa-solid fa-arrow-left"></i></div>
		</div>
	</div>
</section> 