<?php
	require_once("connectDB.php");
	include "expire.php";
	if($_REQUEST['cgtype'] == 0)
		$form_type = "MI";
	else if($_REQUEST['cgtype'] == 1)
		$form_type = "SSF";
	else
		$form_type = "";
	
	$sql = "SELECT * FROM collectdetails where fname like '".$_REQUEST['fname']."%' and lname like '".$_REQUEST['lname']."%' and email like '".$_REQUEST['email']."%' and form_type like '$form_type%' and person_userid=0";
	
	$result = mysql_query($sql) or die();
	if(mysql_num_rows($result) !=0)
	{
		while($row = mysql_fetch_array($result))
		{ 
			echo '	<div id="'.$row['id'].'" class="pre_user_box" >
						<span class="title">'.$row['fname'].' '.$row['lname'].'</span>
						<span class="detail"> <strong> Address: </strong> '.$row['address1'].' </span>
						<span class="detail"> <strong>  </strong> '.$row['address2'].' </span>
						<span class="detail"> <strong> City </strong> '.$row['city'].' </span>
						<span class="detail"> <strong> State </strong> '.$row['state'].' - '.$row['zip'].' </span>
						<span class="detail"> <strong> Email </strong> '.$row['email'].' </span>
						<span class="detail" > <strong> Home phone: </strong> ('.substr($row['homephone'], 0, 3).') '.substr($row['homephone'], 3, 3).' - '.substr($row['homephone'],6).' </span>
						<span class="detail" > <strong> Cell phone: </strong> ('.substr($row['cellphone'], 0, 3).') '.substr($row['cellphone'], 3, 3).' - '.substr($row['cellphone'],6).' </span>
						<span class="detail" > <strong> Work phone: </strong> ('.substr($row['workphone'], 0, 3).') '.substr($row['workphone'], 3, 3).' - '.substr($row['workphone'],6).' </span>
						<!--<span class="detail" > <strong> Access to Computer: </strong> '.$row['compaccess'].' </span> -->
						<!--<span class="detail" > <strong> English Proficiency : </strong> '.$row['englishproficiency'].'</span> -->
						<div class="pre_user_box_buttons">
							<span id="'.$row['id'].'" class="submit_button" style="border-right: 3px solid lightgray"> APPROVE </span>
							<span class="cancel_button" style="color: brown; opacity: 0.7" > REJECT </span>
						</div>
					</div> ';
		}
	}
	else
	{
		echo '<span style="font-size: 1.2em; color:green;"> No Users has been found! </span> ';
	}
?>