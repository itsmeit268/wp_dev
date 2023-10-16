<?php
/** sidebar config */
if ( ! function_exists( 'foxiz_register_options_sidebar' ) ) {
	function foxiz_register_options_sidebar() {

		return [
			'id'     => 'foxiz_theme_ops_section_sidebar',
			'title'  => esc_html__( 'Sidebars', 'foxiz' ),
			'desc'   => esc_html__( 'Customize your website sidebars. ', 'foxiz' ),
			'icon'   => 'el el-align-right',
			'fields' => [
				[
					'id'    => 'info_global_sidebar',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The settings below will apply to whole the website.', 'foxiz' ),
				],
				[
					'id'    => 'info_add_widget',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Appearance > Widgets" to add content for your sidebars.', 'foxiz' ),
				],
				[
					'id'          => 'global_sidebar_position',
					'type'        => 'image_select',
					'title'       => esc_html__( 'Sidebar Position', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a default sidebar position for your site.', 'foxiz' ),
					'description' => esc_html__( 'This is treated as a global setting. Other position settings take priority over this setting.', 'foxiz' ),
					'options'     => foxiz_config_sidebar_position( false ),
					'default'     => 'right',
				],
				[
					'id'         => 'multi_sidebars',
					'type'       => 'multi_text',
					'class'      => 'medium-text',
					'show_empty' => false,
					'title'      => esc_html__( 'Unlimited Sidebars', 'foxiz' ),
					'label'      => esc_html__( 'Add a Sidebar ID', 'foxiz' ),
					'subtitle'   => esc_html__( 'Create new or delete exist sidebars.', 'foxiz' ),
					'desc'       => esc_html__( 'Click on the "Create Sidebar" button, then input a name/ID (without special charsets and spacing) into the field to create a new sidebar.', 'foxiz' ),
					'add_text'   => esc_html__( 'Click then Input ID to Create a Sidebar', 'foxiz' ),
					'default'    => [],
				],
				[
					'id'          => 'sticky_sidebar',
					'type'        => 'switch',
					'title'       => esc_html__( 'Sticky Sidebar', 'foxiz' ),
					'subtitle'    => esc_html__( 'Making sidebars permanently visible when scrolling up and down.', 'foxiz' ),
					'description' => esc_html__( 'Useful when a sidebar is too tall or too short compared to the rest of the content.', 'foxiz' ),
					'default'     => false,
				],
				[
					'id'       => 'widget_block_editor',
					'type'     => 'switch',
					'title'    => esc_html__( 'Widget Block Editor', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable widget block editor (WordPress 5.8 or above).', 'foxiz' ),
					'default'  => false,
				],
			],
		];
	}
}