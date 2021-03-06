<?php
require('fpdf.php');
require_once("connectDB.php");

include "expire.php";
//include "loginStatus.php";

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
session_start();
//populate values from existing database
$sql = "select * FROM users WHERE id=". $_REQUEST['person_id']; //echo $sql;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);

$sql2 = "select * from user_hv_pdfs where user_id=".$_REQUEST['person_id'] ;
		$results2 = mysql_query($sql2) or die(mysql_error()); 
		$num = mysql_num_rows($results2)+1;
date_default_timezone_set('America/New_York');
					$mydate=date('M j Y'); 
						

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 22);
$pdf->Cell($pdf->w, 18, 'I HAVE RECEIVED PAYMENT : '.$num.' FOR VHN STUDY', 0, 1, 'C');
$pdf->SetFont('Arial', '', 14);
$pdf->Cell($pdf->w, 20, ' Date : '.$mydate.'', 0, 1, 'C');
$CONST_VSPACE = 6;
$CONST_HSPACE = $pdf->w / 3;

//NAME
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Name: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $row['fname'] . " " . $row['lname'], 0, 1);
//ADDRESS
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Address: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $row['st1'] . " " . $row['st2'], 0, 1);
//CITY
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'City: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $row['city'], 0, 1);
//ZIP
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Zip: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $row['zip'], 0, 1);
//LINE BREAK
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//PHONE NUMBERS
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Home Phone: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $row['homeph'], 0, 1);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Other Phone: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $row['otherph'], 0, 1);
//EMAIL
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Email: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $row['email'], 0, 1);
/* //RADIO BUTTONS
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Dementia Patient: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $_REQUEST['dementia'], 0, 1);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Internet Access: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $_POST['internet'], 0, 1);
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Proficient in English: ');
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $_POST['english'], 0, 1); */
//$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Qualifies for Study: ');
//$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $_POST['study'], 0, 1);
//LINE BREAK
$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
//HOME VISIT
//$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Home visit: ');
//$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, $_POST['home_visit'], 0, 1);

//SIGNATURES
if( $_POST['payment_check'] == 'YES' )
{
	$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, 'Receipt $50');
	//LINE BREAK
	$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
	
	// create a temporary unique file name
	$img1 = 'tempImg1.png';
	$img2 = 'tempImg2.png';

	// write the file to the upload directory
	$success = file_put_contents($img1, decodeCanvas($_POST['person_sign']));
	$success = file_put_contents($img2, decodeCanvas($_POST['witness_sign']));

	$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, "Signed by: " . $row['fname'], 0, 1);
	$pdf->Image($img1, null, null, -300);
	$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, '', 0, 1);
	$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, "Witness Signature: ", 0, 1);
	$pdf->Cell($CONST_HSPACE, $CONST_VSPACE, "Signed by: " . $_SESSION['uname'], 0, 1);
	$pdf->Image($img2, null, null, -300);
	
}

$counter = 1;
$filename = $row['id'] . "-" . $counter . '.pdf';

while(file_exists($filename))
{
	$counter++;
	$filename = $row['id'] . "-" . $counter . '.pdf';
}

$content = $pdf->Output($filename, 'F');

$fp      = fopen($filename, 'r');
$content = fread($fp, filesize($filename));
$content = addslashes($content);
fclose($fp);

$sql = "INSERT INTO user_hv_pdfs (user_id, hv_pdf,designated_id) values(".$_POST['person_id'].", '".$content."','".$_SESSION['uname']."')";
//echo $sql;
$result = mysql_query($sql) or die(mysql_error());
if($result)
	echo 1;
else 
	echo 0;
	
if( $_POST['payment_check'] == 'YES' )
{
	unlink($img1);
	unlink($img2);
}
		
unlink($filename);
		
?>