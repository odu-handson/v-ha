<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
?>
	<link rel="stylesheet" media="screen" type="text/css" href="css/discussionBoard.css" />		
	<script type="text/javascript">
		$(function() 
		{
			$("#ind_Quest").hide();
			$(".grayScreen").hide();
			
			// Load Questions dynamically
			$("#blog_content").load("loadMyDiscussionBoard.php");
			var reloadId = setInterval(function () {
				$("#blog_content").load("loadMyDiscussionBoard.php");
			}, 5000);
			
			// Click function on textarea
			$(document.body).on('click', '.post_ans, #post_Ind_Ans' ,function(){
				if($(this).val() == " Your Answer ")
					$(this).val("");
			});
			
			// focusout function on textarea
			$(document.body).on('focusout', '.post_ans, #post_Ind_Ans' ,function(){
				if($.trim($(this).val()) == "")
					$(this).val(" Your Answer ");
			});
			
			/* // Submit Individual Answer
			$("#submit_request_Ind_Ans").click( function(){
				alert($("#compQuestion").children("#indi_quest_id").val());
				//alert($("#compQuestion").html());
				// Validate
				if($.trim($("#post_Ind_Ans").val()) == "")
				{
					alert("Question Empty!");
					$("#post_Ind_Ans").val("");
				}
				else
				{
					$.ajax({
						type: "POST",
						cache: false,
						url: "postDiscussionAnswer.php",
						data: { 
							'text': $("#post_Ind_Ans").val(), 
							'quest_id': $("#compQuestion").children("#indi_quest_id").val()
						},
						success: function(data) {
							if(data)
							{
								alert("Success");
								$("#post_Ind_Ans").val(" Your Answer ");
							}
							else
							{
								alert("Fail");
							}
						}
					});
				}
			});
			 */
			
			// focusout function on textarea
			$(document.body).on('click', "input[class='post_ans button']" ,function(){
				// Validate the answer
				alert('Hello i am here');
				var ans = $.trim($(this).parent().children(".post_ans").val());
				if(ans == "Your Answer")
				{
					alert("Empty answer");
				}
				else
				{
					$.ajax({
						type: "POST",
						url: "postDiscussionAnswer.php",
						data: {
							'text': $("#post_question").val(), 
							'quest_id': $(this).attr("id")
						},
						success: function(data) {
							if(data)
							{
								alert("Success");
							}
							else
							{
								alert("Failed");
							}
						},
						catch: false
					});
				}
			});
		
			// Show Individual answer
			$(document.body).on('click', ".discussion_block_showAnswers" ,function(){
				$("#ind_Quest").show();
				$(".grayScreen").show();
				$.ajax({
					type: "POST",
					url: "showMyIndividualQuestion.php",
					data: { 
						'quest_id': $(this).attr("id")
					},
					success: function(data) {
						if(data)
						{
							$("#compQuestion").html(data);
						}
						else
						{
							alert("Failed");
						}
					},
					catch: false
				});
			});
						
			// Close Individual Question Window
			$("#close_Ind_Ans").click( function() {
				$("#ind_Quest").hide();
				$(".grayScreen").hide();
				$("#compQuestion").html("");
				$("#post_Ind_Ans").val("");
			});
		});
	</script>
	<div class="grayScreen">
		<div id="ind_Quest">
			<input type="button" id="close_Ind_Ans" value="X" />
			<div id="compQuestion">
			</div>
			<!--<div id="answer_to_question">
				<hr style="margin-left: auto; margin-right:auto; width: 96%;" />
				<textarea id="post_Ind_Ans" style="vertical-align: middle"> Your Answer </textarea>
				<input type="button" class="button" id="submit_request_Ind_Ans" value="Submit" />
				<!--<input type="button" class="button" id="reset_Ind_Ans" value="Reset">
				<input type="button" class="button" id="close_Ind_Ans" value="Close">--
			</div>-->
		</div>
	</div>
	<span class="page_title">My Discussion Blog</span>
	<div id="main_wrapper">
		<div id="main_content">
			<div id="blog_content" style="max-width: 720px; border-radius: 10px;">
				<!-- Here is the question and answers -->
				<h2> No questions have been posted </h2>
			</div>
		</div>
	</div>
<?php
	include "appTail.php";
?>