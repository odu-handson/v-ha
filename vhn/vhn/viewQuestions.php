<?php
	include "expire.php";
	require_once('connectDB.php');
	
	$sql = "select d.id, d.question_text, d.posted_date, d.poster_id, concat(u.fname,' ', u.lname) poster_name from discussion_questions d, users u where ask_professional = 1 and u.id = d.poster_id";
	$results = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($results))
	{
		echo '
			<div id="'.$row['id'].'" class="discussion_block">
				<span class="question_text"> '.$row['question_text'].' </span>
				<div class="question_tags">
					<span class="posted_date" style="font-size: 0.8em; font-style:italic" > '.gmdate("Y-m-d", substr($row['posted_date'], 0, -3)).' </span>
					<span class="poster_id" style="font-size: 0.8em; font-style:italic"> Posted by - '.$row['poster_name'].' </span>
				</div>
				<textarea class="yourAns"> Your Answer </textarea>
			</div>
		';
		//var_dump($row);
	}
?>