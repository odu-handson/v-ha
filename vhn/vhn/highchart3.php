<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: { // don't display the dummy year
					second: '%H:%M:%S',
					minute: '%H:%M',
					hour: '%H:%M'
                }
            },
            yAxis: {
                title: {
                    text: 'Disturbance',
					
                },
				
			
			
                min: 0,
				max: 1
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%A, %b %e, %H:%M', this.x) +': '+ this.y +' m';
                }
            },
            
            series: [{
                name: 'SLEEP TRACKER',
                // Define the data points. All series have a dummy year
                // of 1970/71 in order to be compared on the same x axis. Note
                // that in JavaScript, months start at 0 for January, 1 for February etc.
                data: [
				
				
				[Date.UTC(2013, 9,25, 03,36,53), 1],
				[Date.UTC(2013, 9,25, 03,45,02), 1],
                [Date.UTC(2013, 9,25, 03,53,11), 1],
				[Date.UTC(2013, 9,25, 04,01,20), 1],
				[Date.UTC(2013, 9,25, 04,09,29), 1],
				[Date.UTC(2013, 9,25, 04,17,38), 1],
				[Date.UTC(2013, 9,25, 04,29,08), 1],
				[Date.UTC(2013, 9,25, 04,37,38), 1],
				[Date.UTC(2013, 9,25, 04,45,47), 1],
				[Date.UTC(2013, 9,25, 06,17,35), 1],
				[Date.UTC(2013, 9,25, 06,28,29), 1],
				[Date.UTC(2013, 9,25, 07,02,50), 1],
				[Date.UTC(2013, 9,25, 07,37,02), 1]
		
		
                    
                    
                ]
            },  ]
        });
    });
    
	
	

		</script>
	</head>


<?php echo '<div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div>'; ?>


