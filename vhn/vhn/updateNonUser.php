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
	$prev_role 	=   $_REQUEST['prev_role'];
	//$current_role = $_REQUEST['current_role'];
	
	if($_POST['role'] == '6') 
	{
		$role = 1;
	}
	else
	{
		$role = 2;
		$roles = $_POST['role'];
	}
	
	// Begin the transaction
	$query = "BEGIN";
	mysql_query($query) or die (mysql_error());
	
	// General details Update
	$sql = "update users set email='$email', st1='$st1', st2='$st2', city='$city', zip='$zip', homeph='$homeph', otherph='$cellph', role_id=$role where id = $user_id";
	$id = mysql_query($sql) or die (mysql_error());
	if($id)
	{
		if($prev_role == $role)
		{
			if($role == 1)
			{
				// Commit
				$query = "COMMIT";
				mysql_query($query) or die (mysql_error());
				echo 1;
			}
			else
			{
				// delete all previous member roles
				$sql1 = "delete from user_subroles where user_id = $user_id";
				$id1 = mysql_query($sql1) or die (mysql_error());
				if(!$id1)
				{
					// Rollback
					$query = "ROLLBACK";
					mysql_query($query) or die (mysql_error());
					echo 0;
				}
				else
				{
					// insert the member sub roles
					$insert_status = 1;
					$roles_array = explode(",", $roles);
					//var_dump($roles_array);
					for($i=0; $i<count($roles_array); $i++)
					{
						$rid = $roles_array[$i];
						$sql2 = "insert into user_subroles(user_id, subrole_id) values($user_id,$rid);";
						$id2 = mysql_query($sql2) or die(mysql_error());
						if(!$id2)
						{
							$insert_status = 0;
						}
					}
					if($insert_status)
					{
						// Commit
						$query = "COMMIT";
						mysql_query($query) or die (mysql_error());
						echo 1;
					}
					else
					{
						// Rollback
						$query = "ROLLBACK";
						mysql_query($query) or die (mysql_error());
						echo 0;
					}
				}
			}
		}
		else
		{
			// Role changed -- Now here is fun!
			if($role == 1) // Make him Admin
			{
				// delete all previous member roles
				$sql1 = "delete from user_subroles where user_id = $user_id";
				$id1 = mysql_query($sql1) or die (mysql_error());
				if($id1)
				{
					// Commit
					$query = "COMMIT";
					mysql_query($query) or die (mysql_error());
					echo 1;
				}
				else
				{
					// Rollback
					$query = "ROLLBACK";
					mysql_query($query) or die (mysql_error());
					echo 0;
				}
			}
			else // Demote this guy to a Grant Administrator
			{
				// insert the member sub roles
				$insert_status = 1;
				$roles_array = explode(",", $roles);
				//var_dump($roles_array);
				if($role == 2)
				{
					for($i=0; $i<count($roles_array); $i++)
					{
						$rid = $roles_array[$i];
						$sql2 = "insert into user_subroles(user_id, subrole_id) values($user_id,$rid);";
						$id2 = mysql_query($sql2) or die(mysql_error());
						if(!$id2)
						{
							$insert_status = 0;
						}
					}
				}
				if($insert_status)
				{
					// Commit
					$query = "COMMIT";
					mysql_query($query) or die (mysql_error());
					echo 1;
				}
				else
				{
					// Rollback
					$query = "ROLLBACK";
					mysql_query($query) or die (mysql_error());
					echo 0;
				}
			}
			
		}
	}
	else
	{
		// Rollback
		$query = "ROLLBACK";
		mysql_query($query) or die (mysql_error());
		echo 0;
	}
?>