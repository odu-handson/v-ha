<?php
	include "expire.php";
	$id = $_REQUEST['id'];
	$role = $_REQUEST['role'];
	require_once('connectDB.php');
	if($role == 'Admin')
	{
		$sql = "select * from users u, user_credentials uc where u.id=uc.user_id and u.id = $id;";
		$results = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($results))
		{
			echo ' 	
					<input type="hidden" class="id" value="'.$row['id'].'" />
					<span class="title" > Email : </span> 
					<span class="content" >'.$row['email'].' </span>
					<span class="title" > Name : </span> 
					<span class="content" >'.$row['fname'].' '.$row['lname'].'</span>
					<span class="title" > Home Phone : </span> 
					<span class="content" >'.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['homeph']).' </span>';
					
					if($row['otherph'] != 0)
					{
						echo '
						<span class="title" > Other Phone : </span> 
						<span class="content" >'.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['otherph']).' </span>
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
		}
			
	}
	else if($role == 'Grant Administrator')
	{
		$sql = "select 
					a.id,
					a.fname,
					a.lname,
					a.email,
					a.homeph,
					a.st1,
					a.st2,
					a.city,
					a.state,
					a.zip,
					a.otherph,
					a.uname,
					group_concat(distinct category
						order by category desc
						SEPARATOR ',') roles
				from
					(select 
						u.id,
							u.fname,
							u.lname,
							u.email,
							u.homeph,
							u.st1,
							u.st2,
							u.city,
							u.state,
							u.zip,
							u.otherph,
							uc.uname
					from
						users u, user_credentials uc
					where
						u.role_id = 2 and u.id = uc.user_id) a,
					(select 
						us.user_id, rt.category
					from
						user_subroles us, role_type rt
					where
						us.subrole_id = rt.id) b
				where
					a.id = b.user_id and a.id = $id
				group by a.id , a.fname , a.email , a.homeph , a.st1 , a.st2 , a.city , a.state , a.zip , a.otherph , a.uname;";
		$results = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($results))
		{
			echo ' 	
					<input type="hidden" class="id" value="'.$row['id'].'" />
					<span class="title" > Email : </span> 
					<span class="content" >'.$row['email'].' </span>
					<span class="title" > Name : </span> 
					<span class="content" >'.$row['fname'].' '.$row['lname'].'</span>
					<span class="title" > Home Phone : </span> 
					<span class="content" >'.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['homeph']).' </span>';
					
					if($row['otherph'] != 0)
					{
						echo '
						<span class="title" > Other Phone : </span> 
						<span class="content" >'.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['otherph']).' </span>
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
					<span class="content" >'.$row['zip'].' </span>
					<span style="vertical-align: top;" class="title" > Access : </span> 
					<span class="content" >';
					
					$roles = explode(",", $row['roles']);
					foreach ($roles as $role) 
					{
						echo "- $role <br/>";
					}
				
				echo ' </span>';
		}
	}
	else if($role == 'Future Participants')
	{
		$sql = "SELECT * FROM vhn.users u, moreusers mu where role_id =4 and mu.user_id = u.id and u.id = $id;";
		$result = mysql_query($sql) or die();
		while($row = mysql_fetch_array($result))
		{
			echo '
			<input type="hidden" class="approval_status" value="'.$row['approved'].'" />
			<input type="hidden" class="id" value="'.$row['id'].'" />
			<span class="title" > Email : </span> 
			<span class="content" >'.$row['email'].' </span>
			<span class="title" > Name : </span> 
			<span class="content" >'.$row['fname'].' '.$row['lname'].'</span>
			<span class="title" > Home Phone : </span> 
			<span class="content" >'.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['homeph']).' </span>';
			
			if($row['otherph'] != 0)
			{
				echo '
				<span class="title" > Other Phone : </span> 
				<span class="content" >'.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['otherph']).' </span>
			';
			}
		echo '
			<span class="title" > Street Address : </span>
			<span class="content" >'.$row['st1'].' '.$row['st2'].' </span>
			<span class="title" > City : </span> 
			<span class="content" >'.$row['city'].' </span>
			<span class="title" > Zip : </span> 
			<span class="content" >'.$row['zip'].' </span>
			<span class="title" > Interested in Virtual Reality studies for : </span> 
			<span class="content" >'.substr(str_replace(';',',',$row['interest_for']), 0, -1).' </span>
			<span class="title" > Caregiver for : </span> 
			<span class="content" >';
			switch($row['caregiver_for'])
			{
				case 1: echo ' A person with dementia '; break;
				case 2: echo ' A person with Parkinson\'s Disease '; break;
				case 3: echo ' A person with ALS (Amyotrophic Lateral Sclerosis) '; break;
				case 4: echo ' Child with special needs '; break;
				case 5: echo ' Someone with a terminal illness '; break;
				case 6: echo ' Someone with a traumatic brain injury '; break;
				case 7: echo ' Someone living with mental illness '; break;
			}
			echo ' </span>
			<span class="title" ';
			if($row['caregiver_for'] != 1) echo 'style="display: none"'; 
			echo '> Specify type : </span> 
			<span class="content" ';
			if($row['caregiver_for'] != 1) echo 'style="display: none"'; 
			echo '>'.$row['cg_specific_type'].' </span>
			<span class="title" ';
			if($row['caregiver_for'] != 4) echo 'style="display: none"'; 
			echo '> Type of need : </span> 
			<span class="content" ';
			if($row['caregiver_for'] != 4) echo 'style="display: none"'; 
			echo '>'.$row['cg_need_type'].' </span>
			<span class="title" > Age of the person he/she is caring for : </span> 
			<span class="content" >'.$row['age_caring_for'].' </span>
			<span class="title" > Gender of the person he/she is caring for: </span> 
			<span class="content" >'.$row['gender_caring_for'].' </span>
			<span class="title" > Live with the person: </span> 
			<span class="content" >'; if($row['live_with_person']) echo 'YES'; else echo 'NO'; echo' </span>
			';
			
		}
	}
	else
	{
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
					IFNULL(uc.uname, 0) uname,
					a.role_id
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
							u.member_comments,
							u.role_id
					FROM
						preusers p, users u
					where
						p.user_id = u.id and u.id = $id) a
						left outer join
					user_credentials uc ON a.id = uc.user_id";
		$result = mysql_query($sql) or die();
		while($row = mysql_fetch_array($result))
		{
			echo '
			<input type="hidden" class="id" value="'.$row['id'].'" />
			<input class="qualifies" type="hidden" value="'.$row['qualifies'].'"/>
			<span class="title" > Email : </span> 
			<span class="content" >'.$row['email'].' </span>
			<span class="title" > Name : </span> 
			<span class="content" >'.$row['fname'].' '.$row['lname'].'</span>
			<span class="title" > Home Phone : </span> 
			<span class="content" >'.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['homeph']).' </span>';
			
			if($row['otherph'] != 0)
			{
				echo '
				<span class="title" > Other Phone : </span> 
				<span class="content" >'.preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2 - $3', $row['otherph']).' </span>
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
		}
	}
	
	echo '<span class="title" > Credentials Last Sent : </span>';
	
	$sql_c = "select max(id) last, time from sent_credentials where user_id=".$id;
	
	$result_c = mysql_query($sql_c) or die();
	
	$row_c = mysql_fetch_array($result_c);
			
	if(is_null($row_c['last']))
	{	
		echo '<span class="content" style="color:red;">Never </span>';
	}
	else
	{
		echo '<span class="content" style="color:green;">'.$row_c['time'].' </span>';
	}
?>