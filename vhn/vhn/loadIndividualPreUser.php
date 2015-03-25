<?php 
	include "expire.php";
	$id = $_REQUEST['id'];
	
	require_once('connectDB.php');
	
	$sql = "select 
				a.id,
				a.fname,
				a.lname,
				a.mname,
				a.email,
				a.st1,
				a.st2,
				a.city,
				a.zip,
				a.homeph,
				IFNULL(a.otherph, 0) otherph,
				a.unpaid_caregiver,
				a.internet_access,
				a.eng_prof,
				a.qualifies,
				a.user_notes,
				a.member_comments,
				IFNULL(uc.uname, 0) uname
			from
				(SELECT 
					u.id,
						u.fname,
						u.lname,
						u.mname,
						u.email,
						u.st1,
						u.st2,
						u.city,
						u.zip,
						u.homeph,
						u.otherph,
						p.unpaid_caregiver,
						p.internet_access,
						p.eng_prof,
						p.qualifies,
						u.user_notes,
						u.member_comments
				FROM
					preusers p, users u
				where
					p.user_id = u.id and u.id = $id) a
					left outer join
				user_credentials uc ON a.id = uc.user_id";
	
	//$sql = "select a.id, a.fname, a.lname, a.mname, a.email, a.st1, a.st2, a.city, a.zip, a.homeph, IFNULL(a.otherph,0) otherph, a.unpaid_caregiver, a.internet_access, a.eng_prof, a.qualifies, a.user_notes, a.member_comments, IFNULL(uc.uname,0) uname from (SELECT u.id, u.fname, u.lname, u.mname, u.email, p.st1, p.st2, p.city, p.zip, p.homeph, p.otherph, p.unpaid_caregiver, p.internet_access, p.eng_prof, p.qualifies, p.user_notes, p.member_comments FROM preusers p, users u where p.user_id=u.id and u.id=$id) a left outer join user_credentials uc on a.id = uc.user_id";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		echo'
				<div id="'.$row['id'].'" class="preUser_details_individual">
					<h4 style="font-size: 0.8em; font-weight: none; font-style: italic" align="center"> Note: fields marked with * are mandatory </h4>
					<input id="qualifiesEdit" type="hidden" value="'.$row['qualifies'].'" />
					<span class="title" > Name : </span> 
					<span class="content" >'.$row['fname'].' '.$row['lname'].'</span>
					<input id="fnameEdit" type="hidden" value="'.$row['fname'].'"/>
					<input id="lnameEdit" type="hidden" value="'.$row['lname'].'"/>
					<span class="title" > Email* : </span> 
					<input type="text" class="contentEdit" id="emailEdit" value="'.$row['email'].'" />
					<span class="title" > Home/Cell Phone* : </span> 
					<input type="text" class="contentEdit" id="homePhEdit" value="'.$row['homeph'].'" />
					<span class="title" > Other Phone : </span> 
					<input type="text" class="contentEdit" id="otherPhEdit" value="';
					if($row['otherph'] == 0)
					echo "";
					else
					echo $row['otherph'];
					echo '" />
					<input type="hidden" class="contentEdit" id="unameEdit" value="'.$row['uname'].'" />
					<span class="title" > Street Address 1* : </span>
					<input type="text" class="contentEdit" id="st1Edit" value="'.$row['st1'].'" />
					<span class="title" > Street Address 2 : </span>
					<input  type="text" class="contentEdit" id="st2Edit" value="'.$row['st2'].'" />
					<span class="title" > City* : </span> 
					<input type="text" class="contentEdit" id="cityEdit" value="'.$row['city'].'" />
					<span class="title" > Zip* : </span> 
					<input type="text" class="contentEdit" id="zipEdit" value="'.$row['zip'].'" />
					<span class="title" > Unpaid Caregiver : </span>
					<input type="radio" '; if($row['unpaid_caregiver'] == 1) echo 'checked '; echo 'name="unpaidEdit" value="1" > YES</input>
					<input type="radio" '; if($row['unpaid_caregiver'] == 0) echo 'checked '; echo 'name="unpaidEdit" value="0" > NO</input>
					<span class="title"> Internet Access : </span> 
					<input type="radio" '; if($row['internet_access'] == 1) echo 'checked '; echo 'name="iaEdit" value="1"> YES </input>
					<input type="radio" '; if($row['internet_access'] == 0) echo 'checked '; echo 'name="iaEdit" value="0"> NO </input>
					<span class="title"> English Proficiency : </span>
					<input type="radio" '; if($row['eng_prof'] == 1) echo 'checked '; echo 'name="engProfEdit" value="1"> YES </input>
					<input type="radio" '; if($row['eng_prof'] == 0) echo 'checked '; echo 'name="engProfEdit" value="0"> NO </input>
				</div>';
	}				
?>