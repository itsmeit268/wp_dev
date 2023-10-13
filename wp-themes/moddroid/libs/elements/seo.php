<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/
function ex_themes_auto_seo_() {
global $post, $paged, $opt_themes;

$seo_activate			= $opt_themes['ex_themes_activate_seo_'];
$json_seo_activate		= $opt_themes['ex_themes_activate_seox'];
$metaweb_activate		= $opt_themes['aktif_webmaster'];
$google					= $opt_themes['google_verif'];
$bing					= $opt_themes['bing_verif'];
$yandex					= $opt_themes['yandex_verif'];
$pinterest				= $opt_themes['pinterest_verif'];
$baidu					= $opt_themes['baidu_verif'];
 
$blogname				= get_option("blogname");
$siteurls				= get_option("siteurl");
$blogemail				= get_option("admin_email");
$blogdesc				= get_option("blogdescription");
$sitelangs				= get_bloginfo("language");
$no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];
if ( get_previous_posts_link() ) {
    echo '<link rel="prev" href="'.get_pagenum_link( $paged - 1 ).'" />'. "\n";
}
if ( get_next_posts_link() ) {
    echo '<link rel="next" href="'.get_pagenum_link( $paged + 1 ).'" />'. "\n";
}
if($seo_activate){ 
echo PHP_EOL .'<!-- '.THEMES_NAMES.' '.SPACES_THEMES.''.VERSION.' SEO Meta Keywords Generator for '.$siteurls.' @'.date("Y").', Buy on '.EXTHEMES_ITEMS_URL.' start -->'.PHP_EOL;
}
echo '<!-- Theme Designer -->'.PHP_EOL;
echo '<meta name="designer" content="'.EXTHEMES_AUTHOR.'" />'.PHP_EOL;
echo '<meta name="themes" content="'.THEMES_NAMES.'" />'.PHP_EOL;
echo '<meta name="version" content="'.VERSION.'" />'.PHP_EOL; 

