<?php
	require ("utils.php");
	configSession();
	loginRequired("请先登录再访问用户中心","member.php");

	// User information
	$sql = "SELECT name, cell, email, avatar FROM usr_info WHERE username='".$_SESSION['login_user']."';";
	$row = mysqli_fetch_array(mysqli_query($db, $sql));
	$name = $row['name'] ?: $_SESSION['login_user'];

	// Registered flights
	$sqlf = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis WHERE username='".$_SESSION['login_user']."' ORDER BY traveldate;";
	$resultf = mysqli_query($db, $sqlf);

	// Registered orders
	$sqlo = "SELECT orderID, sellerName, buyerName, buyerAddress FROM order_regis WHERE username='".$_SESSION['login_user']."' ORDER BY publishdate;";
	$resulto = mysqli_query($db, $sqlo);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>用户中心 - Otto带物</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="../assets/css/styles.css" />

	<!-- Select2 datalist files -->
	<!-- <link href="../assets/select2/css/select2.css" rel="stylesheet" /> -->
</head>
<body>

	<!-- Navigation -->
	<?php $title="用户中心";$active="用户"; include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2><?php echo $_SESSION['login_user']; ?></h2>
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-yellow"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-5 col-md-4 vert-divider-right">
				<header class="minor">
					<h3>基本信息</h3>
					<div id="user-info-btn" class="badge">
						<button id="save-info" class="small hidden special">保存</button>
						<!-- <button id="cancel-edit" class="small">取消</button> -->
						<button id="edit-info" class="small">编辑</button>
					</div>
				</header>

				<form id="user-info" class="display">
					<!-- <div id='large-avatar' style='background-image:url("../img/avatars/<?php //echo $row['avatar'];  ?>")'> -->
					<div id='large-avatar' style='background-image:url("../img/avatars/default.png")'>
						<div class="drop-zone" >Feature coming soon</div>
						<input type="file" name="upl" />
					</div>
					<div class="input-with-label">
						<span>姓名/昵称</span>
						<input type="text" name="name" id="name" required class="required" maxlength="80" value="<?php echo $row['name']; ?>" />
					</div>
					<div class="input-with-label">
						<span>电话</span>
						<input type="tel" name="cell" id="cell" required class="required" maxlength="25" value="<?php echo $row['cell']; ?>"/>
					</div>
					<div class="input-with-label">
						<span>电子邮箱</span>
						<input type="email" name="email" id="email" maxlength="100" value="<?php echo $row['email']; ?>"/>  
					</div>
				</form>
				<a href="server/logout.php" class="button alt fit">注销</a>
			</div>

			<div class="col-xs-12 col-sm-7 col-md-8">
				<header id="flight-info" class="minor">
					<h3>登记的航班</h3>
					<a href="register_flight.php" class="button small badge special">新建</a>
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
							echo "<a href='flight.php?id=$id' class='display-content'>
								<div class='name-date'>
									<div class='col-xs-12 col-sm-7'>
										<strong>$name</strong> - $date
									</div>
									<div class='col-xs-12 col-sm-5 align-right'>
										<strong>$dep -> $arri</strong>
									</div>
								</div>
								<div class='oneline-desc'>$des</div></a>";
							}
						} ?>
				</div>

				<div class="divider"></div>

				<header id="flight-info" class="minor">
					<h3>登记的订单</h3>
					<a href="register_order.php" class="button small badge special">新建</a>
				</header>
				<div class="list-group-display-content col-xs-12">
					<?php if($resulto && mysqli_num_rows($resulto) > 0) {
						while($row = mysqli_fetch_array($resulto)) {
							$id = $row['orderID'];
							$bName = $row['buyerName'];
							$sName = $row['sellerName'];
							$addr = $row['buyerAddress'];
							echo "<a href='order.php?id=$id' class='display-content'>
								<div class='name-date'>
									<div class='col-xs-12 col-sm-7'>
										<strong>$sName -> $bName</strong>
									</div>
									<div class='col-xs-12 col-sm-5 align-right'>
										<strong>#$id</strong>
									</div>
								</div>
								<div class='oneline-desc'>$addr</div></a>";
							}
						} ?>
				</div>
			</div>
		</div>
			
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
	<script src="../assets/js/scripts.js"></script>

	<!-- jQuery File Upload Dependencies -->
	<script src="../assets/fileUploader/js/jquery.ui.widget.js"></script>
	<script src="../assets/fileUploader/js/jquery.iframe-transport.js"></script>
	<script src="../assets/fileUploader/js/jquery.fileupload.js"></script>

	<script type="text/javascript">
		$('#edit-info').click(function(){toggleInfo()});
		$('#save-info').click(function(){saveInfo()});
		$('form').each(function(){formDisplayAdjust($(this))});
	</script>

</body>
</html>
