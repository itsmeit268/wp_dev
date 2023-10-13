<?php
/* 
Template Name: Template - Changelogs
*/
get_header(); // add header ?>

<style type="text/css" media="screen">p, table, hr, .box {margin-bottom: 25px;}.box p {margin-bottom: 10px;}.scrollable-changelog {height: 200px;width: 100%;overflow: scroll;overflow-x: hidden;}.scrollable-changelog ul li {display: block;margin-bottom: 5px;text-overflow: clip;text-overflow: ellipsis;white-space: nowrap;}.container {width: 100%;margin: 0 auto;}.embed-wrapper {width: 90%;margin: 0 auto;margin-bottom: 10px;border: 2px #f6f6f6 solid;padding: .3em;}.embed-container {position: relative;height: 400px;max-width: 100%;}.embed-container iframe, .embed-container object, .embed-container embed {position: absolute;top: 0;left: 0;width: 100%;height: 100%;border: none;}@media screen and (-webkit-min-device-pixel-ratio:0) {.embed-container {-webkit-overflow-scrolling: touch;overflow-y: scroll;}}@media only screen and (-webkit-min-device-pixel-ratio: 0) and (min-width: 981px) {.embed-container {overflow: hidden;}}body {color: #222;background: #fff;}.scrollable-content {height: 300px;width: 100%;overflow: scroll;overflow-x: hidden;}.scrollable-content label {display: block;margin-bottom: 5px;font-weight: bold;text-overflow: clip;text-overflow: ellipsis;white-space: nowrap;}ul, ol {padding-left: 0;margin-top: 0;margin-bottom: 0;}h1, h2.f3-light, h3, h4, h5, h6 {margin-top: 0;margin-bottom: 0;}h2 {font-size: 24px;font-weight: 600;}p {margin-top: 0;margin-bottom: 10px;}.top {background: #ef5350;height: 180px;border-top: 20px solid #a53f3f;}.container-new2 {background-color: #cf4f4f;}.py-6 {padding-top: 0!important;padding-bottom: 25px !important;}.px-3 {padding-right: 16px !important;padding-left: 16px !important;}.text-center {text-align: center !important;}.list-style-none {list-style: none !important;}.de-flex {display: flex !important;}.flex-justify-center {justify-content: center !important;}.f4 {font-size: 16px !important;}.d-inline-block {display: inline-block !important;}.m-2 {margin: 8px !important;}.current {color: rgba(0,0,0, 0.65);}.col-md-8 {width: 66.66667%;}.mx-auto {margin-right: auto !important;margin-left: auto !important;}.padding16 {padding: 16px !important;}.margin24 {margin-bottom: 24px !important;}.f1-light {font-size: 26px !important;font-weight: 300 !important;}.text-white {color: #fff !important;}#release-notes {}.release-note header h2 {max-width: 100% !important;}.position-relative {position: relative !important;}.text-left {text-align: left !important;}.container-new {margin-right: auto;margin-left: auto;}.release-note:first-of-type .timeline-decorator::before {background-image: linear-gradient(to bottom, rgba(105,105,105, 0), rgba(105,105,105, 0.1) 50px);}.release-note:last-of-type .timeline-decorator::before {background-image: linear-gradient(to bottom, rgba(105,105,105, 0.1), rgba(105,105,105, 0));}.timeline-decorator::before {content: "";background-image: linear-gradient(to bottom, rgba(105,105,105, 0.1), rgba(105,105,105, 0.1));width: 3px;position: absolute;top: 0;bottom: 0;left: calc((65px / 2) + 16px);z-index: -1;}.version-badge {width: 65px;text-align: center;}.bg-cf4f {background-color: dimgray !important;}.p-1 {padding: 4px !important;}.rounded-1 {border-radius: 3px !important;}.mr-2 {margin-right: 8px !important;}.text-bold {font-weight: 600 !important;}.f3-light {font-size: 18px !important;font-weight: 300 !important;}.css-truncate.css-truncate-target, .css-truncate .css-truncate-target {display: inline-block;max-width: 125px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;vertical-align: top;}.css-truncate2.css-truncate-target2, .css-truncate2 .css-truncate-target2 {display: inline-block;max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;vertical-align: top;}.css-truncate-target2:hover {max-width: 10000px !important;}.css-truncate.expandable.zeroclipboard-is-hover .css-truncate-target, .css-truncate.expandable.zeroclipboard-is-hover.css-truncate-target, .css-truncate.expandable:hover .css-truncate-target, .css-truncate.expandable:hover.css-truncate-target {max-width: 10000px !important;}.change-log {margin-left: 74px;}.mb-2 {margin-bottom: 8px !important;}.change-badge {background-color: #0366d6;display: inline;flex: 0 0 65px;font-size: 10px;font-weight: 600;border-radius: 3px;margin-right: 8px;padding: 2px 5px;text-transform: uppercase;text-align: center;}.change-badge-new {background-color: steelblue;}.change-badge-add, .change-badge-added {background-color: mediumvioletred;}.change-badge-fixed {background-color: teal;}.change-badge-first {background-color: seagreen;}.change-badge-improved {background-color: dodgerblue;}.change-badge-removed, .change-badge-remove {background-color: lightcoral;}li.de-flex div.change-badge {color: white!important;}li.de-flex div.change-description {color: black!important;}span.version-badge {color: white!important;}
</style>
<div id="content post-id-<?php the_ID(); ?> " class="site-content">
	<div class="py-2">  </div>
	<div class="container">
	   
	<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><div class="row"><?php } else { ?><?php } ?>
	<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><main id="primary" class="col-12 col-lg-8 content-area"><?php } else { ?><main id="primary" <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>class="<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?>col-12 col-lg-9 content-area<?php } else { ?>content-area<?php } ?>"<?php } else { ?>class="content-area mx-auto" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>"<?php } ?>><?php } ?>
	<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?><article class="bg-white <?php if(!$opt_themes['mdr_style_3']) { ?>border<?php } ?> rounded shadow-sm pt-3 px-2 px-md-3 mx-auto mb-3" style="max-width: <?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?> 900px<?php } else { ?> 820px<?php } ?>;"><?php } else { ?> <?php } ?>
			
	<div class="container py-1" >
		<ul id="breadcrumb" class="breadcrumb">
		<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?>"><?php if($opt_themes['ex_themes_activate_rtl_']){ echo $opt_themes['rtl_homes']; } else { echo $opt_themes['text_homes']; } ?></a></li>
		<li class="breadcrumb-item home"><?php the_title(); ?></li>
		</ul>
	</div>
       
	<h1 style="display:none" class="h5 font-weight-semibold mb-3"><span class="<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?>text-body<?php } else { ?>text-body  <?php if(!$opt_themes['mdr_style_3'] && $opt_themes['ex_themes_home_style_2_activate_'] ){ ?>border-bottom-2 border-secondary<?php } ?>  d-inline-block pb-1<?php } ?>"><?php the_title(); ?></span></h1> 
					 
					
	<div class="mb-4 entry-content">
					

	<h1 class="h5 mb-5 text-center"><?php the_title(); ?> - <a href="<?php echo EXTHEMES_DEMO_URL; ?>"> <?php echo EXTHEMES_NAME; ?></a> v.<?php echo VERSION; ?></h1>	
	
	
