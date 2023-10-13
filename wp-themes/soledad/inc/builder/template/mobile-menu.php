<?php
$position = penci_get_builder_mod('penci_header_mobile_sidebar_position','left');
?>
<a href="#" aria-label="Close" class="close-mobile-menu-builder mpos-<?php echo $position;?>"><i class="penci-faicon fa fa-close"></i></a>
<div id="penci_off_canvas" class="penci-builder-mobile-sidebar-nav penci-menu-hbg mpos-<?php echo $position;?>">
    <div class="penci_mobile_wrapper">
		<?php load_template( PENCI_BUILDER_PATH . 'template/mobile-menu-content.php' ); ?>
    </div>
</div>
