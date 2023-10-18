<?php 
function rgb($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, 1)" : $rgb);
}

function rgb1($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .1)" : $rgb);
}

function rgb2($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .2)" : $rgb);
}

function rgb3($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .3)" : $rgb);
}

function rgb4($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .4)" : $rgb);
}

function rgb5($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .5)" : $rgb);
}

function rgb6($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .6)" : $rgb);
}
 
function rgb7($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .7)" : $rgb);
}

function rgb8($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .8)" : $rgb);
}

function rgb0($hex, $asString = true) {
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, 0)" : $rgb);
}

 

global $opt_themes; 
$homes			= get_template_directory_uri();
$color_link			= $opt_themes['color_link_alt']['regular'];
$color_link_hover		= $opt_themes['color_link_alt']['hover'];
$color_link_dark		= $opt_themes['color_link_dark'];
$color_link_menu		= $opt_themes['color_link_menu'];
$color_link_menu_dark	= $opt_themes['color_link_menu_dark'];
$color_text			= $opt_themes['color_text'];
$color_text_dark		= $opt_themes['color_text_dark'];
$color_button		= $opt_themes['color_button_alt']['regular'];
$color_button_hover		= $opt_themes['color_button_alt']['hover'];
$color_border_button	= $opt_themes['color_border_button'];
$color_svg			= $opt_themes['color_svg_alt']['regular'];
$color_rgb_svg		= rgb3($opt_themes['color_svg_alt']['regular']);
$color_svg_hover		= $opt_themes['color_svg_alt']['hover'];
$color_sosmed_icon		= $opt_themes['color_sosmed_icon'];
$color_rgba			= $opt_themes['color_rgba_alt']['regular'];
$color_rgba_background	= $opt_themes['color_rgba_alt']['hover'];
$fonts			= $opt_themes['font_body'];
$font_body_rtl		= $opt_themes['font_body_rtl'];
$header_color		= $opt_themes['header_color'];
$header_color_dark		= $opt_themes['header_color_dark'];
$footer_color		= $opt_themes['footer_color'];
$footer_color_dark		= $opt_themes['footer_color_dark'];
$s_yellow			= $opt_themes['color_s_yellow'];
$s_yellow_bg_1		= $opt_themes['color_s_yellow_bg_alt']['to'];
$s_yellow_bg_2		= $opt_themes['color_s_yellow_bg_alt']['from'];
$s_green			= $opt_themes['color_s_green'];
$s_green_bg_1		= $opt_themes['color_s_green_bg_alt']['to']; 
$s_green_bg_2		= $opt_themes['color_s_green_bg_alt']['from'];
$s_purple			= $opt_themes['color_s_purple'];
$s_purple_bg_1		= $opt_themes['color_s_purple_bg_alt']['to']; 
$s_purple_bg_2		= $opt_themes['color_s_purple_bg_alt']['from'];
$s_red				= $opt_themes['color_s_red'];
$s_red_bg_1			= $opt_themes['color_s_red_bg_alt']['to']; 
$s_red_bg_2			= $opt_themes['color_s_red_bg_alt']['from'];
$s_blue				= $opt_themes['color_s_blue'];
$s_blue_bg_1		= $opt_themes['color_s_blue_bg'];
$s_blue_bg_2		= $opt_themes['color_s_blue_bg_2'];
$opacity			= $opt_themes['opacity'];
$bg_color			= $opt_themes['bg_color'];
$bg_color_dark		= $opt_themes['bg_color_dark'];
$dark_section_bg		= $opt_themes['dark_section_bg'];
$dark_section_bg_dark	= $opt_themes['dark_section_bg_dark'];
$entry_bg			= $opt_themes['entry_bg'];
$entry_bg_dark		= $opt_themes['entry_bg_dark'];
$homes_titles_colors	= '';
$homes_titles_colors_dark	= '';
$download_icon		= EX_THEMES_URI.'/assets/img/download.svg';
$color_nav			= $opt_themes['color_nav_alt']['regular'];
$color_nav_hover		= $opt_themes['color_nav_alt']['hover'];
$color_nav_rgb		= rgb3($opt_themes['color_nav_alt']['regular']);
$color_nav_link		= $opt_themes['color_nav_link_alt']['regular'];
$color_nav_link_hover	= $opt_themes['color_nav_link_alt']['hover'];
$color_nav_link_rgb		= $opt_themes['color_nav_link_alt']['hover'];
$color_likes		= $opt_themes['color_likes'];
$color_dislikes		= $opt_themes['color_dislikes'];
$col_bg_cat			= $opt_themes['color_bg_cats']['from'];
$col_bg_cat_h  		= $opt_themes['color_bg_cats']['to'];
$color_bg_cloud		= rgb3($opt_themes['color_bg_cloud']);
$color_bg_cloud_alt		= rgb($opt_themes['color_bg_cloud_alt_1']);
$color_bg_cloud_rgb		= $opt_themes['color_bg_cloud_alt_2'];
?>

