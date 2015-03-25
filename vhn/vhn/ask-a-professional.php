<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
?>
			<style type="text/css">
				#main_content
				{
					margin: 0 auto;
					padding: 10px;
					text-align: center;
				}
				.blogPost
				{
					/* border: 1px solid #ccc; */
					border-radius: 5px;
					background: #FFF;
					display: block;
					margin-left: auto;
					margin-right: auto;
				}
				
				textarea
				{
					width: 90%;
					height: 300px;
					border: 5px #DDD solid;
					background: #DDD;
					border-radius: 5px;
					margin-left: auto;
					margin-right: auto;
				}
				
				input[type=button] 
				{
					width: 150px !important;
					margin-top: 10px;
				}
				
				#buttons_div
				{
					text-align: center;
					padding: 10px;
				}
				
				.sub_headings1
				{
					display: block;
					text-align: left !important;
					margin-left: 10%; 
					margin-bottom: 10px;
					color: darkgray;
					/* color: rgb(137,137,186); */
					font-weight: bold;
					font-size: 1.2em;
					padding-top: 5px;
				}
			</style>
			
			<script type="text/javascript">

			$(function() 
	{
		$("#submit_request").click( function() {
			var button_id = $(this).attr("id");
			// Validate Here
			if($.trim($("#question").val()) == "")
			{
				alert("Ooops! You haven't entered any question.");
			}
			else
			{
				
				$.ajax({
				  type: "POST",
				  url: "submit_query.php",
				  data: {
					'question': $("#question").val(),
					
				  },
				  success: function (data) {
						if( data == "Failed")
						{
							alert("Sorry request has not been sent! Please try again later or contact technical support.");
						}
						else 
						{
							alert("Thank you for your interest, your question has been forwarded to appropriate person and you will hear from the shortly!");
							$("#ask-question").trigger("reset");
							
						}
					},
				  dataType: "text"
				}); 
			}
		});
	});
</script>
			<span class="page_title">Ask a Professional</span>
			<div id="main_wrapper">
				
				<div id="main_content">
					<form id="ask-question" action="submit_query.php" type="POST">
						<div class="blogPost">
							<span class="sub_headings1"> Post Your Question Below </span>
							<textarea name = "question" id="question" style="margin-left:10px; vertical-align: middle"></textarea>
							
							<!--<div id="buttons_div">
								
							</div>-->
							<input type="button" class="button" id="submit_request" value="Post Question">
								
						<!-- <?php
						echo '<br/><br/>';
						echo ':&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'&nbsp; <br><br>';
						echo "Choose privacy";
						echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						echo '<select id="set_privacy" name="set_privacy">';
						echo '<option value="public">Make it Public</option>';
						echo '<option value="email">Answer by email</option>';
						echo '</select>';
						?>	
							<p id="custom"></p>
							<input type="submit" value="submit"> */-->
					
						</div>
					</form>
				</div>
			</div>
<?php
	include "appTail.php";
?>