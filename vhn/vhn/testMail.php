<?php

$to = 'sjagarla@cs.odu.edu';
$subject = "CS476: Bad Weather";
$message = "Hello All, Class has been cancelled due to bad weather.";

$from = "wahab@cs.odu.edu";
$headers = 	'From: wahab@cs.odu.edu' . "\r\n" .
			'Content-type: text/html; charset=utf-8' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$sent = mail($to,$subject,$message,$headers);
if($sent)
	echo "1";
else
	echo "0";
?>