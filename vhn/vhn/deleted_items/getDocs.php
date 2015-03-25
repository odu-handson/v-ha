Choose a Physician: <select id="get_doc" name="get_doc">
<?php 
					include 'connectDB.php';		
					$sql = "SELECT * FROM users where role_id=4";
					$result = mysql_query($sql) or die(); 
					echo '<option value=""></option>';
					while($row = mysql_fetch_array($result))
					{  
				
					echo '<option value="'.$row['id'].'">'.$row['fname'].'</option>';
					
					} 
					
					
					?>
		
			
					
</select>

<?php

echo '<br/><br/>';
echo 'Question :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<textarea rows="5" cols="50" name = "question" id="question" style="margin-left:10px; vertical-align: middle"></textarea>&nbsp; <br><br>';
echo "Choose privacy";
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<select id="set_privacy" name="set_privacy">';
echo '<option value="public">Make it Public</option>';
echo '<option value="email">Answer by email</option>';
echo '</select>';
?>					
