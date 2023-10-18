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
// Add the Meta Boxes
function add_post_metaboxes() {
	global $post; 
    $article_content				= get_post_meta( $post->ID, 'wp_article_content',  true );
    add_meta_box( 'wp_apk_details',  __( 'App Details', THEMES_NAMES ), 'ex_themes_apk_details_', 'post', 'normal' );
    add_meta_box( 'repeatable-fields',  __( 'Download Link Box', THEMES_NAMES ), 'download_link_box', 'post', 'normal' );    
	if ($article_content) {
    add_meta_box( 'wp_desc', __( 'Entry Content', THEMES_NAMES ), 'apk_entry_content', 'post', 'normal', 'high');
	}  
	add_meta_box('versions', __( 'Version', THEMES_NAMES ), 'callback_versions', 'post', 'normal');    
}
add_action( 'add_meta_boxes', 'add_post_metaboxes', 0 );

add_action("manage_posts_custom_column",  "wpwm_custom_columns");
add_filter("manage_edit-post_columns", "wpwm_edit_columns");
function wpwm_edit_columns($columns){
    $columns = array_merge(array("poster" => "Poster"), $columns);
    return $columns;
}
function wpwm_custom_columns($column){
    global $post;
    switch ($column) {
        case "poster":
            echo get_the_post_thumbnail( $post->ID, array(100, 100) );
            break;
    }
}

