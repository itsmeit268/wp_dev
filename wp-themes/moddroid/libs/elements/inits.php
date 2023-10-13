<?php
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/  
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
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/   
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
if ( ! function_exists( 'moddroid_setup' ) ) :
    function moddroid_setup() {       
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        
        function register_my_menu() {
            register_nav_menu('menu_header',__( 'Header', THEMES_NAMES ));
            register_nav_menu('footer-lf',__( 'Footer Left', THEMES_NAMES ));
            register_nav_menu('footer-mf',__( 'Footer Midle', THEMES_NAMES ));
            register_nav_menu('footer-rf',__( 'Footer Right', THEMES_NAMES ));
        }
        add_action( 'init', 'register_my_menu' );
        //add_action('after_switch_theme', 'theme_activation_function', 10 ,  2);
         
		 
		load_theme_textdomain( 'moddroid', get_template_directory() . '/languages' );
        /*
        //Get all locations (including the one we just created above)
            $locations = get_theme_mod('nav_menu_locations');
            //set the menu to the new location and save into database
            $locations[$menus] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        */
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        // Add theme support for selective refresh for widgets.
         
        // Image Sizes
        /* 
        add_image_size( '60', 60, 60, true );
        add_image_size( '72', 72, 72, true );
        add_image_size( '90', 90, 90, true );
        add_image_size( '120', 120, 120, true );
        add_image_size( '150', 150, 150, true );
        */
        add_image_size( 'thumbnails', 60, 60, true );
        add_image_size( 'thumbnails-post', 72, 72, true );
        add_image_size( 'thumbnails-post-old', 200, 200, true );
        add_image_size( 'thumbnails-alt-90', 90, 90, true );
        add_image_size( 'thumbnails-alt-120', 120, 120, true );
        add_image_size( 'thumbnails-post-bg', 866, 320, true );
        add_image_size( 'thumbnails-post-bg-old', 820, 320, true );
        add_image_size( 'thumbnails-news-bg-new', 866, 300, true );
        add_image_size( 'thumbnails-news', 250, 141, true );
        add_image_size( 'thumbnails-news-arc', 253, 142, true );
        add_image_size( 'thumbnails-news-arc-new', 393, 221, true );
        add_image_size( 'thumbnails-news-bg', 820, 300, true );
        add_image_size( 'thumbnails-slider', 50, 50, true );
        add_image_size( 'thumbnails-slider-bg', 317, 200, true );
         
    }
endif;
add_action( 'after_setup_theme', 'moddroid_setup' );

/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
$header_menu_name				= 'Header';
$header_menu_location			= 'menu_header';
register_nav_menus( array( $header_menu_location => $header_menu_name, ) );
$header_menu_exists = wp_get_nav_menu_object( $header_menu_name );
if ( ! $header_menu_exists ) {
    $menu_id = wp_create_nav_menu( $header_menu_name );							
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'   =>  __( 'Home', THEMES_NAMES ),
        'menu-item-classes' => 'home',
        'menu-item-url'     => home_url( '/' ),
        'menu-item-status'  => 'publish',
    ) );
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Apps', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Games', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) ); 
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Blog', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
} 
 
if ( ! has_nav_menu( $header_menu_location ) ) {
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations[ $header_menu_location ] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
}

