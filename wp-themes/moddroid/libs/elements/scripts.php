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
if ( ! defined( 'ABSPATH' ) ) exit; 
function bootstrap() {
    wp_enqueue_script( 'moddroid-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, false);
}
add_action('wp_enqueue_scripts', 'bootstrap', 999 );

function bootstrap_alt() {
    wp_enqueue_script( 'moddroid-bootstrap-alt', get_template_directory_uri() . '/assets/js/bootstrap.min.alt.js', array('jquery'), null, false);
}
add_action('wp_enqueue_scripts', 'bootstrap_alt', 999 );

function site() {
    wp_enqueue_script( 'moddroid-site', get_template_directory_uri() . '/assets/js/site.js', array('jquery'), null, false);
}
add_action('wp_enqueue_scripts', 'site', 999 ); 
  
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\

add_action( 'wp_footer', function () { ?>
<script>
function init() {
   var vidDefer = document.getElementsByTagName('iframe');
   for (var i = 0; i < vidDefer.length; i++) {
      if (vidDefer[i].getAttribute('data-src')) {
         vidDefer[i].setAttribute('src', vidDefer[i].getAttribute('data-src'));
      }
   }
}
window.onload = init;
</script>
<?php } );

function defer_parsing_of_js($url) {
   if (is_user_logged_in()) return $url; //don't break WP Admin
   if (FALSE === strpos($url, '.js')) return $url;
   if (strpos($url, 'jquery.js')) return $url;
   return str_replace(' src', ' defer src', $url);
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );