<?php
/*-----------------------------------------------------------------------------------*/
/*  @EXTHEMES DEVS
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
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
if ( ! defined( 'ABSPATH' ) ) exit;
function ex_themes_head_section() {
if ( is_user_logged_in() ) { 
} else {
global $opt_themes; 
$head_sect_on		= $opt_themes['aktif_header_section'];
$head_sec_code		= $opt_themes['header_section'];
$style_2_on			= $opt_themes['ex_themes_home_style_2_activate_'];
if($head_sect_on) { echo $head_sec_code; }
} ?>
<!-- Theme Styles for <?php echo THEMES_NAMES; ?> v<?php echo VERSION; ?> by <?php echo EXTHEMES_AUTHOR; ?> -->
<?php /* get_template_part( '/assets/css/root' ); */ ?> 
<script>
    var $exhemes_devs = jQuery.noConflict();   
</script> 
 
<?php
global $opt_themes;
$style_2_on				= $opt_themes['ex_themes_home_style_2_activate_'];
$rtl_on					= $opt_themes['ex_themes_activate_rtl_'];
$fonts_rtl				= $opt_themes['font_body_custom_fonts_rtl']; 
if($style_2_on) {
/* get_template_part( '/assets/css/styles.2' );
get_template_part( '/assets/css/custom.style.2' );  */
} else { 
/* get_template_part( '/assets/css/styles' );
get_template_part( '/assets/css/custom' ); */
} 
if($rtl_on) {
/* get_template_part( '/assets/css/rtl.style' ); */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="<?php echo $fonts_rtl;?>" rel="stylesheet"> 
<style>body {font-family: var(--font_body_rtl)!important; text-align: right !important;}</style> 
<?php }
/* 
get_template_part( '/assets/css/slider' );
get_template_part( '/assets/css/swiper' );
*/
?>

<?php if ( !is_user_logged_in() ) {
   echo '<style>#wpadminbars {display: none!important;}</style>';
}
?>

<!-- Theme Styles for <?php echo THEMES_NAMES; ?> v<?php echo VERSION; ?> by <?php echo EXTHEMES_AUTHOR; ?> -->

