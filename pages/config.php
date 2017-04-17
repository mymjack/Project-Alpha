<?php
	if (!isset($db)) {
		define('DB_SERVER', '127.0.0.1');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', 'otto_db1');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("Cannot connect to database");
	}

	// Takes a list of variables. Return true iff any is not set/empty
	function hasEmpty($lst) {
		foreach ($lst as $elm) {
			if (!isset($elm) || empty($elm))
				return true;
		}
		return false;
	}
?>