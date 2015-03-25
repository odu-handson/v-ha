<?php 
	require_once('connectDB.php');
	
	$month = $_POST['month'];
	
	$week = $_POST['week'];
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
		
	$userID = $_SESSION['uid'];
?>

<script type="text/javascript">
	
	$(function() 
	{	
		$("input").removeClass("selected_week");
		
		$("#<?=$month?><?=$week?>").addClass("selected_week");
	
		$(document.body).on('click', ".show" ,function(){	

			$("a").removeClass("selected_em");
		
			$(this).addClass("selected_em");
		
			var id = $(this).attr("id");
			
			$("#top_finish").attr("name", id);
			$("#bottom_finish").attr("name", id);
		
			$("#content").show();	
			$("#top_div").show();
			$("#bottom_div").show();
		});	
		
		var start = <?= time() ?>;
	
		var end = start;
	
		var reloadId = setInterval(function () {
			
			end += 5000;
		
			$.ajax({
				type: "POST",
				url: "saveTime.php",
				data: { 
					'em_id': $("#em_id").val(),
					'start_time': start,
					'end_time': end,
					'uid': <?= $userID ?>,
					'last': $("#last").val()
				},
				success: function(data) {
					$("#last").val($.trim(data));
					//alert(data);
				},
				catch: false
			});	
		}, 5000);
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
	.selected_em
	{
		-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
		-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
		box-shadow:inset 0px 1px 0px 0px #ffffff;
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #009900), color-stop(1, #00BB00) );
		background:-moz-linear-gradient( center top, #009900 5%, #00BB00 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#009900', endColorstr='#00BB00');
		background-color:#009900;
		color:#CCCCCC;
		text-shadow:none;
		border:1px solid #006600;
	}
	.selected_em:hover
	{
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #00BB00), color-stop(1, #009900) );
		background:-moz-linear-gradient( center top, #00BB00 5%, #009900 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00BB00', endColorstr='#009900');
		background-color:#00BB00;
	}
	</style>
		
	<span class="page_title"> Education Material for Month <?=$month ?> Week <?=$week ?> </span>
	<div id="sub_wrapper" style="text-align:center;">
		<input type="hidden" id="month" value="<?=$month ?>" />
		<input type="hidden" id="week" value="<?=$week ?>" />
		</br>
		<?php	
			$sql = "select * from education_material where month=".$month." and week=".$week;
						
			$result = mysql_query($sql) or die(mysql_error());
			
			$row = mysql_fetch_array($result);
			
			$em_id = $row['id'];
			
			$sql2 = "select * from user_education_material where education_material_id=".$em_id." and user_id=".$userID;
			
			$result2 = mysql_query($sql2) or die(mysql_error());
			
			$row2 = mysql_fetch_array($result2);
			
			if(is_null($row2['id']))
			{			
				$sql3 = "insert into user_education_material (user_id, education_material_id) values (".$userID.", ".$em_id.")";
				
				mysql_query($sql3) or die(mysql_error());
				
				$result2 = mysql_query($sql2) or die(mysql_error());
			
				$row2 = mysql_fetch_array($result2);
			}

			$id = $row2['id'];
			
			?>
			
			<input type="hidden" id="em_id" value="<?=$em_id?>"/>			
			<input type="hidden" id="user_em_id" value="<?=$id?>"/>
			
			<div style="text-align:center;">
				<div style="display:inline-block;width:auto;">
					<div style="display:table;">
						<div style="display:table-cell;vertical-align:middle;"><a href="educationMaterial/m<?=$month?>w<?=$week?>material.pdf" style="width:400px;" class="em_button show" id="material" target="content">Material Review</a></div>
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
						<div style="display:table-cell;vertical-align:middle;"><a href="educationMaterial/m<?=$month?>w<?=$week?>knowledge.pdf" style="width:400px;" class="em_button show" id="knowledge" target="content">Knowledge Check</a></div>
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
						<div style="display:table-cell;vertical-align:middle;"><a href="educationMaterial/m<?=$month?>w<?=$week?>activity.pdf" style="width:400px;" class="em_button show" id="activity" target="content">Activities</a></div>
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
		<div id="top_div" style="float:right;display:none;"><input type="button" style="width:300px;" id="top_finish" name="" class="em_button finish" value="Finish"></div>
		</br></br>
		<iframe id="content" style="width:100%;height:800px;display:none;" />
		<div id="bottom_div" style="float:right;display:none;"><input type="button" style="width:300px;" id="bottom_finish" name="" class="em_button finish" value="Finish"></div>
	</div>


























