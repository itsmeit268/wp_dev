<?php
/**
 * Setup customizer reset.
 *
 * @package soledad
 */

namespace SoledadCustomizerTools;

use SoledadCustomizerTools\Helpers\Export;
use SoledadCustomizerTools\Helpers\Import;

/**
 * Setup customizer reset.
 */
class Setup {
	/**
	 * Setup action & filter hooks.
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_register', array( $this, 'export' ) );
		add_action( 'customize_register', array( $this, 'import' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'customize_controls_print_scripts', array( $this, 'controls_print_scripts' ) );
		add_action( 'wp_ajax_customizer_reset', array( $this, 'handle_ajax' ) );
	}

	/**
	 * Store a reference to `WP_Customize_Manager` instance
	 *
	 * @param object $wp_customize `WP_Customize_Manager` instance.
	 */
	public function customize_register( $wp_customize ) {
		$this->wp_customize = $wp_customize;
	}

	/**
	 * Enqueue assets.
	 */
	public function enqueue_scripts() {
		global $wp;

		// CSS.
		wp_enqueue_style( 'customizer-tools', get_template_directory_uri() . '/inc/customizer/customizer-tools/assets/css/customizer-reset.css', array(), PENCI_SOLEDAD_VERSION );

		// JS.
		wp_enqueue_script( 'customizer-tools', get_template_directory_uri() . '/inc/customizer/customizer-tools/assets/js/customizer-reset.js', array( 'jquery' ), PENCI_SOLEDAD_VERSION, true );

		// Require the customizer import form.
		require __DIR__ . '/templates/import-form.php';

		wp_localize_script(
			'customizer-tools',
			'customizerResetObj',
			array(
				'buttons'       => array(
					'reset'  => array(
						'text' => __( 'Reset All', 'soledad' ),
					),
					'export' => array(
						'text' => __( 'Export', 'soledad' ),
					),
					'import' => array(
						'text' => __( 'Import', 'soledad' ),
					),
				),
				'dialogs'       => array(
					'resetWarning'  => __( "Caution! Proceeding will erase all customizations made for this theme through the WordPress customizer.", 'soledad' ),
					'importWarning' => __( 'Caution! Using the import tool will overwrite your current customizer data. To save your current customizations, export them prior to importing new data.', 'soledad' ),
					'emptyImport'   => __( 'Please select a file to import.', 'soledad' ),
				),
				'importForm'    => array(
					'templates' => $customizer_import_form,
				),
				'customizerUrl' => admin_url( 'customize.php' ),
				'pluginUrl'     => get_template_directory_uri() . '/inc/customizer/customizer-tools/',
				'currentUrl'    => home_url( $wp->request ),
				'nonces'        => array(
					'reset'  => wp_create_nonce( 'customizer-reset' ),
					'export' => wp_create_nonce( 'customizer-export' ),
				),
			)
		);
	}

	/**
	 * Handle ajax request of customizer reset.
	 */
	public function handle_ajax() {
		if ( ! $this->wp_customize->is_preview() ) {
			wp_send_json_error( 'not_preview' );
		}

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'customizer-reset' ) ) {
			wp_send_json_error( 'invalid_nonce' );
		}

		$this->reset_customizer();
		wp_send_json_success();
	}

	/**
	 * Reset customizer.
	 */
	public function reset_customizer() {
		$theme_slug = get_option( 'stylesheet' );
		delete_option( "theme_mods_$theme_slug" );
	}

	/**
	 * Setup customizer export.
	 */
	public function export() {
		if ( ! is_customize_preview() ) {
			return;
		}

		if ( ! isset( $_GET['action'] ) || 'customizer_export' !== $_GET['action'] ) {
			return;
		}

		if ( ! isset( $_GET['nonce'] ) || ! wp_verify_nonce( $_GET['nonce'], 'customizer-export' ) ) {
			return;
		}

		$exporter = new Export( $this->wp_customize );

		$exporter->export();
	}

	/**
	 * Setup customizer import.
	 */
	public function import() {
		if ( ! is_customize_preview() ) {
			return;
		}

		if ( ! isset( $_POST['action'] ) || 'customizer_import' !== $_POST['action'] ) {
			return;
		}

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'customizer-import' ) ) {
			return;
		}

		require_once __DIR__ . '/helpers/class-customizer-setting.php';

		$importer = new Import();

		$importer->import();
	}

	/**
	 * Prints scripts for the control.
	 */
	public function controls_print_scripts() {
		global $customizer_reset_error;

		if ( $customizer_reset_error ) {
			echo '<script> alert("' . $customizer_reset_error . '"); </script>';
		}
	}
}
