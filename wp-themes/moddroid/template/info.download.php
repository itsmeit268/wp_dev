<?php
global $opt_themes;
$style_2_on						= $opt_themes['ex_themes_home_style_2_activate_'];
?>
				<?php global $opt_themes; if($opt_themes['activate_download_faqs']){ ?>
				<?php if($style_2_on) { ?><section class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 pb-3 px-2 px-md-3 mb-3 mx-auto" style="max-width: <?php if($style_2_on) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { ?><section class="mb-4"><?php } ?>
					
				<h2 class="h5 font-weight-semibold mb-3"><?php global $opt_themes; if($opt_themes['exthemes_download_faqs']){ ?><?php echo $opt_themes['exthemes_download_faqs']; ?><?php } ?></h2>
				<div style="clear:both"></div>
				 
				<style>
				@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
				div.accordion_content_faq p {font-family: 'Roboto', sans-serif;}
				</style>
				<div id="accordion" class="accordion-container mb-2"> 
				  <h4 class="accordion-title accordion_title_faq mt-2 "> 
				  <?php global $opt_themes; echo $opt_themes['title_faq_1_'];?>
				  </h4>
				  <div class="accordion_content_faq p-3 "> 
					<p><?php global $opt_themes; echo $opt_themes['faq_1_'];?></p>
				  </div>
				   
				  <h4 class="accordion-title accordion_title_faq mt-2 "> 
				  <?php global $opt_themes; echo $opt_themes['title_faq_2_'];?>
				  </h4>
				  <div class="accordion_content_faq p-3 ">
					<p><?php global $opt_themes; echo $opt_themes['faq_2_'];?></p>
				  </div>
				  
				  <h4 class="accordion-title accordion_title_faq mt-2 "> 
				  <?php global $opt_themes; echo $opt_themes['title_faq_3_'];?>
				  </h4>
				  <div class="accordion_content_faq p-3 ">
					<p><?php global $opt_themes; echo $opt_themes['faq_3_'];?></p>
				  </div>
				  
				  <h4 class="accordion-title accordion_title_faq mt-2 "> 
				  <?php global $opt_themes; echo $opt_themes['title_faq_4_'];?>
				  </h4>
				  <div class="accordion_content_faq p-3 ">
					<p><?php global $opt_themes; echo $opt_themes['faq_4_'];?></p>
				  </div>
				  
				  <h4 class="accordion-title accordion_title_faq mt-2 "> 
				  <?php global $opt_themes; echo $opt_themes['title_faq_5_'];?>
				  </h4>
				  <div class="accordion_content_faq p-3 ">
					<p><?php global $opt_themes; echo $opt_themes['faq_5_'];?></p>
				  </div>
				</div>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
				<script>
				$(function () { 
				  $(".accordion_content_faq:not(:first-of-type)").css("display", "none"); 
				  $(".accordion_title_faq:first-of-type").addClass("open");
				  $(".accordion_title_faq").click(function () {
					$(".open").not(this).removeClass("open").next().slideUp(300);
					$(this).toggleClass("open").next().slideToggle(300);
				  });
				});
				</script> 
				</section>
				<?php } ?>
				 