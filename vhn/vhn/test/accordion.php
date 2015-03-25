<div id="main_wrapper">	
	<?php
		include 'connectDB.php'; 
		$sql = "SELECT * FROM collectdetails";
		$result = mysql_query($sql) or die(); 
		while($row = mysql_fetch_array($result))
		{ 
			echo '<div id="'.$row['id'].'" class="pre_user_box" >';
			echo '<h3>'.$row['fname'].'</h3>';
			echo '<div><p>First Name : '.$row['fname'].'</br></br>Last Name : '.$row['lname'].'</br></br>Home phone:'.$row['homephone'].'</br></br>Access to Computer:'.$row['compaccess'].'';
			echo '</br></br>Englis Proficiency : '.$row['englishproficiency'].'';
			echo '</div></div>';
		}
	?>
</div>