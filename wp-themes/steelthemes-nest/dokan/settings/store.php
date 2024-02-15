<?php
/**
 * Dokan Settings Main Template
 *
 * @since 2.4
 *
 * @package dokan
 */
global $nest_theme_mod; 
$logo_dokan = get_template_directory_uri() . '/assets/images/logo.svg';
?>

<?php do_action( 'dokan_dashboard_wrap_start' ); ?>

    <div class="dokan-dashboard-wrap">
    <div class="sidebar_rewirte_dok_dash">
            <div class="logo_dokan_dash">
            <?php $dokan_dsh_logo = $nest_theme_mod['dokan_dashboard_logo']['url']; ?>
                <?php if(!empty($dokan_dsh_logo)): ?>
                    <a href="<?php  echo esc_url(home_url()); ?>"><img src="<?php echo esc_url($dokan_dsh_logo); ?>" alt="dokan_logo" /></a>
                <?php else: ?>
                    <a href="<?php  echo esc_url(home_url()); ?>"><img src="<?php echo esc_url($logo_dokan); ?>" alt="dokan_logo" /></a>
                <?php endif; ?>
            </div>
        <?php

            /**
             *  dokan_dashboard_content_before hook
             *  dokan_dashboard_settings_store_content_before hook
             *
             *  @hooked get_dashboard_side_navigation
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_before' );
            do_action( 'dokan_dashboard_settings_content_before' );
        ?>
        </div>
        <div class="dokan-dashboard-content dokan-settings-content">
            <?php

                /**
                 *  dokan_settings_content_inside_before hook
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_settings_content_inside_before' );
            ?>
            <article class="dokan-settings-area">

                <?php
                    /**
                     * dokan_review_content_area_header hook
                     *
                     * @hooked dokan_settings_content_area_header
                     *
                     * @since 2.4
                     */
                    do_action( 'dokan_settings_content_area_header' );


                    /**
                     * dokan_settings_content hook
                     *
                     * @hooked render_settings_content_hook
                     */
                    do_action( 'dokan_settings_content' );
                ?>

                <!--settings updated content ends-->
            </article>
       
            <footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <?php 
                        $copy_right_l = isset( $nest_theme_mod['copy_right_left'] ) ? $nest_theme_mod['copy_right_left'] : '';
                         echo esc_attr($copy_right_l); ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">
                        <?php  
                            $copy_right_r = isset( $nest_theme_mod['copy_right_right'] ) ? $nest_theme_mod['copy_right_right'] : '';
                         echo esc_attr($copy_right_r); ?>    
                        </div>
                    </div>
                </div>
            </footer>
        </div><!-- .dokan-dashboard-content -->
    </div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>
