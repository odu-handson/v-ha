<?php 
	include "expire.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
		
	$userID = $_SESSION['uid'];
?>

<script type="text/javascript">
	
	$(function() 
	{
		$(document.body).on('click', "#update" ,function(){
						
			var activity = []; 
			
			var aid = [];
			
			$(".activity").each(function(index) {
				aid[index] = $(this).attr("name");
			
				if($(this).prop("checked")==true)
				{
					activity[index] = 1;
				}
				else
				{
					activity[index] = 0;
				}
			});
					
			$.ajax({
				type: "POST",
				url: "completeEducationMaterial.php",
				data: { 
					'em_id': $("#em_id").val(),
					'section': 'activity',
					'activity': activity,
					'aid': aid
				},
				success: function(data) {
				
					//$("#checker").html(data);
				
					if($.trim(data) == 1)
					{
						$(".alertMessage").html("<h4 style=\"color: green;\"> Complete! </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
								$(".AlertBox").hide();
							}, 4000);	
					}
					else if($.trim(data) == -1)
					{
						$(".alertMessage").html("<h4 style=\"color: green;\"> Updated! </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
								$(".AlertBox").hide();
							}, 4000);
					}
					else
					{
						$(".alertMessage").html("<h4 style=\"color: red;\"> Error sending data. </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
								$(".AlertBox").hide();
							}, 4000);
					}
				},
				catch: false
			});	
		});
	});
</script>
	<style>
	.Note
	{
		color: rgb(137,137,186);
	}
	.Note, .errorNote
	{
		font-style: italic;
	}
	.errorNote
	{
		color: red;
	}
	.mandatory
	{
		font-weight: bold;
	}
	</style>
	
	<span class="page_title"> Activities </span>
	</br></br></br>
	<div id="sub_wrapper" style="margin-left:200px;">
	
	<?php
		
		if(isset($_POST['user_em_id']))
		{
			$id = $_POST['user_em_id'];
		
			$em_id = $_POST['em_id'];
			
			$sql_check = "select * from user_education_material where education_material_id=".$em_id." and user_id=".$userID;
			
			$results_check = mysql_query($sql_check) or die(mysql_error());
			
			$row_check = mysql_fetch_array($results_check);
			
			if($row_check['knowledge'] == 1)
			{
			
				if(isset($_POST['first']))
				{
					$sql = "update user_education_material set activity_counter=activity_counter+1 where id=".$id;
					
					mysql_query($sql) or die(mysql_error());		
				}
				
				echo '<input type="hidden" id="em_id value="'.$id.'"/>';
				
				$sql2 = "select * from em_activities where education_material_id=".$em_id;
				
				$results = mysql_query($sql2) or die(mysql_error());
				
				$counter = 1;
				
				while($row = mysql_fetch_array($results))
				{
					$sql_u = "select * from user_activities where activity_id=".$row['id']." and user_id=".$userID;
					
					$result_u = mysql_query($sql_u) or die(mysql_error());
					
					$row_u = mysql_fetch_array($result_u);
					
					$complete = "";
					
					if(is_null($row_u['id']))
					{
						$sql_i = "insert into user_activities(activity_id, user_id) values(".$row['id'].",".$userID.")";
						
						$complete = "";
						
						mysql_query($sql_i) or die(mysql_error());
					}
					else
					{
						if($row_u['complete'] == 1)
						{
							$complete = "checked";
						}
					}
				
					echo $counter."<input type=\"checkbox\" ".$complete." name=\"".$row['id']."\" class=\"activity\"/>".$row['activity']."</br>";
						
					$counter++;
				}
				
				echo '</br><input type="button" style="width:200px;" class="button" id="update" value="Update">';
			} //row check
			else
			{
				echo "<h4 style=\"color: red;\"> Please complete the Knowledge Check before proceeding </h4>";
			}
		} //isset submit
	?>
	
	<div id="message">
	
	</div>
	
	</div>


























