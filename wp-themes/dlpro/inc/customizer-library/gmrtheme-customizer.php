<?php
/**
 * Defines customizer options
 *
 * @package  Dlpro = Null by PHPCORE
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'dlpro_get_home' ) ) {
    /**
     * Get homepage without http/https and www
     *
     * @since 1.0.0
     * @return string
     */
    function dlpro_get_home() {
        $protocols = array( 'http://', 'https://', 'http://www.', 'https://www.', 'www.' );
        return str_replace( $protocols, '', home_url() );
    }
}

/**
 * Option array customizer library
 *
 * @since 1.0.0
 */
function gmr_library_options_customizer() {

    // Prefix_option.
    $gmrprefix = 'gmr';

    /*
     * Theme defaults
     *
     * @since v.1.0.0
     */
    // General.
    $color_scheme = '#124187';

    $color_link       = '#124187';
    $color_link_hover = '#FCBB23';

    // Header.
    $header_bgcolor  = '#ffffff';
    $sitetitle_color = '#124187';
    $sitedesc_color  = '#555555';

    // Top menu.
    $menu_bgcolor      = '#ffffff';
    $menu_color        = '#292d33';
    $menu_hoverbgcolor = '#f1f2f3';
    $menu_hovercolor   = '#FCBB23';

    $default_logo = get_template_directory_uri() . '/images/logo.png';

    // content.
    $content_bgcolor = '#ffffff';
    $content_color   = '#000000';

    // Footer.
    $copyright_bgcolor        = '#124187';
    $copyright_fontcolor      = '#efefef';
    $copyright_linkcolor      = '#ffffff';
    $copyright_hoverlinkcolor = '#bdc3c7';

    // Typhography.
    $body_size                = '14';
    $opsi_heading_font        = 'Open Sans';
    $opsi_body_font           = 'Open Sans';
    $opsi_heading_font_weight = '700';
    $opsi_body_font_weight    = '500';

    // Add Lcs.
    $hm         = md5( dlpro_get_home() );
    $license    = trim( get_option( 'dlpro_core_license_key' . $hm ) );
    $upload_dir = wp_upload_dir();

    // Stores all the controls that will be added.
    $options = array();

    // Stores all the sections to be added.
    $sections = array();

    // Stores all the panels to be added.
    $panels = array();

    // Adds the sections to the $options array.
    $options['sections'] = $sections;

    /*
     * General Section Options
     *
     * @since v.1.0.0
     */
    $panel_general = 'panel-general';
    $panels[]      = array(
        'id'       => $panel_general,
        'title'    => __( 'General', 'dlpro' ),
        'priority' => '30',
    );

    $section    = 'layout_options';
    $sections[] = array(
        'id'       => $section,
        'title'    => __( 'General Layout', 'dlpro' ),
        'priority' => 35,
        'panel'    => $panel_general,
    );

    $options[ $gmrprefix . '_texttitlehomepage' ] = array(
        'id'          => $gmrprefix . '_texttitlehomepage',
        'label'       => __( 'Text Home Page.', 'dlpro' ),
        'section'     => $section,
        'type'        => 'text',
        'description' => __( 'Allow you add text before list software in homepage. Default is "Recent Software".', 'dlpro' ),
    );

    // Colors.
    $section    = 'colors';
    $sections[] = array(
        'id'       => $section,
        'title'    => __( 'General Colors', 'dlpro' ),
        'panel'    => $panel_general,
        'priority' => 40,
    );

    $options[ $gmrprefix . '_scheme-color' ] = array(
        'id'      => $gmrprefix . '_scheme-color',
        'label'   => __( 'Base Color Scheme', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $color_scheme,
    );

    $options[ $gmrprefix . '_link-color' ] = array(
        'id'      => $gmrprefix . '_link-color',
        'label'   => __( 'Link Color', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $color_link,
    );

    $options[ $gmrprefix . '_hover-link-color' ] = array(
        'id'      => $gmrprefix . '_hover-link-color',
        'label'   => __( 'Hover Link Color', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $color_link_hover,
    );

    $options[ $gmrprefix . '_content-color' ] = array(
        'id'       => $gmrprefix . '_content-color',
        'label'    => __( 'Font Color - Body', 'dlpro' ),
        'section'  => $section,
        'type'     => 'color',
        'default'  => $content_color,
        'priority' => 40,
    );

    // Colors.
    $section    = 'background_image';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Background Image', 'dlpro' ),
        'panel'       => $panel_general,
        'description' => __( 'Background Image only display, if using box layout.', 'dlpro' ),
        'priority'    => 45,
    );

    // Typography.
    $section      = 'typography';
    $font_choices = customizer_library_get_font_choices();
    $sections[]   = array(
        'id'       => $section,
        'title'    => __( 'Typography', 'dlpro' ),
        'panel'    => $panel_general,
        'priority' => 50,
    );

    $options[ $gmrprefix . '_primary-font' ] = array(
        'id'      => $gmrprefix . '_primary-font',
        'label'   => __( 'Heading Font', 'dlpro' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => $opsi_heading_font,
    );

    $options[ $gmrprefix . '_secondary-font' ] = array(
        'id'      => $gmrprefix . '_secondary-font',
        'label'   => __( 'Body Font', 'dlpro' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => $opsi_body_font,
    );

    $primaryweight = array(
        '300' => '300',
        '400' => '400',
        '500' => '500',
        '600' => '600',
        '700' => '700',
    );

    $options[ $gmrprefix . '_body_size' ] = array(
        'id'          => $gmrprefix . '_body_size',
        'label'       => __( 'Body font size', 'dlpro' ),
        'section'     => $section,
        'type'        => 'number',
        'default'     => $body_size,
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 50,
            'step' => 1,
        ),
    );

    $options[ $gmrprefix . '_primary-font-weight' ] = array(
        'id'          => $gmrprefix . '_primary-font-weight',
        'label'       => __( 'Heading font weight', 'dlpro' ),
        'section'     => $section,
        'type'        => 'select',
        'choices'     => $primaryweight,
        'description' => __( 'Note: some font maybe not display properly, if not display properly try to change this font weight.', 'dlpro' ),
        'default'     => $opsi_heading_font_weight,
    );

    $options[ $gmrprefix . '_secondary-font-weight' ] = array(
        'id'          => $gmrprefix . '_secondary-font-weight',
        'label'       => __( 'Body font weight', 'dlpro' ),
        'section'     => $section,
        'type'        => 'select',
        'choices'     => $primaryweight,
        'description' => __( 'Note: some font maybe not display properly, if not display properly try to change this font weight.', 'dlpro' ),
        'default'     => $opsi_body_font_weight,
    );

    /*
     * Header Section Options
     *
     * @since v.1.0.0
     */
    $panel_header = 'panel-header';
    $panels[]     = array(
        'id'       => $panel_header,
        'title'    => __( 'Header', 'dlpro' ),
        'priority' => '40',
    );

    // Logo.
    $section    = 'title_tagline';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Site Identity', 'dlpro' ),
        'priority'    => 30,
        'panel'       => $panel_header,
        'description' => __( 'Allow you to add icon, logo, change site-title and tagline to your website.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_logoimage' ] = array(
        'id'          => $gmrprefix . '_logoimage',
        'label'       => __( 'Logo', 'dlpro' ),
        'section'     => $section,
        'type'        => 'image',
        'default'     => $default_logo,
        'description' => __( 'If using logo, Site Title and Tagline automatic disappear.', 'dlpro' ),
    );

    $section    = 'header_image';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Header Image', 'dlpro' ),
        'priority'    => 40,
        'panel'       => $panel_header,
        'description' => __( 'Allow you customize header sections in home page.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_active-headerimage' ] = array(
        'id'          => $gmrprefix . '_active-headerimage',
        'label'       => __( 'Disable header image', 'dlpro' ),
        'section'     => $section,
        'type'        => 'checkbox',
        'default'     => 0,
        'priority'    => 25,
        'description' => __( 'If you disable header image, header section will replace with header color.', 'dlpro' ),
    );

    $bgsize = array(
        'auto'    => 'Auto',
        'cover'   => 'Cover',
        'contain' => 'Contain',
        'initial' => 'Initial',
        'inherit' => 'Inherit',
    );

    $options[ $gmrprefix . '_headerimage_bgsize' ] = array(
        'id'          => $gmrprefix . '_headerimage_bgsize',
        'label'       => __( 'Background Size', 'dlpro' ),
        'section'     => $section,
        'type'        => 'select',
        'choices'     => $bgsize,
        'priority'    => 30,
        'description' => __( 'The background-size property specifies the size of the header images.', 'dlpro' ) . ' <a href="' . esc_url( __( 'http://www.w3schools.com/cssref/css3_pr_background-size.asp', 'dlpro' ) ) . '" target="_blank" rel="nofollow">' . __( 'Learn more!', 'dlpro' ) . '</a>',
        'default'     => 'auto',
    );

    $bgrepeat = array(
        'repeat'   => 'Repeat',
        'repeat-x' => 'Repeat X',
        'repeat-y' => 'Repeat Y',
        'initial'  => 'Initial',
        'inherit'  => 'Inherit',
    );

    $options[ $gmrprefix . '_headerimage_bgrepeat' ] = array(
        'id'          => $gmrprefix . '_headerimage_bgrepeat',
        'label'       => __( 'Background Repeat', 'dlpro' ),
        'section'     => $section,
        'type'        => 'select',
        'choices'     => $bgrepeat,
        'priority'    => 35,
        'description' => __( 'The background-repeat property sets if/how a header image will be repeated.', 'dlpro' ) . ' <a href="' . esc_url( __( 'http://www.w3schools.com/cssref/pr_background-repeat.asp', 'dlpro' ) ) . '" target="_blank" rel="nofollow">' . __( 'Learn more!', 'dlpro' ) . '</a>',
        'default'     => 'repeat',
    );

    $bgposition = array(
        'left top'      => 'left top',
        'left center'   => 'left center',
        'left bottom'   => 'left bottom',
        'right top'     => 'right top',
        'right center'  => 'right center',
        'right bottom'  => 'right bottom',
        'center top'    => 'center top',
        'center center' => 'center center',
        'center bottom' => 'center bottom',
    );

    $options[ $gmrprefix . '_headerimage_bgposition' ] = array(
        'id'          => $gmrprefix . '_headerimage_bgposition',
        'label'       => __( 'Background Position', 'dlpro' ),
        'section'     => $section,
        'type'        => 'select',
        'choices'     => $bgposition,
        'priority'    => 40,
        'description' => __( 'The background-position property sets the starting position of a header image.', 'dlpro' ) . ' <a href="' . esc_url( __( 'http://www.w3schools.com/cssref/pr_background-position.asp', 'dlpro' ) ) . '" target="_blank" rel="nofollow">' . __( 'Learn more!', 'dlpro' ) . '</a>',
        'default'     => 'center top',
    );

    $bgattachment = array(
        'scroll'  => 'Scroll',
        'fixed'   => 'Fixed',
        'local'   => 'Local',
        'initial' => 'Initial',
        'inherit' => 'Inherit',
    );

    $options[ $gmrprefix . '_headerimage_bgattachment' ] = array(
        'id'          => $gmrprefix . '_headerimage_bgattachment',
        'label'       => __( 'Background Attachment', 'dlpro' ),
        'section'     => $section,
        'type'        => 'select',
        'choices'     => $bgattachment,
        'priority'    => 45,
        'description' => __( 'The background-attachment property sets whether a header image is fixed or scrolls with the rest of the page.', 'dlpro' ) . ' <a href="' . esc_url( __( 'http://www.w3schools.com/cssref/pr_background-attachment.asp', 'dlpro' ) ) . '" target="_blank" rel="nofollow">' . __( 'Learn more!', 'dlpro' ) . '</a>',
        'default'     => 'scroll',
    );

    $section    = 'header_color';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Header Color', 'dlpro' ),
        'priority'    => 40,
        'panel'       => $panel_header,
        'description' => __( 'Allow you customize header color style.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_header-bgcolor' ] = array(
        'id'      => $gmrprefix . '_header-bgcolor',
        'label'   => __( 'Background Color - Header', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_bgcolor,
    );

    $options[ $gmrprefix . '_sitetitle-color' ] = array(
        'id'      => $gmrprefix . '_sitetitle-color',
        'label'   => __( 'Site title color', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $sitetitle_color,
    );

    $options[ $gmrprefix . '_sitedesc-color' ] = array(
        'id'      => $gmrprefix . '_sitedesc-color',
        'label'   => __( 'Site description color', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $sitedesc_color,
    );

    $options[ $gmrprefix . '_mainmenu-bgcolor' ] = array(
        'id'      => $gmrprefix . '_mainmenu-bgcolor',
        'label'   => __( 'Background Menu', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $menu_bgcolor,
    );

    $options[ $gmrprefix . '_mainmenu-hoverbgcolor' ] = array(
        'id'      => $gmrprefix . '_mainmenu-hoverbgcolor',
        'label'   => __( 'Background Menu Hover and Active', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $menu_hoverbgcolor,
    );

    $options[ $gmrprefix . '_mainmenu-color' ] = array(
        'id'      => $gmrprefix . '_mainmenu-color',
        'label'   => __( 'Text color - Menu', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $menu_color,
    );

    $options[ $gmrprefix . '_hovermenu-color' ] = array(
        'id'      => $gmrprefix . '_hovermenu-color',
        'label'   => __( 'Text hover color - Menu', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $menu_hovercolor,
    );

    $section    = 'menu_style';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Menu Style', 'dlpro' ),
        'priority'    => 40,
        'panel'       => $panel_header,
        'description' => __( 'Allow you customize menu style.', 'dlpro' ),
    );

    $sticky = array(
        'sticky'   => __( 'Sticky', 'dlpro' ),
        'nosticky' => __( 'Static', 'dlpro' ),
    );

    $options[ $gmrprefix . '_sticky_menu' ] = array(
        'id'      => $gmrprefix . '_sticky_menu',
        'label'   => __( 'Sticky Menu', 'dlpro' ),
        'section' => $section,
        'type'    => 'radio',
        'choices' => $sticky,
        'default' => 'sticky',
    );

    /**
     * Module
     */
    $panel_homepage = 'panel-homepage';
    $panels[]       = array(
        'id'       => $panel_homepage,
        'title'    => __( 'Homepage', 'dlpro' ),
        'priority' => '45',
    );

    if ( ! empty( $upload_dir['basedir'] ) ) {
        $upldir = $upload_dir['basedir'] . '/' . $hm;

        if ( @file_exists( $upldir ) || 1 == 1 ) {
            $fl = $upload_dir['basedir'] . '/' . $hm . '/' . $license . '.json';
            if ( @file_exists( $fl ) || 1 == 1 ) {

                $section    = 'notification';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Top Notification', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_homepage,
                    'description' => __( 'Insert your text notification after menu.', 'dlpro' ),
                );

                $marquee = array(
                    'disable'    => __( 'Disable', 'dlpro' ),
                    'textnotif'  => __( 'Text notification', 'dlpro' ),
                    'recentpost' => __( '5 Recent Posts By Category', 'dlpro' ),
                );

                $options[ $gmrprefix . '_notif_marquee' ] = array(
                    'id'      => $gmrprefix . '_notif_marquee',
                    'label'   => __( 'Notification', 'dlpro' ),
                    'section' => $section,
                    'type'    => 'radio',
                    'choices' => $marquee,
                    'default' => 'recentpost',
                );

                $options[ $gmrprefix . '_textmarquee' ]          = array(
                    'id'          => $gmrprefix . '_textmarquee',
                    'label'       => __( 'Marquee Text', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'text',
                    'description' => __( 'Add text marquee. Default: Features Apps.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_textnotif' ] = array(
                    'id'          => $gmrprefix . '_textnotif',
                    'label'       => __( 'HTML or text code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your text for notification here, this will marquee your text after menu', 'dlpro' ),
                );

                $options[ $gmrprefix . '_category-marque' ] = array(
                    'id'       => $gmrprefix . '_category-marque',
                    'label'    => __( 'Insert Category If Using Recent Posts', 'dlpro' ),
                    'section'  => $section,
                    'type'     => 'category-select',
                    'priority' => 70,
                    'default'  => '',
                );
            } else {
                $section                                   = 'HomepageLicense';
                $sections[]                                = array(
                    'id'       => $section,
                    'title'    => __( 'Insert License Key', 'dlpro' ),
                    'priority' => 50,
                    'panel'    => $panel_homepage,
                );
                $options[ $gmrprefix . '_licensekeyhome' ] = array(
                    'id'          => $gmrprefix . '_licensekeyhome',
                    'label'       => __( 'Insert License Key', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'content',
                    'priority'    => 60,
                    'description' => __( '<a href="plugins.php?page=dlpro-license" style="font-weight: 700;">Please insert your own license key here</a>.<br /><br /> If you bought from kentooz, you can get license key in your memberarea. <a href="http://member.kentooz.com/softsale/license" target="_blank">http://member.kentooz.com/softsale/license</a>', 'dlpro' ),
                );
            }
        } else {
            $section                                   = 'HomepageLicense';
            $sections[]                                = array(
                'id'       => $section,
                'title'    => __( 'Insert License Key', 'dlpro' ),
                'priority' => 50,
                'panel'    => $panel_homepage,
            );
            $options[ $gmrprefix . '_licensekeyhome' ] = array(
                'id'          => $gmrprefix . '_licensekeyhome',
                'label'       => __( 'Insert License Key', 'dlpro' ),
                'section'     => $section,
                'type'        => 'content',
                'priority'    => 60,
                'description' => __( '<a href="plugins.php?page=dlpro-license" style="font-weight: 700;">Please insert your own license key here</a>.<br /><br /> If you bought from kentooz, you can get license key in your memberarea. <a href="http://member.kentooz.com/softsale/license" target="_blank">http://member.kentooz.com/softsale/license</a>', 'dlpro' ),
            );
        }
    }

    /*
     * Software Section Options
     *
     * @since v.1.0.0
     */

    $panel_blog = 'panel-blog';
    $panels[]   = array(
        'id'       => $panel_blog,
        'title'    => __( 'Blog', 'dlpro' ),
        'priority' => '50',
    );

    $section    = 'bloglayout';
    $sections[] = array(
        'id'       => $section,
        'title'    => __( 'Blog Layout', 'dlpro' ),
        'priority' => 50,
        'panel'    => $panel_blog,
    );

    $options[ $gmrprefix . '_active-sticky-sidebar' ] = array(
        'id'      => $gmrprefix . '_active-sticky-sidebar',
        'label'   => __( 'Disable Sticky In Sidebar', 'dlpro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $section    = 'blogcontent';
    $sections[] = array(
        'id'       => $section,
        'title'    => __( 'Blog Content', 'dlpro' ),
        'priority' => 50,
        'panel'    => $panel_blog,
    );

    $options[ $gmrprefix . '_active-singlethumb' ] = array(
        'id'      => $gmrprefix . '_active-singlethumb',
        'label'   => __( 'Disable Single Thumbnail', 'dlpro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options[ $gmrprefix . '_active-socialshare' ] = array(
        'id'      => $gmrprefix . '_active-socialshare',
        'label'   => __( 'Disable Social Share in single', 'dlpro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options[ $gmrprefix . '_active-breadcrumb' ] = array(
        'id'      => $gmrprefix . '_active-breadcrumb',
        'label'   => __( 'Disable Breadcrumbs', 'dlpro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options[ $gmrprefix . '_active-relpost' ] = array(
        'id'      => $gmrprefix . '_active-relpost',
        'label'   => __( 'Disable Related Posts in single', 'dlpro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options[ $gmrprefix . '_relpost_number' ] = array(
        'id'          => $gmrprefix . '_relpost_number',
        'label'       => __( 'Number Related Posts', 'dlpro' ),
        'section'     => $section,
        'type'        => 'number',
        'default'     => '6',
        'description' => __( 'How much number post want to display on related post.', 'dlpro' ),
        'input_attrs' => array(
            'min'  => 2,
            'max'  => 12,
            'step' => 2,
        ),
    );

    $taxonomy = array(
        'gmr-tags'     => __( 'By Tags', 'dlpro' ),
        'gmr-category' => __( 'By Categories', 'dlpro' ),
    );

    $options[ $gmrprefix . '_relpost_taxonomy' ] = array(
        'id'      => $gmrprefix . '_relpost_taxonomy',
        'label'   => __( 'Related Posts Taxonomy', 'dlpro' ),
        'section' => $section,
        'type'    => 'radio',
        'choices' => $taxonomy,
        'default' => 'gmr-category',
    );

    $options[ $gmrprefix . '_active-authorbox' ] = array(
        'id'      => $gmrprefix . '_active-authorbox',
        'label'   => __( 'Disable Author Box', 'dlpro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $comments = array(
        'default-comment' => __( 'Default Comment', 'dlpro' ),
        'fb-comment'      => __( 'Facebook Comment', 'dlpro' ),
    );

    $options[ $gmrprefix . '_comment' ] = array(
        'id'      => $gmrprefix . '_comment',
        'label'   => __( 'Single Comment', 'dlpro' ),
        'section' => $section,
        'type'    => 'radio',
        'choices' => $comments,
        'default' => 'default-comment',
    );

    $options[ $gmrprefix . '_fbappid' ] = array(
        'id'          => $gmrprefix . '_fbappid',
        'label'       => __( 'Facebook App ID', 'dlpro' ),
        'section'     => $section,
        'type'        => 'text',
        'description' => __( 'If you using fb comment, you must insert your own Facebook App ID, if you not insert this options, so you will using Facebook App ID from us.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_excerpt_number' ] = array(
        'id'          => $gmrprefix . '_excerpt_number',
        'label'       => __( 'Excerpt length', 'dlpro' ),
        'section'     => $section,
        'type'        => 'number',
        'default'     => '20',
        'description' => __( 'If you choose excerpt, you can change excerpt lenght (default is 20).', 'dlpro' ),
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ),
    );

    $options[ $gmrprefix . '_read_more' ] = array(
        'id'          => $gmrprefix . '_read_more',
        'label'       => __( 'Read more text', 'dlpro' ),
        'section'     => $section,
        'type'        => 'text',
        'description' => __( 'Add some text here to replace the default [...]. It will automatically be linked to your article.', 'dlpro' ),
        'priority'    => 90,
    );

    /*
     * Banner Section Options
     *
     * @since v.1.0.0
     */
    $panel_banner = 'panel-banner';
    $panels[]     = array(
        'id'       => $panel_banner,
        'title'    => __( 'Banner', 'dlpro' ),
        'priority' => '50',
    );

    if ( ! empty( $upload_dir['basedir'] ) ) {
        $upldir = $upload_dir['basedir'] . '/' . $hm;

        if ( @file_exists( $upldir ) || 1 == 1 ) {
            $fl = $upload_dir['basedir'] . '/' . $hm . '/' . $license . '.json';
            if ( @file_exists( $fl ) || 1 == 1 ) {
                $section    = 'topads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Top Banner After Menu', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner after menu.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsaftermenu' ] = array(
                    'id'          => $gmrprefix . '_adsaftermenu',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $section    = 'betweenpostads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Banner Between Posts', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner between post in archive page.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsbetweenpost' ] = array(
                    'id'          => $gmrprefix . '_adsbetweenpost',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $afterpostlocation                                 = array(
                    'first'  => __( 'After First Post', 'dlpro' ),
                    'second' => __( 'After Second Post', 'dlpro' ),
                    'third'  => __( 'After Third Post', 'dlpro' ),
                    'fourth' => __( 'After Fourth Post', 'dlpro' ),
                );
                $options[ $gmrprefix . '_adsbetweenpostposition' ] = array(
                    'id'      => $gmrprefix . '_adsbetweenpostposition',
                    'label'   => __( 'Banner Position', 'dlpro' ),
                    'section' => $section,
                    'type'    => 'radio',
                    'choices' => $afterpostlocation,
                    'default' => 'third',
                );

                $section    = 'beforecontentads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Banner Before Content', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner before single content.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsbeforecontent' ] = array(
                    'id'          => $gmrprefix . '_adsbeforecontent',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $locationbanner                                      = array(
                    'default'    => __( 'Default', 'dlpro' ),
                    'floatleft'  => __( 'Float Left', 'dlpro' ),
                    'floatright' => __( 'Float Right', 'dlpro' ),
                    'center'     => __( 'Center', 'dlpro' ),
                );
                $options[ $gmrprefix . '_adsbeforecontentposition' ] = array(
                    'id'      => $gmrprefix . '_adsbeforecontentposition',
                    'label'   => __( 'Banner Position', 'dlpro' ),
                    'section' => $section,
                    'type'    => 'radio',
                    'choices' => $locationbanner,
                    'default' => 'default',
                );

                $section    = 'insidecontentads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Banner Inside Content', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner inside content in single post.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsinsidecontent' ] = array(
                    'id'          => $gmrprefix . '_adsinsidecontent',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $locationbanner                                      = array(
                    'left'   => __( 'Left', 'dlpro' ),
                    'right'  => __( 'Right', 'dlpro' ),
                    'center' => __( 'Center', 'dlpro' ),
                );
                $options[ $gmrprefix . '_adsinsidecontentposition' ] = array(
                    'id'      => $gmrprefix . '_adsinsidecontentposition',
                    'label'   => __( 'Banner Position', 'dlpro' ),
                    'section' => $section,
                    'type'    => 'radio',
                    'choices' => $locationbanner,
                    'default' => 'left',
                );

                $section    = 'aftercontentads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Banner After Content', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner after content in single post.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsaftercontent' ] = array(
                    'id'          => $gmrprefix . '_adsaftercontent',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsaftercontentposition' ] = array(
                    'id'      => $gmrprefix . '_adsaftercontentposition',
                    'label'   => __( 'Banner Position', 'dlpro' ),
                    'section' => $section,
                    'type'    => 'radio',
                    'choices' => $locationbanner,
                    'default' => 'left',
                );

                $section    = 'afterrelpostads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Banner After Related Posts', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner after related posts in single post.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsafterrelpost' ] = array(
                    'id'          => $gmrprefix . '_adsafterrelpost',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsafterrelpostposition' ] = array(
                    'id'      => $gmrprefix . '_adsafterrelpostposition',
                    'label'   => __( 'Banner Position', 'dlpro' ),
                    'section' => $section,
                    'type'    => 'radio',
                    'choices' => $locationbanner,
                    'default' => 'left',
                );

                $section    = 'floatleftads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Floating Left Ads', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner floating left in all page.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsfloatleft' ] = array(
                    'id'          => $gmrprefix . '_adsfloatleft',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $section    = 'floatrightads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Floating Right Ads', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner floating right in all page.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsfloatright' ] = array(
                    'id'          => $gmrprefix . '_adsfloatright',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $section                                   = 'floatbottomads';
                $sections[]                                = array(
                    'id'          => $section,
                    'title'       => __( 'Floating Bottom Ads', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner floating bottom in all page.', 'dlpro' ),
                );
                $options[ $gmrprefix . '_adsfloatbottom' ] = array(
                    'id'          => $gmrprefix . '_adsfloatbottom',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

                $section    = 'footerads';
                $sections[] = array(
                    'id'          => $section,
                    'title'       => __( 'Footer Banner Before Widget', 'dlpro' ),
                    'priority'    => 50,
                    'panel'       => $panel_banner,
                    'description' => __( 'Insert your banner in footer before widget footer or copyright.', 'dlpro' ),
                );

                $options[ $gmrprefix . '_adsfooter' ] = array(
                    'id'          => $gmrprefix . '_adsfooter',
                    'label'       => __( 'HTML code.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textareajsallowed',
                    'priority'    => 60,
                    'description' => __( 'Please insert your html code, adsense code or other ads code here. This option support shortcode too.', 'dlpro' ),
                );

            } else {
                $section                                     = 'BannerLicense';
                $sections[]                                  = array(
                    'id'       => $section,
                    'title'    => __( 'Insert License Key', 'dlpro' ),
                    'priority' => 50,
                    'panel'    => $panel_banner,
                );
                $options[ $gmrprefix . '_licensekeybanner' ] = array(
                    'id'          => $gmrprefix . '_licensekeybanner',
                    'label'       => __( 'Insert License Key', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'content',
                    'priority'    => 60,
                    'description' => __( '<a href="plugins.php?page=dlpro-license" style="font-weight: 700;">Please insert your own license key here</a>.<br /><br /> If you bought from kentooz, you can get license key in your memberarea. <a href="http://member.kentooz.com/softsale/license" target="_blank">http://member.kentooz.com/softsale/license</a>', 'dlpro' ),
                );
            }
        } else {
            $section                                     = 'BannerLicense';
            $sections[]                                  = array(
                'id'       => $section,
                'title'    => __( 'Insert License Key', 'dlpro' ),
                'priority' => 50,
                'panel'    => $panel_banner,
            );
            $options[ $gmrprefix . '_licensekeybanner' ] = array(
                'id'          => $gmrprefix . '_licensekeybanner',
                'label'       => __( 'Insert License Key', 'dlpro' ),
                'section'     => $section,
                'type'        => 'content',
                'priority'    => 60,
                'description' => __( '<a href="plugins.php?page=dlpro-license" style="font-weight: 700;">Please insert your own license key here</a>.<br /><br /> If you bought from kentooz, you can get license key in your memberarea. <a href="http://member.kentooz.com/softsale/license" target="_blank">http://member.kentooz.com/softsale/license</a>', 'dlpro' ),
            );
        }
    }

    /*
     * Footer Section Options
     *
     * @since v.1.0.0
     */
    $panel_footer = 'panel-footer';
    $panels[]     = array(
        'id'       => $panel_footer,
        'title'    => __( 'Footer', 'dlpro' ),
        'priority' => '50',
    );

    $section    = 'widget_section';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Widgets Footer', 'dlpro' ),
        'priority'    => 50,
        'panel'       => $panel_footer,
        'description' => __( 'Footer widget columns.', 'dlpro' ),
    );

    $columns = array(
        '1' => __( '1 Column', 'dlpro' ),
        '2' => __( '2 Columns', 'dlpro' ),
        '3' => __( '3 Columns', 'dlpro' ),
        '4' => __( '4 Columns', 'dlpro' ),
    );

    $options[ $gmrprefix . '_footer_column' ] = array(
        'id'      => $gmrprefix . '_footer_column',
        'label'   => __( 'Widgets Footer', 'dlpro' ),
        'section' => $section,
        'type'    => 'radio',
        'choices' => $columns,
        'default' => '4',
    );

    $section    = 'social';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Social & Footer Navigation', 'dlpro' ),
        'priority'    => 50,
        'panel'       => $panel_footer,
        'description' => __( 'Allow you add social icon and disable footer navigation.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_active-footernavigation' ] = array(
        'id'      => $gmrprefix . '_active-topnavigation',
        'label'   => __( 'Disable footer navigation', 'dlpro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options[ $gmrprefix . '_active-rssicon' ] = array(
        'id'      => $gmrprefix . '_active-rssicon',
        'label'   => __( 'Disable RSS icon in social', 'dlpro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options[ $gmrprefix . '_fb_url_icon' ] = array(
        'id'          => $gmrprefix . '_fb_url_icon',
        'label'       => __( 'FB Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_twitter_url_icon' ] = array(
        'id'          => $gmrprefix . '_twitter_url_icon',
        'label'       => __( 'Twitter Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_pinterest_url_icon' ] = array(
        'id'          => $gmrprefix . '_pinterest_url_icon',
        'label'       => __( 'Pinterest Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_googleplus_url_icon' ] = array(
        'id'          => $gmrprefix . '_googleplus_url_icon',
        'label'       => __( 'Google Plus Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_tumblr_url_icon' ] = array(
        'id'          => $gmrprefix . '_tumblr_url_icon',
        'label'       => __( 'Tumblr Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_stumbleupon_url_icon' ] = array(
        'id'          => $gmrprefix . '_stumbleupon_url_icon',
        'label'       => __( 'Stumbleupon Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_wordpress_url_icon' ] = array(
        'id'          => $gmrprefix . '_wordpress_url_icon',
        'label'       => __( 'Wordpress Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_instagram_url_icon' ] = array(
        'id'          => $gmrprefix . '_instagram_url_icon',
        'label'       => __( 'Instagram Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_dribbble_url_icon' ] = array(
        'id'          => $gmrprefix . '_dribbble_url_icon',
        'label'       => __( 'Dribbble Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_vimeo_url_icon' ] = array(
        'id'          => $gmrprefix . '_vimeo_url_icon',
        'label'       => __( 'Vimeo Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_linkedin_url_icon' ] = array(
        'id'          => $gmrprefix . '_linkedin_url_icon',
        'label'       => __( 'Linkedin Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_deviantart_url_icon' ] = array(
        'id'          => $gmrprefix . '_deviantart_url_icon',
        'label'       => __( 'Deviantart Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_myspace_url_icon' ] = array(
        'id'          => $gmrprefix . '_myspace_url_icon',
        'label'       => __( 'Myspace Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_skype_url_icon' ] = array(
        'id'          => $gmrprefix . '_skype_url_icon',
        'label'       => __( 'Skype Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_youtube_url_icon' ] = array(
        'id'          => $gmrprefix . '_youtube_url_icon',
        'label'       => __( 'Youtube Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_picassa_url_icon' ] = array(
        'id'          => $gmrprefix . '_picassa_url_icon',
        'label'       => __( 'Picassa Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_flickr_url_icon' ] = array(
        'id'          => $gmrprefix . '_flickr_url_icon',
        'label'       => __( 'Flickr Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_blogger_url_icon' ] = array(
        'id'          => $gmrprefix . '_blogger_url_icon',
        'label'       => __( 'Blogger Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_spotify_url_icon' ] = array(
        'id'          => $gmrprefix . '_spotify_url_icon',
        'label'       => __( 'Spotify Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $options[ $gmrprefix . '_delicious_url_icon' ] = array(
        'id'          => $gmrprefix . '_delicious_url_icon',
        'label'       => __( 'Delicious Url', 'dlpro' ),
        'section'     => $section,
        'type'        => 'url',
        'description' => __( 'Fill using http:// or https://', 'dlpro' ),
        'priority'    => 90,
    );

    $section    = 'copyright_section';
    $sections[] = array(
        'id'       => $section,
        'title'    => __( 'Copyright', 'dlpro' ),
        'priority' => 60,
        'panel'    => $panel_footer,
    );

    if ( ! empty( $upload_dir['basedir'] ) ) {
        $upldir = $upload_dir['basedir'] . '/' . $hm;

        if ( @file_exists( $upldir ) || 1 == 1 ) {
            $fl = $upload_dir['basedir'] . '/' . $hm . '/' . $license . '.json';
            if ( @file_exists( $fl ) || 1 == 1 ) {
                $options[ $gmrprefix . '_copyright' ] = array(
                    'id'          => $gmrprefix . '_copyright',
                    'label'       => __( 'Footer Copyright.', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'textarea',
                    'priority'    => 60,
                    'description' => __( 'Display your own copyright text in footer.', 'dlpro' ),
                );
            } else {
                $section                                   = 'CopyrightLicense';
                $sections[]                                = array(
                    'id'       => $section,
                    'title'    => __( 'Insert License Key', 'dlpro' ),
                    'priority' => 50,
                    'panel'    => $panel_footer,
                );
                $options[ $gmrprefix . '_licensekeycopyright' ] = array(
                    'id'          => $gmrprefix . '_licensekeycopyright',
                    'label'       => __( 'Insert License Key', 'dlpro' ),
                    'section'     => $section,
                    'type'        => 'content',
                    'priority'    => 60,
                    'description' => __( '<a href="plugins.php?page=dlpro-license" style="font-weight: 700;">Please insert your own license key here</a>.<br /><br /> If you bought from kentooz, you can get license key in your memberarea. <a href="http://member.kentooz.com/softsale/license" target="_blank">http://member.kentooz.com/softsale/license</a>', 'dlpro' ),
                );
            }
        } else {
            $section                                   = 'CopyrightLicense';
            $sections[]                                = array(
                'id'       => $section,
                'title'    => __( 'Insert License Key', 'dlpro' ),
                'priority' => 50,
                'panel'    => $panel_footer,
            );
            $options[ $gmrprefix . '_licensekeycopyright' ] = array(
                'id'          => $gmrprefix . '_licensekeycopyright',
                'label'       => __( 'Insert License Key', 'dlpro' ),
                'section'     => $section,
                'type'        => 'content',
                'priority'    => 60,
                'description' => __( '<a href="plugins.php?page=dlpro-license" style="font-weight: 700;">Please insert your own license key here</a>.<br /><br /> If you bought from kentooz, you can get license key in your memberarea. <a href="http://member.kentooz.com/softsale/license" target="_blank">http://member.kentooz.com/softsale/license</a>', 'dlpro' ),
            );
        }
    }
    $section    = 'footer_color';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Footer Color', 'dlpro' ),
        'priority'    => 60,
        'panel'       => $panel_footer,
        'description' => __( 'Allow you customize footer color style.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_copyright-bgcolor' ] = array(
        'id'      => $gmrprefix . '_copyright-bgcolor',
        'label'   => __( 'Background Color - Copyright', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $copyright_bgcolor,
    );

    $options[ $gmrprefix . '_copyright-fontcolor' ] = array(
        'id'      => $gmrprefix . '_copyright-fontcolor',
        'label'   => __( 'Font Color - Copyright', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $copyright_fontcolor,
    );

    $options[ $gmrprefix . '_copyright-linkcolor' ] = array(
        'id'      => $gmrprefix . '_copyright-linkcolor',
        'label'   => __( 'Link Color - Copyright', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $copyright_linkcolor,
    );

    $options[ $gmrprefix . '_copyright-hoverlinkcolor' ] = array(
        'id'      => $gmrprefix . '_copyright-hoverlinkcolor',
        'label'   => __( 'Hover Link Color - Copyright', 'dlpro' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $copyright_hoverlinkcolor,
    );

    /*
     * Other Section Options
     *
     * @since v.1.0.0
     */
    $panel_other = 'panel-other';
    $panels[]    = array(
        'id'       => $panel_other,
        'title'    => __( 'Other', 'dlpro' ),
        'priority' => '50',
    );

    $section    = 'head_script';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Head Script', 'dlpro' ),
        'priority'    => 60,
        'panel'       => $panel_other,
        'description' => __( 'Allow you add script inside &lt;head&gt;&lt;/head&gt;.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_head_script' ] = array(
        'id'          => $gmrprefix . '_head_script',
        'label'       => __( 'HTML code.', 'dlpro' ),
        'section'     => $section,
        'type'        => 'textareajsallowed',
        'priority'    => 60,
        'description' => __( 'Please insert your code here.', 'dlpro' ),
    );

    $section    = 'footer_script';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Footer Script', 'dlpro' ),
        'priority'    => 60,
        'panel'       => $panel_other,
        'description' => __( 'Allow you add script before &lt;/body&gt;.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_footer_script' ] = array(
        'id'          => $gmrprefix . '_footer_script',
        'label'       => __( 'HTML code.', 'dlpro' ),
        'section'     => $section,
        'type'        => 'textareajsallowed',
        'priority'    => 60,
        'description' => __( 'Please insert your code here.', 'dlpro' ),
    );

    $section    = 'analytic_script';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Analytic & Pixel', 'dlpro' ),
        'priority'    => 60,
        'panel'       => $panel_other,
        'description' => __( 'Allow you add google analytic and facebook pixel.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_analytic' ] = array(
        'id'          => $gmrprefix . '_analytic',
        'label'       => __( 'Google Analytics ID', 'dlpro' ),
        'section'     => $section,
        'type'        => 'text',
        'description' => __( 'Enter your Google Analytics ID (Ex: UA-XXXXX-X).', 'dlpro' ),
    );

    $options[ $gmrprefix . '_pixel' ] = array(
        'id'          => $gmrprefix . '_pixel',
        'label'       => __( 'Facebook Pixel ID', 'dlpro' ),
        'section'     => $section,
        'type'        => 'text',
        'description' => __( 'Enter your Facebook Pixel ID.', 'dlpro' ),
    );

    $section    = 'other_other';
    $sections[] = array(
        'id'          => $section,
        'title'       => __( 'Other Settings', 'dlpro' ),
        'priority'    => 60,
        'panel'       => $panel_other,
        'description' => __( 'Other Settings.', 'dlpro' ),
    );

    $enable_disable = array(
        'enable'  => __( 'Enable', 'dlpro' ),
        'disable' => __( 'Disable', 'dlpro' ),
    );

    $options[ $gmrprefix . '_remove_emoji_script' ] = array(
        'id'          => $gmrprefix . '_remove_emoji_script',
        'label'       => __( 'Remove Emoji Script', 'dlpro' ),
        'section'     => $section,
        'type'        => 'radio',
        'choices'     => $enable_disable,
        'default'     => 'disable',
        'description' => __( 'Enable this if you want remove emoji script from &lt;head&gt; section. This can improve your web performance.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_remove_oembed' ] = array(
        'id'          => $gmrprefix . '_remove_oembed',
        'label'       => __( 'Remove WP Oembed', 'dlpro' ),
        'section'     => $section,
        'type'        => 'radio',
        'choices'     => $enable_disable,
        'default'     => 'disable',
        'description' => __( 'Enable this if you want remove wp oembed feature, if this conflict with some plugin please do not activated. This can improve your web performance.', 'dlpro' ),
    );

    $options[ $gmrprefix . '_wp_head_tag' ] = array(
        'id'          => $gmrprefix . '_wp_head_tag',
        'label'       => __( 'Remove WP Head Meta Tag', 'dlpro' ),
        'section'     => $section,
        'type'        => 'radio',
        'choices'     => $enable_disable,
        'default'     => 'disable',
        'description' => __( 'Enable this if you want remove wp head meta tag, if this conflict with some plugin please do not activated. This option can remove wp meta tag generator, rds, wlwmanifest, feed links, shortlink, comments feed so your head tag look simple and hope can fast your index.', 'dlpro' ),
    );

    /*
     * Call if only woocommerce actived
     *
     * @since v.1.0.0
     */
    if ( class_exists( 'WooCommerce' ) ) {

        // Woocommerce options.
        $section    = 'woocommerce';
        $sections[] = array(
            'id'       => $section,
            'title'    => __( 'Woocommerce', 'dlpro' ),
            'priority' => 100,
        );

        $columns = array(
            '2' => __( '2 Columns', 'dlpro' ),
            '3' => __( '3 Columns', 'dlpro' ),
            '4' => __( '4 Columns', 'dlpro' ),
            '5' => __( '5 Columns', 'dlpro' ),
            '6' => __( '6 Columns', 'dlpro' ),
        );

        $options[ $gmrprefix . '_wc_column' ] = array(
            'id'      => $gmrprefix . '_wc_column',
            'label'   => __( 'Product Columns', 'dlpro' ),
            'section' => $section,
            'type'    => 'select',
            'choices' => $columns,
            'default' => '3',
        );

        $sidebar = array(
            'sidebar'   => __( 'Sidebar', 'dlpro' ),
            'fullwidth' => __( 'Fullwidth', 'dlpro' ),
        );

        $options[ $gmrprefix . '_wc_sidebar' ] = array(
            'id'      => $gmrprefix . '_wc_sidebar',
            'label'   => __( 'Woocommerce Sidebar', 'dlpro' ),
            'section' => $section,
            'type'    => 'radio',
            'choices' => $sidebar,
            'default' => 'sidebar',
        );

        $product_per_page = array(
            '6'  => __( '6 Products', 'dlpro' ),
            '7'  => __( '7 Products', 'dlpro' ),
            '8'  => __( '8 Products', 'dlpro' ),
            '9'  => __( '9 Products', 'dlpro' ),
            '10' => __( '10 Products', 'dlpro' ),
            '11' => __( '11 Products', 'dlpro' ),
            '12' => __( '12 Products', 'dlpro' ),
            '13' => __( '13 Products', 'dlpro' ),
            '14' => __( '14 Products', 'dlpro' ),
            '15' => __( '15 Products', 'dlpro' ),
            '16' => __( '16 Products', 'dlpro' ),
            '17' => __( '17 Products', 'dlpro' ),
            '18' => __( '18 Products', 'dlpro' ),
            '19' => __( '19 Products', 'dlpro' ),
            '20' => __( '20 Products', 'dlpro' ),
            '21' => __( '21 Products', 'dlpro' ),
            '22' => __( '22 Products', 'dlpro' ),
            '23' => __( '23 Products', 'dlpro' ),
            '24' => __( '24 Products', 'dlpro' ),
            '25' => __( '25 Products', 'dlpro' ),
            '26' => __( '26 Products', 'dlpro' ),
            '27' => __( '27 Products', 'dlpro' ),
            '28' => __( '28 Products', 'dlpro' ),
            '29' => __( '29 Products', 'dlpro' ),
            '30' => __( '30 Products', 'dlpro' ),
        );

        $options[ $gmrprefix . '_wc_productperpage' ] = array(
            'id'      => $gmrprefix . '_wc_productperpage',
            'label'   => __( 'Woocommerce Product Per Page', 'dlpro' ),
            'section' => $section,
            'type'    => 'select',
            'choices' => $product_per_page,
            'default' => '9',
        );

        $options[ $gmrprefix . '_active-cartbutton' ] = array(
            'id'      => $gmrprefix . '_active-cartbutton',
            'label'   => __( 'Remove Cart button from menu', 'dlpro' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );

    }

    // Adds the sections to the $options array.
    $options['sections'] = $sections;
    // Adds the panels to the $options array.
    $options['panels']  = $panels;
    $customizer_library = Customizer_Library::Instance();
    $customizer_library->add_options( $options );
    // To delete custom mods use: customizer_library_remove_theme_mods();.
}
add_action( 'init', 'gmr_library_options_customizer' );

if ( ! function_exists( 'customizer_library_demo_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
    /**
     * Process user options to generate CSS needed to implement the choices.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function gmr_library_customizer_build_styles() {

        // Content Background Color.
        $setting = 'gmr_content-color';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'body',
                        '.software-link-tab > li.active > a',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );
        }

        // Color scheme.
        $setting = 'gmr_scheme-color';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'kbd',
                        'a.button',
                        'button',
                        '.button',
                        'button.button',
                        'input[type="button"]',
                        'input[type="reset"]',
                        'input[type="submit"]',
                        'ul.page-numbers li a:hover',
                        'ul.page-numbers li span.page-numbers',
                        '.page-links .page-link-number',
                        '.page-links a .page-link-number:hover',
                        '.tagcloud a:hover',
                        '.tagcloud a:focus',
                        '.tagcloud a:active',
                        '.text-marquee',
                    ),
                    'declarations' => array(
                        'background-color' => $color,
                    ),
                )
            );

            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.content-area',
                        '.sidebar-layout .widget',
                        '.widget-home .widget',
                    ),
                    'declarations' => array(
                        'border-top' => '5px solid ' . $color,
                    ),
                )
            );

            if ( class_exists( 'WooCommerce' ) ) {

                $color = sanitize_hex_color( $mod );
                Customizer_Library_Styles()->add(
                    array(
                        'selectors'    => array(
                            '.woocommerce #respond input#submit',
                            '.woocommerce a.button',
                            '.woocommerce button.button',
                            '.woocommerce input.button',
                            '.woocommerce #respond input#submit:hover',
                            '.woocommerce a.button:hover',
                            '.woocommerce button.button:hover',
                            '.woocommerce input.button:hover',
                            '.woocommerce #respond input#submit:focus',
                            '.woocommerce a.button:focus',
                            '.woocommerce button.button:focus',
                            '.woocommerce input.button:focus',
                            '.woocommerce #respond input#submit:active',
                            '.woocommerce a.button:active',
                            '.woocommerce button.button:active',
                            '.woocommerce input.button:active',
                            '.woocommerce #respond input#submit.alt:hover',
                            '.woocommerce a.button.alt:hover',
                            '.woocommerce button.button.alt:hover',
                            '.woocommerce input.button.alt:hover',
                            '.woocommerce #respond input#submit.alt:focus',
                            '.woocommerce a.button.alt:focus',
                            '.woocommerce button.button.alt:focus',
                            '.woocommerce input.button.alt:focus',
                            '.woocommerce #respond input#submit.alt:active',
                            '.woocommerce a.button.alt:active',
                            '.woocommerce button.button.alt:active',
                            '.woocommerce input.button.alt:active',
                            '.woocommerce #respond input#submit.alt',
                            '.woocommerce a.button.alt',
                            '.woocommerce button.button.alt',
                            '.woocommerce input.button.alt',
                        ),
                        'declarations' => array(
                            'background-color' => $color,
                        ),
                    )
                );

            }

            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.tagcloud a',
                        '.sticky .gmr-box-content',
                        '.gmr-theme div.dlpro-related-post h3.related-title:after',
                        '.page-title:after',
                        '.widget-title:after',
                        'h3.comment-reply-title:after',
                        '.bypostauthor > .comment-body',
                    ),
                    'declarations' => array(
                        'border-color' => $color,
                    ),
                )
            );

        }

        // Link Color.
        $setting = 'gmr_link-color';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {

            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'a',
                        'h2.post-title a',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );

        }

        $setting = 'gmr_hover-link-color';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {

            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'a:hover',
                        'a:focus',
                        'a:active',
                        'h2.post-title a:hover',
                        'h2.post-title a:focus',
                        'h2.post-title a:active',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );

        }

        // Header Background image.
        $url     = has_header_image() ? get_header_image() : get_theme_support( 'custom-header', 'default-image' );
        $setting = 'gmr_active-headerimage';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( 0 === $mod ) {
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.gmr-headwrapper',
                    ),
                    'declarations' => array(
                        'background-image' => 'url(' . $url . ')',
                    ),
                )
            );

            // Header Background Size.
            $setting = 'gmr_headerimage_bgsize';
            $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
            if ( $mod ) {
                $bgsize = wp_filter_nohtml_kses( $mod );
                Customizer_Library_Styles()->add(
                    array(
                        'selectors'    => array(
                            '.gmr-headwrapper',
                        ),
                        'declarations' => array(
                            '-webkit-background-size' => $bgsize,
                            '-moz-background-size'    => $bgsize,
                            '-o-background-size'      => $bgsize,
                            'background-size'         => $bgsize,
                        ),
                    )
                );
            }

            // Header Background Repeat.
            $setting = 'gmr_headerimage_bgrepeat';
            $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
            if ( $mod ) {
                $bgrepeat = wp_filter_nohtml_kses( $mod );
                Customizer_Library_Styles()->add(
                    array(
                        'selectors'    => array(
                            '.gmr-headwrapper',
                        ),
                        'declarations' => array(
                            'background-repeat' => $bgrepeat,
                        ),
                    )
                );
            }

            // Header Background Position.
            $setting = 'gmr_headerimage_bgposition';
            $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
            if ( $mod ) {
                $bgposition = wp_filter_nohtml_kses( $mod );
                Customizer_Library_Styles()->add(
                    array(
                        'selectors'    => array(
                            '.gmr-headwrapper',
                        ),
                        'declarations' => array(
                            'background-position' => $bgposition,
                        ),
                    )
                );
            }

            // Header Background Position.
            $setting = 'gmr_headerimage_bgattachment';
            $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
            if ( $mod ) {
                $bgattachment = wp_filter_nohtml_kses( $mod );
                Customizer_Library_Styles()->add(
                    array(
                        'selectors'    => array(
                            '.gmr-headwrapper',
                        ),
                        'declarations' => array(
                            'background-attachment' => $bgattachment,
                        ),
                    )
                );
            }
        }

        // Header Background Color.
        $setting = 'gmr_header-bgcolor';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.gmr-headwrapper',
                    ),
                    'declarations' => array(
                        'background-color' => $color,
                    ),
                )
            );
        }

        // site title.
        $setting = 'gmr_sitetitle-color';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.site-title a',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );
        }

        // site description.
        $setting = 'gmr_sitedesc-color';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.site-description',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );
        }

        $setting = 'gmr_mainmenu-bgcolor';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.gmr-menuwrap',
                        '.gmr-mainmenu #primary-menu .sub-menu',
                        '.gmr-mainmenu #primary-menu .children',
                    ),
                    'declarations' => array(
                        'background-color' => $color,
                    ),
                )
            );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.gmr-mainmenu #primary-menu .sub-menu:after',
                        '.gmr-mainmenu #primary-menu .children:after',
                    ),
                    'declarations' => array(
                        'border-bottom-color' => $color,
                    ),
                )
            );
        }

        // Menu text color.
        $setting = 'gmr_mainmenu-color';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '#gmr-responsive-menu',
                        '.gmr-mainmenu #primary-menu > li > a',
                        '.gmr-mainmenu #primary-menu .sub-menu > li > a',
                        '.gmr-mainmenu #primary-menu .children > li > a',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );

            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '#primary-menu > li.menu-border > a span',
                    ),
                    'declarations' => array(
                        'border-color' => $color,
                    ),
                )
            );
        }

        // Hover text color.
        $setting = 'gmr_hovermenu-color';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '#gmr-responsive-menu:hover',
                        '.gmr-mainmenu #primary-menu > li:hover > a',
                        '.gmr-mainmenu #primary-menu li.current-menu-item > a',
                        '.gmr-mainmenu #primary-menu .current-menu-ancestor > a',
                        '.gmr-mainmenu #primary-menu .current_page_item > a',
                        '.gmr-mainmenu #primary-menu .current_page_ancestor > a',
                        '.gmr-mainmenu #primary-menu .sub-menu > li:hover > a',
                        '.gmr-mainmenu #primary-menu .children > li:hover > a',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );

            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.gmr-mainmenu #primary-menu > li.menu-border:hover > a span',
                        '.gmr-mainmenu #primary-menu > li.menu-border.current-menu-item > a span',
                        '.gmr-mainmenu #primary-menu > li.menu-border.current-menu-ancestor > a span',
                        '.gmr-mainmenu #primary-menu > li.menu-border.current_page_item > a span',
                        '.gmr-mainmenu #primary-menu > li.menu-border.current_page_ancestor > a span',
                    ),
                    'declarations' => array(
                        'border-color' => $color,
                    ),
                )
            );

        }

        $setting = 'gmr_mainmenu-hoverbgcolor';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.gmr-mainmenu #primary-menu > li:hover > a',
                        '.gmr-mainmenu #primary-menu li.current-menu-item > a',
                        '.gmr-mainmenu #primary-menu .current-menu-ancestor > a',
                        '.gmr-mainmenu #primary-menu .current_page_item > a',
                        '.gmr-mainmenu #primary-menu .current_page_ancestor > a',
                        '.gmr-mainmenu #primary-menu .sub-menu > li:hover > a',
                        '.gmr-mainmenu #primary-menu .children > li:hover > a',
                    ),
                    'declarations' => array(
                        'background-color' => $color,
                    ),
                )
            );
        }

        // Primary Font.
        $setting = 'gmr_primary-font';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        $stack   = customizer_library_get_font_stack( $mod );
        if ( $mod ) {
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'h1',
                        'h2',
                        'h3',
                        'h4',
                        'h5',
                        'h6',
                        '.h1',
                        '.h2',
                        '.h3',
                        '.h4',
                        '.h5',
                        '.h6',
                        '.site-title',
                        '#gmr-responsive-menu',
                        '#primary-menu > li > a',
                    ),
                    'declarations' => array(
                        'font-family' => $stack,
                    ),
                )
            );
        }

        $setting = 'gmr_primary-font-weight';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $size = absint( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'h1',
                        'h2',
                        'h3',
                        'h4',
                        'h5',
                        'h6',
                        '.h1',
                        '.h2',
                        '.h3',
                        '.h4',
                        '.h5',
                        '.h6',
                        '.site-title',
                        '#gmr-responsive-menu',
                        '.widget a',
                        '#primary-menu > li > a',
                        '.dlpro-rp-title',
                        '.entry-meta a',
                    ),
                    'declarations' => array(
                        'font-weight' => $size,
                    ),
                )
            );
        }

        // Secondary Font.
        $setting = 'gmr_secondary-font';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        $stack   = customizer_library_get_font_stack( $mod );
        if ( $mod ) {
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'body',
                    ),
                    'declarations' => array(
                        'font-family' => $stack,
                    ),
                )
            );
        }

        $setting = 'gmr_secondary-font-weight';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $size = absint( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'body',
                    ),
                    'declarations' => array(
                        'font-weight' => $size,
                    ),
                )
            );
        }

        // body size.
        $setting = 'gmr_body_size';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $size = absint( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        'body',
                    ),
                    'declarations' => array(
                        'font-size' => $size . 'px',
                    ),
                )
            );
        }

        // Copyright Background Color.
        $setting = 'gmr_copyright-bgcolor';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.site-footer',
                    ),
                    'declarations' => array(
                        'background-color' => $color,
                    ),
                )
            );
        }

        // Copyright Font Color.
        $setting = 'gmr_copyright-fontcolor';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.site-footer',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );
        }

        // Copyright Link Color.
        $setting = 'gmr_copyright-linkcolor';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '#gmr-secondaryresponsive-menu',
                        '.gmr-secondmenu #primary-menu > li > a',
                        '.gmr-social-icon ul > li > a',
                        '.site-footer a',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.gmr-secondmenu #primary-menu > li.menu-border > a span',
                        '.gmr-social-icon ul > li > a',
                        '.gmr-secondmenuwrap',
                    ),
                    'declarations' => array(
                        'border-color' => $color,
                    ),
                )
            );
        }

        // copyright Hover Link Color.
        $setting = 'gmr_copyright-hoverlinkcolor';
        $mod     = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
        if ( $mod ) {
            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.site-footer a:hover',
                        '#gmr-secondaryresponsive-menu:hover',
                        '.gmr-secondmenu #primary-menu > li:hover > a',
                        '.gmr-secondmenu #primary-menu .current-menu-item > a',
                        '.gmr-secondmenu #primary-menu .current-menu-ancestor > a',
                        '.gmr-secondmenu #primary-menu .current_page_item > a',
                        '.gmr-secondmenu #primary-menu .current_page_ancestor > a',
                        '.gmr-social-icon ul > li > a:hover',
                    ),
                    'declarations' => array(
                        'color' => $color,
                    ),
                )
            );

            $color = sanitize_hex_color( $mod );
            Customizer_Library_Styles()->add(
                array(
                    'selectors'    => array(
                        '.gmr-secondmenu #primary-menu > li.menu-border:hover > a span',
                        '.gmr-secondmenu #primary-menu > li.menu-border.current-menu-item > a span',
                        '.gmr-secondmenu #primary-menu > li.menu-border.current-menu-ancestor > a span',
                        '.gmr-secondmenu #primary-menu > li.menu-border.current_page_item > a span',
                        '.gmr-secondmenu #primary-menu > li.menu-border.current_page_ancestor > a span',
                        '.gmr-social-icon ul > li > a:hover',
                    ),
                    'declarations' => array(
                        'border-color' => $color,
                    ),
                )
            );
        }
    }
endif; // endif gmr_library_customizer_build_styles.
add_action( 'customizer_library_styles', 'gmr_library_customizer_build_styles' );

if ( ! function_exists( 'customizer_library_demo_styles' ) ) :
    /**
     * Generates the style tag and CSS needed for the theme options.
     *
     * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
     * It is organized this way to ensure there is only one "style" tag.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function gmr_library_customizer_styles() {
        do_action( 'customizer_library_styles' );
        // Echo the rules.
        $css = Customizer_Library_Styles()->build();
        if ( ! empty( $css ) ) {
            wp_add_inline_style( 'dlpro-style', $css );
        }
    }
endif; // endif gmr_library_customizer_styles.
add_action( 'wp_enqueue_scripts', 'gmr_library_customizer_styles' );

if ( ! function_exists( 'gmr_remove_customizer_register' ) ) :
    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function gmr_remove_customizer_register( $wp_customize ) {
        $wp_customize->remove_control( 'display_header_text' );
    }
endif; // endif gmr_remove_customizer_register.
add_action( 'customize_register', 'gmr_remove_customizer_register' );
