<?php
	require ("utils.php");
	configSession();
	// loginRequired();

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 登记订单</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="../assets/css/styles.css" />

	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>
<body>

	<!-- Navigation -->
	<?php include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2>登记订单</h2>
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-red"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-3 vert-divider-right">
				<form id="contact-info">
					<h3>卖家联系方式</h3>
					<input type="text" name="dname" id="dname" placeholder="姓名/昵称" required class="required" maxlength="80"/>
					<input type="tel" name="dcell" id="dcell" placeholder="电话" required class="required" maxlength="25"/>
					<input type="email" name="demail" id="demail" placeholder="电子邮箱" maxlength="100"/>  
					<!-- <input type="address" name="daddress" id="daddress" placeholder="地址" required class="required" maxlength="400"/>   -->

					<div class="divider"></div>

					<h3>买家联系方式</h3>
					<input type="text" name="cname" id="cname" placeholder="姓名/昵称" required class="required" maxlength="80"/>
					<input type="tel" name="ccell" id="ccell" placeholder="电话" required class="required" maxlength="25"/>
					<input type="address" name="caddress" id="caddress" placeholder="寄送地址" required class="required" maxlength="400"/>  
				</form>
			</div>

			<div class="col-xs-12 col-md-6 vert-divider-right">
				<header class="minor">
					<form>
						<h3>订单详情</h3>
						<button type="button" class="small badge" id="add-item">添加物品</button>
					</form>
					<ul class="" id="items">
						<li id="item-template" class="hidden">
							<div class="col-xs-9">
								<input type="text" placeholder="物品名称" maxlength="100">
							</div>
							<div class="col-xs-3">
								<input type="number" placeholder="数量" min="0" max="999999">
							</div>
							<div class="col-xs-6">
								<input type="number" placeholder="单个重量(kg)" min="0" max="99">
							</div>
							<div class="col-xs-6">
								<input type="number" placeholder="单个价格(CAD)" min="0" max="999999999">
							</div>
							<div class="col-xs-12">

								<!-- http://tutorialzine.com/2013/05/mini-ajax-file-upload-form/ -->
								<form class="upload" method="post" action="upload.php" enctype="multipart/form-data">
									<ul> 
										<li><img src="../img/avatars/1.png"/></li>
										<li class="drop-zone"> 添加图片 </li>
										<!-- Files are shown here --> 
									</ul>
									<input type="file" name="upl" multiple />
								</form>

							</div>
							<div class="clear-both divider"></div>
						</li>
					</ul>
				</header>
			</div>

			<div class="col-xs-12 col-md-3">
				<form id="shipment">
					<h3>运输</h3>
					<div>
						<input type="radio" name="shipment" id="shipment1" value="you-deliver"/>
						<label for="shipment1">卖家交付货物给Ot-to</label>
					</div>
					<div>
						<input type="radio" name="shipment" id="shipment2" value="we-pick-up"/>
						<label for="shipment2">Ot-to上门取货</label>
					</div>
					<div class="small">Ot-to 当前只在大多(GTA)地区取货</div>
					<div class="divider"></div>
					<h3>总结</h3>
					<p>估计总重量： <span id="total-weight">0</span> kg</p>
					<p>估计总价格： <span id="total-value">0</span> CAD</p>
					<!-- <p>订单号： 349876</p>
					<p>运输号： OT4839765045</p> -->
				</form>
				<button class="button special fit">提交</button>
			</div>
		</div>
			
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<!-- <script src="../assets/js/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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

	<script type="text/javascript">
		$("#add-item").click(function(){addItem()})
	</script>


</body>
</html>
