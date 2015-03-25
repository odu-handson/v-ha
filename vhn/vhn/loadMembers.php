<?php
	include "expire.php";
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	require_once("connectDB.php");
	echo '<br /> <div class="member_title_header">
						<span class="name"> Name </span>
						<span class="city"> User Name </span>
						<span class="email"> Email </span>
						<span class="phone"> Roles </span>
						<span style="text-align: center; position: absolute; float: right"> Status </span>
					</div>';
	if($_SESSION['role'] == 1)
	{
		$sql = "select u.id id, u.fname fname, u.lname lname, u.role_id role_type, u.email email, uc.uname uname, uc.status status from users u, user_credentials uc where role_id!=1  and role_id!=3 and u.id = uc.user_id";
	}
	if($_SESSION['role'] == 2)
	{
		$sql = "select id,fname,lname,email from users where role_id!=2 and role_id!=1";
	}
	$results = mysql_query($sql) or die(mysql_error());
	$i=1;
	while($row = mysql_fetch_array($results))
	{
		echo ' 
			<div class="preUser_box">
				<div class="preUser_title">
					<div class="title_content">
						<Span> '.$row['fname'].' '.$row['lname'].'</span>
						<Span> '.$row['uname'].'</span>
						<Span>'.$row['email'].'</span>
					';
					
				
				if($row['role_type'] == 2)
				{
					$sql1 = "SELECT rt.category, us.user_id FROM user_subroles us, role_type rt where us.subrole_id = rt.id and us.user_id=".$row['id'];
					$results1 = mysql_query($sql1) or die(mysql_error());
					echo '<Span> '; 
					if(count($results1))
					{
						while($row1 = mysql_fetch_array($results1))
						{
							echo $row1['category'].',';
						}
					}
					else echo 'N/A';
					echo '</span>';
				}
				
				echo '<div class="memberStatus" style="'; if($row['status'] == '1')
					echo 'background-color: #00AF33;';
				else 
					echo 'background-color: #EE0000;';	echo '">
						</div>';
				
			echo '</div>
				</div>
				</div>
		';
		$i++;
	}
?>