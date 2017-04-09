<?php
	include("config.php");
	session_start();
	include 'regis-form.php';
?>
<html>
	<head>
		<title>User Register - George</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><strong><a href="../index.html">Register form</a></strong> Input</h1>
				<nav id="nav">
					<ul>
						<li><a href="../index.html">Home</a></li>
						<li><a href="market.html">Market</a></li>
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="usr-login.html">Sign in</a></li>
					</ul>
				</nav>
			</header>

			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<div class="checkout-page">
				<section id="main" class="wrapper">
					<div class="container">

						<header class="major special">
							<h2>Register Form</h2>
							<p>User Input</p>
						</header>


						<!-- Test Username pw -->
						<form action = "" method = "post">
              			    <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  			<label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
               		   		<input type = "submit" value = " Submit "/><br />
               			</form>






						<form method="post" action="#">
							<div class="row uniform 50%">

								<!-- Line 1 -->
								<div class="3u 12$(xsmall)">
									<div class="usr-text">
									<p>Username:</p>
									</div>
								</div>
								<div class="4u$ 12$(xsmall)">
									<input type="text" name="usr-name" id="usr-name" value="" placeholder="" />
								</div>


								<!-- Line 2 -->
								<div class="3u 12$(xsmall)">
									<div class="pw-text">
									<p>Password:</p>
									</div>
								</div>

								<div class="4u$ 12$(xsmall)">
									<input type="text" name="usr-pw" id="usr-pw" value="" placeholder="" />
								</div>



							</div>

								<div class="row uniform 50%">
									<div class="12u$">
										<ul class="actions">
											<li><input class="button special" value="Register" type="submit"></li>
										</ul>
									</div>
								</div>
				</form>
					<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					</div>
				</section>
			</div>
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