<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
    <div class="wrp-min speedbar" style="display:none">
    <div class="speedbar-panel">
    <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
    </div>
    </div>
    
<div class="page-sys">
<section class="section">
<div class="wrp-min block-list">
<div class="block static-page">
<div class="b-cont">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="text">
        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
        endwhile;
        endif;
        ?>
        </div>
</div>
</div>
</div>
</section>
</div>
    
<?php 
get_footer(); 