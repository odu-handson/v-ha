
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
	alert(q1 + " " +q2 + " " +q3 + " " +q4 + " " +q5 + " " +q6 + " " +q7 );
	
 
	if(q1 == undefined)
	{
	alert("Please answer question 1");
	}
	
	else if(q2 == undefined)
	{
	alert("Please answer question 2");
	}
	
	else if(q3 == undefined)
	{
	alert("Please answer question 3");
	}
	
	else if(q4 == undefined)
	{
	alert("Please answer question 4");
	}
	
	else if(q5 == undefined)
	{
	alert("Please answer question 5");
	}
	
	else if(q6 == undefined)
	{
	alert("Please answer question 6");
	}
	
	else if(q7 == undefined)
	{
	alert("Please answer question 7");
	}
	
	else
	{
		<?php session_start(); ?>
		var uid = '<?php echo $_SESSION["uid"];?>';
		
		alert(uid);
		 var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" ; 
		 
		 
		 var url="enterSurveyAnswers.php?uid="+uid+"&ans="+finalans+"&sid=3";
		 
		 window.open(url);
	 
	}
	
}
	
 
	</script>

<div id="form_wrapper">
<div id="headers">
<span class="main_heading">Insomnia Severity Index</span>
<span>The Insomnia Severity Index has seven questions.
    Please CIRCLE the number that best describes your answer to each question.
	When you finish answering the questions, add  your scores together  to produce a total score.
	Then, look at the “Guidelines for Scoring/Interpretation” section below to see where your sleep quality lies.</span>
</div>
</br>
<form onSubmit="return onEvaluate()" type="POST">
<div id="headers"><h3><u>INSOMNIA PROBLEM</u></h3></div>
<div class="ques"><h3>
1. Difficulty falling asleep. <br/><br/>
<input type="radio" name ="f4q1" id ="f4q1" value="op1"/>None <br />
<input type="radio" name ="f4q1" id ="f4q1" value="op2"/>Mild <br />
<input type="radio" name ="f4q1" id ="f4q1" value="op3"/>Moderate<br />
<input type="radio" name ="f4q1" id ="f4q1" value="op4"/>Severe <br />
<input type="radio" name ="f4q1" id ="f4q1" value="op5"/>Very Severe<br />
</h3></div>

<div class="ques"><h3>
2. Difficulty staying asleep. <br/><br/>
<input type="radio" name ="f4q2" id ="f4q2" value="op1"/>None <br />
<input type="radio" name ="f4q2" id ="f4q2" value="op2"/>Mild <br />
<input type="radio" name ="f4q2" id ="f4q2" value="op3"/>Moderate<br />
<input type="radio" name ="f4q2" id ="f4q2" value="op4"/>Severe <br />
<input type="radio" name ="f4q2" id ="f4q2" value="op5"/>Very Severe<br />
</h3></div>

<div class="ques"><h3>
3. Problems waking up too early. <br/><br/>
<input type="radio" name ="f4q3" id ="f4q3" value="op1"/>None <br />
<input type="radio" name ="f4q3" id ="f4q3" value="op2"/>Mild <br />
<input type="radio" name ="f4q3" id ="f4q3" value="op3"/>Moderate<br />
<input type="radio" name ="f4q3" id ="f4q3" value="op4"/>Severe <br />
<input type="radio" name ="f4q3" id ="f4q3" value="op5"/>Very Severe<br />
</h3></div>
</br>
<div id="headers"><h3><u>INSOMNIA IMPACT ON LIFE</u></h3></div>
<div class="ques"><h3>
4. How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern? <br/><br/>
<input type="radio" name ="f4q4" id ="f4q4" value="op1"/>None <br />
<input type="radio" name ="f4q4" id ="f4q4" value="op2"/>Mild <br />
<input type="radio" name ="f4q4" id ="f4q4" value="op3"/>Moderate<br />
<input type="radio" name ="f4q4" id ="f4q4" value="op4"/>Severe <br />
<input type="radio" name ="f4q4" id ="f4q4" value="op5"/>Very Severe<br />
</h3></div>

<div class="ques"><h3>
5. How NOTICEABLE to others do you think your sleep problem is in terms of impairing the quality of your life? <br/><br/>
<input type="radio" name ="f4q5" id ="f4q5" value="op1"/>None <br />
<input type="radio" name ="f4q5" id ="f4q5" value="op2"/>Mild <br />
<input type="radio" name ="f4q5" id ="f4q5" value="op3"/>Moderate<br />
<input type="radio" name ="f4q5" id ="f4q5" value="op4"/>Severe <br />
<input type="radio" name ="f4q5" id ="f4q5" value="op5"/>Very Severe<br />
</h3></div>

<div class="ques"><h3>
6. How WORRIED/DISTRESSED are you about your current sleep problem? <br/><br/>
<input type="radio" name ="f4q6" id ="f4q6" value="op1"/>None <br />
<input type="radio" name ="f4q6" id ="f4q6" value="op2"/>Mild <br />
<input type="radio" name ="f4q6" id ="f4q6" value="op3"/>Moderate<br />
<input type="radio" name ="f4q6" id ="f4q6" value="op4"/>Severe <br />
<input type="radio" name ="f4q6" id ="f4q6" value="op5"/>Very Severe<br />
</h3></div>


<div class="ques"><h3>
7. To what extent do you consider your sleep problem to INTERFERE with your daily functioning (e.g. daytime fatigue, mood, ability to function at work/daily chores, concentration, memory, mood, etc.) CURRENTLY? <br/><br/>
<input type="radio" name ="f4q7" id ="f4q7" value="op1"/>None <br />
<input type="radio" name ="f4q7" id ="f4q7" value="op2"/>Mild <br />
<input type="radio" name ="f4q7" id ="f4q7" value="op3"/>Moderate<br />
<input type="radio" name ="f4q7" id ="f4q7" value="op4"/>Severe <br />
<input type="radio" name ="f4q7" id ="f4q7" value="op5"/>Very Severe<br />
</h3></div>

<input type="submit" name = "" id="submit" value="submit" id="submit" />


</form>
</div>