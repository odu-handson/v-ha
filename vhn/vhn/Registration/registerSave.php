<?php
	require_once("../connectDB.php");
	
	if($_REQUEST['from'] == 'preUsers')
	{
		// From the pre-users form
		$preuser_id = $_REQUEST['preuser_id'];
		$sql = "select fname, lname, email from collectdetails where id=$preuser_id";
		$result = mysql_query($sql) or die (mysql_error());
		while($row = mysql_fetch_row($result))
		{
			$fname = $row[0];
			$lname = $row[1];
			$email = $row[2];
			$mname = "";
			$role = 3;
		}
	}
	else
	{
		// From the sign up users form
		$fname 	= $_POST['fname'];
		$lname 	= $_POST['lname'];
		$mname 	= $_POST['mname'];
		$email 	= $_POST['email'];
		$st1 	= $_POST['st1'];
		$st2 	= $_POST['st2'];
		$city 	= $_POST['city'];
		$zip 	= $_POST['zip'];
		$homeph = $_POST['homeph'];
		$cellph = $_POST['cellph'];
		
		if($_POST['role_r'] == '6') 
		{
			$role = 1;
		}
		else
		{
			$role = 2;
			$roles = $_POST['role_r'];
		}
	}
	
	$uname 	= strtolower (substr($fname,0,1).substr($lname,0,7));
	$usql = "select count(*) numb from user_credentials where uname like '$uname%'";
	$uresult = mysql_query($usql) or die (mysql_error());
	$urow = mysql_fetch_row($uresult);
	$uname = $uname."".($urow[0]+1);
	
	$pwd 	= md5("password");
	
	// Begin the transaction
	$query = "BEGIN";
	mysql_query($query) or die (mysql_error());
	
	$sql = "insert into users(fname, lname, mname, email, homeph, st1, st2, city, state, zip, otherph, role_id) values('$fname','$lname','$mname','$email','$homeph','$st1','$st2','$city','VA','$zip','$cellph','$role');";
	$id = mysql_query($sql) or die (mysql_error());
	if($id)
	{
		$sql1 = "select max(id) from users;";
		$id1 = mysql_query($sql1) or die (mysql_error());;
		$user_id = mysql_result($id1, 0, 0);
		
		$sql2 = "insert into user_credentials(uname, pwd, user_id) values('$uname','$pwd','$user_id');";
		$id2 = mysql_query($sql2) or die(mysql_error());
		
		if($id2)
		{
			// Commit
			$query = "COMMIT";
			mysql_query($query) or die (mysql_error());
			
			if(isset($roles))
			{
				$roles_array = explode(",", $roles);
				if($role == 2)
				{
					for($i=0; $i<count($roles_array); $i++)
					{
						$rid = $roles_array[$i];
						$sql2 = "insert into user_subroles(user_id, subrole_id) values($user_id,$rid);";
						$id2 = mysql_query($sql2);
					}
				}
			}
			
			if($_REQUEST['from'] == 'preUsers')
			{
				echo $user_id;
			}
			else
			{
				echo 1;
			}
		}
		else
		{
			// Rollback
			$query = "ROLLBACK";
			mysql_query($query) or die (mysql_error());
			echo 0;
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