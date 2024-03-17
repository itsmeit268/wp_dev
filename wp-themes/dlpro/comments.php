<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$fb_comment = get_theme_mod( 'gmr_comment', 'default-comment' );
if ( 'fb-comment' === $fb_comment ) {
	return get_template_directory() . '/inc/fb-comment.php';
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

<?php do_action( 'dlpro_core_before_comments' ); ?>

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$commentnumber = get_comments_number();
			printf(
				/* translators: %1$s: commentnumber */
				esc_html( _n( '%1$s comment', '%1$s comments', $commentnumber, 'dlpro' ) ),
				esc_html( number_format_i18n( $commentnumber ) )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 40,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'dlpro' ); ?></h2>
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
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dlpro' ); ?></p>
		<?php
	endif;

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );

	$fields = array(
		'author' =>
			'<p class="comment-form-author">' .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" placeholder="' . __( 'Name', 'dlpro' ) . ( $req ? '*' : '' ) . '" size="30"' . $aria_req . ' /></p>',

		'email'  =>
			'<p class="comment-form-email">' .
			'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
			'" placeholder="' . __( 'Email', 'dlpro' ) . ( $req ? '*' : '' ) . '" size="30"' . $aria_req . ' /></p>',

		'url'    =>
			'<p class="comment-form-url">' .
			'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" placeholder="' . __( 'Website', 'dlpro' ) . '" size="30" /></p>',
	);

	$args = array(
		'comment_field' => '<p class="comment-form-comment"><label for="comment" class="gmr-hidden">' . _x( 'Comment', 'noun', 'dlpro' ) .
		'</label><textarea id="comment" name="comment" cols="45" rows="4" placeholder="' . _x( 'Comment', 'noun', 'dlpro' ) . '" aria-required="true">' .
		'</textarea></p>',

		'fields'        => apply_filters( 'comment_form_default_fields', $fields ),
	);
	comment_form( $args );
	?>

</div><!-- #comments -->
