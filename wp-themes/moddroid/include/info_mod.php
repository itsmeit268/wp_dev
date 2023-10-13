<?php 
if (get_post_meta( $post->ID, 'wp_mods_post', true )) {
   $wp_mods_post        = get_post_meta( $post->ID, 'wp_mods_post', true );
   $wp_mods_post1       = get_post_meta( $post->ID, 'wp_mods_post', true );
   $wp_mods_post2       = get_post_meta( $post->ID, 'wp_mods_post2', true );
   $wp_mods_post3       = get_post_meta( $post->ID, 'wp_mods_post3', true );
if ( $wp_mods_post === FALSE or $wp_mods_post == '' ) $wp_mods_post = $wp_mods_post1;
?>
   <div id="accordion-more-info" class="border rounded-lg overflow-hidden mb-3 accordion accordion-more-info">
      <div>
         <a class="bg-col-button d-flex py-2 px-3 toggler collapsed" data-toggle="collapse" href="#more-info-1" aria-expanded="false"><?php if (get_post_meta( $post->ID, 'wp_title_wp_mods', true )) { ?><?php echo get_post_meta( $post->ID, 'wp_title_wp_mods', true )?><?php } else { ?><?php global $opt_themes; if($opt_themes['exthemes_MODAPK']) { ?><?php echo $opt_themes['exthemes_MODAPK']; ?><?php } ?> v1 <?php } ?></a>
         <div id="more-info-1" class="collapse show" data-parent="#accordion-more-info">
            <div class="pt-3 px-3 mb-3"><?php echo $wp_mods_post ?> </div>
         </div>
      </div>
      <?php if (get_post_meta( $post->ID, 'wp_mods_post2', true )) { ?>
      <div>
         <a class="bg-col-button d-flex py-2 px-3 toggler collapsed" data-toggle="collapse" href="#more-info-2" aria-expanded="false"><?php if (get_post_meta( $post->ID, 'wp_title_wp_mods_2', true )) { ?><?php echo get_post_meta( $post->ID, 'wp_title_wp_mods_2', true )?><?php } else { ?><?php global $opt_themes; if($opt_themes['exthemes_MODAPK']) { ?><?php echo $opt_themes['exthemes_MODAPK']; ?><?php } ?> v2 <?php } ?></a>
         <div id="more-info-2" class="collapse" data-parent="#accordion-more-info">
         <div class="pt-3 px-3 mb-3"><?php echo $wp_mods_post2 ?> </div>
         </div>
      </div> 
      <?php } if (get_post_meta( $post->ID, 'wp_mods_post3', true )) { ?>
      <div>
         <a class="bg-col-button d-flex py-2 px-3 toggler collapsed" data-toggle="collapse" href="#more-info-3" aria-expanded="false"><?php if (get_post_meta( $post->ID, 'wp_title_wp_mods_3', true )) { ?><?php echo get_post_meta( $post->ID, 'wp_title_wp_mods_3', true )?><?php } else { ?><?php global $opt_themes; if($opt_themes['exthemes_MODAPK']) { ?><?php echo $opt_themes['exthemes_MODAPK']; ?><?php } ?> v3 <?php } ?></a>
         <div id="more-info-3" class="collapse" data-parent="#accordion-more-info">
         <div class="pt-3 px-3 mb-3"><?php echo $wp_mods_post3 ?> </div>
         </div>
      </div> 
      <?php } ?>
   </div> 
<?php } 