if (is_home() || is_front_page()) {
if($seo_activate){
echo '<!-- Theme Robots Search -->'.PHP_EOL;
echo '<meta name="robots" content="index, follow" />'.PHP_EOL;
echo '<meta name="googlebot" content="index">'.PHP_EOL;
echo '<meta name="googlebot-news" content="snippet">'.PHP_EOL;
echo '<meta property="og:type" content="website">'.PHP_EOL;
echo '<meta property="og:site_name" content="'.$blogname.'">'.PHP_EOL;
echo '<meta property="og:url" content="'.$siteurls.'">'.PHP_EOL;
echo '<meta property="og:title" content="' . trim($blogname) . ' - ' . trim($blogdesc) . '">'.PHP_EOL;
echo '<meta property="og:description" content="' . trim($blogname) . ' - ' . trim($blogdesc) . '">'.PHP_EOL;
echo '<meta name="twitter:card" content="summary_large_image">'.PHP_EOL;
echo '<meta name="twitter:title" content="' . trim($blogname) . ' - ' . trim($blogdesc) . '">'.PHP_EOL;
echo '<meta name="twitter:description" content="' . trim($blogname) . ' - ' . trim($blogdesc) . '">'.PHP_EOL;
echo '<meta property="og:locale" content="'.$sitelangs.'">'.PHP_EOL; 
//echo '<meta name="twitter:image" content="'.$no_images.'" />'.PHP_EOL;
//echo '<meta name="image" property="og:image" content="'.$no_images.'" />'.PHP_EOL;
}
//echo " ";
} elseif (is_single() || is_page()) {

global $wpdb, $post, $opt_themes;
$appname_on				= $opt_themes['ex_themes_title_appname'];  
if($appname_on) {  
$title					= ucwords(get_post_meta( $post->ID, 'wp_title_GP', true ));
} else { 
$title					= get_the_title();
}
 
$postid					= get_query_var("p");
$post					= get_post($postid);
$title_alt_2			= single_post_title('',false);
$post_url				= wp_get_canonical_url( $post );
$post_id				= get_the_ID();
$urlimagesnya			= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
$thumb_id				= get_post_thumbnail_id( $post->ID );
if ( '' != $thumb_id ) {
$thumb_url				= wp_get_attachment_image_src( $thumb_id, 'full', true );
	$imageXe			= $thumb_url[0];
} else {
	$imageXe			= $defaults_no_images;
}

$authorurl				= get_author_posts_url( $post->post_author );
$author_id				= get_post_field( 'post_author', $post );
$author_name			= get_the_author_meta('user_nicename', $author_id);
$datePublished			= mysql2date( DATE_W3C, $post->post_date_gmt, false );
$dateModified			= mysql2date( DATE_W3C, $post->post_modified_gmt, false );
 
$tags_postsx			= '';
$taglist				= get_the_tags($post->ID);
if ($taglist) { 
foreach ($taglist as $taglist) {	
	$tags_postsx		.= $taglist->name.', ';
}
$tags_posts				=  substr($tags_postsx, 0, -1);
} else { 
$cats_str				= '';
$category_detail		= get_the_category($post->ID);
    foreach ($category_detail as $cats) {
        $cats_str 		.= $cats->cat_name . ', ';
}
$categories_post		=  substr($cats_str, 0, -1);
}
$desc_blog_post			= trim(strip_tags( get_post()->post_content ));
 
$des_post				= preg_replace('~[\r\n]+~', '', $desc_blog_post);
$des_post				= str_replace('"', '', $des_post);
$des_post				= mb_substr( $des_post, 0, 200, 'utf8' );
if($seo_activate){
echo '<meta name="description" content="' . strip_tags($des_post) . '" />'.PHP_EOL;
if($taglist){
echo '<meta name="keywords" content="'.$tags_posts.'" />'.PHP_EOL; 
}
?>
<meta name="robots" content="max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<?php 
echo '<!-- open graph facebook -->'.PHP_EOL;
echo '<meta property="og:type" content="article" />'.PHP_EOL;
echo '<meta property="og:locale" content="'.$sitelangs.'" />'.PHP_EOL;
echo '<meta property="og:locale:alternate" content="'.$sitelangs.'" />'.PHP_EOL;
echo '<meta property="og:locale:alternate" content="'.$sitelangs.'" />'.PHP_EOL;
echo '<meta property="og:title" content="'.$title.'" />'.PHP_EOL;
echo '<meta property="og:image:alt" content="'.$title.'" />'.PHP_EOL;
echo '<meta property="og:site_name" content="'.$blogname.'" />'.PHP_EOL;
echo '<meta name="image" property="og:image" content="'.$imageXe.'" />'.PHP_EOL;
echo '<meta property="og:description" content="'.$des_post.'" />'.PHP_EOL;
if($taglist){
echo '<meta property="article:tag" content="'.$tags_posts.'" />'.PHP_EOL;
}
echo '<meta property="og:url" content="'.$post_url.'" />'.PHP_EOL;
echo '<meta property="article:author" content="'.$author_name.'" />'.PHP_EOL;
echo '<meta property="article:author" content="'.$authorurl.'" />'.PHP_EOL;
echo '<meta property="article:publisher" content="'.$authorurl.'" />'.PHP_EOL;
echo '<meta property="article:published_time" content="'.$datePublished.'" />'.PHP_EOL;
echo '<meta property="article:modified_time" content="'.$dateModified.'" />'.PHP_EOL;
echo '<meta property="og:updated_time" content="'.$dateModified.'" />'.PHP_EOL;
echo '<meta property="og:image:secure_url" content="'.$imageXe.'" />'.PHP_EOL;
echo '<!-- end open graph facebook -->'.PHP_EOL;
echo '<!-- open graph twitter -->'.PHP_EOL;
echo '<meta name="twitter:card" content="summary" />'.PHP_EOL;
echo '<meta name="twitter:site" content="'.$post_url.'" />'.PHP_EOL;
echo '<meta name="twitter:domain" content="'.$post_url.'" />'.PHP_EOL;
echo '<meta name="twitter:title" content="'.$title.'" />'.PHP_EOL;
echo '<meta name="twitter:description" content="'.$des_post.'" />'.PHP_EOL;
echo '<meta name="twitter:image" content="'.$imageXe.'" />'.PHP_EOL;
echo '<!-- end open graph twitter -->'.PHP_EOL;
}
if($json_seo_activate){ ?>
<!--- Theme json schema seo --->
<script type='application/ld+json'>{"@context": "http://schema.org","@type": "BlogPosting","mainEntityOfPage": {"@type": "WebPage","@id": "<?php echo $post_url; ?>"},"headline": "<?php echo $title; ?>","description": "<?php echo $des_post; ?>","datePublished": "<?php echo $datePublished; ?>","dateModified": "<?php echo $dateModified; ?>","image": {"@type": "ImageObject","url": "<?php echo $imageXe; ?>","height": 348,"width": 1200},"publisher": {"@type": "Organization","name": "<?php echo $author_name; ?>","logo": {"@type": "ImageObject","url": "<?php echo $imageXe; ?>","width": 206,"height": 60 }},"author": {"@type": "Person","name": "<?php echo $author_name; ?>","url": "<?php echo $authorurl; ?>"}}</script>
<?php }
} elseif (is_search() || is_archive() || is_404() || is_tag() || is_author() || is_404() || is_attachment()) {
echo "";
} 
?>

