<!--<link rel="stylesheet" type="text/css" href="extra.css">-->
<link rel="stylesheet" type="text/css" href="css/surveyForms.css">
<script>
    function radioEvaluate1(x) {
        for (var i=0, length=x.length; i < length; i++) {
            if (x[i].checked) {
                return x[i].value;
                break;
            }
        }
    }
    
    function cbEvaluate1(x) {
        var z="";
        for (var i=0, length=x.length; i < length; i++) {
            if (x[i].checked) {
                z += x[i].value;
                z += ",";
            }
        }
        return z;
    }
    
    function onEvaluate() 
	{
	
		 var error = 1;
		var errorFields = "";
		
        var q1tb=document.getElementById('f1q1').value;
        var t2=document.getElementsByName('f1q2');
        var q2=radioEvaluate1(t2);
        var t3=document.getElementsByName('f1q3');
        var q3=radioEvaluate1(t3);
        var t4=document.getElementsByName('f1q4');
        var q4=radioEvaluate1(t4);
        //var q4tb=document.getElementById('f1q4b1').value;
        var t5=document.getElementsByName('f1q5');
        var q5=radioEvaluate1(t5);
        var q6tb=document.getElementById('f1q6b1').value;
        var q7tb1=document.getElementById('f1q7b1').value;
        var q7tb2=document.getElementById('f1q7b2').value;
        //var q8tb=document.getElementById('f1q8b1').value;
        var t8=document.getElementsByName('f1q8');
        var q8=radioEvaluate1(t8);
        var t9=document.getElementsByName('f1q9');
        var q9=radioEvaluate1(t9);
        var t10=document.getElementsByName('f1q10');
        var q10=radioEvaluate1(t10);
        var t11=document.getElementsByName('f1q11');
        var q11=radioEvaluate1(t11);
        var t12=document.getElementsByName('f1q12');
        var q12=cbEvaluate1(t12);
        var q12tb=document.getElementById('f1q12b1').value;
        var t13=document.getElementsByName('f1q13');
        var q13=cbEvaluate1(t13);
		
        var t14=document.getElementsByName('f1q14');
        var q14=radioEvaluate1(t14);
        var q15tb=document.getElementById('f1q15b1').value;
        var t16=document.getElementsByName('f1q16');
        var q16=radioEvaluate1(t16);
        var q17tb1=document.getElementById('f1q17b1').value;
        var q17tb2=document.getElementById('f1q17b2').value;
        var t18=document.getElementsByName('f1q18');
        var q18=cbEvaluate1(t18);
        var q19tb=document.getElementById('f1q19b1').value;
        var t20=document.getElementsByName('f1q20');
        var q20=cbEvaluate1(t20);
        var q20tb=document.getElementById('f1q20b1').value;
        var t21=document.getElementsByName('f1q21');
        var q21=cbEvaluate1(t21);
        var q22tb=document.getElementById('f1q22b1').value;
        var q23tb=document.getElementById('f1q23b1').value;
    
        if (q1tb == "") {
			error = 0;
				errorFields = errorFields+"Question 1, ";
            
        } 
		if (q2 == undefined) {
            error = 0;
				errorFields = errorFields+" question 2, ";
        }
		
		if (q3 == undefined) {
            error = 0;
				errorFields = errorFields+" question 3, ";
        }
		
		if (q4 == undefined) {
            error = 0;
				errorFields = errorFields+" question 4, ";
        }

		if (q5 == undefined) {
            error = 0;
				errorFields = errorFields+" question 5, ";
        }

		if (q6tb == "") {
            error = 0;
				errorFields = errorFields+" question 6, ";
        }

		if (q7tb1 == "" && q7tb2 == "") {
            error = 0;
				errorFields = errorFields+" question 7, ";
        }

	

		if (q8 == undefined) {
            error = 0;
				errorFields = errorFields+" question 8, ";
        } 
		
		if (q9 == undefined) {
            error = 0;
				errorFields = errorFields+" question 9, ";
        }

		if (q10 == undefined) {
            error = 0;
				errorFields = errorFields+" question 10, ";
        }

		if (q11 == undefined) {
            error = 0;
				errorFields = errorFields+" question 11, ";
        }

		if (q12 == "" && q12tb == "") {
            error = 0;
				errorFields = errorFields+" question 12, ";
        }

		if (q13 == "") {
            error = 0;
				errorFields = errorFields+" question 13, ";
        }

		if (q14 == undefined) {
            error = 0;
				errorFields = errorFields+" question 14, ";
        }

		if (q15tb == "") {
            error = 0;
				errorFields = errorFields+" question 15, ";
        }

		if (q16 == undefined) {
            error = 0;
				errorFields = errorFields+" question 16, ";
        }

		if (q17tb1 == "" || q17tb2 == "") {
            error = 0;
				errorFields = errorFields+" question 17, ";
        }
		
		
		if (q18 == "") {
            error = 0;
				errorFields = errorFields+" question 18, ";
        }
		if (q19tb == "") {
            error = 0;
				errorFields = errorFields+" question 19, ";
        } 
		if (q20 == "" && q20tb == "") {
            error = 0;
				errorFields = errorFields+" question 20, ";
        } 
		
		if (q21 == "") {
            error = 0;
				errorFields = errorFields+" question 21, ";
        }
		
		if(error == 0)
			{	
			
				x=confirmSubmit(errorFields.substring(0,errorFields.length - 2)+" are not answered! \n Click Ok if you still wish to submit.");
				//alert(x);
				
				if(x==1)
				{
				
					if (q12tb != "") 
					{
						q12="";
					}
			
					if (q20tb != "") 
					{
						q20="";
					}
					
					var uid='<?php echo $_SESSION["uid"];?>';    
					var finalans=q1tb + ";" + q2 + ";" + q3 + ";" + q4 +  ";" + q5 + ";" + q6tb + ";" + q7tb1 + "," + q7tb2 + ";" + q8 + ";" + q9 + ";" + q10 + ";" + q11 + ";" + q12 + "," + q12tb + ";" + q13 + ";" + q14 + ";" + q15tb + ";" + q16 + ";" + q17tb1 + "," + q17tb2 + ";" + q18 + ";" + q19tb + ";" + q20 + "," + q20tb + ";" + q21 + ";" + q22tb + ";" + q23tb + ";";			
					finalans = encodeURIComponent(finalans);
					var url="forms/enterSurveyAnswers.php?uid=" + uid + "&ans=" + finalans + "&sid=1";
					window.location=url;
				}
				
				/* $(".AlertBox2").show();
					$(".alertMessage2").html(errorFields.substring(0,errorFields.length - 2)+" are mandatory!");
					$(".errorNote2").show();
				 */	

				 /* 	setTimeout(function() 
					{
						$(".AlertBox").hide();
					}, 4000); 
				*/
				
			}

		else 
		{
         
    
            if (q12tb != "") {
                q12="";
            }
    
            if (q20tb != "") {
                q20="";
            }
    
          

            var uid='<?php echo $_SESSION["uid"];?>';
    
            var finalans=q1tb + ";" + q2 + ";" + q3 + ";" + q4 +  ";" + q5 + ";" + q6tb + ";" + q7tb1 + "," + q7tb2 + ";" + q8 + ";" + q9 + ";" + q10 + ";" + q11 + ";" + q12 + "," + q12tb + ";" + q13 + ";" + q14 + ";" + q15tb + ";" + q16 + ";" + q17tb1 + "," + q17tb2 + ";" + q18 + ";" + q19tb + ";" + q20 + "," + q20tb + ";" + q21 + ";" + q22tb + ";" + q23tb + ";";
			

			
            var url="forms/enterSurveyAnswers.php?uid=" + uid + "&ans=" + finalans + "&sid=1";
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
	.AlertBox2
{
	position: fixed;
	top: 20%;
	left: 20%;
	text-align: center;
	-webkit-box-shadow: 0 0 5px 2px #ababab;
	-moz-box-shadow: 0 0 5px 2px #ababab;
	box-shadow: 0 0 5px 2px #ababab;
	background: #ffffff;
	border: 1px solid #ababab;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	border-radius: 5px;

	outline: none;
	padding: 5px;
	width: 60%;
	z-index: 2000;
}
	</style>
	<div class="AlertBox2" hidden>
		<h3 align="left" style="margin-left: 10%;"> Alert </h3>
		
		<hr/>
		<p class="alertMessage2"> 
		
		
		</p>
		
		<input type="button" value="cancel">
		<input type="button" value="Skip and Submit">
		
	</div>
	
<div id="form_wrapper">
    <div id="headers">
        <span class="main_heading">Researcher-Developed Questionnaire</span>
        <span>Socio-Demographic Form</span>
    </div>
    <form onSubmit="return onEvaluate()" type="POST">
		<div class="ques">
            <span> 1. What is your age ? </span> 
			<label> <input type="text" id ="f1q1" name="f1q1" /> </label> 
        </div>
        <div class="ques">
            <span> 2. Sex ? </span>
			<label><input type="radio" name ="f1q2" value="male" /> Male </label>
            <label><input type="radio" name ="f1q2" value="female"> Female </label>
        </div>
        <div class="ques">
            <span> 3. What is your marital Status? </span>
			<label>
				<input type="radio" name="f1q3" value="married" /> Married 
				</label>
			<label><input type="radio" name="f1q3" value="single" /> Single </label>
			<label><input type="radio" name="f1q3" value="divorced" /> Divorced </label>
			<label><input type="radio" name="f1q3" value="separated" /> Separated </label>
			<label><input type="radio" name="f1q3" value="unmarriedcouple" /> A member of an unmarried couple </label>
			<label><input type="radio" name="f1q3" value="widowed"/> Widowed  </label>
			<label><input type="radio" name="f1q3" value="prefernot"/> Prefer not to answer  </label>
        </div>
        <div class="ques">
            <span> 4. Which type of caregiver best describes you in relation to the person that is receiving care: </span> 
            <label> <input type="radio" name="f1q4" value="mother"> Mother </label>
            <label> <input type="radio" name="f1q4" value="father"> Father </label>
            <label> <input type="radio" name="f1q4" value="stepmother"> Step Mother </label>
            <label> <input type="radio" name="f1q4" value="stepfather"> Step Father </label>
            <label> <input type="radio" name="f1q4" value="fatherinlaw"> Father in-law </label>
            <label> <input type="radio" name="f1q4" value="motherinlaw"> Mother in-law </label>
            <label> <input type="radio" name="f1q4" value="spouse"> Spouse </label>
            <label> <input type="radio" name="f1q4" value="sibling"> Sibling </label>
            <label> <input type="radio" name="f1q4" value="child"> Child </label>
            <label> <input type="radio" name="f1q4" value="Other"> <!--<input type="text" name ="f1q4b1" id="f1q4b1">--> Other  </label>
                </p>
            </span>
        </div>
        <div class="ques">
            <span> 5. What type of area do you currently live in ? </span>
            <label> <input type="radio" name="f1q5" value="urban"> Urban </label> 
            <label> <input type="radio" name="f1q5" value="suburban"> Suburban </label>
            <label> <input type="radio" name="f1q5" value="rural"> Rural </label>
        </div>
        <div class="ques">
            <span> 6. How many people live in your household ? </span>
            <label> <input type="text" name="f1q6b1"  id ="f1q6b1">
        </div>
        <div class="ques">
            <span> 7. How many children live in the home ? </span>
            <label> <input type="text" name="f1q7b1" id ="f1q7b1" /> </label>
            <span> &emsp; What are the ages ? (Please seperate with a comma ",")</span>
			<label> <input type="text" name="f1q7b2" id ="f1q7b2" /> </label>
        </div>
        <div class="ques">
            <span>
                8.	What is your ethnicity/race?
            </span>
            <label> <input type="radio" name="f1q8" value="black/aftrican-american"> Black/ African-American (non-Hispanic)</label>
            <label> <input type="radio" name="f1q8" value="white/caucasian"> White/ Caucasian (non-Hispanic) </label>
            <label> <input type="radio" name="f1q8" value="hispanic"> Hispanic </label>
            <label> <input type="radio" name="f1q8" value="asian"> Asian </label>
            <label> <input type="radio" name="f1q8" value="hawaiian/pacific-islander"> Hawaiian/Pacific Islander </label>
            <label> <input type="radio" name="f1q8" value="two-of-more"> Two of more ethnicities </label>
            <label> <input type="radio" name="f1q8" value="two-of-more"> Other<!--<input type="text" name="f1q8b1" id="f1q8b1">-->
            </label>
        </div>
        <div class="ques">
            <span>
                9. What is your family income?
            </span>
            <label> <input type="radio" name="f1q9" value="lessthan10k"> Less than $10,000 </label>
            <label> <input type="radio" name="f1q9" value="10-19"> $10,000 - $19,999 </label>
            <label> <input type="radio" name="f1q9" value="20-39"> $20,000 - $39,999 </label>
            <label> <input type="radio" name="f1q9" value="40-59"> $40,000 - $59,999 </label>
            <label> <input type="radio" name="f1q9" value="60-79"> $60,000 - $79,999 </label>
            <label>  <input type="radio" name="f1q9" value="80-99"> $80,000 - $99,999 </label>
            <label> <input type="radio" name="f1q9" value="morethan100k"> Greater than $100,000 </label>
            <label> <input type="radio" name="f1q9" value="noanswer"> Prefer not to answer </label>
        </div>
        <div class="ques">
            <span>
                10.	What is your highest level of completed education ?
            </span>
            <label> <input type="radio" name="f1q10" value="high school or less"> Some high school or less </label>
            <label> <input type="radio" name="f1q10" value="high school diploma/ged"> High School diploma/GED </label>
            <label> <input type="radio" name="f1q10" value="vocational/ some college"> Vocational/some college </label>
            <label> <input type="radio" name="f1q10" value="associate degree"> Associate degree </label>
            <label> <input type="radio" name="f1q10" value="4-year college degree"> 4-year college degree </label>
            <label> <input type="radio" name="f1q10" value="graduate degree"> Graduate degree </label>
        </div>
        <div class="ques">
            <span>
                11.	What is your employment status?
            </span>
            <label> <input type="radio" name="f1q11" value="working"> Working </label>
            <label> <input type="radio" name="f1q11" value="parttime"> Working part-time </label>
            <label> <input type="radio" name="f1q11" value="retired"> Retired </label>
            <label> <input type="radio" name="f1q11" value="notworking"> Not working </label>
        </div>
        <div class="ques">
            <span>
                12.	Which health insurance does the person you care for have? (check all that apply)
            </span>
            <label> <input type="checkbox" name="f1q12" value="medicaid"> Medicaid </label>
            <label> <input type="checkbox" name="f1q12" value="medicare"> Medicare </label>
            <label> <input type="checkbox" name="f1q12" value="Private insurance"> Private Insurance </label>
            <label> <input type="checkbox" name="f1q12" value="tricare"> Tricare/or Military Dependent insurance </label>
            <label> Other : <input type="text" name="f1q12b1" id="f1q12b1">
        </div>
        <div class="ques">
            <span>
                13.	What type of Internet access do you have? (Circle all that apply </span>
            <label> <input type="checkbox" name="f1q13" value="working"> Broadband Internet </label>
            <label> <input type="checkbox" name="f1q13" value="parttime"> Dial up Internet </label>
            <label> <input type="checkbox" name="f1q13" value="retired"> Mobile internet on a smart phone </label>
            <label> <input type="checkbox" name="f1q13" value="notworking"> Cellular phone with texting </label>
        </div>
        <div class="ques">
            <span>
                14.	What type of electronic device do you use most often? 
            </span>
            <label> <input type="radio" name="f1q14" value="personal computer"> Personal Computer </label>
            <label> <input type="radio" name="f1q14" value="tablet"> Tablet </label>
            <label> <input type="radio" name="f1q14" value="smart phone"> Smart phone </label>
        </div>
        <div class="ques">
            <span>
                15.	How old is the person you care for?   
            </span>
            <label> <input type="text" name="f1q15b1" id="f1q15b1" > Years </label>
		</div>
        <div class="ques">
            <span>
                16.	What is the gender of the person you care for?
            </span>
            <label> <input type="radio" name="f1q16" value="male"> Male </label>
            <label> <input type="radio" name="f1q16" value="female"> Female </label>
            </span>
            </p>
        </div>
        <div class="ques">
            <span>
                17.	How long have you been caring for this person?   
            </span>
			<label> <input type="text" name="f1q17b1" id="f1q17b1" > Years </label>
            <label> <input type="text" name="f1q17b2" id="f1q17b2" > Months </label>
        </div>
        <div class="ques">
            <span>
                18. Please check all of the medical equipment the person you care for uses.
            </span>
            <label> <input type="checkbox" name="f1q18" value="Walker"> Walker </label>
            <label> <input type="checkbox" name="f1q18" value="Supplement oxygen"> Supplement oxygen </label>
            <label> <input type="checkbox" name="f1q18" value="Feeding devices"> Feeding devices </label>
            <label> <input type="checkbox" name="f1q18" value="Hospital bed"> Hospital bed </label>
            <label> <input type="checkbox" name="f1q18" value="Wheelchair"> Wheelchair </label>
            <label> <input type="checkbox" name="f1q18" value="other"> Other </label>
        </div>
        <div class="ques">
            <span> 19. Please describe the medical condition of the person you care for </span>
            <textarea rows="4" cols="50" name="f1q19b1" id="f1q19b1" ></textarea>
        </div>
        <div class="ques">
            <span> 20. Which of the following impact your sleep at night? (Check all that apply) </span>
            <label> <input type="checkbox" name="f1q20" value="I wake to check"> I wake to check on the person I care for. </label>
            <label> <input type="checkbox" name="f1q20" value="wander alarms"> Wander alarms wake me. </label>
            <label> <input type="checkbox" name="f1q20" value="calls out"> I wake because the person I care for calls out. </label>
            <label> <input type="checkbox" name="f1q20" value="gets up of bed"> I wake because the person I care for gets up or out of bed. </label>
            <label> Other : <input type="text" name="f1q20b1" id="f1q20b1" > </label>
        </div>
        <div class="ques">
            <span> 21. What oral health concerns do you have about the person you are caring for? (Circle all that apply) </span>
            <label> <input type="checkbox" name="f1q21" value="pain"> Pain </label>
            <label> <input type="checkbox" name="f1q21" value="Dry mouth"> Dry mouth </label>
            <label> <input type="checkbox" name="f1q21" value="unable to daily oral"> Unable to provide daily oral care </label>
            <label> <input type="checkbox" name="f1q21" value="dentures dont fit"> Dentures don't fit </label>
            <label> <input type="checkbox" name="f1q21" value="bad breath"> Bad breath </label>
            <label> <input type="checkbox" name="f1q21" value="cavities"> Cavities </label>
            <label> <input type="checkbox" name="f1q21" value="Gum diesease"> Gum disease </label>
        </div>
        <div class="ques">
            <span> 22. What concerns do you have about taking care of the person who you care for? </span>
            <textarea rows="4" cols="50" name="f1q22b1" id="f1q22b1" ></textarea>
        </div>
        <div class="ques">
            <span> 23. How could this program help you to best care for the person you care for and yourself? </span>
            <textarea rows="4" cols="50" name="f1q23b1" id="f1q23b1" ></textarea>
        </div>
        <input style="margin-left: 50%;" type="button" class="button" id="submit" value="submit" id="submit" onclick="onEvaluate()" />
    </form>
</div>