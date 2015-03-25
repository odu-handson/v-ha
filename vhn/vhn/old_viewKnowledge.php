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
		$(document.body).on('click', "#check" ,function(){
				
			//alert($(this).attr("id"));
				
			//var page = $(this).attr("name");
						
			var answer = []; 
			
			$(".answer").each(function(index) {
			//alert($(this).val());
				if($(this).prop("checked")==true)
				{
					answer[index] = 1;
				}
				else
				{
					answer[index] = 0;
				}
				//answer[index] = $(this).val();
			});
						
			$.ajax({
				type: "POST",
				url: "completeEducationMaterial.php",
				data: { 
					'em_id': $("#em_id").val(),
					'section': 'knowledge',
					'answer': answer
				},
				success: function(data) {
				
					//$("#checker").html(data);
				
					if($.trim(data) == 1)
					{
						$(".alertMessage").html("<h4 style=\"color: green;\"> Correct! </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
								$(".AlertBox").hide();
							}, 4000);	
					}
					else if($.trim(data) == -1)
					{
						$(".alertMessage").html("<h4 style=\"color: red;\"> Incorrect. </h4>");
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

	<span class="page_title"> Knowledge Check </span>
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
			
			if($row_check['material'] == 1)
			{
				if(isset($_POST['first']))
				{
					$sql = "update user_education_material set knowledge_counter=knowledge_counter+1 where id=".$id;
					
					mysql_query($sql) or die(mysql_error());		
				}
				
				echo '<input type="hidden" id="em_id value="'.$id.'"/>';
				
				$sql2 = "select * from em_questions where education_material_id=".$em_id;
				
				$results = mysql_query($sql2) or die(mysql_error());
				
				$counter = 1;
				
				while($row = mysql_fetch_array($results))
				{
					echo "Question ".$counter.":</br>".$row['question']."</br>";
					
					$sql_a = "select * from em_answers where question_id=".$row['id'];
					
					$results_a = mysql_query($sql_a) or die(mysql_error());
					
					$a_counter = 'A';
					
					while($row_a = mysql_fetch_array($results_a))
					{
						echo $a_counter."<input type=\"checkbox\" class=\"answer\"/>".$row_a['answer']."</br>";
						
						$a_counter++;
					}
					
					echo "</br>";
					
					$counter++;
				}
				
				echo '<input type="button" style="width:200px;" class="button" id="check" value="Check Answers">';
			} //row check	
			else
			{
				echo "<h4 style=\"color: red;\"> Please complete the Material Review before proceeding </h4>";
			}
		} //isset user_em_id
		
	?>
	
	<div id="checker">
	
	</div>
	
	</div>


























