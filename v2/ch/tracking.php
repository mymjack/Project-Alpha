<?php
	// Due to time constraint, sqls in this page are not prepared beforehand. Please fix. Jack
	require ("utils.php");
	configSession();
	loginRequired("请先登录再查询运单追踪信息", "tracking.php");
	
		$company_code = "OT";
		$product_id = 1;
		$province = 3;
		$city = 2;
		$flyer_id = 1001;
	
	function generate_trackid()
	{
		/* Algorithm test */
		$track_id = "";
	
		for ($i = 0;$i < 6;$i++)
		{
			if (rand() % 2 == 0)
			{			
				$charset = "QAZWSXEDCRFVTGBYHNUJMIKOLP";
				$track_id .= $charset[rand() % 26];
			}
			else 
				$track_id .= rand() % 9;
		}
		
		return $track_id;
	/*========= END =============*/
		
	}
	
	/*
		Format string:
		    OT nn  n n nnnn xxxxxx
	*/
	printf("%s%02d%d%d%04d%s",
		$company_code,
		$product_id,
		$province,
		$city,
		$flyer_id,
		generate_trackid()
	);	
	
	// if (isset($_POST['track_id']) && !empty($_POST['track_id']))
	if (isset($_GET['id']) && !empty($_GET['id']))
	{
		$tracknum = mysqli_real_escape_string($db, htmlspecialchars($_GET['id']));
	
		$sql = "SELECT * FROM tracking_regis WHERE trackingID=\"$tracknum\" ORDER BY publishdate";
		$result = mysqli_query($db, $sql);
		
		// if($result){
		// 	$track_data = mysqli_fetch_assoc($result);
			
		// 	/* Inline CSS */
		// 	if (empty($track_data))
				// echo "<div style=\"
				// 	position:scroll;
				// 	z-index:0;
				// 	width:100%;
				// 	top:0px;
				// 	left:0px;
				// 	text-align:center;
				// 	background-color:#f44006;
				// 	color:white;
				// 	font-weight:bold;
				// 	font-size:large;
				// 	box-shadow:0 0 5px gray;
				// 	opacity:0.75;
				// 	\">
				// 	No results found. Please enter another tracking #.</div>";
		// 	else 
		// 	{
		// 			echo "<div style=\"
		// 			position:scroll;
		// 			width:100%;
		// 			z-index:0;
		// 			top:0px;
		// 			left:0px;
		// 			text-align:center;
		// 			background-color:green;
		// 			color:white;
		// 			font-weight:bold;
		// 			font-size:large;
		// 			box-shadow:0 0 5px gray;
		// 			opacity:0.75;
		// 			\">
		// 			Found x matches...</div>";
			
		// 	}
		// }
		
			
	}
	
