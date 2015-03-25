<?php
	include "expire.php";
	require_once('connectDB.php');
	session_start();
	$updater	= 	$_SESSION['uid'];
	$user_id	=	$_REQUEST['id'];
	$notes		=	$_REQUEST['notes'];
	
	$sql1 = "select member_comments from users where `id` =$user_id";
	$result1 = mysql_query($sql1) or die(mysql_error());
	$row1 = mysql_fetch_array($result1);
	
	$date = date_create();
	$date = date_format($date, 'd-m-Y,G:i:s');
	
	$sql2 = "select fname from users where `id` =$updater";
	$result2 = mysql_query($sql2) or die(mysql_error());
	$row2 = mysql_fetch_array($result2);
	$updater_name = $row2['fname'];
	
	$notes = $notes.' -'.$_SESSION['name'].' ('.$date.')<br/><br/>'.$row1['member_comments'];
	
	mysql_query("BEGIN") or die (mysql_error());
	$sql = "update users set `member_comments`='$notes' where `id` =$user_id";
	$result = mysql_query($sql) or die (mysql_error());
	
	if($result)
	{
		echo 1;
		mysql_query("COMMIT") or die (mysql_error());
	}
	else
		echo 0;
?>