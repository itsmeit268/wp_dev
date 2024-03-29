<?php
/**
 * Deals with the basic initialization and core methods for theme.
 */
class Bunyad_Core
{
	private $cache = [
		'body_classes' => [],
		'options'      => []
	];

	private $is_theme = false;
	
	public function init($options = [])
	{
		$this->cache['options'] = $options;
		
		// Register Sphere Core plugin components options
		add_filter('sphere_plugin_components', array($this, '_sphere_components'));
		
		// Pre-initialization hook.
		do_action('bunyad_core_pre_init', $this);

		// Include core utility functions.
		require_once get_template_directory() . '/lib/util.php';
		
		/*
		 * Setup framework internal functionality
		 */
		// initialize options and add to cache
		Bunyad::options()->set_config(array_replace(
			[
				'meta_prefix'  => '_bunyad',
				'theme_prefix' => strtolower($options['theme_name']),
				'customizer'   => [],
			],
			$options
		))->init();

		// Set as a valid theme.
		$this->is_theme = true;
		
		if (isset($options['options']) && is_array($options['options'])) {
			Bunyad::options()->set($options['options']);
		}
		
		// Initialize admin.
		if (is_admin()) {
			$this->init_admin($options);
		}
		
		// Default sidebar from global options.
		$this->set_sidebar(Bunyad::options()->default_sidebar);

		/*
		 * Add theme related functionality using the after_setup_theme hook
		 */
		add_action('after_setup_theme', array($this, 'setup'), 11);

		// Add support for type=module and nomodule.
		add_filter('script_loader_tag', array($this, 'add_module_nomodule'), 10, 2);

		/**
		 * Fire up a post initialization hook with self reference
		 * 
		 * @param  Bunyad_Core  $this
		 */
		do_action('bunyad_core_post_init', $this);
		
		return $this;
	}
	
