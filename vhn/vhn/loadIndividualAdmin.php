<?php
	include "expire.php";
	$id = $_REQUEST['id'];
	$role = $_REQUEST['role']; 
	
	require_once('connectDB.php');
	
	if($role == 1)
	{
		$sql = "select * from users where id = $id";
		$result = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			echo'
					<div id="'.$row['id'].'" class="preUser_details_individual">
						<h4 style="font-size: 0.8em; font-weight: none; font-style: italic" align="center"> Note: fields marked with * are mandatory </h4>
						
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
						<span class="title" > Street Address 1* : </span>
						<input type="text" class="contentEdit" id="st1Edit" value="'.$row['st1'].'" />
						<span class="title" > Street Address 2 : </span>
						<input  type="text" class="contentEdit" id="st2Edit" value="'.$row['st2'].'" />
						<span class="title" > City* : </span> 
						<input type="text" class="contentEdit" id="cityEdit" value="'.$row['city'].'" />
						<span class="title" > Zip* : </span> 
						<input type="text" class="contentEdit" id="zipEdit" value="'.$row['zip'].'" />
						<input type="hidden" id="prevRoleEdit" value="'.$row['role_id'].'" />
						<span class="title" > Role : </span>
						<input type="radio" name="mainRoleEdit" value="1" checked> Admin </input>
						<input type="radio" name="mainRoleEdit" value="2" > Member </input>
						
						<div class="subroles_div" hidden>
							<span style="font-size: 1.2em; width: 90%;"> Please select accesses for member </span>';
							
							$sql1 = "select * from role_type where id!=6 order by category ";
							$results1 = mysql_query($sql1) or die(mysql_error());
							while($row1 = mysql_fetch_array($results1))
							{
								if($row1['category'] !='None')
								{
									echo '<span class="subroles" style=" width:60%; text-align: left;"> <input type="checkbox" name="role_r" value="'.$row1['id'].'">  '.$row1['category'].'</span>';
								}
							}
			echo '	
						</div>
			</div>';
		}
	}
	else
	{
		$sql = "
		select 
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
				u.role_id,
				u.otherph,
				group_concat(distinct b.subrole_id
			order by b.subrole_id desc
			SEPARATOR ',') roles
		from
			users u, user_subroles b
		where
			u.role_id = 2 and u.id = b.user_id and u.id = $id group by u.id , u.fname , u.email , u.homeph , u.st1 , u.st2 , u.city , u.state , u.zip , u.role_id, u.otherph";
		$result = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			echo'
					<div id="'.$row['id'].'" class="preUser_details_individual">
						<h4 style="font-size: 0.8em; font-weight: none; font-style: italic" align="center"> Note: fields marked with * are mandatory </h4>
						
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
						<span class="title" > Street Address 1* : </span>
						<input type="text" class="contentEdit" id="st1Edit" value="'.$row['st1'].'" />
						<span class="title" > Street Address 2 : </span>
						<input  type="text" class="contentEdit" id="st2Edit" value="'.$row['st2'].'" />
						<span class="title" > City* : </span> 
						<input type="text" class="contentEdit" id="cityEdit" value="'.$row['city'].'" />
						<span class="title" > Zip* : </span> 
						<input type="text" class="contentEdit" id="zipEdit" value="'.$row['zip'].'" />
						<input type="hidden" id="prevRoleEdit" value="'.$row['role_id'].'" />
						<span class="title" > Role : </span>
						<input type="radio" name="mainRoleEdit" value="1" > Admin </input>
						<input type="radio" name="mainRoleEdit" value="2" checked> Member </input>
						
						<div class="subroles_div">
							<span style="font-size: 1.2em; width: 90%;"> Please select accesses for member </span>';
							
							$sql1 = "select * from role_type where id!=6 order by category ";
							$results1 = mysql_query($sql1) or die(mysql_error());
							$roles_array = explode(",", $row['roles']);
							while($row1 = mysql_fetch_array($results1))
							{
								if($row1['category'] !='None')
								{
									echo '<span class="subroles" style=" width:60%; text-align: left;"> <input type="checkbox" name="role_r" value="'.$row1['id'].'" ';
									if(in_array($row1['id'], $roles_array)) echo "checked"; 
									echo '>  '.$row1['category'].'</span>';
								}
							}
			echo '	
						</div>
			</div>';
		}
	}
	
?>