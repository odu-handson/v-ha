<?php

	require_once("connectDB.php");

	//$sql = "select u.id, u.email, uc.uname, uc.pwd, uc.user_id, u.first_time from user_credentials uc, users u where uc.user_id = u.id and u.email = '$uname'";

	// "select lastLogin, uname, fname, lname, email, homeph from user_credentials uc, users u where uc.lastLogin<".($date->getTimestamp()-432000)." and uc.user_id = u.id"; 
	
	
	$date = new DateTime();	
	//$sql = "select * from user_credentials where lastLogin<".($date->getTimestamp()-432000);

	$sql = "select lastLogin, uname, fname, lname, email, homeph from user_credentials uc, users u where uc.lastLogin<".($date->getTimestamp()-432000)." and uc.user_id = u.id"; 
	
	$results = mysql_query($sql) or die(mysql_error());
	$names = '';
	while($row = mysql_fetch_array($results))
	{
	
		$names = $names.'<div class="alertLog" style="font-size: 14px; height : auto"><span style="width:20%; display: inline-block; float: left;">'.$row['uname'].'</span> <span style="min-width:20%; display: inline-block;float:left;">'.$row['fname'].' '.$row['lname'].'</span><span style="min-width:20%; display: inline-block;float:left;">'.$row['homeph'].'</span><span style="min-width:20%; display: inline-block;">'.$row['email'].'</span><span style="min-width:20%; display: inline-block; float:right;">';
		if($row['lastLogin']==0)
		$names = $names.'No Logins'; 
		else 
		$names = $names.date('m/d/Y',$row['lastLogin']);
		
		$names=$names.'</div>';
	
	}

	echo $names;
	
?>



