<?php
	require ("utils.php");
	configSession();
	loginRequired('请先登陆再添加运单追踪信息', 'register_tracking.php');

	// if (isset($_GET['id'])) {
	// 	$sql = "SELECT sellerName, sellerCell, sellerEmail, buyerName, buyerCell, buyerAddress, totalWeight, totalValue, ottoPickUp, publishdate, orderID FROM order_regis WHERE (username='".$_SESSION['login_user']."' OR username='OTADMINTO') AND orderID='".$_GET['id']."';";
	// 	$sql_items = "SELECT itemName, quantity, weight, price FROM item_regis WHERE orderID='".$_GET['id']."';";
	// 	$result = mysqli_query($db, $sql);
	// 	$result_items = mysqli_query($db, $sql_items);

	// 	if ($result && $result_items) {
	// 		$row = mysqli_fetch_array($result);

	// } else if (isset($_GET['orderID'])) {

	// }

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 登记追踪信息</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="../assets/css/styles.css" />

</head>
<body>

	<!-- Navigation -->
	<?php include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2>登记追踪信息</h2>
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-red"></div>
		</div>

		<p>追踪号： </p>

		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3 vert-divider-right">
				<form id="contact-info">
					<div class="input-with-label">
						<span>位置</span>
						<input type="text" name="location" id="location" required class="required" maxlength="80"/>
					</div>
					<div class="input-with-label">
						<span>状态</span>
						<input type="text" name="status" id="status" required class="required" maxlength="80"/>
					</div>
					<div class="input-with-label">
						<span>备注</span>
						<textarea type="text" name="description" id="description" required class="required" maxlength="400"/>
					</div>
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
				echo 'notify("您所寻找的订单不存在", "notify-red");';
			}
		 ?>
	</script>


</body>
</html>
