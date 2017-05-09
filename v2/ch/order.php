<?php
	require ("utils.php");
	configSession();
	loginRequired('请先登陆再访问订单信息', 'order_detail.php');

	if (isset($_GET['id'])) {
		$sql = "SELECT sellerName, sellerCell, sellerEmail, buyerName, buyerCell, buyerAddress, totalWeight, totalValue, ottoPickUp, publishdate, orderID FROM order_regis WHERE username='".$_SESSION['login_user']."' AND orderID='".$_GET['id']."';";
		$sql_items = "SELECT itemName, quantity, weight, price FROM item_regis WHERE username='".$_SESSION['login_user']."' AND orderID='".$_GET['id']."';";
		$result = mysqli_query($db, $sql);
		$result_items = mysqli_query($db, $sql_items);

		if ($result && $result_items) {
			$row = mysqli_fetch_array($result);
		}
	}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 查阅订单</title>
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
								<div>物品名称: ".$item['itemName']."</div>
								<div>数量: ".$item['quantity']."</div>
								<div>单个重量(kg): ".$item['weight']."</div>
								<div>单个价格(CAD): ".$item['price']."</div>
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
				<form id="shipment">
					<h3>运输</h3><div>
					<?php 
						echo (isset($row) && $row['ottoPickUp'] == '0')? "卖家交付货物给Ot-to" : "Ot-to上门取货";
					?></div>
					<div class="small">Ot-to 当前只在大多(GTA)地区取货</div>
					<div class="divider"></div>
					<h3>总结</h3>
					<p>估计总重量： <?php echo (isset($row)? $row['totalWeight'] : "") ?> kg</p>
					<p>估计总价格： <?php echo (isset($row)? $row['totalValue'] : "") ?> CAD</p>
					<p>订单号： <?php echo (isset($row)? $row['orderID'] : "") ?></p>
					<p class="hidden">运输号： <span id="trackingID"></span></p>
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
