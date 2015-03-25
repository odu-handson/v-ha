<?php
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
?>
	<script type="text/javascript">
		$(function() {
			//$("#announcements").load("showAnnouncements.php");
			$.ajax({
				type: "POST",
				url: "showAnnouncements.php",
				success: function(data) {
					$("#announcements").html(data.replace('<span class="page_title">Announcements</span>',''));
				}
			});
			//var element = $('#announcements').find('span:first-child').remove();
			//console.log(element);
			/* var refreshId = setInterval(function() {
				$.ajax({
					type: "POST",
					url: "showAnnouncements.php",
					success: function(data) {
						$("#announcements").html(data.replace('<span class="page_title">Announcements</span>',''));
					}
				});
			}, 10000); */
			
			// Submit Announcement
			$("#submit_request").click( function(){
				
				if($.trim($("#post_question").val()) == "")
				{
					alert("Question Empty!");
					$("#post_question").val("");
				}
				else
				{
					$.ajax({
						type: "POST",
						cache: false,
						url: "postNewAnnouncement.php",
						data: { 
							'text': $("#post_question").val()
						},
						success: function(data) {
							if(data)
							{
								alert("Success");
								$("#post_question").val("");
							}
							else
							{
								alert("Fail");
							}
						}
					});
				}
			});
			
		});
	</script>
	<style>
		#main_content
		{
			max-width: 800px;
			margin-left: auto;
			margin-right: auto;
		}
		.AnnouncementPost
		{
			background: #FFF;
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top: 20px;
			overflow: hidden;
			padding-right: 5px;
		}
		textarea#post_question
		{
			width: 98%;
			height: 50px;
			border: 5px #DDD solid;
			background: #DDD;
			border-radius: 5px;
			margin-left: auto;
			margin-right: auto;
			outline: none;
		}
	</style>
	<!--<span class="page_title"> Announcements </span>-->
	<div id="main_wrapper">
		<div id="main_content">
			<div id="announcements">
			</div>
			<div class="AnnouncementPost">
				<span class="sub_headings1"> Have a Announcement? Please post it below ! </span>
				<textarea name="post_question" id="post_question" style="vertical-align: middle"></textarea>
				<input style="margin-top: 20px; float: right" type="button" class="button" id="submit_request" value="Submit">
			</div>
		</div>
	</div>
<?php
	include "appTail.php";
?>