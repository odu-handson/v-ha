<?php
require ('fpdf.php');
require_once("connectDB.php");

include "expire.php";
include "loginStatus.php";

function decodeCanvas($postData)
{
	// get the dataURL
	$dataURL = $postData;  

	// the dataURL has a prefix (mimetype+datatype) 
	// that we don't want, so strip that prefix off
	$parts = explode(',', $dataURL);  
	$data = $parts[1];  

	// Decode base64 data, resulting in an image
	$data = base64_decode($data);  
	return $data;
}

//populate values from existing database
//$sql="SELECT * FROM collectdetails WHERE id = " . $_POST['person_id'];
//$result = mysql_query($sql) or die();
//$row = mysql_fetch_array($result);

$pdf = new FPDF('P', 'mm', 'A3');
$pdf->AddPage();

$CONST_VSPACE = 5;
$CONST_HSPACE = $pdf->w / 3;
$CONST_HBODY = $pdf->w - 20;
$CONST_TITLESIZE = 14;
$CONST_BODYSIZE = 12;

//Main Title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell($pdf->w, 20, 'Informed Conset Form', 0, 1, 'C');
//Head title
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Project Title:', 0, 1);
//Project Title
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, '"The Effectiveness of a Virtual Healthcare Neighborhood"', 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Research Title
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Researchers:', 0, 1);
//Research Body
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, 'The principle investigator involved in this study is Dr. Christianne Fowler, ' . 
	'DNP, RN, GNP-BC, who is the Responsible Project Investigator. The co-investigators are: Dr. Carolyn Rutledge, PhD, FNP-BC, ' . 
	'Dr. Karen Kott, PhD, Dr. Kaprea Johnson, PhD, Margaret Lemaster MS, and Ajay Gupta, MS.', 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Description of Research
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Description of Research:', 0, 1);
//Research Body
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "Studies have been done to evaluate the stress associated with providing care to" .
	"a family member or friend with Alzheimer's or related dementia that are not able to fully care for themselves. These studies " . 
	"have looked at overall caregiver burden and ways to decrease the stress on the caregivers. The time commitment for this study " . 
	"is six months. The first two months will involve enrolling participants, conducting the home visits and completing questionnaires. " . 
	"There will then be three months of usual care or the VHN. The final month will consist of the final home visit and completion " . 
	"of questionnaires. If you decide to participate in this study, you will be assigned to a group that either receives a home visit " . 
	"and usual care or a home visit which includes the on-line intervention of support, education and sleep quality monitoring. You will " . 
	"also be asked to fill out questionnaires about your current degree of social support, self-efficacy (self-understanding), and issues " . 
	"with insomnia. Also you will complete some demographic information for you and your care recipient such as age, level of education, " . 
	"income and ethnicity. If you say YES to participating in this study there will be one session taking place in your home at the " . 
	"beginning of the study and one near the end of the study to complete the questionnaires. The time involved for these home visits " . 
	"would be approximately 1 hour each. You will be assigned to one of two groups. There will be 30 other individuals in similar " . 
	"situations participating in this study in the Hampton Roads area of Virginia. The alternative to participation is simply to choose " . 
	"not to participate which you can do at any time before or during this study.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Exclusionary Title
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Exclusionary Criteria:', 0, 1);
//Exclusionary Body
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "In order to participate in this study, you will need to provide care at home for an " . 
	"individual with Alzheimer's or other type of dementia. You should be able to read English and complete the questionnaires. " .
	"You will need to have access to a computer with on-line capabilities. You should not participate in this study if you are not " .
	"a caregiver for some with any type of dementia that requires your help.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Risks and benefits
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Risks and Benefits:', 0, 1);
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "RISKS: If you decide to participate in this study you may face a risk of being asked " .
	"personal questions about your feelings and current medical health that could make you feel uncomfortable. The researcher will " .
	"try to reduce these risks by giving you time to think and respond to the questions without time pressure. Additionally, there " .
	"will be time at the end of the questioning to make any comments or ask further questions of the researcher. If psychological stress " .
	"develops as a result of responding to the researchers' questions, referral will be made to area support groups or to a healthcare " . 
	"provider. The Web page will be password coded and people will only use their first names when on the site. Confidentiality cannot " .
	"be guaranteed if signs of physical or emotional abuse are identified during the study period.", 0, 1);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "BENEFITS: There are no direct benefits for participating in this study. " .
	"However, some indirect benefits are that you may receive information about dementia and caregiving, support from " .
	"other caregivers and the health care team members. You may also obtain information about dementia and the disease " .
	"process and ways to improve the caregiver/care recipient relationship, dealing with problem behaviors, chronic illness, " .
	"medications, improving sleep and end of life planning. Additionally, you will be given a sleep tracker device to keep " .
	"after the study has been completed. Finally, others may benefit from the information you are willing to share about your " .
	"caregiving experience.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Costs and payments
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Costs and Payments:', 0, 1);
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "There are no costs for you to participate. To compensate you for your time " .
	"completing the questionnaires used in this study you will receive $50 at the beginning and the end of the study, for " .
	"a total of $100. Also, you will be given a sleep tracker device to keep after the study has been completed.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//New Information
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'New Information:', 0, 1);
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "If during the time of this study any new information is found that may affect " .
	"your decision to participate, you will be given that information in a timely manner.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Confidentiality
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Confidentiality:', 0, 1);
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "The researcher will take reasonable steps to keep private information, such " .
	"as answers to the questionnaire and other information that may be shared during our conversation confidential. " .
	"The personal identifiable information for the questionnaire will be removed and the material will be kept in a secure " .
	"location with access available only by the researchers. After the information is evaluated, the material will be " .
	"destroyed in a way that is unrecoverable. Data will be presented for the group as a whole and no one individual will be " .
	"identified. While using the web page, the participants will use only their first names. If there is evidence of physical " .
	"or cognitive neglect or abuse the researchers are required by law to inform local and state authorities of the need for " .
	"intervention.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Withdrawal Privilege
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Withdrawal Privilege:', 0, 1);
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "At any time during this study it is OK for you to say NO even if you say YES " .
	"now, you are free to say NO later. Your decision will not in any way affect your relationship with this researcher or " .
	"Old Dominion University.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Compensation for Illness and Injury
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Compensation for Illness and Injury:', 0, 1);
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "If you choose to participate in this study, your consent on this document " .
	"does not waive any of your legal rights. However, in the event of any unforeseen harm arising from this study, " .
	"neither Old Dominion University nor the researchers are able to give you any money, insurance coverage, free " .
	"medical care, or any other compensation for such injury. In the event that you suffer any harm from this research " .
	"project, you may contact Christianne Fowler at the following phone number, 757-683-6869, you may also contact Dr. " .
	"George Maihafer, the current ODU IRB chair, at 757-683-4520, or the Office of Research, at 757-683-3460.", 0, 1);
