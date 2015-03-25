<?
	
?>
<!doctype html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <title>VHN - Consent Form</title>
	  <meta name="description" content="Consent Form">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <link rel="stylesheet" href="css/signature-pad.css">
	  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script type="text/javascript">
		function submitFunction()
		{
			//subjects Image
			$( "#save1" ).trigger( "click" );
			//alert($( "#subject_sign" ).val());
			
			//Investigators Image
			$( "#save" ).trigger( "click" );
			
			// Submit the form
			$("#CFForm").submit();
		}
	  </script>
	</head>
	<body>
		<form id="CFForm" method="GET" action="register.php">
			<?php include "consentForm.php"; ?>
			<script src="js/signature_pad.js"></script>
			<script src="js/app.js"></script>
			<script src="js/app1.js"></script>
			<input type="hidden" id="subject_sign" name="subject_sign" />
			<input type="hidden" id="investigator_sign" name="investigator_sign" />
			<input type="hidden" name="data" value="<?php echo $_REQUEST['data']; ?>">
		</form>
	</body>
</html>
