<link rel="stylesheet" media="all" type="text/css" href="css/accountcss.css" />
	<form id="registerForm" class="registerForm" method="POST">
		<h4 class="Note"> Note: Fields marked with * are mandatory </h4>
		<h4 class="errorNote" hidden>  </h4>		
		<?php
			include "generalRegisterForm.php";
		?>
		<?php
			if($_SESSION['role'] == 1)
			{
				echo '
					<!---- Main Roles --->
					<span class="mandatory" style="vertical-align: top;"> Role* : </span>
					<span class="mandatoryFields" style="text-align: left; "> 
						<input name="main_role" type="radio" checked="checked" value="0"> Admin </input> 
						<br /><input name="main_role" type="radio" value="1"> Grant Administrator </input> 
					</span>
					<!---- Sub Roles --->
					<p class="subroles" style="font-size: 1.2em;"> Please select accesses for member </p>';
				
				require_once("connectDB.php");
				
				$sql = "select * from role_type where id!=6 order by category ";
				$results = mysql_query($sql) or die(mysql_error());
				while($row = mysql_fetch_array($results))
				{
					if($row['category'] !='None')
					{
						echo '<span class="subroles" style=" width:60%; text-align: left;"> <input type="checkbox" name="role_r" value="'.$row['id'].'">  '.$row['category'].'</span>';
					}
				}
				
			}
			else
			{
				echo '<input type="hidden" id="role_r" name="role_r" value="3" />';
			}
		?>
		<br />
		<div style="text-align: center">
			<input type="button" style="margin-left: 10px;" class="button" id="register_member" name="register" value="Register" />
			<input type="button" style="margin-left: 10px;" class="button" id="reset_form" value="RESET" />
		</div>
	</form>