<?php
	include "expire.php";
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	require_once("connectDB.php");
	$user_id = $_SESSION['uid'];
	$sql = "select count(consent_form) count from user_pdfforms where user_id = $user_id";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_object($result);
	if($row->count == 0)
		echo 1;
	else
		echo 0;
?>