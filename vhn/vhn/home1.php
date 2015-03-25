<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
?>

	<style type="text/css">
		.toshow 
		{
			background: -moz-linear-gradient(top,  rgba(214,214,214,0.89) 0%, rgba(214,214,214,0.89) 1%, rgba(150,150,150,0.56) 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(214,214,214,0.89)), color-stop(1%,rgba(214,214,214,0.89)), color-stop(100%,rgba(150,150,150,0.56))); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  rgba(214,214,214,0.89) 0%,rgba(214,214,214,0.89) 1%,rgba(150,150,150,0.56) 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  rgba(214,214,214,0.89) 0%,rgba(214,214,214,0.89) 1%,rgba(150,150,150,0.56) 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  rgba(214,214,214,0.89) 0%,rgba(214,214,214,0.89) 1%,rgba(150,150,150,0.56) 100%); /* IE10+ */
			background: linear-gradient(to bottom,  rgba(214,214,214,0.89) 0%,rgba(214,214,214,0.89) 1%,rgba(150,150,150,0.56) 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e3d6d6d6', endColorstr='#8f969696',GradientType=0 ); /* IE6-9 */
			display : none;
			height:100%; 
			width:100%; 
			overflow: hidden; 
			position: fixed; 
			top:0; 
			left:0; 
			overflow-y: auto; 
			z-index: 1000;
		}
		
		input[type="text"], input[type="password"]
		{
			display: inline;
			width: 90%;
			max-width: 220px;
			height: 25px;
			margin-top: 2%;
			margin-left: auto;
			margin-right: auto;
			
			padding: 5px;
			
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
		}
		#combine_divs, #sleeptracker
		{
			display: block;
		}
		
		#discussion_blog, #announcements
		{
			width: 46% !important;
			display: table-cell;
			overflow: hidden;
		}
		
		#announcements
		{
			height: 652px;
		}
		
		#discussion_blog, #announcements
		{
			/* float: right; */
			overflow: hidden;
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
			
			/* border: 2px solid red; */
			padding: 5px;
		}
		#announcements
		{
			overflow: scroll-y;
		}
		#clear_search
		{
			position: relative;
			margin-left:-50px;
		}
	</style>
	<link rel="stylesheet" media="screen" type="text/css" href="css/discussionBoard.css" />		
	<script type="text/javascript">
		function checkUserFirstTime()
		{
			var first_time_check = <?php echo $_SESSION['first_time']; ?>;
			if( first_time_check == 0 )
				$("div.toshow").show();
			else
			{
				$("div.toshow").hide();
				var role = <?php echo $_SESSION['role']; ?>
				// Check whether the consent form is signed or not
				if(role == 3)
				{
					$.ajax({
						type: "POST",
						url: "checkConsentForm.php",
						async: false,
						success: function(data1) {
							if(data1 == 1)
							{
								window.location.href = "consentForm.php";
							}
						}
					});
				}
			}
		}		
	
		$(function() {
			$("#ind_Quest").hide();
			$(".grayScreen").hide();
			// Load Questions dynamically
			$("#blog_content").load("loadDiscussionBoard.php");
			var reloadId = setInterval(function () {
				$("#blog_content").load("loadDiscussionBoard.php");
			}, 5000);
			
			// Post a Question
			$("#post_discussion_question").click( function() {
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
			$(document.body).on('click', ".discussion_block_showAnswers" ,function(){
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
			});
			
			// Submit Individual Answer
			$("#submit_request_Ind_Ans").click( function(){
				alert($("#compQuestion").children("#indi_quest_id").val());
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
			
			// Search functionality
			$("#search_submit").click( function() {
				clearInterval(reloadId);
				if($.trim($("#search_input").val()) == "")
				{
					alert("Search input is Empty!");
					$("#search_input").val("");
				}
				else
				{
					$.ajax({
						type: "POST",
						cache: false,
						url: "loadDiscussionBoard.php",
						data: { 
							'search_text': $("#search_input").val(),
							'search': '1'
						},
						success: function(data) {
								data = data.replace(new RegExp($("#search_input").val(),"g"), "<b style=\" background-color: yellow;\" >"+$("#search_input").val()+"</b>");
							$("#blog_content").html(data);
							
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
			
			// Clear search field
			$("#clear_search").click( function() {
				$("#search_input").val("");
				$("#blog_content").load("loadDiscussionBoard.php");
				var reloadId = setInterval(function () {
					$("#blog_content").load("loadDiscussionBoard.php");
				}, 5000);
			});
			
			// ---------------------------------------- //
			
			
			
			
			//$("#discussion_blog").load("discussionBoard1.php");
			$("#announcements").load("showAnnouncements.php");
			checkUserFirstTime();
			$(".errorNote").hide();
			$("#submit_request").click( function() 
			{
				var error = 1;
				var errorFields = "";

				// Validate Here
				if($.trim($("#pass1").val()) == "")
				{
					error = 0;
					errorFields = errorFields + "New Password     ";
					$("#pass1").addClass("error");
				}
				if($.trim($("#pass2").val()) == "")
				{
					error = 0;
					errorFields = errorFields+"Confirm Password   ";
					$("#pass2").addClass("error");
				}
				if(($.trim($("#pass1").val()) != $.trim($("#pass2").val())) && (error == 1))
				{
					error = 2;
					errorFields = errorFields+"Passwords do not match   ";
					$(".errorNote").html("Passwords do not match");
					$(".errorNote").show();
				}
		
				if(error != 1)
				{
					if(error == 0)
					$(".errorNote").html(errorFields.substring(0,errorFields.length - 2)+" : mandatory fields!");
					if(error == 2)
					$(".errorNote").html(errorFields.substring(0,errorFields.length - 2)+" : !");
					$(".errorNote").show();
				}
				else
				{
					var mem_id = <?php echo $_SESSION['uid']; ?>
					
					$.ajax({
						type: "POST",
						url: "forcePassword.php",
						async: false,
						data: {
						'pwd': $("#pass1").val(),
						'uid': mem_id
					  },
						success: function (data) 
						{
							if(data == 1)
							{
								$(".alertMessage").html("<h4 style=\"color: green;\"> New password has been updated. </h4>");
								$(".AlertBox").show();
								<?php $_SESSION['first_time'] = 1; ?>
								setTimeout(function() 
								{
									$(".AlertBox").hide();
									var role = <?php echo $_SESSION['role'] ?>
									// Check whether the consent form is signed or not
									if(role == 3)
									{
										$.ajax({
											type: "POST",
											url: "checkConsentForm.php",
											async: false,
											success: function(data1) {
												if(data1 == 1)
												{
													window.location.href = "consentForm.php";
												}
											}
										});
									}
								}, 3000);
								
								$("div.toshow").hide();
								
							}
							else 
							{
								$(".alertMessage").html("<h4 style=\"color: red;\"> New password update Failed! Please try again or contact technical support if the problem continues. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
							}
						},
						dataType: "text"
					}); 
				}
			});
		});
	</script>
	<div class="toshow">
		<div style="margin: 0 auto; overflow: hidden; border-radius:25px; background-color: grey; padding: 50px; width: 250px; height: auto; top:30%; color: white; position : relative;">
			<form method="POST">
				Please change password before you proceed<br/><br/>
				<h4 class="errorNote" hidden></h4><br/>
				New Password : <input type="password" name="pass1" id="pass1" style="width: 80%"><br/><br/>
				Confirm Password : <input type="password" name="pass2" id="pass2" style="width: 80%"><br/><br/>
				<input type="button" value="RESET" id="submit_request" class = "button"><br />
			</form>
			<br/>
		</div>
	</div>
	<div id="main_wrapper">
		<div id="main_view" style="text-align: center;">
			<!--<img class="bighand" src="images/hand-main.png" style="position: absolute; opacity: 0.2; filter: alpha(opacity=10); z-index: -1;" alt="" />-->
			
			<div id="combine_divs">
				<div id="announcements">
				</div>
				<div id="discussion_blog" >
					<!-- Gray Screen -->
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
					<!-- Search field -->
					<span class="page_title" style="margin-left: auto; margin-right: auto" >Discussion Blog</span>
					<div id="search_div" style="margin-bottom: 5px;">
						<div>
							<input id="search_input" type="text" placeholder="Type to search">  </input> <input id="clear_search" type="button" value="X" />
							</div>
						<input type="button" class="button" id="search_submit" value="Search" />
					</div>
					<!-- Blog content -->
					<div id="blog_content" style="border-radius: 10px; ">
						<!-- Here is the question and answers -->
						<h2> No questions have been posted </h2>
					</div>
					<br />
					<div class="blogPost">
						<span class="sub_headings1"> Have a question? Please post it below ! </span>
						<textarea name="post_question" id="post_question" style="vertical-align: middle"></textarea>
						<div id="buttons_div">
							<ul id="question_type_options">
								<li> <input id="private_question" type="checkbox" name="question_options" > Private? </input> </li>
								<li> <input id="ask_professional" type="checkbox" name="question_options" > Ask a professional? </input> </li>
							</ul>
							<input type="button" class="button" id="post_discussion_question" value="Submit">
						</div>
					</div>
				</div>
			</div>
			<div id="sleep_tracker" style="height: 500px; width: 100%;">
				<?php
					include "highchart.php";
				?>
			</div>
		</div>
	</div>
<?php
	include "appTail.php";
?>