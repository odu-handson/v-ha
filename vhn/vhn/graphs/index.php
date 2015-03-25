<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<!--<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
		<script type="text/javascript">
			function visitorData (data) {
				data = $.parseJSON(data);
				console.log(data[0][0]);
				$('#container').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: 'Sleep Tracker'
					},
					xAxis: {
						type: 'datetime',
						dateTimeLabelFormats: { 
							second: '%H:%M:%S',
							minute: '%H:%M',
							hour: '%H:%M'
						}
						/* dateTimeLabelFormats: { // don't display the dummy year
							//second: '%H:%M:%S',
							//minute: '%H:%M',
							//hour: '%H'
							month: '%e. %b',
							year: '%b'
							}
						*/
					},
					yAxis: {
						title: {
							text: 'Disturbance',
						},
						min: 0
					},
					
					series: [{ name: 'example chart', data: data}],
					tooltip: {
						formatter: function() {
								return '<b>'+ this.series.name +'</b><br/>'+
								Highcharts.dateFormat('%A, %b %e, %H:%M', this.x) +': '+ this.y +' m';
						}
					},
				});
			}
			
			$(function () {
				var dataSeries = "";
				$.ajax({
					dataType: "text",
					url: 'dataJson.php',
					async: false,
					success: function (data) {
						visitorData(data);
					}
				});
				
	
		});
	</script>
	</head>
	<body>
<script src="highcharts.js"></script>
<script src="exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
