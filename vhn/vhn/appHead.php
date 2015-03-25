<!DOCTYPE html>
<html>
	<head>
		<!-- Meta Tags -->
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="viewport" content="width=device-width" />
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		<title>Virtual Healthcare Neighborhood</title>
		
		<!-- Scripts -->
		<script src="js/jquery-1.10.2.min.js"></script>
		
		<!-- External CSS -->
		<link rel="stylesheet" media="screen" type="text/css" href="css/base1.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/mobilecss.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/main1.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/buttons.css" />
		<!--<link rel="stylesheet" media="screen" type="text/css" href="css/main1Extention.css.php" />-->
		<link rel="stylesheet" media="screen" type="text/css" href="css/accountcss.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/form.css">
		<!--<link rel="stylesheet" media="screen" type="text/css" href="css/navBar.css" />-->
		<link rel="stylesheet" media="screen" type="text/css" href="css/navBar1.css" />
		<!--<?php include "css/main1Extention.css.php"; ?>-->
		<link rel="stylesheet" media="screen" type="text/css" href="css/ticker.css" />
		<script type="text/javascript">
		$(function() {
			$.ajax({
				url: "setWidth.php",
				data : {
					screenwidth:$(window).width()
				},
				async: false
			});
		});
		$( window ).load(function() {
			if($(document).height() > $(window).height())
			{
				console.log("document");
				$("#body_wrapper").addClass("body_wrapper");
				//console.log($("#body_wrapper").attr("position"));
			}
			else
			{
				console.log("window");
				$("#body_wrapper").removeClass("body_wrapper");
				//console.log($("#body_wrapper").attr("position"));
			}
			/* alert($(window).height());
			alert($(document).height()); */
			$("#loading_div").hide();
			//$(".AlertBox").toggle();
		});
		</script>
	</head>
	<body>
		<style>
			#loading_div
			{
				opacity: 1;
				z-index: 1000;
				position: absolute;
				
				background-color: #96c;
				width: 200px;
				height: 100px;
				text-align: center;
				
				margin-left: -200px;
				margin-top: -100px;
				left: 50%;
				top: 30%;
				
				-webkit-border-radius: 15px;
				-moz-border-radius: 15px;
				border-radius: 15px;
			}
			#loading_div img
			{
				margin-top: 20px;
				margin-left: auto;
				margin-right: auto;
			}
			#loading_div h3 
			{
				color: white;
			}
		</style>
		<div id="loading_div" style="display: none;"> <!--style="visibility:hidden"--> 
			<img src="images/loading.gif" />
			<h3> Loading ... </h3>
		</div>
		<div class="AlertBox" style="display: none;"> <!--style="visibility:hidden"-->
			<h3 align="left" style="margin-left: 10%;"> Alert </h3>
			<hr/>
			<p class="alertMessage"> </p>
		</div>
		<div id="body_wrapper">
			<?php
				if (session_status() == PHP_SESSION_NONE)
					session_start();
				include "connectDB.php"; 
				include "header.php";
				include "ticker.php";
				if(isset($_SESSION['uname']))
				{
					require_once("connectDB.php");
					
					$sql = "select fname,lname,role_id from users where id=".$_SESSION['uid'];
					//echo $sql;
					$results = mysql_query($sql);
					while($row = mysql_fetch_array($results))
					{
						$_SESSION['name'] = $row['fname'].' '.$row['lname'];
						$_SESSION['role'] = $row['role_id'];
					}
					
					if($_SESSION['role'] == 2)
					{
						require_once("connectDB.php");
						$sql1 = "select subrole_id from user_subroles where user_id=".$_SESSION['uid'];
						//echo $sql1;
						$results1 = mysql_query($sql1) or die(mysql_error());
						$subroles = array();
						while($row1 = mysql_fetch_array($results1))
						{
							array_push($subroles, $row1['subrole_id']);
						}
						$_SESSION['sub_roles'] = $subroles;
					}
				}
				
				if(isset($_SESSION['login_status']))
				{
					echo '<div id="navbar">';
					include "navBar.php";
					if(isset($_SESSION['currentScreenwidth']) && $_SESSION['currentScreenwidth'] > 700)
					{
						echo '</div>';
						//include "navBarVertical.php"; 
					}
					else
					{
						echo '</div>';
					}
				}
				
				include "Registration/LoginForm.php"; 
			?>
			<div id="main">