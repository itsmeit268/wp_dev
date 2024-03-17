<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package  Dlpro = Null by PHPCORE
                                                                                                                          

  _   _ _   _ _     _       ______   __    
 | \ | | | | | |   | |     | __ ) \ / /  _ 
 |  \| | | | | |   | |     |  _ \\ V /  (_)
 | |\  | |_| | |___| |___  | |_) || |    _ 
 |_| \_|\___/|_____|_____| |____/ |_|   (_)
  ____  _   _ ____   ____ ___  ____  _____ 
 |  _ \| | | |  _ \ / ___/ _ \|  _ \| ____|
 | |_) | |_| | |_) | |  | | | | |_) |  _|  
 |  __/|  _  |  __/| |__| |_| |  _ <| |___ 
 |_|   |_| |_|_|    \____\___/|_| \_\_____|
                                           

 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php echo dlpro_itemtype_schema( 'WebSite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php echo dlpro_itemtype_schema( 'WebPage' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'dlpro' ); ?></a>

<header id="masthead" class="site-header" role="banner" <?php echo dlpro_itemtype_schema( 'WPHeader' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

	<div class="clearfix gmr-headwrapper">
		<div class="container">
			<?php
			echo '<div class="gmr-list-table">';
			echo '<div class="gmr-table-row">';

			echo '<div class="close-topnavmenu-wrap"><a id="close-topnavmenu-button" rel="nofollow" href="#"><span class="icon_close_alt2"></span></a></div>';

			echo '<div class="gmr-table-cell gmr-logo">';
				echo '<div class="logo-wrap">';
				// if get value from customizer gmr_logoimage.
				$setting = 'gmr_logoimage';
				$mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

				if ( $mod ) {
					// get url image from value gmr_logoimage.
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-logo-link" title="' . esc_html( get_bloginfo( 'name' ) ) . '">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '<img src="' . esc_url_raw( $mod ) . '" alt="' . esc_html( get_bloginfo( 'name' ) ) . '" title="' . esc_html( get_bloginfo( 'name' ) ) . '" />'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '</a>';

				} else {
					// if get value from customizer blogname.
					if ( get_theme_mod( 'blogname', get_bloginfo( 'name' ) ) ) {
						echo '<div class="site-title">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_html( get_theme_mod( 'blogname', get_bloginfo( 'name' ) ) ) . '">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo esc_html( get_theme_mod( 'blogname', get_bloginfo( 'name' ) ) );
						echo '</a>';
						echo '</div>';

					}
					// if get value from customizer blogdescription.
					if ( get_theme_mod( 'blogdescription', get_bloginfo( 'description' ) ) ) {
						echo '<span class="site-description">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo esc_html( get_theme_mod( 'blogdescription', get_bloginfo( 'description' ) ) );
						echo '</span>';
					}
				}
				echo '</div>';
			echo '</div>';
			
			echo '<div class="gmr-table-cell onlymobile-menu">';
				if ( class_exists( 'WooCommerce' ) ) {
					do_action( 'gmr_wp_cart_items' );
				}
				echo '<a id="gmr-responsive-menu" href="#menus" rel="nofollow" title="' . __( 'Mobile Menu', 'dlpro' ) . '"><span class="icon_menu"></span><span class="screen-reader-text">' . __( 'Mobile Menu', 'dlpro' ) . '</span></a>';
			echo '</div>';

			echo '<div class="gmr-table-cell gmr-search-wrap">';
				echo '<div class="gmr-search pull-right">';
					echo '<form method="get" class="gmr-searchform searchform" action="' . esc_url( home_url( '/' ) ) . '">';
						echo '<input type="text" name="s" id="s" placeholder="' . esc_html__( 'Find Softwares', 'dlpro' ) . '" />';
						echo '<input type="hidden" name="post_type[]" value="post">';
						echo '<button type="submit" class="gmr-search-submit"><span class="icon_search"></span></button>';
					echo '</form>';
				echo '</div>';
			echo '</div>';
			
			if ( class_exists( 'WooCommerce' ) ) {
				echo '<div class="gmr-table-cell cart-menu onlydesktop-content">';
				echo '<div class="pull-right">';
				do_action( 'gmr_wp_cart_items' );
				echo '</div>';
				echo '</div>';
			}

			echo '</div>';
			echo '</div>';
			?>
		</div>
	</div>

	<div class="top-header">
		<div class="gmr-menuwrap clearfix">
			<div class="container">
				<nav id="site-navigation" class="gmr-mainmenu" role="navigation" <?php echo dlpro_itemtype_schema( 'SiteNavigationElement' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => 'ul',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</div><!-- .top-header -->

</header><!-- #masthead -->

<?php do_action( 'dlpro_floating_banner_left' ); ?>
<?php do_action( 'dlpro_floating_banner_right' ); ?>

<?php
$mod   = get_theme_mod( 'gmr_notif_marquee', 'recentpost' );
$notif = get_theme_mod( 'gmr_textnotif' );


if ( 'disable' !== $mod ) {
	if ( 'recentpost' === $mod ) {
		echo '<div class="container">';
			echo '<div class="gmr-topnotification">';
				echo '<div class="wrap-marquee">';
					$textmarquee = get_theme_mod( 'gmr_textmarquee' );
					echo '<div class="text-marquee">';
					if ( $textmarquee ) :
						/* sanitize html output */
						echo esc_html( $textmarquee );
					else :
						echo esc_html__( 'Features App:', 'dlpro' );
					endif;
					echo '</div>';
					echo '<span class="marquee">';
					do_action( 'dlpro_recentpost_marque' );
					echo '</span>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	} else {
		if ( isset( $notif ) && ! empty( $notif ) ) {
			echo '<div class="container">';
				echo '<div class="gmr-topnotification">';
					echo '<div class="wrap-marquee">';
					$textmarquee = get_theme_mod( 'gmr_textmarquee' );
						echo '<div class="text-marquee">';
						if ( $textmarquee ) :
							/* sanitize html output */
							echo esc_html( $textmarquee );
						else :
							echo esc_html__( 'Features App:', 'dlpro' );
						endif;
						echo '</div>';
						echo '<span class="marquee">';
						echo do_shortcode( $notif );
						echo '</span>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	}
}
?>

<div class="site inner-wrap" id="site-container">

	<div id="content" class="gmr-content">
		<?php do_action( 'dlpro_top_banner_after_menu' ); ?>
		<div class="container">
			<div class="row">
