<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disable top navigation via customizer.
$footernav = get_theme_mod( 'gmr_active-footernavigation', 0 );

?>
			</div><!-- .row -->
		</div><!-- .container -->
		<div id="stop-container"></div>
		<?php do_action( 'dlpro_banner_footer' ); ?>
	</div><!-- .gmr-content -->
</div><!-- #site-container -->

<div id="footer-container">

	<?php
	$mod = get_theme_mod( 'gmr_footer_column', '4' );
	if ( '4' === $mod ) {
		$class = 'col-md-3';
	} elseif ( '3' === $mod ) {
		$class = 'col-md-4';
	} elseif ( '2' === $mod ) {
		$class = 'col-md-6';
	} else {
		$class = 'col-md-12';
	}

	if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) :
		?>
		<div id="footer-sidebar" class="widget-area sidebar-layout" role="complementary">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="footer-column <?php echo esc_html( $class ); ?>">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="footer-column <?php echo esc_html( $class ); ?>">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="footer-column <?php echo esc_html( $class ); ?>">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="footer-column <?php echo esc_html( $class ); ?>">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo" <?php dlpro_itemtype_schema( 'WPFooter' ); ?>>

	<?php if ( 0 === $footernav ) : ?>
		<div class="container">
			<div class="gmr-secondmenuwrap clearfix">
				<?php
				// Second top menu.
				if ( has_nav_menu( 'secondary' ) ) {
					?>
					<nav id="site-navigation" class="gmr-secondmenu" role="navigation" <?php echo dlpro_itemtype_schema( 'SiteNavigationElement' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'secondary',
								'container'      => 'ul',
								'fallback_cb'    => '',
								'menu_id'        => 'primary-menu',
								'depth'          => 1,
								'link_before'    => '<span itemprop="name">',
								'link_after'     => '</span>',
							)
						);
						?>
					</nav><!-- #site-navigation -->
					<?php
				}
				?>
				<nav id="site-navigation" class="gmr-social-icon" role="navigation" <?php echo dlpro_itemtype_schema( 'SiteNavigationElement' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
					<ul class="pull-right">
						<?php
						$fb_url = get_theme_mod( 'gmr_fb_url_icon' );
						if ( $fb_url ) :
							echo '<li><a href="' . esc_url( $fb_url ) . '" title="' . esc_html__( 'Facebook', 'dlpro' ) . '" rel="nofollow"><span class="social_facebook"></span></a></li>';
						endif;

						$twitter_url = get_theme_mod( 'gmr_twitter_url_icon' );
						if ( $twitter_url ) :
							echo '<li><a href="' . esc_url( $twitter_url ) . '" title="' . esc_html__( 'Twitter', 'dlpro' ) . '" rel="nofollow"><span class="social_twitter"></span></a></li>';
						endif;

						$pinterest_url = get_theme_mod( 'gmr_pinterest_url_icon' );
						if ( $pinterest_url ) :
							echo '<li><a href="' . esc_url( $pinterest_url ) . '" title="' . esc_html__( 'Pinterest', 'dlpro' ) . '" rel="nofollow"><span class="social_pinterest"></span></a></li>';
						endif;

						$googleplus_url = get_theme_mod( 'gmr_googleplus_url_icon' );
						if ( $googleplus_url ) :
							echo '<li><a href="' . esc_url( $googleplus_url ) . '" title="' . esc_html__( 'Google Plus', 'dlpro' ) . '" rel="nofollow"><span class="social_googleplus"></span></a></li>';
						endif;

						$tumblr_url = get_theme_mod( 'gmr_tumblr_url_icon' );
						if ( $tumblr_url ) :
							echo '<li><a href="' . esc_url( $tumblr_url ) . '" title="' . esc_html__( 'Tumblr', 'dlpro' ) . '" rel="nofollow"><span class="social_tumblr"></span></a></li>';
						endif;

						$stumbleupon_url = get_theme_mod( 'gmr_stumbleupon_url_icon' );
						if ( $stumbleupon_url ) :
							echo '<li><a href="' . esc_url( $stumbleupon_url ) . '" title="' . esc_html__( 'Stumbleupon', 'dlpro' ) . '" rel="nofollow"><span class="social_tumbleupon"></span></a></li>';
						endif;

						$wordpress_url = get_theme_mod( 'gmr_wordpress_url_icon' );
						if ( $wordpress_url ) :
							echo '<li><a href="' . esc_url( $wordpress_url ) . '" title="' . esc_html__( 'WordPress', 'dlpro' ) . '" rel="nofollow"><span class="social_wordpress"></span></a></li>';
						endif;

						$instagram_url = get_theme_mod( 'gmr_instagram_url_icon' );
						if ( $instagram_url ) :
							echo '<li><a href="' . esc_url( $instagram_url ) . '" title="' . esc_html__( 'Instagram', 'dlpro' ) . '" rel="nofollow"><span class="social_instagram"></span></a></li>';
						endif;

						$dribbble_url = get_theme_mod( 'gmr_dribbble_url_icon' );
						if ( $dribbble_url ) :
							echo '<li><a href="' . esc_url( $dribbble_url ) . '" title="' . esc_html__( 'Dribbble', 'dlpro' ) . '" rel="nofollow"><span class="social_dribbble"></span></a></li>';
						endif;

						$vimeo_url = get_theme_mod( 'gmr_vimeo_url_icon' );
						if ( $vimeo_url ) :
							echo '<li><a href="' . esc_url( $vimeo_url ) . '" title="' . esc_html__( 'Vimeo', 'dlpro' ) . '" rel="nofollow"><span class="social_vimeo"></span></a></li>';
						endif;

						$linkedin_url = get_theme_mod( 'gmr_linkedin_url_icon' );
						if ( $linkedin_url ) :
							echo '<li><a href="' . esc_url( $linkedin_url ) . '" title="' . esc_html__( 'Linkedin', 'dlpro' ) . '" rel="nofollow"><span class="social_linkedin"></span></a></li>';
						endif;

						$deviantart_url = get_theme_mod( 'gmr_deviantart_url_icon' );
						if ( $deviantart_url ) :
							echo '<li><a href="' . esc_url( $deviantart_url ) . '" title="' . esc_html__( 'Deviantart', 'dlpro' ) . '" rel="nofollow"><span class="social_deviantart"></span></a></li>';
						endif;

						$myspace_url = get_theme_mod( 'gmr_myspace_url_icon' );
						if ( $myspace_url ) :
							echo '<li><a href="' . esc_url( $myspace_url ) . '" title="' . esc_html__( 'Myspace', 'dlpro' ) . '" rel="nofollow"><span class="social_myspace"></span></a></li>';
						endif;

						$skype_url = get_theme_mod( 'gmr_skype_url_icon' );
						if ( $skype_url ) :
							echo '<li><a href="' . esc_url( $skype_url ) . '" title="' . esc_html__( 'Skype', 'dlpro' ) . '" rel="nofollow"><span class="social_skype"></span></a></li>';
						endif;

						$youtube_url = get_theme_mod( 'gmr_youtube_url_icon' );
						if ( $youtube_url ) :
							echo '<li><a href="' . esc_url( $youtube_url ) . '" title="' . esc_html__( 'Youtube', 'dlpro' ) . '" rel="nofollow"><span class="social_youtube"></span></a></li>';
						endif;

						$picassa_url = get_theme_mod( 'gmr_picassa_url_icon' );
						if ( $picassa_url ) :
							echo '<li><a href="' . esc_url( $picassa_url ) . '" title="' . esc_html__( 'Picassa', 'dlpro' ) . '" rel="nofollow"><span class="social_picassa"></span></a></li>';
						endif;

						$flickr_url = get_theme_mod( 'gmr_flickr_url_icon' );
						if ( $flickr_url ) :
							echo '<li><a href="' . esc_url( $flickr_url ) . '" title="' . esc_html__( 'Flickr', 'dlpro' ) . '" rel="nofollow"><span class="social_flickr"></span></a></li>';
						endif;

						$blogger_url = get_theme_mod( 'gmr_blogger_url_icon' );
						if ( $blogger_url ) :
							echo '<li><a href="' . esc_url( $blogger_url ) . '" title="' . esc_html__( 'Blogger', 'dlpro' ) . '" rel="nofollow"><span class="social_blogger"></span></a></li>';
						endif;

						$spotify_url = get_theme_mod( 'gmr_spotify_url_icon' );
						if ( $spotify_url ) :
							echo '<li><a href="' . esc_url( $spotify_url ) . '" title="' . esc_html__( 'Spotify', 'dlpro' ) . '" rel="nofollow"><span class="social_spotify"></span></a></li>';
						endif;

						$delicious_url = get_theme_mod( 'gmr_delicious_url_icon' );
						if ( $delicious_url ) :
							echo '<li><a href="' . esc_url( $delicious_url ) . '" title="' . esc_html__( 'Delicious', 'dlpro' ) . '" rel="nofollow"><span class="social_delicious"></span></a></li>';
						endif;

						// Disable rss icon via customizer.
						$rssicon = get_theme_mod( 'gmr_active-rssicon', 0 );
						if ( 0 === $rssicon ) :
							echo '<li><a href="' . esc_url( get_bloginfo( 'rss2_url' ) ) . '" title="' . esc_html__( 'RSS', 'dlpro' ) . '" rel="nofollow"><span class="social_rss"></span></a></li>';
						endif;
						?>
					</ul>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	<?php endif; ?>
		<div class="container">
			<div class="site-info">
			<?php
			$copyright = get_theme_mod( 'gmr_copyright' );
			if ( $copyright ) :
				// sanitize html output.
				echo wp_kses_post( $copyright );
			else :
				?>
				<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'Proudly powered by WordPress', 'dlpro' ); ?>"><?php esc_attr_e( 'Proudly powered by WordPress', 'dlpro' ); ?></a>
				<span class="sep"> / </span>
				<a href="<?php echo esc_url( __( 'https://www.idtheme.com/dlpro/', 'dlpro' ) ); ?>" title="<?php /* translators: %s: Dlpro */ printf( esc_html__( 'Theme: %s', 'dlpro' ), 'Dlpro' ); ?>"><?php printf( esc_html__( 'Theme: %s', 'dlpro' ), 'Dlpro' ); ?></a>
			<?php endif; ?>
			</div><!-- .site-info -->
		</div><!-- .container -->

	</footer><!-- #colophon -->

</div><!-- #footer-container -->

<?php do_action( 'dlpro_floating_footer' ); ?>

<?php wp_footer(); ?>

</body>
</html>
