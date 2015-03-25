<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	$id = $_SESSION['uid'];
?>
	<span class="page_title"> My Consent Form </span>
	<div id="main_wrapper">
		<?php
			require_once('connectDB.php');
			$sql = "SELECT consent_form FROM user_pdfforms WHERE user_id = $id";
			$result = mysql_query($sql) or die('Bad query!'.mysql_error());  

			while($row = mysql_fetch_array($result,MYSQL_ASSOC))
			{       
				$db_pdf = $row['consent_form']; // No stripslashes() here.
			}
			
			$id = file_put_contents("temp.pdf",$db_pdf);
			echo '<object data="temp.pdf" type="application/pdf" style="width: 100%; height:100%; min-height: 500px;">';
		?>
	</div>

<?php
	include "appTail.php";
?>