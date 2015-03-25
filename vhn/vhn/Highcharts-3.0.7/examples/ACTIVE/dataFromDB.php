<?php
include 'connectDB.php';

$sth = mysql_query("SELECT data FROM sleepdata where id=4 ORDER BY data");
$rows = array();
$rows1 = array();
$i = 0;
$final = '';
	while($r = mysql_fetch_array($sth)) 
	{
		$res = explode(',', $r['data']);
		while($i<count($res))
		{
			$temp = $res[$i]."\t"."1"."\n";
			$final = $final.$temp;
			$i = $i + 1;
		}
		//		echo $r['data']."\t"."1"."\n";
		echo $final;
	}



/* array_push($result,$rows);
array_push($result,$rows1); */




?>
