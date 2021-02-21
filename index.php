<<?php
require_once(dirname(__FILE__) . '/token.php');
require_once(dirname(__FILE__) . '/curl-lib.php');
$website = "https://api.telegram.org/bot".$token;
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatid = $update["message"]["from"]["id"];
$text = $update["message"]["text"];
 if($text!=NULL){
        $output = http_request("https://server-openweather.herokuapp.com/luogo/$text");
        if(is_numeric($output)){
        sendMessage($chatid,"furbetto scrivi una città");
        }
        else{
        //$tempo = json_encode($output, JSON_PRETTY_PRINT);
        sendMessage($chatid,$output);
        }
        
 } 
function sendMessage($chatid,$text){
$url = $GLOBALS["website"]."/sendMessage?chat_id=$chatid&text=".urlencode($text);
file_get_contents($url);
}

?>>
