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

	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>
<body class="landing">

	<!-- Header -->
	<?php $navAlt=true;$title="首页"; include("nav.php"); ?>

	<!-- Banner -->
		<section id="banner">
			<p>输入您想要带物回国到哪</p>
			<form method="get" action="pages/search.php?page=1">
				<div class="index-search">
					<div class="col-xs-12 col-sm-7 col-md-3">
						<?php include("locSpinnerCA.xml"); ?>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-3">
						<?php include("locSpinnerCH.xml"); ?>
					</div>
				</div>
				<br>
				<input type="submit" class="button special small wide" style="width:initial" value="搜索">
			</form>
		</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="container">
					<div class="row">
						<div class="col-xs-9">
							<header class="major">
								<h2>最新航班：</h2>
							</header>
						</div>

						<div class="col-xs-3">
							<a class="badge" href="search.php?filter=publishdate"><button>More</button></a>
						</div>

						<div class="list-group-display-content col-xs-12">
							<?php 

							$sql = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis ORDER BY traveldate LIMIT 5;";
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
