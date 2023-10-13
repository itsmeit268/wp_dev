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
require EX_THEMES_DIR.'/libs/inc.header.php';
global $opt_themes;
?>

<header id="masthead" class="bg-white shadow-sm fixed-top site-header">
	<div class="container d-flex align-items-center">
		<button class="bg-transparent border-0 d-lg-none px-0 <?php if($rtl_on){ ?>button-rtl<?php } else{ ?>mr-auto<?php } ?> site-nav-toggler" style="padding-top: 0.625rem; padding-bottom: 0.625rem;" type="button"  aria-label="menus">
			<svg fill="var(--color_svg)" class="svg-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z" /></svg>
		</button>
		<?php ex_themes_logo_banner_(); ?>
			<nav class="<?php if($rtl_on){ ?>nav-rtl<?php } else{ ?>ml-auto<?php } ?> site-nav">
				<div class="d-flex d-lg-none justify-content-end">
					<button class="bg-transparent border-0 py-1 px-2 site-nav-closer" type="button" aria-label="menus">
						<svg class="<?php if($rtl_on){ ?>svg-5-rtl<?php } else{ ?>svg-5<?php } ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"/></svg>
					</button>
				</div>
				<ul id="menu-site-navigation" class="<?php if($rtl_on){ ?>menu <?php } else { ?>menu<?php } ?>"><?php ex_themes_menu_(); ?></ul>
			</nav>
			<?php if($opt_themes['login_activated']){ ex_themes_admin_login_(); } ?>
			<a class="collapsed text-body <?php if($rtl_on){ ?>search-rtl<?php } else{ ?>ml-auto<?php } ?> ml-lg-3 site-search-toggler" data-toggle="collapse" href="#site-search" aria-label="<?php if($search_text){ echo $search_text; } ?>">
				<svg class="svg-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"/></svg>
			</a>
		</div>
        <div id="site-search" class="collapse bg-white py-1 position-absolute" style="z-index: 10; top: 0; left: 0; right: 0;">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 <?php if($rtl_on){ ?>offset-lg-2-rtl<?php } else{ ?>offset-lg-2<?php } ?>">
                <div class="d-flex align-items-center">
                  <form class="flex-grow-1" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="input-group">
					
                      <input class="form-control" type="text" name="s" placeholder="<?php if($search_text){ echo $search_text; } ?>">
                      <div class="<?php if($rtl_on){ ?>input-group-append-rtl<?php } else{ ?>input-group-append<?php } ?>">
                        <button class="btn btn-light" type="submit">
                          <svg class="svg-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" /></svg>
                        </button>
                      </div>
                    </div>
                  </form>
                  <a class="<?php if($rtl_on){ ?>mr-2<?php } else{ ?>ml-2<?php } ?>" data-toggle="collapse" href="#site-search">
                    <svg class="<?php if($rtl_on){ ?>svg-5-rtl<?php } else{ ?>svg-5<?php } ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" /></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
</header>