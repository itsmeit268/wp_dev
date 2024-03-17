<?php
/**
 * Add Simple Metaboxes Settings
 *
 * Author: Gian MR - http://www.gianmr.com
 *
 * @since 1.0.0
 * @package Dlpro Core
 */

/**
 * Register a meta box using a class.
 *
 * @since 1.0.0
 */
class Dlpro_Core_Metabox_Settings {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_footer', array( $this, 'dlpro_core_admin_enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'dlpro_core_admin_enqueue_style' ) );
		add_action( 'load-post.php', array( $this, 'post_metabox_setup' ) );
		add_action( 'load-post-new.php', array( $this, 'post_metabox_setup' ) );
	}

	/**
	 * Metabox setup function
	 */
	public function post_metabox_setup() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ), 10, 2 );
	}

	/**
	 * Register the JavaScript.
	 */
	public function dlpro_core_admin_enqueue_scripts() {
		global $post_type;
		if ( 'post' === $post_type ) {
			?>
			<script type="text/javascript">
				(function( $ ) {
					'use strict';

					/**
					 * From this point every thing related to metabox
					 */
					$('document').ready(function(){

						// Started Tab
						$('.group, .innergroup, .innergroup2').hide();
						// first tab
						var activetab = '';
						if (typeof(localStorage) != 'undefined' ) {
							activetab = localStorage.getItem("activetab");
						}
						if (activetab != '' && $(activetab).length ) {
							$(activetab).fadeIn();
						} else {
							$('.group:first').fadeIn();
						}
						if (activetab != '' && $(activetab + '-tab').length ) {
							$(activetab + '-tab').addClass('nav-tab-active');
						}
						else {
							$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
						}
						$('.nav-tab-wrapper a').click(function(evt) {
							$('.nav-tab-wrapper a').removeClass('nav-tab-active');
							$(this).addClass('nav-tab-active').blur();
							var clicked_group = $(this).attr('href');
							if (typeof(localStorage) != 'undefined' ) {
								localStorage.setItem("activetab", $(this).attr('href'));
							}
							$('.group').hide();
							$(clicked_group).fadeIn();
							evt.preventDefault();
						});
						// First tab inner
						var activeinnertab = '';
						if (typeof(localStorage) != 'undefined' ) {
							activeinnertab = localStorage.getItem("activeinnertab");
						}
						if (activeinnertab != '' && $(activeinnertab).length ) {
							$(activeinnertab).fadeIn();
						} else {
							$('.innergroup:first').fadeIn();
						}
						if (activeinnertab != '' && $(activeinnertab + '-innertab').length ) {
							$(activeinnertab + '-innertab').addClass('current');
						}
						else {
							$('.dlpro-meta-innertab-wrapper a:first').addClass('current');
						}
						$('.dlpro-meta-innertab-wrapper a').click(function(evt) {
							$('.dlpro-meta-innertab-wrapper a').removeClass('current');
							$(this).addClass('current').blur();
							var clicked_group = $(this).attr('href');
							if (typeof(localStorage) != 'undefined' ) {
								localStorage.setItem("activeinnertab", $(this).attr('href'));
							}
							$('.innergroup').hide();
							$(clicked_group).fadeIn();
							evt.preventDefault();
						});
						// Second tab inner
						var activeinnertab2 = '';
						if (typeof(localStorage) != 'undefined' ) {
							activeinnertab2 = localStorage.getItem("activeinnertab2");
						}
						if (activeinnertab2 != '' && $(activeinnertab2).length ) {
							$(activeinnertab2).fadeIn();
						} else {
							$('.innergroup2:first').fadeIn();
						}
						if (activeinnertab2 != '' && $(activeinnertab2 + '-innertab2').length ) {
							$(activeinnertab2 + '-innertab2').addClass('current');
						}
						else {
							$('.dlpro-meta-innertab2-wrapper a:first').addClass('current');
						}
						$('.dlpro-meta-innertab2-wrapper a').click(function(evt) {
							$('.dlpro-meta-innertab2-wrapper a').removeClass('current');
							$(this).addClass('current').blur();
							var clicked_group = $(this).attr('href');
							if (typeof(localStorage) != 'undefined' ) {
								localStorage.setItem("activeinnertab2", $(this).attr('href'));
							}
							$('.innergroup2').hide();
							$(clicked_group).fadeIn();
							evt.preventDefault();
						});
						$('.dlbutton-add-row').on('click', function(e) {
							e.preventDefault();
							var $target = $($(this).data('target'));
							var row = $target.find('.dlbutton-empty-row').clone(true);
							var input = row.find('input');
							if (typeof input.data('name') !== 'undefined' && input.data('name')) input.prop('name', input.data('name'));
							input.filter('[name="dlpro_dlbutton_item_url[]"]').addClass('dlpro-url');
							row.removeClass('dlbutton-empty-row screen-reader-text');
							row.insertBefore($target.find('tbody>tr:last'));
							row.find(".dlpro-focus-on-add").focus();
						});

						$('.dlbutton-remove-row').on('click', function(e) {
							e.preventDefault();
							$(this).closest('tr').remove();
						});
						// Start uploader
						$('.dlpro-core-metaposer-browse').on('click', function (event) {
							event.preventDefault();

							var self = $(this);

							// Create the media frame.
							var file_frame = wp.media.frames.file_frame = wp.media({
								title: self.data('uploader_title'),
								button: {
									text: self.data('uploader_button_text'),
								},
								multiple: false
							});

							file_frame.on('select', function () {
								var attachment = file_frame.state().get('selection').first().toJSON();
								self.prev('.dlpro-core-metaposer-url').val(attachment.url).change();
							});

							// Finally, open the modal
							file_frame.open();
						});
					});
				})( jQuery );
			</script>
			<?php
		}
	}

	/**
	 * Register the CSS.
	 */
	public function dlpro_core_admin_enqueue_style() {
		global $post_type;
		if ( 'post' === $post_type ) {
			?>
			<style type="text/css">
			.dlpro-pricecurrency-item th,
			.dlpro-dlbutton-item th {text-align: left !important;}
			.dlpro-core-metabox-common-fields .dlpro-dlbutton-item,
			.dlpro-core-metabox-common-fields .box-meta {margin-top: 20px;}
			.dlpro-core-metabox-common-fields a.display-block,
			.dlpro-core-metabox-common-fields input.display-block,
			.dlpro-core-metabox-common-fields textarea.display-block{display:block;width:100%;}
			.dlpro-core-metabox-common-fields input[type="button"].display-block {margin-top:10px;}
			.dlpro-core-metabox-common-fields a.display-block {text-align:center;}
			.dlpro-core-metabox-common-fields label {display: block;margin-bottom: 5px;}
			.dlpro-core-metabox-common-fields input[disabled] {background: #ddd;}
			.dlpro-core-metabox-common-fields .nav-tab-active,
			.dlpro-core-metabox-common-fields .nav-tab-active:focus,
			.dlpro-core-metabox-common-fields .nav-tab-active:focus:active,
			.dlpro-core-metabox-common-fields .nav-tab-active:hover {
				border-bottom: 1px solid #ffffff !important;
				background: #ffffff !important;
				color: #000;
			}
			</style>
			<?php
		}
	}

	/**
	 * Adds the meta box.
	 *
	 * @param string $post_type Post type.
	 */
	public function add_meta_box( $post_type ) {
		$post_types = array( 'post' );
		if ( in_array( $post_type, $post_types, true ) ) {
			add_meta_box(
				'dlpro_core_video_meta_metabox',
				__( 'Software Settings', 'dlpro-core' ),
				array( $this, 'metabox_callback' ),
				$post_type,
				'advanced',
				'default'
			);
		}
	}

	/**
	 * Save the meta box.
	 *
	 * @param int   $post_id Post ID.
	 * @param array $post Post.
	 * @return int $post_id
	 */
	public function save( $post_id, $post ) {
		/* Verify the nonce before proceeding. */
		if ( ! isset( $_POST['dlpro_core_video_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['dlpro_core_video_meta_nonce'] ) ), basename( __FILE__ ) ) ) {
			return $post_id;
		}

		/* Get the post type object. */
		$post_type = get_post_type_object( $post->post_type );

		/* Check if the current user has permission to edit the post. */
		if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
			return $post_id;
		}

		/* List of meta box fields (name => meta_key) */
		$fields = array(
			'dlpro-core-version-value'   => 'DLPRO_Version',
			'dlpro-core-system-value'    => 'DLPRO_System',
			'dlpro-core-filesize-value'  => 'DLPRO_Filesize',
			'dlpro-core-license-value'   => 'DLPRO_License',
			'dlpro-core-developer-value' => 'DLPRO_Developer',
			'dlpro-core-currency-value'  => 'DLPRO_Currency',
			'dlpro-core-price-value'     => 'DLPRO_Price',
			'dlpro-core-poster-value'    => 'DLPRO_Thumbnail',
			'dlpro-core-image-gallery'   => 'DLPRO_Gallery',
		);

		foreach ( $fields as $name => $meta_key ) {
			/* Check if meta box fields has a proper value */
			if ( isset( $_POST[ $name ] ) && 'N/A' !== $_POST[ $name ] ) {
				/* Set thumbnail */
				if ( 'dlpro-core-poster-value' === $name ) {
					global $post;
					$already_has_thumb = has_post_thumbnail( $post->ID );
					// if not set featured image, do not set post thumbnail.
					if ( ! $already_has_thumb ) {
						global $wpdb;
						$image_src     = sanitize_text_field( wp_unslash( $_POST[ $name ] ) );
						$query         = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
						$attachment_id = $wpdb->get_var( $query ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery
						set_post_thumbnail( $post->ID, $attachment_id );
					}
				}
				$new_meta_value = sanitize_text_field( wp_unslash( $_POST[ $name ] ) );
			} else {
				$new_meta_value = '';
			}

			/* Get the meta value of the custom field key */
			$meta_value = get_post_meta( $post_id, $meta_key, true );

			/* If a new meta value was added and there was no previous value, add it. */
			if ( $new_meta_value && empty( $meta_value ) ) {
				add_post_meta( $post_id, $meta_key, $new_meta_value, true );
				/* If the new meta value does not match the old value, update it. */
			} elseif ( $new_meta_value && $new_meta_value !== $meta_value ) {
				update_post_meta( $post_id, $meta_key, $new_meta_value );

				/* If there is no new meta value but an old value exists, delete it. */
			} elseif ( empty( $new_meta_value ) && $meta_value ) {
				delete_post_meta( $post_id, $meta_key, $meta_value );

			}
		}

		/* Repeatable update and delete meta fields method. */
		$title = isset( $_POST['dlpro_dlbutton_item_title'] ) ? $_POST['dlpro_dlbutton_item_title'] : '';
		$url   = isset( $_POST['dlpro_dlbutton_item_url'] ) ? $_POST['dlpro_dlbutton_item_url'] : '';

		$old = get_post_meta( $post_id, 'dlpro_dlbutton_item', true );
		$new = array();

		$count = count( $title );

		for ( $i = 0; $i < $count; $i++ ) {
			if ( ! empty( $title[ $i ] ) ) {
				$new[ $i ]['dlpro_dlbutton_item_title'] = sanitize_text_field( wp_unslash( $title[ $i ] ) );
			}
			if ( ! empty( $url[ $i ] ) ) {
				$new[ $i ]['dlpro_dlbutton_item_url'] = sanitize_text_field( wp_unslash( $url[ $i ] ) );
			}
		}

		if ( ! empty( $new ) && $new !== $old ) {
			update_post_meta( $post_id, 'dlpro_dlbutton_item', $new );
		} elseif ( empty( $new ) && $old ) {
			delete_post_meta( $post_id, 'dlpro_dlbutton_item', $old );
		}

	}

	/**
	 * Meta box html view
	 *
	 * @param array  $object Object Post Type.
	 * @param string $box returning string.
	 */
	public function metabox_callback( $object, $box ) {
		global $post;
		// Add an nonce field so we can check for it later.
		wp_nonce_field( basename( __FILE__ ), 'dlpro_core_video_meta_nonce' );
		$items = get_post_meta( $post->ID, 'dlpro_dlbutton_item', true );
		?>
		<div id="col-container">
			<div class="metabox-holder dlpro-core-metabox-common-fields">

				<h3 class="nav-tab-wrapper">
					<a class="nav-tab" id="dlpro-meta-settings-tab" href="#dlpro-meta-settings"><?php esc_html_e( 'Software Settings:', 'dlpro-core' ); ?></a>
					<a class="nav-tab" id="dlpro-meta-download-tab" href="#dlpro-meta-download"><?php esc_html_e( 'Download Settings:', 'dlpro-core' ); ?></a>
				</h3>

				<div id="dlpro-meta-settings" class="group" style="display: none;">
					<div id="dlpro-version" class="box-meta">
						<label for="opsi-version"><strong><?php esc_html_e( 'Version:', 'dlpro-core' ); ?></strong></label>
						<input type="text" class="regular-text display-block" id="opsi-version" placeholder="<?php esc_html_e( 'Example: 1.0.234 beta 1', 'dlpro-core' ); ?>" name="dlpro-core-version-value" value="<?php echo esc_attr( get_post_meta( $object->ID, 'DLPRO_Version', true ) ); ?>" />
						<span class="howto"><?php esc_attr_e( 'Please insert software version. This will display after software title.', 'dlpro-core' ); ?></span>
					</div>
					<div id="dlpro-system" class="box-meta">
						<label for="opsi-version"><strong><?php esc_html_e( 'System:', 'dlpro-core' ); ?></strong></label>
						<input type="text" class="regular-text display-block" id="opsi-system" placeholder="<?php esc_html_e( 'Example: Windows 10, MacOs Catalina, Android 10', 'dlpro-core' ); ?>" name="dlpro-core-system-value" value="<?php echo esc_attr( get_post_meta( $object->ID, 'DLPRO_System', true ) ); ?>" />
						<span class="howto"><?php esc_attr_e( 'RICH SNIPPET(Require). Please insert software system.', 'dlpro-core' ); ?></span>
					</div>
					<div id="dlpro-filesize" class="box-meta">
						<label for="opsi-filesize"><strong><?php esc_html_e( 'File Size:', 'dlpro-core' ); ?></strong></label>
						<input type="text" class="regular-text display-block" id="opsi-filesize" placeholder="<?php esc_html_e( 'Example: 25 MB', 'dlpro-core' ); ?>" name="dlpro-core-filesize-value" value="<?php echo esc_attr( get_post_meta( $object->ID, 'DLPRO_Filesize', true ) ); ?>" />
						<span class="howto"><?php esc_attr_e( 'Please insert software file size.', 'dlpro-core' ); ?></span>
					</div>
					<div id="dlpro-license" class="box-meta">
						<label for="opsi-license"><strong><?php esc_html_e( 'License:', 'dlpro-core' ); ?></strong></label>
						<input type="text" class="regular-text display-block" id="opsi-license" placeholder="<?php esc_html_e( 'Example: Freeware, Open Source, Trial, Etc', 'dlpro-core' ); ?>" name="dlpro-core-license-value" value="<?php echo esc_attr( get_post_meta( $object->ID, 'DLPRO_License', true ) ); ?>" />
						<span class="howto"><?php esc_attr_e( 'Please insert software license.', 'dlpro-core' ); ?></span>
					</div>
					<div id="dlpro-developer" class="box-meta">
						<label for="opsi-developer"><strong><?php esc_html_e( 'Developer:', 'dlpro-core' ); ?></strong></label>
						<input type="text" class="regular-text display-block" id="opsi-developer" placeholder="<?php esc_html_e( 'Example: Google Inc, Firefox Inc, Etc', 'dlpro-core' ); ?>" name="dlpro-core-developer-value" value="<?php echo esc_attr( get_post_meta( $object->ID, 'DLPRO_Developer', true ) ); ?>" />
						<span class="howto"><?php esc_attr_e( 'Please insert software developer.', 'dlpro-core' ); ?></span>
					</div>
					<div id="dlpro-price" class="box-meta">
						<table id="dlpro-pricecurrency-item" class="dlpro-pricecurrency-item" width="100%">
							<thead>
								<tr>
									<th width="15%"><label for="opsi-currency"><strong><?php esc_html_e( 'Currency', 'dlpro-core' ); ?></strong></label></th>
									<th width="85%"><label for="opsi-price"><strong><?php esc_html_e( 'Price', 'dlpro-core' ); ?></strong></label></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<input type="text" class="regular-text display-block" id="opsi-currency" placeholder="<?php esc_html_e( 'IDR, USD', 'dlpro-core' ); ?>" name="dlpro-core-currency-value" value="<?php echo esc_attr( get_post_meta( $object->ID, 'DLPRO_Currency', true ) ); ?>" />
									</td>
									<td>
										<input type="text" class="regular-text display-block" id="opsi-price" placeholder="<?php esc_html_e( '5.12 or 5', 'dlpro-core' ); ?>" name="dlpro-core-price-value" value="<?php echo esc_attr( get_post_meta( $object->ID, 'DLPRO_Price', true ) ); ?>" />
									</td>
								</tr>
							</tbody>

						</table>
						<span class="howto"><?php esc_attr_e( 'RICH SNIPPET(Require). Please insert software price. This using USD by default for price, you can change in currency field. Please see this for currency: https://support.google.com/books/partner/table/6052428?hl=id', 'dlpro-core' ); ?></span>
					</div>
					<div id="dlpro-thumbnail" class="box-meta">
						<label for="opsi-thumbnail"><strong><?php esc_html_e( 'Software Thumbnail', 'dlpro-core' ); ?></strong></label>
						<input type="text" class="regular-text display-block dlpro-core-metaposer-url" id="opsi-filesize" name="dlpro-core-poster-value" value="<?php echo esc_attr( get_post_meta( $object->ID, 'DLPRO_Thumbnail', true ) ); ?>" />
						<input style="margin-top: 10px;" class="button button-primary dlpro-core-metaposer-browse" type="button" value="<?php esc_attr_e( 'Upload', 'dlpro-core' ); ?>" />
						<span class="howto"><?php esc_attr_e( 'You can insert thumbnail here or via set featured image. Recommended is using featured image.', 'dlpro-core' ); ?></span>
					</div>
					<div id="dlpro-image-gallery" class="box-meta">
						<label for="opsi-image-gallery"><strong><?php esc_html_e( 'Shortcode Gallery:', 'dlpro-core' ); ?></strong></label>
						<textarea name="dlpro-core-image-gallery" id="opsi-image-gallery" rows="4" cols="55" class="regular-text display-block"><?php echo esc_textarea( get_post_meta( $object->ID, 'DLPRO_Gallery', true ) ); ?></textarea>
						<span class="howto"><?php esc_attr_e( 'Please insert shortcode image gallery for this application. You can using plugin or using shortcode from theme, example: [dlpro-gallery image_url="urlimage1,urlimage2,urlimage3"].', 'dlpro-core' ); ?></span>
					</div>
				</div>

				<div id="dlpro-meta-download" class="group" style="display: none;">
					<!-- Start repeater field -->
					<table id="dlpro-dlbutton-item" class="dlpro-dlbutton-item" width="100%">

						<thead>
							<tr>
								<th width="48%"><?php esc_html_e( 'Title Button', 'dlpro-core' ); ?></th>
								<th width="48%"><?php esc_html_e( 'Download URL', 'dlpro-core' ); ?></th>
								<th width="4%"></th>
							</tr>
						</thead>

						<tbody>
							<?php if ( ! empty( $items ) ) : ?>

								<?php
								foreach ( $items as $item ) {
									if ( ! empty( $item['dlpro_dlbutton_item_title'] ) ) {
										$title = $item['dlpro_dlbutton_item_title'];
									} else {
										$title = '';
									}
									if ( ! empty( $item['dlpro_dlbutton_item_url'] ) ) {
										$uri = $item['dlpro_dlbutton_item_url'];
									} else {
										$uri = '';
									}
									?>
									<tr>
										<td>
											<input type="text" class="regular-text display-block" name="dlpro_dlbutton_item_title[]" placeholder="<?php esc_html_e( 'Example: Download Now', 'dlpro-core' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
										</td>
										<td>
											<input type="url" class="regular-text display-block" name="dlpro_dlbutton_item_url[]" placeholder="<?php esc_html_e( 'Example: https://play.google.com/store/apps/details?id=eth.org.freewallet.app', 'dlpro-core' ); ?>" value="<?php echo esc_url( $uri ); ?>" />
										</td>
										<td><a class="button dlbutton-remove-row display-block" href="#"><?php esc_html_e( 'Delete', 'dlpro-core' ); ?></a></td>
									</tr>

								<?php } ?>

							<?php else : ?>
								<tr>
									<td><input type="text" class="regular-text display-block" placeholder="<?php esc_html_e( 'Example: Download Now', 'dlpro-core' ); ?>" name="dlpro_dlbutton_item_title[]" /></td>
									<td><input type="url" class="regular-text display-block" placeholder="<?php esc_html_e( 'Example: https://play.google.com/store/apps/details?id=eth.org.freewallet.app', 'dlpro-core' ); ?>" name="dlpro_dlbutton_item_url[]" /></td>
									<td><a class="button dlbutton-remove-row display-block" href="#"><?php esc_html_e( 'Delete', 'dlpro-core' ); ?></a></td>
								</tr>

							<?php endif; ?>

							<!-- empty hidden one for jQuery -->
							<tr class="dlbutton-empty-row screen-reader-text">
								<td><input type="text" class="regular-text display-block dlpro-focus-on-add" placeholder="<?php esc_html_e( 'Example: Download Now', 'dlpro-core' ); ?>" name="dlpro_dlbutton_item_title[]" /></td>
								<td><input type="url" class="regular-text display-block" placeholder="<?php esc_html_e( 'Example: https://play.google.com/store/apps/details?id=eth.org.freewallet.app', 'dlpro-core' ); ?>" name="dlpro_dlbutton_item_url[]" /></td>
								<td><a class="button dlbutton-remove-row display-block" href="#"><?php esc_html_e( 'Delete', 'dlpro-core' ); ?></a></td>
							</tr>

						</tbody>

					</table>
					<table width="100%">
						<tr>
							<td><a class="dlbutton-add-row button display-block" data-target="#dlpro-dlbutton-item" href="#"><?php esc_html_e( 'Add another', 'dlpro-core' ); ?></a></td>
						</tr>
					</table>
					<span class="howto"><?php esc_html_e( 'Please insert title and URL download button. You can click <strong>Add another</strong> for add new button download and click <strong>Delete</strong> to delete download button.', 'dlpro-core' ); ?></span>
				</div>
			</div>
		</div>
		<?php
	}

}

// Load only if dashboard.
if ( is_admin() ) {
	new Dlpro_Core_Metabox_Settings();
}
