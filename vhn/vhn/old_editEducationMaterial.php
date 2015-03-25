<?php 
	include "appHead.php"; 
	include "expire.php";
	include "loginStatus.php";
	require_once('connectDB.php');
	/* if(!isset($_SESSION['login_status']))
		header("location: index.php"); */
?>

<script type="text/javascript">
	
	$(function() 
	{
		$('.type').change(function(){

			//alert( $(this).find("option:selected").val() );
			//alert($(this).attr("id"));
			
		});
	
		$(document.body).on('click', ".add_answer" ,function(){
			
			$("#answer_div"+$(this).attr("name")).append('<div style="display:table;"><div style="display:table-cell;vertical-align:middle;"><textarea rows="1" cols="50" class="answerk'+$(this).attr("name")+'"></textarea></div><div style="display:table-cell;vertical-align:middle;">&nbsp; <input type="checkbox" class="correctk'+$(this).attr("name")+'" /> Correct</div></div>');
		
		});
	
		$(document.body).on('click', ".del" ,function(){
			
			var id = $(this).attr("id");
			
			var current = id.substring(2);
			
			$.ajax({
				type: "POST",
				url: "updateEducationMaterial.php",
				data: { 
					'id': id,
					'type': $(this).attr("name")
				},
				success: function(data) {
					if($.trim(data) != 0)
					{
						data = $.trim(data);
						
						$("#"+id).val("Deleting");
						$(".alertMessage").html("<h4 style=\"color: green;\"> Success! </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
							
								if(id[1] == 'k')
								{
									$("#"+id).parent().remove();
									
									var questions = parseInt($("#questions").val());
									
									var curr = parseInt(current);
											
									for(var num=curr; num<=questions; num++)
									{
										alert(num);
									
										$("#h_question_"+num).text('Question '+(num-1));
										
										$("#h_question_"+num).attr("id", "#h_question_"+(num-1));
									}
									
									$("#questions").val(questions-1);
								}
								else
								{
									$("#"+id).parent().parent().remove();
								}
								$(".AlertBox").hide();
							}, 2000);
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
	
		$(document.body).on('click', ".ksave" ,function(){
		
			var id = $(this).attr("id");
			
			var parent = $(this).parent();
			
			var character = id[0];
			
			var name = $(this).attr("name");
			
			var correct = []; 
			
			$(".correct"+id).each(function(index) {
				correct[index] = $(this).prop("checked");
			});
			
			var answer = []; 
			
			$(".answer"+id).each(function(index) {
				answer[index] = $(this).val();
			});

										
			$.ajax({
				type: "POST",
				url: "updateEducationMaterial.php",
				data: { 
					'em_id': $("#em").val(),
					'id': id,
					'text': $("#"+$(this).attr("name")+$(this).attr("id")).val(),
					'correct': correct,
					'answer': answer
				},
				success: function(data) {
					if($.trim(data) != 0)
					{
						data = $.trim(data);
					
						//$("#message").html(data);
						
						//alert(data);
						
						$("#"+id).val("Updating");
						$(".alertMessage").html("<h4 style=\"color: green;\"> Success! </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
								$("#"+id).val("Save");
								$(".AlertBox").hide();
							
								if(data != -1)
								{
									$("#"+id).attr("id", character+data);
									
									$("#"+name+id).attr("id", name+character+data);
										
									$("#question_divnew").attr("id", "question_div"+data);
									
									$("#answer_divnew").attr("id", "answer_div"+data);
									
									$(".correctknew").each(function(index) {
										$(this).attr("class", "correctk"+data);
									});
									
									$(".answerknew").each(function(index) {
										$(this).attr("class", "answerk"+data);
									});
										
									var questions = parseInt($("#questions").val());
										
									$("#knowledge").append('<div id="question_divnew"></br><h3 id="h_question_'+questions+'">Question '+questions+'</h3>Question:</br><div style="display:table;"><div style="display:table-cell;vertical-align:middle;"><textarea rows="4" cols="50" id="knowledgeknew"></textarea></div></div><div id="answer_divnew">Answers:<div style="display:table;"><div style="display:table-cell;vertical-align:middle;"><textarea rows="1" cols="50" class="answerknew"></textarea></div><div style="display:table-cell;vertical-align:middle;">&nbsp; <input type="checkbox" class="correctknew"> Correct</div></div></div><br><input type="button" class="add_answer" id="addnew" name="new" value="Add New Answer"><input type="button" class="ksave" id="knew" name="knowledge" value="Save"></div>');
									
									$("#questions").val(questions+1);
									
									parent.append('<input type="button" class="del" id="dk'+data+'" name="knowledge" value="Delete">');
								}
							}, 2000);
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
	
		$(document.body).on('click', ".msave, .csave" ,function(){
				
			var id = $(this).attr("id");

			var character = id[0];
			
			var name = $(this).attr("name");
							
			//alert($("#"+$(this).attr("name")+$(this).attr("id")).val());
										
			$.ajax({
				type: "POST",
				url: "updateEducationMaterial.php",
				data: { 
					'em_id': $("#em").val(),
					'id': id,
					'text': $("#"+$(this).attr("name")+$(this).attr("id")).val()
				},
				success: function(data) {
					if($.trim(data) != 0)
					{
						data = $.trim(data);
					
						//$("#message").html(data);
						
						//alert(data);
						
						$("#"+id).val("Updating");
						$(".alertMessage").html("<h4 style=\"color: green;\"> Success! </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
								$("#"+id).val("Save");
								$(".AlertBox").hide();
							
								if(data != -1)
								{
									$("#"+id).attr("id", character+data);
									
									$("#"+name+id).attr("id", name+character+data);
										
									if(id=="mnew")
									{
										$("#m"+data).parent().append('<input type="button" class="del" id="dm'+data+'" name="material" value="Delete" />');
										
										$("#review").append('</br><div style="display:table;"><div style="display:table-cell;vertical-align:middle;"><textarea rows="4" cols="50" id="materialmnew"></textarea></div><div style="display:table-cell;vertical-align:middle;"><input type="button" class="msave" id="mnew" name="material" value="Save" /></div></div>');
									}
									if(id=="cnew")
									{
										$("#c"+data).parent().append('<input type="button" class="del" id="dc'+data+'" name="activity" value="Delete" />');
										
										$("#activity").append('</br><div style="display:table;"><div style="display:table-cell;vertical-align:middle;"><textarea rows="3" cols="50" id="activitycnew"></textarea></div><div style="display:table-cell;vertical-align:middle;"><input type="button" class="csave" id="cnew" name="activity" value="Save" /></div></div>');
									}
								}
							}, 2000);
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
	<form method="post" action="editEducationMaterial.php" style="text-align:center;">
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
		</br>
		<input type="submit" name="submit" value="View" />
	</form>
	
	<?php
		
		/*
		$id = 1;
		
		for($m=1;$m<5;$m++)
		{
			for($w=1;$w<5;$w++)
			{
				$sql = "insert into education_material values (".$id.",".$m.",".$w.")";
		
				mysql_query($sql) or die(mysql_error());
				
				$id++;
			}
		}
		*/
		
		if(isset($_POST['submit']))
		{
			$sql = "select * from education_material where month=".$m." and week=".$w;
						
			$results = mysql_query($sql) or die(mysql_error());
			
			while($row = mysql_fetch_array($results))
			{
				$id = $row['id'];
				
				echo '<input type="hidden" id="em" value="'.$id.'"/>';
				
				echo "</br>ID: ".$row['id'];
				echo "</br>Month: ".$row['month'];
				echo "</br>Week: ".$row['week'];
			}
			
			echo '<div id="review">
				  </br><span class="page_title"> Material Review </span>';
			
			$sql2 = "select * from em_material_review where education_material_id=".$id." order by ordering";
						
			$results2 = mysql_query($sql2) or die(mysql_error());
			
			while($row2 = mysql_fetch_array($results2))
			{	
				if($row2['media'] == 0)
				{
				?>		
					</br>
					<div style="display:table;">
						<div style="display:table-cell;vertical-align:middle;">
						<textarea rows="4" cols="50" id="materialm<?php echo $row2['id']; ?>"><?php echo $row2['material']; ?></textarea>
						</div>
						<div style="display:table-cell;vertical-align:middle;">
						<input type="button" class="msave" id="m<?php echo $row2['id']; ?>" name="material" value="Save" />
						<input type="button" class="del" id="dm<?php echo $row2['id']; ?>" name="material" value="Delete" />
						</div>
					</div>			
				<?php
				}
				else
				{
					//media
				}
			}
			?>
			
			</br>
			<div style="display:table;">
				<div style="display:table-cell;vertical-align:middle;">
				<textarea rows="4" cols="50" id="materialmnew"></textarea>
				</div>
				<div style="display:table-cell;vertical-align:middle;">
				<input type="button" class="msave" id="mnew" name="material" value="Save" />
				</div>
			</div>
			
			</div>
			
			<?php
			echo '<div id="knowledge">
				  </br><span class="page_title"> Knowledge Check </span>';
			
			$question_count = 1;
			
			$sql3 = "select * from em_questions where education_material_id=".$id." order by ordering";
						
			$results3 = mysql_query($sql3) or die(mysql_error());
			
			while($row3 = mysql_fetch_array($results3))
			{	
				echo '<div id="question_div'.$row3['id'].'">';
				
				if($row3['media'] == 0)
				{
					?>
					</br>
					<h3 id="h_question_<?=$question_count ?>">Question <?=$question_count ?></h3>
					Question:
					<div style="display:table;">
						<div style="display:table-cell;vertical-align:middle;">
						<textarea rows="4" cols="50" id="knowledgek<?php echo $row3['id']; ?>"><?php echo $row3['question']; ?></textarea>
						</div>
					</div>
					<?php
					
					$sql3a = "select * from em_answers where question_id=".$row3['id']." order by ordering";
						
					$results3a = mysql_query($sql3a) or die(mysql_error());
					
					echo '<div id="answer_div'.$row3['id'].'">Answers:';
					
					while($row3a = mysql_fetch_array($results3a))
					{
						if($row3a['media'] == 0)
						{
							?>
							<div style="display:table;">
								<div style="display:table-cell;vertical-align:middle;">
								<textarea rows="1" cols="50" class="answerk<?php echo $row3['id']; ?>"><?php echo $row3a['answer']; ?></textarea>
								</div>
								<div style="display:table-cell;vertical-align:middle;">
								&nbsp; <input type="checkbox" class="correctk<?php echo $row3['id']; ?>" <?php if($row3a['correct'] == 1) echo "checked"; ?> /> Correct
								</div>
							</div>
							<?php
						}
						else
						{
							//media
						}
					}

					echo "</div>";
					
				}
				else
				{
					//media
				}
				?>
				<input type="button" class="add_answer" name="<?php echo $row3['id']; ?>" value="Add New Answer" />
				<input type="button" class="ksave" id="k<?php echo $row3['id']; ?>" name="knowledge" value="Save" />
				<input type="button" class="del" id="dk<?php echo $row3['id']; ?>" name="knowledge" value="Delete" />
				<?php
				echo "</div>";
				
				$question_count++;
			}
			?>
			
			</br>
			<div id="question_divnew">
				<h3>Question <?=$question_count ?></h3>
				Question:
				<div style="display:table;">
					<div style="display:table-cell;vertical-align:middle;">
					<textarea rows="4" cols="50" id="knowledgeknew"></textarea>
					</div>
				</div>
				
				<div id="answer_divnew">				
					Answers:
					<div style="display:table;">
						<div style="display:table-cell;vertical-align:middle;">
						<textarea rows="1" cols="50" class="answerknew"></textarea>
						</div>
						<div style="display:table-cell;vertical-align:middle;">
						&nbsp; <input type="checkbox" class="correctknew" /> Correct
						</div>
					</div>
				</div>
				</br>
				<input type="button" class="add_answer" name="new" value="Add New Answer" />
				<input type="button" class="ksave" id="knew" name="knowledge" value="Save" />		
			</div>
			
			</div>
			<?php
			
			$question_count++;
			
			echo '<input type="hidden" id="questions" value="'.$question_count.'"/>';
			
			echo '<div id="activity">
				  </br><span class="page_title"> Activities </span>';
						
			$sql4 = "select * from em_activities where education_material_id=".$id." order by ordering";
						
			$results4 = mysql_query($sql4) or die(mysql_error());
			
			while($row4 = mysql_fetch_array($results4))
			{	
				if($row4['media'] == 0)
				{
				?>		
					</br>
					<div style="display:table;">
						<div style="display:table-cell;vertical-align:middle;">
						<textarea rows="3" cols="50" id="activityc<?php echo $row4['id']; ?>"><?php echo $row4['activity']; ?></textarea>
						</div>
						<div style="display:table-cell;vertical-align:middle;">
						<input type="button" class="csave" id="c<?php echo $row4['id']; ?>" name="activity" value="Save" />
						<input type="button" class="del" id="dc<?php echo $row4['id']; ?>" name="activity" value="Delete" />
						</div>
					</div>			
				<?php
				}
				else
				{
					//media
				}
			}
			?>
			</br>
			<div style="display:table;">
				<div style="display:table-cell;vertical-align:middle;">
				<textarea rows="3" cols="50" id="activitycnew"></textarea>
				</div>
				<div style="display:table-cell;vertical-align:middle;">
				<input type="button" class="csave" id="cnew" name="activity" value="Save" />
				</div>
			</div>
			
			</div>
			<?php
		} //isset submit
	?>
	
	<div id="message">
	
	</div>
	
	</div>
<?php include "appTail.php"; ?>


























