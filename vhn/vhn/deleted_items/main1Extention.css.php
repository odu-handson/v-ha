<?php
	session_start();
	$i = "a";
	if(isset($_SESSION["login_status"])) 
		$i=1; 
	else 
		$i=0; 
?>

<script type="text/javascript">
	/* $(function () {
		var data = "<?php echo $i; ?>";
		if(data == 1)
		{
			var main_width = $(window).width();
			if(main_width < 768)
			{
				$("#main").css("width","100%");
			}
			else if(main_width >= 768 && main_width <=1024)
			{
				$("#navbarVertical").css("width","20%");
				$("#navbarVertical").css("max-width","200px");
				$("#navbarVertical").css("float","left");
				$("#main").css("width", main_width - 250);
			}
			else
			{
				$("#navbarVertical").css("width","20%");
				$("#navbarVertical").css("max-width","200px");
				$("#navbarVertical").css("float","left");
				$("#main").css("width", "80%");	
			}
		}
		else
		{
			$("#main").css("width","100%");
		} */
		
		/* var position = $("#main").position();
		
		console.log(position);
		console.log($("#main").height());
		var mainRects = document.getElementById("main").getBoundingClientRect();
		var footerRects = document.getElementById("footer").getBoundingClientRect();
		console.log("Document height is :" +$(document).height());
		console.log("Window height is :" +$(window).height());
		console.log("Main bottom is :" +mainRects.bottom);
		console.log("Footer Top is :" +footerRects.top);
		console.log("Footer Bottom is :" +footerRects.bottom); */
		
		
		
	//});
	
	/* $(window).load(function() 
	{
		var footerRects = document.getElementById("footer").getBoundingClientRect();
		var mainRects = document.getElementById("main").getBoundingClientRect();
		var MainBottom = 
		//var diff = $(document).outerHeight(true) - footerRects.bottom;
		if(main.bottom == footerRects.top && ($(document).height() - footerRects.bottom) > 5)
		{
			$("#footer").addClass("adjust_footer");
		}
		else
		{
			$("#footer").removeClass("adjust_footer");
		}
		console.log((main.bottom-footerRects.top));
		console.log($(document).height());
		
		console.log("Footer Bottom is :" +footerRects.bottom);
		console.log("Footer Bottom is :" +footerRects.top);
		console.log("Main Bottom is :" +mainRects.bottom);
	}); */
</script>