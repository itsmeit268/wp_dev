!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.Sharect=t():e.Sharect=t()}(window,function(){return n={},o.m=r=[function(e,t,r){"use strict";function u(){return window.getSelection().toString()}function s(e){var t=(window.getSelection().baseNode||window.getSelection().anchorNode).parentNode;return e.some(function(e){return function(e,t){if(Element.prototype.closest)return e.closest(t);Element.prototype.matches||(Element.prototype.matches=Element.prototype.matchesSelector||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector||Element.prototype.oMatchesSelector||Element.prototype.webkitMatchesSelector);var r=e;do{if(r.matches(t))return r}while(null!==(r=r.parentNode)&&r.nodeType===Node.ELEMENT_NODE);return null}(t,e)})}function p(e){var t=e.iconSize,r=e.buttonMargin,n=e.arrowSize,o=e.icons,e=window.getSelection().getRangeAt(0).getBoundingClientRect(),t=t+r,r=window.pageXOffset||document.documentElement.scrollTop||document.body.scrollTop;return{top:e.top+r-t-n,left:e.left+(e.width-t*o.length)/2}}r.r(t);var f=function(e){return"background:"+e+";"},d=function(e,t){return"top:"+(e-10)+"px;left:"+t+"px;"},b=function(e){var t=e.arrowSize;return"border-top-color: "+e.backgroundColor+";"};function m(t,e){var r,n=Object.keys(t);return Object.getOwnPropertySymbols&&(r=Object.getOwnPropertySymbols(t),e&&(r=r.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),n.push.apply(n,r)),n}function i(t,e){var r,n=Object.keys(t);return Object.getOwnPropertySymbols&&(r=Object.getOwnPropertySymbols(t),e&&(r=r.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),n.push.apply(n,r)),n}function y(n){for(var e=1;e<arguments.length;e++){var o=null!=arguments[e]?arguments[e]:{};e%2?i(Object(o),!0).forEach(function(e){var t,r=n;e=o[t=e],t in r?Object.defineProperty(r,t,{value:e,enumerable:!0,configurable:!0,writable:!0}):r[t]=e}):Object.getOwnPropertyDescriptors?Object.defineProperties(n,Object.getOwnPropertyDescriptors(o)):i(Object(o)).forEach(function(e){Object.defineProperty(n,e,Object.getOwnPropertyDescriptor(o,e))})}return n}function o(l){setTimeout(function(){if(document.querySelector(".sharect")){if(u()&&s(l.selectableElements))return n=(o=p(y({},l))).top,i=o.left,(o=document.querySelector(".sharect")).style.top="".concat(n,"px"),void(o.style.left="".concat(i,"px"));document.body.removeChild(document.querySelector(".sharect"))}var e,t,r,n,o,i,c,a;u()&&s(l.selectableElements)&&(e=y({},l),c=p(e),a=function(n){for(var e=1;e<arguments.length;e++){var o=null!=arguments[e]?arguments[e]:{};e%2?m(Object(o),!0).forEach(function(e){var t,r=n;e=o[t=e],t in r?Object.defineProperty(r,t,{value:e,enumerable:!0,configurable:!0,writable:!0}):r[t]=e}):Object.getOwnPropertyDescriptors?Object.defineProperties(n,Object.getOwnPropertyDescriptors(o)):m(Object(o)).forEach(function(e){Object.defineProperty(n,e,Object.getOwnPropertyDescriptor(o,e))})}return n}({},e,{top:c.top,left:c.left}),document.body.appendChild((r=(t=a).top,n=t.left,o=t.iconSize,i=t.buttonMargin,e=t.backgroundColor,c=t.icons,a=t.arrowSize,i=o+i,(t=document.createElement("div")).className="penci-sharect sharect",t.style.cssText=f(e),t.style.cssText+=d(r,n),t.appendChild(c.icons),i={arrowSize:a,backgroundColor:e,buttonSize:i,icons:c},(c=document.createElement("div")).style.cssText=b(i),c.classList.add("penci-sharect-arrow"),t.appendChild(c),t)))},10)}var c,a,l,h,w,O,g="";function E(){this.style.opacity="0.8"}function v(){this.style.opacity="1"}function S(e,t,r){return n=e,(e=document.createElement("div")),e.classList.add("pcshare-item"),e.innerHTML=n,e.onmousedown=function(){var e,e=(e=r,t.replace(/PAGE_URL/,window.location.href).replace(/TEXT_SELECTION/,window.getSelection().toString()).replace(/USERNAME/,e));window.open(e,"Share","width=550, height=280")},e.onmouseover=E,e.onmouseout=v,e;var n}function j(t,e){var r,n=Object.keys(t);return Object.getOwnPropertySymbols&&(r=Object.getOwnPropertySymbols(t),e&&(r=r.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),n.push.apply(n,r)),n}function P(n){for(var e=1;e<arguments.length;e++){var o=null!=arguments[e]?arguments[e]:{};e%2?j(Object(o),!0).forEach(function(e){var t,r=n;e=o[t=e],t in r?Object.defineProperty(r,t,{value:e,enumerable:!0,configurable:!0,writable:!0}):r[t]=e}):Object.getOwnPropertyDescriptors?Object.defineProperties(n,Object.getOwnPropertyDescriptors(o)):j(Object(o)).forEach(function(e){Object.defineProperty(n,e,Object.getOwnPropertyDescriptor(o,e))})}return n}t.default=(c={twitter:{isActive:!0,username:"",url:"https://twitter.com/intent/tweet?text=TEXT_SELECTION&via=USERNAME&url=PAGE_URL",icon:'<i class="penciicon-x-twitter"></i>'},facebook:{isActive:!0,url:"https://www.facebook.com/dialog/feed?app_id="+penci_selection_sharer.facebookid+"&link=PAGE_URL&quote=TEXT_SELECTION",icon:'<i class="penci-faicon fa fa-facebook"></i>'},whatsapp:{url:"https://api.whatsapp.com/send?text=TEXT_SELECTION%20PAGE_URL",icon:'<i class="penci-faicon fa fa-whatsapp"></i>'},reddit:{url:"https://reddit.com/submit?url=PAGE_URL&title=TEXT_SELECTION",icon:'<i class="penci-faicon fa fa-reddit"></i>'},linkedin:{url:"https://www.linkedin.com/shareArticle?mini=true&url=PAGE_URL&summary=TEXT_SELECTION",icon:'<i class="penci-faicon fa fa-linkedin"></i>'},telegram:{url:"https://t.me/share/url?url=PAGE_URL&text=TEXT_SELECTION",icon:'<i class="penci-faicon fa fa-telegram"></i>'}},l=["body"],h=[],w="#333",O="#fff",{config:function(e){return void 0!==e.linkedin&&(c.linkedin.isActive=e.linkedin),void 0!==e.telegram&&(c.telegram.isActive=e.telegram),void 0!==e.reddit&&(c.reddit.isActive=e.reddit),void 0!==e.whatsapp&&(c.whatsapp.isActive=e.whatsapp),void 0!==e.twitter&&(c.twitter.isActive=e.twitter),void 0!==e.facebook&&(c.facebook.isActive=e.facebook),e.twitterUsername&&(c.twitter.username=e.twitterUsername),e.backgroundColor&&(w=e.backgroundColor),e.iconColor&&(O=e.iconColor),e.selectableElements&&(l=e.selectableElements),this},appendCustomShareButtons:function(e){return h=e,this},init:function(){var e,t,r={backgroundColor:w,iconColor:O,arrowSize:5,buttonMargin:14,iconSize:24,selectableElements:l,networks:c,customShareButtons:h},n=P({},r).iconColor;return(t=document.createElement("style")).id="sharect-style",t.innerHTML=".sharect i{color:".concat(n,";}"),document.body.appendChild(t),a=function(e){var t,r,n,o,i=e.networks,e=e.customShareButtons,c=document.createElement("div"),a=0;for(t in i)i[t]&&i[t].isActive&&(r=(o=i[t]).icon,n=o.url,o=o.username,c.appendChild(S(r,n,o)),a++);return 0<e.length&&e.forEach(function(e){c.appendChild(S(e.icon,e.url)),a++}),{icons:c,length:a}}(P({},r)),e=P({},r,{icons:a}),window.addEventListener("mouseup",function(){return o(e)},!1),this}})}],o.c=n,o.d=function(e,t,r){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(o.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)o.d(r,n,function(e){return t[e]}.bind(null,n));return r},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="",o(o.s=0).default;function o(e){if(n[e])return n[e].exports;var t=n[e]={i:e,l:!1,exports:{}};return r[e].call(t.exports,t,t.exports,o),t.l=!0,t.exports}var r,n});
(function($){
  $(document ).ready(function(){
    Sharect.config({
      buttonSize: '9px',
      arrowSize: '7',
      facebook: penci_selection_sharer.facebook,
      twitter: penci_selection_sharer.twitter,
      linkedin: penci_selection_sharer.linkedin,
      whatsapp: penci_selection_sharer.whatsapp,
      telegram: penci_selection_sharer.telegram,
      backgroundColor: penci_selection_sharer.bgcolor,
      iconColor: penci_selection_sharer.txtcolor,
      selectableElements: ['.entry-content p','.entry-content :is(h1, h2, h3, h4, h5, h6)','.entry-content span'],
    }).init()
  });
})(jQuery);