<?php global $opt_themes; if($opt_themes['ex_themes_rating_apk_activate_']) { ?>
 
    <?php 
    if ( shortcode_exists( 'ratemypost-result' ) ) {
    echo do_shortcode( '[ratemypost]' );
    } 
    ?>
    <noscript>            
    <?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?>
        <?php
        $rate_GP = get_post_meta( $post->ID, 'wp_rated_GP', true );
        $ratings_GP = get_post_meta( $post->ID, 'wp_ratings_GP', true );
        $rate_GP1 = get_post_meta( $post->ID, 'wp_rated_GP', true );
        if ( $rate_GP === FALSE or $rate_GP == '' ) $rate_GP = $rate_GP1;
        ?>
        <?php
        $installsX = '-';
        $persen = get_post_meta( $post->ID, 'wp_persenapgk', true );
        $persen = preg_replace('/%/is', '',  $persen);
        $persenX = mt_rand(60,85);
        if ( $persen === FALSE or $persen == '' ) $persen = $persenX;
        ?>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 p-3 text-center">
                <div class="row">
                    <span class="col-12" style="font-size:50px;color:var(--color_link)!important;font-weight: bold;"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums($rate_GP); ?><?php } else { ?><?php echo $rate_GP; ?><?php } ?> </span>
                    <span class="col-12">🧑 <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums($ratings_GP); ?><?php } else { ?><?php echo $ratings_GP; ?><?php } ?> total</span>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12 border-left">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 text-right"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(5); ?><?php } else { ?>5<?php } ?> ⭐</div>
                            <div class="progress mt-2 col-8 p-0 m-0">
                                <div class="progress-bar progress-bar-striped bg-success" style="width:<?php echo  mt_rand(70,99); ?>%"></div>
                            </div>
                            <div class="col-2 text-left"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(mt_rand(70,999)); ?><?php } else { ?><?php echo  mt_rand(70,999); ?><?php } ?></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 text-right"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(4); ?><?php } else { ?>4<?php } ?> ⭐</div>
                            <div class="progress mt-2 col-8 p-0 m-0">
                                <div class="progress-bar progress-bar-striped bg-primary" style="width:<?php echo  mt_rand(40,75); ?>%"></div>
                            </div>
                            <div class="col-2 text-left"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(mt_rand(40,299)); ?><?php } else { ?><?php echo  mt_rand(40,299); ?><?php } ?></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 text-right"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(3); ?><?php } else { ?>3<?php } ?> ⭐</div>
                            <div class="progress mt-2 col-8 p-0 m-0">
                                <div class="progress-bar progress-bar-striped bg-secondary" style="width:<?php echo  mt_rand(6,45); ?>%"></div>
                            </div>
                            <div class="col-2 text-left"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(mt_rand(6,99)); ?><?php } else { ?><?php echo  mt_rand(6,99); ?><?php } ?></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 text-right"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(2); ?><?php } else { ?>2<?php } ?> ⭐</div>
                            <div class="progress mt-2 col-8 p-0 m-0">
                                <div class="progress-bar progress-bar-striped bg-warning" style="width:<?php echo  mt_rand(3,45); ?>%"></div>
                            </div>
                            <div class="col-2 text-left"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(mt_rand(3,99)); ?><?php } else { ?><?php echo  mt_rand(3,99); ?><?php } ?></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 text-right"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(1); ?><?php } else { ?>1<?php } ?> ⭐</div>
                            <div class="progress mt-2 col-8 p-0 m-0">
                                <div class="progress-bar progress-bar-striped bg-danger" style="width:<?php echo  mt_rand(1,45); ?>%"></div>
                            </div>
                            <div class="col-2 text-left"> <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?><?php echo RTL_Nums(mt_rand(1,99)); ?><?php } else { ?><?php echo  mt_rand(1,99); ?><?php } ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    </noscript>
    <?php } ?> 
    