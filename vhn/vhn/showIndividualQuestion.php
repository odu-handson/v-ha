<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$memberid	= $_SESSION['uid'];
	$quest_id	= $_REQUEST['quest_id'];
	
	$sql = "select d.id, d.question_text, d.posted_date, d.poster_id, concat(u.fname,' ', u.lname) poster_name from discussion_questions d, users u where private != 1 and u.id = d.poster_id and d.id = $quest_id";
	//echo $sql;
	//$sql = "select * from discussion_questions where id=$quest_id";
	$results = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($results))
	{
		echo '
			<input id="indi_quest_id" type="hidden" value="'.$quest_id.'" />
			<h3 style="text-align: left; margin-left: 10%; color: rgb(137,137,186);"> QUESTION </h3>
			<div id="'.$row['id'].'" class="ind_question_block">
				<span class="ind_question_text"> '.$row['question_text'].' </span>
				</br>
				<div class="ind_question_tag" style="display: inline-block; float: right;">
					<span class="ind_posted_date" style="font-size: 0.8em; font-style:italic" > '.gmdate("Y-m-d", substr($row['posted_date'], 0, -3)).' </span>
					<span class="ind_poster_id" style="font-size: 0.8em; font-style:italic"> - '.$row['poster_name'].' </span>
				</div>
			</div>';
	} 
	
	$sql_attach = "select * from discussion_attachments where user_id=".$memberid." and question_id=".$quest_id;
	
	$results_attach = mysql_query($sql_attach) or die(mysql_error());
	
	if(mysql_num_rows($results_attach) > 0)
	{
		echo '<h3 style="text-align: left; margin-left: 10%; color: rgb(137,137,186);"> Attachments </h3>';
	
		echo '<div id="attachments" class="xind_question_blockx" style="border-bottom:2px solid #666699;width:85%;display:block;margin-left:auto;margin-right:auto;">';
		
		while($row_a = mysql_fetch_array($results_attach))
		{
			echo '<div class="attachment" style="margin-left:25px;"><a target="_blank" href="uploads/'.$memberid.'q'.$quest_id.$row_a['filename'].'">'.$row_a['filename'].'</a></div></br>';
		}
		
		echo "</div>";
	}
	
	echo '<h3 style="text-align: left; margin-left: 10%; color: rgb(137,137,186);"> COMMENTS/ANSWERS </h3>';
	
	$sql = "select a.id, a.answer_text, a.posted_date, concat(u.fname,' ', u.lname) poster_name from discussion_answers a, users u where u.id = a.posted_by and a.question_id = $quest_id";
	//echo $sql;
	$results = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($results) > 0)
	{
		$answers = mysql_num_rows($results);
		
		$sql2 = "update viewedquestions set counter=".$answers." where user_id=".$memberid." and question_id=".$quest_id;
	
		mysql_query($sql2) or die(mysql_error());
	
		while($row = mysql_fetch_array($results))
		{
			echo '
				<div id="'.$row['id'].'" class="ind_answer_block">
					<span class="ind_answer_text"> '.$row['answer_text'].' </span>
					</br>
					<div class="ind_answer_tag" style="display: inline-block; float: right;">
						<span class="ind_posted_date" style="font-size: 0.8em; font-style:italic; color: #666699;" > '.gmdate("Y-m-d", substr($row['posted_date'], 0, -3)).' </span>
						<span class="ind_poster_id" style="font-size: 0.8em; font-style:italic; color: #666699;"> - '.$row['poster_name'].' </span>
					</div>
				</div>
			';
			//var_dump($row);
		}
	}
	else
	{
		echo '<h3 style="margin-left: 10%; color: gray;"> No Comments/Answers..! </h3>';
	}
?>