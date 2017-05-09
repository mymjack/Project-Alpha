<?php
	include("utils.php");
	configSession();
?>
<html>
	<head>
		<title>会员注册 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/styles.css" />
	</head>
	<body>

		<!-- Header -->
		<?php $title="会员注册";include("nav.php") ?>


		<!-- Main -->
		<div class="checkout-page">
			<section id="main" class="wrapper container">

					<header class="major special">
						<h2>会员注册</h2>
					</header>

					<div id="noti" class="notify-container">
					<div class="notify-red"></div>
					</div>

					<form action = "server/register_form.php" method = "post">
						<div class="row uniform row-nopadding">

							<div class="input-with-label col-xs-12 col-sm-8 col-md-5">
								<span>用户名</span>
              			    	<input type = "text" name = "username" id="un"/>
              			    </div>
              			    
							<div class="input-with-label col-xs-12 col-sm-8 col-md-5 clear-both">
								<span>密码</span>
              					<input type = "password" name = "password" id="pw" />
              				</div>
              			    
							<div class="input-with-label col-xs-12 col-sm-8 col-md-5 clear-both">
								<span>确认密码</span>
              					<input type = "password" name = "cpassword" id="cpw" />
              				</div>
               		   		
           		   			<div class="clear-both col-xs-12 col-sm-6 col-md-3">
								<button class="special fit" type = "button" id="register-btn">注册</button> 
								<a class="button fit" href="login.php">登陆已有账号</a>
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
		<script src="../assets/js/scripts.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#register-btn").click(function(){register();});
			});
		</script>
	</body>
</html>