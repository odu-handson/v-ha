<?php
	include "expire.php";
	
	$all = $_REQUEST['all'];
	
	$id = $_REQUEST['id'];

	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$myID = $_SESSION['uid'];
	
	require_once("connectDB.php");
	
	if($all == 1)
	{
		echo 'To: [Multiple Users]
		<select id="user_catg" style="width : 100px">
		<option value="10">Group 1</option>
		<option value="20">Group 2</option>
		<option value="1">All</option>
		</select><br/>';
	}
	else if($all == 0)
	{
		echo '<input type="hidden" id="user_catg" value="0"/>';
	
		$sql = "select u.email from users u, user_credentials uc where u.id=uc.user_id and u.id=$id;";
		$results = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($results))
		{
			$to = $row['email'];
		}
		
		echo 'To: '.$to.'</br>';
	}
	
	$sql2 = "select u.email from users u, user_credentials uc where u.id=uc.user_id and u.id=$myID;";
	$results2 = mysql_query($sql2) or die(mysql_error());
	while($row2 = mysql_fetch_array($results2))
	{
		$from = $row2['email'];
	}
	
	echo 'From: '.$from.'</br>';
	
	echo 'Subject: <input type="text" id="subject" name="subject"/></br>';
	
	echo '<textarea id="body" name="body" rows="10" cols="40"/></br>';
	
	echo '<input type="hidden" id="to" value="'.$id.'"/>';

	
?>