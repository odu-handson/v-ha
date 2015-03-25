<?php
	include "expire.php";
?>
<div class="blogPost">
	<form action="enterHealth.php" method="POST">
	Title : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="textbox" id="title" name="title" style="width : 420px; border-radius : 5px; height : 30px;"><br/><br/>
	Content : &nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="14" cols="50" name = "content" id="content" style="border-radius : 5px; vertical-align: middle;"></textarea>&nbsp; <br><br/>
	Video link : <input type="textbox" id="video_link" name="video_link" style="width : 420px; border-radius : 5px; height : 30px;">
	<input type="submit" value="submit">
	</form>
</div>