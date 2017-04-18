<?php
	include("config.php");
	session_start();
?>
<html>
	<head>
		<title>会员登录 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main-cleaned.css" />
	</head>
	<body>

		<!-- Header -->
		<?php $title="会员登录";include("header.php") ?>

		<!-- Main -->
			<div class="checkout-page">
				<section id="main" class="wrapper">
					<div class="container">

						<header class="major special">
							<h2>会员登录</h2>
						</header>

						<!-- Change -->
						<form action = "login-form.php" method = "post">
							<div class="row uniform row-nopadding row-vertpadding">

								<div class="usr-text col-xs-4 col-sm-2 col-md-1">用户名  :</div>
	              			    <div class="col-xs-8 col-sm-5 col-md-4">
	              			    	<input type = "text" name = "username" class = "box"/>
	              			    </div>

              			    	<div class="pw-text col-xs-4 col-sm-2 col-md-1 clear-both"><p>密码  :</div>
                  				<div class="col-xs-8 col-sm-5 col-md-4">
                  					<input type = "password" name = "password" class = "box" />
                  				</div>
               		   		
               		   			<div class="col-xs-12 clear-both">
									<input class="button special wide-always" type = "submit" value = " 登录 "/>
								</div>
								<button type="button" class="wide-always" onclick="window.location='usr-regis.php'">新用户注册</button>


               		   		</div>
               			</form>
               			
					<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					</div>
				</section>
			</div>
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