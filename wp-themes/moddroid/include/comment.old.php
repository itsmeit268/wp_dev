<?php
/**
* The template for displaying comments.
*
* This is the template that displays the area of the page that contains both the current comments
* and the comment form.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Newkarma
*/
/* Exit if accessed directly */
if( ! defined( 'ABSPATH' ) ){
	exit;
}
/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if( post_password_required() ){
	return;
}
?>
<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?><section class="bg-white border rounded shadow-sm pt-3 px-2 px-md-3 mb-3 mx-auto" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { ?><section class="mb-4"> <?php } ?>

<h2 class="h5 font-weight-semibold mb-3"><?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?><?php } else { ?><span class="border-bottom-2 border-secondary d-inline-block pb-1"><?php } ?><?php global $opt_themes; if($opt_themes['exthemes_Comments']){ ?><?php echo $opt_themes['exthemes_Comments']; ?><?php } ?><?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?><?php } else { ?></span><?php } ?></h2>
 
	<div style="clear:both"></div>
	<?php
	// You can start editing here -- including this comment!
	if( have_comments() ) :
	?>
	<div> 
	<?php
	wp_list_comments( array(
		'callback' => 'better_comments'
	) ); 
	?>
	</div><!-- .comment-list -->
	<?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', THEMES_NAMES ); ?></h2>
		<?php
		paginate_comments_links(
			apply_filters(
				'gmr_get_comment_pagination_args',
				array(
					'prev_text' => '<span class="gmr-icon arrow_carrot-2left"></span>',
					'next_text' => '<span class="gmr-icon arrow_carrot-2right"></span>',
					'type'      => 'list',
				)
			)
		);
		?>
	</nav><!-- #comment-nav-below -->
	<?php
	endif; // Check for comment navigation.
	endif; // Check for have_comments().
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments"><?php _e( 'Comments are closed.', THEMES_NAMES ); ?></p>
	<?php
	endif;
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	global $opt_themes;
	$names = $opt_themes['exthemes_comments_3'];
	$emails = $opt_themes['exthemes_comments_4'];
	$comments = $opt_themes['exthemes_comments_5'];
	$fields = array(
		'author' =>
		'<div class="row">' .
		'<div class="col-12 col-sm-6 form-group"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" placeholder="' . $names . ( $req ? '*' : '' ) . '" size="30"' . $aria_req . ' /></div> ',
		'email'  =>
		' ' .
		'<div class="col-12 col-sm-6 form-group"><input class="form-control" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" placeholder="' . $emails . ( $req ? '*' : '' ) . '" size="30"' . $aria_req . ' /></div></div>',
		/*'url'    =>
		'<p class="comment-form-url">' .
		'<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" placeholder="' . __( 'Website', THEMES_NAMES ) . '" size="30" /></p>',*/
	);
	$args = array(
		'comment_field' => '<div class="form-group"><textarea id="comment" class="form-control" name="comment" cols="45" rows="4" placeholder="' . $comments . '" aria-required="true">' .
		'</textarea></div>',
		'fields'        => apply_filters( 'comment_form_default_fields', $fields ),
	);
	?>
	<?php ob_start();  
	comment_form( $args );
	$form = ob_get_clean(); 
	$form = str_replace('class="comment-form"','class="comment-form my-class"', $form);
	echo str_replace('id="submit"','class="btn btn-primary komentar"', $form);
	?>
	<!-- #comments -->
</section><!-- .gmr-box-content -->
<?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<style>
input.btn.btn-primary.komentar, input.btn.btn-primary.komentar:not(:disabled):not(.disabled):active:focus {  color: #fff !important;  background-color: var(--color_button)!important;  border-color: var(--color_button)!important;}
</style>
<?php } 