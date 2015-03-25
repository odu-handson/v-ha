<?php 
	
	include "expire.php";

	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$city = $_REQUEST['city'];
	$role_id = $_REQUEST['role_id'];
	$qualifies = $_REQUEST['qualifies'];
	/* $approval_status = $_REQUEST['approval_status']; */
	if(isset($_REQUEST['sort'])) $sort = $_REQUEST['sort'];
	if(isset($_REQUEST['direction'])) $direction = $_REQUEST['direction'];
	
	if($fname == '') $fname = '%';
	if($lname == '') $lname = '%';
	if($city == '') $city = '%';
	if($role_id == 0) $role_id = '%';
	if($qualifies == -1)	$qualifies = '%';
	/* if($approval_status == -1)	$approval_status = '%'; */
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	$current_id = $_SESSION['uid'];
	
	require_once('connectDB.php');
	// Use This
	if($role_id == "3")
	{
		$sql = "select u.id, u.fname, u.lname, u.email, u.homeph, u.role_id, IFNULL(length(u.member_comments),0) mem_cmts from users u, preusers p where u.id=p.user_id and u.fname like '$fname%' and u.lname like '$lname%' and u.city like '$city%' and u.role_id like '$role_id' and p.qualifies like '$qualifies' and u.role_id != 4";
	}
	else if($role_id == "4")
	{
		$sql = "select 
					u.id,
					u.fname,
					u.lname,
					u.email,
					u.homeph,
					u.role_id,
					IFNULL(length(u.member_comments), 0) mem_cmts
				from
					users u,
					moreusers p
				where
					u.id = p.user_id
						and u.fname like '$fname%'
						and u.lname like '$lname%'
						and u.city like '$city%'
						and u.id = p.user_id";
		//$sql = "select u.id, u.fname, u.lname, u.email, u.homeph, u.role_id, IFNULL(length(u.member_comments),0) mem_cmts from users u, preusers p where u.id=p.user_id and u.fname like '$fname%' and u.lname like '$lname%' and u.city like '$city%' and u.role_id like '$role_id' and p.qualifies like '$qualifies' and u.role_id != 4";
	}
	else
	{
		$sql = "select id, fname, lname, email, homeph, role_id, IFNULL(length(member_comments),0) mem_cmts from users where fname like '$fname%' and lname like '$lname%' and city like '$city%' and role_id like '$role_id'"; //and id!=$current_id;
		//echo $sql;
	}
	
	if(isset($sort))
	{	
		$sql .= " ORDER BY ".$sort;
		
		if($direction==$sort)
		{
			$sql .= " DESC";
			echo "<input type=\"hidden\" id=\"sorted\" name=\"\">";
		}	
		else
		{
			echo "<input type=\"hidden\" id=\"sorted\" name=".$sort.">";
		}
	}
	else
	{
		echo "<input type=\"hidden\" id=\"sorted\" name=\"\">";
	}
	
	echo '<div class="preUser_title_header">
			<span class="name"><div class="sort" id="fname"> Name ';

	if(isset($sort))
	{
		if($sort=='fname')
		{
			if($direction==$sort)
			{
				//Descending
				echo '<img src="imgs/down.bmp" style="width:5%;"> ';
			}
			else
			{
				//Ascending
				echo '<img src="imgs/up.bmp" style="width:5%;"> ';
			}
		}
	}
	
	echo '</div></span>';
	
	echo '
			<span class="phone"><div class="sort" id="homeph"> Contact '; 
	
	if(isset($sort))
	{
		if($sort=='homeph')
		{
			if($direction==$sort)
			{
				//Descending
				echo '<img src="imgs/down.bmp" style="width:5%;"> ';
			}
			else
			{
				//Ascending
				echo '<img src="imgs/up.bmp" style="width:5%;"> ';
			}
		}
	}
	
	echo '</div></span>';
	
	echo '
			<span class="email"><div class="sort" id="email"> Email '; 
	
	if(isset($sort))
	{
		if($sort=='email')
		{
			if($direction==$sort)
			{
				//Descending
				echo '<img src="imgs/down.bmp" style="width:5%;"> ';
			}
			else
			{
				//Ascending
				echo '<img src="imgs/up.bmp" style="width:5%;"> ';
			}
		}
	}
	
	echo '</div></span>
						<!--<span style="position: absolute; right: 85px;">--><img style="position: absolute; right: 85px;" class="send" id="allEmail" src="imgs/mailIcon.png"/><!--</span>-->
					</div>';
	
	$id_container = "";
	
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		echo'<div id="'.$row['id'].'" class="preUser_box">
				<div class="preUser_title">
					<div class="title_content">
						<img class="img_role" id="'.$row['id'].'" src="imgs/';
						if($row['role_id'] == 1)
						{
							echo 'Admin';
							
							$id_container .= $row['id'].',';
						}
						else if($row['role_id'] == 2) 
						{
							echo 'Grant Administrator';
						
							$id_container .= $row['id'].',';
						}
						else if($row['role_id'] == 3)
						{
							
							
							$curr = $row['id'];
							$sql2 = "select p.qualifies from users u, preusers p where u.id=p.user_id and u.id=$curr;";
							$result2 = mysql_query($sql2) or die(mysql_error());
							while($row2 = mysql_fetch_array($result2))
							{
								switch($row2['qualifies'])
								{
									// Not Qualified
									case 0: 
									{
										$id_container .= $row['id'].',';
										echo 'Participant';
									}
											break;
									// Qualified
									case 1: echo 'Participant';
											break;
									// Rejected
									case 2: echo 'refusedParticipant';
											break;
									// Withdrawn
									case 3: echo 'withdrawnParticipant';
											break;
									/* default: echo 'Participant'; */
								}
							}
							
						}
						else
						{
							echo 'Participant';
						}
						echo 'Icon.png" style="width: 24px; height:24px;" float: left; />
						<span class="name"> '.$row['fname'].' '.$row['lname'].'</span>
						<span class="phone">  '; if($row['homeph'] == 0000000000) echo 'N/A'; else echo preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['homeph']); echo '</span>
						<span class="email"> <a>'.$row['email'].'</a></span>
						<span style="float:right; visibility: hidden;" class="role">';
						if($row['role_id'] == 1) echo 'Admin';
						else if($row['role_id'] == 2) echo 'Grant Administrator';
						else if($row['role_id'] == 4) echo 'Future Participants';
						else echo 'Participant';
						echo '</span>';
						//echo "ugujghgjhgjhjhk"+$row['role_id'];
						/* if($row['role_id'] == 4)
						{
							//echo "ugujghgjhgjhjhk"+$row['role_id'];
							$sql2 = "select m.approved from users u, moreusers m where u.id=m.user_id and u.id=".$row['id'];
								
							$result2 = mysql_query($sql2) or die(mysql_error());
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<input type="hidden" class="approval_status" value="'.$row2[0].'" />';
							}
						} */
			echo '	</div>
					<img class="log" id="'.$row['id'].'" src="imgs/login.png" style="height:24px; width=24px; float:right; margin-top:-45px; margin-right: 100px;"/>
					<img class="send" id="'.$row['id'].'" src="imgs/mailIcon.png"/>
					<img class="preUserInfo" id="'.$row['id'].'" src="imgs/';
					if($row['mem_cmts'] == 0)
					echo 'boringIcon';
					else echo 'noteIcon';
					echo '.png" style="width: 24px; height:24px; float:right" />
				</div>
			</div>';
	}

	if(strlen($id_container) > 0)
	{
		$id_container = substr($id_container, 0, strlen($id_container) - 1);
	}	
		echo '<input type="hidden" id="id_container" value="'.$id_container.'"/>';
?>