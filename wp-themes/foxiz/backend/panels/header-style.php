<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'foxiz_register_options_header_1' ) ) {
	/**
	 * @return array
	 */
	function foxiz_register_options_header_1() {

		return [
			'id'         => 'foxiz_config_section_header_1',
			'title'      => esc_html__( 'for Header 1,2,3', 'foxiz' ),
			'icon'       => 'el el-screen',
			'subsection' => true,
			'desc'       => esc_html__( 'Customize the styles and colors for the header style 1, style 2 and style 3.', 'foxiz' ),
			'fields'     => [
				[
					'id'    => 'info_header_1',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The settings below will apply only to the header style 1, 2 and 3.', 'foxiz' ),
				],
				[
					'id'     => 'section_start_hd1_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'       => 'hd1_more',
					'title'    => esc_html__( 'More Menu Button', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable the more button at the end of the navigation.', 'foxiz' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'hd1_header_socials',
					'title'    => esc_html__( 'Social Icons', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable the social icons list at the end of the navigation.', 'foxiz' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'     => 'section_end_hd1_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_hd1_nav_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Styles', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'       => 'hd1_width',
					'title'    => esc_html__( 'Width Style', 'foxiz' ),
					'subtitle' => esc_html__( 'Max width style for this header and navigation.', 'foxiz' ),
					'type'     => 'select',
					'options'  => [
						'0'    => esc_html__( 'Wrapper (1240px)', 'foxiz' ),
						'full' => esc_html__( 'Full Width (100%)', 'foxiz' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'hd1_nav_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Navigation Style', 'foxiz' ),
					'subtitle' => esc_html__( 'Select a style for this header navigation.', 'foxiz' ),
					'options'  => [
						'shadow'   => esc_html__( 'Shadow', 'foxiz' ),
						'border'   => esc_html__( 'Bottom Border', 'foxiz' ),
						'd-border' => esc_html__( 'Dark Bottom Border', 'foxiz' ),
						'none'     => esc_html__( 'None', 'foxiz' ),
					],
					'default'  => 'shadow',
				],
				[
					'id'          => 'hd1_height',
					'title'       => esc_html__( 'Header Height', 'foxiz' ),
					'subtitle'    => esc_html__( 'Input a custom height value (in pixels) for this header.', 'foxiz' ),
					'placeholder' => '60',
					'type'        => 'text',
					'default'     => '',
				],
				[
					'id'       => 'hd1_sub_scheme',
					'type'     => 'select',
					'title'    => esc_html__( 'Mega Menu - Text Color Scheme', 'foxiz' ),
					'subtitle' => esc_html__( 'Select a text color scheme for the mega menus to suit with the background color.', 'foxiz' ),
					'options'  => [
						'0' => esc_html__( 'Default (Dark Text)', 'foxiz' ),
						'1' => esc_html__( 'Light Text', 'foxiz' ),
					],
					'default'  => '0',
				],
				[
					'id'     => 'section_end_hd1_nav_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_hd1_nav_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Colors', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'hd1_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Navigation Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the navigation bar of this header.', 'foxiz' ),
					'description' => esc_html__( 'use the option "To" to set a gradient background.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'hd1_color',
					'title'       => esc_html__( 'Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in the navigation bar of this header.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd1_color_hover',
					'title'       => esc_html__( 'Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd1_color_hover_accent',
					'title'       => esc_html__( 'Hover Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a accent color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd1_sub_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Sub Menu - Background Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the sub menu and other dropdown sections of this header.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'hd1_sub_color',
					'title'       => esc_html__( 'Sub Menu - Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in sub menus and other dropdown sections of this header.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd1_sub_color_hover',
					'title'       => esc_html__( 'Sub Menu - Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_hd1_nav_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				/** dark mode */
				[
					'id'     => 'section_start_hd1_dark_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Dark Mode Colors', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'dark_hd1_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Background Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the navigation bar of this header in dark mode.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'dark_hd1_color',
					'title'       => esc_html__( 'Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in the navigation bar of this header in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd1_color_hover',
					'title'       => esc_html__( 'Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd1_color_hover_accent',
					'title'       => esc_html__( 'Hover Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a accent color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd1_sub_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Sub Menu - Background Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the sub menu and other dropdown sections of this header in dark mode.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'dark_hd1_sub_color',
					'title'       => esc_html__( 'Sub Menu - Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in sub menus and other dropdown sections of this header in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd1_sub_color_hover',
					'title'       => esc_html__( 'Sub Menu - Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_hd1_dark_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_hd1_transparent',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Transparent Headers', 'foxiz' ),
					'subtitle' => esc_html__( 'The settings below apply to the "Transparent Header 1,2 and 3".', 'foxiz' ),
					'indent'   => true,
				],
				[
					'id'          => 'transparent_hd1_color',
					'title'       => esc_html__( 'Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in the navigation bar of the transparent header.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'transparent_hd1_color_hover',
					'title'       => esc_html__( 'Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'transparent_hd1_color_hover_accent',
					'title'       => esc_html__( 'Hover Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a accent color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_hd1_transparent',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'foxiz_register_options_header_4' ) ) {
	/**
	 * @return array
	 */
	function foxiz_register_options_header_4() {

		return [
			'id'         => 'foxiz_config_section_header_4',
			'title'      => esc_html__( 'for Header 4', 'foxiz' ),
			'icon'       => 'el el-screen',
			'subsection' => true,
			'desc'       => esc_html__( 'Customize the styles and colors for the header style 4', 'foxiz' ),
			'fields'     => [
				[
					'id'    => 'info_header_4',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The settings below will apply only to the header style 4.', 'foxiz' ),
				],
				[
					'id'     => 'section_start_hd4_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'       => 'hd4_more',
					'title'    => esc_html__( 'More Menu Button', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable the more button at the end of the navigation.', 'foxiz' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'hd4_header_socials',
					'title'    => esc_html__( 'Social Icons', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable the social icons list at the end of the navigation.', 'foxiz' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'     => 'section_end_hd4_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_hd4_nav_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Styles', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'       => 'hd4_width',
					'title'    => esc_html__( 'Width Style', 'foxiz' ),
					'subtitle' => esc_html__( 'Max width style for this header and navigation.', 'foxiz' ),
					'type'     => 'select',
					'options'  => [
						'0'    => esc_html__( 'Wrapper (1240px)', 'foxiz' ),
						'full' => esc_html__( 'Full Width (100%)', 'foxiz' ),
					],
					'default'  => '0',
				],
				[
					'id'          => 'hd4_height',
					'title'       => esc_html__( 'Navigation Height', 'foxiz' ),
					'subtitle'    => esc_html__( 'Input a custom value (in pixels) for the navigation bar height.', 'foxiz' ),
					'placeholder' => '40',
					'type'        => 'text',
					'default'     => '',
				],
				[
					'id'          => 'hd4_logo_height',
					'title'       => esc_html__( 'Logo Max Height', 'foxiz' ),
					'subtitle'    => esc_html__( 'Input a max height value for the the header logo.', 'foxiz' ),
					'placeholder' => '60',
					'type'        => 'text',
					'default'     => '',
				],
				[
					'id'       => 'hd4_sub_scheme',
					'type'     => 'select',
					'title'    => esc_html__( 'Mega Menu - Text Color Scheme', 'foxiz' ),
					'subtitle' => esc_html__( 'In case you would like to switch layout and text to light when set a dark background for sub menu in light mode.', 'foxiz' ),
					'options'  => [
						'0' => esc_html__( 'Default (Dark Text)', 'foxiz' ),
						'1' => esc_html__( 'Light Text', 'foxiz' ),
					],
					'default'  => '0',
				],
				[
					'id'     => 'section_end_hd4_nav_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_hd4_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Colors', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'hd4_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Navigation Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the navigation bar of this header.', 'foxiz' ),
					'description' => esc_html__( 'use the option "To" to set a gradient background.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'hd4_color',
					'title'       => esc_html__( 'Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in the navigation bar of this header.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd4_color_hover',
					'title'       => esc_html__( 'Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd4_color_hover_accent',
					'title'       => esc_html__( 'Hover Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a accent color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd4_sub_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Sub Menu - Background Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the sub menu and other dropdown sections of this header.', 'foxiz' ),
					'description' => esc_html__( 'use the option "To" to set a gradient background.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'hd4_sub_color',
					'title'       => esc_html__( 'Sub Menu - Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in sub menus and other dropdown sections of this header.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd4_sub_color_hover',
					'title'       => esc_html__( 'Sub Menu - Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_hd4_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				/** dark mode */
				[
					'id'     => 'section_start_hd4_dark_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Dark Mode Colors', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'dark_hd4_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Navigation Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the navigation bar of this header in dark mode.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '#191c20',
						'to'   => '',
					],
				],
				[
					'id'          => 'dark_hd4_color',
					'title'       => esc_html__( 'Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in the navigation bar of this header in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd4_color_hover',
					'title'       => esc_html__( 'Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd4_color_hover_accent',
					'title'       => esc_html__( 'Hover Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a accent color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd4_sub_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Sub Menu - Background Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the sub menu and other dropdown sections of this header in dark mode.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'dark_hd4_sub_color',
					'title'       => esc_html__( 'Sub Menu - Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in sub menus and other dropdown sections of this header in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd4_sub_color_hover',
					'title'       => esc_html__( 'Sub Menu - Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_hd4_dark_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'foxiz_register_options_header_5' ) ) {
	/**
	 * @return array
	 */
	function foxiz_register_options_header_5() {

		return [
			'id'         => 'foxiz_config_section_header_5',
			'title'      => esc_html__( 'for Header 5', 'foxiz' ),
			'icon'       => 'el el-screen',
			'subsection' => true,
			'desc'       => esc_html__( 'Customize the styles and colors for the header style 5', 'foxiz' ),
			'fields'     => [
				[
					'id'    => 'info_header_4',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The settings below will apply only to the header style 5.', 'foxiz' ),
				],
				[
					'id'     => 'section_start_hd5_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'       => 'hd5_more',
					'title'    => esc_html__( 'More Menu Button', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable the more button at the end of the navigation.', 'foxiz' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'hd5_header_socials',
					'title'    => esc_html__( 'Social Icons', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable the social icons list at the end of the navigation.', 'foxiz' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'     => 'section_end_hd5_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_nav_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Styles', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'       => 'hd5_width',
					'title'    => esc_html__( 'Width Style', 'foxiz' ),
					'subtitle' => esc_html__( 'Max width style for this header and navigation.', 'foxiz' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Full Width (100%)', 'foxiz' ),
						'wrapper' => esc_html__( 'Wrapper (1240px)', 'foxiz' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'hd5_nav_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Styles', 'foxiz' ),
					'subtitle' => esc_html__( 'Select navigation bar style for these header styles.', 'foxiz' ),
					'options'  => [
						'shadow'           => esc_html__( 'Shadow', 'foxiz' ),
						'border'           => esc_html__( 'Bottom Border', 'foxiz' ),
						'tb-border'        => esc_html__( 'Top & Bottom Border', 'foxiz' ),
						'd-border'         => esc_html__( 'Dark Bottom Border', 'foxiz' ),
						'tbd-border'       => esc_html__( 'Dark Top & Bottom Border', 'foxiz' ),
						'tb-shadow-border' => esc_html__( 'Border Top & Bottom Shadow', 'foxiz' ),
						'none'             => esc_html__( 'None', 'foxiz' ),
					],
					'default'  => 'border',
				],
				[
					'id'          => 'hd5_height',
					'title'       => esc_html__( 'Navigation Height', 'foxiz' ),
					'subtitle'    => esc_html__( 'Input a custom value (in pixels) for the navigation height.', 'foxiz' ),
					'placeholder' => '40',
					'type'        => 'text',
					'default'     => '',
				],
				[
					'id'          => 'hd5_logo_height',
					'title'       => esc_html__( 'Logo Max Height', 'foxiz' ),
					'subtitle'    => esc_html__( 'Input a max height value for the logo of this header.', 'foxiz' ),
					'placeholder' => '60',
					'type'        => 'text',
					'default'     => '',
				],
				[
					'id'       => 'hd5_sub_scheme',
					'type'     => 'select',
					'title'    => esc_html__( 'Mega Menu - Text Color Scheme', 'foxiz' ),
					'subtitle' => esc_html__( 'In case you would like to switch layout and text to light when set a dark background for sub menu in light mode.', 'foxiz' ),
					'options'  => [
						'0' => esc_html__( 'Default (Dark Text)', 'foxiz' ),
						'1' => esc_html__( 'Light Text', 'foxiz' ),
					],
					'default'  => '0',
				],
				[
					'id'     => 'section_end_hd5_nav_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_hd5_nav_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Colors', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'hd5_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Navigation Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the navigation bar of this header.', 'foxiz' ),
					'description' => esc_html__( 'use the option "To" to set a gradient background.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'hd5_color',
					'title'       => esc_html__( 'Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in the navigation bar of this header.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd5_color_hover',
					'title'       => esc_html__( 'Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd5_color_hover_accent',
					'title'       => esc_html__( 'Hover Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a accent color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd5_sub_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Sub Menu - Background Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the sub menu and other dropdown sections of this header.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'hd5_sub_color',
					'title'       => esc_html__( 'Sub Menu - Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in sub menus and other dropdown sections of this header.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'hd5_sub_color_hover',
					'title'       => esc_html__( 'Sub Menu - Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_hd5_nav_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				/** dark mode */
				[
					'id'     => 'section_start_hd5_dark_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Dark Mode Colors', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'dark_hd5_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Navigation Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the navigation bar of this header in dark mode.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '#191c20',
						'to'   => '',
					],
				],
				[
					'id'          => 'dark_hd5_color',
					'title'       => esc_html__( 'Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in the navigation bar of this header in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd5_color_hover',
					'title'       => esc_html__( 'Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd5_color_hover_accent',
					'title'       => esc_html__( 'Hover Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a accent color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd5_sub_background',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Sub Menu - Background Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background color for the sub menu and other dropdown sections of this header in dark mode.', 'foxiz' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => [
						'from' => '',
						'to'   => '',
					],
				],
				[
					'id'          => 'dark_hd5_sub_color',
					'title'       => esc_html__( 'Sub Menu - Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color for displaying in sub menus and other dropdown sections of this header in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_hd5_sub_color_hover',
					'title'       => esc_html__( 'Sub Menu - Hover Text Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a text color when hovering in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_hd5_dark_colors',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}