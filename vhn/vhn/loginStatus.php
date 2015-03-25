<?php
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	if(!isset($_SESSION['login_status']))
		header("location: index.php");
?>