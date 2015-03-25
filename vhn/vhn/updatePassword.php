<?php
	include "expire.php";
	
	require_once('connectDB.php');

	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	
	$cur = md5($_REQUEST['cur']);
	$new = md5($_REQUEST['new']);
	$id = $_SESSION['uid'];
	
	$sql = "select `pwd` from user_credentials where user_id = ".$id;
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	if($row['pwd'] == $cur)
	{
	
	$sql1 = "update user_credentials set pwd='".$new."' where user_id = ".$id;
	$result1 = mysql_query($sql1) or die(mysql_error());
	if($result1)
		{
			
			echo 1;
	
		}
	
	}
	
	else
	echo 0;
	
?>