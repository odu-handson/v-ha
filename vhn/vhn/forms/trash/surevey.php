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
 
 function cbEvaluate1(x)
 {
  var z ="";
	for (var i = 0, length = x.length; i < length; i++) 
	{
		if (x[i].checked) 
		{
			z += x[i].value;
			z += ",";			
		}
	}
	return z;
 }
 
 
 function onEvaluate()
 {
	
    var q1 = document.getElementById('f1q1').value;
	var t2 = document.getElementsByName('f1q2');
	var q2 = radioEvaluate1(t2);
	var t3 = document.getElementsByName('f1q3');
	var q3 = radioEvaluate1(t3);
	var t4 = document.getElementsByName('f1q4');
	var q4 = radioEvaluate1(t4);
	var q4tb = document.getElementById('f1q4b1').value;
	var t5 = document.getElementsByName('f1q5');
	var q5 = radioEvaluate1(t5);
	var q6tb = document.getElementById('f1q6b1').value;
	var q7tb1 = document.getElementById('f1q7b1').value;
	var q7tb2 = document.getElementById('f1q7b2').value;
	var q8tb =  document.getElementById('f1q8b1').value;
	var t8 = document.getElementsByName('f1q8');
	var q8 = radioEvaluate1(t8);
	var t9 = document.getElementsByName('f1q9');
	var q9 = radioEvaluate1(t9);
	var t10 = document.getElementsByName('f1q10');
	var q10 = radioEvaluate1(t10);
	var t11 = document.getElementsByName('f1q11');
	var q11 = radioEvaluate1(t11);
	var t12 = document.getElementsByName('f1q12');
	var q12 = cbEvaluate1(t12);
	var q12tb = document.getElementById('f1q12b1').value;
	var t13 = document.getElementsByName('f1q13');
	var q13 = cbEvaluate1(t13);
	var t14 = document.getElementsByName('f1q14');
	var q14 = radioEvaluate1(t14);
	var q15tb = document.getElementById('f1q15b1').value;
	var t16 = document.getElementsByName('f1q16');
	var q16 = radioEvaluate1(t16);
	var q17tb1 = document.getElementById('f1q17b1').value;
	var q17tb2 = document.getElementById('f1q17b2').value;
	var t18 = document.getElementsByName('f1q18');
	var q18 = cbEvaluate1(t18);
	var q19tb = document.getElementById('f1q19b1').value;
	var t20 = document.getElementsByName('f1q20');
	var q20 = cbEvaluate1(t20);
	var q20tb = document.getElementById('f1q20b1').value;
	var t21 = document.getElementsByName('f1q21');
	var q21 = cbEvaluate1(t21);
	alert(q1);
	alert(q1 + " " + q2 + " " + q3 + " " + q4 + " " + q4tb + " " + q5 + " " + q6tb + " " + q7tb1 + " " + q7tb2 + " " + q8tb + " " + q8 + " " + q9 + " " + q10 + " " + q12 + " " + q13 + " " + q14 + " " + q15tb + " " + q16 + " " + q17tb1 + " " + q17tb2 + " " + q18 + " " + q19tb + " " + q20 + " " + q20tb + " " + q21 + " . ");
	
	var unans = "";
	
	
 }
 
 
 </script>
 </head>
<body id="body-background">

<div id="wrapper">
<div id="headers">
<h1>Researcher-Developed Questionnaire</h1>
<h2>Socio-Demographic Form</h2>
</div>



<form onSubmit="return onEvaluate()" type="POST">
<div class="ques">

<h3>1. What is your age ? <p>
<input type="textbox" id ="f1q1" name="f1q1"/>
</p>
</h3>
</div>

<div class="ques">

<h3>2. Sex ? <p>
<input type="radio" name ="f1q2" id ="f1q2" value="male"/>Male 
<input type="radio" name ="f1q2" id ="f1q2" value="female"/>Female<br>
</h3>
</p>
</div>

