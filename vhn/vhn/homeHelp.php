<?php 
	include "appHead.php"; 
	include "expire.php";
	include "loginStatus.php";
	/* if(!isset($_SESSION['login_status']))
		header("location: index.php"); */
?>

<script type="text/javascript">
	
	$(function() 
	{
		
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

	<span class="page_title"> Home Page Help </span>
	<div id="main_wrapper">
		
		<span class="page_title"> How to Use the Announcements Section </span>
		<p style="margin-left:12%;margin-right:3%;">
			Announcements made my Administrators and Professionals will be show on the left-hand side of the home screen under the ANNOUNCEMENTS heading. The most recent announcements will be on top.
		</p>
		
		</br><span class="page_title"> How to Use the Discussion Board </span>
		<p style="margin-left:12%;margin-right:3%;">
			You can ask questions for professionals to answer. You may attach three files to aid in answering your question or to provide more information to the professional. You may also check the "Private" option if you do not wish other users to see your question. 
		</p>
		<p style="margin-left:12%;margin-right:3%;">
			You can click on the reply icon to see all the replies and the associated attachments for the question. If there are new replies that you have not viewed, then the icon will have a green plus (+) sign and the number of new comments will be shown before the icon.
		</p>
		<p style="margin-left:12%;margin-right:3%;">
			The newest questions are shown on top. You can also search for questions based on the question text by using the search bar at the top of the Discussion Blog pane.
		</p>
	</div>
<?php include "appTail.php"; ?>