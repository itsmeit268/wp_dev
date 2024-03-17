<?php
/**
 * Plugin Name: Dlpro Core
 * Plugin URI: http://www.idtheme.com/dlpro/
 * Description: Dlpro Core - Add functionally to download wp theme for easy maintenance. This plugin using only for theme with download theme from idtheme.com
 * Author: Gian Mokhammad R
 *
 * @package Dlpro Core
 * Version: 1.0.1
 * Author URI: http://www.gianmr.com
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'Dlpro_Core_Init' ) ) {
	/**
	 * Main Plugin Class
	 */
	class Dlpro_Core_Init {

		/**
		 * Contract
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function __construct() {
			// Define.
			define( 'DLPRO_CORE_VER', '1.0.1' );
			define( 'DLPRO_CORE_DIRNAME', plugin_dir_path( __FILE__ ) );
			define( 'DLPRO_CORE_URL', plugin_dir_url( __FILE__ ) );

			// this is the URL our updater / license checker pings. This should be the URL of the site.
			define( 'DLPRO_API_URL_CHECK', 'https://member.kentooz.com/softsale/api/check-license' );
			define( 'DLPRO_API_URL', 'https://member.kentooz.com/softsale/api/activate' );
			define( 'DLPRO_API_URL_DEACTIVATED', 'https://member.kentooz.com/softsale/api/deactivate' );

			// the name of the settings page for the license input to be displayed.
			define( 'DLPRO_PLUGIN_LICENSE_PAGE', 'dlpro-license' );

			// Include Apps Custom.
			include_once DLPRO_CORE_DIRNAME . 'lib/apps/apps.php';

			// Include Custom Post type.
			include_once DLPRO_CORE_DIRNAME . 'lib/blog/blog.cpt.php';

			// Include Shortcode.
			include_once DLPRO_CORE_DIRNAME . 'lib/shortcode.php';

			// Include Amember HTTP API
			// Load only if dashboard.
			if ( is_admin() ) {
				include_once DLPRO_CORE_DIRNAME . 'lib/lcs.php';
			}

			// Action.
			add_action( 'plugins_loaded', array( $this, 'dlpro_core_load_textdomain' ) );

			// Other functionally.
			include_once DLPRO_CORE_DIRNAME . 'lib/update/plugin-update-checker.php';
			$MyUpdateChecker = PucFactory::buildUpdateChecker(
				'https://kentooz.my.id/files/dlpro/dlpro-from-idthemes-download-niches.json',
				__FILE__,
				'dlpro-core'
			);

		}

		/**
		 * Activated plugin
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public static function dlpro_core_activate() {
			flush_rewrite_rules();
		}

		/**
		 * Deativated plugin
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public static function dlpro_core_deactivate() {
			flush_rewrite_rules();
		}

		/**
		 * Load languange
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function dlpro_core_load_textdomain() {
			load_plugin_textdomain( 'dlpro-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
	}
}

if ( class_exists( 'Dlpro_Core_Init' ) ) {
	// Installation and uninstallation hooks.
	register_activation_hook( __FILE__, array( 'Dlpro_Core_Init', 'dlpro_core_activate' ) );
	register_deactivation_hook( __FILE__, array( 'Dlpro_Core_Init', 'dlpro_core_deactivate' ) );

	// Initialise Class.
	$dlpro_core_init_by_gianmr = new Dlpro_Core_Init();
}
