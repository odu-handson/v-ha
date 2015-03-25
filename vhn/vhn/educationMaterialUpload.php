<!DOCTYPE html>
<HTML>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<BODY>
<form id="attachment_form" enctype="multipart/form-data" action="educationMaterialUploader.php" method="POST" 
style="display:inline-block;text-align:center;width:auto;">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<input type="hidden" name="type" value="x" />
<input type="hidden" name="month" value="x" />
<input type="hidden" name="week" value="x" />
<div style="display:inline-block;">
Choose a file to upload: <input name="uploaded" type="file" /><br />
</div>
<input type="submit" class="button" id="upload_file" value="Submit">
</form>
</BODY>
</HTML>