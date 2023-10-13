<?php 
class getslinks
{	
	public function get_web_info($title)
	{
		$getLinkID = $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
		$arr						= array();
		$arr['error']				= "No Title found in Search Results!";
		return $arr;
		}
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID)
	{
		$arr						= array();	 		
		$sources					= "https://apkdown.cc/" . trim($getLinkID) . "/";
		return $this->scrape_web_info($sources);
	}
	public function scrape_web_info($sources)
	{				
		$arr						= array();
		$links						= $this->geturl("${sources}");
		$arr['title_id']			= $this->match('/<a.*?title="View on Play Store".*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>/ms', $links, 1);
		$arr['GP_ID']				= $this->match('/<a.*?title="View on Play Store".*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>/ms', $links, 1);
		$wp_title_GP				= preg_replace('/&hl=/is', '',  $wp_title_GP);
		$arr['GP_ID']				= str_replace('&hl=ru', '', $arr['GP_ID']);
		$arr['GP_ID']				= str_replace('#', '', $arr['GP_ID']);
		$arr['GP_IDX']				= $this->match('/<a.*?title="View on Play Store".*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>/ms', $links, 1);
		if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_IDX'] = $arr['GP_IDX1'];
		$title_id					= $this->match('/<a.*?title="View on Play Store".*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>/ms', $links, 1);
		if(empty($title_id) || !preg_match("/(.*?)/i", $title_id)) {
			$arr['error']			= "Title ID Play Store No Found";
			return $arr;
		}
		
		$arr['title_id']			= $title_id;
		$titleId					= $arr['GP_ID'];
		
		$arr['title']				= str_replace(array('APKDownload.cc', '&#8211;', '-', 'for Android', '+', 'Download'), '', $this->match('/<title>(.*?)\&.*?<\/title>/ms', $links, 1));
		
		$arr['title2']				= trim(strip_tags($this->match('/<div class="p1">.*?<h1>(.*?)<\/h1>.*?<\/div>/ms', $links, 1)));
		
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title3'];	
		
		$arr['title']				= str_replace('[', '(', $arr['title']);
		$arr['title']				= str_replace(']', ')', $arr['title']);
		$arr['title']				= str_replace('download', '', $arr['title']);
		$arr['title2']				= str_replace('(', ',', $arr['title2']);
		$arr['title2']				= str_replace(')', ',', $arr['title2']);
		$arr['title2']				= str_replace('/', ',', $arr['title2']);
		$arr['title3']				= str_replace('(', ',', $arr['title3']);
		$arr['title3']				= str_replace(')', ',', $arr['title3']);
		$arr['title3']				= str_replace('[', ',', $arr['title3']);
		$arr['title3']				= str_replace(']', ',', $arr['title3']);		
		 
        $arr['mods']				= str_replace(array('APKDownload.cc', 'MOD ', 'Download'), '', $this->match('/<div class="table-cell">.*?<h1.*?>.*?\((.*?)\).*?<\/h1>/ms', $links, 1));

        $arr['mods2']				= $this->match('/<div class="notes">.*?MOD Features.*?<\/h3>(.*?)<\/div>/ms', $links, 1);
		$arr['mods2']				= preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['mods2']);
		$arr['mods2']				= preg_replace('/<h2.*?>.*?<\/h2>.*?<br>.*?<br>.*?<br>.*?/is', '',  $arr['mods2']);
		$arr['mods2']				= preg_replace('/<strong>Note.*?<\/strong>.*?<br>.*?<br>.*?<\/div>.*?/is', '',  $arr['mods2']);

		$arr['mods3']				= $this->match('/<br>.*?<h3 id="h-mod-feature">MOD feature<\/h3>.*?.*?\<br>(.*?)\<br>.*?/ms', $links, 1);
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];
 
		$arr['mods_alt_title']		= trim(strip_tags($this->match('/<div role="tabpanel" class="tab-pane fade in active" id="whatsnew">.*?<h3.*?>(.*?)<\/h3>.*?<div role="tabpanel" class="tab-pane fade " id="description">/ms', $links, 1)));
		
		$arr['mods_alt_desc']		= trim($this->match('/<div class="notes">.*?<h3.*?<\/h3>(.*?)<br><strong>Notes:<\/strong>.*?Read.*?/ms', $links, 1));
		$arr['mods_alt_desc_2']		= trim($this->match('/<div.*?id="whatsnew">.*?<div class="notes">.*?<h3.*?>.*?<\/h3>(.*?)<strong>.*?Notes.*?<\/strong>.*?<div.*?id="description">/ms', $links, 1));
		$arr['mods_alt_desc']		= preg_replace('/<br>/is', '',  $arr['mods_alt_desc']);		 
		$arr['mods_alt_desc_2']		= preg_replace('/<br>/is', '',  $arr['mods_alt_desc_2']);		 
		if ($arr['mods_alt_desc'] === FALSE or $arr['mods_alt_desc'] == '') $arr['mods_alt_desc'] = $arr['mods_alt_desc_2'];
		
		$arr['version']				= $this->match('/<span.*?class="active">(.*?)<\/span>/ms', $links, 1);
		
		$arr['sizes_apkdownload']	= $this->match('/.*?Size:.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		
		$arr['downloadlink']		= $this->match('/<h2 style="text-align: center">Download.*?For Android<\/h2>.*?<p style="text-align: center">.*?<a.*?href="(.*?)">.*?<\/a>/ms', $links, 1);
		
		$arr['namedownloadlink']	= $this->match('/<h2 style="text-align: center">Download.*?For Android<\/h2>.*?<p style="text-align: center">.*?<a.*?href=".*?">(.*?)<\/a>/ms', $links, 1);
		
		$arr['downloadlink2']		= $this->match_all('/<a.*?ref="nofollow noopener noreferrer" class=".*?" href=".*?\=(.*?)">.*?<\/a>/ms', $this->match('/<div class="listWidget">(.*?)<div id="sidebar".*?>/ms', $links, 1), 1);
		
		$arr['namedownloadlink2']	= $this->match_all('/<a target="_blank" ref="nofollow noopener noreferrer" style=".*?" href=".*?">.*?<svg class="icon tag-icon">.*?<use xlink:href="#apkm-icon-tag"><\/use>.*?<\/svg>(.*?)<\/a>/ms', $this->match('/<div class="listWidget">(.*?)<div id="sidebar".*?>/ms', $links, 1), 1);		 
		
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
		$url						= "http://www.${engine}.com/search?q=apkdown.cc+" . rawurlencode($title);
		$ids						= $this->match_all('/<a.*?href="https:\/\/apkdown.cc\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
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