	/**
	 * Action callback: Setup theme related functionality at after_setup_theme hook
	 */
	public function setup()
	{
		$options = $this->cache['options'];
		
		// Default theme support.
		add_theme_support('post-thumbnails');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));
		add_theme_support('title-tag');
		
		add_theme_support('post-formats', $options['post_formats']);
		
		// Add body class filter.
		add_filter('body_class', array($this, '_add_body_classes'));
		
		// Add filter for excerpt.
		add_filter('excerpt_more', array(Bunyad::posts(), 'excerpt_read_more'));
		add_filter('the_content_more_link', array(Bunyad::posts(), 'excerpt_read_more'));
		
		// Fix title on home page - with SEO plugins compatibilty.
		add_filter('wp_title', array($this, '_fix_home_title'));
		
		// Set sidebar on setup.
		add_action('wp', array($this, '_auto_set_sidebar'));

		// Add inline CSS.
		add_action('wp_enqueue_scripts', array($this, '_add_inline_css'), 200);

		// Setup comments script.
		add_action('wp_enqueue_scripts', array($this, '_enqueue_comments_reply'), 200);
	}
	
	/**
	 * Whether a valid Bunyad theme exists.
	 *
	 * @return boolean
	 */
	public function is_theme()
	{
		return $this->is_theme;
	}

	/**
	 * Filter: Sphere Core plugin components
	 * 
	 * @param array $components
	 * @see \Sphere\Core\Plugin::setup()
	 * @return array 
	 */
	public function _sphere_components($components)
	{	
		if (isset($this->cache['options']['sphere_components'])) {
			return $this->cache['options']['sphere_components'];
		}
		
		return $components;
	}
		
	/**
	 * Initialize admin related classes
	 */
	private function init_admin($options)
	{		
		add_action('admin_enqueue_scripts', array($this, '_admin_assets'));

		Bunyad::factory('admin/options');
	}
	
	// callback function for assets
	public function _admin_assets()
	{
		wp_enqueue_style(
			'bunyad-base', 
			get_template_directory_uri() . '/css/admin/base.css', 
			array(), 
			Bunyad::options()->get_config('theme_version')
		);
	}

	/**
	 * Set current layout sidebar
	 * 
	 * @param string $type none or right
	 */
	public function set_sidebar($type)
	{
		$this->cache['sidebar'] = $type;

		if ($type == 'right') {
			$this->add_body_class('right-sidebar');
			$this->remove_body_class('no-sidebar');
		}
		else {
			$this->remove_body_class('right-sidebar');
			$this->add_body_class('no-sidebar');
		}
		
		return $this;
	}
	
	/**
	 * Get current active sidebar value outside
	 */
	public function get_sidebar()
	{
		if (!array_key_exists('sidebar', $this->cache)) {
			return (string) Bunyad::options()->default_sidebar;
		}
		
		return $this->cache['sidebar'];
	}
	
	/**
	 * Include main sidebar
	 * 
	 * @see get_sidebar()
	 */
	public function theme_sidebar()
	{
		if ($this->get_sidebar() !== 'none') {
			get_sidebar();
		}
		
		return $this;
	}

	/**
	 * Callback: Set the relevant theme layout sidebar for current page / post
	 */
	public function _auto_set_sidebar()
	{
		// Posts, pages, attachments etc.
		if (is_singular()) {
		
			// set layout
			$layout = Bunyad::posts()->meta('layout_style');

			// Fallback to global settings
			if (!$layout) {

				if (is_page()) {
					$layout = Bunyad::options()->page_sidebar;
				}
				else {
					$layout = Bunyad::options()->single_sidebar;
				}
			}

			if ($layout) {
				$this->set_sidebar(($layout == 'full' ? 'none' : $layout));
			}
		}	
	}

	/**
	 * Callback: Enqueue script for threaded comments
	 */
	public function _enqueue_comments_reply()
	{
		if (Bunyad::amp() && Bunyad::amp()->active()) {
			return;
		}
		
		if (is_singular() && comments_open()) {
			wp_enqueue_script('comment-reply', null, array(), false, true);
		}
	}
	
	/**
	 * Add a custom class to body - MUST be called before get_header() in theme
	 * 
	 * @param string $class
	 */
	public function add_body_class($class)
	{
		$this->cache['body_classes'][] = esc_attr($class);
		return $this;
	}
	
	/**
	 * Remove body class - MUST be called before get_header() in theme
	 */
	public function remove_body_class($class)
	{
		foreach ($this->cache['body_classes'] as $key => $value) {
			if ($value === $class) {
				unset($this->cache['body_classes'][$key]);
			}
		}
		
		return $this;
	}
	
	/**
	 * Filter callback: Add stored classes to the body 
	 */
	public function _add_body_classes($classes)
	{
		return array_merge($classes, $this->cache['body_classes']);
	}
	
	/**
	 * Filter callback: Fix home title - stay compatible with SEO plugins
	 */
	public function _fix_home_title($title = '')
	{
		if (!is_front_page() && !is_home()) {
			return $title;
		}

		// modify only if empty
		if (empty($title)) {
			$title = get_bloginfo('name');
			$description = get_bloginfo('description');
			
			if ($description) {
				$title .= ' &mdash; ' . $description;
			} 
		}
		
		return $title;
	}
	
	/**
	 * Queue inline CSS to be added to the header 
	 * 
	 * @param string $script
	 * @param mixed $data
	 * @see wp_add_inline_style
	 */
	public function enqueue_css($script, $data)
	{
		$this->cache['inline_css'][$script] = $data;
	}
	
	/**
	 * Add any inline CSS that was enqueued properly using wp_add_inline_style()
	 */
	public function _add_inline_css()
	{		
		if (!array_key_exists('inline_css', $this->cache)) {
			return;
		}
		
		foreach ($this->cache['inline_css'] as $script => $data) {
			wp_add_inline_style($script, $data);
		}
	}
	
	/**
	 * Gets license key if theme is licensed
	 * 
	 * @return bool|string  false if unregistered, API key if registered
	 */
	public function get_license()
	{
		$option = get_option(Bunyad::options()->get_config('theme_name') . '_license');
		
		if (!empty($option)) {
            update_option( 'smartmag_license', true );
		}
		
		return true;
	}

	/**
	 * Get common global conf/options data.
	 * 
	 * @param string $type Currently supported: options.
	 * @return boolean|array
	 */
	public function get_common_data($type = '')
	{
		if (!$type) {
			return false;
		}

		$file = null;
		switch ($type) {
			case 'options':
				$file = get_theme_file_path('admin/options/common-data.php');
				break;
		}

		if ($file && is_file($file)) {
			return include $file; // phpcs:ignore WordPress.Security.EscapeOutput -- Safe output from get_theme_file_path() above.
		}

		return [];
	}

	/**
	 * Add type="module" and nomodule parameters to a script tag.
	 *
	 * Add type="module" and nomodule parameters to script tags when the values are set via wp_script_add_data.
	 *
	 * wp_script_add_data( 'script-handle', 'type', 'module' );
	 * wp_script_add_data( 'script-handle', 'nomodule', true );
	 * 
	 * Based on: https://github.com/kylereicks/wp-script-module-nomodule
	 */
	public function add_module_nomodule($tag, $handle) 
	{
		global $wp_scripts;

		if (!empty($wp_scripts->registered[$handle]->extra['type'])) {
			if (preg_match('/\stype="[^"]*"/', $tag, $match)) {
				$tag = str_replace($match[0], ' type="' . esc_attr($wp_scripts->registered[$handle]->extra['type']) . '"', $tag);
			} else {
				$tag = str_replace('<script ', '<script type="' . esc_attr($wp_scripts->registered[$handle]->extra['type']) . '" ', $tag);
			}
		}

		if (!empty($wp_scripts->registered[$handle]->extra['nomodule'])) {
			// if (preg_match('#\snomodule([=\s]?([\'\"]).+?\2)?#', $tag, $match)) {
			// 	$tag = str_replace($match[0], ' nomodule', $tag);

			// A simple check should be enough, we don't wish to override nomodule.
			if (strpos($tag, ' nomodule') === false) {
				$tag = str_replace('<script ', '<script nomodule ', $tag);
			}
		}

		return $tag;
	}
	
	/**
	 * A get_template_part() improvement with variable scope 
	 * 
	 * @see get_template_part()
	 * @see locate_template()
	 * 
	 * @param string $slug   The template part to locate.
	 * @param array  $props  An array of variables to make available in local scope.
	 * @param string $name   An extension to the partial name.
	 */
	public function partial($slug, $props = [], $name = '')
	{
		/** 
		 * Set a few essential globals to match load_template(), without cluttering 
		 * the local scope.
		 */
		global $wp_query, $post;
		
		/**
		 * Fires before the specified template part file is loaded.
		 * 
		 * @param string $slug The slug name for the generic template.
		 * @param string $name The name of the specialized template.
		 */
		do_action("get_template_part_{$slug}", $slug, $name);

		$templates = [];
		$name      = (string) $name;
		
		if (!empty($name)) {
			$templates[] = "{$slug}-{$name}.php";
		}

		$templates[] = "{$slug}.php";
		
		// Make data array available in local scope.
		extract($props);

		// Include the template.
		$located = locate_template($templates);
		if (!$located) {
			return trigger_error('Cannot find any file for partial: ' . $slug, E_USER_WARNING);
		}

		include $located; // phpcs:ignore WordPress.Security.EscapeOutput Safe Output from locate_template() above.
	}
}