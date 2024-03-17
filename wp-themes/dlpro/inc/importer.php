<?php
/**
 * Importer plugin filter.
 *
 * @link https://wordpress.org/plugins/one-click-demo-import/
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'dlpro_ocdi_import_files' ) ) :
	/**
	 * Set one click import demo data. Plugin require is. https://wordpress.org/plugins/one-click-demo-import/
	 *
	 * @since v.1.0.0
	 * @link https://wordpress.org/plugins/one-click-demo-import/faq/
	 *
	 * @return array
	 */
	function dlpro_ocdi_import_files() {
		$arr = array(
			array(
				'import_file_name'             => 'Demo Import Default Layout',
				'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo-content.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-data/widgets.json',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo-data/customizer.dat',
				'import_preview_image_url'     => 'https://live.staticflickr.com/65535/50329452136_3fcaa78835_o.png',
				'import_notice'                => __( 'Import demo from https://demo.idtheme.com/dlpro/.', 'dlpro' ),
			),
		);
		return $arr;
	}
endif;
add_filter( 'pt-ocdi/import_files', 'dlpro_ocdi_import_files' );

if ( ! function_exists( 'dlpro_ocdi_after_import' ) ) :
	/**
	 * Set action after import demo data. Plugin require is. https://wordpress.org/plugins/one-click-demo-import/
	 *
	 * @param Array $selected_import Import selected.
	 * @since v.1.0.0
	 * @link https://wordpress.org/plugins/one-click-demo-import/faq/
	 *
	 * @return void
	 */
	function dlpro_ocdi_after_import( $selected_import ) {
		// Menus to Import and assign - you can remove or add as many as you want.
		$top_menu    = get_term_by( 'name', 'Top menus', 'nav_menu' );
		$second_menu = get_term_by( 'name', 'Second menus', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary'   => $top_menu->term_id,
				'secondary' => $second_menu->term_id,
			)
		);

	}
endif;
add_action( 'pt-ocdi/after_import', 'dlpro_ocdi_after_import' );

if ( ! function_exists( 'dlpro_change_time_of_single_ajax_call' ) ) :
	/**
	 * Change ajax call timeout
	 *
	 * @link https://github.com/awesomemotive/one-click-demo-import/blob/master/docs/import-problems.md.
	 */
	function dlpro_change_time_of_single_ajax_call() {
		return 60;
	}
endif;
add_action( 'pt-ocdi/time_for_one_ajax_call', 'dlpro_change_time_of_single_ajax_call' );

// disable generation of smaller images (thumbnails) during the content import.
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

// disable the branding notice.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
