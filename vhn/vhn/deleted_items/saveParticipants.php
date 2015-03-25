<?php

include 'connectDB.php';
$fname = $_REQUEST['firstname'];
$lname = $_REQUEST['lastname'];
$hphone = $_REQUEST['homephone'];
$email = $_REQUEST['emailaddress'];
$Internet = $_REQUEST['Internet'];
$English = $_REQUEST['English'];
$sql = "INSERT INTO collectdetails(fname, lname, homephone,cellphone, compaccess, englishproficiency) VALUES( '".$fname."', '".$lname."','".$hphone."','".$email."','".$Internet."','".$English."')";

$result = mysql_query($sql) or die();
header('Location: http://www.v-ha.org/vhnDev_new/collectDetails.php');

?>
