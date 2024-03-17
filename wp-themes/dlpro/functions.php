<?php
/**
 * Dlpro functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( '_DLPRO_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_DLPRO_VERSION', '1.0.6' );
}

if ( ! function_exists( 'gmr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since v.1.0.0
	 */
	function gmr_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Dlpro, use a find and replace
		 * to change 'dlpro' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dlpro', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * See https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'   => esc_html__( 'Primary', 'dlpro' ),
				'secondary' => esc_html__( 'Secondary', 'dlpro' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * RECOMMENDED: No reference to add_editor_style()
		 * Not usefull in theme, just pass theme checker plugin
		 */
		add_editor_style( 'editor-style.css' );

		/* Add hardcrop in medium and large image */
		add_image_size( 'medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );
		add_image_size( 'large', get_option( 'large_size_w' ), get_option( 'large_size_h' ), true );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'dlpro_custom_background_args',
				array(
					'default-color' => 'eeeeee',
					'default-image' => '',
				)
			)
		);

		// Enable the use of shortcodes in text widgets.
		add_filter( 'widget_text', 'do_shortcode' );

		/**
		 * Sample implementation of the Custom Header feature.
		 *
		 * You can add an optional custom header image to header.php like so ...
		 *
			<?php if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
			</a>
			<?php endif; // End header image check. ?>
		 *
		 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
		 *
		 * @since v.1.0.0
		 */

		add_theme_support(
			'custom-header',
			apply_filters(
				'dlpro_custom_header_args',
				array(
					'width'       => 1400,
					'height'      => 180,
					'flex-height' => true,
					'flex-width'  => true,
					'uploads'     => true,
					'header-text' => false,
				)
			)
		);
		
		// Remove Gutenberg support in Widget for wp 5.8
		remove_theme_support( 'widgets-block-editor' );
	}
