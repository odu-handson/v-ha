<?php
	include "expire.php";
	
	$purpose = $_REQUEST['purpose'];
	$id = $_REQUEST['id'];
	
	require_once("connectDB.php");
	
	if($purpose == "sendCredentials")
	{
		$sql = "select u.fname, u.lname, u.email, uc.uname from users u, user_credentials uc where u.id=uc.user_id and u.id=$id;";
		$results = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($results))
		{
			$to = $row['email'];
			$subject = "Account activation";
			$message = "Hello ".$row['fname']." ".$row['lname'].", <br/><br/>Your account has been activated, you can access your account by <a href=\"http://v-ha.org:8080/vhn\">clicking here for the VHN website</a> and logging in with the credentials below. <br/><br /> <b>User Name:</b> \"".$row['uname']."\" <br/><b>Password:</b> \"password\" <br /><br /><br />Thank you for your interest <br />Admin";
		}
		
		$from = "vasanth.kodeboyina@gmail.com";
		$headers = 	'From: admin@VHN.com' . "\r\n" .
					'Reply-To: vkodeboy@cs.odu.edu' . "\r\n" .
					'Content-type: text/html; charset=utf-8' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$sent = mail($to,$subject,$message,$headers);
		if($sent)
			echo "1";
		else
			echo "0";
			
		$sql_u = "insert into sent_credentials(user_id, time) values(".$id.", NOW())";
		
		mysql_query($sql_u) or die(mysql_error());
	}
?>