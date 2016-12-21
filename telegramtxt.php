<?php
 session_start();


$token = "324207037:AAG9o3VcZsXC8i8kNomidlTSq9Fx2F2u_D4";
$website = 'https://api.telegram.org/bot'.$token;
$chatid = '295648336';

$update = file_get_contents($website. '/getupdates');
$update = json_decode($update, TRUE);
$update = end($update["result"]);

$chatid = $update["message"]["chat"]["id"];
$mesg = $update["message"]["text"];

function sendMessage($chatid, $message){
	$url = $GLOBALS['website']."/sendMessage?chat_id=".$chatid."&text=".urlencode($message);
	file_get_contents($url);
}
 



	$mesg1 = substr($mesg, 0,1);

	if ($mesg1 == "/") {
		if ($mesg == "/start") {
			sendMessage($chatid, "Am a weather Bot
				             These are my command(s)
				                  /getweather");
		}
		
		else if ($mesg == "/getweather") {
			$_SESSION['command'] = "/getweather";
			sendMessage($chatid, "enter city");
			echo "enter city";
		}
		else{
			echo "error";
			exit();
		}
	}
	else{
		if (empty($_SESSION['command'] == false)) {
			$_SESSION['command'] ='';
			$url = 'http://api.openweathermap.org/data/2.5/weather?q='.$mesg.'&appid=d6576a5249a9b83ab6114ce44de8289a&mode=html';
			$url1 = 'http://api.openweathermap.org/data/2.5/weather?q='.$mesg.'&appid=d6576a5249a9b83ab6114ce44de8289a&mode=json';
			$xmlx = file_get_contents($url1);
			$xmlx = json_decode($xmlx,TRUE);
			$weatherx = $xmlx['weather'][0]['main'];
			$speed = $xmlx['wind']['speed'];
			$temp = $xmlx['main']['temp'];
			$humidity = $xmlx['main']['humidity'];
			$fullweather = 'Weather: '.$weatherx.'
			temperature: = '.$temp.'
			Wind Speed: '.$speed.'
			humidity: '.$humidity;
			sendMessage($chatid, $fullweather);
		}
		else{
			$message = 'these are my commands
			            /getweather- get current weather of a place.';
			sendMessage($chatid, $message);
		}
	}

?>