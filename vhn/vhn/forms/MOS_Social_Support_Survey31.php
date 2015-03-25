
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
	var t1 = document.getElementsByName('f6q1');
	var q1 = radioEvaluate1(t1);
	var t2 = document.getElementsByName('f6q2');
	var q2 = radioEvaluate1(t2);
	var t3 = document.getElementsByName('f6q3');
	var q3 = radioEvaluate1(t3);
	var t4 = document.getElementsByName('f6q4');
	var q4 = radioEvaluate1(t4);
	var t5 = document.getElementsByName('f6q5');
	var q5 = radioEvaluate1(t5);
	var t6 = document.getElementsByName('f6q6');
	var q6 = radioEvaluate1(t6);
	var t7 = document.getElementsByName('f6q7');
	var q7 = radioEvaluate1(t7);
	var t8 = document.getElementsByName('f6q8');
	var q8 = radioEvaluate1(t8);
	var t9 = document.getElementsByName('f6q9');
	var q9 = radioEvaluate1(t9);
	var t10 = document.getElementsByName('f6q10');
	var q10 = radioEvaluate1(t10);
	var t11 = document.getElementsByName('f6q11');
	var q11 = radioEvaluate1(t11);
	var t12 = document.getElementsByName('f6q12');
	var q12 = radioEvaluate1(t12);
	var t13 = document.getElementsByName('f6q13');
	var q13 = radioEvaluate1(t13);
	var t14 = document.getElementsByName('f6q14');
	var q14 = radioEvaluate1(t14);
	var t15 = document.getElementsByName('f6q15');
	var q15 = radioEvaluate1(t15);
	var t16 = document.getElementsByName('f6q16');
	var q16 = radioEvaluate1(t16);
	var t17 = document.getElementsByName('f6q17');
	var q17 = radioEvaluate1(t17);
	var t18 = document.getElementsByName('f6q18');
	var q18 = radioEvaluate1(t18);
	
	

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
	
	if(q7 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 7, ";
	}
	
	if(q8 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 8, ";
	}
	if(q9 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 9, ";
	}
	
	if(q10 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 10, ";
	}
	
	if(q11 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 11, ";
	}
	
	if(q12 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 12, ";
	}
	
	if(q13 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 13, ";
	}
	
	if(q14 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 14, ";
	}
	
	if(q15 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 15, ";
	}
	
	if(q16 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 16, ";
	}
	
	if(q17 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 17, ";
	}
	
	if(q18 == undefined)
	{
	error = 0;
				errorFields = errorFields+" question 18, ";
	}
	
		
	if(error == 0)
			{	
			
			x=confirmSubmit(errorFields.substring(0,errorFields.length - 2)+" are not answered! \n Click Ok if you still wish to submit.");
			
				if(x==1)
				{
					var uid='<?php echo $_SESSION["uid"];?>';    
					var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" + q8 + ";" + q9 + ";" + q10 + ";" + q11 + ";" + q12 + ";" + q13+ ";" + q14 + ";" + q15 + ";" + q16 + ";" + q17 + ";" + q18 + ";"; 
					finalans = encodeURIComponent(finalans);

					var url="forms/enterSurveyAnswers.php?uid=" + uid + "&ans=" + finalans + "&sid=5";
					window.location=url;			
				}
			
			
			}
	
	else
	{ 
		
		var uid = '<?php echo $_SESSION["uid"];?>';
		
		var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" + q8 + ";" + q9 + ";" + q10 + ";" + q11 + ";" + q12 + ";" + q13+ ";" + q14 + ";" + q15 + ";" + q16 + ";" + q17 + ";" + q18 + ";"; 
		finalans = encodeURIComponent(finalans);
		
		var url="forms/enterSurveyAnswers.php?uid="+uid+"&ans="+finalans+"&sid=5"; 
		
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
	
		<div class="AlertBox" hidden>
		<h3 align="left" style="margin-left: 10%;"> Alert </h3>
		<hr/>
		<p class="alertMessage"> </p>
	</div>
	
	
<div id="form_wrapper">
<div id="headers">
<span class="main_heading"> MOS Social Support Survey </span>
<span> People sometimes look to others for companionship, assistance, or other support.  Please circle one number on each line to indicate how often each of the following kinds of support are available to you. </span>
</div>

<div id="headers"><h2><u>Emotional/Informational Support </u></h2></div>

<form onSubmit="return onEvaluate()" type="POST">

<div class="ques">
 <span>1. Someone you can count on to listen to you when you need to talk </span>
<label><input type="radio" name ="f6q1" id ="f6q1" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q1" id ="f6q1" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q1" id ="f6q1" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q1" id ="f6q1" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q1" id ="f6q1" value="op5"/>All of the time </label>
</div>

<div class="ques">
 <span>2. Someone to give you information to help you understand a situation</span>
<label><input type="radio" name ="f6q2" id ="f6q1" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q2" id ="f6q1" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q2" id ="f6q1" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q2" id ="f6q1" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q2" id ="f6q1" value="op5"/>All of the time </label>
</div>

<div class="ques">
 <span>3. Someone to give you good advice about a crisis. </span>
<label><input type="radio" name ="f6q3" id ="f6q1" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q3" id ="f6q1" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q3" id ="f6q1" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q3" id ="f6q1" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q3" id ="f6q1" value="op5"/>All of the time </label>
</div>

<div class="ques">
 <span>4. Someone to confide in or talk to about yourself or your problems </span>
<label><input type="radio" name ="f6q4" id ="f6q4" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q4" id ="f6q4" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q4" id ="f6q4" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q4" id ="f6q4" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q4" id ="f6q4" value="op5"/>All of the time </label>
</div>

<div class="ques">
 <span>5. Someone whose advice you really want </span>
<label><input type="radio" name ="f6q5" id ="f6q5" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q5" id ="f6q5" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q5" id ="f6q5" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q5" id ="f6q5" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q5" id ="f6q5" value="op5"/>All of the time </label>
</div>

<div class="ques">
 <span>6. Someone to share your most private worries and fears with </span>
<label><input type="radio" name ="f6q6" id ="f6q6" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q6" id ="f6q6" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q6" id ="f6q6" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q6" id ="f6q6" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q6" id ="f6q6" value="op5"/>All of the time </label>

</div>


<div class="ques">
 <span>7. Someone to turn to for suggestions about how to deal with a personal problem </span>
<label><input type="radio" name ="f6q7" id ="f6q7" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q7" id ="f6q7" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q7" id ="f6q7" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q7" id ="f6q7" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q7" id ="f6q7" value="op5"/>All of the time </label>
</div>


<div class="ques">
 <span>8. Someone who understands your problems. </span>
<label><input type="radio" name ="f6q8" id ="f6q8" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q8" id ="f6q8" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q8" id ="f6q8" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q8" id ="f6q8" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q8" id ="f6q8" value="op5"/>All of the time </label>
</div>

<div id="headers"><h2><u> TANGIBLE SUPPORT </u></h2></div>

<div class="ques">
 <span>9. Someone to help you if you were confined to bed </span>
<label><input type="radio" name ="f6q9" id ="f6q9" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q9" id ="f6q9" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q9" id ="f6q9" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q9" id ="f6q9" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q9" id ="f6q9" value="op5"/>All of the time </label>
</div>

<div class="ques">
 <span>10. Someone to take you to the doctor if you needed it </span>
<label><input type="radio" name ="f6q10" id ="f6q10" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q10" id ="f6q10" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q10" id ="f6q10" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q10" id ="f6q10" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q10" id ="f6q10" value="op5"/>All of the time </label>

</div>


<div class="ques">
 <span>11. Someone to prepare your meals if you were unable to do it yourself </span>
<label><input type="radio" name ="f6q11" id ="f6q11" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q11" id ="f6q11" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q11" id ="f6q11" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q11" id ="f6q11" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q11" id ="f6q11" value="op5"/>All of the time </label>
</div>


<div class="ques">
 <span>12. Someone to help you with daily chores if you were sick. </span>
<label><input type="radio" name ="f6q12" id ="f6q12" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q12" id ="f6q12" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q12" id ="f6q12" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q12" id ="f6q12" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q12" id ="f6q12" value="op5"/>All of the time </label>
</div>

<div id="headers"><h2><u> AFFECTIONATE SUPPORT </u></h2></div>

<div class="ques">
 <span>13. Someone who shows you love and affection </span>
<label><input type="radio" name ="f6q13" id ="f6q13" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q13" id ="f6q13" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q13" id ="f6q13" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q13" id ="f6q13" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q13" id ="f6q13" value="op5"/>All of the time </label>
</div>

<div class="ques">
 <span>14. Someone to love and make you feel wanted </span>
<label><input type="radio" name ="f6q14" id ="f6q14" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q14" id ="f6q14" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q14" id ="f6q14" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q14" id ="f6q14" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q14" id ="f6q14" value="op5"/>All of the time </label>
</div>

<div class="ques">
 <span>15. Someone who hugs you </span>
<label><input type="radio" name ="f6q15" id ="f6q15" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q15" id ="f6q15" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q15" id ="f6q15" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q15" id ="f6q15" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q15" id ="f6q15" value="op5"/>All of the time </label>
</div>

<div id="headers"><h2><u> Positive Social Interaction </u></h2></div>

<div class="ques">
 <span>16. Someone to have a good time with </span>
<label><input type="radio" name ="f6q16" id ="f6q16" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q16" id ="f6q16" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q16" id ="f6q16" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q16" id ="f6q16" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q16" id ="f6q16" value="op5"/>All of the time </label>

</div>


<div class="ques">
 <span>17. Someone to get together with for relaxation </span>
<label><input type="radio" name ="f6q17" id ="f6q17" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q17" id ="f6q17" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q17" id ="f6q17" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q17" id ="f6q17" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q17" id ="f6q17" value="op5"/>All of the time </label>
</div>


<div class="ques">
 <span>18. Someone to do something enjoyable with </span>
<label><input type="radio" name ="f6q18" id ="f6q18" value="op1"/>None of the time </label>
<label><input type="radio" name ="f6q18" id ="f6q18" value="op2"/>A little of the time</label>
<label><input type="radio" name ="f6q18" id ="f6q18" value="op3"/>Some of the time </label>
<label><input type="radio" name ="f6q18" id ="f6q18" value="op4"/>Most of the time </label>
<label><input type="radio" name ="f6q18" id ="f6q18" value="op5"/>All of the time </label>
</div>




<input style="margin-left: 50%;" type="button" class="button"  value="submit" id="submit" onclick="onEvaluate()"/>


</form>
