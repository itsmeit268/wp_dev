<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
global $wpdb, $post, $wp_query, $opt_themes;
$popup_next_post_on     = $opt_themes['popup_next_post']; 
$text_next_post     	= $opt_themes['text_next_post']; 
if($popup_next_post_on) {
$next_post              = get_adjacent_post(false, '', false);
$image                  = get_the_post_thumbnail( $next_post->ID, 'thumbnails-post', true );
$images                 = get_the_post_thumbnail( $next_post->ID );
$tiles                  = get_the_title( $next_post->ID );
$url                    = get_permalink( $next_post->ID );
  
if(!empty($next_post)) {
?> 
<section class="exthemes_popup_post ">
  <span class="caption"><?php echo $text_next_post; ?></span>
  <div class="exthemes_popup_content">
    <div class="exthemes_thumb">
      <a href="<?php echo $url; ?>">
        <div class="thumbnail-container animate-lazy  size-1000 ">
          <?php echo $image; ?>
        </div>
      </a>
    </div>
    <h3 class="post-title">
      <a href="<?php echo $url; ?>"> <?php echo $tiles; ?> </a>
    </h3>
  </div>
  <b class="exthemes_popup_close"> X </b>
</section>

<script>
$(window).scroll(() => { 
  topOfFooter = $('footer').position().top;
  // Distance user has scrolled from top, adjusted to take in height of sidebar (570 pixels inc. padding).
  scrollDistanceFromTopOfDoc = $(document).scrollTop() + 1300;
  scrollDistanceFromTopOfFooter = scrollDistanceFromTopOfDoc - topOfFooter;
  if (scrollDistanceFromTopOfDoc > topOfFooter) {
      $(".exthemes_popup_post").removeClass('active');
  } else {
      $(".exthemes_popup_post").addClass('active').removeAttr('style');
  }
});
 $(".exthemes_popup_close").click(function(){
   $(".exthemes_popup_post").hide();
})
</script>
 
<style>
.exthemes_popup_post{display:block;position:fixed;background:var(--color_background);width:300px;bottom:150px;right:15px;z-index:4;border-radius:3px;-webkit-box-shadow:0 0 1px rgba(0,0,0,0.2),0 2px 20px rgba(0,0,0,0.15);box-shadow:0 0 1px rgba(0,0,0,0.2),0 2px 20px rgba(0,0,0,0.15);padding:5px 20px 15px 15px;opacity:0;visibility:hidden;-webkit-transition:0.3s ease;-o-transition:0.3s ease;transition:0.3s ease}.exthemes_popup_post.active{opacity:1;visibility:visible;bottom:100px;-webkit-transition:0.4s ease;-o-transition:0.4s ease;transition:0.4s ease}.exthemes_popup_post .caption{color:var(--color_background);font-size:11px;text-transform:uppercase;letter-spacing:1px;font-weight:700;position:absolute;right:0;bottom:0;line-height:1;padding:3px 5px;background:var(--color_button)}.exthemes_popup_content{margin-top:15px}.exthemes_popup_content:nth-child(2){margin-top:10px}.exthemes_popup_content .exthemes_thumb{float:left;margin-right:10px;width:60px}.exthemes_popup_content .post-title{font-size:14px;margin:0}.exthemes_popup_content .post-title a{color:inherit}.exthemes_popup_close{color:var(--color_button);position:absolute;right:0;top:0;width:25px;height:25px;line-height:25px;font-size:12px;text-align:center}
</style>

<?php 
} }