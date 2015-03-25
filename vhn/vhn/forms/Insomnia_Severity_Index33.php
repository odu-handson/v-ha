
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

	var t1 = document.getElementsByName('f4q1');
	var q1 = radioEvaluate1(t1);
	var t2 = document.getElementsByName('f4q2');
	var q2 = radioEvaluate1(t2);
	var t3 = document.getElementsByName('f4q3');
	var q3 = radioEvaluate1(t3);
	var t4 = document.getElementsByName('f4q4');
	var q4 = radioEvaluate1(t4);
	var t5 = document.getElementsByName('f4q5');
	var q5 = radioEvaluate1(t5);
	var t6 = document.getElementsByName('f4q6');
	var q6 = radioEvaluate1(t6);
	var t7 = document.getElementsByName('f4q7');
	var q7 = radioEvaluate1(t7);
	

	if(q1 == undefined)
	{
	error = 0;
				errorFields = errorFields+"  question 1, ";
	}
	
	 if(q2 == undefined)
	{
	error = 0;
				errorFields = errorFields+"  question 2, ";
	}
	
	 if(q3 == undefined)
	{
	error = 0;
				errorFields = errorFields+"  question 3, ";
	}
	
	 if(q4 == undefined)
	{
	error = 0;
				errorFields = errorFields+"  question 4, ";
	}
	
	 if(q5 == undefined)
	{
	error = 0;
				errorFields = errorFields+"  question 5, ";
	}
	
	 if(q6 == undefined)
	{
	error = 0;
				errorFields = errorFields+"  question 6, ";
	}
	
	 if(q7 == undefined)
	{
	error = 0;
				errorFields = errorFields+"  question 7, ";
	}
	
		if(error == 0)
			{	
				
				x=confirmSubmit(errorFields.substring(0,errorFields.length - 2)+" are not answered! \n Click Ok if you still wish to submit.");
			
				if(x==1)
				{
					var uid='<?php echo $_SESSION["uid"];?>';    
					var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" ; 
					finalans = encodeURIComponent(finalans);

					var url="forms/enterSurveyAnswers.php?uid=" + uid + "&ans=" + finalans + "&sid=3";
					window.location=url;			
				}
				

			}
	
	else
	{ 
		
		var uid = '<?php echo $_SESSION["uid"];?>';
		
	
		 var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" ; 
		 
		 
		 var url="forms/enterSurveyAnswers.php?uid="+uid+"&ans="+finalans+"&sid=3";
		 
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
<span class="main_heading">Insomnia Severity Index</span>
<span>The Insomnia Severity Index has seven questions.
    Please CIRCLE the number that best describes your answer to each question.
	When you finish answering the questions, add  your scores together  to produce a total score.
	Then, look at the "Guidelines for Scoring/Interpretation" section below to see where your sleep quality lies.</span>
</div>
</br>
<form onSubmit="return onEvaluate()" type="POST">
<div id="headers"><h3><u>INSOMNIA PROBLEM</u></h3></div>
<div class="ques">
<span>1.Difficulty falling asleep. </span> 
<label><input type="radio" name ="f4q1" id ="f4q1" value="op1"/>None </label> 
<label><input type="radio" name ="f4q1" id ="f4q1" value="op2"/>Mild </label> 
<label><input type="radio" name ="f4q1" id ="f4q1" value="op3"/>Moderate</label> 
<label><input type="radio" name ="f4q1" id ="f4q1" value="op4"/>Severe </label> 
<label><input type="radio" name ="f4q1" id ="f4q1" value="op5"/>Very Severe</label> 
</div>

<div class="ques">
    <span>2.Difficulty staying asleep. </span>
<label><input type="radio" name ="f4q2" id ="f4q2" value="op1"/>None </label>
<label><input type="radio" name ="f4q2" id ="f4q2" value="op2"/>Mild </label>
<label><input type="radio" name ="f4q2" id ="f4q2" value="op3"/>Moderate</label>
<label><input type="radio" name ="f4q2" id ="f4q2" value="op4"/>Severe </label>
<label><input type="radio" name ="f4q2" id ="f4q2" value="op5"/>Very Severe</label>
</div>

<div class="ques">
 <span>3.Problems waking up too early.  </span>
<label><input type="radio" name ="f4q3" id ="f4q3" value="op1"/>None </label> 
<label><input type="radio" name ="f4q3" id ="f4q3" value="op2"/>Mild </label> 
<label><input type="radio" name ="f4q3" id ="f4q3" value="op3"/>Moderate</label> 
<label><input type="radio" name ="f4q3" id ="f4q3" value="op4"/>Severe</label> 
<label><input type="radio" name ="f4q3" id ="f4q3" value="op5"/>Very Severe</label> 
</div>
</br>
<div id="headers"><h3><u>INSOMNIA IMPACT ON LIFE</u></div>
<div class="ques">
 <span>4.How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern?  </span>
<label><input type="radio" name ="f4q4" id ="f4q4" value="op1"/>None</label> 
<label><input type="radio" name ="f4q4" id ="f4q4" value="op2"/>Mild </label> 
<label><input type="radio" name ="f4q4" id ="f4q4" value="op3"/>Moderate</label> 
<label><input type="radio" name ="f4q4" id ="f4q4" value="op4"/>Severe</label> 
<label><input type="radio" name ="f4q4" id ="f4q4" value="op5"/>Very Severe</label> 

<div class="ques">
 <span>5.How NOTICEABLE to others do you think your sleep problem is in terms of impairing the quality of your life?  </span>
<label><input type="radio" name ="f4q5" id ="f4q5" value="op1"/>None</label> 
<label><input type="radio" name ="f4q5" id ="f4q5" value="op2"/>Mild </label> 
<label><input type="radio" name ="f4q5" id ="f4q5" value="op3"/>Moderate</label> 
<label><input type="radio" name ="f4q5" id ="f4q5" value="op4"/>Severe </label> 
<label><input type="radio" name ="f4q5" id ="f4q5" value="op5"/>Very Severe</label> 
</div>

<div class="ques">
 <span>6.How WORRIED/DISTRESSED are you about your current sleep problem?  </span>
<label><input type="radio" name ="f4q6" id ="f4q6" value="op1"/>None</label> 
<label><input type="radio" name ="f4q6" id ="f4q6" value="op2"/>Mild </label> 
<label><input type="radio" name ="f4q6" id ="f4q6" value="op3"/>Moderate</label> 
<label><input type="radio" name ="f4q6" id ="f4q6" value="op4"/>Severe </label> 
<label><input type="radio" name ="f4q6" id ="f4q6" value="op5"/>Very Severe</label> 
</div>


<div class="ques">
 <span>7. To what extent do you consider your sleep problem to INTERFERE with your daily functioning (e.g. daytime fatigue, mood, ability to function at work/daily chores, concentration, memory, mood, etc.) CURRENTLY?  </span>
<label><input type="radio" name ="f4q7" id ="f4q7" value="op1"/>None </label> 
<label><input type="radio" name ="f4q7" id ="f4q7" value="op2"/>Mild </label> 
<label><input type="radio" name ="f4q7" id ="f4q7" value="op3"/>Moderate</label> 
<label><input type="radio" name ="f4q7" id ="f4q7" value="op4"/>Severe</label> 
<label><input type="radio" name ="f4q7" id ="f4q7" value="op5"/>Very Severe</label> 
</div>
<input style="margin-left: 50%;" type="button" class="button"  value="submit" id="submit" onclick="onEvaluate()"/>

</form>
</div>