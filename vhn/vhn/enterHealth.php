<?php 
	include "expire.php";
	
	require_once('connectDB.php');
	$title = $_REQUEST['quest_id'];
	$content = $_REQUEST['content'];
	$link = $_REQUEST['video_link'];
	$date = date("m.d.y");
	$qcat = $_REQUEST['quest_category'];

	$sql = "INSERT INTO health_edu_blog(title, content, video_link, date, q_cat_id) VALUES( '".$title."', '".$content."','".$link."','".$date."','".$qcat."')";

	$result = mysql_query($sql) or die();
	$sql = "update askprofessional set status='answered' where id=$title";

	$result = mysql_query($sql) or die();

	header("Location: addHealthPost.php");
?>