<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--moddroid--> 
<style>.form-control::-webkit-input-placeholder {color: #898989!important;}.form-control::-moz-placeholder {color: #898989!important;}.form-control:-ms-input-placeholder {color: #898989!important;}.form-control:-moz-placeholder {color: #898989!important;}.required {color: #F15A29!important;}.form-control, .custom-select, .btn {border-radius: 0.375rem;-webkit-transition: all 0.3s ease 0s;-moz-transition: all 0.3s ease 0s;transition: all 0.3s ease 0s;}.form-control, .custom-select {background-color: #F0F2F5!important;border-color: #F0F2F5!important;}.form-control:focus, .custom-select:focus, .form-control:focus + .input-group-append .btn {background-color: #FFF!important;border-color: #dee2e6!important;box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.15)!important;}.btn {font-weight: 600!important;}.btn-primary, .btn-primary:not(:disabled):not(.disabled):active:focus {color: #fff!important;background-color: var(--color_button)!important;border-color: var(--color_button)!important;}.btn-primary:hover, .btn-primary:focus, .btn-primary:not(:disabled):not(.disabled):active {color: #FFF!important;background-color: #028802!important;border-color: #028802!important;}  .btn-outline-primary, .btn-outline-primary:not(:disabled):not(.disabled):active:focus {color: var(--color_button)!important;background-color: transparent;border-color: var(--color_button)!important;}.btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:not(:disabled):not(.disabled):active {color: #fff!important;background-color: var(--color_button)!important;border-color: var(--color_button)!important;}.btn-light, .btn-light:not(:disabled):not(.disabled):active:focus {color: #212529!important;background-color: #F0F2F5!important;border-color: #F0F2F5!important;}.btn-light:not(:disabled):not(.disabled).active {color: #fff!important;background-color: var(--color_button)!important;border-color: var(--color_button)!important;}.svg-6 {fill: unset!important;} footer .mr-1, .mx-1 {  fill: unset;}
input.btn.btn-primary, input.btn.btn-primary:not(:disabled):not(.disabled):active:focus {  color: #fff !important;  background-color: var(--color_button)!important;  border-color: var(--color_button)!important;}
</style>

<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
<!--modyolo & reborn-->
 
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--modyolo--> 
 
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--reborn-->
 
<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--moddroid-->
 
<?php } ?>
<?php }
add_shortcode('ex_themes_head_section', 'ex_themes_head_section');
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_logo_banner_() { 
global $opt_themes;
$site_description			= get_bloginfo( 'description' );
$site_name					= get_bloginfo( 'name' );
$head_logo_on				= $opt_themes['ex_themes_header_logo_text_activate_'];
$rtl_on						= $opt_themes['ex_themes_activate_rtl_'];
$logo_texts					= $opt_themes['ex_themes_header_logo_texts_'];
if($head_logo_on) {
if (is_home() || is_front_page()) { ?>
<h1 style="text-transform:uppercase" class="h3 font-weight-semibold mb-0 <?php if($rtl_on){ ?>mr-2-rtl<?php } else { ?>mr-2 ml-2<?php } ?> mr-lg-0 site-logo"><a class="text-body" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $logo_texts; ?></a></h1>
<?php } elseif (is_single() || is_page() || is_search() || is_archive() || is_404() || is_tag()) { ?>
<h2 style="text-transform:uppercase" class="h3 font-weight-semibold mb-0 <?php if($rtl_on){ ?>mr-2-rtl<?php } else { ?>mr-2 ml-2<?php } ?> mr-lg-0 site-logo"><a class="text-body" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $logo_texts; ?></a></h2>
<?php } 
} else { 
global $opt_themes;
$head_logo_banner_on		= $opt_themes['ex_themes_header_logo_banner_activate_'];
$head_link_banner			= $opt_themes['ex_themes_header_logo_banner_']['url'];
if ($head_logo_banner_on) { ?>
<a class="text-body" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img alt="<?php echo get_bloginfo( 'description' ); ?>" src="<?php echo $head_link_banner; ?>"></a>
<?php } else {
if (is_home() || is_front_page()) { ?>
<h1 style="text-transform:uppercase" class="h3 font-weight-semibold mb-0 <?php if($rtl_on){ ?>mr-2-rtl<?php } else { ?>mr-2 ml-2<?php } ?> mr-lg-0 site-logo"><a class="text-body" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo THEMES_NAMES; echo VERSIONS_THEMES; ?></a></h1>
<?php } elseif (is_single() || is_page() || is_search() || is_archive() || is_404() || is_tag()) { ?>
<h3 style="text-transform:uppercase" class="h3 font-weight-semibold mb-0 <?php if($rtl_on){ ?>mr-2-rtl<?php } else { ?>mr-2 ml-2<?php } ?> mr-lg-0 site-logo"><a class="text-body" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo THEMES_NAMES; echo VERSIONS_THEMES; ?></a></h3>
<?php } 
} } 
}
add_shortcode('ex_themes_logo_banner_', 'ex_themes_logo_banner_');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_logo_banner_baru() { 
global $opt_themes;
$head_logo_on				= $opt_themes['ex_themes_header_logo_text_activate_'];
$rtl_on						= $opt_themes['ex_themes_activate_rtl_'];
$logo_texts					= $opt_themes['ex_themes_header_logo_texts_'];
if($head_logo_on) {
if (is_home() || is_front_page()) { ?>
<h1 class="headH hasSub">				
<span class="headTtl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $logo_texts; ?></a></span>
<!--<span class="headSub" data-text="v<?php echo VERSIONS_THEMES; ?>"></span>-->
</h1>
<?php } elseif (is_single() || is_page() || is_search() || is_archive() || is_404() || is_tag()) { ?>
<h2 class="headH hasSub">				
<span class="headTtl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $logo_texts; ?></a></span>
<!--<span class="headSub" data-text="v<?php echo VERSIONS_THEMES; ?>"></span>-->
</h2>
<?php } 
} else { 
global $opt_themes;
$head_logo_banner_on		= $opt_themes['ex_themes_header_logo_banner_activate_'];
$head_link_banner			= $opt_themes['ex_themes_header_logo_banner_']['url'];
if ($head_logo_banner_on) { ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php echo get_bloginfo( 'description' ); ?>"  src="<?php echo $head_link_banner; ?>" width="150" height="30"></a>
<?php } else {
if (is_home() || is_front_page()) { ?>
<h1 class="headH hasSub">				
<span class="headTtl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo THEMES_NAMES; ?></a></span>
<span class="headSub" data-text="v<?php echo VERSIONS_THEMES; ?>"></span>				
</h1>
<?php } elseif (is_single() || is_page() || is_search() || is_archive() || is_404() || is_tag()) { ?>
<h3 class="headH hasSub">				
<span class="headTtl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo THEMES_NAMES; ?></a></span>
<span class="headSub" data-text="v<?php echo VERSIONS_THEMES; ?>"></span>				
</h3>
<?php } 
} } 
}
add_shortcode('ex_themes_logo_banner_baru', 'ex_themes_logo_banner_baru');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_admin_login_() { 
if ( is_user_logged_in() ) {
global $post, $current_user, $opt_themes; 
$current_user			= wp_get_current_user();
$author_id				= $current_user->ID;
$author_email			= $current_user->user_email ;
$author_link			= get_author_posts_url( $author_id );
$author_avatar			= get_avatar_url( $author_id );

?>
 
<?php if(!$opt_themes['mdr_style_3']) { ?><div class="king-logged-user ml-lg-3"><?php } ?>
	<div class="king-username" <?php if(!$opt_themes['header_styles']) { ?>id="hilang"<?php } ?>>
		<img id="usermember" class="user-header-avatar" src="<?php echo esc_url( $author_avatar ); ?>" data-toggle="dropdown" data-target=".user-header-menu" aria-expanded="false"/> 
			<div class="user-header-menu"  >
				<div class="user-header-profile">
				<a href="<?php echo $author_link; ?>" ><?php echo esc_attr( $current_user->display_name ); ?></a>
				<?php if ( is_super_admin() || current_user_can( 'editor' ) ) : ?><div class="king-points" title="<?php _e( 'Total Post', THEMES_NAMES ); ?>"> <?php _e( 'Post', THEMES_NAMES ); ?> :<?php $total_items = count_user_posts($author_id); echo esc_html( $total_items ); ?> </div><?php endif; ?>
				</div>
				<?php if ( is_super_admin() || current_user_can( 'editor' ) ) : ?>
				<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="user-header-settings"><?php _e( 'Add new post', THEMES_NAMES ); ?></a>
				<a href="<?php echo esc_url( get_admin_url() ); ?>" class="user-header-admin"><?php _e( 'Admin Panel', THEMES_NAMES ); ?></a>
				<?php endif; ?>
				<a href="<?php echo $author_link; ?>" class="user-header-settings"><?php _e( 'Edit Profile', THEMES_NAMES ); ?></a>
				<a href="<?php echo esc_url( wp_logout_url( site_url() ) ); ?>" class="user-header-logout"><?php _e( 'Logout', THEMES_NAMES ); ?></a>
			</div>
	</div>
<?php if(!$opt_themes['mdr_style_3']) { ?></div><?php } ?>
<?php } else { ?>
<?php if(!$opt_themes['mdr_style_3']) {
if(!$opt_themes['header_styles']) { ?> 
<li> 
<div class="king-username">
	<span id="usermember" class="user-header-noavatar" data-toggle="dropdown" data-target=".user-header-menu" aria-expanded="false"></span> 
	<div class="user-header-menu"  >
	<a href="<?php echo esc_url( wp_login_url( site_url() ) ); ?>" class="user-header-login"><?php _e( 'Login', THEMES_NAMES ); ?></a>
	</div>
</div> 
</li> 
<?php }
} ?>
<?php 
}
}
add_shortcode('ex_themes_admin_login_', 'ex_themes_admin_login_');
add_filter( 'login_redirect', 'noindex_nofollow_page_login', 10, 3 );
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_menu_() {
global $opt_themes; 

if (!$opt_themes['header_styles'] && !$opt_themes['mdr_style_3']) {
$mainnav = array(
        'theme_location'  => 'menu_header',
        'container'       => false,		
        //'echo'            => false,
        //'before'          => '',
        //'after'           => '',
        //'link_before'     => '',
        //'link_after'      => '',
        'items_wrap'      => '%3$s',
        //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        //'item_spacing'    => 'preserve',
        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'walker'          => new WP_Bootstrap_Navwalker,
    );
echo strip_tags(wp_nav_menu( $mainnav ), '<li><a><i><span>' );
} elseif ($opt_themes['mdr_style_3'] && $opt_themes['header_styles'] ){ 
$mainnav = array(
        'theme_location'  => 'menu_header',
        'container'       => false,		
        //'echo'            => false,
        //'before'          => '',
        //'after'           => '',
        //'link_before'     => '',
        //'link_after'      => '',
        'items_wrap'      => '%3$s',
        //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        //'item_spacing'    => 'preserve',
        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'walker'          => new bootstrap_5_wp_nav_menu_walker,
    );
echo strip_tags(wp_nav_menu( $mainnav ), '<li><a><i><span>' );
 } else { 
$mainnav = array(
        'theme_location'  => 'menu_header',
        'container'       => false,		
        //'echo'            => false,
        //'before'          => '',
        //'after'           => '',
        //'link_before'     => '',
        //'link_after'      => '',
        'items_wrap'      => '%3$s',
        //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        //'item_spacing'    => 'preserve',
        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'walker'          => new WP_Bootstrap_Navwalker,
    );
echo strip_tags(wp_nav_menu( $mainnav ), '<li><a><i><span>' );
 } 
}
add_shortcode('ex_themes_menu_', 'ex_themes_menu_');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_social_footer_(){
global $opt_themes;
$facebook_link					= $opt_themes['facebook_urls'];
$twitter_link					= $opt_themes['twitter_urls'];
$youtube_link					= $opt_themes['youtube_urls'];
$instagram_link					= $opt_themes['instagram_urls'];
$telegram_link					= $opt_themes['telegram_url'];
?>
	<div class="d-flex align-items-center justify-content-center mb-2 socials">
		<span class="border-top d-block flex-grow-1 ml-1"></span>
		<?php if($facebook_link){ ?>
			<a href="<?php echo $facebook_link; ?>" target="_blank" rel="nofollow" aria-label="<?php echo $facebook_link; ?>"><svg role="img" width="22" height="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="var(--color_svg)" d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"></path></svg></a>
		<?php } if($twitter_link){ ?>
			<a href="<?php echo $twitter_link; ?>" target="_blank" rel="nofollow" aria-label="<?php echo $twitter_link; ?>"><svg role="img" width="22" height="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="var(--color_svg)" d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"></path></svg></a>
		<?php } if($youtube_link){ ?>
			<a href="<?php echo $youtube_link; ?>" target="_blank" rel="nofollow" aria-label="<?php echo $youtube_link; ?>"><svg role="img" width="22" height="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--color_svg)" d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"></path></svg></a>
		<?php } if($instagram_link){ ?>
			<a href="<?php echo $instagram_link; ?>" target="_blank" rel="nofollow" aria-label="<?php echo $instagram_link; ?>"><svg role="img" width="22" height="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="var(--color_svg)" d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"></path></svg></a>
		<?php } if($telegram_link){ ?>
			<a href="<?php echo $telegram_link; ?>" target="_blank" rel="nofollow" aria-label="<?php echo $telegram_link; ?>"><svg role="img" width="22" height="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--color_svg)" d="M23.91 3.79L20.3 20.84c-.25 1.21-.98 1.5-2 .94l-5.5-4.07-2.66 2.57c-.3.3-.55.56-1.1.56-.72 0-.6-.27-.84-.95L6.3 13.7l-5.45-1.7c-1.18-.35-1.19-1.16.26-1.75l21.26-8.2c.97-.43 1.9.24 1.53 1.73z"></path></svg></a>
		<?php } ?>
		<span class="border-top d-block flex-grow-1 mr-1"></span>
	</div>
<?php }
add_shortcode('ex_themes_social_footer_', 'ex_themes_social_footer_');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_footer_section_() { 
global $opt_themes;
$linkX					= get_bloginfo('url');;
$parse					= parse_url($linkX);
$sites					= $parse['host'];
$useful_sections		= $opt_themes['exthemes_Useful_Sections'];
$about_us				= $opt_themes['exthemes_About_Us'];
$footers_activate		= $opt_themes['ex_themes_footers_activate_'];
$footers_code			= $opt_themes['ex_themes_footers_code_'];
$footers_sect_activate	= $opt_themes['aktif_footer_section'];
$footer_section			= $opt_themes['footer_section'];
$nolink_activate		= $opt_themes['ex_themes_nolink_activate_'];
$locations				= get_nav_menu_locations(); 
$menu_lf				= wp_get_nav_menu_object($locations['footer-lf']); 
$menu_rf				= wp_get_nav_menu_object($locations['footer-rf']); 
$menu_mf				= wp_get_nav_menu_object($locations['footer-mf']); 
?>
<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<footer id="colophon" class="bg-white border-top pt-4 site-footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <section class="mb-4">
          <h4 class="h5 font-weight-semibold mb-3">
            <svg class="mr-1 svg-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M67.508 468.467c-58.005-58.013-58.016-151.92 0-209.943l225.011-225.04c44.643-44.645 117.279-44.645 161.92 0 44.743 44.749 44.753 117.186 0 161.944l-189.465 189.49c-31.41 31.413-82.518 31.412-113.926.001-31.479-31.482-31.49-82.453 0-113.944L311.51 110.491c4.687-4.687 12.286-4.687 16.972 0l16.967 16.971c4.685 4.686 4.685 12.283 0 16.969L184.983 304.917c-12.724 12.724-12.73 33.328 0 46.058 12.696 12.697 33.356 12.699 46.054-.001l189.465-189.489c25.987-25.989 25.994-68.06.001-94.056-25.931-25.934-68.119-25.932-94.049 0l-225.01 225.039c-39.249 39.252-39.258 102.795-.001 142.057 39.285 39.29 102.885 39.287 142.162-.028A739446.174 739446.174 0 0 1 439.497 238.49c4.686-4.687 12.282-4.684 16.969.004l16.967 16.971c4.685 4.686 4.689 12.279.004 16.965a755654.128 755654.128 0 0 0-195.881 195.996c-58.034 58.092-152.004 58.093-210.048.041z"></path>
            </svg>
            <span class="align-middle"> <?php echo $menu_lf->name; ?> </span>
          </h4>
          <ul id="menu-useful-sections" class="nav menu">
            <?php ex_themes_menu_footer_(); ?>
          </ul>
        </section>
      </div>
      <div class="col-12 col-md-6">
        <section class="mb-4">
          <h4 class="h5 font-weight-semibold mb-3">
            <svg class="mr-1 svg-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm0-338c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
            </svg>
            <span class="align-middle"> <?php echo $menu_rf->name; ?> </span>
          </h4>
          <ul id="menu-about-us" class="nav menu">
            <?php ex_themes_menu_footer_2(); ?>
          </ul>
        </section>
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-4 socials">
      <span class="border-top d-block flex-grow-1 mr-3"></span>
      <?php ex_themes_social_footer_(); ?>
      <span class="border-top d-block flex-grow-1 ml-3"></span>
    </div>
  </div>
  <div class="small text-center bg-dark d-flex pt-3">
    <div class="container">
       <?php ex_themes_copyright_(); ?> 
    </div>
  </div>
</footer>
<style>
p.copyright {
  color: var(--putih)!important;
}
footer {
  padding: 0!important;
} 

</style>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
<footer class="site-footer rounded shadow-none  border-top ">
  <div class="secIn">
    <div class="fotIn">
      <div class="section" id="footer-widget-1">
        <div class="widget HTML" >
          <?php if($opt_themes['ex_themes_footers_abouts']){ echo $opt_themes['ex_themes_footers_abouts']; } else { ?>
          <div class="widget-content abtU" data-text="<?php _e( 'Made with Love by', THEMES_NAMES ); ?>">
            <div class="abtT">
              <h2 class="tl"><?php echo DEVS; ?></h2>
              <!--[ Delete comment tag on section bellow and change data-src='#' attribute with your logo url ]-->
              <!-- <img class='lazy' alt='<?php echo DEVS; ?>' data-src='#' src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs='/> -->
            </div>
            <p class="abtD"><b><?php echo $sites; ?></b><?php _e( ' is a completed free website to share games and premium app mod at high quality', THEMES_NAMES ); ?></p>
          </div>
		<?php } ?>
        </div> 
      </div>
      <div class="section" id="footer-widget-2">
        <div class="widget LinkList" >
          <h3 class="title h5"> <?php echo $menu_lf->name; ?> </h3>
          <div class="widget-content">
            <ul>
              <?php ex_themes_menu_footer_(); ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="section" id="footer-widget-3">
        <div class="widget LinkList" >
          <h3 class="title h5"> <?php echo $menu_mf->name; ?> </h3>
          <div class="widget-content">
            <ul>
              <?php ex_themes_menu_footer_3(); ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="section" id="footer-widget-4">
        <div class="widget LinkList" >
          <h3 class="title h5"><?php echo $menu_rf->name; ?></h3>
          <div class="widget-content">
            <ul>
              <?php ex_themes_menu_footer_2(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container "> 
	<?php ex_themes_social_footer_(); ?>
	</div>
    <div class="cdtIn section" id="credit-widget">
      <div class="widget HTML" >
        <div class="fotCd">
		  <?php ex_themes_copyright_(); ?> 
        </div>
      </div>
      <div class="widget TextList" >
        <div class="toTop tTop" data-text="<?php echo $opt_themes['text_gotop']; ?>" onclick="window.scrollTo({top: 0});">
          <svg class="line" viewBox="0 0 24 24">
            <g transform="translate(12.000000, 12.000000) rotate(-180.000000) translate(-12.000000, -12.000000) translate(5.000000, 8.500000)">
              <path d="M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0"></path>
            </g>
          </svg>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<footer id="colophon" class="bg-white border-top pt-4 site-footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <section class="mb-4">
          <h4 class="h5 font-weight-semibold mb-3">
            <svg class="mr-1 svg-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M67.508 468.467c-58.005-58.013-58.016-151.92 0-209.943l225.011-225.04c44.643-44.645 117.279-44.645 161.92 0 44.743 44.749 44.753 117.186 0 161.944l-189.465 189.49c-31.41 31.413-82.518 31.412-113.926.001-31.479-31.482-31.49-82.453 0-113.944L311.51 110.491c4.687-4.687 12.286-4.687 16.972 0l16.967 16.971c4.685 4.686 4.685 12.283 0 16.969L184.983 304.917c-12.724 12.724-12.73 33.328 0 46.058 12.696 12.697 33.356 12.699 46.054-.001l189.465-189.489c25.987-25.989 25.994-68.06.001-94.056-25.931-25.934-68.119-25.932-94.049 0l-225.01 225.039c-39.249 39.252-39.258 102.795-.001 142.057 39.285 39.29 102.885 39.287 142.162-.028A739446.174 739446.174 0 0 1 439.497 238.49c4.686-4.687 12.282-4.684 16.969.004l16.967 16.971c4.685 4.686 4.689 12.279.004 16.965a755654.128 755654.128 0 0 0-195.881 195.996c-58.034 58.092-152.004 58.093-210.048.041z"></path>
            </svg>
            <span class="align-middle"> <?php echo $menu_lf->name; ?> </span>
          </h4>
          <ul id="menu-useful-sections" class="nav menu">
            <?php ex_themes_menu_footer_(); ?>
          </ul>
        </section>
      </div>
      <div class="col-12 col-md-6">
        <section class="mb-4">
          <h4 class="h5 font-weight-semibold mb-3">
            <svg class="mr-1 svg-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm0-338c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
            </svg>
            <span class="align-middle"> <?php echo $menu_rf->name; ?> </span>
          </h4>
          <ul id="menu-about-us" class="nav menu">
            <?php ex_themes_menu_footer_2(); ?>
          </ul>
        </section>
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-4 socials">
      <span class="border-top d-block flex-grow-1 mr-3"></span>
      <?php ex_themes_social_footer_(); ?>
      <span class="border-top d-block flex-grow-1 ml-3"></span>
    </div>
  </div>
  <div class="small text-center bg-dark d-flex pt-3">
    <div class="container">
       <?php ex_themes_copyright_(); ?> 
    </div>
  </div>
</footer>
<style>
p.copyright {
  color: var(--putih)!important;
}
footer {
  padding: 0!important;
} 

</style>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<footer class="site-footer rounded shadow-none  border-top ">
  <div class="secIn">
    <div class="fotIn">
      <div class="section" id="footer-widget-1">
        <div class="widget HTML" >
          <?php if($opt_themes['ex_themes_footers_abouts']){ echo $opt_themes['ex_themes_footers_abouts']; } else { ?>
          <div class="widget-content abtU" data-text="<?php _e( 'Made with Love by', THEMES_NAMES ); ?>">
            <div class="abtT">
              <h2 class="tl"><?php echo DEVS; ?></h2>
              <!--[ Delete comment tag on section bellow and change data-src='#' attribute with your logo url ]-->
              <!-- <img class='lazy' alt='<?php echo DEVS; ?>' data-src='#' src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs='/> -->
            </div>
            <p class="abtD"><b><?php echo $sites; ?></b><?php _e( ' is a completed free website to share games and premium app mod at high quality', THEMES_NAMES ); ?></p>
          </div>
		<?php } ?>
        </div> 
      </div>
      <div class="section" id="footer-widget-2">
        <div class="widget LinkList" >
          <h3 class="title h5"> <?php echo $menu_lf->name; ?> </h3>
          <div class="widget-content">
            <ul>
              <?php ex_themes_menu_footer_(); ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="section" id="footer-widget-3">
        <div class="widget LinkList" >
          <h3 class="title h5"> <?php echo $menu_mf->name; ?> </h3>
          <div class="widget-content">
            <ul>
              <?php ex_themes_menu_footer_2(); ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="section" id="footer-widget-4">
        <div class="widget LinkList" >
          <h3 class="title h5"><?php echo $menu_rf->name; ?></h3>
          <div class="widget-content">
            <ul>
              <?php ex_themes_menu_footer_3(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container "> 
	<?php ex_themes_social_footer_(); ?>
	</div>
    <div class="cdtIn section" id="credit-widget">
      <div class="widget HTML" >
        <div class="fotCd">
		  <?php ex_themes_copyright_(); ?> 
        </div>
      </div>
      <div class="widget TextList" >
        <div class="toTop tTop" data-text="<?php echo $opt_themes['text_gotop']; ?>" onclick="window.scrollTo({top: 0});">
          <svg class="line" viewBox="0 0 24 24">
            <g transform="translate(12.000000, 12.000000) rotate(-180.000000) translate(-12.000000, -12.000000) translate(5.000000, 8.500000)">
              <path d="M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0"></path>
            </g>
          </svg>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<footer id="colophon" class="bg-white border-top pt-4 site-footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <section class="mb-4">
          <h4 class="h5 font-weight-semibold mb-3">
            <svg class="mr-1 svg-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M67.508 468.467c-58.005-58.013-58.016-151.92 0-209.943l225.011-225.04c44.643-44.645 117.279-44.645 161.92 0 44.743 44.749 44.753 117.186 0 161.944l-189.465 189.49c-31.41 31.413-82.518 31.412-113.926.001-31.479-31.482-31.49-82.453 0-113.944L311.51 110.491c4.687-4.687 12.286-4.687 16.972 0l16.967 16.971c4.685 4.686 4.685 12.283 0 16.969L184.983 304.917c-12.724 12.724-12.73 33.328 0 46.058 12.696 12.697 33.356 12.699 46.054-.001l189.465-189.489c25.987-25.989 25.994-68.06.001-94.056-25.931-25.934-68.119-25.932-94.049 0l-225.01 225.039c-39.249 39.252-39.258 102.795-.001 142.057 39.285 39.29 102.885 39.287 142.162-.028A739446.174 739446.174 0 0 1 439.497 238.49c4.686-4.687 12.282-4.684 16.969.004l16.967 16.971c4.685 4.686 4.689 12.279.004 16.965a755654.128 755654.128 0 0 0-195.881 195.996c-58.034 58.092-152.004 58.093-210.048.041z"></path>
            </svg>
            <span class="align-middle"> <?php echo $menu_lf->name; ?> </span>
          </h4>
          <ul id="menu-useful-sections" class="nav menu">
            <?php ex_themes_menu_footer_(); ?>
          </ul>
        </section>
      </div>
      <div class="col-12 col-md-6">
        <section class="mb-4">
          <h4 class="h5 font-weight-semibold mb-3">
            <svg class="mr-1 svg-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm0-338c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
            </svg>
            <span class="align-middle"> <?php echo $menu_rf->name; ?> </span>
          </h4>
          <ul id="menu-about-us" class="nav menu">
            <?php ex_themes_menu_footer_3(); ?>
          </ul>
        </section>
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-4 socials">
      <span class="border-top d-block flex-grow-1 mr-3"></span>
      <?php ex_themes_social_footer_(); ?>
      <span class="border-top d-block flex-grow-1 ml-3"></span>
    </div>
  </div>
  <div class="small text-center bg-dark d-flex pt-3">
    <div class="container">
       <?php ex_themes_copyright_(); ?> 
    </div>
  </div>
</footer>
<style>
p.copyright {
  color: var(--putih)!important;
}
footer {
  padding: 0!important;
} 

</style>
<?php } ?>

<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--moddroid-->
<style>
header svg { 
  fill: unset !important;
}
a.page-link .svg-6 {
  fill: var(--color_nav) !important;
}
div.row div.hentry h3.h5, div.box-app dd.title {
  color: var(--color_texts) !important;
}
</style>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
<!--modyolo & style 3-->
<style>
.site-footer .socials a { 
  background-color: var(--color_rgb1) !important;; 
}
</style>
<?php if($opt_themes['ex_themes_activate_rtl_']){ ?>
<style>
.BlogSearch input { 
  right: 20px !important;
}
.BlogSearch .sb { 
  padding-bottom: 20px !important;
  padding-right: unset !important;
}
.fixi:checked ~ .fixL .fCls, #comment:target .fixL .fCls { 
  width: 150% !important;
  height: 150% !important;
  right: -100px !important;
  top: -100px !important;
}
.check {
  margin-left: 7px; 
}
.mnMn svg.d { 
  margin-right: 5px;
}
</style>
<?php } ?>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--modyolo-->
<style>
.widget .title::after, h2.h5::after, h3.h5.title::after {
  content: '';
  display: unset !important;
  vertical-align: unset !important;
  width: unset !important;
  margin: unset !important;
  border-bottom:  unset !important;
  opacity: unset !important;
}
h1, h2, h3 { 
  color: unset !important;
}
aside a {
  color: var(--color_text) !important;
} 
aside a:hover, .box-app dl.item dd.title:hover {
  color: var(--color_link) !important;
} 
.box-app dl.item dd.title, dd.info-app span {
  color: var(--color_text) !important;
}
header svg { 
  fill: unset !important;
}
</style>

<?php if($opt_themes['ex_themes_activate_rtl_']){ ?>
<style>
@media (max-width: 450px) {
  .nav-rtl {
    margin-right: auto !important;
  }
  .button-rtl {
    margin-left: 0% !important;
  }
  .search-rtl {
    margin-right: auto !important;
  }
  .offset-lg-2-rtl {
    margin-right: 3%;
  }
  .mr-2-rtl {
    margin-right: 1.5em !important;
  }
  .input-group-append-rtl {
    margin-right: -1px;
  }
  .input-group-append-rtl,
  .input-group-prepend {
    display: -ms-flexbox;
    display: flex;
  }
}
@media (max-width: 320px) {
  .nav-rtl {
    margin-right: auto !important;
  }
  .button-rtl {
    margin-left: 0% !important;
  }
  .search-rtl {
    margin-right: auto !important;
  }
  .offset-lg-2-rtl {
    margin-right: 3%;
  }
  .mr-2-rtl {
    margin-right: 1.5em !important;
  }
  .input-group-append-rtl {
    margin-right: -1px;
  }
  .input-group-append-rtl,
  .input-group-prepend {
    display: -ms-flexbox;
    display: flex;
  }
}
</style>
<?php } ?>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--style 3-->
<style>
.site-footer .socials a { 
  background-color: var(--color_rgb1) !important;; 
}
</style>
<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--moddroid-->
<style>
header svg { 
  fill: unset !important;
}
</style>
<?php } ?>

