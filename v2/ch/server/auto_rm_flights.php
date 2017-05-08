<?php
	// This php program removes flight registers that are out of date.i.e. having a flight time ealier than today.
// $h = (int)date("H", time());
// $m = (int)date("i", time());
// if ($h >23 && $m > 55) {
	// include('config.php');
	$sql = "DELETE FROM usr_regis WHERE traveldate < '". date('Y-m-d', time()) ."';";
	mysqli_query($db, $sql);
// }
?>