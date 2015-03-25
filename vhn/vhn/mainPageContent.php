<script type="text/javascript">

$(window).load(function() {
	//alert("Iam here");
	var viewport = {
		width  : $(window).width(),
		height : $(window).height()
	};
	if(viewport.width == 768)
	{
		$('#mainPageContent').hide();
		$('#mainPageContentMobile').show();
		//clearInterval(desktopSliderTimer);
		var mobileSliderTimer = setInterval(function() {
			$('#mainPageContentMobile #slider').animate({ opacity: 0 }, 'slow');
				if($("#mainPageContentMobile #slider #slide_numb").val() == '3') $("#mainPageContentMobile #slider #slide_numb").val(0);
				$("#mainPageContentMobile #slider #slide_numb").val(1+parseInt($("#mainPageContentMobile #slider #slide_numb").val()));
				$("#mainPageContentMobile #slider #slider_img").attr('src',"images/cg"+$("#mainPageContentMobile #slider #slide_numb").val()+".jpg");
				
			$('#mainPageContentMobile #slider').animate({ opacity: 1}, 'slow');
		}, 20000);
	}
	else
	{
		$('#mainPageContentMobile').hide();
		$('#mainPageContent').show();
		var desktopSliderTimer = setInterval(function() {
			$('#slider').animate({ opacity: 0 }, 'slow');
				if($("#slide_numb").val() == '3') $("#slide_numb").val(0);
				$("#slide_numb").val(1+parseInt($("#slide_numb").val()));
				$("#slider_img").attr('src',"images/cg"+$("#slide_numb").val()+".jpg");
				
			$('#slider').animate({ opacity: 1}, 'slow');
		}, 20000);
		//clearInterval(mobileSliderTimer);
	}
});
</script>
<div id="main_wrapper">
	<div id="mainPageContent">
		<!--Left Hand-->
		<div id="left_hand_img" class="hand_div">
			<img class="hand" src="images/hand-left.png" alt="" />
		</div>
		
		<div id="content">
			<div id="welcometext">
				This is a private neighborhood for caregivers of older adults with Alzheimer's or a related disease who are being cared for in the home. </p>
			</div>
			<div id="slider" >
				<input id="slide_numb" type="hidden" value="1"/>
				<img id="slider_img" src="images/cg1.jpg" />
				<span style="position: absolute; bottom:0; left:0; right:0; font-style: italic; color: rgb(137,137,186);"> Photography by - D. Michael Geller </span>
			</div>
		</div>
		
		<!--Right Hand-->
		<div id="right_hand_img" class="hand_div">
			<img class="hand" src="images/hand-right.png" alt="" />
		</div>
	</div>
	<!-- For Mobile -->
	<div id="mainPageContentMobile" style="display: none">
		<div id="content">
			<!--Left Hand-->
			<div id="left_hand_img" class="hand_div">
				<img class="hand" src="images/hand-left.png" alt="" />
			</div>
			<div id="welcometext">
				This is a private neighborhood for caregivers of older adults with Alzheimer's or a related disease who are being cared for in the home. </p>
			</div>
			<!--Right Hand-->
		<div id="right_hand_img" class="hand_div">
			<img class="hand" src="images/hand-right.png" alt="" />
		</div>
		</div>
		<div id="slider" >
			<input id="slide_numb" type="hidden" value="1"/>
			<img id="slider_img" src="images/cg1.jpg" />
			<span style="position: absolute; bottom:0; left:0; right:0; font-style: italic; color: rgb(137,137,186);"> Photography by - D. Michael Geller </span>
		</div>
	</div>
</div>