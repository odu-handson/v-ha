<?php 
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
		
	$userID = $_SESSION['uid'];
	
	if(isset($_POST['section']))
	{
		$section = $_POST['section'];
		
		$id = $_POST['em_id'];
		
		if($section == "material")
		{
			$sql = "update user_education_material set material=1 where education_material_id=".$id." and user_id=".$userID;
						
			$result = mysql_query($sql) or die(mysql_error());
			
			if($result)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
		if($section == "knowledge")
		{	
			$sql = "update user_education_material set knowledge=1 where education_material_id=".$id." and user_id=".$userID;
					
			$result = mysql_query($sql) or die(mysql_error());
			
			if($result)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
		if($section == "activity")
		{
			$sql = "update user_education_material set activity=1 where education_material_id=".$id." and user_id=".$userID;
					
			$result = mysql_query($sql) or die(mysql_error());
			
			if($result)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
	}
?>