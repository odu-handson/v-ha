<?php 
	include "appHead.php"; 
	include "expire.php";
	include "loginStatus.php";
	require_once('connectDB.php');
?>

<script type="text/javascript">
	
	$(function() 
	{
		$(document.body).on('click', ".week" ,function(){
				
			var id = $(this).attr("id");
			
			$.ajax({
				type: "POST",
				url: "loadEditEducationMaterial.php",
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
	</style>
	
	<span class="page_title"> Education Material </span>
	<div id="main_wrapper">
	
	<div style="text-align:center;">
		<table style="text-align:center;width:100%;">
			<tr>
				<th>Month 1
					<!--<input type="button" class="button month" name="m1" value="Month 1" />-->
				</th>
				<th>Month 2
					<!--<input type="button" class="button month" name="m2" value="Month 2" />-->
				</th>
				<th>Month 3
					<!--<input type="button" class="button month" name="m3" value="Month 3" />-->
				</th>
				<th>Month 4
					<!--<input type="button" class="button month" name="m4" value="Month 4" />-->
				</th>
			</tr>
			<tr>
				<td>
					<input type="button" class="button week" id="11" name="w1" value="Week 1" />
				</td>
				<td>
					<input type="button" class="button week" id="21" name="w1" value="Week 1" />
				</td>
				<td>
					<input type="button" class="button week" id="31" name="w1" value="Week 1" />
				</td>
				<td>
					<input type="button" class="button week" id="41" name="w1" value="Week 1" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="button" class="button week" id="12" name="w2" value="Week 2" />
				</td>
				<td>
					<input type="button" class="button week" id="22" name="w2" value="Week 2" />
				</td>
				<td>
					<input type="button" class="button week" id="32" name="w2" value="Week 2" />
				</td>
				<td>
					<input type="button" class="button week" id="42" name="w2" value="Week 2" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="button" class="button week" id="13" name="w3" value="Week 3" />
				</td>
				<td>
					<input type="button" class="button week" id="23" name="w3" value="Week 3" />
				</td>
				<td>
					<input type="button" class="button week" id="33" name="w3" value="Week 3" />
				</td>
				<td>
					<input type="button" class="button week" id="43" name="w3" value="Week 3" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="button" class="button week" id="14" name="w4" value="Week 4" />
				</td>
				<td>
					<input type="button" class="button week" id="24" name="w4" value="Week 4" />
				</td>
				<td>
					<input type="button" class="button week" id="34" name="w4" value="Week 4" />
				</td>
				<td>
					<input type="button" class="button week" id="44" name="w4" value="Week 4" />
				</td>
			</tr>
		</table>
	</div>
	
	</br></br>
	
	<div id="em_content">
	
	</div>
	
	</div>
<?php include "appTail.php"; ?>


























