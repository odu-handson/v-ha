<?php 
	include "expire.php";
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$city = $_REQUEST['city'];
	$qualifies = $_REQUEST['qualifies'];
	require_once('connectDB.php');
	// Use This
	$sql = "select a.id, a.fname, a.lname, a.mname, a.email, a.st1, a.st2, a.city, a.zip, a.homeph, IFNULL(a.otherph,0) otherph, a.unpaid_caregiver, a.internet_access, a.eng_prof, a.qualifies, a.user_notes, a.member_comments, IFNULL(uc.uname,0) uname, a.role_id from (SELECT u.id, u.fname, u.lname, u.mname, u.email, p.st1, p.st2, p.city, p.zip, p.homeph, p.otherph, p.unpaid_caregiver, p.internet_access, p.eng_prof, p.qualifies, p.user_notes, p.member_comments, u.role_id FROM preusers p, users u where p.user_id=u.id and u.fname like '$fname' and u.lname like '$lname' and p.city like '$city' and p.qualifies like '$qualifies') a left outer join user_credentials uc on a.id = uc.user_id;";
	echo '<div class="preUser_title_header">
						<span class="name"> Name </span>
						<span class="phone"> Contact </span>
						<span class="email"> Email </span>
					</div>';
	
	$result = mysql_query($sql) or die();
	while($row = mysql_fetch_array($result))
	{
		echo'<div id="'.$row['id'].'" class="preUser_box">
				<input id="qualifies'.$row['id'].'" type="hidden" value="'.$row['qualifies'].'"/>
				<div class="preUser_title">
					<div class="title_content">
						<span class="name"> '.$row['fname'].' '.$row['lname'].'</span>
						<span class="phone">  '.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['homeph']).'</span>
						<span class="email"> '.$row['email'].'</span>
						<span style="float:right" class="role"> ';
						if($row['role_id'] == 1) echo 'Admin';
						else if($row['role_id'] == 2) echo 'Member';
						else echo 'User';
						echo '</span>
					</div>
					
					<img class="preUserInfo" id="'.$row['id'].'" src="imgs/Info-icon.png" style="width: 24px; height:24px; float:right" />
				</div>
				
				<div class="preUser_details" style="display: none">
					<span class="title" > Email : </span> 
					<span class="content" >'.$row['email'].' </span>
					<span class="title" > Name : </span> 
					<span class="content" >'.$row['fname'].' '.$row['lname'].'</span>
					<span class="title" > Home Phone : </span> 
					<span class="content" >'.$row['homeph'].' </span>';
					
					if($row['otherph'] != 0)
					{
						echo '
						<span class="title" > Other Phone : </span> 
						<span class="content" >'.$row['otherph'].' </span>
					';
					}
					if($row['uname'] != '0')
					{
						echo '
						<span class="title" > User Name : </span> 
						<span class="content" >'.$row['uname'].' </span>
					';
					}
				echo '
					<span class="title" > Street Address : </span>
					<span class="content" >'.$row['st1'].' '.$row['st2'].' </span>
					<span class="title" > City : </span> 
					<span class="content" >'.$row['city'].' </span>
					<span class="title" > Zip : </span> 
					<span class="content" >'.$row['zip'].' </span>';
					if($row['unpaid_caregiver'] == 1) echo ' <span class="title" > Unpaid Caregiver : </span> <span class="content" >YES </span>';
					else echo '<span class="title" > Unpaid Caregiver : </span> <span class="content" >NO </span>';
					if($row['internet_access'] == 1) echo ' <span class="title"> Internet Access : </span> <span class="content" > YES </span>';
					else echo '<span class="title">Internet Access : </span> <span class="content" > NO </span>';
					if($row['eng_prof'] == 1) echo '<span class="title"> English Proficiency : </span> <span class="content" > YES </span>';
					else echo '<span class="title">English Proficiency : </span> <span class="content" > NO </span>';
		echo '	</div>
			</div>';
	}				
?>