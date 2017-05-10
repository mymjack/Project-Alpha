<?php
	require ("../utils.php");
	configSession();
	if (isset($_GET['orderID'] ) && isset($_POST['trackingID']) && $_SESSION['login_user'] == $adminName) {
		if (mysqli_query($db, "UPDATE order_regis SET trackingID='".$_POST['trackingID']."' WHERE orderID='".$_GET['orderID']."';")) {
			header('Location: ../order.php?id='.$_GET['orderID']);
		} else {
			echo "Error: cannot make update to database";
		}
	} else {
		echo "Bad request: either orderID or trackingID is not set, or user is not admin";
	}
?>