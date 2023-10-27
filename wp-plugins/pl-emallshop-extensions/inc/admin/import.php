<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Emallshop_Import' ) )
{
	class Emallshop_Import {
		public $content_path;
		public $widget_path;
		public $revslider_path = array();
		public $menu;
		public $pages;
		public $data_demos;
		public $import_items;
		public $item_id;
		public $token_key;
		public $option_name = 'envato_purchase_code_18513022';
		function __construct() {
			
			$this->api_url = 'https://www.presslayouts.com/api/envato';
			$this->item_id = '18513022';
			$this->token_key = $this->get_token_key();
			
			/*Admin menu*/
			add_action( 'admin_menu', array( $this, 'theme_page_menu' ),99 );
			add_filter( 'emallshop_dashboard_tabs', array( $this, 'import_demo' ) );
			add_action( 'wp_ajax_get_demo_data',  array( $this, 'emallshop_ajax_get_demo_data' ) );
			add_action( 'wp_ajax_import_full_content',  array( $this, 'import_full_content' ) );
			add_action( 'wp_ajax_import_content',  array( $this, 'import_content' ) );
			add_action( 'wp_ajax_import_menu',  array( $this, 'import_menu' ) );
			add_action( 'wp_ajax_import_theme_options',  array( $this, 'import_theme_options' ) );
			add_action( 'wp_ajax_import_widget',  array( $this, 'import_widget' ) );
			add_action( 'wp_ajax_import_revslider',  array( $this, 'import_revslider' ) );
			add_action( 'wp_ajax_import_config',  array( $this, 'import_config' ) );
			$menu_locations = array(
				'primary'			=> 'Primary Menu',
				'vertical_menu'		=> 'Vertical Menu',
			);
			$item_import = array(
				'import_full_content'    	=> 'Import All',
				'import_content' 			=> 'Import Contents',
				'import_theme_options'   	=> 'Import Theme Options',
				'import_menu'            	=> 'Import Menu',
				'import_widget'          	=> 'Import Widgets',
				'import_revslider'       	=> 'Import Sliders',
				'import_attachments'     	=> 'Import Images',
			);
			
			$this->import_items = $item_import;
			$pages = array(
				'show_on_front' 				=> 'page',
				'page_on_front' 				=> 'Home',
				'page_for_posts' 				=> 'Blog',
				'woocommerce_shop_page_id' 		=> 'Shop',
				'woocommerce_cart_page_id' 		=> 'Cart',
				'woocommerce_checkout_page_id'  => 'Checkout',
				'woocommerce_myaccount_page_id' => 'My Account',
			);
			
			$sample_data = array(
				'default'		=> array(
					'title' 			=> esc_html__('Default','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/default.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/default/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Default',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'default',
				),
				'general'		=> array(
					'title' 			=> esc_html__('General','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/general.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/general/?layout=general',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/general/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo General',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'general',
				),
				'cosmetic'		=> array(
					'title' 			=> esc_html__('Cosmetic','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/cosmetic.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/cosmetic/?layout=cosmetic',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/cosmetic/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Cosmetic',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'cosmetic',
				),
				'gym'		=> array(
					'title' 			=> esc_html__('Gym','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/gym.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/gym/?layout=gym',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/gym/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Gym',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'gym',
				),
				'electronic'		=> array(
					'title' 			=> esc_html__('Electronic','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/electronic.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/electronic/?layout=electronic',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/electronic/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Electronic',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'electronic',
				),
				'furniture'		=> array(
					'title' 			=> esc_html__('Furniture','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/furniture.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/furniture/?layout=furniture',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/furniture/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Furniture',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'furniture',
				),				
				'jewellery'		=> array(
					'title' 			=> esc_html__('Jewellery','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/jewellery.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/jewellery/?layout=jewellery',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/jewellery/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Jewellery',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'jewellery',
				),
				'kids'		=> array(
					'title' 			=> esc_html__('Kids','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/kids.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/kids/?layout=kids',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/kids/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Kids',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'kids',
				),
				'medical'		=> array(
					'title' 			=> esc_html__('Medical','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/medical.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/medical/?layout=medical',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/medical/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Medical',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'medical',
				),
				'mobile'		=> array(
					'title' 			=> esc_html__('Mobile','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/mobile.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/mobile/?layout=mobile',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/mobile/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Mobile',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'mobile',
				),
				'fertilizer'		=> array(
					'title' 			=> esc_html__('Fertilizer','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/fertilizer.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/fertilizer/?layout=fertilizer',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/fertilizer/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Fertilizer',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'fertilizer',
				),
				'sport'		=> array(
					'title' 			=> esc_html__('Sport','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/sport.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/sport/?layout=sport',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/sport/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Sport',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'sport',
				),
				'lingerie'		=> array(
					'title' 			=> esc_html__('Lingerie','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/lingerie.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/lingerie/?layout=lingerie',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/lingerie/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Lingerie',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'lingerie',
				),
				'vegetable'		=> array(
					'title' 			=> esc_html__('Vegetable','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/vegetable.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/vegetable/?layout=vegetable',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/vegetable/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Vegetable',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'vegetable',
				),
				'wine'		=> array(
					'title' 			=> esc_html__('Wine','pl-emallshop-extensions'),
					'description' 		=> esc_html__('Description here','pl-emallshop-extensions'),
					'category' 			=> 'shop',
					'preview_image' 	=> ES_EXTENSIONS_URL.'inc/admin/assets/images/wine.jpg',
					'preview_demo_link' => 'https://emallshop.presslayouts.com/wine/?layout=wine',
					'import_content' 	=> 'sample_data.xml',
					'widgets' 			=> 'widget_data.json',
					'revslider_path' 	=> ES_EXTENSIONS_PATH . '/inc/admin/importer/demo-data/wine/revsliders/',
					'theme_options' 	=> 'theme_options.json',
					'settings' 			=> array(
						'menu' 		=> $menu_locations,
						'pages' 	=> $pages,
					),
					'homepage'       	=> 'Demo Wine',
					'blogpage'       	=> 'Blog',
					'slug' 				=> 'wine',
				),
			);
			
			$import_data   = apply_filters( 'emallshop_data_import', $sample_data );
			$this->data_demos = $import_data;
		}
		
		public function theme_page_menu() {
			add_submenu_page( 'emallshop-theme',
				esc_html__( 'Demo Import', 'pl-emallshop-extensions' ),
				esc_html__( 'Demo Import', 'pl-emallshop-extensions' ),
				'manage_options',
				'emallshop-demo-import',
				array( $this, 'emallshop_demo_import' )
			);
		}
		public function import_demo($args){
			$args['emallshop-demo-import'] = esc_html__("Demo Import", 'pl-emallshop-extensions');
			return $args;
		}
		public function emallshop_demo_import() {
			require_once EMALLSHOP_ADMIN.'/dashboard/header.php';			
			$this->importer_page_content();
			require_once EMALLSHOP_ADMIN.'/dashboard/footer.php';
		}
		
		private function emallshop_is_license_activated(){ 			
			$purchase_code = get_option( 'envato_purchase_code_18513022' );
			$activated_data = get_option( 'emallshop_activated_data' );
			if( $purchase_code ){
				return true;
			}
			if( $activated_data && isset( $activated_data['purchase'] ) ){
				return true;
			}
			return false;
			
	   
		}
	
		public function importer_page_content() {
			$is_license_active = $this->emallshop_is_license_activated();
			$time_limit = ini_get('max_execution_time');
			$required_plugins = emallshop_get_required_plugins_list();
			$uninstalled_plugins = array();
			$all_plugins = array();
			$notice_required_plugins = array();
			foreach( $required_plugins as $plugin ) {
				if ( $plugin['required'] && is_plugin_inactive( $plugin['url'] ) ) {
					$uninstalled_plugins[$plugin['slug']] = $plugin;
					$notice_required_plugins[] = $plugin['name'];
				}
				$all_plugins[$plugin['slug']] = $plugin;
				
			}
			
			$import_notice = array();
			if($time_limit < 600 ){
				$import_notice[] = wp_kses(sprintf( __( 'Current execution time %s - We recommend setting max execution time to at least <strong>600</strong> for import demo content. See: <a href="%s" target="_blank">Increasing max execution to PHP</a>', 'pl-emallshop-extensions' ), $time_limit, 'https://wordpress.org/support/article/common-wordpress-errors/#connection-timed-out' ), array( 'strong' => array(), 'br' => array(), 'a' => array( 'href' => array(), 'target' => array() ) ) );
			}
			if(!empty($uninstalled_plugins)){
				$plugin_install_link = admin_url().'themes.php?page=emallshop-install-plugins';
				$import_notice[] = sprintf(__('Please Install Required plugin : %s <a href="%s">Click here</a>','pl-emallshop-extensions'), implode(', ', $notice_required_plugins),$plugin_install_link);
			}
			$import_demo_system_status = false;
			if(empty($import_notice)){
				$import_demo_system_status = true;
			}
			$theme_name = wp_get_theme()->get( 'Name' );?>
			
			<div class="emallshop-import-data">
				<div class="row">
					<div class="col-md-6">
						<div class="emallshop-box">
							<div class="emallshop-box-header">
								<div class="title"><?php esc_html_e('Import Demo Content', 'pl-emallshop-extensions');?></div>
							</div>
							<div class="emallshop-box-body">
								<div class="emallshop-warning">
									<h3><?php esc_html_e('Please read before importing:','pl-emallshop-extensions');?></h3>
									<p><?php esc_html_e('This importer will help you build your site look like our demo. Importing data is recommended on fresh install.','pl-emallshop-extensions');?></p>
									<p><?php esc_html_e('Please ensure you have already installed and activated Pl Emallshop Extansions, WooCommerce, WPBakery Page Builder and Revolution Slider plugins.','pl-emallshop-extensions');?></p>
									<p><?php echo sprintf( __('The media is replace with placeholders in dummy import data','pl-emallshop-extensions'));?></p>
									<p><?php echo sprintf( __('It can take a few minutes to complete. <strong>Please don\'t close your browser while importing.</strong>','pl-emallshop-extensions'));?></p>
									<p><?php echo sprintf(__('See recommendation for importer and WooCommerce to run fine: <a target="_blank" href="%s"> Click here </a>','pl-emallshop-extensions'), 'https://docs.presslayouts.com/emallshop/index.html#requirement');?>
									</p>									
								</div>
								
								<?php if($is_license_active ) { 
									if( !empty( $import_notice ) ){ ?>
										<div class="emallshop-import-notice emallshop-error">
											<h3><?php esc_html_e('Demo import notice :','pl-emallshop-extensions');?></h3>
											<?php foreach($import_notice as $notice){	?>
												<p><?php echo ($notice)?></p>
											<?php } ?>
										</div>
									<?php }
									if ( empty($notice_required_plugins) ) :
									?>
									<h3><?php esc_html_e('Select the options below which you want to import:','pl-emallshop-extensions');?></h3>
									<div class="theme-browser rendered">
										<div id="emallshop-demo-themes" class="themes wp-clearfix">		
											<?php 
											$demo_versions = $this->data_demos;
											
												if(!empty($demo_versions)){
													foreach($demo_versions as $demo_key => $demo_data){
													?>
													<div class="col-md-4 theme <?php echo esc_attr($demo_data['category']);?>" id="emallshop-<?php echo esc_attr($demo_key);?>" data-name="<?php echo esc_attr($demo_key);?>">
														<div class="theme-screenshot">
															<img src="<?php echo esc_url($demo_data['preview_image']);?>" alt='<?php echo esc_attr($demo_data['title']);?>'>
														</div>
														<span class="more-details import-button"><?php esc_html_e('Import','pl-emallshop-extensions');?></span>
														
														<div class="theme-id-container">				
															<h2 class="theme-name">
																<?php echo esc_html($demo_data['title']);?>
															</h2>
															<div class="theme-actions">
																<a href="<?php echo esc_url($demo_data['preview_demo_link']);?>" class="button button-primary"><?php esc_html_e('Preview','pl-emallshop-extensions');?></a>
															</div>
														</div>
													</div>
													<?php
													}
													$this->import_popup();
												}
											?>
										</div> <!-- #emallshop-demo-themes -->
									</div><!-- .theme-browser -->
									<?php endif; ?>
								<?php } else { 
									$activate_page_link = admin_url( 'admin.php?page=emallshop-theme' );
									echo sprintf( __('Please Active theme license to import our demo content: <a href="%s"> Click here </a>','pl-emallshop-extensions'), esc_url( $activate_page_link ) );
								 }?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		
		public function import_popup(){
			$required_plugins = emallshop_get_required_plugins_list();
			$uninstalled_plugins = array();
			$all_plugins = array();
			foreach( $required_plugins as $plugin ) {
				if ( $plugin['required'] && is_plugin_inactive( $plugin['url'] ) ) {
					$uninstalled_plugins[$plugin['slug']] = $plugin;
				}
				$all_plugins[$plugin['slug']] = $plugin;
			}
			$demo_detail = $this->data_demos['default'];
			$menu = $pages = array();
			if( !empty( $demo_detail ) ){
				$menu = $demo_detail['settings']['menu'];
				$pages = $demo_detail['settings']['pages'];
			}
			?>
			<div class="emallshop-import-demo-popup mfp-hide">
				<div id="emallshop-popup-content"></div>
				<script type="text/html" id="tmpl-emallshop-popup-data">
					<div class="emallshop-box import-popup-wrp">
						<div class="emallshop-box-header">
							<div class="title">{{data.title}}</div>
						</div>
						<div class="emallshop-box-body">
							<?php 
							if(!empty($uninstalled_plugins)){
								esc_html_e('Please Install Required plugin.','pl-emallshop-extensions');
							?>
								<a href="<?php echo admin_url().'themes.php?page=emallshop-install-plugins';?>"><?php esc_html_e('Click Here','pl-emallshop-extensions');?></a>
							<?php
							}else{ ?>
								<p>
									<?php esc_html_e('The import process can take about 10 minutes. Please don\'t refresh the page. ','pl-emallshop-extensions'); ?>
								</p>
								<div class="import-options">
									<?php 
										foreach($this->import_items as $key => $item){
										?>
										<label for="<?php echo $key?>_{{data.demo_key}}">
										<input id="<?php echo $key?>_{{data.demo_key}}" value="1" type="checkbox" class="<?php echo esc_attr( $key ); ?>">
										<?php echo $item;?>
										</label>
										<?php
										}
										?>	
								</div>
								<div class="import-process" style="display:none">
									<div class="progress-percent">0%</div>
									<div class="progress-bar"></div>
								</div>
								<div class="button install-demo disabled" data-demo='{{data.demo_key}}'><?php esc_html_e('Install Demo','pl-emallshop-extensions');?></div>
								
								<div id="installation-progress">{{data.process_msg}}</div>
							<?php } ?>
						</div>
					</div>
				</script>
			</div> <?php
		}
		
		public function get_token_key(){
			return get_option( 'emallshop_token_key');
		}
		
		public function get_purchase_code(){
			return get_option( $this->option_name);
		}
		public function theme_token_key_exist(){
			global $wp_version;	
			$purchase_code = $this->get_purchase_code();
			$token_key = $this->get_token_key();
			$item_id = $this->item_id;	
			$response = wp_remote_request($this->api_url.'/importdemo.php', array(
					'user-agent' => 'WordPress/'.$wp_version.'; '. home_url( '/' ) ,
					'method' => 'POST',
					'sslverify' => false,
					'body' => array(
						'purchase_code' => urlencode($purchase_code),
						'token_key' => urlencode($token_key),
						'item_id' => urlencode($item_id),
					)
				)
			);

			$response_code = wp_remote_retrieve_response_code( $response );
			$activate_info = wp_remote_retrieve_body( $response );			
			$return = false;
			if ( $response_code != 200 || is_wp_error( $activate_info ) ) {
				$return = true;
			}
			if(  $response_code == 200 ){
				$data = json_decode($activate_info,true);
				if($data['success'] == 1){
					$return = true;
				}
			}
			
			return $return;
		}
		
		public function emallshop_ajax_get_demo_data(){
			$demo_name = isset($_POST['demo']) ? $_POST['demo'] :'';
			$demo_data = $this->data_demos[$demo_name];
			$demo_data['status'] = true;
			$token_exist = $this->theme_token_key_exist();
			if( !$token_exist ){
				$demo_data = array();
				$demo_data['status'] = false;
				$demo_data['message']	= 'Something went wrong!!';
			}			
			echo json_encode($demo_data);
			die();
		}
		
		public function import_full_content(){
			$demo_name = isset($_POST['demo_name']) ? $_POST['demo_name'] :'';
			echo $demo_name.' import_full_content';
			die();
		}
		
		public function import_content(){
			$demo_name 			= isset($_POST['demo_name']) ? $_POST['demo_name'] :'default';
			$content_count 		= isset($_POST['count']) ? $_POST['count'] :'1';
			$attachments 		= isset($_POST['attachments']) ? $_POST['attachments'] :false;
			
			$conetnt_data_file 	= ES_EXTENSIONS_PATH . 'inc/admin/importer/demo-data/content-'.$content_count.'.xml';
			$content_import 	= get_option('emallshop_content_import',false);
			if ( current_user_can( 'manage_options' ) && !$content_import) {
				
				if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true); // we are loading importers

				if ( ! class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
					$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
					include $wp_importer;
				}

				if ( ! class_exists('WP_Import') ) { // if WP importer doesn't exist
					$wp_import = ES_EXTENSIONS_PATH . 'inc/admin/importer/wordpress-importer.php';
					include $wp_import;
				}
				if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { 
					/* Import Posts, Pages, Product, Portfolio Content, Blocks, Images, Menus */
					$importer = new WP_Import();
					$importer->fetch_attachments = $attachments;
					ob_start();
					//set_time_limit(0);
					$importer->import($conetnt_data_file);
					ob_end_clean();					
					// Flush rules after install
					flush_rewrite_rules();			
				}
				update_option('emallshop_content_import',1);
				echo 'Import content successfully';
			}			
			die();
		}
		public function import_menu(){
			$demo_name = isset($_POST['demo_name']) ? $_POST['demo_name'] :'';
			$demo_data = $this->data_demos[$demo_name];
			$menu_location = array();
			$menu_locations =$demo_data['settings']['menu'];
        	$locations = get_theme_mod('nav_menu_locations');
            $menus = wp_get_nav_menus();
            
            if( !empty( $menu_locations) ){
                if ($menus) {
                    foreach ($menus as $menu) {
                        foreach ( $menu_locations as $key => $value) {
                            if ($menu->name == $value) {
                                $menu_location[$key] = $menu->term_id;
                            }
                        }
                    }
                }                
                set_theme_mod('nav_menu_locations', $menu_location);
            }			
			die();
		}
		public function import_theme_options(){
			$demo_name = isset($_POST['demo_name']) ? $_POST['demo_name'] :'';
			$demo_data = $this->data_demos[$demo_name];
			$data_file_url = ES_EXTENSIONS_URL.'inc/admin/importer/demo-data/'.$demo_data['slug'].'/'.$demo_data['theme_options'];
			$options_json = $this->emallshop_get_remote_content($data_file_url);
			if($options_json){
				$options=json_decode($options_json, true);
				update_option('emallshop_options', $options);
				echo 'Import options successfully';
			}else{
				echo $data_file_url;
				echo 'options missing!!';
			}
			die();
		}
		
		/* Import Widget */
		function import_widget() {
			
			$demo_name = isset($_POST['demo_name']) ? $_POST['demo_name'] :'basic';
			$demo_data = $this->data_demos[$demo_name];
			$data_file_url = ES_EXTENSIONS_URL.'inc/admin/importer/demo-data/'.$demo_data['slug'].'/'.$demo_data['widgets'];
			$widget_data = $this->emallshop_get_remote_content($data_file_url);
			
			/* Clear Widgets */
			$sidebars = wp_get_sidebars_widgets();
			$inactive = isset($sidebars['wp_inactive_widgets']) && is_array( $sidebars['wp_inactive_widgets'] ) ? $sidebars['wp_inactive_widgets'] : array();

			unset($sidebars['wp_inactive_widgets']);

			foreach ( $sidebars as $sidebar => $widgets ) {
				if( is_array( $widgets ) ){
					$inactive = array_merge($inactive, $widgets);
				}

				$sidebars[$sidebar] = array();
			}

			$sidebars['wp_inactive_widgets'] = $inactive;
			wp_set_sidebars_widgets( $sidebars );
			/* End Clear Widgets */			
			
			$widget_data = json_decode( $widget_data, true);
			unset($widget_data[0]['wp_inactive_widgets']);

			$sidebar_data = $widget_data[0];
			$widget_data = $widget_data[1];

			foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
				$widgets[ $widget_data_title ] = array();
				foreach ( $widget_data_value as $widget_data_key => $widget_data_array ) {
					if ( is_int( $widget_data_key ) ) {
						$widgets[ $widget_data_title ][ $widget_data_key ] = 'on';
					}
				}
			}
			unset( $widgets[''] );

			foreach( $sidebar_data as $title => $sidebar ) {
				$count = count( $sidebar );
				for ( $i = 0; $i < $count; $i++ ) {
					$widget = array( );
					$widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
					$widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
					if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
						unset( $sidebar_data[$title][$i] );
					}
				}
				$sidebar_data[$title] = array_values( $sidebar_data[$title] );
			}

			foreach( $widgets as $widget_title => $widget_value ) {
				if (is_array($widget_value) || is_object($widget_value) ) {
					foreach( $widget_value as $widget_key => $widget_value ) {
						$widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
					}
				}
			}

			$sidebar_data = array( array_filter( $sidebar_data ), $widgets );

			/* Parse data */
			global $wp_registered_sidebars;

			$sidebars_data = $sidebar_data[0];
			$widget_data = $sidebar_data[1];

			$current_sidebars = get_option( 'sidebars_widgets' );

			$new_widgets = array();

			foreach( $sidebars_data as $import_sidebar => $import_widgets ) {
				foreach( $import_widgets as $import_widget ) {
					if( array_key_exists( $import_sidebar, $current_sidebars ) ) {
						$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
						$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );

						$current_widget_data = get_option( 'widget_' . $title );

						$new_widget_name = $this->emallshop_get_new_widget_name( $title, $index );
						$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

						if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
							while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
								$new_index++;
							}
						}

						$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;

						if ( array_key_exists( $title, $new_widgets ) ) {
							$new_widgets[$title][$new_index] = $widget_data[$title][$index];
							$multiwidget = $new_widgets[$title]['_multiwidget'];
							unset( $new_widgets[$title]['_multiwidget'] );
							$new_widgets[$title]['_multiwidget'] = $multiwidget;
						} else {
							$current_widget_data[$new_index] = $widget_data[$title][$index];
							$current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
							$new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
							$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
							unset( $current_widget_data['_multiwidget'] );
							$current_widget_data['_multiwidget'] = $multiwidget;
							$new_widgets[$title] = $current_widget_data;
						}

					}
				}
			}

			if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
				update_option( 'sidebars_widgets', $current_sidebars );

				foreach ( $new_widgets as $title => $content ) {
					$content = apply_filters( 'widget_data_import', $content, $title );
					update_option( 'widget_' . $title, $content );
				}

				return true;
			}

			return false;

			wp_die();
		}

		public function emallshop_get_new_widget_name( $widget_name, $widget_index ) {

			$current_sidebars = get_option( 'sidebars_widgets' );
			$all_widget_array = array();

			foreach ( $current_sidebars as $sidebar => $widgets ) {
				if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
					foreach ( $widgets as $widget ) {
						$all_widget_array[] = $widget;
					}
				}
			}

			while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
				$widget_index++;
			}

			$new_widget_name = $widget_name . '-' . $widget_index;
			return $new_widget_name;
		}
		
		public function import_revslider(){
			$demo_name = isset($_POST['demo_name']) ? $_POST['demo_name'] :'default';			
			$demo_data = $this->data_demos[$demo_name];
			
			if ( !empty($demo_data['revslider_path']) && class_exists( 'UniteFunctionsRev' ) && class_exists( 'ZipArchive' ) ){
				// Import Revslider
				$rev_files = array();
				foreach( glob( $demo_data['revslider_path'] . '*.zip' ) as $filename ) { // get all files from revsliders data dir
					$filename = basename($filename);
					$rev_files[] = $demo_data['revslider_path'] . $filename;
				}
				if(!function_exists( 'WP_Filesystem' )){
					require_once( ABSPATH . 'wp-admin/includes/file.php' );	
				}
							
				$slider = new RevSlider();				
				foreach( $rev_files as $rev_file ) { // finally import rev slider data files
					$filepath = $rev_file;						
					ob_start();
						$result = $slider->importSliderFromPost( true, false, $filepath );
					ob_clean();
					ob_end_clean();
				}
			}
			die();
		}
		
		public function find_menu_id_by_title($menu_name = 'Primary Menu',$menu_item_title = 'Shop'){
			$main_menu = get_term_by( 'name', $menu_name, 'nav_menu' );
			$menu_list_items = wp_get_nav_menu_items($menu_name);
			if(!empty($menu_list_items)){
				$selected_menu_item = array_filter( $menu_list_items, function( $item ) use($menu_item_title) {
					return $item->title == $menu_item_title;
				});			
				$current_item = array_shift( $selected_menu_item );
				if($current_item){
					return $current_item->ID;
				}
			}
			return false;
		}
		
		public function mega_menu_setup(){
			$primary_menu = array(
				'Home' => array(					
					'_menu_item_emallshop_megamenu_status' => 'enabled',
					'_menu_item_emallshop_megamenu_columns' => 'auto',
				),
				'Shop' => array(
					'_menu_item_emallshop_megamenu_status' => 'enabled',
					'_menu_item_emallshop_megamenu_columns' => 'auto',
				),
				'Men & Women' => array(
					'_menu_item_emallshop_megamenu_status' => 'enabled',
					'_menu_item_emallshop_megamenu_columns' => 'auto',
				),
			);
			
			$categories_menu = array(
				'Men & Women' => array(
					'_menu_item_type' => 'taxonomy',
					'_menu_item_object' => 'product_cat',
					'_menu_item_emallshop_megamenu_status' => 'enabled',
					'_menu_item_emallshop_megamenu_columns' => 3,
				),
				'Clothings' => array(
					'_menu_item_type' => 'taxonomy',
					'_menu_item_object' => 'product_cat',
					'_menu_item_emallshop_megamenu_status' => 'enabled',
					'_menu_item_emallshop_megamenu_columns' => 3,
				),
				'Featured Product' => array(
					'_menu_item_emallshop_megamenu_widgetarea' => 'menu-widget-area-1',
				),
			);
			
			
			foreach ($primary_menu as $menu_page => $meta_data) {
				$menu_id = $this->find_menu_id_by_title('Primary menu',$menu_page);
				if($menu_id){
					foreach ($meta_data as $key => $value) {				
						update_post_meta( $menu_id, $key, $value);
					}
				}
			} 
			
			foreach ($categories_menu as $menu_page => $meta_data) {
				$menu_id = $this->find_menu_id_by_title('Vertical Menu',$menu_page);
				if($menu_id){
					foreach ($meta_data as $key => $value) {				
						update_post_meta( $menu_id, $key, $value);
					}
				}
			}
		}
		
		public function import_config(){			
			$demo_name 		= isset($_POST['demo_name']) ? $_POST['demo_name'] :'default';
			$demo_data 		= $this->data_demos[$demo_name];
			$pages 			= $demo_data['settings']['pages'];
			$this->mega_menu_setup();
			$this->after_import();						
			
			foreach ( $pages as $page_name => $page_title ) {
				$page_id = $this->emallshop_get_page_by_title( $page_title );
				if ( $page_id ) {					
					update_option( $page_name, $page_id );
				}
			}
			
			if ( class_exists( 'YITH_Woocompare' ) ) {
				update_option( 'yith_woocompare_compare_button_in_products_list', 'yes' );
				update_option( 'yith_woocompare_is_button', 'button' );
			}
			
			if ( class_exists( 'YITH_WCWL_Init' ) ) {
				update_option( 'yith_wcwl_enabled', 'yes' );
				$page_id = $this->emallshop_get_page_by_title( 'My Wishlist' );
				if ( $page_id ) {
					update_option( 'yith_wcwl_wishlist_page_id', $page_id );
				}				
			}
			
			$mc4wp = get_posts( array( 'post_type'   => 'mc4wp-form','numberposts' => 1 ) );
			if ( $mc4wp ) {
				update_option( 'mc4wp_default_form_id', $mc4wp[0]->ID );
			}
			
			/*WooCommerce Exists */
			if( class_exists('Woocommerce') ) {
				if ( class_exists( 'WC_Admin_Notices' ) ) {
					WC_Admin_Notices::remove_notice( 'install' );
				}
				
				//Fix On Sale Products widget and elements
					
				if ( ! wc_update_product_lookup_tables_is_running() ) {
					wc_update_product_lookup_tables();
				}
				update_option( 'woocommerce_enable_myaccount_registration', 'yes' );
				delete_option( '_wc_needs_pages' );
				delete_transient( '_wc_activation_redirect' );	
				delete_transient( 'wc_products_onsale' );		
			}
			
			if ( isset( $demo_data['homepage'] ) && $demo_data['homepage'] != "" ) {
				// Home page
				$homepage_id = $this->emallshop_get_page_by_title( $demo_data['homepage'] );
				if ( $homepage_id ) {
					update_option( 'show_on_front', 'page' );
					update_option( 'page_on_front', $homepage_id );
				}
			}
			// Blog page
			if ( isset( $demo_data['blogpage'] ) && $demo_data['blogpage'] != "" ) {
				$post_page_id = $this->emallshop_get_page_by_title( $demo_data['blogpage'] );
				if ( $post_page_id ) {
					update_option( 'show_on_front', 'page' );
					update_option( 'page_for_posts', $post_page_id );
				}
			}
			
			update_option( 'emallshop_demo_'.$demo_name, 'yes' );
			
			flush_rewrite_rules();
			
			die();
		}
		
		public function after_import(){
			// Move Hello World post to trash
			wp_trash_post( 1 );
			 
			// Move Sample Page to trash
			wp_trash_post( 2 );			
		}
		
		public function emallshop_get_page_by_title($page_title, $post_type = 'page'){
			global $wpdb;
			$page_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '".$page_title."' AND post_type = '".$post_type."'" );
			return $page_id;
		}
		
		public function emallshop_get_remote_content( $url) {
			$response = wp_remote_get($url);
			if( is_array($response) && $response['response']['code'] !== 404 ) {
				$header = $response['headers']; // array of http header lines
				$body = $response['body']; // use the content
				return $body;
			}
			return false;
		}
	
	}
	global $obj_emallshop_import;
	$obj_emallshop_import = new Emallshop_Import();	
}