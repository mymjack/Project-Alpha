<?php
	require ("../utils.php");
	configSession();

	if (isset($_GET['trackingID']) && isset($_POST['location']) && !empty($_POST['location']) && $_SESSION['login_user'] == $adminName) {

		$tracknum = $_GET['trackingID'];
		$status = $_POST['status']?: '';
		$description = $_POST['description']?:'';
		$location = $_POST['location'];
		$time = $_POST['time'];

		if (empty($time)) {
			$sql = "INSERT INTO tracking_regis (trackingID, status, location, description, username) VALUES ('$tracknum', '$status', '$location', '$description', '".$_SESSION['login_user']."');";
		} else {
			$sql = "INSERT INTO tracking_regis (trackingID, publishdate, status, location, description, username) VALUES ('$tracknum', '$time', '$status', '$location', '$description', '".$_SESSION['login_user']."');";
		}

		if (mysqli_query($db, $sql)) {
			header('Location: ../tracking.php?id='.$tracknum);
		} else {
			echo "Error: cannot make update to database: ".mysqli_error($db);
		}
	} else {
		echo "Bad request: either traking id or location is empty, or user is not admin";
	}
?>