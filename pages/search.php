<?php
	mysql_connect('127.0.0.1', 'root', 'Shgl123.') or die("cannot connect"); 
	mysql_select_db('otto_db1') or die("cannot select DB");

	session_start();
  	// let id = previous entered
	$sql = "SELECT id, name, departures, arrivals, description FROM usr_regis ORDER BY publishdate DESC LIMIT 5";

	if(!isset($_GET['filter']) && isset($_GET['arri'])){
  		$arri = $_GET['arri']; //obtain key from search/market.php
  		$sql = "SELECT id, name, departures, arrivals, description FROM usr_regis WHERE arrivals='$arri' ORDER BY publishdate DESC LIMIT 5";

	} else if (isset($_GET['arri'], $_GET['filter'])) {
		$arri = $_GET['arri'];
		$filter = $_GET['filter'];
		if ($arri!="") {
			$sql = "SELECT id, name, departures, arrivals, description FROM usr_regis WHERE arrivals='$arri' ORDER BY $filter DESC LIMIT 5";
		} else {
			$sql = "SELECT id, name, departures, arrivals, description FROM usr_regis ORDER BY $filter DESC LIMIT 5";
		}

	} else if(isset($_GET['filter']) && !isset($_GET['arri'])){
		$arri = $_GET['arri'];


  		$filter = $_GET['filter']; //obtain key from search/market.php
  		$sql = "SELECT id, name, departures, arrivals, description FROM usr_regis ORDER BY $filter DESC LIMIT 5";
	}

	$result = mysql_query($sql);
	$id = array();
	if (false === $result) {
	    echo mysql_error();
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Search Result - George</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>
		<!-- Header -->
		<header id="header">
			<h1><strong><a href="../index.html">Search</a></strong> Displays Search Results</h1>
			<nav id="nav">
				<ul>
					<li><a href="../index.html">Home</a></li>
					<li><a href="market.html">Market</a></li>
					<li><a href="faq.html">FAQ</a></li>
					<li><a href="member.html">MEMBER</a></li>
				</ul>
			</nav>
		</header>

		<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		<!-- Main -->
		<section id="main" class="wrapper">
			<div class="container">
				<header class="major special">
					<h2>Search Result</h2>
					<p>Returns Search Results</p>
				</header>
				<p></p>
				<div class="row 150%">
					<div class="6u 12u$(xsmall)">
						<form class="flight-filter" method="get" action="search.php"> <!-- Implement keep input after submit -->

							<div class="row uniform 50%">
								<div class="5u 12u$(xsmall)">
									<input type="text" name="dep" id="departure" placeholder="Departure" />
								</div>

								<div class="2u 12u$(xsmall">
									<p>to</p>
								</div>

								<div class="5u$ 12u$(xsmall)">
									<input type="text" name="arri" id="arrival" placeholder="Arrival" />
								</div>
										
								<div class="6u 12u$(xsmall)">
									<div class="select-wrapper">
										<select name="filter">
											<option disabled selected value>- Sort By -</option>
											<option value="traveldate">Travel date</option>
											<option value="publishdate">Publish date</option>
											<option value="distance">Distance</option>
										</select>
									</div>
								</div>

								<input type="submit" class="button special" value="submit">
										
								<div class="checkout-button" style="margin-top: 10px;">
									<div class="row uniform 50%">
										<div class="12u$">
											<ul class="actions">
												<li><input class="button special" value="Search" type="submit"></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</form>

						<div class="12u$ 12u$(medium)">
							<div class="main-group-display-content">
								<?php 
									if($result){
									while($row = mysql_fetch_array($result)) {
										$id = $row['id'];
										$name = $row['name'];
										$dep = $row['departures'];
										$arri = $row['arrivals'];
										$des = $row['description'];
										echo "<a href='single.php?id_key=$id' class='display-content' style='text-decoration:none;'><br>$name<br>$dep -> $arri<br>$des</a>";
										}
									}
								?>
							</div>
						</div>
					</div>

				<!-- Right Col -->	
				<div class="6u$ 12u$(xsmall)">
					<!-- Map -->
					<div id="map" style="width:100%;height:800px;"></div>
						<script>
							function myMap() {
							  var myCenter = new google.maps.LatLng(43.783727,-79.291974);
							  var mapCanvas = document.getElementById("map");
							  var mapOptions = {center: myCenter, zoom: 12};
							  var map = new google.maps.Map(mapCanvas, mapOptions);
							  var marker = new google.maps.Marker({position:myCenter});
							  marker.setMap(map);

							  // New marker
							  var newPoint = new google.maps.LatLng(43.75,-79.21);
							  var marker2 = new google.maps.Marker({position:newPoint})
							  marker2.setMap(map);
							}
						</script>

						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDWSdCxe0Mlwiw7cvZielK6kvlt_naC9E&callback=myMap"></script>
				</div>
			</section>

		<!-- Footer -->
		<footer id="footer">
			<div class="container">
				<ul class="icons">
					<li><a href="#" class="icon fa-facebook"></a></li>
					<li><a href="#" class="icon fa-twitter"></a></li>
					<li><a href="#" class="icon fa-instagram"></a></li>
					<li><a href="#" class="icon fa-github"></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; George</li>
				</ul>
			</div>
		</footer>

		<!-- Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	</body>
</html>