//Add Page
$pdf->AddPage();
//Voluntary Consent
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Voluntary Consent:', 0, 1);
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "By signing below you are saying YES to several things. You are saying " .
	"that you have read this form or have had it read to you, that you are satisfied that you understand this form, " .
	"the research study, and its risks and benefits. The researcher should have answered any questions that you may " .
	"have about the research. If you have any questions later on, Dr. Christianne Fowler at the following phone number, " .
	"757-683-6869, will be able to answer them. If at any time you feel pressured to participate, or if you have any " .
	"questions about your rights or this form, then you should call Dr. George Maihafer, the current IRB chair, at " .
	"757-683-4520. Most importantly, by signing below you are telling the researcher you agree to participate in this " .
	"study. You will receive a copy of this form for your records.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);	
//Printed name
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->Cell($CONST_HBODY, $CONST_VSPACE, "Subject's Printed Name: " . $_POST['sub_name'], 0, 1);

//Process signature images
// create a temporary unique file name
$img1 = 'tempImg1.png';
$img2 = 'tempImg2.png';

// write the file to the upload directory
$success = file_put_contents($img1, decodeCanvas($_POST['person_sign']));
$success = file_put_contents($img2, decodeCanvas($_POST['witness_sign']));

//Signature
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);	
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->Cell($pdf->w / 4, $CONST_VSPACE, "Subject's Signature: ");
$pdf->Image($img1, null, null, -300);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Date
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, date("F j, Y g:i a"), 0, 1);	
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Investigator Statement
$pdf->SetFont('Arial', 'BU', $CONST_TITLESIZE);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Investigator Statement:', 0, 1);
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->MultiCell($CONST_HBODY, $CONST_VSPACE, "I certify that I have explained to this subject the nature and " .
	"purpose of this research, including benefits, risks, and costs. I have described the rights and protections " .
	"afforded to human subjects and have done nothing to pressure, coerce, or falsely entice this subject into " .
	"participating. I am aware of my obligations under state and federal laws, and promise compliance. I have " .
	"answered the subject's questions and have encouraged him/her to ask additional questions at any time during " .
	"the course of this study. I have witnessed the above signature(s) on this consent form.", 0, 1);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Printed name
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->Cell($CONST_HBODY, $CONST_VSPACE, "Investigator's Printed Name: " . $_POST['inv_fullName'], 0, 1);
//Signature
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);	
$pdf->SetFont('Arial', '', $CONST_BODYSIZE);
$pdf->Cell($pdf->w / 4, $CONST_VSPACE, "Investigator's Signature: ");
$pdf->Image($img2, null, null, -300);
//Spacer
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//Date
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, date("F j, Y g:i a"), 0, 1);	

if (session_status() == PHP_SESSION_NONE)
    session_start();
	
$counter = 1;
$filename = $_SESSION['uid'] . "-consent_form" . $counter . '.pdf';

while(file_exists($filename))
{
	$counter++;
	$filename = $_SESSION['uid'] . "-consent_form" . $counter . '.pdf';
}

$content = $pdf->Output($filename, 'F');

$fp      = fopen($filename, 'r');
$content = fread($fp, filesize($filename));
$content = addslashes($content);
fclose($fp);

$date = date_create();
$date = date_format($date, 'U')*1000;

$sql = "INSERT INTO user_pdfforms(user_id, consent_form, consent_date, consent_investigator_id) values(".$_SESSION['uid'].", '".$content."', ".$date.", ".$_POST['inv_name'].")";
$_SESSION['first_time'] = 1;
//echo $sql;
$result = mysql_query($sql) or die(mysql_error());
if($result)
	echo 1;
else 
	echo 0;


unlink($img1);
unlink($img2);
unlink($filename);

//echo $filename;
?>