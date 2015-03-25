<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	require_once("connectDB.php");
					
	$sql = "select id from collectdetails where person_userid =".$_SESSION['uid'];
	$results = mysql_query($sql) or die(mysql_error());
	$person_id = 0;
	while($row = mysql_fetch_array($results))
	{
		$person_id = $row['id'];
	}
	//var_dump($_SESSION);
?>
<link rel="stylesheet" media="screen" type="text/css" href="css/signature-pad.css" />
<link rel="stylesheet" media="screen" type="text/css" href="css/consentForm.css" />
<script type="text/javascript">

$(function() {

	$("#header").hide();
	
	$("#ticker_bg").hide();
	
	$("#navbar").hide();

	$("#main").height("2000");

});

</script>
<div class="mask_div">
	<div id="main_wrapper">
		<div id="consentForm_div">
			<h3 align="center" style="text-transform:uppercase;"> Informed Consent Form </h2>
			<span> PROJECT TITLE: </span>
				<p> "The Effectiveness of a Virtual Healthcare Neighborhood" </p>
			<span> INTRODUCTIONS: </span>
				<p> The purpose of this form is to give you information that may affect your decision whether to say YES or NO to participation in this research, and to record the consent of those who say YES. This research project entitled, "The Effectiveness of a Virtual Healthcare Neighborhood", will take place in your home via a web page. </p>
			<span> RESEARCHERS: </span>
				<p> The principle investigator involved in this study is Dr. Christianne Fowler, DNP, RN, GNP-BC, who is the Responsible Project Investigator. The co-investigators are: Dr. Carolyn Rutledge, PhD, FNP-BC, Dr. Karen Kott, PhD, Dr. Kaprea Johnson, PhD, Margaret Lemaster MS, and  Ajay Gupta, MS. </p>
			<span> DESCRIPTION OF RESEARCH: </span>
				<p> Studies have been done to evaluate the stress associated with providing care to a family member or friend with Alzheimer's or related dementia that are not able to fully care for themselves. These studies have looked at overall caregiver burden and ways to decrease the stress on the caregivers. The time commitment for this study is six months. The first two months will involve enrolling participants, conducting the home visits and completing questionnaires. There will then be three months of usual care or the VHN. The final month will consist of the final home visit and completion of questionnaires. </p>

				<p> If you decide to participate in this study, you will be assigned to a group that either receives a home visit and usual care or a home visit which includes the on-line intervention of support, education and sleep quality monitoring. You will also be asked to fill out questionnaires about your current degree of social support, self-efficacy (self-understanding), and issues with insomnia. Also you will complete some demographic information for you and your care recipient such as age, level of education, income and ethnicity. If you say YES to participating in this study there will be one session taking place in your home at the beginning of the study and one near the end of the study to complete the questionnaires. The time involved for these home visits would be approximately 1 hour each. You will be assigned to one of two groups. There will be 30 other individuals in similar situations participating in this study in the Hampton Roads area of Virginia. The alternative to participation is simply to choose not to participate which you can do at any time before or during this study. </p>
			<span> EXCLUSIONARY CRITERIA: </span>
				<p> In order to participate in this study, you will need to provide care at home for an individual with Alzheimer's or other type of dementia. You should be able to read English and complete the questionnaires. You will need to have access to a computer with on-line capabilities. You should not participate in this study if you are not a caregiver for some with any type of dementia that requires your help. </p>
			<span> RISKS AND BENEFITS: </span>
				<p> <u> RISKS: </u> If you decide to participate in this study you may face a risk of being asked personal questions about your feelings and current medical health that could make you feel uncomfortable. The researcher will try to reduce these risks by giving you time to think and respond to the questions without time pressure. Additionally, there will be time at the end of the questioning to make any comments or ask further questions of the researcher. If psychological stress develops as a result of responding to the researchers' questions, referral will be made to area support groups or to a healthcare provider. The Web page will be password coded and people will only use their first names when on the site. Confidentiality cannot be guaranteed if signs of physical or emotional abuse are identified during the study period. </p>
				<p>	<u> BENEFITS: </u> There are no direct benefits for participating in this study. However, some indirect benefits are that you may receive information about dementia and caregiving, support from other caregivers and the health care team members. You may also obtain information about dementia and the disease process and ways to improve the caregiver/care recipient relationship, dealing with problem behaviors, chronic illness, medications, improving sleep and end of life planning. Additionally, you will be given a sleep tracker device to keep after the study has been completed. Finally, others may benefit from the information you are willing to share about your caregiving experience. </p>
			<span> COSTS AND PAYMENTS: </span>
				<p> There are no costs for you to participate. To compensate you for your time completing the questionnaires used in this study you will receive $50 at the beginning and the end of the study, for a total of $100. Also, you will be given a sleep tracker device to keep after the study has been completed. </p>
			<span> NEW INFORMATION: </span>
				<p> If during the time of this study any new information is found that may affect your decision to participate, you will be given that information in a timely manner. </p>
			<span> CONFIDENTIALITY: </span>
				<p> The researcher will take reasonable steps to keep private information, such as answers to the questionnaire and other information that may be shared during our conversation confidential. The personal identifiable information for the questionnaire will be removed and the material will be kept in a secure location with access available only by the researchers. After the information is evaluated, the material will be destroyed in a way that is unrecoverable. Data will be presented for the group as a whole and no one individual will be identified. While using the web page, the participants will use only their first names. If there is evidence of physical or cognitive neglect or abuse the researchers are required by law to inform local and state authorities of the need for intervention. </p>
			<span> WITHDRAWAL PRIVILEGE: </span>
				<p> At any time during this study it is OK for you to say NO even if you say YES now, you are free to say NO later. Your decision will not in any way affect your relationship with this researcher or Old Dominion University. </p>
			<span> COMPENSATION FOR ILLNESS AND INJURY: </span>
				<p> If you choose to participate in this study, your consent on this document does not waive any of your legal rights. However, in the event of any unforeseen harm arising from this study, neither Old Dominion University nor the researchers are able to give you any money, insurance coverage, free medical care, or any other compensation for such injury. In the event that you suffer any harm from this research project, you may contact Christianne Fowler at the following phone number, 757-683-6869, you may also contact Dr. George Maihafer, the current ODU IRB chair, at 757-683-4520, or the Office of Research, at 757-683-3460. </p>

			<span> VOLUNTARY CONSENT: </span>
				<p> By signing below you are saying YES to several things. You are saying that you have read this form or have had it read to you, that you are satisfied that you understand this form, the research study, and its risks and benefits. The researcher should have answered any questions that you may have about the research. If you have any questions later on, Dr. Christianne Fowler at the following phone number, 757-683-6869, will be able to answer them. If at any time you feel pressured to participate, or if you have any questions about your rights or this form, then you should call Dr. George Maihafer, the current IRB chair, at 757-683-4520. Most importantly, by signing below you are telling the researcher you agree to participate in this study. You will receive a copy of this form for your records. </p>

			<label> Subject's Printed Name: </label> 
				<input value="<?php echo $_SESSION['name']; ?>" style="width: 200px; text-transform:capitalize;" id="subject_name"/>
			
			<br />
			<label> Subject's Signature: </label>
				
				<div id="signature-pad" class="m-signature-pad">
					<img id="img1" src=""/>
					<div id="pad1body" class="m-signature-pad--body">
						<canvas></canvas>
					</div>
					<div id="pad1footer" class="m-signature-pad--footer">
						<div class="description">Sign above</div>
						<button class="button clear" data-action="clear">Clear</button>
						<button id="save" class="button save" data-action="save">Save</button>
					</div>
				</div>
				
				<script src="js/signature_pad.js"></script>
				<script src="js/app.js"></script>

			<br />
			<label> <b> Date: </b> <?php $loc_time = localtime(); echo ($loc_time[4]+1).'-'.$loc_time[3].'-'.($loc_time[5]+1900); ?></label>
			<br />
			<br />
			<span> INVESTIGATOR STATEMENT: </span>
				<p> I certify that I have explained to this subject the nature and purpose of this research, including benefits, risks, and costs. I have described the rights and protections afforded to human subjects and have done nothing to pressure, coerce, or falsely entice this subject into participating. I am aware of my obligations under state and federal laws, and promise compliance. I have answered the subject's questions and have encouraged him/her to ask additional questions at any time during the course of this study. I have witnessed the above signature(s) on this consent form. </p>

			<label>Investigator's Printed Name: </label> 
				<select style="width: 200px;" id="Investigator_name" name="Investigator_name" >
					<?php 
						require_once("connectDB.php");
						$sql = "select id,fname,lname from users where role_id !=3";
						$results = mysql_query($sql) or die($mysql_error());
						while($row = mysql_fetch_row($results))
						{
							echo '<option value="'.$row[0].'">'.$row['1'].' '.$row['2'].'</option>'; 
						}
					?>
				</select>
			<br />
			
			<label> Investigator's Signature:	</label>
				<div id="signature-pad2" class="m-signature-pad">
					<img id="img2" />
					<div id="pad2body" class="m-signature-pad--body">
						<canvas></canvas>
					</div>
					<div id="pad2footer" class="m-signature-pad--footer">
						<div class="description">Sign above</div>
						<button class="button clear" data-action="clear">Clear</button>
						<button "hidden" id="save" class="button save" data-action="save">Save</button>
					</div>
				</div>
				<script src="js/app1.js"></script>
			<br />
			<label> <b> Date: </b> <?php $loc_time = localtime(); echo ($loc_time[4]+1).'-'.$loc_time[3].'-'.($loc_time[5]+1900); ?></label>
			<br />
			<br />
			<input id="submit" class="button" type="button" value="Submit" />
			<br />
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$("#submit").click( function() {
			//alert("asdasdasdada");
			$.ajax({
				  type: "POST",
				  url: "consentToPDF.php",
				  data: {
					'person_id': <?php echo $person_id; ?>,
					'person_sign': $("#img1").attr("src"),
					'witness_sign': $("#img2").attr("src"),
					'sub_name': '<?php echo $_SESSION['name']; ?>',
					'inv_name': $("#Investigator_name").val(),
					'inv_fullName': $("#Investigator_name option:selected").text()
					},
				  success: function (data) {
						if( data == 0)
						{
							$(".alertMessage").html("<h4 style=\"color: red;\"> Consent form not saved! Please try again later or contact technical support if the problem continues. </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
								$(".AlertBox").hide();
							}, 4000);
						}
						else 
						{
							$(".alertMessage").html("<h4 style=\"color: green;\"> Consent form saved! </h4>");
							$(".AlertBox").show();

							setTimeout(function() {
								$(".AlertBox").hide();
								window.location.href = "Surveys.php";
							}, 4000);
						}
					},
				  dataType: "text"
				});
		});
	});
</script>
<?php
	include "appTail.php";
?>