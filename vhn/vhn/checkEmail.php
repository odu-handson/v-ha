<?php
	include "expire.php";
	
	require_once("connectDB.php");
	$email = $_REQUEST['email'];
	
	$sql = "select count(*) count from users where email = '$email'";
	$result = mysql_query($sql) or die();
	
	while($row = mysql_fetch_array($result))
	{
		if($row['count'] == 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
?>