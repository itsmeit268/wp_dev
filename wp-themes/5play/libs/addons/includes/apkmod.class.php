<?php 
class starting_now{	
	public function get_web_info($title) {
		$getLinkID						= $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
		$arr							= array();
		$arr['error']					= "No Title found in Search Results!";
		return $arr;
		} 
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID) {
		$arr							= array();	 	 
		if(isset($_POST['wp_sb'])) {		
		$sources						= $_POST['wp_url'];
		} else {		
		$sources						= "https://apkmod.cc/".trim($getLinkID)."/";
		}
		return $this->scrape_web_info($sources);
	}
	public function scrape_web_info($sources) {	
		$arr							= array();
		require_once 'ssl.php';	
		$sumbers						= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links							= file_get_contents($sumbers, false, stream_context_create($ssl));
		$linksX1						= $this->geturl("${sources}");	
		
		 
		$arr['id_ps']					= $this->match('/span class="left">package name.*?<a href=".*?\?id=(.*?)\&.*?">.*?<span class="right">.*?<\/span>.*?<\/a>/ms', $links, 1);
		
		 
		
		
		$arr['title_id']				= $this->match('/<span class="left">package name.*?<a href=".*?\?id=(.*?)\&.*?">.*?<span class="right">.*?<\/span>.*?<\/a>/ms', $links, 1);
		$arr['title_id_alt']			= $this->match('/<span class="left">package name.*?<li class="flex">.*?<a.*?>.*?<span class="right">(.*?)<\/span>.*?<\/a>/ms', $links, 1);
		
        if ($arr['id_ps'] === FALSE or $arr['id_ps'] == '') $arr['id_ps'] = $arr['title_id'];	
		
		$arr['GP_ID']					= $arr['title_id'];
		$arr['GP_ID_alt']				= $arr['title_id_alt'];
		
        if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_IDX'];	
		
		$arr['GP_IDX']					= $arr['title_id'];
		$arr['GP_IDX_alt']				= $arr['title_id_alt'];
		
		if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_ID_alt'];
		  
		if($arr['title_id']){
		$title_id						= $arr['title_id'];
		} else {
		$title_id						= $arr['title_id_alt'];
		}				 
		
		/* 
		if(empty($title_id) || !preg_match("/(.*?)/i", $title_id)) {
			$arr['error']				= NO_ID;
			echo $arr['error'];
		}	 
		*/
  
		$titleId						= $title_id;
		
		$arr['title']					= str_replace(array('APK APKMOD', 'APKMOD', 'APKDownload.cc', 'apkmod.cc', 'APKMod.cc', 'APKDown.cc', '&#8211;', '&#8211;', '-', 'for Android', '+', 'Download'), '', $this->match('/<div class="table-cell">.*?<h1.*?class="marginZero wrapText app-title.*?">(.*?)<\/h1>.*?<\/div>/ms', $links, 1));
		$arr['title']					= preg_replace('/\s+/', ' ', $arr['title']);
		
		$arr['title2']					= trim(strip_tags($this->match('/<div class="table-cell">.*?<h1 title="(.*?)" class="marginZero.*?">.*?<\/h1>.*?<\/div>/ms', $links, 1)));
		
		$arr['title_alt']				= trim(strip_tags($this->match('/<div class="table-cell">.*?<h1 title="(.*?)" class="marginZero.*?">.*?<\/h1>.*?<\/div>/ms', $links, 1)));
		
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title_alt'];	
		
		$arr['title_web']				= $this->match('/<a class="withoutripple ".*?>(.*?)<\/a>.*?<svg class="icon chevron-icon">/ms', $links, 1);		
		$title_webs						= $arr['title_web'];
		
		$arr['title']					= str_replace('[', '(', $arr['title']);
		$arr['title']					= str_replace(']', ')', $arr['title']);
		$arr['title']					= str_replace('download', '', $arr['title']);
		$arr['title2']					= str_replace('(', ',', $arr['title2']);
		$arr['title2']					= str_replace(')', ',', $arr['title2']);
		$arr['title2']					= str_replace('/', ',', $arr['title2']);	
		 
        $arr['mods']					= str_replace(array('APKDownload.cc', 'MOD ', 'Download'), '', $this->match('/<div class="table-cell">.*?<h1.*?>.*?\((.*?)\).*?<\/h1>/ms', $links, 1));

        $arr['mods2']					= $this->match('/<div class="notes">.*?MOD Features.*?<\/h3>(.*?)<\/div>/ms', $links, 1);
		$arr['mods2']					= preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['mods2']);
		$arr['mods2']					= preg_replace('/<h2.*?>.*?<\/h2>.*?<br>.*?<br>.*?<br>.*?/is', '',  $arr['mods2']);
		$arr['mods2']					= preg_replace('/<strong>Note.*?<\/strong>.*?<br>.*?<br>.*?<\/div>.*?/is', '',  $arr['mods2']);

		$arr['mods3']					= $this->match('/<br>.*?<h3 id="h-mod-feature">MOD feature<\/h3>.*?.*?\<br>(.*?)\<br>.*?/ms', $links, 1);
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];
 
		$arr['mods_alt_title']			= trim(strip_tags($this->match('/<div role="tabpanel" class="tab-pane fade in active" id="whatsnew">.*?<h3.*?>(.*?)<\/h3>.*?<div role="tabpanel" class="tab-pane fade " id="description">/ms', $links, 1)));
		
		$arr['mods_alt_desc']			= trim($this->match('/<div class="notes">.*?<h3.*?<\/h3>(.*?)<br><strong>Notes:<\/strong>.*?Read.*?/ms', $links, 1));
		$arr['mods_alt_desc_2']			= trim($this->match('/<div.*?id="whatsnew">.*?<div class="notes">.*?<h3.*?>.*?<\/h3>(.*?)<strong>.*?Notes.*?<\/strong>.*?<div.*?id="description">/ms', $links, 1));
		$arr['mods_alt_desc']			= preg_replace('/<br>/is', '',  $arr['mods_alt_desc']);		 
		$arr['mods_alt_desc_2']			= preg_replace('/<br>/is', '',  $arr['mods_alt_desc_2']);		 
		if ($arr['mods_alt_desc'] === FALSE or $arr['mods_alt_desc'] == '') $arr['mods_alt_desc'] = $arr['mods_alt_desc_2'];
		
		$arr['genres_web']				= $this->match('/<a.*?class="play-category".*?>(.*?)<\/a>/ms', $links, 1);		
		$genres_webs					= $arr['genres_web'];
		
		$arr['developer_web']			= $this->match('/<h3.*?class="marginZero dev-title wrapText">(.*?)<\/h3>/ms', $links, 1);		
		$arr['developer_web']			= str_replace('By', '', $arr['developer_web']);
		$developer_web					= $arr['developer_web'];
		$developer_web					= str_replace('By', '', $developer_web);
		
		$arr['version']					= $this->match('/<span.*?class="active">(.*?)<\/span>/ms', $links, 1);
		
		$arr['version_web']				= $arr['version'];
		$version_web					= $arr['version_web'];
		
		$arr['sizes_apkdownload']		= $this->match('/.*?Size:.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		
		$arr['article_content']			= $this->match('/<div role="tabpanel" class="tab-pane fade " id="description">.*?<div class="notes">(.*?)<\/div>.*?<div class="downloadButtonPanel addpadding" style="display:inline-block; width:100%;">/ms', $links, 1);
		$arr['article_content']			= preg_replace('/<a.*?>(.*?)<\/a>/is', '$1',  $arr['article_content']);
		$arr['article_content']			= preg_replace('/<span.*?>/is', '',  $arr['article_content']); 
		$arr['article_content']			= preg_replace('/<\/span>/is', '',  $arr['article_content']);
		/* $arr['article_content']			= preg_replace('/<h(.*?).*?id=".*?" class=".*?">/is', '<h$1>',  $arr['article_content']); */
		$arr['article_content']			= preg_replace('/<p><img.*?\/><\/p>/is', ' ',  $arr['article_content']);
		$arr['article_content']			= preg_replace('/<div.*?>/is', ' ',  $arr['article_content']); 
		$arr['article_content']			= preg_replace('/<\/div>/is', ' ',  $arr['article_content']);
		/* $arr['article_content']			= preg_replace('/\s+\s+/', ' ', $arr['article_content']); */
		$article_content				= $arr['article_content'];
 
		$arr['poster_web']				= $this->match('/<div class="siteTitleBar">.*?<img.*?src="(.*?)">.*?<\/div>.*?<nav/ms', $links, 1);		
		$poster_web						= $arr['poster_web'];
		 
		$arr['download_links_page']		= $this->match('/<a.*?type="button".*?href="(.*?)">.*?Download APK<\/a>/ms', $links, 1);
		
		$arr['canonical']				= $this->match('/<link rel="canonical" href="(.*?)" \/>/ms', $links, 1);
		
		$arr['dwps']					= $arr["canonical"]."?download=1";	
		$download_links_pages_htmlS		= $arr['dwps'];		
		$download_links_pages_ALT		= file_get_contents($download_links_pages_htmlS, false, stream_context_create($ssl)); 
		 
		$arr['downloadlink']			= $this->match('/<div class="widgetHeader">Download<\/div>.*?<p style="text-align: center">.*?<a.*?href="(.*?)">.*?<\/a>/ms', $download_links_pages_ALT, 1);
		
		$arr['namedownloadlink']		= $this->match('/<h2 style="text-align: center">Download.*?For Android<\/h2>.*?<p style="text-align: center">.*?<a.*?href=".*?">(.*?)<\/a>/ms', $download_links_pages_ALT, 1);
		
		$arr['downloadlink2']			= $this->match_all('/<div class="table-cell">.*?<a target="_top".*?href="(.*?)".*?<\/div>/ms', $this->match('/<div class="appRow">(.*?)<div class="card-with-tabs">/ms', $download_links_pages_ALT, 1), 1);
		
		$arr['namedownloadlink2']		= $this->match_all('/<div class="table-cell">.*?<a.*?>.*?svg class="icon tag-icon">.*?<use xlink:href="#apkm-icon-tag"><\/use>.*?<\/svg>(.*?)<\/a>.*?<\/div>/ms', $this->match('/<div class="appRow">(.*?)<div class="card-with-tabs">/ms', $download_links_pages_ALT, 1), 1);
		
		if($arr['title_id']){
		require_once 'play.store.local.php';
		} else {
		require_once 'play.store.local.php';
		}	
		return $arr;
		}
		
		private function get_web_id_from_search($title, $engine = "google"){
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
		$url		= "https://${engine}.com/search?q=apkmod.cc+" . rawurlencode($title);
		$ids		= $this->match_all('/<a.*?href="https:\/\/apkmod.cc\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
		if (!isset($ids[0]) || empty($ids[0])) //if search failed
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
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
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