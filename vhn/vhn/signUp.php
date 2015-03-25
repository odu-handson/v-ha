<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
?>
			<script type="text/javascript">
				$(document).ready( function () {
					// jQuery Ajax Error Handling Function
					
					$("#reset_form").click(function() {
						$("#registerForm").trigger("reset");
						$(".mandatoryFields").removeClass("error");
						$(".subroles").hide();
						$(".errorNote").hide();
					});
					$("#register_member").click( function() {
						var error = 1;
						var errorFields = "";
						
						// Validate Here
						if($.trim($("#fname").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"First Name, ";
							$("#fname").addClass("error");
						}
						if($.trim($("#lname").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Last Name, ";
							$("#lname").addClass("error");
						}
						if(($.trim($("#street1").val()) == "")&&($.trim($("#street2").val()) == ""))
						{
							error = 0;
							errorFields = errorFields+"Atleast One Street Address, ";
							$("#street1").addClass("error");
						}
						if($.trim($("#city").val()) == "select")
						{
							error = 0;
							errorFields = errorFields+"City, ";
							$("#city").addClass("error");
							$("#city").css("color","black");
						}
						if($.trim($("#zip").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Zip, ";
							$("#zip").addClass("error");
						}
						if($.trim($("#emailaddress").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Email, ";
							$("#emailaddress").addClass("error");
						}
						if($.trim($("#homephone").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Home/Cell, ";
							$("#homephone").addClass("error");
						}
						if(error == 0)
						{
							$(".errorNote").html(errorFields.substring(0,errorFields.length - 2)+" are mandatory!");
							$(".errorNote").show();
						}
						else
						{	
							var val = [];
							var role = "";
							if($( "input:radio[name=main_role]:checked" ).val() == 0)
							{
								role = "6";
							}
							else
							{
								$(':checkbox:checked').each(function(i){
									val[i] = $(this).val();
								});
								role = val.toString();
							}
							if(role == "")
							{
								$(".errorNote").html("Please select the roles");
								$(".errorNote").show();
							}
							else
							{
								console.log("I am Here");
								$.ajaxSetup({ cache: false, timeout: 8000 });
								$.ajax({
									url: "checkEmail.php?email="+$("#emailaddress").val()+ '&time=' + new Date(),
									async: true,
									type: "GET",
									cache: false,
									success: function (data) {
										console.log("jhfgjhgjhg gjhg jhg jhgjgjhgjhg"+ data);
										if(data == 0)
										{
											error = 0;
											errorFields = "Email address already exists!";
											$("#emailaddress").addClass("error");
											$(".errorNote").show();
											$(".errorNote").html(errorFields);
										}
										else
										{
											console.log("jhfgjhgjhg gjhg jhg jhgjgjhgjhg");
											$.ajax({
											  type: "POST",
											  cache: false,
											  async: false,
											  url: "Registration/registerSave.php",
											  data: {
												'fname': $("#fname").val(),
												'lname': $("#lname").val(),
												'mname': $("#mname").val(),
												'st1': $("#street1").val(),
												'st2': $("#street2").val(),
												'city': $("#city").val(),
												'zip': $("#zip").val(),
												'email': $("#emailaddress").val(),
												'homeph': $("#homephone").val(),
												'cellph': $("#cellphone").val(),
												'from': 'memberSignUp',
												'role_r': role
											  },
											  success: function (data) {
													if(data == 1)
													{
														$(".alertMessage").html("<h4 style=\"color: green;\"> Registration Success </h4>");
														$(".AlertBox").show();
														$(".subroles").hide();
														$(".errorNote").hide();

														setTimeout(function() {
															$(".AlertBox").hide();
														}, 4000);
														$("#registerForm").trigger("reset");
														$(".mandatoryFields").removeClass("error");
													}
													else 
													{
														$(".alertMessage").html("<h4 style=\"color: red;\"> Registration Failed! Please try again later or contact technical support if the problem continues. </h4>");
														$(".AlertBox").show();
														setTimeout(function() {
															$(".AlertBox").hide();
														}, 4000);
													}
												},
											  dataType: "text"
											}); 
										}
									}
								});
							}
						}
					});
					$(".subroles").hide();
					$(':radio[name="main_role"]').change(function() {
						if($(this).filter(':checked').val()==0)
							$(".subroles").hide();
						else
							$(".subroles").show();
					});
				});
				
			</script>
			<style>
				.Note
				{
					color: rgb(137,137,186);
				}
				.Note, .errorNote
				{
					font-style: italic;
				}
				.errorNote
				{
					color: red;
				}
				.mandatory
				{
					font-weight: bold;
				}
			</style>
			<span class="page_title"> Sign Up Members </span>
			<!--<div class="AlertBox" hidden>
				<h3 align="left" style="margin-left: 10%;"> Alert </h3>
				<hr/>
				<p class="alertMessage"> </p>
			</div>-->
			<div id="main_wrapper">
				<div id="main_content">
					<!--<span style="Color: red; align:center;">-->
					<?php
						include "Registration/RegisterForm.php"; 
					?>
				</div>
			</div>
<?php
	include "appTail.php";
?>