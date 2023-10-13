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
if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$loginurl			= home_url( '/login/' );
$registerurl		= home_url( '/register/' );
$tosurl				= home_url( '/tos/' );
$profileurl			= home_url( '/profile/' );
$url				= home_url( '/' );
$url1				= get_bloginfo('url'); 
$linkX				= get_bloginfo('url');;
$parse				= parse_url($linkX);
$sites				= $parse['host'];
$admin_email		= get_bloginfo('admin_email');
$opt_name			= "opt_themes";

$theme = wp_get_theme(); 
$args = array(
'opt_name'             => $opt_name,
'display_name'         => '<span class="dashicons dashicons-share-alt"></span> '.$theme->get( 'Name' ),
'display_version'      => $theme->get( 'Version' ). ' - GPL License By buivanloi.2010@gmail.com',
'menu_type'            => 'menu',
'allow_sub_menu'       => true,
'menu_title'           => __( 'Panel '.$theme->get( 'Name' ), THEMES_NAMES ),
'page_title'           => __( $theme->get( 'Name' ).' '.$theme->get( 'Version' ), THEMES_NAMES ),
'google_api_key'       => '',
'google_update_weekly' => false,
'async_typography'     => true,
//'disable_google_fonts_link' => true, 
'admin_bar'            => true,
'admin_bar_icon'       => 'dashicons-admin-multisite',
'admin_bar_priority'   => 999,
'global_variable'      => '',
'dev_mode'             => true,
'update_notice'        => false,
'customizer'           => false,
//'open_expanded'     => true,
//'disable_save_warn' => true, 
'page_priority'        => 125,
'page_parent'          => 'themes.php',
'page_permissions'     => 'manage_options',
'menu_icon'            => 'dashicons-admin-multisite',
'last_tab'             => '',
'page_icon'            => 'icon-themes',
'page_slug'            => '_options',
'save_defaults'        => true,
'default_show'         => false,
'default_mark'         => '',
'show_import_export'   => true,
'transient_time'       => 60 * MINUTE_IN_SECONDS,
'output'               => true,
'output_tag'           => true,
// 'footer_credit'     => '',
'database'             => '',
'use_cdn'              => true,
//'compiler'             => true,

// HINTS
			'hints'					=> array(
			'icon'					=> 'el el-question-sign',
			'icon_position'			=> 'right',
			'icon_color'			=> 'lightgray',
			'icon_size'				=> 'normal',
			'tip_style'				=> array(
			'color'					=> 'light',
			'shadow'				=> true,
			'rounded'				=> false,
			'style'					=> '',
			),
			'tip_position'			=> array(
			'my'					=> 'top left',
			'at'					=> 'bottom right',
			),
			'tip_effect'			=> array(
			'show'					=> array(
			'effect'				=> 'slide',
			'duration'				=> '500',
			'event'					=> 'mouseover',
			),
			'hide'					=> array(
			'effect'				=> 'slide',
			'duration'				=> '500',
			'event'					=> 'click mouseleave',
			),
			),
			)
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.

			$args['admin_bar_links'][] = array(
			'id'			=> 'redux-docs',
			'href'  		=> 'https://video.demos.web.id/',
			'title'			=> __( 'Doc', THEMES_NAMES ),
			);
			/*
			$args['admin_bar_links'][] = array(
			//'id'    => 'redux-support',
			'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
			'title'			=> __( 'Support', THEMES_NAMES ),
			);

			$args['admin_bar_links'][] = array(
			'id'			=> 'redux-extensions',
			'href'  => 'reduxframework.com/extensions',
			'title'			=> __( 'Extensions', THEMES_NAMES ),
			);

*/
// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_FACEBOOK_URL,
			'title'		=> 'Follow us on Facebook',
			'icon'		=> 'el el-facebook'
			);
			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_TWITTER_URL,
			'title'		=> 'Follow us on Twitter',
			'icon'		=> 'el el-twitter'
			);
			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_LINKEDIN_URL,
			'title'		=> 'Find us on LinkedIn',
			'icon'		=> 'el el-linkedin'
			);
			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_YOUTUBE_URL,
			'title'		=> 'Find us on Youtube',
			'icon'		=> 'el el-youtube'
			);

			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_INSTAGRAM_URL,
			'title'		=> 'Find us on Instagram',
			'icon'		=> 'el el-instagram'
			);

			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_API_URL,
			'title'		=> 'Find us on Wordpress',
			'icon'		=> 'el el-wordpress'
			);

// Add content after the form.
$args['footer_text'] = __( '<p></p>', THEMES_NAMES );

Redux::setArgs( $opt_name, $args );

