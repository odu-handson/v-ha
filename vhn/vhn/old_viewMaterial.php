<?php 
	include "expire.php";
	require_once('connectDB.php');
?>

<script type="text/javascript">
	
	$(function() 
	{
		$(document.body).on('click', ".next, .back" ,function(){
				
			var page = $(this).attr("name");
						
			$.ajax({
				type: "POST",
				url: "viewMaterial.php",
				data: { 
					'em_id': $("#em_id").val(),
					'user_em_id': $("#user_em_id").val(),
					'page': page
				},
				success: function(data) {
					if($.trim(data) != 0)
					{
						data = $.trim(data);
					
						$("#em_content").html(data);	
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
		
		$(document.body).on('click', ".finish" ,function(){
			
			$.ajax({
				type: "POST",
				url: "completeEducationMaterial.php",
				data: { 
					'em_id': $("#em_id").val(),
					'section': 'material'
				},
				success: function(data) {
					if($.trim(data) != 0)
					{
						$(".alertMessage").html("<h4 style=\"color: green;\"> Success! </h4>");
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
	
	<span class="page_title"> Material Review </span>
	</br></br></br>
	<div id="sub_wrapper">
	
	<?php
		
		if(isset($_POST['user_em_id']))
		{
			$id = $_POST['user_em_id'];
		
			$em_id = $_POST['em_id'];
		
			if(isset($_POST['first']))
			{
				$sql = "update user_education_material set material_counter=material_counter+1 where id=".$id;
				
				mysql_query($sql) or die(mysql_error());		
			}
			
			echo '<input type="hidden" id="em_id value="'.$id.'"/>';
			
			if(isset($_POST['page']))
			{
				$page = $_POST['page'];
			}
			else
			{
				$page = 1;
			}
			
			$sql2 = "select * from em_material_review where education_material_id=".$em_id." and ordering=".$page;
			
			$results = mysql_query($sql2) or die(mysql_error());
			
			$row = mysql_fetch_array($results);
			
			$sql3 = "select max(ordering) max from em_material_review where education_material_id=".$em_id;
			
			$results3 = mysql_query($sql3) or die(mysql_error());
			
			$row3 = mysql_fetch_array($results3);
			
			$max = $row3['max'];
			
			echo '<div style="display:inline-block;width:100%;">';
			
			if($page > 1)
			{
				echo '<div style="float:left;"><input type="button" style="width:200px;" class="button back" name="'.($page-1).'" value="Back"></div>';
			}
			else
			{
				echo '<div style="float:left;width:200px;">&nbsp;</div>';
			}
			if($page < $max)
			{
				echo '<div style="float:right;"><input type="button" style="width:200px;" class="button next" name="'.($page+1).'" value="Next"></div>';
			}
			else
			{
				echo '<div style="float:right;"><input type="button" style="width:200px;" class="button finish" value="Finish"></div>';
			}
			
			echo '</div>';
			
			echo '</br><div style="text-align:center;">';
			
			if($row['media'] == 0)
			{
				echo $row['material'];
			}
			else
			{
				//media
			}
			
			echo '</div>';
	
		} //isset user_em_id
	?>
	
	</div>


























