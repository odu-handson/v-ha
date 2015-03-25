<script type="text/javascript">
	$(function() {	
		$("#forget_div").hide();
		$("#login").click(function() {
			$("#dialog-form1").removeClass("dialog-form1_closed").addClass("dialog-form1_open");
		});
		$("#cancel_slide").click(function() {
			$("#dialog-form1").removeClass("dialog-form1_open").addClass("dialog-form1_closed");
		});
		$("#logout").click(function() {
			window.location = "logout.php";
		});
		$("#forget_password").click(function() {
			$("#forget_div").show();
		});
		$("#cancel_fg").click(function() {
			$("#forget_div").hide();
			$(".errorNote").hide();
			$("#email_fg").removeClass("error");
		});
		$("#submit_fg").click(function() {
			if($.trim($("#email_fg").val()) == "")
			{
				$("#email_fg").addClass("error");
				$(".errorNote").html("Email address Empty!");
				$(".errorNote").show();
			}
			else
			{
				$.ajax({
					url: "checkEmail.php?email="+$("#email_fg").val(),
					async: false,
					success: function (data) {
						if(data == 1)
						{
							$("#email_fg").addClass("error");
							$(".errorNote").show();
							$(".errorNote").html("Email does not exists!");
						}
						else
						{
							alert(data);
							$.ajax({
								type: "POST",
								url: "forgotPassword.php",
								async: false,
								data: {
									email: $("#email_fg").val()
								},
								success: function(data) {
									if(data == 1)
									{
										$(".alertMessage").html("<h4 style=\"color: green;\"> Your password has been reset sucessfully. Please check your email! </h4>");
										$(".AlertBox").show();
										$(".errorNote").hide();

										setTimeout(function() {
											$(".AlertBox").hide();
										}, 4000);
										$("#email_fg").removeClass("error");
										$("#forget_div").hide();
									}
									else 
									{
										$(".alertMessage").html("<h4 style=\"color: red;\"> Password Reset Failed! Please try again later or contact technical support if the problem continues. </h4>");
										$(".AlertBox").show();
										setTimeout(function() {
											$(".AlertBox").hide();
										}, 4000);
									}
								}
							});
						}
					}
					
				});
			}
		});
	});
</script>
<div id="header">
	<div id="header_wrapper">
		<div id="header_title">
			<a href="index.php"><img id="header_logo" src="images/logo.png" alt="" id="logoImg" />
			<span id="header_title_span" >A Virtual Healthcare Neighborhood for Caregivers</span></a>
		</div>
		<!--<div style="display: block">-->
		<ul id="header_list">
			<?php
				if(isset($_SESSION['login_status']))
				{
					echo '<li id="logout"> Logout </li>';
				}
				else
				{	
					echo '	<li> <span id="more_info"> If interested in future studies or Virtual Healthcare Neighborhoods? Click here </span> </li>
							<li> <span id="forget_password"> Forgot Password? Click here <span> </li>
							<li> <span id="login"> Sign In </span> </li>';
				}
			?>
		</ul>
		<!--</div>-->
	</div>
</div>
<style>
	#forget_div
	{
		text-align: center;
		/* padding: 10px; */
		display:none;
		position: fixed;
		top: 20%;
		left: 30%;
		/*min-height: 200px;*/
	
		-webkit-box-shadow: 0 0 5px 2px #ababab;
		-moz-box-shadow: 0 0 5px 2px #ababab;
		box-shadow: 0 0 5px 2px #ababab;
		background: #ffffff;
		border: 1px solid #ababab;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		-khtml-border-radius: 5px;
		border-radius: 5px;

		outline: none;
		padding-left: 15px;
		padding-right : 15px;
		padding-bottom : 15px;
		width: 40%;
		z-index: 1000;
		height : auto;
	}
	#forget_div input[type="email"]
	{
		width: 60%;
		max-width: 300px;
		height: 30px;
		font-size: .9em !important;

		border: 2px inset ;
		
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
		
		-ms-box-sizing:content-box;
		-moz-box-sizing:content-box;
		box-sizing:content-box;
		-webkit-box-sizing:content-box; 
	}
	#forget_div span
	{
		font-size: 1em;
		font-weight: bold;
		color: gray;
	}
</style>
<div id="forget_div">
	<p> Password Recovery </p>
	<hr />
	<p style="font-size: 1em; font-style: italic;" > Note: Please provide your email address to reset the password </p>
	<input type="email" id="email_fg" placeholder="Email" />
	<br/>
	<br/>
	<h4 class="errorNote" hidden>  </h4>
	<div>
		<input id="submit_fg" type="button" class="button" value="Submit" />
		<input id="cancel_fg" type="button" class="button" value="Cancel" />
	</div>
</div>