function callback_versions($post) {
global $opt_themes, $wpdb, $post, $wp_query;
$search						= get_post_meta( $post->ID, 'wp_title_GP', true );
$search						= preg_replace('/[^A-Za-z0-9\-]/', ' ', $search);
$wp_GP_ID					= get_post_meta( $post->ID, 'wp_GP_ID', true );
$version_gp					= get_post_meta( $post->ID, 'wp_version_GP', true );
$version_sc					= get_post_meta( get_the_ID(), 'wp_version', true );				
//if ( $version_gp === FALSE or $version_gp == '' ) $version_gp = $version_sc;
$appname_on					= $opt_themes['title_app_name_active_'];
$title						= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt					= get_the_title(); 
if($wp_GP_ID){ 
 
?>
 
	<table class="table_s" style="width:100%;">
		<thead>
			<tr>
				<th style="width:50px;" id="poster"><?php _e('Poster', THEMES_NAMES); ?></th>
				<th><?php _e('Version', THEMES_NAMES); ?></th>
				<th><?php _e('Title', THEMES_NAMES); ?></th>
				<th><?php _e('Update Date', THEMES_NAMES); ?></th>
				<th><?php _e('Edit', THEMES_NAMES); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php		 
		$arg_version = array(
		'post_type'			=> 'post',
		'posts_per_page'	=> -1, 
		'meta_key'			=> 'wp_GP_ID', 
		'meta_value'		=> $wp_GP_ID,
		'orderby'			=> $version_gp,
		'order'				=> 'DESC',
		);
		$post_version = new WP_Query($arg_version);
		while ( $post_version->have_posts() ) : 
		$post_version->the_post();
		
		$image_id_alt					= get_post_thumbnail_id($post->ID); 
		$image_idx						= get_post_thumbnail_id(); 
		$fullx							= 'post_thumb_version'; 
		$image_urlx						= wp_get_attachment_image_src($image_idx, $fullx, true); 
		$imagex							= $image_urlx[0];
        $version_gp			    		= get_post_meta( $post->ID, 'wp_version_GP', true );
        $version_sc		    			= get_post_meta( get_the_ID(), 'wp_version', true );	
		//if ( $versionX1 === FALSE or $versionX1 == '' ) $versionX1 = $version;		
		$mods							= get_post_meta( get_the_ID(), 'wp_mods', true );
		$updates						= get_the_modified_time('F j, Y');
		$updates_app					= get_post_meta( $post->ID, 'wp_updates_GP', true );
		$title_gp						= get_post_meta( $post->ID, 'wp_title_GP', true );
		$sizes							= get_post_meta( $post->ID, 'wp_sizes', true ); 
		$sizes_alt						= get_post_meta( $post->ID, 'wp_sizes_GP', true );
		if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizes_alt;		
        $appname_on				    	= $opt_themes['title_app_name_active_'];
        $title					    	= get_post_meta( $post->ID, 'wp_title_GP', true );
        $title_alt				    	= get_the_title(); 
		$poster_gp						= get_post_meta( $post->ID, 'wp_poster_GP', true );
                
		?>
		<tr>
		<td id="poster">
		<img src="<?php if($poster_gp){ echo $poster_gp; } else { echo $imagex; } ?>" width="50px" height="50px" />
		</td>
		<td>
		v.<?php echo $version_gp; ?>
		</td>
		<td><?php echo $title_gp; ?></td>
		<td><?php echo $updates; ?></td>
		<td>
		<a href="<?php echo admin_url( 'post.php?action=edit&post='.$post->ID ) ?>"><?php _e('Edit', THEMES_NAMES); ?></a>
		</td>
		</tr>
		<?php 
		endwhile; 
		wp_reset_query(); 
		?>  	
		</tbody>
	</table>
 
	<style>.table_s {border-collapse: collapse;}.table_s td, .table_s th {border: 1px solid #ddd;padding: 10px;text-align: left;}.table_s th {border: 0;background: #F2F2F2;}@media (max-width: 400px)  {.table_s #poster {display:none}}</style>

<?php
 }}

function apk_entry_content() {
	global $post; 
    $article_content				= get_post_meta( $post->ID, 'wp_article_content',  true );
?>
	<center>
	<p><strong style="text-transform:capitalize;color:black"><?php _e('Here for Default Contents from Sources', THEMES_NAMES); ?>
	<br> <?php _e('Please copy this if you want use this contents', THEMES_NAMES); ?> </strong></p>
	</center> 
	<?php wp_editor(($article_content), 'wp_article_content', 
		array(
		  'textarea_name' => 'wp_article_content', 
		  'media_buttons' => false,
		  'textarea_rows' => 5,
		  'tabindex' => 3,
		  'tinymce' => array(
			'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
		  ),
		  )); 

}

function ex_themes_apk_details_() {
    global $post;
    $sources					= get_post_meta( $post->ID, 'wp_source_url', true );
    if(!$sources) $sources		= ' ';
    $plugin_url					= WP_PLUGIN_URL . '/'. str_replace( basename( __FILE__ ), "", plugin_basename(__FILE__) );
    $download					= get_post_meta( $post->ID, 'wp_downloadlink', true );
    $download2					= get_post_meta( $post->ID, 'wp_downloadlink2', true );
    $download3					= get_post_meta( $post->ID, 'wp_downloadlink3', true );
    if(!$download) $download	= ' ';
    $namedownloadlink			= get_post_meta( $post->ID, 'wp_namedownloadlink', true );
    $namedownloadlink2			= get_post_meta( $post->ID, 'wp_namedownloadlink2', true );
    if ( $namedownloadlink === FALSE or $namedownloadlink == '' ) $namedownloadlink = $namedownloadlink2;
    $judul						= get_post_meta( $post->ID, 'wp_title_GP',  true );
    if(!$judul) $judul			= ' ';
    $titleID					= get_post_meta( $post->ID, 'wp_GP_ID', true );
    if(!$titleID) $titleID		= ' ';
    $titleID2					= get_post_meta( $post->ID, 'wp_GP_ID', true );
    if(!$titleID2) $titleID2	= ' ';
    $developer					= get_post_meta( $post->ID, 'wp_developers_GP', true );
    $developerX					= get_post_meta( $post->ID, 'wp_developers2_GP', true );
    if ( $developer === FALSE or $developer == '' ) $developer = $developerX;
	
	
    $version_web				= get_post_meta( $post->ID, 'wp_version', true );
    $version					= get_post_meta( $post->ID, 'wp_version_GP', true );	
    if ( $version_web === FALSE or $version_web == '' ) $version_web = $version;
	
    $installs					= get_post_meta( $post->ID, 'wp_installs_GP', true );
    $installsX					= get_post_meta( $post->ID, 'wp_installsapgk', true );
    if ( $installs === FALSE or $installs == '' ) $installs = $installsX;
    $requires					= get_post_meta( $post->ID, 'wp_requires_GP', true );
    $requiresX					= '4.4 and up';
    if ( $requires === FALSE or $requires == '' ) $requires = $requiresX;
    $updates					= get_post_meta( $post->ID, 'wp_updates_GP', true );
    $updatesX					= get_post_meta( $post->ID, 'wp_updateapgk', true );
    if ( $updates === FALSE or $updates == '' ) $updates = $updatesX;
    $contentrated				= get_post_meta( $post->ID, 'wp_contentrated_GP', true );
    $contentratedX				= get_post_meta( $post->ID, 'wp_contentratingapgk', true );
    if ( $contentrated === FALSE or $contentrated == '' ) $contentrated = $contentratedX;
    $rated						= get_post_meta( $post->ID, 'wp_rated_GP', true );
    $ratedX						= get_post_meta( $post->ID, 'wp_ratedapgk', true );
    if ( $rated === FALSE or $rated == '' ) $rated = $ratedX;
    $ratings					= get_post_meta( $post->ID, 'wp_ratings_GP', true );
    $ratingsX					= get_post_meta( $post->ID, 'wp_ratingsapgk', true );
    if ( $ratings === FALSE or $ratings == '' ) $ratings = $ratingsX;
    $persenapgk					= get_post_meta( $post->ID, 'wp_persen_GP', true );
    $persenapgkX				= mt_rand(990,1925);
    if ( $persenapgk === FALSE or $persenapgk == '' ) $persenapgk = $persenapgkX;
    $whatnews					= get_post_meta( $post->ID, 'wp_whatnews_GP', true );
    if(!$whatnews) $whatnews	= ' ';
    $youtube					= get_post_meta( $post->ID, 'wp_youtube_GP', true );
    $youtubeX					= get_post_meta( $post->ID, 'wp_youtube_GP', true );	
    if ( $youtube === FALSE or $youtube == '' ) $youtube = $youtubeX;
    $sizes						= get_post_meta( $post->ID, 'wp_sizes', true );
    $sizesX						= get_post_meta( $post->ID, 'wp_sizes_GP', true );
    if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX;
    $desck						= get_post_meta( $post->ID, 'wp_desck_GP', true );
    $desckX						= get_post_meta( $post->ID, 'wp_desck_GP', true );
    if ( $desck === FALSE or $desck == '' ) $desck = $desckX;
    $modfeatures				= get_post_meta( $post->ID, 'wp_mods', true ); 
    $postergp					= get_post_meta( $post->ID, 'wp_poster_GP', true );
    $gambarX21					= get_post_meta( $post->ID, 'wp_images_GP', true );
    $gambarX212					= get_post_meta( $post->ID, 'wp_images_GP1', true );
    if ( $gambarX21 === FALSE or $gambarX21 == '' ) $gambarX21 = $gambarX212;
    $modfeatures				= get_post_meta( $post->ID, 'wp_mods', true );
    $modfeatures2				= get_post_meta( $post->ID, 'wp_mods2', true );
    $newupdates					= get_post_meta( $post->ID, 'wp_newupdates', true );
    $wp_category_app			= get_post_meta( $post->ID, 'wp_category_app', true );
	$wp_mods_post				= get_post_meta( $post->ID, 'wp_mods_post', true );
    $wp_mods_post2				= get_post_meta( $post->ID, 'wp_mods_post2', true );
    $wp_mods_post3				= get_post_meta( $post->ID, 'wp_mods_post3', true );
    $wp_title_wp_mods			= get_post_meta( $post->ID, 'wp_title_wp_mods', true );
    $wp_title_wp_mods_2			= get_post_meta( $post->ID, 'wp_title_wp_mods_2', true );
    $wp_title_wp_mods_3			= get_post_meta( $post->ID, 'wp_title_wp_mods_3', true );
    $downloadapkxapkpremiers	= get_post_meta( $post->ID, 'wp_downloadapkxapkpremier', true );
    $downloadapkxapkg			= get_post_meta( $post->ID, 'wp_downloadapkxapkg', true );
    if ( $downloadapkxapkpremiers === FALSE or $downloadapkxapkpremiers == '' ) $downloadapkxapkpremiers = $downloadapkxapkg;
	get_template_part( '/libs/addons/assets/css/custom.tooltips' );
    ?>
	
	
<table class="responsive-table"> 
	<caption><?php _e('Add Your Details App Informations', THEMES_NAMES); ?></caption>
     
    <tbody>
	
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize">Stats <strong>New</strong> or <strong>Updates</strong></b>
			<a class="toggle" href="#news_updates">?</a>
			<p class="toggle-content" id="news_updates" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>
			type <strong>New</strong> for New post 
			<br>
			type <strong>Updates</strong> for update post. 
			<br>
			Or Anything You Wants
			<br>
			leave empty if you dont want
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_newupdates" value="<?= $newupdates ?>" />
			</td> 
		</tr>
		 
		<tr>
			<th scope="row">
			<b style="text-transform:capitalize" ><?php _e('Playstore ID', THEMES_NAMES); ?></b>
			<a class="toggle" href="#Playstore">?</a>
			<p class="toggle-content" id="Playstore" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>
			<strong>com.roblox.client</strong>
			<br><?php _e('If You Make It Empty.', THEMES_NAMES); ?>
			<br><?php _e('App Detail Info', THEMES_NAMES); ?> <strong><?php _e('not showing up', THEMES_NAMES); ?></strong>
			<br><?php _e('All Version', THEMES_NAMES); ?> <strong><?php _e('not showing up', THEMES_NAMES); ?></strong>
			</p>
			</th>
			<td data-title="Value"><input style="width:98%;" type="text" name="wp_GP_ID" value="<?= $titleID ?>" /></td> 
		</tr>
		
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('App Name', THEMES_NAMES); ?></b>
			<a class="toggle" href="#AppName">?</a>
			<p class="toggle-content" id="AppName" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>
			<strong>Roblox</strong> 
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_title_GP" value="<?= $judul ?>" />
			</td> 
		</tr>
		 
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('apps Google Play', THEMES_NAMES); ?></b>
			<a class="toggle" href="#AppsGooglePlay">?</a>
			<p class="toggle-content" id="AppsGooglePlay" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>
			<strong>https://play.google.com/store/apps/details?id=com.roblox.client</strong>
			<br>
			<?php _e('or copy this', THEMES_NAMES); ?> :   <br>
			<strong>https://play.google.com/store/apps/details?id=<?= $titleID ?>
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_GP_ID2" value="https://play.google.com/store/apps/details?id=<?= $titleID ?>" />
			</td> 
		</tr>
		
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('apps developers', TEXT_DOMAIN); ?></b>
			<a class="toggle" href="#wp_developers_GP">?</a>
			<p class="toggle-content" id="wp_developers_GP" style="display:none;">
			<?php _e('Example', TEXT_DOMAIN); ?> :  <br>
			<strong>Roblox Corporation</strong>
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_developers_GP" value="<?= $developer ?>" />
			</td> 
		</tr>

		 
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('Apps Version From Playstore', THEMES_NAMES); ?></b>
			<a class="toggle" href="#AppsVersionPlaystore">?</a>
			<p class="toggle-content" id="AppsVersionPlaystore" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>			
			<strong>2.522.280</strong>
			<br><?php _e('Dont Make It', THEMES_NAMES); ?> <strong><?php _e('Empty', THEMES_NAMES); ?></strong>
			<br><?php _e('if Empty All Version', THEMES_NAMES); ?> <strong><?php _e('not showing up', THEMES_NAMES); ?></strong>
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_version_GP" value="<?= $version ?>" />
			</td> 
		</tr>
		 
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('apps version from Sources', THEMES_NAMES); ?></b>
			<a class="toggle" href="#AppsVersionFromSources">?</a>
			<p class="toggle-content" id="AppsVersionFromSources" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>			
			<strong>2.522.280</strong>
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_version" value="<?= $version_web ?>" />
			</td> 
		</tr>
		 		
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('apps Poster', THEMES_NAMES); ?></b>
			<a class="toggle" href="#AppsPoster">?</a>
			<p class="toggle-content" id="AppsPoster" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>
			<strong>https://play-lh.googleusercontent.com/xxxxxx</strong>
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_poster_GP" value="<?= $postergp ?>" />
			</td> 
		</tr>
		
		<noscript>
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('apps background images', TEXT_DOMAIN); ?> </b>
			<a class="toggle" href="#wp_backgrounds_GP">?</a>
			<p class="toggle-content" id="wp_backgrounds_GP" style="display:none;">
			<?php _e('Example', TEXT_DOMAIN); ?> :  <br>
			<strong>https://play-lh.googleusercontent.com/xxxxxx</strong>
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_backgrounds_GP" value="<?= $background_gp ?>" />
			</td> 
		</tr>
		</noscript>
		
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('OS', THEMES_NAMES); ?> </b>
			<a class="toggle" href="#OSRequired">?</a>
			<p class="toggle-content" id="OSRequired" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>		
			<strong style='color: red;'>4.5</strong> 
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_requires_GP" value="<?= $requires ?>" />
			</td> 
		</tr>
		 
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('apps updates', THEMES_NAMES); ?></b>
			<a class="toggle" href="#Appsupdates">?</a>
			<p class="toggle-content" id="Appsupdates" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>		
			<strong>April 14, 2022</strong> 
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_updates_GP" value="<?= $updates ?>" />
			</td> 
		</tr>
		
		<tr>
			<th scope="row">		
			<b style="text-transform:capitalize"><?php _e('apps Size', THEMES_NAMES); ?> </b>
			<a class="toggle" href="#appsSize">?</a>
			<p class="toggle-content" id="appsSize" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>
			<strong>250 mb</strong> or <strong>1 gb</strong>
			<br>
			<?php _e('Not Format Like This', THEMES_NAMES); ?> <strong>250</strong> 
			</p>
			</th>
			<td data-title="Value">		
			<input style="width:98%"  type="text" name="wp_sizes" value="<?= $sizes ?>" />
			</td> 
		</tr>  
		<tr>
			<th scope="row"> 
			<b style="text-transform:capitalize"><?php _e('apps youtube id', THEMES_NAMES); ?> </b>
			<a class="toggle" href="#appsyoutubeid">?</a>
			<p class="toggle-content" id="appsyoutubeid" style="display:none;">
			<?php _e('Example', THEMES_NAMES); ?> :  <br>		
			<strong>T_rkoL9vt3g</strong> 
			<br>
			<?php _e('Not Format Like This', THEMES_NAMES); ?> <strong>https://youtube.com/watch?v=03DXtNlUGGg</strong>
			</p>
			</th>
			<td data-title="Value"> 
			<input style="width:98%"  type="text" name="wp_youtube_GP" value="<?= $youtube ?>" />
			</td> 
		</tr>
		 
	  
	  
    </tbody>
</table>
	
	<div id='metabox_mdr'>
	 
    <b style="text-transform:capitalize"><?php _e('App Description', THEMES_NAMES); ?></b>
    <p><?php wp_editor(  ($desck), 'wp_desck_GP', array('textarea_name' => 'wp_desck_GP', 'textarea_rows' => 5)); ?></p>
    <b style="text-transform:capitalize;"><?php _e('App What\'s News', THEMES_NAMES); ?> </b>
    <p><?php wp_editor(  ($whatnews), 'wp_whatnews_GP', array('textarea_name' => 'wp_whatnews_GP', 'textarea_rows' => 5)); ?></p>
    <b style="text-transform:capitalize"><?php _e('Mod Features 1', THEMES_NAMES); ?></b>
    <p><?php wp_editor(  ($modfeatures), 'wp_mods', array('textarea_name' => 'wp_mods', 'textarea_rows' => 5)); ?></p>
    <b style="text-transform:capitalize"><?php _e('Mod Features 2', THEMES_NAMES); ?></b>
    <p><?php wp_editor(  ($modfeatures2), 'wp_mods2', array('textarea_name' => 'wp_mods2', 'textarea_rows' => 5)); ?></p>
	</div>
    <hr>
	
	

<script>
var show=function(t){t.style.display="block"},hide=function(t){t.style.display="none"},toggle=function(t){"block"!==window.getComputedStyle(t).display?show(t):hide(t)};document.addEventListener("click",function(t){if(t.target.classList.contains("toggle")){t.preventDefault();var e=document.querySelector(t.target.hash);e&&toggle(e)}},!1);
</script>
<?php }
function callback_download($post){
    $downloadlinks						= get_post_meta($post->ID, 'wp_downloadlink2', true);
    $sizexx								= get_post_meta($post->ID, 'wp_sizes2', true);
    $namedownloadlinks					= get_post_meta($post->ID, 'wp_namedownloadlink2', true);	
	$namedownloadlinks					= preg_replace('/\s++/', ' ', $namedownloadlinks);
    $downloadlinks						= !empty($downloadlinks) ? $downloadlinks : array();
    $c									= 3;
    $input_upload						= '';
    wp_nonce_field( 'repeatable_meta_box_downloadlinks', 'repeatable_meta_box_downloadlinks' );
    ?>
    <script>jq1 = jQuery.noConflict();
        jq1(function($) {
            var count = <?php echo $c; ?>;
            $(document).on('click', '.remove-row', function(){
                $(this).parents('p').remove();
                count--;
            });
            $(".addImg").on('click', function(){
                $(".ElementImagenes").append('<p><input type="text" name="downloadlinks['+count+']" value="" class="regular-text upload"><?php echo @$input_upload; ?><a href="javascript:void(0)" class="button remove-row">Remove</a></p>');
                count++;
            });
        });
        jpp2 = jQuery.noConflict();
        jpp2(function($) {
            $('.upload_image_button').on( 'click', function() {
                formfield = $(this).prev('input');
                tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');
                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {
                    if($(html).attr('src')) {
                        imgurl = $(html).attr('src');
                    } else if ($(html).attr('href')) {
                        imgurl = $(html).attr('href');
                    }
                    formfield.val(imgurl);
                    tb_remove();
                    window.send_to_editor = oldFunc;
                };
                return false;
            });
        });
    </script>
	<?php if ($downloadlinks) { ?>
    <div class="ElementImagenes">
        <div class="download"></div>
        <table id="downloadlinks" width="100%" class="content-table">
            <thead>
            <tr>

            <th width="30%"><?php _e('Url Names', THEMES_NAMES); ?> <br>APK / ZIP / OBB</th>
            <th width="70%"><?php _e('Url Links', THEMES_NAMES); ?> <br>APK / ZIP / OBB</th>
            </tr>
            </thead>
            <tbody>
            <center>
                <p><strong style="text-transform:uppercase!important;color:#2271b1"><?php _e('Here for Default Download Links from Sources, you can\'t add or remove this.', THEMES_NAMES); ?> <br><?php _e('but you can copy this link for you insert to download link page', THEMES_NAMES); ?> </strong></p>
            </center>
            <?php
            $i = 0;
            if(count($downloadlinks)>5){
                foreach($downloadlinks as $elemento) { ?>
                    <tr>
                        <td><input type="text" name="namedownloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($namedownloadlinks[$i])) ? $namedownloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
                        <td><input type="text" name="downloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($downloadlinks[$i])) ? $downloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
                    </tr>
                    </tr>
                    <?php $i++; } ?>
            <?php } else {
                for($i=0;$i<3;$i++): ?>
                    <tr>
                        <td><input type="text" name="namedownloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($namedownloadlinks[$i])) ? $namedownloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
                        <td><input type="text" name="downloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($downloadlinks[$i])) ? $downloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
                    </tr>
                    </tr>
                <?php endfor; ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php }
}
function download_link_box() {
    global $post, $wpdb, $gets_data;
	
    $name_links_dl				= get_post_meta( $post->ID, 'name_links_dl', true );
	
    $downloadlink_happymood		= get_post_meta( $post->ID, 'wp_downloadlink', true );
	$namedownloadlink_happymood	= get_post_meta( $post->ID, 'wp_namedownloadlink', true );
	
    $downloadlink_ori			= get_post_meta( $post->ID, 'downloadlink_ori', true );
    $downloadlink_ori_1			= get_post_meta( $post->ID, 'downloadlink_ori_1', true );
    $downloadlink_ori_2			= get_post_meta( $post->ID, 'downloadlink_ori_2', true );
	$name_downloadlinks_ori		= get_post_meta( $post->ID, 'name_downloadlinks_ori', true );
	$name_downloadlinks_ori_1	= get_post_meta( $post->ID, 'name_downloadlinks_ori_1', true );
	$name_downloadlinks_ori_2	= get_post_meta( $post->ID, 'name_downloadlinks_ori_2', true );
	$size_downloadlinks_orig	= get_post_meta( $post->ID, 'size_downloadlinks_orig', true );
	$size_downloadlinks_orig_1	= get_post_meta( $post->ID, 'size_downloadlinks_orig_1', true );
	$size_downloadlinks_orig_2	= get_post_meta( $post->ID, 'size_downloadlinks_orig_2', true );

	
    $downloadlink_gma			= get_post_meta( $post->ID, 'downloadlink_gma', true );
    $downloadlink_gma_1			= get_post_meta( $post->ID, 'downloadlink_gma_1', true );
    $downloadlink_gma_2			= get_post_meta( $post->ID, 'downloadlink_gma_2', true );
    $downloadlink_gma_3			= get_post_meta( $post->ID, 'downloadlink_gma_3', true );
    $downloadlink_gma_4			= get_post_meta( $post->ID, 'downloadlink_gma_4', true );
    $downloadlink_gma_5			= get_post_meta( $post->ID, 'downloadlink_gma_5', true );
	
	
	$namedownloadlink_gma		= get_post_meta( $post->ID, 'name_downloadlinks_gma', true );
	$namedownloadlink_gma		= preg_replace('/\s+\s+/', ' ', $namedownloadlink_gma); 
	$namedownloadlink_gma_1		= get_post_meta( $post->ID, 'name_downloadlinks_gma_1', true );
	$namedownloadlink_gma_1		= preg_replace('/\s+\s+/', ' ', $namedownloadlink_gma_1); 
	$namedownloadlink_gma_2 	= get_post_meta( $post->ID, 'name_downloadlinks_gma_2', true );
	$namedownloadlink_gma_2		= preg_replace('/\s+\s+/', ' ', $namedownloadlink_gma_2); 
	$namedownloadlink_gma_3 	= get_post_meta( $post->ID, 'name_downloadlinks_gma_3', true );
	$namedownloadlink_gma_3		= preg_replace('/\s+\s+/', ' ', $namedownloadlink_gma_3); 
	$namedownloadlink_gma_4		= get_post_meta( $post->ID, 'name_downloadlinks_gma_4', true );
	$namedownloadlink_gma_4		= preg_replace('/\s+\s+/', ' ', $namedownloadlink_gma_4); 
	$namedownloadlink_gma_5		= get_post_meta( $post->ID, 'name_downloadlinks_gma_5', true );
	$namedownloadlink_gma_5		= preg_replace('/\s+\s+/', ' ', $namedownloadlink_gma_5); 
	
	
	$sizedownloadlink_gma		= get_post_meta( $post->ID, 'size_downloadlinks_gma', true );
	$sizedownloadlink_gma_1		= get_post_meta( $post->ID, 'size_downloadlinks_gma_1', true );
	$sizedownloadlink_gma_2		= get_post_meta( $post->ID, 'size_downloadlinks_gma_2', true );
	$sizedownloadlink_gma_3		= get_post_meta( $post->ID, 'size_downloadlinks_gma_3', true );
	$sizedownloadlink_gma_4		= get_post_meta( $post->ID, 'size_downloadlinks_gma_4', true );
	$sizedownloadlink_gma_5		= get_post_meta( $post->ID, 'size_downloadlinks_gma_5', true );
	
	
    $downloadapkpremiers		= get_post_meta( $post->ID, 'wp_downloadapkxapkpremier', true );
    $downloadapkxapkg			= get_post_meta( $post->ID, 'wp_downloadapkxapkg', true );
    if ( $downloadapkpremiers === FALSE or $downloadapkpremiers == '' ) $downloadapkpremiers = $downloadapkxapkg;
    $c							= 4; 
    
    $repeatable_fields			= get_post_meta($post->ID, 'repeatable_fields', true);
    $downloadlinks				= get_post_meta($post->ID, 'wp_downloadlink2', true);
    $downloadlinksZ1			= get_post_meta( $post->ID, 'wp_downloadlink', true );
    if ( $downloadlinks === FALSE or $downloadlinks == '' ) $downloadlinks = $downloadlinksZ1;
    $downloadlinks				= !empty($downloadlinks) ? $downloadlinks : array();
	
	
    $link_download_apksupport	= get_post_meta( $post->ID, 'link_download_apksupport', true );
	$name_download_apksupport	= get_post_meta( $post->ID, 'name_download_apksupport', true );
	$size_download_apksupport	= get_post_meta( $post->ID, 'size_download_apksupport', true );
	$type_download_apksupport	= get_post_meta( $post->ID, 'type_download_apksupport', true );

	$downloadlinks				= get_post_meta($post->ID, 'wp_downloadlink2', true);
    $sizexx						= get_post_meta($post->ID, 'wp_sizedownloadlink2', true);
    $sizexx_alt					= get_post_meta($post->ID, 'wp_sizes2', true);
	if ( $sizexx === FALSE or $sizexx == '' ) $sizexx = $sizexx_alt;
    $namedownloadlinks			= get_post_meta($post->ID, 'wp_namedownloadlink2', true);
	$namedownloadlinks			= preg_replace('/\s++/', ' ', $namedownloadlinks);
    $downloadlinks				= !empty($downloadlinks) ? $downloadlinks : array();
    $typexx						= get_post_meta($post->ID, 'wp_typedownloadlink2', true);

    wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );
	get_template_part( '/libs/addons/assets/css/custom.table' );
    ?>
	  
	<?php 
	global $post, $opt_themes;
	$no_jquery			= $opt_themes['no_jquery_post'];
	if ($no_jquery) {
	?>
	<script>
    var $exhemes_devs = jQuery.noConflict();   
	</script> 
	<?php } ?> 
    <script type="text/javascript">
    jQuery(document).ready(function($){$('.metabox_submit').click(function(e){e.preventDefault();$('#publish').click();});$('#add-row').on('click',function(){var row=$('.empty-row.screen-reader-text').clone(true);row.removeClass('empty-row screen-reader-text');row.insertBefore('#repeatable-fieldset-one tbody>tr:last');return false;});$('.remove-row').on('click',function(){$(this).parents('tr').remove();return false;});$('#repeatable-fieldset-one tbody').sortable({opacity:0.6,revert:true,cursor:'move',handle:'.sort'});});
    </script>
	
	<style>
	.content-table{border-collapse:collapse;margin:25px 0;font-size:0.9em;width:100%;border-radius:5px 5px 0 0;overflow:hidden;box-shadow:0 0 20px rgba(0,0,0,0.15)}.content-table thead tr{background-color:#2271b1;color:#ffffff;text-align:left;font-weight:bold;text-align:center}.content-table th,.content-table td{padding:12px 10px}.content-table tbody tr{border-bottom:1px solid #dddddd}.content-table tbody tr:nth-of-type(even){background-color:#f3f3f3}.content-table tbody tr:last-of-type{border-bottom:2px solid #2271b1}.content-table tbody tr.active-row{font-weight:bold;color:#2271b1}@media only screen and (max-width:800px){#no-table table,#no-table thead,#no-table tbody,#no-table th,#no-table td,#no-table tr{display:block}#no-table thead tr{position:absolute;top:-9999px;left:-9999px}#no-table tr{border:1px solid #ccc}#no-table td{border:none;border-bottom:1px solid #eee;position:relative;padding-left:50%;white-space:normal;text-align:left}#no-table td:before{position:absolute;top:25px;left:10px;width:25%;padding-right:10px;white-space:nowrap;text-align:left;font-weight:bold}#no-table td:before{content:attr(data-title)}input.meta_image_url{width:95%!important}.field_right{float:left;margin-top:20px}}
	</style>
	
	<style>
	@charset "UTF-8";.cmb2-wrap{margin:0}.cmb2-wrap input,.cmb2-wrap textarea{max-width:100%}.cmb2-wrap input[type=text].cmb2-oembed{width:100%}.cmb2-wrap textarea{width:500px;padding:8px}.cmb2-wrap textarea.cmb2-textarea-code{font-family:"Courier 10 Pitch",Courier,monospace;line-height:16px}.cmb2-wrap input.cmb2-text-small,.cmb2-wrap input.cmb2-timepicker{width:100px}.cmb2-wrap input.cmb2-text-money{width:90px}.cmb2-wrap input.cmb2-text-medium{width:230px}.cmb2-wrap input.cmb2-upload-file{width:65%}.cmb2-wrap input.ed_button{padding:2px 4px}.cmb2-wrap input:not([type=hidden])+.button-secondary,.cmb2-wrap input:not([type=hidden])+input,.cmb2-wrap input:not([type=hidden])+select{margin-left:20px}.cmb2-wrap ul{margin:0}.cmb2-wrap li{font-size:14px;line-height:16px;margin:1px 0 5px 0}.cmb2-wrap select{font-size:14px;margin-top:3px}.cmb2-wrap input:focus,.cmb2-wrap textarea:focus{background:#fffff8}.cmb2-wrap input[type=radio]{margin:0 5px 0 0;padding:0}.cmb2-wrap input[type=checkbox]{margin:0 5px 0 0;padding:0}.cmb2-wrap .button-secondary,.cmb2-wrap button{white-space:nowrap}.cmb2-wrap .mceLayout{border:1px solid #e9e9e9!important}.cmb2-wrap .mceIframeContainer{background:#fff}.cmb2-wrap .meta_mce{width:97%}.cmb2-wrap .meta_mce textarea{width:100%}.cmb2-wrap .cmb-multicheck-toggle{margin-top:-1em}.cmb2-wrap .wp-picker-clear.button,.cmb2-wrap .wp-picker-default.button{margin-left:6px;padding:2px 8px}.cmb2-wrap .cmb-row{margin:0}.cmb2-wrap .cmb-row:after{content:'';clear:both;display:block;width:100%}.cmb2-wrap .cmb-row.cmb-repeat .cmb2-metabox-description{padding-top:0;padding-bottom:1em}body.block-editor-page.branch-5-3 .cmb2-wrap .cmb-row .cmb2-radio-list input[type=radio]::before{margin:.1875rem}@media screen and (max-width:782px){body.block-editor-page.branch-5-3 .cmb2-wrap .cmb-row .cmb2-radio-list input[type=radio]::before{margin:.4375rem}}.cmb2-metabox{clear:both;margin:0}.cmb2-metabox .cmb-field-list>.cmb-row:first-of-type>.cmb-td,.cmb2-metabox .cmb-field-list>.cmb-row:first-of-type>.cmb-th,.cmb2-metabox>.cmb-row:first-of-type>.cmb-td,.cmb2-metabox>.cmb-row:first-of-type>.cmb-th{border:0}.cmb-add-row{margin:1.8em 0 0}.cmb-nested .cmb-td,.cmb-repeatable-group .cmb-th,.cmb-repeatable-group:first-of-type{border:0}.cmb-repeatable-group:last-of-type,.cmb-row:last-of-type,.cmb2-wrap .cmb-row:last-of-type{border-bottom:0}.cmb-repeatable-grouping{border:1px solid #e9e9e9;padding:0 1em}.cmb-repeatable-grouping.cmb-row{margin:0 0 .8em}.cmb-th{color:#222;float:left;font-weight:600;padding:20px 10px 20px 0;vertical-align:top;width:200px}@media (max-width:450px){.cmb-th{font-size:1.2em;display:block;float:none;padding-bottom:1em;text-align:left;width:100%}.cmb-th label{display:block;margin-top:0;margin-bottom:.5em}}.cmb-td{line-height:1.3;max-width:100%;padding:15px 10px;vertical-align:middle}.cmb-type-title .cmb-td{padding:0}.cmb-th label{display:block;padding:5px 0}.cmb-th+.cmb-td{float:left}.cmb-td .cmb-td{padding-bottom:1em}.cmb-remove-row{text-align:right}.empty-row.hidden{display:none}.cmb-repeat-table{background-color:#fafafa;border:1px solid #e1e1e1}.cmb-repeat-table .cmb-row.cmb-repeat-row{position:relative;counter-increment:el;margin:0;padding:10px 10px 10px 50px;border-bottom:none!important}.cmb-repeat-table .cmb-row.cmb-repeat-row+.cmb-repeat-row{border-top:solid 1px #e9e9e9}.cmb-repeat-table .cmb-row.cmb-repeat-row.ui-sortable-helper{outline:dashed 2px #e9e9e9!important}.cmb-repeat-table .cmb-row.cmb-repeat-row:before{content:counter(el);display:block;top:0;left:0;position:absolute;width:35px;height:100%;line-height:35px;cursor:move;color:#757575;text-align:center;border-right:solid 1px #e9e9e9}.cmb-repeat-table .cmb-row.cmb-repeat-row .cmb-td{margin:0;padding:0}.cmb-repeat-table+.cmb-add-row{margin:0}.cmb-repeat-table+.cmb-add-row:before{content:'';width:1px;height:1.6em;display:block;margin-left:17px;background-color:#dcdcdc}.cmb-repeat-table .cmb-remove-row{top:7px;right:7px;position:absolute;width:auto;margin-left:0;padding:0!important;display:none}.cmb-repeat-table .cmb-remove-row>.cmb-remove-row-button{font-size:20px;text-indent:-1000px;overflow:hidden;position:relative;height:auto;line-height:1;padding:0 10px 0}.cmb-repeat-table .cmb-remove-row>.cmb-remove-row-button:before{content:"ïŒµ";font-family:Dashicons;speak:none;font-weight:400;font-variant:normal;text-transform:none;line-height:1;-webkit-font-smoothing:antialiased;margin:0;text-indent:0;position:absolute;top:0;left:0;width:100%;height:100%;text-align:center}.cmb-repeat-table .cmb-repeat-row:hover .cmb-remove-row{display:block}.cmb-repeatable-group .cmb-th{padding:5px}.cmb-repeatable-group .cmb-group-title{background-color:#e9e9e9;padding:8px 12px 8px 2.2em;margin:0 -1em;min-height:1.5em;font-size:14px;line-height:1.4}.cmb-repeatable-group .cmb-group-title h4{border:0;margin:0;font-size:1.2em;font-weight:500;padding:.5em .75em}.cmb-repeatable-group .cmb-group-title .cmb-th{display:block;width:100%}.cmb-repeatable-group .cmb-group-description .cmb-th{font-size:1.2em;display:block;float:none;padding-bottom:1em;text-align:left;width:100%}.cmb-repeatable-group .cmb-group-description .cmb-th label{display:block;margin-top:0;margin-bottom:.5em}.cmb-repeatable-group .cmb-shift-rows{margin-right:1em}.cmb-repeatable-group .cmb-shift-rows .dashicons-arrow-up-alt2{margin-top:.15em}.cmb-repeatable-group .cmb-shift-rows .dashicons-arrow-down-alt2{margin-top:.2em}.cmb-repeatable-group .cmb2-upload-button{float:right}p.cmb2-metabox-description{color:#666;letter-spacing:.01em;margin:0;padding-top:.5em}span.cmb2-metabox-description{color:#666;letter-spacing:.01em}.cmb2-metabox-title{margin:0 0 5px 0;padding:5px 0 0 0;font-size:14px}.cmb-inline ul{padding:4px 0 0 0}.cmb-inline li{display:inline-block;padding-right:18px}.cmb-type-textarea-code pre{margin:0}.cmb2-media-status .img-status{clear:none;display:inline-block;vertical-align:middle;margin-right:10px;width:auto}.cmb2-media-status .img-status img{max-width:350px;height:auto}.cmb2-media-status .embed-status,.cmb2-media-status .img-status img{background:#eee;border:5px solid #fff;outline:1px solid #e9e9e9;box-shadow:inset 0 0 15px rgba(0,0,0,.3),inset 0 0 0 1px rgba(0,0,0,.05);background-image:linear-gradient(45deg,#d0d0d0 25%,transparent 25%,transparent 75%,#d0d0d0 75%,#d0d0d0),linear-gradient(45deg,#d0d0d0 25%,transparent 25%,transparent 75%,#d0d0d0 75%,#d0d0d0);background-position:0 0,10px 10px;background-size:20px 20px;border-radius:2px;-moz-border-radius:2px;margin:15px 0 0 0}.cmb2-media-status .embed-status{float:left;max-width:800px}.cmb2-media-status .embed-status,.cmb2-media-status .img-status{position:relative}.cmb2-media-status .embed-status .cmb2-remove-file-button,.cmb2-media-status .img-status .cmb2-remove-file-button{background:url(../images/ico-delete.png);height:16px;left:-5px;position:absolute;text-indent:-9999px;top:-5px;width:16px}.cmb2-media-status .img-status .cmb2-remove-file-button{top:10px}.cmb2-media-status .file-status>span,.cmb2-media-status .img-status img{cursor:pointer}.cmb2-media-status.cmb-attach-list .file-status>span,.cmb2-media-status.cmb-attach-list .img-status img{cursor:move}.cmb-type-file-list .cmb2-media-status .img-status{clear:none;vertical-align:middle;width:auto;margin-right:10px;margin-bottom:10px;margin-top:0}.cmb-attach-list li{clear:both;display:inline-block;width:100%;margin-top:5px;margin-bottom:10px}.cmb-attach-list li img{float:left;margin-right:10px}.cmb2-remove-wrapper{margin:0}.child-cmb2 .cmb-th{text-align:left}.cmb2-indented-hierarchy{padding-left:1.5em}@media (max-width:450px){.cmb-td,.cmb-th,.cmb-th+.cmb-td{display:block;float:none;width:100%}}#poststuff .cmb-group-title{margin-left:-1em;margin-right:-1em;min-height:1.5em}#poststuff .repeatable .cmb-group-title{padding-left:2.2em}.cmb-type-group .cmb2-wrap,.cmb2-postbox .cmb2-wrap{margin:0}.cmb-type-group .cmb2-wrap>.cmb-field-list>.cmb-row,.cmb2-postbox .cmb2-wrap>.cmb-field-list>.cmb-row{padding:1.8em 0}.cmb-type-group .cmb2-wrap input[type=text].cmb2-oembed,.cmb2-postbox .cmb2-wrap input[type=text].cmb2-oembed{width:100%}.cmb-type-group .cmb-row,.cmb2-postbox .cmb-row{padding:0 0 1.8em;margin:0 0 .8em}.cmb-type-group .cmb-row .cmbhandle,.cmb2-postbox .cmb-row .cmbhandle{right:-1em;position:relative;color:#222}.cmb-type-group .cmb-repeatable-grouping,.cmb2-postbox .cmb-repeatable-grouping{padding:0 1em;max-width:100%;min-width:1px!important}.cmb-type-group .cmb-repeatable-group>.cmb-row,.cmb2-postbox .cmb-repeatable-group>.cmb-row{padding-bottom:0}.cmb-type-group .cmb-th,.cmb2-postbox .cmb-th{width:18%;padding:0 2% 0 0}.cmb-type-group .cmb-td,.cmb2-postbox .cmb-td{margin-bottom:0;padding:0;line-height:1.3}.cmb-type-group .cmb-th+.cmb-td,.cmb2-postbox .cmb-th+.cmb-td{width:80%;float:right}.cmb-type-group .cmb-repeatable-group:not(:last-of-type),.cmb-type-group .cmb-row:not(:last-of-type),.cmb2-postbox .cmb-repeatable-group:not(:last-of-type),.cmb2-postbox .cmb-row:not(:last-of-type){border-bottom:1px solid #e9e9e9}@media (max-width:450px){.cmb-type-group .cmb-repeatable-group:not(:last-of-type),.cmb-type-group .cmb-row:not(:last-of-type),.cmb2-postbox .cmb-repeatable-group:not(:last-of-type),.cmb2-postbox .cmb-row:not(:last-of-type){border-bottom:0}}.cmb-type-group .cmb-remove-field-row,.cmb-type-group .cmb-repeat-group-field,.cmb2-postbox .cmb-remove-field-row,.cmb2-postbox .cmb-repeat-group-field{padding-top:1.8em}.js .cmb2-postbox.context-box .handlediv{text-align:center}.js .cmb2-postbox.context-box .toggle-indicator:before{content:"\f142";display:inline-block;font:normal 20px/1 dashicons;speak:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-decoration:none!important}.js .cmb2-postbox.context-box.closed .toggle-indicator:before{content:"\f140"}.cmb2-postbox.context-box{margin-bottom:10px}.cmb2-postbox.context-box.context-before_permalink-box{margin-top:10px}.cmb2-postbox.context-box.context-after_title-box{margin-top:10px}.cmb2-postbox.context-box.context-after_editor-box{margin-top:20px;margin-bottom:0}.cmb2-postbox.context-box.context-form_top-box{margin-top:10px}.cmb2-postbox.context-box.context-form_top-box .hndle{font-size:14px;padding:8px 12px;margin:0;line-height:1.4}.cmb2-postbox.context-box .hndle{cursor:auto}.cmb2-context-wrap{margin-top:10px}.cmb2-context-wrap.cmb2-context-wrap-form_top{margin-right:300px;width:auto}.cmb2-context-wrap.cmb2-context-wrap-no-title .cmb2-metabox{padding:10px}.cmb2-context-wrap .cmb-th{padding:0 2% 0 0;width:18%}.cmb2-context-wrap .cmb-td{width:80%;padding:0}.cmb2-context-wrap .cmb-row{margin-bottom:10px}.cmb2-context-wrap .cmb-row:last-of-type{margin-bottom:0}@media only screen and (max-width:850px){.cmb2-context-wrap.cmb2-context-wrap-form_top{margin-right:0}}.cmb2-options-page{max-width:1200px}.cmb2-options-page.wrap>h2{margin-bottom:1em}.cmb2-options-page .cmb2-metabox>.cmb-row{padding:1em;margin-top:-1px;background:#fff;border:1px solid #e9e9e9;box-shadow:0 1px 1px rgba(0,0,0,.05)}.cmb2-options-page .cmb2-metabox>.cmb-row>.cmb-th{padding:0;font-weight:initial}.cmb2-options-page .cmb2-metabox>.cmb-row>.cmb-th+.cmb-td{float:none;padding:0 0 0 1em;margin-left:200px}@media (max-width:450px){.cmb2-options-page .cmb2-metabox>.cmb-row>.cmb-th+.cmb-td{padding:0;margin-left:0}}.cmb2-options-page .cmb2-wrap .cmb-type-title{margin-top:1em;padding:.6em 1em;background-color:#fafafa}.cmb2-options-page .cmb2-wrap .cmb-type-title .cmb2-metabox-title{font-size:12px;margin-top:0;margin-bottom:0;text-transform:uppercase}.cmb2-options-page .cmb2-wrap .cmb-type-title .cmb2-metabox-description{padding-top:.25em}.cmb2-options-page .cmb-repeatable-group .cmb-group-description .cmb-th{padding:0 0 .8em 0}.cmb2-options-page .cmb-repeatable-group .cmb-group-name{font-size:16px;margin-top:0;margin-bottom:0}.cmb2-options-page .cmb-repeatable-group .cmb-th>.cmb2-metabox-description{font-weight:400;padding-bottom:0!important}#addtag .cmb-th{float:none;width:auto;padding:20px 0 0}#addtag .cmb-td{padding:0}#addtag .cmb-th+.cmb-td{float:none}#addtag select{max-width:100%}#addtag .cmb2-metabox{padding-bottom:20px}#addtag .cmb-row li label{display:inline}#poststuff .cmb-repeatable-group h2{margin:0}.edit-tags-php .cmb2-metabox-title,.profile-php .cmb2-metabox-title,.user-edit-php .cmb2-metabox-title{font-size:1.4em}.cmb2-no-box-wrap .cmb-spinner,.cmb2-postbox .cmb-spinner{float:left;display:none}.cmb-spinner{display:none}.cmb-spinner.is-active{display:block}#side-sortables .cmb2-wrap>.cmb-field-list>.cmb-row,.inner-sidebar .cmb2-wrap>.cmb-field-list>.cmb-row{padding:1.4em 0}#side-sortables .cmb2-wrap input[type=text]:not(.wp-color-picker),.inner-sidebar .cmb2-wrap input[type=text]:not(.wp-color-picker){width:100%}#side-sortables .cmb2-wrap input+input:not(.wp-picker-clear),#side-sortables .cmb2-wrap input+select,.inner-sidebar .cmb2-wrap input+input:not(.wp-picker-clear),.inner-sidebar .cmb2-wrap input+select{margin-left:0;margin-top:1em;display:block}#side-sortables .cmb2-wrap input.cmb2-text-money,.inner-sidebar .cmb2-wrap input.cmb2-text-money{max-width:70%}#side-sortables .cmb2-wrap input.cmb2-text-money+.cmb2-metabox-description,.inner-sidebar .cmb2-wrap input.cmb2-text-money+.cmb2-metabox-description{display:block}#side-sortables .cmb2-wrap label,.inner-sidebar .cmb2-wrap label{display:block;font-weight:700;padding:0 0 5px}#side-sortables textarea,.inner-sidebar textarea{max-width:99%}#side-sortables .cmb-repeatable-group,.inner-sidebar .cmb-repeatable-group{border-bottom:1px solid #e9e9e9}#side-sortables .cmb-type-group>.cmb-td>.cmb-repeatable-group,.inner-sidebar .cmb-type-group>.cmb-td>.cmb-repeatable-group{border-bottom:0;margin-bottom:-1.4em}#side-sortables .cmb-td:not(.cmb-remove-row),#side-sortables .cmb-th,#side-sortables .cmb-th+.cmb-td,.inner-sidebar .cmb-td:not(.cmb-remove-row),.inner-sidebar .cmb-th,.inner-sidebar .cmb-th+.cmb-td{width:100%;display:block;float:none}#side-sortables .closed .inside,.inner-sidebar .closed .inside{display:none}#side-sortables .cmb-th,.inner-sidebar .cmb-th{display:block;float:none;padding-bottom:1em;text-align:left;width:100%;padding-left:0;padding-right:0}#side-sortables .cmb-th label,.inner-sidebar .cmb-th label{display:block;margin-top:0;margin-bottom:.5em}#side-sortables .cmb-th label,.inner-sidebar .cmb-th label{font-size:14px;line-height:1.4em}#side-sortables .cmb-group-description .cmb-th,.inner-sidebar .cmb-group-description .cmb-th{padding-top:0}#side-sortables .cmb-group-description .cmb2-metabox-description,.inner-sidebar .cmb-group-description .cmb2-metabox-description{padding:0}#side-sortables .cmb-group-title .cmb-th,.inner-sidebar .cmb-group-title .cmb-th{padding:0}#side-sortables .cmb-repeatable-grouping+.cmb-repeatable-grouping,.inner-sidebar .cmb-repeatable-grouping+.cmb-repeatable-grouping{margin-top:1em}#side-sortables .cmb2-media-status .embed-status img,#side-sortables .cmb2-media-status .img-status img,.inner-sidebar .cmb2-media-status .embed-status img,.inner-sidebar .cmb2-media-status .img-status img{max-width:90%;height:auto}#side-sortables .cmb2-list label,.inner-sidebar .cmb2-list label{display:inline;font-weight:400}#side-sortables .cmb2-metabox-description,.inner-sidebar .cmb2-metabox-description{display:block;padding:7px 0 0}#side-sortables .cmb-type-checkbox .cmb-td label,#side-sortables .cmb-type-checkbox .cmb2-metabox-description,.inner-sidebar .cmb-type-checkbox .cmb-td label,.inner-sidebar .cmb-type-checkbox .cmb2-metabox-description{font-weight:400;display:inline}#side-sortables .cmb-row .cmb2-metabox-description,.inner-sidebar .cmb-row .cmb2-metabox-description{padding-bottom:1.8em}#side-sortables .cmb2-metabox-title,.inner-sidebar .cmb2-metabox-title{font-size:1.2em;font-style:italic}#side-sortables .cmb-remove-row,.inner-sidebar .cmb-remove-row{clear:both;padding-top:12px;padding-bottom:0}#side-sortables .cmb2-upload-button,.inner-sidebar .cmb2-upload-button{clear:both;margin-top:12px}.cmb2-metabox .cmbhandle{color:#757575;float:right;width:27px;height:30px;cursor:pointer;right:-1em;position:relative}.cmb2-metabox .cmbhandle:before{content:'\f142';right:12px;font:normal 20px/1 dashicons;speak:none;display:inline-block;padding:8px 10px;top:0;position:relative;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-decoration:none!important}.cmb2-metabox .postbox.closed .cmbhandle:before{content:'\f140'}.cmb2-metabox button.dashicons-before.dashicons-no-alt.cmb-remove-group-row{-webkit-appearance:none!important;background:0 0!important;border:none!important;position:absolute;left:0;top:.5em;line-height:1em;padding:2px 6px 3px;opacity:.5}.cmb2-metabox button.dashicons-before.dashicons-no-alt.cmb-remove-group-row:not([disabled]){cursor:pointer;color:#a00;opacity:1}.cmb2-metabox button.dashicons-before.dashicons-no-alt.cmb-remove-group-row:not([disabled]):hover{color:red}* html .cmb2-element.ui-helper-clearfix{height:1%}.cmb2-element .ui-datepicker,.cmb2-element.ui-datepicker{padding:0;margin:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;border:1px solid #dfdfdf;border-top:none;-webkit-box-shadow:0 3px 6px rgba(0,0,0,.075);box-shadow:0 3px 6px rgba(0,0,0,.075);min-width:17em;width:auto}.cmb2-element .ui-datepicker *,.cmb2-element.ui-datepicker *{padding:0;font-family:"Open Sans",sans-serif;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}.cmb2-element .ui-datepicker table,.cmb2-element.ui-datepicker table{font-size:13px;margin:0;border:none;border-collapse:collapse}.cmb2-element .ui-datepicker .ui-datepicker-header,.cmb2-element .ui-datepicker .ui-widget-header,.cmb2-element.ui-datepicker .ui-datepicker-header,.cmb2-element.ui-datepicker .ui-widget-header{background-image:none;border:none;color:#fff;font-weight:400}.cmb2-element .ui-datepicker .ui-datepicker-header .ui-state-hover,.cmb2-element.ui-datepicker .ui-datepicker-header .ui-state-hover{background:0 0;border-color:transparent;cursor:pointer}.cmb2-element .ui-datepicker .ui-datepicker-title,.cmb2-element.ui-datepicker .ui-datepicker-title{margin:0;padding:10px 0;color:#fff;font-size:14px;line-height:14px;text-align:center}.cmb2-element .ui-datepicker .ui-datepicker-title select,.cmb2-element.ui-datepicker .ui-datepicker-title select{margin-top:-8px;margin-bottom:-8px}.cmb2-element .ui-datepicker .ui-datepicker-next,.cmb2-element .ui-datepicker .ui-datepicker-prev,.cmb2-element.ui-datepicker .ui-datepicker-next,.cmb2-element.ui-datepicker .ui-datepicker-prev{position:relative;top:0;height:34px;width:34px}.cmb2-element .ui-datepicker .ui-state-hover.ui-datepicker-next,.cmb2-element .ui-datepicker .ui-state-hover.ui-datepicker-prev,.cmb2-element.ui-datepicker .ui-state-hover.ui-datepicker-next,.cmb2-element.ui-datepicker .ui-state-hover.ui-datepicker-prev{border:none}.cmb2-element .ui-datepicker .ui-datepicker-prev,.cmb2-element .ui-datepicker .ui-datepicker-prev-hover,.cmb2-element.ui-datepicker .ui-datepicker-prev,.cmb2-element.ui-datepicker .ui-datepicker-prev-hover{left:0}.cmb2-element .ui-datepicker .ui-datepicker-next,.cmb2-element .ui-datepicker .ui-datepicker-next-hover,.cmb2-element.ui-datepicker .ui-datepicker-next,.cmb2-element.ui-datepicker .ui-datepicker-next-hover{right:0}.cmb2-element .ui-datepicker .ui-datepicker-next span,.cmb2-element .ui-datepicker .ui-datepicker-prev span,.cmb2-element.ui-datepicker .ui-datepicker-next span,.cmb2-element.ui-datepicker .ui-datepicker-prev span{display:none}.cmb2-element .ui-datepicker .ui-datepicker-prev,.cmb2-element.ui-datepicker .ui-datepicker-prev{float:left}.cmb2-element .ui-datepicker .ui-datepicker-next,.cmb2-element.ui-datepicker .ui-datepicker-next{float:right}.cmb2-element .ui-datepicker .ui-datepicker-next:before,.cmb2-element .ui-datepicker .ui-datepicker-prev:before,.cmb2-element.ui-datepicker .ui-datepicker-next:before,.cmb2-element.ui-datepicker .ui-datepicker-prev:before{font:normal 20px/34px dashicons;padding-left:7px;color:#fff;speak:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:34px;height:34px}.cmb2-element .ui-datepicker .ui-datepicker-prev:before,.cmb2-element.ui-datepicker .ui-datepicker-prev:before{content:'\f341'}.cmb2-element .ui-datepicker .ui-datepicker-next:before,.cmb2-element.ui-datepicker .ui-datepicker-next:before{content:'\f345'}.cmb2-element .ui-datepicker .ui-datepicker-next-hover:before,.cmb2-element .ui-datepicker .ui-datepicker-prev-hover:before,.cmb2-element.ui-datepicker .ui-datepicker-next-hover:before,.cmb2-element.ui-datepicker .ui-datepicker-prev-hover:before{opacity:.7}.cmb2-element .ui-datepicker select.ui-datepicker-month,.cmb2-element .ui-datepicker select.ui-datepicker-year,.cmb2-element.ui-datepicker select.ui-datepicker-month,.cmb2-element.ui-datepicker select.ui-datepicker-year{width:33%;background:0 0;border-color:transparent;box-shadow:none;color:#fff}.cmb2-element .ui-datepicker select.ui-datepicker-month option,.cmb2-element .ui-datepicker select.ui-datepicker-year option,.cmb2-element.ui-datepicker select.ui-datepicker-month option,.cmb2-element.ui-datepicker select.ui-datepicker-year option{color:#333}.cmb2-element .ui-datepicker thead,.cmb2-element.ui-datepicker thead{color:#fff;font-weight:600}.cmb2-element .ui-datepicker thead th,.cmb2-element.ui-datepicker thead th{font-weight:400}.cmb2-element .ui-datepicker th,.cmb2-element.ui-datepicker th{padding:10px}.cmb2-element .ui-datepicker td,.cmb2-element.ui-datepicker td{padding:0;border:1px solid #f4f4f4}.cmb2-element .ui-datepicker td.ui-datepicker-other-month,.cmb2-element.ui-datepicker td.ui-datepicker-other-month{border:transparent}.cmb2-element .ui-datepicker td.ui-datepicker-week-end,.cmb2-element.ui-datepicker td.ui-datepicker-week-end{background-color:#f4f4f4;border:1px solid #f4f4f4}.cmb2-element .ui-datepicker td.ui-datepicker-week-end.ui-datepicker-today,.cmb2-element.ui-datepicker td.ui-datepicker-week-end.ui-datepicker-today{-webkit-box-shadow:inset 0 0 1px 0 rgba(0,0,0,.1);-moz-box-shadow:inset 0 0 1px 0 rgba(0,0,0,.1);box-shadow:inset 0 0 1px 0 rgba(0,0,0,.1)}.cmb2-element .ui-datepicker td.ui-datepicker-today,.cmb2-element.ui-datepicker td.ui-datepicker-today{background-color:#f0f0c0}.cmb2-element .ui-datepicker td.ui-datepicker-current-day,.cmb2-element.ui-datepicker td.ui-datepicker-current-day{background:#bd8}.cmb2-element .ui-datepicker td .ui-state-default,.cmb2-element.ui-datepicker td .ui-state-default{background:0 0;border:none;text-align:center;text-decoration:none;width:auto;display:block;padding:5px 10px;font-weight:400;color:#444}.cmb2-element .ui-datepicker td.ui-state-disabled .ui-state-default,.cmb2-element.ui-datepicker td.ui-state-disabled .ui-state-default{opacity:.5}.cmb2-element .ui-datepicker .ui-datepicker-header,.cmb2-element .ui-datepicker .ui-widget-header,.cmb2-element.ui-datepicker .ui-datepicker-header,.cmb2-element.ui-datepicker .ui-widget-header{background:#00a0d2}.cmb2-element .ui-datepicker thead,.cmb2-element.ui-datepicker thead{background:#32373c}.cmb2-element .ui-datepicker td .ui-state-active,.cmb2-element .ui-datepicker td .ui-state-hover,.cmb2-element.ui-datepicker td .ui-state-active,.cmb2-element.ui-datepicker td .ui-state-hover{background:#0073aa;color:#fff}.cmb2-element .ui-datepicker .ui-timepicker-div,.cmb2-element.ui-datepicker .ui-timepicker-div{font-size:14px}.cmb2-element .ui-datepicker .ui-timepicker-div dl,.cmb2-element.ui-datepicker .ui-timepicker-div dl{text-align:left;padding:0 .6em}.cmb2-element .ui-datepicker .ui-timepicker-div dl dt,.cmb2-element.ui-datepicker .ui-timepicker-div dl dt{float:left;clear:left;padding:0 0 0 5px}.cmb2-element .ui-datepicker .ui-timepicker-div dl dd,.cmb2-element.ui-datepicker .ui-timepicker-div dl dd{margin:0 10px 10px 40%}.cmb2-element .ui-datepicker .ui-timepicker-div dl dd select,.cmb2-element.ui-datepicker .ui-timepicker-div dl dd select{width:100%}.cmb2-element .ui-datepicker .ui-timepicker-div+.ui-datepicker-buttonpane,.cmb2-element.ui-datepicker .ui-timepicker-div+.ui-datepicker-buttonpane{padding:.6em;text-align:left}.cmb2-element .ui-datepicker .ui-timepicker-div+.ui-datepicker-buttonpane .button-primary,.cmb2-element .ui-datepicker .ui-timepicker-div+.ui-datepicker-buttonpane .button-secondary,.cmb2-element.ui-datepicker .ui-timepicker-div+.ui-datepicker-buttonpane .button-primary,.cmb2-element.ui-datepicker .ui-timepicker-div+.ui-datepicker-buttonpane .button-secondary{padding:0 10px 1px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;margin:0 .6em .4em .4em}.admin-color-fresh .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-fresh .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-fresh .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-fresh .cmb2-element.ui-datepicker .ui-widget-header{background:#00a0d2}.admin-color-fresh .cmb2-element .ui-datepicker thead,.admin-color-fresh .cmb2-element.ui-datepicker thead{background:#32373c}.admin-color-fresh .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-fresh .cmb2-element.ui-datepicker td .ui-state-hover{background:#0073aa;color:#fff}.admin-color-blue .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-blue .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-blue .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-blue .cmb2-element.ui-datepicker .ui-widget-header{background:#52accc}.admin-color-blue .cmb2-element .ui-datepicker thead,.admin-color-blue .cmb2-element.ui-datepicker thead{background:#4796b3}.admin-color-blue .cmb2-element .ui-datepicker td .ui-state-active,.admin-color-blue .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-blue .cmb2-element.ui-datepicker td .ui-state-active,.admin-color-blue .cmb2-element.ui-datepicker td .ui-state-hover{background:#096484;color:#fff}.admin-color-blue .cmb2-element .ui-datepicker td.ui-datepicker-today,.admin-color-blue .cmb2-element.ui-datepicker td.ui-datepicker-today{background:#eee}.admin-color-coffee .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-coffee .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-coffee .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-coffee .cmb2-element.ui-datepicker .ui-widget-header{background:#59524c}.admin-color-coffee .cmb2-element .ui-datepicker thead,.admin-color-coffee .cmb2-element.ui-datepicker thead{background:#46403c}.admin-color-coffee .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-coffee .cmb2-element.ui-datepicker td .ui-state-hover{background:#c7a589;color:#fff}.admin-color-ectoplasm .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-ectoplasm .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-ectoplasm .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-ectoplasm .cmb2-element.ui-datepicker .ui-widget-header{background:#523f6d}.admin-color-ectoplasm .cmb2-element .ui-datepicker thead,.admin-color-ectoplasm .cmb2-element.ui-datepicker thead{background:#413256}.admin-color-ectoplasm .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-ectoplasm .cmb2-element.ui-datepicker td .ui-state-hover{background:#a3b745;color:#fff}.admin-color-midnight .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-midnight .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-midnight .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-midnight .cmb2-element.ui-datepicker .ui-widget-header{background:#363b3f}.admin-color-midnight .cmb2-element .ui-datepicker thead,.admin-color-midnight .cmb2-element.ui-datepicker thead{background:#26292c}.admin-color-midnight .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-midnight .cmb2-element.ui-datepicker td .ui-state-hover{background:#e14d43;color:#fff}.admin-color-ocean .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-ocean .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-ocean .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-ocean .cmb2-element.ui-datepicker .ui-widget-header{background:#738e96}.admin-color-ocean .cmb2-element .ui-datepicker thead,.admin-color-ocean .cmb2-element.ui-datepicker thead{background:#627c83}.admin-color-ocean .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-ocean .cmb2-element.ui-datepicker td .ui-state-hover{background:#9ebaa0;color:#fff}.admin-color-sunrise .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-sunrise .cmb2-element .ui-datepicker .ui-datepicker-header .ui-state-hover,.admin-color-sunrise .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-sunrise .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-sunrise .cmb2-element.ui-datepicker .ui-datepicker-header .ui-state-hover,.admin-color-sunrise .cmb2-element.ui-datepicker .ui-widget-header{background:#cf4944}.admin-color-sunrise .cmb2-element .ui-datepicker th,.admin-color-sunrise .cmb2-element.ui-datepicker th{border-color:#be3631;background:#be3631}.admin-color-sunrise .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-sunrise .cmb2-element.ui-datepicker td .ui-state-hover{background:#dd823b;color:#fff}.admin-color-light .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-light .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-light .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-light .cmb2-element.ui-datepicker .ui-widget-header{background:#e5e5e5}.admin-color-light .cmb2-element .ui-datepicker select.ui-datepicker-month,.admin-color-light .cmb2-element .ui-datepicker select.ui-datepicker-year,.admin-color-light .cmb2-element.ui-datepicker select.ui-datepicker-month,.admin-color-light .cmb2-element.ui-datepicker select.ui-datepicker-year{color:#555}.admin-color-light .cmb2-element .ui-datepicker thead,.admin-color-light .cmb2-element.ui-datepicker thead{background:#888}.admin-color-light .cmb2-element .ui-datepicker .ui-datepicker-next:before,.admin-color-light .cmb2-element .ui-datepicker .ui-datepicker-prev:before,.admin-color-light .cmb2-element .ui-datepicker .ui-datepicker-title,.admin-color-light .cmb2-element .ui-datepicker td .ui-state-default,.admin-color-light .cmb2-element.ui-datepicker .ui-datepicker-next:before,.admin-color-light .cmb2-element.ui-datepicker .ui-datepicker-prev:before,.admin-color-light .cmb2-element.ui-datepicker .ui-datepicker-title,.admin-color-light .cmb2-element.ui-datepicker td .ui-state-default{color:#555}.admin-color-light .cmb2-element .ui-datepicker td .ui-state-active,.admin-color-light .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-light .cmb2-element.ui-datepicker td .ui-state-active,.admin-color-light .cmb2-element.ui-datepicker td .ui-state-hover{background:#ccc}.admin-color-light .cmb2-element .ui-datepicker td.ui-datepicker-today,.admin-color-light .cmb2-element.ui-datepicker td.ui-datepicker-today{background:#eee}.admin-color-bbp-evergreen .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-bbp-evergreen .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-bbp-evergreen .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-bbp-evergreen .cmb2-element.ui-datepicker .ui-widget-header{background:#56b274}.admin-color-bbp-evergreen .cmb2-element .ui-datepicker thead,.admin-color-bbp-evergreen .cmb2-element.ui-datepicker thead{background:#36533f}.admin-color-bbp-evergreen .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-bbp-evergreen .cmb2-element.ui-datepicker td .ui-state-hover{background:#446950;color:#fff}.admin-color-bbp-mint .cmb2-element .ui-datepicker .ui-datepicker-header,.admin-color-bbp-mint .cmb2-element .ui-datepicker .ui-widget-header,.admin-color-bbp-mint .cmb2-element.ui-datepicker .ui-datepicker-header,.admin-color-bbp-mint .cmb2-element.ui-datepicker .ui-widget-header{background:#4ca26a}.admin-color-bbp-mint .cmb2-element .ui-datepicker thead,.admin-color-bbp-mint .cmb2-element.ui-datepicker thead{background:#4f6d59}.admin-color-bbp-mint .cmb2-element .ui-datepicker td .ui-state-hover,.admin-color-bbp-mint .cmb2-element.ui-datepicker td .ui-state-hover{background:#5fb37c;color:#fff}.cmb2-char-counter-wrap{margin:.5em 0 1em}.cmb2-char-counter-wrap input[type=text]{font-size:12px;width:25px}.cmb2-char-counter-wrap.cmb2-max-exceeded input[type=text]{border-color:#a00!important}.cmb2-char-counter-wrap.cmb2-max-exceeded .cmb2-char-max-msg{display:inline-block}.cmb2-char-max-msg{color:#a00;display:none;font-weight:600;margin-left:1em}
	</style>

	<?php if ($downloadlink_happymood) { ?>
	<div id="no-table">
	<table class="content-table"> 
	<center>
	<p><strong style="text-transform:capitalize;color:black"><?php _e('Here for Default Download Links from Sources', THEMES_NAMES); ?> Happymood <br> <?php _e('Please copy this link to download box', THEMES_NAMES); ?><br> <?php _e('if you not copy the link. download link use this for default link.', THEMES_NAMES); ?></strong></p>
	</center>
	<thead>
	<tr>  
		<th width="35%"><?php _e('Name', THEMES_NAMES); ?></th> 
		<th width="65%"><?php _e('Link', THEMES_NAMES); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php if ($downloadlink_happymood) { ?>
    <tr> 		 
		<td data-title="Name" name="name_download_happymood"><input type="text" class="widefat " name="name_download_happymood" value="<?php echo $namedownloadlink_happymood; ?>" /></td>
		<td data-title="Link" name="link_download_happymood"><input style="width:100%" type="text" name="link_download_happymood" value="<?php echo $downloadlink_happymood; ?>" /> </td>
    </tr> 
	<?php } ?>	
	</tbody>
	
	</table>
	</div>
	<?php } ?>
	<?php if ($link_download_apksupport) { ?>
	<div id="no-table">
	<table class="content-table"> 
	<center>
	<p><strong style="text-transform:capitalize;color:black"><?php _e('Here for Default Download Links from Sources', THEMES_NAMES); ?> <u style="text-transform:uppercase!important;color:#2271b1">Google Play Store</u><br> <?php _e('Please copy this link to download box', THEMES_NAMES); ?><br> <?php _e('if you not copy the link. download link use this for default link.', THEMES_NAMES); ?></strong></p>
	</center>
	<thead>
		<tr> 
		  <th width="0%" style='display:none'>Type</th>  
		  <th width="5%" class="more_info">Size <div class="popup">APK / ZIP / OBB</div></th> 
		  <th width="30%" class="more_info">Name <div class="popup">APK / ZIP / OBB</div></th> 
		  <th width="65%" class="more_info">Link <div class="popup">APK / ZIP / OBB</div></th>
		</tr>
	</thead>
	<tbody> 
	  
	
	<?php if ($link_download_apksupport) { ?>
    <tr> 
      <td name="type_download_apksupport" style='display:none' ><input type="text" class="widefat " name="type_download_apksupport" value="<?php echo $type_download_apksupport; ?>" /></td> 
	  
      <td name="size_download_apksupport"><input type="text" class="widefat " name="size_download_apksupport" value="<?php echo $size_download_apksupport; ?>" /></td> 
	  
      <td name="name_download_apksupport"><input type="text" class="widefat " name="name_download_apksupport" value="<?php echo $name_download_apksupport; ?>" /></td> 
	  
      <td name="link_download_apksupport"><input style="width:100%" type="text" name="link_download_apksupport" value="<?php echo $link_download_apksupport; ?>" /> </td>
    </tr> 
	<?php } ?>
	
	 </tbody>
	</table>
	</div>
	<?php } ?>
	
	<?php if ($downloadlink_ori) { ?>
	<div id="no-table">
	<table class="content-table"> 
	<center>
	<p><strong style="text-transform:capitalize;color:black">Here for Default Download Links from Sources <u style="text-transform:uppercase!important;color:#2271b1">Google Play Store</u><br> <?php _e('Please copy this link to download box', THEMES_NAMES); ?><br> <?php _e('if you not copy the link. download link use this for default link.', THEMES_NAMES); ?></strong></p>
	</center>
	<thead>
		<tr> 
		  <th width="5%" class="more_info">Size <div class="popup">APK / ZIP / OBB</div></th> 
		  <th width="30%" class="more_info">Name <div class="popup">APK / ZIP / OBB</div></th> 
		  <th width="65%" class="more_info">Link <div class="popup">APK / ZIP / OBB</div></th>
		</tr>
	</thead>
	<tbody> 
	 
	<?php if ($downloadlink_ori) { ?>
    <tr> 
      <td name="size_downloadlinks_orig"><?php echo $size_downloadlinks_orig; ?></td> 
      <td name="name_downloadlinks_ori"><?php echo $name_downloadlinks_ori; ?></td> 
      <td name="downloadlink_ori"><input style="width:100%" type="text" name="downloadlink_ori" value="<?php echo $downloadlink_ori; ?>" /> </td>
    </tr> 
	<?php } ?>
	<?php if ($downloadlink_ori_1) { ?>
    <tr> 
      <td name="size_downloadlinks_orig_1"><?php echo $size_downloadlinks_orig_1; ?></td> 
      <td name="name_downloadlinks_ori_1"><?php echo $name_downloadlinks_ori_1; ?></td> 
      <td name="downloadlink_ori_1"><input style="width:100%" type="text" name="downloadlink_ori_1" value="<?php echo $downloadlink_ori_1; ?>" /> </td>
    </tr> 
	<?php } ?>
	<?php if ($downloadlink_ori_2) { ?>
    <tr> 
      <td name="size_downloadlinks_orig_2"><?php echo $size_downloadlinks_orig_2; ?></td> 
      <td name="name_downloadlinks_ori_2"><?php echo $name_downloadlinks_ori_2; ?></td> 
      <td name="downloadlink_ori_2"><input style="width:100%" type="text" name="downloadlink_ori_2" value="<?php echo $downloadlink_ori_2; ?>" /> </td>
    </tr> 
	<?php } ?>
	 </tbody>
	</table>
	</div>
	<?php } ?>

	<?php if ($downloadlink_gma) { ?>
	<div id="no-table">
	<table class="content-table"> 
	<center>
	<p><strong style="text-transform:capitalize;color:black">Here for Default Download Links from <u style="text-transform:uppercase!important;color:#2271b1">Sources </u><br> <?php _e('Please copy this link to download box', THEMES_NAMES); ?><br> <?php _e('if you not copy the link. download link use this for default link.', THEMES_NAMES); ?></strong></p>
	</center>
	<thead>
	<tr> 
		<?php if ($sizedownloadlink_gma) { ?><th width="15%">Size</th> <?php } ?>
		<th width="30%">Name</th> 
		<th width="65%">Link</th>
	</tr>
	</thead>
	<tbody> 
 
	<?php if ($downloadlink_gma) { ?>
    <tr> 
		<?php if ($sizedownloadlink_gma) { ?><td data-title="Size" name="size_downloadlinks_gma"><input title="<?php echo $sizedownloadlink_gma; ?>" type="text" class="widefat " name="size_downloadlinks_gma" value="<?php echo $sizedownloadlink_gma; ?>" /></td><?php } ?> 
		<td data-title="Name" name="name_downloadlinks_gma"><input title="<?php echo $namedownloadlink_gma; ?>" type="text" class="widefat " name="name_downloadlinks_gma" value="<?php echo $namedownloadlink_gma; ?>" /></td> 
		<td data-title="Link" name="downloadlink_gma"><input style="width:100%" type="text" name="downloadlink_gma" value="<?php echo $downloadlink_gma; ?>" /></td>
    </tr>
	<?php } if ($downloadlink_gma_1) { ?>
    <tr> 
		<?php if ($sizedownloadlink_gma_1) { ?><td data-title="Size" name="size_downloadlinks_gma_1"><input type="text" class="widefat " name="size_downloadlinks_gma_1" value="<?php echo $sizedownloadlink_gma_1; ?>" title="<?php echo $sizedownloadlink_gma_1; ?>"  /></td> <?php } ?>
		<td data-title="Name" name="name_downloadlinks_gma_1"><input type="text" class="widefat " name="name_downloadlinks_gma_1" value="<?php echo $namedownloadlink_gma_1; ?>" title="<?php echo $namedownloadlink_gma_1; ?>"  /></td> 
		<td data-title="Link" name="downloadlink_gma_1"><input style="width:100%" type="text" name="downloadlink_gma_1" value="<?php echo $downloadlink_gma_1; ?>" /> </td>
    </tr> 
	<?php } if ($downloadlink_gma_2) { ?>
    <tr> 
		<?php if ($sizedownloadlink_gma_2) { ?><td data-title="Size" name="size_downloadlinks_gma_2"><input type="text" class="widefat " name="size_downloadlinks_gma_2" value="<?php echo $sizedownloadlink_gma_2; ?>" title="<?php echo $sizedownloadlink_gma_2; ?>"  /></td> <?php } ?>
		<td data-title="Name" name="name_downloadlinks_gma_2"><input type="text" class="widefat " name="name_downloadlinks_gma_2" value="<?php echo $namedownloadlink_gma_2; ?>" title="<?php echo $namedownloadlink_gma_2; ?>"  /></td> 
		<td data-title="Link" name="downloadlink_gma_2"><input style="width:100%" type="text" name="downloadlink_gma_2" value="<?php echo $downloadlink_gma_2; ?>" /> </td>
    </tr> 
	<?php } if ($downloadlink_gma_3) { ?>
    <tr> 
		<?php if ($sizedownloadlink_gma_3) { ?><td data-title="Size" name="size_downloadlinks_gma_3"><input type="text" class="widefat " name="size_downloadlinks_gma_3" value="<?php echo $sizedownloadlink_gma_3; ?>" title="<?php echo $sizedownloadlink_gma_3; ?>"  /></td> <?php } ?>
		<td data-title="Name" name="name_downloadlinks_gma_3"><input type="text" class="widefat " name="name_downloadlinks_gma_3" value="<?php echo $namedownloadlink_gma_3; ?>" title="<?php echo $namedownloadlink_gma_3; ?>"  /></td> 
		<td data-title="Link" name="downloadlink_gma_3"><input style="width:100%" type="text" name="downloadlink_gma_3" value="<?php echo $downloadlink_gma_3; ?>" /> </td>
    </tr> 
	<?php } if ($downloadlink_gma_4) { ?>
    <tr> 
		<?php if ($sizedownloadlink_gma_4) { ?><td data-title="Size" name="size_downloadlinks_gma_4"><input type="text" class="widefat " name="size_downloadlinks_gma_4" value="<?php echo $sizedownloadlink_gma_4; ?>" title="<?php echo $sizedownloadlink_gma_4; ?>"  /></td> <?php } ?>
		<td data-title="Name" name="name_downloadlinks_gma_4"><input type="text" class="widefat " name="name_downloadlinks_gma_4" value="<?php echo $namedownloadlink_gma_4; ?>" title="<?php echo $namedownloadlink_gma_4; ?>"  /></td> 
		<td data-title="Link" name="downloadlink_gma_4"><input style="width:100%" type="text" name="downloadlink_gma_4" value="<?php echo $downloadlink_gma_4; ?>" /> </td>
    </tr> 
	<?php } if ($downloadlink_gma_5) { ?>
    <tr> 
		<?php if ($sizedownloadlink_gma_5) { ?><td data-title="Size" name="size_downloadlinks_gma_5"><input type="text" class="widefat " name="size_downloadlinks_gma_5" value="<?php echo $sizedownloadlink_gma_5; ?>" title="<?php echo $sizedownloadlink_gma_5; ?>"  /></td> <?php } ?>
		<td data-title="Name" name="name_downloadlinks_gma_5"><input type="text" class="widefat " name="name_downloadlinks_gma_5" value="<?php echo $namedownloadlink_gma_5; ?>" title="<?php echo $namedownloadlink_gma_5; ?>"  /></td> 
		<td data-title="Link" name="downloadlink_gma_5"><input style="width:100%" type="text" name="downloadlink_gma_5" value="<?php echo $downloadlink_gma_5; ?>" /> </td>
    </tr> 
	<?php } ?>
	
	</tbody>
	</table>
	</div>
	
	<?php } if ($downloadlinks) { ?>
    <script>
	jq1=jQuery.noConflict();jq1(function($){var count=<?php echo $c;?>;$(document).on('click','.remove-row',function(){$(this).parents('p').remove();count--;});$(".addImg").on('click',function(){$(".ElementImagenes").append('<p><input type="text" name="downloadlinks['+count+']" value="" class="regular-text upload"><?php echo @$input_upload; ?><a href="javascript:void(0)" class="button remove-row">Remove</a></p>');count++;});});jpp2=jQuery.noConflict();jpp2(function($){$('.upload_image_button').on('click',function(){formfield=$(this).prev('input');tb_show('','media-upload.php?type=file&amp;TB_iframe=true');var oldFunc=window.send_to_editor;window.send_to_editor=function(html){if($(html).attr('src')){imgurl=$(html).attr('src');}else if($(html).attr('href')){imgurl=$(html).attr('href');}formfield.val(imgurl);tb_remove();window.send_to_editor=oldFunc;};return false;});});
    </script>
    <div class="ElementImagenes">
	<div class="download"></div>
	<div id="no-table">
	<table id="downloadlinks" width="100%"  class="content-table">
	<thead>
	<tr> 
		<?php if ($typexx) { ?>
		<th width="15%" class="more_info">Tipes <div class="popup">APK / ZIP / OBB</div></th>
		<?php } if ($sizexx) { ?>
		<th width="15%" class="more_info">Sizes <div class="popup">APK / ZIP / OBB</div></th>
		<?php } ?>
		<th width="30%" class="more_info">Url Names <div class="popup">APK / ZIP / OBB</div></th>
		<th width="40%" class="more_info">Url Links <div class="popup">APK / ZIP / OBB</div></th> 
	</tr>
	</thead>
	<tbody>
	<center><p><strong style="text-transform:uppercase!important;color:#2271b1">Here for Default Download Links from Sources, you can't add or remove this. <br>but you can copy this link for you insert to download link page</strong></p></center>
	<?php
	$i		= 0;
	if($downloadlinks) {
	foreach($downloadlinks as $elemento) { ?>
	<tr>
		<?php if ($typexx) { ?>
		<td data-title="Tipes" ><input type="text" name="tipes[<?php echo $i; ?>]" value="<?php echo (!empty($typexx[$i])) ? $typexx[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" /><?php echo $input_upload; ?></td>
		<?php } if ($sizexx) { ?>
		<td data-title="Sizes"><input type="text" name="sizes[<?php echo $i; ?>]" value="<?php echo (!empty($sizexx[$i])) ? $sizexx[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
		<?php } ?>
		<td data-title="Url Names"><input type="text" name="namedownloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($namedownloadlinks[$i])) ? $namedownloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
		<td data-title="Url Links"><input type="text" name="downloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($downloadlinks[$i])) ? $downloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
	</tr>
	<?php $i++; } } else {
	for($i=0;$i<3;$i++): ?>
	<tr>
		<?php if ($typexx) { ?>
		<td><input type="text" name="tipes[<?php echo $i; ?>]" value="<?php echo (!empty($typexx[$i])) ? $typexx[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" /><?php echo $input_upload; ?></td>
		<?php } if ($sizexx) { ?>
		<td><input type="text" name="sizes[<?php echo $i; ?>]" value="<?php echo (!empty($sizexx[$i])) ? $sizexx[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
		<?php } ?>
		<td><input type="text" name="namedownloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($namedownloadlinks[$i])) ? $namedownloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
		<td><input type="text" name="downloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($downloadlinks[$i])) ? $downloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
	</tr>
	<?php endfor; ?>
	<?php } ?>
	</tbody>
	</table>
	</div>
	
    </div>
	<?php } $nomor = 1 ?>
 
	<center><p><strong style="text-transform:uppercase!important;color:#2271b1"><?php _e('Here for Your can Insert Link Download', THEMES_NAMES); ?><br><?php _e('you can add, edit or remove your link', THEMES_NAMES); ?></strong></p></center>
	
	<div class="inside">
	<!-- Begin CMB2 Fields -->
	<div class="cmb2-wrap form-table">
	<div id="cmb2-metabox-download_links" class="cmb2-metabox cmb-field-list">
	<div class="cmb-row cmb-repeat-group-wrap cmb-type-group cmb2-id-group-downloads-links cmb-repeat" data-fieldtype="group">
	<div id="sortable" class="cmb-td">
	
	<?php if ( $repeatable_fields ) :
		foreach ( $repeatable_fields as $field ) {
	?> 
		
	<div data-groupid="group_downloads_links" id="group_downloads_links_repeat" class="cmb-nested cmb-field-list cmb-repeatable-group sortable repeatable" style="width:100%;">

	<div id="cmb-group-group_downloads_links" class="postbox cmb-row cmb-repeatable-grouping" > 

	<div class="cmbhandle" id="bukain"><br></div>
	<h3 class="cmb-group-title cmbhandle-title"><span><?php _e('Link', THEMES_NAMES); ?> <?php echo $nomor; ?> </span></h3>

	<div class="inside cmb-td cmb-nested cmb-field-list">
	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_title"><?php _e('Url Names', THEMES_NAMES); ?></label>
	</div>

	<div class="cmb-td">
	<input type="text" class="regular-text" name="name[]" id="group_downloads_links_title" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" >
	</div>
	</div>

	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_links"><?php _e('Url Links', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<input type="text" class="regular-text" name="url[]" id="group_downloads_links_links" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); ?>" >
	</div>
	</div>

	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_size"><?php _e('Sizes', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<input type="text" class="regular-text" name="sizes1[]" id="group_downloads_links_size" value="<?php if($field['sizes1'] != '') echo esc_attr( $field['sizes1'] ); ?>" >
	</div>
	</div>
 

	<div class="cmb-row cmb-type-textarea-small cmb2-id-group-downloads-links-notes cmb-repeat-group-field" data-fieldtype="textarea_small">
	<div class="cmb-th">
	<label for="group_downloads_links_notes"><?php _e('Notes', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<textarea class="cmb2-textarea-small" name="notes[]" id="group_downloads_links_notes" cols="60" rows="4" ><?php if($field['notes'] != '') echo esc_attr( $field['notes'] ); ?></textarea>
	</div>
	</div>

	<div class="cmb-row cmb-remove-field-row">
	<div class="cmb-remove-row">
	<button type="button" data-selector="group_downloads_links_repeat" class="cmb-remove-group-row cmb-remove-group-row-button alignright button-secondary button remove-row"><?php _e('Remove Link', THEMES_NAMES); ?></button>
	</div>
	</div>
						
	</div>			
	</div>			
	</div>
	<?php $nomor++; } else : ?>
	<div data-groupid="group_downloads_links" id="group_downloads_links_repeat" class="cmb-nested cmb-field-list cmb-repeatable-group sortable repeatable" style="width:100%;">

	<div id="cmb-group-group_downloads_links" class="postbox cmb-row cmb-repeatable-grouping" > 

	<div class="cmbhandle" ><br></div>
	<h3 class="cmb-group-title cmbhandle-title"><span><?php _e('Link', THEMES_NAMES); ?> <?php echo $nomor; ?></span></h3>

	<div class="inside cmb-td cmb-nested cmb-field-list">
	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_title"><?php _e('Url Names', THEMES_NAMES); ?></label>
	</div>

	<div class="cmb-td">
	<input type="text" class="regular-text" name="name[]" id="group_downloads_links_title" value="" >
	</div>
	</div>

	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_links"><?php _e('Url Links', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<input type="text" class="regular-text" name="url[]" id="group_downloads_links_links" value="" >
	</div>
	</div>

	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_size"><?php _e('Sizes', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<input type="text" class="regular-text" name="sizes1[]" id="group_downloads_links_size" value="" >
	</div>
	</div>
 

	<div class="cmb-row cmb-type-textarea-small cmb2-id-group-downloads-links-notes cmb-repeat-group-field" data-fieldtype="textarea_small">
	<div class="cmb-th">
	<label for="group_downloads_links_notes"><?php _e('Notes', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<textarea class="cmb2-textarea-small" name="notes[]" id="group_downloads_links_notes" cols="60" rows="4" ></textarea>
	</div>
	</div>

	<div class="cmb-row cmb-remove-field-row">
	<div class="cmb-remove-row">
	<button type="button" data-selector="group_downloads_links_repeat" data-confirm="Are you sure you want to remove?" class="cmb-remove-group-row cmb-remove-group-row-button alignright button-secondary button remove-row"><?php _e('Remove Link', THEMES_NAMES); ?></button>
	</div>
	</div>
						
	</div>			
	</div>			
	</div>
	 
	<?php $nomor++; endif; ?>
	<!-- empty hidden one for jQuery -->
	
		
	<div data-groupid="group_downloads_links" id="group_downloads_links_repeat" class="empty-row screen-reader-text cmb-nested cmb-field-list cmb-repeatable-group sortable repeatable" style="width:100%;">

	<div id="cmb-group-group_downloads_links" class="postbox cmb-row cmb-repeatable-grouping" > 

	<div class="cmbhandle" ><br></div>
	<h3 class="cmb-group-title cmbhandle-title"><span><?php _e('Add new Link', THEMES_NAMES); ?> </span></h3>

	<div class="inside cmb-td cmb-nested cmb-field-list">
	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_title"><?php _e('Url Names', THEMES_NAMES); ?></label>
	</div>

	<div class="cmb-td">
	<input type="text" class="regular-text" name="name[]" id="group_downloads_links_title" value="" >
	</div>
	</div>

	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_links"><?php _e('Url Links', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<input type="text" class="regular-text" name="url[]" id="group_downloads_links_links" value="" >
	</div>
	</div>

	<div class="cmb-row cmb-type-text cmb-repeat-group-field table-layout" data-fieldtype="text">
	<div class="cmb-th">
	<label for="group_downloads_links_size"><?php _e('Sizes', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<input type="text" class="regular-text" name="sizes1[]" id="group_downloads_links_size" value="" >
	</div>
	</div>
 

	<div class="cmb-row cmb-type-textarea-small cmb2-id-group-downloads-links-notes cmb-repeat-group-field" data-fieldtype="textarea_small">
	<div class="cmb-th">
	<label for="group_downloads_links_notes"><?php _e('Notes', THEMES_NAMES); ?></label>
	</div>
	<div class="cmb-td">
	<textarea class="cmb2-textarea-small" name="notes[]" id="group_downloads_links_notes" cols="60" rows="4" ></textarea>
	</div>
	</div>

	<div class="cmb-row cmb-remove-field-row">
	<div class="cmb-remove-row">
	<button type="button" data-selector="group_downloads_links_repeat" data-confirm="Are you sure you want to remove?" class="cmb-remove-group-row cmb-remove-group-row-button alignright button-secondary button remove-row"><?php _e('Remove Link', THEMES_NAMES); ?></button>
	</div>
	</div>
						
	</div>			
	</div>			
	</div>
	 
	
	<div class="cmb-row">
	<div class="cmb-td">	
	<p class="cmb-add-row"><a id="add-row" class="button cmb-add-group-row button-secondary" href="#"><?php _e('Add New Url Link', THEMES_NAMES); ?></a>
	<input type="submit" class="button metabox_submit" value="<?php _e('Save', THEMES_NAMES); ?>" />
	</p>
	</div>
	</div>
	 
	</div>
	</div>			
	</div>
	</div>
	<!-- End CMB2 Fields -->
	</div>

	<script>
    var $exhemes_devs = jQuery.noConflict();   
	</script> 
    <script type="text/javascript">
    jQuery(document).ready(function($){$('.metabox_submit').click(function(e){e.preventDefault();$('#publish').click();});$('#add-row').on('click',function(){var row=$('.empty-row.screen-reader-text').clone(true);row.removeClass('empty-row screen-reader-text');row.insertBefore('#cmb2-metabox-download_links .cmb-td>div#group_downloads_links_repeat:last');return false;});$('button.remove-row').on('click',function(){$(this).parents('div#group_downloads_links_repeat').remove();return false;});$('#cmb2-metabox-download_links .cmb-td').sortable({opacity:0.6,revert:true,cursor:'move',handle:'.sort'});});
    </script> 
	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.js"></script>
 	
	<script>
	$("#sortable").sortable({stop:function(){$("#sortable").find("input").bind('mousedown.ui-disableSelection selectstart.ui-disableSelection',function(e){e.stopImmediatePropagation();});}}).disableSelection();$("#sortable").find("input").bind('mousedown.ui-disableSelection selectstart.ui-disableSelection',function(e){e.stopImmediatePropagation();});
	</script>
	
	<script>
	$(document).ready(function () {
	$("div.cmbhandle").click(function () {
    $( this ).parent('.postbox').toggleClass('closed');
	});
	});  
	</script>
 
 

<?php }
add_action('save_post', 'repeatable_meta_box_save');
function repeatable_meta_box_save($post_id) {
    if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
        ! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    $old							= get_post_meta($post_id, 'repeatable_fields', true);
    $new							= array();
    $tipes							= $_POST['tipes'];
    $sizes1							= $_POST['sizes1'];
    $names							= $_POST['name'];
    $urls							= $_POST['url'];
    $notes							= $_POST['notes'];
    $count							= count( $names );
    for ( $i = 0; $i < $count; $i++ ) {
        if ( $names[$i] != '' ) :
            $new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
			if ( $notes[$i] != '' )
			$new[$i]['notes'] = $notes[$i];
            if ( $tipes[$i] != '' )
                $new[$i]['tipes'] = stripslashes( strip_tags( $tipes[$i] ) );
            if ( $sizes1[$i] != '' )
                $new[$i]['sizes1'] = stripslashes( strip_tags( $sizes1[$i] ) );
            if ( $urls[$i] == '' )
                $new[$i]['url'] = '';
            else
                $new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'repeatable_fields', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'repeatable_fields', $old );
}
#################################### <a class="button remove-row" href="#">Remove</a>
function callback_imagenes($post){
    $gambarX21						= get_post_meta( $post->ID, 'wp_images_GP', true );
    $gambarX212						= get_post_meta( $post->ID, 'wp_images_GP1', true );
    //$datos_imagenes = ''.$gambarX21.''.$gambarX212.'';
    //$datos_imagenes = get_post_meta($post->ID, 'wp_images_GP', true);
    $datos_imagenes					= $gambarX21;
    if ( $datos_imagenes === FALSE or $datos_imagenes == '' ) $datos_imagenes = $gambarX212;


    $datos_imagenes					= !empty($datos_imagenes) ? $datos_imagenes : array();
    $i								= 2;
    $input_upload					= '<input class="gambarbaru upload_image_button button" type="button" value="Upload">';
    ?>
    <script>jq1 = jQuery.noConflict();
        jq1(function($) {
            var count = <?php echo $i; ?>;
            $(document).on('click', '.hapusgambar', function(){
                $(this).parents('p').remove();
                count--;
            });
            $(".tambahgambar").on('click', function(){
                $(".kolomgambar").append('<p><input type="text" name="datos_imagenes['+count+']" value="" class="regular-text upload"><?php echo @$input_upload; ?><a href="javascript:void(0)" class="button hapusgambar">Remove</a></p>');
                count++;
            });
        });
        jpp2 = jQuery.noConflict();
        jpp2(function($) {
            $('.gambarbaru').on( 'click', function() {
                formfield = $(this).prev('input');
                tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');
                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {
                    if($(html).attr('src')) {
                        imgurl = $(html).attr('src');
                    } else if ($(html).attr('href')) {
                        imgurl = $(html).attr('href');
                    }
                    formfield.val(imgurl);
                    tb_remove();
                    window.send_to_editor = oldFunc;
                };
                return false;
            });
        });
    </script>
    <div class="kolomgambar"  >
        <div class="download"></div>
        <center>
            <p><strong style="text-transform:uppercase!important;color:#2271b1">Here for Default Screenshoots Poster from Googleplay, you cant add or remove this</strong></p>
        </center>
        <table style="width:100%;">
            <thead>
            <tr style="text-align:left;">
                <th style="width:100%;">Link Source Images Poster from Googleplay</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $limiteds = 4;
            $i = 0;
            foreach ($datos_imagenes as $elemento) {
                $i++;
                if ( $i <= $limiteds ) { ?>
                    <tr>
                        <td><input type="text" name="datos_imagenes[<?php echo $i; ?>]" value="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" id="imagenes<?php echo $i; ?>" class="regular-text upload"><?php echo $input_upload; ?><a href="#" class="button hapusgambar">Remove</a></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input type="text" name="datos_imagenes[<?php echo $i; ?>]" value="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" id="imagenes<?php echo $i; ?>" class="regular-text upload"><?php echo $input_upload; ?><a href="#" class="button hapusgambar">Remove</a></td>
                    </tr>
                <?php } } ?>


            </tbody>
        </table>
    </div>
    <p class="tambahgambar button" ><b>+ Add Images</b></p>
<?php }
add_action( 'save_post', 'cd_quote_meta_save' );
function cd_quote_meta_save( $id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if(!wp_verify_nonce( @$_POST['dynamicMeta_noncename'], plugin_basename( __FILE__ ))){
        return;
    }
    if( !current_user_can( 'edit_post', $id ) ) return;
    $allowed = array(
        'p'	=> array()
    );
    if($_POST['datos_informacion'])
        update_post_meta($id, "datos_informacion", $_POST['datos_informacion']);
    if($_POST['datos_video'])
        update_post_meta($id, "datos_video", $_POST['datos_video']);
    if($_POST['datos_imagenes'])
        update_post_meta($id, "datos_imagenes", $_POST['datos_imagenes']);
    if($_POST['datos_download'])
        update_post_meta($id, "datos_download", $_POST['datos_download']);
    if(isset($_POST['custom_boxes']))
        update_post_meta($id, "custom_boxes", $_POST['custom_boxes']);
    if( isset($_POST['new_rating_users'])  || isset($_POST['new_rating_average']) ) {
        update_post_meta($id, "new_rating_users", $_POST['new_rating_users']);
        update_post_meta($id, "new_rating_average", $_POST['new_rating_average']);
        update_post_meta($id, "new_rating_count", ceil($_POST['new_rating_users'] * $_POST['new_rating_average']));
    }
}

/* When the post is saved, saves our custom data */
function wpwm_save_postdata( $post_id ) {
    // First we need to check if the current user is authorised to do this action.
    if ( 'page' == @$_REQUEST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;
    }
    $wpwm_meta = array('wp_version_GP', 'wp_version', 'link_download_apksupport','name_download_apksupport','size_download_apksupport','type_download_apksupport','wp_download_original_ps', 'wp_downloadapkxapkpremier_link', 'wp_category_app', 'wp_downloadapkxapkg','wp_downloadapkxapkpremier','wp_title_wp_mods_3', 'wp_title_wp_mods_2', 'wp_title_wp_mods', 'wp_mods2', 'wp_newupdates', 'wp_mods2', 'wp_namedownloadlink', 'wp_size_GP', 'wp_GP_ID', 'wp_sizes', 'wp_source_url', 'wp_downloadlink', 'wp_title', 'wp_GP_ID2', 'wp_title_id', 'wp_title_id2', 'wp_developers', 'wp_developers2', 'wp_contentrated', 'wp_installs','wp_requires', 'wp_updates', 'wp_ratings', 'wp_rated', 'wp_whatnews', 'wp_gambar1', 'wp_gambar2', 'wp_gambar3', 'wp_gambar4', 'wp_gambar5', 'wp_gambar6', 'wp_youtube', 'wp_desck', 'wp_desckapgk', 'wp_desckapgk', 'wp_contentratingapgk', 'wp_updateapgk', 'wp_requiresapgk', 'wp_installsapgk', 'wp_developersapgk', 'wp_versionapgk', 'wp_judulapgk', 'wp_persenapgk', 'wp_modfeatures', 'wp_modfeatures3','wp_images_GP',  'wp_mods', 'wp_desck_GP',  'wp_youtube_GP', 'wp_whatnews_GP', 'wp_persen_GP', 'wp_ratings_GP', 'wp_rated_GP', 'wp_contentrated_GP', 'wp_updates_GP', 'wp_requires_GP', 'wp_installs_GP', 'wp_version_GP', 'wp_developers2_GP', 'wp_developers_GP', 'wp_title_GP', 'wp_GP_ID', 'wp_poster_GP',  );
    //if saving in a custom table, get post_ID
    $post_ID = @$_POST['post_ID'];
    foreach ($wpwm_meta as $meta_key) {
        if(isset($_POST[$meta_key])) update_post_meta($post_ID, $meta_key, $_POST[$meta_key]);
    }
}
add_action( 'save_post', 'wpwm_save_postdata' );