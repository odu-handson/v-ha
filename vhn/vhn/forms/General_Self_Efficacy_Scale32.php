
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
	
	var t1 = document.getElementsByName('f3q1');
	var q1 = radioEvaluate1(t1);
	var t2 = document.getElementsByName('f3q2');
	var q2 = radioEvaluate1(t2);
	var t3 = document.getElementsByName('f3q3');
	var q3 = radioEvaluate1(t3);
	var t4 = document.getElementsByName('f3q4');
	var q4 = radioEvaluate1(t4);
	var t5 = document.getElementsByName('f3q5');
	var q5 = radioEvaluate1(t5);
	var t6 = document.getElementsByName('f3q6');
	var q6 = radioEvaluate1(t6);
	var t7 = document.getElementsByName('f3q7');
	var q7 = radioEvaluate1(t7);
	var t8 = document.getElementsByName('f3q8');
	var q8 = radioEvaluate1(t8);
	
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
	
	if(error == 0)
			{	
			
			x=confirmSubmit(errorFields.substring(0,errorFields.length - 2)+" are not answered! \n Click Ok if you still wish to submit.");
			
				if(x==1)
				{
					var uid='<?php echo $_SESSION["uid"];?>';    
					var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" + q8 + ";" ; 
					finalans = encodeURIComponent(finalans);
					var url="forms/enterSurveyAnswers.php?uid=" + uid + "&ans=" + finalans + "&sid=2";
					window.location=url;			
				}
			
			}
	
	else
	{
	 

	var uid = '<?php echo $_SESSION["uid"];?>';
	
	 var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" + q8 + ";" ; 
	 
	 
	 var url="forms/enterSurveyAnswers.php?uid="+uid+"&ans="+finalans+"&sid=2";
	 
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
<span class="main_heading">General Self Efficacy Scale</span>
<span>People sometimes are faced with challenges. How much do you agree or disagree with the following statements?  Please check one number on each line.</span>
</div>


<form onSubmit="return onEvaluate()" type="POST">

<div class="ques"><span>
1. I will be able to achieve most of the goals that I have set for myself. </span>
<label><input type="radio" name ="f3q1" id ="f3q1" value="op1"/>Strongly Disagree  </label>
<label><input type="radio" name ="f3q1" id ="f3q1" value="op2"/>Moderately Disagree </label>
<label><input type="radio" name ="f3q1" id ="f3q1" value="op3"/>Agree </label>
<label><input type="radio" name ="f3q1" id ="f3q1" value="op4"/>Moderately Agree</label>
<label><input type="radio" name ="f3q1" id ="f3q1" value="op5"/>Strongly Agree </label>
</div>

<div class="ques"><span>
2. When facing difficult tasks, I am certain that I will accomplish them. </span>
<label><input type="radio" name ="f3q2" id ="f3q2" value="op1"/>Strongly Disagree  </label>
<label><input type="radio" name ="f3q2" id ="f3q2" value="op2"/>Moderately Disagree </label>
<label><input type="radio" name ="f3q2" id ="f3q2" value="op3"/>Agree </label>
<label><input type="radio" name ="f3q2" id ="f3q2" value="op4"/>Moderately Agree</label>
<label><input type="radio" name ="f3q2" id ="f3q2" value="op5"/>Strongly Agree </label></div>

<div class="ques"><span>
3. In general, I think that I can obtain outcomes that are important to me. </span>
<label><input type="radio" name ="f3q3" id ="f3q3" value="op1"/>Strongly Disagree  </label>
<label><input type="radio" name ="f3q3" id ="f3q3" value="op2"/>Moderately Disagree </label>
<label><input type="radio" name ="f3q3" id ="f3q3" value="op3"/>Agree </label>
<label><input type="radio" name ="f3q3" id ="f3q3" value="op4"/>Moderately Agree</label>
<label><input type="radio" name ="f3q3" id ="f3q3" value="op5"/>Strongly Agree </label>
</div>

<div class="ques"><span>
4. I believe I can succeed at most any endeavor to which I set my mind. </span>
<label><input type="radio" name ="f3q4" id ="f3q4" value="op1"/>Strongly Disagree  </label>
<label><input type="radio" name ="f3q4" id ="f3q4" value="op2"/>Moderately Disagree </label>
<label><input type="radio" name ="f3q4" id ="f3q4" value="op3"/>Agree </label>
<label><input type="radio" name ="f3q4" id ="f3q4" value="op4"/>Moderately Agree</label>
<label><input type="radio" name ="f3q4" id ="f3q4" value="op5"/>Strongly Agree </label>
</div>

<div class="ques"><span>
5. I will be able to successfully overcome many challenges. </span>
<label><input type="radio" name ="f3q5" id ="f3q5" value="op1"/>Strongly Disagree  </label>
<label><input type="radio" name ="f3q5" id ="f3q5" value="op2"/>Moderately Disagree </label>
<label><input type="radio" name ="f3q5" id ="f3q5" value="op3"/>Agree </label>
<label><input type="radio" name ="f3q5" id ="f3q5" value="op4"/>Moderately Agree</label>
<label><input type="radio" name ="f3q5" id ="f3q5" value="op5"/>Strongly Agree </label>
</div>

<div class="ques"><span>
6. I am confident that I can perform effectively on many different tasks. </span>
<label><input type="radio" name ="f3q6" id ="f3q6" value="op1"/>Strongly Disagree  </label>
<label><input type="radio" name ="f3q6" id ="f3q6" value="op2"/>Moderately Disagree </label>
<label><input type="radio" name ="f3q6" id ="f3q6" value="op3"/>Agree </label>
<label><input type="radio" name ="f3q6" id ="f3q6" value="op4"/>Moderately Agree</label>
<label><input type="radio" name ="f3q6" id ="f3q6" value="op5"/>Strongly Agree </label>
</div>


<div class="ques"><span>
7. Compared to other people, I can do most tasks very well. </span>
<label><input type="radio" name ="f3q7" id ="f3q7" value="op1"/>Strongly Disagree  </label>
<label><input type="radio" name ="f3q7" id ="f3q7" value="op2"/>Moderately Disagree </label>
<label><input type="radio" name ="f3q7" id ="f3q7" value="op3"/>Agree </label>
<label><input type="radio" name ="f3q7" id ="f3q7" value="op4"/>Moderately Agree</label>
<label><input type="radio" name ="f3q7" id ="f3q7" value="op5"/>Strongly Agree </label>
</div>


<div class="ques"><span>
8. Even when things are tough, I can perform quite well. </span>
<label><input type="radio" name ="f3q8" id ="f3q8" value="op1"/>Strongly Disagree  </label>
<label><input type="radio" name ="f3q8" id ="f3q8" value="op2"/>Moderately Disagree </label>
<label><input type="radio" name ="f3q8" id ="f3q8" value="op3"/>Agree </label>
<label><input type="radio" name ="f3q8" id ="f3q8" value="op4"/>Moderately Agree</label>
<label><input type="radio" name ="f3q8" id ="f3q8" value="op5"/>Strongly Agree </label>
</div>



<input style="margin-left: 50%;" type="button" class="button"  value="submit" id="submit" onclick="onEvaluate()"/>



</form>
</div>