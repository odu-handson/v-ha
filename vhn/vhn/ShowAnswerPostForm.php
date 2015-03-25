<?php
	include "expire.php";
	require_once('connectDB.php');
	$thisqid = $_REQUEST['qid']; 

	$sql = 'SELECT question_text FROM askprofessional where id="'.$thisqid.'"';

	$result = mysql_query($sql) or die(); 

	$row = mysql_fetch_array($result);
	echo '<form action="enterHealth.php" method="POST"><span style="font-size: 20px;">Question : '.$row['question_text'].'</span><br/><br/><br/>';
	echo 'Push this under category : <select id="quest_category" name="quest_category">';

	$sql2 = 'SELECT * FROM question_category';

	$result2 = mysql_query($sql2) or die(); 

	while($row2 = mysql_fetch_array($result2))
	{
		echo '<option value="'.$row2['id'].'">'.$row2['category'].'</option>';
	} 
	echo '</select><br/><br/>';

	echo '<input name="quest_id" type="hidden" value="'.$thisqid.'" />';
	echo '<strong> Content </strong><br /> <textarea rows="14" cols="50" name = "content" id="content" style="border-radius : 5px; vertical-align: middle;"></textarea>&nbsp; <br><br/>
						<strong> Video link </strong><br /> <input type="textbox" id="video_link" name="video_link" style="width : 420px; border-radius : 5px; height : 30px;" />
						</br><input type="submit" value="submit"></form>';

?>