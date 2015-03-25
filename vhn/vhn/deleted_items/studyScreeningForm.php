<?php include "appHead.php"; ?>
	<style>
	
	</style>
	<div class="main_wrapper">
		<div class="form_container">
			<span id="form_title"> Study Screening Form </span>
			<form id="studyScreenForm" class="forms" action="#" method="POST" >
				
				<span class="sub_headings1"> Contact Information </span>
				<div id="contact_container">
					<!--<span class="headings"> Contact Information </span>-->
					<span>
						First/Given Name: <input type="text" name="fname" />
					</span>
					<span>
						Last Name: <input type="text" name="lname" />
					</span>
					<span>
						Middle Name: <input type="text" name="mname" />
					</span>
					<span>
						Address (street 1): <input type="text" name="street1" />
					</span>
					<span>
						street 2: <input type="text" name="street2" />
					</span>
					<span>
						City: <input type="text" name="city" />
					</span>
					<span>
						State: <input type="text" name="state" />
					</span>
					<span>
						Zip: <input type="text" name="zip" />
					</span>
					<span>
						Home Phone: <input type="text" name="home phone" />
					</span>
					<span>
						CELL Phone: <input type="text" name="cell phone" />
					</span>
					<span>
						Email Address: <input type="text" name="email address" />
					</span>
				</div>
				
				<fieldset id="inclusion_container">	
					<legend> Study Inclusion Criteria </legend>
					<!--<span class="headings"> Study Inclusion Criteria </span>-->
					<span>
						Unpaid caregiver for a person with dementia: 
						<input type="radio" name="Caregiver" value="yes"> YES </input> 
						<input type="radio" name="Caregiver" value="male"> NO </input>
					</span>
					<span>
						Computer Access: 
						<input type="radio" name="Access" value="yes"> YES </input>
						<input type="radio" name="Access" value="male"> NO </input>
					</span>
					<span>
						Internet Access:
						<input type="radio" name="Internet" value="yes"> YES </input>
						<input type="radio" name="Internet" value="male"> NO </input>
					</span>
					<span>
						Proficient in English:
						<input type="radio" name="English" value="yes"> YES </input>
						<input type="radio" name="English" value="male"> NO </input>
					</span>
					<span>
						Qualifies for Study:
						<input type="radio" name="Study" value="yes"> YES </input>
						<input type="radio" name="Study" value="male"> NO </input>
					</span>
				</fieldset>	
				
				<fieldset id="payment_container">
					<legend> Payment for Participation Received </legend>
					<!--<span class="headings"> Payment for Participation Received </span>-->
					<span class="sub_headings"> Home visit 1 Receipt $50 </span>
					<span> 
						NAME: <input type="text" name="firstname"> DATE: <input type="text" name="date">
					</span>	
					<div id="signature1" class="signature" >Signature 1</div>
					<span>
						WITNESS: 
						<select name="witness">
							<option value="" selected></option>
							<option value="fowler">Christianne Fowler</option>
							<option value="meg">Meg Lemaster</option>
						</select>
						DATE: <input type="text" name="date">
					</span>
					<div id="signature2" class="signature" > Signature 2</div>
					<span class="sub_headings"> Home visit 2 Receipt $50</span>
					<span> 
						NAME: <input type="text" name="firstname"> DATE: <input type="text" name="date">
					</span>
					<div id="signature3" class="signature" >Signature 3</div>				
					<span>
						WITNESS: 
						<select name="witness">
							<option value="" selected></option>
							<option value="fowler">Christianne Fowler</option>
							<option value="meg">Meg Lemaster</option>
						</select>
						DATE: <input type="text" name="date">
					</span>
					<div id="signature4" class="signature" >Signature 4</div>
				</fieldset>	
				<br />
				<input type="submit" value="Submit" />
				<input type="button" value="Reset" />
			</form>
		</div>
	</div>
<?php include "appTail.php"; ?>