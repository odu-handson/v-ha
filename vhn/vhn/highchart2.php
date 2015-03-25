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
				
				[Date.UTC(2013, 11,27, 2,12,53), 1],
				[Date.UTC(2013, 11,27, 2,3,02), 1],
                [Date.UTC(2013, 11,27, 2,23,11), 1],
				[Date.UTC(2013, 11,27, 2,2,20), 1],
				[Date.UTC(2013, 11,27, 5,2,2), 1],
				[Date.UTC(2013, 11,27, 5,21,38), 1],
				[Date.UTC(2013, 11,27, 6,21,08), 1],
				[Date.UTC(2013, 11,27, 6,12,38), 1],
				[Date.UTC(2013, 11,27, 7,45,47), 1],
				[Date.UTC(2013, 11,27, 7,12,35), 1],
				[Date.UTC(2013, 11,27, 8,11,29), 1],
				[Date.UTC(2013, 11,27, 8,1,50), 1],
				[Date.UTC(2013, 11,27, 9,37,02), 1]
		
                    
                    
                ]
            },  ]
        });
    });
    
	
	

		</script>
	</head>


<?php echo '<div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div>'; ?>


