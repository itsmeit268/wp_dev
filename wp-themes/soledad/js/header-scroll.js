(function(e){function m(){var b=window.innerHeight;if(b)return b;var f=document.compatMode;if(f||!e.support.boxModel)b="CSS1Compat"===f?document.documentElement.clientHeight:document.body.clientHeight;return b}var n=function(b,f){function e(){null!==a?c=!0:(c=!1,b(),a=setTimeout(function(){a=null;c&&e()},f))}var c=!1,a=null;return e}(function(){var b=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop,f=b+m(),g=[];e.each(e.cache,function(){this.events&&this.events.inview&&
g.push(this.handle.elem)});e(g).each(function(){var c=e(this),a;a=0;for(var d=this;d;d=d.offsetParent)a+=d.offsetTop;var d=c.height(),k=a+d,d=c.data("inview")||!1,h=c.data("offset")||0,g=a>b&&k<f,l=k+h>b&&a<b,h=a-h<f&&k>f;g||l||h||a<b&&k>f?(a=h?"top":l?"bottom":"both",d&&d===a||(c.data("inview",a),c.trigger("inview",[!0,a]))):!g&&d&&(c.data("inview",!1),c.trigger("inview",[!1]))})},100);e(window).on("checkInView.inview click.inview ready.inview scroll.inview resize.inview",n)})(jQuery);
(function($) {
  'use strict';
  var PENCI = PENCI || {};
  /* Single Post Scroll
 ---------------------------------------------------------------*/
  PENCI.singlepoststyle = function() {
    if (!$('body').hasClass('single')) {
      return;
    }
    
    if (!$('body').find('.pencihd-iscroll-bar').length) {
      $('body').prepend('<span class="pencihd-iscroll-bar"></span>');
    }
    
    $('.pencihd-iscroll-bar').css({
      position: 'fixed',
      left: 0,
      width: 0,
      height: parseInt(ajax_var_more.reading_bar_h),
      backgroundColor: 'var(--pcaccent-cl)',
      zIndex: 999999999999,
    });
    
    if (ajax_var_more.reading_bar_pos === 'header') {
      $('.pencihd-iscroll-bar').css({
        top: 0,
      });
    } else {
      $('.pencihd-iscroll-bar').css({
        bottom: 0,
      });
    }
    
    if ($('body').hasClass('rtl')) {
      $('.pencihd-iscroll-bar').css({
        left: 'auto',
        right: 0,
      });
    }
  };
  PENCI.singlepostscrollin = function() {
    
    $('article.post').bind('inview', function (event, visible, topOrBottomOrBoth) {
      if (visible == true) {
        var t = $(this),
            total = 0,
            h = 0,
            entry_content = t.find('.entry-content'),
            e_top = entry_content.offset().top,
            header_h = $('.penci-header-wrap').outerHeight(),
            bottom = e_top + header_h,
            stop = 0;
  
        t.addClass('inview');
  
        setTimeout(function() {
          h = entry_content.get(0).getBoundingClientRect().height;
          bottom = bottom + h;
        }, 100);
  
        $(window).scroll(function(e) {
          stop = $(window).scrollTop() + header_h;
    
          if (stop > e_top && stop < bottom) {
            total = ((stop - e_top) / (bottom - e_top)) * 100;
            $('.pencihd-iscroll-bar').css('width', total + '%');
          } else {
            $('.pencihd-iscroll-bar').css('width', '0%');
          }
        });
      } else {
        $(this).removeClass('inview');
      }
    });
    
  };
  
  $(document).ready(function() {
    PENCI.singlepostscrollin();
    PENCI.singlepoststyle();
    $('body').on('single_loaded_more', function() {
      PENCI.singlepostscrollin();
    });
  });
})(jQuery); // EOF