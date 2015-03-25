<?php 
	require_once('connectDB.php');
	
	$month = $_POST['month'];
	
	$week = $_POST['week'];
?>

<script type="text/javascript">
	
	$(function() 
	{	
		$(document.body).on('click', ".show" ,function(){
			
			$("#content").show();
			
			var id = $(this).attr("id");
			var month = $("#month").val();
			var week = $("#week").val();
			
			$("#none").hide();
													
			$("#uploader").contents().find("#type").val(id);
			
			$("#uploader").contents().find("#month").val(month);
			
			$("#uploader").contents().find("#week").val(week);
			
			$("#uploader").show();
			
			/*$.ajax({
				type: "POST",
				url: "educationMaterialUpload.php",
				data: { 
					'type': id,
					'month': month,
					'week': week
				},
				success: function(data) {
					if($.trim(data) != 0)
					{
						data = $.trim(data);
										
						$("#none").hide();
										
						//$("#sub_em_content").html(data);	
						
						$("#uploader").contents().find("#type").val(id);
						
						$("#uploader").contents().find("#month").val(month);
						
						$("#uploader").contents().find("#week").val(week);
						
						$("#uploader").show();
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
			});	*/
		});
	
		$(document.body).on('click', ".load" ,function(){

			$("#content").hide();
			
			var id = $(this).attr("id");
			var month = $("#month").val();
			var week = $("#week").val();
			
			$("#none").show();
			
			$("#uploader").contents().find("#type").val(id);
			
			$("#uploader").contents().find("#month").val(month);
			
			$("#uploader").contents().find("#week").val(week);
			
			$("#uploader").show();
			
			/*$.ajax({
				type: "POST",
				url: "educationMaterialUpload.php",
				data: { 
					'type': id,
					'month': month,
					'week': week
				},
				success: function(data) {
					if($.trim(data) != 0)
					{
						data = $.trim(data);
					
						$("#none").show();
					
						//$("#sub_em_content").html(data);	
						
						$("#uploader").contents().find("#type").val(id);
						
						$("#uploader").contents().find("#month").val(month);
						
						$("#uploader").contents().find("#week").val(week);
						
						$("#uploader").show();
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
			});	*/
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
		
	<span class="page_title"> Education Material for Month <?=$month ?> Week <?=$week ?> </span>
	<div id="sub_wrapper" style="text-align:center;">
		<input type="hidden" id="month" value="<?=$month ?>" />
		<input type="hidden" id="week" value="<?=$week ?>" />
		</br>
		<?php	
			$filename = dirname(__FILE__) . "/educationMaterial/m".$month."w".$week."material.pdf";
			$filename = str_replace(" ", "", $filename);

			if (file_exists($filename)) {
				echo '<a href="educationMaterial/m'.$month.'w'.$week.'material.pdf" style="width:200px;" class="button show" id="material" target="content">Material Review</a>';
			} else {
				echo '<input type="button" style="width:200px;height:32px;padding:0px;" class="button load" id="material" name="material" value="Material Review" />';
			}

			$filename = dirname(__FILE__) . "/educationMaterial/m".$month."w".$week."knowledge.pdf";
			$filename = str_replace(" ", "", $filename);

			if (file_exists($filename)) {
				echo '<a href="educationMaterial/m'.$month.'w'.$week.'knowledge.pdf" style="width:200px;margin-left:5px;margin-right:5px;" class="button show" id="knowledge" target="content">Knowledge Check</a>';
			} else {
				echo '<input type="button" style="width:200px;height:32px;padding:0px;margin-left:5px;margin-right:5px;" class="button load" id="knowledge" name="knowledge" value="Knowledge Check" />';
			}
	
			$filename = dirname(__FILE__) . "/educationMaterial/m".$month."w".$week."activity.pdf";
			$filename = str_replace(" ", "", $filename);

			if (file_exists($filename)) {
				echo '<a href="educationMaterial/m'.$month.'w'.$week.'activity.pdf" style="width:200px;" class="button show" id="activity" target="content">Activities</a>';
			} else {
				echo '<input type="button" style="width:200px;height:32px;padding:0px;" class="button load" id="activity" name="activity" value="Activities" />';
			}
		?>
	
		</br></br>
		<div id="none" style="display:none;"><h2 style="color:red;">No File Found</h4></div>
		<div id="sub_em_content"></div>
		
		<iframe id="uploader" style="width:50%;height:50px;text-align:center;border:0px;display:none;" src="educationMaterialUpload.html"/>
		
		</br></br>
		<iframe id="content" style="width:100%;height:500px;display:none;" />
	</div>


























