<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
	
	if($_SESSION['role'] == 1 || $_SESSION['role'] == 2)
	{	
?>
			<link rel="stylesheet" media="screen" type="text/css" href="css/professionalQuestions.css" />		
			<script type="text/javascript">
				function loadBlogContent()
				{
					var priv_quest=0;
					var pub_quest=0;
					
					if($("#private_question").is(':checked')) 
						priv_quest = 1;
					if($("#public_question").is(':checked')) 
						pub_quest = 1;
					
					// Load Questions dynamically					
					$.ajax({
						url: "loadProfessionalQuestions1.php",
						data: {
							'keyword': $("#keyword").val(),
							'user' : $("#user").val(),
							'private': priv_quest,
							'public': pub_quest
						},
						async: false,
						success: function(data) {
							$("#blog_content").html(data);
						}
					});
				}
				
				$(function() 
				{
					loadBlogContent();
					
					// Click function on textarea
					$(document.body).on('click', '.post_ans' ,function(){
						if($(this).val() == " Your Answer ")
							$(this).val("");
					});
					
					// focusout function on textarea
					$(document.body).on('focusout', '.post_ans' ,function(){
						if($.trim($(this).val()) == "")
							$(this).val(" Your Answer ");
					});
					
					// focusout function on textarea
					$(document.body).on('click', "input[class='post_ans button']" ,function(){
						// Validate the answer
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
									'text': ans, 
									'quest_id': $(this).attr("id")
								},
								success: function(data) {
									if(data)
									{
										alert("Success");
										loadBlogContent();
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
					
					$("#submit_request").click( function() {	
						loadBlogContent();
					});
						
				});
			</script>
			<span class="page_title">Answer Questions as a Professional</span>
			<div id="main_wrapper">
				<div id="main_content">
					<div id="finder" style="width:50%;display:inline-block;text-align:center;" class="discussion_block">
					<table style="text-align:center;display:inline-block;">
						<tr>
							<th><ul class="p_question_type_options"><li>Keyword</li></ul></th>
							<th><ul class="p_question_type_options"><li>Name</li></ul></th>
						</tr>
						<tr>
							<td>
								<input type="text" id="keyword" value="" />
							</td>
							<td>
								<input type="text" id="user" value="" />
							</td>
						</tr>
						<tr>
							<td>
								<ul class="p_question_type_options">
									<li> <input id="private_question" type="checkbox" name="question_options" checked> Private </input> </li>
								</ul>
							</td>
							<td>
								<ul class="p_question_type_options">
									<li> <input id="public_question" type="checkbox" name="question_options" checked> Public </input> </li>
								</ul>
							</td>
						</tr>
						<!--<tr>
							<td colspan="2">
								<ul class="p_question_type_options"><li>From: </li></ul>
								<select id="from">
									<option value="forever">Forever</option>
									<option value="1d">1 Day</option>
									<option value="3d">3 Days</option>
									<option value="5d">5 Days</option>
									<option value="1w">1 Week</option>
									<option value="1m">1 Month</option>
								</select>
								<ul class="p_question_type_options"><li> ago</li></ul>
							</td>
						</tr>-->
						<tr>
							<td colspan="2">
								<input type="button" class="button" id="submit_request" value="Submit">
							</td>	
						</tr>
					</table>
					</div>
				
					<div id="blog_content">
						<!-- Here is the question and answers -->
						<h2> No questions have been posted </h2>
					</div>
					
				</div>
			</div>
<?php
	}
	include "appTail.php";
?>