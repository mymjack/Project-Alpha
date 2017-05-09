<?php
	require ("utils.php");
	configSession();
	loginRequired('请先登陆再访问航班信息', 'flight_detail.php');


	if (isset($_GET['id'])) {
		$sql = "SELECT name,arrivals,publishdate,traveldate,departures,cell,description FROM usr_regis WHERE username='".$_SESSION['login_user']."' AND id='".$_GET['id']."';";
		$result = mysqli_query($db, $sql);
		if ($result) {
			$row = mysqli_fetch_array($result);
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 查阅航班</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../assets/css/styles.css" />
</head>
<body>

	<!-- Navigation -->
	<?php include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2>查阅航班</h2>
			<!-- <button class="wide badge hidden" id="edit">修改</button> -->
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-red"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-5 vert-divider-right">
				<form id="flyer-info">
					<h3>联系方式</h3>
					<div>姓名/昵称: <?php echo (isset($row)? $row['name'] : "") ?></div>
					<div>电话: <?php echo (isset($row)? $row['cell'] : "") ?></div>
					<div>电子邮箱: <?php //echo (isset($row)? $row['email'] : "") ?></div>
				</form>
			</div>

			<div class="col-xs-12 col-md-7">
				<form id="flight-info">
					<h3>航班信息</h3>
					<div>出发地: <?php echo (isset($row)? $row['departures'] : "") ?></div>
					<div>目的地: <?php echo (isset($row)? $row['arrivals'] : "") ?></div>
					<div>日期: <?php echo (isset($row)? $row['traveldate'] : "") ?></div>
					<div>备注: <?php echo (isset($row)? $row['description'] : "") ?></div>
				</form>
			</div>
		</div>
			
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="../assets/js/scripts.js"></script>
	<script type="text/javascript">
		<?php 
			if (!isset($row)) {
				echo 'notify("您所寻找的航班不存在", "notify-red");';
			}
		 ?>
	</script>


</body>
</html>
