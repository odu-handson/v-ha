
<?php
	include "appHead.php";
?>	
	<link rel="stylesheet" media="screen" type="text/css" href="css/contactUs.css" />
	<link rel="stylesheet" media="screen" type="text/css" href="css/button.css" />
		<script type="text/javascript">
			$(function() 
			{
				$("#mail").click( function() 
				{
					var error = 1;
					var errorFields = "";
					
					// Validations
					if($.trim($("#name").val()) == "")
					{
						error = 0;
						errorFields = errorFields+"Name, ";
						$("#No comments").addClass("error");
					}
					if($.trim($("#email").val()) == "")
					{
						error = 0;
						errorFields = errorFields+"Email, ";
						$("#No comments").addClass("error");
					}
					if($.trim($("#message").val()) == "")
					{
						error = 0;
						errorFields = errorFields+"Message, ";
						$("#No comments").addClass("error");
					}
					
					// Error checking
					if(error == 0)
					{
						$(".errorNote").html(errorFields.substring(0,errorFields.length - 2)+" cannot be empty!");
						$(".errorNote").show();
					}
					else
					{
						$.ajax({
							type: "POST",
							url: "mail.php",
							data: {
							'name': $("#name").val(),
							'email': $("#email").val(),
							'message': $("#message").val(),
							},
							success: function (data) 
							{
								if(data == 1)
								{
									$("#notes").hide();
									$(".alertMessage").html("<h4 style=\"color: green;\"> Sent Successfully! </h4>");
									$(".AlertBox").show();
									setTimeout(function() {
										$(".AlertBox").hide();
									}, 8000);
									//window.location.href = "index.php";
								}
								else 
								{
									$(".alertMessage").html("<h4 style=\"color: red;\"> Sending Failed! Please try again later or contact technical support if the problem continues. </h4>");
									$(".AlertBox").show();
									setTimeout(function() {
										$(".AlertBox").hide();
									}, 8000);
								}
							}
						}); 
					}
				});
			});
		</script>
		<span class="page_title">Contact Us</span>
		<div id="main_wrapper">
			<div id="contactus_div">
				<form>
					<span>Name</span><input type="text" name="name" id="name">
					<span>Email</span><input type="text" name="email" id="email">
					<span>Message</span><textarea name="message" id="message" rows="4" cols="35"></textarea>
					<h4 class="errorNote" hidden>  </h4>
					<div class="buttons_div">
						<input type="button" class="button" id="mail" value="Submit">
						<input type="reset" class="button" value="Reset">
					</div>
				</form>
			</div>
		</div>
<?php
	include "appTail.php";
?>