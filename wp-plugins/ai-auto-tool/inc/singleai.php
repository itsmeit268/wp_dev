<?php
defined('ABSPATH') or die();
class AIAutoToolsinglepost  extends rendersetting{

    public  $active = true;
    public  $active_option_name = 'AIAutoToolsinglepost_active';
     public  $usage_option_name = 'AI_post_usage';
    public  $icon = '<i class="fa-solid fa-robot"></i>';

    public $limit = AIAUTOTOOL_FREE;
    private $plan_limit_aiautotool ;
    public $name_plan ;
    public $config = array();
    public $notice ;
    public function __construct() {
        $this->name_plan =  __('Ai Post','ai-auto-tool');
        $this->plan_limit_aiautotool =  'plan_limit_aiautotool_'.$this->active_option_name;
        
        $this->notice = new aiautotool_Warning_Notice();

         $this->active = get_option($this->active_option_name, true);
        if ($this->active=='true') {
            $this->init();
        }
        add_action('wp_ajax_update_active_option_canonical_'.$this->active_option_name, array($this, 'update_active_option_callback'));
        add_action('wp_ajax_nopriv_update_active_option_canonical_'.$this->active_option_name, array($this, 'update_active_option_callback'));

      
      

    }
    private function aiautotool_has_plugin_data() {
        return get_option($this->plan_limit_aiautotool) !== false;
    }
    private function aiautotool_initialize_plugin_data() {
        $current_date = date('Y-m-d');
        
        $expiration = strtotime('+1 month', strtotime($current_date));
        $expiration = date('Y-m-d', $expiration);
        update_option($this->plan_limit_aiautotool, array( 'start_date' => $current_date,'expiration'=>$expiration));
    }
    public function aiautotool_check_post_limit() {
        $stored_data = get_option($this->plan_limit_aiautotool, array());
        $current_date = date('Y-m-d');
        
        if ($this->is_new_month($current_date, $stored_data['start_date'])) {
            // Nếu đã qua một tháng, đặt lại số lượng bài đăng và ngày bắt đầu

            $expiration = strtotime('+1 month', strtotime($current_date));
            $expiration = date('Y-m-d', $expiration);
            update_option($this->plan_limit_aiautotool, array( 'start_date' => $current_date,'expiration'=>$expiration));
            update_option($this->usage_option_name, 0,null, 'no');
        }

        
    }

    private function is_new_month($current_date, $start_date) {
        $current_month = date('m', strtotime($current_date));
        $start_month = date('m', strtotime($start_date));

        return ($current_month != $start_month);
    }
    public function aiautotool_checklimit($config) {
        // return ($config['number_post'] !== -1 && $config['number_post'] >= $config['usage']) || $config['number_post'] === -1;
            if($config['number_post'] !== -1){
            //print_r($config);
            if ($config['number_post'] > $config['usage'] ) {
               return true;
            }else{
                return false;
            }
        }else{
         
        return true;
        }
    }

    public function aiautotool__update_usage() {
        $this->aiautotool_check_post_limit();
        // Get the current usage value
        $current_value = get_option($this->usage_option_name, 0);

        // Increment the value by 1
        $new_value = $current_value + 1;

        // Update the option with the new value and set autoload to 'no'
        update_option($this->usage_option_name, $new_value, 'no');

        // Optionally, return the updated value
        return $new_value;
    }
    
    public function add_aiautotool_aipost_js() {
         wp_register_script('kct_aipost', plugin_dir_url( __FILE__ ) .'js/aipost.js', array('jquery'), '1.2'.rand(), true);
         wp_localize_script( 'kct_aipost', 'aipost',array( 'ajax_url' => admin_url( 'admin-ajax.php'),'config'=>$this->config,'security' => wp_create_nonce('aiautotool_aipost_nonce') ));
         wp_enqueue_script('kct_aipost');
    }
    
