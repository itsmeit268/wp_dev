<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *  
 */
 

global $current_user, $wp_roles, $opt_themes; 
get_currentuserinfo();
/* Load the registration file. */
require_once( ABSPATH . WPINC . '/registration.php' );
$request 	= $_SERVER["HTTP_REFERER"];
$error 		= array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = _e('The passwords you entered do not match.  Your password was not updated.', THEMES_NAMES);
    }
    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
       wp_update_user( array ('ID' => $current_user->ID, 'user_url' => esc_attr( $_POST['url'] )));
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = _e('The Email you entered is not valid.  please try again.', THEMES_NAMES);
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = _e('This email is already used by another user.  try a different one.', THEMES_NAMES);
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }
    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['display_name'] ) )
        wp_update_user(array('ID' => $current_user->ID, 'display_name' => esc_attr( $_POST['display_name'] )));
      update_user_meta($current_user->ID, 'display_name' , esc_attr( $_POST['display_name'] ));
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
	
    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_settings('siteurl').'?updated=true' ); exit;
    }       
}
if ( !defined('ABSPATH')) exit;
get_header(); 
/*
Display user registration date
https://wordpress.stackexchange.com/a/386814
*/
global $wpdb, $post, $wp_query, $opt_themes, $the_query;
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$passthis_id		= $curauth->ID;
$post_author_id		= get_post_field( 'post_author', $post->ID );
$registered_date	= get_the_author_meta( 'user_registered', $passthis_id );
$registered			= date( 'j F Y, H:i', strtotime($registered_date));
$user_id 			= get_the_author_meta('ID'); 
function get_roles($id) {
    $user = new WP_User($id);
    return array_shift($user->roles);
}
/*
https://blog.ashfame.com/2011/01/show-recent-comments-particular-user-wordpress/
https://wordpress.stackexchange.com/questions/381896/display-the-list-of-users-comments-the-post-title-date
*/
add_shortcode ( 'show_recent_comments', 'show_recent_comments_handler' );

function show_recent_comments_handler( $atts, $content = null ){
    extract( shortcode_atts( array( 
        "count" => -999,
        "pretty_permalink" => 0
        ), $atts ));

    $output = ''; // this holds the output
    $request = $_SERVER["HTTP_REFERER"];
    
    if ( is_user_logged_in() ) {
        global $current_user;
        get_currentuserinfo();

        $args = array(
            'user_id' => $current_user->ID,
            'number' => $count, // how many comments to retrieve
            'status' => 'approve'
            );

        $comments = get_comments( $args );
        if ( $comments ) {
            $output.= "<ul>";
            foreach ( $comments as $c ) {
            $output.= '<li>';

            $output.= '';
            //$output.= "<ul>";

            if ( $pretty_permalink ) // uses a lot more queries (not recommended)
                $output.= '<a href="'.get_comment_link( $c->comment_ID ).'">';
            else
                $output.= '<a href="'.get_settings('siteurl').'/?p='.$c->comment_post_ID.'#comment-'.$c->comment_ID.'">';        
            $output.=''. $c->comment_content .'';
            $output.= '</a> <br>'.get_the_title($c->comment_post_ID).' <!--('.mysql2date('j F Y', $c->comment_date, $translate).')-->';
            //$output.= '</ul>';
            $output.= "</li>";
            }
            $output.= '</ul>';
        }
    } else {
        $output.= "<p>"._e('logged in to see your comments', THEMES_NAMES);
        $output.= ' <a href="'.get_settings('siteurl').'/wp-login.php?redirect_to='.get_settings('siteurl').'">Login Now &rarr;</a></p>';
    }
    return $output;
} 
?>
 
 
<link id="author-style" href="<?php echo get_template_directory_uri(); ?>/assets/css/author.css" type="text/css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/author.min.js"></script>
 

<script>
var show=function(t){t.style.display="block"},hide=function(t){t.style.display="none"},toggle=function(t){"block"!==window.getComputedStyle(t).display?show(t):hide(t)};document.addEventListener("click",function(t){if(t.target.classList.contains("toggle")){t.preventDefault();var e=document.querySelector(t.target.hash);e&&toggle(e)}},!1);
</script>

