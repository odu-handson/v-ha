<!--<div id="navbarVertical">
	<div id="navbarVertical_wrapper">
		<div id="navbarVertical_holder">-->
		
		<ul id="verticalNavBar">
		
			<!--<?php
				if(isset($_SESSION['currentScreenwidth']) && $_SESSION['currentScreenwidth'] > 700)
				{
					echo '<ul>';
				}
			?>-->
				<?php
					/* if($_SESSION['role'] == 1 || (isset($_SESSION['sub_roles']) && in_array(2, $_SESSION['sub_roles'])))
					{
						echo '	<li><a href="data-collection.php">Data Collection</a></li> ';
					} */
					if($_SESSION['role'] == 1)
					{
						echo '	<li><a href="signUp.php">Sign Up Members</a></li>';
					}
					/*
					if($_SESSION['role'] == 1 || $_SESSION['role'] == 2)
					{
						echo '	<li><a href="viewUsers1.php">View Members</a></li>';
					}
					*/
					if($_SESSION['role'] == 1 || (isset($_SESSION['sub_roles']) && in_array(7, $_SESSION['sub_roles'])))
					{
						echo ' 	<li> <a href="ssf.php">Study Screening </a> </li>';
					}
					if($_SESSION['role'] != 4 || (isset($_SESSION['sub_roles']) && in_array(1, $_SESSION['sub_roles'])))
					{
						echo '	<li><a href="Surveys.php">Program Surveys</a></li> ';
					}
					
					/*
					if($_SESSION['role'] == 1 || (isset($_SESSION['sub_roles']) && in_array(3, $_SESSION['sub_roles'])))
					{
						echo '	<li><a href="sleepTracker.php">Sleep Tracker Data</a></li> ';
					}
					*/
					
					
					/*
					if($_SESSION['role'] != 3 || (isset($_SESSION['sub_roles']) && in_array(4, $_SESSION['sub_roles'])))
					{
						echo '	<li><a href="addHealthPost.php">View Caregiver Questions</a></li> ';
					}
					*/
					if($_SESSION['role'] != 3)
					{
						echo '	<li><a href="showPreUsers.php">View Users</a></li> ';
						echo '	<li><a href="PostAnnouncements.php">Announcements</a></li> ';
					}
					if($_SESSION['role'] != 3)
					{
						echo '	<li><a href="homeVisit.php">Home Visits</a></li> ';
					}
					if($_SESSION['role'] == 3)
					{
						echo '	<li><a href="viewMyConsentForm.php">My Consent Form</a></li> ';
						echo '	<li><a href="myDiscussionQuestions.php">My Questions</a></li> ';
					}
					echo '	<li><a href="viewMyProfile.php">My Profile</a></li> ';
					
					echo '	<li><a href="homeHelp.php">Home Page Help</a></li> ';
					
					if($_SESSION['role'] == 1)
					{
						echo '	<li><a href="editEducationMaterial.php">Education Material</a></li>';
					}
				?>
			<!--<?php
				if(isset($_SESSION['currentScreenwidth']) && $_SESSION['currentScreenwidth'] > 700)
				{
					echo '</ul>';
				}
			?>-->
			
			</ul>
		<!--</div>
	</div>
</div>-->