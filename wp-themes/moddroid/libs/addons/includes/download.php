<?php 

/*
(.*?)\?.*? ===> hapus semua dibelakang tanda (?)
(.*?)\=.*? ===> hapus semua dibelakang tanda (=)
\\(?(.*?)\\)?\).*? ---> hapus tanda kurung  (contoh)
(.*?)\&.*? ===> hapus semua dibelakang tanda (&)
.*?\?id=(.*?) ===> hapus semua dibelakang tanda (id=)
.*?\?id=(.*?)\&.*? ===> hapus semua dibelakang sebelum tanda (id=) den tanda (&) 
.*?\?id=(.*?)\<br>.*? ===> hapus semua dibelakang sebelum tanda (id=) den tanda (&) 
.*?\embed\/(.*?)\?.*? ===> hapus semua dibelakang sebelum tanda (id=) den tanda (&) 	

 
 <div class="hAyfc"><div class="BgcNfc">Size</div><span class="htlgb"><div class="IQ1z0d"><span class="htlgb">112M</span></div></span></div>
(\d+)
(?:(?<=\(\d{3})\))? ?(?:([.-])?([2-9]\d{4})
(\d+)[^0-9]+ (.*\d+.*)
(\d+)[^0-9]+(\d+)
(\d+).*?(\d+)
^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})
^[a-z0-9_.\/\\\]*$
[\-+]?[0-9]*\.*\,?[0-9]+
[\-+]?[0-9]*\.*\,?[0-9]+
(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})
(?.(?<=\(\d{3})\))? ?(?.(?<=\d{3})[.-])?([2-9]\d{2})
(\d.\d)
([0-9,]*)
([a-zA-Z])
([a-zA-Z]+) (\d+)
d+(\.\d+)+
(?:[0-9]+\. ?)+
(\d+\.)+\d+
(\d.+)
^(\d.+)\d+$
(\d.+)\d.+
\d+
.*?([0-9a-zA-Z]+)
.*?([0-9]+)
.*?([a-zA-Z]+)
*/

/**
 * Contains a link to the image, allows you to customize its size and download it.
 *
 * This class only works with images stored on googleusercontent.com.
 * To modify the image, special parameters are added to the URL, using a hyphen.
 *
 * **Supported parameters:**
 *
 * | Param | Name         | Description                                     | Example                       |
 * | :---: |:------------ | :---------------------------------------------- | ----------------------------: |
 * | sN | size            | Sets the longer of height or width to N pixels  | s70 ![][_s] ![][_s2] ![][_s3] |
 * | wN | width           | Sets width of image to N pixels                 | w70 ![][_w] ![][_w2] ![][_w3] |
 * | hN | height          | Sets height of image to N pixels                | h70 ![][_h] ![][_h2] ![][_h3] |
 * | c  | square crop     | Sets square crop                   | w40-h70-c ![][_c1.1] ![][_c1.2] ![][_c1.3] |
 * |    |                 |                                    | w70-h40-c ![][_c2.1] ![][_c2.2] ![][_c2.3] |
 * |    |                 |                                    | w70-h70-c ![][_c3.1] ![][_c3.2] ![][_c3.3] |
 * | p  | smart crop      | Sets smart crop                    | w40-h70-p ![][_p1.1] ![][_p1.2] ![][_p1.3] |
 * |    |                 |                                    | w70-h40-p ![][_p2.1] ![][_p2.2] ![][_p2.3] |
 * |    |                 |                                    | w70-h70-p ![][_p3.1] ![][_p3.2] ![][_p3.3] |
 * | bN | border          | Sets border of image to N pixels            | s70-b10 ![][_b] ![][_b2] ![][_b3] |
 * | fv | vertical flip   | Vertically flips the image                | s70-fv ![][_fv] ![][_fv2] ![][_fv3] |
 * | fh | horizontal flip | Horizontally flips the image              | s70-fh ![][_fh] ![][_fh2] ![][_fh3] |
 *
 * [_s]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=s70
 * [_w]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70
 * [_h]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=h70
 * [_c1.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w40-h70-c
 * [_c2.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70-h40-c
 * [_c3.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70-h70-c
 * [_p1.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w40-h70-p
 * [_p2.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70-h40-p
 * [_p3.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70-h70-p
 * [_b]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=s70-b10
 * [_fv]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=s70-fv
 * [_fh]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=s70-fh
 *
 * [_s2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=s70
 * [_w2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70
 * [_h2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=h70
 * [_c1.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w40-h70-c
 * [_c2.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70-h40-c
 * [_c3.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70-h70-c
 * [_p1.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w40-h70-p
 * [_p2.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70-h40-p
 * [_p3.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70-h70-p
 * [_b2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=s70-b10
 * [_fv2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=s70-fv
 * [_fh2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=s70-fh
 *
 * [_s3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=s70
 * [_w3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70
 * [_h3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=h70
 * [_c1.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w40-h70-c
 * [_c2.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70-h40-c
 * [_c3.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70-h70-c
 * [_p1.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w40-h70-p
 * [_p2.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70-h40-p
 * [_p3.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70-h70-p
 * [_b3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=s70-b10
 * [_fv3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=s70-fv
 * [_fh3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=s70-fh
 *
 * If the URL has no parameters, by default GoogleUserContents uses the parameter **s512**.
 * This means that the width or height will not exceed 512px.
 *
 * @see https://developers.google.com/people/image-sizing Goolge People API - Image Sizing.
 * @see https://github.com/null-dev/libGoogleUserContent Java library to create googleusercontent.com URLs.
 * @see https://sites.google.com/site/picasaresources/Home/Picasa-FAQ/google-photos-1/how-to/how-to-get-a-direct-link-to-an-image
 *      Google Photos and Picasa: How to get a direct link to an image (of a specific size)
 **/
 
 
