<?php
	include "appHead.php";
?>
			<style type="text/css">
				input[type=text] {
					padding: 0.5em;
					border: 1px solid #ccc;
					border-radius: 5px;
					font-size: 1.2em;
					width: 400px;
				}
			</style>
			<div id="main_wrapper">
				<!--<div id="main_content">-->
					<h1>Member Information</h1>
					Here you can fill out what information you would like to share.<br /><br />
					<table>
						<tr>
							<td style="text-align: right;">Your Name:</td>
							<td><input type="text" style="margin-left: 1em;" value="Jane" /></td>
						</tr>
						<tr>
							<td style="text-align: right;">Your Child&apos;s Name:</td>
							<td><input type="text" style="margin-left: 1em;" value="Tyler" /></td>
						</tr>
						<tr>
							<td style="text-align: right;">Your Child&apos;s Age:</td>
							<td><input type="text" style="margin-left: 1em;" value="5" /></td>
						</tr>
						<tr>
							<td style="text-align: right;">Your Child&apos;s Diagnosis:</td>
							<td><input type="text" style="margin-left: 1em;" value="Cerebral Palsy" /></td>
						</tr>
						<tr>
							<td style="text-align: right;">Your City:</td>
							<td><input type="text" style="margin-left: 1em;" value="Austin, TX" /></td>
						</tr>
						<tr>
							<td style="text-align: right;">Picture:</td>
							<td><img src="images/fp3.jpg" style="margin-left: 1.2em;" /></td>
						</tr>
					</table>
					<input type="button" value="Update My Information" />
				<!--</div>-->
			</div>
<?php
	include "appTail.php";
?>