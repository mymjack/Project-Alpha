<!DOCTYPE HTML>

<!--

	Spatial by TEMPLATED

	templated.co @templatedco

	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)

-->

<html>

<?php

	$con = mysqli_connect("localhost","root","root","test");
	$query = "";

	$sortfilter = htmlspecialchars_decode($_POST['sortcategory']);
	$pricefilter = htmlspecialchars_decode($_POST['pricecategory']);
	$datefilter = htmlspecialchars_decode($_POST['datecategory']);

	$query = "SELECT `$sortfilter` FROM `test`.`requests` LIMIT 10";				
		echo $query;
		
		mysqli_query($con, $query);
		mysqli_commit($con);				
				
	mysqli_close($con);

?>

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



			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>



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


								<form class="flight-filter" method="post" action="#">

									<div class="row uniform 50%">

										<div class="5u 12u$(xsmall)">

											<input type="text" name="departure" id="departure" value="" placeholder="Departure" />

										</div>

										<div class="2u 12u$(xsmall">

											<p>to</p>

										</div>

										<div class="5u$ 12u$(xsmall)">

											<input type="text" name="arrival" id="arrival" value="" placeholder="Arrival" />

										</div>



										<div class="6u 12u$(xsmall)">

											<div class="select-wrapper">

												<select name="sortcategory" id="category">

													<option value="">- Sort By -</option>

													<option value="date">Date</option>

													<option value="price">Price</option>

													<option value="relevance">Relevance</option>

													<option value="other">Cat #4</option>

												</select>

											</div>

										</div>



										<div class="3u 12u$(xsmall)">

											<div class="select-wrapper">

												<select name="pricecategory" id="category">

													<option value="">- Price Range -</option>

													<option value="1">Opt #1</option>

													<option value="2">Opt #2</option>

													<option value="3">Opt #3</option>

													<option value="4">Opt #4</option>
												</select>

											</div>

										</div>



										<div class="3u$ 12u$(xsmall)">

											<div class="select-wrapper">

												<select name="datecategory" id="category">

													<option value="">- Date -</option>

													<option value="1">Opt #1</option>

													<option value="2">Opt #2</option>

													<option value="3">Opt #3</option>

													<option value="4">Opt #4</option>

												</select>

											</div>

										</div>

										<!--

										<div class="4u 12u$(xsmall)">

											<input type="radio" id="priority-low" name="priority" checked>

											<label for="priority-low">Button A</label>

										</div>

										<div class="4u 12u$(xsmall)">

											<input type="radio" id="priority-normal" name="priority">

											<label for="priority-normal">Button B</label>

										</div>

										<div class="4u$ 12u$(xsmall)">

											<input type="radio" id="priority-high" name="priority">

											<label for="priority-high">Button C</label>

										</div> -->
										
							<div class="checkout-button">
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

										<a href="single.html" class="display-content">Date<br>Limited Description<br>Name,Publish Date

											<h4>Toronto -> Beijing </h4>

										</a>



										<a href="#" class="display-content"><img src="../images/pic10.png">

											<h4>Vancouver -> Shanghai </h4>

										</a>



										<!--<a href="#" class="display-content">

											<div class="display-image">

												<img src="images/pic10.png">

											</div>

											<h4>Vancouver -> Shanghai</h4>

									

										</a>-->

									</div>

									

								</div>



							</div>

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

							</div>

						</div>

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

						<!-- <li>Design: <a href="http://templated.co">TEMPLATED</a></li>

						<li>Images: <a href="http://unsplash.com">Unsplash</a></li> -->

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
