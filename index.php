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
else{
switch($messaggio_prec){
 case "/start" :
  if ($text=="Dettagiato"){
  $keyboard = '["Tempo"],["Temperatura"],["Percepita"],["Minime"],["Massime"],["Alba"],["Tramonto"]';
  sendMessage($chatid,"cosa vuoi sapere di preciso?",$keyboard);
  file_put_contents($last_message, $text);
  }else{
  if($text=="Giornaliero"){
   sendMessage($chatid,"inserisci il luogo",$keyboard);
   file_put_contents($last_message, $text);
   }else{
   $keyboard = '["Dettagiato"],["Giornaliero"]';
   sendMessage($chatid,"non ho capito!",$keyboard);
   }
  }
  break;
 case "Dettagiato" :
  if ($text=="Tempo"|| 
      $text=="Temperatura"||
      $text=="Percepita"||
      $text=="Minime"||
      $text=="Massime"||
      $text=="Alba"||
      $text=="Tramonto"){
  sendMessage($chatid,"inserisci il luogo",$keyboard);
  file_put_contents($last_message, $text);
  }else{
   $keyboard = '["Tempo"],["Temperatura"],["Percepita"],["Minime"],["Massime"],["Alba"],["Tramonto"]';
   sendMessage($chatid,"non ho capito!",$keyboard);
  }
  break;
  case "Giornaliero":
   $meteo = openweather("Giornaliero",$text);
   sendMessage($chatid,$meteo,$tastiera);
    
 break;
 case "Tempo" :
  $meteo = openweather("Tempo",$text);
   sendMessage($chatid,$meteo,$tastiera);
  break;
  case "Temperatura" :
  $meteo = openweather("Temperatura",$text);
   sendMessage($chatid,$meteo,$tastiera);
  break;
  case "Percepita" :
   $meteo = openweather("Percepita",$text);
   sendMessage($chatid,$meteo,$tastiera);
  break;
  case "Minime" :
   $meteo = openweather("Minime",$text);
   sendMessage($chatid,$meteo,$tastiera);
  break;
  case "Massime" :
   $meteo = openweather("Massime",$text);
   sendMessage($chatid,$meteo,$tastiera);
  break;
  case "Alba" :
   $meteo = openweather("Alba",$text);
   sendMessage($chatid,$meteo,$tastiera);
  break;
  case "Tramonto" :
   $meteo = openweather("Tramonto",$text);
   sendMessage($chatid,$meteo,$tastiera);
  break;
 default:
  sendMessage($chatid,"per iniziare digita /start",$keyboard);
   break;
 }
}
 
function sendMessage($chatid,$text,$keyboard){
 if(isset($keyboard)){
  $tastiera = '&reply_markup={"keyboard":['.$keyboard.'],"resize_keyboard":true}'; 
 }
$url = $GLOBALS["website"]."/sendMessage?chat_id=$chatid&text=".urlencode($text).$tastiera;
file_get_contents($url);
}
Function openWeather($tipo,$luogo){
 $risposta = http_request("https://server-openweather.herokuapp.com/$tipo/$luogo");
   if(is_numeric($risposta)){
     return("furbetto scrivi una città");
     }
     else{
     file_put_contents($last_message, $luogo); 
     return($risposta);
     }

}
?>>
