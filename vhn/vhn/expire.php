<?php
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 6000)) 
	{
		// last request was more than 100 minutes ago (6000 seconds)
		session_unset();
		session_destroy();
	}
	$_SESSION['LAST_ACTIVITY'] = time();
?>
