<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=false;">
		<title>Virtual Healthcare Neighborhood</title>
		<link rel="stylesheet" screen="media" type="text/css" href="css/base.css" />
		<!--<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/main.css" />-->
		<!--<script type="text/javascript" src="js/ticker.js"></script>-->
	</head>
	<body>
		<div id="header">
			<div id="header_wrapper">
				<div id="welcomeMsg">
					<?php
						session_start();
						if(!isset($_SESSION['uname']))
						{
							header('Location: index.php');
						}
						else
						{
							require_once("connectDB.php");
							
							$sql = "select fname,lname,role_id from users where id=".$_SESSION['uid'];
							$results = mysql_query($sql);
							while($row = mysql_fetch_array($results))
							{
								$_SESSION['name'] = $row['fname'].' '.$row['lname'];
								$_SESSION['role'] = $row['role_id'];
							}
						}
						//and your role is '. $_SESSION['role']
						echo '<span> <h3> Welcome '.$_SESSION['name'].'! <h3></span> <a href="index.php" > Logout </a>';
					?>
				</div>
				<div id="logo">
					<a href="home.php"><img src="images/logo.png" alt="" id="logoImg" /> <span><h1>A Virtual Healthcare Neighborhood<br />for Parents of Special Children</h1></span></a>
				</div>
			</div>
		</div>
		<?php include "navBar.php"; ?>
		<!--
		<div id="ticker_bg">
			<div id="ticker">
				<div id="ticker_wrapper">
					&quot;Tell me and I forget, teach me and I may remember, involve me and I learn.&quot; -Benjamin Franklin
				</div>
			</div>
		</div>
		<div id="body_bg">-->