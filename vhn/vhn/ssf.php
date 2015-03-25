<?php 
	include "appHead.php"; 
	include "expire.php";
	include "loginStatus.php";
	/* if(!isset($_SESSION['login_status']))
		header("location: index.php"); */
?>

<script type="text/javascript">
	
	$(function() 
	{
		//$(".successNote").hide();
		function updateQualifyStatus()
		{
			if(($( "input:radio[name=English]:checked" ).val() == 0) || ($( "input:radio[name=Internet]:checked" ).val() == 0) || ($( "input:radio[name=Caregiver]:checked" ).val() == 0))
			{
				$("#qualifies").html("Qualifies for Study: No");
				$("#qualifyStudy").val(0);
			}
			else
			{
				$("#qualifyStudy").val(1);
				$("#qualifies").html("Qualifies for Study: Yes");
			}
		}
		
		$("#reset_form").click(function() {
			$("#studyScreenForm").trigger("reset");
			$(".mandatoryFields").removeClass("error");
			$(".errorNote").hide();
		});
		
		$(".English").click(function() {
			updateQualifyStatus();
		});
		
		$(".Internet").click(function() {
			updateQualifyStatus();
		});
		
		$(".Caregiver").click(function() {
			updateQualifyStatus();
		});
		
		$("#submit_request").click( function() {
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
				$.ajax({
					url: "checkEmail.php?email="+$("#emailaddress").val(),
					async: false,
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
						{
							$.ajax({
							  type: "POST",
							  url: "SaveSSF.php",
							  data: {
								'fn': $("#fname").val(),
								'ln': $("#lname").val(),
								'mn': $("#mname").val(),
								'st1': $("#street1").val(),
								'st2': $("#street2").val(),
								'city': $("#city").val(),
								'zip': $("#zip").val(),
								'email': $("#emailaddress").val(),
								'homeph': $("#homephone").val(),
								'cellph': $("#cellphone").val(),
								'dementia': $( "input:radio[name=Caregiver]:checked" ).val(),
								'internet': $( "input:radio[name=Internet]:checked" ).val(),
								'english': $( "input:radio[name=English]:checked" ).val(),
								'notes':$("#notes").val(),
								'study': $("#qualifyStudy").val()
							  },
							  success: function (data) {
									if(data == 1)
									{
										$(".alertMessage").html("<h4 style=\"color: green;\"> Registration Success </h4>");
										$(".AlertBox").show();
										$(".errorNote").hide();

										setTimeout(function() {
											$(".AlertBox").hide();
										}, 4000);
										//alert("Thank you for your interest, we recieved your request. we will send you a mail after reviewing it!" + data);
										$("#studyScreenForm").trigger("reset");
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
			
				//$(".successNote").show();
				//$(".successNote").hide().delay(3000);
				
				
				
			}
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
	<div class="AlertBox" hidden>
		<h3 align="left" style="margin-left: 10%;"> Alert </h3>
		<hr/>
		<p class="alertMessage"> </p>
	</div>
	<span class="page_title"> Study Screening Form </span>
	<div id="main_wrapper">
		<div id="ssForm_div" class="form_container">
			<form id="studyScreenForm" class="forms" action="#" method="POST" >
				<h4 class="Note"> Note: Fields marked with * are mandatory </h4>
				<h4 class="errorNote" hidden>  </h4>
				<span class="sub_headings1"> Contact Information </span>
				<div id="contact_container" class="formDivBox">
					<?php
						include "generalRegisterForm.php";
					?>
				</div>
				
				<span class="sub_headings1"> Study Inclusion Criteria </span>
				<div id="inclusion_container" class="formDivBox">
					<span class="sub_headings1"> Unpaid caregiver for a person with dementia: </span>
					<div id="inclusion_container" class="formDivBox">
						<label> <input type="radio" class="Caregiver" name="Caregiver" checked value="1"> YES </input> </label>
						<label> <input type="radio" class="Caregiver" name="Caregiver" value="0"> NO </input> </label>
					</div>
					<span class="sub_headings1"> Internet Access: </span>
					<div id="inclusion_container" class="formDivBox">
						<label> <input type="radio" class="Internet" name="Internet" checked  value="1"> YES </input> </label>
						<label> <input type="radio" class="Internet" name="Internet" value="0"> NO </input> </label>
					</div>
					<span class="sub_headings1"> Proficient in English: </span>
					<div id="inclusion_container" class="formDivBox">
						<label> <input type="radio" class="English" name="English" checked value="1"> YES </input> </label>
						<label> <input type="radio" class="English" name="English" value="0"> NO </input> </label>
					</div>

					<div id="inclusion_container" class="formDivBox">
									<span class="sub_headings1"> Notes : </span>
									<textarea name="notes" id="notes" cols="40" rows="4"></textarea>
					</div>
					<input hidden id="qualifyStudy" value="1" />

				</div>
				<span id="qualifies" class="sub_headings1"> Qualifies for Study: Yes</span>
				<br />
				
				<input class="button" id="submit_request" style="margin-right: 5%;" type="button" value="SUBMIT" />
				<input type="button" class="button" id="reset_form" value="RESET" />
			</form>
		</div>
	</div>
<?php include "appTail.php"; ?>