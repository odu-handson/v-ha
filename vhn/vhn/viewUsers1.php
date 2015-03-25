<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
?>
	<link rel="stylesheet" media="screen" type="text/css" href="css/showPreUsers.css" />
	<link rel="stylesheet" media="screen" type="text/css" href="css/button.css" />
	<script type="text/javascript">
		$(function() {
			$("#members_content").load("loadMembers.php", {
				'fname':'%',
				'lname':'%',
				'email':'%'
			});
			$(".preUser_details").hide();
			
			
			// Show Full details 
			/*
			$(document).on('click', '.member_title .title_content', function()
			{
				$(".errorNote2").hide();

				//$("#loading_div").show();
				$("#dialog_content").html($(this).parent().parent().children( ".preUser_details").html());
				$(".currentEdit_Userid").attr("id", $(this).parent().parent().attr("id"));
				if($("#qualifies"+$(this).parent().parent().attr("id")).val() == 1)
				{
					$("#dialog_heading").html("Qualified for Study");
					$("#send_credentials").show();
				}
				else
				{
					$("#dialog_heading").html("Not Qualified for Study");
					$("#send_credentials").hide();
				}
				$("#dialog_div").show();
			});
			
			$(document).on('click', '.preUserInfo', function()
			{	
				$("#notes_content").load("loadPreUserNotes.php?id="+this.id, function() {
				
				$("#notes").show();
				});
				
				// Have to do Something
			});
			*/
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
					success: function (data) {

					if(data == 1)
						{
							$("#notes").hide();

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
			
			
			
			
			// Editing User
			$("#edit_person").click(function() {
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

					// Update study before
					// qualifiesEdit
					var study = 1;
					if(($( "input:radio[name=unpaidEdit]:checked" ).val() == 0)||($( "input:radio[name=iaEdit]:checked" ).val() == 0)||($( "input:radio[name=engProfEdit]:checked" ).val() == 0))
					{
						study = 0;
					}
					//alert($(".preUser_details_individual").attr("id"));
						/* $.ajax({
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
						});  */
						
					}
				}
			});
			
			// Cancel Showing details
			$("#cancel_person").click( function() {
				$("#dialog_footer input.edit_person").val("EDIT");
				console.log($("#edit_person").val());
				$("#dialog_footer input.edit_person").attr("id","edit_person");
				$("#dialog_div").hide();
				$("#notes").hide();
			});
			
			$("#cancel_person_notes").click( function() {
				$("#notes").hide();
			});
			
			// Finder Reset Functions
			$("#finder_resetButton").click(function() {
				$("#finder_fname").val("");
				$("#finder_lname").val("");
				$("#finder_city").val("");
				$("input:radio[name='finder_type']").each(function(i) {
					this.checked = false;
				});
				$("#members_content").load("loadmembers.php", {
					'fname':'%',
					'lname':'%',
					'city':'%',
					'qualifies':'%'
				});
			});
			
			// Finder Search Functions
			$("#finder_searchButton").click(function() {
				$("#loading_div").show();
				var qual = '%';
				if($("input:radio[name=finder_type]:checked" ).val())
					qual = $( "input:radio[name=finder_type]:checked" ).val();
				
				$("#members_content").load("loadmembers.php", {
					'fname': $("#finder_fname").val()+'%',
					'lname': $("#finder_lname").val()+'%',
					'city': $("#finder_city").val()+'%',
					'qualifies': qual
				},
				function() {
					$("#loading_div").hide();
				});
			});
		});
	</script>
	<span class="page_title"> Members </span>
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
		.AlertBox
		{
			position: fixed;
			top: 20%;
			left: 20%;
			text-align: center;
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
			padding: 5px;
			width: 60%;
			z-index: 2000;
		}
		
		.notes
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
		
		</style>
		<div class="AlertBox" hidden>
			<h3 align="left" style="margin-left: 10%;"> Alert </h3>
			<hr/>
			<p class="alertMessage"> </p>
		</div>
		<div id="members_finder">
			<table>
				<tr>
					<td> <span> First Name: </span> <input type="text" id="finder_fname" />   </td>
					<td> <span> Last Name: </span> <input type="text" id="finder_lname" /> </td>
					<td> <span> City: </span> <input type="text" id="finder_city" /> </td>
					
				</tr>
			</table>
			<br/>
			<div id="finder_footer">
				&emsp;
				<input id="finder_searchButton" class="edit_person" type="button" value="SEARCH" />
				&nbsp;
				<input id="finder_resetButton" class="cancelbutton" type="button" value="RESET" />
			</div>
		</div>
		<div id="members_content">
		</div>
		
		<div id="notes" class="notes" hidden>
			
			<div id="notes_content">
				
			</div><br/>
			
			<div id="mem_content">
				
			</div>
			
			<h4 class="errorNote" hidden>  </h4>

			<input id="update_member_notes" class="edit_person" type="button" style="width : auto" value="UPDATE COMMENTS" />

			<input id="cancel_person_notes" class="cancel_person" type="button" value="CANCEL" />

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
				
				<h4 class="errorNote2" hidden>  </h4>
			
				<input class="currentEdit_Userid" type="hidden" value=""/>
				&emsp;
				<input id="edit_person" class="edit_person" type="button" value="EDIT" />
				&nbsp;
				<input style="width: 180px;" id="send_credentials" class="button" type="button" value="Send credentials" />
				&nbsp;
				<input id="cancel_person" class="cancel_person" type="button" value="CANCEL" />
			</div>
		</div>
	</div>
<?php
	include "appTail.php";
?>