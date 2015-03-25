<?php

session_start()	;

	if($_SESSION['loggedin'] != 'yes')
	{    
		$val = $_SESSION['loggedin'];
		echo "$val";
		header("location:index.php");
	}
?>

<?php
	include 'config.php';
	$filename ="Tidewater Science Fair Database 2014.xls";
	$contents = "Project Id \t Student First Name \t Student last name \t Grade \t Division \t Gender \t Judging Category \t Home School \t School Division \t Project Title \t Teacher\Sponsor \t Sponsor E-Mail Contact \t Entered By \t Team \t \n";
	
	header('Content-type: application/vnd.ms-excel');
	header("Content-Transfer-Encoding: binary ");
	header('Content-Disposition: attachment; filename='.$filename);
	
	$query_cat="select * from category order by cat_id";
	$categories=mysql_query($query_cat)
		or die(mysql_error());
	
		$query_stu="select * from stu_dcp_2014 where status!='rejected' order by proj_id";
		
		$students=mysql_query($query_stu)
			or die(mysql_error());
		$cnt = 0;
		while ($student=mysql_fetch_assoc($students)) 
		{
			if(strtoupper($student['division']) == "JUNIOR")
				$category = "J".$student['cat_id'];
			else
				$category = "S".$student['cat_id'];
			$contents = $contents.$student['proj_id']."\t".$student['fname']." \t ".$student['lname']." \t ".$student['grade']
			." \t ".$student['division']." \t ".$student['gender']." \t ".$category." \t ".$student['home_school']." \t ".$student['school_div']
			." \t ".$student['title']." \t ".$student['sponsor']." \t ".$student['sponsor_email']." \t ".$student['DesignatedPersonalID']
			." \t ".$student['team']." \t \n";
		}
	echo $contents;
	
 ?>