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
	var t1 = document.getElementsByName('f7q1');
	var q1 = radioEvaluate1(t1);
	var t2 = document.getElementsByName('f7q2');
	var q2 = radioEvaluate1(t2);
	var t3 = document.getElementsByName('f7q3');
	var q3 = radioEvaluate1(t3);
	var t4 = document.getElementsByName('f7q4');
	var q4 = radioEvaluate1(t4);
	var t5 = document.getElementsByName('f7q5');
	var q5 = radioEvaluate1(t5);
	var t6 = document.getElementsByName('f7q6');
	var q6 = radioEvaluate1(t6);
	var t7 = document.getElementsByName('f7q7');
	var q7 = radioEvaluate1(t7);
	var t8 = document.getElementsByName('f7q8');
	var q8 = radioEvaluate1(t8);
	var t9 = document.getElementsByName('f7q9');
	var q9 = radioEvaluate1(t9);
	var t10 = document.getElementsByName('f7q10');
	var q10 = radioEvaluate1(t10);
	var t11 = document.getElementsByName('f7q11');
	var q11 = radioEvaluate1(t11);
	var t12 = document.getElementsByName('f7q12');
	var q12 = radioEvaluate1(t12);
	var t13 = document.getElementsByName('f7q13');
	var q13 = radioEvaluate1(t13);
	var t14 = document.getElementsByName('f7q14');
	var q14 = radioEvaluate1(t14);
	
	
	alert(q1 + " " +q2 + " " +q3 + " " +q4 + " " +q5 + " " +q6 + " " +q7 + " " +q8 );
	}
 
	</script>
 
 
 
 
 </head>
<body id="body-background">

<div id="wrapper">
<div id="headers">
<h1></h1>
</div>

<div id="headers"><h2><u>Emotional/Informational Support </u></h2> (from healthcare providers)</div>

<form onSubmit="return onEvaluate()" type="POST">

<div class="ques"><h3>
1. Someone you can count on to listen to you when you need to talk <br/><br/>
<input type="radio" name ="f7q1" id ="f7q1" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q1" id ="f7q1" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q1" id ="f7q1" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q1" id ="f7q1" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q1" id ="f7q1" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div class="ques"><h3>
2. Someone to give you information to help you understand a situation<br/><br/>
<input type="radio" name ="f7q2" id ="f7q1" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q2" id ="f7q1" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q2" id ="f7q1" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q2" id ="f7q1" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q2" id ="f7q1" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div class="ques"><h3>
3. Someone to give you good advice about a crisis. <br/><br/>
<input type="radio" name ="f7q3" id ="f7q1" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q3" id ="f7q1" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q3" id ="f7q1" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q3" id ="f7q1" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q3" id ="f7q1" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div class="ques"><h3>
4. Someone to confide in or talk to about yourself or your problems <br/><br/>
<input type="radio" name ="f7q4" id ="f7q4" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q4" id ="f7q4" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q4" id ="f7q4" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q4" id ="f7q4" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q4" id ="f7q4" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div class="ques"><h3>
5. Someone whose advice you really want <br/><br/>
<input type="radio" name ="f7q5" id ="f7q5" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q5" id ="f7q5" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q5" id ="f7q5" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q5" id ="f7q5" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q5" id ="f7q5" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div class="ques"><h3>
6. Someone to share your most private worries and fears with <br/><br/>
<input type="radio" name ="f7q6" id ="f7q6" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q6" id ="f7q6" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q6" id ="f7q6" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q6" id ="f7q6" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q6" id ="f7q6" value="5"/>All of the time &nbsp;&nbsp;

</h3></div>


<div class="ques"><h3>
7. Someone to turn to for suggestions about how to deal with a personal problem <br/><br/>
<input type="radio" name ="f7q7" id ="f7q7" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q7" id ="f7q7" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q7" id ="f7q7" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q7" id ="f7q7" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q7" id ="f7q7" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>


<div class="ques"><h3>
8. Someone who understands your problems. <br/><br/>
<input type="radio" name ="f7q8" id ="f7q8" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q8" id ="f7q8" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q8" id ="f7q8" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q8" id ="f7q8" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q8" id ="f7q8" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div id="headers"><h2><u> Additional Questions </u></h2></div>


<div class="ques"><h3>
9. Do you feel that your care recipients’ healthcare  provider communicates with you about his or her health condition? <br/><br/>
<input type="radio" name ="f7q3" id ="f7q1" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q3" id ="f7q1" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q3" id ="f7q1" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q3" id ="f7q1" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q3" id ="f7q1" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div class="ques"><h3>
10. How often are you updated on your  care recipients’ health? <br/><br/>
<input type="radio" name ="f7q4" id ="f7q4" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q4" id ="f7q4" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q4" id ="f7q4" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q4" id ="f7q4" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q4" id ="f7q4" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div class="ques"><h3>
11. Is your provider willing to  answer questions that you and your family have about your care recipients’ condition ? <br/><br/>
<input type="radio" name ="f7q5" id ="f7q5" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q5" id ="f7q5" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q5" id ="f7q5" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q5" id ="f7q5" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q5" id ="f7q5" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>

<div class="ques"><h3>
12. Does your provider allow enough time for you to ask questions that you have about your care recipients’ health condition? <br/><br/>
<input type="radio" name ="f7q6" id ="f7q6" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q6" id ="f7q6" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q6" id ="f7q6" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q6" id ="f7q6" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q6" id ="f7q6" value="5"/>All of the time &nbsp;&nbsp;

</h3></div>


<div class="ques"><h3>
13. Does your provider support you and your family regarding your decisions related to your care recipient’s  care? <br/><br/>
<input type="radio" name ="f7q7" id ="f7q7" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q7" id ="f7q7" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q7" id ="f7q7" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q7" id ="f7q7" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q7" id ="f7q7" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>


<div class="ques"><h3>
14. Does your provider update you on information related to your care recipient? <br/><br/>
<input type="radio" name ="f7q8" id ="f7q8" value="1"/>None of the time &nbsp;&nbsp;
<input type="radio" name ="f7q8" id ="f7q8" value="2"/>A little of the time&nbsp;&nbsp;
<input type="radio" name ="f7q8" id ="f7q8" value="3"/>Some of the time &nbsp;&nbsp;<br/>
<input type="radio" name ="f7q8" id ="f7q8" value="4"/>Most of the time &nbsp;&nbsp;
<input type="radio" name ="f7q8" id ="f7q8" value="5"/>All of the time &nbsp;&nbsp;
</h3></div>





<div id="headers">
<input type="submit" name = "" id="submit" value="submit" id="submit" />
</div>


</form>
</div>

</body>
</html>