$apkfind						= "http://apkfind.com/store/download?id=" . $titleIdX1 . ""; 
$apkpure1						= "https://apkpure.com/genericApp/" . $titleIdX1 . "/download"; 
$apkpure						= "https://apkpure.com/.*?/" . $titleIdX1 . "/download"; 
$apkmirror						= "https://www.apkmirror.com/?post_type=app_release&searchtype=apk&s=" . $titleIdX1 . ""; 
$apkleecher						= "https://apkleecher.com/download/dl.php?dl=" . $titleIdX1 . ""; 
$apkcombo						= "https://apkcombo.com/genericApp/" . $titleIdX1 . "/download/apk"; 
$apkpremier						= "https://apkpremier.com/download/" . $titleIdX1 . ""; 
$apkgk_dw						= "https://apkgk.com/" . $titleIdX1 . "/download"; 
$apkfind_dl						= $this->geturl("${apkfind}"); 
$apkpure_dl						= $this->geturl("${apkpure}"); 
$apkmirror_dl					= $this->geturl("${apkmirror}"); 
$apkleecher_dl					= $this->geturl("${apkleecher}"); 
$apkcombo_dl					= $this->geturl("${apkcombo}"); 
$apkpremier_dl					= $this->geturl("${apkpremier}"); 
$apkgk_dl						= $this->geturl("${apkgk_dw}"); 

$arr['download_links_page_apkgk']		= $apkgk_dw;

$arr['downloadapkxapkpremier']	= $this->match('/<iframe.*?id="iframe_download".*?src="(.*?)".*?>.*?<\/iframe>/ms', $apkpremier_dl, 1) ;

$arr['downloadapkgk']			= $this->match('/<div class="c-download"><a.*?href="(.*?)">.*?<\/a>.*?<\/div>/ms', $apkgk_dl, 1) ;

$arr['link_download_apkgk']		= $this->match_all('/<a.*?href="(.*?)">.*?<\/a>/ms', $this->match('/<div class="c-download">(.*?)<\/div>/ms', $apkgk_dl, 1), 1);

$arr['downloadlinks_ori']		= $arr['link_download_apkgk'];
$arr['downloadlink_ori']		= $arr['link_download_apkgk'][0]; 
$arr['downloadlink_ori_1']		= $arr['link_download_apkgk'][1]; 
$arr['downloadlink_ori_2']		= $arr['link_download_apkgk'][2]; 

$arr['name_download_apkgk']		= $this->match_all('/<a.*?title="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="c-download">(.*?)<\/div>/ms', $apkgk_dl, 1), 1);
$arr['name_download_apkgk']		= str_replace('Download', '', $arr['name_download_apkgk']);	 
$arr['name_downloadlinks_ori']	= $arr['name_download_apkgk']; 

$arr['size_download_apkgk']		= $this->match_all('/<span>.*?\((.*?)\).*?<\/span>/ms', $this->match('/<div class="c-download">(.*?)<\/div>/ms', $apkgk_dl, 1), 1);
$arr['size_downloadlinks_orig']	= $arr['size_download_apkgk']; 




/* 	
if ( $arr['downloadapkxapkpremier'] === FALSE or $arr['downloadapkxapkpremier'] == '' ) $arr['downloadapkxapkpremier'] = $arr['downloadapkgk'];	
$arr['namedownloadapkx1']		= $this->match('/<tr>.*?<td>File Name: <\/td>.*?<td>(.*?)<\/td>.*?<\/tr>/ms', $apkfind_dl, 1) ;
$arr['downloadapkxapkpure'] 	= $this->match('/<iframe.*?id="iframe_download".*?src="(.*?)".*?>.*?<\/iframe>/ms', $apkpure_dl, 1) ;
$arr['downloadapkxapkpure1']	= $this->match('/<a.*?id="download_link".*?href="(.*?)".*?>.*?<\/a>/ms', $apkpure_dl, 1) ;
$arr['downloadapkxapkmirror']	= $this->match('/<iframe.*?id="iframe_download".*?src="(.*?)".*?>.*?<\/iframe>/ms', $apkmirror_dl, 1) ;
$arr['downloadapkxapkleecher']	= $this->match('/<iframe.*?id="iframe_download".*?src="(.*?)".*?>.*?<\/iframe>/ms', $apkleecher_dl, 1) ;
$arr['downloadapkxapkcombo']	= $this->match('/<div.*?id="best-variant-tab".*?<a.*?href="(.*?)".*?class="variant".*?<div.*?id="variants-tab" style="display: none;">/ms', $apkcombo_dl, 1) ;
 

$arr['downloadapkx1']			= $this->match('/<a href="(.*?)" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect fixed-size".*?>.*?<span id="text">Start Download<\/span>.*?<span class="mdl-button__ripple-container"><span class="mdl-ripple"><\/span><\/span><\/a>/ms', $apkfind_dl, 1) ;
$arr['namedownloadapk3']		= $this->match('/<div class="ft_folder"><img.*?>(.*?)<\/div>/msi', $apkgk3, 1);
$arr['namedownloadapkx3']		= $this->match_all('/<a.*?>.*?<img.*?>(.*?)<span class="dersize">.*?<\/span>.*?<\/a>/ms', $this->match('/<div class="dvContents_a">.*?<ul>(.*?)<\/ul>.*?<\/div>/ms', $apkgk3, 1), 1);
$arr['downloadapkx3']			= $this->match_all('/<a.*?href="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="dvContents_a">.*?<ul>(.*?)<\/ul>.*?<\/div>/ms', $apkgk3, 1), 1);
*/