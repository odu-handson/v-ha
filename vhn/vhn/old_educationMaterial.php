<?php 
	include "appHead.php"; 
	include "expire.php";
	include "loginStatus.php";
	require_once('connectDB.php');
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
		
	$userID = $_SESSION['uid'];
?>

<script type="text/javascript">
	
	$(function() 
	{
		$(document.body).on('click', ".view" ,function(){
				
			var id = $(this).attr("id");
			
			//alert(id);
			
			$.ajax({
				type: "POST",
				url: "view"+id+".php",
				data: { 
					'em_id': $("#em_id").val(),
					'user_em_id': $("#user_em_id").val(),
					'first': 1
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

	<?php
		$m = 1;
		
		$w = 1;
	
		if(isset($_POST['submit']))
		{			
			$m = $_POST['month'];
			
			$w = $_POST['week'];
		}
	?>
	
	<span class="page_title"> Education Material </span>
	<div id="main_wrapper">
	<form method="post" action="educationMaterial.php" style="text-align:center;">
		Month: <select name="month"> 
			<option value="1" <?php if($m==1)echo 'selected="selected"'; ?>>1</option>
			<option value="2" <?php if($m==2)echo 'selected="selected"'; ?>>2</option>
			<option value="3" <?php if($m==3)echo 'selected="selected"'; ?>>3</option>
			<option value="4" <?php if($m==4)echo 'selected="selected"'; ?>>4</option>   
		</select>
		
		Week: <select name="week"> 
			<option value="1" <?php if($w==1)echo 'selected="selected"'; ?>>1</option>
			<option value="2" <?php if($w==2)echo 'selected="selected"'; ?>>2</option>
			<option value="3" <?php if($w==3)echo 'selected="selected"'; ?>>3</option>
			<option value="4" <?php if($w==4)echo 'selected="selected"'; ?>>4</option>   
		</select>
		</br></br>
		<input type="submit" class="button" name="submit" value="View" />
	</form>
	
	<?php
		
		if(isset($_POST['submit']))
		{
			$sql = "select * from education_material where month=".$m." and week=".$w;
						
			$results = mysql_query($sql) or die(mysql_error());
			
			$row = mysql_fetch_array($results);
			
			$em_id = $row['id'];
			
			$sql2 = "select * from user_education_material where education_material_id=".$em_id." and user_id=".$userID;
			
			$results2 = mysql_query($sql2) or die(mysql_error());
			
			$row2 = mysql_fetch_array($results2);
			
			if(is_null($row2['id']))
			{			
				$sql3 = "insert into user_education_material (user_id, education_material_id) values (".$userID.", ".$em_id.")";
				
				mysql_query($sql3) or die(mysql_error());
				
				$results2 = mysql_query($sql2) or die(mysql_error());
			
				$row2 = mysql_fetch_array($results2);
			}

			$id = $row2['id'];
						
			?>
			<input type="hidden" id="em_id" value="<?=$em_id?>"/>
			
			<input type="hidden" id="user_em_id" value="<?=$id?>"/>
			
			</br></br>
			<div style="text-align:center;">
				<div style="display:inline-block;width:auto;">
					<div style="display:table;">
						<div style="display:table-cell;vertical-align:middle;"><input type="button" style="width:200px;" class="button view" id="Material" value="Material Review"></div>
						<div style="display:table-cell;vertical-align:middle;"><img style="margin-left:15px;width:35px;" src="images/<?php 
							
							if($row2['material'] == 0)
							{
								echo 'incomplete';
							}
							else
							{
								echo 'complete';
							}
						?>.png"/></div>
					</div>
				</div>
				</br></br>
				<div style="display:inline-block;width:auto;">
					<div style="display:table;">
						<div style="display:table-cell;vertical-align:middle;"><input type="button" style="width:200px;" class="button view" id="Knowledge" value="Knowledge Check"></div>
						<div style="display:table-cell;vertical-align:middle;"><img style="margin-left:15px;width:35px;" src="images/<?php
							if($row2['material'] == 0)
							{
								echo 'notViewable';
							}
							else
							{
								if($row2['knowledge'] == 0)
								{
									echo 'incomplete';
								}
								else
								{
									echo 'complete';
								}
							}
						?>.png"/></div>
					</div>
				</div>
				
				</br></br>
				<div style="display:inline-block;width:auto;">
					<div style="display:table;">
						<div style="display:table-cell;vertical-align:middle;"><input type="button" style="width:200px;" class="button view" id="Activity" value="Activities"></div>
						<div style="display:table-cell;vertical-align:middle;"><img style="margin-left:15px;width:35px;" src="images/<?php 
							if($row2['knowledge'] == 0)
							{
								echo 'notViewable';
							}
							else
							{	
								if($row2['activity'] == 0)
								{
									echo 'incomplete';
								}
								else
								{
									echo 'complete';
								}
							}
						?>.png"/></div>
					</div>
				</div>
			</div>
			<?php
		} //isset submit
	?>
	
	<div id="em_content">
	
	</div>
	
	</div>
<?php include "appTail.php"; ?>


