<?php 
if($footers_activate) { echo $footers_code; }
if($footers_sect_activate) { echo $footer_section; }
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
if($nolink_activate) { ?>
<script>
$(document).ready(function () {
	setTimeout(function () {
	$('a[href]#no-link').each(function () {
		var href = this.href;
		$(this).removeAttr('href').css('cursor', 'pointer').click(function () {
		if (href.toLowerCase().indexOf("#") >= 0) {
		} else {
		//window.open(href, '_top');
		window.location.href = href; 
		}
		});
	});
	}, 500);
});
</script>
<?php } ?>
<script>    
$('#usermember').on('click', function(e) {
	$('.user-header-menu').toggleClass("open"); 
	e.preventDefault();
});
</script>
<?php }
add_shortcode('ex_themes_footer_section_', 'ex_themes_footer_section_');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_menu_footer_() { 
$footer_lf = array(
        'theme_location'  => 'footer-lf',
        'container'       => false,
        'echo'            => false,
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '%3$s',
        //'items_wrap' => '<ul id="%1$s" class="%2$s">'.'%3$s'.'<li>'.'<a href="#">'.'sasda'.'</a>'.'</li>'.'</ul>',
        //'item_spacing'    => 'preserve',
        'depth'           => 0,
        //'walker'          => new ex_themes_menu_ ,
    );
echo strip_tags(wp_nav_menu( $footer_lf ), '<li><a>' );
}
add_shortcode('ex_themes_menu_footer_', 'ex_themes_menu_footer_');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_menu_footer_2() {
$footer_rf = array(
        'theme_location'  => 'footer-rf',
        'container'       => false,
        'echo'            => false,
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '%3$s',
        //'items_wrap' => '<ul id="%1$s" class="%2$s">'.'%3$s'.'<li>'.'<a href="#">'.'sasda'.'</a>'.'</li>'.'</ul>',
        //'item_spacing'    => 'preserve',
        'depth'           => 0,
        //'walker'          => new ex_themes_menu_ ,
    );
echo strip_tags(wp_nav_menu( $footer_rf ), '<li><a>' );
}
add_shortcode('ex_themes_menu_footer_2', 'ex_themes_menu_footer_2');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_menu_footer_3() {
$footer_mf = array(
        'theme_location'  => 'footer-mf',
        'container'       => false,
        'echo'            => false,
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '%3$s',
        //'items_wrap' => '<ul id="%1$s" class="%2$s">'.'%3$s'.'<li>'.'<a href="#">'.'sasda'.'</a>'.'</li>'.'</ul>',
        //'item_spacing'    => 'preserve',
        'depth'           => 0,
        //'walker'          => new ex_themes_menu_ ,
    );
echo strip_tags(wp_nav_menu( $footer_mf ), '<li><a>' );
}
add_shortcode('ex_themes_menu_footer_3', 'ex_themes_menu_footer_3');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_copyright_() { 
global $opt_themes;
$copyrights_on			= $opt_themes['ex_themes_footers_copyrights_active_'];
$copyrights_code		= $opt_themes['ex_themes_footers_copyrights_code_'];
$linkX					= get_bloginfo('url'); 
$parse					= parse_url($linkX); 
$domainsites			= $parse['host'];
?>
<p class="copyright">
<?php if($copyrights_on) { 
	echo $copyrights_code; 
} else { ?>
<a href='<?php echo get_option('home'); ?>'><?php echo $domainsites; ?> - <?php echo get_option('blogname'); ?></a> © <script type="text/javascript">var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> All rights reserved <br> Using <a title="<?php echo EXTHEMES_NAME; ?> v.<?php echo VERSIONS_THEMES; ?> - <?php echo EXTHEMES_AUTHOR; ?>" href="<?php echo EXTHEMES_ITEMS_URL; ?>" target="_blank"><strong><?php echo EXTHEMES_NAME; ?> v.<?php echo VERSIONS_THEMES; ?></strong></a> - <a href="https://ex-themes.com" title="<?php echo DEVS; ?> Blog"><strong style="text-transform: capitalize;"><?php echo DEVS; ?> Blog</strong></a> <br> Developer by <a href="<?php echo EXTHEMES_API_URL; ?>" title="premium wordpress themes - <?php echo EXTHEMES_AUTHOR; ?>"><strong style="text-transform: capitalize;"><?php echo EXTHEMES_AUTHOR; ?></strong></a>
<?php } ?>
</p>
<?php }
add_shortcode('ex_themes_blog_shares_2', 'ex_themes_blog_shares_2');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_blog_shares_2() { ?>
    <ul class="nav mb-4 list-shares">
        <li class="mr-2">
            <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" rel="nofollow" target="_blank">
                <svg class="svg-5" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                </svg>
            </a>
        </li>
        <li class="mr-2">
            <a class="twitter" href="https://twitter.com/home?status=<?php the_permalink() ?>" rel="nofollow" target="_blank">
                <svg class="svg-5" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                </svg>
            </a>
        </li>
        <li class="mr-2">
            <a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" rel="nofollow" target="_blank">
                <svg class="svg-5" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z" />
                </svg>
            </a>
        </li>
        <li class="mr-2">
            <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php echo get_the_title(); ?>&summary=&source=" rel="nofollow" target="_blank">
                <svg class="svg-5" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                </svg>
            </a>
        </li>
    </ul>
<?php }

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_related_posts_() { 
global $opt_themes, $wpdb, $post, $wp_query;
$related_on				= $opt_themes['aktif_related_post'];
$style_2_on				= $opt_themes['ex_themes_home_style_2_activate_'];
$title_rp_1				= $opt_themes['title_related_post_1']; 
$title_rp_2				= $opt_themes['title_related_post_2'];
$title_rp_3				= $opt_themes['title_related_post_3'];
$developers				= get_post_meta( $post->ID, 'wp_developers_GP', true );
if($related_on) {	 
$developer_terms		= get_the_terms( $post->ID , 'developer', 'string');
$term_ids				= wp_list_pluck($developer_terms,'term_id');
$developer_terms		= get_the_terms( $post->ID , 'developer', 'string');
//Pluck out the IDs to get an array of IDS
$term_ids				= wp_list_pluck($developer_terms,'term_id');
$paged_categorie_apps	= (get_query_var('paged')) ? get_query_var('paged') : 1;
	//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
	//Chose 'AND' if you want to query for posts with all terms
	$developer_query = new WP_Query( array(
		'post_type'						=> 'post',
		'tax_query'						=> array(
		array(
			'taxonomy'					=> 'developer',
			'field'						=> 'id',
			'terms'						=> $term_ids,
			/* 'operator'=> 'IN' //Or 'AND' or 'NOT IN' */
			)),
			'posts_per_page'			=> $opt_themes['limited_related_posts'],
			'paged'						=> $paged_categorie_apps,
			'ignore_sticky_posts'		=> 1,
			'orderby'					=> 'rand',
			'post__not_in'				=>array($post->ID)
		) );

	if($developer_query->have_posts()){ 
	?>	
	<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
	<!-- moddroid -->
	<section class="mb-4">
    <h2 class="h5 font-weight-semibold mb-3">
	<span class="text-body border-bottom-2 border-secondary d-inline-block pb-1"><?php if($related_on) { echo $title_rp_3; } else { ?> <?php } echo $developers; ?></span>
    </h2>
	<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
	<!-- modyolo dan style 3 -->
	<?php if($style_2_on) { ?>
	<section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm mb-3 pb-3 pt-3 px-2 px-md-3 mx-auto" style="max-width:<?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } ?>
	<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php if($style_2_on) {} else { ?><span class="border-bottom-2 border-secondary d-inline-block "><?php } if($related_on) { echo $title_rp_3; } else { ?> <?php } echo $developers; if($style_2_on) {} else { ?></span><?php } ?></h2>	
	<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
	<!-- modyolo --> 
	<section class="bg-white border rounded shadow-sm pt-3 px-2 px-md-3 mb-3 mx-auto" style="max-width: 900px;">
	<h2 class="h5 font-weight-semibold mb-3"><?php if($related_on) { echo $title_rp_3; } else { ?> <?php } echo $developers; ?></h2>
	<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
	<!-- style 3 -->
	<?php if($style_2_on) { ?>
	<section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm mb-3 pb-3 pt-3 px-2 px-md-3 mx-auto" style="max-width:<?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } ?>	
	<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php if($style_2_on) {} else { ?><span class=" d-inline-block "><?php } if($related_on) { echo $title_rp_3; } else { ?> <?php } echo $developers; if($style_2_on) {} else { ?></span><?php } ?></h2>	
	<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
	<!-- moddroid style -->
	<section class="mb-4">
    <h2 class="h5 font-weight-semibold mb-3">
	<span class="text-body border-bottom-2 border-secondary d-inline-block pb-1"><?php if($related_on) { echo $title_rp_3; } else { ?> <?php } echo $developers; ?></span>
    </h2>
	<?php } ?>	  
	<div class="row">
	<?php 
	if($developer_query->have_posts()){
	while($developer_query->have_posts() ) : $developer_query->the_post();
	if($opt_themes['mdr_style_3']) {
	get_template_part('template/loop.item.related');
	} else {
	get_template_part('template/loop.item'); 
	}
	endwhile; wp_reset_query(); } ?>
	</div> 
	</section>	
	<?php } 
	global $opt_themes, $wpdb, $post, $wp_query;
	$categories = get_the_category($post->ID);
	if ($categories) {
	$current_cat_id  		= get_query_var('cat'); 
	$category_ids = array();
	foreach($categories as $individual_category) 
	$category_ids[] = $individual_category->term_id;
		$recommended_args  = array(
		//'tag' => $tags->slug,
		'cat' 						=> get_query_var('cat'),
		'category__in'				=> $category_ids,
		'post__not_in'				=> array($post->ID),
		'posts_per_page'			=> $opt_themes['limited_related_posts'], 
		'caller_get_posts'			=> 1
		);
	$recommended_post = new WP_Query( $recommended_args ); 
	if( $recommended_post->have_posts() ) {
	?>	
	<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
	<!-- moddroid -->
	<section class="mb-4">
    <h2 class="h5 font-weight-semibold mb-3">
	<span class="text-body border-bottom-2 border-secondary d-inline-block pb-1"><?php if($related_on) { echo $title_rp_1; } else { ?> <?php } ?></span>
    </h2>
	<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
	<!-- modyolo dan style 3 -->
	<?php if($style_2_on) { ?>
	<section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm mb-3 pb-3 pt-3 px-2 px-md-3 mx-auto" style="max-width:<?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } ?>
	<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php if($style_2_on) {} else { ?><span class="border-bottom-2 border-secondary d-inline-block "><?php } if($related_on) { echo $title_rp_1; } else { ?> <?php } if($style_2_on) {} else { ?></span><?php } ?></h2>	
	<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
	<!-- modyolo --> 
	<section class="bg-white border rounded shadow-sm pt-3 px-2 px-md-3 mb-3 mx-auto" style="max-width: 900px;">
	<h2 class="h5 font-weight-semibold mb-3"><?php if($related_on) { echo $title_rp_1; } else { ?> <?php } ?></h2>
	<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
	<!-- style 3 -->
	<?php if($style_2_on) { ?>
	<section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm mb-3 pb-3 pt-3 px-2 px-md-3 mx-auto" style="max-width:<?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } ?>	
	<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php if($style_2_on) {} else { ?><span class=" d-inline-block "><?php } if($related_on) { echo $title_rp_1; } else { ?> <?php } if($style_2_on) {} else { ?></span><?php } ?></h2>	
	<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
	<!-- moddroid style -->
	<section class="mb-4">
    <h2 class="h5 font-weight-semibold mb-3">
	<span class="text-body border-bottom-2 border-secondary d-inline-block pb-1"><?php if($related_on) { echo $title_rp_1; } else { ?> <?php } ?></span>
    </h2>
	<?php } ?>	  
	<div class="row">
	<?php 
	if( $recommended_post->have_posts() ) {
	while ($recommended_post->have_posts()) : $recommended_post->the_post();
	
	if($opt_themes['mdr_style_3']) {
	get_template_part('template/loop.item.related');
	} else {
	get_template_part('template/loop.item'); 
	}
	endwhile; } wp_reset_query(); ?>
	</div>
	</section>
	<?php }}  
	global $opt_themes, $wpdb, $post, $wp_query;
	
	$categories2 = get_the_category($post->ID);
	if ($categories2) {
	$category_ids2 = array();
	$current_cat_id  		= get_query_var('cat'); 
	foreach($categories2 as $individual_category2) $category_ids2[] = $individual_category2->term_id;
	$you_may_also_like_args = array(
	//'tag' => $tags->slug,
	'cat'		 				=> get_query_var('cat'),
	'post_type'					=> 'post',
	'post_status'				=> 'publish',
	'orderby'					=> 'rand',
	'post__not_in'				=> array($post->ID),
	'posts_per_page'			=> $opt_themes['limited_related_posts'],  
	'caller_get_posts'			=> 1
	);
	
	$post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);
	$query_args = array( 
        'category__in'		=> $cat_ids,
        'post_type'			=> $current_post_type,
        'post__not_in'		=> array($post_id),
        'posts_per_page'	=> $opt_themes['limited_related_posts'], 
		'post_status'		=> 'publish',
		'orderby'			=> 'rand',
     );
	 
	$you_may_also_like_post = new WP_Query( $query_args );
	
	if( $you_may_also_like_post->have_posts() ) { 
	?>	
	<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
	<!-- moddroid -->
	<section class="mb-4">
    <h2 class="h5 font-weight-semibold mb-3">
	<span class="text-body border-bottom-2 border-secondary d-inline-block pb-1"><?php if($related_on) { echo $title_rp_2; } else { ?> <?php } ?></span>
    </h2>
	<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
	<!-- modyolo dan style 3 -->
	<?php if($style_2_on) { ?>
	<section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm mb-3 pb-3 pt-3 px-2 px-md-3 mx-auto" style="max-width:<?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } ?>
	<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php if($style_2_on) {} else { ?><span class="border-bottom-2 border-secondary d-inline-block "><?php } if($related_on) { echo $title_rp_2; } else { ?> <?php } if($style_2_on) {} else { ?></span><?php } ?></h2>	
	<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
	<!-- modyolo --> 
	<section class="bg-white border rounded shadow-sm pt-3 px-2 px-md-3 mb-3 mx-auto" style="max-width: 900px;">
	<h2 class="h5 font-weight-semibold mb-3"><?php if($related_on) { echo $title_rp_2; } else { ?> <?php } ?></h2>
	<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
	<!-- style 3 -->
	<?php if($style_2_on) { ?>
	<section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm mb-3 pb-3 pt-3 px-2 px-md-3 mx-auto" style="max-width:<?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } ?>	
	<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title"><?php if($style_2_on) {} else { ?><span class=" d-inline-block "><?php } if($related_on) { echo $title_rp_2; } else { ?> <?php } if($style_2_on) {} else { ?></span><?php } ?></h2>	
	<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
	<!-- moddroid style -->
	<section class="mb-4">
    <h2 class="h5 font-weight-semibold mb-3">
	<span class="text-body border-bottom-2 border-secondary d-inline-block pb-1"><?php if($related_on) { echo $title_rp_2; } else { ?> <?php } ?></span>
    </h2>
	<?php } ?>	  
	<div class="row">
	<?php 
	if( $you_may_also_like_post->have_posts() ) {
	while ($you_may_also_like_post->have_posts()) : $you_may_also_like_post->the_post();
	
	if($opt_themes['mdr_style_3']) {
	get_template_part('template/loop.item.related');
	} else {
	get_template_part('template/loop.item'); 
	}
	endwhile; } wp_reset_query(); ?>
	</div>
	</section> 
	<?php }}
	}
}
add_shortcode('ex_themes_related_posts_', 'ex_themes_related_posts_');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_versions() {
/* https://css-tricks.com/snippets/wordpress/custom-loop-based-on-custom-fields/ */
global $opt_themes, $wpdb, $post, $wp_query; 
$search						= get_post_meta( $post->ID, 'wp_title_GP', true );
$search						= preg_replace('/[^A-Za-z0-9\-]/', ' ', $search);
$wp_GP_ID						= get_post_meta( $post->ID, 'wp_GP_ID', true );
//$search						= str_replace(array(':','-'), '', $search);
$version_gp					= get_post_meta( $post->ID, 'wp_version', true );
$version_sc					= get_post_meta( get_the_ID(), 'wp_version_GP', true );				
if ( $version_gp === FALSE or $version_gp == '' ) $version_gp = $version_sc;
$appname_on					= $opt_themes['ex_themes_title_appname'];
$title						= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt					= get_the_title();   
if($opt_themes['latest_versions']){
 
$arg_version = array(
	'post_type'     => 'post',
	'numberposts'	=> -1,
	'meta_key'		=> 'wp_GP_ID', 
	'meta_value'	=> $wp_GP_ID,
	'orderby'		=> $version_gp,
	'order'			=> 'DESC',
    );

 
$post_version = new WP_Query($arg_version);
if($search){
?>
<section class="bg-white  rounded shadow-sm mb-3 pb-3 pt-3 mx-auto <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?> px-2 px-md-3<?php } ?>" style="max-width: 900px;">	
<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){?> text-body border-bottom-2 border-secondary d-inline-block pb-1 <?php } ?>"><?php echo $opt_themes['text_latest_versions']; ?></h2>	
 
<div class="version_history" style="max-height: 300px;overflow: auto;">
				<?php				
				while ( $post_version->have_posts() ) : 
				$post_version->the_post();
				$version_gp						= get_post_meta( $post->ID, 'wp_version', true );
				$version_sc						= get_post_meta( get_the_ID(), 'wp_version_GP', true );				
				if ( $version_gp === FALSE or $version_gp == '' ) $version_gp = $version_sc;
				$mods							= get_post_meta( get_the_ID(), 'wp_mods', true );
				$updates						= get_the_modified_time('F j, Y');
				$search							= get_post_meta( $post->ID, 'wp_title_GP', true );				
				global $wpdb, $post, $opt_themes;
				$image_id						= get_post_thumbnail_id($post->ID); 
				$full							= 'thumbnails-alt-120';
				$icons							= '60';
				$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
				$image_url_default				= $image_url[0];
				$thumbnail_images				= $image_url;
				$post_id						= get_the_ID();
				//wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnails' )
				$url							= wp_get_attachment_url( get_post_thumbnail_id($post->ID), $icons );
				$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];
				/* $thumb_id						= get_post_thumbnail_id( $post->ID );
				if ( '' != $thumb_id ) {
				$thumb_url						= wp_get_attachment_image_src( $thumb_id, $icons, true );
				$image							= $thumb_url[0];
					} else {
				$image							= $defaults_no_images;
					}
				$urlimages2						= $image; */

				$thumbnails_gp					= get_post_meta( $post->ID, 'wp_poster_GP', true );
				$thumbnails						= str_replace( 'http://', '', $thumbnails_gp );
				$thumbnails						= str_replace( 'https://', '', $thumbnails_gp );
				$randoms						= mt_rand(0, 3);
				$cdn_thumbnails					= '//i'.$randoms.'.wp.com/'.$thumbnails.'';
				$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true );
				$version						= get_post_meta( $post->ID, 'wp_version', true );
				$versionX1						= get_post_meta( $post->ID, 'wp_version_GP', true );
				$version						= str_replace('Varies with device', ' ', $version);
				$versionX1						= str_replace('Varies with device', ' n/a', $versionX1);
				$versionX						= '-';
				if ( $version === FALSE or $version == '' ) $version = $versionX1; 
				$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];
				$wp_mods						= get_post_meta( $post->ID, 'wp_mods', true ); 
				$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
				$title_alt						= get_the_title();
				 
				$sidebar_on						= $opt_themes['sidebar_activated_'];
				$style_2_on						= $opt_themes['ex_themes_home_style_2_activate_'];
				$background_on					= $opt_themes['ex_themes_backgrounds_activate_'];
				$thumbnails_gp_small_slider		= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
				$thumbnails						= str_replace( 'http://', '', $thumbnails_gp_small_slider );
				$thumbnails						= str_replace( 'https://', '', $thumbnails_gp_small_slider );
				$randoms						= mt_rand(0, 3);
				$cdn_thumbnails_gp_small_slider = '//i'.$randoms.'.wp.com/'.$thumbnails.'=s30';
				$rate_GP						= get_post_meta( $post->ID, 'wp_rated_GP', true );
				$ratings_GP						= get_post_meta( $post->ID, 'wp_ratings_GP', true );
				$rate_GP1						= get_post_meta( $post->ID, 'wp_rated_GP', true );
				if ( $rate_GP === FALSE or $rate_GP == '' ) $rate_GP = $rate_GP1;
				$thumbs_on						= $opt_themes['aktif_thumbnails']; 
				$cdn_on							= $opt_themes['ex_themes_cdn_photon_activate_']; 
				$rtl_on							= $opt_themes['ex_themes_activate_rtl_']; 
				$ratings_on						= $opt_themes['ex_themes_activate_ratings_']; 
				$text_mods						= $opt_themes['exthemes_MODAPK']; 
				$rated_gps						= get_post_meta( $post->ID, 'wp_rated_GP', true );
				$mod_gps						= get_post_meta( $post->ID, 'wp_mods', true );
				$mod_gps_alt					= 'APK';
				$svg_mods_on					= $opt_themes['svg_icon_modx'];  
				$appname_on						= $opt_themes['ex_themes_title_appname'];  
				$no_lazy						= $opt_themes['ex_themes_no_loading_lazy'];  
				$sizes							= get_post_meta( $post->ID, 'wp_sizes', true ); 
				$sizes_alt						= get_post_meta( $post->ID, 'wp_sizes_GP', true );
				if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizes_alt;
				?>				
				<div class="list">
					<div class="package_info open_info">
						<img src="<?php if($thumbs_on) { if($cdn_on) { echo $cdn_thumbnails_gp_small_slider; } else { if($thumbnails_gp_small_slider) { echo $thumbnails_gp_small_slider; } else { echo $image_url[0]; } } } else { if (has_post_thumbnail()) { echo $image_url[0]; } else { echo $defaults_no_images; } } ?>" class="icon " alt="<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" data-was-processed="true" width="50" height="50">
						<div class="title">
							<span class="name"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span>
							<span class="version"><?php echo $version_gp; ?></span>
							<span class="<?php if($mod_gps){ ?>mod<?php } else { ?>apk<?php } ?>"><?php if($mod_gps){ ?><?php echo $opt_themes['exthemes_MODAPK'] ?><?php } else { ?>apk<?php } ?></span>
						</div>
						<div class="text">
						<span><?php echo the_modified_time('F j, Y '); ?></span>
						<?php if($sizes){ ?><span><?php echo $sizes; ?></span><?php } ?>
						</div>
					</div>
					<div class="info-fix"> 
						<div class="info_box">
							<?php if($mod_gps){ ?>
							<p><strong><?php echo $opt_themes['exthemes_whats_mods'] ?></strong></p>
							<div class="whats_new">
							<?php echo $mod_gps; ?>
							</div>
							<?php } ?>							 
						</div>
					</div> 
					<div class="v_h_button button_down ">
					  <a class="down" href="<?php the_permalink() ?>">
						<span><?php echo $opt_themes['exthemes_Download']; ?></span>
					  </a>
					</div>
				</div>
				<?php endwhile; ?>  
