<?php 


/* 1. Register the meta box */
//add_action( 'add_meta_boxes', 'wb_220517_register_meta_boxes' );
function wb_220517_register_meta_boxes($post) {
	/* Register Metabox */
    add_meta_box( 'additional-file' , __( 'Additional File', 'textdomain' ), 'wb_220517_file_callback', ['page', 'post'], 'normal', 'core' );
}

function wb_220517_file_callback($post) {
	//Meta box content
    wp_nonce_field( 'wb_220517_nonce', 'meta_box_nonce' );
    $fileLink = get_post_meta($post->ID, "wb_additional_file", true);
?>
 
<label for="wb_additional_file">Additional File</label>
<input id="wb_additional_file" name="wb_additional_file" type="text" value="<?php esc_html_e( $fileLink ); ?>" />
<input id="upload_button" type="button" value="Upload File" />
 
<?php
}

/* 2. En-queue the needed JavaScript */
//add_action('admin_enqueue_scripts', 'wb_220517_add_admin_scripts');
function wb_220517_add_admin_scripts($hook) {
    if($hook !== 'post-new.php' && $hook !== 'post.php')
    {
        return;
    }
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('WB_JS_Admin', get_template_directory_uri() . '/assets/js/medias.js', array('jquery','media-upload','thickbox'), 1.1, true);
    wp_enqueue_style('thickbox');
}

/* 4. Handle the meta box saving */
//add_action( 'save_post', 'wb_220517_save_meta_box' );
function wb_220517_save_meta_box( $post_id ){
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'wb_220517_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    $fields = [
        'wb_additional_file'
    ];
    foreach($fields as $field)
    {
        if( isset( $_POST[$field] ) )
        {
            update_post_meta( $post_id, $field, $_POST[$field] );
        }
    }
}