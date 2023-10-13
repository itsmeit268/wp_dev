<?php
global $opt_themes;
if($opt_themes['mdr_style_3']) {
	get_template_part('include/comment.new');
} else { 
	get_template_part('include/comment.old');
} 
