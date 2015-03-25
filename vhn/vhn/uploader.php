<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();

	$memberid	= $_SESSION['uid'];
		
	$sql = "select max(id) qid from discussion_questions where poster_id = ".$memberid;
	
	$results = mysql_query($sql) or die(mysql_error());
	
	$row = mysql_fetch_array($results);
	
	$qid = $row['qid'];
		
// Where the file is going to be placed 
$target_path_const = "./uploads/".$memberid."q".$qid;

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */
for ($x=1; $x<=3; $x++)
{
	if(!empty($_FILES['uploaded'.$x]['tmp_name']))
	{
		$target_path = $target_path_const . basename( $_FILES['uploaded'.$x]['name']); 

		if(move_uploaded_file($_FILES['uploaded'.$x]['tmp_name'], $target_path)) {
			echo "The file ".  basename( $_FILES['uploaded'.$x]['name']). 
			" has been uploaded</br>";
			
			$sql2 = "insert into discussion_attachments values (".$memberid.",".$qid.",'".$_FILES['uploaded'.$x]['name']."')";
			
			mysql_query($sql2) or die(mysql_error());
			
		} else{
			echo "There was an error uploading the file, please try again!</br>";
		}
	}
}
?>