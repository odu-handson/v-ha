<?php
	include "expire.php";
?>
<span class="mandatory"> First/Given Name* : </span> 
	<input class="mandatoryFields" type="text" name="fname" id="fname" />
<span class="mandatory"> Last Name* : </span> 
	<input class="mandatoryFields" type="text" name="lname" id="lname"/>
<span> Middle Name : </span> 
	<input class="mandatoryFields" type="text" name="mname" id="mname"/>
<span class="mandatory"> Address (street 1)* : </span> 
	<input class="mandatoryFields" type="text" name="street1" id="street1" />
<span> street 2 : </span> 
	<input type="text" name="street2" id="street2" /> 
<span class="mandatory"> City* : </span>
	<select class="mandatoryFields" name="city" id="city">
		<?php 
		$va_cities_list = array('select'=>"Select City", 'Alexandria'=>"Alexandria", 'Bristol'=>"Bristol", 'Buena Vista'=>"Buena Vista", 'Charlottesville'=>"Charlottesville", 'Chesapeake'=>"Chesapeake", 'Colonial Heights'=>"Colonial Heights", 'Covington'=>"Covington", 'Danville'=>"Danville", 'Emporia'=>"Emporia", 'Fairfax'=>"Fairfax", 'Falls Church'=>"Falls Church", 'Franklin'=>"Franklin", 'Fredericksburg'=>"Fredericksburg", 'Galax'=>"Galax", 'Hampton'=>"Hampton", 'Harrisonburg'=>"Harrisonburg", 'Hopewell'=>"Hopewell", 'Lexington'=>"Lexington", 'Lynchburg'=>"Lynchburg", 'Manassas'=>"Manassas", 'Manassas Park'=>"Manassas Park", 'Martinsville'=>"Martinsville", 'Newport News'=>"Newport News", 'Norfolk'=>"Norfolk", 'Norton'=>"Norton", 'Petersburg'=>"Petersburg", 'Poquoson'=>"Poquoson", 'Portsmouth'=>"Portsmouth", 'Radford'=>"Radford", 'Richmond'=>"Richmond", 'Roanoke'=>"Roanoke", 'Salem'=>"Salem", 'Staunton'=>"Staunton", 'Suffolk'=>"Suffolk", 'Virginia Beach'=>"Virginia Beach", 'Waynesboro'=>"Waynesboro", 'Williamsburg'=>"Williamsburg", 'Winchester'=>"Winchester");
			
			$city_keys = array_keys($va_cities_list);
			$city_values = array_values($va_cities_list);
			
			for($i=0; $i<count($va_cities_list); $i++)
			{
				echo '<option value="'.$city_keys[$i].'" >'.$city_values[$i].'</option>';
			}
		?>
	</select>
<span class="mandatory"> Zip* : </span> 
	<input class="mandatoryFields" type="text" name="zip" id="zip" maxlength="5" />
<span class="mandatory"> Home/Cell Phone* : </span> 
	<input class="mandatoryFields" type="text" name="homephone" id="homephone" />
<span> Other Phone : </span> 
	<input type="text" name="cellphone" id="cellphone" />
<span class="mandatory"> Email Address* : </span> 
	<input class="mandatoryFields" type="text" name="emailaddress" id="emailaddress"/>