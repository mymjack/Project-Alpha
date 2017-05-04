<?php
	include("utils.php");
	configSession();
?>
<html>
	<head>
		<title>会员注册 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main-cleaned.css" />
	</head>
	<body>

		<!-- Header -->
		<?php $title="会员注册";include("header.php") ?>


		<!-- Main -->
			<div class="checkout-page">
				<section id="main" class="wrapper">
					<div class="container">

						<header class="major special">
							<h2>会员注册</h2>
						</header>

						<div id="noti" class="notify-container">
						<div class="notify-red"></div>
						</div>


						<form action = "regis-form.php" method = "post">
							<div class="row uniform row-nopadding row-vertpadding">

								<div class="usr-text col-xs-4 col-sm-2 col-md-1">用户名  :</div>
	              			    <div class="col-xs-8 col-sm-5 col-md-4">
	              			    	<input type = "text" name = "username" id="un" class = "box" required pattern=".{3,}"/>
	              			    </div>

              			    	<div class="pw-text col-xs-4 col-sm-2 col-md-1 clear-both">密码  :</div>
                  				<div class="col-xs-8 col-sm-5 col-md-4">
                  					<input type = "password" name = "password" id="pw" class = "box" required pattern=".{3,}" />
                  				</div>

              			    	<div class="pw-text col-xs-4 col-sm-2 col-md-1 clear-both">确认密码  :</div>
                  				<div class="col-xs-8 col-sm-5 col-md-4">
                  					<input type = "password" name = "cpassword" id="cpw" class = "box" required pattern=".{3,}" />
                  				</div>
               		   		
               		   			<div class="col-xs-12 clear-both">
									<input type = "button" class="special wide-always" onclick="register()" value = " 注册 "/>
								</div>
								<button type="button" class="wide-always" onclick="window.location='usr-login.php'">登陆已有账号</button>


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