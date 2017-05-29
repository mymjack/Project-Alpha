<?php
	$title="会员登录";
	include("utils.php");
	configSession();
?>
<html>
	<head>
		<title>会员登录 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/styles.css" />
		<link rel="icon" type="image/x-icon" href="../../images/favicon-32x32.png" />
	</head>
	<body>

		<!-- Header -->
		<?php $title="会员登录";$active="用户"; include("nav.php") ?>

		<!-- Main -->
		<div class="checkout-page">
			<section id="main" class="wrapper container">

					<header class="major special">
						<h2>会员登录</h2>
					</header>

					<div id="noti" class="notify-container">
					<div class="notify-red">请先登陆再访问</div>
					</div>

					<!-- Change -->
					<form action = "server/login_form.php" method = "post">
						<div class="row uniform row-nopadding">

							<div class="input-with-label col-xs-12 col-sm-8 col-md-5">
								<span>用户名</span>
              			    	<input type = "text" name = "username" id="un"/>
              			    </div>
              			    
							<div class="input-with-label col-xs-12 col-sm-8 col-md-5 clear-both">
								<span>密码</span>
              					<input type = "password" name = "password" id="pw" />
              				</div>
               		   		
           		   			<div class="clear-both col-xs-12 col-sm-6 col-md-3">
								<button class="special fit" type = "button" id="login-btn">登录</button> 
								<a class="button fit" href="register.php" > 新用户注册 </a>
							</div>
           		   		</div>
           			</form>
           			
				<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
			</section>
		</div>

		<!-- Footer -->
		<?php include("footer.php"); ?>

		<!-- Scripts -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/scripts.js"></script>
		<?php 
			if (isset($_SESSION['redirectError']) && !empty($_SESSION['redirectError'])){
				echo "<script type='text/javascript'>notifying = setTimeout(function(){notify('".$_SESSION['redirectError']."', 'notify-red');}, 300);</script>";
				session_unset($_SESSION['redirectError']);
			} 
		?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#login-btn").click(function(){login();});
			});
		</script>
	</body>
</html>