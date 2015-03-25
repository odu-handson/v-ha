<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$memberid	= $_SESSION['uid'];
	
	$sql = "select 
				A.id,
				A.question_text,
				A.ask_professional,
				A.posted_date,
				A.poster_id,
				A.poster_name,
				IFNULL(B1.numb_quest, 0) ans_count
			from
				(select 
					d.id,
						d.question_text,
						d.ask_professional,
						d.posted_date,
						d.poster_id,
						concat(u.fname, ' ', u.lname) poster_name
				from
					discussion_questions d, users u
				where
					u.id = d.poster_id and u.id = '$memberid'
				order by d.posted_date desc) A
					left join
				(select 
					question_id, count(question_id) numb_quest
				from
					discussion_answers B
				group by question_id) B1 ON A.id = B1.question_id";
	
	$results = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($results))
	{
		echo '
			<div class="discussion_block" style="text-align: left">
				<div>
					<span class="question_text"> '.$row['question_text'].' </span>
				</div>
				<div class="question_tags" style="display: inline-block; float: right">
		';
		if($row['ans_count'] !=0 )
					echo '<input id="'.$row['id'].'" type="button" class="discussion_block_showAnswers" />';
		echo '
					<span class="posted_date" style="font-size: 0.8em; font-style:italic" > '.gmdate("Y-m-d", substr($row['posted_date'], 0, -3)).' </span>
					<span class="poster_id" style="font-size: 0.8em; font-style:italic"> - '.$row['poster_name'].' </span>
				</div>
			</div>
		';
	}
?>