</div>
</section> 
<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!-- moddroid -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
<!-- modyolo dan style 3 -->
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!-- modyolo --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!-- style 3 -->
<?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php } ?>				
<script>
$(function() {
  $(".open_info").on("click", function(e) {
    e.preventDefault();
    $('.info_box').removeClass('show');
    $(this).parent().addClass('show');
    var content = $(this).closest("div").next().find(".info_box");
    $(".info_box").not(content).slideUp();
    content.slideToggle();
  });
});
</script>

<?php }}
}
add_shortcode('ex_themes_versions', 'ex_themes_versions');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_poster_img_sliders_() {
global $wpdb, $post, $opt_themes; 
$gallery_bottom_on			= $opt_themes['aktif_ex_themes_gallery_images_gpstore_'];
$gallery_data				= get_post_meta( $post->ID, 'gallery_data', true );
if($gallery_bottom_on) {
?> 

<div class="swiper gallery_image_bottom">
<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){?> text-body border-bottom-2 border-secondary d-inline-block pb-1 <?php } ?>"><?php echo $opt_themes['title_gallery_bottom']; ?></h2>
	<div class="swiper-wrapper">
		<?php if ($gallery_data) {                     
                    if ( '' != get_post_meta( $post->ID, 'gallery_data', true ) ) { 
					$gallery			= get_post_meta( $post->ID, 'gallery_data', true ); 
					}
                    if ( isset( $gallery_data ) ) :
                        for( $i = 0; $i < count( $gallery['image_url'] ); $i++ ) {
						if ( '' != $gallery['image_url'][$i] ) { ?>
						<div class="swiper-slide"><a href="<?php echo $gallery['image_url'][$i] ; ?>" itemprop="screenshot" data-fancybox="img_bottom" rel="nofollow"><img src="<?php echo $gallery['image_url'][$i] ; ?>" alt="Gallery <?php echo $i; ?>" title="Gallery <?php echo $i; ?>"></a></div>
						<?php }
                        } endif; } else {    
						$image_link					= get_post_meta(get_the_ID(), 'wp_images_GP', true);		
						if ($image_link) {
						$pos_titles					= get_the_title();						
						$i = 0;
						$count = 10;
						foreach($image_link as $elemento) {
						$i++;
						if ( $i <= $count ) { 
						$thumbnails_gp				= $image_link[$i];
						$thumbnails					= str_replace( 'http://', '', $thumbnails_gp );
						$thumbnails					= str_replace( 'https://', '', $thumbnails_gp );
						$randoms					= mt_rand(0, 2);
						$cdn_thumbnails2			= '//i'.$randoms.'.wp.com/'.$thumbnails.'=w720';
						$cdn_thumbnails				= '//i'.$randoms.'.wp.com/'.$thumbnails.'';
						$cdn_photon_on				= $opt_themes['ex_themes_cdn_photon_activate_'];				
						?>
						<div class="swiper-slide"><a href="<?php if($cdn_photon_on) { echo $cdn_thumbnails; } else { echo $thumbnails_gp; } ?>" itemprop="screenshot" data-fancybox="img_bottom" rel="nofollow"><img src="<?php if($cdn_photon_on) { echo $cdn_thumbnails; } else { echo $thumbnails_gp.'-c'; } ?>" title="<?php echo $pos_titles; ?>  Gallery <?php echo $i; ?>" alt="<?php echo $pos_titles; ?> Gallery <?php echo $i; ?>"></a></div>
						<?php } } } else {} } ?>
	</div> 
</div>
 
<script>
      var swiper = new Swiper(".gallery_image_bottom", {
		slidesPerView: 5,
        spaceBetween: 5,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        }, 
      });
