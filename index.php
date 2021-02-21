<<?php
require_once(dirname(__FILE__) . '/token.php');
require_once(dirname(__FILE__) . '/curl-lib.php');
$website = "https://api.telegram.org/bot".$token;
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$last_message = dirname(__FILE__) . '/message.txt';
$messaggio_prec = file_get_contents($last_message);

$chatid = $update["message"]["from"]["id"];
$text = $update["message"]["text"];
if($text=="/start"){
 $keyboard = '["Dettagiato"],["Giornaliero"]';
 sendMessage($chatid,"Ciao che tipo di meteo vuoi?",$keyboard);
 file_put_contents($last_message, $text);
}
switch($messaggio_prec){
 case "/start" :
  if ($text=="Dettagiato"){
  $keyboard = '["Tempo"],["Temperatura"],["Percepita"],["Minime"],["Massime"],["Alba"]["Tramonto"]';
  sendMessage($chatid,"cosa vuoi sapere di preciso?",$keyboard);
  file_put_contents($last_message, $text);
  }if($text=="Giornaliero"){
   sendMessage($chatid,"inserisci il luogo",$keyboard);
   file_put_contents($last_message, $text);
   }else{
   $keyboard = '["Dettagiato"],["Giornaliero"]';
   sendMessage($chatid,"non ho capito!",$keyboard);
   }
  break;
 case "Dettagiato" :
  if ($text=="Tempo"||"Temperatura"||"Percepita"||"Minime"||"Massime"||"Alba"||"Tramonto"){
  sendMessage($chatid,"inserisci il luogo",$keyboard);
  file_put_contents($last_message, $text);
  }else{
   $keyboard = '["Dettagiato"],["Giornaliero"]';
   sendMessage($chatid,"non ho capito!",$keyboard);
  }
  case "Giornaliero":
   $output = http_request("https://server-openweather.herokuapp.com/luogo/$text");
   if(is_numeric($output)){
     sendMessage($chatid,"furbetto scrivi una città",$tastiera);
     }
     else{
         sendMessage($chatid,$output,$keyboard);
         file_put_contents($last_message, $text);
        } 
 break;
 case "Tempo" :
  sendMessage($chatid,"work in progress",$keyboard);
  file_put_contents($last_message, $text);
  break;
  case "Temperatura" :
  sendMessage($chatid,"work in progress",$keyboard);
  file_put_contents($last_message, $text);
  break;
  case "Percepita" :
  sendMessage($chatid,"work in progress",$keyboard);
  file_put_contents($last_message, $text);
  break;
  case "Minime" :
  sendMessage($chatid,"work in progress",$keyboard);
  file_put_contents($last_message, $text);
  break;
  case "Massime" :
  sendMessage($chatid,"work in progress",$keyboard);
  file_put_contents($last_message, $text);
  break;
  case "Alba" :
  sendMessage($chatid,"work in progress",$keyboard);
  file_put_contents($last_message, $text);
  break;
  case "Tramonto" :
  sendMessage($chatid,"work in progress",$keyboard);
  file_put_contents($last_message, $text);
  break;
 default:
  sendMessage($chatid,"per iniziare digita /start",$keyboard);
   break;
}
 
function sendMessage($chatid,$text,$keyboard){
 if(isset($keyboard)){
  $tastiera = '&reply_markup={"keyboard":['.$keyboard.'],"resize_keyboard":true}'; 
 }
$url = $GLOBALS["website"]."/sendMessage?chat_id=$chatid&text=".urlencode($text).$tastiera;
file_get_contents($url);
}

?>>
