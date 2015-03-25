<?php 
	include "expire.php";
	session_start();
	include 'connectDB.php';
	$ques = $_REQUEST['question'];
	$privacy = $_REQUEST['set_privacy'];
	$uid = $_SESSION['uid'];
	$sql = "INSERT INTO askprofessional(userid, question_text,privacy) VALUES( ".$uid.",'".$ques."','".$privacy."')";
	$result = mysql_query($sql) or die();


	if($result == 1)
	{
		//header("Location: ../index.php");
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
?>