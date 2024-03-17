<?php 
defined('ABSPATH') or die();
if ( defined('WP_DEBUG') && WP_DEBUG ) {
    // Bật debug cho admin-ajax.php
    @ini_set('display_errors', 1);
}
class AIautotool_autocreatetags extends rendersetting{

    // Constructor

    public  $active = false;
    public  $active_option_name = 'AIautotool_autocreatetag_active';
    public $aiautotool_config_settings;
    public  $usage_option_name = 'Autocreatetag_AI_usage';
   
    public  $icon = '<i class="fa-solid fa-tags"></i>';
    private $client = null;
    public $notices = [];
    public $limit = AIAUTOTOOL_FREE;
    private $plan_limit_aiautotool ;
    public $name_plan ;
    public $config = array();
    public $notice ;
    public $promptdesctag = '';
    public function __construct() {
        $this->name_plan =  __('Auto Tags By AI','ai-auto-tool');
        $this->plan_limit_aiautotool =  'plan_limit_aiautotool_'.$this->active_option_name;
       
        
        $this->notice = new aiautotool_Warning_Notice();
        $this->active = get_option($this->active_option_name, false);
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
        if (!$this->aiautotool_checklimit($this->config)) {
            
            $this->notice->add_notice(
                                sprintf(
                                    __( $this->name_plan.' Limit Quota. Please <a class="aiautotool_btn_upgradepro aiautotool_red" href="%s" target="_blank"><i class="fa-solid fa-unlock-keyhole"></i> Upgrade Pro</a>', 'ai-auto-tool' ),
                                    aiautotool_premium()->get_upgrade_url()
                                ),
                                'notice-error',
                                null,
                                true,
                                $this->name_plan
                            );
            return false;

        }
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
        if($this->config['number_post']!=-1){
            if($this->config['number_post'] >= $new_value){
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

            $current_date = date('Y-m-d');
            $expiration = strtotime('+1 month', strtotime($current_date));
            $expiration = date('Y-m-d', $expiration);

            $this->config  = array(
                'number_post'=>-1,
                'usage'=>get_option($this->usage_option_name, 0, 'no'),
                'time_exprice'=> $expiration
            );
        }

        add_action('admin_init', array($this, 'init_settings'));
        add_action('admin_init', array($this, 'aiautotool_check_post_limit'));
        add_action( 'admin_notices', [ $this, 'display_notices' ], 10, 1 );

       if ($this->aiautotool_checklimit($this->config)) {

            add_filter('cron_schedules', array($this, 'aiautotool_schedule_autocreatetag_intervals'));
            

            if (!wp_next_scheduled('schedule_create_autocreatetag_event_new')) {
                wp_schedule_event(time(), 'aiautotool_schedule_autocreatetag_intervals', 'schedule_create_autocreatetag_event_new');
                
            }

            

            add_action('schedule_create_autocreatetag_event_new', array($this, 'schedule_create_autocreatetags'));

        }else{
            

             $this->notice->add_notice(
                                sprintf(
                                    __( $this->name_plan.' Limit Quota. Please <a class="aiautotool_btn_upgradepro aiautotool_red" href="%s" target="_blank"><i class="fa-solid fa-unlock-keyhole"></i> Upgrade Pro</a>', 'ai-auto-tool' ),
                                    aiautotool_premium()->get_upgrade_url()
                                ),
                                'notice-error',
                                null,
                                true,
                                $this->name_plan
                            );
        }
        
    }
    public function aiautotool_schedule_autocreatetag_intervals($schedules) {
         
        $setting = get_option('aiautotool_setting_autocreatetag');
        $current_interval = 5;
        if(!empty($setting)){
            if(isset($setting['time_comment'])){
                $current_interval = $setting['time_comment'];
            }
        }
        
        
       

        $schedules['aiautotool_schedule_autocreatetag_intervals'] = array(
            'interval' =>  $current_interval* 60, 
            'display' => 'Schedule create auto Comment'
        );
        return $schedules;
    }

    public function schedule_create_autocreatetags(){
        $this->getTagWithoutDescription();
        if (!$this->aiautotool_checklimit($this->config)) {
            
           $this->notice->add_notice(
                                sprintf(
                                    __( $this->name_plan.' Limit Quota. Please <a class="aiautotool_btn_upgradepro aiautotool_red" href="%s" target="_blank"><i class="fa-solid fa-unlock-keyhole"></i> Upgrade Pro</a>', 'ai-auto-tool' ),
                                    aiautotool_premium()->get_upgrade_url()
                                ),
                                'notice-error',
                                null,
                                true,
                                $this->name_plan
                            );
            return false;

        }
         global $wpdb;
         $generated_posts = get_option('autocreatetag_generated_posts', array());
         $setting = get_option('aiautotool_setting_autocreatetag');
         $posttypearr = array('post');
         if(isset($setting['post_type']))
         {
            $posttypearr = $setting['post_type'];
            
         }
         if(!empty($generated_posts)){
            $implode_post_types = "'" . implode("','", $posttypearr) . "'";
            $sql = "SELECT * FROM {$wpdb->prefix}posts 
                WHERE post_status = 'publish' 
                AND post_type IN ($implode_post_types)
                AND ID NOT IN (" . implode(',', $generated_posts) . ")
                LIMIT 1";
            $query = $wpdb->prepare(
                $sql
            );
         }else{
             $query = $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}posts 
                WHERE post_status = 'publish' 
                AND post_type = 'post'
               
                LIMIT 1"
                 );
         }
        

        
         $result = $wpdb->get_results($query);
         // print_r( $result);
         if ($result) {
            foreach ($result as $post) {
                $post_id = $post->ID;
                print_r($post_id);
                $post_title = $post->post_title;
                // $post_content = $this->aiautotool_fixcontent_PostContent($post->post_content);
                $lang = get_post_meta($post_id, 'lang', '');
                $bardGenContent = new BardGenContent();
                $question = "The most important: The results must only be in JSON format, the response must be in the SAME LANGUAGE as the original text (text between \"======\").
Create %%NUMMBERCOMMENT%% tag for the article.
tag only 2 or 3 word
tag must have a ====== %%TITLTE%%  ======  intellectual level.
The post\'s content is between \"=========\". 
The results must only be in JSON format, with this exact format, you have to fill empty values,Each item in tag has the form { \"tag\": \"\" }
";
                $question = str_replace('%%TITLTE%%',$post_title,$question);
                $question = str_replace('%%NUMMBERCOMMENT%%',rand(8, 15),$question);
                
                
                $json = $bardGenContent->bardcontentmore($question,$lang);
                
                $newcontent = $this->aiautotool_fixjsonreturn($json);
                print_r($newcontent);
                if ($newcontent) {
                    $checkinsert = false;
                    if (count($newcontent) > 0) {
                        foreach ($newcontent as $key_comment => $comment_data) {
                            $comment_data = (Object)$comment_data;
                            print_r($comment_data);
                            $tag_name = $comment_data->tag;
                            
                            $existing_tags = wp_get_post_tags($post_id, array('fields' => 'names'));
                            if (!in_array($tag_name, $existing_tags)) {
                                
                                if(!empty($tag_name)){
                                    if (is_array($tag_name)) {
                                        continue;
                                    }

                                    wp_set_post_tags($post_id, $tag_name, true);
                                    $generated_posts[] = $post_id;
                                    update_option('autocreatetag_generated_posts', $generated_posts);
                                    $this->notice->add_notice($tag_name.__( 'A New Tag created for post <a href="'.get_permalink($post_id).'">'.$post->post_title.'</a> ', 'ai-auto-tool'), 'notice-info', null, true, $this->name_plan);
                                    $this->updateTagDescription($tag_name);
                                    $checkinsert = true;
                                }
                                
                            } 
                        }
                    }
                    if($checkinsert){
                        $this->aiautotool__update_usage();
                    }
                } else {
                    print_r('không gen dc json');
                }

            }
         }else{
            $this->notice->add_notice( __( 'No Post find ', 'ai-auto-tool' ), 'notice-info', null, true,$this->name_plan );
         }
    }

