<?php

if ( ! function_exists('file_get_html') )
    require_once 'includes/dom.php';
    require_once 'dom.php';


class ScrapPlayStore {
    public $o = null;
    public $error = null;

    function __construct($appid){
        global $opt_themes;
        $language						= $opt_themes['ex_themes_extractor_apk_language_'];
        $arr['languages']				= $language;
        $url_alt                        = 'https://play.google.com/store/apps/details?id=' . $appid;
        $url_alt2                       = 'https://apk.support/app/'.$appid;
        $url                            = 'https://apk.demos.web.id/details.php?id='.$appid;
        $apk_infox						= "https://apks.demos.web.id/apk/?id=".$appid."&hl=".$language;
        $apk_infos						= $this->geturl("${apk_infox}");
         
    }

    public function appInfo($var="Current Version"){
        global $opt_themes;
        $language						= $opt_themes['ex_themes_extractor_apk_language_'];
        $arr['languages']				= $language;
        $apk_infox						= "https://apks.demos.web.id/apk/?id=".$appid."&hl=".$language;
        $apk_infos						= $this->geturl("${apk_infox}");
        $version_GP     				= $this->match('/<td id="appversion">(.*?)<\/td>/msi', $apk_infos, 1);
        $all            = $this->o->find('table.tables.tables-striped.tables-borderless');
        $appInfo        = array();
        foreach($all as $e) {
            $appInfo[$e->find('td#appversion', 0)->plaintext];
        }

        if(isset($version_GP ) )
        return $version_GP;

        return false;
    }

    private function geturl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HEADER, false); 
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