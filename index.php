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
		<div id="mainchat"></div>
		<div id="type">
			<input placeholder="type new message" type="text" id="chat" name="chat" />
			<button id="submit">send</button>
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
</script>
</body>
</html>
