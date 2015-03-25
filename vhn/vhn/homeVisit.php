<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
	
	if(isset($_REQUEST['person_id']))
	{
		$person_id = $_REQUEST['person_id'];
	}
	else
	{
		$person_id = -1;
	}
?>
	<script type="text/javascript">
		$(function() {
			var person_id = <?php echo $person_id; ?> ;
			if(person_id > 0)
			{
				$("#homevisit_form_content").load("homeVisitForm.php?person_id="+person_id);
				$("#home_visit_finder").hide();
			}
			
			$("#home_visit_persons").change( function() {
				$("#homevisit_form_content").load("homeVisitForm.php?person_id="+$("#home_visit_persons").val());
			});
			
			
			
			$("#submit").click( function() {
				
				$.ajax({
				  type: "POST",
				  url: "ConvertHVTOPDF.php",
				  data: {
					'person_id': $("#person_id_new").val(),
					'dementia': $( "input:radio[name=Caregiver]:checked" ).val(),
					'payment_check': $( "input:radio[name=with_payment]:checked" ).val(),
					'internet': $( "input:radio[name=Internet]:checked" ).val(),
					'english': $( "input:radio[name=English]:checked" ).val(),
					'person_sign': $("#img1").attr("src"),
					'witness_sign': $("#img2").attr("src")
					//'home_visit': $("#home_visit").text()
				  },
				  success: function (data) {
						if( data == "Failed")
						{
							alert("Sorry request has not been sent! Please try again later or contact technical support.");
						}
						else 
						{
							alert("Payment details have been stored");
							window.location.href = "index.php";
							
							
						}
					},
				  dataType: "text"
				}); 
			});
		});
	</script>
	<style>
		#general_info_box span
		{
			display: inline-block;
			width: 48%;
		}
		
		#buttons_div
		{
			text-align:center;
		}
	</style>
	<link rel="stylesheet" media="screen" type="text/css" href="css/signature-pad.css" />
	<span class="page_title"> Home Visit </span>
	<div id="main_wrapper">
		<div id="homevisit_wrapper">
			<!--<form id="studyScreenForm"  action="#" method="POST" >-->
			<div id="div_form_container" class="forms">
				<div id="homevisit_form_content">
					<div id="home_visit_finder">
						Please Select the caregiver:
						<select id="home_visit_persons" name="home_visit_persons"> 
							<option> Please select an option </option>
							<?php 
								require_once("connectDB.php");
								$sql = "select u.id, u.fname, u.lname from users u, preusers p where u.id=p.user_id and p.qualifies=1;";
								$results = mysql_query($sql) or die(mysql_error()); 
								while($row = mysql_fetch_array($results))
								{
									echo '<option id="'.$row['id'].'" value="'.$row['id'].'">'.$row['fname'].' '.$row['lname'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div id="buttons_div" >
					<input type="button" id="submit" value="submit" />
				</div>
			</div>
			<!--</form>-->
		</div>
	</div>
<?php
	include "appTail.php";
?>