<?php

class getslinks {	
	public function get_web_info($title)
	{
		$getLinkID = $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
			$arr = array();	 	 	 
				
			$arr['error'] = "No Title found in Search Results!";
			 
			return $arr;
		}
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID)
	{
		$arr = array();	
		if(isset($_POST['wp_sb'])) {		
		$sources					= $_POST['wp_url'];
		} else { 		 
		$sources = "https://modyolo.com/" . trim($getLinkID) . ".html";
		} 
		return $this->scrape_web_info($sources);
	}
	
	
	public function scrape_web_info($sources) {				
		require_once 'ssl.php';			
		$linksX						= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links						=  file_get_contents($linksX, false, stream_context_create($ssl)); 
		
		$arr						= array();
		$linksX1					= $this->geturl("${sources}");	
		/*
		<a.*?class="g-play".*?href=".*?\?id=(.*?)\&.*?".*?\/a> 
		Get it On <\/th>.*?<a href=".*?\?id=(.*?)\&.*?".*?<\/a>
</td>

		*/
		$arr['title_id'] = $this->match('/Get it On <\/th>.*?<a href=".*?\?id=(.*?)\&.*?".*?<\/a>/ms', $links, 1);	
		
		$arr['GP_ID'] = $this->match('/Get it On <\/th>.*?<a href=".*?\?id=(.*?)\&.*?".*?<\/a>/ms', $links, 1); 
		
		$arr['GP_IDX'] = $this->match('/Get it On <\/th>.*?<a href=".*?\?id=(.*?)\&.*?".*?<\/a>/ms', $links, 1);	
		
		if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_IDX'] = $arr['GP_IDX1'];	
		$title_id = $this->match('/Get it On <\/th>.*?<a href=".*?\?id=(.*?)\&.*?".*?<\/a>/ms', $links, 1);		
		
		if(empty($title_id) || !preg_match("/(.*?)/i", $title_id)) {
			$arr['error'] = "Title ID Play Store No Found";
			return $arr;
		}
		$arr['title_id'] = $title_id;
		$titleId = $arr['GP_ID'];		
		/*
		<title>Homesteads v30000561 MOD APK (Unlimited Money) Download</title>
		<h1 class="lead font-weight-semibold">(.*?)<\/h1>
		<h1 class="full_article_title" itemprop="name">.*?\((.*?)\).*?<\/h1>
		MOD Info.*?<\/th>.*?<td>(.*?)<\/td>

		*/
		$arr['title'] = str_replace(array('modyolo.com', 'mod apk', 'mod', 'apk', '-', 'for Android', '+', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
		
		$arr['title2'] = trim(strip_tags($this->match('/<h1 class="lead font-weight-semibold">(.*?)<\/h1>/ms', $links, 1)));
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title2'];	

        $arr['mods'] = str_replace(array('apk-store', 'mod apk', 'mod', 'apk', '-', 'for Android', '+', 'Download'), '', $this->match('/MOD Info.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1));
		
		
        $arr['mods2'] = $this->match('/<title>.*?\((.*?)\).*?<\/title>/ms', $links, 1);
		$arr['mods2'] = preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['mods2']);
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];	
		 
		$arr['mods_alt_title'] = trim(strip_tags($this->match('/<div class="su-accordion su-u-trim">.*?<div class="su-spoiler-title".*?>.*?<span class="su-spoiler-icon">.*?<\/span>(.*?)<\/div>.*?<div class="su-spoiler-content su-u-clearfix su-u-trim">.*?<\/div>.*?<\/div>.*?<\/div>/ms', $links, 1)));


		$arr['mods_alt_desc'] = $this->match('/<title>.*?\((.*?)\).*?<\/title>/ms', $links, 1);	
		$arr['mods_alt_desc'] = str_replace('&nbsp;', '', $arr['mods_alt_desc']);
		  
		$arr['version'] = $this->match('/Latest Version.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		
		$arr['sizes_apkdownload'] = $this->match('/Size.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);	
		$arr['sizes_sources'] = $this->match('/Size.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		  
		$arr['download_link_2']		= $this->match('/<a class="btn btn-primary btn-block mb-3" href="(.*?)".*?<\/a>.*?<div class="mb-3">.*?<a class="btn btn-light collapsed" data-toggle="collapse".*?>/ms', $links, 1);		
		 
		
		$arr['download_links_page'] = $arr['download_link_2']; 
		
		$download_links_pages_html = $arr['download_links_page'];		
		$download_links_pages = $this->geturl("${download_links_pages_html}");		 
		
		$arr['downloadlinks_gma'] = $this->match_all('/<a class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3" style="min-height: 3.25rem;" href="(.*?)" target="_blank">.*?<\/a>/ms', $this->match('/<div id="accordion-versions" class="accordion mb-3">(.*?)<div class="border rounded mb-3">/ms', $download_links_pages, 1), 1);		 
		
		$arr['name_downloadlinks_gma']	= $this->match_all('/<a class="h6 font-weight-semibold.*?>(.*?)<\/a>/ms', $this->match('/<div id="accordion-versions" class="accordion mb-3">(.*?)<div class="border rounded mb-3">/ms', $download_links_pages, 1), 1);		 
		 
		$arr['size_downloadlinks_gma'] = $this->match_all('/<a class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3".*?>.*?<span class="text-muted d-block ml-auto">(.*?)<\/span>.*?<\/a>/ms',$this->match('/<div id="accordion-versions" class="accordion mb-3">(.*?)<div class="border rounded mb-3">/ms', $download_links_pages, 1), 1);		 
		
		$download_links_pages_html_alts = $arr['downloadlinks_gma'][0];		  	 		
		  		
		if ($arr['downloadlinks_gma'][1]) {
		$download_links_pages_html_alts_1 = $arr['downloadlinks_gma'][1]; 
		}	 		
		if ($arr['downloadlinks_gma'][2]) {
		$download_links_pages_html_alts_2 = $arr['downloadlinks_gma'][2]; 
		}	 		
		if ($arr['downloadlinks_gma'][3]) {
		$download_links_pages_html_alts_3 = $arr['downloadlinks_gma'][3]; 
		}	 		
		if ($arr['downloadlinks_gma'][4]) {
		$download_links_pages_html_alts_4 = $arr['downloadlinks_gma'][4]; 
		}			
		if ($arr['downloadlinks_gma'][5]) {
		$download_links_pages_html_alts_5 = $arr['downloadlinks_gma'][5]; 
		}		 
		 
		$download_links_pages_alt = $this->geturl("${download_links_pages_html_alts}");
		
		if ($download_links_pages_html_alts_1) { 
		$download_links_pages_alt_1 = $this->geturl("${download_links_pages_html_alts_1}");
		}
		
		if ($download_links_pages_html_alts_2) { 
		$download_links_pages_alt_2 = $this->geturl("${download_links_pages_html_alts_2}");
		}
		
		if ($download_links_pages_html_alts_3) { 
		$download_links_pages_alt_3 = $this->geturl("${download_links_pages_html_alts_3}");
		}
		
		if ($download_links_pages_html_alts_4) { 
		$download_links_pages_alt_4 = $this->geturl("${download_links_pages_html_alts_4}");
		}
		
		if ($download_links_pages_html_alts_5) { 
		$download_links_pages_alt_5 = $this->geturl("${download_links_pages_html_alts_5}");
		}
		/*
		<a class="btn btn-primary px-5 download" href="(.*?)" download>
		
		https://files.modyolo.com/download/WGNPMjZYVUd5eTNreHpKaDQzR2g4dFFPUm5zTjZIMFBBcitUVnVCcEttcGY3NGxqdmgvU3FkZnA2d0dBNlJMcCtrLzNZeStTbFN4YlYwdHg3NmVuOVE9PQ==/Homesteads/Homesteads-v30000561-mod.apk
		https://files.modyolo.com/download/WGNPMjZYVUd5eTNreHpKaDQzR2g4dFFPUm5zTjZIMFBBcitUVnVCcEttcGY3NGxqdmgvU3FkZnA2d0dBNlJMcCtrLzNZeStTbFN4YlYwdHg3NmVuOVE9PQ==/Homesteads/Homesteads-v30000561-mod.apk
		
		*/
		$arr['downloadlink_gma'] = $this->match('/<a class="btn btn-primary px-5 download" href="(.*?)" download>/ms', $download_links_pages_alt, 1);
		
		$arr['downloadlink_gma_1'] = $this->match('/<a class="btn btn-primary px-5 download" href="(.*?)" download>/ms', $download_links_pages_alt_1, 1);
		
		$arr['downloadlink_gma_2'] = $this->match('/<a class="btn btn-primary px-5 download" href="(.*?)" download>/ms', $download_links_pages_alt_2, 1);
		
		$arr['downloadlink_gma_3'] = $this->match('/<a class="btn btn-primary px-5 download" href="(.*?)" download>/ms', $download_links_pages_alt_3, 1);
		
		$arr['downloadlink_gma_4'] = $this->match('/<a class="btn btn-primary px-5 download" href="(.*?)" download>/ms', $download_links_pages_alt_4, 1);
		
		$arr['downloadlink_gma_5'] = $this->match('/<a class="btn btn-primary px-5 download" href="(.*?)" download>/ms', $download_links_pages_alt_5, 1);
		 
		 
		/* 	 
		https://cdn1.apk-store.org/nextcloud/index.php/s/r36yk3ezybFDNAG/download
		https://cdn1.apk-store.org/nextcloud/index.php/s/r36yk3ezybFDNAG/download
		<a download href="(.*?)" class="btn green big download_block__btn">.*?<\/a>
		<a download href="https://cdn1.apk-store.org/nextcloud/index.php/s/r36yk3ezybFDNAG/download" class="btn green big download_block__btn">Download 198 MB</a>
		*/
		require_once 'play.store.php';	
		return $arr;
		}
		
		private function get_web_id_from_search($title, $engine = "yahoo"){
				switch ($engine) {
					//case "google":  $nextEngine = "bing";  break;  
					//case "bing":    $nextEngine = "ask";   break;
					case "google":  $nextEngine = "bing";  break;			
					case "bing":    $nextEngine = "ask";   break;
					case "ask":    $nextEngine = "yandex";   break;
					case "yandex":    $nextEngine = "duckduckgo";   break;
					case "duckduckgo":     $nextEngine = FALSE;   break;
					case FALSE:     return NULL;
					default:        return NULL;
		}
		$url = "http://www.${engine}.com/search?q=modyolo.com+" . rawurlencode($title);
		$ids = $this->match_all('/<a.*?href="https:\/\/modyolo.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
		if (!isset($ids[0]) || empty($ids[0])) // 
			return $this->get_web_id_from_search($title, $nextEngine); 
		else
			return $ids[0];
		} 
		private function geturl($url){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				$ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
				//$ip=172.69.70.6;
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
				//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0");
				curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
				curl_setopt($ch, CURLOPT_AUTOREFERER, true);
				$html = curl_exec($ch);
				curl_close($ch);
				return $html;
		}
		private function match_all_key_value($regex, $str, $keyIndex = 1, $valueIndex = 2){
				$arr = array();
				preg_match_all($regex, $str, $matches, PREG_SET_ORDER);
				foreach($matches as $m){
					$arr[$m[$keyIndex]] = $m[$valueIndex];
				}
				return $arr;
		}
		private function match_all($regex, $str, $i = 0){
				if(preg_match_all($regex, $str, $matches) === false)
					return false;
				else
					return $matches[$i];
		}
		private function match($regex, $str, $i = 0){
				if(preg_match($regex, $str, $match) == 1)
					return $match[$i];
				else
					return false;
		}
}