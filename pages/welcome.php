<?php 
	$title="用户中心";
	include('utils.php');
	configSession();
	loginRequired("请先登录再访问" . $title, "welcome.php");

	// General user info
	$sql = "SELECT name, cell, email FROM usr_info WHERE username='".$_SESSION['login_user']."';";
	$row = mysqli_fetch_array(mysqli_query($db, $sql));
	$name = $row['name'] ?: $_SESSION['login_user'];

	// Registered flights
	$sqlf = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis WHERE username='".$_SESSION['login_user']."' ORDER BY traveldate;";
	$resultf = mysqli_query($db, $sqlf);

	// Registered flights
	$sqli = "SELECT id, itemName, price, weight, description FROM item_regis WHERE username='".$_SESSION['login_user']."';";
	$resulti = mysqli_query($db, $sqli);
?>
<html>
	<head>
		<title>登录成功 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main-cleaned.css" />
	</head>
	<body>


		<!-- Header -->
		<?php include("header.php") ?>

		<!-- Main -->
		<section id="main" class="wrapper">
			<div class="container">
				<header class="major special">
					<h2>欢迎用户</h2>
					<p><?php echo $_SESSION['login_user']; ?></p>
				</header>
			</div>
		</section>

		<div class="divider"></div>

		<!-- General Info -->
		<section id="info">
			<div class="container">

				<div id="noti" class="notify-container">
					<div class="notify-red"></div>
				</div>

				<header class="minor">
					<h2>基本信息</h2>

					<span id="info-form-btn">
						<button class="small badge" id="edit-info">编辑</button>
						<button class="small badge special hidden" id="save-info">保存</button>
					</span>

				</header>
				<div id="info-form">
					<div class="row">
						<div class="col-xs-6 col-sm-3 col-md-2">
							<h4>姓名</h4>
							<p> <?php echo $name ?><p>
						</div>

						<div class="col-xs-6 col-sm-3 col-md-2">
							<h4>联系号码</h4><p> <?php echo $row['cell'] ?> </p>
						</div>

						<div class="col-xs-6 col-sm-3 col-md-2">
							<h4>联系邮箱</h4><p> <?php echo $row['email'] ?> </p>
						</div>
					</div>

					<div class="row hidden">
						<form id="info-form-form">
							<div class="col-xs-6 col-sm-3 col-md-2">
								<h4>姓名</h4>
								<input type="text" name="name" id="name" value="<?php echo $name ?>" />
							</div>

							<div class="col-xs-6 col-sm-3 col-md-2">
								<h4>联系号码</h4>
								<input type="text" name="cell" id="cell" value="<?php echo $row['cell'] ?>" />
							</div>

							<div class="col-xs-6 col-sm-3 col-md-2">
								<h4>联系邮箱</h4>
								<input type="text" name="email" id="email" value="<?php echo $row['email'] ?>" />
							</div>
						</form>
					</div>
				</div>

			</div>
		</section>

		<div class="divider"></div>

		<!-- Register Info -->
		<section id="flights">
			<div class="container">
				<header class="minor"> 
					<h2>登记的航班</h2> 
					<a href="register.php" class="button small badge special">新建</a>
				</header>

				<div class="list-group-display-content col-xs-12">
					<?php if($resultf && mysqli_num_rows($resultf) > 0) {
						while($row = mysqli_fetch_array($resultf)) {
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
							echo "暂时为空";
						} ?>
				</div>
			</div>
		</section>

		<div class="divider"></div>

		<!-- Items Info -->
		<section id="items">
			<div class="container">
				<header class="minor"> <h2>登记的代购物品</h2> </header>

				<div class="list-group-display-content col-xs-12">
					<?php if($resulti && mysqli_num_rows($resulti) > 0) {
						while($row = mysqli_fetch_array($resulti)) {
								// Place stub
							}
							echo "暂时为空";
						} else {
							echo "暂时为空";
						} ?>
				</div>
			</div>
		</section>

		<section id="anchors" class="wrapper">
			<div class="container">
				<a href="logout.php" class="button special small wide-always">注销</a>
				<a href="logout.php" class="button small wide-always">返回首页</a>
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
		<script type="text/javascript">
			$('#edit-info').click(function(){toggleInfo()});
			$('#save-info').click(function(){saveInfo()});
		</script>

	</body>
</html>