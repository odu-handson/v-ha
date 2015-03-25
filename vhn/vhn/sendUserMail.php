<?php
	include "expire.php";
	
	$id = $_REQUEST['id'];
	$all = $_REQUEST['all'];	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$myID = $_SESSION['uid'];
	
	$subject = $_REQUEST['subject'];
	
	$body = $_REQUEST['body'];
	
	require_once("connectDB.php");
	
	$sql2 = "select u.email from users u, user_credentials uc where u.id=uc.user_id and u.id=$myID;";
	$results2 = mysql_query($sql2) or die(mysql_error());
	while($row2 = mysql_fetch_array($results2))
	{
		$from = $row2['email'];
	}
	
	$headers = 	'From: '.$from."\r\n" .
				'Reply-To: '.$from."\r\n" .
				'Content-type: text/html; charset=utf-8' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	$headers .= "MIME-Version: 1.0\r\n";
	
	if($all != 1 && $all !=0)// for group messages
	{
		if($all = 10)
		$sql55 = "select id from users where batch = 1";
		else if($all = 20)
		$sql55 = "select id from users where batch = 2";
		$id_array = array();
		$results55 = mysql_query($sql55) or die(mysql_error());
		
		
		
		while($row55 = mysql_fetch_array($results55))
		{
			array_push($id_array,$row55['id']);	
		}
		
		$res = true;
		
		foreach ($id_array as $current_id)
		{
			$sql = "select u.email from users u, user_credentials uc where u.id=uc.user_id and u.id=$current_id;";
			$results = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_array($results))
			{
				$to = $row['email'];
			}
			
			$sent = mail($to,$subject,$body,$headers);
			
			if(!$sent)
			{
				$res = false;
			}
		}
		
		if($res)
			echo "1";
		else
			echo "0";
		
		
	
	}
	
	
	else if(strpos($id, ',') !== false) //multiple users
	{
		$id_array = explode(",", $id);
		
		$res = true;
		
		foreach ($id_array as $current_id)
		{
			$sql = "select u.email from users u, user_credentials uc where u.id=uc.user_id and u.id=$current_id;";
			$results = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_array($results))
			{
				$to = $row['email'];
			}
			
			$sent = mail($to,$subject,$body,$headers);
			
			if(!$sent)
			{
				$res = false;
			}
		}
		
		if($res)
			echo "1";
		else
			echo "0";
	}
	else
	{
		$sql = "select u.email from users u, user_credentials uc where u.id=uc.user_id and u.id=$id;";
		$results = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($results))
		{
			$to = $row['email'];
		}
	
		$sent = mail($to,$subject,$body,$headers);
			
		if($sent)
			echo "1";
		else
			echo "0";
	}
?>