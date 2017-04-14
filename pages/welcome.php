<?php
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
			<header id="header">
				<h1><strong><a href="../index.php">Otto首页</a></strong> 登录成功</h1>
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