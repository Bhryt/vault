<?php
session_start();

$token = "324207037:AAG9o3VcZsXC8i8kNomidlTSq9Fx2F2u_D4";
$website = 'https://api.telegram.org/bot'.$token;
$chatid = '295648336';

function sendMessage($chatid, $message){
	$url = $GLOBALS['website']."/sendMessage?chat_id=".$chatid."&text=".urlencode($message);
	file_get_contents($url);
}


if (isset($_POST['action'] ) && $_POST['action'] == 'weatherbot'){ 
	$mesg = $_POST['mesg'];


	$mesg1 = substr($mesg, 0,1);

	if ($mesg1 == "/") {

		if ($mesg == "/getweather") {
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
			$data = file_get_contents($url);
			sendMessage($chatid, $data);
			echo $data;
		}
		else{
			echo "error";
		}
	}

	exit();
}
?>