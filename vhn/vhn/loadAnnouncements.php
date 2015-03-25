<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$memberid	= $_SESSION['uid'];
	
	$sql = "select a.id, concat(u.fname,' ', u.lname) poster_name, a.posted_date, a.text from announcements a, users u where u.id = a.posted_by order by a.posted_date desc limit 0, 20";
	//echo $sql;
	$results = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($results) > 0)
	{
		while($row = mysql_fetch_array($results))
		{
			echo '
				<div id="'.$row['id'].'" class="announcement_block">
					<span class="announcement_text"> '.$row['text'].' </span>
					</br>
					<div class="announcement_tags" style="display: inline-block; float: right;">
						<span class="announcement_posted_date" style="font-size: 0.8em; font-style:italic" > '.gmdate("Y-m-d", substr($row['posted_date'], 0, -3)).' </span>
						<span class="announcement_poster_id" style="font-size: 0.8em; font-style:italic"> - '.$row['poster_name'].' </span>
					</div>
				</div>
			';
		} 
	}
	else
	{
		echo '<h3 style="margin-left: 10%; color: gray;"> No Announcements! </h3>';
	}
?>