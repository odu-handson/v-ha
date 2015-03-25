<?php
	include "expire.php";
	require_once('connectDB.php');
	
	$user_id	=	$_REQUEST['id'];
	$fname		=	$_REQUEST['fname'];
	$lname		=	$_REQUEST['lname'];
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
	$member_id =	$_SESSION['uid'];
	//echo $memberid
	
	//First update
	// Begin Transactions
	mysql_query("BEGIN") or die (mysql_error());
	$sql = "update users set email='$email', st1='$st1', st2='$st2', city='$city', zip='$zip', homeph='$homeph', otherph='$cellph' where id = $user_id";
	$result = mysql_query($sql) or die (mysql_error());
	
	if($result)
	{
		$sql1 = "update preusers set unpaid_caregiver=$dementia, internet_access=$internet, eng_prof=$english, qualifies=$study, date_modified=$date, modified_by=$member_id where user_id = $user_id";
		$result1 = mysql_query($sql1) or die (mysql_error());
		if($result1)
		{
			// Updated users and preusers successfully
			
			// Check the qualify status 
			if($study == 1)
			{
				// Qualified
				if($uname == '0')
				{
					// Create Username here 
					$uname 	= strtolower (substr($fname,0,1).substr($lname,0,7));
				
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
					$sql2 = "update user_credentials set status=1 where user_id=$user_id";
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
				
			}
			else
			{
				// Not - Qualified
				// Check the uname exists or not
				if($uname == '0')
				{
					mysql_query("COMMIT") or die (mysql_error());
					echo 1;
				}
				else
				{
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