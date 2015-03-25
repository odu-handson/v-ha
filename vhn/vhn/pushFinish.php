<?php

include 'connectDB.php';
$qid = $_REQUEST['quest_id'];
$profid = $_REQUEST['concernedperson'];


$sql = "update askprofessional set prof_id=".$profid." where id =".$qid;

$result = mysql_query($sql) or die();

?>