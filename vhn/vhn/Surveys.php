<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	/* if($_SESSION['first_time'] == 0 && $_SESSION['role'] == 3)
	{
		header("Location: consentForm.php");
	} */
?>
	<style>
		#surveys
		{
			text-align: center;
		}
		#surveys ul li
		{
			padding: 5px;
			margin: 10px auto;
			-webkit-box-shadow: 0px 0px 10px 0px rgba(37,222,154,1);
			-moz-box-shadow: 0px 0px 10px 0px rgba(37,222,154,1);
			box-shadow: 0px 0px 10px 0px rgba(37,222,154,1);
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
			list-style-type: none;
			max-width: 300px;
			font-size: 1.1em;
		}
		#surveys ul li a
		{
			text-decoration: none;
		}
	</style>
	<span class="page_title"> Survey Forms </span>
	<div id="main_wrapper">
		<div id="surveys">
			<ul>
				<!--<li> <a href="Socio-Demographic.php"> Socio-Demographic </a> </li>
				<li> <a href="General_Self_Efficacy_Scale32.php"> General Self Efficacy Scale </a> </li>
				<li> <a href="Insomnia_Severity_Index33.php"> Insomnia Severity Index </a> </li>
				<li> <a href="Katz_Index_of_Independence_in_Activities_of_Daily_Living.php"> Katz Index of Independence in Activities of Daily Living </li>
				<li> <a href="MOS_Social_Support_Survey31.php"> MOS Social Support Survey </li>
				<li> <a href="Agitation_Aggression.php"> Agitation/Aggression </li>-->
				<li> Socio-Demographic </li>
				<li> General Self Efficacy Scale </li>
				<li> Insomnia Severity Index </li>
				<li> Katz Index of Independence in Activities of Daily Living </li>
				<li> MOS Social Support Survey </li>
				<li> Agitation/Aggression </li>
			</ul>
			<a class="button" href='beginSurveys.php' > Start </a>
		</div>
	</div>
<?php
	include "appTail.php";
?>