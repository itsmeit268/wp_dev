<?php if(is_single()) { ?>
	<?php global $opt_themes; if($opt_themes['ex_themes_banner_sidebar_ads_activate_']){ ?><?php echo $opt_themes['ex_themes_banner_sidebar_ads_code_']; ?><?php } ?>
	<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : endif;  ?>
	<?php } else { ?>
	<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-home-1') ) : endif;  ?>
	<?php global $opt_themes; if($opt_themes['ex_themes_banner_sidebar_ads_activate_']){ ?><?php echo $opt_themes['ex_themes_banner_sidebar_ads_code_']; ?><?php } ?>	 
	<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-home-2') ) : endif; ?>
<?php } ?>	

