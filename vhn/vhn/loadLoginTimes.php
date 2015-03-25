<?php
require_once('connectDB.php');

$sql = "select loginTimes from user_credentials where user_id=".$_REQUEST['id'];
$results = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($results))
	{
		if($row['loginTimes'] == '')
		echo '<h3>Login History</h3><hr/>No Logins Found';
		else
		{$res = '<h3>Login History</h3><hr/>'.str_replace('@','<br/>',$row['loginTimes']);
		 echo $res;
		}
	}
if(mysql_num_rows($results)==0)
 echo '<h3>Login History</h3><hr/>No Logins Found';
	
?>