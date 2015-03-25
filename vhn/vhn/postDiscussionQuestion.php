<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$text 		= $_REQUEST['text'];
	$priv 		= $_REQUEST['priv'];
	$ask 		= $_REQUEST['ask'];
	$memberid	= $_SESSION['uid'];
	$date_today = time()*1000;
	
	/* echo $priv;
	echo $ask;
	die(); */
	
	// Begin Transactions
	mysql_query("BEGIN") or die (mysql_error());
	
	// First Insert him/her to users
	$sql = "insert into discussion_questions(question_text, poster_id, posted_date, private, ask_professional) values('$text', $memberid, '$date_today', $priv, $ask)";
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