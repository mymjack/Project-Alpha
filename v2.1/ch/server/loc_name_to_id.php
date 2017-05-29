<?php

	require ("../utils.php");
	configSession();

$sql = "BEGIN;
		DROP TABLE IF EXISTS flights_regis;
		CREATE TABLE `usr_regis_utf8` (
		  `id` int(11) NOT NULL,
		  `username` varchar(200) DEFAULT NULL,
		  `name` varchar(200) NOT NULL,
		  `departures` varchar(200) NOT NULL,
		  `arrivals` varchar(200) NOT NULL,
		  `traveldate` date NOT NULL,
		  `cell` int(50) NOT NULL,
		  `publishdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `description` text NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
		CREATE TABLE `flights_regis` (
		  `id` int(11) NOT NULL,
		  `username` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
		  `name` varchar(200) NOT NULL,
		  `departures` int(11) DEFAULT NULL,
		  `arrivals` int(11) DEFAULT NULL,
		  `traveldate` date NOT NULL,
		  `cell` int(50) NOT NULL,
		  `email` varchar(300) NOT NULL,
		  `publishdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `description` text NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
		ALTER TABLE `flights_regis`
		  ADD PRIMARY KEY (`id`),
		  ADD KEY `FK_Flights_Username` (`username`),
		  ADD KEY `FK_Flights_Dep` (`departures`),
		  ADD KEY `FK_Flights_Arri` (`arrivals`);
		ALTER TABLE `flights_regis`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
		ALTER TABLE `flights_regis`
		  ADD CONSTRAINT `FK_Flights_Arri` FOREIGN KEY (`arrivals`) REFERENCES `loc_regis` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
		  ADD CONSTRAINT `FK_Flights_Dep` FOREIGN KEY (`departures`) REFERENCES `loc_regis` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
		  ADD CONSTRAINT `FK_Flights_Username` FOREIGN KEY (`username`) REFERENCES `admin` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;

		SET names utf8;
		INSERT INTO usr_regis_utf8 (id,username,name,departures,arrivals,traveldate,cell,publishdate,description) VALUES ";

	$data = mysqli_query($db, "SELECT * FROM usr_regis");
	if($data) {
		while ($row = mysqli_fetch_array($data)) {
				$sql .= "('".$row['id']."','".$row['username']."','".$row['name']."','".$row['departures']."','".$row['arrivals']."','".$row['traveldate']."','".$row['cell']."','".$row['publishdate']."','".$row['description']."'),";
		}
	} 
	$sql = substr($sql, 0, strlen($sql)-1);
	$sql.=";COMMIT;";
	echo $sql;

	if (mysqli_multi_query($db, $sql) ){
		echo "<br>Converting data to utf8";
		ob_flush(); flush();
	    while ($db->more_results() && $db->next_result()){
	        if ($result = $db->store_result()) {
	            $result->free();
	            echo ".";ob_flush(); flush();
	        }
	    } 
		echo "<br>Done converting data to utf8, merging with location id data";
	} else {
		echo "<br>Error converting data.";
		exit;
	}
	ob_flush(); flush();

$sql2 = "SELECT usr_regis_utf8.id, username, name, traveldate, cell, publishdate, description, a.id AS departures, b.id AS arrivals 
	FROM usr_regis_utf8, loc_regis AS a, loc_regis AS b 
	WHERE usr_regis_utf8.arrivals = b.chnName AND LOWER(usr_regis_utf8.departures) = LOWER(a.engName);";

if ($result = mysqli_query($db, $sql2)) {
	$sql3= "INSERT INTO flights_regis (id,username,name,departures,arrivals,traveldate,cell,publishdate,description) VALUES";
	while ($row = mysqli_fetch_array($result)) {
			$sql3 .= "('".$row['id']."','".$row['username']."','".$row['name']."','".$row['departures']."','".$row['arrivals']."','".$row['traveldate']."','".$row['cell']."','".$row['publishdate']."','".$row['description']."'),";
	}

	$sql3 = substr($sql3, 0, strlen($sql3)-1);
	$sql3.=";";
	echo "<br>".$sql3;

	if (mysqli_query($db, $sql3)) {
		echo "<br>Cleaning up";
		if (mysqli_query($db, "DROP TABLE usr_regis_utf8;")) {
			echo "<br>All done";
			exit;
		}
	}
	echo mysqli_error($db);
} else {
	echo "<br>Error obtaining data";
}

?>