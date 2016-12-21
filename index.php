<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" href="css/font-awesome.css">
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
</head>

<body>
<div id="main">
	<id id="activate" onclick="showdiv()"><span class="activate">activate me!!!</span></id>
	<div id="chatbot">
		<div id="closebot">
			<button id="close" onclick="hidediv()">
				<i class="fa fa-close" aria-hidden="true"></i>
			</button>
		</div>
		<div id="mainchat">
			 <div class="txtfield">
				<div class="atext"><span class="amesg"><strong>Hi WeatherBot Here!!!</strong></span></div>
			</div>
			<div class="txtfield">
			    <div class="atext"><span class="amesg">
			     <strong>Here are my command(s) :</strong></br>
			     /getweather-current weather of a place</br>
			     </span>
			    </div>
			</div>  
		</div>
		<div id="type">
		    <button id="submit" onclick="sndmesg()">
		    	<i class="fa fa-send send"></i>
		    </button>
			<input placeholder="engage bot" type="text" id="chat" name="chat" />
			<div id="fon">
			 <i class="fa fa-reorder edit"  araia-hidden="true"></i>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

var xmlHttp = createXmlHttpRequestObject();

	function createXmlHttpRequestObject(){
	var xmlHttp;
	if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
		}
		else{
			xmlHttp = new ActiveObject("Microsoft.XMLHTTP");
			}
			return xmlHttp;
		}

	function showdiv(){
		$('#activate').fadeOut(200);
		$('#chatbot').fadeIn(200);
	}
	function hidediv(){
		$('#chatbot').fadeOut(200);
		$('#activate').fadeIn(200);
		var txts = document.getElementById("mainchat").innerHTML = '<div class="txtfield"><div class="atext"><span class="amesg"><strong>Hi WeatherBot Here!!!</strong></span></div></div><div class="txtfield"><div class="atext"><span class="amesg"><strong>Here are my command(s) :</strong></br>/getweather-current weather of a place</br></span></div></div> ';
	}
	function sndmesg(){
		var txt = $('#chat').val();
		if (txt != '') {
			var txts = document.getElementById("mainchat").innerHTML;
			document.getElementById("mainchat").innerHTML = txts + '<div class="txtield"><div class="aext"><span class="aesg">'+txt+'</span></div></div>';
			document.getElementById("chat").value = '';
				if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
			xmlHttp.open("POST", "logic.php", true);
			xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlHttp.onreadystatechange = function(){
				if (xmlHttp.readyState==4 && xmlHttp.status==200){
					if (xmlHttp.responseText != "error") {
						var txts = document.getElementById("mainchat").innerHTML;
						document.getElementById("mainchat").innerHTML = txts + '<div class="txtield"><div class="atext"><span class="aesg">'+xmlHttp.responseText+'</span></div></div>';
					}
					else{
						var txts = document.getElementById("mainchat").innerHTML;
						document.getElementById("mainchat").innerHTML = txts + '<div class="txtfield"><div class="atext"><span class="amesg"><strong>Here are my command(s) :</strong></br>/getweather-current weather of a place</br></span></div></div>';
					}
					//alert(xmlHttp.responseText);
				}
			}
			xmlHttp.send("action=weatherbot&mesg="+txt);
	}
	else{
		setTimeout(function(){sndmesg(divbx)},1000);
		}
		}
	}
</script>
</body>
</html>