<div class="page-sys page-user">
	<section class="section">	
	 
	<form method="post" name="userinfo" id="userinfo" enctype="multipart/form-data" action="">
		
		<div class="wrp-min block-list">
		<div class="block" style="margin-bottom: 40px;">
		<div class="userpage_head <?php if(is_user_online($passthis_id)){ echo 'online'; } else { echo 'offline'; } ?>">
		<div class="userpage-main-info">
		<div class="userpage-status"><?php echo get_roles($user_id); ?></div>		
		<div class="userpage-main-circle">		 


		<i class="avatar fit-cover">
		<img src="<?php echo get_avatar_url( $curauth->user_email); ?>" alt="<?php echo $curauth->user_login; ?>"></i>
		<?php
		if(get_query_var('author_name')) {
			$curauth = get_user_by('slug', get_query_var('author_name'));
		} else {
			$curauth = get_userdata(get_query_var('author'));
		}
		get_currentuserinfo();
		if( $curauth->ID == $user_ID) { ?> 
		<button class="user_edit btn c-icon s-button" type="button" data-toggle="modal" data-target="#userset">
		<svg width="24" height="24"><use xlink:href="#i__edit"></use></svg></button>
		<?php } ?>
		<div class="user_status"><span class="c-muted uppercase small"><?php if(is_user_online($passthis_id)){ _e('online', THEMES_NAMES); } else { _e('offline', THEMES_NAMES); } ?></span></div>
		<svg version="1.1" viewBox="0 0 640 640" width="640" height="640">
		<style type="text/css">.st0{ animation: circle_rotate 12s infinite linear; transform-origin: 50% 50%; fill:none;stroke:var(--color_svg);stroke-width:1;stroke-linecap:round;stroke-miterlimit:10;stroke-dasharray:358.478,200.7477; }.st1{ animation: circle_rotate 18s infinite linear; transform-origin: 50% 50%; fill:none;stroke:var(--color_svg);stroke-width:1;stroke-linecap:round;stroke-miterlimit:10;stroke-dasharray:428.294,239.8446; }@keyframes circle_rotate { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } } </style>
		<circle class="st0" cx="320" cy="320" r="178"></circle>
		<circle class="st1" cx="320" cy="320" r="319"></circle>
		</svg>
		</div>
		<div class="userpage-main-names">
		<h1 class="title"><?php echo $curauth->user_login; ?></h1>
		<div class="fullname"><?php echo $curauth->display_name; ?></div>
		</div>
		</div>
		</div>
		<div class="b-cont">
		<ul class="userpage-addon">
		<li>
		<div class="item">
		<span class="uppercase muted small"><?php _e('Registered', THEMES_NAMES); ?></span>
		<div class="fw-b"><?php echo $registered; ?></div>
		
		</div>
		</li>
		<li>
		<div class="item">
		<span class="uppercase muted small"><?php _e('Last Activity', THEMES_NAMES); ?></span>
		<div class="fw-b"> 
		
		<?php
        global $userdata;
        get_currentuserinfo(); 
        get_last_login($passthis_id); 
		?>
		<noscript>
		<?php
		// how many days since last login
		global $current_user;
		get_currentuserinfo();		 
		$now 			= time();
		$last_login 	= iiwp_get_last_login($current_user->ID,true);
		$datediff 		= $now - $last_login;		 
		echo '<p> ('.floor($datediff/(60*60*24)).') </p>';
		?>
		<?php		
		$userMeta = get_user_meta( $current_user->ID, '_last_login', false );
		$lastLogin = $userMeta[0];
		echo date('j F Y, H:i', $lastLogin);		 
		?>
		</noscript>
		</div>
		</div>
		</li>
		<li>
		<div class="item">
		<span class="uppercase muted small"><?php _e('Published', THEMES_NAMES); ?></span>
		<div class="fw-b"><a class="toggle" href="#allpost"><?php echo count_user_posts( $curauth->ID, 'post', false ); ?></a></div>
		<div class="toggle-content" id="allpost" style="display:none;">
		<?php
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		?>		 
		<ul>
		<?php
		if ( is_user_logged_in() ) {		
		$args = array(
			'author' 			=> $curauth->ID,
			'post_type' 		=> 'post',
			'posts_per_page' 	=> -99,
		);
		$author_posts = new WP_Query( $args );
		if( $author_posts->have_posts() ) {
		while( $author_posts->have_posts() ) {
		$author_posts->the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php } wp_reset_postdata(); } 
		} else { ?>
        <p><?php _e('logged in to see your post', THEMES_NAMES); ?><br>
         <a href="<?php echo get_settings('siteurl'); ?>/wp-login.php?redirect_to=<?php echo get_settings('siteurl'); ?>"><?php _e('Login Now', THEMES_NAMES); ?> &rarr;</a></p>
		<?php } ?>
		</ul>
		</div>
		</div>
		</li>
		<li>
		<div class="item">
		<span class="uppercase muted small"><?php _e('Comments', THEMES_NAMES); ?></span>
		<div class="fw-b"><a class="toggle" href="#allcomments"><?php echo get_user_comment_counts( $curauth->ID ); ?></a></div>
		<div class="toggle-content" id="allcomments" style="display:none;">
		  <?php echo do_shortcode( '[show_recent_comments pretty_permalink=1]' ); ?> 
		</div>
		
		</div>
		</li>
		</ul>
		<div class="userpage-addon-foot" style="padding-bottom: 2rem;">
		<?php if($curauth->description){ echo $curauth->description; } else { ?>
		<?php _e('Add Your Biographical Info', THEMES_NAMES); ?>
		<?php } ?>
		</div>
		</div>
		</div>
		</div>

				<div class="modal fade" id="userset" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<svg width="24" height="24"><use xlink:href="#i__close"></use></svg>
				</button>
				<h3 class="modal-title"><?php _e('Settings account', THEMES_NAMES); ?></h3>
				</div>
				<div class="modal-body" id="options">
				
				<div class="form-group">
				<label class="c-muted" for="fullname"><?php _e('Username', THEMES_NAMES); ?></label>
				<input class="form-control" type="text" maxlength="50" name="account" id="account" value="<?php echo $current_user->user_login ?>" readonly="">
				</div>
							
				<div class="form-group">
				<label class="c-muted" for="email"><?php _e('E-Mail', THEMES_NAMES); ?></label>
				<input class="form-control" type="email" maxlength="50" name="email" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" required="">
				</div>
				
				<div class="form-group">
				<label class="c-muted" for="first-name"><?php _e('First Names', THEMES_NAMES); ?></label>
				<input class="form-control" type="text" maxlength="50" name="first-name" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" required="">
				</div>
				
				<div class="form-group">
				<label class="c-muted" for="last-name"><?php _e('Last Names', THEMES_NAMES); ?></label>
				<input class="form-control" type="text" maxlength="50" name="last-name" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" required="">
				</div>

					
				<div class="form-group">
				<label class="c-muted" for="display_name"><?php _e('Display Nickname Publicly', THEMES_NAMES); ?></label>
				<div class="bf-inline-items">  
				<select class="item" name="display_name" id="display_name"><br/>
				<?php
					$public_display = array();
					$public_display['display_nickname']  = $current_user->nickname;
					$public_display['display_username']  = $current_user->user_login;
					if ( !empty($current_user->first_name) )
						$public_display['display_firstname'] = $current_user->first_name;
					if ( !empty($current_user->last_name) )
						$public_display['display_lastname'] = $current_user->last_name;
					if ( !empty($current_user->first_name) && !empty($current_user->last_name) ) {
						$public_display['display_firstlast'] = $current_user->first_name . ' ' . $current_user->last_name;
						$public_display['display_lastfirst'] = $current_user->last_name . ' ' . $current_user->first_name;
					}
					if ( ! in_array( $current_user->display_name, $public_display ) ) // Only add this if it isn't duplicated elsewhere
					$public_display = array( 'display_displayname' => $current_user->display_name ) + $public_display;
					$public_display = array_map( 'trim', $public_display );
					$public_display = array_unique( $public_display );
					foreach ( $public_display as $id => $item ) {
				?>
					<option <?php selected( $current_user->display_name, $item ); ?>><?php echo $item; ?></option>
				<?php } ?>
				</select> 
				</div>
				</div>
				  
				<div class="form-group">
				<label class="c-muted" for="pass1"><?php _e('New Password', THEMES_NAMES); ?></label>
				<input class="form-control" type="password" name="pass1" id="pass1">
				</div>
				<div class="form-group">
				<label class="c-muted" for="pass2"><?php _e('Repeat new password', THEMES_NAMES); ?></label>
				<input class="form-control" type="password" name="pass2" id="pass2">
				</div>
				  
				  
				<div class="form-group">
				<label class="c-muted" for="description"><?php _e('Biographical Information', THEMES_NAMES); ?></label>
				<textarea class="form-control" name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                </div>
                    
					
				<noscript>
				<hr class="my-4">
				<div class="form-group" id="wp-user-avatars-actions">
				<label class="c-muted" for="wp-user-avatars">Upload your avatar</label>
				<input type="file" name="wp-user-avatars" id="wp-user-avatars" class="form-control">
			 
				</div>
				<div class="form-group">
				<label class="c-muted" for="image">Used Gravatar</label>
				<input type="text" name="gravatar" id="gravatar" value="" class="form-control">
				</div>
				<div class="custom-control custom-checkbox">
				<input type="checkbox" name="del_foto" class="custom-control-input" value="yes" id="del_foto">
				<label class="custom-control-label" for="del_foto">Delete avatar</label>
				</div>
				</noscript>
				 
				</div>
				<div class="modal-footer btn-group">
				<button class="btn btn-block s-button" type="submit" name="submit"><?php _e('Save', THEMES_NAMES); ?></button>
				<button type="button" class="btn btn-block s-button" data-dismiss="modal"><?php _e('Cancel', THEMES_NAMES); ?></button>
				<?php do_action('edit_user_profile',$current_user);  ?>
                <?php wp_nonce_field( 'update-user_'. $current_user->ID ) ?>
                <input name="action" type="hidden" id="action" value="update-user" />
						
				</div>
				</div>
				</div>
				</div>
				
						 

	</form>
	 
	</section>
</div>
 
<svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>    
<symbol id="i__edit" viewBox="0 0 24 24">
<path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
</symbol> 
</defs>
</svg>

<?php 
get_footer();
