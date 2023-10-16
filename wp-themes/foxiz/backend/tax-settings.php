<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'foxiz_get_category_config' ) ) {
	function foxiz_get_category_config() {

		return [
			'title'      => esc_html__( 'Foxiz Category Settings', 'foxiz' ),
			'info'       => esc_html__( 'The settings will apply to this category only, and the ones below will take priority over other settings in the "Theme Options > Category" settings', 'foxiz' ),
			'taxonomies' => [ 'category' ],
			'id'         => 'foxiz_category_meta',
			'tabs'       => [
				[
					'title' => esc_html__( 'Entry Category', 'foxiz' ),
					'id'    => 'entry-category',
					'icon'  => 'dashicons-art',
				],
				[
					'title' => esc_html__( 'Category Header', 'foxiz' ),
					'id'    => 'category-header',
					'icon'  => 'dashicons-editor-justify',
				],
				[
					'title' => esc_html__( 'Top Section', 'foxiz' ),
					'id'    => 'top-section',
					'icon'  => 'dashicons-arrow-up-alt',
				],
				[
					'title' => esc_html__( 'Global Template', 'foxiz' ),
					'id'    => 'global-template',
					'icon'  => 'dashicons-admin-site',
				],
				[
					'title' => esc_html__( 'Predefined Blog', 'foxiz' ),
					'id'    => 'default-blog',
					'icon'  => 'dashicons-text-page',
				],
				[
					'title' => esc_html__( 'Site Header', 'foxiz' ),
					'id'    => 'site-header',
					'icon'  => 'dashicons-heading',
				],
				[
					'title' => esc_html__( 'Queries', 'foxiz' ),
					'id'    => 'query',
					'icon'  => 'dashicons-database',
				],
				[
					'title' => esc_html__( 'Single Post Template', 'foxiz' ),
					'id'    => 'post-template',
					'icon'  => 'dashicons-format-aside',
				],
			],
			'fields'     => [
				[
					'id'   => 'highlight_color',
					'name' => esc_html__( 'Highlight Color', 'foxiz' ),
					'desc' => esc_html__( 'Select a highlight color for the entry category.', 'foxiz' ),
					'info' => esc_html__( 'This setting will apply to entry category in the the blog listing.', 'foxiz' ),
					'tab'  => 'entry-category',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'color',
					'name' => esc_html__( 'Accent Color', 'foxiz' ),
					'desc' => esc_html__( 'Select an accent (text) color for the entry category.', 'foxiz' ),
					'info' => esc_html__( 'This setting will apply to entry category text.', 'foxiz' ),
					'tab'  => 'entry-category',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'dark_highlight_color',
					'name' => esc_html__( 'Dark Mode - Highlight Color', 'foxiz' ),
					'desc' => esc_html__( 'Select a highlight color in dark mode.', 'foxiz' ),
					'tab'  => 'entry-category',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'dark_color',
					'name' => esc_html__( 'Dark Mode - Accent Color', 'foxiz' ),
					'desc' => esc_html__( 'Select an accent (text) color in dark mode.', 'foxiz' ),
					'tab'  => 'entry-category',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'      => 'header_style',
					'name'    => esc_html__( 'Site Header', 'foxiz' ),
					'desc'    => esc_html__( 'Select a site header for this category.', 'foxiz' ),
					'tab'     => 'site-header',
					'type'    => 'select',
					'options' => foxiz_config_header_style( true, true ),
					'std'     => '0',
				],
				[
					'id'          => 'header_template',
					'name'        => esc_html__( 'Template Shortcode', 'foxiz' ),
					'desc'        => esc_html__( 'Input a Ruby Template shortcode for displaying as the website header for this category.', 'foxiz' ),
					'info'        => esc_html__( 'This setting will override on the "Site Header" setting.', 'foxiz' ),
					'tab'         => 'site-header',
					'type'        => 'textarea',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'rows'        => '2',
					'std'         => '',
				],
				[
					'id'      => 'category_header',
					'name'    => esc_html__( 'Category Header', 'foxiz' ),
					'desc'    => esc_html__( 'Select a category header style.', 'foxiz' ),
					'tab'     => 'category-header',
					'type'    => 'select',
					'options' => foxiz_config_category_header( true ),
					'std'     => '0',
				],
				[
					'id'   => 'featured_image',
					'name' => esc_html__( 'Featured Images', 'foxiz' ),
					'desc' => esc_html__( 'Upload featured images for this category.', 'foxiz' ),
					'info' => esc_html__( 'You can set 1 or 2 feature images for a category.', 'foxiz' ),
					'tab'  => 'category-header',
					'type' => 'image',
				],
				[
					'id'      => 'pattern',
					'name'    => esc_html__( 'Background Pattern', 'foxiz' ),
					'desc'    => esc_html__( 'Select a pattern style for the header background.', 'foxiz' ),
					'tab'     => 'category-header',
					'type'    => 'select',
					'options' => foxiz_config_archive_header_bg( true ),
					'std'     => '0',
				],
				[
					'id'      => 'breadcrumb',
					'name'    => esc_html__( 'Breadcrumb', 'foxiz' ),
					'desc'    => esc_html__( 'Enable or disable the breadcrumb in this category header.', 'foxiz' ),
					'tab'     => 'category-header',
					'type'    => 'select',
					'options' => [
						'0'  => esc_html__( '- Default -', 'foxiz' ),
						'1'  => esc_html__( 'Use Global Setting', 'foxiz' ),
						'-1' => esc_html__( 'Disable', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'      => 'subcategory',
					'name'    => esc_html__( 'Sub Categories List', 'foxiz' ),
					'desc'    => esc_html__( 'Enable or disable the sub category list in this category header.', 'foxiz' ),
					'tab'     => 'category-header',
					'type'    => 'select',
					'options' => [
						'0'  => esc_html__( '- Default -', 'foxiz' ),
						'1'  => esc_html__( 'Enable', 'foxiz' ),
						'-1' => esc_html__( 'Disable', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'          => 'template',
					'name'        => esc_html__( 'Template Shortcode', 'foxiz' ),
					'desc'        => esc_html__( 'Input a "Ruby Template" shortcode to display at the top of the blog listing.', 'foxiz' ),
					'info'        => esc_html__( 'It will display under the category header, e.g. [Ruby_E_Template id="1"]', 'foxiz' ),
					'tab'         => 'top-section',
					'type'        => 'textarea',
					'rows'        => '2',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'std'         => '',
				],
				[
					'id'      => 'template_display',
					'name'    => esc_html__( 'Display Condition', 'foxiz' ),
					'desc'    => esc_html__( 'Show template in the first page or in all pages.', 'foxiz' ),
					'tab'     => 'top-section',
					'type'    => 'select',
					'options' => [
						'0' => esc_html__( '- Default -', 'foxiz' ),
						'1' => esc_html__( 'Show in the first page', 'foxiz' ),
						'2' => esc_html__( 'Show in all pages', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'          => 'template_global',
					'name'        => esc_html__( 'Global WP Query Template Shortcode', 'foxiz' ),
					'desc'        => esc_html__( 'Input a "Ruby Template" shortcode to make it as the main blog listing.', 'foxiz' ),
					'info'        => esc_html__( 'Build the main blog listing by Ruby Template.', 'foxiz' ),
					'tab'         => 'global-template',
					'type'        => 'textarea',
					'rows'        => '2',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'std'         => '',
				],
				[
					'id'      => 'posts_per_page',
					'name'    => esc_html__( 'Posts per Page', 'foxiz' ),
					'desc'    => esc_html__( 'Input posts per page for this category.', 'foxiz' ),
					'info'    => esc_html__( 'This setting will also apply to the Global WP Query Template.', 'foxiz' ),
					'tab'     => 'query',
					'type'    => 'text',
					'classes' => 'small',
					'std'     => '',
				],
				[
					'id'          => 'tag_not_in',
					'name'        => esc_html__( 'Exclude Tags Slug', 'foxiz' ),
					'desc'        => esc_html__( 'Remove posts with these tags from the global blog query', 'foxiz' ),
					'info'        => esc_html__( 'Input tag slugs, Separated by commas.', 'foxiz' ),
					'placeholder' => 'tag1,tag2,tag3',
					'tab'         => 'query',
					'type'        => 'text',
					'std'         => '',
				],
				[
					'id'   => 'blog_info',
					'name' => esc_html__( 'Blog - Heading', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'          => 'blog_heading',
					'name'        => esc_html__( 'Heading', 'foxiz' ),
					'desc'        => esc_html__( 'Input a heading for the post listing.', 'foxiz' ),
					'info'        => esc_html__( 'Allow the {category} dynamic tag. Refer the documentation for further information.', 'foxiz' ),
					'placeholder' => esc_html__( 'Latest {category} News', 'foxiz' ),
					'tab'         => 'default-blog',
					'type'        => 'text',
					'std'         => '',
				],
				[
					'id'      => 'blog_heading_layout',
					'name'    => esc_html__( 'Heading Layout', 'foxiz' ),
					'desc'    => esc_html__( 'Select a heading layout for the heading.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_heading_layout( true ),
					'std'     => '',
				],
				[
					'id'      => 'blog_heading_tag',
					'name'    => esc_html__( 'Heading HTML Tag', 'foxiz' ),
					'desc'    => esc_html__( 'Select a HTML tag for this heading.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_heading_tag(),
					'std'     => '',
				],
				[
					'id'      => 'blog_heading_size',
					'name'    => esc_html__( 'Heading Font Size (Desktop)', 'foxiz' ),
					'desc'    => esc_html__( 'Input a custom font size value for this heading (in pixels) on the desktop.', 'foxiz' ),
					'info'    => esc_html__( 'Navigate to "Theme Options > Heading Design" for more settings.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'text',
					'classes' => 'small',
					'std'     => '',
				],
				[
					'id'   => 'column_info',
					'name' => esc_html__( 'Blog - Layout', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'layout',
					'name'    => esc_html__( 'Blog Listing Layout', 'foxiz' ),
					'desc'    => esc_html__( 'Select a layout for the latest blog.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'0'            => esc_html__( '- Default -', 'foxiz' ),
						'classic_1'    => esc_html__( 'Classic', 'foxiz' ),
						'grid_1'       => esc_html__( 'Grid 1', 'foxiz' ),
						'grid_2'       => esc_html__( 'Grid 2', 'foxiz' ),
						'grid_box_1'   => esc_html__( 'Boxed Grid 1', 'foxiz' ),
						'grid_box_2'   => esc_html__( 'Boxed Grid 2', 'foxiz' ),
						'grid_small_1' => esc_html__( 'Small Grid', 'foxiz' ),
						'list_1'       => esc_html__( 'List 1', 'foxiz' ),
						'list_2'       => esc_html__( 'List 2', 'foxiz' ),
						'list_box_1'   => esc_html__( 'Boxed List 1', 'foxiz' ),
						'list_box_2'   => esc_html__( 'Boxed List 2', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'      => 'columns',
					'name'    => esc_html__( 'Columns on Desktop', 'foxiz' ),
					'desc'    => esc_html__( 'Select columns for the latest blog listing on desktop device.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_blog_columns(),
					'std'     => '0',
				],
				[
					'id'      => 'columns_tablet',
					'name'    => esc_html__( 'Columns on Tablet', 'foxiz' ),
					'desc'    => esc_html__( 'Select columns for the latest blog listing on tablet devices.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_blog_columns(),
					'std'     => '0',
				],
				[
					'id'      => 'columns_mobile',
					'name'    => esc_html__( 'Columns on Mobile', 'foxiz' ),
					'desc'    => esc_html__( 'Select columns for the latest blog listing on mobile devices.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_blog_columns( [ '0', '1', '2' ] ),
					'std'     => '0',
				],
				[
					'id'      => 'column_gap',
					'name'    => esc_html__( 'Column Gap', 'foxiz' ),
					'desc'    => esc_html__( 'Select a spacing between columns.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_blog_column_gap(),
					'std'     => '0',
				],
				[
					'id'   => 'pagination_info',
					'name' => esc_html__( 'Blog - Pagination', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'pagination',
					'name'    => esc_html__( 'Pagination Type', 'foxiz' ),
					'desc'    => esc_html__( 'Select pagination type for this category.', 'foxiz' ),
					'info'    => esc_html__( 'This setting will be not available if you use "Global WP Query Template Shortcode" to build the blog listing.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_blog_pagination( true ),
					'std'     => '0',
				],
				[
					'id'   => 'sidebar_info',
					'name' => esc_html__( 'Blog - Sidebar', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'sidebar_position',
					'name'    => esc_html__( 'Sidebar Position', 'foxiz' ),
					'desc'    => esc_html__( 'Select a position for the latest blog sidebar.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_category_sidebar_position(),
					'std'     => '0',
				],
				[
					'id'      => 'sidebar_name',
					'name'    => esc_html__( 'Assign a Sidebar', 'foxiz' ),
					'desc'    => esc_html__( 'Assign a blog sidebar for this category.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_sidebar_name(),
					'std'     => '0',
				],
				[
					'id'      => 'sticky_sidebar',
					'name'    => esc_html__( 'Sticky Sidebar', 'foxiz' ),
					'desc'    => esc_html__( 'Making this sidebar permanently visible when scrolling up and down.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'0'  => esc_html__( '- Default -', 'foxiz' ),
						'1'  => esc_html__( 'Enable', 'foxiz' ),
						'-1' => esc_html__( 'Disable', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'   => 'design_featured_image',
					'name' => esc_html__( 'Featured Image', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'crop_size',
					'name'    => esc_html__( 'Featured Image Size', 'foxiz' ),
					'desc'    => esc_html__( 'Select a crop size for the featured image to displaying in this category.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_crop_size(),
					'std'     => '0',
				],
				[
					'id'          => 'display_ratio',
					'name'        => esc_html__( 'Custom Featured Ratio', 'foxiz' ),
					'desc'        => esc_html__( 'Input custom ratio percent (height*100/width) for featured image you would like. e.g. 50', 'foxiz' ),
					'tab'         => 'default-blog',
					'type'        => 'text',
					'placeholder' => '50',
					'classes'     => 'small',
					'std'         => '',
				],
				[
					'id'   => 'design_entry_meta',
					'name' => esc_html__( 'Entry Category', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'hide_category',
					'name'    => esc_html__( 'Responsive - Hide Entry Category', 'foxiz' ),
					'desc'    => esc_html__( 'Hide the entry category on tablet and mobile devices.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'0'      => esc_html__( '- Default -', 'foxiz' ),
						'mobile' => esc_html__( 'On Mobile', 'foxiz' ),
						'tablet' => esc_html__( 'On Tablet', 'foxiz' ),
						'all'    => esc_html__( 'On Tablet & Mobile', 'foxiz' ),
						'-1'     => esc_html__( 'Disable', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'   => 'design_entry_title',
					'name' => esc_html__( 'Post Title', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'title_tag',
					'name'    => esc_html__( 'Title HTML Tag', 'foxiz' ),
					'desc'    => esc_html__( 'Select a title HTML tag for the post title.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_heading_tag(),
					'std'     => 0,
				],
				[
					'id'      => 'title_size',
					'name'    => esc_html__( 'Desktop - Title Font Size', 'foxiz' ),
					'desc'    => esc_html__( 'Select a font size (in pixels) for the post title on desktop devices.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'text',
					'classes' => 'small',
					'std'     => '',
				],
				[
					'id'      => 'title_size_tablet',
					'name'    => esc_html__( 'Tablet - Title Font Size', 'foxiz' ),
					'desc'    => esc_html__( 'Select a font size (in pixels) for the post title on tablet devices.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'text',
					'classes' => 'small',
					'std'     => '',
				],
				[
					'id'      => 'title_size_mobile',
					'name'    => esc_html__( 'Mobile - Title Font Size', 'foxiz' ),
					'desc'    => esc_html__( 'Select a font size (in pixels) for the post title on mobile devices.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'text',
					'classes' => 'small',
					'std'     => '',
				],
				[
					'id'   => 'design_entry_meta',
					'name' => esc_html__( 'Entry Meta', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'entry_meta_bar',
					'name'    => esc_html__( 'Entry Meta Bar', 'foxiz' ),
					'desc'    => esc_html__( 'Select the entry meta tags you want to show.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'0'      => esc_html__( '- Default -', 'foxiz' ),
						'-1'     => esc_html__( 'Disable', 'foxiz' ),
						'custom' => esc_html__( 'Use Custom Below', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'          => 'entry_meta',
					'type'        => 'text',
					'name'        => esc_html__( 'Entry Meta Tags', 'foxiz' ),
					'desc'        => esc_html__( 'Input entry meta tags to show.', 'foxiz' ),
					'info'        => esc_html__( 'Separated by commas, Keys include: [author, date, category, tag, view, comment, update, read, custom]', 'foxiz' ),
					'tab'         => 'default-blog',
					'placeholder' => esc_html__( 'avatar,author,update', 'foxiz' ),
					'std'         => '',
				],
				[
					'id'      => 'review',
					'name'    => esc_html__( 'Review Meta', 'foxiz' ),
					'desc'    => esc_html__( 'Disable or select setting for entry review meta.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_entry_review( true ),
					'std'     => '0',
				],
				[
					'id'      => 'review_meta',
					'name'    => esc_html__( 'Review Meta Description', 'foxiz' ),
					'desc'    => esc_html__( 'Enable or disable the meta description at the end of the review bar.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_review_desc_dropdown(),
					'std'     => '0',
				],
				[
					'id'          => 'tablet_hide_meta',
					'name'        => esc_html__( 'Hide Entry Meta on Tablet', 'foxiz' ),
					'desc'        => esc_html__( 'Input the entry meta tags that you want to hide on tablet devices.', 'foxiz' ),
					'info'        => esc_html__( 'Separate by comma. e.g. avatar, author... If you want to re-enable all metas input "-1".', 'foxiz' ),
					'tab'         => 'default-blog',
					'type'        => 'text',
					'placeholder' => esc_html__( 'avatar,author', 'foxiz' ),
					'default'     => '',
				],
				[
					'id'          => 'mobile_hide_meta',
					'name'        => esc_html__( 'Hide Entry Meta on Mobile', 'foxiz' ),
					'desc'        => esc_html__( 'Input the entry meta tags that you want to hide on mobile devices.', 'foxiz' ),
					'info'        => esc_html__( 'Separate by comma. e.g. avatar, author... If you want to re-enable all metas input "-1".', 'foxiz' ),
					'tab'         => 'default-blog',
					'type'        => 'text',
					'placeholder' => esc_html__( 'avatar,author', 'foxiz' ),
					'default'     => '',
				],
				[
					'id'   => 'design_entry_bookmark',
					'name' => esc_html__( 'Bookmark', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'bookmark',
					'name'    => esc_html__( 'Bookmark Icon', 'foxiz' ),
					'desc'    => esc_html__( 'Enable or disable the bookmark icon.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_switch_dropdown(),
					'std'     => '0',
				],
				[
					'id'   => 'design_entry_format',
					'name' => esc_html__( 'Post Format', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'entry_format',
					'name'    => esc_html__( 'Post Format Icon', 'foxiz' ),
					'desc'    => esc_html__( 'Disable or select setting for the post format.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_entry_format( true ),
					'std'     => '0',
				],
				[
					'id'   => 'design_entry_excerpt',
					'name' => esc_html__( 'Excerpt', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'excerpt',
					'name'    => esc_html__( 'Excerpt', 'foxiz' ),
					'desc'    => esc_html__( 'Select settings for the post excerpt.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'0' => esc_html__( '- Default -', 'foxiz' ),
						'1' => esc_html__( 'Custom Settings Below', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'      => 'excerpt_length',
					'name'    => esc_html__( 'Excerpt - Max Length', 'foxiz' ),
					'desc'    => esc_html__( 'select max length of the post excerpt.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'text',
					'classes' => 'small',
					'std'     => '0',
				],
				[
					'id'          => 'excerpt_source',
					'name'        => esc_html__( 'Excerpt - Source', 'foxiz' ),
					'desc'        => esc_html__( 'Where to get the post excerpt.', 'foxiz' ),
					'description' => esc_html__( 'When you select "use title tagline". if it is empty, it will fallback to the post excerpt or content.', 'foxiz' ),
					'tab'         => 'default-blog',
					'type'        => 'select',
					'options'     => foxiz_config_excerpt_source(),
					'std'         => 'tagline',
				],
				[
					'id'      => 'hide_excerpt',
					'name'    => esc_html__( 'Responsive - Hide Excerpt', 'foxiz' ),
					'desc'    => esc_html__( 'Hide the post excerpt on tablet and mobile devices.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'0'      => esc_html__( 'Default from Category Settings', 'foxiz' ),
						'mobile' => esc_html__( 'On Mobile', 'foxiz' ),
						'tablet' => esc_html__( 'On Tablet', 'foxiz' ),
						'all'    => esc_html__( 'On Tablet & Mobile', 'foxiz' ),
						'-1'     => esc_html__( 'Disable', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'   => 'design_entry_readmore',
					'name' => esc_html__( 'Read More', 'foxiz' ),
					'tab'  => 'default-blog',
					'type' => 'info',
				],
				[
					'id'      => 'readmore',
					'name'    => esc_html__( 'Read More Button', 'foxiz' ),
					'desc'    => esc_html__( 'Enable or disable the read more button.', 'foxiz' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => foxiz_config_switch_dropdown(),
					'std'     => '0',
				],
				[
					'id'          => 'post_template',
					'name'        => esc_html__( 'Single Post Template', 'foxiz' ),
					'desc'        => esc_html__( 'Input a custom template for the single post belonging to this category.', 'foxiz' ),
					'info'        => esc_html__( 'This setting will take priority over the setting in the Theme Options. If a post has multiple categories, the primary category or the first category setting will apply.', 'foxiz' ),
					'tab'         => 'post-template',
					'single'      => true,
					'type'        => 'textarea',
					'rows'        => '2',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'std'         => '',
				],
			],
		];
	}
}

if ( ! function_exists( 'foxiz_get_post_tag_config' ) ) {
	function foxiz_get_post_tag_config() {

		return [
			'title'      => esc_html__( 'Foxiz Tag Settings', 'foxiz' ),
			'info'       => esc_html__( 'The settings will apply to this tag only, and the ones below will take priority over other settings in the "Theme Options > Blog & Archive" settings.', 'foxiz' ),
			'taxonomies' => [ 'post_tag' ],
			'id'         => 'foxiz_tag_meta',
			'tabs'       => [
				[
					'title' => esc_html__( 'Entry Post Tags', 'foxiz' ),
					'id'    => 'entry-tax',
					'icon'  => 'dashicons-art',
				],
				[
					'title' => esc_html__( 'Tag Header', 'foxiz' ),
					'id'    => 'tag-header',
					'icon'  => 'dashicons-editor-justify',
				],
				[
					'title' => esc_html__( 'Global Template', 'foxiz' ),
					'id'    => 'global-template',
					'icon'  => 'dashicons-admin-site',
				],
				[
					'title' => esc_html__( 'Site Header', 'foxiz' ),
					'id'    => 'site-header',
					'icon'  => 'dashicons-heading',
				],
				[
					'title' => esc_html__( 'Queries', 'foxiz' ),
					'id'    => 'query',
					'icon'  => 'dashicons-database',
				],
			],
			'fields'     => [
				[
					'id'   => 'highlight_color',
					'name' => esc_html__( 'Highlight Color', 'foxiz' ),
					'desc' => esc_html__( 'These settings will apply to the post tags if you replace post tags with entry category icons.', 'foxiz' ),
					'tab'  => 'entry-tax',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'color',
					'name' => esc_html__( 'Accent Color', 'foxiz' ),
					'desc' => esc_html__( 'Select an accent (text) color for the entry taxonomy.', 'foxiz' ),
					'tab'  => 'entry-tax',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'dark_highlight_color',
					'name' => esc_html__( 'Dark Mode - Highlight Color', 'foxiz' ),
					'desc' => esc_html__( 'Select a highlight color in dark mode.', 'foxiz' ),
					'tab'  => 'entry-tax',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'dark_color',
					'name' => esc_html__( 'Dark Mode - Accent Color', 'foxiz' ),
					'desc' => esc_html__( 'Select an accent (text) color in dark mode.', 'foxiz' ),
					'tab'  => 'entry-tax',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'      => 'header_style',
					'name'    => esc_html__( 'Site Header', 'foxiz' ),
					'desc'    => esc_html__( 'Select a site header for this tag.', 'foxiz' ),
					'tab'     => 'site-header',
					'type'    => 'select',
					'options' => foxiz_config_header_style( true, true ),
					'std'     => '0',
				],
				[
					'id'          => 'header_template',
					'name'        => esc_html__( 'Template Shortcode', 'foxiz' ),
					'desc'        => esc_html__( 'Input a Ruby Template shortcode for displaying as the website header for this tag.', 'foxiz' ),
					'info'        => esc_html__( 'This setting will override on the "Site Header" setting.', 'foxiz' ),
					'tab'         => 'site-header',
					'type'        => 'textarea',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'rows'        => '2',
					'std'         => '',
				],
				[
					'id'      => 'archive_header',
					'name'    => esc_html__( 'Tag Header', 'foxiz' ),
					'desc'    => esc_html__( 'Select a style for this tag header.', 'foxiz' ),
					'tab'     => 'tag-header',
					'type'    => 'select',
					'options' => foxiz_config_archive_header( true ),
					'std'     => '0',
				],
				[
					'id'      => 'breadcrumb',
					'name'    => esc_html__( 'Breadcrumb', 'foxiz' ),
					'desc'    => esc_html__( 'Enable or disable the breadcrumb in this tag header.', 'foxiz' ),
					'tab'     => 'tag-header',
					'type'    => 'select',
					'options' => [
						'0'  => esc_html__( '- Default -', 'foxiz' ),
						'1'  => esc_html__( 'Use Global Setting', 'foxiz' ),
						'-1' => esc_html__( 'Disable', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'      => 'pattern',
					'name'    => esc_html__( 'Background Pattern', 'foxiz' ),
					'desc'    => esc_html__( 'Select a pattern style for the header background.', 'foxiz' ),
					'tab'     => 'tag-header',
					'type'    => 'select',
					'options' => foxiz_config_archive_header_bg( true ),
					'std'     => '0',
				],
				[
					'id'          => 'template_global',
					'name'        => esc_html__( 'Global WP Query Template Shortcode', 'foxiz' ),
					'desc'        => esc_html__( 'Insert a Ruby Template shortcode to set it as the main blog listing for this tag.', 'foxiz' ),
					'info'        => esc_html__( 'Build the main blog listing by Ruby Template.', 'foxiz' ),
					'tab'         => 'global-template',
					'type'        => 'textarea',
					'rows'        => '2',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'std'         => '',
				],
				[
					'id'      => 'posts_per_page',
					'name'    => esc_html__( 'Posts per Page', 'foxiz' ),
					'desc'    => esc_html__( 'Input posts per page for this tag.', 'foxiz' ),
					'info'    => esc_html__( 'This setting will also apply to the Global WP Query Template.', 'foxiz' ),
					'tab'     => 'query',
					'type'    => 'text',
					'classes' => 'small',
					'std'     => '',
				],
			],
		];
	}
}

if ( ! function_exists( 'foxiz_register_term_settings' ) ) {
	/**
	 * @param $configs
	 *
	 * @return mixed
	 */
	function foxiz_register_term_settings( $configs ) {

		$configs[] = foxiz_get_category_config();
		$configs[] = foxiz_get_post_tag_config();

		return $configs;
	}
}

if ( ! function_exists( 'foxiz_register_default_term_settings' ) ) {
	/**
	 * @return array
	 */
	function foxiz_register_default_term_settings() {

		return [
			'title'  => esc_html__( 'Foxiz Taxonomy Settings', 'foxiz' ),
			'info'   => esc_html__( 'The settings will apply to this taxonomy only, and the ones below will take priority over other settings in the "Theme Options > Blog & Archive" settings.', 'foxiz' ),
			'id'     => 'foxiz_category_meta',
			'tabs'   => [
				[
					'title' => esc_html__( 'Entry Taxonomy', 'foxiz' ),
					'id'    => 'entry-tax',
					'icon'  => 'dashicons-art',
				],
				[
					'title' => esc_html__( 'Taxonomy Header', 'foxiz' ),
					'id'    => 'tax-header',
					'icon'  => 'dashicons-editor-justify',
				],
				[
					'title' => esc_html__( 'Global Template', 'foxiz' ),
					'id'    => 'global-template',
					'icon'  => 'dashicons-admin-site',
				],
				[
					'title' => esc_html__( 'Site Header', 'foxiz' ),
					'id'    => 'site-header',
					'icon'  => 'dashicons-heading',
				],
				[
					'title' => esc_html__( 'Queries', 'foxiz' ),
					'id'    => 'query',
					'icon'  => 'dashicons-database',
				],
			],
			'fields' => [
				[
					'id'   => 'highlight_color',
					'name' => esc_html__( 'Highlight Color', 'foxiz' ),
					'desc' => esc_html__( 'Select a highlight color for the entry taxonomy.', 'foxiz' ),
					'info' => esc_html__( 'This setting will apply to entry taxonomy in the the blog listing.', 'foxiz' ),
					'tab'  => 'entry-tax',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'color',
					'name' => esc_html__( 'Accent Color', 'foxiz' ),
					'desc' => esc_html__( 'Select an accent (text) color for the entry taxonomy.', 'foxiz' ),
					'info' => esc_html__( 'This setting will apply to entry taxonomy text.', 'foxiz' ),
					'tab'  => 'entry-tax',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'dark_highlight_color',
					'name' => esc_html__( 'Dark Mode - Highlight Color', 'foxiz' ),
					'desc' => esc_html__( 'Select a highlight color in dark mode.', 'foxiz' ),
					'tab'  => 'entry-tax',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'   => 'dark_color',
					'name' => esc_html__( 'Dark Mode - Accent Color', 'foxiz' ),
					'desc' => esc_html__( 'Select an accent (text) color in dark mode.', 'foxiz' ),
					'tab'  => 'entry-tax',
					'type' => 'color',
					'std'  => '',
				],
				[
					'id'      => 'header_style',
					'name'    => esc_html__( 'Site Header', 'foxiz' ),
					'desc'    => esc_html__( 'Select a site header for this tax.', 'foxiz' ),
					'tab'     => 'site-header',
					'type'    => 'select',
					'options' => foxiz_config_header_style( true, true ),
					'std'     => '0',
				],
				[
					'id'          => 'header_template',
					'name'        => esc_html__( 'Template Shortcode', 'foxiz' ),
					'desc'        => esc_html__( 'Input a Ruby Template shortcode for displaying as the website header for this tax.', 'foxiz' ),
					'info'        => esc_html__( 'This setting will override on the "Site Header" setting.', 'foxiz' ),
					'tab'         => 'site-header',
					'type'        => 'textarea',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'rows'        => '2',
					'std'         => '',
				],
				[
					'id'      => 'archive_header',
					'name'    => esc_html__( 'Taxonomy Header', 'foxiz' ),
					'desc'    => esc_html__( 'Select a style for this tax header.', 'foxiz' ),
					'tab'     => 'tax-header',
					'type'    => 'select',
					'options' => foxiz_config_archive_header( true ),
					'std'     => '0',
				],
				[
					'id'      => 'breadcrumb',
					'name'    => esc_html__( 'Breadcrumb', 'foxiz' ),
					'desc'    => esc_html__( 'Enable or disable the breadcrumb in this tax header.', 'foxiz' ),
					'tab'     => 'tax-header',
					'type'    => 'select',
					'options' => [
						'0'  => esc_html__( '- Default -', 'foxiz' ),
						'1'  => esc_html__( 'Use Global Setting', 'foxiz' ),
						'-1' => esc_html__( 'Disable', 'foxiz' ),
					],
					'std'     => '0',
				],
				[
					'id'      => 'pattern',
					'name'    => esc_html__( 'Background Pattern', 'foxiz' ),
					'desc'    => esc_html__( 'Select a pattern style for the header background.', 'foxiz' ),
					'tab'     => 'tax-header',
					'type'    => 'select',
					'options' => foxiz_config_archive_header_bg( true ),
					'std'     => '0',
				],
				[
					'id'          => 'template_global',
					'name'        => esc_html__( 'Global WP Query Template Shortcode', 'foxiz' ),
					'desc'        => esc_html__( 'Insert a Ruby Template shortcode to set it as the main blog listing for this tax.', 'foxiz' ),
					'info'        => esc_html__( 'Build the main blog listing by Ruby Template.', 'foxiz' ),
					'tab'         => 'global-template',
					'type'        => 'textarea',
					'rows'        => '2',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'std'         => '',
				],
				[
					'id'      => 'posts_per_page',
					'name'    => esc_html__( 'Posts per Page', 'foxiz' ),
					'desc'    => esc_html__( 'Input posts per page for this tax.', 'foxiz' ),
					'info'    => esc_html__( 'This setting will also apply to the Global WP Query Template.', 'foxiz' ),
					'tab'     => 'query',
					'type'    => 'text',
					'classes' => 'small',
					'std'     => '',
				],
			],
		];
	}
}