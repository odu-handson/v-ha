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
			margin-left:-35px;
			color: black;
			background: darkgray;
		}
		#clear_search:hover
		{
			background: #FFF;
			color: red;
		}
		
		.alertLog
		{
					border-bottom:1px solid darkgray;
					border-radius : 1px;
					height : auto;
					padding-bottom : 10px;
					padding-top : 10px;
					
		}
		
	</style>
	<link rel="stylesheet" media="screen" type="text/css" href="css/discussionBoard.css" />		
	<script src="highcharts.js"></script>
<script src="exporting.js"></script>
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
					//alert("Question Empty!");
					$(".alertMessage").html("<h4 style=\"color: red;\"> Question Empty. </h4>");
					$(".AlertBox").show();
					setTimeout(function() {
						$(".AlertBox").hide();
					}, 4000);
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
								//alert("Success");
								$(".alertMessage").html("<h4 style=\"color: green;\"> Please expect a response within 72 hours. </br>If this is a medical emergency please contact your physician or 911. </br>Thank you for your questions and participating in the VHN.  </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 7000);
								$("#post_question").val("");
								$("#private_question").attr('checked', false);
								$("#ask_professional").attr('checked', false);
							}
							else
							{
								//alert("Fail");
								$(".alertMessage").html("<h4 style=\"color: red;\"> Question not posted. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
							}
						}
					});
					
					//Attachments						
					$("#frame").contents().find("#attachment_form").submit();	

					setTimeout(function() {
						$("#frame").attr('src', "upload.html");
					}, 4000);
					
				}
			});
			
			// Click function on textarea
			$(document.body).on('click', '.post_ans, #post_Ind_Ans' ,function(){
				if($(this).val() == "")
					$(this).val("");
			});
			
			// focusout function on textarea
			$(document.body).on('focusout', '.post_ans, #post_Ind_Ans' ,function(){
				if($.trim($(this).val()) == "")
					$(this).val("");
			});
			
			// focusout function on textarea
			$(document.body).on('click', "input[class='post_ans button']" ,function(){
				// Validate the answer
				//alert('Hello i am here');
				var ans = $.trim($(this).parent().children(".post_ans").val());
				if(ans == "")
				{
					$(".alertMessage").html("<h4 style=\"color: red;\"> Empty reply/Answer. </h4>");
					$(".AlertBox").show();
					setTimeout(function() {
						$(".AlertBox").hide();
					}, 4000);
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
								//alert("Success");
								$(".alertMessage").html("<h4 style=\"color: green;\"> Successfully posted the reply. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								
							}
							else
							{
								//alert("Failed");
								$(".alertMessage").html("<h4 style=\"color: red;\"> Reply not posted. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
							}
						},
						catch: false
					});
				}
			});
		
			// Show Individual answer
			$(document.body).on('click', ".discussion_block_showAnswers, .discussion_block_showAnswers_no_comments" ,function(){
				$("#answer_to_question").show();
				var ask_question = $(this).parent().parent().children("#ask_status").val();
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
							var role = <?php echo $_SESSION['role']; ?>;
							//alert(role);
							if(ask_question == 1 && role == 3)
							{
								//alert("Here");
								$("#answer_to_question").hide();
							}
						}
						else
						{
							//alert("Failed");
							$(".alertMessage").html("<h4 style=\"color: red;\"> Error retrieving data. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
						}
					},
					catch: false
				});
			});
			
			// Submit Individual Answer
			$("#submit_request_Ind_Ans").click( function(){
				//alert($("#compQuestion").children("#indi_quest_id").val());
				// Validate
				if($.trim($("#post_Ind_Ans").val()) == "")
				{
					//alert("Question Empty!");
					$(".alertMessage").html("<h4 style=\"color: red;\"> Empty Answer/Reply. </h4>");
					$(".AlertBox").show();
					setTimeout(function() {
						$(".AlertBox").hide();
					}, 4000);
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
								//alert("Success");
								$(".alertMessage").html("<h4 style=\"color: red;\"> Successfully posted the reply. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								$("#post_Ind_Ans").val("");
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
					//alert("Search input is Empty!");
					$(".alertMessage").html("<h4 style=\"color: red;\"> Invalid search input. </h4>");
					$(".AlertBox").show();
					setTimeout(function() {
						$(".AlertBox").hide();
					}, 4000);
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
			
			//sleep tracker refresh
		
		$( "#sleepTracker" ).change(function() {
			event.isDefaultPrevented = function() {
  return event.defaultPrevented || event.returnValue == false;
}
			$('#sleep_tracker').empty();

			if($('#sleepTracker').val() == 1)
			{
			//alert("reached 1");
			$('#sleep_tracker').load("highchart1.php");
			}
		  
		  if($('#sleepTracker').val() == 2)
			{
			//alert("reached 2");
			$('#sleep_tracker').load("highchart2.php");
			}
		  
		  if($('#sleepTracker').val() == 3)
			{
			//alert("reached 3");
			$('#sleep_tracker').load("highchart3.php");
			}
		});
			
			
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
				<span class="page_title" style="margin-left: auto; margin-right: auto; padding-bottom: 20px;" >BLOG</span>
					<!-- Gray Screen -->
					<div class="grayScreen">
						<div id="ind_Quest">
							<input type="button" id="close_Ind_Ans" value="X" />
							<div id="compQuestion">
							</div>
							<div id="answer_to_question">
								<hr style="margin-left: auto; margin-right:auto; width: 96%;" />
								<textarea id="post_Ind_Ans" style="vertical-align: middle"></textarea>
								<input type="button" class="button" id="submit_request_Ind_Ans" value="Submit" />
								<!--<input type="button" class="button" id="reset_Ind_Ans" value="Reset">
								<input type="button" class="button" id="close_Ind_Ans" value="Close">-->
							</div>
						</div>
					</div>
					
					<!-- Search field -->
					
					<div style="border: 2px solid #CCC; padding: 5px; border-radius: 10px;">
						<div id="search_div" style="margin-bottom: 5px;">
							<div>
								<input id="search_input" style="width: 200px" style="display: inline-block;" type="text" placeholder="Type to search">  </input> <input id="clear_search" type="button" style="border-radius: 50%; width: 24px; height: 24px;" value="X" />
								<input type="button" style="width: 100px; margin-left: 20px;" class="button" id="search_submit" value="Search" />
							</div>
							
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
							<iframe id="frame" style="width:100%;display:inline-block;height:100px;border:0px;" src="upload.html"></iframe>
							<div id="buttons_div">
							
								<!--<form id="attachment_form" enctype="multipart/form-data" action="uploader.php" method="POST">
									</br>
									Choose a file to upload: <input name="uploaded" type="file" />
								</form>-->
							
								<ul id="question_type_options" style="margin-right:40%;">
									<li> <input id="private_question" type="checkbox" name="question_options" > Private </input> </li>
									<input id="ask_professional" type="hidden" name="question_options" ></input>
								</ul>
								<input type="button" class="button" id="post_discussion_question" value="Submit">
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php 
			if($_SESSION['role'] == 1)
			{
			echo'<div style="width : auto; margin-top : 50px;"><span class="page_title" style="margin-left: auto; margin-right: auto; padding-bottom: 20px;" >LOGIN ALERTS</span>';
			echo '<div style="border: 2px solid #CCC; padding: 5px; border-radius: 10px; width:auto; height : 400px!important; overflow-x : hidden; padding : 20px">';
				
			echo '<div class="alertLog" style="font-size:18px!important; font-weight:bold!important;"><span style="width:20%; display: inline-block; float: left;">User Name</span> <span style="min-width:20%; display: inline-block;float:left;">Name</span><span style="min-width:20%; display: inline-block;float:left;">Phone</span><span style="min-width:20%; display: inline-block;">email</span><span style="min-width:20%; display: inline-block;">last login</span></div>';
			
			include "loginAlerts.php";
			echo '</div></div>';
			}
			?>
			
			<!--
			<span class="page_title" style="margin-left: auto; margin-right: auto" >SLEEP TRACKER</span>
				<select id="sleepTracker">
				<option>select date</option>
				<option value="1">5 jan 2014</option>
				<option value="2">27 dec 2013</option>
				<option value="3">25 oct 2013</option>
				</select>
			<div id="sleep_tracker" style="height: auto; width: 100%;padding-top : 30px">
			
			-->
				
				
				<?php
				//	include "highchart.php";
				?>
			</div>
			
		</div>
	</div>
<?php
	include "appTail.php";
?>