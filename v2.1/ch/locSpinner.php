<?php
	mysqli_query($db, "SET names utf8;");
	$sql = "SELECT id, chnName, engName, lat, lng FROM loc_regis WHERE country=\"$country\";";
	$res = mysqli_query($db, $sql);
	if ($res) {
		while($row = mysqli_fetch_array($res)) {
			echo "<option value='".$row['id']."' lat='".$row['lat']."' lng='".$row['lng']."'>".$row['chnName']." ".$row['engName']."</option>";
		}
	} else {
		echo mysqli_error($db);
	}
?>