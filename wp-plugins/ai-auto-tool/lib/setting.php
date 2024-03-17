<?php 
defined('ABSPATH') or die();
class rendersetting {
    public $languageCodes = [
    'vi' => 'Vietnamese',
    'en' => 'English',
    'th' => 'Thai',
    'ja' => 'Japanese',
    'fr' => 'French',
    'pt' => 'Portuguese',
    'af' => 'Afrikaans',
    'sq' => 'Albanian',
    'am' => 'Amharic',
    'ar' => 'Arabic',
    'hy' => 'Armenian',
    'az' => 'Azerbaijani',
    'eu' => 'Basque',
    'be' => 'Belarusian',
    'bn' => 'Bengali',
    'bs' => 'Bosnian',
    'bg' => 'Bulgarian',
    'ca' => 'Catalan',
    'ceb' => 'Cebuano',
    'ny' => 'Chichewa',
    'zh' => 'Chinese',
    'co' => 'Corsican',
    'hr' => 'Croatian',
    'cs' => 'Czech',
    'da' => 'Danish',
    'nl' => 'Dutch',
    'eo' => 'Esperanto',
    'et' => 'Estonian',
    'tl' => 'Filipino',
    'fi' => 'Finnish',
    'fy' => 'Frisian',
    'gl' => 'Galician',
    'ka' => 'Georgian',
    'de' => 'German',
    'el' => 'Greek',
    'gu' => 'Gujarati',
    'ht' => 'Haitian Creole',
    'ha' => 'Hausa',
    'haw' => 'Hawaiian',
    'he' => 'Hebrew',
    'hi' => 'Hindi',
    'hmn' => 'Hmong',
    'hu' => 'Hungarian',
    'is' => 'Icelandic',
    'ig' => 'Igbo',
    'id' => 'Indonesian',
    'ga' => 'Irish',
    'it' => 'Italian',
    'jv' => 'Javanese',
    'kn' => 'Kannada',
    'kk' => 'Kazakh',
    'km' => 'Khmer',
    'ko' => 'Korean',
    'ku' => 'Kurdish',
    'ky' => 'Kyrgyz',
    'lo' => 'Lao',
    'la' => 'Latin',
    'lv' => 'Latvian',
    'lt' => 'Lithuanian',
    'lb' => 'Luxembourgish',
    'mk' => 'Macedonian',
    'mg' => 'Malagasy',
    'ms' => 'Malay',
    'ml' => 'Malayalam',
    'mt' => 'Maltese',
    'mi' => 'Maori',
    'mr' => 'Marathi',
    'mn' => 'Mongolian',
    'my' => 'Myanmar',
    'ne' => 'Nepali',
    'no' => 'Norwegian',
    'ps' => 'Pashto',
    'fa' => 'Persian',
    'pl' => 'Polish',
    'pa' => 'Punjabi',
    'ro' => 'Romanian',
    'ru' => 'Russian',
    'sm' => 'Samoan',
    'gd' => 'Scots Gaelic',
    'sr' => 'Serbian',
    'st' => 'Sesotho',
    'sn' => 'Shona',
    'sd' => 'Sindhi',
    'si' => 'Sinhala',
    'sk' => 'Slovak',
    'sl' => 'Slovenian',
    'so' => 'Somali',
    'es' => 'Spanish',
    'su' => 'Sundanese',
    'sw' => 'Swahili',
    'sv' => 'Swedish',
    'tg' => 'Tajik',
    'ta' => 'Tamil',
    'te' => 'Telugu',
    'tr' => 'Turkish',
    'uk' => 'Ukrainian',
    'ur' => 'Urdu',
    'uz' => 'Uzbek',
    'cy' => 'Welsh',
    'xh' => 'Xhosa',
    'yi' => 'Yiddish',
    'yo' => 'Yoruba',
    'zu' => 'Zulu',
];

    public $plan = '[
  {
    "product": "aiautotoolpremium",
    "schedule_ai_post": "unlimited",
    "ai_post": "unlimited",
    "auto_general_comment": "unlimited"
  },
  {
    "product": "forme",
    "schedule_ai_post": "unlimited",
    "ai_post": "unlimited",
    "auto_general_comment": "unlimited"
  },
  {
    "product": "aiautotoolpro",
    "schedule_ai_post": 1000,
    "ai_post": 1000,
    "auto_general_comment": 1000
  },
  {
    "product": "free",
    "schedule_ai_post": 50,
    "ai_post": 50,
    "auto_general_comment": 10
  }
]
';

    
    public static $is_premium = false;

    public static function is_premium(){
        $fs   = freemius( 15096 ); 
        return $fs;
        // if ( aiautotool_premium()->is_plan('aiautotoolpro', true) ) {
        //     return $fs;
        // } else {
          
        //     return false;
        // }

    }
    public function render_plan(){

    }
    public function render_setting() {
        // Cài đặt cho lớp cơ sở ở đây
    }
    public function render_tab_setting() {
        // Cài đặt cho lớp cơ sở ở đây
    }
    public function render_feature(){
        
    }
}

?>