<?php

include 'connectDB.php';
$uid = $_REQUEST['uid'];
$sid = $_REQUEST['sid'];
$ans = addslashes($_REQUEST['ans']);

$sql = "INSERT INTO surveyanswers(uid, surveyid, answers,time) VALUES( ".$uid.", ".$sid.",'".$ans."',now())";


$result = mysql_query($sql) or die(mysql_error());

if($result == 1)
{
if($sid == 6)
{
	sleep (5);
	header("Location: ../home.php");
}
else
header("Location:../beginSurveys.php?form_id=".($sid+1));

}
else
echo 'Technical Failure! Please resubmit the survey';
?>