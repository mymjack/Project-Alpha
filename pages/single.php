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
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
		<header id="header">
			<h1><strong><a href="../index.php">Otto首页</a></strong> 航班表</h1>
			<nav id="nav">
				<ul>
					<li><a href="../index.php">首页</a></li>
					<li><a href="register.php">登记航班</a></li>
					<li><a href="search.php?filter=publishdate">航班表</a></li>
					<li><a href="faq.html">FAQ</a></li>
					<li><a href="welcome.php">会员登录</a></li>
				</ul>
			</nav>
		</header>

			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<div class="row">
						<div class="single-left-col">
						<div class="4u$ 12u$(medium)">
							<h4>联系人</h4><?php echo "<p>$name</p>" ?>
						</div>
						</div>

						<div class="single-right-col">
						<div class="3u 12u$(medium)">
							<h4>日期</h4><p><?php echo "$traveldate"?> </p>
						</div>
						</div>

						<div class="single-left-col">
						<div class="3u$ 12u$(medium)">
							<h4>目的地</h4><p><?php echo "$dep -> $ari"?></p>
						</div>
						</div>

						<div class="single-right-col">
						<div class="5u 12u$(medium)">
							<h4>联系方式</h4><p><?php echo "$cell"?></p>
						</div>
						</div>

						<p></p>

						<div class="12u$ 12u$(medium)">
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
			<script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
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