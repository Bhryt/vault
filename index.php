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
			     <strong>Here are my commands :</strong></br>
			     /getcurrentweather-current weather of a place</br>
			     /getdayssweather-check days weather</br>
			     /getweeksweather-check weeks weather</br>
			     /getnextdaysweather- weather for next day</br>
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
	function showdiv(){
		$('#activate').fadeOut(200);
		$('#chatbot').fadeIn(200);
	}
	function hidediv(){
		$('#chatbot').fadeOut(200);
		$('#activate').fadeIn(200);
	}
	function sndmesg(){
		var txt = $('#chat').val();
		if (txt != '') {
			var txts = document.getElementById("mainchat").innerHTML;
			document.getElementById("mainchat").innerHTML = txts + '<div class="txtield"><div class="aext"><span class="aesg">'+txt+'</span></div></div>';
			document.getElementById("chat").value = '';
		};
	}
</script>
</body>
</html>
