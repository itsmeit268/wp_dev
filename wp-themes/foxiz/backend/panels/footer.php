<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'foxiz_register_options_footer' ) ) {
	/**
	 * @return array
	 */
	function foxiz_register_options_footer() {

		return [
			'id'     => 'foxiz_config_section_footer',
			'title'  => esc_html__( 'Footer', 'foxiz' ),
			'desc'   => esc_html__( 'Customize your website footer.', 'foxiz' ),
			'icon'   => 'el el-credit-card',
			'fields' => [
				[
					'id'    => 'info_add_footer',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Appearance > Widgets" to add content for your footer.', 'foxiz' ),
				],
				[
					'id'     => 'section_start_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Styles', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'footer_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background for the footer: image, color, etc', 'foxiz' ),
					'default'     => [
						'background-color' => '#88888812',
					],
				],
				[
					'id'          => 'dark_footer_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Dark Mode - Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background for the footer in dark mode.', 'foxiz' ),
				],
				[
					'id'       => 'footer_dot',
					'type'     => 'switch',
					'title'    => esc_html__( 'Gray Dotted', 'foxiz' ),
					'subtitle' => esc_html__( 'Show the gray dotted style at the top left of the footer.', 'foxiz' ),
					'default'  => true,
				],
				[
					'id'          => 'footer_border',
					'type'        => 'switch',
					'title'       => esc_html__( 'Top Border', 'foxiz' ),
					'subtitle'    => esc_html__( 'Show a gray border a the top footer.', 'foxiz' ),
					'description' => esc_html__( 'It will be helpful if you have not set up footer background.', 'foxiz' ),
					'default'     => false,
				],
				[
					'id'          => 'footer_color_scheme',
					'type'        => 'select',
					'title'       => esc_html__( 'Text Color Scheme', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color scheme for the footer.', 'foxiz' ),
					'description' => esc_html__( 'Text color scheme will be set to light in dark mode.', 'foxiz' ),
					'options'     => [
						'0' => esc_html__( 'Default (Dark Text)', 'foxiz' ),
						'1' => esc_html__( 'Light Text', 'foxiz' ),
					],
					'default'     => '0',
				],
				[
					'id'     => 'section_end_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_footer_widget_section',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Widget Section', 'foxiz' ),
					'notice' => [
						esc_html__( 'Navigate to Appearance > Widgets to add content for this section.', 'foxiz' ),
						esc_html__( 'Select "Use Ruby Template" under the "Footer Widgets Layout" setting if you use Ruby Template shortcode.', 'foxiz' ),
					],
					'indent'   => true,
				],
				[
					'id'       => 'footer_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Layout', 'foxiz' ),
					'subtitle' => esc_html__( 'Select a layout for the footer widget area.', 'foxiz' ),
					'options'  => [
						'0'         => esc_html__( '4 Columns (3/2/2/3)', 'foxiz' ),
						'5'         => esc_html__( '5 Columns (1/1/1/1/1)', 'foxiz' ),
						'51'        => esc_html__( '5 Columns (40/15/15/15/15)', 'foxiz' ),
						'3'         => esc_html__( '3 Columns (1/2/1)', 'foxiz' ),
						'shortcode' => esc_html__( 'Use Ruby Template', 'foxiz' ),
						'none'      => esc_html__( 'Disable', 'foxiz' ),
					],
					'default'  => '5',
				],
				[
					'id'          => 'footer_column_border',
					'type'        => 'switch',
					'title'       => esc_html__( 'Column Border', 'foxiz' ),
					'subtitle'    => esc_html__( 'Show gray borders between widget columns.', 'foxiz' ),
					'description' => esc_html__( 'This setting will not apply to Ruby template shortcode.', 'foxiz' ),
					'default'     => false,
				],
				[
					'id'          => 'footer_columns_size',
					'type'        => 'text',
					'title'       => esc_html__( 'Widget Menu Font Size', 'foxiz' ),
					'subtitle'    => esc_html__( 'Input a font size value (in px) for the menu widget displaying in this section.', 'foxiz' ),
					'description' => esc_html__( 'This setting will not apply to Ruby template shortcode.', 'foxiz' ),
				],
				[
					'id'          => 'footer_template_shortcode',
					'type'        => 'textarea',
					'title'       => esc_html__( 'Template Shortcode', 'foxiz' ),
					'placeholder' => esc_html__( '[Ruby_E_Template id="1"]', 'foxiz' ),
					'subtitle'    => esc_html__( 'Input your template shortcode you would like to use a Ruby template.', 'foxiz' ),
					'rows'        => '2',
					'default'     => '',
				],
				[
					'id'     => 'section_end_footer_widget_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_footer_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Bottom Section', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'footer_logo',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Footer Logo', 'foxiz' ),
					'subtitle'    => esc_html__( 'Upload logo to display at bottom of the footer.', 'foxiz' ),
					'description' => esc_html__( 'The recommended height value is 100px (2x logo height).', 'foxiz' ),
				],
				[
					'id'       => 'dark_footer_logo',
					'type'     => 'media',
					'url'      => true,
					'preview'  => true,
					'title'    => esc_html__( 'Dark Mode - Footer Logo', 'foxiz' ),
					'subtitle' => esc_html__( 'Upload logo to display at bottom of the footer in dark mode.', 'foxiz' ),
				],
				[
					'id'          => 'footer_logo_height',
					'type'        => 'text',
					'title'       => esc_html__( 'Logo Height', 'foxiz' ),
					'subtitle'    => esc_html__( 'Input a custom value for the logo height.', 'foxiz' ),
					'placeholder' => '50',
				],
				[
					'id'       => 'footer_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable the social list in this section.', 'foxiz' ),
					'default'  => false,
				],
				[
					'id'       => 'footer_bottom_center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Centered Mode', 'foxiz' ),
					'subtitle' => esc_html__( 'Centering this section.', 'foxiz' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_footer_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_footer_copyright',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Copyright', 'foxiz' ),
					'subtitle' => esc_html__( 'The copyright menu font will use "Typography > Archive & Menu Widgets > Footer Menus" settings.', 'foxiz' ),
					'indent'   => true,
				],
				[
					'id'       => 'copyright',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Copyright Text', 'foxiz' ),
					'subtitle' => esc_html__( 'input your copyright text or HTML.', 'foxiz' ),
					'rows'     => '4',
					'default'  => '',
				],
				[
					'id'       => 'footer_copyright_text_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Text Size', 'foxiz' ),
					'subtitle' => esc_html__( 'Input a custom value (in px) for the copyright text.', 'foxiz' ),
				],
				[
					'id'       => 'footer_menu',
					'type'     => 'select',
					'title'    => esc_html__( 'Copyright Menu', 'foxiz' ),
					'subtitle' => esc_html__( 'Assign a menu for the copyright menu section.', 'foxiz' ),
					'data'     => 'menus',
				],
				[
					'id'       => 'footer_copyright_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Copyright Menu Size', 'foxiz' ),
					'subtitle' => esc_html__( 'Input a custom value (in px) for the copyright menu.', 'foxiz' ),
				],
				[
					'id'     => 'section_end_footer_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