<style id="root-styles-<?php echo strtolower(EX_THEMES_NAMES_); ?>-v.<?php echo EXTHEMES_VERSION; ?>">:root{
	--col_bg_cat:<?php echo $col_bg_cat; ?>;
	--col_bg_cat_h:<?php echo $col_bg_cat_h; ?>;
	--homes:<?php echo $homes; ?>;
	--fontasli: Manrope, Arial, -apple-system, BlinkMacSystemFont, "Segoe UI", "Open Sans", "Helvetica Neue", sans-serif;
	--font:<?php echo $fonts; ?>;
	--fonts: <?php echo $fonts; ?>;
	--font_body_rtl: <?php echo $font_body_rtl; ?>;
	--color_bg_cloud_rgb:<?php echo $color_bg_cloud_rgb; ?>;
	--color_bg_cloud_alt:<?php echo $color_bg_cloud_alt; ?>;
	--color_bg_cloud:<?php echo $color_bg_cloud; ?>;
	--color_bg_cloud_footer: <?php echo $opt_themes['color_bg_cloud']; ?>;
	--color_bg_cloud_screenshots: <?php echo rgb3($opt_themes['color_bg_cloud']); ?>;
	--color_bg_cloud_dw:<?php echo rgb3($opt_themes['color_bg_cloud']); ?>;
	--color_bg_cloud_dw_1:<?php echo rgb2($opt_themes['color_bg_cloud_alt_2']); ?>;
	--color_bg_cloud_dw_2:<?php echo rgb0($opt_themes['color_bg_cloud_alt_1']); ?>;
	--color_likes:<?php echo $color_likes; ?>;
	--color_dislikes:<?php echo $color_dislikes; ?>;
	--color_nav_rgb:<?php echo $color_nav_rgb; ?>;
	--color_nav_link:<?php echo $color_nav_link; ?>;
	--color_nav_link_hover:<?php echo $color_nav_link_hover; ?>;
	--color_nav:<?php echo $color_nav; ?>;
	--color_nav_hover:<?php echo $color_nav_hover; ?>;
	--tcolor:<?php echo $color_text; ?>;
	--bgcolor:<?php echo $bg_color; ?>;
	--color_link_menu:<?php echo $color_link_menu; ?>;
	--color_rgb_svg:<?php echo $color_rgb_svg; ?>;
	--colorsvg:<?php echo $color_svg; ?>;
	--color_svg:<?php echo $color_svg; ?>;
	--color_svg_hover:<?php echo $color_svg_hover; ?>;
	--color_news:<?php echo $opt_themes['color_news']; ?>;
	--color_updates:<?php echo $opt_themes['color_updates']; ?>;
	--color_mods:<?php echo $opt_themes['color_mods']; ?>;
	--color_sosmed_icon:<?php echo $color_sosmed_icon; ?>;
	--colorsvg_hover:<?php echo $color_svg_hover; ?>;
	--lcolor:<?php echo $color_link; ?>;
	--color_link:<?php echo $color_link; ?>;
	--lhcolor:<?php echo $color_link_hover; ?>;
	--color_link_hover:<?php echo $color_link_hover; ?>;
	--color_button:<?php echo $color_button; ?>;
	--color_border_button:<?php echo $color_border_button; ?>;
	--color_button_hover:<?php echo $color_button_hover; ?>;
	--rgbacolor:<?php echo $color_rgba; ?>;
	--rgbacolorbackground:<?php echo $color_rgba_background; ?>;
	--sel-lang-active:#fff;
	--header-bg:<?php echo $header_color; ?>;
	--menu-hover-games:#F8B035;
	--menu-hover-apps:#7126C1;
	--menu-hover-top:#F74A2F;
	--menu-hover-news:#368BE1;
	--hmenu-more-grad:linear-gradient(90deg,rgba(23,43,61,0) 0%,rgba(23,43,61,0.05) 100%);
	--footer-bg:<?php echo $footer_color; ?>;
	--main-heading:<?php echo $color_svg; ?>;
	--dark-section-bg:<?php echo $dark_section_bg; ?>;
	--dark-section-grad:linear-gradient(0deg,<?php echo $dark_section_bg; ?> 0%,<?php echo $dark_section_bg_dark; ?> 100%);
	--dark-circle-blur:radial-gradient(closest-side,rgba(23,43,61,0) 0,rgba(23,43,61,0.6) 50%,rgba(23,43,61,1) 94%);
	--form-control-bg:#fff;
	--form-control-brd:#E7E9EB;
	--form-control-brd-f:#D0D4D8;
	--placeholder:#8B959E;
	--cloud-c1:<?php echo $color_svg; ?>;
	--cloud-c2:#fbfcf3;
	--entry-bg:<?php echo $entry_bg; ?>;
	--entry-info:<?php echo $color_svg; ?>;
	--entry-info-sep:#E6EFF4;
	--entry-label:rgba(255,255,255,.5);
	--entry-pattern: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='<?php echo $color_svg; ?>' d='M2,8a2,2,0,1,0,2,2A2,2,0,0,0,2,8Zm8-8a2,2,0,1,0,2,2A2,2,0,0,0,10,0Z'/%3E%3C/svg%3E");
	--entry-pattern-d: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='<?php echo $color_svg; ?>' d='M2,8a2,2,0,1,0,2,2A2,2,0,0,0,2,8Zm8-8a2,2,0,1,0,2,2A2,2,0,0,0,10,0Z'/%3E%3C/svg%3E");
	--block-bg:#fff;
	--block-bg-transp:rgba(255,255,255,0);
	--block-dark-bg:#273D52;
	--modal-bg:#fff;
	--cat-menu:<?php echo $color_rgba_background; ?>;
	--cat-menu-h:#172B3D;
	--spoiler:#f7f7f7;
	--spoiler-h:#EDFAF0;
	--searchsug:#f7f7f7;
	--searchsug-item:#fff;
	--nocomms:#765846;
	--coms-meta:rgba(23,43,61,.5);
	--coms-meta-h:rgba(23,43,61,.8);
	--line:#EBECED;
	--scrollbar:#F7F7F7;
	--scrollbar-thumb:#D0D0D0;
	--scrollbar-track:#F7F7F7;
	--loading-bg:rgba(255,255,255,.9);
	--spec-fade:rgba(23,41,61,1);
	--spec-fade-transp:rgba(23,41,61,0);
	--select-arrow: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23172B3D' d='M8.12 9.29L12 13.17l3.88-3.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-4.59 4.59c-.39.39-1.02.39-1.41 0L6.7 10.7c-.39-.39-.39-1.02 0-1.41.39-.38 1.03-.39 1.42 0z'/%3E%3C/svg%3E");
	--pageform-img:url(<?php echo $homes; ?>/assets/img/page-illustation.png);
	--pageform-img2:url(<?php echo $homes; ?>/assets/img/page-illustation.png);
	--pageform-bg:#EFF7F1;
	--opacity:<?php echo $opacity; ?>;
	--s_yellow:<?php echo $s_yellow; ?>;
	--s_yellow_bg_1:<?php echo $s_yellow_bg_1; ?>;
	--s_yellow_bg_2:<?php echo $s_yellow_bg_2; ?>;
	--s_green:<?php echo $s_green; ?>;
	--s_green_bg_1:<?php echo $s_green_bg_1; ?>;
	--s_green_bg_2:<?php echo $s_green_bg_2; ?>;
	--s_purple:<?php echo $s_purple; ?>;
	--s_purple_bg_1:<?php echo $s_purple_bg_1; ?>;
	--s_purple_bg_2:<?php echo $s_purple_bg_2; ?>;
	--s_red:<?php echo $s_red; ?>;
	--s_red_bg_1:<?php echo $s_red_bg_1; ?>;
	--s_red_bg_2:<?php echo $s_red_bg_2; ?>;
	--s_blue:<?php echo $s_blue; ?>;
	--s_blue_bg_1:<?php echo $s_blue_bg_1; ?>;
	--s_blue_bg_2:<?php echo $s_blue_bg_2; ?>;
	--homes_titles_colors:<?php echo $homes_titles_colors; ?>;
	--download_icon: url(<?php echo $download_icon; ?>);
	--putih :#fff;
} 
html.darktheme{
	--tcolor:<?php echo $color_text_dark; ?>;
	--color_link_menu_dark:<?php echo $color_link_menu_dark; ?>;
	--bgcolor:<?php echo $bg_color_dark; ?>;
	--bgcolor_dark:<?php echo $bg_color_dark; ?>;
	--sel-lang-active:#172B3D;
	--header-bg:<?php echo $header_color_dark; ?>;
	--menu-hover-apps:#9A53E7;
	--hmenu-more-grad:linear-gradient(90deg,rgba(255,255,255,0) 0%,rgba(255,255,255,0.05) 100%);
	--footer-bg:<?php echo $footer_color_dark; ?>;
	--main-heading:<?php echo $color_svg; ?>;
	--dark-section-bg:<?php echo $dark_section_bg_dark; ?>;
	--dark-section-grad:linear-gradient(0deg,<?php echo $dark_section_bg; ?> 0%,<?php echo $dark_section_bg_dark; ?> 100%);
	--dark-circle-blur:radial-gradient(closest-side,rgba(15,31,46,0) 0,rgba(15,31,46,0.6) 50%,rgba(15,31,46,1) 94%);
	--form-control-bg:#273D52;
	--form-control-brd:#3D5164;
	--form-control-brd-f:#53677B;
	--placeholder:#687786;
	--cloud-c1:#0F1F2E;
	--cloud-c2:#142636;
	--color_bg_cloud_rgb:var(--cloud-c1);
	--color_bg_cloud_alt:var(--cloud-c2); 
	--entry-bg:<?php echo $entry_bg_dark; ?>;
	--entry-info:#939EA9;
	--entry-info-sep:#3D5164;
	--entry-label:rgba(39,61,82,.5);
	--entry-pattern:var(--entry-pattern-d);
	--block-bg:#273D52;
	--block-bg-transp:rgba(39,61,82,0);
	--block-dark-bg:#213548;
	--modal-bg:#2A4055;
	--cat-menu:rgba(76,203,112,.1);
	--cat-menu-h:rgba(76,203,112,.2);
	--spoiler:rgba(255,255,255,0.05);
	--spoiler-h:rgba(255,255,255,0.1);
	--searchsug:#2A4055;
	--searchsug-item:rgba(255,255,255,0.05);
	--nocomms:#fede4a;
	--coms-meta:rgba(255,255,255,.5);
	--coms-meta-h:rgba(255,255,255,.8);
	--line:rgba(255,255,255,0.05);
	--scrollbar:#2A4055;
	--scrollbar-thumb:#0F1F2E;
	--scrollbar-track:#2A4055;
	--loading-bg:rgba(0,0,0,.9);
	--spec-fade:rgba(15,31,46,1);
	--spec-fade-transp:rgba(15,31,46,0);
	--select-arrow:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23748390' d='M8.12 9.29L12 13.17l3.88-3.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-4.59 4.59c-.39.39-1.02.39-1.41 0L6.7 10.7c-.39-.39-.39-1.02 0-1.41.39-.38 1.03-.39 1.42 0z'/%3E%3C/svg%3E");
	--pageform-img:url(<?php echo $homes; ?>/assets/img/page-illustation-night.png);
	--pageform-img2:url(<?php echo $homes; ?>/assets/img/page-illustation-night.png);
	--pageform-bg:#0d1d2b;
	--fonts: <?php echo $fonts; ?>;
	--font_body_rtl: <?php echo $font_body_rtl; ?>;
	--homes_titles_colors_dark:<?php echo $homes_titles_colors_dark; ?>;
	--download_icon: url(<?php echo $download_icon; ?>);
	--putih :#fff;
}
</style>
	
