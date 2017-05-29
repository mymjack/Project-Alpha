<?php
	require ("utils.php");
	configSession();
	// loginCheck();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 首页</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../assets/css/styles.css" />
	<link rel="icon" type="image/x-icon" href="../../images/favicon-32x32.png" />

	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>
<body class="landing">

	<!-- Header -->
	<?php $navAlt=true;$title="首页"; include("nav.php"); ?>

	<!-- Banner -->
	<section id="banner">
		<section id="banner1"> 
			<a href="register_flight.php" class="button special alt">航班登记</a>
		</section>
		<h2>
			Two Worlds<div class="br"></div>One Together
		</h2>
		
		<section id="banner2">
			<a href="register_order.php" class="button special alt">货品登记</a>
		</section>
	</section>

	<!-- Search -->
	<section id="banner-search">
		<p>输入您想要带物回国到哪</p>
		<form method="get" action="search.php?page=1">
			<div class="index-search">
				<div class="col-xs-12 col-sm-7 col-md-3">
					<select name="dep" id="dep" class="dep">
						<option disabled selected value>出发地</option>
						<?php $country="Canada";include("locSpinner.php"); ?>
					</select>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-3">
					<select name="arri" id="arri" class="arri">
						<option disabled selected value>目的地</option>
						<?php $country="China";include("locSpinner.php"); ?>
					</select>
				</div>
			</div>
			<input type="submit" class="button special" value="搜索">
		</form>
	</section>

	<!-- One -->
	<section id="one" class="wrapper style1">
		<div class="container">
			<div class="row">
					<header class="major col-xs-12">
						<h2>最新航班：</h2>
						<a class="badge button" href="search.php">More</a>
					</header>

				<div class="list-group-display-content col-xs-12">
					<?php 

					$sql = "SELECT flights_regis.id, name, description, traveldate, a.chnName AS departures, b.chnName AS arrivals 
						FROM flights_regis, loc_regis AS a, loc_regis AS b 
						WHERE flights_regis.departures=a.id 
							AND flights_regis.arrivals=b.id 
							AND traveldate >= '". date('Y-m-d', time()) ."' 
							ORDER BY publishdate LIMIT 10";
					$result = mysqli_query($db, $sql);
					if($result){
						while($row = mysqli_fetch_array($result)) {
							$id = $row['id'];
							$name = $row['name'];
							$dep = $row['departures'];
							$date = $row['traveldate'];
							$arri = $row['arrivals'];
							$des = $row['description'];
							echo "<a href='flight.php?id=$id' class='display-content'>
								<div class='name-date'>
									<div class='col-xs-12 col-sm-7'>
										<strong>$name</strong> - $date
									</div>
									<div class='col-xs-12 col-sm-5 align-right'>
										<strong>$dep -> $arri</strong>
									</div>
								</div>
								<div class='oneline-desc'>$des</div></a>";
							}
						} else {
							echo "Oops, no data right now. Please come back later.";
						}
					?>
					
				</div>

			</div>
		</div>
	</section>

	<!-- Two -->
	<section id="two" class="wrapper style2 special">
		<div class="container">
			<header class="major">
				<h2>Otto提醒</h2>
				<p></p>
			</header>

			<p>留心每一笔交易</p>
	</section>

	<!-- Three -->
	<section id="four" class="wrapper style3 special">
		<div class="container">
			<header class="major">
				<h2>敬请关注!</h2>
				<!-- <p>Feugiat sed lorem ipsum magna</p> -->
			</header>
			<button id="back-to-top" class="button special " >返回顶部</button>
		</div>
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/select2/js/select2.js"></script>
		<script src="../assets/js/scripts.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-97380931-1', 'auto');
		  ga('send', 'pageview');

		</script>


</body>
</html>
