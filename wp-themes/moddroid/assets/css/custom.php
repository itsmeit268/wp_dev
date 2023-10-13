
<style id='custom-style-<?php echo strtolower(THEMES_NAMES); ?>-v<?php echo VERSION; ?>'>
body { font-family: <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']) { ?>var(--font_body_rtl)!important<?php } else { ?>var(--fonts)!important<?php } ?>; }

.hentry kbd, .mb-4 kbd, .row kbd {background: url("<?php echo EX_THEMES_URI;?>/assets/img/stars.svg") repeat-x;background-size: auto;display: inline-block;height: 12px;background-size: 12px;width: 12px;top: 1px;position: relative;}

<?php global $opt_themes; if($opt_themes['ex_themes_breadcrumbs_activate_']) { ?>
#breadcrumb { display:none!important;}<?php } ?>

.user-header-menu {position: absolute;display: block;<?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?>left: 10px;<?php } else { ?>right: 10px;<?php } ?> visibility: hidden;opacity: 0;list-style: none;background-color: #f6f7f9;width: 220px;top: 50px;text-align: center;margin: 0;z-index: 4;box-shadow: 0px 0px 8px 0 rgba(0, 0, 0, 0.1);-webkit-box-shadow: 0px 0px 8px 0 rgba(0, 0, 0, 0.1);-webkit-transform: scale(0.8);-ms-transform: scale(0.8);transform: scale(0.8);-webkit-transition: all 250ms cubic-bezier(0.24, 0.22, 0.015, 1.56);transition: all 250ms cubic-bezier(0.24, 0.22, 0.015, 1.56);-webkit-backface-visibility: hidden;-moz-backface-visibility: hidden;backface-visibility: hidden;border-radius: 6px;}

.user-header-menu:before {content: " ";background: none repeat scroll 0 0 transparent;border: 12px solid transparent;border-bottom-color: #fff;bottom: auto;height: 0;left: auto;position: absolute;<?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?>left: 50px;<?php } else{ ?>right: 8px;<?php } ?>top: -22px;vertical-align: top;width: 0; }

.slide-item{margin-right: 8px;position: relative;animation: <?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']) { ?>sliderrtl<?php } else { ?>slider<?php } ?> 35s infinite}

.hentry kbd, .mb-4 kbd, .row kbd {background: url("<?php echo EX_THEMES_URI; ?>/assets/img/stars.svg") repeat-x;background-size: auto;display: inline-block;height: 12px;background-size: 12px;width: 12px;top: 1px;position: relative;}
.user-header-menu:before {content: " ";background: none repeat scroll 0 0 transparent;border: 12px solid transparent;border-bottom-color: #fff;bottom: auto;height: 0;left: auto;position: absolute;<?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?>left: 50px;<?php } else{ ?>right: 8px;<?php } ?>top: -22px;vertical-align: top;width: 0;}

<?php global $opt_themes; if($opt_themes['ex_themes_breadcrumbs_activate_']) { ?>#breadcrumb { display:none!important;}<?php } ?>

.user-header-menu {position: absolute;display: block;<?php global $opt_themes; if($opt_themes['ex_themes_activate_rtl_']){ ?>left: 10px;<?php } else{ ?>right: 10px;<?php } ?>
visibility: hidden;opacity: 0;list-style: none;background-color: #f6f7f9;width: 220px;top: 50px;text-align: center;margin: 0;z-index: 4;box-shadow: 0px 0px 8px 0 rgba(0, 0, 0, 0.1);-webkit-box-shadow: 0px 0px 8px 0 rgba(0, 0, 0, 0.1);-webkit-transform: scale(0.8);-ms-transform: scale(0.8);transform: scale(0.8);-webkit-transition: all 250ms cubic-bezier(0.24, 0.22, 0.015, 1.56);transition: all 250ms cubic-bezier(0.24, 0.22, 0.015, 1.56);-webkit-backface-visibility: hidden;-moz-backface-visibility: hidden;backface-visibility: hidden;border-radius: 6px;}

<?php 
global $opt_themes;
if($opt_themes['mdr_style_3']) { ?> 
aside section.rounded,  aside section.border {
  border: unset!important;
  /* box-shadow: unset!important; */
  border-radius: unset!important;
}
<?php } ?>

.site-footer{background-color:var(--color_background_ft);color:var(--footer-color);font-size:14px;font-weight:350}.site-footer ul{list-style:none;padding:0;margin:0}.site-footer ul li{padding:2px 0}

</style>