    public function aiautotool_update_usage() {
        $this->aiautotool_check_post_limit();
        
        // Get the current usage value
        $current_value = get_option($this->usage_option_name, 0);

        // Increment the value by 1
        $new_value = $current_value + 1;
        if($this->config['number_post']!=-1){
            if($this->config['number_post'] > $new_value){
                update_option($this->usage_option_name, $new_value, 'no');
            }
        }else{
            update_option($this->usage_option_name, $new_value, 'no');
        }
        
        
        return $new_value;
    }
    public function render_plan(){
         if ($this->active=='true') {
           $quota = $this->config['number_post']==-1? 'Unlimited':$this->config['number_post'];
        echo '<p>'.$this->icon.' '.$this->name_plan.':<strong>  Usage : '.$this->config['usage'].'/'.$quota.__(' Post','ai-auto-tool').'</strong></p>';
       

        }
    }
    public function update_active_option_callback() {
        check_ajax_referer('aiautotool_nonce', 'security');
        if (isset($_POST['active'])) {
            $active = sanitize_text_field($_POST['active']);
            update_option($this->active_option_name, $active,null, 'no');
            print_r($active);
        }

        wp_die();
    }

    function init(){
        $configs = get_option($this->plan_limit_aiautotool, array());
         

        
        if (!$this->aiautotool_has_plugin_data()) {
            $this->aiautotool_initialize_plugin_data();
            $configs = $this->aiautotool_has_plugin_data();
        }
        
        $this->config  = array(
                'number_post'=>$this->limit,
                'usage'=>get_option($this->usage_option_name, 0, 'no'),
                'time_exprice'=>$configs['expiration']
            );

        if($this->is_premium()->get_plan_name()=='aiautotoolpro'||$this->is_premium()->get_plan_name()=='premium'){
           
            $this->config  = array(
                'number_post'=>-1,
                'usage'=>get_option($this->usage_option_name, 0, 'no'),
                'time_exprice'=>$this->is_premium()->_get_license()->expiration
            );
        }
        add_action('admin_menu', array($this, 'add_menu'));

        add_action('admin_init', array($this, 'aiautotool_check_post_limit'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        
        add_action('wp_ajax_aiautotool_get_slug', array($this, 'aiautotool_get_slug'));
        add_action('wp_ajax_nopriv_aiautotool_get_slug', array($this, 'aiautotool_get_slug'));

        add_action('wp_ajax_bard_content', array($this, 'bard_content_callback'));
        add_action('wp_ajax_nopriv_bard_content', array($this, 'bard_content_callback'));


        add_action('wp_ajax_save_post_data', array($this, 'save_post_data'));
        add_action('wp_ajax_nopriv_save_post_data', array($this, 'save_post_data'));

         add_action( 'admin_enqueue_scripts', array( $this, 'add_aiautotool_aipost_js' ) );

        add_action('wp_ajax_update_usage', array($this, 'aiautotool_update_usage_callback'));
        add_action('wp_ajax_nopriv_update_usage', array($this, 'aiautotool_update_usage_callback'));

    }
    function aiautotool_update_usage_callback() {
        // Kiểm tra Nonce
        check_ajax_referer('aiautotool_aipost_nonce', 'security');
        $this->aiautotool_update_usage();
        wp_send_json_success(array('success'=>true));
        wp_die();
    }

    function save_post_data() {
        // Check nonce for security
        check_ajax_referer('aiautotool_nonce', 'security');
        
        $languageCodes = $this->languageCodes;
        // Retrieve and sanitize form data
        $title = sanitize_text_field($_POST['aiautotool_title']);
        $slug = sanitize_text_field($_POST['aiautotool_slug']);
        $categories = array_map('absint', $_POST['post_category']); // Ensure categories are integers
        $tags = sanitize_text_field($_POST['aiautotool_tags']);
        $content = wp_kses_post($_POST['aiautotool_content']);

        //xu ly time 
        $publish_year = sanitize_text_field($_POST['publish_year']);
        $publish_month = sanitize_text_field($_POST['publish_month']);
        $publish_day = sanitize_text_field($_POST['publish_day']);
        $publish_hour = sanitize_text_field($_POST['publish_hour']);
        $publish_minute = sanitize_text_field($_POST['publish_minute']);
        $attachThumbnail = sanitize_text_field($_POST['custom-thumbnail-id']);

        $post_language = sanitize_text_field($_POST['post_language']);

        $publish_timestamp = strtotime("$publish_year-$publish_month-$publish_day $publish_hour:$publish_minute");

        $current_time = current_time('timestamp');
        if ($publish_timestamp <= $current_time) {
            
            $post_status = 'publish';
            $post_date = date('Y-m-d H:i:s', $publish_timestamp);
        } else {
            
            $post_status = 'future'; 
            $post_date = date('Y-m-d H:i:s', $publish_timestamp);
        }

        $post_data = array(
        'post_title' => $title,
        'post_name' => $slug,
        'post_content' => $content, 
        'post_status' => $post_status,
        'post_date' => $post_date,
        'post_category' => $categories,
        'tags_input' => $tags,
    );

        $post_id = wp_insert_post($post_data);

        $selectedLanguageName = 'Vietnamese';
             if(array_key_exists($post_language, $languageCodes)) {
                $selectedLanguageName = $languageCodes[$post_language];
                if(in_array('polylang/polylang.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
                   pll_set_post_language($post_id, $post_language);
                }

               
            }
            update_post_meta($post_id, 'lang', $selectedLanguageName);

        // update content when save img and set thumb

        $html = stripslashes($content);
                    preg_match_all('/<img[^>]+src\s*=\s*["\']([^"\']+)["\']/i', $html, $matches);
                    $listimg1 =  $matches[1]; 
                    $imgUploaded = array();
                    
                     if (!empty($listimg1)){
                        foreach ($listimg1 as $post_image_url){
                            try {
                                            $image_url_new = $this->kct_aiautotool_save_image($post_image_url,$postname);
                                            if (!empty($image_url_new)){
                                                $imgUploaded[] = $image_url_new;
                                                if ($attachThumbnail == 0) {
                                                    $attachThumbnail = $image_url_new['attach_id'];
                                                }
                                                 
                                            }
                                        }catch (Exception $e) {
                                        }
                        }
                     }
                     foreach ($imgUploaded as $img){
                        $content = str_replace($img['url'],$img['baseurl'],$content);
                    }
                            
                    
                    if ($attachThumbnail != 0) {
                        set_post_thumbnail($post_id, $attachThumbnail);
                    }
                    $post_data = array(
                        'ID' => $post_id,
                        'post_title'=>$title,
                        'post_content' => $content,
                        'post_status'=>'publish'
                    );

                    $post_id = wp_update_post($post_data);

        if ($post_id) {
            $post_url = get_permalink($post_id);
            $edit_url = get_edit_post_link($post_id);
            // Post successfully created, send success response
             wp_send_json_success(array(
                'post_id' => $post_id,
                'post_url' => $post_url,
                'edit_url' => $edit_url,
                'message' => 'Post successfully saved and published!',
            ));
        } else {
            // Error in creating the post, send error response
            wp_send_json_error(array(
                'message' => 'Error saving and publishing the post.',
            ));
        }

        // Perform your data saving logic here (example: save to database)

        // Send a response back to the client
        wp_send_json_success(array('content' => $_POST));
        // or wp_send_json_error('Error saving data!'); in case of an error
    }

    public function kct_aiautotool_save_image($imgURL,$post_title){
            $image_name = basename( $imgURL );
            $filetype  = wp_check_filetype($image_name);
            $upload_dir = wp_upload_dir();
            
            $extension = $filetype['ext']?$filetype['ext']:"jpg";
            if (empty($extension)) $extension = "jpg";
            $unique_file_name = sanitize_title($post_title)."-".uniqid().".".$extension;
            $filename = $upload_dir['path'] . '/' . $unique_file_name;
            $baseurl = $upload_dir['baseurl'] .$upload_dir['subdir']. '/' . $unique_file_name;
            $ch = curl_init($imgURL);
            $fp = fopen($filename, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_exec($ch);
            $rescode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
            curl_close($ch);
            fclose($fp);
            if ($rescode == 200  && filesize($filename) > 100){

                 $wp_filetype = wp_check_filetype(basename($filename), null);
                
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => sanitize_file_name($post_title),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                
                $attach_id    = wp_insert_attachment($attachment, $filename);
                $imagenew     = get_post($attach_id);
                $fullsizepath = get_attached_file($imagenew->ID);
                
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($attach_id, $fullsizepath);
                wp_update_attachment_metadata($attach_id, $attach_data);
                


                $output['url'] = $imgURL;
                $output['file_name'] = $unique_file_name;
                $output['path'] = $filename;
                $output['baseurl'] = $baseurl;
                $output['attach_id'] = $attach_id;
                $output['url_out'] = $baseurl;
                return $output;
            }else{
                return null;
            }
        }
    public function bard_content_callback(){

    	$languageCodes = $this->languageCodes;


         $bardGenContent = new BardGenContent();
    	 // $lang = 'Vietnamese';
    	 $title = sanitize_text_field($_POST['title']);
         $post_language = sanitize_text_field($_POST['post_language']);

         if(array_key_exists($post_language, $languageCodes)) {
                $lang = $languageCodes[$post_language];
            }
    	 $ac = sanitize_text_field($_POST['ac']);
    	 switch($ac){
    	 	case 'bardcontent':
    	 		$newcontent = $bardGenContent->bardcontent($title, $lang);
    	 		break;
    	 	case 'suggettitle':
    	 		$newcontent = $bardGenContent->gentitle($title, $lang);
    	 		break;
    	 	default:
    	 		$newcontent = $bardGenContent->bardcontent($title, $lang);
    	 		break;
    	 }

    	 
    	 
	    wp_send_json_success(array('content' => $newcontent,'lang'=>$lang,'lg'=>$post_language));
	    wp_die();
    }
    public function aiautotool_get_slug() {
		    $title = sanitize_title($_POST['title']);
		    wp_send_json_success(array('slug' => $title));
		    wp_die();
		}

    public function add_menu() {
        add_submenu_page(
            MENUSUBPARRENT,
            '<i class="fa-solid fa-robot"></i> AI Single Post',
            '<i class="fa-solid fa-robot"></i> AI Single Post',
            'manage_options',
            'ai_single_post',
            array($this, 'render_form')
        );
        add_submenu_page(
            'edit.php',
            '<i class="fa-solid fa-robot"></i> AI Post',
            '<i class="fa-solid fa-robot"></i> AI Post',
            'manage_options',
            'ai_post',
            array($this, 'render_form')
        );
    }
    public function render_setting() {

    }
    public function render_tab_setting() {
    	
    }

    public function render_feature(){
        $autoToolBox = new AutoToolBox($this->icon.' '.$this->name_plan, "An intelligent editor that supports image searching, real-time content writing in multiple languages", "https://doc.aiautotool.com/", $this->active_option_name, $this->active,plugins_url('../images/logo.svg', __FILE__));

        echo $autoToolBox->generateHTML();
        
    }


    public function enqueue_scripts() {
        
    }

   

    public function render_form() {
        $current_time = current_time('mysql');
        $datetime = new DateTime($current_time);
        $year = $datetime->format('Y');  // Lấy năm
        $month = $datetime->format('m'); // Lấy tháng
        $day = $datetime->format('d');   // Lấy ngày
        $hour = $datetime->format('H');  // Lấy giờ
        $minute = $datetime->format('i'); // Lấy phút

       

        $language_code = explode('_',get_locale());
        $language_code = $language_code[0];
            // Mảng mã ngôn ngữ và tên tương ứng
            $languages = $this->languageCodes;

           
            // $post = new SinglePost('','vi');
            // print_r($post->getPost());
        ?>
        <h1 class="wp-heading-inline">  <img src="<?php echo plugins_url('../images/logo.svg', __FILE__); ?>" width="16px" height="16px"  /> AI Autotool Single Post</h1>
        <div >
            <form method="post" action="" id="aiautotool_post_form" class="wrap aiautotool_container">
                <div class="aiautotool_left ">
                	<div class="aiautotool_box ">
                		<div class="aiautotool_box_head">
                
			                     <img src="<?php echo plugins_url('../images/logo.svg', __FILE__); ?>" width="16px" height="16px"  />

			                <span id="titlehead">Ai Bard content</span>  
			            </div>
                        <p class="ft-note"><i class="fa-solid fa-lightbulb"></i>
                                    <?php _e('Language','ai-auto-tool'); ?>
                                </p>
                        <?php  echo '<select name="post_language" id="post_language">';
            foreach ($languages as $code => $name) {
                $is_selected = selected($language_code, $code, false);
                echo '<option value="' . $code . '" ' . $is_selected . '>' . $name . '</option>';
            }
            echo '</select>';
            ?>
                        <br>
                        <p class="ft-note"><i class="fa-solid fa-lightbulb"></i>
                                    <?php _e('Title','ai-auto-tool'); ?>
                                </p>
	                    <input placeholdertext="Input title for post Then Click gen Article." type="text" id="aiautotool_title" class=" ft-input-big" name="aiautotool_title">

    <hr>
         <p class="ft-note"><i class="fa-solid fa-lightbulb"></i>
                                    <?php _e('Slug:','ai-auto-tool'); ?>
                                </p>
	                    <input type="text" id="aiautotool_slug" class="ft-input-big" name="aiautotool_slug">

	                     <div class="aiautotool_form">
					        
					        
					    </div>
	                    
	                    <div class="aiautotool_form">
                            <p class="ft-note"><i class="fa-solid fa-lightbulb"></i>
                                    <?php _e('Categories:','ai-auto-tool'); ?>
                                </p>
		                    <div class="aiautotool_categories">
		                    	 
		                        <?php wp_category_checklist(); ?>
		                    </div>
                             <p class="ft-note"><i class="fa-solid fa-lightbulb"></i>
                                    <?php _e('Tags:','ai-auto-tool'); ?>
                                </p>
		                    <input placeholdertext="Input tag for post." type="text" id="aiautotool_tags" class="ft-input-big" name="aiautotool_tags">
		                 </div>
                         <?php 
                        $thumbnail_id = 0;
        $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'thumbnail');
        ?>
        <p class="ft-note"><i class="fa-solid fa-lightbulb"></i>
                                    <?php _e('Thumbnail:','ai-auto-tool'); ?>
                                </p>
        <?php
        echo '<input type="hidden" id="custom-thumbnail-id" name="custom-thumbnail-id" value="' . esc_attr($thumbnail_id) . '">';
        echo '<div id="custom-thumbnail-preview">';
        if ($thumbnail_url) {
            echo '<img src="' . esc_url($thumbnail_url) . '">';
        }
        echo '</div>';
        echo '<button type="button" id="upload-custom-thumbnail" class=" ft-submit">Upload Custom Thumbnail</button>';
        ?>
	                    <?php wp_editor('', 'aiautotool_content', array('textarea_name' => 'aiautotool_content')); ?>
	                    


	                   
               		 </div>
                </div>

                <div class="aiautotool_right ">
                	<div class="aiautotool-fixed">
                		<div class="aiautotool_navpublic">
                        <label for="publish_datetime">Publish Date and Time:</label>
                        <div class="publish-date-time-row">
                            <select id="publish_month" name="publish_month" class="aiautotool_box_time_select">
                                <!-- Thêm các tùy chọn tháng tại đây -->
                                <option <?php selected($month, '01'); ?> value="01">January</option>
                                <option <?php selected($month, '02'); ?> value="02">February</option>
                                <option <?php selected($month, '03'); ?> value="03">March</option>
                                <option <?php selected($month, '04'); ?> value="04">April</option>
                                <option <?php selected($month, '05'); ?> value="05">May</option>
                                <option <?php selected($month, '06'); ?> value="06">June</option>
                                <option <?php selected($month, '07'); ?> value="07">July</option>
                                <option <?php selected($month, '08'); ?> value="08">August</option>
                                <option <?php selected($month, '09'); ?> value="09">September</option>
                                <option <?php selected($month, '10'); ?> value="10">October</option>
                                <option <?php selected($month, '11'); ?> value="11">November</option>
                                <option <?php selected($month, '12'); ?> value="12">December</option>
                            </select>
                            
                            <input value="<?php echo $year; ?>" type="text" id="publish_year" name="publish_year" class="aiautotool_box_time_input">
                            
                            <input value="<?php echo $day; ?> "type="text" id="publish_day" name="publish_day" class="aiautotool_box_time_input">
                            
                            <label for="publish_hour" class="aiautotool_box_time_label"> - </label>
                            <input value="<?php echo $hour; ?>" type="text" id="publish_hour" name="publish_hour" class="aiautotool_box_time_input">
                            
                            <input value="<?php echo $minute; ?>" type="text" id="publish_minute" name="publish_minute" class="aiautotool_box_time_input">
                        </div>
                		<button type="" class="aiautotool_button save-single-generation ft-submit">Publish</button>


                        
			           </div>
	                	
					<!-- end box -->
						<div id="aiautotool-meta-box" class="aiautotool_box ">
			            <div class="aiautotool_box_head">
					           <img src="https://dichvuxetai.com/wp-content/plugins/ai-auto-tool/images/logo.svg" width="16px" height="16px">
					        Ai auto Tool </div>
					            <div class="askassistant" >
                                    <textarea id="promptask" rows="2" placeholdertext="<?php _e('Type your promp...','ai-auto-tool');?>" placeholder="<?php _e('Type your promp...','ai-auto-tool');?>"></textarea>
                                   <div class="select-and-button">
                                        <select id="askAI">
                                            <option value="chatgpt">Chatgpt</option>
                                            <option value="gemini">Gemini AI</option>
                                        </select>
                                        <button id="askprompt"><?php _e('<i class="fa-solid fa-robot"></i> Ask Assistant','ai-auto-tool'); ?></button>
                                    </div>
                                </div>
					            <div class="aiautotool_form">
							       	<div class="aiautotool_tab">
							            <button type="button" data-tab="aiContentTab" class="tablinks" onclick="openTab(event, 'aiContentTab')">AI Content</button>
							            <button type="button" data-tab="imagesTab" class="tablinks" onclick="openTab(event, 'imagesTab')">Images</button>
							            
							        </div>

							        <!-- AI Content Tab -->
							        <div id="aiContentTab" class="tabcontent">
							           	<div id="info_content" placeholdertext="Input title for post Then Click gen Article,Select a phrase and click the Write button to use this feature"  ></div>
                                        
                                        <div class="loadingprocess p-5 text-center div_proccess_1 d-none div_proccess">
                                        <div id="loading-icon" class="loader" style="display:block"></div> Start socket <span id="proccess_1" class="process_loading badge badge-soft-primary"></span>
                                        </div>
                                        <div class="div_proccess_error text-center div_proccess d-none">
                                        <div class="pt-5"> <span>Start socket Error, Please "F5" to reload.</span></div>
                                        
                                        </div>
							            <!-- Content for AI Content tab goes here -->
							            <div id="outbard">
                                            
                                            <center>
                                            Select a phrase and click the <b>Write</b> button to use this feature
                                            <br>
                                            <img src="<?php echo plugins_url('../images/find1.png', __FILE__); ?>" width="150px"  /></center></div>
							            <button class="btn btnaddpost aiautotool_button" style="display:none" >Add To Post</button>
							        </div>

							        <!-- Images Tab -->
							        <div id="imagesTab" class="tabcontent">
                                        <div class="infodiv">
                                        <div id="info_img" placeholdertext="Select a phrase and click the Find Image button to use this feature"  ></div>
                                        <center>
                                            Select a phrase and click the <b>Find Image</b> button to use this feature
                                            <br>
                                            <img src="<?php echo plugins_url('../images/find1.png', __FILE__); ?>" width="150px"  /></center>
                                        </div>
							            
							            <div id="img_list_find" class="img_list_find"></div>
							            <!-- Content for Images tab goes here -->
							        </div>

							        
							    </div>
							</div>
		        </div>
                    
                </div>
                <!-- end right -->
            </form>
        </div>
        <script>
            

        </script>
        <?php
    }
}

