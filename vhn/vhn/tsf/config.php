<?php
	$host="mysql.cs.odu.edu"; // Host name 
	$username="scifair"; // Mysql username 
	$password="\$c13nc3f@1r";
	$db_name="scifair2013"; // Database name 
	
	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("Cannot Connect to the database please contact admin."); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
?> 