<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
	
	if(isset($_REQUEST['form_id']))
		$form_id = $_REQUEST['form_id'];
	else
		$form_id = 1;
?>

	<span class="page_title"> Survey Forms </span>
	<div id="main_wrapper">
		<?php 
			switch($form_id)
			{
				case 1: include "forms/Socio-Demographic.php"; break;
				case 2: include "forms/General_Self_Efficacy_Scale32.php"; break;
				case 3: include "forms/Insomnia_Severity_Index33.php"; break;
				case 4: include "forms/Katz_Index_of_Independence_in_Activities_of_Daily_Living.php"; break;
				case 5: include "forms/MOS_Social_Support_Survey31.php"; break;
				case 6: include "forms/Agitation_Aggression.php"; break;
				default: echo 'Something is wrong';
			}
		?>
	</div>
