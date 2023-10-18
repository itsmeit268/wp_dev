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


//add_filter( 'wp_default_editor', function () { return 'html'; } );


function ex_themes_disable_emojis_() { 
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	remove_action( 'wp_head', 'wp_print_scripts' );
	remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
	remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );           
	remove_action( 'wp_head', 'index_rel_link' );                         
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );           
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );          
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); 
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 ); 
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); 
	remove_action( 'wp_head', 'wp_oembed_add_host_js' ); 
	add_action( 'wp_footer', 'wp_print_scripts', 5 );
	add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
	add_action( 'wp_footer', 'wp_print_head_scripts', 5 );  
	add_filter( 'embed_oembed_discover', '__return_false' );	
}
add_action( 'init', 'ex_themes_disable_emojis_' );
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
//Remove Gutenberg Block Library CSS from loading on the frontend
function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 9999 );
/*-----------------------------------------------------------------------------------*/
function no_dashicons() {  
   wp_deregister_style( 'dashicons' );
}
if ( is_user_logged_in() ) {  
} else {
	add_action( 'wp_print_styles', 'no_dashicons', 9999 );
}
/*-----------------------------------------------------------------------------------*/
// disable gutenberg frontend styles @ https://m0n.co/15
function no_gutenberg_wp_enqueue_scripts() {	
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');	
	wp_dequeue_style('wc-block-style'); // disable woocommerce frontend block styles
	wp_dequeue_style('storefront-gutenberg-blocks'); // disable storefront frontend block styles
	
}
add_filter('wp_enqueue_scripts', 'no_gutenberg_wp_enqueue_scripts', 9999);
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */  
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
class EXTHEMES_DEVS_CDN {
    /**
     * The max number of image servers WP.com have (at time of writing it is 4)
     * So the servers as i0.wp.com, i1.wp.com, i2.wp.com, i3.wp.com
     * Edited to only load one, no reason to add extra dns lookups (Domain sharding is not recommended in an http2 world)
     * Defult: 3
     */
    const MAXSRV = 1;
    function __construct() {
        add_action( 'wp_head', array( $this, 'dns_prefetch' ) );
        add_action( 'template_redirect', array( $this, 'ex_themes_buffering_photon_cdn_starts_' ), PHP_INT_MAX );
    }
    // Adds the DNS prefetch meta fields for the WP.com servers
    function dns_prefetch() {
        for ( $srv = 0; $srv < self::MAXSRV; $srv++ ) :
            $domain = "i{$srv}.wp.com"; ?>

<link rel='dns-prefetch' href='//<?php echo esc_attr( $domain ) ?>' />

        <?php
        endfor;
    }
    // Start the output buffering
    function ex_themes_buffering_photon_cdn_starts_() {
        global $opt_themes;
        $cdn_active         = $opt_themes['cdn_active'];
        if (($cdn_active == '1'))
            ob_start( array( $this, 'process_output' ) );
    }
    // Processes the output buffer, replacing all matching images with URLs
    // Pointing to wp.com
    function process_output( $buffer ) {
        // Get the content directory URL minus the http://
        $photon_site_url    = site_url();
        $content_url        = content_url();
        $content_url        = str_replace( 'http://', '', $content_url );
        $content_url        = str_replace( 'https://', '', $content_url );
        $content_url        = str_replace( $photon_site_url, '', $content_url );
        $content_url        = str_replace( '', '', $content_url );
        // Replace references to images on our servers with the wp.com CDN
        // Photon only supports the following image types.
        return preg_replace_callback(
            '{'. $content_url .'/.+\.(jpg|jpeg|png|gif|webp)}i',
            array( $this, 'replace' ),
            $buffer
        );
    }
    // Replaces a single image URL match
    function replace( $matches ) {
        $url            = isset( $matches[0] ) ? $matches[0] : '';
        srand( crc32( $url ) ); // Best if we always use same server for this image
        $server         = rand( 0, self::MAXSRV-1 );
        return "i{$server}.wp.com/{$url}";
    }
}
new EXTHEMES_DEVS_CDN();
/*-----------------------------------------------------------------------------------*/
function ex_themes_async_scripts( $url ) { 
    if ( strpos( $url, ' async="async" defer="defer" src') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( ' src', ' async="async" defer="defer" src', $url );
    else
        return str_replace(  ' src', ' async="async" defer="defer" src', $url ) . "' async defer data-async='1";
} 
add_filter( 'clean_url', 'ex_themes_async_scripts', 11, 1 );
/*-----------------------------------------------------------------------------------*/
class AUTO_HTML_MINIFY {
    
protected $exthemes_devs_compress_css = true;
protected $exthemes_devs_compress_js = false;
protected $exthemes_devs_info_comment = true;
protected $exthemes_devs_remove_comments = false;
protected $html;

public function __construct($html){
    if (!empty($html)){
    $this->AUTO_HTML_MINIFY_PARSE_HTML($html);
    }
}

public function __toString(){
    return $this->html;
}

protected function AUTO_HTML_MINIFY_BOTTOM_COMMENT($raw, $compressed){
    $urls               = get_option("siteurl");
    $raw                = strlen($raw);
    $compressed         = strlen($compressed);
    $savings            = ($raw-$compressed) / $raw * 100;
    $savings            = round($savings, 2); 
    return '<!-- '.PHP_EOL.'- '.THEMES_NAMES.' '.SPACES_THEMES.''.VERSION.' auto minify for '.$urls.' '.date("Y-m-d").' '.PHP_EOL.'- HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes '.PHP_EOL.'- Buy now on '.EXTHEMES_ITEMS_URL.' '.PHP_EOL.'- Demos '.EXTHEMES_DEMOS_URL.' '.PHP_EOL.'- Developer by '.EXTHEMES_API_URL.' '.PHP_EOL.'-->'; 
}

protected function AUTO_HTML_MINIFY_HTMLS($html){
    $pattern        = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
    preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
    $overriding     = false;
    $raw_tag        = false;
    $html           = '';

    foreach ($matches as $token){
    $tag            = (isset($token['tag'])) ? strtolower($token['tag']) : null;
    $content        = $token[0];

    if (is_null($tag)){
    if ( !empty($token['script']) ){
    $strip = $this->exthemes_devs_compress_js;
    }

    else if ( !empty($token['style']) ){
    $strip = $this->exthemes_devs_compress_css;
    }

    else if ($content == '<!--wp-html-compression no compression-->') {
    $overriding = !$overriding; 
    continue;
    }

    else if ($this->exthemes_devs_remove_comments){
    if (!$overriding && $raw_tag != 'textarea'){
    $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
    }
    }
    } else {
    if ($tag == 'pre' || $tag == 'textarea'){
    $raw_tag = $tag;
    }
    else if ($tag == '/pre' || $tag == '/textarea'){
    $raw_tag = false;
    } else {
    if ($raw_tag || $overriding){
    $strip = false;
    } else {
    $strip = true; 
    $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content); 
    $content = str_replace(' />', '/>', $content);
    }
    }
    } 
    if ($strip)
    {
    $content = $this->AUTO_HTML_MINIFY_REMOVE_WHITE_SPACE($content);
    }
    $html .= $content;
    } 
    return $html;
} 

public function AUTO_HTML_MINIFY_PARSE_HTML($html){
    $this->html = $this->AUTO_HTML_MINIFY_HTMLS($html);
    if ($this->exthemes_devs_info_comment){
    $this->html .= "\n" . $this->AUTO_HTML_MINIFY_BOTTOM_COMMENT($html, $this->html);
    }
}

protected function AUTO_HTML_MINIFY_REMOVE_WHITE_SPACE($str){
    $str = str_replace("\t", ' ', $str);
    $str = str_replace("\n",  '', $str);
    $str = str_replace("\r",  '', $str);
    $str = str_replace("// The customizer requires postMessage and CORS (if the site is cross domain).",'',$str);
    while (stristr($str, '  ')){
    $str = str_replace('  ', ' ', $str);
    }   
    return $str;
}
}

function AUTO_HTML_MINIFY_FINISH($html){
    return new AUTO_HTML_MINIFY($html);
}

function AUTO_HTML_MINIFY_START(){
	global $opt_themes;
    $activate       = $opt_themes['minify_active'];
    if (($activate == '1'))
    ob_start('AUTO_HTML_MINIFY_FINISH');
}
add_action('get_header', 'AUTO_HTML_MINIFY_START');
/*-----------------------------------------------------------------------------------*/
/* Disable the Admin Bar. */
function remove_wpadmin(){
global $opt_themes;
$disable_wpadmin        = $opt_themes['disable_wpadmin'];
if (($disable_wpadmin == '1'))
add_filter( 'show_admin_bar', '__return_false' );
} 
add_action( 'init', 'remove_wpadmin' );
/*-----------------------------------------------------------------------------------*/
add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}
/*-----------------------------------------------------------------------------------*/ 
add_filter( 'comment_form_default_fields', 'wc_comment_form_hide_cookies' );
function wc_comment_form_hide_cookies( $fields ) {
	unset( $fields['cookies'] );
	return $fields;
}  