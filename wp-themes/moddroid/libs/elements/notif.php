<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
function get_remote_html( $url )
{
	$response = wp_remote_get( $url );
	if ( is_wp_error( $response ) ) {
		return;
	}
	$html = wp_remote_retrieve_body( $response );
	if ( is_wp_error( $html ) ) {
		return;
	}
	return $html;
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function general_admin_notice()
{
	global $pagenow;
	if ( $pagenow == 'index.php' ) { }
	echo '

';
}

if ( ! empty( get_option( 'my_update_statuss' ) ) ) {
	add_action( 'admin_notices', 'my_update_notices' );
}

function my_update_notices()
{
?>
<div class="notice notice-success">
	<p>The update was completed successfully!</p>
</div>
<?php
}
add_action( 'wp_ajax_my_dismiss_notice', 'notification_exthemes_1' );



function add_dismissible()
{
?>
<div id="debug">
<div style='display:none' class='notice my-dismiss-notice is-dismissible notifications teal'>
	<span class="title">
		<i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;Info</span> Please Deactivate and Delete "Exthemes APK Autopost" Plugins.
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/plugins.php" style="color: chartreuse;">click here</a>

</div>
<div style='display:none'  class="notice my-dismiss-notice is-dismissible notifications success">
	<span class="title">
		<i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;Info</span> Before you updates.. Please back up your theme when you are done customizing your themes, as errors in your themes are not the responsibility of the developers
</div> 
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script> 
<style>.notifications button.notice-dismiss::before{color: red !important}section{width: 100%;overflow: hidden}.notifications{height: 40px;/* border-radius: 2em 1em 4em / 0.5em 3em */;color: white;line-height: 40px;overflow: hidden;animation: reveal 1 2s;font-size: 12px}.notifications .title{margin-right: 15px;padding: 0px 15px;line-height: 40px;display: inline-block}.notifications .close{background: rgba(255,255,255,0.2);padding: 0px 15px;float: right;line-height: 40px;display: inline-block;color: white}.notifications .close:hover{cursor: pointer}.notifications.closed{transform: translate(0px, -50px);transition: 0.7s;display: none}@keyframes reveal{0%{transform: translate(0px, -50px)}50%{transform: translate(0px, -50px)}100%{transform: translate(0px, 0px)}}.notifications.success{background: crimson;text-transform: capitalize}.notifications.success .title{background: firebrick;font-size: 13px}.notifications.error{background: #e74c3c}.notifications.error .title{background: black}.notifications.teal{background: teal;font-size: 18px}.notifications.teal .title{background: #003333}.notifications.warning{background: #f1c40f}.notifications.warning .title{background: black}.notifications.maroon{background: maroon}.notifications.maroon a{color: chartreuse}.notifications.maroon .title{background: darkgreen}.notifications.normal{background: #3498db}.notifications.normal .title{background: black}</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php
}


add_action( 'admin_enqueue_scripts', 'add_script' );

function add_script()
{
	wp_register_script( 'notice-update', get_template_directory_uri() . '/assets/js/ds.js','','1.0', false );


	wp_localize_script( 'notice-update', 'notice_params', array(
	ajaxurl => get_admin_url() . 'admin-ajax.php',
	));

	wp_enqueue_script(  'notice-update' );
}
function notification_exthemes_1()
{
	update_option( 'notification_exthemes_1', true );
}

function exthemes_notice_update()
{
	$url = EXTHEMES_DEMO_URL.'apis.json?theme='.EX_THEMES_NAMES2_;
	$data = get_remote_html( $url );
	$result = json_decode($data, TRUE);
	if ( $result && EXTHEMES_VERSION < $result['version'] ) {
?><?php add_thickbox(); ?>
<?php $user_locale = strstr(get_user_locale(), '_', true); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div id="debug">
<section>
	<div class="notification success">
		<span class="title">
			<i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;Info</span> Before you updates.. Please back up your theme when you are done customizing your themes, as errors in your themes are not the responsibility of the developers
		<span class="close">X</span>
	</div>
</section>
<section>
	<div class="notification maroon">
		<span class="title">
			<i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;Info</span> You Still Using <?php echo EX_THEMES_NAMES_; ?> v<?php echo EXTHEMES_VERSION; ?>, New Version Theme <?php echo EX_THEMES_NAMES_; ?> v<?php echo $result['version']; ?> is Available. 
		<a href="<?php echo EXTHEMES_DEMO_URL; ?>changelog.php?theme=<?php echo EX_THEMES_NAMES2_; ?>&lang=<?php echo $user_locale; ?>&TB_iframe=true&width=550&height=450" class="thickbox">Check Out What's New v<?php echo $result['version']; ?></a>.
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/themes.php" >Updates Now</a> or Download <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank" >HERE</a> For Manual Upload
		<span class="close">X</span>
	</div>
</section>
</div>
<span class="toggle float"><i class="fa fa-remove my-float"></i></span>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>.float{position:fixed;width:30px;height:30px;bottom:20px;right:10px;background-color:white;color:black;border-radius:50px;text-align:center;font-size:15px;box-shadow: 2px 2px 3px #999;z-index:100}.my-float{margin-top:8px}section{width: 100%;overflow: hidden}.notification{width: 98%;height: 40px;/* border-radius: 2em 1em 4em / 0.5em 3em */;color: white;line-height: 40px;overflow: hidden;animation: reveal 1 2s;font-size: 12px}.notification .title{margin-right: 15px;padding: 0px 15px;line-height: 40px;display: inline-block}.notification .close{background: rgba(255,255,255,0.2);padding: 0px 15px;float: right;line-height: 40px;display: inline-block;color: white}.notification .close:hover{cursor: pointer}.notification.closed{transform: translate(0px, -50px);transition: 0.7s;display: none}@keyframes reveal{0%{transform: translate(0px, -50px)}50%{transform: translate(0px, -50px)}100%{transform: translate(0px, 0px)}}.notification.success{background: crimson;text-transform: capitalize}.notification.success .title{background: firebrick}.notification.error{background: #e74c3c}.notification.error .title{background: black}.notification.teal{background: teal}.notification.teal .title{background: #003333}.notification.warning{background: #f1c40f}.notification.warning .title{background: black}.notification.maroon{background: maroon}.notification.maroon a{color: chartreuse}.notification.maroon .title{background: darkgreen}.notification.normal{background: #3498db}.notification.normal .title{background: black}</style>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'> </script>
<script>
	$(".close").click(function() {
		$(this).parent().addClass("closed");
	})

	 $('.Show').click(function() {
		 $('#debug').show(500);
		 $('.Show').hide(0);
		 $('.Hide').show(0);
	 });
	 $('.Hide').click(function() {
		 $('#debug').hide(500);
		 $('.Show').show(0);
		 $('.Hide').hide(0);
	 });
	 $('.toggle').click(function() {
		 $('#debug').toggle('slow');
	 });
 </script>
<?php }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_action( 'admin_notices', 'exthemes_notice_update' );