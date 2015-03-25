<?php
	include "main_page_header.php";
?>
			<link rel="stylesheet" type="text/css" href="css/vhn-jui-theme/jquery-ui-1.10.1.custom.min.css" />
			<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
			<script type="text/javascript" src="js/jquery-ui-1.10.1.custom.min.js"></script>
			<script>
				$(function() {
					$( "#tabs" ).tabs({});
				});
			</script>
			<div id="body_wrapper">
				<div id="main_content">
					<h1>Family Photo Album</h1>
					This is a place for you to share photos of your kids and families.  We would love to see your children.<br /><br />
					
					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">My Photos</a></li>
							<li><a href="#tabs-2">Photos of Other Families</a></li>
							<li><a href="#tabs-3">Upload Photos</a></li>
						</ul>
						<div id="tabs-1">
							<div style="text-align: center;">
								<img src="images/fp1.jpg" alt="" />
								<img src="images/fp2.jpg" alt="" />
								<img src="images/fp3.jpg" alt="" />
								<img src="images/fp4.jpg" alt="" />
							</div>
						</div>
						<div id="tabs-2">
							<div style="text-align: center;">
								<img src="images/fp5.jpg" alt="" />
								<img src="images/fp6.jpg" alt="" />
								<img src="images/fp7.jpg" alt="" />
								<img src="images/fp8.jpg" alt="" />
								
								<img src="images/fp1.jpg" alt="" />
								<img src="images/fp2.jpg" alt="" />
								<img src="images/fp3.jpg" alt="" />
								<img src="images/fp4.jpg" alt="" />
								
								<img src="images/fp5.jpg" alt="" />
								<img src="images/fp6.jpg" alt="" />
								<img src="images/fp7.jpg" alt="" />
								<img src="images/fp8.jpg" alt="" />
							</div>
						</div>
						<div id="tabs-3">
							<strong>Choose up to five (5) photos below.  Then click "Upload Photos".</strong><br /><br />
							<input type="file" /><br /><br />
							<input type="file" /><br /><br />
							<input type="file" /><br /><br />
							<input type="file" /><br /><br />
							<input type="file" /><br /><br />
							<input type="button" value="Upload Photos" />
						</div>
					</div>

				</div>
			</div>
<?php
	include "main_page_footer.php";
?>