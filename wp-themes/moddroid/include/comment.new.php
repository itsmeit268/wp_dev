
<div class="cmC">
	<div class="cmCn">
		<ol class="cmHl mt-3" id="cmHolder">
		<?php
		wp_list_comments( array(
			'short_ping'	=> true, 
			'callback'		=> 'mdr_comments'
			) );
		?>
		</ol> 
	</div> 
	
	<div class="cmAd hidden" id="addCm">
		<div aria-label="<?php _e('Leave Comments', THEMES_NAMES); ?>" class="cmBtn button ln" role="button">
		<?php _e('Leave Comments', THEMES_NAMES); ?>
		</div>
	</div>
	<script>var comment = true;</script>
	
	<div class="cmFrm">
		<div id="commentForm">
		<?php get_template_part('include/form.comment');  ?>
		</div>
	</div>
</div>
