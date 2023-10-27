<?php
/*
Plugin Name: PL EmallShop Extensions
Plugin URI: http://themeforest.net/user/presslayouts
Description: VC Shortcode, Posts, widget and Data Importer for EmallShop eCommerce Theme.
Version: 1.3.2
Author: PressLayouts
Author URI: http://presslayouts.com
Text Domain: pl-emallshop-extensions
*/

// don't load directly
if (!defined('ABSPATH'))
    die('-1');
if ( 'emallshop' !== get_template() ) {
	return;
}

if( !defined( 'ES_EXTENSIONS_VERSION' ) ) {
    define( 'ES_EXTENSIONS_VERSION', '1.3.2' ); // Version of plugin
}

define("ES_EXTENSIONS_PATH", trailingslashit( plugin_dir_path(__FILE__) ) );
define("ES_EXTENSIONS_URL", trailingslashit( plugin_dir_url(__FILE__) ) );
define("ES_ADMIN_ASSETS_URL", ES_EXTENSIONS_URL.'inc/admin/assets' );

// Load Custom Post types
require_once ES_EXTENSIONS_PATH .'posts/posts-content.php';

// Load Custom widget
require_once ES_EXTENSIONS_PATH .'widgets/widgets.php';

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Load plugin text domain
load_plugin_textdomain( 'pl-emallshop-extensions', false, plugin_basename( dirname( __FILE__ ) ) . "/languages" );

if ( !class_exists ( 'ReduxFramework' ) && file_exists ( ES_EXTENSIONS_PATH.'inc/admin/redux-core/framework.php' ) ) {
    require_once ( ES_EXTENSIONS_PATH .'inc/admin/redux-core/framework.php' );
} 

if ( !class_exists ( 'RWMB_Loader' ) && file_exists ( ES_EXTENSIONS_PATH.'inc/admin/meta-box/meta-box.php' ) ) {
    require_once ( ES_EXTENSIONS_PATH.'inc/admin/meta-box/meta-box.php' );
	require_once ES_EXTENSIONS_PATH .'inc/admin/custom-field-image-set.php';
	require_once ES_EXTENSIONS_PATH .'inc/admin/custom-field-select-group.php';
} 

// Load Wordpress Importer plugin
require_once ES_EXTENSIONS_PATH .'inc/admin/import.php';

// Load Cookie
require_once ES_EXTENSIONS_PATH .'inc/cookie-notice.php';
require_once ES_EXTENSIONS_PATH .'inc/functions.php';

/**
 * Initialising Visual Composer
 */ 
if ( class_exists( 'Vc_Manager', false ) ) {
	require_once ES_EXTENSIONS_PATH . 'js_composer/visual-composer.php';
}

function pl_emallshop_excerpt_length( $length ) {
	return 20;
}
							
