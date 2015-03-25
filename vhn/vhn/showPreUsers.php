<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
?>
	<link rel="stylesheet" media="screen" type="text/css" href="css/showPreUsers.css" />
	<link rel="stylesheet" media="screen" type="text/css" href="css/button.css" />
	<script type="text/javascript">
		$(function() {
			// Initially hide all buttons
			$("#edit_person").hide();
			$("#send_credentials").hide();
			$("#approve_user").hide();
			$("#reject_user").hide();
			/* $("#approve_FP").hide();
			$("#reject_FP").hide(); */ 
			
			
			$("#mask_div").hide();
			/* Finder and content section */
			$("#preUsers_content").load("loadPreUsers2.php", {
				'fname':'%',
				'lname':'%',
				'city':'%',
				'role_id':'%',
				'qualifies':'%',
				'approval_status': '%'
			});
			
			// Show Full details 
			$(document).on('click', '.preUser_title .title_content', function() {
				$(".errorNote2").hide();
				$("#mask_div").show();
				
				// Load Individual User
				$.ajax({
					url: "loadUser.php?id="+$(this).parent().parent().attr("id")+"&role="+$.trim($(this).children(".role").html()),
					async: false
				}).done(function(data) {
					$("#dialog_content").html(data);
				});
				
				$(".currentEdit_Userid").attr("id", $(this).parent().parent().attr("id"));
				//alert($.trim($(this).children(".role").html()));
				if($.trim($(this).children(".role").html()) == "Admin")
				{
					$("#dialog_heading").html("Admin");
					
					$("#edit_person").show();
					$("#send_credentials").hide();
					$("#approve_user").hide();
					$("#reject_user").hide();
					/* $("#approve_FP").hide();
					$("#reject_FP").hide(); */
				}
				else if($.trim($(this).children(".role").html()) == "Grant Administrator")
				{
					$("#dialog_heading").html("Grant Administrator");
					
					$("#edit_person").show();
					$("#send_credentials").show();
					$("#approve_user").hide();
					$("#reject_user").hide();
					/* $("#approve_FP").hide();
					$("#reject_FP").hide(); */
				}
				else if($.trim($(this).children(".role").html()) == "Future Participants")
				{
					$("#edit_person").hide();
					$("#send_credentials").hide();
					$("#approve_user").hide();
					$("#reject_user").hide();
					
					console.log("asdasdasd"+$("#dialog_content").children(".approval_status").val());
					
					if($("#dialog_content").children(".approval_status").val() == 2)
					{
						$("#dialog_heading").html("Future Participants: Waiting");
						/* $("#approve_FP").show();
						$("#reject_FP").show(); */
					}
					else
					{
						$("#dialog_heading").html("Future Participants: Rejected");
						/* $("#approve_FP").show();
						$("#reject_FP").hide(); */
					}
				}
				else
				{
					if($("#dialog_content").children(".qualifies").val() == 1)
					{
						$("#dialog_heading").html("Participant: Qualified for Study");
						
						$("#edit_person").show();
						$("#send_credentials").show();
						$("#approve_user").hide();
						$("#reject_user").show();
						/* $("#approve_FP").hide();
						$("#reject_FP").hide(); */
					}
					else if($("#dialog_content").children(".qualifies").val() == 0)
					{
						$("#dialog_heading").html("Participant: Not Qualified for Study");
						
						$("#edit_person").show();
						$("#send_credentials").hide();
						$("#approve_user").hide();
						$("#reject_user").hide();
						/* $("#approve_FP").hide();
						$("#reject_FP").hide(); */
					}
					else if($("#dialog_content").children(".qualifies").val() == 2)
					{
						$("#dialog_heading").html("Participant: Rejected for Study");
						
						$("#edit_person").hide();
						$("#send_credentials").hide();
						$("#approve_user").hide();
						$("#reject_user").hide();
						/* $("#approve_FP").hide();
						$("#reject_FP").hide(); */
					}
					else if($("#dialog_content").children(".qualifies").val() == 3)
					{
						$("#dialog_heading").html("Participant: Withdrawn from Study");
						
						$("#edit_person").hide();
						$("#send_credentials").hide();
						$("#approve_user").hide();
						$("#reject_user").hide();
						/* $("#approve_FP").hide();
						$("#reject_FP").hide(); */
					}
				}
				$("#dialog_div").show();
			});
			
			// Notes/Comments details
			$(document).on('click', '.preUserInfo', function() {	
				$("#mask_div").show();
				$("#notes_content").load("loadPreUserNotes.php?id="+this.id, function() {
				
				$("#notes").show();
				});
				
				// Have to do Something
			});
			
			// Send Email Button
			$(document).on('click', '.send', function() {	
				$("#mask_div").show();
				
				if(this.id=="allEmail")
				{
					$("#email_content").load("loadEmail.php?all=1&id="+$("#id_container").val(), function() {
						$("#email_section").show();
					});
				}
				else
				{
					$("#email_content").load("loadEmail.php?all=0&id="+this.id, function() {
						$("#email_section").show();
					});
				}
			});
			
			
			//login times
			$(document).on('click', '.log', function() {	
				alert("hello"+this.id);
					$("#mask_div").show();
				$("#log_notes").load("loadLoginTimes.php?id="+this.id, function() {
				
				$("#log_content").show();
				});
				
			});
			
			// Send usernames and passwords mail to users
			$("#send_credentials").click( function() {
				$("#loading_div").show();
				$.ajax({
					url: "sendMail.php?purpose=sendCredentials&id="+$(".currentEdit_Userid").attr("id"),
					success: function(data) {
						$("#loading_div").hide();
						if(data == "1")
						{
							//alert("Email Sent");
							$(".alertMessage").html("<h4 style=\"color: green;\"> Email Sent! </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
						}
					}
				});
			});
			
			//send email
			$("#send_email").click( function() {				
				$("#loading_div").show();
				$.ajax({
					url: "sendUserMail.php?id="+$("#to").val()+"&subject="+$("#subject").val()+"&body="+$("#body").val()+"&all="+$("#user_catg").val(),
					//url: "expoEmail.php?id="+$("#to").val()+"&subject="+$("#subject").val()+"&body="+$("#body").val()+"&all="+$("#user_catg").val(),
					success: function(data) {
						$("#loading_div").hide();
						if(data == "1")
						{
							$("#email_section").hide();
							$("#mask_div").hide();
							$(".alertMessage").html("<h4 style=\"color: green;\"> Email Sent! </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
						}
					}
				});				
			});
			
			
			
			
			//saving member notes
			$("#update_member_notes").click(function() {
				
				var error = 1;
				var errorFields = "";
				if($.trim($("#mem_notes").val()) == "")
				{
					error = 0;
					errorFields = errorFields+"Comments, ";
					$("#No comments").addClass("error");
				}
			
				if(error == 0)
				{
					$(".errorNote").html(errorFields.substring(0,errorFields.length - 2)+" not prvoided in order to be Updated!");
					$(".errorNote").show();	
				}
				else
				{
					$.ajax({
						type: "POST",
						url: "updateMemNotes.php",
						data: {
						'id': $(".memnotes").attr("id"),
						'notes': $("#mem_notes").val(),
						},
						success: function (data) 
						{
							if(data == 1)
							{
								$("#notes").hide();
								$("#mask_div").hide();
								$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
									$(".AlertBox").show();
									setTimeout(function() {
										$(".AlertBox").hide();
									}, 4000);
							}
							else 
							{
								$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
							}
						}
					}); 
				}
			});
			
			// Reject qualified User
			$("#reject_user").click(function() {
				var user_id = $(".currentEdit_Userid").attr("id");
				$.ajax({
						type: "POST",
						url: "changeUserStatus.php",
						data: {
						'id': user_id,
						'notes': "Due to this reason",
						'status': "Reject"
						},
						success: function (data) 
						{
							if(data == 1)
							{
								$("#mask_div").hide();
								$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								
								$(".mandatoryFields").removeClass("error");
								
								$("#dialog_footer input.edit_person").val("EDIT");
								$("#dialog_div").hide();
								
							}
							else 
							{
								$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
							}
						}
					}); 
			});
			
			// Approve qualified User
			$("#approve_user").click(function() {
				var user_id = $(".currentEdit_Userid").attr("id");
				$.ajax({
						type: "POST",
						url: "changeUserStatus.php",
						data: {
						'id': user_id,
						'notes': "Due to this reason",
						'status': "Approve"
						},
						success: function (data) 
						{
							if(data == 1)
							{
								$("#mask_div").hide();
								$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								
								$(".mandatoryFields").removeClass("error");
								
								$("#dialog_footer input.edit_person").val("EDIT");
								$("#dialog_div").hide();
								
							}
							else 
							{
								$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
							}
						}
					}); 
			});
			
			
			// Editing User
			$("#edit_person").click(function() {
				//console.log($("#dialog_heading").html());
				if($("#dialog_heading").html() == "Admin" || $("#dialog_heading").html() == "Grant Administrator")
				{
					// Edit Admin
					if($(this).val() == "EDIT")
					{
						var role = "";
						if($("#dialog_heading").html() == "Admin")
							role = 1;
						else
							role = 2;
						$("#dialog_content").load("loadIndividualAdmin.php?id="+$(".currentEdit_Userid").attr("id")+"&role="+role, function() {
							$("#loading_div").hide();
						});
						$(this).val("SAVE");
					}
					else
					{
						var error = 1;
						var errorFields = "";
						
						if($.trim($("#emailEdit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Email address, ";
							$("#emilEdit").addClass("error");
						}
						if($.trim($("#homePhEdit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Phone Number, ";
							$("#homePhEdit").addClass("error");
						}
						if($.trim($("#st1Edit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Street Address, ";
							$("#st1Edit").addClass("error");
						}	
						if($.trim($("#cityEdit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"City, ";
							$("#cityEdit").addClass("error");
						}
						if($.trim($("#zipEdit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Zip, ";
							$("#zipEdit").addClass("error");
						}
						if(error == 0)
						{
							$(".errorNote2").html(errorFields.substring(0,errorFields.length - 2)+" are mandatory!");
							$(".errorNote2").show();
						}
						else
						{
							var val = [];
							var role = "";
							if($( "input:radio[name=mainRoleEdit]:checked" ).val() == 1)
							{
								role = "6";
							}
							else
							{
								$(':checkbox:checked').each(function(i){
									val[i] = $(this).val();
								});
								role = val.toString();
								console.log(role);
							}
							if(role == "")
							{
								$(".errorNote").html("Please select the roles");
								$(".errorNote").show();
							}
							else
							{
								/*
								$.ajaxSetup({ cache: false, timeout: 8000 });
								$.ajax({
									url: "checkEmail.php?email="+$("#emailEdit").val()+ '&time=' + new Date(),
									async: true,
									type: "GET",
									cache: false,
									success: function (data) {
										if(data == 0)
										{
											error = 0;
											errorFields = "Email address already exists!";
											$("#emailaddress").addClass("error");
											$(".errorNote").show();
											$(".errorNote").html(errorFields);
										}
										else
										{*/
											$.ajax({
											  type: "POST",
											  cache: false,
											  async: false,
											  url: "updateNonUser.php",
											  data: {
												'id': $(".preUser_details_individual").attr("id"),
												'fname': $("#fnameEdit").val(),
												'lname': $("#lnameEdit").val(),
												'st1': $("#st1Edit").val(),
												'st2': $("#st2Edit").val(),
												'city': $("#cityEdit").val(),
												'zip': $("#zipEdit").val(),
												'email': $("#emailEdit").val(),
												'homeph': $("#homePhEdit").val(),
												'cellph': $("#otherPhEdit").val(),
												'prev_role': $("#prevRoleEdit").val(),
												'role': role
											  },
											  success: function (data) {
													if(data == 1)
													{
														$("#mask_div").hide();
														$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
														$(".AlertBox").show();
														setTimeout(function() {
															$(".AlertBox").hide();
														}, 4000);
														
														$(".mandatoryFields").removeClass("error");
														
														$("#dialog_footer input.edit_person").val("EDIT");
														$("#dialog_div").hide();
														
														/*
														// Load Individual User
														$.ajax({
															url: "loadUser.php?id="+$(".preUser_details_individual").attr("id"),
															async: false
														}).done(function(data) {
															$("#dialog_content").html(data);
															//$("#dialog_content").children(".id").hide();
														});
														*/
													}
													else 
													{
														$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
														$(".AlertBox").show();
														setTimeout(function() {
															$(".AlertBox").hide();
														}, 4000);
													}
												},
											  dataType: "text"
											}); 
										/*}
									}
								});*/
							}
						}
					}
				}
				else
				{
					// Edit User
					if($(this).val() == "EDIT")
					{
						$("#dialog_content").load("loadIndividualPreUser.php?id="+$(".currentEdit_Userid").attr("id"), function() {
							$("#loading_div").hide();
						});
						$(this).val("SAVE");
					}
					else
					{
						var error = 1;
						var errorFields = "";
						
						if($.trim($("#emailEdit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Email address, ";
							$("#emilEdit").addClass("error");
						}
						if($.trim($("#homePhEdit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Phone Number, ";
							$("#homePhEdit").addClass("error");
						}
						if($.trim($("#st1Edit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Street Address, ";
							$("#st1Edit").addClass("error");
						}	
						if($.trim($("#cityEdit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"City, ";
							$("#cityEdit").addClass("error");
						}
						if($.trim($("#zipEdit").val()) == "")
						{
							error = 0;
							errorFields = errorFields+"Zip, ";
							$("#zipEdit").addClass("error");
						}
						if(error == 0)
						{
							$(".errorNote2").html(errorFields.substring(0,errorFields.length - 2)+" are mandatory!");
							$(".errorNote2").show();
						}
						else
						{
							$("#loading_div").show();
							var study = 1;
							if(($( "input:radio[name=unpaidEdit]:checked" ).val() == 0)||($( "input:radio[name=iaEdit]:checked" ).val() == 0)||($( "input:radio[name=engProfEdit]:checked" ).val() == 0))
							{
								study = 0;
							}
							$.ajax({
								type: "POST",
								url: "updatePreUser1.php",
								data: {
								'id': $(".preUser_details_individual").attr("id"),
								'fname': $("#fnameEdit").val(),
								'lname': $("#lnameEdit").val(),
								'st1': $("#st1Edit").val(),
								'st2': $("#st2Edit").val(),
								'city': $("#cityEdit").val(),
								'zip': $("#zipEdit").val(),
								'email': $("#emailEdit").val(),
								'homeph': $("#homePhEdit").val(),
								'cellph': $("#otherPhEdit").val(),
								'uname': $("#unameEdit").val(),
								'dementia': $( "input:radio[name=unpaidEdit]:checked" ).val(),
								'internet': $( "input:radio[name=iaEdit]:checked" ).val(),
								'english': $( "input:radio[name=engProfEdit]:checked" ).val(),
								'study': study
								},
								success: function (data) {
									$("#loading_div").hide();
									if(data == 1)
									{
										$("#mask_div").hide();
										$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
										$(".AlertBox").show();
										setTimeout(function() {
											$(".AlertBox").hide();
										}, 4000);
										
										$(".mandatoryFields").removeClass("error");
										
										$("#dialog_footer input.edit_person").val("EDIT");
										$("#dialog_div").hide();
										
									}
									else 
									{
										$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
										$(".AlertBox").show();
										setTimeout(function() {
											$(".AlertBox").hide();
										}, 4000);
									}
								}
							}); 
							
						}
					}
				}
				
			});
			
			// Cancel Showing details
			$("#cancel_person").click( function() {
				$("#dialog_footer input.edit_person").val("EDIT");
				console.log($("#edit_person").val());
				$("#dialog_footer input.edit_person").attr("id","edit_person");
				$("#dialog_div").hide();
				$("#log_content").hide();
				$("#notes").hide();
				$("#mask_div").hide();
			});
			
			$("#cancel_person_notes").click( function() {
				//alert("hello");
				$("#notes").hide();
				$("#mask_div").hide();
			});
			
			$("#cancel_log_notes").click( function() {
				
				$("#log_content").hide();
				$("#mask_div").hide();
			});
			
			
			$("#cancel_email").click( function() {
				//alert("hello");
				$("#email_section").hide();
				$("#mask_div").hide();
			});
			
			// Finder Reset Functions
			$("#finder_resetButton").click(function() {
				$("#finder_fname").val("");
				$("#finder_lname").val("");
				$("#finder_city").val("");
				/* $("input:radio[name='finder_type']").each(function(i) {
					this.checked = false;
				}); */
				$("select#finder_role").prop('selectedIndex',0);
				$("select#finder_qualified_type").prop('selectedIndex',0);
				$("#qualified_type").hide();
				$("#preUsers_content").load("loadPreUsers2.php", {
					'fname':'%',
					'lname':'%',
					'city':'%',
					'qualifies':'%',
					'role_id':'%'
				});
			});
			
			// Finder Search Functions
			$("#finder_searchButton").click(function() {
				$("#loading_div").show();
				
				$("#preUsers_content").load("loadPreUsers2.php", {
					'fname': $("#finder_fname").val(),
					'lname': $("#finder_lname").val(),
					'city': $("#finder_city").val(),
					'role_id': $("select#finder_role option:selected").val(),
					'qualifies': $("select#finder_qualified_type option:selected").val(),
					'approval_status': $("select#finder_future_participant_type option:selected").val()
				}, function() {
					$("#loading_div").hide();
				});
			});
		
			// Finder sort method
			$(document).on('click', '.sort', function() {
				$("#loading_div").show();
				$("#preUsers_content").load("loadPreUsers2.php", {
					'fname': $("#finder_fname").val(),
					'lname': $("#finder_lname").val(),
					'city': $("#finder_city").val(),
					'role_id': $("select#finder_role option:selected").val(),
					'qualifies': $("select#finder_qualified_type option:selected").val(),
					'sort': $(this).attr("id"),
					'direction': $("#sorted").attr("name")
				}, function() {
					$("#loading_div").hide();
				});
			});
		
			// Finder role change method
			$("#finder_role").change(function() {
				if($(this).val() == 3)
				{
					$("#qualified_type").show();
					//$("#future_participant_type").hide();
				}
				else if($(this).val() == 4)
				{
					$("#qualified_type").hide();
					//$("#future_participant_type").show();
				}
				else
				{
					$("#qualified_type").hide();
					//$("#future_participant_type").hide();
				}
			});
		
			// Edit Admin role change
			$(document).on('change', '[name="mainRoleEdit"]', function() {
				console.log("I am here" + $(this).filter(':checked').val());
				if($(this).filter(':checked').val()==1)
					$(".subroles_div").hide();
				else
					$(".subroles_div").show();
			});
			
			// Approve Future Participant
			/*
			$("#approve_FP").click(function () {
				var user_id = $(".currentEdit_Userid").attr("id");
				$.ajax({
						type: "POST",
						url: "changeFPStatus.php",
						data: {
						'id': user_id,
						'notes': "Due to this reason",
						'status': "Approve"
						},
						success: function (data) 
						{
							if(data == 1)
							{
								$("#mask_div").hide();
								$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								
								$(".mandatoryFields").removeClass("error");
								
								$("#dialog_footer input.edit_person").val("EDIT");
								$("#dialog_div").hide();
								
							}
							else 
							{
								$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
							}
						}
					});
			});
			
			$("#reject_FP").click(function () {
				var user_id = $(".currentEdit_Userid").attr("id");
				$.ajax({
						type: "POST",
						url: "changeFPStatus.php",
						data: {
						'id': user_id,
						'notes': "Due to this reason",
						'status': "Reject"
						},
						success: function (data) 
						{
							if(data == 1)
							{
								$("#mask_div").hide();
								$(".alertMessage").html("<h4 style=\"color: green;\"> Updated Successfully! </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
								
								$(".mandatoryFields").removeClass("error");
								
								$("#dialog_footer input.edit_person").val("EDIT");
								$("#dialog_div").hide();
								
							}
							else 
							{
								$(".alertMessage").html("<h4 style=\"color: red;\"> Updated Failed! Please try again later or contact technical support if the problem continues. </h4>");
								$(".AlertBox").show();
								setTimeout(function() {
									$(".AlertBox").hide();
								}, 4000);
							}
						}
					});
			});
			*/
		});
	</script>
	<span class="page_title"> View Users </span>
	<div id="main_wrapper">
		<style>
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
		
		.notes
		{
			position: fixed;
			top: 20%;
			left: 20%;
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
			width: 60%;
			z-index: 1000;
			height : auto;
		}
		
		#mask_div
		{
			position: fixed;
			background-color: black;
			opacity: 0.5;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			width: 100%;
			height: 100%;
			min-height: 100%;
			z-index: 999;
		}
		</style>
		<div id="mask_div">
		</div>
		<div id="preUser_details" class="preUser_details">
			
		</div>
		
			
			<div id="log_content" hidden>
				
				<div id="log_notes"></div>
				
				<input id="cancel_log_notes" class="button" type="button" value="CANCEL" />
			</div>
		
		
		<div id="preUsers_finder">
			<table>
				<tr>
					<td> <span> First Name: </span> <input type="text" id="finder_fname" />   </td>
					<td> <span> Last Name: </span> <input type="text" id="finder_lname" /> </td>
					<td> <span> City: </span> <input type="text" id="finder_city" /> </td>
					
				</tr>
				<tr>
					<td> 
						<span> Role: </span> 
						<select id="finder_role"> 
							<option checked value="0"> All </option>
							<?php
								$sql = "select * from roles";
								$result = mysql_query($sql) or die(mysql_error());
								while($row = mysql_fetch_array($result))
								{
									echo "<option value=".$row['id'].">" .$row['title']. "</option>";
								}
							?>
							
						</select>
					</td>
					<td id="qualified_type" hidden> 
						<span> Type: </span> 
						<select id="finder_qualified_type"> 
							<option checked value="-1"> All </option>
							<option value="1"> Qualified </option>
							<option value="0"> Not Qualified </option>
							<option value="2"> Rejected </option>
							<option value="3"> Withdrawn </option>
						</select>
					</td>
					<td id="future_participant_type" hidden> 
						<span> Type: </span> 
						<select id="finder_future_participant_type"> 
							<option checked value="-1"> All </option>
							<option value="1"> Approved </option>
							<option value="0"> Rejected </option>
							<option value="2"> Waiting </option>
						</select>
					</td>
				</tr>
			</table>
			<div id="finder_footer">
				<input id="finder_searchButton" class="edit_person" type="button" value="SEARCH" />
				&nbsp;
				<input id="finder_resetButton" class="button" type="button" value="RESET" />
			</div>
			
		</div>
		<div id="preUsers_content">
		</div>
		
		<div id="notes" class="notes" hidden>
			
			<div id="notes_content" style="overflow:hidden">
				
			</div><br/>
			
			<div id="mem_content">
				
			</div>
		
			
			
			<h4 class="errorNote" hidden>  </h4>

			<input id="update_member_notes" class="button" type="button" style="width : auto" value="UPDATE" />

			<input id="cancel_person_notes" class="button" type="button" value="CANCEL" />

		</div>
		
		<div id="email_section" class="notes" hidden>
			
			<div id="email_content" style="overflow:hidden">
				
			</div><br/>
			
			<h4 class="errorNote" hidden>  </h4>

			<input id="send_email" class="button" type="button" style="width : auto" value="Send" />

			<input id="cancel_email" class="button" type="button" value="CANCEL" />

		</div>
		
		<div id="dialog_div" hidden>
			<div id="dialog_heading">
				Full Details
			</div>
			<hr />
			<div id="dialog_content">
				
			</div>
			<hr />
			<div id="dialog_footer">
				<!-- Error Notes -->
				<h4 class="errorNote2" hidden>  </h4>
				<input class="currentEdit_Userid" type="hidden" value=""/>
				<input id="edit_person" class="edit_person" type="button" value="EDIT" />
				<input style="width: 180px;" id="send_credentials" class="button" type="button" value="Send credentials" />
				<input id="approve_user" class="button" type="button" value="Approve" />
				<input id="reject_user" class="button" type="button" value="Reject" />
				<!--<input id="approve_FP" class="button" type="button" value="Approve" />
				<input id="reject_FP" class="button" type="button" value="Reject" />-->
				<input id="cancel_person" class="button" type="button" value="CANCEL" />
			</div>
		</div>
	</div>
<?php
	include "appTail.php";
?>