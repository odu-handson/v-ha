<script type="text/javascript">	

	




	$(function() {
	
	
		$(document).ready(function() {
		 $("input[name=pwd_l]").keydown(function(event) {

						if ( event.keyCode == 13)
						 {
							$("#login_submit_button").click();
						}

					});
		});
	
	
	
		// Check the login credentials
		$("#login_submit_button").click( function() {
			
			var error = 1;
			var errorFields = "";
			
			// Validate the credentials here
			if($.trim($("#uname_l").val()) == "") 
			{
				error = 0;
				errorFields = errorFields + "User Name   ";
				$("#uname_l").addClass("error");

			}
			if($.trim($("#pwd_l").val()) == "")
			{	
				error = 0;
				errorFields = errorFields + "Password   ";
				$("#pwd_l").addClass("error");
			}
			
			if(error == 0)
			{
				$(".alertMessage").html(errorFields.substring(0,errorFields.length - 2)+" : mandatory field!");
				$(".AlertBox").show();
				setTimeout(function() {
					$(".AlertBox").hide();
				}, 4000);
			}
			else
			{
				$("#loading_div").show();
				// Service call
				$.ajax({
				  type: "POST",
				  url: "Registration/checkLogin.php",
				  data: {
					'uname': $("#uname_l").val(),
					'pwd': $("#pwd_l").val()
				  },
				  success: function (data) {
					$("#loading_div").hide();
					if(data)
						window.location="home.php";
					else
					{
						$(".alertMessage").html("<h4 style=\"color: red;\"> Information provided did not match our records, please retry!</h4>");
						$(".errorNote").hide();
						$(".AlertBox").show();
						setTimeout(function() {
							$(".AlertBox").hide();
						}, 3000);
					}
				  },
				  dataType: "json"
				});
			}
		});
	});
</script>
<div id="dialog-form1" class="dialog-form1_closed">
	<!--<h4 class="errorNote" style="float:left; text-align:right !important;  padding-left : 30px; width : 55%; color: red !important; visibility:hidden">  </h4>-->
	<form class="loginForm" action="checkLogin.php" method="POST">
		<span> Email: <input type="text" id="uname_l" name="uname_l" placeholder="User Name" /> </span>
		<span> Password: <input type="password" id="pwd_l" name="pwd_l" placeholder="Password" /> </span>
		<div id="buttons_div">
			<input id="login_submit_button" name="login_submit_button" class="button" style="margin-right: 5%;" type="button" value="SUBMIT" />
			<input id="cancel_slide" class="button" style="margin-right: 5%;" type="button" value="CANCEL" />
		</div>
	</form>
</div>