// -> START extractor options
Redux::setSection( $opt_name, array(
'title'				=> __( 'Extractor APK', THEMES_NAMES ),
'id'				=> 'option_extractor_apk',
'customizer_width'	=> '500px',
'icon'				=> 'el el-view-mode',
'fields'			=> array(			 
			array(
			'id'			=> 'info_post_options',
			'type'			=> 'info',
			'title'			=> __('How to Post with Apk Extractor', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('<a href="https://www.youtube.com/watch?v=ZTDM9yl1XB8" target="_blank" style="display: block; padding: 1em 0; text-align: center; "><img alt="" border="0" data-original-height="416" data-original-width="1085" src="'.EX_THEMES_URI.'/assets/img/mdr.jpg"/></a>', THEMES_NAMES)
			),			
			array(
			'id'			=> 'ex_themes_extractor_apk_status_post_',
			'type'			=> 'select',
			'title'			=> __('Select for Status Post', THEMES_NAMES),
			'desc'			=> __('Draft or Publish <br><u class="cool-link f2">Publish</u> to auto post ', THEMES_NAMES), 
			'options'		=> array(
					'draft'		=> 'Draft',
					'publish'	=> 'Publish'
					),
					'default'		=> 'draft',
			),
			
			array(
            'id'			=> 'ex_themes_extractor_apk_language_',
            'type'			=> 'select',
            'title'			=> __('Select for Language', THEMES_NAMES), 
            'desc'			=> __('Select for <u class="cool-link f2">Language</u>', THEMES_NAMES), 
            'options'		=> array(
                'en-US'		=> 'Default ( English )', 
                'af'		=> 'Afrikaans', 
                'sq'		=> 'Albanian', 
                'am'		=> 'Amharic', 
                'ar'		=> 'Arabic', 
                'hy'		=> 'Armenian', 
                'eu'		=> 'Basque', 
                'bg'		=> 'Bulgarian ', 
                'be'		=> 'Belarusian', 
                'bn'		=> 'Bengali - India', 
                'bs'		=> 'Bosnian', 
                'pt_BR'		=> 'Brazil', 
                'ca'		=> 'Catalan',  
                'zh_CN'		=> 'Chinese (PRC)', 
                'zh_TW'		=> 'Chinese Taiwan', 
                'zh_HK'		=> 'Chinese Hong Kong', 
                'hr'		=> 'Croatian', 
                'cs'		=> 'Czech', 
                'da'		=> 'Danish', 
                'et'		=> 'Estonian', 
                'fi'		=> 'Finnish', 
                'fil'		=> 'Filipino', 
                'fr'		=> 'French', 
                'gl'		=> 'Galician', 
                'de'		=> 'German', 
                'de_AT'		=> 'German - Austria', 
                'de_CH'		=> 'German - Switzerland', 
                'gsw'		=> 'German Swiss', 
                'el'		=> 'Greek', 
                'gu'		=> 'Gujarati', 
                'iw'		=> 'Hebrew ', 
                'hi'		=> 'Hindi', 
                'hu'		=> 'Hungarian', 
                'in'		=> 'Indonesia', 
                'it'		=> 'Italian', 
                'ja'		=> 'Japanese', 
                'ko'		=> 'Korean', 
                'lo'		=> 'Laos', 
                'mn'		=> 'Mongolian', 
                'mr'		=> 'Marathi', 
                'ms'		=> 'Malaysia', 
                'my'		=> 'Myanmar', 
                'no'		=> 'Norwegian ', 
                'ne'		=> 'Nepali', 
                'nl'		=> 'Netherlands',
                'fa'		=> 'Persian',  
                'pa'		=> 'Punjabi', 
                'pl'		=> 'Polish', 
                'pt_PT'		=> 'Portugal', 
                'ro'		=> 'Romania', 
                'ru'		=> 'Russian', 
                'sk'		=> 'Slovak', 
                'sl'		=> 'Slovenian', 
                'es'		=> 'Spanish', 
                'sr'		=> 'Serbian ', 
                'ta'		=> 'Tamil', 
                'te'		=> 'Telugu', 
                'th'		=> 'Thai', 
                'tr'		=> 'Turkish', 
                'uk'		=> 'Ukrainian',  
                'vi'		=> 'Vietnamese',
                'zu'		=> 'Zulu' 
            ),
				'default'		=> 'en-US',
			),
			array(
			'id'			=> 'ex_themes_extractor_apk_title_',
			'type'			=> 'select',
			'title'			=> __('Select for Title Post', THEMES_NAMES),
			'desc'			=> __('Title <u class="cool-link f2">Mods</u> or Title <u class="cool-link f2"> PlayStore</u> ', THEMES_NAMES),
			'options'		=> array(
					'title'			=> 'Title Mods',
					'title_GP'		=> 'Title PlayStore'
					),
					'default'		=> 'title_GP',
			),
			array(
			'id'			=> 'ex_themes_extractor_apk_permalink_',
			'type'			=> 'select',
			'title'			=> __('Select for Permalink Post', THEMES_NAMES),
			'desc'			=> __('Permalink <u class="cool-link f2">Title with Mods</u> or Permalink <u class="cool-link f2">Title from App Name</u>', THEMES_NAMES),
					'options'	=> array(
					'title'			=> 'Permalink Title with Mods',
					'title_GP'		=> 'Permalink Title App Name'
					),
					'default'		=> 'title_GP',
			),
			array(
			'id'			=> 'ex_themes_title_appname',
			'type'			=> 'switch',
			'title'			=> 'Title Appname',			
			'desc'			=> __( '<u class="cool-link f2">Enable</u> use Title from Playstore ', THEMES_NAMES ),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			), 
			array(
			'id'			=> 'duplicate_post',
			'type'			=> 'switch',
			'title'			=> 'Duplicate Post',			
			'desc'			=> __( '<u class="cool-link f2">Enable</u> to make it <u class="cool-link f2">Duplicate Post</u> after Submit Auto Post
			<br>
			Default is <u class="cool-link f2">Enable</u>', THEMES_NAMES ),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			), 
)
) );


Redux::setSection( $opt_name, array(
'title'						=> __( 'General', THEMES_NAMES ),
'id'						=> 'dashboard_ex_themes',
'customizer_width'			=> '700px',
'icon'						=> 'el el-screen',
'subsection'				=> false,
) );

Redux::setSection( $opt_name, array(
'title'						=> __( 'Headers', THEMES_NAMES ),
'id'						=> 'header',
'subsection'				=> true,
'customizer_width'			=> '700px',
'icon'						=> 'el el-cog',
'fields'					=> array(
			array(
			'id'			=> 'header_styles',
			'type'			=> 'switch',
			'title'			=> 'Menu Header Styles',	
			'desc'			=> __( 'Switch use Menu Header Styles', THEMES_NAMES ),		
			'default'		=> 0,
			'on'			=> 'OLD',
			'off'			=> 'NEW',
			),		 
			
			array(
			'id'			=> 'ex_themes_header_logo_text_activate_',
			'type'			=> 'switch',
			'title'			=> 'Titles Header',			
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_header_logo_texts_',
			'type'			=> 'text',
			'title'			=> __( 'Title', THEMES_NAMES ),
			'default'		=> 'Moddroid ',		
			'desc'			=> __( '<u class="cool-link f2">*Default is</u>, <u class="cool-link f2">Moddroid</u>', THEMES_NAMES ),
			'required'		=> array( 'ex_themes_header_logo_text_activate_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_header_logo_banner_activate_',
			'type'			=> 'switch',
			'title'			=> 'Logo Banner',			
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_header_logo_banner_',
			'type'			=> 'media',
			'title'			=> __( 'Logo Banner', THEMES_NAMES ),
			'default'		=> array(
			'url'			=> get_bloginfo('template_directory').'/assets/img/logo.png'), 
			'desc'			=> __( '<u  class="cool-link f2">Upload Your Logo Bannner</u>', THEMES_NAMES ),
			'required'		=> array( 'ex_themes_header_logo_banner_activate_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_header_favicon_activate_',
			'type'			=> 'switch',
			'title'			=> 'Favicons',			
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_header_favicons_',
			'type'			=> 'media',
			'title'			=> __( 'Favicons', THEMES_NAMES ),
			'default'		=> array(
			'url'			=> get_bloginfo('template_directory').'/assets/img/icons.png'),
			'desc'			=> __('Upload Your <u class="cool-link f2">Favicons</u>', THEMES_NAMES),
			'required'		=> array( 'ex_themes_header_favicon_activate_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_defaults_no_images_',
			'type'			=> 'media',
			'title'			=> __( 'No Images Found', THEMES_NAMES ),
			'default'		=> array(
			'url'			=> get_bloginfo('template_directory').'/assets/img/lazy.png'),
			'desc'			=> __('Upload Your Default <u class="cool-link f2">No Images Found</u>', THEMES_NAMES) 
			), 
			array(
			'id'			=> 'login_activated',
			'type'			=> 'switch',
			'title'			=> 'Login',	
			'desc'			=> __('Enable user <u class="cool-link f2">Login</u> on Header', THEMES_NAMES),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Footers', THEMES_NAMES ),
'id'						=> 'footers',
'customizer_width'			=> '500px',
'subsection'				=> true,
'icon'						=> 'el el-cog',
'fields'					=> array(
			array(
			'id'			=> 'ex_themes_footers_activate_',
			'type'			=> 'switch',
			'title'			=> 'Analytics Code',			
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_footers_code_',
			'type'			=> 'textarea',
			'title'			=> __( 'Codes', THEMES_NAMES ), 
			'desc'			=> __( '<u class="cool-link f2">*HTML Allowed</u>, Insert Your Code Analytics', THEMES_NAMES ),
			'default'		=> '',
			'required'		=> array( 'ex_themes_footers_activate_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_footers_copyrights_active_',
			'type'			=> 'switch',
			'title'			=> __( 'Fotter Copyright Text', THEMES_NAMES ),			
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_footers_copyrights_code_',
			'type'			=> 'editor',
			'title'			=> __( 'Codes', THEMES_NAMES ),			
			'desc'			=> __( '<u class="cool-link f2">*HTML Allowed</u>, Insert Your Code Copyright ', THEMES_NAMES ),
			'default'		=> '<span class="credit">'.get_option('home').' © <span id="getYear"><script type="text/javascript">var creditsyear = new Date();document.write(creditsyear.getFullYear());</script></span> - <bdi><a href="'.get_option('home').'">'.get_option('blogname').'</a> </bdi>. All rights reserved. </span>
 <span class="creator">Developed by <a href="https://ex-themes.com" title="'.DEVS.' Blog"><strong style="text-transform: capitalize;">'.DEVS.' Blog</strong></a> </span>',
			'required'		=> array( 'ex_themes_footers_copyrights_active_', '=', true )
			),
			
	
)
) );


// -> START Basic Fields __('Main settings')
Redux::setSection( $opt_name, array(
    'title'            => __( 'Fonts & Colors', THEMES_NAMES ),
    'id'               => 'options_warna_dan_font',
    'customizer_width' => '700px',
    'icon'             => 'el el-qrcode',
    'subsection'       => false,
) );


Redux::setSection( $opt_name, array(
'title'					=> __( 'Fonts', THEMES_NAMES ),
'id'					=> 'pengaturan_font',
'customizer_width'		=> '500px',
'subsection'			=> true,
'icon'					=> 'el el-fontsize',
'fields'				=> array(
			/*
			array(
			'id'		=> 'info_modes_options',
			'type'		=> 'info',
			'title'		=> __('THIS IS INFO FOR CHANGE MODES', THEMES_NAMES),
			'style'		=> 'critical',
			'desc'		=> __('', THEMES_NAMES)
			), 
			array(
            'id'		=> 'plus_ui',
            'type'		=> 'switch',
            'title'		=> 'Plus UI',
            'desc'		=> '<u class="cool-link f2"> ON </u> to use Plus UI Modes.<br><u class="cool-link f2"> OFF </u> to use Default ',
            'default'	=> false
			), 
			*/
		
		array(
		'id'				=> 'info_exthemes_fonts',
		'type'				=> 'info',
		'title'				=> __('THIS IS INFO FOR FONTS SETTINGS', THEMES_NAMES),
		'style'				=> 'critical',
		'desc'				=> __('', THEMES_NAMES)
		), 
		 
		array(
		'id'				=> 'font_body',
		'type'				=> 'text',
		'title'				=> __( 'Font Body', THEMES_NAMES ), 
		'default'			=> '"segoe ui", Verdana, Arial, Helvetica, sans-serif',
		'desc'				=> __( 'Default is , <b class="cool-link f2" style="color: crimson;">"segoe ui", Verdana, Arial, Helvetica, sans-serif</b>', THEMES_NAMES ), 
		),  
		array(
		'id'				=> 'font_body_url',
		'type'				=> 'textarea',
		'title'				=> __( 'Font Url link', THEMES_NAMES ), 
		'default'			=> '<link href="https://fonts.cdnfonts.com/css/segoe-ui-4" rel="stylesheet">',		
		'desc'				=> __( 'Example , <b class="cool-link f2" style="color: crimson;">&lt;link href=&quot;https://fonts.cdnfonts.com/css/segoe-ui-4&quot; rel=&quot;stylesheet&quot;&gt;</b><br> open this for search fonts <a href="https://www.cdnfonts.com/" target="_blanl">cdnfonts.com</a>', THEMES_NAMES ), 
		),  
		
		 
		array(
			'id'			=> 'svg_icon_modx',
			'type'			=> 'textarea',
			'title'			=> __( 'SVG ICON', THEMES_NAMES ),
			'desc'			=> __( 'changes your <b style="color: #008080;">SVG ICONS</b> for before mods', THEMES_NAMES ),
			'default'		=> '<svg class="svg-99 mr-1" fill="var(--color_svg)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M8 256C8 119 119 8 256 8s248 111 248 248-111 248-248 248S8 393 8 256zm292 116V256h70.9c10.7 0 16.1-13 8.5-20.5L264.5 121.2c-4.7-4.7-12.2-4.7-16.9 0l-115 114.3c-7.6 7.6-2.2 20.5 8.5 20.5H212v116c0 6.6 5.4 12 12 12h64c6.6 0 12-5.4 12-12z"></path></svg>',			 
		),
		array(
			'id'			=> 'svg_icon_downloadx',
			'type'			=> 'textarea',
			'title'			=> __( 'SVG ICON', THEMES_NAMES ),
			'desc'			=> __( 'changes your <b style="color: #008080;">SVG ICONS</b> for download buttons', THEMES_NAMES ),
			'default'		=> '<svg class="svg-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M528 288h-92.1l46.1-46.1c30.1-30.1 8.8-81.9-33.9-81.9h-64V48c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v112h-64c-42.6 0-64.2 51.7-33.9 81.9l46.1 46.1H48c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V336c0-26.5-21.5-48-48-48zm-400-80h112V48h96v160h112L288 368 128 208zm400 256H48V336h140.1l65.9 65.9c18.8 18.8 49.1 18.7 67.9 0l65.9-65.9H528v128zm-88-64c0-13.3 10.7-24 24-24s24 10.7 24 24-10.7 24-24 24-24-10.7-24-24z"></path></svg>',			 
		),
	   
	   
    )
) );

 
Redux::setSection( $opt_name, array(
'title'						=> __( 'Colors', THEMES_NAMES ),
'id'						=> 'color_styles',
'customizer_width'			=> '700px',
'icon'						=> 'el el-tint',
'subsection'				=> true,
'fields'					=> array(
			array(
			'id'			=> 'color_logo_header',
			'type'			=> 'color',
			'title'			=> __('Colors Logo (Headers)', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#212529</b>', THEMES_NAMES),
			'default'		=> '#212529',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_header_link',
			'type'			=> 'color',
			'title'			=> __('Colors Link (Header)', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#000000</b>', THEMES_NAMES),
			'default'		=> '#000000',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_background_hd',
			'type'			=> 'color',
			'title'			=> __('Colors Background (Header)', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #000000;">#ffffff</b>', THEMES_NAMES),
			'default'		=> '#ffffff',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_link_footers',
			'type'			=> 'color',
			'title'			=> __('Colors Link (Footer)', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#ffffff</b>', THEMES_NAMES),
			'default'		=> '#ffffff',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_background_ft',
			'type'			=> 'color',
			'title'			=> __('Colors Background (Footer)', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #000000;">#000000</b>', THEMES_NAMES),
			'default'		=> '#000000',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_texts',
			'type'			=> 'color',
			'title'			=> __('Colors Heading', THEMES_NAMES),
			'desc'			=> __('Colors for Heading H1 - H2 - H3 - H4 - H5 <br>*default: <b style="color: #008080;">#000000</b>', THEMES_NAMES),
			'default'		=> '#000000',
			'validate'		=> 'color',
			),		 
			array(
			'id'			=> 'color_link',
			'type'			=> 'color',
			'title'			=> __('Colors Link', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#008080</b>', THEMES_NAMES),
			'default'		=> '#008080',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_background_body',
			'type'			=> 'color',
			'title'			=> __('Colors Body Background ', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#f9f9f9</b>', THEMES_NAMES),
			'default'		=> '#f9f9f9',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_button',
			'type'			=> 'color',
			'title'			=> __('Colors Button', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#008080</b>', THEMES_NAMES),
			'default'		=> '#008080',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_svg',
			'type'			=> 'color',
			'title'			=> __('Colors SVG', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#008080</b>', THEMES_NAMES),
			'default'		=> '#008080',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_border',
			'type'			=> 'color',
			'title'			=> __('Colors Border', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#008080</b>', THEMES_NAMES),
			'default'		=> '#008080',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_nav',
			'type'			=> 'color',
			'title'			=> __('Colors Navigation', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#008080</b>', THEMES_NAMES),
			'default'		=> '#008080',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_rate',
			'type'			=> 'color',
			'title'			=> __('Colors Star Rate', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#ffff00</b>', THEMES_NAMES),
			'default'		=> '#e7711b',
			'validate'		=> 'color',
			),
			array(
			'id'			=> 'color_rgb',
			'type'			=> 'color',
			'title'			=> __('Colors RGB', THEMES_NAMES),
			'desc'			=> __('*default: <b style="color: #008080;">#efeff4</b>', THEMES_NAMES),
			'default'		=> '#efeff4',
			'validate'		=> 'color',
			),
		)
) );

Redux::setSection( $opt_name, array(
'title'						=> __( 'Setting Pages', THEMES_NAMES ),
'id'						=> 'generals_ex_themes_2',
'customizer_width'			=> '700px',
'icon'						=> 'el el-screen',
'subsection'				=> false,
) );

Redux::setSection( $opt_name, array(
'title'						=> __( 'Home Pages', THEMES_NAMES ),
'id'						=> 'option_homepage',
'customizer_width'			=> '500px',
'subsection'				=> true,
'icon'						=> 'el el-home',
'fields'					=> array(
			array(
			'id'			=> 'enable_latest_post',
			'type'			=> 'switch',
			'title'			=> __('Hide Latest Post', THEMES_NAMES),
			'desc'			=> '<u class="cool-link f2">Enabled</u> to hide latest post on home pages',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			), 

)
) );

Redux::setSection( $opt_name, array(
'title'						=> __( 'Single Pages', THEMES_NAMES ),
'id'						=> 'related_posts',
'customizer_width'			=> '500px',
'subsection'				=> true,
'icon'						=> 'el el-list-alt',
'fields'					=> array(
			array(
			'id'				=> 'ex_themes_style_2_activate_',
			'type'				=> 'switch',
			'title'				=> 'Style 2',			
			'desc'				=> __( '<u class="cool-link f2">Enabled</u> to use Style 2 apk info ', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			/* array(
			'id'			=> 'ex_themes_views_activate_',
			'type'			=> 'switch',
			'title'			=> 'View Count',			
			'desc'			=> __( '<code class="cool-link f2">On</code> to show view count on apk info</b>', THEMES_NAMES ), 
			'default'		=> false
			), */
			array(
			'id'			=> 'ex_themes_backgrounds_activate_',
			'type'			=> 'switch',
			'title'			=> 'Background images',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to enable background images post ', THEMES_NAMES ), 
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_breadcrumbs_activate_',
			'type'			=> 'switch',
			'title'			=> 'Breadcrumbs Hides',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to hide Breadcrumbs ', THEMES_NAMES ), 
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'aktif_related_post',
			'type'			=> 'switch',
			'title'			=> 'Related Post',
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Related Post ', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			
			array(
			'id'			=> 'limited_related_posts',
			'type'			=> 'slider',
			'title'			=> __( 'Limit Post', THEMES_NAMES ),
			"default"          => 3,
			"min"              => 0,
			"step"             => 1,
			"max"              => 120,
			'display_value'    => 'text',
			'desc'			=>  __( '<code class="cool-link f2">Limit Post</code> For Related Post', THEMES_NAMES ),
			'required'		=> array( 'aktif_related_post', '=', true )
			), 
			array(
			'id'			=> 'title_related_post_1',
			'type'			=> 'text',
			'title'			=> __( 'Title Opt 1', THEMES_NAMES ), 
			'default'		=> 'Recommended for You',		
			'desc'			=> __( '<i>*Default is</i>, <b style="color: crimson;">Recommended for You</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_related_post', '=', true )
			),
			array(
			'id'			=> 'title_related_post_2',
			'type'			=> 'text',
			'title'			=> __( 'Title Opt 2', THEMES_NAMES ),
			'default'		=> 'You may also like ',
			'desc'			=> __( '<i>*Default is</i>, <b style="color: crimson;">You may also like</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_related_post', '=', true )
			),
			array(
			'id'			=> 'title_related_post_3',
			'type'			=> 'text',
			'title'			=> __( 'Title Opt 3', THEMES_NAMES ),
			'default'		=> 'More from ',
			'desc'			=> __( '<i>*Default is</i>, <b style="color: crimson;">More from</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_related_post', '=', true )
			),
			array(
			'id'			=> 'enable_gallery_top',
			'type'			=> 'switch',
			'title'			=> __( 'Gallery Image Top ', THEMES_NAMES ), 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Gallery Image Top ', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'title_gallery_top',
			'type'			=> 'text',
			'title'			=> __( 'Title Opt 3', THEMES_NAMES ),
			'default'		=> 'Preview',
			'desc'			=> __( '<i>*Default is</i>, <b style="color: crimson;">Preview</b>', THEMES_NAMES ),
			'required'		=> array( 'enable_gallery_top', '=', true )
			),
			array(
			'id'			=> 'aktif_ex_themes_gallery_images_gpstore_',
			'type'			=> 'switch',
			'title'			=> __( 'Gallery Image Bottom', THEMES_NAMES ),
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Gallery Image Bottom', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'title_gallery_bottom',
			'type'			=> 'text',
			'title'			=> __( 'Title Opt 3', THEMES_NAMES ),
			'default'		=> 'Preview',
			'desc'			=> __( '<i>*Default is</i>, <b style="color: crimson;">Preview</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_ex_themes_gallery_images_gpstore_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_rating_apk_activate_',
			'type'			=> 'switch',
			'title'			=> __( 'Rating ', THEMES_NAMES ),
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Rating ', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			 
			array(
			'id'			=> 'ex_themes_youtube_content_activate_',
			'type'			=> 'switch',
			'title'			=> __( 'Random Youtube', THEMES_NAMES ),
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Random Youtube on inside content ', THEMES_NAMES ), 
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_youtube_content_paragraph_on_',

			'type'			=> 'slider',
			'title'			=> __( 'Showing on', THEMES_NAMES ),
			"default"          => 2,
			"min"              => 1,
			"step"             => 1,
			"max"              => 100,
			'display_value'    => 'text',
			'required'		=> array( 'ex_themes_youtube_content_activate_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_comments_activate_',
			'type'			=> 'switch',
			'title'			=> __( 'Comments ', THEMES_NAMES ), 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Comments ', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'enable_tags',
			'type'			=> 'switch',
			'title'			=> __( 'Tags ', THEMES_NAMES ), 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Tags', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'enable_social_share',
			'type'			=> 'switch',
			'title'			=> __( 'Social Shares ', THEMES_NAMES ), 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Social Shares', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			
			array(
			'id'			=> 'popup_next_post',
			'type'			=> 'switch',
			'title'			=> __( 'Pop Next Post ', THEMES_NAMES ), 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Pop Next Post ', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			
			array(
			'id'			=> 'text_next_post',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Next Post</b>', THEMES_NAMES ),
			'default'		=> 'Next Post',
			'required'		=> array( 'popup_next_post', '=', true )
			),
			array(
			'id'			=> 'latest_versions',
			'type'			=> 'switch',
			'title'			=> __( 'Latest Version', THEMES_NAMES ), 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Latest Version', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'text_latest_versions',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">All Versions</b><br> Please Activated Duplicate Post on <a href="/wp-admin/admin.php?page=_options&tab=1">Apk Extractor Setting</a>', THEMES_NAMES ),
			'default'		=> 'All Versions',
			'required'		=> array( 'latest_versions', '=', true )
			),
			
			array(
			'id'			=> 'report_activated',
			'type'			=> 'switch',
			'title'			=> __( 'Report Post', THEMES_NAMES ), 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Report Post', THEMES_NAMES ),
			'default'			=> 0,
			'on'				=> 'Enabled',
			'off'				=> 'Disabled',
			),
			array(
			'id'			=> 'text_report_post',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Report</b> ', THEMES_NAMES ),
			'default'		=> 'Report',
			'required'		=> array( 'report_activated', '=', true )
			),
			array(
			'id'			=> 'text_report_post_2',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 2', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Report Apps</b> ', THEMES_NAMES ),
			'default'		=> 'Report Apps',
			'required'		=> array( 'report_activated', '=', true )
			),
			array(
			'id'			=> 'enable_emoji_bottom',
			'type'			=> 'switch',
			'title'			=> __('React & Emoji', THEMES_NAMES),
			'desc'			=> '<u class="cool-link f2">Enabled</u> to Showing React & Emoji shortcode on Single Bottom<br> if you enable please <a href="/wp-admin/options-general.php?page=rns_options" target"_blank">setting here</a> and select to "Don\'t show buttons on posts by default"',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			), 
			
)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Popular Pages', THEMES_NAMES ),
'id'						=> 'popular_pages',
'customizer_width'			=> '500px',
'subsection'				=> true,
'icon'						=> 'el el-graph',
'fields'					=> array(
			array(
			'id'			=> 'limit_categorie',
			'type'			=> 'slider',
			'title'			=> __( 'Showing on', THEMES_NAMES ),
			"default"          => 12,
			"min"              => 2,
			"step"             => 1,
			"max"              => 100,
			'display_value'    => 'text',
			),
			array(
			'id'			=> 'popular_ranges',
			'type'			=> 'select',
			'title'			=> __('Popular Ranges', THEMES_NAMES),
			'desc'			=> __('Select popular by most view weeks, month, or years', THEMES_NAMES),
			'options'  => array( 
				'1 days' => 'Daily',
				'7 days' => 'Weekly',
				'30 days' => 'Mountly',
				'360 days' => 'Yearly',
				'alltime' => 'Alltime'
			),
			'default'		=> 'alltime',
			),
			array(
			'id'			=> 'aktif_categorie_apps',
			'type'			=> 'switch',
			'title'			=> 'Enable Popular Apps',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'categorie_tops_apps',
			'type'			=> 'select',
			'data'     => 'category',
			'title'			=> __('Pages App', THEMES_NAMES),
			'desc'			=> __( ' <b style="color: crimson;">Select Categories for Apps Page</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_categorie_apps', '=', true )

			),
			array(
			'id'			=> 'aktif_categorie_games',
			'type'			=> 'switch',
			'title'			=> 'Enable Popular Games',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'categorie_tops_games',
			'type'			=> 'select',
			'data'     => 'category',
			'title'			=> __( 'Games Page', THEMES_NAMES),
			'desc'			=> __( ' <b style="color: crimson;">Select Categories for Games Page</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_categorie_games', '=', true )
			),
)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Sidebar Widgets', THEMES_NAMES ),
'id'						=> 'categorie_sidebar',
'customizer_width'			=> '500px',
'subsection'				=> true,
'icon'						=> 'el el-tags',
'fields'					=> array(

			array(
			'id'			=> 'sidebar_activated_',
			'type'			=> 'switch',
			'title'			=> 'Enable Sidebar',
			'desc'			=> __( '<u class="cool-link f2">Enabled</u>  Show Sidebar for Single Post ', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'aktif_categorie_sidebar_1',
			'type'			=> 'switch',
			'title'			=> 'Sidebar Categories Opt 1',
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> Show ', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'categorie_sidebar_1',
			'type'			=> 'textarea',
			'title'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'desc'		=> __( 'Categories Sidebar Opt 1', THEMES_NAMES ),
			'default'		=> '<section class="mb-2">
					<h4 class="h5 font-weight-semibold mb-3">
						<a class="text-body border-bottom-2 border-secondary d-inline-block pb-1" href="#put_your_links_here">
							Games
						</a>
					</h4>
					<div class="row">
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Action">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/fps-150x150.png" alt="Action">
								<span class="text-truncate text-body" style="min-width: 0;">
									Action
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Adventure">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/traveler-150x150.png" alt="Adventure">
								<span class="text-truncate text-body" style="min-width: 0;">
									Adventure
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Arcade">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/arcade-150x150.png" alt="Arcade">
								<span class="text-truncate text-body" style="min-width: 0;">
									Arcade
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Board">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/board-game-150x150.png" alt="Board">
								<span class="text-truncate text-body" style="min-width: 0;">
									Board
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Card">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/poker-cards-150x150.png" alt="Card">
								<span class="text-truncate text-body" style="min-width: 0;">
									Card
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Casual">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/ghost-150x150.png" alt="Casual">
								<span class="text-truncate text-body" style="min-width: 0;">
									Casual
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Fighting">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/swords-150x150.png" alt="Fighting">
								<span class="text-truncate text-body" style="min-width: 0;">
									Fighting
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Gambling">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/slot-machine-150x150.png" alt="Gambling">
								<span class="text-truncate text-body" style="min-width: 0;">
									Gambling
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Logic">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/logical-thinking-150x150.png" alt="Logic">
								<span class="text-truncate text-body" style="min-width: 0;">
									Logic
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="MOBA">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/moba-150x150.png" alt="MOBA">
								<span class="text-truncate text-body" style="min-width: 0;">
									MOBA
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Music">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/music-note-150x150.png" alt="Music">
								<span class="text-truncate text-body" style="min-width: 0;">
									Music
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Puzzle">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/puzzle-150x150.png" alt="Puzzle">
								<span class="text-truncate text-body" style="min-width: 0;">
									Puzzle
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Racing">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/racing-car-150x150.png" alt="Racing">
								<span class="text-truncate text-body" style="min-width: 0;">
									Racing
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Role Playing">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/role-playing-game-150x150.png" alt="Role Playing">
								<span class="text-truncate text-body" style="min-width: 0;">
									Role Playing
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="RPG">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/swords-150x150.png" alt="RPG">
								<span class="text-truncate text-body" style="min-width: 0;">
									RPG
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Simulation">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/interactive-150x150.png" alt="Simulation">
								<span class="text-truncate text-body" style="min-width: 0;">
									Simulation
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Sports">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/basketball-150x150.png" alt="Sports">
								<span class="text-truncate text-body" style="min-width: 0;">
									Sports
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Strategy">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/self-defense-150x150.png" alt="Strategy">
								<span class="text-truncate text-body" style="min-width: 0;">
									Strategy
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Survival">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/parachute-150x150.png" alt="Survival">
			<span class="text-truncate text-body" style="min-width: 0;">
			Survival
			</span>
			</a>
			</div>
			</div>
			</section>


			',
			'required'		=> array( 'aktif_categorie_sidebar_1', '=', true )
			),

			array(
			'id'			=> 'aktif_categorie_sidebar_2',
			'type'			=> 'switch',
			'title'			=> ' Sidebar Categories Opt 2',
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> Show ', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'categorie_sidebar_2',
			'type'			=> 'textarea',
			'title'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'desc'			=> __( 'Categories Sidebar Opt 2', THEMES_NAMES ),
			'default'		=> '<section class="mb-2">
					<h4 class="h5 font-weight-semibold mb-3">
						<a class="text-body border-bottom-2 border-secondary d-inline-block pb-1" href="#put_your_links_here">
							Apps
						</a>
					</h4>
					<div class="row">
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Art &amp; Design">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/paint-150x150.png" alt="Art &amp; Design">
								<span class="text-truncate text-body" style="min-width: 0;">
									Art &amp; Design
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Auto &amp; Vehicles">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/baby-car-150x150.png" alt="Auto &amp; Vehicles">
								<span class="text-truncate text-body" style="min-width: 0;">
									Auto &amp; Vehicles
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Books &amp; Reference">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/book.png" alt="Books &amp; Reference">
								<span class="text-truncate text-body" style="min-width: 0;">
									Books &amp; Reference
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Business">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/business.png" alt="Business">
								<span class="text-truncate text-body" style="min-width: 0;">
									Business
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Communication">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/communication-.png" alt="Communication">
								<span class="text-truncate text-body" style="min-width: 0;">
									Communication
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Education">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/edu.png" alt="Education">
								<span class="text-truncate text-body" style="min-width: 0;">
									Education
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Emulator">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/joystick-150x150.png" alt="Emulator">
								<span class="text-truncate text-body" style="min-width: 0;">
									Emulator
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Entertainment">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/cat_40.png" alt="Entertainment">
								<span class="text-truncate text-body" style="min-width: 0;">
									Entertainment
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Health">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/cat_50.png" alt="Health">
								<span class="text-truncate text-body" style="min-width: 0;">
									Health
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Lifestyle">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/life.png" alt="Lifestyle">
								<span class="text-truncate text-body" style="min-width: 0;">
									Lifestyle
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Maps &amp; Navigation">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/map.png" alt="Maps &amp; Navigation">
								<span class="text-truncate text-body" style="min-width: 0;">
									Maps &amp; Navigation
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Music - Audio">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/music.png" alt="Music - Audio">
								<span class="text-truncate text-body" style="min-width: 0;">
									Music - Audio
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="News &amp; Magazines">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/news.png" alt="News &amp; Magazines">
								<span class="text-truncate text-body" style="min-width: 0;">
									News &amp; Magazines
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Personalization">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/cat_25.png" alt="Personalization">
								<span class="text-truncate text-body" style="min-width: 0;">
									Personalization
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Photography">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/photo.png" alt="Photography">
								<span class="text-truncate text-body" style="min-width: 0;">
									Photography
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Productivity">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/productivity.png" alt="Productivity">
								<span class="text-truncate text-body" style="min-width: 0;">
									Productivity
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Social">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/fb.png" alt="Social">
								<span class="text-truncate text-body" style="min-width: 0;">
									Social
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="System">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/gear-1-150x150.png" alt="System">
								<span class="text-truncate text-body" style="min-width: 0;">
									System
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Tools">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/gear-150x150.png" alt="Tools">
								<span class="text-truncate text-body" style="min-width: 0;">
									Tools
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Travel &amp; Local">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/coin.png" alt="Travel &amp; Local">
								<span class="text-truncate text-body" style="min-width: 0;">
									Travel &amp; Local
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Video Players &amp; Editors">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/video.png" alt="Video Players &amp; Editors">
								<span class="text-truncate text-body" style="min-width: 0;">
									Video Players &amp; Editors
								</span>
							</a>
						</div>
						<div class="col-6 mb-3">
							<a class="d-flex align-items-center position-relative aside-cat" href="#put_your_links_here" title="Weather">
								<img class="rounded-circle flex-shrink-0 mr-2" style="font-size: 0; width: 2rem; height: 2rem;" loading="lazy" src="'.get_bloginfo('template_directory').'/assets/img/icon/weather.png" alt="Weather">
			<span class="text-truncate text-body" style="min-width: 0;">
			Weather
			</span>
			</a>
			</div>
			</div>
			</section>

			',
			'required'		=> array( 'aktif_categorie_sidebar_2', '=', true )
			),


)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Download Pages', THEMES_NAMES ),
'id'						=> 'downloadss_posts',
'customizer_width'			=> '500px',
'subsection'				=> true,
'icon'						=> 'el el-download',
'fields'					=> array(

			array(
			'id'			=> 'download_waits_timers_',
			'type'			=> 'slider',
			'title'			=> __( 'Timer Counts', THEMES_NAMES ),
			"default"          => 3,
			"min"              => 0,
			"step"             => 1,
			"max"              => 120,
			'display_value'    => 'text',
			'desc'			=>  __( '<code class="cool-link f2"> Timer Counts</code> For Download Pages ', THEMES_NAMES ),
			), 
			array(
			'id'			=> 'activate_download_pages',
			'type'			=> 'switch',
			'title'			=> 'Download Page Redirect',
			'desc'			=> '<u class="cool-link f2">Enabled</u> to use download page ',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'activate_download_original_playstore',
			'type'			=> 'switch',
			'title'			=> 'Download Original Playstore',
			'desc'			=> '<u class="cool-link f2">Enabled</u> Enable Download Link original PlayStore ',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),

			array(
			'id'			=> 'activate_download_faqs',
			'type'			=> 'switch',
			'title'			=> 'Enable FAQ Download',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'title_faq_1_',
			'type'			=> 'text',
			'title'			=> __( 'Title FAQ 1', THEMES_NAMES ),
			'default'		=> 'What is APK Installer?',
			'required'		=> array( 'activate_download_faqs', '=', true )
			),
			array(
			'id'			=> 'faq_1_',
			'type'			=> 'editor',
			'title'			=> __( ' ', THEMES_NAMES ),
			'desc'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'default'		=> "<p>This is an installer developed exclusively by <strong><em>".get_option('home')."</em> </strong>. We attach the Cache, OBB file to the single APK file, which helps users to install it quickly and easily.</p>",
			'required'		=> array( 'activate_download_faqs', '=', true )
			),
			array(
			'id'			=> 'title_faq_2_',
			'type'			=> 'text',
			'title'			=> __( 'Title FAQ 2', THEMES_NAMES ),
			'default'		=> 'The download link is broken!',
			'required'		=> array( 'activate_download_faqs', '=', true )
			),
			array(
			'id'			=> 'faq_2_',
			'type'			=> 'editor',
			'title'			=> __( ' ', THEMES_NAMES ),
			'desc'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'default'		=> "<p><em>Since we use caching and the server has special sync functionality, sometimes some newly posted games will have broken links for a few minutes. You can try again in about 5-15 minutes. If after a long time the download link still fails, this is definitely a mistake in the editor’s link import process (possibly because he is sleepy)</em></p>",
			'required'		=> array( 'activate_download_faqs', '=', true )
			),
			array(
			'id'			=> 'title_faq_3_',
			'type'			=> 'text',
			'title'			=> __( 'Title FAQ 3', THEMES_NAMES ),
			'default'		=> 'MOD Not Working',
			'required'		=> array( 'activate_download_faqs', '=', true )
			),
			array(
			'id'			=> 'faq_3_',
			'type'			=> 'editor',
			'title'			=> __( ' ', THEMES_NAMES ),
			'desc'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'default'		=> "<p><em>We always do thorough testing before posting games and apps. Please read carefully before the instructions that include “MOD Info?” “Important!” in the content. If it still doesn’t work, report it back to us</em></p>",
			'required'		=> array( 'activate_download_faqs', '=', true )
			),

			array(
			'id'			=> 'title_faq_4_',
			'type'			=> 'text',
			'title'			=> __( 'Title FAQ 4', THEMES_NAMES ),
			'default'		=> 'What is OBB? How to install?',
			'required'		=> array( 'activate_download_faqs', '=', true )
			),
			array(
			'id'			=> 'faq_4_',
			'type'			=> 'editor',
			'title'			=> __( ' ', THEMES_NAMES ),
			'desc'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'default'		=> "<p><em>OBB is like the game’s DLC, you just need to unzip it to the “Android / obb” folder in the memory. The game will work properly. We rarely post an OBB, however, as it is already integrated into the INSTALLER APK as we mentioned earlier.</em></p>
			<p><em><strong>How to install game have APK and OBB</strong></em></p>
			<p><em>1. Download apk and OBB of the game</em><br>
			<em>2. Extract the OBB, copy the OBB folder to the “Android/obb” path. A correct OBB path would look like “Android/obb/com.madfingergames.legends”</em><br>
			<em>3. Install APK file and run</em></p>",
			'required'		=> array( 'activate_download_faqs', '=', true )
			),


			array(
			'id'			=> 'title_faq_5_',
			'type'			=> 'text',
			'title'			=> __( 'Title FAQ 5', THEMES_NAMES ),
			'default'		=> 'Error "App not installed"',
			'required'		=> array( 'activate_download_faqs', '=', true )
			),
			array(
			'id'			=> 'faq_5_',
			'type'			=> 'editor',
			'title'			=> __( ' ', THEMES_NAMES ),
			'desc'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'default'		=> "<p><em>This usually happens when you already have the original version or version downloaded on another website on your device. To fix it, please delete the app or game (remember to backup data if necessary), then reinstall our apk file</em></p>",
			'required'		=> array( 'activate_download_faqs', '=', true )
			),

			array(
			'id'			=> 'activate_download_notices',
			'type'			=> 'switch',
			'title'			=> 'Enable Notices Download',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'notice_download_pages',
			'type'			=> 'editor',
			'title'			=> __( 'Notices for Download Pages', THEMES_NAMES ),
			'desc'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'default'		=> "<ul>
								<li>Please check our installation guide.</li>
								<li>To check the CPU and GPU of Android device, please use <em><a href=\"https://play.google.com/store/apps/details?id=com.cpuid.cpu_z&amp;hl=en\">CPU-Z</a></em> app</li>
							</ul>",
			'required'		=> array( 'activate_download_notices', '=', true )
			), 
)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Advertise', THEMES_NAMES ),
'id'						=> 'ads',
'customizer_width'			=> '500px',
'icon'						=> 'el el-usd',
'fields'					=> array(
			array(
			'id'			=> 'ex_themes_banner_header_activate_',
			'type'			=> 'switch',
			'title'			=> 'Ads in Home, Archive, Category, 404, Search',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_banner_header_code_',
			'type'			=> 'textarea',
			'title'			=> '&nbsp;',
			'desc'			=> '<i>*Insert Your Code HTML.</i>',
			'default'		=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
			'required'		=> array( 'ex_themes_banner_header_activate_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_banner_sidebar_ads_activate_',
			'type'			=> 'switch',
			'title'			=> 'Ads in Sidebar',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_banner_sidebar_ads_code_',
			'type'			=> 'textarea',
			'title'			=> '&nbsp;',
			'desc'			=> '<i>*Insert Your Code HTML.</i>',
			'default'		=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
			'required'		=> array( 'ex_themes_banner_sidebar_ads_activate_', '=', true )
			),

			array(
			'id'			=> 'ex_themes_banner_single_ads_activate_',
			'type'			=> 'switch',
			'title'			=> 'Ads Single Top',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_banner_single_ads_code_',
			'type'			=> 'textarea',
			'title'			=> '&nbsp;',
			'desc'			=> '<i>*Insert Your Code HTML.</i>',
			'default'		=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
			'required'		=> array( 'ex_themes_banner_single_ads_activate_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_banner_single_ads_activate_2',
			'type'			=> 'switch',
			'title'			=> 'Ads Single Bottom',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_banner_single_ads_code_2',
			'type'			=> 'textarea',
			'title'			=> '&nbsp;',
			'desc'			=> '<i>*Insert Your Code HTML.</i>',
			'default'		=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
			'required'		=> array( 'ex_themes_banner_single_ads_activate_2', '=', true )
			),
			array(
			'id'			=> 'ex_themes_banner_single_download_page_active_',
			'type'			=> 'switch',
			'title'			=> 'Ads Page Download',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_banner_single_download_page_code_',
			'type'			=> 'textarea',
			'title'			=> '&nbsp;',
			'desc'			=> '<i>*Insert Your Code HTML.</i>',
			'default'		=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
			'required'		=> array( 'ex_themes_banner_single_download_page_active_', '=', true )
			),
			array(
			'id'			=> 'ex_themes_banner_single_download_page_active__2',
			'type'			=> 'switch',
			'title'			=> 'Ads 2 in Single Download',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_banner_single_download_page_code__2',
			'type'			=> 'textarea',
			'title'			=> '&nbsp;',
			'subtitle' => '<i>*Insert Your Code HTML.</i>',
			'default'		=> "<img src=\"".get_bloginfo('template_directory') . "/assets/img/ads1.png\" height=\"auto\" width=\"100%\">",
			'required'		=> array( 'ex_themes_banner_single_download_page_active__2', '=', true )
			), 
)
) );
// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Webmasters', THEMES_NAMES ),
'id'						=> 'webmaster_tools_verification',
'customizer_width'			=> '500px',
'icon'						=> 'el el-podcast',
'fields'					=> array(
			array(
			'id'			=> 'aktif_webmaster',
			'type'			=> 'switch',
			'title'			=> 'Enable Webmasters Verification',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),

			array(
			'id'			=> 'google_verif',
			'type'			=> 'text',
			'title'			=> __( 'Google Search Console', THEMES_NAMES ),
			'desc'			=> __( 'Insert Code Google Search Console ', THEMES_NAMES ),
			'default'		=> 'AvKGNc41mcT7TmHke8nHR5U99NHLk2-eJw_j6PyQq94',
			'required'		=> array( 'aktif_webmaster', '=', true )
			),
			array(
			'id'			=> 'bing_verif',
			'type'			=> 'text',
			'title'			=> __( 'Bing Webmaster Tools', THEMES_NAMES ),
			'desc'			=> __( 'Insert Code Bing Webmaster Tools', THEMES_NAMES ),
			'default'		=> 'BC97A518A2B909C0B1A76AD695E9A665',
			'required'		=> array( 'aktif_webmaster', '=', true )
			),
			array(
			'id'			=> 'pinterest_verif',
			'type'			=> 'text',
			'title'			=> __( 'Pinterest Site Verification', THEMES_NAMES ),
			'desc'			=> __( 'Insert Code Pinterest Site Verification', THEMES_NAMES ),
			'default'		=> 'put your code',
			'required'		=> array( 'aktif_webmaster', '=', true )
			),
			array(
			'id'			=> 'yandex_verif',
			'type'			=> 'text',
			'title'			=> __( 'Yandex Webmaster Tools', THEMES_NAMES ),
			'desc'			=> __( 'Insert Code Yandex Webmaster Tools', THEMES_NAMES ),
			'default'		=> 'bb0b65aedc95ce07',
			'required'		=> array( 'aktif_webmaster', '=', true )
			),
			array(
			'id'			=> 'baidu_verif',
			'type'			=> 'text',
			'title'			=> __( 'Baidu Webmaster Tools', THEMES_NAMES ),
			'desc'			=> __( 'Insert Code Baidu Webmaster Tools ', THEMES_NAMES ),
			'default'		=> 'put your code',
			'required'		=> array( 'aktif_webmaster', '=', true )
			),


)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Social Media', THEMES_NAMES ),
'id'						=> 'sosial_media',
'customizer_width'			=> '500px',
'icon'						=> 'el el-adult',
'fields'					=> array(
			
			array(
			'id'			=> 'info_telegram',
			'type'			=> 'info',
			'title'			=> __('PUT YOUR DETAIL INFO FOR TELEGRAM', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('', THEMES_NAMES)
			),
			
			
			array(
			'id'			=> 'telegram_activate',
			'type'			=> 'switch',
			'title'			=> 'Telegram Button',
			'desc'			=> '<u class="cool-link f2">Enabled</u>  to Showing Telegrm Button',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			
			array(
			'id'			=> 'telegram_usernames',
			'type'			=> 'text',
			'title'			=> __( 'User Name Telegram', THEMES_NAMES ),
			'default'		=> 'exthemes_helps',			
			'desc'			=> __( 'Example : <b style="color: crimson;">exthemes_helps</b>', THEMES_NAMES ), 
			'required'		=> array( 'telegram_activate', '=', true )
			),
			array(
			'id'			=> 'telegram_url',
			'type'			=> 'text',
			'title'			=> __( 'Telegram URL', THEMES_NAMES ), 
			'validate'		=> 'url',
			'default'		=> EXTHEMES_TELEGRAM_URL,
			'desc'			=> __( 'Default is <b style="color: crimson;">'.EXTHEMES_TELEGRAM_URL.'</b>', THEMES_NAMES ), 
			'required'		=> array( 'telegram_activate', '=', true ),
			),
			
			array(
			'id'			=> 'telegram_users_join',
			'type'			=> 'text',
			'title'			=> __( 'Title 1 ', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Join</b>', THEMES_NAMES ),
			'required'		=> array( 'telegram_activate', '=', true ),
			'default'		=> 'Join '
			),
			array(
			'id'			=> 'telegram_users_on_telegram_channel',
			'type'			=> 'text',
			'title'			=> __( 'Title 2', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">on Telegram channel</b>', THEMES_NAMES ),
			'required'		=> array( 'telegram_activate', '=', true ),
			'default'		=> 'on Telegram channel '
			),
			
			array(
			'id'			=> 'aktif_sosmed_sidebar',
			'type'			=> 'switch',
			'title'			=> 'Social Links',
			'desc'			=> '<u class="cool-link f2">Enabled</u> to Activate Social Links Accounts',
			'default'		=> false
			),
			

			array(
			'id'			=> 'facebook_urls',
			'type'			=> 'text',
			'title'			=> __( 'Facebook', THEMES_NAMES ),
			'validate'		=> 'url',
			'default'		=> EXTHEMES_FACEBOOK_URL,
			'desc'			=> __( 'Default is <b style="color: crimson;">'.EXTHEMES_FACEBOOK_URL.'</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_sosmed_sidebar', '=', true )
			),

			array(
			'id'			=> 'twitter_urls',
			'type'			=> 'text',
			'title'			=> __( 'Twitter', THEMES_NAMES ),
			'validate'		=> 'url',
			'default'		=> EXTHEMES_TWITTER_URL,
			'desc'			=> __( 'Default is <b style="color: crimson;">'.EXTHEMES_TWITTER_URL.'</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_sosmed_sidebar', '=', true )
			),

			array(
			'id'			=> 'youtube_urls',
			'type'			=> 'text',
			'title'			=> __( 'Youtube', THEMES_NAMES ),
			'validate'		=> 'url',
			'default'		=> EXTHEMES_YOUTUBE_URL,
			'desc'			=> __( 'Default is <b style="color: crimson;">'.EXTHEMES_YOUTUBE_URL.'</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_sosmed_sidebar', '=', true )
			),

			array(
			'id'			=> 'instagram_urls',
			'type'			=> 'text',
			'title'			=> __( 'Instagram', THEMES_NAMES ),
			'validate'		=> 'url',
			'default'		=> EXTHEMES_INSTAGRAM_URL,
			'desc'			=> __( 'Default is <b style="color: crimson;">'.EXTHEMES_INSTAGRAM_URL.'</b>', THEMES_NAMES ),
			'required'		=> array( 'aktif_sosmed_sidebar', '=', true )
			),
 

)
) );

 
// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Custom JS CSS', THEMES_NAMES ),
'id'						=> 'script_insert',
'customizer_width'			=> '500px',
'icon'						=> 'el el-fork',
'fields'					=> array(
			array(
			'id'			=> 'aktif_header_section',
			'type'			=> 'switch',
			'title'			=> 'Header Sections',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'header_section',
			'type'			=> 'textarea',
			'title'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'desc'			=> __( 'You can Inject Scripts or CSS Style on Header<br>example<br>&lt;style&gt;<b style="color:#c09853;background-color: #fcf8e3;">.sample {display:none}</b>&lt;/style&gt;
			<br>
			&lt;script&gt;<b style="color:#c09853;background-color: #fcf8e3;">Your code</b>&lt;/script&gt;', THEMES_NAMES ),
			'required'		=> array( 'aktif_header_section', '=', true )

			),
			array(
			'id'			=> 'aktif_footer_section',
			'type'			=> 'switch',
			'title'			=> 'Footer Sections',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'footer_section',
			'type'			=> 'textarea',
			'title'			=> __( 'HTML Allowed', THEMES_NAMES ),
			'desc'			=> __( 'You can Inject Scripts or CSS Style on Footer<br>example<br>&lt;style&gt;<b style="color:#c09853;background-color: #fcf8e3;">.sample {display:none}</b>&lt;/style&gt;
			<br>
			&lt;script&gt;<b style="color:#c09853;background-color: #fcf8e3;">Your code</b>&lt;/script&gt;', THEMES_NAMES ),
			'required'		=> array( 'aktif_footer_section', '=', true )
			),
			/* 
			array(
				'id'       => 'opt-ace-editor-css',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'CSS Code', 'your-textdomain-here' ),
				'subtitle' => esc_html__( 'Paste your CSS code here.', 'your-textdomain-here' ),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'desc'     => 'Possible modes can be found at <a href="//ace.c9.io" target="_blank">ace.c9.io/</a>.',
				'default'  => '#header{				margin: 0 auto;			}',
			),
			array(
				'id'       => 'opt-ace-editor-js',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'JS Code', 'your-textdomain-here' ),
				'subtitle' => esc_html__( 'Paste your JS code here.', 'your-textdomain-here' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => 'Possible modes can be found at <a href="//ace.c9.io" target="_blank">ace.c9.io/</a>.',
				'default'  => 'jQuery(document).ready(function(){\n\n});',
			),
			array(
				'id'         => 'opt-ace-editor-php',
				'type'       => 'ace_editor',
				'full_width' => true,
				'title'      => esc_html__( 'PHP Code', 'your-textdomain-here' ),
				'subtitle'   => esc_html__( 'Paste your PHP code here.', 'your-textdomain-here' ),
				'mode'       => 'php',
				'theme'      => 'chrome',
				'desc'       => 'Possible modes can be found at <a href="//ace.c9.io" target="_blank">ace.c9.io/</a>.',
				'default'    => '<?php echo "PHP String";',
			),
			*/
)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'Options', THEMES_NAMES ),
'id'						=> 'optionz',
'customizer_width'			=> '500px',
'icon'						=> 'el el-cog',
'fields'					=> array(  
			array(
			'id'			=> 'ex_themes_minify_activate_',
			'type'			=> 'switch',
			'title'			=> 'Minify',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> Minify CSS, HTML, no includes JS ', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'aktif_thumbnails',
			'type'			=> 'switch',
			'title'			=> __( 'Hotlink ', THEMES_NAMES ), 
			'desc'			=> __('<u class="cool-link f2">Enabled</u> to use <b style="color: blue;">Hotlink Thumbnails</b> from PlayStore<br><code class="cool-link f2">off</code>  to use <b style="color: red;">Own images</b>', THEMES_NAMES),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_cdn_photon_activate_',
			'type'			=> 'switch',
			'title'			=> 'CDN',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to use CDN by WP</b><br><i>example</i> <br> https://i3.wp.com/moddroid.demos.web.id/wp-content/uploads/2021/11/download-truck-simulator-ultimate.png', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			), 
			array(
			'id'			=> 'ex_themes_mask_link_',
			'type'			=> 'switch',
			'title'			=> 'Masking Link', 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> Enable Masking your Download Link</b>', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_nolink_activate_',
			'type'			=> 'switch',
			'title'			=> 'Hide Download Link',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Hide Download Url Link from copy paste</b>', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			
			array(
			'id'			=> 'activate_no_links_',
			'type'			=> 'switch',
			'title'			=> 'BackEnd Link', 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> Enable BackEnd Link</b><br>
			Example : <br>
			Before (<code style="text-transform: uppercase;color: #2271b1;">OFF</code>)<br>
			<b style="color: blue;">'.EXTHEMES_DEMO_URL.'/desert-king-2-mod-apk-v143-unlimited-money/file/</b><b style="color: green;">?urls=https://drive.google.com/file/d/1M-T74sohSgjU8QzFcx42AxT5CE0aZQsP/view?usp=sharing&sizes=220mb&names=%20Desert%20King%202%20APK%20v1.4.3</b><br>
			After (<code style="text-transform: uppercase;color: #2271b1;">ON</code>)<br> 
			<b style="color: blue;">'.EXTHEMES_DEMO_URL.'/desert-king-2-mod-apk-v143-unlimited-money/file/</b>', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			), 
			array(
			'id'			=> 'ex_themes_activate_ratings_',
			'type'			=> 'switch',
			'title'			=> 'Rating',
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to Show Rating before mods ', THEMES_NAMES ),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'ex_themes_no_loading_lazy',
			'type'			=> 'switch',
			'title'			=> 'attribut loading="lazy"',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to remove attribut <b>loading="lazy"</b> from image<br> if you dont know, just leave it default or <code class="cool-link f2">Off</code>', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'mdr_no_bar_admin',
			'type'			=> 'switch',
			'title'			=> 'Bar Admin',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to hide bar admin on front end', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'mdr_no_jquery',
			'type'			=> 'switch',
			'title'			=> 'No Jquery',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to use No Jquery', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'RTL Options', THEMES_NAMES ),
'id'						=> 'rtl_pages',
'customizer_width'			=> '500px',
'subsection'				=> false,
'icon'						=> 'el el-retweet',
'fields'					=> array(
			array(
			'id'			=> 'ex_themes_activate_rtl_',
			'type'			=> 'switch',
			'title'			=> 'RTL Modes', 
			'desc'			=> __( '<u class="cool-link f2">Enabled</u>  to Use RTL</b>', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),			
			array(
			'id'			=> 'languange_rtl',
			'type'			=> 'text', 
			'title'			=> __('Languange', THEMES_NAMES),
			'default'		=> 'ar',
			'desc'			=> __( ' Default is <b style="color: crimson;">ar</b>', THEMES_NAMES ),
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),  
			array(
			'id'			=> 'font_body_rtl',
			'type'			=> 'text', 
			'title'			=> __('Fonts Body ', THEMES_NAMES),
			'default'		=> '\'Droid Arabic Naskh\', sans-serif',
			'desc'			=> __( 'Click here to <a href="https://fontlibrary.org/" target="_blank">see all fonts</a><br>Default is <b style="color: crimson;">\'Droid Arabic Naskh\', sans-serif</b>', THEMES_NAMES ),
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),  
			
			array(
			'id'			=> 'font_body_custom_fonts_rtl',
			'type'			=> 'text', 
			'title'			=> __('Custom Fonts Url ', THEMES_NAMES),
			'default'		=> 'https://fontlibrary.org//face/droid-arabic-kufi',
			'desc'			=> __( 'Custom Fonts Url CSS for RTL <br>Default is <b style="color: crimson;">https://fontlibrary.org//face/droid-arabic-kufi</b>', THEMES_NAMES ),
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),  
			array(
			'id'			=> 'info_rtl_translate_options',
			'type'			=> 'info',
			'title'			=> __('THIS IS INFO FOR CHANGE LANGUAGE NUMBERS FOR RTL', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('', THEMES_NAMES),			
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_1',
			'type'			=> 'text',
			'title'			=> __( 'Number 1 ', THEMES_NAMES ), 
			'default'		=> '۱',
			'desc'			=> __( 'Default is <b style="color: crimson;">۱</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_2',
			'type'			=> 'text',
			'title'			=> __( 'Number 2 ', THEMES_NAMES ), 
			'default'		=> '۲',
			'desc'			=> __( 'Default is <b style="color: crimson;">۲</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_3',
			'type'			=> 'text',
			'title'			=> __( 'Number 3 ', THEMES_NAMES ), 
			'default'		=> '۳',
			'desc'			=> __( 'Default is <b style="color: crimson;">۳</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_4',
			'type'			=> 'text',
			'title'			=> __( 'Number 4 ', THEMES_NAMES ), 
			'default'		=> '۴',
			'desc'			=> __( 'Default is <b style="color: crimson;">۴</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_5',
			'type'			=> 'text',
			'title'			=> __( 'Number 5 ', THEMES_NAMES ), 
			'default'		=> '۵',
			'desc'			=> __( 'Default is <b style="color: crimson;">۵</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_6',
			'type'			=> 'text',
			'title'			=> __( 'Number 6 ', THEMES_NAMES ), 
			'default'		=> '۶',
			'desc'			=> __( 'Default is <b style="color: crimson;">۶</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_7',
			'type'			=> 'text',
			'title'			=> __( 'Number 7 ', THEMES_NAMES ), 
			'default'		=> '۷',
			'desc'			=> __( 'Default is <b style="color: crimson;">۷</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_8',
			'type'			=> 'text',
			'title'			=> __( 'Number 8 ', THEMES_NAMES ), 
			'default'		=> '۸',
			'desc'			=> __( 'Default is <b style="color: crimson;">۸</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_9',
			'type'			=> 'text',
			'title'			=> __( 'Number 9 ', THEMES_NAMES ), 
			'default'		=> '۹',
			'desc'			=> __( 'Default is <b style="color: crimson;">۹</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'number_0',
			'type'			=> 'text',
			'title'			=> __( 'Number 0 ', THEMES_NAMES ), 
			'default'		=> '۰',
			'desc'			=> __( 'Default is <b style="color: crimson;">۰</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			array(
			'id'			=> 'rtl_homes',
			'type'			=> 'text',
			'title'			=> __( 'Home ', THEMES_NAMES ), 
			'default'		=> 'خانه',
			'desc'			=> __( 'Default is <b style="color: crimson;">خانه</b>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_activate_rtl_', '=', true )
			),

)
) );

// -> START Editors
Redux::setSection( $opt_name, array(
'title'						=> __( 'SEO Options', THEMES_NAMES ),
'id'						=> 'seo_pages',
'customizer_width'			=> '500px',
'subsection'				=> false,
'icon'						=> 'el el-search',
'fields'					=> array(
			array(
			'id'			=> 'noindex_activated',
			'type'			=> 'switch',
			'title'			=> 'NoIndex Follow',
			'desc'			=> 'Click <code style="text-transform: uppercase;color: #2271b1;">On</code> to Enable No Index Follow for Download Page',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),			
			array(
			'id'			=> 'noindex_setting',
			'type'			=> 'text',
			'title'			=> __( 'Setting', THEMES_NAMES ),
			'desc'			=> 'Meta Robot Setting for Download Page<br><b>default is : <i style="color: crimson;">noindex,follow</i></b><br>example : &lt;meta name=&#039;robots&#039; content=&#039;<i style="color: crimson;">noindex,follow</i>&#039; /&gt;',
			'default'		=> 'noindex,follow',
			'required'		=> array( 'noindex_activated', '=', true )
			),
			array(
			'id'			=> 'ex_themes_activate_seo_',
			'type'			=> 'switch',
			'title'			=> 'Seo Meta Tag', 			 
			'desc'			=> 'Click <code style="text-transform: uppercase;color: #2271b1;">On</code> to Activated  <code style="text-transform: uppercase;color: #2271b1;">Auto Meta keywords and description SEO optimization</code><br>if you <code style="text-transform: uppercase;color: #2271b1;">OFF</code> you have to use plugin SEO',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),			
			array(
			'id'			=> 'ex_themes_activate_seox',
			'type'			=> 'switch',
			'title'			=> 'SEO Schema',
			'desc'			=> 'Click <code style="text-transform: uppercase;color: #2271b1;">On</code> to use automatic <code style="text-transform: uppercase;color: #2271b1;">seo scheme</code><br>if you <code style="text-transform: uppercase;color: #2271b1;">OFF</code> you have to use plugin SEO',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),	
)
) );

Redux::setSection( $opt_name, array(
'title'						=> __( 'New Theme Style', THEMES_NAMES ),
'id'						=> 'new_theme_style',
'customizer_width'			=> '700px',
'icon'						=> 'el el-screen', 
'fields'					=> array(			
			array(
			'id'			=> 'info_categorie_sidebar_1_new_style',
			'type'			=> 'info',
			'title'			=> __('THIS IS INFO FOR SETTING CATEGORIE', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('If You Want Add Your Categories , Please <a href="/wp-admin/widgets.php" target="_blank" class="cool-link f2">SETTING HERE</a> and choices <b class="cool-link f2">(MDR) Sidebar Category Selected</b>', THEMES_NAMES)
			),
			
			array(
			'id'			=> 'ex_themes_home_style_2_activate_',
			'type'			=> 'switch',
			'title'			=> 'Modyolo.Com Theme ',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to use new style like modyolo.com</b>', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'color_background',
			'type'			=> 'color',
			'title'			=> __('Colors Background  ', THEMES_NAMES),
			'desc'			=> __('Colors Background for Modyolo.Com style  <br>*default: <b style="color: #000000;">#F0F2F5</b>', THEMES_NAMES),
			'default'		=> '#F0F2F5',
			'validate'		=> 'color',			
			'required'		=> array( 'ex_themes_home_style_2_activate_', '=', true )
			),			 
			array(
			'id'			=> 'mdr_style_3',
			'type'			=> 'switch',
			'title'			=> 'Reborns Theme ',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to use Reborns style  </b>', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'			=> 'menus_footer_baru',
			'type'			=> 'textarea',
			'title'			=> __( 'Menu Footer Mobile', THEMES_NAMES ),
			'desc'			=> __( 'changes your <b style="color: #008080;">Menus</b> for Footer Mobile', THEMES_NAMES ),
			'default'		=> "<li><a href='".home_url('/#yourlinks')."' itemprop='url'> <span> Sitemap </span> </a></li>
			
<li><a href='".home_url('/#yourlinks')."' itemprop='url'> <span> Disclaimer </span></a></li>

<li><a href='".home_url('/#yourlinks')."' itemprop='url'> <span> Privacy </span></a></li>
			",	
			'required'		=> array( 'mdr_style_3', '=', true )		 
			),
		
			array(
			'id'			=> 'menus_sosmed_baru',
			'type'			=> 'textarea',
			'title'			=> __( 'Social Media Mobile', THEMES_NAMES ),
			'desc'			=> __( 'changes your <b style="color: #008080;">Social Media</b> for Footer Mobile', THEMES_NAMES ),
			'default'		=> "<li><a href='#yourlink' itemprop='url'><span class='a tIc bIc'><svg viewBox='0 0 32 32'><path d='M24,3H8A5,5,0,0,0,3,8V24a5,5,0,0,0,5,5H24a5,5,0,0,0,5-5V8A5,5,0,0,0,24,3Zm3,21a3,3,0,0,1-3,3H17V18h4a1,1,0,0,0,0-2H17V14a2,2,0,0,1,2-2h2a1,1,0,0,0,0-2H19a4,4,0,0,0-4,4v2H12a1,1,0,0,0,0,2h3v9H8a3,3,0,0,1-3-3V8A3,3,0,0,1,8,5H24a3,3,0,0,1,3,3Z'></path></svg></span></a></li>

<li><a href='#yourlink' itemprop='url'><span class='a tIc bIc'><svg viewBox='0 0 32 32'><path d='M22,3H10a7,7,0,0,0-7,7V22a7,7,0,0,0,7,7H22a7,7,0,0,0,7-7V10A7,7,0,0,0,22,3Zm5,19a5,5,0,0,1-5,5H10a5,5,0,0,1-5-5V10a5,5,0,0,1,5-5H22a5,5,0,0,1,5,5Z'></path><path d='M16,9.5A6.5,6.5,0,1,0,22.5,16,6.51,6.51,0,0,0,16,9.5Zm0,11A4.5,4.5,0,1,1,20.5,16,4.51,4.51,0,0,1,16,20.5Z'></path><circle cx='23' cy='9' r='1'></circle></svg></span></a></li>

<li><a href='#yourlink' itemprop='url'><span class='a tIc bIc'><svg viewBox='0 0 32 32'><path d='M13.35,28A13.66,13.66,0,0,1,2.18,22.16a1,1,0,0,1,.69-1.56l2.84-.39A12,12,0,0,1,5.44,4.35a1,1,0,0,1,1.7.31,9.87,9.87,0,0,0,5.33,5.68,7.39,7.39,0,0,1,7.24-6.15,7.29,7.29,0,0,1,5.88,3H29a1,1,0,0,1,.9.56,1,1,0,0,1-.11,1.06L27,12.27c0,.14,0,.28-.05.41a12.46,12.46,0,0,1,.09,1.43A13.82,13.82,0,0,1,13.35,28ZM4.9,22.34A11.63,11.63,0,0,0,13.35,26,11.82,11.82,0,0,0,25.07,14.11,11.42,11.42,0,0,0,25,12.77a1.11,1.11,0,0,1,0-.26c0-.22.05-.43.06-.65a1,1,0,0,1,.22-.58l1.67-2.11H25.06a1,1,0,0,1-.85-.47,5.3,5.3,0,0,0-4.5-2.51,5.41,5.41,0,0,0-5.36,5.45,1.07,1.07,0,0,1-.4.83,1,1,0,0,1-.87.2A11.83,11.83,0,0,1,6,7,10,10,0,0,0,8.57,20.12a1,1,0,0,1,.37,1.05,1,1,0,0,1-.83.74Z'></path></svg></span></a></li>

<li><a href='#yourlink' itemprop='url'><span class='a tIc bIc'><svg viewBox='0 0 32 32'><path d='M24,3H8A5,5,0,0,0,3,8V24a5,5,0,0,0,5,5H24a5,5,0,0,0,5-5V8A5,5,0,0,0,24,3Zm3,21a3,3,0,0,1-3,3H8a3,3,0,0,1-3-3V8A3,3,0,0,1,8,5H24a3,3,0,0,1,3,3Z'></path><path d='M22,12a3,3,0,0,1-3-3,1,1,0,0,0-2,0V19a3,3,0,1,1-3-3,1,1,0,0,0,0-2,5,5,0,1,0,5,5V13a4.92,4.92,0,0,0,3,1,1,1,0,0,0,0-2Z'></path></svg></span></a></li>

<li><a href='#yourlink' itemprop='url'><span class='a tIc bIc'><svg viewBox='0 0 32 32'><path d='M16,2A13,13,0,0,0,8,25.23V29a1,1,0,0,0,.51.87A1,1,0,0,0,9,30a1,1,0,0,0,.51-.14l3.65-2.19A12.64,12.64,0,0,0,16,28,13,13,0,0,0,16,2Zm0,24a11.13,11.13,0,0,1-2.76-.36,1,1,0,0,0-.76.11L10,27.23v-2.5a1,1,0,0,0-.42-.81A11,11,0,1,1,16,26Z'></path><path d='M19.86,15.18a1.9,1.9,0,0,0-2.64,0l-.09.09-1.4-1.4.09-.09a1.86,1.86,0,0,0,0-2.64L14.23,9.55a1.9,1.9,0,0,0-2.64,0l-.8.79a3.56,3.56,0,0,0-.5,3.76,10.64,10.64,0,0,0,2.62,4A8.7,8.7,0,0,0,18.56,21a2.92,2.92,0,0,0,2.1-.79l.79-.8a1.86,1.86,0,0,0,0-2.64Zm-.62,3.61c-.57.58-2.78,0-4.92-2.11a8.88,8.88,0,0,1-2.13-3.21c-.26-.79-.25-1.44,0-1.71l.7-.7,1.4,1.4-.7.7a1,1,0,0,0,0,1.41l2.82,2.82a1,1,0,0,0,1.41,0l.7-.7,1.4,1.4Z'></path></svg></span></a></li>

<li><a href='#yourlink' itemprop='url'><span class='a tIc bIc'><svg viewBox='0 0 32 32'><path d='M24,28a1,1,0,0,1-.62-.22l-6.54-5.23a1.83,1.83,0,0,1-.13.16l-4,4a1,1,0,0,1-1.65-.36L8.2,18.72,2.55,15.89a1,1,0,0,1,.09-1.82l26-10a1,1,0,0,1,1,.17,1,1,0,0,1,.33,1l-5,22a1,1,0,0,1-.65.72A1,1,0,0,1,24,28Zm-8.43-9,7.81,6.25L27.61,6.61,5.47,15.12l4,2a1,1,0,0,1,.49.54l2.45,6.54,2.89-2.88-1.9-1.53A1,1,0,0,1,13,19a1,1,0,0,1,.35-.78l7-6a1,1,0,1,1,1.3,1.52Z'></path></svg></span></a></li> 
			",	
			'required'		=> array( 'mdr_style_3', '=', true )		 
			),
		
		
			array(
			'id'			=> 'ex_themes_footers_abouts',
			'type'			=> 'editor',
			'title'			=> __( 'About', THEMES_NAMES ), 
			'desc'			=> __( 'Add your About on Footer Sections', THEMES_NAMES ),
			'default'		=> '<div class="widget-content abtU" data-text="Made with Love by">
            <div class="abtT">
              <h2 class="tl">'.$sites.'</h2>
              <!--[ Delete comment tag on section bellow and change data-src="#" attribute with your logo url ]-->
              <!-- <img class="lazy" alt="'.$sites.'" data-src="#" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="/> -->
            </div>
            <p class="abtD">'.$sites.' is a completed free website to share games and premium app mod at high quality</p>
          </div>
			', 
			'required'		=> array( 'mdr_style_3', '=', true )
			), 
			array(
			'id'			=> 'mdr_text_get',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Get</b>', THEMES_NAMES ),
			'default'		=> 'Get',
			'required'		=> array( 'mdr_style_3', '=', true )
			),
			array(
			'id'			=> 'cats_search',
			'type'			=> 'switch',
			'title'			=> 'Categorie on Search',			
			'desc'			=> __( '<u class="cool-link f2">Enabled</u> to use Categorie on Search </b>', THEMES_NAMES ), 
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			'required'		=> array( 'mdr_style_3', '=', true )
			),			
			array(
			'id'			=> 'limit_cats_search',
			'type'			=> 'slider',
			'title'			=> __( 'Showing to', THEMES_NAMES ),
			"default"          => 2,
			"min"              => 1,
			"step"             => 1,
			"max"              => 100,
			'display_value'    => 'text',
			'required'		=> array( 'cats_search', '=', true )
			),
			array(
			'id'			=> 'enable_categorie',
			'type'			=> 'switch',
			'title'			=> __('Categorie Header', THEMES_NAMES),
			'desc'			=> '<u class="cool-link f2">hide</u> Categorie Header on home pages',
			'default'		=> 0,
			'on'			=> 'Show',
			'off'			=> 'Hide',
			'required'		=> array( 'mdr_style_3', '=', true )
			), 
			
			
			
)
) );

Redux::setSection( $opt_name, array(
'title'						=> __( 'Change Language', THEMES_NAMES ),
'id'						=> 'translate_options',
'customizer_width'			=> '500px',
'icon'						=> 'el el-idea',
'fields'					=> array(

			array(
			'id'			=> 'info_translate_options',
			'type'			=> 'info',
			'title'			=> __('THIS IS INFO FOR CHANGE LANGUAGE AS YOU WISH', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('', THEMES_NAMES)
			),
			
			array(
			'id'			=> 'title_home',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Latest Updates</b>', THEMES_NAMES ),
			'default'		=> 'Latest Updates'
			),
			array(
			'id'			=> 'exthemes_Search',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 2', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Search</b>', THEMES_NAMES ),
			'default'		=> 'Search',
			),
			array(
			'id'			=> 'exthemes_Searchresults',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 3', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Search results for:</b>', THEMES_NAMES ),
			'default'		=> 'Search results for:',
			),
			array(
			'id'			=> 'exthemes_File_not_founds',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 4', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">File not founds or File has been remove</b>', THEMES_NAMES ),
			'default'		=> 'File not founds or File has been remove',
			),
			array(
			'id'			=> 'exthemes_News',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 5', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">News</b>', THEMES_NAMES ),
			'default'		=> 'News',
			),
			array(
			'id'			=> 'exthemes_Useful_Sections',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 6', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Useful Sections</b>', THEMES_NAMES ),
			'default'		=> 'Useful Sections',
			),
			array(
			'id'			=> 'exthemes_About_Us',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 7', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">About Us</b>', THEMES_NAMES ),
			'default'		=> 'About Us',
			),
			array(
			'id'			=> 'exthemes_toc',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 8', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Explore this article</b>', THEMES_NAMES ),
			'default'		=> 'Explore this article',
			),
			
			array(
			'id'			=> 'info_apkz_options',
			'type'			=> 'info',
			'title'			=> __('THIS IS INFO FOR CHANGE LANGUAGE APK DETAILS', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('', THEMES_NAMES)
			),
			array(
			'id'			=> 'exthemes_NameAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Name</b>', THEMES_NAMES ),
			'default'		=> 'Name',
			),
			array(
			'id'			=> 'exthemes_PublisherAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 2', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Publisher</b>', THEMES_NAMES ),
			'default'		=> 'Publisher',
			),
			array(
			'id'			=> 'exthemes_GenreAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 3', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Genre</b>', THEMES_NAMES ),
			'default'		=> 'Genre',
			),
			array(
			'id'			=> 'exthemes_SizeAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 4', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Size</b>', THEMES_NAMES ),
			'default'		=> 'Size',
			),
			array(
			'id'			=> 'exthemes_VersionAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 5', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Version</b>', THEMES_NAMES ),
			'default'		=> 'Version',
			),
			array(
			'id'			=> 'exthemes_UpdateAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 6', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Update</b>', THEMES_NAMES ),
			'default'		=> 'Update',
			),
			array(
			'id'			=> 'exthemes_MODAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 7', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">MOD</b>', THEMES_NAMES ),
			'default'		=> 'MOD',
			),
			array(
			'id'			=> 'exthemes_GPSAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 8', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Get it On</b>', THEMES_NAMES ),
			'default'		=> 'Get it On',
			),
			array(
			'id'			=> 'exthemes_Whats_NewAPK',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 9', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">What\'s New</b>', THEMES_NAMES ),
			'default'		=> 'What\'s New',
			),
			array(
			'id'			=> 'exthemes_whats_mods',
			'type'			=> 'text',
			'title'			=> __( 'Title opt  ', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">What\'s Mod:</b>', THEMES_NAMES ),
			'default'		=> 'What\'s Mod: ',
			),
			array(
			'id'			=> 'exthemes_apk_info_1',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 10', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Read</b>', THEMES_NAMES ),
			'default'		=> 'Read',
			),
			array(
			'id'			=> 'exthemes_apk_info_2',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 11', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">views</b>', THEMES_NAMES ),
			'default'		=> 'views',
			),
			
			array(
			'id'			=> 'info_download_pages_options',
			'type'			=> 'info',
			'title'			=> __('THIS IS INFO FOR CHANGE LANGUAGE DOWNLOAD PAGES', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('', THEMES_NAMES)
			),
			array(
			'id'			=> 'exthemes_download_thanks',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Thank you for downloading</b>', THEMES_NAMES ),
			'default'		=> 'Thank you for downloading',
			),
			array(
			'id'			=> 'exthemes_download_site',
			'type'			=> 'textarea',
			'title'			=> __( 'Title opt 2', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">from our site. The following are available links. Just press the button and the file will be automatically downloaded</b>', THEMES_NAMES ),
			'default'		=> 'from our site. The following are available links. Just press the button and the file will be automatically downloaded',
			),
			array(
			'id'			=> 'exthemes_download_faqs',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 3', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Download FAQs</b>', THEMES_NAMES ),
			'default'		=> 'Download FAQs',
			),
			array(
			'id'			=> 'exthemes_download_times_notice_1',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 4', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Your link is almost ready, please wait a</b>', THEMES_NAMES ),
			'default'		=> 'Your link is almost ready, please wait a',
			),
			array(
			'id'			=> 'exthemes_download_times_notice_2',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 5', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">seconds</b>', THEMES_NAMES ),
			'default'		=> 'seconds',
			),
			array(
			'id'			=> 'exthemes_download_times_notice_3',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 6', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">If the download doesnt start in a few seconds</b>', THEMES_NAMES ),
			'default'		=> 'If the download doesnt start in a few seconds',
			),
			array(
			'id'			=> 'exthemes_download_times_notice_4',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 7', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">click here</b>', THEMES_NAMES ),
			'default'		=> 'click here',
			),
			array(
			'id'			=> 'exthemes_download_times_notice_5',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 8', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">You are downloading</b>', THEMES_NAMES ),
			'default'		=> 'You are downloading',
			),
			array(
			'id'			=> 'exthemes_download_times_notice_6',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 9', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">You are now ready to download</b>', THEMES_NAMES ),
			'default'		=> 'You are now ready to download',
			),
			array(
			'id'			=> 'exthemes_download_times_notice_7',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 10', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">for free. Here are some notes:</b>', THEMES_NAMES ),
			'default'		=> 'for free. Here are some notes:',
			),
			array(
			'id'			=> 'exthemes_download_original_apk',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 11', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Download Original APK</b>', THEMES_NAMES ),
			'default'		=> 'Download Original APK',
			),
			array(
			'id'			=> 'exthemes_Download',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 12', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Download</b>', THEMES_NAMES ),
			'default'		=> 'Download',
			), 
			array(
			'id'			=> 'info_comments_pages_options',
			'type'			=> 'info',
			'title'			=> __('THIS IS INFO FOR CHANGE LANGUAGE COMMENTS FORMS', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('', THEMES_NAMES)
			),
			array(
			'id'			=> 'exthemes_Comments',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Comments</b>', THEMES_NAMES ),
			'default'		=> 'Comments',
			),
			array(
			'id'			=> 'exthemes_comments_2',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 2', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Send Comment</b>', THEMES_NAMES ),
			'default'		=> 'Send Comment',
			),
			array(
			'id'			=> 'exthemes_comments_3',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 3', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Name</b>', THEMES_NAMES ),
			'default'		=> 'Name',
			),
			array(
			'id'			=> 'exthemes_comments_4',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 4', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Email</b>', THEMES_NAMES ),
			'default'		=> 'Email',
			),
			array(
			'id'			=> 'exthemes_comments_5',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 5', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Leave me a Comments</b>', THEMES_NAMES ),
			'default'		=> 'Leave me a Comments',
			), 
			array(
			'id'			=> 'info_lain_lain_options',
			'type'			=> 'info',
			'title'			=> __('THIS IS INFO FOR CHANGE OTHERS LANGUAGE ', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('', THEMES_NAMES)
			),
			array(
			'id'			=> 'text_latest_update',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Last updated on</b>', THEMES_NAMES ),
			'default'		=> 'Last updated on',
			),
			array(
			'id'			=> 'text_post_on',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Post on</b>', THEMES_NAMES ),
			'default'		=> 'Post on',
			),
			array(
			'id'			=> 'text_edit_post',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">edit me</b>', THEMES_NAMES ),
			'default'		=> 'edit me',
			),
			array(
			'id'			=> 'text_homes',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Home</b>', THEMES_NAMES ),
			'default'		=> 'Home',
			),
			array(
			'id'			=> 'text_gotop',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">UP</b>', THEMES_NAMES ),
			'default'		=> 'UP',
			),
			array(
			'id'			=> 'text_closed',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Close</b>', THEMES_NAMES ),
			'default'		=> 'Close',
			),
			array(
			'id'			=> 'text_clear',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Clear</b>', THEMES_NAMES ),
			'default'		=> 'Clear',
			),
			array(
			'id'			=> 'text_search_suggest',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Search Suggest</b>', THEMES_NAMES ),
			'default'		=> 'Search Suggest',
			),
			array(
			'id'			=> 'text_newest',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Newest</b>', THEMES_NAMES ),
			'default'		=> 'Newest',
			),
			array(
			'id'			=> 'text_oldest',
			'type'			=> 'text',
			'title'			=> __( 'Title opt 1', THEMES_NAMES ),
			'desc'			=> __( 'Default is <b style="color: crimson;">Oldest</b>', THEMES_NAMES ),
			'default'		=> 'Oldest',
			),
			
)
) );
