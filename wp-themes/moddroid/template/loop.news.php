<?php
global $wpdb, $post, $opt_themes;
$image_id						= get_post_thumbnail_id($post->ID); 
$full							= 'thumbnails-news'; 
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_news_home			= $image_url[0];
?>
<div class="col-12 col-sm-6 col-lg-4 mb-4 ">
    <a class="embed-responsive embed-responsive-16by9 bg-cover d-block" style="background-image: url(<?php  echo $image_url_news_home; ?>); box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.15);" href="<?php the_permalink() ?>">
    <div class="d-flex align-items-end p-3 position-absolute" style="background-color: rgba(0, 0, 0, 0.5); top: 0; bottom: 0; left: 0; right: 0;">
    <h3 class="text-white mb-0" style="font-size: 0.875rem;"><?php the_title(); ?></h3>
    </div>
    </a>
</div>