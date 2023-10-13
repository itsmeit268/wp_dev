<?php
define('CPTX', 'news');
define('NAMECPTX', 'News');
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// NEWS CPT
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function news() {
    $labels = array(
        'name'                          => _x( 'News', 'Post Type General Name', THEMES_NAMES ),
        'singular_name'                 => _x( 'News', 'Post Type Singular Name', THEMES_NAMES ),
        'menu_name'                     => __( 'News', THEMES_NAMES ),
        'parent_item_colon'             => __( 'Parent News:', THEMES_NAMES ),
        'all_items'                     => __( 'All News', THEMES_NAMES ),
        'view_item'                     => __( 'View News ', THEMES_NAMES ),
        'add_new_item'                  => __( 'Add New Article', THEMES_NAMES ),
        'add_new'                       => __( 'Add News', THEMES_NAMES ),
        'edit_item'                     => __( 'Edit News ', THEMES_NAMES ),
        'update_item'                   => __( 'Update News ', THEMES_NAMES ),
        'search_items'                  => __( 'Search News', THEMES_NAMES ),
        'not_found'                     => __( 'Not found', THEMES_NAMES ),
        'not_found_in_trash'            => __( 'Not found in Trash', THEMES_NAMES ),
    );
    $rewrite = array(
        'slug'                          => 'news',
        'with_front'                    => true,
        'pages'                         => true,
        'feeds'                         => true,
    );
    $args = array(
        'label'                         => __( 'News', THEMES_NAMES ),
        'description'                   => __( ' News', THEMES_NAMES ),
        'labels'                        => $labels,
		'show_in_rest'                  => true, // To use Gutenberg editor.
        'supports'                      => array( 'title', 'editor', 'thumbnail', 'comments'),
        'hierarchical'                  => false,
        'public'                        => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_in_nav_menus'             => true,
        'show_in_admin_bar'             => true,
        'menu_position'                 => 7,
        'menu_icon'                     => 'dashicons-book',
        'can_export'                    => true,
        'has_archive'                   => true,
        'exclude_from_search'           => false,
        'publicly_queryable'            => true,
        'capability_type'               => 'page',
        'rewrite'                       => $rewrite,
    );
    register_post_type( 'news', $args );
}
add_action( 'init', 'news', 0 );
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// NEWS TAGS CPT
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function news_tags_taxonomy() { 
$news_tags = array(
        'name'                          => _x( 'Tags', 'taxonomy general name' ),
        'singular_name'                 => _x( 'Tag', 'taxonomy singular name' ),
        'search_items'                  => __( 'Search Tags' ),
        'popular_items'                 => __( 'Popular Tags' ),
        'all_items'                     => __( 'All Tags' ),
        'parent_item'                   => null,
        'parent_item_colon'             => null,  
        'edit_item'                     => __( 'Edit Tag' ),
        'update_item'                   => __( 'Update Tag' ),
        'add_new_item'                  => __( 'Add New Tag' ),
        'new_item_name'                 => __( 'New Tag Name' ),
        'separate_items_with_commas'    => __( 'Separate tags with commas' ),
        'add_or_remove_items'           => __( 'Add or remove tags' ),
        'choose_from_most_used'         => __( 'Choose from the most used tags' ),
        'menu_name'                     => __( 'Tags' ), 
        );
    register_taxonomy('news_tags','news', array(
        'hierarchical'                  => false,
        'labels'                        => $news_tags,
        'show_ui'                       => true,
		'show_in_rest'                  => true, 
        'show_admin_column'             => true,
        'update_count_callback'         => '_update_post_term_count',
        'query_var'                     => true,
        'rewrite'                       => array('slug' => 'news_tags' ),
    ));
}
add_action( 'init', 'news_tags_taxonomy', 0 );
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// NEWS CATEGORIE CPT
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function news_categories_taxonomy() {
$label = array(
        'name'                          => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'                 => _x( 'Category', 'taxonomy singular name' ), 
        'search_items'                  => __( 'Search Categories' ),
        'all_items'                     => __( 'All Categories' ),
        'parent_item'                   => __( 'Parent Category' ),
        'parent_item_colon'             => __( 'Parent Category:' ),
        'edit_item'                     => __( 'Edit Category' ),
        'update_item'                   => __( 'Update Category' ),
        'add_new_item'                  => __( 'Add New Category' ),
        'new_item_name'                 => __( 'New Category' ),
        'menu_name'                     => __( 'Categories' ),
    );
    register_taxonomy(
        'news_categories', array('news'), array(
        'hierarchical'                  => true,
        'labels'                        => $label,
		'show_in_rest'                  => true, 
        'show_ui'                       => true,
        'show_admin_column'             => true,
        'query_var'                     => true,
        'rewrite'                       => array('slug' => 'news_categories' ),
    ));
}
add_action( 'init', 'news_categories_taxonomy', 0 );
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// DEVELOPERS CPT
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function ex_themes_taxonomies_() {
$labels = array(
		'name'                          => _x( 'Developer', 'taxonomy general name' ),
		'singular_name'                 => _x( 'Developer', 'taxonomy singular name' ),
		'search_items'                  => __( 'Search Developer' ),
		'all_items'                     => __( 'All Developer' ),
		'parent_item'                   => __( 'Parent Developer' ),
		'parent_item_colon'             => __( 'Parent Developer:' ),
		'edit_item'                     => __( 'Edit Developer' ),
		'update_item'                   => __( 'Update Developer' ),
		'add_new_item'                  => __( 'Add New Developer' ),
		'new_item_name'                 => __( 'New Developer Name' ),
		'menu_name'                     => __( 'Developer' ),
	);
	$args = array(
		'hierarchical'                  => false,
		'labels'                        => $labels,
		'show_ui'                       => true,
		'show_admin_column'             => false,
		'update_count_callback'         => '_update_post_term_count',
		'query_var'                     => true,		
		'show_in_rest'                  => true,
		'rewrite'                       => array( 'slug' => 'developer' ),
	);
	register_taxonomy( 'developer', array( 'post' ), $args );
}
add_action( 'init', 'ex_themes_taxonomies_', 0 );
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// REQUEST CPT
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function request() {
$labels = array(
        'name'                          => _x( 'Request', 'Post Type General Name', THEMES_NAMES ),
        'singular_name'                 => _x( 'Request', 'Post Type Singular Name', THEMES_NAMES ),
        'menu_name'                     => __( 'Request', THEMES_NAMES ),
        'parent_item_colon'             => __( 'Parent Request:', THEMES_NAMES ),
        'all_items'                     => __( 'All request', THEMES_NAMES ),
        'view_item'                     => __( 'View Request Info', THEMES_NAMES ),
        'add_new_item'                  => __( 'Add Request', THEMES_NAMES ),
        'add_new'                       => __( 'Add Request', THEMES_NAMES ),
        'edit_item'                     => __( 'Edit Request Info', THEMES_NAMES ),
        'update_item'                   => __( 'Update Request Info', THEMES_NAMES ),
        'search_items'                  => __( 'Search Request', THEMES_NAMES ),
        'not_found'                     => __( 'Not found', THEMES_NAMES ),
        'not_found_in_trash'            => __( 'Not found in Trash', THEMES_NAMES ),
    );
    $rewrite = array(
        'slug'                          => 'request',
        'with_front'                    => false,
        'pages'                         => true,
        'feeds'                         => false,
    ); 
    $args = array(
        'label'                         => __( 'Request', THEMES_NAMES ),
        'description'                   => __( 'Info Request', THEMES_NAMES ),
        'labels'                        => $labels,
		'show_in_rest'                  => false, // To use Gutenberg editor.
        'supports'                      => array( 'title', 'editor' ),
        'hierarchical'                  => false,
        'public'                        => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_in_nav_menus'             => false,
        'show_in_admin_bar'             => false,
        'menu_position'                 => 7,
        'menu_icon'                     => 'dashicons-tickets',
        'can_export'                    => true,
        'has_archive'                   => false,
        'exclude_from_search'           => false,
        'publicly_queryable'            => false,
        'capability_type'               => 'page',
        'rewrite'                       => $rewrite,
    );
    register_post_type( 'request', $args );
}
add_action( 'init', 'request', 0 );
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// Remove slug from custom post type post URLs
// https://wordpress.stackexchange.com/questions/203951/remove-slug-from-custom-post-type-post-urls
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function remove_slug_news( $post_link, $post, $leavename ) {
    if ( 'news' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'remove_slug_news', 10, 3 );
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function parse_request_news( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'news', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'parse_request_news' );

// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// REVIEW BOX
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
function add_custom_box( $post ) {
    add_meta_box(
        'review_app_box', // ID, should be a string.
        'REVIEW APP BOX', // Meta Box Title.
        'services_meta_box', // Your call back function, this is where your form field will go.
        CPTX, // The post type you want this to show up on, can be post, page, or custom post type.
        'normal', // The placement of your meta box, can be normal or side.
        'core' // The priority in which this will be displayed.
    );
}
add_action( 'add_meta_boxes', 'add_custom_box' );

function services_meta_box($post) { 
wp_nonce_field( 'my_awesome_nonce', 'awesome_nonce' );    
$review_on			= get_post_meta( $post->ID );
$title				= get_post_meta( $post->ID, 'review_title',  true );
$images				= get_post_meta( $post->ID, 'review_images_url',  true );
$links				= get_post_meta( $post->ID, 'review_links',  true );
$namelinks			= get_post_meta( $post->ID, 'review_name_links',  true );
$description		= get_post_meta( $post->ID, 'review_desc',  true );
$rating				= get_post_meta( $post->ID, 'review_rating',  true );

?>
 
<p class="meta-options">
 
<label for="review-app-on" class="selectit">
<input type="checkbox" name="review-app-on" id="review-app-on" value="yes" <?php if ( isset ( $review_on['review-app-on'] ) ) checked( $review_on['review-app-on'][0], 'yes' ); ?> />Enable Review Apps ?
</label>
<br /> 
</p>

        <?php
            $args = array(  
                'post_type'     => 'post', 
                'post_status'   => 'publish',
                'posts_per_page' => -1, 
            );
            $loop = new WP_Query( $args );
        ?> 
 
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
<style> 
.btn {background-color: black;color: #fff;padding: 0.55em;border: none;cursor: pointer;}.clicked::after {content: attr(data-feedback);}.Table {overflow: hidden;display: -webkit-box;display: -moz-box;display: box;display: -webkit-flex;display: -moz-flex;display: -ms-flexbox;display: flex;-webkit-flex-flow: column nowrap;-moz-flex-flow: column nowrap;flex-flow: column nowrap;-webkit-box-pack: justify;-moz-box-pack: justify;box-pack: justify;-webkit-justify-content: space-between;-moz-justify-content: space-between;-ms-justify-content: space-between;-o-justify-content: space-between;justify-content: space-between;-ms-flex-pack: justify;font-size: 1rem;margin: 0.5rem;line-height: 1.5;}.Table-header {display: none;}@media (min-width: 500px) {.Table-header {font-weight: 700;}}.Table-row {width: 100%;}@media (min-width: 500px) {.Table-row {display: -webkit-box;display: -moz-box;display: box;display: -webkit-flex;display: -moz-flex;display: -ms-flexbox;display: flex;-webkit-flex-flow: row nowrap;-moz-flex-flow: row nowrap;flex-flow: row nowrap;}}.Table-row-item {display: -webkit-box;display: -moz-box;display: box;display: -webkit-flex;display: -moz-flex;display: -ms-flexbox;display: flex;-webkit-flex-flow: row nowrap;-moz-flex-flow: row nowrap;flex-flow: row nowrap;-webkit-flex-grow: 1;-moz-flex-grow: 1;flex-grow: 1;-ms-flex-positive: 1;-webkit-flex-basis: 0;-moz-flex-basis: 0;flex-basis: 0;-ms-flex-preferred-size: 0;word-wrap: break-word;overflow-wrap: break-word;word-break: break-all;padding: 0.5em;word-break: break-word;}.Table-row .Table-row-item:nth-of-type(1) {flex-grow: 0.08;}.Table-row-item:before {content: attr(data-header);width: 30%;font-weight: 700;}@media (min-width: 500px) {.Table-row-item {padding: 0.5em;}.Table-row-item:before {content: none;}}.row-collection {height: 200px;overflow: auto;margin-right: -15px;}
</style>
  

	<h2 style="font-size: 15px !important;text-transform: uppercase;font-weight: bold;text-align: center;">Here Your List of Post</h2>   
	<p style="text-align: center;text-transform: uppercase;font-weight: bold;"> click <u class="cool-link f2">CTRL + F</u> to find your article post </p>
	
  <div class="Table">  
        <div class="Table-row Table-header">
            <div class="Table-row-item">&nbsp;&nbsp;&nbsp;</div>
            <div class="Table-row-item">Title</div>
            <div class="Table-row-item">Image</div>
            <div class="Table-row-item">Link</div>  
          </div>   
    
	<div class="row-collection">
	<?php
	$count		= 1;
    while ( $loop->have_posts() ) : $loop->the_post();	
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
	?>
    <div class="Table-row">
    
		<div class="Table-row-item" title="Post <?php echo $count; ?>" data-header="Number Post <?php echo $count; ?>">&nbsp;</div>
		<div class="Table-row-item" data-header="Title">
		<input type="text" name="get_the_title" value="<?php echo get_the_title(); ?>" />
		<span class="btn btn-copy" data-feedback=" Copied"><i class="fa fa-clipboard" aria-hidden="true"></i></span>
		</div>
        
		<div class="Table-row-item" data-header="Image">
		<input type="text" name="featured_img_url" value="<?php echo $featured_img_url; ?>" />
		<span class="btn btn-copy" data-feedback=" Copied"><i class="fa fa-clipboard" aria-hidden="true"></i></span>
		</div>
        
		<div class="Table-row-item" data-header="Link">
		<input  type="text" name="get_permalink" value="<?php echo get_permalink(); ?>" />
		<span class="btn btn-copy" data-feedback=" Copied"><i class="fa fa-clipboard" aria-hidden="true"></i></span>
		</div>
         
        
    </div>
    <?php
   /*  $meta_print_value=get_post_meta(get_the_ID(),'selectedchapter',true);
	echo $meta_print_value; */
	$count++;
    endwhile; 
	?>
	</div>
	</div>
<script>
    var $EXHEMES_DEV_BLOG = jQuery.noConflict();   
</script> 
<script src='//code.jquery.com/jquery-3.1.1.min.js'></script>
<script id="rendered-js" >
function clipboard(elem, event) {
  elem.prev('input[type="text"]').focus().select();
  document.execCommand(event);
  elem.prev('input[type="text"]').blur();
  elem.addClass('clicked');
  setTimeout(function () {
    elem.removeClass('clicked');
  }, 500);
}

$('.btn-copy').on('click', function () {
  clipboard($(this), 'copy');
});
</script>


<p>
<b style="text-transform:capitalize">Title </b>
<input style="width:98%;margin-top:10px;" type="text" name="review_title" value="<?= $title ?>" />
</p>

<p>
<b style="text-transform:capitalize">Image </b>
<input style="width:98%;margin-top:10px;" type="text" name="review_images_url" value="<?= $images ?>" />
</p>

<p>
<b style="text-transform:capitalize">Url Link </b>
<input style="width:98%;margin-top:10px;" type="text" name="review_links" value="<?= $links ?>" />
</p>

<p>
<b style="text-transform:capitalize">Name Link </b>
<input style="width:98%;margin-top:10px;" type="text" name="review_name_links" value="<?= $namelinks ?>" />
</p>

<p>
<b style="text-transform:capitalize">Rating </b>
<input style="width:98%;margin-top:10px;" type="text" name="review_rating" value="<?= $rating ?>" />
</p>

<p>
<b style="text-transform:capitalize">Desc </b>
<?php 
wp_editor(($description), 'review_desc', array(
      'textarea_name' => 'review_desc', 
	  'media_buttons' => false,
      'textarea_rows' => 3,
      'tabindex' => 3,
      'tinymce' => array(
        'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
      ),
	)); 
?>
</p>

<?php }

add_action( 'save_post', 'save_services_checkboxes' );
function save_services_checkboxes( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;
    if ( ( isset ( $_POST['my_awesome_nonce'] ) ) && ( ! wp_verify_nonce( $_POST['my_awesome_nonce'], plugin_basename( __FILE__ ) ) ) )
        return;
    if ( ( isset ( $_POST['post_type'] ) ) && ( CPTX == $_POST['post_type'] )  ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }    
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
	$wpwm_meta = array('review_title','review_images_url','review_links','review_name_links','review_desc','review_rating');
	$post_ID = @$_POST['post_ID'];
    foreach ($wpwm_meta as $meta_key) {
        if(isset($_POST[$meta_key])) update_post_meta($post_ID, $meta_key, $_POST[$meta_key]);
    }

    //saves review-app-on value
    if( isset( $_POST[ 'review-app-on' ] ) ) {
        update_post_meta( $post_id, 'review-app-on', 'yes' );
    } else {
        update_post_meta( $post_id, 'review-app-on', 'no' );
    }
    //saves review-app-on value
    if( isset( $_POST[ 'blog-img-on' ] ) ) {
        update_post_meta( $post_id, 'blog-img-on', 'yes' );
    } else {
        update_post_meta( $post_id, 'blog-img-on', 'no' );
    }
    
}
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//  
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
