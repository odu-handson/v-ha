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
	
	$private_field = "%";
	
	if($keyword == '') 
		$keyword = '%'; 
	else
		$keyword = '%'.$keyword.'%';
	
	if($user == '') 
		$user = '%'; 
	else
		$user = '%'.$user.'%';
	
	// Private question status
	if(!($private == '1' && $public == '1'))
	{
		if($private == '1' && $public != '1')  $private_field = '1';
		if($private != '1' && $public == '1')  $private_field = '0';
	}
	
	/*$sql = "select 
				d.id,
				d.question_text,
				d.ask_professional,
				d.posted_date,
				d.poster_id,
				d.private,
				concat(u.fname, ' ', u.lname) poster_name
			from
				discussion_questions d,
				users u
			where
				d.question_text like '$keyword'
					and concat(u.fname, ' ', u.lname) like '$user'
					and 
					( d.ask_professional = 1
					or d.private = 1)
					and u.id = d.poster_id
			order by d.posted_date desc";
	*/
	
	$sql = "select 
				A.id,
				A.question_text,
				A.ask_professional,
				A.posted_date,
				A.poster_id,
				A.private,
				A.poster_name,
				IFNULL(B1.numb_quest, 0) ans_count
			from
				(select 
					d.id,
						d.question_text,
						d.ask_professional,
						d.posted_date,
						d.poster_id,
						d.private,
						concat(u.fname, ' ', u.lname) poster_name
				from
					discussion_questions d, users u
				where
					d.question_text like '$keyword'
						and concat(u.fname, ' ', u.lname) like '$user'
						and (d.ask_professional = 1 or d.private = 1)
						and u.id = d.poster_id
				order by d.posted_date desc) A
					left join
				(select 
					question_id, count(question_id) numb_quest
				from
					discussion_answers B
				group by question_id) B1 ON A.id = B1.question_id
			order by A.id desc";
	$results = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($results))
	{
		if($row['ans_count'] == 0)
		{
			echo '
				<div id="'.$row['id'].'" class="discussion_block" style="overflow:hidden;">
					<span class="question_text" style="text-align: left; margin-left: 20px;"> Question: '.$row['question_text'].' </span>
					<div class="question_tag" style="display: inline-block; float: right; overflow:hidden;">
						<span class="posted_dat" style="font-size: 0.8em; font-style:italic" > '.gmdate("Y-m-d", substr($row['posted_date'], 0, -3)).' </span>
						<span class="poster_i" style="font-size: 0.8em; font-style:italic"> - '.$row['poster_name'].' </span>
					</div>
					<div class="yourAns" style=" display: block;">
						<textarea class="post_ans"> Your Answer </textarea>
						<input type="button" class="post_ans button" id="'.$row['id'].'" value="Submit" />
					</div>
			
				</div>
			';
		}
	}
?>