<div class="ques">
<h3>3.	What is your marital Status?
<p>
a.	<input type="radio" name = "f1q3" id="f1q3" value="married">Married<br>
b.	<input type="radio" name = "f1q3" id="f1q3" value="single">Single<br>
c.	<input type="radio" name = "f1q3" id="f1q3" value="divorced">Divorced<br>
d.	<input type="radio" name = "f1q3" id="f1q3" value="separated">Separated<br>
e.	<input type="radio" name = "f1q3" id="f1q3" value="unmarriedcouple">A member of an unmarried couple<br>
f . <input type="radio" name = "f1q3" id="f1q3" value="widowed">Widowed<br>
g.	<input type="radio" name = "f1q3" id="f1q3" value="prefernot">Prefer not to answer<br>
</p>
</h3>
</div>

<div class="ques">
<h3>4.	Which type of caregiver best describes you in relation to the person that is receiving care:

<p>
a.	<input type="radio" name = "f1q4" id="f1q4" value="mother">Mother<br>
b.	<input type="radio" name = "f1q4" id="f1q4" value="father">Father<br>
c.	<input type="radio" name = "f1q4" id="f1q4" value="stepmother">Step Mother<br>
d.	<input type="radio" name = "f1q4" id="f1q4" value="stepfather">Step Father<br>
e.	<input type="radio" name = "f1q4" id="f1q4" value="fatherinlaw">Father in-law<br>
f . <input type="radio" name = "f1q4" id="f1q4" value="motherinlaw">Mother in-law<br>
g.	<input type="radio" name = "f1q4" id="f1q4" value="spouse">Spouse<br>
h.  <input type="radio" name = "f1q4" id="f1q4" value="sibling">Sibling<br>
i . <input type="radio" name = "f1q4" id="f1q4" value="child">Child<br>
j. Other : <input type="textbox" name ="f1q4b1" id="f1q4b1"><br>
</p>
</h3>
</div>

<div class="ques">

<h3>5. What type of area do you currently live in ? <p>
<input type="radio" name = "f1q5" id ="f1q5" value="male">Male 
<input type="radio" name = "f1q5" id ="f1q5" value="female">Female<br>
</h3>
</p>
</div>

<div class="ques">

<h3>6. How many people live in your household ? <p>
<input type="textbox" name = "f1q6b1"  id ="f1q6b1">
</p></h3>
</div>

<div class="ques">

<h3>7. How many children live in the home ? 
<input type="textbox" name = "f1q7b1" id ="f1q7b1"><br>
&nbsp;&nbsp;&nbsp; What are the ages ? <input type="textbox" name="f1q7b2" id ="f1q7b2"></h3>


</p>
</div>

<div class="ques">
<h3>8.	What is your ethnicity/race?

<p>
a.	<input type="radio" name = "f1q8" id="f1q8" value="black/aftrican-american">Black/ African-American (non-Hispanic)<br>
b.	<input type="radio" name = "f1q8" id="f1q8" value="white/caucasian">White/ Caucasian (non-Hispanic)<br>
c.	<input type="radio" name = "f1q8" id="f1q8" value="hispanic">Hispanic<br>
d.	<input type="radio" name = "f1q8" id="f1q8" value="asian">Asian<br>
e.	<input type="radio" name = "f1q8" id="f1q8" value="hawaiian/pacific-islander">Hawaiian/Pacific Islander<br>
f . <input type="radio" name = "f1q8" id="f1q8" value="two-of-more">Two of more ethnicities<br>
Other : <input type="textbox" name = "f1q8b1" id="f1q8b1"><br>
</p>
</h3>
</div>

<div class="ques">
<h3>9. What is your family income?

