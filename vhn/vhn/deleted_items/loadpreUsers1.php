<?php 
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$city = $_REQUEST['city'];
	$role_id = $_REQUEST['role_id'];
	$qualifies = $_REQUEST['qualifies'];
	
	if($fname == '') $fname = '%';
	if($lname == '') $lname = '%';
	if($city == '') $city = '%';
	if($role_id == 0) $role_id = '%';
	if($qualifies == 2)	$qualifies = '%';
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	$current_id = $_SESSION['uid'];
	
	require_once('connectDB.php');
	// Use This
	if($role_id == "3")
	{
		$sql = "select u.id, u.fname, u.lname, u.email, u.homeph, u.role_id, IFNULL(length(u.member_comments),0) mem_cmts from users u, preusers p where u.id=p.user_id and u.fname like '$fname%' and u.lname like '$lname%' and u.city like '$city%' and u.role_id like '$role_id' and p.qualifies like '$qualifies' and u.role_id != 4";
	}
	else
	{
		$sql = "select id, fname, lname, email, homeph, role_id, IFNULL(length(member_comments),0) mem_cmts from users where fname like '$fname%' and lname like '$lname%' and city like '$city%' and role_id like '$role_id' and role_id != 4"; //and id!=$current_id;
		//echo $sql;
	}
	//$sql = "select a.id, a.fname, a.lname, a.mname, a.email, a.st1, a.st2, a.city, a.zip, a.homeph, IFNULL(a.otherph,0) otherph, a.unpaid_caregiver, a.internet_access, a.eng_prof, a.qualifies, a.user_notes, a.member_comments, IFNULL(uc.uname,0) uname, a.role_id from (SELECT u.id, u.fname, u.lname, u.mname, u.email, p.st1, p.st2, p.city, p.zip, p.homeph, p.otherph, p.unpaid_caregiver, p.internet_access, p.eng_prof, p.qualifies, p.user_notes, p.member_comments, u.role_id FROM preusers p, users u where p.user_id=u.id and u.fname like '$fname' and u.lname like '$lname' and p.city like '$city' and p.qualifies like '$qualifies') a left outer join user_credentials uc on a.id = uc.user_id;";
	echo '<div class="preUser_title_header">
						<span class="name"> Name </span>
						<span class="phone"> Contact </span>
						<span class="email"> Email </span>
					</div>';
	
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		echo'<div id="'.$row['id'].'" class="preUser_box">
				<div class="preUser_title">
					<div class="title_content">
						<img class="img_role" id="'.$row['id'].'" src="imgs/';
						if($row['role_id'] == 1) echo 'Admin';
						else if($row['role_id'] == 2) echo 'Member';
						else echo 'User';
						echo 'Icon.png" style="width: 24px; height:24px;" float: left; />
						<span class="name"> '.$row['fname'].' '.$row['lname'].'</span>
						<span class="phone">  '; if($row['homeph'] == 0) echo 'N/A'; else echo preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['homeph']); echo '</span>
						<span class="email"> <a href="#">'.$row['email'].'</a></span>
						
						<span style="float:right; visibility: hidden;" class="role">';
						if($row['role_id'] == 1) echo 'Admin';
						else if($row['role_id'] == 2) echo 'Member';
						else echo 'User';
						echo '</span>
					</div>
					
					<img class="preUserInfo" id="'.$row['id'].'" src="imgs/';
					if($row['mem_cmts'] == 0)
					echo 'boringIcon';
					else echo 'noteIcon';
					echo '.png" style="width: 24px; height:24px; float:right" />
				</div>
			</div>';
	}				
?>