<?php
/**
 * Template for displaying customizer import form.
 *
 * @package soledad
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

ob_start();
?>

<form action="" method="post" class="customizer-import-form" enctype="multipart/form-data">
	<input type="hidden" name="action" value="customizer_import">
	<?php wp_nonce_field( 'customizer-import', 'nonce' ); ?>
	<div class="fields">
		<div class="field left-field">
			<label class="label" for="customizer_import_file">
				<?php _e( 'Select JSON file to import.', 'soledad' ); ?>
			</label>
			<div class="control">
				<input type="file" id="customizer_import_file" name="customizer_import_file" class="customizer-import-file" accept="application/json">
			</div>
		</div>
		<div class="field right-field">
			<div class="control">
				<button class="button button-primary"><?php _e( 'Import', 'soledad' ); ?></button>
			</div>
		</div>
	</div>
	<span class="close dashicons dashicons-no-alt"></span>
</form>

<?php
$customizer_import_form = ob_get_clean();
