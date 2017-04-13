<?php
	mysql_connect('127.0.0.1', 'root', 'Shgl123.') or die("cannot connect"); 
	mysql_select_db('otto_db1') or die("cannot select DB");

	session_start();
	if(!isset($_SESSION['login_user'])){
		header("Location:usr-login.php");
  	}
  	// if key is set then retrieve that key's info
  	if(isset($_GET['id_key'])){
  		$page_id = $_GET['id_key']; //obtain key from search/market.php
	}
	$sql = "SELECT * FROM usr_regis WHERE id='$page_id'";
	$result = mysql_query($sql);

	if (false === $result) {
	    echo mysql_error();
	}
	while($row = mysql_fetch_array($result)) {
		$name = $row['name'];
		$traveldate = $row['traveldate'];
		// repeat for all rows
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Single - George</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><strong><a href="../index.html">Single</a></strong> Single Info Page</h1>
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

					<div class="single-header">
					<header class="major special">
						<h2>Page</h2>
						<p>O</p>
					</header>
					</div>


					<div class="row">
						<div class="single-left-col">
						<div class="3u 12u$(medium)">
							<h4>Name</h4><?php echo "<p>$name</p>" ?>
						</div>
						</div>

						<div class="single-right-col">
						<div class="3u 12u$(medium)">
								<h4>Date</h4><p><?php echo "$traveldate"?> </p>
						</div>
						</div>

						<div class="single-left-col">
						<div class="3u$ 12u$(medium)">
							<h4>Destination</h4><p>3</p>
						</div>
						</div>

						<div class="single-right-col">
						<div class="5u 12u$(medium)">
							<h4>Contact</h4><p>4</p>
						</div>
						</div>
						<div class="4u$ 12u$(medium)">
							<h4>Price</h4><p>5</p>
						</div>

						<p></p>

						<div class="12u$ 12u$(medium)">
							<h4>Description</h4>
							<p>Name, Contact, Weight, Price, Date, Dep->Ari + Stops (if any), Preferred place to Meet (also used to set markers on google map), Descriptions</p>
						</div>

					</div>



					<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
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
			<script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.js"></script>

	</body>
</html>