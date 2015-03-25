<?php
	include 'connectDB.php';

	$fn	 		=	$_REQUEST['fn'];
	$ln 		=	$_REQUEST['ln'];
	$mn 		=	$_REQUEST['mn'];
	//$gender 	=	$_REQUEST['gender'];
	$st1		=	$_REQUEST['st1'];
	$st2		=	$_REQUEST['st2'];
	$city		=	$_REQUEST['city'];
	$zip		=	$_REQUEST['zip'];
	$email		=	$_REQUEST['email'];
	$homeph		=	$_REQUEST['homeph'];
	$cellph		=	$_REQUEST['cellph'];
	$interest	=	$_REQUEST['interest_for'];
	$carefor	=	$_REQUEST['carefor'];
	$careext1	=	$_REQUEST['careext1'];
	$careext2	=	$_REQUEST['careext2'];
	$age		=	$_REQUEST['age'];
	$caregender	=	$_REQUEST['caregender'];
	$livewith	=	$_REQUEST['livewith'];
	$notes		=	$_REQUEST['notes'];
	
	$interest_split="";
	
	$date = date_create();
	$date = date_format($date, 'U')*1000;

	for($i=0, $size = count($interest); $i<$size; $i++)
	{
		$temp = $interest[$i]. ";";
		$interest_split .= $temp; 
	}
	
	if($cellph == "")
	$cellph = 0;
	
	// Begin Transactions
	mysql_query("BEGIN") or die (mysql_error());
	
	// First Insert him/her to users
	$sql = "insert into users(fname, lname, mname, email, st1, st2, city, zip, homeph, otherph, role_id, user_notes) values('$fn', '$ln', '$mn', '$email', '$st1', '$st2', '$city', $zip, $homeph, $cellph, 3, '$notes')";

	$result = mysql_query($sql) or die (mysql_error());
	
	// Fetch user id
	$user_id = mysql_insert_id();
	
	if($result)
	{
		// Second Insert him/her to Pre - Users
		$sql1 = "INSERT INTO moreusers(interest_for, caregiver_for, cg_specific_type, cg_need_type, age_caring_for, gender_caring_for, live_with_person, date_created, user_id) VALUES('".$interest_split."','".$carefor."','".$careext1."','".$careext2."',".$age.",'".$caregender."','".$livewith."',".$date.", $user_id)";
		$result1 = mysql_query($sql1) or die (mysql_error());
		
		if($result1)
		{
			echo 1;
			mysql_query("COMMIT") or die (mysql_error());
		}
		else
		{
			echo 0;
			mysql_query("ROLLBACK") or die (mysql_error());
		}
	}
	else
	{
		echo 0;
		mysql_query("ROLLBACK") or die (mysql_error());
	}
?>