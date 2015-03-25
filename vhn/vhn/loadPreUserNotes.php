<?php 
	include "expire.php";
	$id = $_REQUEST['id'];
	require_once('connectDB.php');
	
	$sql = "select user_notes, member_comments from users where id=".$id;
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		echo ' 
		<style>
			#notes_content span.heading, span.content
			{
				display: inline-block;
			}
			#notes_content span.heading
			{
				width: 30%;
				min-width: 30%;
				font-weight: bold;
				vertical-align: top;
			}
			#notes_content span.content
			{
				width: 65%;
				min-width: 65%;
			}
			#mem_notes
			{
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				border-radius: 10px;
				border: inset 2px;
			}
		</style>
			<input class="memnotes" id="'.$id.'" type="hidden"/>
			
			<span class="heading"> User Notes </span>
				<span class="content"> ';
				if(!(strlen($row['user_notes']) > 1))
					echo 'No notes available';
				else				
					echo $row['user_notes'];
		echo '
				</span>
			<span class="heading"> Member Comments </span>
				<span class="content"> ';
				if(!(strlen($row['member_comments']) > 1))
				echo 'No member comments available';
				else
				echo $row['member_comments'];
				echo '</span>
						<span class="heading"> Add Comments </span> 
						<span class="content"> 
							<textarea name="mem_notes" id="mem_notes" cols="37" rows="4""></textarea> 
						</span>';
}	
?>