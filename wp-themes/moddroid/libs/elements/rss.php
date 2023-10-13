<?php         
function import_feed_items()
{
  $feeds = fetch_feed('https://moddroid.co/rss');

  if( !is_wp_error($feeds) )
  {

    if( $last_import = get_option('last_import') )
    {
      $last_import_time = $last_import;
    } else {
      $last_import_time = false;
    }

    $items = $feeds->get_items();
    $latest_item_time = false;

    foreach ( $items as $item )
    {

      $item_date = $item->get_date('Y-m-d H:i:s');
      if( $last_import_time && ($last_import_time >= strtotime($item_date)) )
      {
        continue;
      }

      $post = array(
        'post_content'   => $item->get_content(),
        'post_date'      => $item_date,
        'post_title'     => $item->get_title(),
        'post_status'    => 'publish',
        'post_type'      => 'news'
      );
      wp_insert_post($post);

      if( strtotime($item_date) > $latest_item_time )
      {
        $latest_item_time = strtotime($item_date);
      }

    }

    if( false !== $latest_item_time )
    {
      update_option('last_import', $latest_item_time);
    }

  }
  else
  {
    echo $feeds->get_error_message();
  }
}
add_action('wp', 'import_feed_items');



/*
| -------------------------------------------------------------------
| Schedule and update fashion news with the news rss feed
| -------------------------------------------------------------------
| 
| */

add_action('init', function(){
	 $timescheduled = wp_next_scheduled('update_feed');
	 wp_unschedule_event($timescheduled, 'update_feed');
	 
	if (!wp_next_scheduled('update_feed'))
    wp_schedule_event(time(), 'hourly', 'update_feed');
});

add_action('update_feed', 'update_fashion_news');

function update_fashion_news() {
	// retrieve the previous date from database
		$time = get_option('newlatestpostondate');
		
		//read the feed
		/* 
		http://feeds.bbci.co.uk/news/uk/rss.xml
		 */
		if(function_exists('fetch_feed')){
			$uri = 'http://feeds.bbci.co.uk/news/uk/rss.xml';
			$feed = fetch_feed($uri);
		}
		
		if($feed) {
			
			foreach ($feed->get_items() as $item){
				$titlepost = $item->get_title();
				$content = $item->get_content();
				$description = $item->get_description();
				$itemdate = $item->get_date();
				$media_group = $item->get_item_tags('', 'enclosure');
				$img = $media_group[0]['attribs']['']['url'];
				$width = $media_group[0]['attribs']['']['width'];			
				// $latestItemDate = $feed->get_item()->get_date();
				
			
				// if the date is < than the date we have in database, get out of the loop
				if( $itemdate <= $time) break;
				
				
				// prepare values for inserting
				$post_information = array(
				    'post_title' => $titlepost,
				    'post_content' => $description,
				    'post_type' => 'news',
				    'post_status' => 'publish',
				    'post_date' => date('Y-m-d H:i:s')
				);
				
				$post_id = wp_insert_post( $post_information );
				
				// Set Image Path
				$upload_dir = wp_upload_dir();
				
				// get image data
				$image_data = file_get_contents($img);
				
				$filename = basename($img);
				
				if(wp_mkdir_p($upload_dir['path']))
			    	$file = $upload_dir['path'] . '/' . $filename;
				else
				    $file = $upload_dir['basedir'] . '/' . $filename;
				
				// put the file data into the folder
				file_put_contents($file, $image_data);
				 
				
				// Validate FileType
				$wp_filetype = wp_check_filetype($filename, null );
				
				//Generate attachment argument array
				$attachment = array(
     				'post_mime_type' => $wp_filetype['type'],
				    'post_title' => sanitize_file_name($filename),
				    'post_content' => '',
				    'post_status' => 'inherit'
				);

  				$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
  				
  				require_once(ABSPATH . "wp-admin" . '/includes/image.php');
  				$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	  			wp_update_attachment_metadata( $attach_id, $attach_data );
	  			
  				set_post_thumbnail( $post_id, $attach_id );
  				
			
			}
		}
		// update the new date in database to the date of the first item in the loop		
		update_option( 'newlatestpostondate', $feed->get_item()->get_date() );
}