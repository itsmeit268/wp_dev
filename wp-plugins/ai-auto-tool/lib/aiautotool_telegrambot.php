<?php 
defined('ABSPATH') or die();
class aiautotool_Telegram_Notifications {

    private $telegram_bot_token;
    private $telegram_chat_id;

    public function __construct($bot_token, $chat_id) {
        $this->telegram_bot_token = $bot_token;
        $this->telegram_chat_id = $chat_id;

        
    }

    public function send_bot_message($message) {
        // Telegram API URL
        $telegram_api_url = "https://api.telegram.org/bot" . $this->telegram_bot_token . "/sendMessage";

        // Parameters for the HTTP request
        $params = array(
            'chat_id' => $this->telegram_chat_id,
            'text' => $message,
        );

        // Initialize cURL session
        $ch = curl_init($telegram_api_url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session
        $result = curl_exec($ch);

        // Close cURL session
        curl_close($ch);
    }

    
}
 ?>