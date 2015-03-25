<?php
include 'connectDB.php';

	$sql = "SELECT id,fname,lname,role_id,st1,count(st1) FROM users group by st1 having role_id=3 and count(st1)<2;";

	$results = mysql_query($sql) or die(mysql_error());
	
	$found = mysql_num_rows($results);

	$i=0;
	
	while($row = mysql_fetch_array($results))
	{

		echo $row['st1']."<br/>";
	
		$users[$i]=$row['fname'].' '.$row['lname'];
		$i++;
	}
	
	var_dump($users);
	
	for($i=0;$i<5;$i++)
	{
	shuffle($users);
	}
	var_dump($users);
	
	for($i=0,$k=0;$i<sizeof($users);$k++)
	{
	$group1[$k]=$users[$i];
	$i++;
	$group2[$k]=$users[$i];
	$i++;
	}
	
	var_dump($group1);
	var_dump($group2);
	
	$sql = "SELECT st1 from users u group by st1 having count(st1)=2";
	
	$results = mysql_query($sql) or die(mysql_error());
	$i=0;
	
	
	while($row = mysql_fetch_array($results))
	{

		echo $row['st1']."<br/>";
	
		$pairs[$i]=$row['st1'];
		$i++;
	}
	
	var_dump($pairs);
	$group11;
	$group22;
 
	for($i=0;$i<sizeof($pairs);$i++)
	{
		
		if(rand(1,2)==1)
		{	
		
		$group11[$i]=$pairs[$i];
			
		}
		
		else
		{
			$group22[$i]=$pairs[$i];
		}
		
		
	}
	
	var_dump($group11);
	var_dump($group22); 
	
	
	
?>