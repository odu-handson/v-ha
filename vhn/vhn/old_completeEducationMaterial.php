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
			$answer = $_POST['answer'];
		
			$sql_a = "select a.correct from em_answers a, em_questions q where q.id=a.question_id and q.education_material_id=".$id." order by a.question_id, a.ordering;";
			
			$results_a = mysql_query($sql_a) or die(mysql_error());
			
			$counter = 0;
			
			$finish = true;
			
			while($row = mysql_fetch_array($results_a))
			{
				//echo $row['correct']." ".$answer[$counter]."</br>";
			
				if($row['correct'] != $answer[$counter])
				{
					$finish = false;
				}
				
				$counter++;
			}
			
			if($finish)
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
			else if(!$finish)
			{
				echo -1;
			}
			else
			{
				echo 0;
			}
		}
		if($section == "activity")
		{
			$activity = $_POST['activity'];
			
			$aid = $_POST['aid'];
			
			$finish = true;
						
			for($i=0;$i<sizeof($activity);$i++)
			{
				if($activity[$i] != 1)
				{
					$finish = false;
				}
					
				$sql_c = "update user_activities set complete=".$activity[$i]." where activity_id=".$aid[$i]." and user_id=".$userID;
				
				mysql_query($sql_c) or die(mysql_error());
			}
		
			if($finish)
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
			else if(!$finish)
			{
				echo -1;
			}
			else
			{
				echo 0;
			}
		}
	}
?>