<p>
a.	<input type="radio" id="f1q9" name = "f1q9" value="lessthan10k">Less than $10,000<br>
b.	<input type="radio" id="f1q9" name = "f1q9" value="10-19">$10,000 - $19,999<br>
c.	<input type="radio" id="f1q9" name = "f1q9" value="20-39">$20,000 - $39,999<br>
d.	<input type="radio" id="f1q9" name = "f1q9" value="40-59">$40,000 - $59,999<br>
e.	<input type="radio" id="f1q9" name = "f1q9" value="60-79">$60,000 - $79,999<br>
f .  <input type="radio" id="f1q9" name = "f1q9" value="80-99">$80,000 - $99,999<br>
g. <input type="radio" id="f1q9" name = "f1q9" value="morethan100k">Greater than $100,000<br>
h.	<input type="radio" id="f1q9" name = "f1q9" value="noanswer">Prefer not to answer<br>
</p>
</h3>
</div>

<div class="ques">
<h3>10.	What is your highest level of completed education ?
<p>
a.	<input type="radio" name = "f1q10" id="f1q10" value="high school or less">Some high school or less<br>
b.	<input type="radio" name = "f1q10" id="f1q10" value="high school diploma/ged">High School diploma/GED<br>
c.	<input type="radio" name = "f1q10" id="f1q10" value="vocational/ some college">Vocational/some college<br>
d.	<input type="radio" name = "f1q10" id="f1q10" value="associate degree">Associate degree<br>
e.	<input type="radio" name = "f1q10" id="f1q10" value="4-year college degree">4-year college degree<br>
f . <input type="radio" name = "f1q10" id="f1q10" value="graduate degree">Graduate degree<br>
</p>
</h3>
</div>

<div class="ques">
<h3>11.	What is your employment status?
<p>
a.	<input type="radio" name = "f1q11" id="f1q11" value="working">working<br>
b.	<input type="radio" name = "f1q11" id="f1q11" value="parttime">working part-time<br>
c.	<input type="radio" name = "f1q11" id="f1q11" value="retired">retired<br>
d.	<input type="radio" name = "f1q11" id="f1q11" value="notworking">not working<br>
</p>
</h3>
</div>

<div class="ques">
<h3>12.	Which health insurance does the person you care for have? (check all that apply)
<p>
a.	<input type="checkbox" name = "f1q12" id="f1q12" value="medicaid">Medicaid<br>
b.	<input type="checkbox" name = "f1q12" id="f1q12" value="medicare">Medicare<br>
c.	<input type="checkbox" name = "f1q12" id="f1q12" value="Private insurance">Private Insurance<br>
d.	<input type="checkbox" name = "f1q12" id="f1q12" value="tricare">Tricare/or Military Dependent insurance<br>
e.  Other : <input type="textbox" name = "f1q12b1" id="f1q12b1">
</p>
</h3>
</div>

