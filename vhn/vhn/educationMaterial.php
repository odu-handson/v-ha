<?php 
	include "appHead.php"; 
	include "expire.php";
	include "loginStatus.php";
	require_once('connectDB.php');
?>

<script type="text/javascript">
	$(function() 
	{
		$(document.body).on('click', ".month" ,function(){
		
			var month = $(this).attr("name")[1];
						
			$(".week").each(function(index) {
				if($(this).attr("id")[0] == month)
				{
					$(this).show("slow");
				}
				else
				{
					$(this).hide("fast");
				}
			});
		});
	
		$(document.body).on('click', ".finish" ,function(){
			
			var section = $(this).attr("name");
			
			$.ajax({
				type: "POST",
				url: "completeEducationMaterial.php",
				data: { 
					'em_id': $("#em_id").val(),
					'section': section
				},
				success: function(data) {
					if($.trim(data) != 0)
					{
						$(".alertMessage").html("<h4 style=\"color: green;\"> Success! </h4>");
							$(".AlertBox").show();
							setTimeout(function() {
								$(".AlertBox").hide();
								
								var month = $("#month").val();
								
								var week = $("#week").val();
								
								$.ajax({
									type: "POST",
									url: "loadEducationMaterial.php",
									data: { 
										'month': month,
										'week': week
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
	
		$(document.body).on('click', ".week" ,function(){
				
			var id = $(this).attr("id");
			
			$.ajax({
				type: "POST",
				url: "loadEducationMaterial.php",
				data: { 
					'month': id[0],
					'week': id[1]
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
	.em_button 
	{
		-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
		-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
		box-shadow:inset 0px 1px 0px 0px #ffffff;
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
		background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
		background-color:#ededed;
		-webkit-border-radius:10px;
		-moz-border-radius:10px;
		border-radius:10px;
		text-indent:0;
		border:1px solid #dcdcdc;
		display:inline-block;
		color:#666666;
		font-family:Times New Roman;
		font-size:25px;
		font-weight:bold;
		font-style:normal;
		height:60px;
		line-height:60px;
		width:170px;
		text-decoration:none;
		text-align:center;
		text-shadow:1px 1px 0px #ffffff;
		text-transform: uppercase;
	}
	.em_button:hover 
	{
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
		background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
		background-color:#dfdfdf;
	}
	.selected_week
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
	.selected_week:hover
	{
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #00BB00), color-stop(1, #009900) );
		background:-moz-linear-gradient( center top, #00BB00 5%, #009900 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00BB00', endColorstr='#009900');
		background-color:#00BB00;
	}
	.week
	{
		display:none;
	}
	</style>
	
	<span class="page_title"> Education Material </span>
	<div id="main_wrapper">
	<input type="hidden" id="last" value="-1" />
	<?php
		
		/*for($x=0;$x<16;$x++) {
			$sql_u = "update education_material set available=TO_SECONDS(MAKEDATE(2014,".((76) + (7 * $x) ).")) where id=".($x + 1);
			
			echo $sql_u."</br>";
			
			mysql_query($sql_u) or die(mysql_error());
		}*/
		
		//$sql = "select * from education_material where available < TO_SECONDS(DATE_ADD(NOW(), INTERVAL -44 day))";
	
		$sql = "select * from education_material where available <= TO_SECONDS(NOW())";
	
		//$sql = "select * from education_material";
	
		$results = mysql_query($sql) or die(mysql_error());
			
		$rows = mysql_num_rows($results);
			
		//$rows = 1;
			
		/*while($row = mysql_fetch_array($results))
		{
			echo "</br>".$row['id'];
		}*/
	?>
	
	<div style="text-align:center;">
	
	<!--<h2><a href="sampleEducationMaterial.php">Click here to view the Sample Education Material</a></h2>-->
	
	<?php
		if($rows == 0)
		{
			echo "<h1 style=\"color: red;\">No Education Material is available at this time</h4>";
		}
	?>
		<table style="text-align:center;width:100%;">
			<tr>
				<th>
				<?php 
					if($rows > 0)
					{
						echo '<input type="button" class="em_button month" name="m1" value="Month 1" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>					
				</th>
				<th>
				<?php 
					if($rows > 4)
					{
						echo '<input type="button" class="em_button month" name="m2" value="Month 2" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>	
				</th>
				<th>
				<?php 
					if($rows > 8)
					{
						echo '<input type="button" class="em_button month" name="m3" value="Month 3" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>	
				</th>
				<th>
				<?php 
					if($rows > 12)
					{
						echo '<input type="button" class="em_button month" name="m4" value="Month 4" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>	
				</th>
			</tr>
			<tr>
				<td>
				<?php 
					if($rows > 0)
					{
						echo '<input type="button" class="em_button week" id="11" name="w1" value="Week 1" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>	
				</td>
				<td>
				<?php 
					if($rows > 4)
					{
						echo '<input type="button" class="em_button week" id="21" name="w1" value="Week 1" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
				<td>
				<?php 
					if($rows > 8)
					{
						echo '<input type="button" class="em_button week" id="31" name="w1" value="Week 1" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
				<td>
				<?php 
					if($rows > 12)
					{
						echo '<input type="button" class="em_button week" id="41" name="w1" value="Week 1" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
			</tr>
			<tr>
				<td>
				<?php 
					if($rows > 1)
					{
						echo '<input type="button" class="em_button week" id="12" name="w2" value="Week 2" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>	
				</td>
				<td>
				<?php 
					if($rows > 5)
					{
						echo '<input type="button" class="em_button week" id="22" name="w2" value="Week 2" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
				<td>
				<?php 
					if($rows > 9)
					{
						echo '<input type="button" class="em_button week" id="32" name="w2" value="Week 2" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
				<td>
				<?php 
					if($rows > 13)
					{
						echo '<input type="button" class="em_button week" id="42" name="w2" value="Week 2" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
			</tr>
			<tr>
				<td>
				<?php 
					if($rows > 2)
					{
						echo '<input type="button" class="em_button week" id="13" name="w3" value="Week 3" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>	
				</td>
				<td>
				<?php 
					if($rows > 6)
					{
						echo '<input type="button" class="em_button week" id="23" name="w3" value="Week 3" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
				<td>
				<?php 
					if($rows > 10)
					{
						echo '<input type="button" class="em_button week" id="33" name="w3" value="Week 3" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
				<td>
				<?php 
					if($rows > 14)
					{
						echo '<input type="button" class="em_button week" id="43" name="w3" value="Week 3" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
			</tr>
			<tr>
				<td>
				<?php 
					if($rows > 3)
					{
						echo '<input type="button" class="em_button week" id="14" name="w4" value="Week 4" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>	
				</td>
				<td>
				<?php 
					if($rows > 7)
					{
						echo '<input type="button" class="em_button week" id="24" name="w4" value="Week 4" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
				<td>
				<?php 
					if($rows > 11)
					{
						echo '<input type="button" class="em_button week" id="34" name="w4" value="Week 4" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
				<td>
				<?php 
					if($rows > 15)
					{
						echo '<input type="button" class="em_button week" id="44" name="w4" value="Week 4" />';
					}
					else
					{
						echo '&nbsp;';
					}
				?>
				</td>
			</tr>			
		</table>
	</div>
	
	</br></br>
	
	<div id="em_content">
	
	</div>
	
	</div>
<?php include "appTail.php"; ?>


