<div id="release-notes"> 

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.8.2
	</span>
	<h2 class="f3-light">1/10/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-10-1 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	small issues
	</div>
	</li>    
	 
	
	</ul>
</section>

<div class="scrollable-content" >

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.8.1
	</span>
	<h2 class="f3-light">2/9/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-9-2 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	apkmod.cc sources apk extractor
	</div>
	</li>    
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	zmodapk.net sources apk extractor
	</div>
	</li>    
	
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.8.0
	</span>
	<h2 class="f3-light">10/08/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-8-10 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	tag post pages
	</div>
	</li>    
	
	</ul>
</section>


<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.9
	</span>
	<h2 class="f3-light">3/08/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-8-3 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	apkmod.cc sources apk extractor
	</div>
	</li>   
	     
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	new apkmody.com sources apk extractor
	</div>
	</li>   
	     
	    
	   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.8
	</span>
	<h2 class="f3-light">8/07/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-7-8 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	issues themes styles
	</div>
	</li>   
	     
	    
	   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.7
	</span>
	<h2 class="f3-light">30/06/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-6-30 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	issues slow loading wp admin
	</div>
	</li>   
	     
	    
	   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.6
	</span>
	<h2 class="f3-light">16/06/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-6-16 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	issues developer pages
	</div>
	</li>   
	    
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	author pages
	</div>
	</li>   
	    
	   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.5
	</span>
	<h2 class="f3-light">05/06/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-6-5 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	themes errors for use php 7
	</div>
	</li>   
	    
	   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.4
	</span>
	<h2 class="f3-light">29/05/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-5-29 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-remove">remove</div>
	<div class="change-description">
	sources not working apk extractor
	</div>
	</li>   
	    
	   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.3
	</span>
	<h2 class="f3-light">02/05/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-5-2 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	small issues themes
	</div>
	</li>   
	    
	   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.2
	</span>
	<h2 class="f3-light">19/04/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-4-19 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	new sources apk extractor
	</div>
	</li>   
	   
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	small issues apk extractor
	</div>
	</li>   
	   
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	small issues apk extractor
	</div>
	</li>   
	   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.1
	</span>
	<h2 class="f3-light">04/02/2023 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2023-2-4 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	Wp Report Post
	</div>
	</li>   
	  
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	edit list version on custom box post
	</div>
	</li>   
	  
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">add</div>
	<div class="change-description">
	small issues apk extractor
	</div>
	</li>   
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.7.0
	</span>
	<h2 class="f3-light">20/12/2022 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2022-12-20 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	menu header for using old header styles
	</div>
	</li>  
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	small issue make slow on dashboard. (install Heartbeat Control Plugin To helps Your make Fast)
	</div>
	</li>  
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	css rtl style for new styles
	</div>
	</li>  
	  
	</ul>
