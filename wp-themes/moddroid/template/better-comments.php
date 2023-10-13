<?php
// My custom comments output html
global $opt_themes;
$rtl_on				= $opt_themes['ex_themes_activate_rtl_'];
$style_2_on			= $opt_themes['ex_themes_home_style_2_activate_'];
$langs				= $opt_themes['languange_rtl'];
$color_theme		= $opt_themes['color_button']; 
function better_comments( $comment, $args, $depth ){
	// Get correct tag used for the comments
	if( 'div' === $args['style'] ){
		$tag       = 'div';
		$add_below = 'comment';
	} else{
		$tag       = 'div';
		$add_below = 'div-comment';
	} ?>
	<div class="d-flex mb-3 comment">
		<?php
		// Switch between different comment types
		switch( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
		<div class="pingback-entry"><span class="pingback-heading"><?php _e( 'Pingback:', THEMES_NAMES ); ?></span> <?php comment_author_link(); ?></div>
		<?php break; default : if( 'div' != $args['style'] ){ ?>
			<div class="text-center flex-shrink-0 mr-2"><img alt="" src="<?php echo get_avatar_url($comment,$size='32',$default= get_template_directory_uri().'/images/lazy.png' ); ?>" srcset="<?php echo get_avatar_url($comment,$size='32',$default= get_template_directory_uri().'/images/lazy.png' ); ?>"class='avatar avatar-40 photo avatar-default rounded-circle' height='40' width='40' loading='lazy' /></div>
			
			<div class="bg-light flex-grow-1 p-2" <?php if($rtl_on){ ?>style="margin-right: 10px !important;"<?php } else{ ?>style="margin-left: 10px !important;"<?php } ?>><?php printf(__('<div class="h6 text-break mb-1">%s</div>'), get_comment_author_link()) ?>
			<div class="small text-break mb-1"><?php comment_text(); ?></div>
			<div class="small d-flex"><span><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?></span>
				<span class="mx-2">-</span>
				<?php
				/* translators: 1: date, 2: time */
				printf(
					__( '<time class="text-muted" datetime="%1$s">%1$s</time>', THEMES_NAMES ),
					get_comment_date(),
					get_comment_time()
				); ?>
			</div>
			<?php } ?>
		<?php if( 'div' != $args['style'] ){ ?>
		</div>
	</div>
	<?php }
	// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us
	break;
	endswitch; // End comment_type check.
}