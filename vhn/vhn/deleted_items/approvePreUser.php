<?php
	require_once("connectDB.php");
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$member_id = $_SESSION['uid'];
	$person_id = $_REQUEST['person_id'];
	$person_user_id = $_REQUEST['person_user_id'];
	
	$sql = "update collectdetails set member_userid=$member_id, person_userid=$person_user_id where id=$person_id";
	$id = mysql_query($sql) or die (mysql_error());
	
	if($id)
	{
		echo "Success";
	}
	else
	{
		echo "Failure";
	}
?>