    private function aiautotool_product_review(){

    }
    private function aiautotool_fixcontent_PostContent($content) {
        
        $cleaned_content = strip_tags($content);


        $cleaned_content = substr($cleaned_content, 0, 1000);

        return $cleaned_content;
    }
    public function aiautotool_fixjsonreturn($result){
        $pattern = '/\{(?:[^{}]|(?R))*\}/'; 
        preg_match_all($pattern, $result, $matches);
        $arritem = array();
        // print_r($result);
        foreach ($matches[0] as $jsonString) {
            
            $decodedJson = json_decode($jsonString, true);
            
            
            if ($decodedJson !== null) {
                if(isset($decodedJson['tags']))
                {
                    foreach($decodedJson['tags'] as $item){
                        $arritem[] = $item;
                    }
                }else{
                    $arritem[] = $decodedJson;
                }
            } else {
                return null;
            }
        }
        // print_r($arritem);
        return $arritem;
    }
    
    public function display_notices() {
        $screen        = get_current_screen();
        $stored        = get_option( 'aiautotool_submitindex_notices', [] );
        $this->notices = array_merge( $stored, $this->notices );
        delete_option( 'aiautotool_submitindex_notices' );
        foreach ( $this->notices as $notice ) {
            if ( ! empty( $notice['show_on'] ) && is_array( $notice['show_on'] ) && ! in_array( $screen->id, $notice['show_on'], true ) ) {
                return;
            }
            $class = 'notice instant-indexing-notice ' . $notice['class'];
            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), wp_kses_post( $notice['message'] ) );
        }
    }
    

    
    // Khởi tạo cài đặt
    public function init_settings() {
        register_setting('aiautotool-settings-group', 'aiautotool_setting_autocreatetag');
        add_settings_section('aiautotool-section', __('AI Auto Tool Settings', 'aiautotool'), array($this, 'section_callback'), 'aiautotool-settings');
        add_settings_field('submitindex_field', __('Information:', 'ai-auto-tool'), array($this, 'submitindex_field_callback'), 'aiautotool-settings', 'aiautotool-section');
        add_settings_field('post_types_field', __('Post Types List:', 'ai-auto-tool'), array($this, 'post_types_field_callback'), 'aiautotool-settings', 'aiautotool-section');
    }

    // Gọi hàm này khi vào trang cài đặt
    
    public function render_setting() {
        if($this->active!="true"){
            return '';
        }
        $setting = get_option('aiautotool_setting_autocreatetag');
        $current_interval = 1;
        $number_post = 4;
        if(!empty($setting)){
            if(isset($setting['time_comment'])){
                $current_interval = $setting['time_comment'];
            }
            if(isset($setting['number_comment'])){
                $number_post = $setting['number_comment'];
            }
        }else{
            $setting = array('time_comment'=>1,
                                'post_type'=>array('post')
            );
            update_option('aiautotool_setting_autocreatetag',$setting ,null, 'no');
            $setting = get_option('aiautotool_setting_autocreatetag');
        }


        
        
    ?>

    <div id="tool-autocreatetag" class="tab-content" style="display:none;">
        <h1><i class="fa-regular fa-Tags"></i> <?php _e('Config using AI auto Create Tags', 'ai-auto-tool'); ?></h1>
        <div class="wrap">
            <h3><?php _e('Config post type for auto Create Tags', 'aiautotool'); ?></h3>
            <form method="post" action="options.php">
                <?php
                settings_fields('aiautotool-settings-group');
                
                ?>

                <p class="ft-note"><i class="fa-solid fa-lightbulb"></i>
                    <?php _e('Time Create Tags','ai-auto-tool'); ?>
                    </p>
                     <select id="aiautotool_setting_autocreatetag[time_comment]" name="aiautotool_setting_autocreatetag[time_comment]">
                            <option value="1" <?php selected($current_interval, 1); ?>>1 minute</option>
                            <option value="5" <?php selected($current_interval, 5); ?>>5 minutes</option>
                            <option value="10" <?php selected($current_interval, 10); ?>>10 minutes</option>
                            <option value="15" <?php selected($current_interval, 15); ?>>15 minutes</option>
                            <option value="30" <?php selected($current_interval, 30); ?>>30 minutes</option>
                            <option value="60" <?php selected($current_interval, 60); ?>>1 hour</option>
                            <option value="180" <?php selected($current_interval, 180); ?>>3 hour</option>
                            <option value="300" <?php selected($current_interval, 300); ?>>5 hour</option>
                            <option value="600" <?php selected($current_interval, 600); ?>>10 hour</option>
                            <option value="900" <?php selected($current_interval, 900); ?>>15 hour</option>
                            <option value="1440" <?php selected($current_interval, 1440); ?>>24 hour</option>
                        </select>
               
                
                <p class="ft-note"><i class="fa-solid fa-lightbulb"></i><?php _e('Select post type', 'ai-auto-tool'); ?></p>

                <?php
                    $post_types = get_post_types();
                    $i = 0;
                    foreach ($post_types as $post_type) {
                        ?>
                        <label class="nut-switch">
                            <input type="checkbox" name="aiautotool_setting_autocreatetag[post_type][]" value="<?php echo $post_type; ?>" <?php echo in_array($post_type, $setting['post_type']) ? 'checked="checked"' : ''; ?> />
                            <span class="slider"></span>
                        </label>
                        <label class="ft-label-right"><?php _e('Active :  ', 'ai-auto-tool');
                            echo $post_type; ?></label>
                        </p>
                        <?php
                        $i++;
                    }
                    ?>


                <?php submit_button(__('Save Config', 'ai-auto-tool'), 'ft-submit'); ?>
            </form>

            
        </div>
    </div>
    <?php
}


    public function render_tab_setting() {
        if($this->active=="true"){

         echo '<button href="#tool-autocreatetag" class="nav-tab sotab">'.$this->icon.' '.__('Auto Tags','ai-auto-tool').'</button>';
        }
    }

    public function render_feature() {

       $autoToolBox = new AutoToolBox($this->icon.' '.$this->name_plan, __('Auto General Comment using AI','ai-auto-tool'), "#", $this->active_option_name, $this->active,plugins_url('../images/logo.svg', __FILE__));

        echo $autoToolBox->generateHTML();
    }

    // Callback cho section
    public function section_callback() {
        echo '<p>' . __('Enter information and select Post Types.', 'aiautotool') . '</p>';
    }

    // Callback cho textarea thông tin
    public function submitindex_field_callback() {
        $value = get_option('aiautotool_setting_autocreatetag');
        echo '<textarea name="aiautotool_setting_autocreatetag" rows="5" cols="50">' . esc_textarea($value) . '</textarea>';
    }

    // Callback cho danh sách Post Types
    public function post_types_field_callback() {
        $post_types = get_post_types(array('public' => true), 'objects');
        $selected_post_types = get_option('aiautotool_setting_post_types', array());

        foreach ($post_types as $post_type) {
            $checked = in_array($post_type->name, $selected_post_types) ? 'checked="checked"' : '';
            echo '<input type="checkbox" name="aiautotool_setting_post_types[]" value="' . esc_attr($post_type->name) . '" ' . $checked . ' /> ' . esc_html($post_type->label) . '<br>';
        }
    }
    private function get_settings() {
        $settings = get_option( 'aiautotool_setting_autocreatetag', [] );
        

        return $settings;
    }
    public function get_setting( $setting, $default = null ) {
        $settings = $this->get_settings();

        if ( $setting === 'json_key' ) {
            if(isset($settings[ 'json_key' ])){
                $jsonkey = $settings[ 'json_key' ];
                if(count($jsonkey)>0){
                    $keyrandom = $jsonkey[array_rand($jsonkey)];
                    return $keyrandom;
                }else{
                    return null;
                }
                
                
            }else{
                return null;
            }
        }

        return ( isset( $settings[ $setting ] ) ? $settings[ $setting ] : $default );
    }

   
    public function add_notice( $message, $class = '', $show_on = null, $persist = false, $id = '' ) {
        $notice = [
            'message' => $message,
            'class'   => $class . ' is-dismissible',
            'show_on' => $show_on,
        ];

        if ( ! $id ) {
            $id = md5( serialize( $notice ) );
        }

        if ( $persist ) {
            $notices        = get_option( 'aiautotool_submitindex_notices', [] );
            $notices[ $id ] = $notice;
            update_option( 'aiautotool_submitindex_notices', $notices,null, 'no' );
            return;
        }
        $this->notices[ $id ] = $notice;
    }

    public function getTagWithoutDescription() {
        // Replace 'post_tag' with your custom taxonomy if needed
        $args = array(
            'taxonomy' => 'post_tag',
            'number' => 1,
            'fields' => 'names', // Return only term IDs
            'meta_query' => array(
                array(
                    'key' => 'description',
                    'compare' => 'NOT EXISTS',
                ),
            ),
        );

        $tagsWithoutDescription = get_terms($args);

        if (!empty($tagsWithoutDescription)) {
            $this->updateTagDescription($tagsWithoutDescription[0]);
            // return $tagsWithoutDescription[0];
        }

        return false;
    }

    public function updateTagDescription($tagName) {
        // Get tag ID based on tag name
        $tag = get_term_by('name', $tagName, 'post_tag');

        if ($tag !== false) {
            $tagId = $tag->term_id;
            $existingDescription = $this->getTagDescription($tagId);

            if (empty($existingDescription)) {
                $articleTitles = $this->getArticleTitlesByTag($tagId);
                $content = $this->geminicontent($articleTitles, $tagId);

                if ($content !== false) {
                    $this->updateTagDescriptionById($tagId, $content);
                }
            }
        }
    }


    private function getTagDescription($tagId) {
        $tag = get_term($tagId, 'post_tag');
        
        if (!is_wp_error($tag) && isset($tag->description)) {
            return $tag->description;
        }

        return '';
    }
    private function getArticleTitlesByTag($tagId) {
         $args = array(
                'post_type' => 'post',  // Adjust post type if needed
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'post_tag',
                        'field'    => 'id',
                        'terms'    => $tagId,
                    ),
                ),
            );

            $query = new WP_Query($args);

            $titles = array();
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $titles[] = get_the_title();
                }
                wp_reset_postdata();
            }

            return $titles;
    }
    private function geminicontent($articleTitles,$tagId) {
        $tag = get_term($tagId, 'post_tag', array('fields' => 'name'));
        if (!is_wp_error($tag)) {
            print_r($tag);
            $tagname = $tag->name;
            $listtitle = implode(',',$articleTitles);
            $question = 'The most important: the response must be in the SAME LANGUAGE as the original text (text between \"======\").
Viết như một chuyên gia SEO và ====== %%TAGNAME%% ====== một chủ đề cho các bài viết kiểu như ====== "%%LISTTITLE%%" ======. Thực hiện theo các hướng dẫn sau:
Tạo tiêu đề cho một bài viết trên trang web từ từ khóa sau: %%TAGNAME%%.
1. giải quyết mục đích tìm kiếm của người dùng muốn biết %%TAGNAME%%
2. Bài viết phải dài 750 từ.
3. Từ khóa chính để tối ưu hóa SEO là ====== %%TAGNAME%% ======
4. bao gồm các từ khóa phụ bắt nguồn từ từ khóa chính: ======{%%TAGNAME%%}======
6. Bạn có thể sử dụng bao nhiêu H2 và H3 tùy thích để đáp ứng mục đích tìm kiếm của bài viết, bạn không cần phải tối ưu hóa tất cả cho từ khóa.
7. Bài viết phải cung cấp thông tin vì người dùng ở cấp độ nhận thức đầu tiên về hành trình của khách hàng, còn lâu mới mua hàng.
8. Tối đa hóa khả năng giữ chân người dùng, để họ đọc xong bài viết, hãy sử dụng vòng lặp mở ở phần đầu để tạo ra sự tò mò.
9. Không thêm nội dung không có giá trị, không phát minh ra dữ liệu, toàn bộ bài viết phải hữu ích.
10. Sử dụng ngôn ngữ trực tiếp và đơn giản mà một đứa trẻ 10 tuổi có thể hiểu được.
11. Sử dụng HTML in đậm <strong> </strong> ở những nơi bạn cho rằng hữu ích để làm nổi bật thông tin.
12. Tìm 5 từ khoá phụ liên quan tới ====== %%TAGNAME%% ====== và ====== %%LISTTITLE%% ====== đặt vào cuối bài viết , mỗi từ cách nhau bởi dấu phẩy, chỉ nằm trên một dòng.
';
            $question = str_replace('%%TAGNAME%%',$tagname,$question);
            $question = str_replace('%%LISTTITLE%%',$listtitle,$question);
            $bardGenContent = new BardGenContent();
            $content = $bardGenContent->bardcontentmore($question,$lang);
        
            return $content;
        }else{
            return '';
        }
    }
    private function updateTagDescriptionById($tagId, $newDescription) {
        // Update tag description in WordPress
        $tag = get_term($tagId, 'post_tag');
        $this->notice->add_notice($tag->name.__( 'Update desc tag  <a href="'.get_tag_link($tagId).'">'.$tag->name.'</a> '.$newDescription, 'ai-auto-tool'), 'notice-info', null, true, $this->name_plan);
        wp_update_term($tagId, 'post_tag', array('description' => $newDescription));
    }


   

    
}
 ?>