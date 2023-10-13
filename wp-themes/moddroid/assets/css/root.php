<?php 
global $opt_themes;
$color						= $opt_themes['color_texts'];
$color_texts				= $color;
$color_heading				= $color;
$color_link					= $opt_themes['color_link'];
$color_background			= $opt_themes['color_background'];
$color_background_ft		= $opt_themes['color_background_ft'];
$color_background_hd		= $opt_themes['color_background_hd'];
$color_rgb_background		= rgb($opt_themes['color_background']);
$color_background_body		= $opt_themes['color_background_body'];
$color_button				= $opt_themes['color_button'];
$color_svg					= $opt_themes['color_svg'];
$color_border				= $opt_themes['color_border'];
$color_border1				= rgb($opt_themes['color_border']);
$color_border2				= rgb2($opt_themes['color_border']);
$color_border3				= rgb_2($opt_themes['color_border']);
$color_rgb_texts			= rgb_1($color_texts);
$fonts					    = $opt_themes['font_body']; 
$color_rate					= $opt_themes['color_rate'];
$font_body_rtl				= '';
$font_body_rtl_alt			= $opt_themes['font_body_rtl'];
if ( $font_body_rtl === FALSE or $font_body_rtl == '' ) $font_body_rtl = $font_body_rtl_alt;
$font_body_custom_fonts_rtl = $opt_themes['font_body_custom_fonts_rtl'];
$color_nav					= $opt_themes['color_nav'];
$color_rgb_nav				= rgb_2($opt_themes['color_nav']);
$putih						= '#ffffff';
$color_logo_header			= $opt_themes['color_logo_header'];
$color_header_link			= $opt_themes['color_header_link'];
$color_rgb					= $opt_themes['color_rgb'];
$color_rgb2					= rgb3($opt_themes['color_rgb']);
$color_rgb3					= rgb2($opt_themes['color_rgb']);
$color_rgb1					= rgb($opt_themes['color_rgb']);
$app_alternatives_icon		= EX_THEMES_URI.'/assets/img/app-alternatives.svg';
$star_icon					= EX_THEMES_URI.'/assets/img/stars-solid.svg';
$review_icon				= EX_THEMES_URI.'/assets/img/review.svg';
$download_icon				= EX_THEMES_URI.'/assets/img/download.svg';
$color_link_footers			= $opt_themes['color_link_footers'];
?><style id="root-style-<?php echo strtolower(THEMES_NAMES); ?>-v<?php echo VERSION; ?>"><!-- :root{--putih: <?php echo $putih;?>;--color_rgb_texts: <?php echo $color_rgb_texts;?>;--color_heading: <?php echo $color_heading;?>;--color_link_footers: <?php echo $color_link_footers;?>;--color_rgb2: <?php echo $color_rgb2;?>;--color_rgb3: <?php echo $color_rgb3;?>;--color_rgb1: <?php echo $color_rgb1;?>;--color_rgb: <?php echo $color_rgb;?>;--color_header_link: <?php echo $color_header_link;?>;--color_logo_header: <?php echo $color_logo_header;?>;--color_border1: <?php echo $color_border1;?>;--color_border2: <?php echo $color_border2;?>;--color_border3: <?php echo $color_border3;?>;--color_rate: <?php echo $color_rate;?>;--color_texts: <?php echo $color_texts;?>;--color_text: <?php echo $color;?>;--color_button: <?php echo $color_button;?>;--color_link: <?php echo $color_link;?>;--color_border: <?php echo $color_border;?>;--color_svg: <?php echo $color_svg;?>;--color_background: <?php echo $color_background;?>;--color_background_body: <?php echo $color_background_body;?>;--color_background_hd: <?php echo $color_background_hd;?>;--color_background_ft: <?php echo $color_background_ft;?>;--color_rgb_background: <?php echo $color_rgb_background;?>;--fonts: <?php echo $fonts;?>;--font_body_rtl: <?php echo $font_body_rtl;?>;--font_body_custom_fonts_rtl: <?php echo $font_body_custom_fonts_rtl;?>;--color_nav: <?php echo $color_nav;?>;--color_rgb_nav: <?php echo $color_rgb_nav;?>;--editor-img-width: 350px;--editor-img-height: 194px;--accent: #007aff;	--cate-title-color: #1d1d1f;--heading-color: #1d1d1f;--meta-bg: #efeff4;--app_alternatives_icon: url(<?php echo $app_alternatives_icon; ?>);--star_icon: url(<?php echo $star_icon; ?>);--review_icon: url(<?php echo $review_icon; ?>);--download_icon: url(<?php echo $download_icon; ?>);--color_border_background_ft: <?php echo rgb($opt_themes['color_background_ft']); ?>;}--></style>

<?php
$font_body_url		= $opt_themes['font_body_url'];
echo $font_body_url.PHP_EOL; 
?>
