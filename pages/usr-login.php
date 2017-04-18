<?php
	include("config.php");
	session_start();
?>
<html>
	<head>
		<title>会员登录 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
		<?php include("header.php") ?>

		<!-- Main -->
			<div class="checkout-page">
				<section id="main" class="wrapper">
					<div class="container">

						<header class="major special">
							<h2>会员登录</h2>
						</header>

						<!-- Change -->
						<form action = "login-form.php" method = "post">
							<div class="row uniform 50%">
								<div class="3u 12$(xsmall)">
									<div class="usr-text">
              			   			<p>用户名  :</p>
              			   			</div>
              			    	</div>
              			    
	              			    <div class="8u$ 12$(xsmall)">
	              			    	<input type = "text" name = "username" class = "box"/>
	              			    </div>

              			    	<div class="3u 12$(xsmall)">
              			    		<div class="pw-text">
                  						<p>密码  :</p>
                  					</div>
                  				</div>

                  				<div class="8u$ 12$(xsmall)">
                  					<input type = "password" name = "password" class = "box" />
                  				</div>
               		   		
               		   			<div class="12u$">
									<ul class="actions">
										<li><input class="button special small" type = "submit" value = " 登录 "/><br/></li>
									</ul>
								</div>

               		   		</div>
               			</form>
               			<ul class="actions">
               				<li><a href="usr-regis.php">新用户注册</a></li>>
               			</ul>
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