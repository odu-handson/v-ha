<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
	require_once('connectDB.php');

	// define variables and set to empty values
	$fname = $lname = $mname = $uname = $pwd = $email = "";
	if (session_status() == PHP_SESSION_NONE)
		session_start();
		
	$userID = $_SESSION['uid'];
	$formSubmitted = "";

	//populate values from existing database
	$sql="SELECT u.fname, u.mname, u.lname, u.email, uc.uname, uc.pwd FROM users u, user_credentials uc WHERE u.id = uc.user_id and u.id = {$userID}";
	$result = mysql_query($sql) or die();
	$row = mysql_fetch_array($result);

	$fname = $row['fname'];
	$mname = $row['mname'];
	$lname = $row['lname'];
	$email = $row['email'];
	$uname = $row['uname'];
	$pwd = $row['pwd'];
	

?>
	<script type="text/javascript">
		$(function() {
			$("#update_button").click(function () {
				$.ajax({
				  type: "GET",
				  url: "updateProfile.php?fname="+$("#fname").val()+"&lname="+$("#lname").val()+"&mname="+$("#mname").val()+"&uname="+$("#uname").val()+"&pwd="+$("#pwd").val()+"&email="+$("#email").val(),
				  success: function(data) {
					if(data == '1')
						alert("Updated Successfully!");
					else
						alert("Update Failed! Please try again later or contact technical support.");
				  },
				  dataType: "text"
				});
			});
		});
	</script>
	<link rel="stylesheet" media="screen" type="text/css" href="css/myProfile.css" />
	<div id="main_wrapper">
		<h1> My Profile </h1>
		<form id="user_update_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<span class="title"> First Name: </span> <input type="text" name="fname" id="fname" value="<?php echo $fname;?>" /> 
			<span class="title"> Middle Name: </span> <input type="text" name="mname" id="mname" value="<?php echo $mname;?>" />
			<span class="title"> Last Name: </span> <input type="text" name="lname" id="lname" value="<?php echo $lname;?>" />
			<span class="title"> Username: </span> <input type="text" name="uname" id="uname" value="<?php echo $uname;?>" />
			<span class="title"> Password: </span> <input type="password" name="pwd" id="pwd" value="" />
			<span class="title"> Email: </span> <input type="text" name="email" id="email" value="<?php echo $email;?>" />
			<!--<span class="title"> My Picture: </span> <img src="images/default.pic" />-->
			<div id="buttons_div">
				<input id="update_button" type="button" value="Update My Information" />
			</div>
		</form>
	</div>

<?php
	include "appTail.php";
?>