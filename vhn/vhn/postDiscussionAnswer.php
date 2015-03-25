<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$text 		= $_REQUEST['text'];
	$ques_id	= $_REQUEST['quest_id'];
	$memberid	= $_SESSION['uid'];
	$date_today = time()*1000;
	
	// Begin Transactions
	mysql_query("BEGIN") or die (mysql_error());
	
	// First Insert him/her to users
	$sql = "insert into discussion_answers(answer_text, posted_by, posted_date, question_id) values('$text', $memberid, '$date_today', $ques_id)";
	echo $sql;
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