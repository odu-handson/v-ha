<?php
    include "expire.php";

    $body = $_REQUEST['message'];
    $from = $_REQUEST['email'];
    $phone = '';
    $name = $_REQUEST['name'];
    $appName ='';
    $subject = "V-HA CONTACT EMAIL";
    $to = "sjagarla@cs.odu.edu";
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "Content-Transfer-Encoding: 7bit\r\n";
	$name = $name. ",\n";
    $fromString = "-f " . $from;
    $send = $body . "\n\n" . $name . $from;
	echo mail($to, $subject, $send, $headers, $fromString);
	/*
    if(mail($to, $subject, $send, $headers, $fromString))
		echo 1;
	else 
	{
		$error = error_get_last();
		echo preg_match("/\d+/", $error["message"], $error);
		echo 0;
	}
	//header("Location: contactwin.php");
*/
?>
