<?php
	include 'appHead.php';
	include "expire.php";
	include "loginStatus.php";
?>
	<link rel="stylesheet" media="screen" type="text/css" href="css/virtualSupport.css" />
	<span class="page_title"> Virtual Support Group </span>
	<div id="main_wrapper">
		<div id="virtual_support_content" >
		<?php
			$sql = "select * from users, roles where role_id!=3 and role_id=roles.id";
			$results = mysql_query($sql);
			
			while($row = mysql_fetch_array($results))
			{
				echo '	<div class="member_box">
							<div class="image_div">
								<img class="profile_pic" src="./profilepics/default.gif" height="100" width="100";>
								<input type="button" class="email_button" value=""/>
							</div>
							<div class="details_div">
								<span> Name :'.$row['fname'].' '.$row['lname'].'</span>
								<span> Email id :'.$row['email'].'</span>
								<span> Designation :'.$row['title'].'</span>
							</div>
							<div class="description_div">
								<b> DESCRIPTION </b> '.$row['description'].'
							</div>
						</div>';
			}
		?>
		</div>
	</div>
<?php
	include 'appTail.php';
?>