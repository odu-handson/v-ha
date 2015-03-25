<?php
	include "expire.php";
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	require_once("connectDB.php");
	$userID = $_SESSION['uid'];
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$mname = $_REQUEST['mname'];
	$uname = $_REQUEST['uname'];
	$pwd = $_REQUEST['pwd'];
	$email = $_REQUEST['email'];
	
	/*
	$userID = $_SESSION['uid'];
	echo 'sadasd'.$_REQUEST["fname"];
	if (empty($_REQUEST["fname"]))
		{$fnameErr = "First name is required";}
	else
		{$fname = test_input($_POST["fname"]);}
	
	if (empty($_POST["lname"]))
		{$lnameErr = "Last name is required";}
	else
		{$lname = test_input($_POST["lname"]);}
		
	if (empty($_POST["mname"]))
		{$mnameErr = "Middle name is required";}
	else
		{$mname = test_input($_POST["mname"]);}	
		
	if (empty($_POST["uname"]))
		{$unameErr = "Username is required";}
	else
		{$uname = test_input($_POST["uname"]);}
		
	if (empty($_POST["email"]))
		{$emailErr = "Email address is required";}
	else
	{
		$email = test_input($_POST["email"]);
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
		{
			$emailErr = "Invalid email format"; 
		}
	}
	*/
	
	if(isValid())
	{
		$sql="UPDATE users SET fname = '$fname', mname = '{$mname}', lname = '{$lname}', email = '{$email}' WHERE id = {$userID}";

		$result = mysql_query($sql) or die (mysql_error());
		
		if(empty($pwd))
			$sql="UPDATE user_credentials SET uname = '{$uname}' WHERE id = {$userID}";
		else
		{
			$pwd = md5($pwd);
			$sql="UPDATE user_credentials SET uname = '{$uname}', pwd = '{$pwd}' WHERE id = {$userID}";
		}
		$result = mysql_query($sql) or die (mysql_error());
		
		if($result)
			echo '1';
		else
			echo '0';
	}
	else
	{
		echo 'ERROR';
	}
	
	function test_input($data)
	{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}
	function isValid()
	{
		if(empty($fnameErr) && empty($mnameErr) && empty($lnameErr) && empty($unameErr) && empty($pwdErr) && empty($emailErr))
			return true;
		else
			return false;
	}
?>