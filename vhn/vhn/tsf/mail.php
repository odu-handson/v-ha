<?php

	include 'config.php';

	$sql = "select userid,lname,fname,email from users_2014_new where userid=103";
	//echo $sql;
	$results = mysql_query($sql) or die(mysql_error());

	while($row = mysql_fetch_array($results))
		{


	
	$to = $row['email'];
	$array = array( 0 => 'studentdatabase.xls', 1 => 'directions_for_spreadsheet_dec_2014.doc');
	$from = 'wmcco001@odu.edu';
	
	
	$ack=multi_attach_mail($to,$array,$from,$row['userid'],$row['fname'],$row['lname']);
	echo $ack."sent to ".$row['userid'];	
		}
	

function multi_attach_mail($to, $files, $sendermail,$id,$fname,$lname){
    // email fields: to, from, subject, and so on
    $from = "William McConnell <".$sendermail.">";
    $subject = "TIDEWATER SCIENCE AND ENGINEERING FAIR ";
    $message = "Happy Holidays ".$fname." ".$lname.",\n\nFirst of all, I would like to thank you for inspiring your students to take part in authentic science and engineering practices. I am excited to see the wonderful work they have been up to this year.\n\nThis email contains important directions for uploading the Student Spreadsheet for all of your applicants, your personal username and password required to upload your completed Student Spreadsheet, and other important dates and information related to the 2014 Tidewater Science and Engineering Fair. Please read through the information carefully. If you have any questions, don't hesitate to contact me at wmcco001@odu.edu or by phone at 757-632-1255. Any technical issues should be directed to sjagarla@cs.odu.edu.\n\n
	Your Username : ".$id.$lname."\n\tPassword : ".$fname.$id."\n\nThanks,\nWilliam McConnell\nTSEF Executive Director\nOld Dominion University\n";
    $headers = "From: $from";
	$to = $to;
    // boundary
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
    // headers for attachment
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
 
    // multipart boundary
    $message = "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
 
    // preparing attachments
    for($i=0;$i<count($files);$i++){
		
		
        if(is_file($files[$i])){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($files[$i],"rb");
        $data =    @fread($fp,filesize($files[$i]));
                    @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($files[$i])."\"\n" .
            "Content-Description: ".basename($files[$i])."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($files[$i])."\"; size=".filesize($files[$i]).";\n" .
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
        }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $sendermail;
    $ok = @mail($to, $subject, $message, $headers, $returnpath);
    if($ok){ return $i; } else { return 0; }
    }
	
	
	
?>