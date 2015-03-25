<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" type="text/css" href="extra.css">
 
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
	var t1 = document.getElementsByName('f8q1');
	var q1 = radioEvaluate1(t1);
	var t2 = document.getElementsByName('f8q2');
	var q2 = radioEvaluate1(t2);
	var t3 = document.getElementsByName('f8q3');
	var q3 = radioEvaluate1(t3);
	var t4 = document.getElementsByName('f8q4');
	var q4 = radioEvaluate1(t4);
	var t5 = document.getElementsByName('f8q5');
	var q5 = radioEvaluate1(t5);
	var t6 = document.getElementsByName('f8q6');
	var q6 = radioEvaluate1(t6);
	var t7 = document.getElementsByName('f8q7');
	var q7 = radioEvaluate1(t7);
	var t8 = document.getElementsByName('f8q8');
	var q8 = radioEvaluate1(t8);
	var t9 = document.getElementsByName('f8q9');
	var q9 = radioEvaluate1(t9);
	var t10 = document.getElementsByName('f8q10');
	var q10 = radioEvaluate1(t10);
	var t11 = document.getElementsByName('f8q11');
	var q11 = radioEvaluate1(t11);
	
	
	
	alert(q1 + " " +q2 + " " +q3 + " " +q4 + " " +q5 + " " +q6 + " " +q7 + " " +q8 + " " +q9+ " " +q10+ " " +q11);

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
	
	if(q8 == undefined)
	{
	alert("Please answer question 8");
	}
	
	else if(q9 == undefined)
	{
	alert("Please answer question 9");
	}
	
	else if(q10 == undefined)
	{
	alert("Please answer question 10");
	}
	
	else if(q11 == undefined)
	{
	alert("Please answer question 11");
	}
	
	else
	{
		<?php session_start(); ?>
		var uid = '<?php echo $_SESSION["uid"];?>';
		
		alert(uid);
		 var finalans =  q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" + q8 + ";" + q9 + ";" + q10 + ";" + q11 + ";"; 
		 
		 
		 var url="enterSurveyAnswers.php?uid="+uid+"&ans="+finalans+"&sid=6";
		 
		 window.open(url);
	 
	}

	}
 
	</script>
 
 
 
 
 </head>
<body id="body-background">

<div id="wrapper">
<div id="headers">
<h1>AGITATION/AGGRESSION </h1>
</div>


<form onSubmit="return onEvaluate()" type="POST">

<div class="ques"><h3>
1. Does the patient have periods when he/she refuses to cooperate or won’t let people help him/her? Is he/she hard to handle? <br/><br/>
<input type="radio" name ="f8q1" id ="f8q1" value="op1"/>Yes (if yes, please proceed to subquestions) <br />
<input type="radio" name ="f8q1" id ="f8q1" value="op2"/>No (if no, please proceed to next screening question) <br />
<input type="radio" name ="f8q1" id ="f8q1" value="op3"/> N/A <br /><br/>

</h3></div>

<div class="ques"><h3>
2. Does the patient get upset with those trying to care for him/her or resist activities such
as bathing or changing clothes?
<br/><br/>
<input type="radio" name ="f8q2" id ="f8q1" value="op1"/>Yes <br />
<input type="radio" name ="f8q2" id ="f8q1" value="op2"/>No<br />

</h3></div>

<div class="ques"><h3>
3. Is the patient stubborn, having to have things his/her way? <br/><br/>
<input type="radio" name ="f8q3" id ="f8q1" value="op1"/>Yes <br />
<input type="radio" name ="f8q3" id ="f8q1" value="op2"/>No<br />

</h3></div>

<div class="ques"><h3>
4. Does the patient have any other behaviors that make him/her hard to handle?  <br/><br/>
<input type="radio" name ="f8q4" id ="f8q4" value="op1"/>Yes <br />
<input type="radio" name ="f8q4" id ="f8q4" value="op2"/>No <br />

</h3></div>

<div class="ques"><h3>
5. Does the patient shout or curse angrily? <br/><br/>
<input type="radio" name ="f8q5" id ="f8q5" value="op1"/>Yes <br />
<input type="radio" name ="f8q5" id ="f8q5" value="op2"/>No<br />

</h3></div>

<div class="ques"><h3>
6. Does the patient slam doors, kick furniture, throw things?<br/><br/>
<input type="radio" name ="f8q6" id ="f8q6" value="op1"/>Yes <br />
<input type="radio" name ="f8q6" id ="f8q6" value="op2"/>No<br />


</h3></div>


<div class="ques"><h3>
7. Does the patient attempt to hurt or hit others?  <br/><br/>
<input type="radio" name ="f8q7" id ="f8q7" value="op1"/>Yes <br />
<input type="radio" name ="f8q7" id ="f8q7" value="op2"/>No<br />
</h3></div>


<div class="ques"><h3>
8. Does the patient have any other aggressive or agitated behaviors? <br/><br/>
<input type="radio" name ="f8q8" id ="f8q8" value="op1"/>Yes <br />
<input type="radio" name ="f8q8" id ="f8q8" value="op2"/>No<br />
</h3></div>

<div id="headers"><h2><u> If the screening question is confirmed, determine the frequency and severity of the agitation/aggression. </u></h2></div>


<div class="ques"><h3>
9. Frequency <br/><br/>
<input type="radio" name ="f8q9" id ="f8q9" value="op1"/>Rarely – less than once per week. <br />
<input type="radio" name ="f8q9" id ="f8q9" value="op2"/>Sometimes – about once per week.<br />
<input type="radio" name ="f8q9" id ="f8q9" value="op3"/> Often – several times per week but less than every day.<br />
<input type="radio" name ="f8q9" id ="f8q9" value="op4"/> Very often – once or more per day. <br />
</h3></div>


<div class="ques"><h3>
10. Severity:
 <br/><br/>
<input type="radio" name ="f8q10" id ="f8q10" value="op1"/>Mild – agitation is disruptive but can be managed with redirection or reassurance. <br />
<input type="radio" name ="f8q10" id ="f8q10" value="op2"/>Moderate – agitation is disruptive and difficult to redirect or control.<br />
<input type="radio" name ="f8q10" id ="f8q10" value="op3"/> Severe – agitation is very disruptive and a major source of difficulty; there may be a threat of personal harm. Medications are often required.<br />
</h3></div>

<div class="ques"><h3>
11. Distress: How emotionally distressing do you find this behavior? <br/><br/>
<input type="radio" name ="f8q11" id ="f8q11" value="op1"/>Not at all. <br />
<input type="radio" name ="f8q11" id ="f8q11" value="op2"/>Minimally (almost no change in work routine). <br />
<input type="radio" name ="f8q11" id ="f8q11" value="op3"/> Moderately (disrupts work routine, requires time rebudgeting). <br />
<input type="radio" name ="f8q11" id ="f8q11" value="op4"/> Severely (disruptive, upsetting to staff and other residents, major time infringement) <br />
<input type="radio" name ="f8q11" id ="f8q11" value="op5"/>Very Severely or Extremely(very disruptive, major source of distress for staff and other
residents, requires time usually devoted to other residents or activities
 <br />

</h3></div>

<div id="headers">
<input type="submit" name = "" id="submit" value="submit" id="submit" />
</div>
</form>
</div>

</body>
</html>