<style>

	.Note, .errorNote
	{
		font-style: italic;
	}
	.errorNote
	{
		color: red;
	}

</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

$(function(){

		$("#reset_password").click( function() {
			
			var error = 1;
			var errorFields = "";
			
			if($.trim($("#email").val()) == "")
			{
				error = 0;
				errorFields = errorFields+"Email Address  ";
				$("#email").addClass("error");
			}
			if(error == 0)
			{
				$(".errorNote").html(errorFields.substring(0,errorFields.length - 2)+" are mandatory!");
				$(".errorNote").show();
			}
			
			else
			{
			
				$.ajax({
					  type: "POST",
					  url: "resetById.php",
					  data: {
						'email': $("#email").val(),
						},
					
							success: function (data) {
									if(data == 1)
									{
										$(".errorNote").html("<h4 style=\"color: green;\"> An email has been sent to you which has instructions about how to reset the password. </h4>");
										$(".errorNote").show();
									

									}
									else 
									{
										$(".alertMessage").html("<h4 style=\"color: red;\"> Registration Failed! Please try again later or contact technical support if the problem continues. </h4>");
										$(".AlertBox").show();
										
									}
					
							},
							dataType : "text"
		
					});
			}
});
});
</script>

Please enter your email id to reset your password <br/>
<input type="text" id="email" name="email"><br/>
<h4 class="errorNote" hidden>  </h4>
<input type="button" class="button" id="reset_password" value="reset">