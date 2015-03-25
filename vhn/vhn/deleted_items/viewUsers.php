<?php
	include "appHead.php";
?>
			<style>
				.box
				{
					width: 60%;
					-webkit-border-radius: 6px;
					-moz-border-radius: 6px;
					border-radius: 6px;
					
					padding: 10px;
					
					margin-left: auto;
					margin-right: auto;
					margin-top: 2%;
					
					border: 1px solid green;
					font-size: 20px;
				}
				.box Span
				{
					display: block;
					padding: 10;
				}
			</style>
			<div id="main_wrapper">
				<div id="main_content">
					<h2 align="center"> Members Information </h2>
					<?php
						if($_SESSION['role'] == 1)
						{
							$sql = "select u.id id, u.fname fname, u.lname lname, u.role_id role_type, u.email email, uc.uname uname from users u, user_credentials uc where role_id!=1 and u.id = uc.user_id";
						}
						if($_SESSION['role'] == 2)
						{
							$sql = "select id,fname,lname,email from users where role_id!=2 and role_id!=1";
						}
						$results = mysql_query($sql);
						$i=1;
						while($row = mysql_fetch_array($results))
						{
							echo ' 
								<div class="box">
									<Span> <strong> User Name :'.$row['uname'].'</strong></span>
									<hr />
									<Span> <strong> Name: </strong> '.$row['fname'].' '.$row['lname'].'</span>
									<Span> <strong> Email: </strong> '.$row['email'].'</span>';
									//echo $row['role_type'];
									if($row['role_type'] == 2)
									{
										$sql1 = "SELECT rt.category, us.user_id FROM user_subroles us, role_type rt where us.subrole_id = rt.id and us.user_id=".$row['id'];
										$results1 = mysql_query($sql1);
										echo '<Span> <strong> Roles: </strong>'; 
										while($row1 = mysql_fetch_array($results1))
										{
											echo $row1['category'].',';
										}
										echo '</span>';
									}
									
								echo '</div>
							';
							$i++;
						}
					?>
				</div>
			</div>
<?php
	include "appTail.php";
?>