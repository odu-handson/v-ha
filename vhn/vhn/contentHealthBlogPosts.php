<?php
	include "expire.php";
	require_once("connectDB.php");
	$sql = "SELECT a.id question_id, a.question_text question, h.id answer_id, h.content content, h.q_cat_id categoryid, qc.category category, h.date answer_date, h.video_link video_link, concat(u.fname,' ', u.lname) answered_by  FROM users u, health_edu_blog h, askprofessional a, question_category qc where qc.id = h.q_cat_id and h.title=a.id and a.privacy='public' and u.id=a.prof_id;";
	
	$result = mysql_query($sql) or die(); 
	while($row = mysql_fetch_array($result))
	{  
		echo '
			<div class="blogPost" >
				<h2 class="question" style="color: blue;" id="'.$row['question_id'].'"> Question: '.$row['question'].'</h2>
				<div class="dateLine">
					<span class="date"> <img src="images/cal.png" alt="" style="vertical-align: middle" />'. $row['answer_date'].' </span>
					<span class="question_category"> Category: '.$row['category'].'</span>
					<span class="answered_by"> Answer by: '.$row['answered_by'].'</span>
				</div>
				<p class="answer" id="'.$row['question_id'].'"> Answer: '.$row['content'].'</p>
				<p class="link" style="text-align: center">';
					if($row['video_link']!="")
						echo '<iframe width="560" height="315" src="'.$row['video_link'].'" frameborder="0" allowfullscreen></iframe>';
		echo '  </p>
			</div>';
	} 
?>