</script>
<?php } 
}
add_shortcode('ex_themes_poster_img_sliders_', 'ex_themes_poster_img_sliders_');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function gallery_image_top_() {
global $wpdb, $post, $opt_themes; 
$gallery_top_on				= $opt_themes['enable_gallery_top'];
$gallery_data				= get_post_meta( $post->ID, 'gallery_data', true );
if($gallery_top_on){
?>	
<div class="swiper gallery_image_top">
<h2 class="h5 font-weight-semibold m-0 p-0 mb-3 cate-title <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){?> text-body border-bottom-2 border-secondary d-inline-block pb-1 <?php } ?>"><?php echo $opt_themes['title_gallery_top']; ?></h2>
	<div class="swiper-wrapper">
		<?php if ($gallery_data) {                     
                    if ( '' != get_post_meta( $post->ID, 'gallery_data', true ) ) { 
					$gallery			= get_post_meta( $post->ID, 'gallery_data', true ); 
					}
                    if ( isset( $gallery_data ) ) :
                        for( $i = 0; $i < count( $gallery['image_url'] ); $i++ ) {
						if ( '' != $gallery['image_url'][$i] ) { ?>
						<div class="swiper-slide"><a href="<?php echo $gallery['image_url'][$i] ; ?>" itemprop="screenshot" data-fancybox="image_top" rel="nofollow"><img src="<?php echo $gallery['image_url'][$i] ; ?>" alt="Gallery <?php echo $i; ?>" title="Gallery <?php echo $i; ?>"></a></div>
						<?php }
                        } endif; } else {    
						$image_link					= get_post_meta(get_the_ID(), 'wp_images_GP', true);		
						if ($image_link) {
						$pos_titles					= get_the_title();						
						$i = 0;
						$count = 10;
						foreach($image_link as $elemento) {						
						if ( $i <= $count ) { 
						$thumbnails_gp				= $image_link[$i];
						$thumbnails					= str_replace( 'http://', '', $thumbnails_gp );
						$thumbnails					= str_replace( 'https://', '', $thumbnails_gp );
						$randoms					= mt_rand(0, 2);
						$cdn_thumbnails2			= '//i'.$randoms.'.wp.com/'.$thumbnails.'=w720';
						$cdn_thumbnails				= '//i'.$randoms.'.wp.com/'.$thumbnails.'';
						$cdn_photon_on				= $opt_themes['ex_themes_cdn_photon_activate_'];				
						?>
						<div class="swiper-slide"><a href="<?php if($cdn_photon_on) { echo $cdn_thumbnails; } else { echo $thumbnails_gp; } ?>" itemprop="screenshot" data-fancybox="img_top" rel="nofollow"><img src="<?php if($cdn_photon_on) { echo $cdn_thumbnails; } else { echo $thumbnails_gp; } ?>" title="<?php echo $pos_titles; ?> Gallery <?php echo $i; ?>" alt="<?php echo $pos_titles; ?> Gallery <?php echo $i; ?>"></a></div>
						<?php } $i++; } } else {} } ?>
	</div> 
</div>
 
<script>
      var swiper = new Swiper(".gallery_image_top", {
        slidesPerView: 5,
        spaceBetween: 5,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        }, 
      });
</script>
<?php }
}
add_shortcode('gallery_image_top_', 'gallery_image_top_');

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 