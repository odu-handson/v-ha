<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$text 		= $_REQUEST['text'];
	$memberid	= $_SESSION['uid'];
	$date_today = time()*1000;
	
	// Begin Transactions
	mysql_query("BEGIN") or die (mysql_error());
	
	// Insert announcements
	$sql = "insert into announcements(text, posted_by, posted_date) values('$text', $memberid, '$date_today')";
	$result = mysql_query($sql) or die (mysql_error());
	
	if($result)
	{
		echo 1;
		
		// Commit Transactions
		mysql_query("COMMIT") or die (mysql_error());
	}
	else
	{
		echo 0;
		
		// Begin Transactions
		mysql_query("ROLLBACK") or die (mysql_error());
	}
?>