<?php
	include("config.php");
	session_start();
	include 'regis-form.php';
?>
<html>
	<head>
		<title>会员注册 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
		<header id="header">
			<h1><strong><a href="../index.php">Otto首页</a></strong> 用户注册</h1>
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
			<div class="checkout-page">
				<section id="main" class="wrapper">
					<div class="container">

						<header class="major special">
							<h2>会员注册</h2>
						</header>


						<!-- Test Username pw -->
						<form action = "#" method = "post">
							<div class="row uniform 50%">
								<div class="3u 12$(xsmall)">
									<div class="usr-text">
              						    <p>用户名 :</p>
              					    </div>
              			   		</div>

	              				<div class="8u$ 12$(xsmall)">
    		          			    <input type = "text" name = "username" class = "box" pattern=".{3,}" required title="最低3字符" required/><br /><br />
            	      			</div>

                	  			<div class="3u 12$(xsmall)">
									<div class="pw-text">
                  						<p>密码 :</p>
                  					</div>
                  				</div>

                  				<div class="8u$ 12$(xsmall)">
                  					<input type = "password" name = "password" class = "box" pattern=".{3,}" required title="最低3字符" required/><br/><br />
               		   			</div>

								<div class="12u$">
									<ul class="actions">
										<li><input class="button special" type = "submit" value = " 注册 "/><br/></li>
									</ul>
								</div>
               		   		</div>
               			</form>
               			<ul class="actions">
               				<li><a href="../index.php">返回首页</a></li>>
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