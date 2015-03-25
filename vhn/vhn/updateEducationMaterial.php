<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$em_id = $_POST['em_id'];
	
	$id = $_POST['id'];
	
	$text = $_POST['text'];
	
	if(isset($_POST['answer']))
	{
		$answer = $_POST['answer'];
	}
	
	if(isset($_POST['correct']))
	{
		$correct = $_POST['correct'];
	}
	
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}
	
	if($id == "mnew")
	{
		//insert
		$sql_o = "select max(ordering) ordering from em_material_review where education_material_id=".$em_id;
		
		$results_o = mysql_query($sql_o) or die(mysql_error());
		
		$row_o = mysql_fetch_array($results_o);
		
		if(is_null($row_o['ordering']))
		{
			$ordering = 1;
		}
		else
		{
			$ordering = $row_o['ordering'] + 1;
		}
		
		$sql = "insert into em_material_review (education_material_id, material, ordering) values (".$em_id.",'".$text."',".$ordering.")";
		
		$result = mysql_query($sql) or die(mysql_error());
		
		if($result)
		{
			$sql_a = "select max(id) newest from em_material_review where education_material_id=".$em_id;
			
			$results_a = mysql_query($sql_a) or die(mysql_error());
			
			$row_a = mysql_fetch_array($results_a);
			
			echo $row_a['newest'];
		}
		else
		{
			echo 0;
		}
	}
	else if($id == "knew")
	{
		//insert
		$sql_o = "select max(ordering) ordering from em_questions where education_material_id=".$em_id;
		
		$results_o = mysql_query($sql_o) or die(mysql_error());
		
		$row_o = mysql_fetch_array($results_o);
		
		if(is_null($row_o['ordering']))
		{
			$ordering = 1;
		}
		else
		{
			$ordering = $row_o['ordering'] + 1;
		}
		
		$type = 1;
		
		$sql = "insert into em_questions (education_material_id, question, type, ordering) values (".$em_id.",'".$text."',".$type.",".$ordering.")";
		
		$result = mysql_query($sql) or die(mysql_error());
		
		if($result)
		{
			$sql_a = "select max(id) newest from em_questions where education_material_id=".$em_id;
			
			$results_a = mysql_query($sql_a) or die(mysql_error());
			
			$row_a = mysql_fetch_array($results_a);
			
			for($i=0;$i<sizeof($answer);$i++)
			{
				if($correct[$i] == 'true')
				{
					$c = 1;
				}
				else
				{
					$c = 0;
				}
				
				$sql2 = "insert into em_answers (question_id, answer, correct, ordering) values (".$row_a['newest'].",'".$answer[$i]."',".$c.",".($i+1).")";
		
				$result2 = mysql_query($sql2) or die(mysql_error());
			}
			
			echo $row_a['newest'];
		}
		else
		{
			echo 0;
		}
	}
	else if($id == "cnew")
	{
		//insert
		$sql_o = "select max(ordering) ordering from em_activities where education_material_id=".$em_id;
		
		$results_o = mysql_query($sql_o) or die(mysql_error());
		
		$row_o = mysql_fetch_array($results_o);
		
		if(is_null($row_o['ordering']))
		{
			$ordering = 1;
		}
		else
		{
			$ordering = $row_o['ordering'] + 1;
		}
		
		$sql = "insert into em_activities (education_material_id, activity, ordering) values (".$em_id.",'".$text."',".$ordering.")";
		
		$result = mysql_query($sql) or die(mysql_error());
		
		if($result)
		{
			$sql_a = "select max(id) newest from em_activities where education_material_id=".$em_id;
			
			$results_a = mysql_query($sql_a) or die(mysql_error());
			
			$row_a = mysql_fetch_array($results_a);
			
			echo $row_a['newest'];
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		//update
		if($id[0] == 'm')
		{
			$new_id = substr($id, 1);
			
			$sql = "update em_material_review set material='".$text."' where id=".$new_id;
			
			$result = mysql_query($sql) or die(mysql_error());
			
			if($result)
			{			
				echo -1;
			}
			else
			{
				echo 0;
			}
		}
		else if($id[0] == 'k')
		{
			$new_id = substr($id, 1);
			
			$sql = "update em_questions set question='".$text."' where id=".$new_id;
			
			$result = mysql_query($sql) or die(mysql_error());
			
			if($result)
			{
				$sql_a = "select * from em_answers where question_id=".$new_id;
				
				$result_a = mysql_query($sql_a) or die(mysql_error());
				
				$i = 0;
				
				while($row_a = mysql_fetch_array($result_a))
				{
					if($i < sizeof($answer))
					{
						if($correct[$i] == 'true')
						{
							$c = 1;
						}
						else
						{
							$c = 0;
						}
						
						$sql_u = "update em_answers set answer='".$answer[$i]."',correct=".$c." where question_id=".$new_id." and ordering=".($i+1);
											
						mysql_query($sql_u) or die(mysql_error());
						
						$i++;
					}
					else
					{
						$sql_d = "delete from em_answers where id=".$row_a['id'];
						
						mysql_query($sql_d) or die(mysql_error());
						
						$i++;
					}
				}
				
				for($j=$i;$j<sizeof($answer);$j++)
				{
					if($correct[$j] == 'true')
					{
						$c = 1;
					}
					else
					{
						$c = 0;
					}
				
					$sql2 = "insert into em_answers (question_id, answer, correct, ordering) values (".$new_id.",'".$answer[$j]."',".$c.",".($j+1).")";
			
					$result2 = mysql_query($sql2) or die(mysql_error());
				}
				
				echo -1;
			}
			else
			{
				echo 0;
			}
		}
		else if($id[0] == 'c')
		{
			$new_id = substr($id, 1);
			
			$sql = "update em_activities set activity='".$text."' where id=".$new_id;
			
			$result = mysql_query($sql) or die(mysql_error());
			
			if($result)
			{			
				echo -1;
			}
			else
			{
				echo 0;
			}
		}
		else if($id[0] == 'd') //delete
		{
			$new_id = substr($id, 2);
			
			if($type == "material")
			{
				$sql_d = "delete from em_material_review where id=".$new_id;
			}
			else if($type == "knowledge")
			{
				$sql_k = "delete from em_questions where id=".$new_id;
				
				$result_k = mysql_query($sql_k) or die(mysql_error());
				
				$sql_d = "delete from em_answers where question_id=".$new_id;
			}
			else if($type == "activity")
			{
				$sql_d = "delete from em_activities where id=".$new_id;
			}
			
			$result_d = mysql_query($sql_d) or die(mysql_error());
			
			if($result_d)
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

















