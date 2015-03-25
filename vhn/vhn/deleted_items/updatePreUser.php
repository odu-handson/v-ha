<?php
	require_once('connectDB.php');
	$user_id	=	$_REQUEST['id'];
	$st1		=	$_REQUEST['st1'];
	$st2		=	$_REQUEST['st2'];
	$city		=	$_REQUEST['city'];
	$zip		=	$_REQUEST['zip'];
	$email		=	$_REQUEST['email'];
	$homeph		=	$_REQUEST['homeph'];
	$cellph		=	$_REQUEST['cellph'];
	$uname		=	$_REQUEST['uname'];
	$dementia	=	$_REQUEST['dementia'];
	$internet	=	$_REQUEST['internet'];
	$english	=	$_REQUEST['english'];
	$study		=	$_REQUEST['study'];
	
	// Fetch current time
	$date = date_create();
	$date = date_format($date, 'U')*1000;
	
	// Fetch Current PI
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	$memberid		= 	$_SESSION['uid'];
	
	//First update
	// Begin Transactions
	mysql_query("BEGIN") or die (mysql_error());
	$sql = "update users set email='$email' where id = $user_id";
	$result = mysql_query($sql) or die (mysql_error());
	
	if($result)
	{
		$sql1 = "update preusers set st1='$st1', st2='$st2', city='$city', zip='$zip', homeph='$homeph', otherph='$otherph', unpaid_caregiver=$dementia, internet_access=$internet, eng_prof=$english, qualifies=$study, date_modified=$date, modified_by=$member_id where user_id = $user_id";
		$result1 = mysql_query($sql1) or die (mysql_error());
		if($result1)
		{
			// Check whether the user has a username
			if($uname == 0)
			{
				// User not qualified early
				if($study == 1)
				{
					// Currently Qualified
					
					
					
					/*
					// Check the user is disabled earlier
					$sql2 = "select count(*) count from user_credentials where user_id=$user_id";
					$result2 = mysql_query($sql2) or die (mysql_error());
					$row = mysql_fetch_array($result2);
					$count = $row['count'];
					if($count)
					{
						// User already exist and disabled now 
						$sql2 = "select count(*) count from user_credentials where user_id=$user_id";
						$result2 = mysql_query($sql2) or die (mysql_error());
					}
					else
					{
						//User does not exists create one now
					}
					
					echo 1;
					 pending */
				}
				else
				{
					// Currently also not qualified - Only update Info
					mysql_query("COMMIT") or die (mysql_error());
					echo 1;
				}
			}
			else
			{
				// User qualified early
				if($study == 0)
				{
					// Currently Disqualified
					$sql2 = "update user_credentials set status=0 where user_id=$user_id";
					$result2 = mysql_query($sql2) or die (mysql_error());
					if($result2)
					{
						mysql_query("COMMIT") or die (mysql_error());
						echo 1;
					}
					else
					{
						mysql_query("ROLLBACK") or die (mysql_error());
						echo 0;
					}
				}
				else
				{
					// Currently also qualified - Only update Info
					mysql_query("COMMIT") or die (mysql_error());
					echo 1;
				}
			}
		}
		else
		{
			//Failed updating preusers table
			mysql_query("ROLLBACK") or die (mysql_error());
			echo 0;
		}
	}
	else
	{
		//Failed updating users table
		echo 0;
	}
?>