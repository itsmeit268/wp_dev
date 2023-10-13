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
<nav class="navI scrlH m-1 ">
	<div class="secIn section" id="scroll-menu">
		<div class="widget LinkList" >
			<ul>
				<?php
				$categories = get_categories();
				$i = 0;
				foreach ($categories as $category) {
				$i++;
				echo '<li><a aria-label="'.$category->name.'" class="l" data-text="'.$category->name.'" href="'. get_category_link($category->term_id).'"></a></li>';
				}
				?>
			</ul>
		</div>
	</div>
</nav>
 