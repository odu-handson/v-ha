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
					$("#blog_content").load("loadDiscussionBoard.php");
					var reloadId = setInterval(function () {
						$("#blog_content").load("loadDiscussionBoard.php");
					}, 5000);
					
					// Post a Question
					$("#submit_request").click( function() {
						// Validate Here
						if($.trim($("#post_question").val()) == "")
						{
							alert("Question Empty!");
							$("#post_question").val("");
						}
						else
						{
							var priv_quest=0;
							var ask_prof=0;
							
							if($("#private_question").is(':checked')) 
								priv_quest = 1;
							if($("#ask_professional").is(':checked')) 
								ask_prof = 1;
								
							$.ajax({
								type: "POST",
								cache: false,
								url: "postDiscussionQuestion.php",
								data: { 
									'text': $("#post_question").val(), 
									'priv': priv_quest,
									'ask': ask_prof
								},
								success: function(data) {
									if(data)
									{
										alert("Success");
										$("#post_question").val("");
										$("#private_question").attr('checked', false);
										$("#ask_professional").attr('checked', false);
									}
									else
									{
										alert("Fail");
									}
								}
							});
						}
					});
					
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
					$(document.body).on('click', ".discussion_block" ,function(){
						$("#ind_Quest").show();
						$(".grayScreen").show();
						$.ajax({
							type: "POST",
							url: "showIndividualQuestion.php",
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
						//$("#answer_to_question").load("showIndividualQuestion.php");
						//alert("Clicked here");
					});
					
					// Submit Individual Answer
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
					<div id="answer_to_question">
						<hr style="margin-left: auto; margin-right:auto; width: 96%;" />
						<textarea id="post_Ind_Ans" style="vertical-align: middle"> Your Answer </textarea>
						<input type="button" class="button" id="submit_request_Ind_Ans" value="Submit" />
						<!--<input type="button" class="button" id="reset_Ind_Ans" value="Reset">
						<input type="button" class="button" id="close_Ind_Ans" value="Close">-->
					</div>
				</div>
			</div>
			<span class="page_title">Discussion Group</span>
			<div id="main_wrapper">
				<div id="main_content">
					<div id="main_sub_content">
						<div id="blog_content">
							<!-- Here is the question and answers -->
							<h2> No questions have been posted </h2>
						</div>
						<div class="blogPost">
							<!--<form id="ask-question" action="submit_query.php" type="POST">-->
								<span class="sub_headings1"> Have a question? Please post it below ! </span>
								<textarea name="post_question" id="post_question" style="vertical-align: middle"></textarea>
								<div id="buttons_div">
									<ul id="question_type_options">
										<li> <input id="private_question" type="checkbox" name="question_options" > Private? </input> </li>
										<li> <input id="ask_professional" type="checkbox" name="question_options" > Ask a professional? </input> </li>
									</ul>
									<input type="button" class="button" id="submit_request" value="Submit">
								</div>
						</div>
					</div>
				</div>
			</div>
<?php
	include "appTail.php";
?>