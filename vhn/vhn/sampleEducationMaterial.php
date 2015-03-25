<?php 
	include "appHead.php"; 
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
			
			$(".alertMessage").html("<h4 style=\"color: green;\"> Success! </h4>");
				$(".AlertBox").show();
				setTimeout(function() {
					$(".AlertBox").hide();
				}, 4000);				
		});
	
		$(document.body).on('click', ".week" ,function(){
				
			var id = $(this).attr("id");
			
			$.ajax({
				type: "POST",
				url: "sampleLoadEducationMaterial.php",
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
	
	<div style="text-align:center;">
		
			<table style="text-align:center;width:100%;">
			<tr>
				<th>
				<input type="button" class="em_button month" name="m1" value="Month 1" />					
				</th>
				<th>
				<input type="button" class="em_button month" name="m2" value="Month 2" />	
				</th>
				<th>
				&nbsp;	
				</th>
				<th>
				&nbsp;	
				</th>
			</tr>
			<tr>
				<td>
				<input type="button" class="em_button week" id="11" name="w1" value="Week 1" />	
				</td>
				<td>
				<input type="button" class="em_button week" id="21" name="w1" value="Week 1" />				</td>
				<td>
				&nbsp;				</td>
				<td>
				&nbsp;				</td>
			</tr>
			<tr>
				<td>
				<input type="button" class="em_button week" id="12" name="w2" value="Week 2" />	
				</td>
				<td>
				<input type="button" class="em_button week" id="22" name="w2" value="Week 2" />				</td>
				<td>
				&nbsp;				</td>
				<td>
				&nbsp;				</td>
			</tr>
			<tr>
				<td>
				<input type="button" class="em_button week" id="13" name="w3" value="Week 3" />	
				</td>
				<td>
				<input type="button" class="em_button week" id="23" name="w3" value="Week 3" />				</td>
				<td>
				&nbsp;				</td>
				<td>
				&nbsp;				</td>
			</tr>
			<tr>
				<td>
				<input type="button" class="em_button week" id="14" name="w4" value="Week 4" />	
				</td>
				<td>
				<input type="button" class="em_button week" id="24" name="w4" value="Week 4" />				</td>
				<td>
				&nbsp;				</td>
				<td>
				&nbsp;				</td>
			</tr>			
		</table>
	</div>

	
	</br></br>
	
	<div id="em_content">
	
	</div>
	
	</div>
<?php include "appTail.php"; ?>


























