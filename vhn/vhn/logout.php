<?php
	include "expire.php";
	if (session_status() == PHP_SESSION_NONE)
		session_start();
		
	unset($_SESSION['login_status']);
	unset($_SESSION['uid']);
	unset($_SESSION['uname']);
	unset($_SESSION['role']);
	unset($_SESSION['name']);
	unset($_SESSION['first_time']);
	unset($_SESSION['sub_roles']);
	
	header("Location: index.php");
?>