<!-- Theme Wordpress Rss -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />  
<?php if (is_home() || is_front_page()) {?>
<link rel="canonical" href="<?php echo esc_url( home_url( '/' ) ); ?>" /> 
<?php } else { if (is_single() || is_page() ) { ?>
<link rel="canonical" href="<?php echo get_permalink(); ?>" /> 
<?php } } if (is_archive()){
global $wp;
$current_url = home_url( $wp->request ) . '/';
?>
<link rel="canonical" href="<?php echo $current_url; ?>" /> 
<?php } 

if($metaweb_activate) { ?>
<!-- Theme Sife Verification -->
<?php if($google) { ?><meta name="google-site-verification" content="<?php echo $google; ?>" /><?php } ?>
<?php if($bing) { ?><meta name="msvalidate.01" content="<?php echo $bing; ?>" /><?php } ?>
<?php if($yandex) { ?><meta name="yandex-verification" content="<?php echo $yandex; ?>" /><?php } ?>
<?php if($pinterest) { ?><meta name="p:domain_verify" content="<?php echo $pinterest; ?>"/><?php } ?>
<?php if($baidu) { ?><meta name="baidu-site-verification" content="<?php echo $baidu; ?>" /><?php } ?>
<!-- Theme Webmaster Tool Verification by <?php echo EXTHEMES_AUTHOR; ?> -->
<?php }

if($json_seo_activate){ ?>
<!--- Theme json schema seo --->
<script type="application/ld+json">{"@context": "https://schema.org","@type": "Organization","url": "<?php echo  $siteurls; ?>","logo": "<?php echo $no_images;  ?>","sameAs": ["<?php echo $opt_themes['facebook_urls']; ?>","<?php echo $opt_themes['twitter_urls']; ?>","<?php echo $opt_themes['instagram_urls']; ?>","<?php echo $opt_themes['youtube_urls']; ?>","<?php echo $opt_themes['telegram_url']; ?>"]}</script>
<script type='application/ld+json'>{"@context": "https://schema.org","@type": "WebSite","url": "<?php echo  $siteurls; ?>","name": "<?php echo $blogname; ?>","alternateName": "<?php echo $blogname; ?>","potentialAction": {"@type": "SearchAction","target": "<?php echo esc_url( home_url( '/' ) ); ?>?s={search_term_string}&max-results=10","query-input": "required name=search_term_string"}}</script>
<?php }

if($seo_activate){
echo PHP_EOL .'<meta http-equiv="copyright @'.date("Y").' '.$blogemail.'" content="' . strip_tags($blogname) . ' - '.$siteurls.' @'.date("Y").'">'.PHP_EOL;
echo '<!-- '.THEMES_NAMES.' '.SPACES_THEMES.''.VERSION.' SEO Meta Keywords Generator for '.$siteurls.' @'.date("Y").', Buy on '.EXTHEMES_ITEMS_URL.' end -->'.PHP_EOL;
}

echo '<!-- '.PHP_EOL.'- '.$siteurls.' using '.THEMES_NAMES.' '.SPACES_THEMES.''.VERSION.' '.PHP_EOL.'- Buy now on '.EXTHEMES_ITEMS_URL.' '.PHP_EOL.'- Designer and Developer by '.EXTHEMES_AUTHOR.' '.PHP_EOL.'- More Premium Themes Visit Now On '.EXTHEMES_API_URL.' '.PHP_EOL.'-->'.PHP_EOL;
} 
add_action( 'wp_head', 'ex_themes_auto_seo_', 0 ); 
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\