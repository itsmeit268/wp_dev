<?php
/*
=======================
 Woocommerce Settings
=======================
*/
Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Product Other Settings', 'steelthemes-nest' ),
        'id'     => 'woocommerce_product_other_settings',
        'desc'   => esc_html__( '', 'steelthemes-nest' ),
        'icon'   => 'el el-wrench',
       // 'subsection' => true ,
        'fields' => array(

            array(
                'id' => 'woocommerce-product-card-settings',
                'type' => 'section',
                'title' => __('Woocommerce   Settings', 'steelthemes-nest'),
                'indent' => true 
            ), 

            array(
                'id'       => 'show_add_to_cart',
                'type'     => 'switch', 
                'title'    => __('Show Addd to Cart button for Logged in users only', 'steelthemes-nest'),
                'default'  => false,
            ), 
            array(
                'id'       => 'catalogmode',
                'type'     => 'switch', 
                'title'    => __('Catalog mode', 'steelthemes-nest'),
                'default'  => false,
            ), 
        ),
    )
);