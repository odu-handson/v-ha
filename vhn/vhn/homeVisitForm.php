<style>
	#inclusion_container, #payment_div
	{
		width: 60%;
		margin-left: auto;
		margin-right: auto;
		margin: 0 auto;
	}
	#inclusion_container span.sub_headings1
	{
		margin: 0;
	}
	.formDivBox span.content
	{
		width: 40%;
	}
	.formDivBox span.content, .formDivBox span.title
	{
		width: 40%;
		font-size: 1.2em;
		display: inline-block;
		margin: 0 auto;
	}
</style>
<script>
	$(function() {
		$("#phead1").hide();
		$("#phead2").hide();
		//$("#payment_container").hide();
		$(document).on('change', '[name="with_payment"]', function() {
			if($(this).val() == "YES")
			{
				$("#payment_container").show();
				$("#phead1").show();
				$("#phead2").show();
			}
			else
			{
				$("#payment_container").hide();
				$("#phead1").hide();
				$("#phead2").hide();
			}
		});
	});
</script>
<?php
	include "expire.php";
	include "loginStatus.php";
	
	require_once("connectDB.php");
	$id = $_REQUEST['person_id'];
	
	
	$sql2 = "select * from user_hv_pdfs where user_id=".$id;
		$results2 = mysql_query($sql2) or die(mysql_error()); 
		$num = mysql_num_rows($results2);
		echo "<span class='sub_headings1'><h1>payment number : ".($num+1)."</h1></span>"; 
	
	
	$sql = "select 
				a.id,
				a.fname,
				a.lname,
				a.mname,
				a.email,
				a.st1,
				a.st2,
				a.city,
				a.zip,
				a.homeph,
				IFNULL(a.otherph, 0) otherph,
				a.unpaid_caregiver,
				a.internet_access,
				a.eng_prof,
				a.qualifies,
				a.user_notes,
				a.member_comments,
				IFNULL(uc.uname, 0) uname,
				a.role_id
			from
				(SELECT 
					u.id,
						u.fname,
						u.lname,
						u.mname,
						u.email,
						u.st1,
						u.st2,
						u.city,
						u.zip,
						u.homeph,
						u.otherph,
						p.unpaid_caregiver,
						p.internet_access,
						p.eng_prof,
						p.qualifies,
						u.user_notes,
						u.member_comments,
						u.role_id
				FROM
					preusers p, users u
				where
					p.user_id = u.id and u.id = $id) a
						left outer join
					user_credentials uc ON a.id = uc.user_id";
	$results = mysql_query($sql) or die(mysql_error()); 
	while($row = mysql_fetch_array($results))
	{
		if (session_status() == PHP_SESSION_NONE)
			session_start();
		$_SESSION['preuser_name'] = $row[1].' '.$row[2];
		echo '
			<input type="hidden" id="person_id_new" value="'.$row['id'].'"/>
			<span class="sub_headings1"> General Details </span>
			<div id="general_info_box" class="formDivBox">
				<span class="title"> Name: </span> 
					<span class="content"> '.$row['fname'].' '.$row['lname'].'</span> 
				<span class="title"> Street Address: </span> 
					<span class="content"> '.$row['st1'].' '.$row['st2'].'</span> 
				<span class="title"> City: </span>
					<span class="content"> '.$row['city'].'</span> 
				<span class="title"> Zip: </span>
					<span class="content"> '.$row['zip'].'</span> 
				<span class="title"> Home/Cell Phone: </span>
					<span class="content"> '.$row['homeph'].'</span> 
				<span class="title"> Other Phone: </span>
					<span class="content"> '.$row['otherph'].'</span> 
				<span class="title"> Email: </span>
					<span class="content"> '.$row['email'].'</span> 
			</div>
			
			<span class="sub_headings1"> With Payment? </span>
			<div id="payment_div">
					<input type="radio" name="with_payment" value="YES"> YES </input><br/>
					<input type="radio" name="with_payment" value="NO">  NO </input><br/>
			</div>
		';
		
		
		
		
	}
?>
<span id="phead1" class="sub_headings1"> Payment for Participation Received </span>
<span id="phead2" class="sub_headings1"> Home visit Receipt $50 </span>
<div id="payment_container">
	<span> 
		<strong> NAME: </strong> <?php echo $_SESSION['preuser_name']; ?> 
		<strong> DATE: </strong> <?php date_default_timezone_set('America/New_York');
					$mydate=date('M j Y'); 
					echo $mydate;
				?>
	</span>	
	</br><br/>
	<script src="js/signature_pad.js"></script>
	<script src="js/app.js"></script>
	<div id="signature-pad" class="m-signature-pad">
		<img id="img1" src=""/>
		<div id="pad1body" class="m-signature-pad--body">
			<canvas></canvas>
		</div>
		<div id="pad1footer" class="m-signature-pad--footer">
			<div class="description">Sign above</div>
			<button class="button clear" data-action="clear">Clear</button>
			<button id="save" class="button save" data-action="save">Save</button>
		</div>
	</div>
	<span>
		WITNESS: <?php echo $_SESSION['name']; ?>
		DATE: <?php echo $mydate; ?>
	</span>
	<script src="js/app1.js"></script>
	<div id="signature-pad2" class="m-signature-pad">
		<img id="img2" />
		<div id="pad2body" class="m-signature-pad--body">
			<canvas></canvas>
		</div>
		<div id="pad2footer" class="m-signature-pad--footer">
			<div class="description">Sign above</div>
			<button class="button clear" data-action="clear">Clear</button>
			<button "hidden" id="save" class="button save" data-action="save">Save</button>
		</div>
	</div>
</div>



	
