<?php
/**
 * DlproCoreBlogs class
 *
 * @class DlproCoreBlogs The class that holds the entire Salespro Core plugin
 * @package Idblog Core
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog Post Type Class
 *
 * @since 1.0.0
 */
class DlproCoreBlogs {
	/**
	 * Post Type.
	 *
	 * @var $post_type Post Type.
	 */
	private $post_type = 'blogs';

	/**
	 * Initializes the DlproCoreBlogs() class
	 *
	 * Checks for an existing DlproCoreBlogs() instance
	 * and if it doesn't find one, creates it.
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new DlproCoreBlogs();
			$instance->plugin_init();
		}

		return $instance;
	}

	/**
	 * Init Plugin
	 */
	public function plugin_init() {
		$this->file_includes();

		// custom post types and taxonomies.
		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'init', array( $this, 'register_taxonomy' ) );
	}

	/**
	 * Load the required files
	 *
	 * @return void
	 */
	public function file_includes() {
		include_once dirname( __FILE__ ) . '/includes/functions.php';
		include_once dirname( __FILE__ ) . '/widgets/search-blogs-widget.php';
		include_once dirname( __FILE__ ) . '/widgets/categories-blogs-widget.php';
		include_once dirname( __FILE__ ) . '/widgets/recent-blogs-widget.php';
	}

	/**
	 * Register the post type
	 *
	 * @return void
	 */
	public function register_post_type() {

		$labels = array(
			'name'               => _x( 'Blogs', 'Post Type General Name', 'dlpro-core' ),
			'singular_name'      => _x( 'Blog', 'Post Type Singular Name', 'dlpro-core' ),
			'menu_name'          => __( 'Blog', 'dlpro-core' ),
			'parent_item_colon'  => __( 'Parent Blog', 'dlpro-core' ),
			'all_items'          => __( 'All Blogs', 'dlpro-core' ),
			'view_item'          => __( 'View Blog', 'dlpro-core' ),
			'add_new_item'       => __( 'Add Blog', 'dlpro-core' ),
			'add_new'            => __( 'Add New', 'dlpro-core' ),
			'edit_item'          => __( 'Edit Blog', 'dlpro-core' ),
			'update_item'        => __( 'Update Blog', 'dlpro-core' ),
			'search_items'       => __( 'Search Blog', 'dlpro-core' ),
			'not_found'          => __( 'Not blog found', 'dlpro-core' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'dlpro-core' ),
		);

		$rewrite = array(
			'slug'       => 'blog',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		);

		$args = array(
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'show_in_rest'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-portfolio',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => $rewrite,
		);

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register doc tags taxonomy
	 *
	 * @return void
	 */
	public function register_taxonomy() {

		// Add new taxonomy, make it hierarchical (like categories).
		$labels = array(
			'name'              => _x( 'Blog Categories', 'taxonomy general name', 'dlpro-core' ),
			'singular_name'     => _x( 'Blog Category', 'taxonomy singular name', 'dlpro-core' ),
			'search_items'      => __( 'Search Blog Categories', 'dlpro-core' ),
			'all_items'         => __( 'All Blog Categories', 'dlpro-core' ),
			'parent_item'       => __( 'Parent Blog Category', 'dlpro-core' ),
			'parent_item_colon' => __( 'Parent Blog Category:', 'dlpro-core' ),
			'edit_item'         => __( 'Edit Blog Category', 'dlpro-core' ),
			'update_item'       => __( 'Update Blog Category', 'dlpro-core' ),
			'add_new_item'      => __( 'Add New Blog Category', 'dlpro-core' ),
			'new_item_name'     => __( 'New Blog Category Name', 'dlpro-core' ),
			'menu_name'         => __( 'Blog Categories', 'dlpro-core' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'blog-category' ),
		);

		register_taxonomy( 'blog_category', array( 'blogs' ), $args );

		$labels = array(
			'name'                       => _x( 'Blog Tags', 'Taxonomy General Name', 'dlpro-core' ),
			'singular_name'              => _x( 'Blog Tag', 'Taxonomy Singular Name', 'dlpro-core' ),
			'menu_name'                  => __( 'Blog Tags', 'dlpro-core' ),
			'all_items'                  => __( 'All Blog Tags', 'dlpro-core' ),
			'parent_item'                => __( 'Parent Blog Tag', 'dlpro-core' ),
			'parent_item_colon'          => __( 'Parent Blog Tag:', 'dlpro-core' ),
			'new_item_name'              => __( 'New Tag Blog Tag', 'dlpro-core' ),
			'add_new_item'               => __( 'Add New Item', 'dlpro-core' ),
			'edit_item'                  => __( 'Edit Blog Tag', 'dlpro-core' ),
			'update_item'                => __( 'Update Blog Tag', 'dlpro-core' ),
			'view_item'                  => __( 'View Blog Tag', 'dlpro-core' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'dlpro-core' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'dlpro-core' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'dlpro-core' ),
			'popular_items'              => __( 'Popular Blog Tags', 'dlpro-core' ),
			'search_items'               => __( 'Search Blog Tags', 'dlpro-core' ),
			'not_found'                  => __( 'Not Found', 'dlpro-core' ),
			'no_terms'                   => __( 'No items', 'dlpro-core' ),
			'items_list'                 => __( 'Blog Tags list', 'dlpro-core' ),
			'items_list_navigation'      => __( 'Blog Tags list navigation', 'dlpro-core' ),
		);

		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'blog-tag' ),
		);
		register_taxonomy( 'blog_tag', array( 'blogs' ), $args );
	}
} // DlproCoreBlogs

/**
 * Initialize the plugin
 *
 * @return \DlproCoreBlogs
 */
function dlprocore_func() {
	return DlproCoreBlogs::init();
}

// kick it off.
dlprocore_func();
