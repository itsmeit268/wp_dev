<?php
global $wpdb, $post, $wp_query; 
ini_set('display_errors', 'off');
get_header();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="wrp-min speedbar">
    <div class="speedbar-panel">
    <span itemscope="" itemtype="http://schema.org/BreadcrumbList">
    <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
    <a class="breadcrumbs__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="item">
    <span itemprop="name">Home</span></a>
    <meta itemprop="position" content="1">
    </span>
    <span class="breadcrumbs__separator"> / </span>
    <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
    <a class="breadcrumbs__link" href="<?php the_permalink(); ?>version" itemprop="item"><span itemprop="name"><?php echo get_post_meta( $post->ID, 'wp_title_GP', true ); ?></span></a>
    <meta itemprop="position" content="2">
    </span>   
    <span class="breadcrumbs__separator"> / </span>
    <span class="breadcrumbs__current">Version</span>
    </span>
    </div>
</div> 

<div class="page-sys">
<section class="section">
<div class="wrp-min block-list">
<div class="block static-page">
 
    
    <div class="wrp-min block-list">  
    <?php version_pages(); ?>
    </div>


 
</div>
</div>
</section>
</div>

<?php
get_footer(); 