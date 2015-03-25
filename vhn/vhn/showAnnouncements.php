
<script type="text/javascript">
	$(function() {
		$("#announcements_content").load("loadAnnouncements.php");
		var reloadId = setInterval(function () {
			$("#announcements_content").load("loadAnnouncements.php");
		}, 10000);
	});
	
</script>
<style>
	#announcements_content
	{
		border: 2px solid #ccc;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
		overflow-x: hidden;
		max-height: 700px;
	}
	.announcement_block
	{
		border-bottom: 2px solid #ccc; /*rgb(137,137,186);*/
		/* -webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px; */
		cursor: pointer;
		overflow: hidden;
		padding: 5px;
		margin: 5px;
		position: relative;
	}
	.announcement_block:last-child
	{
		border-bottom: 0px;
	}
	.announcement_text, .announcement_tags
	{
		float: left;
		overflow: hidden;
	}
	.announcement_text, .announcement_tags
	{
		color: #50550F;
		vertical-align: top;
	}
	.announcement_text
	{
		text-align: left;
		margin-left: 10px;
	}
</style>
<span class="page_title" style="margin-left: auto; margin-right: auto;">Announcements</span>
<br />
<div id="announcements_content">
</div>