<?php
	include "expire.php";
	require_once('connectDB.php');
	$pwd = md5($_REQUEST['pwd']);
	$uid = $_REQUEST['uid'];

	mysql_query("BEGIN") or die (mysql_error());

	$sql = "update user_credentials set `pwd`='".$pwd."' where user_id =".$uid;
	$result = mysql_query($sql) or die(mysql_error());
	if($result)
	{
		$sql1 = "update users set first_time=1 where `id` =".$uid;
		$result1 = mysql_query($sql1) or die(mysql_error());
		if($result1)
		{
			echo 1;
			mysql_query("COMMIT") or die (mysql_error());
		}
		else
		{
			echo 0;
			mysql_query("ROLLBACK") or die (mysql_error());
		}
	}
	else
	{
		echo 0;
	}

?>