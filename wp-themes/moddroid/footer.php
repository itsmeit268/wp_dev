<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
ex_themes_footer_section_(); 
wp_footer(); 
?>  
<?php if($opt_themes['ex_themes_home_style_2_activate_'] && $opt_themes['mdr_style_3']){ ?>
<!--modyolo & reborn-->
<script>
/*<![CDATA[*/
function headScroll() {const distanceY = window.pageYOffset || document.documentElement.scrollTop, shrinkOn = 40, commentEl = document.getElementById('header');if (distanceY > shrinkOn) {commentEl.classList.add("stick");} else {commentEl.classList.remove("stick");} } window.addEventListener('scroll', headScroll); 

function wrap(o, t, e) {for (var i = document.querySelectorAll(t), c = 0; c < i.length; c++) {var a = o + i[c].outerHTML + e; i[c].outerHTML = a} } wrap('<div class="zmImg">', '.pS .separator >a', '</div>'); wrap('<div class="zmImg">', '.pS .tr-caption-container td >a', '</div>'); wrap('<div class="zmImg">', '.pS .separator >img', '</div>'); wrap('<div class="zmImg">', '.pS .tr-caption-container td >img', '</div>'); wrap('<div class="zmImg">', '.pS .psImg >img', '</div>'); wrap('<div class="zmImg">', '.pS .btImg >img', '</div>'); for (var containerimg = document.getElementsByClassName('zmImg'), i = 0; i < containerimg.length; i++) containerimg[i].onclick = function() {this.classList.toggle('s');};
/*]]>*/
</script>
<?php } elseif($opt_themes['ex_themes_home_style_2_activate_'] && !$opt_themes['mdr_style_3']){ ?>
<!--modyolo-->  
<?php } elseif($opt_themes['mdr_style_3'] && !$opt_themes['ex_themes_home_style_2_activate_'] ){ ?>
<!--reborn-->
<script>
/*<![CDATA[*/
function headScroll() {const distanceY = window.pageYOffset || document.documentElement.scrollTop, shrinkOn = 40, commentEl = document.getElementById('header');if (distanceY > shrinkOn) {commentEl.classList.add("stick");} else {commentEl.classList.remove("stick");} } window.addEventListener('scroll', headScroll); 

function wrap(o, t, e) {for (var i = document.querySelectorAll(t), c = 0; c < i.length; c++) {var a = o + i[c].outerHTML + e; i[c].outerHTML = a} } wrap('<div class="zmImg">', '.pS .separator >a', '</div>'); wrap('<div class="zmImg">', '.pS .tr-caption-container td >a', '</div>'); wrap('<div class="zmImg">', '.pS .separator >img', '</div>'); wrap('<div class="zmImg">', '.pS .tr-caption-container td >img', '</div>'); wrap('<div class="zmImg">', '.pS .psImg >img', '</div>'); wrap('<div class="zmImg">', '.pS .btImg >img', '</div>'); for (var containerimg = document.getElementsByClassName('zmImg'), i = 0; i < containerimg.length; i++) containerimg[i].onclick = function() {this.classList.toggle('s');};
/*]]>*/
</script>
<?php } ?>

 
  </body>
</html>