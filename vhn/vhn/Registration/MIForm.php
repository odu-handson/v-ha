<script type="text/javascript">
$(function() 
{
	$("#micontent").hide();
	$("#cge1").hide();
	$("#sh1").hide();
	$("#cge2").hide();
	$("#sh2").hide();
	$("#caregiverExt1Other").hide();
	$("#caregiverExt2Other").hide();

	$("#caregiver").change( function() 
	{
		//alert($( "select#caregiver option:selected").val());
		if($( "select#caregiver option:selected").val() == 1)
		{
			$("#cge1").show();
			$("#sh1").show();
			$("#cge2").hide();
			$("#sh2").hide();
		}
		else if($( "select#caregiver option:selected").val() == 4)
		{
			$("#cge1").hide();
			$("#sh1").hide();
			$("#sh2").show();
			$("#cge2").show();
		}
		else
		{
			$("#cge1").hide();
			$("#sh1").hide();
			$("#cge2").hide();
			$("#sh2").hide();
		}
	});
	
	$("#caregiverExt1").change(function() {
		//alert($( "select#caregiverExt1 option:selected").val());
		if($( "select#caregiverExt1 option:selected").val() == "Other type of dementia")
		{
			$("#caregiverExt1Other").show();
		}
		else
		{
			$("#caregiverExt1Other").hide();
		}
	});
	
	$("#caregiverExt2").change(function() {
		if($( "select#caregiverExt2 option:selected").val() == "Other")
		{
			$("#caregiverExt2Other").show();
		}
		else
		{
			$("#caregiverExt2Other").hide();
		}
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
		/*
		if($("input:checkbox[name=interest1]:checked").val() == "")
		{
			alert("Please check an option for your interests in Virtual Reality studies!");
		}
		if($("#caregiver").val() == 0)
		{
			alert("Please selct an option for the field 'I am caregiver for'");
		}
		if($("#age").val() == 0)
		{
			alert("Please select the age of the person you are caring for !");
		}
		*/
		if(error == 0)
		{
			$(".errorNote").html(errorFields.substring(0,errorFields.length - 2)+" are mandatory!");
			$(".errorNote").show();
		}
		else
		{
			var interestvalues = $('input:checkbox:checked').map(function () {
						  return this.value;
						}).get();
			var careExt1="";
			var careExt2="";
			if($("#caregiver").val() == 1)
			{
				if($("#caregiverExt1").val() == "Other type of dementia")
					careExt1 = $("#caregiverExt1Other").val();
				else
					careExt1 = $("#caregiverExt1").val();
			}
			if($("#caregiver").val() == 4)
			{
				if($("#caregiverExt2").val() == "Other")
					careExt2 = $("#caregiverExt2Other").val();
				else
					careExt2 = $("#caregiverExt2").val();
			}
			
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
							// Actual call here
							$.ajax({
							  type: "POST",
							  url: "Registration/storeMIForm.php",
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
								'interest_for': interestvalues,
								'carefor': $("#caregiver").val(),
								'careext1': careExt1,
								'careext2': careExt2,
								'age': $("#age").val(),
								'caregender': $( "input:radio[name=gender]:checked" ).val(),
								'livewith': $( "input:radio[name=live-person]:checked" ).val(),
								'notes':$("#notes").val()
							  },
							  success: function (data1) {
									if(data1 == 1)
									{
										$(".alertMessage").html("<h4 style=\"color: green;\"> Thank you, we will contact you when a study is enrolling that may be of interest to you.</h4> <p style=\"color: green;\"> The Virtual Healthcare Neighborhood Research Consortium <br />Old Dominion University <br />Norfolk, VA </p>");
										$(".AlertBox").show();
										$(".errorNote").hide();

										setTimeout(function() {
											$(".AlertBox").hide();
										}, 7000);
										//alert("Thank you for your interest, we recieved your request. we will send you a mail after reviewing it!" + data);
										$("#moreInformationForm").trigger("reset");
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
								}
							}); 
						}
			
					}
			});
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
<div id="micontent">
	<div class="main_wrapper">
		<div id="content">
			<div id="welcometext" style=" text-align: center; margin-left: 10px;">
				<input type="button"  type="button" class="button" id="more_info_back" value="Back" />  At this moment this site is closed for further enrollment, but if you are interested in our future studies involving caregivers of adult and /or children with special needs, and Virtual Reality, <br /><br /><label style=" text-align: left;">Please complete the information requested below:</label>
			</div>
			<div id="miform_div" class="form_container">
				<form action="registration/storeMIForm.php" id="moreInformationForm" class="forms" method="POST">
					<h4 class="Note"> Note: Fields marked with * are mandatory </h4>
					<h4 class="errorNote" hidden>  </h4>
					<span class="sub_headings1"> General Information </span>
					<div id="general_info_box" class="formDivBox">
						<?php
							include "generalRegisterForm.php";
						?>
					</div>
					
					<span class="sub_headings1"> I am interested in Virtual Reality studies for: </span> 
					<div class="formDivBox">
						<label> <input type="checkbox" name="interest1" id="interest1" value="adults"> Adults </input> </label>
						<label> <input type="checkbox" name="interest1" id="interest2" value="children"> Children </input> </label>
						<label> <input type="checkbox" name="interest1" id="interest3" value="families"> Families </input> </label>
					</div>
					
					<span class="sub_headings1"> I am a caregiver for: </span> 
					<div class="formDivBox">
						<select name="caregiver" id="caregiver" >
							<option value="0"> Select an option </option>
							<option value="1" style="color:red;">A person with dementia - any type</option>
							<option value="2" > A person with Parkinson's Disease </option>
							<option value="3" > A person with ALS (Amyotrophic Lateral Sclerosis) </option>
							<option value="4" style="color:red;">Child with special needs</option>
							<option value="5" > Someone with a terminal illness </option>
							<option value="6" > Someone with a traumatic brain injury </option>
							<option value="7" > Someone living with mental illness </option>
						</select>
						
						<span id="sh1" class="sub_headings1"> Specify type if known: </span>
						<div id="cge1" class="formDivBox">
							<select id="caregiverExt1" name="caregiverExt1">
								<option> Alzheimer's </option> 
								<option> Picks Disease </option> 
								<option> Lewy Body Dementia </option> 
								<option> Vascular </option> 
								<option> Other type of dementia </option> 
							</select>
							<br />
							<input type="text" id="caregiverExt1Other" value="" placeholder="please specify other" />
						</div>
						
						<span id="sh2" class="sub_headings1"> Type of need: </span>
						<div id="cge2" class="formDivBox">
							<select id="caregiverExt2" name="caregiverExt2">
								<option> Cerebral Palsy </option>
								<option> Down's syndrome </option>
								<option> Spina Bifida </option>
								<option> Brain Injury </option>
								<option> Muscular Dystrophy </option>
								<option> Intellectual Disability </option>
								<option> Other </option>
							</select>
							<br />
							<input type="text" id="caregiverExt2Other" value="" placeholder="please specify other" />
						</div>
					</div>
					
					<span class="sub_headings1"> Age of the person you are caring for: </span> 
					<div class="formDivBox">
					<select id="age" name="age">
						<option value="0" > Select Age </option>
						<?php
							for($i=1; $i<100; $i++)
								echo '<option value="'.$i.'" >'.$i.'</option>';
						?>
					</select>
					</div>
					
					<span class="sub_headings1"> Gender of the person you are caring for: </span> 
					<div class="formDivBox">
						<label> <input type="radio" name="gender" checked value="male"> Male </input> </label>
						<label> <input type="radio" name="gender" value="female"> Female </input> </label>
					</div>
					
					<span class="sub_headings1"> Do you live with the person: </span>
					<div class="formDivBox">
						<label> <input type="radio" name="live-person" checked value="yes"> Yes </input> </label>
						<label> <input type="radio" name="live-person" value="no"> No </input> </label>
					</div>
					<span class="sub_headings1"> Notes: </span>
					<textarea name="notes" id="notes" cols="40" rows="4" > </textarea>
					<br/>
					<input id="submit_request" class="button" style="margin-right: 5%;" type="button" value="Submit" />
				</form>
			</div>
		</div>
	</div>
</div>