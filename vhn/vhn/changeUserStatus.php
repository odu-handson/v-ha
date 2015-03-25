<?php
	require_once("connectDB.php");
	
	$user_id = $_REQUEST['id'];
	$status = $_REQUEST['status'];
	$notes = $_REQUEST['notes'];
	
	mysql_query("BEGIN") or die (mysql_error());
	if($status == "Reject")
		$sql = "update preusers set qualifies = 2 where user_id=$user_id";
	else if($status == "Approve")
		$sql = "update preusers set qualifies = 1 where user_id=$user_id";
	else if($status == "Withdraw")
		$sql = "update preusers set qualifies = 3 where user_id=$user_id";
	$id = mysql_query($sql) or die (mysql_error());
	if($id)
	{
		$sql1 = "update users set member_comments='$notes' where id=$user_id";
		$id1 = mysql_query($sql1) or die (mysql_error());
		if($id1)
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
		mysql_query("ROLLBACK") or die (mysql_error());
		echo 0;
	}
?>