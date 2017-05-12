<?php
	require ("utils.php");
	configSession();
	loginRequired('请先登陆再访问订单信息', 'order_detail.php');

	if (isset($_GET['id'])) {
		$sql = "SELECT username, sellerName, sellerCell, sellerEmail, buyerName, buyerCell, buyerAddress, totalWeight, totalValue, ottoPickUp, publishdate, orderID, trackingID FROM order_regis WHERE orderID='".$_GET['id']."';";
		$sql_items = "SELECT itemName, quantity, weight, price FROM item_regis WHERE orderID='".$_GET['id']."';";
		$result = mysqli_query($db, $sql);
		$result_items = mysqli_query($db, $sql_items);

		if ($result && $result_items) {
			$row = mysqli_fetch_array($result);

			if ($_SESSION['login_user'] != $adminName && $_SESSION['login_user'] != $row['username']) {
				$noPermission = true;
				unset($row);
			} else {
				$sql_tracking = "SELECT trackingID, location, status FROM tracking_regis WHERE trackingID='".$row['trackingID']."' ORDER BY publishdate DESC LIMIT 1;";
				$result_tracking = mysqli_query($db, $sql_tracking);

				if ($result_tracking) {
					$rowt = mysqli_fetch_array($result_tracking);
				}
			}
		}
	}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>查阅订单 - Otto带物</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="../assets/css/styles.css" />

</head>
<body>

	<!-- Navigation -->
	<?php $title="查阅订单"; $active="运单追踪"; include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2>查阅订单</h2>
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-red"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-3 vert-divider-right">
				<form id="contact-info">
					<h3>卖家联系方式</h3>
					<div>姓名/昵称: <?php echo (isset($row)? $row['sellerName'] : "") ?></div>
					<div>电话: <?php echo (isset($row)? $row['sellerCell'] : "") ?></div>
					<div>电子邮箱: <?php echo (isset($row)? $row['sellerEmail'] : "") ?></div>
					<!-- 
					<div class="input-with-label">
						<span>地址</span>
						<input type="address" name="daddress" id="daddress"required class="required" maxlength="400"/>
						</div>   -->

					<div class="divider"></div>

					<h3>买家联系方式</h3>
					<div>姓名/昵称: <?php echo (isset($row)? $row['buyerName'] : "") ?></div>
					<div>电话: <?php echo (isset($row)? $row['buyerCell'] : "") ?></div>
					<div>寄送地址: <?php echo (isset($row)? $row['buyerAddress'] : "") ?></div>
				</form>
			</div>

			<div class="col-xs-12 col-md-6 vert-divider-right">
				<header class="minor">
						<h3>订单详情</h3>
				</header>
				<ul id="items">
					<?php 
					if (isset($row)) {
						while($item = mysqli_fetch_array($result_items)) {
							echo "<li>
								<div class='col-xs-6'>物品名称: ".$item['itemName']."</div>
								<div class='col-xs-6'>数量: ".$item['quantity']."</div>
								<div class='col-xs-6'>单个重量(kg): ".$item['weight']."</div>
								<div class='col-xs-6'>单个价格(CAD): ".$item['price']."</div>
								<!--<span>物品图片</span> -->
								<ul> 
									<!-- Files are shown here --> 
								</ul>
								<div class=\"clear-both divider\"></div>
							</li>";
						}
					}
					?>
				</ul>
			</div>

			<div class="col-xs-12 col-md-3">
				<!-- <form id="shipment"> -->
					<h3>运输</h3><div>
					<?php 
						echo (isset($row) && $row['ottoPickUp'] == '0')? "卖家交付货物给Ot-to" : "Ot-to上门取货";
					?></div>
					<!-- <div class="small">Ot-to 当前只在大多(GTA)地区取货</div> -->
					<?php 
					if (isset($row) && !empty($row['trackingID'])) {
						echo "<p>运单号： ".$row['trackingID']."
								<a href=\"tracking.php?id=".$row['trackingID']."\">详细</a></p>";

						if (isset($rowt)) {
							echo "<p>当前位置： ".$rowt['location']."</p>";
						} else {
							echo "<p>暂无运单追踪信息</p>";
						}
					}else {
						echo "<p>暂未匹配运单号码</p>";
					}

					if($_SESSION['login_user'] == $adminName && isset($row))
						echo "<form method=\"POST\" action=\"server/assign_tracking.php?orderID=".$row['orderID']."\">
							<input name='trackingID' placeholder='添加/修改运单号(管理员权限）' type='text'/>
							<button class='small'>确认提交</button>
						</form>";
					?>

					<div class="divider"></div>

					<h3>总结</h3>
					<p>估计总重量： <?php echo (isset($row)? $row['totalWeight'] : "") ?> kg</p>
					<p>估计总价格： <?php echo (isset($row)? $row['totalValue'] : "") ?> CAD</p>
					<p>订单号： <?php echo (isset($row)? $row['orderID'] : "") ?></p>
				<!-- </form> -->
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
	<script type="text/javascript">
		<?php 
			if (!isset($row)) {
				echo 'notify("您所寻找的订单不存在", "notify-red");';
			}

			if (isset($noPermission)) {
				echo 'notify("您所使用的账户无法查看此订单", "notify-red");';
			}
		 ?>
	</script>


</body>
</html>
