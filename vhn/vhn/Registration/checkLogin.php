<?php
	require_once("../connectDB.php");
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	
	if (filter_var($uname, FILTER_VALIDATE_EMAIL)) 
	{
		$sql = "select u.id, u.email, uc.uname, uc.pwd, uc.user_id, u.first_time from user_credentials uc, users u where uc.user_id = u.id and u.email = '$uname'";
	}
	else
	{
		$sql = "select u.id, u.email, uc.uname, uc.pwd, uc.user_id, u.first_time from user_credentials uc, users u where uc.user_id = u.id and uc.uname = '$uname'";
	}
	
	$results = mysql_query($sql) or die(mysql_error());
	$found = 0;
	while($row = mysql_fetch_array($results))
	{
		$found = 1;
		// Check for empty record
		if( !empty($row['id']) )
		{
			if($row['pwd'] == md5($pwd))
			{
				session_start();
				$_SESSION['login_status'] = 1;
				$_SESSION['uname'] = $uname;
				$_SESSION['uid'] = $row['user_id'];
				$_SESSION['first_time'] = $row['first_time'];
				$date = new DateTime();
				$sql = "update user_credentials set loginNum = loginNum+1, lastLogin=".$date->getTimestamp()." where user_id=".$row['user_id'];
				$results = mysql_query($sql) or die(mysql_error());
				
				$sql2 = "update user_credentials set loginTimes=concat(loginTimes,CONVERT_TZ(NOW(),'-3:00','-0:00'),'@') where user_id=".$row['user_id'];
					$results2 = mysql_query($sql2) or die(mysql_error());
				echo '1'; // Success Login
				die();
			}
			else
			{
				echo '0'; // Wrong password
				die();
			}
		}
		else
		{
			echo '0'; // No User Found
			die();
		}
	}
	echo '0'; // User not found
?>