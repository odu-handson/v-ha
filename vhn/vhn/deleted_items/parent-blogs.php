<?php
	include "main_page_header.php";
?>
			<style type="text/css">
				#body_wrapper h1 {
					margin-bottom: 0.5em;
				}
				.dateLine {
					font-size: 0.8em;
				}
				p {
					margin: 1.5em 0;
				}
				.blogPost {
					background: #fff;
					padding: 1em;
					border-radius: 5px;
					width: 700px;
					line-height: 1.5em;
					margin-bottom: 2em;
					box-shadow: 0px 0px 2px #444
				}
				#blogActions {
					float: right;
					width: 230px;
					line-height: 1.5em;
				}
			</style>
			<div id="body_wrapper">
				<div id="main_content">
					<div id="blogActions">
						<h1>My Actions</h1>
						New Blog Post<br />
						Edit Blog Post<br />
						Delete Blog Post<br />
					</div>
					<div class="blogPost">
						<h1>What a Crazy Day!</h1>
						<div class="dateLine">
							<img src="images/cal.png" alt="" style="vertical-align: middle" /> March 2, 2013  
							<img src="images/person.png" alt="" style="vertical-align: middle; margin-left: 2em;" /> Jane Doe 
							<img src="images/comment.png" alt="" style="vertical-align: middle; margin-left: 2em;" /> 6 comments
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Read more &raquo;</p>
					</div>
					<div class="blogPost">
						<h1>Hello World</h1>
						<div class="dateLine">
							<img src="images/cal.png" alt="" style="vertical-align: middle" /> March 2, 2013  
							<img src="images/person.png" alt="" style="vertical-align: middle; margin-left: 2em;" /> Emily Jones 
							<img src="images/comment.png" alt="" style="vertical-align: middle; margin-left: 2em;" /> 8 comments
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Read more &raquo;</p>
					</div>
					<div class="blogPost">
						<h1>What to do?</h1>
						<div class="dateLine">
							<img src="images/cal.png" alt="" style="vertical-align: middle" /> March 1, 2013  
							<img src="images/person.png" alt="" style="vertical-align: middle; margin-left: 2em;" /> Mary Smith 
							<img src="images/comment.png" alt="" style="vertical-align: middle; margin-left: 2em;" /> 11 comments
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Read more &raquo;</p>
					</div>
				</div>
			</div>
<?php
	include "main_page_footer.php";
?>