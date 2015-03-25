<?php
	$name = basename($_SERVER['PHP_SELF']);
?>
	<script type="text/javascript">
		function showSubMenu()
		{
			//alert("hi");
			$("#nav_dropdown ul").css("display","block");
			$("#nav_dropdown ul").css("z-index","1000");
			$("#drop_hide").css("display","block");
		}
		
		
		function closeMenu()
		{
			var div1Class = $('#nav_dropdown ul').attr('id');
			//alert("div1Class");
			$("#verticalNavBar").css("display","none");
			$("#drop_hide").css("display","none");
		}
		
		
		/* $(document.body).on('mouseover', '#nav_dropdown ul',  function() {
		   $("#nav_dropdown ul").css("display","block");
			$("#nav_dropdown ul").css("z-index","1000");
		});  */
		
		/* $(document.body).on('mouseout', '#nav_dropdown ul',  function() {
		   $("#nav_dropdown ul").css("display","none");
		});  */
		
		/* $("#nav_dropdown ul").on('mousemove mouseleave', function () {
			$("#nav_dropdown ul").css("display","none");
		}) */
	</script>
	<div id="navbar_wrapper">
		<div id="navbar_holder">
			<ul id="hnb">
			
				<li><a href="index.php">Home</a></li>
				
				<li id="nav_dropdown" onclick="javascript: showSubMenu();"> <a> My Services </a> <?php include "navBarVertical.php"; ?></li>
				<li><a onclick="javascript: closeMenu();"><img id="drop_hide" src="imgs/up.bmp" height="15" width="15" style="display:none;"></a></li>
				<!--<li><a <?php if($name == "discussionBoard.php") echo 'class="selected"'; ?> href="discussionBoard.php">Discussion Board</a></li>-->
				<!--<li><a <?php if($name == "health-education.php") echo 'class="selected"'; ?> href="health-education.php">Health Education</a></li>-->
				<li><a <?php if($name == "sleep-tracker.php") echo 'class="selected"'; ?> href="sleep-tracker.php">Sleep Tracker</a></li>
				<li><a <?php if($name == "ask-a-professional1.php") echo 'class="selected"'; ?> href="ask-a-professional1.php">About Us</a></li>
				<li><a <?php if($name == "educationMaterial.php") echo 'class="selected"'; ?> href="educationMaterial.php">Education Material</a></li>
					
				<!--<li><a <?php if($name == "VirtualSupportGroup1.php") echo 'class="selected"'; ?> href="VirtualSupportGroup1.php">Virtual Support Group</a></li>-->
				<?php
					if (session_status() == PHP_SESSION_NONE)
						session_start();
					if($_SESSION['currentScreenwidth'] < 700)
					{
						include 'navBarVertical.php';
					}
				?>
				<!--<li><a <?php if($name == "viewMyProfile.php") echo 'class="selected"'; ?> href="viewMyProfile.php">My Profile</a></li>-->
				
				<?php
				if($_SESSION['role'] == 1 || $_SESSION['role'] == 2)
				{
				?>
					<li><a <?php if($name == "viewProfessionalQuestions.php") echo 'class="selected"'; ?> href="viewProfessionalQuestions.php">View Questions</a></li>
				<?php
				}
				?>
				
			</ul>
		</div>
	</div>