</section>

<section class="release-note position-relative container-new py-6 px-3 text-left">
	<header class="timeline-decorator de-flex flex-items-center mb-3">
	<span class="version-badge d-inline-block bg-cf4f p-1 rounded-1 mr-2 text-bold">
	v.6.9
	</span>
	<h2 class="f3-light">19/12/2022 <i style="color: firebrick;font-size: x-small"><?php echo round(((( time() - strtotime("2022-12-19 01:00:00") )/(60*60*24)))).' day(s) ago'; ?></i></h2>	 	
	</header>
	<ul class="list-style-none change-log">
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-fixed">fixed</div>
	<div class="change-description">
	small issue themes
	</div>
	</li>    
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	fonts options
	</div>
	</li>    
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	new styles
	</div>
	</li>    
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	rate my post
	</div>
	</li>    
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	template popular rate
	</div>
	</li>    
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	review box on news
	</div>
	</li>    
	
	<li class="de-flex flex-items-start mb-2">
	<div class="change-badge change-badge-add">add</div>
	<div class="change-description">
	list apk post version (make it duplicate post to showing latest version)
	</div>
	</li>    
	
	</ul>
</section>

</div>
</div>


	</div>
                    
	<?php global $opt_themes; if($opt_themes['ex_themes_home_style_2_activate_']) { ?></article><?php } else { ?> <?php } ?>	
            
	<span style="display:none"><?php get_template_part('template/breadcrumbs'); ?></span>
	</main>
			
	<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?><!--sidebar--><aside id="secondary" class="col-12 col-lg-4 widget-area"><?php get_sidebar(); ?></aside><!--sidebar--><?php } else { ?><?php } ?>
			
		<?php global $opt_themes; if($opt_themes['sidebar_activated_']) { ?></div><?php } else { ?><?php } ?>
		
        </div>
    </div>
	
	 
<?php
get_footer(); 