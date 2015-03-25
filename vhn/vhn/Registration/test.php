<?PHP

//	header('content-type: applicatio/html; charset=utf-8');
	header("access-control-allow-origin: *");

/*
	header('Access-Control-Allow-Origin: http://my.sleeptracker.com');
	header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
	*/
	
?>

<html>
<head>
</head>
<body>


<input name="test" type="textfield"></input>


<iframe id="other" src="http://my.sleeptracker.com" style="height: 1000px;width: 1000px;">

</iframe>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<div id='doc' style="display: none;"></div>

<script>
	$(function(){
		
		$('iframe').ready(function() {
			
		//	console.log($(this).html());
			var email = $('iframe').contents().find('input[name="email"]');
			email.val('hello');
		console.log(email);
		});
	});
</script>
</body>
</html>