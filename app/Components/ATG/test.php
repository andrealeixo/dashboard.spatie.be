<?php
date_default_timezone_set("Australia/Brisbane");

$datetime1 = time();
$datetime2 = strtotime("2016-08-27");

$datediff = $datetime2 - $datetime1;
echo floor($datediff/(60*60*24));
?>
