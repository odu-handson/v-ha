<?php
	include 'appHead.php';
	include "expire.php";
	include "loginStatus.php";
?>
	
	<script type="text/javascript">
		$(function () {
		
			$(document).ready(function () {
              $("#profile_footer").show();
        });
		
		
			$("#profile_content").load("loadMyProfile.php");

			$("#updateProfile").click(function() {
							$("profile_footer").hide();

				var id = <?php echo $_SESSION['uid'];?>;
				$("#profile_content").load("loadEditProfile.php?id="+id, function() {
				$("#update_buttons").show();
				

				});
			});
			
			
			$("#cancel_update").click(function() {
			
			$("#profile_content").load("loadMyProfile.php");
			$("#update_buttons").hide();
			$(".AlertBox").hide();
			
			
			});
			
			$("#cancel_update2").click(function() {
			
			$("#profile_content").load("loadMyProfile.php");
			$("#update_buttons2").hide();
			$(".AlertBox").hide();
			$(".errorNote").hide();

			
			});
			
			$("#changepwd").click(function() {
							$("profile_footer").hide();
				$("#profile_content").load("resetPassword.php", function() {
				$("#update_buttons").hide();

				$("#update_buttons2").show();
				

				});
			});
			
			
			$("#save_update2").click(function() {	
			
				var error = 1;
			var errorFields = "";
			
				$("#update").hide();
			
				if($.trim($("#currentpwd").val()) == "")
			{
				error = 0;
				errorFields = errorFields+"Current Password, ";
				$("#currentpwd").addClass("error");
			}
			if($.trim($("#newpwd").val()) == "")
			{
				error = 0;
				errorFields = errorFields+"New Password, ";
				$("#newpwd").addClass("error");
			}
			
			if($.trim($("#conpwd").val()) == "")
			{
				error = 0;
				errorFields = errorFields+"Confirm Password, ";
				$("#conpwd").addClass("error");
			}
			
			if($.trim($("#newpwd").val()) != $.trim($("#conpwd").val()) )
			{
				error = 0;
				errorFields = errorFields+"Passwords do not match, Re-enter all fields which are ";
				$("#newpwd").addClass("error");
			}
			
			if(error == 0)
			{
				$(".errorNote").html(errorFields.substring(0,errorFields.length - 2)+" are mandatory!");
				$(".errorNote").show();
			}
			
			
			else
			{
			
			
			
			$.ajax({
					type: "POST",
					url: "updatePassword.php",
					data: {
					'cur': $("#currentpwd").val(),
					'new': $("#newpwd").val(),
					
					},
					success: function (data) {

					if(data == 1)
						{
							$(".alertMessage").html("<h4 style=\"color: green;\"> Password updated ! </h4>");
							$(".AlertBox").show();
						
							/*$("#notes").hide();

							$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								
							*/
						}
						else 
						{
								$(".alertMessage").html("<h4 style=\"color: red;\"> Current Password entered doesn't match our records! Please try again</h4>");
							$(".AlertBox").show();
							
								
								//alert(data);
								/*
								$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								*/
						}
					}
				}); 
			
			}
			
			});
			
			
			
			
			$("#save_update").click(function() {	
			
			
			$("#update").hide();
			
			$.ajax({
					type: "POST",
					url: "updateMemberDetails.php",
					data: {
					'id': <?php echo $_SESSION['uid'];?>,
					'uname': $("#uname").val(),
					'email': $("#email").val(),
					},
					success: function (data) {

					if(data == 1)
						{
							$(".alertMessage").html("<h4 style=\"color: green;\"> Registration Success </h4>");
							$(".AlertBox").show();
						
							/*$("#notes").hide();

							$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								
							*/
						}
						else 
						{
								$(".alertMessage").html("<h4 style=\"color: red;\"> Registration Failed!</h4>"+data);
							$(".AlertBox").show();
							
								
								//alert(data);
								/*
								$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								*/
						}
					}
				}); 
			
			
			
			});
			
			
			
		
		});
	
			
	</script>
	<span class="page_title">My profile</span>
	<div id="main_wrapper">
	
		<style>
			.update
		{
			position: fixed;
			top: 20%;
			left: 30%;
			min-height: 200px;
		
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
			padding-left: 35px;
			padding-top : 15px;
			padding-bottom : 15px;
			width: 40%;
			z-index: 1000;
			height : auto;
		}
		.Note, .errorNote
	{
		font-style: italic;
	}
		
			
		</style>
			<div id="profile_content">
			</div>
			<div class="AlertBox" hidden>
				<hr/>
				<p class="alertMessage"> 
				</p>
			</div>
				<h4 class="errorNote" hidden>  </h4>
			<div id="update_buttons" class="update_buttons" hidden>
				<input id="save_update" class="button" type="button" value="UPDATE" />
				<input id="cancel_update" class="button" type="button" value="CANCEL" />
			</div>	
			
				<div id="update_buttons2" class="update_buttons2" hidden>
				<input id="save_update2" class="button" type="button" value="UPDATE" />
				<input id="cancel_update2" class="button" type="button" value="CANCEL" />
			</div>	
			
			<div id="profile_footer" class="profile_footer" hidden>
				<input type="button" class="button" id="updateProfile" value ="UPDATE">
				<input type="button" class="button" id="changepwd" style="width : auto" value ="CHANGE PASSWORD">

			</div>
				
			<div id="update" class="update" hidden>
			
				<div id="dialog_content">
						
				</div>
			</div>
		</div>
	
<?php
	include 'appTail.php';
?>