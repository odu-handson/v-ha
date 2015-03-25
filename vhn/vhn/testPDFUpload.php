<html>
	<body>
		<form action="testSavePDF.php" method="POST" enctype="multipart/form-data" name="upload_form" id="upload_form">
			<label>File:</label>
				<input type="file" name="file">    
				<input name="action" type="hidden" id="action" value="add_document">
			<input name="upload" type="submit" id="upload" value=" Upload ">
		</form>
	</body>
</html>