<?php
$dbhost = 'localhost';
$dbuser = 'vhnUser';
$dbpass = 'vhnuser';
$dbname = 'vhn';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_select_db($dbname);

if (!mysql_set_charset('utf8', $conn)) {
    echo "Error: Unable to set the character set.\n";
    exit;
}

function nvl($val, $replace)
{
	if(is_null($val) || $val == '')
		return $replace;
    else
		return $val;
}

function escapeStr($str)
{
	return mysql_real_escape_string(nvl($str, null));
}
?>
