<?php 
class starting_now
{	
	public function get_web_info($title) {
		$getLinkID		= $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
		$arr						= array();
		$arr['error']				= "No Title found in Search Results!";
		return $arr;
		} 
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID) {
		$arr						= array();	 	 
		if(isset($_POST['wp_sb'])) {		
		$sources					= $_POST['wp_url'];
		} else {		
		$sources					= "https://m.apkpure.com/" . trim($getLinkID) . "/";
		}
		return $this->scrape_web_info($sources);
	}
	public function scrape_web_info($sources) {	
		/* 
		require_once 'ssl.php';	
		$linksX						= $_POST['wp_url'];
		@ini_set('user_agent', ' Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36'); 
		 
		User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36
		 
		$links						= file_get_contents($linksX); 
		 */
		$arr						= array();
		$link_alt					= $this->get_contents("${sources}");	
		
		 
		$arr['title']				= str_replace(array('APKDownload.cc', 'apkmod.cc', 'APKMod.cc', 'APKDown.cc', '&#8211;', '&#8211;', '-', 'for Android', '+', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $link_alt, 1));
		
		 
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
		$url		= "https://${engine}.com/search?q=apkpure.com+" . rawurlencode($title);
		$ids		= $this->match_all('/<a.*?href="https:\/\/apkpure.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
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
				$ip = rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
				//$ip=172.69.70.6;
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
				//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
				curl_setopt($ch, CURLOPT_REFERER, "https://www.bing.com");
				curl_setopt($ch, CURLOPT_AUTOREFERER, true);
				$html = curl_exec($ch);
				curl_close($ch);
				return $html;
		}
		
		private function get_contents($url, $ua = 'Mozilla/5.0 (Windows NT 5.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', $referer = 'http://www.google.com/') {
		if (function_exists('curl_exec')) {
			$header[0] = "Accept-Language: en-us,en;q=0.5";
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_USERAGENT, $ua);
			curl_setopt($curl, CURLOPT_REFERER, $referer);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_TIMEOUT, 10);
			$html = curl_exec($curl);
			curl_close($curl);
		} else { 
			$html = file_get_contents($url);
		}
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