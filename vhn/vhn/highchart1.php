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
				
		
				[Date.UTC(2014, 0,5, 1,11,53), 1],
				[Date.UTC(2014, 0,5, 1,21,02), 1],
                [Date.UTC(2014, 0,5, 1,33,11), 1],
				[Date.UTC(2014, 0,5, 1,41,20), 1],
				[Date.UTC(2014, 0,5, 1,51,29), 1],
				[Date.UTC(2014, 0,5, 2,23,38), 1],
				[Date.UTC(2014, 0,5, 2,27,08), 1],
				[Date.UTC(2014, 0,5, 3,31,38), 1],
				[Date.UTC(2014, 0,5, 3,53,47), 1],
				[Date.UTC(2014, 0,5, 4,1,35), 1],
				[Date.UTC(2014, 0,5, 5,12,29), 1],
				[Date.UTC(2014, 0,5, 8,19,50), 1],
				[Date.UTC(2014, 0,5, 9,40,02), 1]
                    
                    
                ]
            },  ]
        });
    });
    
	
	

		</script>
	</head>


<?php echo '<div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div>'; ?>


