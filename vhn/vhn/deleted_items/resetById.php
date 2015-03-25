<?php
	include "expire.php";
	include "loginStatus.php";
	$email = $_REQUEST['email'];
	$token = uniqid();
	$link = "http://http://v-ha.org/vhnDev_New/reset.php?token=".$token;

    $from = '';
    $phone = '';
    $name = 'User';
    $appName ='';
    $subject = "V-HA CONTACT EMAIL";
    $to = $email;
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "Content-Transfer-Encoding: 7bit\r\n";
	$name = $name. ",\n";
    $fromString = "-f " . $from;
    $send = 'Please click on the link below to reset your password '.$link. $name . $from;
	echo mail($to, $subject, $send, $headers, $fromString);


?>
