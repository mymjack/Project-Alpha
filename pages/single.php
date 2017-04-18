<?php
	$title="带物信息";
	include('session.php');
  	// if key is set then retrieve that key's info
  	if(isset($_GET['id_key'])){
  		$page_id = $_GET['id_key']; //obtain key from search/market.php
	}
	$sql = "SELECT * FROM usr_regis WHERE id='$page_id'";
	$result = mysqli_query($db, $sql);

	if (false === $result) {
	    echo mysqli_error();
	}
	while($row = mysqli_fetch_array($result)) {
		$name = $row['name'];
		$dep = $row['departures'];
		$ari = $row['arrivals'];
		$traveldate = $row['traveldate'];
		$cell = $row['cell'];
		$des = $row['description'];
		// repeat for all rows
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>带物信息 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main-cleaned.css" />
	</head>
	<body>

		
		<!-- Header -->
		<?php include("header.php") ?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<div class="row">
						<div class="col-xs-6 col-sm-3 col-md-2">
							<h4>联系人</h4><?php echo "<p>$name</p>" ?>
						</div>

						<div class="col-xs-6 col-sm-3 col-md-2">
							<h4>日期</h4><p><?php echo "$traveldate"?> </p>
						</div>

						<div class="col-xs-6 col-sm-3 col-md-2">
							<h4>出发/目的地</h4><p><?php echo "$dep -> $ari"?></p>
						</div>

						<div class="col-xs-6 col-sm-3 col-md-2">
							<h4>联系方式</h4><p><?php echo "$cell"?></p>
						</div>

						<div class="col-xs-12">
							<h4>详细介绍</h4>
							<p><?php echo "$des"?></p>
						</div>

					</div>



					<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="copyright">
						<li>&copy; Otto Group</li>
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