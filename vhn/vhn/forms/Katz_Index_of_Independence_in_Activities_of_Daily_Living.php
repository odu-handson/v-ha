
<!--<link rel="stylesheet" type="text/css" href="extra.css">-->
<link rel="stylesheet" type="text/css" href="css/surveyForms.css">
 
	<script>
	
	function radioEvaluate1(x)
 {
	for (var i = 0, length = x.length; i < length; i++) 
	{
		if (x[i].checked) 
		{
		return x[i].value;
		break;
		}
	}
 }
	
	
	function onEvaluate()
	{
	
	
		var error = 1;
		var errorFields = "";
	
	var t1 = document.getElementsByName('f5q1');
	var q1 = radioEvaluate1(t1);
	var t2 = document.getElementsByName('f5q2');
	var q2 = radioEvaluate1(t2);
	var t3 = document.getElementsByName('f5q3');
	var q3 = radioEvaluate1(t3);
	var t4 = document.getElementsByName('f5q4');
	var q4 = radioEvaluate1(t4);
	var t5 = document.getElementsByName('f5q5');
	var q5 = radioEvaluate1(t5);
	var t6 = document.getElementsByName('f5q6');
	var q6 = radioEvaluate1(t6);
	
	
	 if(q1 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 1, ";
	}
	
	if(q2 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 2, ";
	}
	
	if(q3 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 3, ";
	}
	
	if(q4 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 4, ";
	}
	
	if(q5 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 5, ";
	}
	
	if(q6 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 6, ";
	}
	
	if(error == 0)
			{	
			
			x=confirmSubmit(errorFields.substring(0,errorFields.length - 2)+" are not answered! \n Click Ok if you still wish to submit.");
			
				if(x==1)
				{
					var uid='<?php echo $_SESSION["uid"];?>';    
					var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";"; 
					finalans = encodeURIComponent(finalans);

					var url="forms/enterSurveyAnswers.php?uid=" + uid + "&ans=" + finalans + "&sid=4";
					window.location=url;			
				}
			
			
			
			
			}
	
	else
	{ 
		
		var uid = '<?php echo $_SESSION["uid"];?>';
		

		 var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";"; 
		 
		 
		 var url="forms/enterSurveyAnswers.php?uid="+uid+"&ans="+finalans+"&sid=4";
		 
		 
	 window.location=url;
	 
	}
}	

	function confirmSubmit(displayMsg)
	{
	
		//alert(displayMsg);
		/* $(".AlertBox2").show();
		$(".displayMsg").html(errorFields.substring(0,errorFields.length - 2)+" are mandatory!");
		$(".errorNote2").show(); */
		
		if(confirm(displayMsg))
		return 1;
		else 
		return 0;
		
		
	}
	
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
	
	
<div id="form_wrapper">
<div id="headers">
<span class="main_heading">Katz Index of Independence in Activities of Daily Living</span>
<h2></h2>
</div>
</br>
<form onSubmit="return onEvaluate()" type="POST">

<div class="ques"><span>

1. BATHING. </span>
<label><input type="radio" name ="f5q1" id ="f5q1" value="op1"/>Bathes self completely or needs help in bathing only a single part of the body such as the back, genital area or disabled extremity  </label>
<label><input type="radio" name ="f5q1" id ="f5q1" value="op2"/>Need help with bathing more than one part of the body, getting in or out of the tub or shower. Requires total bathing  </label>

</div>

<div class="ques"><span>
2. DRESSING. </span>
<label><input type="radio" name ="f5q2" id ="f5q2" value="op1"/>Get clothes from closets and drawers and puts on clothes and outer garments complete with fasteners. May have help tying shoes.  </label>
<label><input type="radio" name ="f5q2" id ="f5q2" value="op2"/>Needs help with dressing self or needs to be completely dressed. </label>

</div>

<div class="ques"><span>
3. TOILETING. </span>
<label><input type="radio" name ="f5q3" id ="f5q3" value="op1"/>Goes to toilet, gets on and off, arranges clothes, cleans genital area without help. </label> 
<label><input type="radio" name ="f5q3" id ="f5q3" value="op2"/>Needs help transferring to the toilet, cleaning self or uses bedpan or commode.  </label>

</div>


<div class="ques"><span>
4. TRANSFERRING. </span>
<label><input type="radio" name ="f5q4" id ="f5q4" value="op1"/>Moves in and out of bed or chair unassisted. Mechanical transfer aids are acceptable. </label>
<label><input type="radio" name ="f5q4" id ="f5q4" value="op2"/>Needs help in moving from bed to chair or requires a complete transfer.  </label>
</div>

<div class="ques"><span>
5. CONTINENCE. </span>
<label><input type="radio" name ="f5q5" id ="f5q5" value="op1"/>Exercises complete self control over urination and defecation. </label>
<label><input type="radio" name ="f5q5" id ="f5q5" value="op2"/>Is partially or totally incontinent of bowel or bladder </label>

</div>

<div class="ques"><span>
6. FEEDING. </span>
<label><input type="radio" name ="f5q6" id ="f5q6" value="op1"/>Gets food from plate into mouth without help. Preparation of food may be done by another person. </label>
<label><input type="radio" name ="f5q6" id ="f5q6" value="op2"/>Needs partial or total help with feeding or requires parenteral feeding. </label>

</div>


<input style="margin-left: 50%;" type="button" class="button" value="submit" id="submit" onclick="onEvaluate()"/>

</form>
</div>