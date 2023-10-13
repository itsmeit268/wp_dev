<?php
$group_icon  = 'Icon';
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => "penci_image_gallery",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => penci_get_theme_name( 'Soledad' ),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/image_gallery/frontend.php',
	'weight'        => 775,
	'name'          => penci_get_theme_name( 'Penci' ) . ' ' . esc_html__( 'Image Gallery', 'soledad' ),
	'description'   => 'Image Gallery Block',
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Select style gallery display', 'soledad' ),
				'param_name' => 'style_gallery',
				'std'        => 's1',
				'value'      => array(
					__( 'Style 1 ( Grid )', 'soledad' )             => 's1',
					__( 'Style 2 ( Mixed )', 'soledad' )            => 's2',
					__( 'Style 3 ( Mixed 2 )', 'soledad' )          => 's3',
					__( 'Style 4 ( Justified )', 'soledad' )        => 'justified',
					__( 'Style 5 ( Masonry )', 'soledad' )          => 'masonry',
					__( 'Style 6 ( Slider )', 'soledad' )           => 'single-slider',
					__( 'Style 7 ( Thumbnail Slider )', 'soledad' ) => 'thumbnail-slider',
				),
			),
			array(
				'type'        => 'attach_images',
				'heading'     => __( 'Images', 'soledad' ),
				'param_name'  => 'images',
				'value'       => '',
				'description' => __( 'Select images from media library.', 'soledad' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Image Size', 'soledad' ),
				'param_name' => 'penci_img_size',
				'std'        => 'medium_large',
				'value'      => Penci_Vc_Params_Helper::get_list_image_sizes(),
				'dependency' => array( 'element' => 'style_gallery', 'value' => array( 's1', 's2', 's3' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Image Size for Big Image', 'soledad' ),
				'param_name' => 'penci_img_size_bitem',
				'std'        => 'penci-full-thumb',
				'value'      => Penci_Vc_Params_Helper::get_list_image_sizes(),
				'dependency' => array( 'element' => 'style_gallery', 'value' => array( 's2', 's3' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Image Type', 'soledad' ),
				'param_name' => 'penci_img_type',
				'value'      => array(
					__( '-- Default --', 'soledad' ) => '',
					__( 'Landscape', 'soledad' )     => 'landscape',
					__( 'Vertical', 'soledad' )      => 'vertical',
					__( 'Square', 'soledad' )        => 'square',
				),
				'dependency' => array( 'element' => 'style_gallery', 'value' => array( 's1', 's2', 's3' ) ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Caption', 'soledad' ),
				'param_name'       => 'caption_source',
				'value'            => array(
					__( 'Attachment Caption', 'soledad' ) => 'img',
					__( 'None', 'soledad' )               => 'none',
				),
				'std'              => 'img',
				'edit_field_class' => 'vc_col-sm-12',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Columns', 'soledad' ),
				'param_name' => 'gallery_columns',
				'value'      => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'std'        => '3',
				'dependency' => array( 'element' => 'style_gallery', 'value' => array( 's1', 'masonry' ) ),
			),
			array(
				'type'             => 'penci_slider',
				'param_name'       => 'row_gap',
				'heading'          => __( 'Rows Gap', 'soledad' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'       => array( 'element' => 'style_gallery', 'value' => array( 's1' ) ),
			),
			array(
				'type'             => 'penci_slider',
				'param_name'       => 'col_gap',
				'heading'          => __( 'Columns Gap', 'soledad' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'       => array( 'element' => 'style_gallery', 'value' => array( 's1' ) ),
			),
			array(
				'type'             => 'penci_responsive_sizes',
				'param_name'       => 'gallery_height',
				'heading'          => __( 'Custom the height of images', 'soledad' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'       => array( 'element' => 'style_gallery', 'value' => array( 'justified', 'masonry' ) ),

			),
			array(
				'type'        => 'penci_switch',
				'heading'     => esc_html__( 'Autoplay', 'soledad' ),
				'param_name'  => 'slider_autoplay',
				'true_state'  => 'yes',
				'false_state' => 'no',
				'default'     => 'no',
				'std'         => 'no',
				'dependency'  => array( 'element' => 'style_gallery', 'value' => array( 'single-slider' ) ),
			),
		),
		Penci_Vc_Params_Helper::heading_block_params(),
		Penci_Vc_Params_Helper::params_heading_typo_color(),
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_gallery_settings',
				'heading'          => esc_html__( 'Gallery', 'soledad' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icon Color', 'soledad' ),
				'param_name'       => 'p_icon_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'penci_responsive_sizes',
				'param_name' => 'p_icon_size',
				'heading'    => __( 'Size Icon', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'group'      => $group_color,
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Overlay Background Color', 'soledad' ),
				'param_name'       => 'p_overlay_bgcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
		),
		Penci_Vc_Params_Helper::extra_params()
	)
) );