<div class="ques">
<h3>13.	What type of Internet access do you have? (Circle all that apply
<p>
a.	<input type="checkbox" name = "f1q13" id="f1q13" value="working">Broadband Internet<br>
b.	<input type="checkbox" name = "f1q13" id="f1q13" value="parttime">Dial up Internet<br>
c.	<input type="checkbox" name = "f1q13" id="f1q13" value="retired">Mobile internet on a smart phone<br>
d.	<input type="checkbox" name = "f1q13" id="f1q13" value="notworking">Cellular phone with texting<br>
</p>
</h3>
</div>

<div class="ques">
<h3>14.	What type of electronic device do you use most often? Ew12 
<p>
a.	<input type="radio" name = "f1q14" id="f1q14" value="personal computer">Personal Computer<br>
b.	<input type="radio" name = "f1q14" id="f1q14" value="tablet">Tablet<br>
c.	<input type="radio" name = "f1q14" id="f1q14" value="smart phone">Smart phone<br>
</p>
</h3>
</div>



<div class="ques">
<h3>15.	How old is the person you care for?   
<p>
<input type="textbox" name = "f1q15b1" id="f1q15b1" >&nbsp; years<br>
</p>
</h3>
</div>


<div class="ques">

<h3>16.	What is the gender of the person you care for?<p>
<input type="radio" name = "f1q16" id ="f1q16" value="male">Male 
<input type="radio" name = "f1q16" id ="f1q16" value="female">Female<br>
</h3>
</p>
</div>

<div class="ques">
<h3>17.	How long have you been caring for this person?   
<p>
<input type="textbox" name = "f1q17b1" id="f1q17b1" >&nbsp; Years<br>
<input type="textbox" name = "f1q17b2" id="f1q17b2" >&nbsp; Months<br>
</p>
</h3>
</div>

<div class="ques">
<h3>18. Please check all of the medical equipment the person you care for uses.
<p>
a.	<input type="checkbox" name = "f1q18" id="f1q18" value="Walker">Walker<br>
b.	<input type="checkbox" name = "f1q18" id="f1q18" value="Supplement oxygen">Supplement oxygen<br>
c.	<input type="checkbox" name = "f1q18" id="f1q18" value="Feeding devices">Feeding devices<br>
d.	<input type="checkbox" name = "f1q18" id="f1q18" value="Hospital bed">Hospital bed<br>
e.	<input type="checkbox" name = "f1q18" id="f1q18" value="Wheelchair">Wheelchair<br>
f .	<input type="checkbox" name = "f1q18" id="f1q18" value="other">Other<br>


</p>
</h3>
</div>

<div class="ques">
<h3>19.Please describe the medical condition of the person you care for  
<p>
<textarea rows="4" cols="50" name = "f1q19b1" id="f1q19b1" ></textarea>&nbsp; <br>
</p>
</h3>
</div>


<div class="ques">
<h3>20.	Which of the following impact your sleep at night? (Check all that apply)
<p>
a.	<input type="checkbox" id="f1q20" name = "f1q20" value="I wake to check">I wake to check on the person I care for.<br>
b.	<input type="checkbox" id="f1q20" name = "f1q20" value="wander alarms">Wander alarms wake me.<br>
c.	<input type="checkbox" id="f1q20" name = "f1q20" value="calls out">I wake because the person I care for calls out.<br>
d.	<input type="checkbox" id="f1q20" name = "f1q20" value="gets up of bed">I wake because the person I care for gets up or out of bed.<br>
e.	Other : <input type="textbox" name = "f1q20b1" id="f1q20b1" ><br>


</p>
</h3>
</div>

<div class="ques">
<h3>21.	What oral health concerns do you have about the person you are caring for? (Circle all that apply)
<p>
a.	<input type="checkbox" name = "f1q21" id="f1q21" value="pain">pain<br>
b.	<input type="checkbox" name = "f1q21" id="f1q21" value="Dry mouth">Dry mouth<br>
c.	<input type="checkbox" name = "f1q21" id="f1q21" value="unable to daily oral">Unable to provide daily oral care<br>
d.	<input type="checkbox" name = "f1q21" id="f1q21" value="dentures dont fit">Dentures don’t fit<br>
e.	<input type="checkbox" name = "f1q21" id="f1q21" value="bad breath">Bad breath<br>
f .	<input type="checkbox" name = "f1q21" id="f1q21" value="cavities">Cavities<br>
g.	<input type="checkbox" name = "f1q21" id="f1q21" value="Gun diesease">Gun disease<br>


</p>
</h3>
</div>

<div class="ques">
<h3>22.	What concerns do you have about taking care of the person who you care for?  
<p>
<textarea rows="4" cols="50" name = "f1q22b1" id="f1q22b1" ></textarea>&nbsp; <br>
</p>
</h3>
</div>

<div class="ques">
<h3>23.	How could this program help you to best care for the person you care for and yourself?  
<p>
<textarea rows="4" cols="50" name = "f1q23b1" id="f1q23b1" ></textarea>&nbsp; <br>
</p>
</h3>
</div>
<input type="submit" name = "" id="submit" value="submit" id="submit" />
</form>
</div>

</body>
</html>