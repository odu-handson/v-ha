<?php
	include "appHead.php";
?>
	<script type="text/javascript">
		$(document).on('click','.answer',function(e) {
			alert("hi"+this.id);
			window.location="ShowAnswerPostForm.php?qid="+this.id;
		});

		$(document).on('click','.push',function(e) {
			alert("hi"+this.id);
			window.location="PushQuestionForm.php?qid="+this.id;
		});
	</script>
	<link rel="stylesheet" media="screen" type="text/css" href="css/CGQuestions.css" />
	<div id="main_wrapper">
		<div id="cgQBlog_content">
			<div id="blogPosts">
				<?php 
					$t1 = $_SESSION['uid'];
					$sql = "SELECT * FROM askprofessional where status='unanswered' and (prof_id=0 or prof_id=".$t1.")";
					$result = mysql_query($sql) or die(); 
					$i=1;
					while($row = mysql_fetch_array($result))
					{
						echo '
							<div class="blog_post">
								<span class="title"> Question #'.$i.'</span>
								<p class="question_text">'.$row['question_text'] .' </p>
								<input name="quest_id" type="hidden" value="'.$row['id'].'" />
								<div id="buttons_div">
									<span style="border-right: 3px solid lightgray;" class="answer" id="'.$row['id'].'"> Answer </span>
									<span class="push" id="'.$row['id'].'" /> Assign Proffesional </span>
								</div>
							</div>
						';
						$i++;
					} 
				?>
			</div>
			<!--<div id="blogActions">
				<h1> Topics </h1>
				Categories Retrieved from DB
			</div>-->
		</div>	
	</div>
			
<?php
	include "appTail.php";
?>