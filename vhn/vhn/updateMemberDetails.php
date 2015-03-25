<?php
	
	include "expire.php";
	require_once('connectDB.php');

	$id = $_REQUEST['id'];
	$uname = $_REQUEST['uname'];
	$email = $_REQUEST['email'];

	$sql1 = "select uname from user_credentials where user_id != ".$id." and uname ='".$uname."'" ;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$row = mysql_fetch_array($result1);
	
	$sql2 = "select email from users where id != ".$id." and email ='".$email."'" ;
	$result2 = mysql_query($sql2) or die(mysql_error());
	$row2 = mysql_fetch_array($result2);
	
	
	
	if($row['uname'] || $row2['email'])
	{
		$error = "";
		
		if($row['uname'])
		$error = $error."user name";
		
		if($row2['email'])
		$error = $error." "." email ";
		
		$error = $error." being used by some other user, please try with different values";
	
		echo $error;
	}
	else
	{
	
		$sql = "update users set email ='".$email."' where id = ".$id ;
		$result = mysql_query($sql) or die(mysql_error());
	
		$sql = "update user_credentials set uname ='".$uname."' where user_id = ".$id ;
		$result = mysql_query($sql) or die(mysql_error());
		
	
		echo 1;
	
	}
	
?>