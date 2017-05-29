<?php
	require ("utils.php");
	configSession();
	loginRequired('请先登陆再登记订单', 'order_detail.php');

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>登记订单 - Otto带物</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="../assets/css/styles.css" />
	<link rel="icon" type="image/x-icon" href="../../images/favicon-32x32.png" />

	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>
<body>

	<!-- Navigation -->
	<?php $title="登记订单"; $active="登记订单"; include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2>登记订单</h2>
			<!-- <button class="wide badge hidden" id="edit">修改</button> -->
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-red"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-3 vert-divider-right">
				<form id="contact-info">
					<h3>寄件人联系方式</h3>
					<div class="input-with-label">
						<span>姓名/昵称</span>
						<input type="text" name="dname" id="dname" required class="required" maxlength="80"/>
					</div>
					<div class="input-with-label">
						<span>电话</span>
						<input type="tel" name="dcell" id="dcell" required class="required" maxlength="25"/>
					</div>
					<div class="input-with-label">
						<span>电子邮箱</span>
						<input type="email" name="demail" id="demail" maxlength="100"/>  
					</div>
					<!-- 
					<div class="input-with-label">
						<span>地址</span>
						<input type="address" name="daddress" id="daddress"required class="required" maxlength="400"/>
						</div>   -->

					<div class="divider"></div>

					<h3>收件人联系方式</h3>
					<div class="input-with-label">
						<span>姓名/昵称</span>
						<input type="text" name="cname" id="cname" required class="required" maxlength="80"/>
					</div>
					<div class="input-with-label">
						<span>电话</span>
						<input type="tel" name="ccell" id="ccell" required class="required" maxlength="25"/>
					</div>
					<div class="input-with-label">
						<span>寄送地址</span>
						<input type="address" name="caddress" id="caddress" required class="required" maxlength="400"/>  
					</div>
				</form>
			</div>

			<div class="col-xs-12 col-md-6 vert-divider-right">
				<header class="minor">
						<h3>订单详情</h3>
						<button  class="small badge" id="add-item">添加物品</button>
				</header>
				<ul id="items">
					<li id="item-template" class="hidden">
						<div class="col-xs-8 input-with-label">
							<span>物品名称</span>
							<input type="text" maxlength="100" name="itemName">
						</div>
						<div class="col-xs-4 input-with-label">
							<span>数量</span>
							<input type="number" min="0" max="999999" name="quantity">
						</div>
						<div class="col-xs-6 input-with-label">
							<span>单个重量(lb)</span>
							<input type="number" min="0" max="99" name="weight">
						</div>
						<div class="col-xs-6 input-with-label">
							<span>单个价格(CAD)</span>
							<input type="number" min="0" max="999999999" name="value">
						</div>
						<div class="col-xs-12">

							<!-- http://tutorialzine.com/2013/05/mini-ajax-file-upload-form/ -->
							<form class="upload input-with-label" method="post" action="../assets/fileUploader/upload.php" enctype="multipart/form-data"> 
							<span>物品图片</span>
								<ul> 
									<li class="drop-zone"> <!-- 添加图片 -->(Coming soon) </li>
									<!-- Files are shown here --> 
								</ul>
								<!-- <input type="file" name="upl" multiple /> -->
							</form>

						</div>
						<div class="clear-both divider"></div>
					</li>
				</ul>
			</div>

			<div class="col-xs-12 col-md-3">
				<form id="shipment">
					<h3>运输</h3>
					<div class="input-with-label">
						<input type="radio" name="shipment" id="shipment1" value="0"/>
						<label for="shipment1">卖家交付货物给Ot-to</label>
					</div>
					<div class="input-with-label">
						<input type="radio" name="shipment" id="shipment2" value="1"/>
						<label for="shipment2">Ot-to上门取货</label>
					</div>
					<div class="small">Ot-to 当前只在大多(GTA)地区取货</div>
					<div class="divider"></div>
					<h3>总结</h3>
					<p>估计总重量： <span id="total-weight">0</span> lb(s)</p>
					<p>估计总价格： <span id="total-value">0</span> CAD <div class="small">估计总价格： (单价 + 重量 x 7.5/lb) x 数量</div></p>
					<p class="hidden">订单号： <span id="orderID"></span></p>
					<p class="hidden">运输号： <span id="trackingID"></span></p>
				</form>
				<button class="button special fit" id="submit">提交</button>
			</div>
		</div>
			
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<!-- <script src="../assets/js/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
<!-- 	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
	<script src="../assets/select2/js/select2.js"></script>
	<script src="../assets/js/scripts.js"></script>
<!-- 	<script>
	    var j = jQuery.noConflict();
	    j( function() {
	        j( "#datepicker" ).datepicker({dateFormat: "yy-m-d"});
	    } );
	</script> -->

	<!-- jQuery File Upload Dependencies -->
	<script src="../assets/fileUploader/js/jquery.ui.widget.js"></script>
	<script src="../assets/fileUploader/js/jquery.iframe-transport.js"></script>
	<script src="../assets/fileUploader/js/jquery.fileupload.js"></script>
	<script src="../assets/fileUploader/js/script.js"></script>

	<script type="text/javascript">
		$("#add-item").click(function(){addItem()})
		$('#submit').click(function(){submitOrder()});
		$('#edit').click(function(){toggleOrder()});
		$('form, #items').each(function(){formDisplayAdjust($(this))});
	</script>


</body>
</html>
