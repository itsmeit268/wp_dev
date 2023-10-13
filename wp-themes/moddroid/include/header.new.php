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
global $opt_themes;
?>
 
<header class='header' id='header'>
  
  <div class='headCn'>
    <div class='headIn secIn'>
      <div class='headD headL'>
        <div class='headIc'>
          <label aria-label='<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>' class='tNav tIc bIc pt-1' for='offNav' style="margin-bottom: unset;">
            <svg class='line' viewBox='0 0 24 24'><line x1='3' x2='21' y1='12' y2='12'></line><line x1='3' x2='21' y1='5' y2='5'></line><line x1='3' x2='21' y1='19' y2='19'></line></svg>
          </label>
        </div>
         
        <div class='headN section' id='header-title'>
          <div class='widget Header'>
            <div class="headInnr">
				<?php ex_themes_logo_banner_baru(); ?>
			</div>
          </div>
        </div>
      </div>
      
      <div class='headD headM'>
        <div class='mnBr'>
          <div class='mnBrs'>
            <div class='mnH'>
              <label aria-label='<?php echo $opt_themes['text_closed']; ?>' class='c' data-text='<?php echo $opt_themes['text_closed']; ?>' for='offNav'></label>
            </div>
             
            <div class='mnMob section' id='header-Menu-mobile'>
              <div class='widget PageList'>
                <ul class='mMenu'>
                  <?php echo $opt_themes['menus_footer_baru']; ?>
                </ul>
              </div>
              <div class='widget LinkList'>
                <ul class='mSoc'>
                  <?php echo $opt_themes['menus_sosmed_baru']; ?>
                </ul>
              </div>
            </div>
            <div class='mnMen section' id='header-Menu'>
              <div class='widget PageList' id='PageList000'>
                <ul class='mnMn' itemscope='itemscope' itemtype='https://schema.org/SiteNavigationElement'>
                    <?php ex_themes_menu_(); ?>				 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <label class='fCls' for='offNav'></label>
      </div>
      <div class='headD headR'>
        <div class='headI'>
          <div class='headP section' id='header-icon'>
            <div class='widget TextList'  id='TextList000'>
              <ul class='headIc pt-2'> 
                <li class='isSrh'>
                  <label aria-label='<?php echo $opt_themes['exthemes_Search']; ?>' class='tSrch tIc bIc' for='offSrh'>
                    <svg class='line' viewBox='0 0 24 24'><g transform='translate(2.000000, 2.000000)'><circle cx='9.76659044' cy='9.76659044' r='8.9885584'></circle><line x1='16.0183067' x2='19.5423342' y1='16.4851259' y2='20.0000001'></line></g></svg>
                  </label>
                </li>
                <?php if($opt_themes['login_activated']){ ex_themes_admin_login_(); } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
 
<input class='srhI fixi hidden' id='offSrh' type='checkbox' />
<div class='srhB fixL'>
  <div class='srhBi fixLi'>
    <div class='srhBs fixLs section' id='search-widget'>
      <div class='widget BlogSearch' id='BlogSearch1'>
        <form method="GET" action='<?php echo esc_url( home_url( '/' ) ); ?>' class='srhF' target='_top'>
          <label aria-label='<?php echo $opt_themes['exthemes_Search']; ?>' class='sb' for='searchIn'>
            <svg class='line' viewBox='0 0 24 24'><g transform='translate(2.000000, 2.000000)'><circle cx='9.76659044' cy='9.76659044' r='8.9885584'></circle><line x1='16.0183067' x2='19.5423342' y1='16.4851259' y2='20.0000001'></line></g></svg>
          </label>
          <input aria-label='<?php echo $opt_themes['exthemes_Search']; ?>' autocomplete='off' id='searchIn' minlength='3' name='s' placeholder='<?php echo $opt_themes['exthemes_Search']; ?>' required='required' type='search' value='' />
          <button aria-label='<?php echo $opt_themes['text_clear']; ?>' class='sb' data-text='<?php echo $opt_themes['text_clear']; ?>' type='reset'></button>
        </form>
        <label aria-label='<?php echo $opt_themes['text_closed']; ?>' class='srhC c pt-2' for='offSrh'></label>
      </div>
      <?php if($opt_themes['cats_search']){ ?>
      <div class='widget Label' >
        <h2 class='title'><?php echo $opt_themes['text_search_suggest']; ?></h2>
        <div class='wL pSml cl'>		
		<?php
		$categories = get_categories();
		$i = 0;
		foreach ($categories as $category) {
		?>
		<div class='lbSz s-4'>
			<a aria-label='<?php echo $category->name; ?>' class='lbN' href='<?php echo get_category_link($category->term_id); ?>'>
			<span class='lbT'><?php echo $category->name; ?></span>
			<span class='lbC' data-text='(<?php echo $category->category_count; ?>)'></span>
			</a>
		</div>
		<?php if (++$i == $opt_themes['limit_cats_search']) break; } ?> 
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <label class='fCls' for='offSrh'></label>
</div> 
<script>var $exhemes_dev_blog = jQuery.noConflict();</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">$(document).ready((function(){var o=document.URL.split("/").filter(Boolean).pop();console.log(o),$(".mnMn li a").each((function(){$(this).attr("href").split("/").filter(Boolean).pop()==o&&$(this).closest("li").addClass("actived")}))}));</script>