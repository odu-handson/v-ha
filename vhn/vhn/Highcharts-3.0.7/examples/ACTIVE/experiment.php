<?php
$str = 'one|two|three|four';

// positive limit
$res = explode('|', $str);
echo var_dump($res);
$final = '';
$i = 0;
while($i<count($res))
{
	$temp = $res[$i]."\t"."1"."\n";
	$final = $final.$temp;
	$i = $i + 1;
}

echo $final;
?>