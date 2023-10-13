<?php
class getslinks
{
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
        /* 
        https://rajaapk.com/" . trim($getLinkID) . "/
         */
        $sources = "https://rajaapk.com/" . trim($getLinkID) . "/";
        return $this->scrape_web_info($sources);
    }
    public function scrape_web_info($sources)
    {
        $arr					= array();
        $links					= $this->geturl("${sources}");
         
        $arr['title_id']		= $this->match('/<li>.*?<p>.*?<a class="ga".*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>.*?<\/p>.*?<\/li>/ms', $links, 1);
        $arr['GP_ID']			= $this->match('/<li>.*?<p>.*?<a class="ga".*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>.*?<\/p>.*?<\/li>/ms', $links, 1);
        $wp_title_GP			= preg_replace('/&hl=/is', '',  $wp_title_GP);
        $arr['GP_ID']			= str_replace('&hl=ru', '', $arr['GP_ID']);
        $arr['GP_ID']			= str_replace('#', '', $arr['GP_ID']);
        $arr['GP_IDX']			= $this->match('/<li>.*?<p>.*?<a class="ga".*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>.*?<\/p>.*?<\/li>/ms', $links, 1);
        if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_IDX'] = $arr['GP_IDX1'];
        $title_id				= $this->match('/<li>.*?<p>.*?<a class="ga".*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>.*?<\/p>.*?<\/li>/ms', $links, 1);
        
		if(empty($title_id) || !preg_match("/(.*?)/i", $title_id)) {
			$arr['error']		= NO_ID;
			echo $arr['error'];
		}
		
        $arr['title_id']		= $title_id;
        $titleId				= $arr['GP_ID'];
        
        $arr['title2']			= str_replace(array('RajaApk.com', '&#8211;', '-', 'Download'), '', $this->match('/<title>(.*?)\-.*?<\/title>/ms', $links, 1));
        $arr['title']			= trim(strip_tags($this->match('/<meta property="og:title" content="(.*?)".*?>/ms', $links, 1)));
        if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title3'];
        $arr['title']			= str_replace('[', '(', $arr['title']);
        $arr['title']			= str_replace(']', ')', $arr['title']);
        $arr['title']			= str_replace('download', '', $arr['title']);
        $arr['title2']			= str_replace('(', ',', $arr['title2']);
        $arr['title2']			= str_replace(')', ',', $arr['title2']);
        $arr['title2']			= str_replace('/', ',', $arr['title2']);
        $arr['title3']			= str_replace('(', ',', $arr['title3']);
        $arr['title3']			= str_replace(')', ',', $arr['title3']);
        $arr['title3']			= str_replace('[', ',', $arr['title3']);
        $arr['title3']			= str_replace(']', ',', $arr['title3']);
		 
        $arr['mods']			= $this->match('/<div class="short-detail">.*?<h1.*?>.*?\((.*?)\).*?<\/h1>/ms', $links, 1);

        $arr['mods2']			= $this->match('/<div class="notes">.*?MOD Features.*?<\/h3>(.*?)<\/div>/ms', $links, 1);
		$arr['mods2']			= preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['mods2']);
		$arr['mods2']			= preg_replace('/<h2.*?>.*?<\/h2>.*?<br>.*?<br>.*?<br>.*?/is', '',  $arr['mods2']);
		$arr['mods2']			= preg_replace('/<strong>Note.*?<\/strong>.*?<br>.*?<br>.*?<\/div>.*?/is', '',  $arr['mods2']);

		$arr['mods3']			= $this->match('/<br>.*?<h3 id="h-mod-feature">MOD feature<\/h3>.*?.*?\<br>(.*?)\<br>.*?/ms', $links, 1);
        //if ($arr['mods2'] === FALSE or $arr['mods2'] == '') $arr['mods2'] = $arr['mods2'];
        
       
        $arr['version']			= $this->match('/<li>.*?<p><strong>Versi Terkini.*?<\/strong><\/p>.*?<p>(.*?)<\/p>.*?<\/li>/ms', $links, 1);
        $arr['sizes']			= $this->match('/.*?Size:.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		
        $arr['downloadlink']			= $this->match('/<h2 style="text-align: center">Download.*?For Android<\/h2>.*?<p style="text-align: center">.*?<a.*?href="(.*?)">.*?<\/a>/ms', $links, 1);
        $arr['namedownloadlink']		= $this->match('/<h2 style="text-align: center">Download.*?For Android<\/h2>.*?<p style="text-align: center">.*?<a.*?href=".*?">(.*?)<\/a>/ms', $links, 1);
         
        $arr['downloadlink2']			= $this->match_all('/<a.*?href="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="description">(.*?)<\/div>/ms', $links, 1), 1);
        $arr['namedownloadlink2']		= $this->match_all('/<a.*?href=".*?".*?>(.*?)<\/a>/ms', $this->match('/<div class="description">(.*?)<\/div>/ms', $links, 1), 1);
		
        $arr['contentapk']				= $this->match('/<div.*?id="description">.*?<div class="notes">(.*?)<\/div>.*?<div class="downloadButtonPanel addpadding".*?>/ms', $links, 1);
		$arr['contentapk']				= preg_replace('/\s+/', ' ', $arr['contentapk']);
		$arr['contentapk']				= preg_replace('/<a.*?>(.*?)<\/a>/is', '<i>$1</i>',  $arr['contentapk']);
		$arr['contentapk']				= preg_replace('/<img data-lazyloaded=.*?\/>/is', '',  $arr['contentapk']);
		$arr['contentapk']				= preg_replace('/<p><img loading="lazy".*?src="(.*?)".*?\/><\/p>/is', '',  $arr['contentapk']);
		$arr['contentapk']				= preg_replace('/<noscript>(.*?)<\/noscript>/is', '$1',  $arr['contentapk']);
		$arr['contentapk']				= preg_replace('/<div class="wp-block-image"><\/div>/is', ' ',  $arr['contentapk']);
		  
		
		$apkgkx1						= "https://apkgk.com/" . $titleId . "/download";
		$apkgkx2						= "https://apkgk.com/APK-Downloader?package=" . $titleId . "";
  		$apkgk1							= $this->geturl("${apkgkx1}");
		$apkgk2							= $this->geturl("${apkgkx2}");
		$arr['downloadapk2222222']		= $this->match('/<div class="c-download">.*?<a.*?class="btn btn-cus btn-down" href="(.*?)">.*?<\/a>.*?<\/div>/msi', $apkgk1, 1);
		$arr['downloadapk']				= $this->match_all('/<div class="c-download">.*?<a.*?class="btn btn-cus btn-down" href="(.*?)">.*?<\/a>.*?<\/div>/ms', $this->match('/<div class="row txt-center Choose-Download">(.*?)<\/div>/ms', $apkgk1, 1), 1);
		
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
        $url = "http://www.${engine}.com/search?q=rajaapk.com+" . rawurlencode($title);
        $ids = $this->match_all('/<a.*?href="https:\/\/rajaapk.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
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