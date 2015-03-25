<?php 

	require_once('connectDB.php');

	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$em_id = $_POST['em_id'];
	$uid = $_POST['uid'];
	
	if(isset($_POST['last']))
	{
		$last = $_POST['last'];
		
		if($last != -1)
		{
			$sql_d = "delete from education_material_times where id=".$last;
		
			mysql_query($sql_d) or die(mysql_error());
		}
	}

	$sql = "insert into education_material_times(education_material_id, user_id, start_time, end_time) values(".$em_id.",".$uid.",".$start_time.",".$end_time.")";
						
	mysql_query($sql) or die(mysql_error());

	$sql2 = "select max(id) last from education_material_times where user_id=".$uid;
	
	$result = mysql_query($sql2) or die(mysql_error());
	
	$row = mysql_fetch_array($result);
	
	echo $row['last'];
?>