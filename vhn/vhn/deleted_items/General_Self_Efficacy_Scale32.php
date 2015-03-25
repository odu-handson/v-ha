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
	
	else if(q8 == undefined)
	{
	alert("Please answer question 8");
	}
	
	else
	{
		
	<?php session_start(); ?>
	var uid = '<?php echo $_SESSION["uid"];?>';
	alert(uid);
	 var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";" + q7 + ";" + q8 + ";" ; 
	 
	 
	 var url="enterSurveyAnswers.php?uid="+uid+"&ans="+finalans+"&sid=2";
	 
	 window.open(url);
	 
	}
	
	}
 
	</script>
 
 
 
 
 </head>
<body id="body-background">

<div id="wrapper">
<div id="headers">
<h1>General Self Efficacy Scale</h1>
<h2>People sometimes are faced with challenges. How much do you agree or disagree with the following statements?  Please check one number on each line.</h2>
</div>


<form onSubmit="return onEvaluate()" type="POST">

<div class="ques"><h3>
1. I will be able to achieve most of the goals that I have set for myself. <br/><br/>
<input type="radio" name ="f3q1" id ="f3q1" value="op1"/>Strongly Disagree  <br />
<input type="radio" name ="f3q1" id ="f3q1" value="op2"/>Moderately Disagree <br />
<input type="radio" name ="f3q1" id ="f3q1" value="op3"/>Agree <br />
<input type="radio" name ="f3q1" id ="f3q1" value="op4"/>Moderately Agree<br />
<input type="radio" name ="f3q1" id ="f3q1" value="op5"/>Strongly Agree <br />
</h3></div>

<div class="ques"><h3>
2. When facing difficult tasks, I am certain that I will accomplish them. <br/><br/>
<input type="radio" name ="f3q2" id ="f3q2" value="op1"/>Strongly Disagree  <br />
<input type="radio" name ="f3q2" id ="f3q2" value="op2"/>Moderately Disagree <br />
<input type="radio" name ="f3q2" id ="f3q2" value="op3"/>Agree <br />
<input type="radio" name ="f3q2" id ="f3q2" value="op4"/>Moderately Agree<br />
<input type="radio" name ="f3q2" id ="f3q2" value="op5"/>Strongly Agree <br /></h3></div>

<div class="ques"><h3>
3. In general, I think that I can obtain outcomes that are important to me. <br/><br/>
<input type="radio" name ="f3q3" id ="f3q3" value="op1"/>Strongly Disagree  <br />
<input type="radio" name ="f3q3" id ="f3q3" value="op2"/>Moderately Disagree <br />
<input type="radio" name ="f3q3" id ="f3q3" value="op3"/>Agree <br />
<input type="radio" name ="f3q3" id ="f3q3" value="op4"/>Moderately Agree<br />
<input type="radio" name ="f3q3" id ="f3q3" value="op5"/>Strongly Agree <br />
</h3></div>

<div class="ques"><h3>
4. I believe I can succeed at most any endeavor to which I set my mind. <br/><br/>
<input type="radio" name ="f3q4" id ="f3q4" value="op1"/>Strongly Disagree  <br />
<input type="radio" name ="f3q4" id ="f3q4" value="op2"/>Moderately Disagree <br />
<input type="radio" name ="f3q4" id ="f3q4" value="op3"/>Agree <br />
<input type="radio" name ="f3q4" id ="f3q4" value="op4"/>Moderately Agree<br />
<input type="radio" name ="f3q4" id ="f3q4" value="op5"/>Strongly Agree <br />
</h3></div>

<div class="ques"><h3>
5. I will be able to successfully overcome many challenges. <br/><br/>
<input type="radio" name ="f3q5" id ="f3q5" value="op1"/>Strongly Disagree  <br />
<input type="radio" name ="f3q5" id ="f3q5" value="op2"/>Moderately Disagree <br />
<input type="radio" name ="f3q5" id ="f3q5" value="op3"/>Agree <br />
<input type="radio" name ="f3q5" id ="f3q5" value="op4"/>Moderately Agree<br />
<input type="radio" name ="f3q5" id ="f3q5" value="op5"/>Strongly Agree <br />
</h3></div>

<div class="ques"><h3>
6. I am confident that I can perform effectively on many different tasks. <br/><br/>
<input type="radio" name ="f3q6" id ="f3q6" value="op1"/>Strongly Disagree  <br />
<input type="radio" name ="f3q6" id ="f3q6" value="op2"/>Moderately Disagree <br />
<input type="radio" name ="f3q6" id ="f3q6" value="op3"/>Agree <br />
<input type="radio" name ="f3q6" id ="f3q6" value="op4"/>Moderately Agree<br />
<input type="radio" name ="f3q6" id ="f3q6" value="op5"/>Strongly Agree <br />
</h3></div>


<div class="ques"><h3>
7. Compared to other people, I can do most tasks very well. <br/><br/>
<input type="radio" name ="f3q7" id ="f3q7" value="op1"/>Strongly Disagree  <br />
<input type="radio" name ="f3q7" id ="f3q7" value="op2"/>Moderately Disagree <br />
<input type="radio" name ="f3q7" id ="f3q7" value="op3"/>Agree <br />
<input type="radio" name ="f3q7" id ="f3q7" value="op4"/>Moderately Agree<br />
<input type="radio" name ="f3q7" id ="f3q7" value="op5"/>Strongly Agree <br />
</h3></div>


<div class="ques"><h3>
8. Even when things are tough, I can perform quite well. <br/><br/>
<input type="radio" name ="f3q8" id ="f3q8" value="op1"/>Strongly Disagree  <br />
<input type="radio" name ="f3q8" id ="f3q8" value="op2"/>Moderately Disagree <br />
<input type="radio" name ="f3q8" id ="f3q8" value="op3"/>Agree <br />
<input type="radio" name ="f3q8" id ="f3q8" value="op4"/>Moderately Agree<br />
<input type="radio" name ="f3q8" id ="f3q8" value="op5"/>Strongly Agree <br />
</h3></div>



<input type="submit" name = ""  value="submit" id="submit" />



</form>
</div>

</body>
</html>