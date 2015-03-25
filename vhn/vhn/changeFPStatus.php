<?php
	require_once("connectDB.php");
	
	$user_id = $_REQUEST['id'];
	$status = $_REQUEST['status'];
	$notes = $_REQUEST['notes'];
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	
	$memberid		= 	$_SESSION['uid'];
	
	$date = date_create();
	$date = date_format($date, 'U')*1000;
	
	mysql_query("BEGIN") or die (mysql_error());
	if($status == "Reject")
	{
		$sql11 = "update moreusers set approved=0 where user_id=$user_id";
		$id11 = mysql_query($sql11) or die(mysql_error());
		if($id11)
		{
			ob_start();
			include 'updateMemNotes.php?id='.$user_id.'&notes='.$notes;
			$id2 = ob_get_clean();
			if($id2)
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
			mysql_query("ROLLBACK") or die (mysql_error());
			echo 0;
		}
	}
	else
	{
		$sql = "update moreusers set approved=1 where user_id=$user_id";
		
		$id = mysql_query($sql) or die (mysql_error());
		if($id)
		{
			$sql1 = "update users set role_id=3, member_comments='$notes' where id=$user_id";
			$id1 = mysql_query($sql1) or die (mysql_error());
			if($id1)
			{
				ob_start();
				include 'updateMemNotes.php?id='.$user_id.'&notes='.$notes;
				$id2 = ob_get_clean();
				if($id2)
				{
					$sql2 = "insert into preusers(unpaid_caregiver, internet_access, eng_prof, qualifies, date_created, date_modified, registered_by, user_id, modified_by) values(1, 1, 1, 1, '$date', '$date', $memberid, $user_id, $memberid)";
					$id22 = mysql_query($sql2) or die (mysql_error());
					if($id22)
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
					mysql_query("ROLLBACK") or die (mysql_error());
					echo 0;
				}
			}
			else
			{
				mysql_query("ROLLBACK") or die (mysql_error());
				echo 0;
			}			
		}
		else 
		{
			mysql_query("ROLLBACK") or die (mysql_error());
			echo 0;
		}
	}
?>