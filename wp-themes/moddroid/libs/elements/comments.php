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
function better_comments( $comment, $args, $depth ) {
global $opt_themes;
$rtl_on				= $opt_themes['ex_themes_activate_rtl_'];
$style_2_on			= $opt_themes['ex_themes_home_style_2_activate_'];
$langs				= $opt_themes['languange_rtl'];
$color_theme		= $opt_themes['color_button']; 
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'div';
		$add_below = 'div-comment';
	} ?>
<div class="d-flex mb-3 comment">
<?php	
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
		<div class="pingback-entry"><span class="pingback-heading"><?php _e( 'Pingback:', THEMES_NAMES ); ?></span> <?php comment_author_link(); ?></div>
		<?php break; default : if ( 'div' != $args['style'] ) { ?>
		<div class="text-center flex-shrink-0 mr-2"><img alt="" src="<?php echo get_avatar_url($comment,$size='32',$default='".get_template_directory_uri();."/images/lazy.png' ); ?>" srcset="<?php echo get_avatar_url($comment,$size='32',$default='".get_template_directory_uri();."/images/lazy.png' ); ?>"class='avatar avatar-40 photo avatar-default rounded-circle' height='40' width='40' loading='lazy' /></div>
		<div class="bg-light flex-grow-1 p-2" <?php if($rtl_on){ ?>style="margin-right: 10px !important;border-radius: 10px;"<?php } else{ ?>style="margin-left: 10px !important;border-radius: 10px;"<?php } ?>><?php printf(__('<div class="h6 text-break mb-1">%s</div>'), get_comment_author_link()) ?>
		<div class="small text-break mb-1"><?php comment_text(); ?></div>
		<div class="small d-flex"><span><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?></span>
		<span class="mx-2">-</span>
		<?php		
		printf(
		__( '<time class="text-muted" datetime="%1$s">%1$s</time>', THEMES_NAMES ),
		get_comment_date(),
		get_comment_time()
		); ?> 
		</div> 
		<?php } ?> 
		<?php if ( 'div' != $args['style'] ) { ?>
		</div>
</div> 
<?php }	
		break;
	endswitch; 
} 
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\  
function mdr_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment212 ';
    } else {
        $tag = 'li';
        $add_below = 'div-comment121 ';
    }
global $comment, $opt_themes;
if($opt_themes['mdr_style_3']) {
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\  
if( $comment->comment_parent ) { ?>
<input class="cmRi hidden" id="to-<?php comment_ID() ?>" type="checkbox">
<div class="cmRp">
<div class="cmTh" id="c<?php comment_ID() ?>-rt">
<label aria-label="<?php _e('View replies', THEMES_NAMES); ?>" class="thTg" data-text="<?php _e('Hide replies', THEMES_NAMES); ?>" for="to-<?php comment_ID() ?>"></label>
<ol class="thCh">
<li class="c" id="c<?php comment_ID() ?>">
<div class='cmAv'>
	<?php
	$user = wp_get_current_user(); 
	if ( $user ) : ?>
	<div class='im ' style='background-image: url(<?php echo get_avatar_url( $comment->comment_author_email, 25 ); ?>)'></div>
	<?php endif; ?>
</div>
                  
<div class='cmIn'>
<div class='cmBd' itemscope='itemscope' itemtype='https://schema.org/Comment'>
	<div class='cmHr a'>
	<span class='<?php if ($user_id) { $user_info = get_userdata($user_id ); ?>n<?php } ?>' itemprop='author' itemscope='itemscope' itemtype='https://schema.org/Person'>
	<bdi itemprop='name'><?php echo strip_tags(get_comment_author()) ?></bdi>
	</span>
	<span class='d dtTm' data-datetime='<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>'><?php echo get_comment_date(); ?></span>
	<span class='d date' data-datetime='<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>' itemprop='datePublished'><?php echo get_comment_date(); ?>, <?php echo get_comment_time(); ?></span>
	</div>
	<div class='cmCo' itemprop='text'><?php comment_text(); ?></div>
</div>
<div class='cmAc'>
	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</li>
</ol>
</div>
</div>
<?php } else { ?>
<li class='c' id="<?php comment_ID() ?>">
<div class='cmAv'>
	<?php
	$user = wp_get_current_user(); 
	if ( $user ) : ?>
	<div class='im ' style='background-image: url(<?php echo get_avatar_url( $comment->comment_author_email, 25 ); ?>)'></div>
	<?php endif; ?>
</div> 
<div class='cmIn'>
<div class='cmBd' itemscope='itemscope' itemtype='https://schema.org/Comment'>
	<div class='cmHr a'>
	<span class='<?php if ($user_id) { $user_info = get_userdata($user_id ); ?>n<?php } ?>' itemprop='author' itemscope='itemscope' itemtype='https://schema.org/Person'>
	<bdi itemprop='name'><?php echo strip_tags(get_comment_author()) ?></bdi>
	</span>
	<span class='d dtTm' data-datetime='<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>'><?php echo get_comment_date(); ?></span>
	<span class='d date' data-datetime='<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>' itemprop='datePublished'><?php echo get_comment_date(); ?>, <?php echo get_comment_time(); ?></span>
	</div>
	<div class='cmCo' itemprop='text'><?php comment_text(); ?></div>
</div>
<div class='cmAc'>
	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
<?php }
}
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\  
function ex_themes_leave_comments_() {
global $opt_themes; 	
?>
<?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?><section class="bg-white shadow-sm mx-auto" style="max-width: <?php if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { ?><section class="mb-4"> <?php } ?>
<div class="pCmnts" id="comment">
<input class="cmSh fixi hidden" id="forComments" type="checkbox">
<input class="cmAl hidden" id="forAllCm" type="checkbox">
<div class="cmShw text-center mb-3">
<label aria-label='<?php echo $opt_themes['exthemes_comments_5']; ?> <?php if ( get_comments_number() ) { ?>(<?php $number = get_comments_number(); echo comments_number('0', '1', '%'); ?>)<?php }  ?>' class="cmBtn button ln" for="forComments">
<span><?php echo $opt_themes['exthemes_comments_5']; ?> <?php if ( get_comments_number() ) { ?>(<?php $number = get_comments_number(); echo comments_number('0', '1', '%'); ?>)<?php }  ?></span>
</label>
</div>
<section class="cm cmBr fixL" data-embed="true" data-num-comments="<?php if ( get_comments_number() ) { ?><?php $number = get_comments_number(); echo comments_number('0', '1', '%'); ?><?php }  ?>" id="comments">
	<div class="cmBri">
		<div class="cmBrs fixLs">
			<div class="cmH fixH">
				<h3 class="h5 title"><?php if ( get_comments_number() ) { ?><?php $number = get_comments_number(); echo comments_number('0', '1', '%'); ?><?php }  ?> <?php echo $opt_themes['exthemes_Comments']; ?></h3>
				<div class="cmI cl">
					<label aria-label="" class="s" data-new="<?php echo $opt_themes['text_newest']; ?>" data-text="<?php echo $opt_themes['text_oldest']; ?>" for="forAllCm"></label>
					<label aria-label="<?php echo $opt_themes['text_closed']; ?>" class="c" for="forComments"></label>
				</div>
			</div>

		<?php comments_template(); ?>

		</div>
	</div>
	<label class="fCls" for="forComments"></label>
</section>

</div>
</section>       
<?php  
} 
add_shortcode('ex_themes_leave_comments_', 'ex_themes_leave_comments_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\  