/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
/* $footer_menu_name				= 'Footer Left';
$footer_menu_location			= 'footer-lf';
register_nav_menus( array( $footer_menu_location => $footer_menu_name, ) );
$footer_menu_exists = wp_get_nav_menu_object( $footer_menu_name );
if ( ! $footer_menu_exists ) {
    $menu_id = wp_create_nav_menu( $footer_menu_name );							
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'   =>  __( 'About Us', THEMES_NAMES ), 
        'menu-item-url'     => '#',
        'menu-item-status'  => 'publish',
    ) ); 
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Contact us', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
} 
 
if ( ! has_nav_menu( $footer_menu_location ) ) {
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations[ $footer_menu_location ] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
}
 */
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
/* $footer_rf_menu_name				= 'Footer Right';
$footer_rf_menu_location			= 'footer-rf';
register_nav_menus( array( $footer_rf_menu_location => $footer_rf_menu_name, ) );
$footer_rf_menu_exists = wp_get_nav_menu_object( $footer_rf_menu_name );
if ( ! $footer_rf_menu_exists ) {
    $menu_id = wp_create_nav_menu( $footer_rf_menu_name );							
  
	wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Privacy Policy', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'DMCA', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Terms of Use', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Buy This Themes', THEMES_NAMES ),
        'menu-item-url'    => 'https://exthem.es',
        'menu-item-status' => 'publish',
    ) );
} 
 
if ( ! has_nav_menu( $footer_rf_menu_location ) ) {
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations[ $footer_rf_menu_location ] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
}
 */
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
/* $footer_mf_menu_name				= 'Footer Midle';
$footer_rf_menu_location			= 'footer-mf';
register_nav_menus( array( $footer_mf_menu_location => $footer_mf_menu_name, ) );
$footer_mf_menu_exists = wp_get_nav_menu_object( $footer_mf_menu_name );
if ( ! $footer_mf_menu_exists ) {
    $menu_id = wp_create_nav_menu( $footer_mf_menu_name );							
  
	wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Privacy Policy', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'DMCA', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Terms of Use', THEMES_NAMES ),
        'menu-item-url'    => '#',
        'menu-item-status' => 'publish',
    ) );
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Buy This Themes', THEMES_NAMES ),
        'menu-item-url'    => 'https://exthem.es',
        'menu-item-status' => 'publish',
    ) );
} 
 
if ( ! has_nav_menu( $footer_mf_menu_location ) ) {
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations[ $footer_mf_menu_location ] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
}
 */
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'                => 'editor-choices',
        'name'              => EX_THEMES_NAMES_.' Slider Home',
        'description'       => __( 'Widgets in this area will be shown on Slider Home', THEMES_NAMES ),
        'before_widget'     => '<section class="mb-2">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="h5 font-weight-semibold mb-3"><span class="border-bottom-2 border-secondary d-inline-block pb-1">',
        'after_title'       => '</span></h2><div style="clear:both"></div>',
));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'                => 'home-popular',
        'name'              => EX_THEMES_NAMES_.' Home Post',
		'description'       => __( 'Widgets in this area will be shown only Home Post', THEMES_NAMES ),
        'before_widget'     => '<section class="mb-2">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="h5 font-weight-semibold mb-3"><span class="border-bottom-2 border-secondary d-inline-block pb-1">',
        'after_title'       => '</span></h2><div style="clear:both"></div>',
));
/* if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'                => 'news-homes',
        'name'              => EX_THEMES_NAMES_.' News Home',
        'description'       => __( 'Widgets in this area will be shown on News Home', THEMES_NAMES ),
        'before_widget'     => '<section class="mb-2">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="h5 font-weight-semibold mb-3"><span class="border-bottom-2 border-secondary d-inline-block pb-1">',
        'after_title'       => '</span></h2><div style="clear:both"></div>',
)); */
if ( function_exists('register_sidebar') )
    global $opt_themes; 
    register_sidebar(array(
        'id'                => 'sidebar-home-1',
        'name'              => EX_THEMES_NAMES_.' Sidebar Home Top',
		'description'       => __( 'Widgets in this area will be shown on sidebar only Home Top.', THEMES_NAMES ),
        'before_widget'     => '<section class="rounded shadow-sm pt-2 px-2 px-md-2 mb-2">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="h5 font-weight-semibold mb-3"><span class="border-bottom-2 border-secondary d-inline-block pb-1">',
        'after_title'       => '</span></h2><div style="clear:both"></div>',
));
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'                => 'sidebar-home-2',
        'name'              => EX_THEMES_NAMES_.' Sidebar Home Bottom',
		'description'       => __( 'Widgets in this area will be shown on sidebar only Home Bottom.', THEMES_NAMES ),
        'before_widget'     => '<section class="rounded shadow-sm pt-2 px-2 px-md-2 mb-2">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="h5 font-weight-semibold mb-3"><span class="border-bottom-2 border-secondary d-inline-block pb-1">',
        'after_title'       => '</span></h2><div style="clear:both"></div>',
));
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'                => 'sidebar-1',
        'name'              => EX_THEMES_NAMES_.' Sidebar Post',
		'description'       => __( 'Widgets in this area will be shown on sidebar Post', THEMES_NAMES ),
        'before_widget'     => '<section class="rounded shadow-sm pt-2 px-2 px-md-2 mb-2">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="h5 font-weight-semibold mb-3"><span class="border-bottom-2 border-secondary d-inline-block pb-1">',
        'after_title'       => '</span></h2><div style="clear:both"></div>',
));
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function wp_themes_footer_admin () { 
$linkX              = get_bloginfo('url');
$parse              = parse_url($linkX);
$sitex              = $parse['host'];
echo '<p><span id="footer-thankyou" style="font-style:normal;font-size:90%;letter-spacing:1px;"><b style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif);text-transform: uppercase !important;">'.$sitex.'</b> using <b style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif); ">'.EXTHEMES_NAME.' v.'.EXTHEMES_VERSION.' </b> @<script type="text/javascript">var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> - Developed by <a href="'.EXTHEMES_API_URL.'" title="Premium Wordpress Themes" target="_blank"  style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif);text-transform: uppercase !important;">'.EXTHEMES_AUTHOR.'</a></span></p>';
}
add_filter('admin_footer_text', 'wp_themes_footer_admin');
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function catch_that_image() {
    global $post, $posts, $opt_themes;
	$default_img		= $opt_themes['ex_themes_defaults_no_images_']['url'];
    $first_img			= '';
    ob_start();
    ob_end_clean();
    $output				= preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img			= $matches [1] [0];
    if(empty($first_img)){ //Defines a default image
        $first_img		= $default_img;
    }
    return $first_img;
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function timeago($ptime) {
	$ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return ' just now';
    $interval = array (
        12 * 30 * 24 * 60 * 60 => ' years ago ('.date('F j, Y', $ptime).')',
        30 * 24 * 60 * 60 => ' months ago ('.date('F j, Y', $ptime).')',
        7 * 24 * 60 * 60 => ' weeks ago ('.date('F j, Y', $ptime).')',
        24 * 60 * 60 => ' days ago',
        60 * 60 => ' hours ago',
        60 => ' minutes ago',
        1 => ' seconds ago' );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    }; 
}

