<<?php
require_once(dirname(__FILE__) . '/token.php');
require_once(dirname(__FILE__) . '/curl-lib.php');
$website = "https://api.telegram.org/bot".$token;
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatid = $update["message"]["from"]["id"];
$text = $update["message"]["text"];
switch($text){

    case "luogo" :
        $output =http_request("https://server-openweather.herokuapp.com/luogo");
        sendMessage($chatid, $output);
        break;
    default:
    sendMessage($chatid,"ciao");
    break;
}
function sendMessage($chatid,$text){
$url = $GLOBALS["website"]."/sendMessage?chat_id=$chatid&text=".urlencode($text);
file_get_contents($url);
}

?>>
