<?php
	require_once("connectDB.php");
	$email = $_REQUEST['email'];
	$token = substr(uniqid(rand(10,1000),false),rand(0,10),6);
	
	$sql = "select id from users where email = '$email'";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$id = $row['id'];
	}
	
	// Begin Transactions
	mysql_query("BEGIN") or die (mysql_error());
	
	$sql1 = "update user_credentials set pwd='".md5($token)."' where user_id = $id";
	$result1 = mysql_query($sql1) or die(mysql_error());
	if($result)
	{
		$sql2 = "update users set first_time = 0 where id = $id";
		$result2 = mysql_query($sql2) or die(mysql_error());
		if($result2)
		{
			$from = 'vkodeboy@cs.odu.edu';
			//$phone = '';
			$name = 'VHA';
			//$appName ='';
			$subject = "V-HA: Credentials recovery";
			$to = $email;
			
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$headers .= "Content-Transfer-Encoding: 7bit\r\n";
			$name = $name. ",\n";
			$fromString = "-f " . $from;
			$send = 'Your password has been reset and your temporary password is "'.$token.'"';
			$sent = mail($to, $subject, $send, $headers, $fromString);
			if($sent)
			{
				mysql_query("COMMIT") or die (mysql_error());
				echo 1;
			}
			else
			{
				echo 0;
				mysql_query("ROLLBACK") or die (mysql_error());
			}
		}
	}
	else
	{
		echo 0;
		mysql_query("ROLLBACK") or die (mysql_error());
	}
?>