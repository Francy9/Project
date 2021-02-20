<<?php
$token = "1674170793:AAHuKLw6Tvxw5v4s52a0Fwb5u3E3sW31FYQ";
$website = "https://api.telegram.org/bot".$token;
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatid = $update["message"]["from"]["id"];
$text = $update["message"]["text"];
switch($text){

    case "luogo" :
        $handle = curl_init();
        $url = "https://server-openweather.herokuapp.com/luogo";
        // Set the url
        curl_setopt($handle, CURLOPT_URL, $url);
        // Set the result output to be a string
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_HEADER, 0);
        $output = curl_exec($handle);
        curl_close($handle);  
       $test = json_decode($output, TRUE);
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