<?php
/**
 * Uninstall Dlpro Core plugin and delete all options from database
 *
 * @package Dlpro Core
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

$dpr_other = get_option( 'dpr_other' );

if ( isset( $dpr_other['other_remove_data_when_uninstall'] ) && ! empty( $dpr_other['other_remove_data_when_uninstall'] ) ) {
	// option, section, default.
	$option = $dpr_other['other_remove_data_when_uninstall'];
} else {
	$option = 'off';
}

if ( 'on' === $option ) {

	// Delete option from database.
	delete_option( 'dpr_autbox' );
	delete_option( 'dpr_relpost' );
	delete_option( 'dpr_breadcrumbs' );
	delete_option( 'dpr_ads' );
	delete_option( 'dpr_social' );
	delete_option( 'dpr_ajax' );
	delete_option( 'dpr_other' );
}
