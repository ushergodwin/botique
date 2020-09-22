<?php
$con = mysqli_connect("localhost","root","gema","gemaholt_botique");
	if (mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_error();
		die();
		}
?>
    <?php
//delivery dates
	$date_format = 'l F jS Y';
	$early = strtotime('+1 day');
$tomorrow = strtotime('+1 day');
    $end = strtotime('+2 day');
$pick = date($date_format, $early);
	$start = date($date_format, $tomorrow);
    $till = date($date_format, $end);
?>