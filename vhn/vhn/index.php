<?php 
	include "appHead.php"; 
	include "expire.php";
	
	// if already logged in then send him back to home
	if(isset($_SESSION['login_status']))
		header("location: home.php");
?>
<style>
	#main_wrapper
	{
		border: 0;
		background: rgb(249,252,247); /* Old browsers */
		/* IE9 SVG, needs conditional override of 'filter' to 'none' */
		background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2Y5ZmNmNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmNWY5ZjAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
		background: -moz-linear-gradient(top,  rgba(249,252,247,1) 0%, rgba(245,249,240,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(249,252,247,1)), color-stop(100%,rgba(245,249,240,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(249,252,247,1) 0%,rgba(245,249,240,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(249,252,247,1) 0%,rgba(245,249,240,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(249,252,247,1) 0%,rgba(245,249,240,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(249,252,247,1) 0%,rgba(245,249,240,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9fcf7', endColorstr='#f5f9f0',GradientType=0 );
	}
</style>
<script type="text/javascript">
	$(function () 
	{
	
	
		$("#cancel_slide").click( function() {
			$(".AlertBox").hide();
			$(".errorNote").hide();
		});
		
		// More Information Form
		$("#more_info").click( function() {
			//$("#mainPageContent").hide();
			//$("#mainPageContentMobile").hide();
			$("#main_wrapper").hide();
			$("#micontent").show();
		});
		
		// Back to Home from More Information Form
		$("#more_info_back").click( function() {
			$("#main_wrapper").show();
			$("#micontent").hide();
		});
		
	});
</script>
	<?php include "mainPageContent.php"; ?>
	<?php include "Registration/MIForm.php"; ?>
<?php include "appTail.php"; ?>