<?php
	include "expire.php";
	$id = $_REQUEST['id'];
	require_once('connectDB.php');
	
	$sql = "select `fname`, `mname`, `lname`, `email`, `uname`  from users u, user_credentials where u.id=".$id." and user_id =".$id;
	$result = mysql_query($sql) or die(mysql_error);

	while($row = mysql_fetch_array($result))
	{
		echo '<span style="font-weight: bold"> User Name : <input type="text" name="uname" id="uname" value="'.$row['uname'].'"/></br></br>';
		echo '<span style="font-weight: bold"> Email id : <input type="text" name="email" id="email" value="'.$row['email'].'"/></br></br>';
			//echo '<input type="file" capture="camera" accept="image/*" id="cameraInput" name="cameraInput">';
	}
?>