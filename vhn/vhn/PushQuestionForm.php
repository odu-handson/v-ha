<?php
	include "expire.php";
	require_once('connectDB.php');
	$thisqid = $_REQUEST['qid']; 

	$sql = 'SELECT question_text FROM askprofessional where id="'.$thisqid.'"';

	$result = mysql_query($sql) or die(); 

	$row = mysql_fetch_array($result);

	echo '<form action="pushFinish.php" method="POST"><span style="font-size: 20px;">'.$row['question_text'].'<br/><br/>';
	echo '<input name="quest_id" id="quest_id" type="hidden" value="'.$thisqid.'" />';
	echo 'Push this Question to :</span> <select name="concernedperson" id="concernedperson" >';
	 
	$sql2 = 'SELECT fname, id FROM users where role_id<>3';

	$result2 = mysql_query($sql2) or die();
	while($row2 = mysql_fetch_array($result2))
						{  
					
						echo '<option value="'.$row2['id'].'">'.$row2['fname'].'</option>';
						
						} 
	 echo '</select><br/><br/><input type="submit" value="submit"></form>';
?>