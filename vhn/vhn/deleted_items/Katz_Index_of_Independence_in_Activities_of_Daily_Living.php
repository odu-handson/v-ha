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
	alert(q1 + " " +q2 + " " +q3 + " " +q4 + " " +q5 + " " +q6  );
	
	
	if(q1  == undefined)
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
	
	else
	{
		<?php session_start(); ?>
		var uid = '<?php echo $_SESSION["uid"];?>';
		
		alert(uid);
		 var finalans = q1 + ";" + q2 + ";" + q3+ ";" + q4 + ";" + q5 + ";" + q6 + ";"; 
		 
		 
		 var url="enterSurveyAnswers.php?uid="+uid+"&ans="+finalans+"&sid=4";
		 
		 window.open(url);
	 
	}
}	
	
	</script>
 
 
 
 
 </head>
<body id="body-background">

<div id="wrapper">
<div id="headers">
<h1>Katz Index of Independence in Activities of Daily Living</h1>
<h2></h2>
</div>
</br>
<form onSubmit="return onEvaluate()" type="POST">

<div class="ques"><h3>

1. BATHING. <br/><br/>
<input type="radio" name ="f5q1" id ="f5q1" value="op1"/>Bathes self completely or needs help in bathing only a single part of the body such as the back, genital area or disabled extremity  <br>
<input type="radio" name ="f5q1" id ="f5q1" value="op2"/>Need help with bathing more than one part of the body, getting in or out of the tub or shower. Requires total bathing  <br>

</h3></div>

<div class="ques"><h3>
2. DRESSING. <br/><br/>
<input type="radio" name ="f5q2" id ="f5q2" value="op1"/>Get clothes from closets and drawers and puts on clothes and outer garments complete with fasteners. May have help tying shoes.  <br>
<input type="radio" name ="f5q2" id ="f5q2" value="op2"/>Needs help with dressing self or needs to be completely dressed. <br>

</h3></div>

<div class="ques"><h3>
3. TOILETING. <br/><br/>
<input type="radio" name ="f5q3" id ="f5q3" value="op1"/>Goes to toilet, gets on and off, arranges clothes, cleans genital area without help. <br> 
<input type="radio" name ="f5q3" id ="f5q3" value="op2"/>Needs help transferring to the toilet, cleaning self or uses bedpan or commode.  

</h3></div>


<div class="ques"><h3>
4. TRANSFERRING. <br/><br/>
<input type="radio" name ="f5q4" id ="f5q4" value="op1"/>Moves in and out of bed or chair unassisted. Mechanical transfer aids are acceptable. <br>
<input type="radio" name ="f5q4" id ="f5q4" value="op2"/>Needs help in moving from bed to chair or requires a complete transfer.  <br>
</h3></div>

<div class="ques"><h3>
5. CONTINENCE. <br/><br/>
<input type="radio" name ="f5q5" id ="f5q5" value="op1"/>Exercises complete self control over urination and defecation. <br>
<input type="radio" name ="f5q5" id ="f5q5" value="op2"/>Is partially or totally incontinent of bowel or bladder <br>

</h3></div>

<div class="ques"><h3>
6. FEEDING. <br/><br/>
<input type="radio" name ="f5q6" id ="f5q6" value="op1"/>Gets food from plate into mouth without help. Preparation of food may be done by another person. <br>
<input type="radio" name ="f5q6" id ="f5q6" value="op2"/>Needs partial or total help with feeding or requires parenteral feeding. <br>

</h3></div>







<div id="headers">
<input type="submit" name = "" id="submit" value="submit" id="submit" />
</div>


</form>
</div>

</body>
</html>