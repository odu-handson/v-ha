<?php

include 'connectDB.php';
$uid = $_REQUEST['uid'];
$sid = $_REQUEST['sid'];
$ans = addslashes($_REQUEST['ans']);

$sql = "INSERT INTO surveyanswers(uid, surveyid, answers,time) VALUES( ".$uid.", ".$sid.",'".$ans."',now())";

$result = mysql_query($sql) or die();
 echo "Answers Saved !"

?>