/* 	Get Social share
/* --------------------------------------------------------------------- */
if( ! function_exists( 'emallshop_single_sharing' ) ) {
	function emallshop_single_sharing() {
		if( !emallshop_get_option('show-social-sharing', 1) || !is_single() ) return; 
		
		global $post;		
		$post_link	= esc_url( get_permalink() );
		$post_title = wp_strip_all_tags( get_the_title() );		
		$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );
		if( !isset($src[0]) ){
			$src = array( 0 => '' );
		}
		?>
		
		<div class="social-share <?php echo emallshop_get_option( 'social-sharing-style', 'style-1' ); ?>">	
			<?php $post_title = htmlspecialchars( urlencode(html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ); ?>
			<ul class="social-link">	
				<?php if( emallshop_get_option( 'social-share-fb', 1 ) ): ?>
					<li class="icon-facebook"><a title="<?php echo esc_html__( 'Share on Facebook', 'pl-emallshop-extensions' ); ?>" href="//www.facebook.com/sharer.php?u=<?php echo esc_url( $post_link ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-facebook"></i>
					</a></li>
				<?php endif; ?>	
				<?php if( emallshop_get_option( 'social-share-tw', 1 ) ): ?>
					<li class="icon-twitter"><a title="<?php echo esc_html__( 'Share on Twitter', 'pl-emallshop-extensions' ); ?>" href="//twitter.com/share?url=<?php echo esc_url( $post_link ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-twitter"></i>
					</a></li>
				<?php endif; ?>
				<?php if( emallshop_get_option( 'social-share-in', 1 ) ): ?>
					<li  class="icon-linkedin"><a title="<?php echo esc_html__( 'Share on LinkedIn', 'pl-emallshop-extensions' ); ?>" href="//www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( $post_link ); ?>&title=<?php echo esc_attr( $post_title ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-linkedin"></i>
					</a></li>
				<?php endif; ?>	
				<?php if( emallshop_get_option( 'social-share-tg', 1 ) ): ?>
					<li  class="icon-telegram"><a title="<?php echo esc_html__( 'Share on Telegram', 'pl-emallshop-extensions' ); ?>" href="https://telegram.me/share/url?url='<?php echo esc_url( $post_link ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-telegram"></i>
					</a></li>
				<?php endif; ?>	
				<?php if( emallshop_get_option( 'social-share-pr', 1 ) ): ?>
					<li  class="icon-pinterest"><a title="<?php echo esc_html__( 'Share on Pinterest', 'pl-emallshop-extensions' ); ?>" href="//pinterest.com/pin/create/button/?url=<?php echo esc_url( $post_link ); ?>&media=<?php echo esc_url( $src[0] ); ?>&description=<?php echo esc_attr( $post_title ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-pinterest"></i>
					</a></li>
				<?php endif; ?>
				<?php if( emallshop_get_option( 'social-share-sl', 0 ) ): ?>
					<li  class="icon-submit"><a title="<?php echo esc_html__( 'Share on Stumbleupon', 'pl-emallshop-extensions' ); ?>" href="//www.stumbleupon.com/submit?url=<?php echo esc_url( $post_link ); ?>&title=<?php echo esc_attr( $post_title ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-stumbleupon"></i>
					</a></li>
				<?php endif; ?>
				
				<?php if( emallshop_get_option( 'social-share-tl', 0 ) ): ?>
					<li  class="icon-tumblr"><a title="<?php echo esc_html__( 'Share on Tumblr', 'pl-emallshop-extensions' ); ?>" href="//tumblr.com/widgets/share/tool?canonicalUrl=<?php echo esc_url( $post_link ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-tumblr"></i>
					</a>
				<?php endif; ?>
				<?php if( emallshop_get_option( 'social-share-ri', 0 ) ): ?>
					<li  class="icon-reddit"><a title="<?php echo esc_html__( 'Share on Reddit', 'pl-emallshop-extensions' ); ?>" href="https://reddit.com/submit?url=<?php echo esc_url( $post_link ); ?>&amp;title=<?php echo esc_attr( $post_title ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-reddit"></i>
					</a>
				<?php endif; ?>
				
				<?php if( emallshop_get_option( 'social-share-vk', 0 ) ): ?>
					<li  class="icon-vk"><a title="<?php echo esc_html__( 'Share on VK', 'pl-emallshop-extensions' ); ?>" href="https://vk.com/share.php?url=<?php echo esc_attr( $post_title ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-vk"></i>
					</a>
				<?php endif; ?>
				<?php if( emallshop_get_option( 'social-share-ol', 0 ) ): ?>
					<li  class="icon-odnoklassniki"><a title="<?php echo esc_html__( 'Share on Odnoklassniki', 'pl-emallshop-extensions' ); ?>" href="https://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?php echo esc_url( $post_link ); ?>&amp;description=<?php echo esc_url( $post_title ); ?>&amp;media=<?php echo esc_url( $src[0] ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-odnoklassniki"></i>
					</a>
				<?php endif; ?>
				<?php if( emallshop_get_option( 'social-share-pt', 0 ) ): ?>
					<li  class="icon-pocket"><a title="<?php echo esc_html__( 'Share on Pocket', 'pl-emallshop-extensions' ); ?>" href="https://getpocket.com/save?title=<?php echo esc_attr( $post_title ); ?>&amp;url=<?php echo esc_url( $post_link ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-get-pocket"></i>
					</a>
				<?php endif; ?>
				<?php if( emallshop_get_option( 'social-share-wa', 0 ) ): ?>
					<li  class="icon-whatsapp"><a title="<?php echo esc_html__( 'Share on WhatsApp', 'pl-emallshop-extensions' ); ?>" href="https://wa.me/?text=<?php echo esc_url( $post_link ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-whatsapp"></i>
					</a>
				<?php endif; ?>
				<?php if( emallshop_get_option( 'social-share-em', 0 ) ): ?>
					<li  class="icon-email"><a title="<?php echo esc_html__( 'Share on Email', 'pl-emallshop-extensions' ); ?>" href="mailto:?subject=<?php echo esc_attr( $post_title ); ?>&amp;body=<?php echo esc_url( $post_link ); ?>" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
						<i class="fa fa-envelope"></i>
					</a>
				<?php endif; ?>
				
			</ul>
		</div>
		<div class="clear"></div> 
	<?php }
}