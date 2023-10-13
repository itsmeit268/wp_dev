<?php global $opt_themes; if($opt_themes['aktif_news']) { ?>
    <section class="mb-4" >
        <h2 class="h5 font-weight-semibold mb-3">
            <a class="text-body  <?php if(!$opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>border-bottom-2 <?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?><?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?><?php } elseif(!$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2<?php } ?> border-secondary d-inline-block pb-1" ><?php echo $opt_themes['title_news']; ?></a>
        </h2>
		<div style="clear:both"></div>
        <div class="row">
            <?php
            global $opt_themes;
            $serial = new WP_Query(array(
                'post_type' => 'news',
                'showposts' => 3,
                'orderby' => 'modified'
            ));
            if($serial->have_posts()) :while($serial->have_posts()) : $serial->the_post(); ?>
                <div class="col-12 col-sm-6 col-lg-4 mb-4 ">
                    <a class="embed-responsive embed-responsive-16by9 bg-cover d-block" style="background-image: url(<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'full', true); echo $image_url[0]; ?>); box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.15);" href="<?php the_permalink() ?>">
                        <div class="d-flex align-items-end p-3 position-absolute" style="background-color: rgba(0, 0, 0, 0.5); top: 0; bottom: 0; left: 0; right: 0;">
                            <h3 class="text-white mb-0" style="font-size: 0.875rem;"><?php the_title(); ?></h3>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <a class="btn btn-light btn-block" href="/news">
            <span class="align-middle"><?php echo $opt_themes['title_news_2']; ?></span>
            <svg class="ml-1" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                <path d="M24.707 38.101L4.908 57.899c-4.686 4.686-4.686 12.284 0 16.971L185.607 256 4.908 437.13c-4.686 4.686-4.686 12.284 0 16.971L24.707 473.9c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L41.678 38.101c-4.687-4.687-12.285-4.687-16.971 0z" />
            </svg>
        </a>
    </section>
<?php } 