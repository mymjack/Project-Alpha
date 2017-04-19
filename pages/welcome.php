<?php 
	$title="用户中心";
	include('session.php');
?>
<html>
	<head>
		<title>登录成功 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>


		<!-- Header -->
		<?php include("header.php") ?>

			<!-- Main -->
				<section id="main" class="wrapper">
					<div class="container">
						<header class="major special">
							<h2>欢迎用户</h2>
							<p><?php echo $login_session; ?></p>
						</header>

   	 			  		<form action="logout.php">
							<input class="button special small" type="submit" value="注销">
						</form>
   	 			  		<form action="../index.php">
							<input class="button special small" type="submit" value="返回首页">
						</form>

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

	</body>
</html>