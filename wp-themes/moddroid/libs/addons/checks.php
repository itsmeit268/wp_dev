<?php

global $wpdb, $post, $wp_query, $opt_themes;
$language						= $opt_themes['ex_themes_extractor_apk_language_'];
$arr['languages']				= $language;
if ( isset($_GET['cron']) &&  $_GET['cron'] == 'reset'){
    global $wpdb;
    $table						= $wpdb->prefix.'postmeta';
    $wpdb->delete ($table, array('meta_key' => '_mediart_scraped_time'));
    exit('Reset done');
}
$args = array(
    'posts_per_page' =>10,
    'meta_query' => array(
        'relation' => 'OR' ,
        array(
            'key'     => '_mediart_scraped_time',
            'value'   =>  intval(time() - 10) ,
            'compare' => '<',
            'type'      => 'numeric'
        ),
        array(
            'key'     => '_mediart_scraped_time',
            'compare' => 'NOT EXISTS',
        )
    )
);
$query					= new WP_Query( $args );
$posts					= $query->posts;
foreach($posts as $p) {
    is_apk_update_available($p->ID) ;
}
//exit('<br> Done');	
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function is_apk_update_available($post_id , $debug=false){    
    require_once 'includes/scrap.php';    
    if ($debug) echo "<br/>Checking post id : " . $p->ID . ' : ';
    update_post_meta($post_id, '_mediart_scraped_time', time() );
    $url					= get_post_meta($post_id , 'wp_ps_sources' , true);
    $parsedurl				= parse_url($url);
    if(! isset($parsedurl['query'])) return false;
    /* parse_str($parsedurl['query'], $params); */
    if(! isset($gets_data['GP_ID']) ) return false;
    $appid					= $gets_data['GP_ID'];
    $playstoreid			= $gets_data['GP_ID'];
    /* $playstoreid = $params['id']; */
    $scrap					= new ScrapPlayStore($playstoreid);
    $available_version		= $scrap->appinfo('Current Version');
    $current_version		= get_post_meta($post_id, 'wp_version_GP', true );
    if ($debug)
        echo 'Current Version: ' .$current_version . 'Available Version: ' . $available_version ;
    if (version_compare($available_version, $current_version ) > 0 ) {
        update_post_meta($post_id, '_mediart_update_available' , 'yes' );
        update_post_meta($post_id, '_mediart_available_version' ,$available_version );
        if ($debug) echo '<span style="color:red">Notified </span>';
        return true;
    }
    return false;
}
/// for admin
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function available_app_updates() {
    $updateableposts = get_posts( array(
        'posts_per_page'   => -1,
        'meta_key'   => '_mediart_update_available',
        'meta_value' => 'yes',
    ) );
    if (!empty($updateableposts)) : ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e( 'Available app updates!', 'wordpress' ); ?></p>
            <ul style="list-style-type:none;">
                <?php foreach($updateableposts as $p) :
                    $available_version		= get_post_meta($p->ID, '_mediart_available_version', true );
                    $current_version		= get_post_meta($p->ID, 'wp_version_GP', true );
                    if (version_compare($available_version, $current_version ) > 0 ) : ?>
                        <li><a href="<?php echo get_edit_post_link($p->ID) ;?>"> <?php echo $p->post_title ;?></a>
                            Current Version : <?php echo $current_version ;?>
                            Available Version: <?php echo $available_version ;?>
                        </li>
                    <?php endif ; endforeach;?>
            </ul>
        </div>
    <?php endif;
}
add_action( 'admin_notices', 'available_app_updates' );
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\

