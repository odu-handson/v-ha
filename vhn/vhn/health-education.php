<?php
	header('X-Frame-Options: GOFORIT'); 
	include "appHead.php";
	include "expire.php";
	include "loginStatus.php";
?>
	<link rel="stylesheet" media="screen" type="text/css" href="css/healthEdu.css" />
	<script type="text/javascript">
		$(function() {
			$("#blogPosts").load("contenthealthBlogPosts.php");
			
			/*
			$(".categories_li").click(function() {
				alert($(this).attr("id"));
			});
			
			$(".proffesionals_li").click(function() {
				alert($(this).attr("id"));
			});
			*/
		});
		
	</script>
	<span class="page_title"> Health Education </h1>
	<div id="main_wrapper">
		<div id="main_content">
			THIS PART OF THE SITE IS UNDER DEVELOPMENT ....!
			<div id="blogActions">
				<h2>Topics</h2>
				<ul id="categories" name="categories">
					<?php
						$sql = "select c.id, count(c.id) count, c.category from question_category c, health_edu_blog h where h.q_cat_id = c.id group by c.id, category order by c.category asc";
						$results = mysql_query($sql) or die(mysql_error());
						while($row = mysql_fetch_row($results))
						{
							echo '<li class="categories_li" id="'.$row[0].'"> <input name="categories[]" type="checkbox" value="'.$row[0].'" >'.ucwords($row[2]).'('.$row[1].') </input> </li>';
						}
					?>
				</ul>
				
				<h2>Proffesionals</h2>
				<ul id="proffesionals" name="proffesionals">
					<?php
						$sql = "select c.id, count(c.id) count, concat(c.fname,' ', c.lname) name from users c, askprofessional h where h.prof_id = c.id group by c.id, c.fname,c.lname order by c.fname asc";
						$results = mysql_query($sql) or die(mysql_error());
						while($row = mysql_fetch_row($results))
						{
							echo '<li class="proffesionals_li" id="'.$row[0].'"><input name="proffessionals[]" type="checkbox" value="'.$row[0].'" >'.ucwords($row[2]).'('.$row[1].') </input> </li>';
						}
					?>
				</ul>
			</div>
			<div id="blogPosts">
				
			</div>
		</div>
	</div>
<?php
	include "appTail.php";
?>