<?php
	include "expire.php";
	require_once('connectDB.php');
	
	$fn	 		=	$_REQUEST['fn'];
	$ln 		=	$_REQUEST['ln'];
	$mn 		=	$_REQUEST['mn'];
	$st1		=	$_REQUEST['st1'];
	$st2		=	$_REQUEST['st2'];
	$city		=	$_REQUEST['city'];
	$state		=	'Virginia';
	$zip		=	$_REQUEST['zip'];
	$email		=	$_REQUEST['email'];
	$homeph		=	$_REQUEST['homeph'];
	$cellph		=	$_REQUEST['cellph'];
	$dementia	=	$_REQUEST['dementia'];
	$internet	=	$_REQUEST['internet'];
	$english	=	$_REQUEST['english'];
	$study		=	$_REQUEST['study'];
	$notes		= 	$_REQUEST['notes'];
	if($cellph == "")
	{
		$cellph = 0;
	}
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$memberid		= 	$_SESSION['uid'];
	
	$date = date_create();
	$date = date_format($date, 'U')*1000;
	
	// Begin Transactions
	mysql_query("BEGIN") or die (mysql_error());
	
	// First Insert him/her to users
	$sql = "insert into users(fname, lname, mname, email, st1, st2, city, state, zip, homeph, otherph, role_id, user_notes) values('$fn', '$ln', '$mn', '$email', '$st1', '$st2', '$city', '$state', '$zip', $homeph, $cellph, 3, '$notes')";
	$result = mysql_query($sql) or die (mysql_error());
	
	// Fetch user id
	$user_id = mysql_insert_id();
	
	if($result)
	{
		// Second Insert him/her to Pre - Users
		$sql1 = "INSERT INTO preusers(unpaid_caregiver, internet_access, eng_prof, qualifies, date_created, date_modified, registered_by, modified_by, user_id) VALUES($dementia, $internet, $english, $study, '$date', '$date', $memberid, $memberid, $user_id)";
		//echo $sql1;
		$result1 = mysql_query($sql1) or die (mysql_error());
		
		if($result1)
		{
			if($study)
			{
				// If qualified then give him the user_credentials
				$uname 	= strtolower (substr($fn,0,1).substr($ln,0,7));
				
				$usql = "select count(*) numb from user_credentials where uname like '$uname%'";
				$uresult = mysql_query($usql) or die (mysql_error());
				$urow = mysql_fetch_row($uresult);
				$uname = $uname."".($urow[0]+1);
				
				$pwd 	= md5("password");
				$sql2 = "INSERT INTO user_credentials(uname, `pwd`, user_id) values('$uname', '$pwd', $user_id)";
				
				$result2 = mysql_query($sql2) or die(mysql_error()); 
				
				if($result2)
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
				echo 1;
				mysql_query("COMMIT") or die (mysql_error());
			}
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
	}
?>