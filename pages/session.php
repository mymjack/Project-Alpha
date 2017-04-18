<?php
	include("config.php");
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
   
	if(!isset($_SESSION['login_user'])){
		header("location:usr-login.php");
		return;
	} else if (!isset($login_session)) {
		$un = $_SESSION['login_user'];
		$ses_sql = mysqli_query($db,"select username from admin where username = '$un' ");
		$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

		$login_session = $row['username'];
	}
?>