endif; // endif gmr_setup.
add_action( 'after_setup_theme', 'gmr_setup' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Add body open for require wp 5.5
	 *
	 * @since v.1.0.0
	 */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Register query_vars link
 *
 * @since v.1.0.2
 */
add_action( 'init', 'dlpro_link_query_vars' );
function dlpro_link_query_vars() { 
    global $wp; 
    $wp->add_query_var( 'link' ); 
}

if ( ! function_exists( 'gmr_width_size_image' ) ) :
	/**
	 * Improve performance, it's mean, only when switch theme this functions is active.
	 *
	 * @since v.1.0.2
	 */
	function gmr_width_size_image() {
		// Thumbnail Size Thumbnail.
		update_option( 'thumbnail_size_w', 32 );
		update_option( 'thumbnail_size_h', 32 );
		// force hard crop medium size thumbnail.
		update_option( 'thumbnail_crop', 1 );

		// Medium Size Thumbnail.
		update_option( 'medium_size_w', 90 );
		update_option( 'medium_size_h', 90 );
		// force hard crop medium size thumbnail.
		update_option( 'medium_crop', '1' );

		// Large Size Thumbnail.
		update_option( 'large_size_w', 200 );
		update_option( 'large_size_h', 125 );
		// force hard crop large size thumbnail.
		update_option( 'large_crop', '1' );
	}
endif; // endif gmr_width_size_image.
add_action( 'after_switch_theme', 'gmr_width_size_image' );

if ( ! function_exists( 'gmr_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @since v.1.0.0
	 *
	 * @global int $content_width
	 */
	function gmr_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'gmr_content_width', 660 );
	}
endif; // endif gmr_content_width.
add_action( 'after_setup_theme', 'gmr_content_width', 0 );

if ( ! function_exists( 'gmr_widgets_init' ) ) :
	/**
	 * Register widget area.
	 *
	 * @since v.1.0.0
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function gmr_widgets_init() {
		// Sidebar widget areas.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'dlpro' ),
				'id'            => 'sidebar-left',
				'description'   => esc_html__( 'Add widgets here.', 'dlpro' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		// Sidebar widget areas.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'dlpro' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'dlpro' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		// Home widget areas.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home top left', 'dlpro' ),
				'id'            => 'home-1',
				'description'   => esc_html__( 'Add widgets here.', 'dlpro' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		// Home widget areas.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home top right', 'dlpro' ),
				'id'            => 'home-2',
				'description'   => esc_html__( 'Add widgets here.', 'dlpro' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		// Download widget areas.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Download 1 widget', 'dlpro' ),
				'id'            => 'download-1',
				'description'   => esc_html__( 'Add widgets here.', 'dlpro' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Download 2 widget', 'dlpro' ),
				'id'            => 'download-2',
				'description'   => esc_html__( 'Add widgets here.', 'dlpro' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Download bottom widget', 'dlpro' ),
				'id'            => 'download-3',
				'description'   => esc_html__( 'Add widgets here.', 'dlpro' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		// Footer widget areas.
		$mod = get_theme_mod( 'gmr_footer_column', '4' );

		for ( $i = 1; $i <= $mod; $i++ ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer ', 'dlpro' ) . $i,
					'id'            => 'footer-' . $i,
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}

	}
endif; // endif gmr_widgets_init.
add_action( 'widgets_init', 'gmr_widgets_init' );

if ( ! function_exists( 'gmr_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function gmr_scripts() {
		global $is_IE;

		// Font options.
		$fonts    = array(
			get_theme_mod( 'gmr_primary-font', customizer_library_get_default( 'gmr_primary-font' ) ),
			get_theme_mod( 'gmr_secondary-font', customizer_library_get_default( 'gmr_secondary-font' ) ),
		);
		$font_uri = customizer_library_get_google_font_uri( $fonts );

		// Load Google Fonts.
		wp_enqueue_style( 'dlpro-fonts', $font_uri, array(), _DLPRO_VERSION, 'all' );

		// Call if only woocommerce actived.
		if ( class_exists( 'WooCommerce' ) ) {
			// Custom Woocommerce CSS.
			wp_enqueue_style( 'dlpro-woocommerce', get_template_directory_uri() . '/css/woocommerce.css', array(), _DLPRO_VERSION );
		}

		// Add stylesheet.
		wp_enqueue_style( 'dlpro-style', get_stylesheet_uri(), array(), _DLPRO_VERSION );
		
		if ( is_rtl() ) {
			wp_enqueue_style( 'dlpro-rtl-style', get_template_directory_uri() . '/style-rtl.css', array(), _DLPRO_VERSION );
		}

		// Custom script.
		wp_enqueue_script( 'dlpro-customscript', get_template_directory_uri() . '/js/customscript.js', array(), _DLPRO_VERSION, true );
		
		/* Sticky menu */
		$sticky_menu = get_theme_mod( 'gmr_sticky_menu', 'sticky' );
		if ( 'sticky' === $sticky_menu ) {
			/* theia-sticky-sidebar Jquery */
			wp_enqueue_script( 'dlpro-sticky-menu', get_template_directory_uri() . '/js/stickymenu.js', array(), _DLPRO_VERSION, true );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif; // endif gmr_scripts.
add_action( 'wp_enqueue_scripts', 'gmr_scripts' );

/**
 * Custom template tags for this theme.
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom Breadcrumb.
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Custom For Faster Load.
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/faster.php';

/**
 * Custom banner.
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/banner.php';

/**
 * Customizer additions.
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/customizer-library/customizer-library.php';
/* Custom options customizer */
require get_template_directory() . '/inc/customizer-library/gmrtheme-customizer.php';

/**
 * Load module.
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/module.php';

/**
 * Load Jetpack compatibility file.
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Call only if woocommerce actived
 *
 * @since v.1.0.0
 */
if ( class_exists( 'WooCommerce' ) ) {
	/**
	 * Load Woocommerce compatibility file.
	 *
	 * @since v.1.0.0
	 */
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Call only if Rate_My_Post actived
 *
 * @since v.1.0.0
 */
if ( class_exists( 'Rate_My_Post' ) ) {
	/**
	 * Load Rate_My_Post compatibility file.
	 *
	 * @since v.1.0.0
	 */
	require get_template_directory() . '/inc/ratingfilter.php';
	require get_template_directory() . '/inc/widgets/rate-my-post-top-rated-widget.php';
}

if ( class_exists( 'bbPress' ) ) {
	/**
	 * Load BBpress function
	 *
	 * @since v.1.0.0
	 */
	require get_template_directory() . '/inc/bbpress.php';
}

/**
 * Load All Widget
 *
 * @since v.1.0.0
 */
require get_template_directory() . '/inc/widgets/feedburner-widget.php';
require get_template_directory() . '/inc/widgets/custom-form-widget.php';
require get_template_directory() . '/inc/widgets/recent-posts-widget.php';

/*
 * class_exists on plugin working if using plugins_loaded filter
 * Most view widget exist if wp postview plugin installed
 */
if ( class_exists( 'WP_Widget_PostViews' ) ) {
	require get_template_directory() . '/inc/widgets/mostview-posts-widget.php';
}

if ( is_admin() ) {

	/**
	 * Include the TGM_Plugin_Activation class.
	 *
	 * Depending on your implementation, you may want to change the include call:
	 *
	 * Parent Theme:
	 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
	 *
	 * Child Theme:
	 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
	 *
	 * Plugin:
	 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
	 *
	 * @since v.1.0.0
	 */
	require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

	add_action( 'tgmpa_register', 'dlpro_register_required_plugins' );

	/**
	 * Register the required plugins for this theme.
	 *
	 * In this example, we register five plugins:
	 * - one included with the TGMPA library
	 * - two from an external source, one from an arbitrary source, one from a GitHub repository
	 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
	 *
	 * The variables passed to the `tgmpa()` function should be:
	 * - an array of plugin arrays;
	 * - optionally a configuration array.
	 * If you are not changing anything in the configuration array, you can remove the array and remove the
	 * variable from the function call: `tgmpa( $plugins );`.
	 * In that case, the TGMPA default settings will be used.
	 *
	 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10
	 *
	 * @since v.1.0.0
	 */
	function dlpro_register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
			// This is an include a plugin bundled with a theme.
			array(
				'name'     => 'Dlpro Core', // The plugin name.
				'slug'     => 'dlpro-core', // The plugin slug (typically the folder name).
				'source'   => get_template_directory() . '/plugins/dlpro-core.zip', // The plugin source.
				'required' => true, // If false, the plugin is only 'recommended' instead of required.
			),

			// Include One Click Demo Import from the WordPress Plugin Repository.
			array(
				'name'     => 'One Click Demo Import',
				'slug'     => 'one-click-demo-import',
				'required' => true,
			),
			
			// This is an include a plugin bundled with a theme.
			array(
				'name'     => 'Rate My Posts', // The plugin name.
				'slug'     => 'rate-my-post',
				'required' => true,
			),

			// This is an include a plugin bundled with a theme.
			array(
				'name'     => 'WP PostViews', // The plugin name.
				'slug'     => 'wp-postviews',
				'required' => false,
			),

			// This is an include a plugin bundled with a theme.
			array(
				'name'     => 'Icons Menu', // The plugin name.
				'slug'     => 'menu-icons',
				'required' => false,
			),

		);

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 */
		$config = array(
			'id'           => 'dlpro',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}

	/**
	 * Add metabox to post or page
	 *
	 * @since v.1.0.0
	 */
	require get_template_directory() . '/inc/metabox.php';

	/**
	 * Load Theme Update Checker.
	 *
	 * @since v.1.0.1
	 */
	require get_template_directory() . '/inc/theme-update-checker.php';

	/**
	 * Call only if One Click Demo Import actived
	 *
	 * @since v.1.0.0
	 */
	if ( class_exists( 'OCDI_Plugin' ) ) {
		/**
		 * Load One Click Demo Import
		 *
		 * @since v.1.0.0
		 */
		require get_template_directory() . '/inc/importer.php';
	}
}
/*
 * for plugin broken link checker *
function deteksilinkdownload( $content ) {

		global $post;
		$downloads = get_post_meta( $post->ID, 'dlpro_dlbutton_item', true );
		if ( ! empty( $downloads ) ) {
			$custom_content = '';
			foreach ( $downloads as $key => $download ) {
				if ( ! empty( $download['dlpro_dlbutton_item_url'] ) ) {
					$custom_content .= '<a href="' . esc_url( $download['dlpro_dlbutton_item_url'] ) . '">konten</a>';
				}
			}
			$custom_content .= $content;
			return $custom_content;
		}

}
add_filter( 'blc-parser-html-link-content', 'deteksilinkdownload' ); */
