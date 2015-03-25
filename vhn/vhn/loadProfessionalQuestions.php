<?php
	
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
		
	$memberid 	= $_SESSION['uid'];
	$keyword 	= $_REQUEST['keyword'];
	$user 		= $_REQUEST['user'];
	$private 	= $_REQUEST['private'];
	$public 	= $_REQUEST['public'];
	
	//$from = $_REQUEST['from'];
	
	$sql_params = "";
	
	if(!empty($keyword))
	{
		$sql_params .= " and d.question_text like '%".$keyword."%'";
	}
	if(!empty($user))
	{
		$sql_params .= " and u.fname like '%".$user."%' or u.lname like '%".$user."%' ";
	}
	if($private == 'true' && $public == 'true')
	{}
	else if($private == 'true' && $public == 'false')
	{
		$sql_params .= " and d.private = 1";
	}
	else if($private == 'false' && $public == 'true')
	{
		$sql_params .= " and d.private = 0";
	}
	else
	{
		echo "<h2>No Results Found</h2>";
		die();
	}
	//if($from != 'forever')
	//{
		//$sql_params .= " and NOW() > DATE_ADD(d.posted_date,INTERVAL 0 DAY)";
	//}
	//if($_SESSION['role'] == 1 || $_SESSION['role'] == 2)
	//{
		
		
		$sql = "select d.id, d.question_text, d.posted_date, d.poster_id, concat(u.fname,' ', u.lname) poster_name from discussion_questions d, users u where ask_professional = 1 and u.id = d.poster_id";
		
		$sql .= $sql_params;
		
		$results = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($results))
		{
			echo '
				<div id="'.$row['id'].'" class="discussion_block" style="overflow:hidden;">
					<span class="question_text" style="text-align: left; margin-left: 20px;"> Question: '.$row['question_text'].' </span>
					
					<div class="question_tag" style="display: inline-block; float: right; overflow:hidden;">
						<span class="posted_dat" style="font-size: 0.8em; font-style:italic" > '.gmdate("Y-m-d", substr($row['posted_date'], 0, -3)).' </span>
						<span class="poster_i" style="font-size: 0.8em; font-style:italic"> - '.$row['poster_name'].' </span>
					</div>
			';
			if($memberid != $row['poster_id'])
			echo '
					<div class="yourAns" style=" display: block;">
					<textarea class="post_ans"> Your Answer </textarea>
					<input type="button" class="post_ans button" id="'.$row['id'].'" value="Submit" />
					</div>
			';
			echo '
				</div>
			';
			//var_dump($row);
		}
	//}
?>