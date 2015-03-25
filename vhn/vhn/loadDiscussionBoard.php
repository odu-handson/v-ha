<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$memberid	= $_SESSION['uid'];
	if(isset($_POST['search_text'])) 
		$search_text = $_POST['search_text'];
	else 
		$search_text = '0';
	//echo $search_text;
	if($search_text == '0')
	{
		//$sql = "select d.id, d.question_text, d.ask_professional, d.posted_date, d.poster_id, concat(u.fname,' ', u.lname) poster_name from discussion_questions d, users u where d.ask_professional != 1 and u.id = d.poster_id and d.private != 1 order by d.posted_date desc";
		$sql = "select 
					A.id,
					A.question_text,
					A.ask_professional,
					A.posted_date,
					A.poster_id,
					A.poster_name,
					IFNULL(B1.new, A.posted_date) recent,
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
							u.id = d.poster_id
							and d.private != 1
					order by d.posted_date desc) A
						left join
					(select 
						question_id, count(question_id) numb_quest, max(posted_date) new
					from
						discussion_answers B
					group by question_id) B1 ON A.id = B1.question_id
					order by recent desc";
	}
	else
	{
		//$sql = "select d.id, d.question_text, d.ask_professional, d.posted_date, d.poster_id, concat(u.fname,' ', u.lname) poster_name from discussion_questions d, users u where d.ask_professional != 1 and u.id = d.poster_id and d.question_text like '%$search_text%' and d.private != 1 order by d.posted_date desc";
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
							u.id = d.poster_id
							and d.question_text like '%$search_text%'
							and d.private != 1
					order by d.posted_date desc) A
						left join
					(select 
						question_id, count(question_id) numb_quest
					from
						discussion_answers B
					group by question_id) B1 ON A.id = B1.question_id";
	}
	//echo $sql;
	
	$results = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($results))
	{
		$sql2 = "select * from viewedquestions where user_id = ".$memberid." and question_id = ".$row['id'];
	
		$results2 = mysql_query($sql2) or die(mysql_error());
		
		$row2 = mysql_fetch_array($results2);
		
		if(is_null($row2['counter']))
		{
			$counter = 0;
		
			$sql3 = "insert into viewedquestions values (".$memberid.", ".$row['id'].", 0)";
			
			mysql_query($sql3) or die(mysql_error());
		}
		else
		{
			$counter = $row2['counter'];
		}
	
		echo '
			<div class="discussion_block" style="text-align: left">
				<input type="hidden" id="ask_status" value="'.$row['ask_professional'].'" />
				<div>
					<span class="question_text"> '.$row['question_text'].' </span>
				</div>
				<div class="question_tags" style="display: block; float: right">
		';
		if($row['ans_count'] - $counter != 0)
		{
			//if($row['ans_count'] - $counter == 1)
			//{
				echo $row['ans_count'] - $counter." new / ".$row['ans_count']." total comment(s)&nbsp;";
			//}
			//else
			//{
			//	echo $row['ans_count'] - $counter." new comments&nbsp;";
			//}
			
			echo '<input id="'.$row['id'].'" type="button" class="discussion_block_showAnswers" />';
		}
		else
		{
			echo "0 new / ".$row['ans_count']." total comment(s)&nbsp;";
			echo '<input id="'.$row['id'].'" type="button" class="discussion_block_showAnswers_no_comments" />';
		}
		echo '		<!--<span>['.$row['ans_count'].' comments]</span>-->
					<span class="posted_date" style="font-size: 0.8em; font-style:italic" > '.gmdate("Y-m-d", substr($row['posted_date'], 0, -3)).' </span>
					<span class="poster_id" style="font-size: 0.8em; font-style:italic"> - '.$row['poster_name'].' </span>
				</div>
		';
		/*
		if($memberid != $row['poster_id'])
		echo '
				<div class="yourAns">
				<textarea class="post_ans"> Your Answer </textarea>
				<input type="button" class="post_ans button" id="'.$row['id'].'" value="Submit" />
				</div>
		';
		*/
		echo '
			</div>
		';
	}
?>