/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_get_post_view_() {
    $count_key = 'post_views_count';
    $count = get_post_meta( get_the_ID(), $count_key, true );
    if($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K';
    } else {
        return $count.'';
    }
    //return "$count";
}
function ex_themes_get_post_view_alts() {
    $count_key = 'post_views_count';
    $count = get_post_meta( get_the_ID(), $count_key, true );
    if($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return "$count";
}
function ex_themes_get_post_view2_() {
    $count_key = 'post_views_count';
    $count = get_post_meta( get_the_ID(), $count_key, true );
    if($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return "$count";
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_set_post_view_() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_posts_column_views_( $columns ) {
    $columns['likes'] = 'Views';
    return $columns;
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_posts_custom_column_views_( $column ) {
    if ( $column === 'likes') {
		global $post;	
		$total_view_post	= ex_themes_get_post_view_();
		$judul				= get_post_meta( $post->ID, 'wp_title_GP',  true );
		$versi				= get_post_meta( $post->ID, 'wp_version', true );
		$version			= 'v.'.get_post_meta( $post->ID, 'wp_version', true );
		$versionGP			= get_post_meta( $post->ID, 'wp_version_GP', true );
		echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="Total View Post : '.$total_view_post.'"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;'.$total_view_post.'</b>';
		if($versi) { 
		echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="'.$judul.' '.$version.'">&nbsp;'.$version.'</b>';
		}
    }
}
add_filter( 'manage_posts_columns', 'ex_themes_posts_column_views_' );
add_action( 'manage_posts_custom_column', 'ex_themes_posts_custom_column_views_' );
function version_apk_edit_columns( $columns ) {
    $columns['versi'] = 'Version Apk';
    return $columns;
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function version_apk_columns( $column ) {
    if ( $column === 'versi') {
		global $post;	
		$total_view_post	= ex_themes_get_post_view_();
		$version = get_post_meta( $post->ID, 'wp_version', true );
		$versionGP = get_post_meta( $post->ID, 'wp_version_GP', true );
		echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="Version : '.$version.'">&nbsp;'.$version.'</b>';
    }
}
//add_filter( 'manage_posts_columns', 'version_apk_edit_columns' );
//add_action( 'manage_posts_custom_column', 'version_apk_columns' );


/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_duplicate_scripts( $hook ) {
    if( !in_array( $hook, array( 'post.php', 'post-new.php' , 'edit.php'))) return;
    wp_enqueue_script('duptitles',
        wp_enqueue_script('duptitles',EX_THEMES_URI.'/assets/js/psy_duplicate.js',
            array( 'jquery' )), array( 'jquery' )  );
}
add_action( 'admin_enqueue_scripts', 'ex_themes_duplicate_scripts', 2000 );
add_action('wp_ajax_ex_themes_duplicate', 'ex_themes_duplicate_callback');
function ex_themes_duplicate_callback() {
    function ex_themes_results_checks() {
        global $wpdb;
        $title = $_POST['post_title'];
        $post_id = $_POST['post_id'];
        $titles = "SELECT post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_title = '{$title}' AND ID != {$post_id} ";
        $results = $wpdb->get_results($titles);
        if($results) {
            return '<div class="error"><p><span class="dashicons dashicons-warning"></span> '. __( 'This content already exists, we recommend not to publish.' , THEMES_NAMES ) .' </p></div>';
        } else {
            return '<div class="notice rebskt updated"><p><span class="dashicons dashicons-thumbs-up"></span> '.__('Excellent! this content is unique.' , THEMES_NAMES).'</p></div>';
        }
    }
    echo ex_themes_results_checks();
    die();
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
add_rewrite_endpoint( 'download', EP_PERMALINK | EP_PAGES );
function ex_themes_download() {
    add_rewrite_endpoint( 'download', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_download' );
function ex_themes_download_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['download'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/download.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_download_template' );
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
add_rewrite_endpoint( 'get', EP_PERMALINK | EP_PAGES );
function ex_themes_get() {
    add_rewrite_endpoint( 'get', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_get' );
function ex_themes_get_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['get'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/get.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_get_template' );
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
add_rewrite_endpoint( 'file', EP_PERMALINK | EP_PAGES );
function ex_themes_files() {
    add_rewrite_endpoint( 'file', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_files' );
function ex_themes_files_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['file'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/file.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_files_template' );


function file_page_titles(){
global $opt_themes, $post, $wp_query;
$linkX	= get_bloginfo('url'); 
$parse	= parse_url($linkX); 
$situs	= $parse['host'];
$names	= $_GET['names'];
$url	= $_GET['urls'];
if ( isset( $wp_query->query_vars['file'] ) ) { ?>
<title><?php _e($opt_themes['exthemes_Download'], TEXT_DOMAIN); ?> <?php echo $names; ?> - <?php echo strtoupper($situs); ?></title>

<?php }
}
add_action( 'wp_head', 'file_page_titles',0); 

/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    

function ex_themes_add_img_alt_tag_title_($attr, $attachment = null) {
    $img_title = trim(strip_tags($attachment->post_title));
    if (empty($attr['alt'])) {
        $attr['alt'] = $img_title;
        $attr['title'] = $img_title;
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'ex_themes_add_img_alt_tag_title_', 10, 2);
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_page_navy_($pages = '', $range = 1) {
	global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){
	$showitems = ($range * 1)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages)
    {
        if($paged > 1 && $paged > $range+1 && $showitems < $pages) echo "<li class=\"page-item\"><a class='page-link' href='".get_pagenum_link(1)."' aria-label='next'><svg class='svg-6'  version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'  width='12px' height='12px' viewBox='0 0 220.682 220.682' style='enable-background:new 0 0 220.682 220.682; '   xml:space='preserve'><g>  <polygon points='92.695,38.924 164.113,110.341 92.695,181.758 120.979,210.043 220.682,110.341 120.979,10.639  '/>  <polygon points='28.284,210.043 127.986,110.341 28.284,10.639 0,38.924 71.417,110.341 0,181.758  '/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li class=\"page-item\"><a class='page-link' href='".get_pagenum_link($paged - 1)."' aria-label='page'><svg class='svg-6' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='12px' height='12px' viewBox='0 0 492.004 492.004' style='enable-background:new 0 0 492.004 492.004; ' xml:space='preserve'><g><g><path d='M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12    c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028    c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265 c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z'/>  </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a></li>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link' href='".get_pagenum_link($i)."' aria-label='page'>".RTL_Nums($i)."</a></li>":"<li class=\"page-item\"><a class='page-link' href='".get_pagenum_link($i)."' aria-label='page'>".RTL_Nums($i)."</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<li class=\"page-item\"><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\" aria-label='page' ><svg class='svg-6' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'  width='12px' height='12px' viewBox='0 0 492 492' style='enable-background:new 0 0 492 492; ' xml:space='preserve'><g><g><path d='M198.608,246.104L382.664,62.04c5.068-5.056,7.856-11.816,7.856-19.024c0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12    C361.476,2.792,354.712,0,347.504,0s-13.964,2.792-19.028,7.864L109.328,227.008c-5.084,5.08-7.868,11.868-7.848,19.084    c-0.02,7.248,2.76,14.028,7.848,19.112l218.944,218.932c5.064,5.072,11.82,7.864,19.032,7.864c7.208,0,13.964-2.792,19.032-7.864 l16.124-16.12c10.492-10.492,10.492-27.572,0-38.06L198.608,246.104z'/>  </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class=\"page-item\"><a class='page-link' href='".get_pagenum_link($pages)."' aria-label='page'><svg class='svg-6' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='12px' height='12px' viewBox='0 0 532.439 532.439' style='enable-background:new 0 0 532.439 532.439; ;' xml:space='preserve'><g><g><polygon points='532.439,44.56 241.74,266.22 532.439,487.88 532.439,377.05 386.484,266.22 532.439,155.39'/><polygon points='290.699,487.88 290.699,377.05 144.744,266.22 290.699,155.39 290.699,44.56 0,266.22'/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a></li>";
    }	
		} else {
			
    $showitems = ($range * 1)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages)
    {
        if($paged > 1 && $paged > $range+1 && $showitems < $pages) echo "<li class=\"page-item\"><a class='page-link' href='".get_pagenum_link(1)."' aria-label='page'><svg class='svg-6' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 192 512' style=\" \"><path d='M4.2 247.5L151 99.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17L69.3 256l118.5 119.7c4.7 4.7 4.7 12.3 0 17L168 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 264.5c-4.7-4.7-4.7-12.3 0-17z'></path></svg></a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li class=\"page-item\"><a class='page-link' href='".get_pagenum_link($paged - 1)."' aria-label='page'><svg class='svg-6' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 192 512' style=\" \"><path d='M4.2 247.5L151 99.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17L69.3 256l118.5 119.7c4.7 4.7 4.7 12.3 0 17L168 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 264.5c-4.7-4.7-4.7-12.3 0-17z'></path></svg></a></li>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link' href='".get_pagenum_link($i)."' aria-label='page'>".$i."</a></li>":"<li class=\"page-item\"><a class='page-link' href='".get_pagenum_link($i)."' aria-label='page'>".$i."</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<li class=\"page-item\"><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\" aria-label='page'> <svg class='svg-6' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 192 512' style=\" \"><path d='M187.8 264.5L41 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 392.7c-4.7-4.7-4.7-12.3 0-17L122.7 256 4.2 136.3c-4.7-4.7-4.7-12.3 0-17L24 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17z'></path></svg></a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class=\"page-item\"><a class='page-link' href='".get_pagenum_link($pages)."' aria-label='page'><svg class=\"svg-6\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 384 512\"  style=\" \"><path d=\"M363.8 264.5L217 412.5c-4.7 4.7-12.3 4.7-17 0l-19.8-19.8c-4.7-4.7-4.7-12.3 0-17L298.7 256 180.2 136.3c-4.7-4.7-4.7-12.3 0-17L200 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17zm-160-17L57 99.5c-4.7-4.7-12.3-4.7-17 0l-19.8 19.8c-4.7 4.7-4.7 12.3 0 17L138.7 256 20.2 375.7c-4.7 4.7-4.7 12.3 0 17L40 412.5c4.7 4.7 12.3 4.7 17 0l146.8-148c4.7-4.7 4.7-12.3 0-17z\"></path></svg></a></li>";
    }
	
	}	
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_blog_shares_($content1) {
    global $wpdb, $post, $opt_themes;
    if(is_singular() || is_home()){
        #### Get current page URL
        $ex_themes_blog_url_shares_ = urlencode(get_permalink());
        $ex_themes_view_1_ = ex_themes_set_post_view_();
        $ex_themes_view_2_ = ex_themes_get_post_view_();
        $ex_themes_fake_views_ = mt_rand(500,9999);
        #### Get current page title
        $ex_themes_blog_title_shares_ = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
        $ex_themes_blog_desc_shares_ = htmlspecialchars(urlencode(html_entity_decode( get_post_meta( $post->ID, 'wp_desck_GP', true ) ) ) );
        #### $ex_themes_blog_title_shares_ = str_replace( ' ', '%20', get_the_title());
        #### Get Post Thumbnail for pinterest
        $ex_themes_blog_img_shares_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        #### Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$ex_themes_blog_title_shares_.'&amp;url='.$ex_themes_blog_url_shares_.'&amp;via=iblog.my.id';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$ex_themes_blog_url_shares_;
        $telegramURL = 'https://telegram.me/share/url?text='.$ex_themes_blog_title_shares_.'&url='.$ex_themes_blog_url_shares_.'';
        $bufferURL = 'https://bufferapp.com/add?url='.$ex_themes_blog_url_shares_.'&amp;text='.$ex_themes_blog_title_shares_;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$ex_themes_blog_url_shares_.'&amp;title='.$ex_themes_blog_title_shares_;
        $whatsappURL = 'https://api.whatsapp.com/send?text='.$ex_themes_blog_title_shares_.'%20'.$ex_themes_blog_url_shares_.'';
        $tumblrURL = 'https://www.tumblr.com/widgets/share/tool?posttype=link&title='.$ex_themes_blog_title_shares_.'&caption='.$ex_themes_blog_title_shares_.'&content='.$ex_themes_blog_url_shares_.'&shareSource=tumblr_share_button';
        $vkURL = 'https://vk.com/share.php?url='.$ex_themes_blog_url_shares_.'&title='.$ex_themes_blog_title_shares_.'&description='.$ex_themes_blog_desc_shares_.'&image='.$ex_themes_blog_img_shares_[0].'';
        #### Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$ex_themes_blog_url_shares_.'&amp;media='.$ex_themes_blog_img_shares_[0].'&amp;description='.$ex_themes_blog_title_shares_;
        #### Add sharing button at the end of page/page content
        $content1 .= '';
        $content1 .= '<ul class="nav mb-4 list-shares">';
        /*
        if($opt_themes['aktif_fake_views']) {
        $content1 .= '<div class="nc_tweetContainer swp_share_button total_shares total_sharesalt"><span class="swp_count " style="transition: padding 0.1s linear 0s;">'.numToKs($ex_themes_fake_views_).' <span class="swp_label">Reads</span></span></div>';
        } else {
        $content1 .= '<div class="nc_tweetContainer swp_share_button total_shares total_sharesalt"><span class="swp_count " style="transition: padding 0.1s linear 0s;">'.$ex_themes_view_2_.' <span class="swp_label">Reads</span></span></div>';
        }
        */
        $content1 .= '
<li class="mr-2">
   <a class="facebook" href="'.$facebookURL.'" rel="nofollow" target="_blank">
      <svg class="svg-5" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
         <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
      </svg>
   </a>
</li>
';
        $content1 .= '
<li class="mr-2">
   <a class="twitter" href="'. $twitterURL .'" rel="nofollow" target="_blank">
      <svg class="svg-5" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
         <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
      </svg>
   </a>
</li>
';
        $content1 .= '
<li class="mr-2">
   <a class="resp-sharing-button__link" title="Tumblr" href="'. $tumblrURL .'" target="_blank" rel="nofollow noopener" aria-label="">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
         <path d="M13.5.5v5h5v4h-5V15c0 5 3.5 4.4 6 2.8v4.4c-6.7 3.2-12 0-12-4.2V9.5h-3V6.7c1-.3 2.2-.7 3-1.3.5-.5 1-1.2 1.4-2 .3-.7.6-1.7.7-3h3.8z" />
      </svg>
   </a>
</li>
';
        $content1 .= '
<li class="mr-2">
   <a class="pinterest" onclick="var e=document.createElement(\'script\');						e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');						e.setAttribute(\'src\',\'\/\/assets.pinterest.com\/js\/pinmarklet.js?r=\'+Math.random()*99999999);						document.body.appendChild(e);">
      <svg class="svg-5" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
         <path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z" />
      </svg>
   </a>
</li>
';
        $content1 .= '
<li class="mr-2">
   <a class="resp-sharing-button__link" title="WhatsApp" href="'.$whatsappURL.'" target="_blank" rel="nofollow noopener" aria-label="">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
         <path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z" />
      </svg>
   </a>
</li>
';
        $content1 .= '
<li class="mr-2">
   <a class="resp-sharing-button__link" title="VK" href="'.$vkURL.'" target="_blank" rel="nofollow noopener" aria-label="">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path d="M21.547 7h-3.29a.743.743 0 0 0-.655.392s-1.312 2.416-1.734 3.23C14.734 12.813 14 12.126 14 11.11V7.603A1.104 1.104 0 0 0 12.896 6.5h-2.474a1.982 1.982 0 0 0-1.75.813s1.255-.204 1.255 1.49c0 .42.022 1.626.04 2.64a.73.73 0 0 1-1.272.503 21.54 21.54 0 0 1-2.498-4.543.693.693 0 0 0-.63-.403h-2.99a.508.508 0 0 0-.48.685C3.005 10.175 6.918 18 11.38 18h1.878a.742.742 0 0 0 .742-.742v-1.135a.73.73 0 0 1 1.23-.53l2.247 2.112a1.09 1.09 0 0 0 .746.295h2.953c1.424 0 1.424-.988.647-1.753-.546-.538-2.518-2.617-2.518-2.617a1.02 1.02 0 0 1-.078-1.323c.637-.84 1.68-2.212 2.122-2.8.603-.804 1.697-2.507.197-2.507z" />
   </a>
</li>
';
        $content1 .= '
<li class="mr-2">
   <a class="resp-sharing-button__link" title="Telegram" href="'.$telegramURL.'" target="_blank" rel="nofollow noopener" aria-label="">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
         <path d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z" />
      </svg>
   </a>
</li>
';
        $content1 .= '</ul>';
        return $content1;
    } else {
        #### if not a post/page then don't include sharing button
        return $content1;
    }
};
add_filter( 'the_content1', 'ex_themes_blog_shares_');
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
//change text to leave a reply on comment form
function moddroid_comments_1 ($arg) {
global $opt_themes;
$arg['title_reply'] = '';
return $arg;
}
add_filter('comment_form_defaults','moddroid_comments_1');

function moddroid_comments_2($arg) {
global $opt_themes;
$arg['label_submit'] = $opt_themes['exthemes_comments_2'];
return $arg;
}
add_filter('comment_form_defaults', 'moddroid_comments_2');
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function filter_comment_form_submit_button( $submit_button, $args ) {
    $submit_before = '<div class="form-group text-right">';
    $submit_after = '</div>';
    return $submit_before . $submit_button . $submit_after;
};
add_filter( 'comment_form_submit_button', 'filter_comment_form_submit_button', 10, 2 );
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function my_post_time_ago_function() {
	global $opt_themes;
	$agos = 'ago';
    return sprintf( esc_html__( '%s '.$agos.'', THEMES_NAMES ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'the_time', 'my_post_time_ago_function' );
function my_comment_time_ago_function() {
	global $opt_themes;
	$agos = 'ago';
    return sprintf( esc_html__( '%s '.$agos.'', THEMES_NAMES ), human_time_diff(get_comment_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'get_comment_date', 'my_comment_time_ago_function' );
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
remove_filter( 'sanitize_title', 'sanitize_title_with_dashes', 10 );
add_filter( 'sanitize_title', 'wpse231448_sanitize_title_with_dashes', 10, 3 );
function wpse231448_sanitize_title_with_dashes( $title, $raw_title = '', $context = 'display' ) {
    $title = strip_tags($title);
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    $title = str_replace('%', '', $title);
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
    if (seems_utf8($title)) {
        if (function_exists('mb_strtolower')) {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title, 200);
    }
    $title = strtolower($title);
    if ( 'save' == $context ) {
        $title = str_replace( array( '%c2%a0', '%e2%80%93', '%e2%80%94' ), '-', $title );
        $title = str_replace( array( '&nbsp;', '&#160;', '&ndash;', '&#8211;', '&mdash;', '&#8212;' ), '-', $title );
        $title = str_replace( array(
            // iexcl and iquest
            '%c2%a1', '%c2%bf',
            // angle quotes
            '%c2%ab', '%c2%bb', '%e2%80%b9', '%e2%80%ba',
            // curly quotes
            '%e2%80%98', '%e2%80%99', '%e2%80%9c', '%e2%80%9d',
            '%e2%80%9a', '%e2%80%9b', '%e2%80%9e', '%e2%80%9f',
            // copy, reg, deg, hellip and trade
            '%c2%a9', '%c2%ae', '%c2%b0', '%e2%80%a6', '%e2%84%a2',
            // acute accents
            '%c2%b4', '%cb%8a', '%cc%81', '%cd%81',
            // grave accent, macron, caron
            '%cc%80', '%cc%84', '%cc%8c',
        ), '', $title );
        // Convert times to x
        $title = str_replace( '%c3%97', 'x', $title );
    }
    $title = preg_replace('/&.+?;/', '', $title); 
    // WPSE-231448: Commented out this line below to stop dots being replaced by dashes.
    //$title = str_replace('.', '-', $title);
    // WPSE-231448: Add the dot to the list of characters NOT to be stripped.
    $title = preg_replace('/[^%a-z0-9 _\-\.]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');
    return $title;
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function ex_themes_post_gallery_contents_($content2) {
    global $wpdb, $post, $opt_themes;
    if(is_singular() || is_home()){
        $ex_themes_page_titles_ = esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) );
		$ex_themes_datos_imagenes = get_post_meta(get_the_ID(), 'wp_images_GP', true);
        $ex_themes_if_ = get_post_meta( $post->ID, 'wp_images_GP', true );
		$defaults_no_images = $opt_themes['ex_themes_defaults_no_images_']['url'];
		$thumbnails_gp      = get_post_meta( $post->ID, 'wp_images_GP', true );
		$thumbnails     = str_replace( 'http://', '', $thumbnails_gp );
		$thumbnails     = str_replace( 'https://', '', $thumbnails_gp );
		$randoms        = mt_rand(0, 3);
		$cdn_thumbnails = '//i'.$randoms.'.wp.com/'.$thumbnails.'=w64-h64-p';
        $content2 .= "<div id=\"gallery-3\" class=\"gallery galleryid-28459 gallery-columns-3 gallery-size-medium\">";
		if (get_post_meta( $post->ID, 'wp_images_GP', true )) {
        $datos_imagenes = $ex_themes_datos_imagenes;
        $i = 0;
		if(count($datos_imagenes)>5){
         foreach($datos_imagenes as $elemento) { 
		 $content2 .= "<style type=\"text/css\">#gallery-3{margin:auto}#gallery-3 .gallery-item{float:left;margin-top:10px;text-align:center;width:33%}#gallery-3 img{border:2px solid #cfcfcf}#gallery-3 .gallery-caption{margin-left:0}</style>";
        $content2 .= "<dl class=\"gallery-item\">";
        $content2 .= "<dt class=\"gallery-icon portrait\">";
		$content2 .= "<img src=\"";
		$content2 .= $datos_imagenes[$i];
		$content2 .= "\" data-spai=\"1\" class=\"attachment-medium size-medium\" title=\"";
		$content2 .= $ex_themes_page_titles_;
		$content2 .= "screen ";
		$content2 .= $i;
		$content2 .= "\" data-spai-upd=\"212\" width=\"226\" height=\"402\">";
        $content2 .= "</dt>";
        $content2 .= "</dl>";
        if (++$i == 5) break; } } } 
        $content2 .= "<br style=\"clear: both\">";
        $content2 .= "</div>";		 
        return $content2;
		} else {
        #### if not a post/page then don't include sharing button
        return $content2;
    }
};
add_filter( 'the_content2', 'ex_themes_post_gallery_contents_');
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/     
add_filter( 'the_content2', 'ex_themes_post_gallery_contents_insert_' ); 
function ex_themes_post_gallery_contents_insert_( $content2 ) {  
	global $opt_themes;
    $activate = $opt_themes['ex_themes_gallery_content_activate_'];
    $numbers = $opt_themes['ex_themes_gallery_content_paragraph_on_'];
    if (($activate == '1'))           
    $ex_themes_post_gallery_contents_code_ = ex_themes_post_gallery_contents_($content2); 
    if ( is_single() && ! is_admin() ) {
        return ex_themes_post_gallery_contents_after_paragraph_( $ex_themes_post_gallery_contents_code_, $numbers, $content2 );
    }     
    return $content2;
}  
function ex_themes_post_gallery_contents_after_paragraph_( $insertion, $paragraph_id, $content2 ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content2 );
    foreach ($paragraphs as $index => $paragraph) { 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        } 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }     
    return implode( '', $paragraphs );
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/     
function ex_themes_post_youtube_contents_($contents) {
    global $wpdb, $post, $opt_themes;
    if(is_singular() || is_home()){
        $ex_themes_page_titles_ = esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) );
		$ex_themes_datos_youtube = get_post_meta(get_the_ID(), 'wp_youtube_GP', true);
        $ex_themes_if_ = get_post_meta( $post->ID, 'wp_youtube_GP', true );
		if (get_post_meta( $post->ID, 'wp_youtube_GP', true )) {
        $contents .= "<center>";		 
        $datos_youtube = $ex_themes_datos_youtube;
		$contents .= "<iframe data-src=\"https://www.youtube.com/embed/";
		$contents .= $datos_youtube;
		$contents .= "\"  title=\"";
		$contents .= $ex_themes_page_titles_;
		$contents .= "Gameplay "; 
		$contents .= "\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\"  width=\"100%\" height=\"400px\"></iframe>";
        $contents .= "<br style=\"clear: both\">";
        $contents .= "</center>";	
         
		}		
        return $contents;  
    }
};
add_filter( 'the_contents', 'ex_themes_post_youtube_contents_');
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/     
add_filter( 'the_content', 'ex_themes_post_youtube_contents_insert_' ); 
function ex_themes_post_youtube_contents_insert_( $content ) {  
	global $post, $opt_themes;
    $activate		= $opt_themes['ex_themes_youtube_content_activate_'];
    $numbers		= $opt_themes['ex_themes_youtube_content_paragraph_on_'];
    $ex_themes_post_youtube_contents_code_ = ex_themes_post_youtube_contents_(''); 
    if (($activate == '1'))           
    if ( is_single() && ! is_admin() ) {
        return ex_themes_post_youtube_contents_after_paragraph_( $ex_themes_post_youtube_contents_code_, $numbers, $content );
    }     
    return $content;
}  
function ex_themes_post_youtube_contents_after_paragraph_( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) { 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        } 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }     
    return implode( '', $paragraphs );
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/     
add_filter('upload_mimes', 'allow_custom_mimes');
function allow_custom_mimes ( $existing_mimes=array() ) {
	$existing_mimes['apk'] = '<code>application/vnd.android.package-archive</code>';
	return $existing_mimes;
}

/*--------------------------------- @EXTHEM.ES -----------------------------------------*/     
###### this code for apkdone, 5play and moddroid themes ######
###### Open your apk themes –> functions.php and insert this code on end line ######
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/  
function exthemes_download_page__noindex_nofollow() {
	global $wp_query, $post, $opt_themes;
	$robots	=	$opt_themes['noindex_setting'];
	$noindex = "<!-- ".THEMES_NAMES." Theme Meta Robots Search by ".EXTHEMES_AUTHOR." -->\n<meta name='robots' content='".$robots."' />\n";
	$index = "<!-- ".THEMES_NAMES." Theme Meta Robots Search by ".EXTHEMES_AUTHOR." -->\n<meta name='robots' content='index, follow' />\n";
	if ( isset( $wp_query->query_vars['download'] ) ) {
	$activate = $opt_themes['noindex_activated'];
    if (($activate == '1'))
		echo $noindex;
	}	
} 
add_action( 'wp_head', 'exthemes_download_page__noindex_nofollow',0); 
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/  
function exthemes_get_files__noindex_nofollow() {
	global $wp_query, $post, $opt_themes;
	$robots	=	$opt_themes['noindex_setting'];
	$noindex = "<!-- ".THEMES_NAMES." Theme Meta Robots Search by ".EXTHEMES_AUTHOR." -->\n<meta name='robots' content='".$robots."' />\n";
	if ( ! isset( $wp_query->query_vars['file'] ) || ! is_singular() ) {
		return;
	}
	$activate = $opt_themes['noindex_activated'];
    if (($activate == '1'))
	echo $noindex;
}
add_action( 'wp_head', 'exthemes_get_files__noindex_nofollow',0); 
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/ 
add_filter( 'get_the_excerpt', 'exthemes_excerpt_more' );
function exthemes_excerpt_more( $excerpt ) {
    return substr( $excerpt, 0, 37 ) . '&hellip;';
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function moddroid_skip_link() {
	echo '<a class="skip-link sr-only" href="#content">' . __( 'Skip to the content', THEMES_NAMES ) . '</a>';
}

add_action( 'wp_body_open', 'moddroid_skip_link', 5 );
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
function moddroid_no_js_class() {	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
<?php
}
add_action( 'wp_head', 'moddroid_no_js_class' );
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
    if( in_array('nav-item', $classes) ){
        $classes[] = 'active ';
    }
return $classes;
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
class Custom_Walker_Nav_Menu_top extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $is_current_item = '';
        if(array_search('current-menu-item', $item->classes) != 0)
        {
            $is_current_item = ' class="active"';
        }
        echo '<li'.$is_current_item.'><a href="'.$item->url.'">'.$item->title;
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        echo '</a></li>';
    }
}
/*--------------------------------- @EXTHEM.ES -----------------------------------------*/    
/**
 * Auto Add Image Attributes From Image Filename 
 */
function exthemes_auto_image_attributes( $post_ID ) {
  $attachment = get_post( $post_ID );
  
  $attachment_title = $attachment->post_title;
  $attachment_title = str_replace( '-', ' ', $attachment_title ); // Hyphen Removal
  $attachment_title = ucwords( $attachment_title ); // Capitalize First Word
  
  $uploaded_image = array();
  $uploaded_image['ID'] = $post_ID;
  $uploaded_image['post_title'] = $attachment_title; // Image Title
  $uploaded_image['post_excerpt'] = $attachment_title; // Image Caption
  $uploaded_image['post_content'] = $attachment_title; // Image Description
  
  wp_update_post( $uploaded_image );
  update_post_meta( $post_ID, '_wp_attachment_image_alt', $attachment_title ); // Image Alt Text
}
add_action( 'add_attachment', 'exthemes_auto_image_attributes' );


function get_user_role() {
    global $current_user;
    $user_roles     = $current_user->roles;
    $user_role      = array_shift($user_roles);
    return $user_role;
}
/* user commnet count */
function get_user_comment_counts( $user_ID ) {
    global $wpdb;
    $count = $wpdb->get_var(
        $wpdb->prepare( "SELECT COUNT(comment_ID) FROM {$wpdb->comments} WHERE user_id = %d ", $user_ID )
    );
    return $count;
}


function display_last_login() {
global $current_user, $wp_roles;
get_currentuserinfo();
$user = wp_get_current_user();
$user_id = $user->ID;
$user_id = get_user_meta( $current_user->ID, '_last_login', false );
$last_login = get_user_meta( 'user_last_login_' . $current_user->ID );
if ( false === $last_login ) {
    $last_login = __( 'Never', THEMES_NAMES );
} else {
    $last_login = date( 'j F Y, H:i:s', $last_login );
}
echo '<p>Last Login: ' . $last_login . '</p>';

}


// set the last login date
add_action('wp_login','iiwp_set_last_login', 0, 2);
function iiwp_set_last_login($login, $user) {  
    $user = get_user_by('login',$login);
    $time = current_time( 'timestamp' );
    $last_login = get_user_meta( $user->ID, '_last_login', 'true' );
 
    if(!$last_login){
    update_usermeta( $user->ID, '_last_login', $time );
    }else{
    update_usermeta( $user->ID, '_last_login_prev', $last_login );
    update_usermeta( $user->ID, '_last_login', $time );
    }
 
}
 
// get last login date
function iiwp_get_last_login($user_id, $prev=null){
 
  $last_login   = get_user_meta($user_id);
  $time         = current_time( 'timestamp' );
 
  if(isset($last_login['_last_login_prev'][0]) && $prev){
          $last_login = get_user_meta($user_id, '_last_login_prev', 'true' );
  }else if(isset($last_login['_last_login'][0])){
          $last_login = get_user_meta($user_id, '_last_login', 'true' );
  }else{
    update_usermeta( $user_id, '_last_login', $time );
    $last_login = $last_login['_last_login'][0];
  }
 
  return $last_login;
}


function your_last_login($login) {
    global $user_ID;
    $user       = get_userdatabylogin($login);
    update_usermeta($user->ID, 'last_login', current_time('mysql'));
}
add_action('wp_login','your_last_login');
 
function get_last_login($user_id) {
    $last_login     = get_user_meta($user_id, 'last_login', true);
    $date_format    = 'j F Y, H:i';
    $the_last_login = mysql2date($date_format, $last_login, false);
    echo '<b>'.$the_last_login.'</b>';
		 
}


/*
https://gearside.com/online-users-wordpress-currently-active-last-seen/
*/
//Update user online status
add_action('init', 'gearside_users_status_init');
add_action('admin_init', 'gearside_users_status_init');
function gearside_users_status_init(){
	$logged_in_users = get_transient('users_status'); //Get the active users from the transient.
	$user = wp_get_current_user(); //Get the current user's data

	//Update the user if they are not on the list, or if they have not been online in the last 900 seconds (15 minutes)
	if ( !isset($logged_in_users[$user->ID]['last']) || $logged_in_users[$user->ID]['last'] <= time()-900 ){
		$logged_in_users[$user->ID] = array(
			'id' => $user->ID,
			'username' => $user->user_login,
			'last' => time(),
		);
		set_transient('users_status', $logged_in_users, 900); //Set this transient to expire 15 minutes after it is created.
	}
}

//Check if a user has been online in the last 15 minutes
function gearside_is_user_online($id){	
	$logged_in_users = get_transient('users_status'); //Get the active users from the transient.
	
	return isset($logged_in_users[$id]['last']) && $logged_in_users[$id]['last'] > time()-900; //Return boolean if the user has been online in the last 900 seconds (15 minutes).
}

//Check when a user was last online.
function gearside_user_last_online($id){
	$logged_in_users = get_transient('users_status'); //Get the active users from the transient.
	
	//Determine if the user has ever been logged in (and return their last active date if so).
	if ( isset($logged_in_users[$id]['last']) ){
		return $logged_in_users[$id]['last'];
	} else {
		return false;
	}
}

/*==========================
 This snippet shows how to add a column to the Users admin page with each users' last active date.
 Copy these contents to functions.php
 ===========================*/
 
 //Add columns to user listings
add_filter('manage_users_columns', 'gearside_user_columns_head');
function gearside_user_columns_head($defaults){
    $defaults['status'] = 'Status';
    return $defaults;
}
add_action('manage_users_custom_column', 'gearside_user_columns_content', 15, 3);
function gearside_user_columns_content($value='', $column_name, $id){
    if ( $column_name == 'status' ){
		if ( gearside_is_user_online($id) ){
			return '<strong style="color: green;">Online Now</strong>';
		} else {
			return ( gearside_user_last_online($id) )? '<small>Last Seen: <br /><em>' . date('M j, Y @ g:ia', gearside_user_last_online($id)) . '</em></small>' : ''; //Return the user's "Last Seen" date, or return empty if that user has never logged in.
		}
	}
}


/*==========================
 This snippet shows how to add an active user count to the WordPress Dashboard.
 Copy these contents to functions.php
 ===========================*/

//Active Users Metabox
add_action('wp_dashboard_setup', 'gearside_activeusers_metabox');
function gearside_activeusers_metabox(){
	global $wp_meta_boxes;
	wp_add_dashboard_widget('gearside_activeusers', 'Active Users', 'dashboard_gearside_activeusers');
}
function dashboard_gearside_activeusers(){
		$user_count = count_users();
		$users_plural = ( $user_count['total_users'] == 1 )? 'User' : 'Users'; //Determine singular/plural tense
		echo '<div><a href="users.php">' . $user_count['total_users'] . ' ' . $users_plural . '</a> <small>(' . gearside_online_users('count') . ' currently active)</small></div>';
}

//Get a count of online users, or an array of online user IDs.
//Pass 'count' (or nothing) as the parameter to simply return a count, otherwise it will return an array of online user data.
function gearside_online_users($return='count'){
	$logged_in_users = get_transient('users_status');
	
	//If no users are online
	if ( empty($logged_in_users) ){
		return ( $return == 'count' )? 0 : false; //If requesting a count return 0, if requesting user data return false.
	}
	
	$user_online_count = 0;
	$online_users = array();
	foreach ( $logged_in_users as $user ){
		if ( !empty($user['username']) && isset($user['last']) && $user['last'] > time()-900 ){ //If the user has been online in the last 900 seconds, add them to the array and increase the online count.
			$online_users[] = $user;
			$user_online_count++;
		}
	}

	return ( $return == 'count' )? $user_online_count : $online_users; //Return either an integer count, or an array of all online user data.
}

/*
https://wordpress.stackexchange.com/questions/34429/how-to-check-if-a-user-not-current-user-is-logged-in/34434#34434
*/
add_action('wp', 'update_online_users_status');
function update_online_users_status(){
  if(is_user_logged_in()){
    // get the online users list
    if(($logged_in_users = get_transient('users_online')) === false) $logged_in_users = array();

    $current_user = wp_get_current_user();
    $current_user = $current_user->ID;  
    $current_time = current_time('timestamp');

    if(!isset($logged_in_users[$current_user]) || ($logged_in_users[$current_user] < ($current_time - (15 * 60)))){
      $logged_in_users[$current_user] = $current_time;
      set_transient('users_online', $logged_in_users, 30 * 60);
    }
  }
}
function is_user_online($user_id) {
  // get the online users list
  $logged_in_users = get_transient('users_online');
  // online, if (s)he is in the list and last activity was less than 15 minutes ago
  return isset($logged_in_users[$user_id]) && ($logged_in_users[$user_id] > (current_time('timestamp') - (15 * 60)));
}

/*--------------------------------- @EXTHEM.ES -----------------------------------------*/

function ex_themes_notices_not_activate_admin() {
    if (empty($lis) && $_GET["page"] != 'ex_theme') {
        printf(
            "<style>.notice-error, div.error {border-left-color: deepskyblue!important;}.landingpress-message {padding: 20px !important; font-size: 16px !important;}.landingpress-message-inner {overflow: hidden;}.landingpress-message-icon {float: left; width: 35px; height: 35px; padding-right: 20px;}.landingpress-message-button {float: right; padding: 3px 0 0 20px;}</style>
            <div class='error landingpress-message'>
                <div class='landingpress-message-inner'>
                    <div class='landingpress-message-icon' style='font-size: 16px!important; text-transform: capitalize'>
                        <img src='" . get_template_directory_uri() . "/assets/img/xthemes.png' width='35' height='35' alt=''/>
                    </div>
                    <div class='landingpress-message-button'>
                        <a href='" . admin_url("admin.php?page=reload") . "' class='button button-primary'>Enter License Code</a>
                    </div>
                    <strong style='text-transform: capitalize;'>Welcome to " . THEMES_NAMES . " WordPress Themes.</strong>
                    <strong style='text-transform: capitalize; font-weight: 800; font-size: 20px; color: orangered!important; text-shadow: 0.02em 0.05em 0 rgba(0, 0, 0, 0.4);'>Please Activate " . THEMES_NAMES . " license</strong>
                    <br>
                    <i style='text-transform: capitalize;'>to get automatic updates, technical support, and access to " . THEMES_NAMES . " Options Panel</i>.
                </div>
            </div>"
        );
    }
}

if ("valid" == get_option('reload_license_key_status', false)) {
    if (!isset($redux_demo) && file_exists(get_template_directory() . "/libs/core/pengaturan.php")) {
        require_once get_template_directory() . "/libs/core/pengaturan.php";
    }
    if (current_user_can("editor") || current_user_can("administrator")) {
        require_once get_template_directory() . "/libs/addons/autopost.php";
    }
}

function noindex_nofollow_page_login($redirect_to, $request, $user) {
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array("administrator", $user->roles)) {
            return home_url("/wp-admin/admin.php?page=ex_theme");
        } else {
            return home_url("/wp-admin/");
        }
    } else {
        return home_url("/wp-admin/");
    }
}

if ("valid" != get_option('reload_license_key_status', false)) {
    add_action("admin_notices", "ex_themes_notices_not_activate_admin");
    add_action("wp_footer", "ex_themes_not_activate_front_end");
}

function ex_themes_not_activate_front_end(){
    ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <style>
        body {
        background: #000 !important;
        overflow: hidden
    }

    #warning span {
        font-size: 50px
    }

    #warning {
        z-index: 999999999;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        padding: 20% 0;
        height: 100%;
        text-align: center;
        background: rgba(0, 0, 0, 0.97);
        color: #fff
    }

    h4.ex_themes, a.ex_themes {
        font-weight: 800;
        font-size: 40px;
        color: #ffd800 !important;
        line-height: 1.3em;
        text-align: center;
        text-shadow: 0.02em 0.05em 0em rgba(0, 0, 0, 0.4);
    }</style>
    <div id="warning"><h4 class="ex_themes"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Need
        Activate <?php echo THEMES_NAMES; ?>
        v.<?php echo VERSION; ?>
        Themes <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h4>
        <p>Please Login On <b><a class="ex_themes" href="<?php echo EXTHEMES_MEMBER_URL; ?>"
            target="_blank"><?php echo EXTHEMES_AUTHOR; ?>
            </a></b> To Get Your License Key</p><span id="aktivasi"> </span></div>
<?php }

function themes_updates(){
    require get_template_directory() . "/libs/plugins/ruwa.php";
}

add_action("after_setup_theme", "themes_updates");

