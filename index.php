<?php
	include ("pages/utils.php");
	configSession();

	$sql = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis ORDER BY traveldate LIMIT 5";
	$result = mysqli_query($db, $sql);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 首页</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main-cleaned.css" />

	<!-- Select2 datalist files -->
	<link href="select2/css/select2.css" rel="stylesheet" />
</head>
<body class="landing">

	<!-- Header -->
		<header id="header" class="alt">
			<h1><strong><a href="index.html">Otto</a></strong> 带物</h1>
			<nav id="nav">
				<ul>
					<li><a href="pages/register.php">登记航班</a></li>
					<li><a href="pages/search.php?filter=publishdate">航班表</a></li>
					<li><a href="pages/faq.php">FAQ</a></li>
					<li>
					<?php 
					if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user']))
						echo "<a href=\"pages/welcome.php\">".$_SESSION['login_user'];
					else
						echo "<a href=\"pages/usr-login.php\">"."会员登录";
					?></a></li>
				</ul>
			</nav>
		</header>

		<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>

	<!-- Banner -->
		<section id="banner">
			<p>输入您想要带物回国到哪</p>
			<form method="get" action="pages/search.php?page=1">
				<div class="index-search">
					<div class="col-xs-12 col-sm-7 col-md-3">
						<?php include("pages/locSpinnerCA.xml"); ?>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-3">
						<?php include("pages/locSpinnerCH.xml"); ?>
					</div>
				</div>
				<br>
				<input type="submit" class="button special small wide" value="搜索">
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
							<a class="badge" href="pages/search.php?filter=publishdate"><button>More</button></a>
						</div>

							<div class="list-group-display-content col-xs-12">
								<?php 
								if($result){
									while($row = mysqli_fetch_array($result)) {
										$id = $row['id'];
										$name = $row['name'];
										$dep = $row['departures'];
										$date = $row['traveldate'];
										$arri = $row['arrivals'];
										$des = $row['description'];
										echo "<a href='pages/single.php?id_key=$id' class='display-content' style='text-decoration:none;'>
											<div class='name-date'>
												<div class='col-xs-12 col-sm-7'>
													<strong>$name</strong> - $date
												</div>
												<h4 class='col-xs-12 col-sm-5'>$dep -> $arri</h4>
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
					<button id="back-to-top" class="button special big" >返回顶部</button>
				</div>
			</section>

	<!-- Footer -->
		<footer id="footer">
			<div class="container">
				<ul class="copyright">
					<li>&copy; Otto Group</li>
				</ul>
			</div>
		</footer>

	<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-97380931-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<script src="select2/js/select2.js"></script>
		<script type="text/javascript">
			$('#dep').select2({
				placeholder: "- 出发地 -",
			  	allowClear: true
			});
			$('#arri').select2({
				placeholder: "- 目的地 -",
			  allowClear: true
			});

			$('#back-to-top').click(function(){backToTop()});
		</script>


</body>
</html>
