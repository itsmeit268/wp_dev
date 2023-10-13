var observer,options={rootMargin:"0px",threshold:.1},allTheLazyImages=document.querySelectorAll(".lzl");function lazyLoader(e){e.forEach(function(e){e.intersectionRatio>0&&lazyLoadImage(e.target)})}function lazyLoadImage(e){e.classList.remove("lzl"),e.dataset.lazybackground&&(e.style.backgroundImage="url(".concat(e.dataset.lazybackground,")")),e.getAttribute("data-src")&&(e.src=hasWebP&&-1!=e.dataset.src.indexOf("googleusercontent.com")?e.dataset.src+"-rw":e.dataset.src,"IntersectionObserver"in window&&observer.unobserve(e))}if("IntersectionObserver"in window)observer=new IntersectionObserver(lazyLoader,options),allTheLazyImages.forEach(function(e){observer.observe(e)});else for(var i=0;i<allTheLazyImages.length;i++)lazyLoadImage(allTheLazyImages[i]);!function(e){"use strict";var t=function(t,a,n){function l(){o.addEventListener&&o.removeEventListener("load",l),o.media=n||"all"}var r,i=e.document,o=i.createElement("link");if(a)r=a;else{var s=(i.body||i.getElementsByTagName("head")[0]).childNodes;r=s[s.length-1]}var d=i.styleSheets;o.rel="stylesheet",o.href=t,o.media="only x",function e(t){return i.body?t():void setTimeout(function(){e(t)})}(function(){r.parentNode.insertBefore(o,a?r:r.nextSibling)});var c=function(e){for(var t=o.href,a=d.length;a--;)if(d[a].href===t)return e();setTimeout(function(){c(e)})};return o.addEventListener&&o.addEventListener("load",l),o.onloadcssdefined=c,c(l),o};"undefined"!=typeof exports?exports.loadCSS=t:e.loadCSS=t}("undefined"!=typeof global?global:this),function(e){if(e.loadCSS){var t=loadCSS.relpreload={};if(t.support=function(){try{return e.document.createElement("link").relList.supports("preload")}catch(e){return!1}},t.poly=function(){for(var t=e.document.getElementsByTagName("link"),a=0;a<t.length;a++){var n=t[a];"preload"===n.rel&&"style"===n.getAttribute("as")&&(e.loadCSS(n.href,n,n.getAttribute("media")),n.rel=null)}},!t.support()){t.poly();var a=e.setInterval(t.poly,300);e.addEventListener&&e.addEventListener("load",function(){t.poly(),e.clearInterval(a)}),e.attachEvent&&e.attachEvent("onload",function(){e.clearInterval(a)})}}}(this);var e=Array.prototype.slice.call(document.querySelectorAll(".navbar-toggle"),0);e.length>0&&e.forEach(function(e){e.addEventListener("click",function(){var t=e.dataset.target;document.getElementById(t).classList.toggle("collapse")})});var backtop=document.getElementById("backtop");function scrollFunction(){document.body.scrollTop>20||document.documentElement.scrollTop>20?backtop.style.display="block":backtop.style.display="none"}function addClass(e,t){e.classList.add(t)}function removeClass(e,t){e.classList.remove(t)}window.onscroll=function(){scrollFunction()},backtop.addEventListener("click",function(){document.body.scrollTop=0,document.documentElement.scrollTop=0});var AjaxLiveSearch=function(e,t,a){"use strict";var n=new XMLHttpRequest,l=(t.outerWidth,t.innerWidth-2),r=1,i=0,o=0,s=0,d=[],c="",u=[],g={ajaxUrl:"",inputId:"",inputLength:2,itemsPerPage:5,inputValue:"",coloumnHead:"",fields:"",data:""};return{init:function(t,a){for(var l in c=a,r=1,i=0,o=0,s=0,g.data=[],u=[],d=[],t)g.hasOwnProperty(l)&&(g[l]=t[l]);g.fields=g.fields.replace(/^\s*,*\s*/,"").replace(/\s*,*\s*$/,"").replace(/\s*,\s*/,","),g.coloumnHead=g.coloumnHead.replace(/^\s*,*\s*/,"").replace(/\s*,*\s*$/,"").replace(/\s*,\s*/,","),e.getElementById(g.inputId).value.trim().length>=g.inputLength?void 0===g.data||""==g.data?void 0===g.ajaxUrl||""==g.ajaxUrl?console.error("Ajax URL is missing."):function(t){n.readyState&&n.abort(),e.getElementById(g.inputId).classList.add("input-loader"),n.open("GET",g.ajaxUrl,!0),n.onload=function(a){4===n.readyState&&(200===n.status?(t(JSON.parse(this.responseText)),e.getElementById(g.inputId).classList.remove("input-loader")):(console.error(xhr.statusText),e.getElementById(g.inputId).classList.remove("input-loader")))},n.onerror=function(t){console.error(xhr.statusText),e.getElementById(g.inputId).classList.remove("input-loader")},n.send(null)}(f):"object"==typeof g.data&&Object.keys(g.data).length>=1&&(function(t){var a=[],n=e.getElementById(g.inputId).value;for(var l in t)for(var r in t[l]){var i=new RegExp("^"+n,"i");if(g.fields.match(new RegExp("(?:^|,)"+r+"(?:,|$)"))&&t[l][r].match(i)){a.push(t[l]);break}}g.data=a}(g.data),f(g.data)):(n.readyState&&(n.abort(),e.getElementById(g.inputId).classList.remove("input-loader")),e.getElementById("als-data")&&v(e.getElementById("als-data")))}};function f(e){g.data=e,i=Object.keys(g.data).length,o=Math.ceil(i/g.itemsPerPage),s=(r-1)*g.itemsPerPage,m(g.data)}function m(a){if(void 0!==g.fields&&""!=g.fields){var n='<div id="als-data">';if(n+='<div id="als-close-btn" title="close">
</div>',n+='<div id="als-table">
<table border="0">',void 0!==g.coloumnHead&&""!=g.coloumnHead){var f=g.coloumnHead.split(",");for(var y in n+="<tr>",f)n+='<th id="als-th">'+f[y]+"</th>";n+="</tr>"}for(var h=i<g.itemsPerPage?i:s+g.itemsPerPage,I=s;I<h;I++)if(I in a){var E="row"+I;u[E]=a[I],n+='<tr class="als-row" id="'+E+'">';var b=g.fields.split(",");for(var L in b)b[L.trim()]in a[I]&&(d.push(b[L]),n+='<td align="left">'+a[I][b[L]]+"</td>");n+="</tr>"}if(d.length<1){if(Object.keys(u).length>0)return void console.error("fields value doesnot match any field name from json data");n+='<tr>
<td colspan="'+(void 0===f?0:f.length)+'" align="left" class="no-record">No Record Found</td>
</tr>'}n+="</table>
</div>",i>g.itemsPerPage&&(n+='<div class="als-paging" id="als-paging">
<div id="als-cp" class="als-align-center-paginng">
<div id="als-la" class="'+(r>1?"als-left-arrow-dark":"als-left-arrow-light")+' als-p-lr" rel="left">
</div>',n+='<div class="als-page" id="als-page"> '+r+" / "+o+' </div>
<div id="als-ra" class="'+(r==o?"als-right-arrow-light":"als-right-arrow-dark")+' als-p-lr" rel="right">
</div>',n+="</div>
</div>
</div>"),function(a){var n,i,d,f;e.getElementById("als-data")&&v(e.getElementById("als-data")),n=e.getElementById(g.inputId),d=a,(f=e.createElement("div")).innerHTML=d.trim(),i=f.firstChild,n.parentNode.insertBefore(i,n.nextSibling),function(){var t=e.getElementById(g.inputId).getBoundingClientRect().left,a=e.getElementById(g.inputId).offsetLeft,n=parseInt(e.getElementById(g.inputId).offsetTop)+parseInt(e.getElementById(g.inputId).offsetHeight),r=e.getElementById("als-table").offsetWidth;p(e.getElementById("als-data"),{position:"absolute",top:n+"px"});var i=l-20>r?null:l-20,o=t+(r=null==i?r:i)-(l-20);o>0&&l-20>t&&(a-=o),p(e.getElementById("als-data"),{left:a+"px",right:null}),p(e.getElementById("als-data"),{width:i+"px"})}(),function(){try{return t.self!==t.top}catch(e){return!1}}()&&(e.getElementById("als-close-btn").style.display="block"),function(){for(var t=e.getElementsByClassName("als-row"),a=0;a<t.length;a++)t[a].addEventListener("click",function(){var t=this.getAttribute("id"),a=u[t][g.inputValue];""!=g.inputValue&&void 0!==a?void 0!==a&&""!=a&&(e.getElementById(g.inputId).value=a,v(e.getElementById("als-data")),"function"==typeof c&&c(u[t])):console.error('In json config "inputValue" put correct field name')},!1)}(),function(){for(var t=e.getElementsByClassName("als-p-lr"),a=0;a<t.length;a++)t[a].addEventListener("click",function(){var e=this.getAttribute("rel");o>r&&"right"==e?(s=((r+=1)-1)*g.itemsPerPage,m(g.data)):r>1&&"left"==e&&(s=((r-=1)-1)*g.itemsPerPage,m(g.data))},!1)}(),e.getElementById("als-close-btn").addEventListener("click",function(){v(e.getElementById("als-data"))}),e.addEventListener("click",function(t){"als-paging"!=t.target.id&&"als-th"!=t.target.id&&"als-ra"!=t.target.id&&"als-la"!=t.target.id&&"als-cp"!=t.target.id&&"als-page"!=t.target.id&&t.target.id!=g.inputId&&e.getElementById("als-data")&&v(e.getElementById("als-data"))})}(n)}else console.error("fields is empty. pass any field name to show in table")}function p(e,t){for(var a in t)e.style[a]=t[a]}function v(e){e.parentElement.removeChild(e)}}(document,window,screen);function search(e){var t={ajaxUrl:"/search_suggestion?key="+e,inputId:"filebear-search",itemsPerPage:10,inputLength:1,inputValue:"key",fields:"key",data:""};AjaxLiveSearch.init(t,function(e){})}function searchtogger(e){var t={ajaxUrl:"/search_suggestion?key="+e,inputId:"filebear-search-togger",itemsPerPage:10,inputLength:1,inputValue:"key",fields:"key",data:""};AjaxLiveSearch.init(t,function(e){})}