<?php
/**
 * Cross-sells || edit add slide
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$full_width = xtocky_get_option_data( 'main-width-content', 'container' );
$slide =  '6';
if($full_width == 'container'){
    $slide = '4';
}
$per_row_mobile = xtocky_get_option_data( 'optn_woo_products_per_row_mobile', '' );
$row_mobile =  '1';
if($per_row_mobile == 'mobile'){
    $row_mobile = '2';
}

if ( $cross_sells ) : ?>

	<div class="cross-sells hsc sip <?php echo esc_attr($per_row_mobile); ?>">

	<?php
		$heading = apply_filters( 'woocommerce_product_cross_sells_products_heading', __( 'You may be interested in&hellip;', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2 class="pa_ba h-line mb40"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php woocommerce_product_loop_start(); ?>
                <div class="piko-carousel hs" data-slick='{"slidesToShow": <?php echo esc_attr($slide); ?>,"slidesToScroll": 1,"responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}},{"breakpoint": 768,"settings":{"slidesToShow": 2}},{"breakpoint": 480,"settings":{"slidesToShow": <?php echo esc_attr($row_mobile); ?>}}]}'>
			<?php foreach ( $cross_sells as $cross_sell ) : ?>

				<?php
				 	$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>
                </div>
		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
