<?php 
date_default_timezone_set('America/New_York');
session_start();

$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION["end_time"];

$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);

$differenceinseconds=$timesecond-$timefirst;
echo gmdate("H:i:s", $differenceinseconds);

/*if ($differenceinseconds=='00') {
	
}*/
?>