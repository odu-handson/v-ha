<?php
	include "expire.php";
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	$id = $_SESSION['uid'];
	require_once('connectDB.php');

	$sql = "select `fname`, `mname`, `lname`, `email`, `st1`, `st2`, homeph from users where id = ".$id;
	$result = mysql_query($sql) or die(mysql_error());
	echo '<div style= "min-width : 400px; width : 50%">';
	while($row = mysql_fetch_array($result))
	{
		echo '<img src="profilepics/default.gif" class="profile_pic" style="width :140px; height:140px; margin: 0 auto"><br/><br/>';
		/* echo '<span style=" font-size : 1em"> Name:  '.$row['fname'].'</span>';
		echo '<span style=" font-size : 1em">&nbsp;'.$row['mname'].'</span>';
		echo '<span style=" font-size : 1em">&nbsp;'.$row['lname'].'</span></br></br>';
		echo '<span style=" font-size : 1em">Email Address:'.$row['email'].'</span></br></br>';
		echo '<span style=" font-size : 1em">St. Address 1 : ';
		if($row['st1'] == "") echo 'N/A';
		else echo $row['st1']; 
		echo '</span></br></br>';
		echo '<span style=" font-size : 1em">St. Address 2 :  ';
		if($row['st2'] == "") echo 'N/A';
		else echo $row['st2']; 
		echo '</span></br></br>';
		echo '<span style=" font-size : 1em">Home phone :  ';
		if($row['homeph'] == "") echo 'N/A';
		else echo preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1) $2 - $3", $row['homeph']); 
		echo '</span></br></br>'; */
		echo '
		<style>
			td
			{
				font-size: 1.2em;
				padding: 5px;
				text-align: left;
				min-width: 70px;
			}
		</style>
		<table>
			<tr>
				<td> Name: </td>
				<td> '.$row['fname'].' '.$row['lname'].' </td>
			</tr>
			<tr>
				<td> Email: </td>
				<td> '.$row['email'].' </td>
			</tr>
			<tr>
				<td> Address: </td>
				<td> '.$row['st1'].' '.$row['st2'].' </td>
			</tr>
			<tr>
				<td> Phone: </td>
				<td> ';
		if($row['homeph'] == "") echo 'N/A';
		else echo preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1) $2 - $3", $row['homeph']); 
		echo ' </td>
			</tr>
		</table> </br></br>';
	}
		
	
	echo '</div>';

?>