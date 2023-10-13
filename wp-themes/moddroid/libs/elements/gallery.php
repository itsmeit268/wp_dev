<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
add_action( 'admin_init', 'add_image_gallery_post_so_exthemes_devs' );
add_action( 'admin_head-post.php', 'print_scripts_so_exthemes_devs' );
add_action( 'admin_head-post-new.php', 'print_scripts_so_exthemes_devs' );
add_action( 'save_post', 'update_post_gallery_so_exthemes_devs', 10, 2 );
function add_image_gallery_post_so_exthemes_devs() {
    add_meta_box(
        'post_gallery', 
         __( 'Screenshoots Poster Uploader', THEMES_NAMES ),
        'exthemes_gallery_image_post_so_exthemes_devs',
        'post',
        'normal',
        'core'
    );
}
/**
 * Print the Meta Box content
 */
function exthemes_gallery_image_post_so_exthemes_devs() {
    global $post, $wpdb, $gets_data;
    $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'noncename_so_exthemes_devs' );
	$gambarX21			= get_post_meta( $post->ID, 'wp_images_GP', true );
    $gambarX212			= get_post_meta( $post->ID, 'wp_images_GP1', true );
	$images_GP			= get_post_meta( $post->ID, 'wp_images_GP', true );
    //$datos_imagenes = ''.$gambarX21.''.$gambarX212.'';
    //$datos_imagenes = get_post_meta($post->ID, 'wp_images_GP', true);
    $datos_imagenes		= $gambarX21;
    if ( $datos_imagenes === FALSE or $datos_imagenes == '' ) $datos_imagenes = $gambarX212;
   /*  for($i=0; $i<4; $i++){
        // echo $gambarX21[$i]."<br />";
    } */
    $datos_imagenes		= !empty($datos_imagenes) ? $datos_imagenes : array();
    $c = 4; 
	?>
	
	<style>p.flip {margin: 0px;padding: 5px;text-align: center;background: #2271b1;border: solid 1px #fff;color:white;}div.panel {width: 100%;height: auto;display: none;}</style>

    <center>
	<?php if($images_GP){ ?>
	<p><strong style="text-transform:uppercase!important;color:#2271b1"><?php _e('Here for Default Screenshoots Poster from Googleplay, you cant add or remove this', THEMES_NAMES); ?><br> <?php _e('but you can copy this link image url for you insert', THEMES_NAMES); ?></strong></p> 
	<?php } else { ?>
	<p><strong style="text-transform:uppercase!important;color:#2271b1"><?php _e('Add your link image url here', THEMES_NAMES); ?></strong></p> 
	<?php } ?>	
	</center>  
    
	<?php if($images_GP){ ?>    
    <style>.container {margin: auto;border: #fff solid 5px;background: #fff;}img {max-width: 100%;}img:hover {opacity: 0.5;cursor: pointer;}.img-grid {display: grid;grid-template-columns: repeat(1, 1fr);grid-gap: 5px;}@media only screen and (min-width: 750px) {.img-grid {grid-template-columns: repeat(2, 1fr);}}@media only screen and (min-width: 970px) {.img-grid {grid-template-columns: repeat(4, 1fr);}}
    </style>
    <div class="container">
    <div class="img-grid">
    <?php
    $i = 0; 
    foreach($images_GP as $elemento) { ?>
    <a href="<?php echo (!empty($images_GP[$i])) ? $images_GP[$i] : ''; ?>" target="_blank"><img src="<?php echo (!empty($images_GP[$i])) ? $images_GP[$i] : ''; ?>" ></a>
    <?php $i++; } ?>
    </div>
    </div>
	<?php } ?>
  
	<div id="dynamic_form">
    <div id="field_wrap">
	
	<span class="panel" style="display: none;">
	<?php
	$i = 0; 
	foreach($images_GP as $elemento) { ?>
    <div class="field_row">
    <div class="field_left">
    <div class="form_field">
    <label><strong><?php _e('Image URL', THEMES_NAMES); ?></strong></label>
    <input type="text" class="meta_image_url" name="gallery-screenshot" value="<?php echo (!empty($images_GP[$i])) ? $images_GP[$i] : ''; ?>" >
    </div>
    </div>
    <div class="image_wrap field_right ">
    <img src="<?php echo (!empty($images_GP[$i])) ? $images_GP[$i] : ''; ?>" width="60" height="60">
    </div> 
    <div class="clear"></div> 
    </div>
	<?php $i++; } ?>	
	</span>
	
	</div>  
	</div> 
	 
	 
	<div id="dynamic_form">
    <div id="field_wrap">
    <?php 
    if ( isset( $gallery_data['image_url'] ) ) {
    for( $i = 0; $i < count( $gallery_data['image_url'] ); $i++ )  { ?>
     
    
    <div class="field_row">
    <div class="field_left">
    <div class="form_field">
    <!--<label><?php _e('Image URL', THEMES_NAMES); ?></label>
    <input type="text" class="meta_image_url" name="gallery[image_url][]" value="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>" />-->
    <textarea class="meta_image_url"  name="gallery[image_url][]" rows="3" cols="50"><?php _e( $gallery_data['image_url'][$i] ); ?></textarea>
    </div>
    </div>
    <div class="field_right image_wrap">
    <img src="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>" height="60" width="60" />
    </div>
    <div class="field_right">
    <input class="button" type="button" value="<?php _e('Choose File', THEMES_NAMES); ?>" onclick="add_image(this)" /><br />
    <input class="button" type="button" value="<?php _e('Remove', THEMES_NAMES); ?>" onclick="remove_field(this)" />
    </div>
    <div class="clear"></div> 
    </div> 
    <?php } } ?>
	
    <div id="kolombaru"></div> 
	
    
    <div style="display:none" id="master-row">
    
    
    
    <div class="field_row">
    <div class="field_left">
    <div class="form_field">
    <label><?php _e('Image URL', THEMES_NAMES); ?></label>
    <input class="meta_image_url" placeholder="<?php _e('Paste Your link image here or Choose your File', THEMES_NAMES); ?>" value="" type="text" name="gallery[image_url][]" />
    </div>
    </div>
    <div class="field_right image_wrap"> </div> 
    <div class="field_right"> 
    <input type="button" class="button" value="<?php _e('Choose File', THEMES_NAMES); ?>" onclick="add_image(this)" /> 
    <input class="button" type="button" value="<?php _e('Remove', THEMES_NAMES); ?>" onclick="remove_field(this)" /> 
    </div>
    <div class="clear"></div>
    </div>
    </div>
	
    <div id="add_field_row">
    <input class="button" type="button" value="<?php _e('Add New Images', THEMES_NAMES); ?>" onclick="add_field_row();" />
    </div>
    </div>
	</div>
 

<?php
}
/**
 * Print styles and scripts
 */
function print_scripts_so_exthemes_devs() {
    // Check for correct post_type
    global $post;
    if( 'post' != $post->post_type )// here you can set post type name
        return;
    ?>  
    <style type="text/css">
      .field_left {
        float:left;
      }
      .field_right {
        float:right;
        margin-left:10px;
      }
      .clear {
        clear:both;
      }
      #dynamic_form {
        width:auto;
      }
      #dynamic_form input[type=text] {
        width:400px;
      }
      #dynamic_form .field_row {       
        border-bottom: 1px dashed darkgray;
        margin-bottom:10px;
        padding:10px; 
      }
      #dynamic_form label {
        padding:0 6px;
      }
        
    </style>
    <script type="text/javascript">
        function add_image(obj) {
            var parent      = jQuery(obj).parent().parent('div.field_row');
            var inputField  = jQuery(parent).find("input.meta_image_url");
            tb_show('', 'media-upload.php?TB_iframe=true');
            window.send_to_editor = function(html) {
                var url     = jQuery(html).find('img').attr('src');
                inputField.val(url);
                jQuery(parent)
                .find("div.image_wrap")
                .html('<img src="'+url+'" height="48" width="48" />');
                // inputField.closest('p').prev('.awdMetaImage').html('<img height=120 width=120 src="'+url+'"/><p>URL: '+ url + '</p>'); 
                tb_remove();
            };
            return false;  
        }
        function remove_field(obj) {
            var parent  = jQuery(obj).parent().parent();
            //console.log(parent)
            parent.remove();
        }
        function add_field_row() {
            var row     = jQuery('#master-row').html();
            jQuery(row).appendTo('#kolombaru');
        }
    </script>
    <?php
}
/**
 * Save post action, process fields
 */
function update_post_gallery_so_exthemes_devs( $post_id, $post_object ) {
    // Doing revision, exit earlier **can be removed**
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
    // Doing revision, exit earlier
    if ( 'revision' == $post_object->post_type )
        return;
    // Verify authenticity
    if ( !wp_verify_nonce( $_POST['noncename_so_exthemes_devs'], plugin_basename( __FILE__ ) ) )
        return;
    // Correct post type
    if ( 'post' != $_POST['post_type'] ) // here you can set post type name
        return;
    if ( $_POST['gallery'] ) {
        // Build array for saving post meta
        $gallery_data = array();
        for ($i = 0; $i < count( $_POST['gallery']['image_url'] ); $i++ ) {
            if ( '' != $_POST['gallery']['image_url'][ $i ] ) {
                $gallery_data['image_url'][]  = $_POST['gallery']['image_url'][ $i ];
            }
        }
        if ( $gallery_data ) 
            update_post_meta( $post_id, 'gallery_data', $gallery_data );
        else 
            delete_post_meta( $post_id, 'gallery_data' );
    } 
    // Nothing received, all fields are empty, delete option
    else {
        delete_post_meta( $post_id, 'gallery_data' );
    }
}