?>
<html>
	<head>
		<title>运单追踪 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/styles.css" />
	</head>
	<body>

		<!-- Header -->
		<?php $title="运单追踪";include("header.php") ?>

		<!-- Main -->
			<div class="checkout-page">
				<section id="main" class="wrapper">
					<div class="container">

					
						<header class="major special">
							<h2>运单追踪</h2>
						</header>

						<form action = "tracking.php" method = "get">
							<div class="row-vertpadding">
								<div class="col-xs-12">请输入运单号。 运单号可在您的收据上找到，或通过扫描QR码获取。 </div>
	              			    <div class="col-xs-12 col-sm-6 col-md-4">
	              			    	<input type = "text" maxlength="16" min="16" name = "id" class = "box" required pattern=".{3,}" value="TO" />
	              			    </div>

               		   			<div class="col-xs-12 col-sm-4 col-md-2">
									<input class="button special " type="submit" value = "搜索运单"/>
								</div>


               		   		</div>
               			</form>
					
					
						<?php
						/* If not logged in, show basic information */
						if (isset($result) && $result)
						{
							echo "<header class=\"minor clear-both\">
									<h2>运单&nbsp;$tracknum</h2>
								</header>
						<div class=\"list-group-display-content col-xs-12\">";

							echo "<div class='display-content'><strong>
									<div class='col-xs-6 col-sm-4 col-md-2'>时间</div>
									<div class='col-xs-6 col-sm-4 col-md-3'>位置</div>
									<div class='col-xs-12 col-sm-4 col-md-3'>状态</div>
									<div class='col-xs-12 col-md-4'>备注</div></strong>
									<div class='clear-both'></div>
								</div>";
							while($row = mysqli_fetch_array($result)) {
								echo "<div class='display-content'>
										<div class='col-xs-6 col-sm-4 col-md-2'>".date('h:00, d-m-Y',strtotime($row['publishdate']))."</div>
										<div class='col-xs-6 col-sm-4 col-md-3'>".$row['location']."</div>
										<div class='col-xs-12 col-sm-4 col-md-3'>".$row['status']."</div>
										<div class='col-xs-12 col-md-4'>".$row['description']."</div>
									<div class='clear-both'></div>
									</div>";
							}
							if ($_SESSION['login_user'] == $adminName) {
								echo "<div class='display-content'>
										<form action='server/register_tracking_form.php?trackingID=$tracknum' method='post'>
											<div class='col-xs-6 col-sm-4 col-md-2'><input name='time' type='text' placeholder='时间（若留空系统将填写当前时间）'></div>
											<div class='col-xs-6 col-sm-4 col-md-3'><input name='location' type='text' placeholder='位置'></div>
											<div class='col-xs-12 col-sm-4 col-md-3'><input name='status' type='text' placeholder='状态'></div>
											<div class='col-xs-12 col-md-4'><input name='description' type='text' placeholder='备注'></div>
											<div class='col-xs-12 col-sm-6 col-md-3'><button>确认添加（管理员权限）</button></div>
											<div class='clear-both'></div>
										</form>
									</div>";
							}
						?>
						</div>
						<?php

							// $sql_order = $db->prepare("SELECT orderID, sellerName, buyerName, buyerAddress FROM order_regis 
							// 	WHERE ".($_SESSION['login_user'] == $adminName? "":"username='".$_SESSION['login_user']."' AND")." trackingID=? ORDER BY username, publishdate;");
							// $sql_order->bind_param('s', $tracknum);
							// $res = $sql_order->execute();
							$sql_order = "SELECT orderID, sellerName, buyerName, buyerAddress FROM order_regis 
								WHERE ".($_SESSION['login_user'] == $adminName? "":"username='".$_SESSION['login_user']."' AND")." trackingID='$tracknum' ORDER BY username, publishdate;";
							$res = mysqli_query($db, $sql_order);

							if ($res) {
								echo "<header class=\"minor clear-both\">
										<h2>包含的订单</h2>
									</header>
						<div class=\"list-group-display-content col-xs-12\">";

								while($row = mysqli_fetch_array($res)) {
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
							}
							
							// 	printf("
							//     <img src=\"%s\" alt=\"parcel_img\"/><br />
							// 		<h2>Your package: %s</h2>
							// 			<div class=\"row uniform row-nopadding\">",
							// 	$track_data["item"],
							// 	$track_data["track_id"]
							// 	);
							
							// 	printf(
							// 	"Status: %s		<br />
							// 	To arrive: 		<br />
							// 	Destination: 	<br />
							// 	",
							// 	$track_data["status"]
								
							// 	//   Arrival time estimate
							// 	//$track_data[""],
								
							// 	//   General or specific location destination
							// 	//$track_data["receiver_address"]
								
							// 	);
								
							// }	
								
							// ?>
							
               			    <?php
								
							// /* If logged in, sure show the Sender/receiver info */
								
							// if (isset($track_data))
							// {
							// 	echo "
							// 	<div class=\"user-text clear-both\">			
							// 		<h1><br />Sender Information</h1>
							// 		<hr>
							// 	</div>
							
       //        			    	<div class=\"user-text clear-both\">
							// 	";

							// 	printf(
							// 	"Full name: %s	<br />
							// 	Phone: %s		<br />
							// 	E-mail: %s		<br />
							// 	",
							// 	$track_data["sender_name"],
							// 	$track_data["sender_phone"],
							// 	$track_data["sender_email"]
							// 	);
							// 	echo "</div>
                  					
       //        			    	<div class=\"user-text clear-both\">			
							// 		<h1><br />Receiver Information</h1>
							// 		<hr>
							// 	</div>
							
       //        			    <div class=\"user-text clear-both\">
							// 	";
							
							// printf(
							// 	"Full name: %s	<br />
							// 	Address: %s		<br />
							// 	Phone: %s 		<br /> 
							// 	E-mail: %s		<br />
							// 	<br />
							// 	Description: %s <br />
							// 	Qty: %s 		<br />
							// 	Price: %s 		<br />
							// 	Weight: %s %s 	<br />
							// 	Order ID: %s 	<br />
							// </div>
							// 	",
							// 	$track_data["receiver_name"],
							// 	$track_data["receiver_address"],
							// 	$track_data["receiver_phone"],
							// 	$track_data["receiver_email"],
							// 	$track_data["description"],
							// 	$track_data["quantity"],
							// 	$track_data["price"],
							// 	$track_data["weight"], $track_data["unit"],
							// 	$track_data["order_id"]
							// 	);
							} else {

							}
							?>
							
								
               		   			<!-- <div class="col-xs-12 clear-both"> -->
								<!-- </div> -->
						
               		   		</div>
					<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					</div>
				</section>
			</div>

		<!-- Footer -->
		<?php include("footer.php"); ?>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/scripts.js"></script>
	</body>
</html>